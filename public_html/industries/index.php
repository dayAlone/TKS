<?
include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetPageProperty('section', array('IBLOCK'=>7, 'CODE'=>'industries', 'NOEMPTY'=> true));
require($_SERVER['DOCUMENT_ROOT'].'/include/section.php');
include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
$APPLICATION->SetTitle('Индустрии');
if(intval($_GLOBALS['currentCatalogSection'])>0)
{
	$APPLICATION->IncludeComponent(
	  "bitrix:news.list", 
	  "industries",
	  array(
	    "IBLOCK_ID"                 => 7,
	    "NEWS_COUNT"                => "9999999",
	    "SORT_BY1"                  => "SORT",
	    "SORT_ORDER1"               => "ASC",
	    "DETAIL_URL"                => "/",
	    "PROPERTY_CODE"             => Array("SVG", "DESCRIPTION"),
	    "CACHE_TYPE"                => "A",
	    "PARENT_SECTION"            => $_GLOBALS['currentCatalogSection'],
	    "SET_TITLE"                 => "N",
	    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	    "ADD_SECTIONS_CHAIN"        => "Y",
	  ),
	  false
	);
}
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>