!(function(){

  var colRect = $('.x-slider__rect');
  colRect.each(function(el){
    var rand = Math.random();
    if( rand > 0.5 )
      rand = 0.5;
    // $(this).css({top: rand+'%', opacity: 1});
    this.style.transitionDelay = rand + 's';
  });

  $('.x-slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    fade: true,
  });

  $('.x-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
    $('.x-slider__grid').addClass('x-move');
  });

  $('.x-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
    $('.x-slider__grid').removeClass('x-move');
  });

})();