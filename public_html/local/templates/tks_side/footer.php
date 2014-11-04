		</div>
		<?if(!$APPLICATION->GetPageProperty('hide_right')):?>
		<div class="col-xs-3 col-lg-2">
			
			<?
				$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sections_side", array(
				    "IBLOCK_TYPE"  => "news",
				    "IBLOCK_ID"    => "7",
				    "TOP_DEPTH"    => "1",
				    "CACHE_TYPE"   => "A",
				    "SECTION_USER_FIELDS" => array("UF_SVG", "UF_TEXT")
				),
				false
				);
			?>
		</div>
		<?endif;?>
	</div>
</div>
<?
	require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php');
?>