<?php

class admin_kategorieModel extends Model {

	public $options = [ 
						'Table' => 'kategorie', 
						'Redirect' => 'admin_kategorie',
					];
	public $data = [ 'admin' => true ];

	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$this->getUser();
		$uid = (int)$_SESSION[AUTH_SESSION_NAME]['im'];

		$limit = PERPAGE;
		$offset = ( !$_GET['p'] ) ? 0 : ( (int)$_GET['p'] - 1 ) * PERPAGE;
		$this->options['SearchCol'] = 'nazwa_' . LANG;
		
		$this->data['search'] = trim( strip_tags( $_GET['search'] ) );
		$search = ( $_GET['search'] ) ? " WHERE {$this->options['SearchCol']} REGEXP '" . trim( strip_tags( $_GET['search'] ) ) . "'" : '';

		$sth = $this->pdo->prepare( "SELECT * FROM {$this->options['Table']} {$search} ORDER BY nazwa_pl LIMIT {$limit} OFFSET {$offset}" );
		$sth->execute();
		$this->data['kategorie'] = $sth->fetchAll( PDO::FETCH_ASSOC );

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
			// @unlink( "userfiles/images/artykuly/" . $this->data['pos']['image'] );
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
			
		$this->data['kategoria'] = $sth->fetch( PDO::FETCH_ASSOC );

		if( $_POST['edit'] == 1 ) {
			$this->data['nazwa_pl'] = strip_tags( trim( $_POST['nazwa_pl'] ) );
			$this->data['stat'] = ( $_POST['stat'] == 1 ) ? 1 : 0;
			// dodaję kategorię do bazy
			$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET nazwa_pl = :nazwa_pl, stat = '{$this->data['stat']}' WHERE id = {$id}" );
			if( $sth->execute( [':nazwa_pl' => $this->data['nazwa_pl']] ) ) {
				if( $sth->rowCount() > 0 )
					$_SESSION[I_SUCCESS] = "Poprawnie edytowano wpis";
				else
					$_SESSION[I_SUCCESS] = "Poprawnie zapisano wpis, jednak nic w nim nie zostało zmienione";
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
		$sth = $this->pdo->prepare( "SELECT * FROM kategorie WHERE typ = 'artykul' ORDER BY nazwa_" . LANG );
		$sth->execute();
		$this->data['categories'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		if( $_POST['add'] == 1 ) {
			$this->data['nazwa_pl'] = strip_tags( trim( $_POST['nazwa_pl'] ) );
			$this->data['stat'] = ( $_POST['stat'] == 1 ) ? 1 : 0;

			$sth = $this->pdo->prepare( "SELECT * FROM {$this->options['Table']} WHERE nazwa_pl = :nazwa_pl LIMIT 1" );
			$sth->execute( [':nazwa_pl' => $this->data['nazwa_pl']] );
			if( $sth->rowCount() > 0 )
				throw new modelException( "Wpis o tej nazwie już istnieje. Nie możesz dodać go ponownie", 1 );
				

			$sth = $this->pdo->prepare( "INSERT INTO {$this->options['Table']} (nazwa_pl, data_dodania, typ, stat) VALUES(:nazwa_pl, NOW(), 'artykul', '{$this->data[stat]}')" );
			if( !$sth->execute( [':nazwa_pl' => $this->data['nazwa_pl']] ) )
				throw new modelException( "Wystąpił problem z dodaniem wpisu", 1);

			$_SESSION[I_SUCCESS] = "Poprawnie dodano wpis";
			header( "Location: " . BASE . $this->options['Redirect'] );
			exit();

		}
	}

}
