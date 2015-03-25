<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Наши разработки");
$APPLICATION->SetPageProperty('hide_right', true);
?>
<div class="page__content">
	<h2>Технологии, которые мы внедрили</h2>
	<?
		$APPLICATION->IncludeComponent(
		  "bitrix:news.list", 
		  "development",
		  array(
		    "IBLOCK_ID"                 => 10,
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
	<p>Совместно с компанией Sonotron NDT мы разработали систему автоматизированного ультразвукового контроля сварных стыков трубопроводов Argovision, обеспечивающую высокую достоверность и производительность контроля, а также соблюдение требований наиболее применяемых международных стандартов: API 1104, DNV-OS-F101, ASTM 1961. Система внесена в государственный реестр средств измерений РФ и в Реестр сварочного, вспомогательного оборудования, оборудования и материалов для контроля и диагностики сварных соединений, технические условия которых соответствуют техническим требованиям ОАО «Газпром».</p>
	
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>