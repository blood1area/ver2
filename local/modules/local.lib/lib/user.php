<?php
namespace Local\Lib;

class User
{
    public static function onAfterUserAuthorizeHandler($arUser)
    {
        $arUserFields = $arUser["user_fields"];
        $mailContent = array(
            "EVENT_NAME" => "USER_AUTH",
            "LID" => "s1",
            "C_FIELDS" => array(
                "EMAIL" => $arUserFields["EMAIL"],
                "LAST_LOGIN" => \Bitrix\Main\Type\DateTime::createFromPhp(new \DateTime($arUserFields['LAST_LOGIN']))->format("Y.d.m H:i:s"),
                "LOGIN" => $arUserFields["LOGIN"]
            )
        );
        Bitrix\Main\Mail\Event::send($mailContent);
    }
    public static function test()
    {
        $mailContent = array(
            "EVENT_NAME" => "USER_AUTH",
            "LID" => "s1",
            "C_FIELDS" => array(
                "EMAIL" => 12312312312,
                "LAST_LOGIN" => 213123123,
                "LOGIN" => 123132123
            )
        );
        Bitrix\Main\Mail\Event::send($mailContent);
    }
}
?>