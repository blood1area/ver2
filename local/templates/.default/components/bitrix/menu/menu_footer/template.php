<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

    <section class="info_block left_block_shadow">
        <h2><?=Bitrix\Main\Localization\Loc::getMessage('MENU_TITLE')?></h2>
        <nav class="grey">
            <ul>
                <?foreach($arResult as $arItem):?>
                <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                <?endforeach;?>
            </ul>
        </nav>
    </section>
<?endif?>