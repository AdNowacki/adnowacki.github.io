<?php

class admin_zdjeciaModel extends Model {

	public $options = [ 'Table' => 'zdjecia', 'Redirect' => 'admin_zdjecia', 'SearchCol' => 'tytul_pl',];
	public $data = [ 'admin' => true ];

	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$this->getUser();
		$client = (int)$_SESSION[AUTH_SESSION_NAME]['client'];
		$uid = (int)$_SESSION[AUTH_SESSION_NAME]['im'];
		$id = Routing::$routing['param'];

		if( !$id )
			throw new modelException( "Brak wymaganego parametru", 1 );

		$limit = PERPAGE;
		$offset = ( !$_GET['p'] ) ? 0 : ( (int)$_GET['p'] - 1 ) * PERPAGE;
		$this->options['SearchCol'] = 'imie';

		$this->data['search'] = trim( strip_tags( $_GET['search'] ) );
		$search = ( $_GET['search'] ) ? " AND tytul_pl REGEXP '" . trim( strip_tags( $_GET['search'] ) ) . "'" : '';

		$sth = $this->pdo->prepare( "SELECT * FROM {$this->options['Table']} WHERE id_galerii = {$id} {$search} ORDER BY pozycja LIMIT {$limit} OFFSET {$offset}" );
		$sth->execute();
		$this->data['zdjecia'] = $sth->fetchAll( PDO::FETCH_ASSOC );



		foreach ( $this->data['zdjecia'] as &$aData ) {
			if( $aData['id_usera'] !== NULL ) {
				$sth = $this->pdo->prepare( "SELECT * FROM " . ADMIN_TABLE . " WHERE id = {$aData['id_usera']} LIMIT 1" );
				$sth->execute();
				$aData['user'] = $sth->fetch( PDO::FETCH_ASSOC );
			}
		}


		$sth = $this->pdo->prepare( "SELECT COUNT(*) as TOTAL FROM {$this->options['Table']} WHERE id_galerii = {$id} {$search}" );
		$sth->execute();
		$total = $sth->fetch( PDO::FETCH_ASSOC );
		$this->data['TOTAL'] = $total['TOTAL'];

