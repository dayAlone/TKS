<nav class="nav-side">
	<?
	$parent = "";
	foreach ($arResult as $key=>$item):
		if($arResult[$key-1]['DEPTH_LEVEL']<$item['DEPTH_LEVEL'])
			$parent = $arResult[$key-1]['CODE'];
		switch ($item['DEPTH_LEVEL']) {
			case 2:
				?><a href="<?=$item['LINK']?>" class="nav-side__item nav-side__item--small <?=($item['SELECTED']?'nav-side__item--active':'')?>"><span><?=$item['TEXT']?></span></a><?
			break;
			default:
				?><a href="<?=$item['LINK']?>" class="nav-side__item <?=($item['SELECTED']?'nav-side__item--active':'')?>"><?=$item['TEXT']?></a><?
				break;
		}
	?>
		
	<?endforeach;?>
</nav>