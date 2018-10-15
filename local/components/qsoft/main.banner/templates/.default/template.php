<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$frame = $this->createFrame()->begin("");?>
    <ul class="bxslider">
        <? foreach ($arResult['BANNERS'] as $banner):?>
        <li>
            <div class="banner" <? if(count($arResult['BANNERS'])==1) echo 'style="padding-bottom:10px"'?>>
                <img src="<?=$banner['IMAGE_PATH']?>" alt="<?$banner['NAME']?>" title="" />
                <div class="banner_content">
                    <h1><?=$banner['NAME'];?></h1>
                    <h2><?=$banner['CODE'];?> <a href="<?=$banner['URL'];?>" class="detail_link"><?=GetMessage('DETAIL_LAYOUT')?></a></h2>
                </div>
            </div>
        </li>
        <? endforeach; ?>
    </ul>
<?$frame->end();