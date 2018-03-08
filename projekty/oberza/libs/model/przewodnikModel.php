<?php

class przewodnikModel extends Model {
	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$this->data['Title'] = ' - Przewodnik';
		$this->data['ogTitle'] = 'Przewodnik';
		$this->data['Description'] = 'Przewodnik';
		$this->data['ogDescription'] = 'Przewodnik';
		$this->data['ogImage'] = '';

		if( Routing::$routing['param'] == 'pl' || Routing::$routing['param'] == 'en' ) {
			setcookie( COOKIE_LANG_NAME, Routing::$routing['param'], time()+157680000, '/' );
			header( "Location: " . BASE . Routing::$routing['controller'] . '/' . Routing::$routing['action'] );
			exit();
		}
	}

}
