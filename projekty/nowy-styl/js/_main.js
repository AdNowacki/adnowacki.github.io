'use strict';
// CSS support
var supportsCSS = !!((window.CSS && window.CSS.supports) || window.supportsCSS || false);
if( supportsCSS ) {
    var supportsFlexAndAppearance = CSS.supports("(display: flex) and (-webkit-appearance: caret)");
}

/*blokowanie wyświetlania w iframe*/
if (top.location != self.location) {
    top.location.href = self.location;
}

var click = false;

var CONFIG = CONFIG || {};

CONFIG.userAgent = function() {
    this.userAg; // Nazwa przeglądarki
    this.setBodyId = function(ctrl) {
        var nav = navigator.userAgent;
        if (nav.indexOf('Firefox') != -1) {
            this.userAg = 'firefox';
        } else if (nav.indexOf('Opera') != -1) {
            this.userAg = 'opera';
        } else if (nav.indexOf('Chrome') != -1) {
            this.userAg = 'chrome';
        } else if (nav.indexOf('MSIE 10') != -1) {
            this.userAg = 'ie10';
        } else if (nav.indexOf('MSIE 9') != -1) {
            this.userAg = 'ie9';
        } else if (nav.indexOf('MSIE 8') != -1) {
            this.userAg = 'ie8';
        } else if (nav.indexOf('Safari') != -1) {
            this.userAg = 'safari';
        };
        if (ctrl == true) {
            document.body.setAttribute('id', this.userAg);
        };
    };
};

CONFIG.window = function() {
    this.windowWidth = null, // Szerokość okna przeglądarki
    this.windowHeight = null, // Wysokość okna przeglądarki
    this.screenWidth = null, // Szerokość monitora
    this.screenHeight = null, // Wysokość monitora

    this.setWindow = function() {
        this.windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        this.windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        this.screenWidth = screen.width;
        this.screenHeight = screen.height;
    };
}

CONFIG.init = function() {
    CONFIG.obStorage.window.setWindow();
    CONFIG.obStorage.userAgent.setBodyId(true);
}

CONFIG.obStorage = {
    window: new CONFIG.window(),
    userAgent: new CONFIG.userAgent(),
}

function addNavClass() {
    var sTop = $(window).scrollTop();

    if( sTop >= ( CONFIG.obStorage.window.windowHeight - 50 ) )
        $('.nav-flow').addClass('nav-flow-page');
    else
        $('.nav-flow').removeClass('nav-flow-page');
}

function resizeSlider( w,h,el ) {
    var elementWidth = $(el).width();
    var elementHeight = ( elementWidth * h )/w;
    $(el).css('height', elementHeight + 'px');
    $(el).find('img:not(.fullscreen-image)').css('height', elementHeight + 'px');
    if( !$(el).hasClass('slider-2-1-image') )
        $(el).find('img:not(.fullscreen-image)').css('width', elementWidth + 'px');
}

function resizeAutoSlider( w, h, el ) {
    var prop = w/h;
    var elWidth = $(el).width();
    $(el).css('height', ( ( elWidth/prop ) - 20 )+'px');
}

function slder2setNav() {
    var w = $('.slider-image').width();
    w = (w*4*8.33333)/100;
    $('#slider-2-navigation').css( 'width', w+'px' );
}

function slickVerticalHeight(items) {
    var it = items;
    var img = $('.slider-vertical-nav img').eq(0).height();
    var tot = ( it * img ) + 3*30;
    var c = setTimeout(function(){
        $('.slider-vertical-nav .slick-list').css('height', + tot + 'px' );
    },300)
}

function resizeElement( w,h,el ) {
    var prop = w/h;
    var elWidth = $(el).width();
    $(el).css('height', ( elWidth/prop )+'px');
}

function setTopPosition() {
    var el = $('[data-page]');
    var elL = el.length;
    for(var j=0; j<elL; j++) {
        var page = el.eq(j).attr('data-page');
        var topPos = $('#'+page).offset().top.toFixed(2);
        el.eq(j).attr('data-top', topPos);
    }
}

function socialAppend() {
    if( CONFIG.obStorage.window.windowWidth <= 962 ) {
        var clone = $('.social').clone();
        clone.addClass('mob');
        $('.social').remove();
        $('body').append( clone );
    }
}



