<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


$APPLICATION->SetTitle("Авторизация");
?><p>
	 Вы зарегистрированы и успешно авторизовались.
</p>
<p>
	 Используйте административную панель в верхней части экрана для быстрого доступа к функциям управления структурой и информационным наполнением сайта. Набор кнопок верхней панели отличается для различных разделов сайта. Так отдельные наборы действий предусмотрены для управления статическим содержимым страниц, динамическими публикациями (новостями, каталогом, фотогалереей) и т.п.
</p>
<p>
 <a href="<?=SITE_DIR?>">Вернуться на главную страницу</a>
</p>
<p>
 <br>
</p>
<p>
</p>
<p>
	<br>
</p>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>