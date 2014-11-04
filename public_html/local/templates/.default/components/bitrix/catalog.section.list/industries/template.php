<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if(count($arResult['SECTIONS'])>0):

	$parent = false;
	if(intval($arParams['CACHE_NOTES'])>0)
		$parent = $arParams['CACHE_NOTES'];
	else
		$parent = $_REQUEST['SECTION_CODE'];
?>
<div class="industries-list">
    <div class="industries-list__badge">Индустрии</div>
	<?foreach ($arResult['SECTIONS'] as $key => &$item):?>
	   <div class="industries-list__item">
           <a href="<?=$item['SECTION_PAGE_URL']?>" class="industries-list__title <?=($parent==$item['ID'] || $parent==$item['CODE']?"industries-list__title--active":"")?>"><?=$item['NAME']?> <span>&#9654;</span></a>
			<?
			if($parent==$item['ID'] || $parent==$item['CODE']):
	           $APPLICATION->IncludeComponent(
				  "bitrix:news.list", 
				  "industries",
				  array(
				    "IBLOCK_ID"                 => 7,
				    "NEWS_COUNT"                => "9999999",
				    "SORT_BY1"                  => "SORT",
				    "SORT_ORDER1"               => "ASC",
				    "DETAIL_URL"                => "/industries/#SECTION_CODE#/#ELEMENT_CODE#/",
				    "PROPERTY_CODE"             => Array("SVG", "DESCRIPTION"),
				    "CACHE_TYPE"                => "A",
				    "PARENT_SECTION"            => $item['ID'],
				    "SET_TITLE"                 => "N",
				    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				    "ADD_SECTIONS_CHAIN"        => "N",
				  ),
				  false
				);
	      	endif;?>
       </div>
	<?endforeach;?>
</div>
<?endif;?>