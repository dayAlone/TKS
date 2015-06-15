<?
$item = $arResult;
$s = end($arResult['SECTION']['PATH']);
?>
<div class="news-item">
	<span class="news-item__frame">
	    <span class="news-item__date"><?=(LANGUAGE_ID=='ru'?r_date($item['ACTIVE_FROM']):date('d.m.Y', $item['ACTIVE_FROM'])?></span>
	    <span class="news-item__section"><?=$s['NAME']?></span>
	</span>
	<div class="news-item__divider"></div>
	<h1 class="news-item__title"><?=$item['NAME']?></h1>
	<div class="news-item__text">
		<?if($item["DETAIL_PICTURE"]):?>
			<img src="<?=$item["DETAIL_PICTURE"]['SRC']?>" class="pull-right news-item__image">
		<?endif;?>
		<?=$item["~DETAIL_TEXT"]?>
	</div>
	<div class="news-item__gallery" data-images='<?=json_encode($item["PROPS"]["GALLERY"])?>'>
	<?foreach ($item["PROPS"]["GALLERY"] as $img):?>
		<a href="#" class="news-item__small-image" style="background-image: url(<?=$img['small']?>)"></a>
	<?endforeach;?>
	</div>
	<a href="/press/" class="news-item__back"><?=svg('back')?> <?=GetMessage('BACK')?></a>
</div>