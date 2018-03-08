<?php

class admin_stronyModel extends Model {

	public $options = [ 'Table' => 'strony', 'Redirect' => 'admin_strony', 'SearchCol' => 'tytul_pl',];
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
		$search = ( $_GET['search'] ) ? " WHERE {$this->options['SearchCol']} REGEXP '" . trim( strip_tags( $_GET['search'] ) ) . "'" : '';

		$sth = $this->pdo->prepare( "SELECT * FROM {$this->options['Table']} {$search} ORDER BY pozycja LIMIT {$limit} OFFSET {$offset}" );
		$sth->execute();
		$this->data['strony'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $this->data['strony'] as &$aData ) {
			if( $aData['id_usera'] !== NULL ) {
				$sth = $this->pdo->prepare( "SELECT * FROM " . ADMIN_TABLE . " WHERE id = {$aData['id_usera']} LIMIT 1" );
				$sth->execute();
				$aData['user'] = $sth->fetch( PDO::FETCH_ASSOC );
			}
		}


		$sth = $this->pdo->prepare( "SELECT COUNT(*) as TOTAL FROM {$this->options['Table']} {$search}" );
		$sth->execute();
		$total = $sth->fetch( PDO::FETCH_ASSOC );
		$this->data['TOTAL'] = $total['TOTAL'];

	}

	function wlacz() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$id = (int)Routing::$routing['param'];
		$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET stat = '1' WHERE id = $id" );
		$sth->execute();

		if( $sth->rowCount() > 0 )
			$_SESSION[I_SUCCESS] = "Poprawnie włączono wpis";
		else
			$_SESSION[I_ERROR] = "Wystąpił problem z włączeniem wpisu";

		header( "Location: " . BASE . $this->options['Redirect'] );
		exit();
	}
	function wylacz() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->data['admin'] = true;
		$id = (int)Routing::$routing['param'];
		$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET stat = '0' WHERE id = $id" );
		$sth->execute();

		if( $sth->rowCount() > 0 )
			$_SESSION[I_SUCCESS] = "Poprawnie wyłączono wpis";
		else
			$_SESSION[I_ERROR] = "Wystąpił problem z wyłączeniem wpisu";

		header( "Location: " . BASE . $this->options['Redirect'] );
		exit();
	}
	function usun() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$id = (int)Routing::$routing['param'];
		$c = Routing::$routing['title'];

		if( $c != 'confirm' ) {
			header( "Location: " . BASE . $this->options['Redirect'] );
			exit();
		}

		$sth = $this->pdo->prepare( "SELECT pozycja FROM {$this->options['Table']} WHERE id = $id LIMIT 1" );
		$sth->execute();
		$this->data['pos'] = $sth->fetch( PDO::FETCH_ASSOC );
		$next = $this->data['pos']['pozycja'];

		$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET pozycja = ( pozycja - 1 ) WHERE pozycja > $next" );
		$sth->execute();

		$sth = $this->pdo->prepare( "DELETE FROM {$this->options['Table']} WHERE id = $id LIMIT 1" );
		$sth->execute();

		if( $sth->rowCount() > 0 ) {
			$_SESSION[I_SUCCESS] = "Poprawnie usunięto wpis";
		} else {
			$_SESSION[I_ERROR] = "Wystąpił problem z usunięciem wpisu";
		}

		header( "Location: " . BASE . $this->options['Redirect'] );
		exit();
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
			
		$this->data['strona'] = $sth->fetch( PDO::FETCH_ASSOC );


		if( $_POST['edit'] == 1 ) {
			$this->data['tytul_pl'] = strip_tags( trim( $_POST['tytul_pl'] ) );
			$this->data['zajawka_pl'] = trim( $_POST['zajawka_pl'] );
			$this->data['opis_pl'] = trim( $_POST['opis_pl'] );
			$this->data['stat'] = ( $_POST['stat'] ) ? 1 : 0;
			$this->data['menu_'] = ( $_POST['menu'] ) ? 1 : 0;

			// tworzę nazwę pliku na bazie tytułu artykułu
			$filename = $id . '-' . Helper::uri_string( $this->data['tytul_pl'] );
			// dodaję artykuł do bazy
			$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET tytul_pl = :tytul_pl, zajawka_pl = :zajawka_pl, tresc_pl = :tresc_pl, menu = '{$this->data[menu_]}', stat = '{$this->data[stat]}' WHERE id = {$id}" );
			
			if( $sth->execute( 
				[
					':tytul_pl' => $this->data['tytul_pl'], 
					':zajawka_pl' => $this->data['zajawka_pl'], 
					':tresc_pl' => $this->data['opis_pl'], 
				] ) 
				) {

				$_SESSION[I_SUCCESS] = "Poprawnie edytowano wpis";
			} else {
				$_SESSION[I_ERROR] = "Nie wprowadzono zmian we wpisie";
			}

			header( "Location: " . BASE . $this->options['Redirect'] );
			exit();
		}
	}

	function dodaj() {
		$this->getUser();
		$uid = $this->data['user_log']['id'];
		$id = (int)Routing::$routing['param'];
		$sth = $this->pdo->prepare( "SELECT * FROM kategorie_w WHERE typ = 'wydarzenia' AND stat = '1' ORDER BY nazwa_" . LANG );
		$sth->execute();
		$this->data['categories'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		if( $_POST['add'] == 1 ) {	
			$this->data['tytul_pl'] = strip_tags( trim( $_POST['tytul_pl'] ) );
			$this->data['zajawka_pl'] = trim( $_POST['zajawka_pl'] );
			$this->data['opis_pl'] = trim( $_POST['opis_pl'] );
			$this->data['stat'] = ( $_POST['stat'] ) ? 1 : 0;
			$this->data['menu_'] = ( $_POST['menu'] ) ? 1 : 0;

			if( !$_POST['tytul_pl'] )
				throw new modelException( "Nie wprowadzono tytułu wpisu", 1 );

			// dodaję artykuł do bazy
			$sth = $this->pdo->prepare( "INSERT INTO {$this->options['Table']} (id_usera, tytul_pl, zajawka_pl, tresc_pl, data_dodania, pozycja, menu, stat ) VALUES( {$uid}, :tytul_pl, :zajawka_pl, :tresc_pl, NOW(), 1, '{$this->data[menu_]}', '{$this->data[stat]}' )" );
			$sth->execute( 
				[
					':tytul_pl' => $this->data['tytul_pl'], 
					':zajawka_pl' => $this->data['zajawka_pl'], 
					':tresc_pl' => $this->data['opis_pl'], 
				]
			 );

			if( $sth->rowCount() > 0 ) {
				$lastId = $this->pdo->lastInsertId();
				// update poazycji starych artykułów
				$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET pozycja = (pozycja+1) WHERE id <> {$lastId}" );
				$sth->execute();
				$_SESSION[I_SUCCESS] = "Poprawnie dodano wpis";

			} else {
				throw new modelException( "Wystąpił problem z dodaniem wpisu", 1 );
				$_SESSION[I_ERROR] = "Wystąpił problem z dodaniem aktualnosci";
			}

			header( "Location: " . BASE . $this->options['Redirect'] );
			exit();

		}
	}

	function dol() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$id = (int)Routing::$routing['param'];

		$sth = $this->pdo->prepare( "SELECT pozycja FROM {$this->options['Table']} WHERE id = $id LIMIT 1" );
		$sth->execute();
		$this->data['pos'] = $sth->fetch( PDO::FETCH_ASSOC );
		$next = $this->data['pos']['pozycja'] + 1;

		$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET pozycja = ( pozycja - 1 ) WHERE pozycja = $next LIMIT 1" );
		$sth->execute();

		$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET pozycja = ( pozycja + 1 ) WHERE id = $id LIMIT 1" );
		$sth->execute();

		if( $sth->rowCount() > 0 )
			$_SESSION[I_SUCCESS] = "Poprawnie zmieniono pozycję wpisu";
		else
			$_SESSION[I_ERROR] = "Wystąpił problem ze zmianą pozycji wpisu";
		header( "Location: " . BASE . $this->options['Redirect'] );		
		exit();
	}

	function gora() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$id = (int)Routing::$routing['param'];

		$sth = $this->pdo->prepare( "SELECT pozycja FROM {$this->options['Table']} WHERE id = $id LIMIT 1" );
		$sth->execute();
		$this->data['pos'] = $sth->fetch( PDO::FETCH_ASSOC );
		$prev = $this->data['pos']['pozycja'] - 1;

		$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET pozycja = ( pozycja + 1 ) WHERE pozycja = $prev LIMIT 1" );
		$sth->execute();

		$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET pozycja = ( pozycja - 1 ) WHERE id = $id LIMIT 1" );
		$sth->execute();

		if( $sth->rowCount() > 0 )
			$_SESSION[I_SUCCESS] = "Poprawnie zmieniono pozycję wpisu";
		else
			$_SESSION[I_ERROR] = "Wystąpił problem ze zmianą pozycji wpisu";

		header( "Location: " . BASE . $this->options['Redirect'] );
		exit();
	}
}
