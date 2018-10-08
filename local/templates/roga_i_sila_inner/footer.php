<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
					</section>
					<hr class="bottom_line"/>
				</div>
			</section>
			<div class="d_footer width_960"></div>
			<div class="clear"></div>
		</div>
		<footer class="footer width_960">
			<section class="float_inner">
                <?$APPLICATION->IncludeComponent(
                    "qsoft:stores.list",
                    "stores_short",
                    Array(
                        "AMOUNT_ELEMENTS" => "2",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "3600",
                        "CACHE_TYPE" => "A",
                        "COMPONENT_TEMPLATE" => "stores_short",
                        "DETAIL_URL" => "/company/stores/",
                        "IBLOCKS" => "13",
                        "IBLOCK_ID" => "13",
                        "IBLOCK_TYPE" => "stores",
                        "PARENT_SECTION" => "",
                        "SHOW_MAP" => "N",
                        "SORT_PROP" => "RAND",
                        "SORT_TYPE" => "DESC"
                    )
                );?>
				<section class="info_block left_block_shadow">
					<h2>Информация</h2>
					<nav class="grey">
						<ul>
							<li><a href="#">О компании</a></li>
							<li><a href="#">Контактная информация</a></li>
							<li><a href="#">Условия продаж</a></li>
							<li><a href="#">Финансовый отдел</a></li>
							<li><a href="#">Для клиентов</a></li>
						</ul>
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
