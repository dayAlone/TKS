<ul>
<?foreach ($arResult['ITEMS'] as $item):?>
	<li><a href="<?=$item['DETAIL_PAGE_URL']?>" class="news-list__title"><?=$item['NAME']?></a></li>
<?endforeach;?>
</ul>