<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тест главной страницы");
?>	 <?$APPLICATION->IncludeComponent(
	"bitrix:search.form", 
	"flat", 
	array(
		"PAGE" => "/search/",
		"USE_SUGGEST" => "N",
		"COMPONENT_TEMPLATE" => "flat"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>