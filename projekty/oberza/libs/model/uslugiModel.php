<?php

class uslugiModel extends Model {
	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$this->data['Title'] = ' - Usługi';
		$this->data['ogTitle'] = 'Oberża to nie tylko nocleg, sprawdź nasze dodatkowe usługi.';
		$this->data['Description'] = 'Pomożemy Ci zorganizować Twój wolny czas';
		$this->data['ogDescription'] = 'Pomożemy Ci zorganizować Twój wolny czas';
		$this->data['Keywords'] = 'śniadanie w cenie Kraków, Kraków śniadania, nocleg ze śniadaniem Kraków, nocleg ze śniadaniem Kazimierz, transfery lotniskowe, room service, top day tours, Auschwitz, Salt Mine, airport shuttles';
		$this->data['ogImage'] = 'http://aparthotel.oberza.pl/public/images/uslugi-bg.jpg';


		if( Routing::$routing['param'] == 'pl' || Routing::$routing['param'] == 'en' ) {
			setcookie( COOKIE_LANG_NAME, Routing::$routing['param'], time()+157680000, '/' );
			header( "Location: " . BASE . Routing::$routing['controller'] . '/' . Routing::$routing['action'] );
			exit();
		}
	}

}
