<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$strReturn = '<nav class="nav_chain">';
    for ($i = 0;$i < count($arResult)-1; $i++){
        $item = $arResult[$i];
        $strReturn .= '<a href="'.$item['LINK'].'">';
        $strReturn .= htmlspecialchars($item['TITLE']);
        $strReturn .= '</a><span class="nav_arrow inline-block"></span>';
    }
$strReturn .= '<span>';
$strReturn .= htmlspecialchars($arResult[count($arResult)-1]['TITLE']);
$strReturn .= '</span></nav>';

return $strReturn;