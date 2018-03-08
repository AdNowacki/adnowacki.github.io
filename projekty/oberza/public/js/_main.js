'use strict';
/*blokowanie wyświetlania w iframe*/
if (top.location != self.location) {
    top.location.href = self.location;
}

$(window).on('load',function(){
    var ee = setTimeout(function(){
        if( $('.grid-gallery').length > 0 ) {
            $('.grid-gallery').masonry({
                itemSelector: 'a',
                // columnWidth: 200
            });
        }

        if( $('.grid-gallery-txt').length > 0 ) {
            $('.grid-gallery-txt').masonry({
                itemSelector: 'figure',
                // columnWidth: 200
            });
        }
        clearTimeout(ee);
    },500);
})

;(function(){

    var video = document.getElementById('banner-video');
    if( video ) {
        video.addEventListener('timeupdate', function() { 
            if( this.currentTime >= ( this.duration - 2 ) )
                this.pause();
            // this.currentTime = this.duration - 1; 
        }, false);
    }

    var moreLinks = $('.show-content');
    var ctnClose = $('#ctn-close');

    if( $('.lightbox').length > 0 ) {
        $('.lightbox').magnificPopup(
            {
                type:'image',
                // delegate: 'a',
                gallery: {
                    enabled: true,
                },
                zoom: {
                    enabled: true,
                    duration: 300, // don't foget to change the duration also in CSS
                    opener: function(element) {
                        return element.find('img');
                    }
                }
            }
        );
    }

    $('.slick-slider').slick();
    $('.room-figure').slick();

    moreLinks.on('click',function(e){
        e.preventDefault();
        var t_ = $(this).attr('data-ctn');
        $('body').addClass('show-more-ctn');
        $('[data-detail-item]').removeClass('show');
        $('[data-detail-item='+t_+']').addClass('show');
    });
    ctnClose.on('click',function() {
        $('body').removeClass('show-more-ctn');
        $('[data-detail-item]').removeClass('show');
    });

    $('.more-details').on('click',function(e){
        if( !$(e.target).hasClass('more-details-ctn-item') && $(e.target)[0].nodeName != 'P' && $(e.target)[0].nodeName != 'H2' ) {
            $('body').removeClass('show-more-ctn');
            $('[data-detail-item]').removeClass('show');
        }
    })


    var animElem = {
        section1 : {
            name : 'home',
            image : '',
            dom : '',
            ctx : '',
            left : 0,
            top : 0,
            leftStop : -180,
            topStop : -62,
            speedX : .3,
            speedY : .1,
            draw : false,
            sec : '',
        },

        section2 : {
            name : 'hotel',
            image : '',
            dom : '',
            ctx : '',
            left : 0,
            top : 0,
            leftStop : 190,
            topStop : -59,
            speedX : .3,
            speedY : .1,
            draw : false,
            sec : '',
        },

        section3 : {
            name : 'kazimierz',
            image : '',
            dom : '',
            ctx : '',
            left : 0,
            top : 0,
            leftStop : -4,
            topStop : -210,
            speedX : .3,
            speedY : .3,
            draw : false,
            sec : '',
        },
        section4 : {
            name : 'krakow',
            image : '',
            dom : '',
            ctx : '',
            left : 0,
            top : 0,
            leftStop : 180,
            topStop : -60,
            speedX : .3,
            speedY : .1,
            draw : false,
            sec : '',
        },

        section5 : {
            name : 'booking',
            image : '',
            dom : '',
            ctx : '',
            left : 0,
            top : 0,
            leftStop : -180,
            topStop : -59,
            speedX : .3,
            speedY : .1,
            draw : false,
            sec : '',
        },
    }

    animElem.section1.image = new Image();
    animElem.section2.image = new Image();
    animElem.section3.image = new Image();
    animElem.section4.image = new Image();
    animElem.section5.image = new Image();
    animElem.section1.image.src = 'http://aparthotel.oberza.pl/public/images/image-bg-1.jpg';
    animElem.section2.image.src = 'http://aparthotel.oberza.pl/public/images/image-bg-2.jpg';
    animElem.section3.image.src = 'http://aparthotel.oberza.pl/public/images/image-bg-3.jpg';
    animElem.section4.image.src = 'http://aparthotel.oberza.pl/public/images/image-bg-4.jpg';
    animElem.section5.image.src = 'http://aparthotel.oberza.pl/public/images/image-bg-5.jpg';

    animElem.section1.image.onload = function() {
        setCtx( 'section1', 'ctx1' );
        drawStatic('section1');
    }

    animElem.section2.image.onload = function() {
        setCtx( 'section2', 'ctx2' );
        drawStatic('section2');
    }

    animElem.section3.image.onload = function() {
        setCtx( 'section3', 'ctx3' );
        drawStatic('section3');
    }

    animElem.section4.image.onload = function() {
        setCtx( 'section4', 'ctx4' );
        drawStatic('section4');
    }

    animElem.section5.image.onload = function() {
        setCtx( 'section5', 'ctx5' );
        drawStatic('section5');
    }



    var deleteLog = false;
    $('#fullpage').fullpage({
        sectionsColor: ['#000000', '#000000', '#000000', '#000000', '#000000'],
        anchors: ['home', 'hotel', 'kazimierz', 'krakow', 'booking'],
        menu: '#menu',
        normalScrollElements: '.more-details',
        onLeave: function(index, nextIndex, direction){
            if(deleteLog){
                $('#callbacksDiv').html('');
            }
            $('#callbacksDiv').append('<p>onLeave - index:' + index + ' nextIndex:' + nextIndex + ' direction:' + direction + '</p>')
            // console.log("onLeave--" + "index: " + index + " nextIndex: " + nextIndex + " direction: " +  direction);
        },
        onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex){
            if(deleteLog){
                $('#callbacksDiv').html('');
            }
            $('#callbacksDiv').append('<p>onSlideLeave - anchorLink:' + anchorLink + " index:" + index + " slideIndex:" + slideIndex +" direction:" + direction + " nextSlideIndex:" + nextSlideIndex + '</p>');
            // console.log("onSlideLeave--" + "anchorLink: " + anchorLink + " index: " + index + " slideIndex: " + slideIndex + " direction: " + direction);
        },
        afterRender: function(){
            $('#callbacksDiv').append('<p>afterRender</p>');
            // console.log("afterRender");
        },
        afterResize: function(){
            $('#callbacksDiv').append('<p>afterResize</p>');
            // console.log("afterResize");
        },
        afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex){
            $('#callbacksDiv').append('<p>afterSlideLoad - anchorLink:' + anchorLink + " index:" + index + " slideAnchor:" + slideAnchor +" slideIndex:" + slideIndex + '</p>');
            deleteLog = true;
            // console.log("afterSlideLoad--" + "anchorLink: " + anchorLink + " index: " + index + " slideAnchor: " + slideAnchor + " slideIndex: " + slideIndex);
            // console.log("----------------");
        },
        afterLoad: function(anchorLink, index){
            $('[data-menuanchor]').find('a').removeClass('act');
            $('[data-menuanchor='+anchorLink+']').find('a').addClass('act');
            // $('[data-index="'+index+'"]').find('img').css('display', 'none');
            if( !$('[data-index="'+index+'"]').hasClass('show-txt') )
                $('[data-index="'+index+'"]').addClass('show-txt');

            if( anchorLink == 'home' ) {
                $('.scroll-info').removeClass('scale');
            } else {
                $('.scroll-info').addClass('scale');
            }

            if( anchorLink == 'booking' )
                $('.scroll-info').css('display', 'none');
            else
                $('.scroll-info').css('display', 'block');

            var ind = 'section' + index,
                c = 'ctx' + index;
      
            if( animElem[ind].image.width ) {
                setCtx( ind, c );
                draw(ind);
            } else {
                animElem[ind].image.onload = function() {
                    setCtx( ind, c );
                    draw(ind);
                }
            }

        }
    });



    function setCtx( section, idDOM ) {
        animElem[section].sec = section;
        animElem[section].dom = document.getElementById(idDOM);
        animElem[section].dom.width = animElem[section].image.width;
        animElem[section].dom.height = animElem[section].image.height;
        animElem[section].ctx = animElem[section].dom.getContext('2d');
    }


    function draw( section ) {
        var sec = animElem[section].sec;
        if( animElem[sec].leftStop < 0 )
        	animElem[sec].left -= animElem[sec].speedX;
        else
        	animElem[sec].left += animElem[sec].speedX;

        if( animElem[sec].topStop < 0 )
        	animElem[sec].top -= animElem[sec].speedY;
        else
        	animElem[sec].top += animElem[sec].speedY;

        if( animElem[sec].leftStop < 0 ) {
	        if( ( animElem[sec].left <= animElem[sec].leftStop && animElem[sec].leftStop != 0 ) )
	            animElem[sec].left = animElem[sec].leftStop;
        } else {
        	if( ( animElem[sec].left >= animElem[sec].leftStop && animElem[sec].leftStop != 0 ) )
	            animElem[sec].left = animElem[sec].leftStop;
        }
        
        if( animElem[sec].topStop < 0 ) {	
        	if( ( animElem[sec].top <= animElem[sec].topStop && animElem[sec].topStop != 0 ) )
            	animElem[sec].top = animElem[sec].topStop;
        } else {
        	if( ( animElem[sec].top >= animElem[sec].topStop && animElem[sec].topStop != 0 ) )
            	animElem[sec].top = animElem[sec].topStop;
        }
            
        animElem[sec].ctx.clearRect(0, 0, animElem[sec].image.width, animElem[sec].image.height);
        animElem[sec].ctx.drawImage(animElem[sec].image, animElem[sec].left, animElem[sec].top, animElem[sec].image.width, animElem[sec].image.height);
        window.requestAnimationFrame( function() {
            draw( sec );
        } );
    }



    function drawStatic( s ) {
        animElem[s].ctx.clearRect(0, 0, animElem[s].image.width, animElem[s].image.height);
        animElem[s].ctx.drawImage(animElem[s].image, animElem[s].left, animElem[s].top, animElem[s].image.width, animElem[s].image.height);
    }

    // lang
    $('.lang button').on('click', function() {
        $('.lang').toggleClass('open');
    });

    $('#fullpage').on('click',function(){
        $('.lang').removeClass('open');

    });

    $('#menunav').on('click', function() {
        $('body').toggleClass('open-menu-ctn');
        if( $('body').hasClass('open-menu-ctn') )
            $('#menunav span').text( $(this).attr('data-close') );
        else
            $('#menunav span').text( $(this).attr('data-open') );
    });

    $('.submenu').on('click', function() {
        $(this).addClass('hide-e');
        $('.submenu-ctn').addClass('open');
    });

