<?php

class profilModel extends Model {
	public $options = [ 'Table' => 'users', 'Redirect' => 'profil', 'SearchCol' => 'tytul_pl',];
	public $data = [ 'admin' => true ];

	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$this->getUser();
		$id = $_SESSION[AUTH_SESSION_NAME]['im'];
		$sth = $this->pdo->prepare( "SELECT *, DATE_FORMAT(od_kiedy, '%d.%m.%Y %H:%i') as rejestracja, DATE_FORMAT(ostatnie_logowanie, '%d.%m.%Y %H:%i') as ostatnio FROM {$this->options['Table']} WHERE id = {$id} LIMIT 1" );
		$sth->execute();
		$this->data['user'] = $sth->fetch( PDO::FETCH_ASSOC );

		if( !$this->data['user'] )
			throw new modelException( $this->data['dictionary'][101][LANG], 1 );

		if( $_POST['edit'] ) {
			$this->data['email'] = strip_tags( trim( $_POST['email'] ) );
			$this->data['imie'] = strip_tags( trim( $_POST['imie'] ) );
			$this->data['nazwisko'] = strip_tags( trim( $_POST['nazwisko'] ) );
			$this->data['haslo'] = $_POST['haslo'];
			$this->data['haslo2'] = $_POST['haslo2'];

			$token = sha1( $this->data['email'] . $this->data['imie'] . time() );

			if( !preg_match( "/@/" , $this->data['email'] ) )
				throw new modelException( $this->data['dictionary'][102][LANG], 1 );

			$domain = end( explode( '@' , $this->data['email'] ) );

			if( !checkdnsrr( $domain,'MX' ) )
				throw new modelException( $this->data['dictionary'][103][LANG], 1 );

			if( $this->data['haslo'] ) {
				if( strlen( $this->data['haslo'] ) < 6 )
					throw new modelException( $this->data['dictionary'][104][LANG], 1 );

				if( $this->data['haslo'] != $this->data['haslo2'] )
					throw new modelException( $this->data['dictionary'][105][LANG], 1 );
				$haslo = sha1( $this->data['haslo'] );
				$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET email = :email, haslo = '{$haslo}', imie = :imie, nazwisko = :nazwisko, token = '{$token}' WHERE id = {$id}" );

				if( !$sth->execute( [':email' => $this->data['email'], ':imie' => $this->data['imie'], ':nazwisko' => $this->data['nazwisko']] ) )
					throw new modelException( $this->data['dictionary'][106][LANG], 1 );

				Auth::unregister();
			} else {
				$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET email = :email, imie = :imie, nazwisko = :nazwisko, token = '{$token}' WHERE id = {$id}" );
				if( !$sth->execute( [':email' => $this->data['email'], ':imie' => $this->data['imie'], ':nazwisko' => $this->data['nazwisko']] ) )
					throw new modelException( $this->data['dictionary'][106][LANG], 1 );
			}

			$_SESSION[I_SUCCESS] = $this->data['dictionary'][107][LANG];
			
			header( "Location: " . BASE . $this->options['Redirect'] );
			exit();	
		}
			
	}
}
