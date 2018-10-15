<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;




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

    if ($arParams['SHOW_MAP'] == 'Y') {
        array_push($arSelect, 'PROPERTY_MAP');
    }

    $nPageSize['nPageSize'] = ($arParams['SHOW_MAP'] == 'Y') ? false : $arParams['AMOUNT_ELEMENTS'];

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
        $nPageSize,
		$arSelect
    );

    $rsIBlockElement->SetUrlTemplates();

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
//    $arMap = [];
//    foreach ($salons as $salon => $value) {
//        if (!empty($value['PROPERTY_MAP_VALUE'])) {
//            list($LAT, $LON) = explode(',', $value['PROPERTY_MAP_VALUE']);
//            $arMap['PLACEMARKS'][] = [
//                'TITLE' => $value['NAME'],
//                'TEXT' => $value['PROPERTY_ADDRESS_VALUE'],
//                'LON' => $LON,
//                'LAT' => $LAT
//            ];
//        }
//    }
//    $arMap['yandex_lat'] = 55.7537;
//    $arMap['yandex_lon'] = 37.6198;
//    return serialize($arMap);
    $this->IncludeComponentTemplate();
}

