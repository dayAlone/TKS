		</div>
		<div class="col-xs-3 col-lg-2">
			
			<?
				$APPLICATION->IncludeComponent(
				  "bitrix:news.list", 
				  "banners",
				  array(
				    "IBLOCK_ID"                 => 9,
				    "NEWS_COUNT"                => "9999999",
				    "SORT_BY1"                  => "SORT",
				    "SORT_ORDER1"               => "ASC",
				    "DETAIL_URL"                => "/",
				    "PROPERTY_CODE"             => Array("SVG", "DESCRIPTION"),
				    "CACHE_TYPE"                => "A",
				    "SET_TITLE"                 => "N",
				    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				    "ADD_SECTIONS_CHAIN"        => "N",
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