		$sth = $this->pdo->prepare( "SELECT * FROM galeria WHERE id = {$id} LIMIT 1" );
		$sth->execute();
		$this->data['current'] = $sth->fetch( PDO::FETCH_ASSOC );

	}

	function wlacz() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$id = explode( ';', Routing::$routing['param'] );
		$galeria = $id[1];
		$id = $id[0];

		$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET stat = '1' WHERE id = $id" );
		$sth->execute();

		if( $sth->rowCount() > 0 )
			$_SESSION[I_SUCCESS] = "Poprawnie włączono wpis";
		else
			$_SESSION[I_ERROR] = "Wystąpił problem z włączeniem wpisu";

		header( "Location: " . BASE . $this->options['Redirect'] . '/widok/' . $galeria );
		exit();
	}
	function wylacz() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->data['admin'] = true;
		$id = explode( ';', Routing::$routing['param'] );
		$galeria = $id[1];
		$id = $id[0];

		$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET stat = '0' WHERE id = $id" );
		$sth->execute();

		if( $sth->rowCount() > 0 )
			$_SESSION[I_SUCCESS] = "Poprawnie wyłączono wpis";
		else
			$_SESSION[I_ERROR] = "Wystąpił problem z wyłączeniem wpisu";

		header( "Location: " . BASE . $this->options['Redirect'] . '/widok/' . $galeria );
		exit();
	}
	function usun() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$id = explode( ';', Routing::$routing['param'] );
		$galeria = $id[1];
		$id = $id[0];

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
			@unlink( "userfiles/images/galeria/galeria-" . $galeria . '/' . $this->data['pos']['image'] );
		} else {
			$_SESSION[I_ERROR] = "Wystąpił problem z usunięciem wpisu";
		}

		header( "Location: " . BASE . $this->options['Redirect'] . '/widok/' . $galeria );
		exit();
	}

	function edytuj() {
		$this->getUser();
		$id = explode( ';', Routing::$routing['param'] );
		$galeria = $id[1];
		$id = $id[0];

		if( !$id )
			throw new modelException( "Brak wymaganego parametru", 1 );
			
		$sth = $this->pdo->prepare( "SELECT * FROM {$this->options['Table']} WHERE id = $id LIMIT 1" );
		$sth->execute();


		if( $sth->rowCount() < 1 )
			throw new modelException( "Szukany wpis nie istnieje", 1);
			
		$this->data['galeria'] = $sth->fetch( PDO::FETCH_ASSOC );



		if( $_POST['edit'] == 1 ) {
			$this->data['tytul_pl'] = strip_tags( trim( $_POST['tytul_pl'] ) );
			$this->data['cat'] = (int)$_POST['cat'];
			$this->data['opis_pl'] = strip_tags( trim( $_POST['opis_pl'] ) );
			$this->data['stat'] = $_POST['stat'] = ( $_POST['stat'] == 1 ) ? 1 : 0;

			// tworzę nazwę pliku na bazie tytułu artykułu
			$filename = $id . '-' . Helper::uri_string( $this->data['tytul_pl'] );
			// dodaję artykuł do bazy
			$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET tytul_pl = :tytul_pl, stat = '{$this->data[stat]}' WHERE id = {$id}" );
			
			if( $sth->execute( 
				[
					':tytul_pl' => $this->data['tytul_pl'], 
				] ) 
				) {

				// upload pliku
				if( $_FILES['image_upload']['tmp_name'] ) {
					@unlink( 'userfiles/images/galeria/' . $this->data['galeria']['image'] );
					$extension = end( explode( '.' , $_FILES['image_upload']['name'] ) );
					$optionImage = [
						'min-width' => true,
						'height-auto' => true,
						'index' => 'image_upload',
						'width' => 360,
						'height' => 360,
						'tmp_dir' => 'userfiles/_tmpfile/',
						'dir' => 'userfiles/images/galeria/galeria-' . $galeria . '/',
						'filename' => $filename,
						'extension' => $extension,
					];
					Helper::uploadImage( $optionImage );
					// update nazwy pliku artykułu
					$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET image = '{$filename}.{$extension}' WHERE id = {$id}" );
					$sth->execute();
				} else {
					$img = explode( "." , $this->data['galeria']['image'] );
					@rename( 'userfiles/images/galeria/galeria-' . $galeria . '/' . $this->data['galeria']['image'], 'userfiles/images/galeria/galeria-' . $galeria . '/' . $filename . '.' . end( $img ) );
					$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET image = '" . $filename . "." . end( $img ) . "' WHERE id = {$id}" );
					$sth->execute();
				}

				if( !$_SESSION[I_ERROR] && !$_SESSION[I_INFO] )
					$_SESSION[I_SUCCESS] = "Poprawnie edytowano wpis";
			} else {
				$_SESSION[I_ERROR] = "Nie wprowadzono zmian we wpisie";
			}

			header( "Location: " . BASE . $this->options['Redirect'] . '/widok/' . $galeria );
			exit();
		}
	}

	function dodaj() {
		$this->getUser();
		$uid = $this->data['user_log']['id'];
		$id = (int)Routing::$routing['param'];

		if( !$id )
			throw new modelException( "Brak wymaganego parametru", 1 );
			

		$sth = $this->pdo->prepare( "SELECT * FROM galeria WHERE id = {$id} LIMIT 1" );
		$sth->execute();
		$this->data['current'] = $sth->fetch( PDO::FETCH_ASSOC );

		if( $_POST['add'] == 1 ) {	
			$this->data['tytul_pl'] = strip_tags( trim( $_POST['tytul_pl'] ) );
			$this->data['stat'] = $_POST['stat'] = ( $_POST['stat'] == 1 ) ? 1 : 0;

			// tworzę nazwę pliku na bazie tytułu artykułu
			if( !file_exists( 'userfiles/images/galeria/galeria-' . $id ) )
				mkdir( 'userfiles/images/galeria/galeria-' . $id );


			// upload pliku
			if( $_FILES['image_upload'] ) {
				$count = count( $_FILES['image_upload']['tmp_name'] );
				for( $k=0; $k<$count; $k++ ) {

					$filename = Helper::uri_string( $this->data['tytul_pl'] );
					// dodaję artykuł do bazy
					$sth = $this->pdo->prepare( "INSERT INTO {$this->options['Table']} (id_usera, id_galerii, tytul_pl, data_dodania, pozycja, stat ) VALUES( {$uid}, {$id}, :tytul_pl, NOW(), 1, '{$this->data[stat]}' )" );
					$sth->execute( [':tytul_pl' => $this->data['tytul_pl'],]);

					$lastId = $this->pdo->lastInsertId();
					// update poazycji starych artykułów
	
					$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET pozycja = (pozycja+1) WHERE id <> {$lastId} AND id_galerii = {$id}" );
					$sth->execute();

					$filename = $lastId . '-' . $filename;

					$extension = end( explode( '.' , $_FILES['image_upload']['name'][$k] ) );
					$optionImage = [
						'image-index' => $k,
						'min-width' => true,
						'height-auto' => true,
						'index' => 'image_upload',
						'width' => 360,
						'height' => 360,
						'tmp_dir' => 'userfiles/_tmpfile/',
						'dir' => 'userfiles/images/galeria/galeria-' . $id . '/',
						'filename' => $filename,
						'extension' => $extension,
					];
					Helper::uploadMultipleImage( $optionImage );
					// update nazwy pliku artykułu
					$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET image = '{$filename}.{$extension}' WHERE id = {$lastId}" );
					$sth->execute();
				}

			} else {
				throw new modelException( "Wystąpił problem z dodaniem wpisu", 1 );
			}

			if( !$_SESSION[I_ERROR] && !$_SESSION[I_INFO] )
				$_SESSION[I_SUCCESS] = "Poprawnie dodano wpis";

			header( "Location: " . BASE . $this->options['Redirect'] . '/widok/' . $id );
			exit();

		}
	}

	function dol() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$id = explode( ';', Routing::$routing['param'] );
		$galeria = $id[1];
		$id = $id[0];

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
		header( "Location: " . BASE . $this->options['Redirect'] . '/widok/' . $galeria );
		exit();
	}

	function gora() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$id = explode( ';', Routing::$routing['param'] );
		$galeria = $id[1];
		$id = $id[0];

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

		header( "Location: " . BASE . $this->options['Redirect'] . '/widok/' . $galeria );
		exit();
	}
}
