		</div>
		<div class="col-xs-3">
			
			<?
				$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sections_side", array(
				    "IBLOCK_TYPE"  => "news",
				    "IBLOCK_ID"    => "1",
				    "TOP_DEPTH"    => "1",
				    "CACHE_TYPE"   => "A",
				    "SECTION_USER_FIELDS" => array("UF_SVG")
				),
				false
				);
			?>
		</div>
	</div>
</div>
<?
	require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php');
?>