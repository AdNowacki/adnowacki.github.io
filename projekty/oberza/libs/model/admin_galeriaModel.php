<?php

class admin_galeriaModel extends Model {

	public $options = [ 'Table' => 'galeria', 'Redirect' => 'admin_galeria', 'SearchCol' => 'tytul_pl',];
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
		$this->options['SearchCol'] = 'imie';

		$this->data['search'] = trim( strip_tags( $_GET['search'] ) );
		$search = ( $_GET['search'] ) ? " WHERE tytul_pl REGEXP '" . trim( strip_tags( $_GET['search'] ) ) . "'" : '';

		$sth = $this->pdo->prepare( "SELECT * FROM {$this->options['Table']} {$search} ORDER BY pozycja LIMIT {$limit} OFFSET {$offset}" );
		$sth->execute();
		$this->data['galeria'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $this->data['galeria'] as &$aData ) {
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

		$sth = $this->pdo->prepare( "SELECT image, pozycja FROM {$this->options['Table']} WHERE id = $id LIMIT 1" );
		$sth->execute();
		$this->data['pos'] = $sth->fetch( PDO::FETCH_ASSOC );
		$next = $this->data['pos']['pozycja'];

		$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET pozycja = ( pozycja - 1 ) WHERE pozycja > $next" );
		$sth->execute();

		$sth = $this->pdo->prepare( "DELETE FROM {$this->options['Table']} WHERE id = $id LIMIT 1" );
		$sth->execute();

		if( $sth->rowCount() > 0 ) {
			$_SESSION[I_SUCCESS] = "Poprawnie usunięto wpis";
			@unlink( "userfiles/images/galeria/" . $this->data['pos']['image'] );
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
			
		$this->data['galeria'] = $sth->fetch( PDO::FETCH_ASSOC );

		$sth = $this->pdo->prepare( "SELECT * FROM kategorie_galeria WHERE stat = '1' ORDER BY nazwa_" . LANG );
		$sth->execute();
		$this->data['categories'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		if( $_POST['edit'] == 1 ) {
			$this->data['tytul_pl'] = strip_tags( trim( $_POST['tytul_pl'] ) );
			$this->data['cat'] = (int)$_POST['cat'];
			$this->data['opis_pl'] = trim( $_POST['opis_pl'] );
			$this->data['stat'] = $_POST['stat'] = ( $_POST['stat'] == 1 ) ? 1 : 0;

			// tworzę nazwę pliku na bazie tytułu artykułu
			$filename = $id . '-' . Helper::uri_string( $this->data['tytul_pl'] );
			// dodaję artykuł do bazy
			$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET id_kategorii = {$this->data['cat']}, tytul_pl = :tytul_pl, opis_pl = :opis_pl, stat = '{$this->data[stat]}' WHERE id = {$id}" );
			
			if( $sth->execute( 
				[
					':tytul_pl' => $this->data['tytul_pl'], 
					':opis_pl' => $this->data['opis_pl'],
				] ) 
				) {

				// upload pliku
				if( $_FILES['image_upload']['tmp_name'] ) {
					@unlink( 'userfiles/images/galeria/' . $this->data['galeria']['image'] );
					$extension = end( explode( '.' , $_FILES['image_upload']['name'] ) );
					$optionImage = [
						'index' => 'image_upload',
						'min-width' => true,
						'height-auto' => true,
						'width' => 900,
						'height' => 490,
						'tmp_dir' => 'userfiles/_tmpfile/',
						'dir' => 'userfiles/images/galeria/',
						'filename' => $filename,
						'extension' => $extension,
					];
					Helper::uploadImage( $optionImage );
					// update nazwy pliku artykułu
					$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET image = '{$filename}.{$extension}' WHERE id = {$id}" );
					$sth->execute();
				} else {
					$img = explode( "." , $this->data['galeria']['image'] );
					@rename( 'userfiles/images/galeria/' . $this->data['galeria']['image'], 'userfiles/images/galeria/' . $filename . '.' . end( $img ) );
					$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET image = '{$filename}." . end( $img ) . "' WHERE id = {$id}" );
					$sth->execute();
				}

				if( !$_SESSION[I_ERROR] && !$_SESSION[I_INFO] )
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

		$sth = $this->pdo->prepare( "SELECT * FROM kategorie_galeria WHERE stat = '1' ORDER BY nazwa_" . LANG );
		$sth->execute();
		$this->data['categories'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		if( $_POST['add'] == 1 ) {	
			$this->data['tytul_pl'] = strip_tags( trim( $_POST['tytul_pl'] ) );
			$this->data['tytul_en'] = strip_tags( trim( $_POST['tytul_en'] ) );
			$this->data['opis_pl'] = trim( $_POST['opis_pl'] );
			$this->data['stat'] = $_POST['stat'] = ( $_POST['stat'] == 1 ) ? 1 : 0;


			// tworzę nazwę pliku na bazie tytułu artykułu
			$filename = Helper::uri_string( $this->data['tytul_pl'] );
			// dodaję artykuł do bazy
			$sth = $this->pdo->prepare( "INSERT INTO {$this->options['Table']} (id_usera, tytul_pl, tytul_en, opis_pl, data_dodania, pozycja, stat ) VALUES( {$uid}, :tytul_pl, :tytul_en, :opis_pl, NOW(), 1, '{$this->data[stat]}' )" );

			$sth->execute( 
				[
					':tytul_pl' => $this->data['tytul_pl'], 
					':tytul_en' => $this->data['tytul_en'], 
					':opis_pl' => $this->data['opis_pl'],
				]
			 );

			if( $sth->rowCount() > 0 ) {
				$lastId = $this->pdo->lastInsertId();
				// update poazycji starych artykułów
				$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET pozycja = (pozycja+1) WHERE id <> {$lastId}" );
				$sth->execute();

				$filename = $lastId . '-' . $filename;
				if( !file_exists( 'userfiles/images/galeria/galeria-' . $lastId ) )
					mkdir( 'userfiles/images/galeria/galeria-' . $lastId );
				// upload pliku
				if( $_FILES['image_upload'] ) {
					$extension = end( explode( '.' , $_FILES['image_upload']['name'] ) );
					$optionImage = [
						'index' => 'image_upload',
						'min-width' => true,
						'height-auto' => true,
						'width' => 900,
						'height' => 490,
						'tmp_dir' => 'userfiles/_tmpfile/',
						'dir' => 'userfiles/images/galeria/',
						'filename' => $filename,
						'extension' => $extension,
					];
					Helper::uploadImage( $optionImage );
					// update nazwy pliku artykułu
					$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET image = '{$filename}.{$extension}' WHERE id = {$lastId}" );
					$sth->execute();
				}

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
