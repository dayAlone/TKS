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
			<?=$APPLICATION->AddBufferContent("page_title");?>
		</div>
		<div class="page__header-breadcrumb">
			<?
			$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
				"START_FROM"  => "0", 
				"PATH"        => "", 
				"SITE_ID"     => SITE_ID,
				"CACHE_NOTES" => SITE_ID
			));?>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
			<?
				$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "industries", array(
						"IBLOCK_TYPE"         => "news",
						"IBLOCK_ID"           => (LANGUAGE_ID=='ru'?7:13),
						"TOP_DEPTH"           => "1",
						"CACHE_TYPE"          => "A",
						"CURRENT"             => $_GLOBALS['currentCatalogSection'],
						"CACHE_NOTES"         => $_REQUEST['SECTION_CODE'].'_'.$_REQUEST['ELEMENT_CODE'],
						"SECTION_USER_FIELDS" => array("UF_SVG", "UF_TEXT")
					),
					false
				);
			?>
		</div>
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-8 page__content">
		