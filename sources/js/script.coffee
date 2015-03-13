delay = (ms, func) -> setTimeout func, ms

newsInit = false

spin_options = 
	lines: 13
	length: 21
	width: 2
	radius: 24
	corners: 0
	rotate: 0
	direction: 1
	color: '#0c4ed0'
	speed: 1
	trail: 68
	shadow: false
	hwaccel: false
	className: 'spinner'
	zIndex: 2e9
	top: '50%'
	left: '50%'

map = undefined

size = ->
	#autoHeight($('.page .tech'), '.tech__item', '.tech__title', false, true)
	$('body:not(.catalog-category) .page__frame').removeAttr 'style'
	val = $('.wrap').height() - $('.page').offset().top - $('.footer').outerHeight()*2-22
	if($('body:not(.catalog-category) .page__frame').outerHeight()< val)
		$('body:not(.catalog-category) .page__frame').css
			'minHeight':val
	###
	if !newsInit
		newsInit = true
		$('article:not(.index-page) .news').isotope
			itemSelector: '.news__item'
	###

urlInitial = undefined

$.showGeographyDetail = (url)->
	if !$('.geography__popup').is ':visible'
		$('.geography__popup').velocity
				properties: "transition.slideRightIn"
				options:
					duration: 400
	else
		$('.geography__popup_content').spin spin_options
	$('.geography__popup_content').load url, ()->
		$('.geography__popup_content').spin(false);
		$('.geography__popup_content a[rel^="prettyPhoto"]').prettyPhoto
			social_tools: ''
			overlay_gallery: false
			deeplinking: false
		$('.geography__popup_content').perfectScrollbar('destroy');
		$('.geography__popup_content').perfectScrollbar
			suppressScrollX: true
	$('.geography__popup_close').one 'click', (e)->
		$('.geography__popup').velocity
			properties: "transition.slideRightOut"
			options:
				duration: 400
				complete: ()->
					$('.geography__popup_content').spin spin_options

		e.preventDefault()

setHash = (hash) ->
	window.location.hash = hash;
	window.onhashchange = ()->
		if (!location.hash)
			$("##{hash}").modal('hide');

$.openModal = (url, id, open)->
	if url
		if(open)
			$(id).modal()
		$(id).find('.text').load "/ajax#{url}", (data)->
			$('.modal .fotorama').fotorama()
			if History.enabled
				info = History.getState()
				urlInitial =
					url : info.cleanUrl
					title : document.title
				History.pushState {'url':url}, $(id).find('.text h1').text(), url
				
				History.Adapter.bind window,'statechange.namespace', ()->
					$("#{id}").modal 'hide'
					$(window).unbind 'statechange.namespace'
				
				window.title = $(id).find('.text h1').text()

