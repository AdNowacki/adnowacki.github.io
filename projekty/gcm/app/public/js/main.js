(function(){
    var body = document.body,
        html = document.documentElement,
        langBtn = document.getElementById('l-change'),
        langsComponent = document.querySelector('.langs');
        

    function removeClass(element, target, removeClass, conditionClass) {
        if( element ) {
            element.addEventListener('click', function(e){
                if( !e.target.classList.contains( conditionClass ) ) {
                    target.classList.remove( removeClass );
                }
            });
        }
    }


    if( langBtn ) {
        langBtn.addEventListener('click', function(){
            langsComponent.classList.toggle('open');
        });
    }

    removeClass(
        document.querySelector('.x-header'),
        langsComponent,
        'open',
        'x-prevent'
    );

})();


// jQuery

function setDarkCol() {
    if( $(window).width < 967 )
        return;

    var t = $('.x-t-res--small .x-td-1');
    if( !t )
        return;

    var tW = t.width() + 15;

    $('.dark-col').css({'width':tW+'px'});
}

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('[data-link]').each(function () {
        var currLink = $(this);
        var refElement = $('[data-section=' + currLink.attr("data-link") + ']');
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('[data-link]').removeClass("act");
            currLink.addClass("act");
        }
        else{
            currLink.removeClass("act");
        }
    });
}

function setHeightMega() {
    if( $(window).width() < 768 )
        return;

    var lH = $('.x-mega-nav__links').outerHeight(true);
    var mH = $('.x-mega-nav').height();

    if( lH >= mH )
        $('body').addClass('open-mega--small');
    else
        $('body').addClass('open-mega--remove');
}

// vars
var navMega1 = $('.x-mega-nav__1st--submenu'),
    body = $('body'),
    mmBtn = $('#btn-mm'),
    mmTxt = $('.btn-mm__txt');


// header slider
$('.x-slider').slick({
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    arrows: true,
});

if( window.innerWidth > 1024 ) {
    var sOptions = {
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: true,
        centerMode: true,
        arrows: true,
    };
    var rOptions = {
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        arrows: true,
        arrows: true,
    }
} else {
    var sOptions = {
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        centerMode: true,
        arrows: true,
    };

    var rOptions = {
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        arrows: true,
    }
}

$('.x-cat__slider, .x-ctn-slider').slick(sOptions);
$('.x-m-slider').slick(rOptions);

// submenu
navMega1.on('click', function(e){
    e.preventDefault();
    navMega1.removeClass('act');
    $(this).addClass('act');
});

// maganav btn
mmBtn.on('click', function(){
    var txt = $(this).attr('data-txt');
    txt = JSON.parse(txt);
    if( body.hasClass('open-mega') ) {
        var insertTxt = txt.open;
    } else {
        var insertTxt = txt.close;
    }
    body.toggleClass('open-mega');
    mmTxt.text(insertTxt);
});

// countdown

$("[data-time]").each(function(){
    var date = $(this).attr("data-time");
    if( $(this).attr("data-format") == "true" ) {
        var format = '%D d %H godz %M min %S sek';
    } else {
        var format = '%D:%H:%M:%S';
    }

    $(this).countdown(date, function(event) {
        $(this).html(event.strftime(format));
    });
});

// media filter
var filters = $('[data-filter]');
var mediaTypes = $('[data-type]');
filters.on('click', function(e){
    e.preventDefault();
    filters.removeClass('act');
    $(this).addClass('act');

    var f = $(this).attr('data-filter');
    if( f == 0 ) {
        mediaTypes.css({'display': 'block'});
    } else {
        mediaTypes.css({'display': 'none'});
        $('[data-type="'+f+'"]').css({'display': 'block'});
    }
})

setDarkCol();
setHeightMega();
$(window).on('resize', setDarkCol);
$(window).on('resize', setHeightMega);
$(window).on('scroll', onScroll); 

$(window).on('resize', function() {
    var ww = $(window).width();
    if( ww > 1024 ) {
        var sOptions = {
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            arrows: true,
            centerMode: true,
            arrows: true,
        };
        var rOptions = {
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 2,
            arrows: true,
            arrows: true,
        }
    } else {
        var sOptions = {
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            centerMode: true,
            arrows: true,
        };
    
        var rOptions = {
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            arrows: true,
        }
    }
    $('.x-cat__slider, .x-ctn-slider, .x-m-slider').slick('unslick');
    $('.x-cat__slider, .x-ctn-slider').slick(sOptions);
    $('.x-m-slider').slick(rOptions);
});


// regulamin nav

$('[data-link]').on('click', function(e){
    e.preventDefault();
    $('[data-link]').removeClass('act');
    $(this).addClass('act');

    var target = $(this).attr('data-link');
    if( !$('[data-section='+target+']') )
        return;

    $('html, body').animate({
        scrollTop: $('[data-section='+target+']').offset().top
    },400)

});



