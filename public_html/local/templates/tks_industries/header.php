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
	        	"START_FROM" => "0", 
	        	"PATH" => "", 
	        	"SITE_ID" => "s1" 
			));?>
		</div>
	</div>
</div>

<div class="container">
	
	<div class="row">
		<div class="col-xs-3 col-lg-2">
			<?$APPLICATION->ShowViewContent('side_left');?>
		</div>
		<div class="col-xs-6 col-lg-8 page__content">
		