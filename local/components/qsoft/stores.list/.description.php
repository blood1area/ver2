<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("T_IBLOCK_NAME"),
	"DESCRIPTION" => GetMessage("T_IBLOCK_DESC"),
	"CACHE_PATH" => "Y",
	"SORT" => 555,
	"PATH" => array(
		"ID" => "qsoft",
		"NAME" => GetMessage("T_IBLOCK_NAME_SECTION"),
		"CHILD" => array(
			"ID" => "stores",
			"NAME" => GetMessage("T_IBLOCK_DESC_SECTION"),
			"SORT" => 20,
		)
	),
);

?>