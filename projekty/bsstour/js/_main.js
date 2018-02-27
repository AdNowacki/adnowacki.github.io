var setContent = function() {
	var $Map = $('.bss-map');
	if( $(window).width() > 768 )
		$Map.css('min-height', $('html').height() + 'px');

}

setContent();
$(window).on('resize', setContent);

$('#read, #close, .overlay').on('click', function(){
	$('body').toggleClass('read-open');
});

