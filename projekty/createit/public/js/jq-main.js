$('.slider').slick({
    dots: true,
});

$('#totop').on('click',function(){
    $('html, body').animate({scrollTop: 0}, 500);
});