<?
	$arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID']);
	$db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true);
	while($a = $db_list->GetNext())
		$arResult['SECTIONS'][$a['ID']] = $a;
 ?>