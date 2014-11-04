<?if($arParams['SET_FULL_TITLE']=='Y'):
	$section = $arResult['SECTION']['PATH'][0];
?>
<?=$section['~DESCRIPTION']?>
<div class="page__divider l-margin-top xl-margin-bottom"></div>
<h3 class="title--bold">Наши компетенции в данном направлении</h3>
<?
endif;
?>

<?if(count($arResult['ITEMS'])>0):?>
	<ul>
		<?foreach ($arResult['ITEMS'] as $item):?>
			<li><a href="<?=$item['DETAIL_PAGE_URL']?>" class="<?=($item['CODE']==$_REQUEST['ELEMENT_CODE']?"active":"")?>"><?=$item['NAME']?></a></li>
		<?endforeach;?>
	</ul>
<?endif;?>

<?if($arParams['SET_FULL_TITLE']=='Y'):
	$this->SetViewTarget('side_left');
		$section = $arResult['SECTION']['PATH'][0];
		$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "industries", array(
		    "IBLOCK_TYPE"  => "news",
		    "IBLOCK_ID"    => "7",
		    "TOP_DEPTH"    => "1",
		    "CACHE_TYPE"   => "A",
		    "CACHE_NOTES"  => $section['ID'],
		    "SECTION_USER_FIELDS" => array("UF_SVG", "UF_TEXT"),
		),
		false
		);
	$this->EndViewTarget();
endif;?>