$(document).ready(function() {
    CONFIG.init();

    $('.image-popup').magnificPopup({
        type:'image',
        removalDelay: 300,
        mainClass: 'mfp-fade',
        width: CONFIG.obStorage.window.windowWidth,
    });

    $('#fullpage, .fullpage-slider > div').height( CONFIG.obStorage.window.windowHeight + 'px' );
    $('#fullpage, .fullpage-slider .slick-slide').height( CONFIG.obStorage.window.windowHeight + 'px' );
    $('.fullpage-slider').slick({
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        'appendArrows' : $('#fullpage-slider-navigation')
    });

    $('#slider-2').slick({
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        'appendArrows' : $('#slider-2-navigation')
    });

    $('#slider-3').slick({
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 4000,
    });

    $('.slider-vertical-1').slick({
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        // 'appendArrows' : $('#slider-2-navigation')
    });

    $('.slider-vertical-2').slick({
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        // 'appendArrows' : $('#slider-2-navigation')
    });

    $('.slider-vertical-3').slick({
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        // 'appendArrows' : $('#slider-2-navigation')
    });

    $('.slider-vertical-nav-1').slick({
        infinite: false,
        vertical : true,
        verticalSwiping: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider-vertical',
        focusOnSelect: true,
        'appendArrows' : $('.vertical-nav-1'),
    });

    $('.slider-vertical-nav-2').slick({
        infinite: false,
        vertical : true,
        verticalSwiping: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider-vertical',
        focusOnSelect: true,
        'appendArrows' : $('.vertical-nav-2'),
    });

    $('.slider-vertical-nav-3').slick({
        infinite: false,
        vertical : true,
        verticalSwiping: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider-vertical',
        focusOnSelect: true,
        'appendArrows' : $('.vertical-nav-3'),
    });


    

    $('body').on('click', '.lang button',function() {
        $('body').toggleClass('open-lang');
    });
    socialAppend();
    addNavClass();
    resizeSlider( 10,6, '.image-scale' );
    resizeSlider( 10,6, '.slider-vertical' );
    resizeElement( 2.6,1, '#map-g' );
    resizeAutoSlider( 1410, 832, '#slider-3');
    slder2setNav();
    setTopPosition();
    var stp = setTimeout( function(){
        setTopPosition();
        clearTimeout( stp );
    }, 1500 );
    // slickVerticalHeight(4);

    $(window).on('scroll', addNavClass);
    $(window).on('scroll', function(){
        click = false;
        var t = $(window).scrollTop();
        var navs = $('#links a');
        var navsL = navs.length;
        for( var j=0; j<navsL; j++ ) {
            var target = navs.eq(j).attr('data-page');
            if( click == false ) {   
                if( t >= ( $('#'+target).offset().top - 51 ) ) {
                    navs.removeClass('act');
                    navs.eq(j).addClass('act');
                }
            }
        }
    });

    $(window).on('resize', function() {
        CONFIG.init();
        if( CONFIG.obStorage.window.windowWidth > 768 ) {
            $('#fullpage, .fullpage-slider > div').height( CONFIG.obStorage.window.windowHeight + 'px' );
            $('#fullpage, .fullpage-slider .slick-slide').height( CONFIG.obStorage.window.windowHeight + 'px' );
        }

        socialAppend();
        addNavClass();
        resizeSlider( 10,6, '.image-scale' );
        resizeSlider( 10,6, '.slider-vertical' );
        resizeElement( 2.6,1, '#map-g' );
        resizeAutoSlider( 1410, 832, '#slider-3');
        slder2setNav();
        var stp = setTimeout( function(){
            setTopPosition();
            clearTimeout( stp );
        }, 1000 );
        // slickVerticalHeight(4);
    });

    var m = document.querySelector('#map');
    var mg = document.querySelector('#map-g');
    m.addEventListener('click', function(){
        mg.classList.add('click');
    },false);

    var clickEl;

    $('#links a').on('click', function(e){
        e.preventDefault();
        click = true;
        $('body').removeClass('open-navigation');
        var th = $(this);
        $('#links a').removeClass('act');
        th.addClass('act');
        var target = th.attr('data-top');
        if( clickEl ) {
            var x = Math.abs( clickEl - th.attr('data-i') );
            clickEl = th.attr('data-i');
            var time = x*300;
        } else {
            clickEl = th.attr('data-i');
            var time = clickEl * 300;
        }
        $('html, body').stop().animate( {scrollTop:target}, time, 'swing', function() { 
        });
    });


    $('#open-nav').on('click', function() {
        $('body').toggleClass('open-navigation');
    });

    $('#logo a').on('click', function(e) {
        e.preventDefault();
        clickEl = 0;
        $('html, body').stop().animate( {scrollTop:0}, 500, 'swing', function() { 
        });
    })

});