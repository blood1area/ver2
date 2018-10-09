<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arTemplateParameters = array(
	"USE_SUGGEST" => Array(
		"NAME" => GetMessage("TP_BSP_USE_SUGGEST"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "N",
	),
	"SHOW_ITEM_DATE_CHANGE" => array(
		"NAME" => GetMessage("TP_BSP_SHOW_ITEM_DATE_CHANGE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"SHOW_ORDER_BY" => array(
		"NAME" => GetMessage("TP_BSP_SHOW_ORDER_BY"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
);