<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");?><?$APPLICATION->IncludeComponent(
	"bitrix:search.form", 
	"search_form_header", 
	array(
		"COMPONENT_TEMPLATE" => "search_form_header",
		"PAGE" => "/search/",
		"USE_SUGGEST" => "N"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>