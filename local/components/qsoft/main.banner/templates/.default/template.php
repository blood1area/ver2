<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$frame = $this->createFrame()->begin("");?>
    <ul class="bxslider">
        <? foreach ($arResult['BANNERS_PROPERTIES'] as $banner):?>
        <li>
            <div class="banner">
                <img src="<?=CFile::GetPath($banner['IMAGE_ID'])?>" alt="<?$banner['IMAGE_ALT']?>" title="" />
                <div class="banner_content">
                    <h1><?=$banner['NAME'];?></h1>
                    <h2><?=$banner['CODE'];?> <a href="<?=$banner['URL'];?>" class="detail_link"><?=GetMessage('DETAIL_LAYOUT')?></a></h2>
                </div>
            </div>
        </li>
        <? endforeach; ?>
    </ul>
<?$frame->end();