initPhotoSwipeFromDOM = (gallerySelector) ->
	# parse slide data (url, title, size ...) from DOM elements 
	# (children of gallerySelector)

	parseThumbnailElements = (el) ->
		thumbElements = el.childNodes
		numNodes = thumbElements.length
		items = []
		figureEl = undefined
		linkEl = undefined
		size = undefined
		item = undefined
		i = 0
		while i < numNodes
			figureEl = thumbElements[i]
			# <figure> element
			# include only element nodes 
			if figureEl.nodeType != 1
				i++
				continue
			linkEl = figureEl.children[0]
			# <a> element
			size = linkEl.getAttribute('data-size').split('x')
			# create slide object
			item =
				src: linkEl.getAttribute('href')
				w: parseInt(size[0], 10)
				h: parseInt(size[1], 10)
			if figureEl.children.length > 1
				# <figcaption> content
				item.title = figureEl.children[1].innerHTML
			if linkEl.children.length > 0
				# <img> thumbnail element, retrieving thumbnail url
				item.msrc = linkEl.children[0].getAttribute('src')
			item.el = figureEl
			# save link to element for getThumbBoundsFn
			items.push item
			i++
		return items

	# find nearest parent element

	closest = (el, fn) ->
		el and (if fn(el) then el else closest(el.parentNode, fn))

	# triggers when user clicks on thumbnail

	onThumbnailsClick = (e) ->
		e = e or window.event
		if e.preventDefault then e.preventDefault() else (e.returnValue = false)
		eTarget = e.target or e.srcElement
		# find root element of slide
		clickedListItem = closest(eTarget, (el) ->
			el.tagName and el.tagName.toUpperCase() == 'FIGURE'
		)
		if !clickedListItem
			return
		# find index of clicked item by looping through all child nodes
		# alternatively, you may define index via data- attribute
		clickedGallery = clickedListItem.parentNode
		childNodes = clickedListItem.parentNode.childNodes
		numChildNodes = childNodes.length
		nodeIndex = 0
		index = undefined
		i = 0
		while i < numChildNodes
			if childNodes[i].nodeType != 1
				i++
				continue
			if childNodes[i] == clickedListItem
				index = nodeIndex
				break
			nodeIndex++
			i++
		
		if index >= 0
			# open PhotoSwipe if valid index found
			openPhotoSwipe index, clickedGallery
		false

	# parse picture index and gallery index from URL (#&pid=1&gid=2)

	photoswipeParseHash = ->
		hash = window.location.hash.substring(1)
		params = {}
		if hash.length < 5
			return params
		vars = hash.split('&')
		i = 0
		while i < vars.length
			if !vars[i]
								i++
				continue
			pair = vars[i].split('=')
			if pair.length < 2
								i++
				continue
			params[pair[0]] = pair[1]
			i++
		if params.gid
			params.gid = parseInt(params.gid, 10)
		if !params.hasOwnProperty('pid')
			return params
		params.pid = parseInt(params.pid, 10)
		params

	openPhotoSwipe = (index, galleryElement, disableAnimation) ->
		pswpElement = document.querySelectorAll('.pswp')[0]

		gallery = undefined
		options = undefined
		items = undefined
		items = parseThumbnailElements(galleryElement)
		# define options (if needed)
		options =
			showAnimationDuration: 100
			index: index
			galleryUID: galleryElement.getAttribute('data-pswp-uid')
			getThumbBoundsFn: (index) ->
				return
				# See Options -> getThumbBoundsFn section of documentation for more info
				thumbnail = items[index].el.getElementsByTagName('img')[0]
				pageYScroll = window.pageYOffset or document.documentElement.scrollTop
				rect = thumbnail.getBoundingClientRect()

				data = {
					x: rect.left
					y: rect.top + pageYScroll
					w: rect.width
				}
				return data
		if disableAnimation
			options.showAnimationDuration = 0

		# Pass data to PhotoSwipe and initialize it
		gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options)
		gallery.init()
		return

	# loop through all gallery elements and bind events

	galleryElements = document.querySelectorAll(gallerySelector)
	i = 0
	l = galleryElements.length
	while i < l
		galleryElements[i].setAttribute 'data-pswp-uid', i + 1
		galleryElements[i].onclick = onThumbnailsClick
		i++




autoHeight = (el, selector='', height_selector = false, use_padding=false, debug=false)->
	if el.length > 0
		
		item = el.find(selector)

		if height_selector
			el.find(height_selector).removeAttr 'style'
		else
			el.find(selector).removeAttr 'style'
		
		item_padding = item.css('padding-left').split('px')[0]*2
		padding      = el.css('padding-left').split('px')[0]*2
		if debug
			step = Math.round((el.width()-padding)/(item.width()+item_padding))
		else
			step = Math.round(el.width()/item.width())
		
		count = item.length-1
		loops = Math.ceil(count/step)
		i     = 0
		
		if debug
			console.log count, step, item_padding, padding, el.width(), item.width()

		while i < count
			items = {}
			for x in [0..step-1]
				items[x] = item[i+x] if item[i+x]
			
			heights = []
			$.each items, ()->
				if height_selector
					heights.push($(this).find(height_selector).height())
				else
					heights.push($(this).height())
			
			if debug
				console.log heights

			$.each items, ()->
				if height_selector
					$(this).find(height_selector).height Math.max.apply(Math,heights)
				else
					$(this).height Math.max.apply(Math,heights)

			i += step


