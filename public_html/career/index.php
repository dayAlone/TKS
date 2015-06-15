<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Карьера');
$APPLICATION->SetPageProperty('hide_right', true);
$APPLICATION->SetPageProperty('body_class', "career");
if(!isset($_REQUEST['ELEMENT_CODE'])):
  ?>
  <h3 class="title--bold">Сегодня в нашей компании открыты следующие вакансии:</h3>
  <?
  $APPLICATION->AddChainItem('Карьера');
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
    "SET_TITLE"                 => "N",
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
    "ADD_SECTIONS_CHAIN"        => "N"
  ),
  false
);
else:
  $APPLICATION->SetPageProperty('page_title', 'Карьера');
  $APPLICATION->IncludeComponent("bitrix:news.detail","career",Array(
    "IBLOCK_ID"          => 6,
    "ELEMENT_CODE"       => $_REQUEST['ELEMENT_CODE'],
    "CHECK_DATES"        => "N",
    "IBLOCK_TYPE"        => "content",
    "SET_TITLE"          => "Y",
    "CACHE_TYPE"         => "A",
    "PROPERTY_CODE"      => array("PHOTOS", "ABOUT", "ADDITIONAL"),
    "ADD_SECTIONS_CHAIN" => "N",
    "ADD_ELEMENT_CHAIN"  => "N"
  ));
endif;
?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>