<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

$tmp = trim(htmlspecialchars($arParams['PERSONAL_AREA_URL']));
$arParams['PERSONAL_AREA_URL'] = (empty($tmp)?'/':$tmp);