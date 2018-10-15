<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

    <?
    $APPLICATION->IncludeComponent(
        "bitrix:map.yandex.view",
        "",
        Array(
            "INIT_MAP_TYPE" => "MAP",
            "MAP_DATA" => $arResult['MAP_POINTS'],
            "MAP_HEIGHT" => "500",
            "MAP_WIDTH" => "AUTO",
            "CONTROLS" => Array("ZOOM", "TYPECONTROL"),
            "OPTIONS" => Array("ENABLE_SCROLL_ZOOM"),
            "MAP_ID" => "salon"
        )
    );?>
