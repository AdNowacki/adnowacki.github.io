(function($){
    $('body').sakura();
})(jQuery);

window.addEventListener('load', function(){
    var npo = document.querySelector('.npo-background'),
        npot = document.querySelector('.npo-table'),
        im = document.querySelector('.npo-section-1 img');

    if( im ) {
        document.querySelector('.npo-section-1').style.minHeight = im.offsetHeight + 'px';
        document.querySelector('.npo-section-1 .npo-ctn').style.height = im.offsetHeight + 'px';
    }

    if( npo && npot ) {
        var wh = window.innerHeight,
            npoh = npo.offsetHeight;
        if( npoh < wh ) {
            var h = wh - npoh;
            npot.style.minHeight = h + 'px';
        }
    }
});

var modal = $('.modal');
var modalL = modal.length;
var p = $('#prods button');
p.on('click', function(e){
    e.preventDefault();
    var el = $(this).attr('data-target');
    console.log(el);
    $('.modal').removeClass('show');
    $('.modal[data-prod="'+el+'"]').addClass('show');
});
$('.modal button').on('click',function(e){
    e.preventDefault();
    $('.modal').removeClass('show');
});

var wH = window.innerHeight;
var currentTop = 0;
var section3 = document.querySelector('.npo-section-3');
var rect = section3.getBoundingClientRect().top;
var video = document.querySelector('video');
var anim = false;
var lastScrollTop = 0;

window.addEventListener('scroll', function(){
    currentTop =  window.pageYOffset || document.documentElement.scrollTop;
    if( currentTop >= ( rect + 450 ) && currentTop > lastScrollTop ) {
        video.play();
        anim = true;
    }
    lastScrollTop = currentTop;
})