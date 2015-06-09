<div class="features">
	<h2><?=GetMessage('TITLE')?></h2>
	<?foreach ($arResult['ITEMS'] as $item):?>
		<div class="features__item">
			<?if(isset($item['PROPERTIES']['SVG']['VALUE'])):?><div class="features__icon"><?=file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($item['PROPERTIES']['SVG']['VALUE']))?></div><?endif;?>
			<div class="features__text"><?=$item['NAME']?></div>
		</div>
	<?endforeach;

	?>
</div>
