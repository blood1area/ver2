<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>

<?
if(strlen($arResult["OK_MESSAGE"]) > 0):
    echo '<div class="mf-ok-text">'.$arResult["OK_MESSAGE"].'</div>';
    echo '<a href="/company/contacts/">'.$arParams["LAYOUT_REPEAT"].'</a>';
    return;
else:
?>
    <form action="<?=POST_FORM_ACTION_URI?>" method="POST">
        <?=bitrix_sessid_post()?>
        <div class="field_row">
            <p class="form_label">
                <?=
                GetMessage("MFT_NAME");
                if(in_array('NAME', $arParams["REQUIRED_FIELDS"])){
                    echo '<span class="required">*</span>';
                };
                if($message = $arResult['ERROR_MESSAGE']['NAME'])
                    echo ' <span class="error">'.$message.'</span>';
                ?>
            </p>
            <input type="text" name="user_name"  value="<?=$arResult["AUTHOR_NAME"]?>">
        </div>
        <div class="field_row">
            <p class="form_label">
                <?=GetMessage("MFT_EMAIL");
                if(in_array('EMAIL', $arParams["REQUIRED_FIELDS"])){
                    echo '<span class="required">*</span>';
                };
                if($message = $arResult['ERROR_MESSAGE']['EMAIL'])
                    echo ' <span class="error">'.$message.'</span>';
                ?>
            </p>
            <input type="text"name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>">
        </div>
        <div class="field_row">
            <p class="form_label">
                <?=GetMessage("MFT_MESSAGE");
                if(in_array('MESSAGE', $arParams["REQUIRED_FIELDS"])){
                    echo '<span class="required">*</span>';
                };
                if($message = $arResult['ERROR_MESSAGE']['MESSAGE'])
                    echo ' <span class="error">'.$message.'</span>';
                ?>
            </p>
            <textarea name="MESSAGE" rows="5" cols="40"><?=$arResult["MESSAGE"]?></textarea>
        </div>
    <?if($arParams["USE_CAPTCHA"] == "Y"):?>
        <div class="field_row">
            <div class="field_row"><?=GetMessage("MFT_CAPTCHA")?></div>
            <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
            <div class="field_row">
                <p class="form_label"><?=GetMessage("MFT_CAPTCHA_CODE");?>
                    <span class="required">*</span>
                    <?if($message = $arResult['ERROR_MESSAGE']['CAPTCHA'])
                        echo ' <span class="error">'.$message.'</span>';
                    ?>
                </p>
            </div>
            <input type="text" name="captcha_word" size="30" maxlength="50" value="">
        </div>
    <?endif;?>
        <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
        <div class="buttons_block">
            <input class="pie" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>" type="submit">
        </div>
    </form>
<?endif;?>