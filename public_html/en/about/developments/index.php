<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Developments");
$APPLICATION->SetPageProperty('hide_right', true);
?><div class="page__content">
	<h2>Технологии, которые мы внедрили</h2>
	<?
		$APPLICATION->IncludeComponent(
		  "bitrix:news.list", 
		  "development",
		  array(
		    "IBLOCK_ID"                 => 12,
		    "NEWS_COUNT"                => "9999999",
		    "SORT_BY1"                  => "SECTION_ID",
		    "SORT_ORDER1"               => "ASC",
		    "DETAIL_URL"                => "/",
		    "PROPERTY_CODE"             => Array("PHOTOS"),
		    "CACHE_TYPE"                => "A",
		    "PARENT_SECTION"            => " ",
		    "SET_TITLE"                 => "N",
		    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		    "ADD_SECTIONS_CHAIN"        => "N",
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