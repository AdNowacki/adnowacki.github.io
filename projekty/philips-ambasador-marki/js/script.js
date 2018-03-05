$(document).ready(function(){

	$(".prod_lightbox").colorbox({rel:'prod_lightbox', transition:"elastic", fixed : true, scrolling : true, title : false});
	$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390, fixed : true, scrolling : true});
	// $(function() {
	// 	$("#osiagniecia_img div").tooltip();
	// });

	var tt_current = null;
	var ind = null;


	$('#log > div:eq(0)').click(function(event){
		event.stopPropagation();
		$('#h1').toggle();
	})

	$('body').click(function(e){
		if( e.target.nodeName != "H5" && e.target.nodeName != "FORM" && e.target.nodeName != "FIELDSET" && e.target.nodeName != "INPUT" && e.target.nodeName != "LABEL" && e.target.nodeName != "BUTTON" && e.target.nodeName != "A" )
			$('.log_hover').css('display','none');
	})

	// logowanie walidacje
	log_ = new Image();
	tool1 = new Image();
	tool2 = new Image();
	tool3 = new Image();
	log_.src = "images/l-box.png";
	tool1.src = 'images/tooltip1.png';
	tool2.src = 'images/tooltip2.png';
	tool3.src = 'images/tooltip3.png';

	var validateLogin = ['#email','#password'];
	var validateRejestracja = ['#email_rej','#kod'];


	function validator_( array ) {
		a = $(array[0]).val();
		b = $(array[1]).val();

		if( !a )
			$(array[0]).addClass('error')
		else
			$(array[0]).removeClass('error')
			
		if( !b )
			$(array[1]).addClass('error');
		else
			$(array[1]).removeClass('error');

		if( !a || !b )
			return false;
		else
			return true;
	}


	$('#logowanie').submit(function(){
		if( validator_( validateLogin ) == false )
			return false;
		return true;

	});

	$('#rejestracja').submit(function(){
		if( validator_( validateRejestracja ) == false )
			return false;
		return true;

	});



	// nazwa użytkownika
	$('#un_change').click(function(e){
		e.preventDefault();
		$('#inp_un').removeAttr('disabled').select();
	})


	// tooltip 
	$('#osiagniecia_img > div').mouseenter(function(e){
		e.stopPropagation();
		$('.tooltip').fadeOut(100);
		$(this).find('.tooltip').fadeIn(100);
	})


	$('#osiagniecia_img > div').mouseleave(function(e){
		e.stopPropagation();
		$(this).find('.tooltip').fadeOut(100);
	})

	$('.tooltip').mouseenter(function(e){
		e.stopPropagation();
		$('.tooltip').fadeOut(100);
	})

	$('#instr_toggle').click(function(){

		if( $(this).attr('class') == 'zwin' ) {
			a = $(this);
			$('#nagrody_instr').slideUp(300, 'swing', function(){
				a.attr('class','rozwin');
				a.addClass('radius_all').text('rozwiń');
			});
		}
		else if( $(this).hasClass('rozwin') ) {
			$('#nagrody_instr').slideDown(300, 'swing');
			$(this).attr('class','zwin');
			$(this).removeClass('radius_all').text('zwiń');
		}
	})

	$('#category').change(function(){
		$('#select').submit();
	});

	bodyH = $('body').height();
	$('#b_layer').height(bodyH - 100);

	$('#close').click(function(){
		$('#b_layer').fadeOut(400);
	})


})