
!(function(){

  var nav = $('.x-main-nav'),
      navBtn = $('.x-main-nav__btn'),
      description = $('.x-logos-description'),
      descriptionElements = $('.x-logos-description__el'),
      descriptionClose = $('#x-close-desc'),
      mapTabs = $('[data-map]'),
      mapGraph = $('[data-map-target]'),
      langBtn = $('#lang'),
      langCtn = $('.x-main-nav__lang'),
      scrollDown = $('.x-scroll-down'),
      firms = $('[data-region]'),
      firms2 = $('[data-firm]'),
      placeSelect = $('#place-select'),
      regionSelect = $('#region-select'),
      firmSelect = $('#firm-select'),
      regionSelectVal = "",
      firmsSelectVal = "",
      markerUrl = 'http://migroup.beta.gorilla.agency/images/marker.png',
      map,
      initPlace,
      geocoder;

  // json
    var places = [];

  function toRightBorder() {
    var windowWidth = $(window).width();
    var el = $('[data-to-right]');
    el.each(function(){
      var parentCol = $(this).parents('[data-width]');
      var parent = $(this).parents('[data-content-width]');
      var position = ( windowWidth - parent.width() ) / 2;
      var w = position;
      position -= 79;
      if( windowWidth >= 1470 ) {
        $(this).css({transform: 'translateX(' + position + 'px)', width: parentCol.width() + w - position + 'px', 'max-width': 'none'});
      } else {
        $(this).css({transform: 'none', width: 'auto', 'max-width' : '100%', 'width': 'auto'});
      }
    });
  }

  function toLeftBorder() {
    var windowWidth = $(window).width();
    var el = $('[data-to-left]');
    el.each(function(){
      var parentCol = $(this).parents('[data-width]');
      var parent = $(this).parents('[data-content-width]');
      var position = ( windowWidth - parent.width() ) / 2;
      var w = position + parentCol.width();
      if( windowWidth >= 1470 ) {
        $(this).css({transform: 'translateX(-' + position + 'px)', width: parentCol.width() + position - 40 + 'px', 'max-width': 'none'});
      } else {
        $(this).css({transform: 'none', width: 'auto', 'max-width' : '100%', 'width': 'auto'});
      }
    });
  }

  function navigation() {
    var windowHeight = $(window).height();
    var scrTop = $(window).scrollTop();

    if( scrTop >= ( windowHeight - 120 ) ) {
      nav.addClass('x-scroll');
    } else {
      nav.removeClass('x-scroll');
    }
  }

  function randRect() {
    var colRect = $('.x-slider__rect');
    colRect.each(function(el){
      var rand = Math.random();
      if( rand > 0.5 )
        rand = 0.5;
      this.style.transitionDelay = rand + 's';
    });
  }

  function showInitTitle() {
    var title = $('.x-slider__title');
    var logo = $('.x-slider__logo');
    $('.x-slider__item').eq(0).addClass('x-anim');
    if( title.length ) {
      title.eq(0).addClass('x-act');
    }
    
    if( logo ) {
      logo.eq(0).addClass('x-act');
    }
  }
  
  function changeTitle() {
    var logo = $('.x-slider__logo');
    var el = $('.slick-active').attr('data-title-slide');
    logo.removeClass('x-act');
    $('[data-title="'+ el +'"]').addClass('x-act');
  }

  function hideTitle() {
    var logo = $('.x-slider__logo');
    logo.removeClass('x-act');
  }

  function inView() {
    var offset = 100;
    if( $(window).width() > 540 ) {
      var offset = 300;
    }

    $('.x-anim-svg').viewportChecker({
      classToAdd: 'x-svg-show',
      offset: offset
    });

    $('.x-dots-anim__el--move').viewportChecker({
      classToAdd: 'x-dots-anim__el--start',
      offset: offset
    });

    $('.x-team-fig').viewportChecker({
      classToAdd: 'x-team-show',
      offset: offset
    });
  }

  function showLogoDescription(el){
    el = $(el);
    var ind = el.attr('data-desc-link');
    description.addClass('x-show');
    descriptionElements.removeClass('x-show');
    $('[data-description="'+ ind +'"]').addClass('x-show');
  }

  // function showMap(el){
  //   el = $(el);
  //   var map = el.attr('data-map');
  //   mapTabs.removeClass('x-act');
  //   el.addClass('x-act');
  //   mapGraph.css({opacity: 0});
  //   $('[data-map-target="'+ map +'"]').css({opacity: 1});
  // }

  function showMap(el){
    el = $(el);
    var map = el.attr('data-map');
    el.toggleClass('x-act');
    // mapGraph.css({opacity: 0});
    // $('[data-map-target="'+ map +'"]').css({opacity: 1});
    mapTabs.each(function(ind,el) {
      var _elMap = $(this).attr('data-map');
      if( !$(this).hasClass('x-act') ) {
        if( _elMap == 1 ) {
          $('.x-flag').addClass('x-hide-layer');
        } else if( _elMap == 2 ) {
          $('.x-dot--gold').addClass('x-hide-layer');
        } else if( _elMap == 3 ) {
          $('.x-dot--blue').addClass('x-hide-layer');
        }
      } else {
        if( _elMap == 1 ) {
          $('.x-flag').removeClass('x-hide-layer');
        } else if( _elMap == 2 ) {
          $('.x-dot--gold').removeClass('x-hide-layer');
        } else if( _elMap == 3 ) {
          $('.x-dot--blue').removeClass('x-hide-layer');
        }
      }
    });
  }

  function toggleLang() {
    langCtn.toggleClass('x-open-lang');
  }

  function scrollToSection(){
    var pos = $('.x-section').eq(0).offset().top;
    pos -= 80;
    $('html, body').animate({
      scrollTop: pos + 'px'
    },800);
  }

  function selectInit( json, el ) {
    $.getJSON(json,function(data){
      if( !data )
        throw "No JSON data";
        var options = "";
        places = data;
        places.forEach(function(el, ind){
          if( ind == 0 ) {
            initPlace = el;
          }
          options += "<option value='"+ ind +"'>"+ el.name.pl +"</option>";
        });
        el.html(options);
        $("select").niceSelect();
        initMap();
    });
  }

  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 52.229675, lng: 21.012230},
      zoom: 15,
      disableDefaultUI: true,
      styles: mapStyles
    });

    geocoder = new google.maps.Geocoder();
    drawMarker();
    insertContentMap();
  }

  function drawMarker() {
    var address = initPlace.address.street + " " + initPlace.address.post + " " + initPlace.address.city;
    geocoder.geocode({'address': address}, function(results, status) {
      if (status === 'OK') {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
          map: map,
          icon: markerUrl,
          position: results[0].geometry.location
        });
      }
    });
  }

  function insertContentMap() {
    var html = "";

    html += '<address class="col-lg-4">';
      html += '<h1>';
        html += '<img src="images/marker-ico.svg" alt="">';
        html += initPlace.name.pl;
      html += '</h1>';
      html += '<p>' + initPlace.address.street + '</p>';
      html += '<p>' + initPlace.address.post + ' ' + initPlace.address.city + '</p>';
    html += '</address>';
    html += '<div class="col-lg-4">';
      html += '<p>';
        html += '<img src="images/call-ico.svg" alt="">';
          html += initPlace.phone;
        html += '</p>';
        html += '<p>';
          html += '<img src="images/mail-ico.svg" alt="">';
          html += '<a href="mailto:' + initPlace.email + '">' + initPlace.email + '</a>';
      html += '</p>';
    html += '</div>';
    html += '<figure class="x-place-fig col-lg-4">';
    html += '<img src="images/map-place-img.jpg" alt="">';
    html += '</figure>';

    $("#map-ctn").html(html);
  }

  randRect();
  showInitTitle();
  toRightBorder();
  toLeftBorder()
  // navigation();


  $('.x-slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 7000,
    fade: true,
  });

  $('.x-logos__slider').slick({
    infinite: true,
    slidesToShow: 4,
    rows: 2,
    slidesToScroll: 4,
    autoplay: true,
    autoplaySpeed: 7000,
  });

  $('.x-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
    $('.x-slider__grid').addClass('x-move');
    $('.x-slider__item').removeClass('x-anim');
    var c = currentSlide;
    $('.x-slider__item').eq(c).addClass('x-anim');
    changeTitle();
  });

  $('.x-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
    $('.x-slider__grid').removeClass('x-move');
    hideTitle();
  });

  $(window).on('resize', function(){
    toRightBorder();    
    toLeftBorder();
  });

  // viewport
  inView();
  $(window).on('scroll', function(){
    inView();
    // navigation();
  });

  // skrollr
  if( $(window).width() > 768 && $('#paralax-scene').length ) {
    var s = skrollr.init();
  }

  // logo description
  $('[data-desc-link]').on('click', function(e){
    e.preventDefault();
    showLogoDescription(this);
  });

  descriptionClose.on('click',function(){
    description.removeClass('x-show');
    descriptionElements.removeClass('x-show');
  });

  // open nav
  navBtn.on('click',function(){
    $('body').toggleClass('x-open-nav');
  });

  // map tabs
  mapTabs.on('click',function(){
    showMap(this);
  });

  // toggle lang
  langBtn.on('click', toggleLang);

  // scrolldown
  scrollDown.on('click',scrollToSection);

  // place filter
  if( placeSelect.length ) {
    selectInit("http://migroup.beta.gorilla.agency/json/places.json", placeSelect);
  }

  placeSelect.on('change', function(){
    var placeEl = $(this).val();
    initPlace = places[placeEl];
    initMap();
  });

  // firms filter
  regionSelect.on('change', function(){
    regionSelectVal = $(this).val();
    var regex = new RegExp(regionSelectVal, 'g');
    firms.removeClass('x-hide-block--region');
    if( regionSelectVal && regionSelectVal != "" ) {
      firms.addClass('x-hide-block--region');
      $("[data-region]").each(function(ind, el){
        var region = $(this).attr("data-region");
        if( region.match(regex) ) {
          var regionArr = region.split(",");
          if( regionArr ) {
            for( var i = 0; i < regionArr.length; i++ ) {
              if( regionSelectVal != regionArr[i] ) {
                continue;
              }
              $(this).removeClass('x-hide-block--region');
            }
          }
        }
      });
    }
  });

  firmSelect.on('change', function(){
    var firmsSelectVal = $(this).val();
    var regex = new RegExp(firmsSelectVal, 'g');
    firms2.removeClass('x-hide-block--firm');
    if( firmsSelectVal && firmsSelectVal != "" ) {
      firms2.addClass('x-hide-block--firm');
      $("[data-firm]").each(function(ind, el){
        var firm = $(this).attr("data-firm");
        if( firm.match(regex) ) {
          var firmArr = firm.split(",");
          if( firmArr ) {
            for( var i = 0; i < firmArr.length; i++ ) {
              if( firmsSelectVal != firmArr[i] ) {
                continue;
              }
              $(this).removeClass('x-hide-block--firm');
            }
          }
        }
      });
    }
  });

  $("#region-select, #firm-select").niceSelect();

})();