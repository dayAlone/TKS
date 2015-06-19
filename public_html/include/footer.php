</div>
<?
if($APPLICATION->GetPageProperty('popup')):?>
<div id="<?=$APPLICATION->GetPageProperty('popup')?>" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"><a data-dismiss="modal" href="#" class="close"><?=svg('close')?></a>
      <?=$APPLICATION->GetPageProperty('popup_content')?>
    </div>
  </div>
</div>
<?endif;?>
<?$APPLICATION->ShowViewContent('footer');?>
<div id="Nav" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content"><a data-dismiss="modal" href="#" class="close"><?=svg('close')?></a>
      <div data-variant="russian,english" class="lang-trigger <?=(LANGUAGE_ID=="ru"?"lang-trigger--lang_russian":"lang-trigger--lang_english")?>"><span class="lang-trigger__label">RU</span><span class="lang-trigger__carriage"></span><span class="lang-trigger__label">EN</span></div>
      <?php
        $APPLICATION->IncludeComponent("bitrix:menu", "left_popup", 
        array(
            "ALLOW_MULTI_SELECT" => "Y",
            "MENU_CACHE_TYPE"    => "A",
            "ROOT_MENU_TYPE"     => "top",
            "MAX_LEVEL"          => "1",
            ),
        false);?>
    </div>
  </div>
</div>
<div id="Sites" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content"><a data-dismiss="modal" href="#" class="close"><?=svg('close')?></a>
      <div class="modal-title"><?=(LANGUAGE_ID=="ru"?"Сайты холдинга":"Holding websites")?></div>
      <?php
        $APPLICATION->IncludeComponent("bitrix:menu", "left_popup", 
        array(
            "ALLOW_MULTI_SELECT" => "Y",
            "MENU_CACHE_TYPE"    => "A",
            "ROOT_MENU_TYPE"     => "sites",
            "MAX_LEVEL"          => "1",
            ),
        false);?>
    </div>
  </div>
</div>
<div id="Search" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content"><a data-dismiss="modal" href="#" class="close"><?=svg('close')?></a>
      <div class="modal-title"><?=(LANGUAGE_ID=="ru"?"Поиск":"Search")?></div>
      <form class="search" action="/search/">
        <input type="text" name="q" class="search__input">
        <button type="submit" value="" class="search__submit"><?=svg('seach')?>
        </button>
      </form>
    </div>
  </div>
</div>
<div id="Contacts" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content"><a data-dismiss="modal" href="#" class="close"><?=svg('close')?></a>
      <div class="modal-title"><?=(LANGUAGE_ID=="ru"?"связаться с нами":"contacts")?></div><a href="tel:+78002005001" class="phone">8 800 200 500 1</a>
      <div class="full-width center"><a href="#" class="form-trigger"><?=(LANGUAGE_ID=="ru"?"напишите нам":"mail us")?></a></div>
      <?
        require($_SERVER['DOCUMENT_ROOT'].'/include/form-'.LANGUAGE_ID.'.php');
      ?>
    </div>
  </div>
</div>
<div id="Feedback" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content modal-content--white"><a data-dismiss="modal" href="#" class="close"><?=svg('close')?></a>
    <?
      require($_SERVER['DOCUMENT_ROOT'].'/include/form-'.LANGUAGE_ID.'.php');
    ?>
    </div>
  </div>
</div>
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="hidden-xs hidden-sm col-lg-1 col-md-1">
        <a href="/" class="footer__logo"><?=svg('logo_left')?></a>
      </div>
      <div class="col-xs-7 col-sm-4 col-md-2 col-lg-3">
        <div class="copyright">© <?=date('Y')?><?=(LANGUAGE_ID=="ru"?"ООО «ТКС-Холдинг»":"TKC Industrial holding")?></div>
      </div>
      <div class="col-sm-3 col-lg-2">
        <div class="contacts"><span><?=(LANGUAGE_ID=="ru"?"119048, МОСКВА, УЛ. УСАЧЁВА, д. 35, стр. 1":"35, USACHEVA STR., BLDG. 1, MOSCOW, 119048, RUSSIA")?> <br></span><a href="mailto:<?=COption::GetOptionString("grain.customsettings","footer_email")?>" class="contacts_link"><?=COption::GetOptionString("grain.customsettings","footer_email")?></a></div>
      </div>
      <div class="col-sm-2">
        <div class="map right"><a href="/map/"><?=(LANGUAGE_ID=="ru"?"карта сайта":"sitemap")?></a></div>
      </div>
      <div class="col-xs-3 col-md-1 social">
        <nobr>
        <?php
            $APPLICATION->IncludeComponent("bitrix:menu", "social", 
            array(
                "ALLOW_MULTI_SELECT" => "Y",
                "MENU_CACHE_TYPE"    => "A",
                "ROOT_MENU_TYPE"     => "social",
                "MAX_LEVEL"          => "1",
                ),
            false);
        ?>
        </nobr>
      </div>
      <div class="col-md-3 visible-md-block visible-lg-block">
        <a href="http://radia.ru" target="_blank" class="radia"><?=svg('radia')?>
          <div class="radia__content"><?=(LANGUAGE_ID=="ru"?"разработка сайта":"developed by")?> <br>radia interactive</div></a>
          
          </div>
    </div>
  </div>
</footer>
<div tabindex="-1" role="dialog" aria-hidden="true" class="pswp">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div>
        <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
        <button title="Share" class="pswp__button pswp__button--share"></button>
        <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
        <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left"></button>
      <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__center"></div>
      </div>
    </div>
  </div>
</div>
</body>
</html>