<?
$item = $arResult;
?>
<?if(isset($item['PROPS']['REGION'])):?>
	<h4><span>Регион</span></h4>
	<h2><?=$item['PROPS']['REGION']?></h2>
<?endif;?>
<?if(isset($item['PROPS']['PERIOD'])):?>
	<h4><span>Период</span></h4>
	<p><?=$item['PROPS']['PERIOD']?></p>
<?endif;?>
<h4><span>Проект</span></h4>
<p><?=$item['NAME']?></p>
<?if(isset($item['PREVIEW_TEXT'])):?>
	<small>
		<p><?=$item['~PREVIEW_TEXT']?></p>
	</small>
<?endif;?>
<div class="geography__popup_gallery">
<?foreach ($item["GALLERY"] as $img):?>
	<a href="<?=$img['value']?>" rel="prettyPhoto[]" style="background-image: url(<?=$img['small']?>)"></a>
<?endforeach;?>
</div>