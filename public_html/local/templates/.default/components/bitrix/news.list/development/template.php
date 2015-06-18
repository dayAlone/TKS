<?if(count($arResult['ITEMS'])>0):?>
<div class="development">
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
	       			<div class="col-sm-2">
	       				<div class="development__title">
	       					<?=$arResult['SECTIONS'][$section]['NAME']?>
	       					<span><?=(LANGUAGE_ID=='ru'?"год":"year")?></span>
	       				</div>
	       			</div>
	       			<div class="col-sm-10">
	       				<div class="development__content">
		<?endif;?>
		<div class="development__block">
			<div class="row">
				<div class="col-xs-12">
					<div class="development__trigger"><?=$item['NAME']?></div>
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
</div>
<?endif;?>