<?php

use \Bitrix\Main\Loader;
$eventManager = \Bitrix\Main\EventManager::getInstance();

AddEventHandler("main", "OnPageStart", "loadLocalLib", 1);
function loadLocalLib()
{
    Loader::includeModule('local.lib');
}

//AddEventHandler('main', 'OnAfterUserAuthorize', Array('Local\Lib\Handlers\User', 'onAfterUserAuthorizeHandler'));
?>