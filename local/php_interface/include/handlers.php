<?
use \Bitrix\Main\EventManager;

EventManager::getInstance()->addEventHandler(
    'main',
    'OnAfterUserAuthorize',
    function ($arUser) {
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

EventManager::getInstance()->addEventHandler(
    'main',
    'OnAfterUserRegister',
    function (&$arUser) {
        $mailContent = array(
            "EVENT_NAME" => "USER_REGISTER",
            "LID" => "s1",
            "C_FIELDS" => array(
                'EMAIL' => $arUser['EMAIL'],
                'LOGIN' => $arUser['LOGIN'],
                'NAME' => $arUser['NAME'],
                'LAST_NAME' => $arUser['LAST_NAME']
            )
        );
        \Bitrix\Main\Mail\Event::send($mailContent);
    }
);
?>