<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>
<?

$arAvailableParams = array(
    'arUser' => Array(
        'FORM' => Array(
            "NAME",
            "LAST_NAME",
            "SECOND_NAME",
            "EMAIL",
            "LOGIN"
        )
    ),
    '' => Array(
        'ID',
        'DATA_SAVED',
        'FORM_TARGET',
        'BX_SESSION_CHECK',
        'strProfileError'
    )
);

$result = [];
$arTemp = [];

foreach (array_keys($arAvailableParams) as $chunk){

    if(!empty($chunk)){
        $arTemp = $arResult[$chunk];
    } else {
        $arTemp = $arResult;
    }

    foreach ($arAvailableParams[$chunk] as $paramkey=>$param) {

        if (is_array($param)){
            foreach ($param as $needleData){
                $result[$paramkey][$needleData] = $arTemp[$needleData];
            }
        } else {
            $result[$param]  = $arTemp[$param];
        }

    }
}
$arResult = $result;

unset($result);
unset($arTemp);