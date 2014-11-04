<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if(count($arResult['SECTIONS'])>0):
?>
<div class="industries-list">
    <div class="industries-list__badge">Индустрии</div>
	<?foreach ($arResult['SECTIONS'] as $key => &$item):?>
	   <div class="industries-list__item"></div>
	<?endforeach;?>
</div>
<?endif;?>