<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader,
    Bitrix\Main\Localization\Loc,
    Bitrix\Iblock\Component\Tools;

class StoreList extends CBitrixComponent {

    public function onPrepareComponentParams($arParams) {

        $arParams['CACHE_TIME'] = intval($arParams["CACHE_TIME"]);
        if($arParams["CACHE_TIME"] <= 0) {
            $arParams["CACHE_TIME"] = CACHE_TIME_DEFAULT;
        }

        $arParams["AMOUNT_ELEMENTS"] = intval($arParams["AMOUNT_ELEMENTS"]);
        if($arParams["AMOUNT_ELEMENTS"] <= 0) {
            $arParams["AMOUNT_ELEMENTS"] = 2;
        }

        $arParams['IBLOCK_TYPE'] = trim(htmlspecialchars($arParams['IBLOCK_TYPE']));
        if (empty($arParams['IBLOCK_TYPE'])){
            ShowError(Loc::GetMessage('NO_IB_T'));
            return 0;
        }

        $arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);
        if ($arParams['IBLOCK_ID'] <= 0) {
            ShowError(Loc::GetMessage('NO_IB'));
            return 0;
        }

        $arParams['ALL_SALONS_URL'] = trim(htmlspecialchars($arParams['ALL_SALONS_URL']));
        if (empty($arParams['ALL_SALONS_URL'])){
            $arParams['ALL_SALONS_URL'] = '/';
        }

        return $arParams;
    }

    public function executeComponent() {
        global $APPLICATION;
        if(!Loader::IncludeModule("iblock")){
            ShowError(Loc::GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
            return 0;
        }

        if ($this->startResultCache()){
            $this->arResult = $this->getDataList();

            if ($this->arParams['SHOW_MAP'] == 'Y') {
                $this->arResult['MAP_POINTS'] = $this->getMapPointsList($this->arResult['STORES']);
                $this->SetResultCacheKeys(['MAP_POINTS']);
            }
            $this->includeComponentTemplate();
        }
        return $this->arResult;
    }

    private function getDataList(){
        $result = array();
        $arImg = array();
        $arSelect = array(
            'ID',
            "IBLOCK_ID",
            "NAME",
            "PREVIEW_PICTURE",
            "PROPERTY_ADDRESS",
            "PROPERTY_PHONE",
            "PROPERTY_WORK_HOURS"
        );

        if ($this->arParams['SHOW_MAP'] == 'Y') {
            array_push($arSelect, 'PROPERTY_MAP');
        }

        $arFilter = array(
            "IBLOCK_TYPE" => $this->arParams['IBLOCK_TYPE'],
            "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
            "ACTIVE" => "Y"
        );

        $arSort = array(
            $this->arParams["SORT_PROP"]=>$this->arParams["SORT_TYPE"]
        );

        $nPageSize['nPageSize'] = ($this->arParams['SHOW_MAP'] == 'Y') ? false : $this->arParams['AMOUNT_ELEMENTS'];

        $storesList = CIBlockElement::GetList(
            $arSort,
            $arFilter,
            false,
            $nPageSize,
            $arSelect
        );

        while ($store = $storesList->GetNext(true, false)){
            $arButtons = CIBlock::GetPanelButtons(
                $this->arParams['IBLOCK_ID'],
                $store["ID"],
                0,
                array("SECTION_BUTTONS" => false, "SESSID" => false)
            );
            $store['EDIT_LINK'] = $arButtons['edit']['edit_element']['ACTION_URL'];
            $store['DELETE_LINK'] = $arButtons['edit']['delete_element']['ACTION_URL'];

            $result['STORES'][] = $this->getPicture($store, 'PREVIEW_PICTURE');
        }
//        \Bitrix\Main\Diag\Debug::dump($arButtons);
        if ($arButtons){
            $result['ADD_LINK'] = $arButtons['edit']["add_element"]['ACTION_URL'];
        }

        return $result;
    }

    private function getPicture($item, $key){
        if (empty($item[$key])) {
            $item[$key]['SRC'] = NO_IMAGE_SRC;
            $item[$key]['ALT'] = $item['NAME'];
            $item[$key]['TITLE'] = $item['NAME'];
        } else {
            Tools::getFieldImageData(
                $item,
                [$key],
                0,
                0
            );
        }
        return $item;
    }

    private function getMapPointsList($arResult)
    {
        $result = array(
            "yandex_lat" => 55.75321499999372,
            "yandex_lon" => 37.622504000000006,
            "yandex_scale" => 10,
            "POLYLINES" => array()
        );

        foreach ($arResult as $elem) {
            list($LAT, $LON) = explode(',', $elem['PROPERTY_MAP_VALUE']);
            $result['PLACEMARKS'][] = array(
                "LON" => $LON,
                "LAT" => $LAT,
                "TEXT" => $elem['NAME']
            );
        }
        return serialize($result);
    }
}
