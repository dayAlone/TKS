<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Контакты');
$APPLICATION->SetPageProperty('body_class', "contacts");?>
<div class="page__content">
	<h2>Головной офис</h2>
	<div class="row">
	  <div class="col-sm-8">
	    <big><strong>Адрес: </strong>Россия, Москва, <nobr>ул. Усачева, 35А</nobr> <br><strong>Телефон: </strong><a href="tel:88005553136 ">8 800 555 31 36</a><br><a href="tel:84956265494" style="margin-left:93px;">8 495 626 54 94</a><br><strong>E-mail: </strong><a href="mailto:info@tkc-group.ru">info@tkc-group.ru</a></big><br>
	  </div>
	  <div class="col-sm-4">
	    <div class="xs-left m-margin-top m-margin-top-xs no-margin-top-sm md-right"><a data-toggle="modal" data-target="#Feedback" href="#Feedback" class="no-margin-top button button--big">напишите нам</a></div>
	  </div>
	</div>
</div>
<div id="map" data-coords="55.723171,37.559856" class="xl-margin-top l-margin-bottom"></div>
<script src="http://api-maps.yandex.ru/2.1/?lang=ru-RU&amp;load=package.full" type="text/javascript"></script>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>