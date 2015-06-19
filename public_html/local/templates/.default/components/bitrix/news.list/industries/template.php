<?if($arParams['SET_FULL_TITLE']=='Y'):
	$section = $arResult['SECTION']['PATH'][0];
?>
<?if(intval($section['DETAIL_PICTURE'])>0):?>
<img src="<?=CFile::GetPath($section['DETAIL_PICTURE'])?>" alt="" class="right">
<?endif?>
<?=$section['~DESCRIPTION']?>
<div class="page__divider l-margin-top xl-margin-bottom"></div>
<h3 class="title--bold"><?=(LANGUAGE_ID=="ru"?"Наши компетенции в данном направлении":"Our competences in this area")?></h3>
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