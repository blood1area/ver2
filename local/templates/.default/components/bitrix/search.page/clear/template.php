<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
?>
<div class="search-page">
	<form action="" method="get">
		<input type="hidden" name="tags" value="<?echo $arResult["REQUEST"]["TAGS"]?>" />
		<input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tbody>
                <tr>
                    <td style="width: 100%;">

                        <?if($arParams["USE_SUGGEST"] === "Y"):
                            if(strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"]))
                            {
                                $arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
                                $obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
                                $obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
                            }
                            ?>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:search.suggest.input",
                                "",
                                array(
                                    "NAME" => "q",
                                    "VALUE" => $arResult["REQUEST"]["~QUERY"],
                                    "INPUT_SIZE" => -1,
                                    "DROPDOWN_SIZE" => 10,
                                    "FILTER_MD5" => $arResult["FILTER_MD5"],
                                ),
                                $component, array("HIDE_ICONS" => "Y")
                            );?>
                        <?else:?>
                            <input class="search-query" type="text" name="q" placeholder="<?echo GetMessage('PLACEHOLDER_QUERY')?>" value="<?=$arResult["REQUEST"]["QUERY"]?>" />
                        <?endif;?>

                    </td>
                    <td>
                        <select id="search_params"  class="select-field" name="where">
                            <option value=""><?=GetMessage("CT_BSP_ALL")?></option>
                            <?foreach($arResult["DROPDOWN"] as $key=>$value):?>
                                <option value="<?=$key?>"<?if($arResult["REQUEST"]["WHERE"]==$key) echo " selected"?>><?=$value?></option>
                            <?endforeach?>
                        </select>
                    </td>
                    <td>
                        <input class="search-button" type="submit" value="<?echo GetMessage("CT_BSP_GO")?>" />
                    </td>
                </tr>
            </tbody>
        </table>
	</form>

<!--Клава-->
<?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
	?>
	<div class="search-language-guess">
		<?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
	</div><br /><?
endif;?>

	<div class="search-result">
<!--Показ информации при возникновении ошибки в поисковом запросе или пустом запросе-->
	<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):
	elseif ($arResult["ERROR_CODE"]!=0):?>
		<p><?=GetMessage("CT_BSP_ERROR")?></p>
		<?ShowError($arResult["ERROR_TEXT"]);?>
		<p><?=GetMessage("CT_BSP_CORRECT_AND_CONTINUE")?></p>
		<br /><br />
		<p><?=GetMessage("CT_BSP_SINTAX")?><br /><b><?=GetMessage("CT_BSP_LOGIC")?></b></p>
		<table border="0" cellpadding="5">
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_OPERATOR")?></td><td valign="top"><?=GetMessage("CT_BSP_SYNONIM")?></td>
				<td><?=GetMessage("CT_BSP_DESCRIPTION")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_AND")?></td><td valign="top">and, &amp;, +</td>
				<td><?=GetMessage("CT_BSP_AND_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_OR")?></td><td valign="top">or, |</td>
				<td><?=GetMessage("CT_BSP_OR_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_NOT")?></td><td valign="top">not, ~</td>
				<td><?=GetMessage("CT_BSP_NOT_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top">( )</td>
				<td valign="top">&nbsp;</td>
				<td><?=GetMessage("CT_BSP_BRACKETS_ALT")?></td>
			</tr>
		</table>

<!--Если результат поиска положительный -->
	<?elseif(count($arResult["SEARCH"])>0):?>

<!--	Постраничная навигация-->
		<?if($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"]?>

		<?foreach($arResult["SEARCH"] as $arItem):?>
			<div class="search-item">
				<h4><a href="<?echo $arItem["URL"]?>"><?echo $arItem["TITLE_FORMATED"]?></a></h4>
				<div class="search-preview"><?echo $arItem["BODY_FORMATED"]?></div>
				<?if(
					($arParams["SHOW_ITEM_DATE_CHANGE"] != "N")
					|| ($arParams["SHOW_ITEM_PATH"] == "Y" && $arItem["CHAIN_PATH"])
					|| ($arParams["SHOW_ITEM_TAGS"] != "N" && !empty($arItem["TAGS"]))
				):?>
				<div class="search-item-meta">
					<?if($arParams["SHOW_ITEM_TAGS"] != "N" && !empty($arItem["TAGS"])):?>
						<div class="search-item-tags"><label><?echo GetMessage("CT_BSP_ITEM_TAGS")?>: </label><?
						foreach ($arItem["TAGS"] as $tags):
							?><a href="<?=$tags["URL"]?>"><?=$tags["TAG_NAME"]?></a> <?
						endforeach;
						?></div>
					<?endif;?>

					<?if($arParams["SHOW_ITEM_DATE_CHANGE"] != "N"):?>
						<div class="search-item-date"><label><?echo GetMessage("CT_BSP_DATE_CHANGE")?>: </label><span><?echo $arItem["DATE_CHANGE"]?></span></div>
					<?endif;?>
				</div>
				<?endif?>
			</div>
		<?endforeach;?>

<!--	Постраничная навигация-->
		<?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>

<!--	Строка "сортировать по "-->
		<?if($arParams["SHOW_ORDER_BY"] != "N"):?>
		    <div class="search-sorting">
                <? if ($arResult["REQUEST"]["HOW"]=="d") : ?>
                    <a href="<?=$arResult["URL"]?>&amp;how=r">
                        <?=GetMessage("CT_BSP_ORDER").' '.GetMessage("CT_BSP_ORDER_BY_RANK")?>
                    </a>&nbsp;|&nbsp;
                    <b>
                        <?=GetMessage("CT_BSP_ORDERED").' '.GetMessage("CT_BSP_ORDER_BY_DATE")?>
                    </b>
                <? else : ?>
                    <b>
                        <?=GetMessage("CT_BSP_ORDERED").' '.GetMessage("CT_BSP_ORDER_BY_RANK")?>
                    </b>&nbsp;|&nbsp;
                    <a href="<?=$arResult["URL"]?>&amp;how=d">
                        <?=GetMessage("CT_BSP_ORDER").' '.GetMessage("CT_BSP_ORDER_BY_DATE")?>
                    </a>
                <? endif; ?>
            </div>
		<?endif;?>
<!--    Конец строки "сортировать по "-->

<!--Если поиск не дал результатов-->
	<?else:?>
		<?ShowNote(GetMessage("CT_BSP_NOTHING_TO_FOUND"));?>
	<?endif;?>

	</div>
</div>