<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if(count($arResult['SECTIONS'])>0):
?>
<div class="sections-side">
    <h3>Ключевые индустрии</h3>
		<?foreach ($arResult['SECTIONS'] as $key => &$item):
        ?>
		<a href="<?=$item['SECTION_PAGE_URL']?>" class="sections-side__item" style="background-image: url(<?=$item['PICTURE']['SRC']?>)">
            <div class="sections-side__frame">
        		<div class="sections-side__icon">
        			<?=file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($item['UF_SVG']))?>
        		</div>
        		<div class="sections-side__text">
                    <span class="sections-side__title"><?=$item['NAME']?></span><br>
                    <span class="sections-side__description"><?=$item['UF_TEXT']?></span>
                </div>
            </div>
    	</a>
    	<?endforeach;?>
</div>
<?endif;?>