getCaptcha = ()->
	$.get '/include/captcha.php', (data)->
		setCaptcha data

setCaptcha = (code)->
	$('input[name=captcha_code]').val(code)
	$('.captcha').css 'background-image', "url(/include/captcha.php?captcha_sid=#{code})"

addTrigger = ()->
	$('.grain-tables-table-edit-admin tbody tr:not(.triggered) td:last-of-type').each ()->
		$(this).closest('tr').addClass 'triggered'
		$(this).after "<td><a href='#' class='openMap'>Открыть карту</a></td>"

	$('#mapPopup .adm-btn-save')
		.click (e)->
			val = $('#mapPopup input[name="value"]').val()
			$("input[name='#{$(this).data('id')}']").val "#{val}"
			$('#mapPopup').modal 'hide'
			e.preventDefault()

	$('a.openMap').off('click').on 'click', (e)->
		val = $(this).closest('tr').find('input[name*=cords]').val()
		id = $(this).closest('tr').find('input[name*=cords]').attr 'name'
		

		$('#mapPopup .adm-btn-save').data 'id':id
		
		$('#mapPopup .modal-content .map').load "/include/map.php?ajax=1&val=#{val}", ()->
			$('#mapPopup').modal()
		
		e.preventDefault()

blur = ()->
	$('header.toolbar, article.index-page, .news__frame, .tech__item').blurjs
		source: '.wrap'
		radius: 15
		overlay: 'rgba(0,0,0,0.1)'

