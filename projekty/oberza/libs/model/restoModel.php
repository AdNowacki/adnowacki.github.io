<?php

class restoModel extends Model {
	function index() {
		// var_dump( "Model" );
	}

	function widok() {

		$this->data['Title'] = ' - Resto';
		$this->data['ogTitle'] = 'Tradycyjna polska kuchnia w nowoczesnym wydaniu.';
		$this->data['Description'] = 'Spróbuj naszych dań, polecanych w przewodniku Michelin. Bogate menu i obszerna karta win.';
		$this->data['ogDescription'] = 'Spróbuj naszych dań, polecanych w przewodniku Michelin. Bogate menu i obszerna karta win.';
		$this->data['Keywords'] = 'restauracja Kraków, polska kuchnia, Michelin, tripadvisor Kraków, tripadvisor Kazimierz, gdzie na obiad Kraków, gęś Kazimierz, jagnięcina Kraków, polecane restauracje Kraków, polecane restauracje Kazimierz, wino Kraków, enoteka Kraków';
		$this->data['ogImage'] = 'http://aparthotel.oberza.pl/public/images/restauracja-bg.jpg';


		if( Routing::$routing['param'] == 'pl' || Routing::$routing['param'] == 'en' ) {
			setcookie( COOKIE_LANG_NAME, Routing::$routing['param'], time()+157680000, '/' );
			header( "Location: " . BASE . Routing::$routing['controller'] . '/' . Routing::$routing['action'] );
			exit();
		}
	}

}
