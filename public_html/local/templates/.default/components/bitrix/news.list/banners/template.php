<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if(count($arResult['ITEMS'])>0):
?>
<div class="sections-side">
	<?
	foreach ($arResult['ITEMS'] as $key => &$item):
    ?>
	<a href="<?=$item["PROPERTIES"]["LINK"]["VALUE"]?>" class="sections-side__item" style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)">
        <div class="sections-side__frame">
    		<div class="sections-side__icon">
    			<?=file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($item['PROPERTIES']['SVG']['VALUE']))?>
    		</div>
    		<div class="sections-side__text">
                <span class="sections-side__title"><?=$item['NAME']?></span><br>
                <span class="sections-side__description"><?=$item['PROPERTIES']['DESCRIPTION']['VALUE']?></span>
            </div>
        </div>
	</a>
	<?endforeach;?>
</div>
<?endif;?>