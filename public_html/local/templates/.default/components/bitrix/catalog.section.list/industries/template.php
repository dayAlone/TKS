<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if(count($arResult['SECTIONS'])>0):
?>
<div class="industries-list">
    <div class="industries-list__badge hidden-xs"><?=GetMessage('IND')?></div>
    <a href="#" class="industries-list__badge industries-list__trigger visible-xs">
    	<span class="on"><?=GetMessage('SHOW')?></span><span class="off hidden"><?=GetMessage('HIDE')?></span> <?=GetMessage('ALL')?>
    </a>
    <div class="industries-list__frame hidden-xs">
	<?foreach ($arResult['SECTIONS'] as $key => &$item):?>
	   <div class="industries-list__item">
           <a href="<?=$item['SECTION_PAGE_URL']?>" class="industries-list__title <?=($_REQUEST['SECTION_CODE']==$item['CODE'] || $arParams['CURRENT'] == $item['ID']?"industries-list__title--active":"")?>">
           	<span class="industries-list__text"><?=$item['NAME']?></span> <span class="industries-list__arrow">&#9654;</span>
           	</a>
			<?
			if($_REQUEST['SECTION_CODE']==$item['CODE'] || $arParams['CURRENT'] == $item['ID']):
	           $APPLICATION->IncludeComponent(
				  "bitrix:news.list", 
				  "industries",
				  array(
				    "IBLOCK_ID"                 => (LANGUAGE_ID=="ru"?7:13),
				    "NEWS_COUNT"                => "9999999",
				    "SORT_BY1"                  => "SORT",
				    "SORT_ORDER1"               => "ASC",
				    "DETAIL_URL"                => "/industries/#SECTION_CODE#/#ELEMENT_CODE#/",
				    "PROPERTY_CODE"             => Array("SVG", "DESCRIPTION"),
				    "CACHE_TYPE"                => "N",
				    "PARENT_SECTION_CODE"       => $item['CODE'],
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
</div>
<?endif;?>