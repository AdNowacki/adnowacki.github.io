$(document).ready(function(){


	var restriction = [
		"name",
		"email",
		"tel",
		"wiadomosc",
	];

	var preg = [
		/^.{3,40}$/,
		/^[a-zA-Z0-9\.\-_]+@[a-zA-Z0-9\.\-_]+\.[a-zA-Z0-9]{2,10}$/,
		/^[0-9\.\-\s]{9,30}$/,
		/^.{10,700}$/,
	];
	var error = [];
	var send = [];
	$("#f_contact").submit(function(){
		send = [];
		$('#f_contact p.error').remove();
		for( i=0; i<restriction.length; i++ ) {

			str = $("[name="+restriction[i]+"]").val();
			if( preg[i].test(str) == false ) {
				$("[name="+restriction[i]+"]").addClass('error');
				var placeholder = $("[name="+restriction[i]+"]").attr('placeholder');
				error[i] = "Nie wypełniono pola <strong>"+placeholder+"</strong>";
			}
			else {
				$("[name="+restriction[i]+"]").removeClass('error');
				error[i] = null;
			}
		}

		var s = 0;
		for(k=error.length;k>=0;k--){
			if( error[k] != null ) {
				send[s] = true;
				$('#f_contact').prepend("<p class='error'>" + error[k] + "</p>");
				s++;
			}
		}

		if( send.length > 0 )
			return false;

		return true;
	});


});




// <form method="post" id="f_contact">
//     <fieldset>
//         <input type="text" name="name" placeholder="Imię i nazwisko / Firma" />
//         <input type="text" name="email" placeholder="Email" />
//         <input type="text" name="tel" placeholder="Telefon" />
//         <textarea name="wiadomosc" placeholder="Wiadomość"></textarea>
//         <button type="send" name="form_send"><img src="images/send.jpg" alt="Wyślij" /></button>
//     </fieldset>
// </form>