<?php
use \Bitrix\Main\EventManager;

if (file_exists($_SERVER["DOCUMENT_ROOT"]."/local/modules/custom/include.php"))
    require_once($_SERVER["DOCUMENT_ROOT"]."/local/modules/custom/include.php");

EventManager::getInstance()->addEventHandler(
    'main',
    'OnAfterUserAuthorize',
    function ($arUser)
    {
        $arUserFields = $arUser["user_fields"];
        $mailContent = array(
            "EVENT_NAME" => "USER_AUTH",
            "LID" => "s1",
            "C_FIELDS" => array(
                "EMAIL" => $arUserFields["EMAIL"],
                "LAST_LOGIN" => date("Y.d.m H:i:s"),
//                "LAST_LOGIN" => \Bitrix\Main\Type\DateTime::createFromPhp(new \DateTime($arUserFields['LAST_LOGIN']))->format("Y.d.m H:i:s"),
                "LOGIN" => $arUserFields["LOGIN"]
            )
        );
        \Bitrix\Main\Mail\Event::send($mailContent);
    }
);
?>