<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$result = array(
    "yandex_lat" => 55.75321499999372,
    "yandex_lon" => 37.622504000000006,
    "yandex_scale" => 10,
    "POLYLINES" => array()
);

foreach ($arResult["SALONS"] as $elem):
    list($LAT, $LON) = explode(',', $elem['PROPERTY_MAP_VALUE']);
    $result['PLACEMARKS'][] = array(
        "LON" => $LON,
        "LAT" => $LAT,
        "TEXT" => $elem['NAME']
    );
endforeach;
?>
<section class = 'shops_block'>
    <div>
    <?
    $APPLICATION->IncludeComponent(
        "bitrix:map.yandex.view",
        "",
        Array(
            "INIT_MAP_TYPE" => "MAP",
            "MAP_DATA" => serialize($result),
            "MAP_HEIGHT" => "500",
            "MAP_WIDTH" => "AUTO",
            "CONTROLS" => Array("ZOOM", "TYPECONTROL"),
            "OPTIONS" => Array("ENABLE_SCROLL_ZOOM"),
            "MAP_ID" => "salon"
        )
    );?>
    </div>
</section>
