<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
                </div>
            </section>
            <div class="d_footer width_960"></div>
            <div class="clear"></div>
        </div>
		<footer class="footer width_960">
            <section class="float_inner bottom_block">
                <?$APPLICATION->IncludeComponent(
                    "qsoft:stores.list",
                    "stores_short",
                    Array(
                        "ALL_SALONS_URL" => "/company/stores/",
                        "AMOUNT_ELEMENTS" => "2",
                        "CACHE_TIME" => "3600",
                        "CACHE_TYPE" => "A",
                        "IBLOCK_ID" => "13",
                        "IBLOCK_TYPE" => "stores",
                        "SHOW_MAP" => "N",
                        "SORT_PROP" => "RAND",
                        "SORT_TYPE" => "DESC"
                    )
                );?>
                <section class="info_block left_block_shadow">
                    <h2><?=Bitrix\Main\Localization\Loc::getMessage('MENU_TITLE')?></h2>
                    <nav class="grey">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "menu_footer",
                            Array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "1",
                                "MENU_CACHE_GET_VARS" => array(""),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "bottom",
                                "USE_EXT" => "N"
                            )
                        );?>
                    </nav>
                </section>
			</section>
			<div class="footer_inner">
				<a href="http://www.qsoft.ru" target="_blank" class="qsoft grey inline-block">Сделано в</a>
				<div class="copy">&copy; 2013 Рога &amp; Сила. Продажа автомобилей.</div>
			</div>
		</footer>
	</body>
</html>
