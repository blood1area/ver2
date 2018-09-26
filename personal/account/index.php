<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Счет пользователя");
?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.personal.account",
	"",
	Array(
		"SET_TITLE" => "Y" 
	)
);?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.personal.cc.detail",
	"",
	Array(
		"PATH_TO_LIST" => "",
		"SET_TITLE" => "Y",
		"ID" => $ID
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>