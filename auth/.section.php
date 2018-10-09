<?
use Bitrix\Main\Localization\Loc;

if($_REQUEST["register"]=="yes"){
    $sSectionName = Loc::getMessage('REGISTER_TITLE');
}else if($_REQUEST["forgot_password"]=="yes"){
    $sSectionName = Loc::getMessage('FORGOT_PASS_TITLE');
}else{
    $sSectionName = Loc::getMessage('AUTH_TITLE');
}
$arDirProperties = array(

);