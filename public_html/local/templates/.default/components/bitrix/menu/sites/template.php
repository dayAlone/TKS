<div class="site-select">
      <a href="#" class="site-select__trigger"><?=GetMessage('ALL')?><?=svg('arrow')?></a>
      <div class="site-select__dropdown">
            <?foreach ($arResult as $key=>$item):?>
                  <a href="<?=$item['LINK']?>" class="site-select__link"><?=$item['TEXT']?></a>
            <?endforeach;?>
      </div>
</div>