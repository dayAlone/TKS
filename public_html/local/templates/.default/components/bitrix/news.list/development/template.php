<?if(count($arResult['ITEMS'])>0):?>
	<?
	$section = 0;
	foreach ($arResult['ITEMS'] as $item):
		if($item['IBLOCK_SECTION_ID']!=$section):
			if($section>0):?>
						</div>
	       			</div>
	       		</div>
	       </div>
			<?endif;
			$section = $item['IBLOCK_SECTION_ID'];
		?>
			<div class="development__item">
	       		<div class="row no-gutter">
	       			<div class="col-xs-2">
	       				<div class="development__title">
	       					<?=$arResult['SECTIONS'][$section]['NAME']?>
	       					<span>год</span>
	       				</div>
	       			</div>
	       			<div class="col-xs-10">
	       				<div class="development__content">
		<?endif;?>
		<div class="development__block">
			<div class="row">
				<div class="col-xs-9">
					<a href="#" class="development__trigger"><?=$item['NAME']?></a>
					<div class="development__block_content">
						<?=$item['~PREVIEW_TEXT']?>
					</div>
				</div>
			</div>
		</div>

	<?endforeach;?>
				</div>
   			</div>
   		</div>
   </div>
<?endif;?>