<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

use Bitrix\Main\Localization\Loc;
?>

<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
    ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>

<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
    <?=$arResult["BX_SESSION_CHECK"]?>
    <input type="hidden" name="lang" value="<?=LANG?>" />
    <input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
    <table>
        <tr>
            <th colspan="2">
                <?echo Loc::getMessage('PERSONAL')?>
            </th>
        </tr>
        <? foreach ($arResult['FORM'] as $key=>$value): ?>
            <tr>
                <td>
                    <? echo Loc::GetMessage($key); ?>
                </td>
                <td>
                    <input type="text" name=<?echo $key?> maxlength="50" value="<?=$value?>" />
                </td>
            </tr>
        <? endforeach; ?>
    </table>
    <table style = 'margin-top:20px;'>
        <tr>
            <th colspan="2">
                <?echo Loc::getMessage('PASSWORD')?>
            </th>
        </tr>
        <tr>
            <td>
                <?echo GetMessage('NEW_PASSWORD_REQ')?>
            </td>
            <td>
                <input type="password" name="NEW_PASSWORD" maxlength="50" placeholder="<?echo PASSWORD_PLACEHOLDER?>" autocomplete="off" class="bx-auth-input" />
            </td>
        </tr>
        <tr>
            <td>
                <?echo GetMessage('NEW_PASSWORD_CONFIRM')?>
            </td>
            <td>
                <input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" placeholder="<?echo PASSWORD_PLACEHOLDER?>" autocomplete="off" />
            </td>
        </tr>
    </table>
    <p>
        <input type="submit" name="save" style='margin-top:20px;' value="<?echo Loc::getMessage('SAVE_BUTTON')?>"/>
    </p>
</form>