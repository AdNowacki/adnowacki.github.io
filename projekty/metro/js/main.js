!(function(){

  function randRect() {
    var colRect = $('.x-slider__rect');
    colRect.each(function(el){
      var rand = Math.random();
      if( rand > 0.5 )
        rand = 0.5;
      // $(this).css({top: rand+'%', opacity: 1});
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
    var title = $('.x-slider__title');
    var logo = $('.x-slider__logo');
    var el = $('.slick-active').attr('data-title-slide');
    title.removeClass('x-act');
    logo.removeClass('x-act');
    $('[data-title="'+ el +'"]').addClass('x-act');
  }

  function hideTitle() {
    var title = $('.x-slider__title');
    var logo = $('.x-slider__logo');
    title.removeClass('x-act');
    logo.removeClass('x-act');
  }

  randRect();
  showInitTitle();


  $('.x-slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 7000,
    fade: true,
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

})();