<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$request = Bitrix\Main\Application::getInstance()->getContext()->getRequest();
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

if ($_REQUEST['TYPE'] == 'REGISTRATION'):
    $APPLICATION -> SetTitle(Loc::getMessage('AFTER_REG_TITLE'));
    echo Loc::getMessage('AFTER_REG_PAGE');
else :
    $backUrl = $_REQUEST["backurl"];
    if (is_string($backUrl) && strpos($backUrl, "/") === 0){
        LocalRedirect($backUrl);
    }else{
        LocalRedirect("/");
    }
endif;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>