$(document).ready ->

	$('.slider')
		.on 'fotorama:ready', ()->
			$('.slider .fotorama__arr--prev').load('/layout/images/svg/slider-arrow-left.svg')
			$('.slider .fotorama__arr--next').load('/layout/images/svg/slider-arrow-right.svg')
			BackgroundCheck.init
				targets: '.slider'
				images: '.slider .fotorama__active .slider__item'
		.on 'fotorama:showend', ()->
			BackgroundCheck.refresh()
		.fotorama()

	$('.geography-filter').elem('item').click (e)->
		if !$(this).hasMod 'active'
			$(this).block('item').mod 'active', false
			$(this).mod 'active', true
			$(this).block('item').each ()->
				if !$(this).hasMod 'active'
					$($(this).attr('href')).velocity
						properties: "transition.slideUpOut"
						options:
							duration: 300
				else
					window.location.hash = $(this).attr('href');
					$($(this).attr('href')).velocity
						properties: "transition.slideDownIn"
						options:
							duration: 300
		e.preventDefault()


	$('.slide').elem('trigger').click (e)->

		if !$(this).block().hasMod 'open'
			$(this).block().mod 'open', true
			$(this).block('content').velocity
				properties: "transition.slideDownIn"
				options:
					duration: 300
		else
			$(this).block().mod 'open', false
			$(this).block('content').velocity
				properties: "transition.slideUpOut"
				options:
					duration: 300

		e.preventDefault()

	$('a[rel^="prettyPhoto"]').prettyPhoto
		social_tools: ''
		overlay_gallery: false
		deeplinking: false
	$('.industries-list').elem('trigger').click (e)->
			$('.industries-list').elem('trigger').find('span').toggleClass 'hidden'
			$('.industries-list').elem('frame').toggleClass 'hidden-xs'
		e.preventDefault()
	$('.news-item').elem('gallery').find('a').on 'click', (e)->
		pswpElement = document.querySelectorAll('.pswp')[0];
		items = $(this).parent().data('images')
		galleryOptions = 
			history : false
			focus   : false
			shareEl : false
			index   : $(this).index()
		gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, galleryOptions);
		gallery.init();
		e.preventDefault()

	$('.geography__list_gallery').click (e)->
		pswpElement = document.querySelectorAll('.pswp')[0];
		items = $(this).data('images')
		galleryOptions = 
			history : false
			focus   : false
			shareEl : false
		gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, galleryOptions);
		gallery.init();

		e.preventDefault()

	$('.search-trigger').click (e)->
		if $('.toolbar .container').width() <= 750
			$('#Search').modal()
		else
			if $('.toolbar .search-form').is ':hidden'
				$('.toolbar .search-form').velocity
					properties: "transition.slideDownIn"
					options:
						duration: 300
						complete: ()->
							$('.toolbar .search-form  .search-form__button').css 'opacity', 1
							$('.toolbar').one 'mouseleave', ()->
								$('.toolbar .search-form  .search-form__button').css 'opacity', 0
								$('.toolbar .search-form').velocity
									properties: "transition.slideUpOut"
									options:
										duration: 300
						
		e.preventDefault()

	###
	addTrigger()

	$('a[onclick*=grain_TableAddRow]').click ()->
		addTrigger()
	###
	
	$('a.captcha_refresh').click (e)->
		getCaptcha()
		e.preventDefault()

	$('.form input[type=submit]').click (e)->
		if !$('.form input[type=file]').val()
			$('.form .file-trigger').addClass 'error'

	$('.file-trigger').click (e)->
		$(this).parent().find('input[type=file]').trigger 'click'
		e.preventDefault()

	$('input[type=file]').on 'change', ()->
		$('.form .file-trigger').removeClass 'error'
		$('.file-name').text($(this).val().replace(/.+[\\\/]/, ""))

	$('.form').submit (e)->
		data = new FormData(this)
		
		$.ajax 
			type        : 'POST'
			url         : '/include/send.php'
			data        : data
			cache       : false
			contentType : false
			processData : false
			mimeType    : 'multipart/form-data'
			success     : (data) ->
	        	data = $.parseJSON(data)
	        	if data.status == "ok"
	        		$('.form').hide()
	        		$('.form').parents('.modal').find('.success').show()
	        	else if data.status == "error"
	        		$('input[name=captcha_word]').addClass('parsley-error')
	        		getCaptcha()

		e.preventDefault()

	$('.modal').on 'show.bs.modal', (a,b)->
		url = $(a.relatedTarget).data 'url'
		id  = $(a.relatedTarget).attr 'href'
		if url && id
			$.openModal(url, id)
		else
			setHash($(this).attr('id'))
	
	$('.modal').on 'hide.bs.modal', (a,b)->
		
		$(this).find('input[type="email"], input[type="text"], textarea').removeClass('parsley-error').removeAttr("value").val("")
		$(this).find('form').trigger('reset').show()
		$(this).find('.success').hide()

		if urlInitial
			History.pushState {'url':urlInitial.url}, urlInitial.title, urlInitial.url
			window.title = urlInitial.title
		if $(this).find('iframe').length > 0
			$(this).find('iframe').remove()

	$('.lang-trigger__carriage').click (e)->
		window.location.href = 'http://tkc-group.com'
		el = $(this).parents('.lang-trigger')
		variants = el.data('variant').split(',')
		$.each variants, (index, value)->
			value = value.toString()
			if el.mod('lang') != value
				el.mod('lang', value)
				return false
		e.preventDefault()

	$('.form-trigger').click (e)->
		form = $(this).parents('.modal').find('form')
		if form.is ':visible'
			form.velocity
				properties: "transition.slideUpOut"
				options:
					duration: 300
		else
			form.velocity
				properties: "transition.slideDownIn"
				options:
					duration: 300
	

	$('.dropdown').elem('item').click (e)->
		if $(this).attr('href')[0] == "#"
			$('.dropdown').elem('text').html($(this).text())
			$('.dropdown').elem('frame').velocity
					properties: "transition.slideUpOut"
					options:
						duration: 300
			e.preventDefault()
		else
			window.location.href = $(this).attr('href')


	closeDropdown = (x)->
		x.mod('open', false)
		x.elem('frame').velocity
			properties: "transition.slideUpOut"
			options:
				duration: 300

	openDropdown = (x)->
		clearTimeout timer
		text = x.elem('text').text()
		x.elem('item').show()
		x.elem('frame').find("a:contains(#{text})").hide()
		x.elem('frame').velocity
			properties: "transition.slideDownIn"
			options:
				duration: 300
				complete: ()->
					x.mod('open', true)
					timer = delay 3000, ()->
						$('.dropdown').elem('frame')
							.velocity
								properties: "transition.slideUpOut"
								options:
									duration: 300

	timer = false

	$('.modal .text, .geography__popup_content').spin spin_options

	###
	initType = ()->
		$('.dropdown.type').elem('item').click (e)->
			elm = $(this).attr 'href'
			alt = $(this).parents('.dropdown').elem('frame').find("a:not([href=#{elm}])").attr('href')
			if !$(elm).is ':visible'
				$(elm).velocity
					properties: "transition.slideDownIn"
					options:
						duration: 300
						complete: ()->
							google.maps.event.trigger(map, "resize");
				$(alt).velocity
					properties: "transition.slideUpOut"
					options:
						duration: 300
	###
	$('.dropdown').elem('select').on 'change', ()->
		val = $(this).val()
		$(this).block().find("a[href='#{val}']").trigger 'click'
		$(this).mod('open', true)
	
	$('.dropdown').hoverIntent
			over : ()->
				if($(window).width()>970)
					openDropdown($(this))
				else
					$(this).elem('select').focus()
					$(this).mod('open', true)
			out : ()->
				
				if($(window).width()>970)
					closeDropdown($(this))

	$('.toolbar a.phone').click (e)->
		if $(window).width() <= 768
			$('#Contacts').modal()
			e.preventDefault()

	$('.site-select .site-select__trigger').click ()->
		p = $(this).parents('.site-select')
		if !p.mod('open')
			$('#Sites').modal()

	$('.site-select .site-select__trigger').hoverIntent
		over : ()->
			if($(window).width()>768)
				clearTimeout timer
				p = $(this).parents('.site-select')
				p.mod('open', true)
				p.elem('dropdown').velocity
					properties: "transition.slideDownIn"
					options:
						duration: 300
						complete: ()->
							timer = delay 3000, ()->
								$('.site-select')
									.mod('open', false)
									.elem('dropdown').velocity
										properties: "transition.slideUpOut"
										options:
											duration: 300
		out : ()->
			return

	$('.site-select').hoverIntent
		over : ()->
			return
		out : ()->
			p = $(this)
			p.mod('open', false)
			p.elem('dropdown').velocity
				properties: "transition.slideUpOut"
				options:
					duration: 300
	$('a.site-select__trigger').click (e)->
		if($(window).width()<768)
			$('#Sites').modal()
		e.preventDefault()

	delay 300, ()->
		size()

	
	x = undefined
	$(window).resize ->
		clearTimeout(x)
		x = delay 200, ()->
			size()


	mapInit = false
	if !mapInit && $('.contacts #map').length > 0
		mapInit = true
		ymaps.ready ()->
			myMap = new ymaps.Map 'map', {
				center: $('#map').data('coords').split(',')
				zoom: 15
			}
			myPlacemark = new ymaps.Placemark myMap.getCenter(), {
				hintContent: 'Промышленный холдинг ТКС'
			},
			{
				preset: "twirl#nightDotIcon",
			}

			myMap.geoObjects.add(myPlacemark);