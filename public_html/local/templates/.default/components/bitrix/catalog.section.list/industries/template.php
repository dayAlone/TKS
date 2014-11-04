<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if(count($arResult['SECTIONS'])>0):
?>
<div class="industries-list">
    <div class="industries-list__badge">Индустрии</div>
	<?foreach ($arResult['SECTIONS'] as $key => &$item):?>
	   <div class="industries-list__item">
           <a href="<?=$item['SECTION_PAGE_URL']?>" class="industries-list__title <?=($arParams['CACHE_NOTES']==$item['ID']?"industries-list__title--active":"")?>"><?=$item['NAME']?> <span>&#9654;</span></a>
       </div>
	<?endforeach;?>
</div>
<?endif;?>