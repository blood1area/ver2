<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$backUrl = $_REQUEST["backurl"];
if (is_string($backUrl) && strpos($backUrl, "/") === 0){
    LocalRedirect($backUrl);
}else{
    LocalRedirect("/");
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>