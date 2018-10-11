<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

$arrayWords = array(
    'NAME' => ['имя', 'name'],
    'MESSAGE' => ['сообщение','message'],
    'EMAIL' => ['mail'],
    'CAPTCHA' => ['код' ,'code']
);
$errorMsg =  Bitrix\Main\Localization\Loc::getMessage('ERROR');

if(!empty($arResult["ERROR_MESSAGE"])) {
    foreach ($arResult["ERROR_MESSAGE"] as $v) {
        foreach ($arrayWords as $key => $matchWords){

            foreach ($matchWords as $word) {
                if (stripos($v, $word)) {
                    $arResult["ERROR_MESSAGE_MARKER"][$key] = true;
                    break;
                }
            }
        }
    }
}

unset($matchWords);
unset($errorMsg);