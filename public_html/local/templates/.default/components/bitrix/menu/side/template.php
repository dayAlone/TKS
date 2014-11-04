<nav class="nav-side">
	<?foreach ($arResult as $key=>$item):?>
		<a href="<?=$item['LINK']?>" class="nav-side__item <?=($item['SELECTED']?'nav-side__item--active':'')?>"><?=$item['TEXT']?></a>
	<?endforeach;?>
</nav>