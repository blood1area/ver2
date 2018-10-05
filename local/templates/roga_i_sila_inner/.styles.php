<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);

return array (
    "error" => array(
        "tag" => 'span',
        "title" => GetMessage("ERROR_TITLE"),
        "html" => '<span class="error"><?GetMessage("ERROR_TITLE")?></span>'
    ),

    "news_item_date grey" => array(
        "tag" => 'p',
        "title" => GetMessage("DATE_TITLE"),
        "html" => '<p class="news_item_date"><?GetMessage("DATE_TITLE")?></span>'
    )
);