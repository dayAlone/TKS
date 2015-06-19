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
				"START_FROM"  => "0", 
				"PATH"        => "", 
				"SITE_ID"     => SITE_ID,
				"CACHE_NOTES" => SITE_ID
			));?>
		</div>
	</div>
</div>

<div class="container">
	<?$APPLICATION->ShowViewContent('page_top');?>
	<div class="visible-xs">
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
	</div>
	<div class="row">
		<div class="<?=$APPLICATION->AddBufferContent("content_class");?> page__content">
		