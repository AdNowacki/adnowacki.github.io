$(document).ready(function(){
	l = new Image();
	l.src = "images/layer.png";
	f = new Image();
	f.src = "images/form_reg.png";


	validateArr = new Array( 'nazwa_sz', 'adres_sz', 'imie_zg', 'nazwisko_zg', 'telefon_zg', 'email_zg', 'login', 'haslo', 'powt_haslo', 'accept_reg' );
	error = new Array();
	

	var txt = '.{3,95}';
	var telefon = '^[0-9\-\s()\.+]{9,18}$';
	var mail = '[a-zA-Z0-9\.\-_]*@[a-zA-Z0-9\.\-_]*\.[a-zA-Z0-9\.\-_]{2,10}';
	
	function validateForm( selector, path ) {
		var v = $(selector).val();
		z = new RegExp( path, 'i' );
		res = z.test(v);
		if( res == false )
			$(selector).parent('.input').addClass('error');
		else
			$(selector).parent('.input').removeClass('error');
		return res;
	}


// rejestracja walidacja
	$('#f_reg').submit(function(){
		error[0] = validateForm( '#nazwa_sz', txt );
		error[1] = validateForm( '#adres_sz', txt );
		error[2] = validateForm( '#imie_zg', txt );
		error[3] = validateForm( '#nazwisko_zg', txt );
		error[4] = validateForm( '#telefon_zg', telefon );
		error[5] = validateForm( '#email_zg', mail );
		error[6] = validateForm( '#login', txt );
		error[7] = validateForm( '#haslo', txt );
		error[8] = validateForm( '#powt_haslo', txt );
		var check = $('#accept_reg:checked').val();
		if( check != 1 ) {
			$('.accept_reg').addClass('error');
			error[9] = false;
		}
		else {
			error[9] = true;
			$('.accept_reg').removeClass('error');
		}

		
		for( i=0; i<error.length; i++ ) {
			if( $('#f_reg .input.error').length > 0 || error[9] == false ) {
				$('#f_reg div.error_txt').css('display','block');
				return false;
			}

			$('#f_reg div.error_txt').css('display','none');
			return true;
		}
	});


// logowanie walidacja
	$('#f_log').submit(function(){
		error[0] = validateForm( '#log_login', txt );
		error[1] = validateForm( '#log_haslo', txt );

		for( i=0; i<error.length; i++ ) {
			if( $('#f_log .input.error').length > 0 ) {
				$('#f_log div.error_txt').css('display','block');
				return false;
			}

			$('#f_log div.error_txt').css('display','none');
			return true;
		}
	});


// głosowanie walidacja
	$('#f_vote').submit(function(){
		error[0] = validateForm( '#glos_imie', txt );
		error[1] = validateForm( '#glos_nazwisko', txt );
		error[2] = validateForm( '#glos_email', mail );
		var year = $('[name="year18"]:checked').val();
		var zgoda1 = $('#zgoda1:checked').val();
		var zgoda2 = $('#zgoda2:checked').val();
		var zgoda3 = $('#zgoda3:checked').val();

		if( year != 0 && year != 1 ) {$('.year').addClass('error');error[3] = false;}
		else {$('.year').removeClass('error');error[3] = true;}

		if( zgoda1 != 1 ) {$('#z1').addClass('error'); error[4] = false;}
		else {error[4] = true; $('#z1').removeClass('error');}

		if( zgoda2 != 1 ) {$('#z2').addClass('error'); error[5] = false;}
		else {error[5] = true; $('#z2').removeClass('error');}

		if( zgoda3 != 1 ) {$('#z3').addClass('error'); error[6] = false;}
		else {error[6] = true; $('#z3').removeClass('error');}

		
		for( i=0; i<error.length; i++ ) {
			if( $('#f_vote .input.error').length > 0 || error[4] == false || error[5] == false || error[6] == false ) {
				$('#f_vote div.error_txt').css('display','block');
				return false;
			}

			$('#f_vote div.error_txt').css('display','none');
			return true;
		}
	});

	// input file
	$('#f_doc [type="file"]').change(function(){
		var fn = $(this).val();
		parent = $(this).parent('.custom_f').parent('td').parent('tr');
		parent.find('.f_nazwa').text(fn);
		parent.find('.ch_f, .custom_f').css('display','none');
		parent.find('span:not(.ch_f)').css('display','inline');
	});

	$('.a_del').click(function(e){
		e.preventDefault();
		parent_ = $(this).parent('.is_file').parent('td').parent('tr');
		parent_.find('span').css('display','none');
		parent_.find('.f_nazwa').text("");
		parent_.find('.ch_f').css('display','block');
		parent_.find('.custom_f').css('display','inline');
		parent_.find('[type="file"]').attr('value','');
	});





	$('#zglos').click(function(e){e.preventDefault();$('.layer#registration').fadeIn(200);});
	$('#zag').click(function(e){e.preventDefault();$('.layer#vote').fadeIn(200);});


	$('.close_layer, [name="thx"]').click(function(){
		$('.layer').fadeOut(200);
	});

})