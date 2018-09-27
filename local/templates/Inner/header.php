<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
		die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE>
<!--[if IE 7]>    <html class="ie7"> <![endif]-->
<!--[if IE 8]>    <html class="ie8> <![endif]-->
<!--[if IE 9]>    <html class="ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
	<head>
		<link rel="stylesheet" type="text/css" 	href="/local/templates/.default/css/base.css"/>
		<?$APPLICATION->ShowHead()?>
		<title><?$APPLICATION->ShowTitle()?></title>
		<link href="/local/templates/.default/favicon.ico" rel="shortcut icon" type="image/x-icon" />

		<link rel="stylesheet" 				href="/local/templates/.default/js/bxslider/jquery.bxslider.css"/>
		
		<script type="text/javascript" 	src="/local/templates/.default/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" 	src="/local/templates/.default/js/jquery.placeholder.js"></script>
		<script type="text/javascript" 	src="/local/templates/.default/js/bxslider/jquery.bxslider.js"></script>
		<script type="text/javascript" 	src="/local/templates/.default/js/default_script.js"></script>

		<link type="text/css" 			href="/local/templates/.default/js/jquery.ui.selectmenu/jquery.ui.core.css" rel="stylesheet" />
		<link type="text/css" 			href="/local/templates/.default/js/jquery.ui.selectmenu/jquery.ui.theme.css" rel="stylesheet" />
		<link type="text/css" href="/local/templates/.default/js/jquery.ui.selectmenu/jquery.ui.selectmenu.css" rel="stylesheet" />
		
		<script type="text/javascript" src="/local/templates/.default/js/jquery.ui.selectmenu/jquery.ui.core.js"></script>
		<script type="text/javascript" src="/local/templates/.default/js/jquery.ui.selectmenu/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="/local/templates/.default/js/jquery.ui.selectmenu/jquery.ui.position.js"></script>
		<script type="text/javascript" src="/local/templates/.default/js/jquery.ui.selectmenu/jquery.ui.selectmenu.js"></script>
		<!--[if lt IE 9]>
			<script src="/local/templates/.default/js/html5shiv.js"></script>
		<![endif]-->
	</head>
	<body>
		<div id="panel"><?$APPLICATION->ShowPanel();?></div>
		<div class="wrapper">
			<div class="base_layer"></div>
			<header class="header">
				<div class="width_960">
					<div class="inline-block">
						<a href="/" class="logo inline-block"></a>
					</div>
					<nav class="top_menu grey inline-block authorize">
						<span>Здравствуйте,</span>
						<a href="#"><b class="user_name">Иван Владимирович</b></a>
						<a href="#">Личный кабинет</a>
						<a class="logout" href="#">Выйти</a>
					</nav>
					<div class="basket_block inline-block">
						<a href="#" class="basket_product_count inline-block">0</a>
						<a href="#" class="order_button pie">Оформить заказ</a>
					</div>
				</div>
			</header>
			<section class="fixed_block">
				<div class="width_960">
					<form name="search_form" class="search_form pie">
							<div class="search_form_wrapper">
								<input type="text" placeholder="Поиск по сайту"/>
								<input type="submit" value=""/>
							</div>
					</form>
					<nav class="main_menu">
						<ul>
							<li class="submenu pie">
								<span>Легковые</span>
								<div class="submenu_border"></div>
								<ul>
									<li><a href="#">Седаны</a></li>
									<li><a href="#">Хетчбеки</a></li>
									<li><a href="#">Универсалы</a></li>
									<li><a href="#">Купе</a></li>
									<li><a href="#">Родстеры</a></li>
								</ul>
							</li>
							<li class="submenu pie">
								<span>Внедорожники</span>
								<div class="submenu_border"></div>
								<ul>
									<li><a href="#">Рамные</a></li>
									<li><a href="#">Пикапы</a></li>
									<li><a href="#">Кроссоверы</a></li>
								</ul>
							</li>
							<li><a href="#">Раритетные</a></li>
							<li><a href="#">Распродажа</a></li>
							<li><a href="#">Новинки</a></li>
					</ul>
					</nav>
				</div>
			</section>
			<section class="content">
				<div class="work_area width_960">
					<nav class="nav_chain">
							<a href="/">Главная</a>
							<span class="nav_arrow inline-block"></span>
							<span>Легковые</span>
					</nav>
					<section class="content_area">
						<aside class="left_block">
						<nav>
							<ul class="left_menu">
								<li>
									<span>Информация</span>
									<ul>
										<li><a href="#">О компнаии</a></li>
										<li><a href="#">Контактная информация</a></li>
										<li><a href="#">Условия продаж</a></li>
										<li><a href="#">Финансовый отдел</a></li>
										<li><a href="#">Для клиентов</a></li>
									</ul>
								</li>
							</ul>
						</nav>
						</aside>
						<h1>Заголовок данной страницы</h1>
						
					
