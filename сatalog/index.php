<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("catalog");
?><?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle('Каталог');
?>
<?$APPLICATION->IncludeComponent(
    "bitrix:catalog", "", Array(
		"IBLOCK_TYPE" => "books",
		"IBLOCK_ID" => "6",
		"PRICE_CODE" => Array(
			0 => "RETAIL",
			1 => "BASE"),
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/e-store/books/"
)
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>