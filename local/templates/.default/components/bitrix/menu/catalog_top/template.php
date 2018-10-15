<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <nav class="main_menu">
        <?
        $currentDepth = 0;
        foreach($arResult as $arItem):
            if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1):
                continue;
            endif;

            if ($arItem["DEPTH_LEVEL"] > $currentDepth):
                $currentDepth ++;
                echo '<ul>';
            elseif ($arItem['DEPTH_LEVEL'] < $currentDepth):
                $currentDepth --;
                echo '</li></ul>';
            endif;

            if ($arItem['IS_PARENT']):?>
                <li class="submenu pie <?if($arItem["SELECTED"]) echo 'current';?>">
                    <span>
                        <?=$arItem["TEXT"]?>
                    </span>
                    <div class="submenu_border"></div>
            <?else:?>
                <?if ($arItem['SELECTED']):?>
                    <li class="current">
                        <span><?=$arItem['TEXT']?></span>
                    </li>
                <?else:?>
                    <li>
                        <a href="<?=$arItem['LINK']?>">
                            <?=$arItem["TEXT"]?>
                        </a>
                    </li>
                <?endif?>
            <?endif;?>
        <?endforeach;
        if ($currentDepth):
            echo str_repeat('</li></ul>', $currentDepth);
        endif;
        ?>
    </nav>
<?endif;