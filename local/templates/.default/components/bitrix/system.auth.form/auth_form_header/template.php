<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CJSCore::Init();

if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR']){
    ShowMessage($arResult['ERROR_MESSAGE']);
}

if($arResult["FORM_TYPE"] == "login"):?>
    <nav class="top_menu grey inline-block">
        <a href="<?=$arResult["AUTH_REGISTER_URL"]?>" class="register"><?=GetMessage("AUTH_REGISTER")?></a>
        <a href="<?=$arParams["REGISTER_URL"]?>?backurl=<?=$arResult["BACKURL"];?>" class="auth"><?=GetMessage("AUTH_LOGIN")?></a>
    </nav>
<?
else:
?>
    <nav class="top_menu grey inline-block authorize">
        <span><?=GetMessage("ACCOST")?></span>
        <a href="<?=$arResult["PROFILE_URL"]?>"><b class="user_name"><?=($arResult["USER_NAME"]?$arResult["USER_NAME"]:$arResult["USER_LOGIN"])?></b></a>
        <a href="<?=$arResult["PROFILE_URL"]?>"><?=GetMessage("AUTH_PROFILE")?></a>
        <a class="logout" href="
            <?=$APPLICATION->GetCurPageParam(
                "logout=yes",
                array(
                     "login",
                     "logout",
                     "register",
                     "forgot_password",
                     "change_password"
                     )
                )
            ?>
        "><?=GetMessage("AUTH_LOGOUT_BUTTON")?></a>
    </nav>
<?endif?>
