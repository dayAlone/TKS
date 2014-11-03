<div class="geography">
	<div class="row">
		<div class="col-xs-9">
			<p>Промышленный холдинг ТКС осуществляет комплексное техническое и технологическое сопровождение проектов по всему миру. Ниже обозначены места, где выполнены или выполняются в настоящее время проекты с участием наших специалистов и с использованием нашего оборудования.</p>
		</div>
		<div class="col-xs-3">
			<div class="geography-filter">
				<div class="geography-filter__title">Режим<br>показа</div>
				<a href="#map" class="geography-filter__item geography-filter__item--active">Карта</a>
				<a href="#list" class="geography-filter__item">Список</a>
			</div>
		</div>
	</div>
	<? $item = $arResult['ITEMS'][0]?>
	<div class="geography__frame">
		<div class="geography__popup">
			<div class="geography__popup_toolbar">
				<a href="#" class="geography__popup_close">
					<?=svg('close')?> Закрыть
				</a>
			</div>
			<div class="geography__popup_content"></div>
		</div>
		<div id="map"></div>
	</div>

	<div id="list" class="geography__list">
	<?foreach ($arResult['ITEMS'] as $item):?>
		<div class="geography__list_item">
			<div class="row geography__list_title no-gutter">
				<div class="col-xs-4">Регион</div>
				<div class="col-xs-2">Период</div>
				<div class="col-xs-4">Проект</div>
				<div class="col-xs-2"></div>
			</div>
			<div class="row no-gutter">
				<div class="col-xs-4 geography__list_region"><?=$item['PROPS']['REGION']?></div>
				<div class="col-xs-2"><?=$item['PROPS']['PERIOD']?></div>
				<div class="col-xs-4">
					<p><?=$item['NAME']?></p>
					<?if(isset($item['PREVIEW_TEXT'])):?>
						<small>
							<p><?=$item['~PREVIEW_TEXT']?></p>
						</small>
					<?endif;?>
				</div>
				<div class="col-xs-2 right">
					<?if(count($item['PROPS']['PHOTOS'])>0):
						$images = array();
						foreach ($item['PROPS']['PHOTOS'] as $img)
							$images[] = $img['value'];
					?>
						<a href="#" class="geography__list_gallery" data-images='<?=json_encode($images)?>'><?=svg('photos')?>фотогалерея</a>
					<?endif;?>
				</div>
			</div>
		</div>
	<?endforeach;?>
	</div>
</div>

<?$this->SetViewTarget('footer');?>
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script>
	$(function(){
		var myMap;

		if(window.location.hash)
			$('.geography-filter a[href^="'+window.location.hash+'"]').trigger('click')

		ymaps.ready(init);

		function init () {
		    myMap = new ymaps.Map('map', {
		        center: [64.93342232, 98.51197427], // Москва
		        zoom: 3,
		        type: "yandex#hybrid",
		        controls: ['geolocationControl', 'fullscreenControl', 'zoomControl']
		    });
		    clusterer = new ymaps.Clusterer({
	            // Зададим массив, описывающий иконки кластеров разного размера.
	            clusterIcons: [{
	                href: '/layout/images/pin_blue.png',
	                size: [24, 31],
	                offset: [-12, -31]
	            }],
	            clusterNumbers: [20],
	            clusterIconContentLayout: null
	        })
	        open = []
		    <?foreach ($arResult['ITEMS'] as $item):?>
			    p<?=$item['ID']?> = new ymaps.Placemark([<?=$item['PROPS']['COORDS']?>], {
		            hintContent: '<?=$item['NAME']?>'
		        }, {
		            iconLayout: 'default#image',
		            iconImageHref: '/layout/images/pin_blue.png',
		            iconImageSize: [24, 31],
		            iconImageOffset: [-12, -31]
		        });
		        p<?=$item['ID']?>.events.add('click', function(e) {
		        	console.log($.inArray(p<?=$item['ID']?>, open))
		        	if($.inArray(p<?=$item['ID']?>, open)==-1) {
			        	p<?=$item['ID']?>.options.set({iconImageHref: '/layout/images/pin_red.png'})
			        	$.showGeographyDetail('/ajax<?=$item["DETAIL_PAGE_URL"]?>')
			        	$('.geography__popup_close').one('click', function(){
			        		$.each(open, function(){this.options.set({iconImageHref: '/layout/images/pin_blue.png'});})
			        		open  = []
			        	})
			        	$.each(open, function(){
			        		this.options.set({iconImageHref: '/layout/images/pin_blue.png'});
			        	})
			        	open  = [p<?=$item['ID']?>]
		        	}
	     		});
		        myMap.geoObjects.add(p<?=$item['ID']?>);
			<?endforeach;?>
			
	    	myMap.geoObjects.add(clusterer);
		}
	})
</script>
<?$this->EndViewTarget();?> 