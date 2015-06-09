<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->IncludeComponent("bitrix:news.detail","geography",Array(
	"IBLOCK_ID"     => "17",
	"ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
	"CHECK_DATES"   => "N",
	"IBLOCK_TYPE"   => "content",
	"SET_TITLE"     => "N",
	"PROPERTY_CODE" => Array("REGION", "PHOTOS", "COORDS", "PERIOD"),
	"CACHE_TYPE"    => "A",
));
?>