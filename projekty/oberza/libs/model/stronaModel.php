<?php

class stronaModel extends Model {

	public $options = [ 'Table' => 'strony', 'Redirect' => '', 'SearchCol' => 'tytul_' . LANG,];

	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		if( $_COOKIE[COOKIES_ARTICLE_ACCESS] && Routing::$routing['param'] == 3 ) {
			header( "Location: " . BASE . "online/wszystkie" );
			exit();
		}
		$id = (int)Routing::$routing['param'];

		if( !$id )
			throw new modelException( $this->data['dictionary'][99][LANG], 1 );

		if( $id == 3 ) {
			$sth = $this->pdo->prepare( "SELECT * FROM czasopisma ORDER BY data_publikacji DESC LIMIT 1" );
			$sth->execute();
			$this->data['sacandas'] = $sth->fetch( PDO::FETCH_ASSOC );
		}

		if( $_POST['send-btn-email'] == 1 ) {
			$email = strtolower( trim( strip_tags( $_POST['email-article'] ) ) );
			$sth = $this->pdo->prepare( "SELECT * FROM czytelnicy WHERE LOWER(email) = :email LIMIT 1" );
			if( !$sth->execute([':email' => $email]) )
				throw new modelException( $this->data['dictionary'][100][LANG], 1 );

			$user = $sth->fetch( PDO::FETCH_ASSOC );
			if( $sth->rowCount() < 1 ) {
				header( "Location: " . BASE . "artykul/dodaj_konto/strona/" . Routing::$routing['param'] );
				exit();
			} else {
				// $target = BASE . Routing:$routing['controller'] . '/' . Routing:$routing['action'] . '/' . Routing:$routing['param'];
				// $sth = $this->pdo->prepare( "INSERT INTO czytelnicy_odwiedziny (id_czytelnika, data_wizyty, miejsce) VALUES( {$user['id']}, NOW(), '{$target}' )" );
				$sth->execute();
				$_SESSION[I_SUCCESS] = $this->data['dictionary'][98][LANG];
				setcookie( COOKIES_ARTICLE_ACCESS, '1', time() + (60 * COOKIES_ARTICLE_ACCESS_TIMEOUT), "/");
				header( "Location: " . BASE . "online/wszystkie");
				exit();
			}	
		}


		$sth = $this->pdo->prepare( "SELECT *, DATE_FORMAT(data_dodania, '%d.%m.%Y') as data FROM {$this->options['Table']} WHERE id = {$id} AND stat = '1' LIMIT 1" );
		if( !$sth->execute() )
			throw new modelException( $this->data['dictionary'][97][LANG], 1 );

		$this->data['strona'] = $sth->fetch( PDO::FETCH_ASSOC );

		// dodaję liczbę wyswietleń artykułu i ustawiam ciasteczko
		$cookie = ( $_COOKIE[COOKIES_PAGE] ) ? unserialize( $_COOKIE[COOKIES_PAGE] ) : [];
		if( $cookie ) {
			if( !in_array( $id , $cookie ) ) {
				$show = $this->data['strona']['wyswietlenia'] + 1;
				$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET wyswietlenia = {$show} WHERE id = {$id}" );
				$sth->execute();
				array_push( $cookie , $id );
				$new_cookie = serialize( $cookie );
				setcookie( COOKIES_PAGE, $new_cookie, time() + (60 * COOKIES_PAGE_TIMEOUT), "/");
			}
		} else {
			$show = (int)$this->data['strona']['wyswietlenia'] + 1;
			$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET wyswietlenia = {$show} WHERE id = {$id}" );
			$sth->execute();
			array_push( $cookie , $id );
			$new_cookie = serialize( $cookie );
			setcookie( COOKIES_PAGE, $new_cookie, time() + (60 * COOKIES_PAGE_TIMEOUT), "/");
		}

		$this->data['seo'] = [
			'title' => ' - ' . $this->data['strona']['tytul_' . LANG],
			'description' => $this->data['dictionary'][50][LANG],
			'keywords' => $this->data['dictionary'][48][LANG] . $this->data['strona']['tytul_' . LANG],
			'author' => $this->data['dictionary'][49][LANG],
			'url' => ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}",
			'type' => 'article',
			'image' => ( @file_get_contents( BASE . 'userfiles/images/artykuly/' . $this->data['artykul']['image'] ) ) ? BASE . 'userfiles/images/artykuly/' . $this->data['artykul']['image'] : BASE . 'userfiles/images/logo/secandas-logo.jpg',
		];

	}


}
