<?$this->setFrameMode(true);
$item = $arResult;
$props = &$item["PROPS"];
?>
<h2><?=$arResul['NAME']?></h2>
<?=$arResult['~DETAIL_TEXT']?>
<?$this->SetViewTarget('side_left');
	$section = $arResult['SECTION']['PATH'][0];
	$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "industries", array(
	    "IBLOCK_TYPE"  => "news",
	    "IBLOCK_ID"    => "7",
	    "TOP_DEPTH"    => "1",
	    "CACHE_TYPE"   => "A",
	    "CACHE_NOTES"  => $section['ID'],
	    "SECTION_USER_FIELDS" => array("UF_SVG", "UF_TEXT")
	),
	false
	);
$this->EndViewTarget();?>