<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");

use Bitrix\Main\Localization\Loc;
?>
    <p>
        <?echo Loc::getMessage('HEADER');?>
    </p>

    <table style="margin-top: 20px;">
        <tr>
            <th>
                <?echo Loc::getMessage('BLOCK_PERSONAL');?>
            </th>
        </tr>
        <tr>
            <td>
                <a href="/personal/profile/"><?echo Loc::getMessage('CHANGE_PERSONAL_DATA');?></a>
            </td>
        </tr>
    </table>
    <table style="margin-top: 20px;">
        <tr>
            <th>
                <?echo Loc::getMessage('BLOCK_ORDER');?>
            </th>
        </tr>
        <tr>
            <td>
                <a href="/personal/cart/"><?echo Loc::getMessage('SHOW_BASKET');?></a>
            </td>
            <td>
                <a href="/personal/order/"><?echo Loc::getMessage('SHOW_HISTORY');?></a>
            </td>
        </tr>
    </table>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>