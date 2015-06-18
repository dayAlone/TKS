<?
$item = $arResult;
?>
<div class="career-item">
	<div class="career-item__tooltip"><?=GetMessage('VACANCY')?></div>
	<h1 class="career-item__title"><?=$item['NAME']?></h1>
	<div class="career-item__text">
		<?if($item["DETAIL_PICTURE"]):?>
			<img src="<?=$item["DETAIL_PICTURE"]['SRC']?>" class="pull-right  career-item__image">
		<?endif;?>
		<?=$item["~DETAIL_TEXT"]?>
	</div>
	<div class="career-item__gallery">
	<?foreach ($item["GALLERY"] as $img):?>
		<a href="<?=$img['value']?>" rel="prettyPhoto[]" class="career-item__small-image" style="background-image: url(<?=$img['small']?>)"></a>
	<?endforeach;?>
	</div>
	<a data-toggle="modal" data-target="#vacancyDetail" href="#newsDetail" class="button"><?=GetMessage('APPLY')?></a>
	<br>
	<a href="/career/" class="career-item__back"><?=svg('back')?> <?=GetMessage('BACK')?></a>
</div>
<?$this->SetViewTarget('footer');
require($_SERVER['DOCUMENT_ROOT'].'/include/vancancy-'.LANGUAGE_ID.'.php');
$this->EndViewTarget();?> 