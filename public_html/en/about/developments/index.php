<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Developments");
$APPLICATION->SetPageProperty('hide_right', true);
?><div class="page__content">
	<h2>Technology we implemented</h2>
	<?
		$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"development", 
	array(
		"IBLOCK_ID" => "12",
		"NEWS_COUNT" => "9999999",
		"SORT_BY1" => "SECTION_ID",
		"SORT_ORDER1" => "ASC",
		"DETAIL_URL" => "/",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "PHOTOS",
			2 => "",
		),
		"CACHE_TYPE" => "A",
		"PARENT_SECTION" => " ",
		"SET_TITLE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"IBLOCK_TYPE" => "-",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "m/d/Y",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_STATUS_404" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "News",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);
	?>
	<p>Among its notable accomplishments, the group designed and developed the Argovision AUT 
system for NDT of pipeline field welded joints in cooperation with specialists from Sono­tron NDT 
of Israel. The system pro­vides high accuracy and productivity NDT, as well as full compliance 
with such major inter­national standards as API 1104, DNV-OS-F101, ASTM 1961. The system is 
registered with Rus­sian State Registry of Measuring Systems, as well as approved and listed in 
the Gazprom Registry of Welding Equipment, Welding Ac­cessories, NDT and Diagnostics Equipment and 
Consumables.</p>
	
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>