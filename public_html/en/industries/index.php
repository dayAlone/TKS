<?
include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(!isset($_REQUEST['SECTION_CODE'])) {
	$APPLICATION->SetPageProperty('section', array('IBLOCK'=>13, 'NOEMPTY'=>true));
	require($_SERVER['DOCUMENT_ROOT'].'/include/section.php');
}
include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
$APPLICATION->SetTitle('Industries');
if(!isset($_REQUEST['ELEMENT_CODE']))
{
	
	$APPLICATION->IncludeComponent(
	  "bitrix:news.list", 
	  "industries",
	  array(
	    "IBLOCK_ID"                 => 13,
	    "NEWS_COUNT"                => "9999999",
	    "SORT_BY1"                  => "SORT",
	    "SORT_ORDER1"               => "ASC",
	    "DETAIL_URL"                => "/industries/#SECTION_CODE#/#ELEMENT_CODE#/",
	    "PROPERTY_CODE"             => Array("SVG", "DESCRIPTION"),
	    "CACHE_TYPE"                => "A",
	    "PARENT_SECTION"            => $_GLOBALS['currentCatalogSection'],
	    "PARENT_SECTION_CODE"       => $_REQUEST['SECTION_CODE'],
	    "SET_TITLE"                 => "N",
	    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	    "ADD_SECTIONS_CHAIN"        => "N",
	    'SET_FULL_TITLE'            => "Y"
	  ),
	  false
	);
}
else {
	$APPLICATION->IncludeComponent("bitrix:news.detail","industries",Array(
	"IBLOCK_ID"                 => 13,
	"ELEMENT_CODE"              => $_REQUEST['ELEMENT_CODE'],
	"CHECK_DATES"               => "N",
	"IBLOCK_TYPE"               => "content_en",
	"SET_TITLE"                 => "N",
	"CACHE_TYPE"                => "A",
	"PROPERTY_CODE"             => array("PHOTOS", "ABOUT", "ADDITIONAL"),
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN"        => "N",
	"ADD_ELEMENT_CHAIN"         => "N"
  ));
}
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>