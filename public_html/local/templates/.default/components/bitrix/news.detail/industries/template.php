<?$this->setFrameMode(true);
$item = $arResult;
$props = &$item["PROPS"];
?>
<h2><?=$arResult['NAME']?></h2>
<?if(strlen($arResult['DETAIL_PICTURE']['SRC'])>0):?>
<img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="" class="right">
<?endif?>
<?=$arResult['~DETAIL_TEXT']?>