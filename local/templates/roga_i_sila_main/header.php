<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

use Bitrix\Main\Page\Asset;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>
﻿<!DOCTYPE html>
<!--[if IE 7]>    <html class="ie7"> <![endif]-->
<!--[if IE 8]>    <html class="ie8> <![endif]-->
<!--[if IE 9]>    <html class="ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
	<head>
		<title><?$APPLICATION->ShowTitle();?></title>
        <?
        $APPLICATION->ShowHead();

        Asset::getInstance()->addString('<link href="' . SITE_TEMPLATE_PATH_DEFAULT.'/favicon.ico" rel="shortcut icon" type="image/x-icon" />');

        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH_DEFAULT . "/css/base.css");

        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH_DEFAULT . "/js/bxslider/jquery.bxslider.css");

        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH_DEFAULT . "/js/jquery-1.9.1.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH_DEFAULT . "/js/jquery.placeholder.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH_DEFAULT . "/js/bxslider/jquery.bxslider.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH_DEFAULT . "/js/default_script.js");

        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH_DEFAULT . "/js/jquery.ui.selectmenu/jquery.ui.core.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH_DEFAULT . "/js/jquery.ui.selectmenu/jquery.ui.theme.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH_DEFAULT . "/js/jquery.ui.selectmenu/jquery.ui.selectmenu.css");

        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH_DEFAULT . "/js/jquery.ui.selectmenu/jquery.ui.core.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH_DEFAULT . "/js/jquery.ui.selectmenu/jquery.ui.widget.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH_DEFAULT . "/js/jquery.ui.selectmenu/jquery.ui.position.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH_DEFAULT . "/js/jquery.ui.selectmenu/jquery.ui.selectmenu.js");
        ?>

		<!--[if lt IE 9]>
            <script src="<?echo CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH_DEFAULT . '/js/html5shiv.js');?>"></script>
		<![endif]-->
	</head>
	<body>
		<?$APPLICATION->ShowPanel();?>
		<div class="wrapper">
			<div class="base_layer"></div>
			<header class="header">
				<div class="width_960">
					<div class="inline-block">
						<span class="logo inline-block"></span>
					</div>
                    <?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form", 
	"auth_form_header", 
	array(
		"FORGOT_PASSWORD_URL" => "",
		"PROFILE_URL" => "/personal/",
		"REGISTER_URL" => "/auth/",
		"SHOW_ERRORS" => "Y",
		"AUTH_CUSTOM_URL" => "/auth/",
		"COMPONENT_TEMPLATE" => "auth_form_header"
	),
	false
);?>
					<div class="basket_block inline-block">
						<a href="#" class="basket_product_count inline-block">0</a>
						<a href="#" class="order_button pie">Оформить заказ</a>
					</div>
				</div>
			</header>
			<section class="fixed_block">
				<div class="width_960">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:search.form",
                        "search_form_header",
                        array(
                            "COMPONENT_TEMPLATE" => "search_form_header",
                            "PAGE" => "/search/",
                            "USE_SUGGEST" => "N"
                        )
                    );?>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "catalog_top",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "subTop",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "2",
                            "MENU_CACHE_GET_VARS" => array(),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "top",
                            "USE_EXT" => "Y"
                        )
                    );?>
				</div>
			</section>
            <section class="content">
                <div class="work_area width_960">
