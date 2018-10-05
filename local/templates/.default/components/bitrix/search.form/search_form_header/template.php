<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);?>
<form name="search_form" class="search_form pie" action="<?=$arResult["FORM_ACTION"]?>">
    <div class="search_form_wrapper">
        <input name="q" type="text" placeholder="<?=GetMessage("DEFAULT_TEXT")?>"/>
        <input name="s" type="submit" value=""/>
    </div>
</form>
