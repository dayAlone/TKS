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
			<?php
              $APPLICATION->IncludeComponent("bitrix:menu", "side", 
              array(
                  "ALLOW_MULTI_SELECT" => "Y",
                  "MENU_CACHE_TYPE"    => "A",
                  "ROOT_MENU_TYPE"     => "left",
                  "MAX_LEVEL"          => "2",
                  ),
              false);
              ?>
			<?
				$APPLICATION->IncludeComponent(
				  "bitrix:news.list", 
				  "features",
				  array(
				    "IBLOCK_ID"                 => 8,
				    "NEWS_COUNT"                => "9999999",
				    "SORT_BY1"                  => "SORT",
				    "SORT_ORDER1"               => "ASC",
				    "DETAIL_URL"                => "/",
				    "PROPERTY_CODE"             => Array("SVG"),
				    "CACHE_TYPE"                => "A",
				    "SET_TITLE"                 => "N",
				    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				    "ADD_SECTIONS_CHAIN"        => "N",
				  ),
				  false
				);
			?>
		</div>
		<div class="col-xs-6 col-lg-8 page__content">
		