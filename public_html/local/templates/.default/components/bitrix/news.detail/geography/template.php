<div class="scroll">
<?
$item = $arResult;
?>
<?if(isset($item['PROPS']['REGION'])):?>
	<h4><span><?=GetMessage('REGION')?></span></h4>
	<h2><?=$item['PROPS']['REGION']?></h2>
<?endif;?>
<?if(isset($item['PROPS']['PERIOD'])):?>
	<h4><span><?=GetMessage('PERIOD')?></span></h4>
	<p><?=$item['PROPS']['PERIOD']?></p>
<?endif;?>
<h4><span><?=GetMessage('PROJECT')?></span></h4>
<p><?=$item['NAME']?></p>
<?if(isset($item['PREVIEW_TEXT'])):?>
	<small>
		<p><?=$item['~PREVIEW_TEXT']?></p>
	</small>
<?endif;?>
<?if(count($item["PROPS"]["PHOTOS"])>0):?>
	<div class="geography__popup_gallery">
	<?foreach ($item["PROPS"]["PHOTOS"] as $img):?>
		<a href="<?=$img['value']?>" rel="prettyPhoto[]" style="background-image: url(<?=$img['small']?>)"></a>
	<?endforeach;?>
	</div>
<?endif;?>
</div>