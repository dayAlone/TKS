<?if(count($arResult['ITEMS'])>0):?>
<div class="news">
	<div class="container">
	  <div class="row">
	    <?foreach ($arResult['ITEMS'] as $item):?>
		  <div class="news__item col-xs-6">
		    <div class="news__date"><?=$item['ACTIVE_FROM']?></div>
		    <a href="<?=$item['DETAIL_PAGE_URL']?>" class="news__title"><?=$item['NAME']?></a>
		  </div>
		<?endforeach;?>
	  </div>
	</div>
</div>
<?endif;?>