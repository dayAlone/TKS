<!DOCTYPE html><html lang='ru'>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <?
  $APPLICATION->SetAdditionalCSS("/layout/css/frontend.css", true);
  $APPLICATION->AddHeadScript('/layout/js/frontend.js');
  if($_SERVER['SERVER_NAME'] == 'tks.local') $APPLICATION->AddHeadScript('http://127.0.0.1:35729/livereload.js?ext=Safari&extver=2.0.9');
  $APPLICATION->ShowViewContent('header');?>
  <title><?php 
    $APPLICATION->ShowTitle();
    if($APPLICATION->GetCurDir()!='/') {
      $rsSites = CSite::GetByID(SITE_ID);
      $arSite  = $rsSites->Fetch();
      echo ' | ' . $arSite['NAME'];
    }
    ?></title>
  <?
    $APPLICATION->ShowHead();
  ?>
</head>
<body class="<?=$APPLICATION->AddBufferContent("body_class");?> <?=LANGUAGE_ID?>">
<?if(SITE_ID == 's1' && $APPLICATION->GetCurDir() != "/vote/"  && $_COOKIE['hide_vote'] != 'Y'):?>
<div class="vote-promo">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <p class="one">Промышленный холдинг ТКС приглашает Вас принять участие в опросе.
      </div>
      <div class="col-md-2">
        <a href="/vote/" class="vote-promo__action">Участвовать</a>
      </div>
      <div class="col-md-3 right">
        <p>
          <a href="#" class="vote-promo__hide vote-promo__hide--now">Скрыть объявление</a><br>
          <a href="#" class="vote-promo__hide  vote-promo__hide--total">Не показывать больше</a>
        </p>
      </div>
    </div>
  </div>
</div>
<?endif;?>
<div class="wrap">
  <div id="panel"><?$APPLICATION->ShowPanel();?></div>
  <header class="toolbar">
    <div class="container hidden-xs hidden-sm">
      <div class="row no-gutter">
        <div class="col-md-3 s-padding-left">
          <a href="/" class="logo"><?=svg('logo-'.LANGUAGE_ID)?></a>
          <div class="shield">
            <div class="shield__right"><?=svg('shield-r')?></div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="row toolbar__tools">
            <div class="col-xs-2">
              <?php
              $APPLICATION->IncludeComponent("bitrix:menu", "sites", 
              array(
                  "ALLOW_MULTI_SELECT" => "Y",
                  "MENU_CACHE_TYPE"    => "A",
                  "ROOT_MENU_TYPE"     => "sites",
                  "MAX_LEVEL"          => "1",
                  ),
              false);
              ?>
            </div>
            <div class="col-xs-3">
              <div data-variant="russian,english" class="lang-trigger <?=(LANGUAGE_ID=="ru"?"lang-trigger--lang_russian":"lang-trigger--lang_english")?> s-margin-left"><span class="lang-trigger__label">RU</span><span class="lang-trigger__carriage"></span><span class="lang-trigger__label">EN</span></div>
            </div>
            <div class="col-xs-3 right">
              <a href="tel:<?=str_replace(' ', '', COption::GetOptionString("grain.customsettings","toolbar_phone-".LANGUAGE_ID))?>" class="toolbar__phone"><?=svg('phone')?></svg><?=COption::GetOptionString("grain.customsettings","toolbar_phone-".LANGUAGE_ID)?></a>
            </div>
            <div class="col-xs-4 right">
              <a data-toggle="modal" data-target="#Feedback" href="#Feedback" class="feedback visible-md-inline visible-lg-inline"><?=(LANGUAGE_ID=="ru"?"Обратная связь":"Ask a question")?></a>
              <form action="/search/" class="search-form">
                <input type="text" name="q" class="search-form__text" placeholder="">
                <button type="submit" class="search-form__button"><?=svg('seach')?></button>
              </form>
              <a href="#" class="search-trigger m-margin-left"><?=svg('seach')?></a>
            </div>
          </div>
          <div class="toolbar__nav">
            <?
              $APPLICATION->IncludeComponent("bitrix:menu", "top", 
              array(
                  "ALLOW_MULTI_SELECT" => "Y",
                  "MENU_CACHE_TYPE"    => "A",
                  "ROOT_MENU_TYPE"     => "top",
                  "MAX_LEVEL"          => "1",
                  ),
              false);
              ?>
          </div>
        </div>
      </div>
    </div>
    <div class="container visible-sm visible-xs">
      <div class="row no-gutter-sm">
        <div class="col-sm-4 col-xs-7 xs-center sm-left">
          <a href="/" class="logo"><?=svg('logo-'.LANGUAGE_ID)?></a>
          <div class="shield">
            <div class="shield__right"><?=svg('shield-r')?></div>
          </div>
        </div>
        <div class="col-sm-8 col-xs-5">
          <div class="row toolbar__tools">
            <div class="col-sm-3 visible-sm">
              <div data-variant="russian,english" class="lang-trigger <?=(LANGUAGE_ID=="ru"?"lang-trigger--lang_russian":"lang-trigger--lang_english")?>"><span class="lang-trigger__label">RU</span><span class="lang-trigger__carriage"></span><span class="lang-trigger__label">EN</span></div>
            </div>
            <div class="col-sm-5 right visible-sm">
              <a href="tel:<?=str_replace(' ', '', COption::GetOptionString("grain.customsettings","toolbar_phone-".LANGUAGE_ID))?>" class="toolbar__phone"><?=svg('phone')?></svg><?=COption::GetOptionString("grain.customsettings","toolbar_phone-".LANGUAGE_ID)?></a>
            </div>
            <div class="col-xs-6 col-sm-2 sm-center no-padding-left">
              <a data-toggle="modal" data-target="#Contacts" href="#Contacts" class="visible-xs-inline s-margin-right"><?=svg('phone')?></a>
              <a data-toggle="modal" data-target="#Search" href="#Search"><?=svg('seach')?></a>

            </div>
            <div class="col-xs-6 col-sm-2 right">
              <a data-toggle="modal" data-target="#Nav" href="#Nav"><span><?=(LANGUAGE_ID=="ru"?"Меню":"Menu")?></span><?=svg('nav')?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <main class="page <?=$APPLICATION->AddBufferContent("page_class");?>">