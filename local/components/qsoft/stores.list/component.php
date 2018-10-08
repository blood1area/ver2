<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;

if(!isset($arParams["CACHE_TIME"])) {
    $arParams["CACHE_TIME"] = 3600;
}

$arParams["AMOUNT_ELEMENTS"] = intval($arParams["AMOUNT_ELEMENTS"]);
if($arParams["AMOUNT_ELEMENTS"] <= 0) {
    $arParams["AMOUNT_ELEMENTS"] = 2;
}

if ($arParams['IBLOCK_ID'] <= 0) {
    ShowError(Loc::GetMessage('NO_IB'));
    return;
}

if(!Loader::IncludeModule("iblock"))
{
    ShowError(Loc::GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
    return;
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
		$arSelect);

$rsIBlockElement->SetUrlTemplates($arParams["DETAIL_URL"]);

	while ($item = $rsIBlockElement->GetNext()){

        $arButtons = CIBlock::GetPanelButtons(
            $item['IBLOCK_ID'],
            $item['ID'],
            0,
            array('SECTION_BUTTONS' => false, 'SESSID' => false)
        );

        $item['EDIT_LINK'] = $arButtons['edit']['edit_element']['ACTION_URL'];
        $item['DELETE_LINK'] = $arButtons['edit']['delete_element']['ACTION_URL'];

        Bitrix\Iblock\Component\Tools::getFieldImageData(
            $item,
            array('PREVIEW_PICTURE'),
            Bitrix\Iblock\Component\Tools::IPROPERTY_ENTITY_ELEMENT,
            'IPROPERTY_VALUES'
        );
        $arResult["SALONS"][] = $item;
	}

    $this->SetResultCacheKeys(array('SALONS'));
    $this->IncludeComponentTemplate();
}

$arButtons = CIBlock::GetPanelButtons(
    $arParams['IBLOCK_ID'],
    0,
    0,
    array('SECTION_BUTTONS' => false,)
);

if ($APPLICATION->GetShowIncludeAreas()) {
    $this->addIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $arButtons));
}

