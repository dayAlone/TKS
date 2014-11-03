<div class="geography">
	<div class="row">
		<div class="col-xs-9">
			<p>Промышленный холдинг ТКС осуществляет комплексное техническое и технологическое сопровождение проектов по всему миру. Ниже обозначены места, где выполнены или выполняются в настоящее время проекты с участием наших специалистов и с использованием нашего оборудования.</p>
		</div>
		<div class="col-xs-3">
			<div class="filter">
				<div class="filter__title">Режим<br>показа</div>
				<a href="#map" class="filter__item filter__item--active">Карта</a>
				<a href="#list" class="filter__item">Список</a>
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
			<div class="geography__popup_content">
				
			</div>
		</div>
		<div id="map"></div>
	</div>
	<?foreach ($arResult['ITEMS'] as $item):?>

	<?endforeach;?>

</div>

<?$this->SetViewTarget('footer');?>
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script>
	$(function(){
		var myMap;

		ymaps.ready(init);

		function init () {
		    myMap = new ymaps.Map('map', {
		        center: [66.69261210265907, 95.40570330969672], // Москва
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