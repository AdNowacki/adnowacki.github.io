<?php

class admin_konfiguracjaModel extends Model {

	public $options = [ 'Table' => 'config_page', 'Redirect' => 'admin_konfiguracja', 'SearchCol' => 'tytul_pl',];
	public $data = [ 'admin' => true ];

	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$this->getUser();
		$client = (int)$_SESSION[AUTH_SESSION_NAME]['client'];
		$uid = (int)$_SESSION[AUTH_SESSION_NAME]['im'];

		$limit = PERPAGE;
		$offset = ( !$_GET['p'] ) ? 0 : ( (int)$_GET['p'] - 1 ) * PERPAGE;
		$this->options['SearchCol'] = 'tytul_' . LANG;

		$this->data['search'] = trim( strip_tags( $_GET['search'] ) );
		$s = trim( strip_tags( $_GET['search'] ) );
		$search = ( $_GET['search'] ) ? " WHERE nazwa REGEXP '{$s}' OR pl REGEXP '{$s}' OR en REGEXP '{$s}'" : '';

		$sth = $this->pdo->prepare( "SELECT * FROM {$this->options['Table']} {$search} ORDER BY id LIMIT {$limit} OFFSET {$offset}" );
		$sth->execute();
		$this->data['config'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		$sth = $this->pdo->prepare( "SELECT COUNT(*) as TOTAL FROM {$this->options['Table']} {$search}" );
		$sth->execute();
		$total = $sth->fetch( PDO::FETCH_ASSOC );
		$this->data['TOTAL'] = $total['TOTAL'];

	}

	function edytuj() {
		$this->getUser();
		$id = (int)Routing::$routing['param'];

		if( !$id )
			throw new modelException( "Brak wymaganego parametru", 1 );
			
		$sth = $this->pdo->prepare( "SELECT * FROM {$this->options['Table']} WHERE id = $id LIMIT 1" );
		$sth->execute();

		if( $sth->rowCount() < 1 )
			throw new modelException( "Szukany wpis nie istnieje", 1);
			
		$this->data['config'] = $sth->fetch( PDO::FETCH_ASSOC );

		if( $_POST['edit'] == 1 ) {
			$this->data['nazwa'] = strip_tags( trim( $_POST['nazwa'] ) );
			$this->data['pl'] = trim( $_POST['pl'] );

			// tworzę nazwę pliku na bazie tytułu artykułu
			$filename = $id . '-' . Helper::uri_string( $this->data['tytul_pl'] );
			// dodaję artykuł do bazy
			$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET nazwa = :nazwa, pl = :pl WHERE id = {$id}" );
			
			if( $sth->execute( [':nazwa' => $this->data['nazwa'], ':pl' => $this->data['pl'],] ) ) {
				if( !$_SESSION[I_ERROR] && !$_SESSION[I_INFO] )
					$_SESSION[I_SUCCESS] = "Poprawnie edytowano wpis";
			} else {
				$_SESSION[I_ERROR] = "Nie wprowadzono zmian we wpisie";
			}

			$backPage = ( Routing::$routing['title'] ) ? '?p=' . (int)Routing::$routing['title'] : '';
			header( "Location: " . BASE . $this->options['Redirect'] . $backPage );
			exit();
		}
	}

	function dodaj() {
		$this->getUser();
		$uid = $this->data['user_log']['id'];
		$id = (int)Routing::$routing['param'];
		$sth = $this->pdo->prepare( "SELECT * FROM kategorie WHERE typ = 'artykul' AND stat = '1' ORDER BY nazwa_" . LANG );
		$sth->execute();
		$this->data['categories'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		if( $_POST['add'] == 1 ) {	
			$this->data['tytul_pl'] = strip_tags( trim( $_POST['tytul_pl'] ) );
			$this->data['zajawka_pl'] = trim( $_POST['zajawka_pl'] );
			$this->data['opis_pl'] = trim( $_POST['opis_pl'] );
			$this->data['zrodlo'] = trim( $_POST['zrodlo'] );
			$this->data['issue'] = trim( $_POST['issue'] );
			$this->data['tagi'] = str_replace( ';' , ',', trim( $_POST['tagi'] ) );
			$this->data['tagi'] = str_replace( '#' , ',', $this->data['tagi'] );
			$this->data['dostep'] = $_POST['dostep'] = ( $_POST['dostep'] ) ? 1 : 0;

			if( !$_POST['tytul_pl'] )
				throw new modelException( "Nie wprowadzono tytułu wpisu", 1 );

			// tworzę nazwę pliku na bazie tytułu artykułu
			$filename = Helper::uri_string( $this->data['tytul_pl'] );
			// dodaję artykuł do bazy
			$sth = $this->pdo->prepare( "INSERT INTO {$this->options['Table']} (id_usera, tytul_pl, zajawka_pl, tresc_pl, data_dodania, zrodlo, ograniczony_dostep, tagi, issue, pozycja ) VALUES( {$uid}, :tytul_pl, :zajawka_pl, :tresc_pl, NOW(), :zrodlo, '{$this->data[dostep]}', :tagi, :issue, 1 )" );
			$sth->execute( 
				[
					':tytul_pl' => $this->data['tytul_pl'], 
					':zajawka_pl' => $this->data['zajawka_pl'], 
					':tresc_pl' => $this->data['opis_pl'], 
					':zrodlo' => $this->data['zrodlo'], 
					':tagi' => $this->data['tagi'],
					':issue' => $this->data['issue'],
				]
			 );

			if( $sth->rowCount() > 0 ) {
				if( !$_SESSION[I_ERROR] && !$_SESSION[I_INFO] )
					$_SESSION[I_SUCCESS] = "Poprawnie dodano wpis";
			} else {
				throw new modelException( "Wystąpił problem z dodaniem wpisu", 1 );
				$_SESSION[I_ERROR] = "Wystąpił problem z dodaniem aktualnosci";
			}

			header( "Location: " . BASE . $this->options['Redirect'] );
			exit();

		}
	}
}
