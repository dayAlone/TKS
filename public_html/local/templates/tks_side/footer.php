		</div>
		<div class="col-sm-4 col-sm-pull-8 col-md-3 col-lg-2 <?=(!$APPLICATION->GetPageProperty('hide_right')?"col-md-pull-6 col-lg-pull-8":"col-md-pull-9 col-lg-pull-10")?> <?=($APPLICATION->GetDirProperty("show_vacancy")?"page__side--border":"")?>">
			<div class="hidden-xs">
				<?php
				$APPLICATION->IncludeComponent("bitrix:menu", "side", 
				array(
				  "ALLOW_MULTI_SELECT" => "Y",
				  "MENU_CACHE_TYPE"    => "A",
				  "ROOT_MENU_TYPE"     => "left",
				  "MAX_LEVEL"          => "2",
				  ),
				false);
				?>
			</div>
			<?
			if($APPLICATION->GetDirProperty("show_vacancy")):
			?>
			<p class="vacancy">Главная ценность любой компании – её коллектив. Промышленный холдинг ТКС – это сплочённая команда единомышленников, чья целеустремлённость и увлечённость общим делом помогли нам стать одним из лидеров рынка неразрушающего контроля и автоматической сварки в России. Мы находимся в постоянном поиске активных, творческих и энергичных людей, специалистов, которые пополнят наш дружный коллектив.</p>
			<?
			endif;
            if(!$APPLICATION->GetDirProperty("hide_features")):
				$APPLICATION->IncludeComponent(
				  "bitrix:news.list", 
				  "features",
				  array(
				    "IBLOCK_ID"                 => (LANGUAGE_ID=='ru'?8:15),
				    "NEWS_COUNT"                => "9999999",
				    "SORT_BY1"                  => "SORT",
				    "SORT_ORDER1"               => "ASC",
				    "DETAIL_URL"                => "/",
				    "PROPERTY_CODE"             => Array("SVG"),
				    "CACHE_TYPE"                => "A",
				    "SET_TITLE"                 => "N",
				    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				    "ADD_SECTIONS_CHAIN"        => "N",
				  ),
				  false
				);
			endif;
			?>
		</div>
		<?if(!$APPLICATION->GetPageProperty('hide_right')):?>
		<div class="col-xs-12 col-md-3 col-lg-2 page__side page__side--right">
			
			<?
				$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sections_side", array(
				    "IBLOCK_TYPE"  => "news",
				    "IBLOCK_ID"    => (LANGUAGE_ID=='ru'?7:13),
				    "TOP_DEPTH"    => "1",
				    "CACHE_TYPE"   => "A",
				    "SECTION_USER_FIELDS" => array("UF_SVG", "UF_TEXT")
				),
				false
				);
			?>
		</div>
		<?endif;?>
	</div>
</div>
<?
	require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php');
?>