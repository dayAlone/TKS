<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Промышленный холдинг ТКС');
$APPLICATION->SetPageProperty('body_class', "index");
$APPLICATION->IncludeComponent(
  "bitrix:news.list", 
  "slider",
  array(
    "IBLOCK_ID"     => 3,
    "NEWS_COUNT"    => "9999999",
    "SORT_BY1"      => "SORT",
    "SORT_ORDER1"   => "ASC",
    "DETAIL_URL"    => "/",
    "PROPERTY_CODE" => Array("LINK", "LINK_TEXT"),
    "FIELD_CODE" => Array("DETAIL_PICTURE"),
    "CACHE_TYPE"    => "A",
    "SET_TITLE"     => "N",
  ),
  false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>