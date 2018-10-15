<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arElement */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Localization\Loc;
$this->setFrameMode(true);
$crossOver = false?>
<?
$this->AddEditAction(
    "addElement",
    $arResult['ADD_LINK'],
    CIBlock::GetArrayByID(
        $arParams["IBLOCK_ID"],
        "ELEMENT_ADD"
    ),
    Array(
        "ICON" => "bx-context-toolbar-create-icon",
    )
);
?>
<div id="<?echo $this->GetEditAreaId('addElement');?>">
    <?foreach($arResult["STORES"] as $arElement):
        if (($crossOver = !$crossOver)):?>
            <section class="shops_block"><div>
        <?endif;?>

        <?
        $this->AddEditAction(
            $arElement['ID'],
            $arElement['EDIT_LINK'],
            CIBlock::GetArrayByID(
                $arElement["IBLOCK_ID"],
                "ELEMENT_EDIT"
            )
        )	;
        $this->AddDeleteAction(
            $arElement['ID'],
            $arElement['DELETE_LINK'],
            CIBlock::GetArrayByID(
                $arElement["IBLOCK_ID"],
                "ELEMENT_DELETE"
            ),
            array("CONFIRM" => Loc::GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))
        );
        ?>

        <figure id="<?=$this->GetEditAreaId($arElement['ID']);?>" class="shops_block_item">
            <img
                src="<?=$arElement["PREVIEW_PICTURE"]['SRC']?>"
                width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>"
                height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>"
                alt="<?=$arElement["PREVIEW_PICTURE"]["ALT"]?>"
                title="<?=$arElement["PREVIEW_PICTURE"]["TITLE"]?>"
            >
            <figcaption class="shops_block_item_description">
                <h3 class="shops_block_item_name"><?=$arElement["NAME"]?></h3>
                <?if (!empty($arElement["PROPERTY_ADDRESS_VALUE"])):?>
                    <p class="dark_grey"><?=$arElement["PROPERTY_ADDRESS_VALUE"]?></p>
                <?endif;if (!empty($arElement["PROPERTY_PHONE_VALUE"])):?>
                    <p class="black"><?=$arElement["PROPERTY_PHONE_VALUE"]?></p>
                <?endif;if (!empty($arElement["PROPERTY_WORK_HOURS_VALUE"])):?>
                    <p><?=Loc::getMessage('WORK_HOURS')?><br/><?=$arElement["PROPERTY_WORK_HOURS_VALUE"]?></p>
                <?endif;?>
            </figcaption>
        </figure>

        <?if (!$crossOver):?>
                </div></section>
        <?endif;?>
    <?endforeach;?>
    <?if ($crossOver):?>
        </div></section>
    <?endif;?>
<div class="clear" style="padding-bottom: 30px;"></div>
</div>