<?
	global $APPLICATION;
	global $USER_FIELD_MANAGER;
	$section = $arResult['SECTION']['PATH'][0];

	$aUserField = $USER_FIELD_MANAGER->GetUserFields(
		'IBLOCK_'.$section['IBLOCK_ID'].'_SECTION',
		$section['ID']
	);
	$APPLICATION->SetTitle($section['NAME'].' '.($section['ID']!=6?$aUserField['UF_TEXT']['VALUE']:""));
	$APPLICATION->AddChainItem($section['NAME'].' '.$aUserField['UF_TEXT']['VALUE']);
?>