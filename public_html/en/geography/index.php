<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Projects');
$APPLICATION->IncludeComponent(
  "bitrix:news.list", 
  "geography",
  array(
    "IBLOCK_ID"                 => 17,
    "NEWS_COUNT"                => "9999999",
    "SORT_BY1"                  => "PROPERTY_REGION",
    "SORT_ORDER1"               => "ASC",
    "DETAIL_URL"                => "/geography/#ELEMENT_CODE#/",
    "PROPERTY_CODE"             => Array("REGION", "PHOTOS", "COORDS", "PERIOD"),
    "CACHE_TYPE"                => "A",
    "SET_TITLE"                 => "N",
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
    "ADD_SECTIONS_CHAIN"        => "N",
  ),
  false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>