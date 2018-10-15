<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наши салоны");
?><?$APPLICATION->IncludeComponent(
	"qsoft:stores.list", 
	"stores_full", 
	array(
		"ALL_SALONS_URL" => "",
		"AMOUNT_ELEMENTS" => "20",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"DETAIL_URL" => "/company/stores/",
		"IBLOCKS" => "13",
		"IBLOCK_ID" => "22",
		"IBLOCK_TYPE" => "stores",
		"PARENT_SECTION" => "",
		"SHOW_MAP" => "Y",
		"SORT_PROP" => "NAME",
		"SORT_TYPE" => "DESC",
		"COMPONENT_TEMPLATE" => "stores_full"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>