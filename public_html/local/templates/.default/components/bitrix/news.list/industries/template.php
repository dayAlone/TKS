<?foreach ($arResult['ITEMS'] as $item):?>
	<ul>
		<li><a href="<?=$item['DETAIL_PAGE_URL']?>" class="news-list__title"><?=$item['NAME']?></a></li>
	</ul>
<?endforeach;?>
