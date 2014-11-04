<?
	require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php');
	$APPLICATION->SetPageProperty('page_class', "page--text");
	if(isset($_GLOBALS['BG_IMAGE']))
	{
		$normal = $_GLOBALS['BG_IMAGE']['normal'];
		$blur   = $_GLOBALS['BG_IMAGE']['blur'];
	}
?>
<div class="page__header" style="<?=(isset($normal)?'background-image:url('.$normal.')':'')?>">
	<div class="page__header-frame" style="<?=(isset($blur)?'background-image:url('.$blur.')':'')?>">
		<div class="page__header-title">
			<nobr><?=$APPLICATION->AddBufferContent("page_title");?></nobr>
		</div>
		<div class="page__header-breadcrumb">
			<?
			$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
	        	"START_FROM" => "0", 
	        	"PATH" => "", 
	        	"SITE_ID" => "s1" 
			));?>
		</div>
	</div>
</div>

<div class="container">
	<?$APPLICATION->ShowViewContent('page_top');?>
	<div class="row">
		<div class="col-xs-3 col-lg-2">
			<?
				$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sections_side", array(
				    "IBLOCK_TYPE"  => "news",
				    "IBLOCK_ID"    => "7",
				    "TOP_DEPTH"    => "1",
				    "CACHE_TYPE"   => "A",
				    "SECTION_USER_FIELDS" => array("UF_SVG", "UF_TEXT")
				),
				false
				);
			?>
		</div>
		<div class="col-xs-6 col-lg-8 page__content">
		