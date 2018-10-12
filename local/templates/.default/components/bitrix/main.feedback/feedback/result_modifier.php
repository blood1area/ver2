<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

$arrayWords = array(
    'NAME' => ['имя', 'name'],
    'MESSAGE' => ['сообщение','message'],
    'EMAIL' => ['mail'],
    'CAPTCHA' => ['код' ,'code']
);
$result = array();

if(!empty($arResult["ERROR_MESSAGE"])) {
    foreach ($arResult["ERROR_MESSAGE"] as $v) {
        foreach ($arrayWords as $key => $matchWords){

            foreach ($matchWords as $word) {
                if (stripos($v, $word)) {
                    $result[$key] = $v;
                    break;
                }
            }
        }
    }
    $arResult['ERROR_MESSAGE'] = $result;
}

unset($arrayWords);
unset($result);