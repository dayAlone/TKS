<div class="news-list">
<?
foreach ($arResult['ITEMS'] as $item):?>
  <div class="news-list__item">
  	<span class="news-list__frame">
	    <span class="news-list__date"><?=(LANGUAGE_ID=='ru'?r_date($item['ACTIVE_FROM']):date('d.m.Y', strtotime($item['ACTIVE_FROM'])))?></span>
	    <span class="news-list__section"><?=$arResult['SECTIONS']['PATH'][$item['IBLOCK_SECTION_ID']]?></span>
	</span>
    <div class="news-list__divider"></div>
    <a href="<?=$item['DETAIL_PAGE_URL']?>" class="news-list__title"><?=$item['NAME']?></a>
    <div class="news-list__text"><?=$item['PREVIEW_TEXT']?></div>
  </div>
<?endforeach;?>
</div>

<?=$arResult["NAV_STRING"]?>
