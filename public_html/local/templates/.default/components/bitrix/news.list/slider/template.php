<div class="slider" data-nav="dots" data-click="false" data-width="100%" data-height="100%" data-nav="false" data-autoplay="false" data-transition="crossfade" data-loop="true">
	<?foreach ($arResult['ITEMS'] as $item):?>
		<div style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="slider__item slider__item--<?=$item['PROPERTIES']['POSITION']['VALUE_XML_ID']?>">
		  <a href="<?=$item['PROPERTIES']['LINK']['VALUE']?>" class="slider__frame" style="background-image: url(<?=$item['DETAIL_PICTURE']['SRC']?>)">
		  	<span class="slider__badge">промышленный холдинг ткс</span>
		    <h1 class="slider__title"><?=$item['NAME']?></h1>
		    <div class="slider__content">
		      <p><?=$item['PREVIEW_TEXT']?></p>
		    </div>
		  </a>
		</div>
	<?endforeach;?>
</div>