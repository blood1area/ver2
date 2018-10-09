<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;

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
    return;
}

$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);
if ($arParams['IBLOCK_ID'] <= 0) {
    ShowError(Loc::GetMessage('NO_IB'));
    return;
}

$arParams['ALL_SALONS_URL'] = trim(htmlspecialchars($arParams['ALL_SALONS_URL']));
if (empty($arParams['ALL_SALONS_URL'])){
    $arParams['ALL_SALONS_URL'] = '/';
}

if(!Loader::IncludeModule("iblock")){
    ShowError(Loc::GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
    return;
} else {
    $arButtons = CIBlock::GetPanelButtons(
        $arParams['IBLOCK_ID'],
        0,
        0,
        array('SECTION_BUTTONS' => false,)
    );

    if ($APPLICATION->GetShowIncludeAreas()) {
        $this->addIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $arButtons));
    }
}

if($this->StartResultCache(false))
{
	//SELECT
	$arSelect = array(
		"ID",
		"IBLOCK_ID",
		"NAME",
		"PREVIEW_PICTURE",
		"PROPERTY_ADDRESS",
		"PROPERTY_PHONE",
		"PROPERTY_WORK_HOURS"
	);
	//WHERE
	$arFilter = array(
        "IBLOCK_ID"=>$arParams["IBLOCK_ID"],
        "ACTIVE"=>"Y"
	);

	//ORDER BY
	$arSort = array(
		$arParams["SORT_PROP"]=>$arParams["SORT_TYPE"]
	);
	//EXECUTE
	$rsIBlockElement = CIBlockElement::GetList(
		$arSort,
		$arFilter,
		false,
		['nPageSize' => $arParams["AMOUNT_ELEMENTS"]],
		$arSelect
    );

    $rsIBlockElement->SetUrlTemplates($arParams["DETAIL_URL"]);

	while ($item = $rsIBlockElement->GetNext()) {
            $arButtons = CIBlock::GetPanelButtons(
            $item['IBLOCK_ID'],
            $item['ID'],
            0,
            array('SECTION_BUTTONS' => false, 'SESSID' => false)
        );

        $item['EDIT_LINK'] = $arButtons['edit']['edit_element']['ACTION_URL'];
        $item['DELETE_LINK'] = $arButtons['edit']['delete_element']['ACTION_URL'];

        if (empty($item['PREVIEW_PICTURE'])) {
            $item['PREVIEW_PICTURE']['SRC'] = NO_IMAGE_SRC;
        } else {
            Bitrix\Iblock\Component\Tools::getFieldImageData(
                $item,
                array('PREVIEW_PICTURE'),
                Bitrix\Iblock\Component\Tools::IPROPERTY_ENTITY_ELEMENT,
                'IPROPERTY_VALUES'
            );
        }
        $arResult["SALONS"][] = $item;
	}
    $this->IncludeComponentTemplate();
}

