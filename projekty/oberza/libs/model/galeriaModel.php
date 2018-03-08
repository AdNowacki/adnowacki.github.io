<?php

class galeriaModel extends Model {

	public $options = [ 'Table' => 'galeria', 'Redirect' => '', 'SearchCol' => '',];

	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$this->data['Title'] = ' - Galeria';
		$this->data['ogTitle'] = 'Zobacz wnętrza Aparthotelu Oberża i zarezerwuj swój wymarzony pokój.';
		$this->data['Description'] = 'Aparthotel o charakterze butikowym, w którym każdy pokój jest inny. Przestrzeń urzekającą dbałością o szczegóły.';
		$this->data['ogDescription'] = 'Aparthotel o charakterze butikowym, w którym każdy pokój jest inny. Przestrzeń urzekającą dbałością o szczegóły.';
		$this->data['Keywords'] = 'boutique hotel Kraków, aparthotel Kraków, zobacz, jak wyglądają apartamenty w Krakowie, hotel Kraków aparthotel Kraków, nocleg w Krakowie, pokoje , hotel butikowy, apartamenty kraków, pokoje, nocleg, noclegi, Kazimierz, boutique, pobyty, wczasy, urlop, weekend Kraków, city Kraków';
		$this->data['ogImage'] = 'http://aparthotel.oberza.pl/public/images/galeria-bg.jpg';

		if( Routing::$routing['param'] == 'pl' || Routing::$routing['param'] == 'en' ) {
			setcookie( COOKIE_LANG_NAME, Routing::$routing['param'], time()+157680000, '/' );
			header( "Location: " . BASE . Routing::$routing['controller'] . '/' . Routing::$routing['action'] );
			exit();
		}

		$sth = $this->pdo->prepare( "SELECT * FROM {$this->options['Table']} WHERE stat = '1' ORDER BY pozycja" );
		$sth->execute();
		$this->data['galeria'] = $sth->fetchAll( PDO::FETCH_ASSOC );
		// $id = (int)Routing::$routing['param'];

		// if( !$id ) {
		// 	header("Location: " . BASE . "galeria/kategorie");
		// 	exit();
		// }

		// $sth = $this->pdo->prepare( "SELECT * FROM galeria WHERE id = {$id} AND stat = '1' LIMIT 1" );
		// $sth->execute();
		// $this->data['galeria'] = $sth->fetch( PDO::FETCH_ASSOC );

		// $sth = $this->pdo->prepare( "SELECT *, DATE_FORMAT(data_dodania, '%d.%m.%Y') as data FROM zdjecia WHERE id_galerii = {$id} AND stat = '1' ORDER BY pozycja" );
		// if( !$sth->execute() )
		// 	throw new modelException( $this->data['dictionary'][97][LANG], 1 );

		// $this->data['zdjecia'] = $sth->fetchAll( PDO::FETCH_ASSOC );

	}

}
