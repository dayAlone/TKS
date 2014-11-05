<?
if(count($arResult['SECTIONS']['PATH'])==0):
	$arSections = array();
	foreach ($arResult['ITEMS'] as $item)
		if(!in_array($item['IBLOCK_SECTION_ID'], $arSections))
			$arSections[] = $item['IBLOCK_SECTION_ID'];


	$arSort     = array("SORT" => "ASC");
	$arFilter   = array("IBLOCK_ID" => $params['IBLOCK'], 'ID'=> $arSections);
	$rsSections = CIBlockSection::GetList($arSort, $arFilter, false, array(
				"ID",
				"NAME"
	));

	while ($s = $rsSections->Fetch())
		$arResult['SECTIONS']['PATH'][$s['ID']] = $s['NAME'];
else:
	$arSections = array();
	foreach ($arResult['SECTIONS']['PATH'] as $item)
		$arSections[$item['ID']] = $item['NAME'];
	$arResult['SECTIONS']['PATH'] = $arSections;
endif;