// kalendarz i ludzie
    function dateFormat(t) {
        var th = t;
        var date = th.val();
        date = date.split('-');
        var p = th.parents('.input-date');
        p.find('.date').text(date[2]);
        var m = 'm'+date[1];
        p.find('.date-month').text(months_[m]);
    }

    var months_ = {
        'm01' : 'styczeń',
        'm02' : 'luty',
        'm03' : 'marzec',
        'm04' : 'kwiecień',
        'm05' : 'maj',
        'm06' : 'czerwiec',
        'm07' : 'lipiec',
        'm08' : 'sierpień',
        'm09' : 'wrzesień',
        'm10' : 'październik',
        'm11' : 'listopad',
        'm12' : 'grudzień',
    }


    var now = Date.parse('today'),
        nowDD = now.getDate(),
        nowMM = now.getMonth()+1,
        nowYYYY = now.getFullYear();

        if( nowDD < 10 )
            nowDD = '0' + nowDD;
        if( nowMM < 10 )
            nowMM = '0' + nowMM;

    var tommorow = Date.parse('tomorrow'),
        tommorowDD = tommorow.getDate(),
        tommorowMM = tommorow.getMonth()+1,
        tommorowYYYY = tommorow.getFullYear();

        // console.log(tommorow);

    if( tommorowDD < 10 )
        tommorowDD = '0' + tommorowDD;
    if( tommorowMM < 10 )
        tommorowMM = '0' + tommorowMM;

    $('[data-toggle="datepicker"]').datepicker({
        format: 'yyyy-mm-dd',
        weekStart : 1,
        
    });

    $('#start').val( nowYYYY + '-' + nowMM + '-' + nowDD );
    $('#stop').val( tommorowYYYY + '-' + tommorowMM + '-' + tommorowDD );

    var d = $('.input-opacity-0');
    var dLength = d.length;
    for( var i = 0; i<dLength; i++ ) {
        dateFormat($('.input-opacity-0').eq(i));
    }

    $('[data-toggle="datepicker"]').on('change', function(){
        var _this_ = $(this);
        dateFormat(_this_);
    });

    $('.booking-calendar button').on('click', function(e){
        e.preventDefault();
        var btn = $(this);
        var v = btn.parents('.input-text-date');
        var val = v.find('.date-person');
        var valInt = parseInt( val.text() );
        if( btn.attr('data-action') == 'add' ) {
            val.text(++valInt);
        }

        if( btn.attr('data-action') == 'sub' ) {
            if( valInt <= 0 )
                return;
            val.text(--valInt);
        }

        var newTxt = parseInt( val.text() );
        val.parents('.input-date-person').find('input').val( newTxt );
    });

    // secret deal
    var sBtn = $('#sformbtn'),
        sForm = $('#sform'),
        sCloseBtn = $('#sclose');

    sBtn.on('click', function() {
        sForm.toggleClass('open');
    });

    sCloseBtn.on('click',function(e){
        e.preventDefault();
        sForm.removeClass('open');
    });

    if( $(window).width() > 768 ) {   
        $(".page-image img").velocity({
            left: "-200px",
        }, {
        duration: 16000, 
        easing: "linear"
        } ); 
    }

    $(window).on('scroll',function(){
        if( $(window).scrollTop() >= 200 ) {
            $('body').addClass('t200');
        }
    });

    $('.pl-btn').on('click',function(){
        $('.pl-btn').removeClass('act').css('font-weight', '400');
        $(this).addClass('act').css('font-weight', '700');
    });

    $('#menunav').on('click',function(e){
        e.preventDefault();
    });

    $('#froom').on('click',function(){
        $('.fsub').toggleClass('show-room');
    });

    $('.scroll-info').on('click', function() {
        $.fn.fullpage.moveSectionDown();
    });

    $('[href="#bookingpage"]').on('click',function(e){
        e.preventDefault();
        var oTop = $('.booking-black').offset().top;
        $('body').removeClass('open-menu-ctn');
        $('#menunav span').text( $('#menunav').attr('data-open') );
        $('html, body').stop().animate({scrollTop: oTop}, 900, 'swing', function() {});
    })

    $('[href="#booking"]').on('click',function(e){
        $('body').removeClass('open-menu-ctn');
        $('#menunav span').text( $('#menunav').attr('data-open') );
    });

    $('.plcategory_link').on('click',function(e){
        e.preventDefault();
        var t = $(this).attr('data-cat');
        $('.plcategory_td a').removeClass('act');
        $(this).addClass('act');
        $('.plsub_item').css('display', 'none');
        $('.plsub_item[data-cat-target="' + t + '"]').css('display', 'block');

    })
    
})();

