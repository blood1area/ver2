<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наши салоны");
?><?$APPLICATION->IncludeComponent(
	"qsoft:stores.list", 
	"stores_short", 
	array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"DETAIL_URL" => "/company/stores/",
		"IBLOCKS" => "13",
		"IBLOCK_TYPE" => "stores",
		"PARENT_SECTION" => "",
		"COMPONENT_TEMPLATE" => "stores_short",
		"AMOUNT_ELEMENTS" => "2",
		"SHOW_MAP" => "N",
		"SORT_PROP" => "RAND",
		"SORT_TYPE" => "DESC",
		"IBLOCK_ID" => "13"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>