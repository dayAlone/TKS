<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Поиск по сайту');
$APPLICATION->SetPageProperty('hide_right', true);
$APPLICATION->SetPageProperty('body_class', "career");
if(!isset($_REQUEST['ELEMENT_CODE'])):
  ?>
  <h3 class="title--bold">Сегодня в нашей компании открыты следующие вакансии:</h3>
  <?
  $APPLICATION->SetTitle('Карьера');
  $APPLICATION->IncludeComponent(
  "bitrix:news.list", 
  "career",
  array(
    "IBLOCK_ID"   => 6,
    "NEWS_COUNT"  => "10",
    "SORT_BY1"    => "SORT",
    "SORT_ORDER1" => "ASC",
    "DETAIL_URL"  => "/career/#ELEMENT_CODE#/",
    "CACHE_TYPE"  => "A",
    "SET_TITLE"   => "N"
  ),
  false
);
else:
  $APPLICATION->IncludeComponent("bitrix:news.detail","career",Array(
    "IBLOCK_ID"     => 6,
    "ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
    "CHECK_DATES"   => "N",
    "IBLOCK_TYPE"   => "content",
    "SET_TITLE"     => "Y",
    "CACHE_TYPE"    => "A",
    "PROPERTY_CODE" => array("PHOTOS", "ABOUT", "ADDITIONAL"),
  ));
endif;
?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>