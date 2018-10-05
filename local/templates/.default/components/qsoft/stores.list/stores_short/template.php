<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$frame = $this->createFrame()->begin('');
?>

<section class="float_inner">
    <section class="shops_block">
        <h2 class="inline-block"><?=GetMessage('OUR_STORES')?></h2>
        <span class="dark_grey all_list">&nbsp;/&nbsp;<a href="<?=$arResult["DETAIL_PAGE_URL"]?>" class="text_decor_none"><b><?=GetMessage('IBLOCK_LINK')?></b></a></span>
        <div>
            <?foreach($arResult["TEST"] as $arResult):
                $this->AddEditAction($arResult['ID'], $arResult['EDIT_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT"))	;
                $this->AddDeleteAction($arResult['ID'], $arResult['DELETE_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
                <figure id="<?=$this->GetEditAreaId($arResult['ID']);?>" class="shops_block_item">
                    <a href="">
                        <img    src="<?=$arResult["PREVIEW_PICTURE"]['SRC']?>"
                                width="<?=$arResult["PICTURE"]["WIDTH"]?>"
                                height="<?=$arResult["PICTURE"]["HEIGHT"]?>"
                                alt="<?=$arResult["PICTURE"]["ALT"]?>"
                                title="<?=$arResult["PICTURE"]["TITLE"]?>"
                        >
                    </a>
                    <figcaption class="shops_block_item_description">
                        <h3 class="shops_block_item_name"><?=$arResult["NAME"]?></h3>
                        <p class="dark_grey"><?=$arResult["PROPERTY_ADDRESS_VALUE"]?></p>
                        <p class="black"><?=$arResult["PROPERTY_PHONE_VALUE"]?></p>
                        <p>Часы работы:<br/><?=$arResult["PROPERTY_WORK_HOURS_VALUE"]?></p>
                    </figcaption>
                </figure>
            <?endforeach;?>
        </div>
    </section>
</section>
<?
$frame->end();
?>