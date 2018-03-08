<?php

class kontaktModel extends Model {
	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$this->data['Title'] = ' - Kontakt';
		$this->data['ogTitle'] = 'Skontaktuj się z nami';
		$this->data['Description'] = 'Zadzwoń lub napisz do nas chcąc uzyskać więcej szczegółów  ';
		$this->data['ogDescription'] = 'Zadzwoń lub napisz do nas chcąc uzyskać więcej szczegółów  ';
		$this->data['Keywords'] = 'rezerwuj pokój, telefon, numer telefonu oberża, adres mailowy, tanie pokoje Kraków, kontakt.';
		$this->data['ogImage'] = 'http://aparthotel.oberza.pl/public/images/kontakt-bg.jpg';


		if( Routing::$routing['param'] == 'pl' || Routing::$routing['param'] == 'en' ) {
			setcookie( COOKIE_LANG_NAME, Routing::$routing['param'], time()+157680000, '/' );
			header( "Location: " . BASE . Routing::$routing['controller'] . '/' . Routing::$routing['action'] );
			exit();
		}
	}

}
