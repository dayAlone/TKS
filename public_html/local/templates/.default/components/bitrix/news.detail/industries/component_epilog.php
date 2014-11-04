<?
	if(isset($_REQUEST['SECTION_CODE'])):
		global $APPLICATION;
		global $USER_FIELD_MANAGER;
		
		$obCache       = new CPHPCache();
		$cacheLifetime = 86400; 
		$cacheID       = $_REQUEST['SECTION_CODE']; 
		$cachePath     = '/';


		if( $obCache->InitCache($cacheLifetime, $cacheID, $cachePath) ):

		   $vars = $obCache->GetVars();
		   $section = $vars['section'];

		elseif( $obCache->StartDataCache() ):
			
			CModule::IncludeModule("iblock");
			$section = $arResult['SECTION']['PATH'][0];
			$rsResult = CIBlockSection::GetList(array("SORT"=>"ASC"), array("IBLOCK_ID"=>$arResult['IBLOCK_ID'], "CODE"=>$_REQUEST['SECTION_CODE']), false, array("UF_TEXT")); 
			$section = $rsResult->Fetch();
			$obCache->EndDataCache(array('section' => $section));

		endif;

		$APPLICATION->SetTitle($section['NAME'].' '.($section['ID']!=6?$section['UF_TEXT']:""));
		$APPLICATION->AddChainItem($section['NAME'].' '.$section['UF_TEXT']);
	endif;
?>