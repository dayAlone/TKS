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

	<?foreach ($arResult['ITEMS'] as $item):?>

	<?endforeach;?>

</div>

<?$this->SetViewTarget('footer');?>

<?$this->EndViewTarget();?> 