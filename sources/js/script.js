(function() {
  var addTrigger, autoHeight, blur, delay, getCaptcha, map, newsInit, setCaptcha, setHash, size, spin_options, urlInitial;

  delay = function(ms, func) {
    return setTimeout(func, ms);
  };

  newsInit = false;

  spin_options = {
    lines: 13,
    length: 21,
    width: 2,
    radius: 24,
    corners: 0,
    rotate: 0,
    direction: 1,
    color: '#0c4ed0',
    speed: 1,
    trail: 68,
    shadow: false,
    hwaccel: false,
    className: 'spinner',
    zIndex: 2e9,
    top: '50%',
    left: '50%'
  };

  map = void 0;

  size = function() {
    var val;
    $('body:not(.catalog-category) .page__frame').removeAttr('style');
    val = $('.wrap').height() - $('.page').offset().top - $('.footer').outerHeight() * 2 - 22;
    if ($('body:not(.catalog-category) .page__frame').outerHeight() < val) {
      return $('body:not(.catalog-category) .page__frame').css({
        'minHeight': val
      });
    }

    /*
    	if !newsInit
    		newsInit = true
    		$('article:not(.index-page) .news').isotope
    			itemSelector: '.news__item'
     */
  };

  urlInitial = void 0;

  $.showGeographyDetail = function(url) {
    if (!$('.geography__popup').is(':visible')) {
      $('.geography__popup').velocity({
        properties: "transition.slideRightIn",
        options: {
          duration: 400
        }
      });
    } else {
      $('.geography__popup_content').spin(spin_options);
    }
    $('.geography__popup_content').load(url, function() {
      $('.geography__popup_content').spin(false);
      $('.geography__popup_content a[rel^="prettyPhoto"]').prettyPhoto({
        social_tools: '',
        overlay_gallery: false,
        deeplinking: false
      });
      $('.geography__popup_content').perfectScrollbar('destroy');
      return $('.geography__popup_content').perfectScrollbar({
        suppressScrollX: true
      });
    });
    return $('.geography__popup_close').one('click', function(e) {
      $('.geography__popup').velocity({
        properties: "transition.slideRightOut",
        options: {
          duration: 400,
          complete: function() {
            return $('.geography__popup_content').spin(spin_options);
          }
        }
      });
      return e.preventDefault();
    });
  };

  setHash = function(hash) {
    window.location.hash = hash;
    return window.onhashchange = function() {
      if (!location.hash) {
        return $("#" + hash).modal('hide');
      }
    };
  };

  $.openModal = function(url, id, open) {
    if (url) {
      if (open) {
        $(id).modal();
      }
      return $(id).find('.text').load("/ajax" + url, function(data) {
        var info;
        $('.modal .fotorama').fotorama();
        if (History.enabled) {
          info = History.getState();
          urlInitial = {
            url: info.cleanUrl,
            title: document.title
          };
          History.pushState({
            'url': url
          }, $(id).find('.text h1').text(), url);
          History.Adapter.bind(window, 'statechange.namespace', function() {
            $("" + id).modal('hide');
            return $(window).unbind('statechange.namespace');
          });
          return window.title = $(id).find('.text h1').text();
        }
      });
    }
  };

  autoHeight = function(el, selector, height_selector, use_padding, debug) {
    var count, heights, i, item, item_padding, items, loops, padding, step, x, _i, _ref, _results;
    if (selector == null) {
      selector = '';
    }
    if (height_selector == null) {
      height_selector = false;
    }
    if (use_padding == null) {
      use_padding = false;
    }
    if (debug == null) {
      debug = false;
    }
    if (el.length > 0) {
      item = el.find(selector);
      if (height_selector) {
        el.find(height_selector).removeAttr('style');
      } else {
        el.find(selector).removeAttr('style');
      }
      item_padding = item.css('padding-left').split('px')[0] * 2;
      padding = el.css('padding-left').split('px')[0] * 2;
      if (debug) {
        step = Math.round((el.width() - padding) / (item.width() + item_padding));
      } else {
        step = Math.round(el.width() / item.width());
      }
      count = item.length - 1;
      loops = Math.ceil(count / step);
      i = 0;
      if (debug) {
        console.log(count, step, item_padding, padding, el.width(), item.width());
      }
      _results = [];
      while (i < count) {
        items = {};
        for (x = _i = 0, _ref = step - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; x = 0 <= _ref ? ++_i : --_i) {
          if (item[i + x]) {
            items[x] = item[i + x];
          }
        }
        heights = [];
        $.each(items, function() {
          if (height_selector) {
            return heights.push($(this).find(height_selector).height());
          } else {
            return heights.push($(this).height());
          }
        });
        if (debug) {
          console.log(heights);
        }
        $.each(items, function() {
          if (height_selector) {
            return $(this).find(height_selector).height(Math.max.apply(Math, heights));
          } else {
            return $(this).height(Math.max.apply(Math, heights));
          }
        });
        _results.push(i += step);
      }
      return _results;
    }
  };

  getCaptcha = function() {
    return $.get('/include/captcha.php', function(data) {
      return setCaptcha(data);
    });
  };

  setCaptcha = function(code) {
    $('input[name=captcha_code]').val(code);
    return $('.captcha').css('background-image', "url(/include/captcha.php?captcha_sid=" + code + ")");
  };

  addTrigger = function() {
    $('.grain-tables-table-edit-admin tbody tr:not(.triggered) td:last-of-type').each(function() {
      $(this).closest('tr').addClass('triggered');
      return $(this).after("<td><a href='#' class='openMap'>Открыть карту</a></td>");
    });
    $('#mapPopup .adm-btn-save').click(function(e) {
      var val;
      val = $('#mapPopup input[name="value"]').val();
      $("input[name='" + ($(this).data('id')) + "']").val("" + val);
      $('#mapPopup').modal('hide');
      return e.preventDefault();
    });
    return $('a.openMap').off('click').on('click', function(e) {
      var id, val;
      val = $(this).closest('tr').find('input[name*=cords]').val();
      id = $(this).closest('tr').find('input[name*=cords]').attr('name');
      console.log(id);
      $('#mapPopup .adm-btn-save').data({
        'id': id
      });
      $('#mapPopup .modal-content .map').load("/include/map.php?ajax=1&val=" + val, function() {
        return $('#mapPopup').modal();
      });
      return e.preventDefault();
    });
  };

  blur = function() {
    return $('header.toolbar, article.index-page, .news__frame, .tech__item').blurjs({
      source: '.wrap',
      radius: 15,
      overlay: 'rgba(0,0,0,0.1)'
    });
  };

  $(document).ready(function() {
    var closeDropdown, mapInit, openDropdown, timer, x;
    $('.geography-filter').elem('item').click(function(e) {
      if (!$(this).hasMod('active')) {
        $(this).block('item').mod('active', false);
        $(this).mod('active', true);
        $(this).block('item').each(function() {
          if (!$(this).hasMod('active')) {
            return $($(this).attr('href')).velocity({
              properties: "transition.slideUpOut",
              options: {
                duration: 300
              }
            });
          } else {
            window.location.hash = $(this).attr('href');
            return $($(this).attr('href')).velocity({
              properties: "transition.slideDownIn",
              options: {
                duration: 300
              }
            });
          }
        });
      }
      return e.preventDefault();
    });
    $('.slide').elem('trigger').click(function(e) {
      if (!$(this).block().hasMod('open')) {
        $(this).block().mod('open', true);
        $(this).block('content').velocity({
          properties: "transition.slideDownIn",
          options: {
            duration: 300
          }
        });
      } else {
        $(this).block().mod('open', false);
        $(this).block('content').velocity({
          properties: "transition.slideUpOut",
          options: {
            duration: 300
          }
        });
      }
      return e.preventDefault();
    });
    $('a[rel^="prettyPhoto"]').prettyPhoto({
      social_tools: '',
      overlay_gallery: false,
      deeplinking: false
    });
    $('.geography__list_gallery').click(function(e) {
      $.prettyPhoto.open($(this).data('images'));
      return e.preventDefault();
    });
    $('.search-trigger').click(function(e) {
      if ($('.toolbar .container').width() <= 750) {
        $('#Search').modal();
      } else {
        if ($('.toolbar .search-form').is(':hidden')) {
          $('.toolbar .search-form').velocity({
            properties: "transition.slideDownIn",
            options: {
              duration: 300,
              complete: function() {
                $('.toolbar .search-form  .search-form__button').css('opacity', 1);
                return $('.toolbar').one('mouseleave', function() {
                  $('.toolbar .search-form  .search-form__button').css('opacity', 0);
                  return $('.toolbar .search-form').velocity({
                    properties: "transition.slideUpOut",
                    options: {
                      duration: 300
                    }
                  });
                });
              }
            }
          });
        }
      }
      return e.preventDefault();
    });

    /*
    	addTrigger()
    
    	$('a[onclick*=grain_TableAddRow]').click ()->
    		addTrigger()
     */
    $('a.captcha_refresh').click(function(e) {
      getCaptcha();
      return e.preventDefault();
    });
    $('.form').submit(function(e) {
      var data;
      data = $(this).serialize();
      $.post('/include/send.php', data, function(data) {
        data = $.parseJSON(data);
        if (data.status === "ok") {
          $('.form').hide();
          return $('.form').parents('.modal').find('.success').show();
        } else if (data.status === "error") {
          $('input[name=captcha_word]').addClass('parsley-error');
          return getCaptcha();
        }
      });
      return e.preventDefault();
    });
    $('.modal').on('show.bs.modal', function(a, b) {
      var id, url;
      url = $(a.relatedTarget).data('url');
      id = $(a.relatedTarget).attr('href');
      if (url && id) {
        return $.openModal(url, id);
      } else {
        return setHash($(this).attr('id'));
      }
    });
    $('.modal').on('hide.bs.modal', function(a, b) {
      $(this).find('input[type="email"], input[type="text"], textarea').removeClass('parsley-error').removeAttr("value").val("");
      $(this).find('form').trigger('reset').show();
      $(this).find('.success').hide();
      if (urlInitial) {
        History.pushState({
          'url': urlInitial.url
        }, urlInitial.title, urlInitial.url);
        window.title = urlInitial.title;
      }
      if ($(this).find('iframe').length > 0) {
        return $(this).find('iframe').remove();
      }
    });
    $('.lang-trigger__carriage').click(function(e) {
      var el, variants;
      window.location.href = 'http://tkc-group.com';
      el = $(this).parents('.lang-trigger');
      variants = el.data('variant').split(',');
      $.each(variants, function(index, value) {
        value = value.toString();
        if (el.mod('lang') !== value) {
          el.mod('lang', value);
          return false;
        }
      });
      return e.preventDefault();
    });
    $('.form-trigger').click(function(e) {
      var form;
      form = $(this).parents('.modal').find('form');
      if (form.is(':visible')) {
        return form.velocity({
          properties: "transition.slideUpOut",
          options: {
            duration: 300
          }
        });
      } else {
        return form.velocity({
          properties: "transition.slideDownIn",
          options: {
            duration: 300
          }
        });
      }
    });
    $('.dropdown').elem('item').click(function(e) {
      if ($(this).attr('href')[0] === "#") {
        $('.dropdown').elem('text').html($(this).text());
        $('.dropdown').elem('frame').velocity({
          properties: "transition.slideUpOut",
          options: {
            duration: 300
          }
        });
        return e.preventDefault();
      } else {
        return window.location.href = $(this).attr('href');
      }
    });
    closeDropdown = function(x) {
      x.mod('open', false);
      return x.elem('frame').velocity({
        properties: "transition.slideUpOut",
        options: {
          duration: 300
        }
      });
    };
    openDropdown = function(x) {
      var text;
      clearTimeout(timer);
      text = x.elem('text').text();
      x.elem('item').show();
      x.elem('frame').find("a:contains(" + text + ")").hide();
      return x.elem('frame').velocity({
        properties: "transition.slideDownIn",
        options: {
          duration: 300,
          complete: function() {
            var timer;
            x.mod('open', true);
            return timer = delay(3000, function() {
              return $('.dropdown').elem('frame').velocity({
                properties: "transition.slideUpOut",
                options: {
                  duration: 300
                }
              });
            });
          }
        }
      });
    };
    timer = false;
    $('.modal .text, .geography__popup_content').spin(spin_options);

    /*
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
     */
    $('.dropdown').elem('select').on('change', function() {
      var val;
      val = $(this).val();
      $(this).block().find("a[href='" + val + "']").trigger('click');
      return $(this).mod('open', true);
    });
    $('.dropdown').hoverIntent({
      over: function() {
        if ($(window).width() > 970) {
          return openDropdown($(this));
        } else {
          $(this).elem('select').focus();
          return $(this).mod('open', true);
        }
      },
      out: function() {
        if ($(window).width() > 970) {
          return closeDropdown($(this));
        }
      }
    });
    $('.toolbar a.phone').click(function(e) {
      if ($(window).width() <= 768) {
        $('#Contacts').modal();
        return e.preventDefault();
      }
    });
    $('.site-select .site-select__trigger').click(function() {
      var p;
      p = $(this).parents('.site-select');
      if (!p.mod('open')) {
        return $('#Sites').modal();
      }
    });
    $('.site-select .site-select__trigger').hoverIntent({
      over: function() {
        var p;
        if ($(window).width() > 768) {
          clearTimeout(timer);
          p = $(this).parents('.site-select');
          p.mod('open', true);
          return p.elem('dropdown').velocity({
            properties: "transition.slideDownIn",
            options: {
              duration: 300,
              complete: function() {
                return timer = delay(3000, function() {
                  return $('.site-select').mod('open', false).elem('dropdown').velocity({
                    properties: "transition.slideUpOut",
                    options: {
                      duration: 300
                    }
                  });
                });
              }
            }
          });
        }
      },
      out: function() {}
    });
    $('.site-select').hoverIntent({
      over: function() {},
      out: function() {
        var p;
        p = $(this);
        p.mod('open', false);
        return p.elem('dropdown').velocity({
          properties: "transition.slideUpOut",
          options: {
            duration: 300
          }
        });
      }
    });
    $('a.site-select__trigger').click(function(e) {
      if ($(window).width() < 768) {
        $('#Sites').modal();
      }
      return e.preventDefault();
    });
    delay(300, function() {
      return size();
    });
    x = void 0;
    $(window).resize(function() {
      clearTimeout(x);
      return x = delay(200, function() {
        return size();
      });
    });
    mapInit = false;
    if (!mapInit && $('.contacts #map').length > 0) {
      mapInit = true;
      return ymaps.ready(function() {
        var myMap, myPlacemark;
        myMap = new ymaps.Map('map', {
          center: $('#map').data('coords').split(','),
          zoom: 15
        });
        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
          hintContent: 'Аргус СварСервис'
        }, {
          preset: "twirl#nightDotIcon"
        });
        return myMap.geoObjects.add(myPlacemark);
      });
    }
  });

}).call(this);
