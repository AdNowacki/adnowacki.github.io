<?php

class pokojModel extends Model {

	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$id = strip_tags( trim( Routing::$routing['param'] ) );
		if( !$id )
			throw new modelException( "Brak parametru szukanej strony", 1 );

		header( "Location: " . BASE . 'pokoj/szczegoly/' . $id );
		exit();
		
		$sth = $this->pdo->prepare( "SELECT * FROM strony WHERE short_link = :id LIMIT 1" );
		$sth->execute( array( ':id' => $id ) );
		$this->data['room'] = $sth->fetch( PDO::FETCH_ASSOC );

		$this->data['Title'] = ' - ' . $this->data['room']['tytul_pl'];
		$this->data['ogTitle'] = $this->data['room']['og_title'];
		$this->data['Description'] = $this->data['room']['description'];
		$this->data['ogDescription'] = $this->data['room']['description'];
		$this->data['Keywords'] = $this->data['room']['keywords'];
		$this->data['ogImage'] = BASE . 'public/images/' . strtolower( $this->data['room']['tytul_pl'] ) . '.jpg';


		if( Routing::$routing['param'] == 'pl' || Routing::$routing['param'] == 'en' ) {
			setcookie( COOKIE_LANG_NAME, Routing::$routing['param'], time()+157680000, '/' );
			header( "Location: " . BASE );
			exit();
		}

		// $this->data['seo'] = [
		// 	'title' => ' - ' . $this->data['strona']['tytul_' . LANG],
		// 	'description' => $this->data['dictionary'][50][LANG],
		// 	'keywords' => $this->data['dictionary'][48][LANG] . $this->data['strona']['tytul_' . LANG],
		// 	'author' => $this->data['dictionary'][49][LANG],
		// 	'url' => ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}",
		// 	'type' => 'article',
		// 	'image' => ( @file_get_contents( BASE . 'userfiles/images/artykuly/' . $this->data['artykul']['image'] ) ) ? BASE . 'userfiles/images/artykuly/' . $this->data['artykul']['image'] : BASE . 'userfiles/images/logo/secandas-logo.jpg',
		// ];

	}

	function szczegoly() {
		$id = strip_tags( trim( Routing::$routing['param'] ) );
		if( !$id )
			throw new modelException( "Brak parametru szukanej strony", 1 );
		
		$sth = $this->pdo->prepare( "SELECT * FROM strony WHERE short_link = :id LIMIT 1" );
		$sth->execute( array( ':id' => $id ) );
		$this->data['room'] = $sth->fetch( PDO::FETCH_ASSOC );

		$this->data['Title'] = ' - ' . $this->data['room']['tytul_pl'];
		$this->data['ogTitle'] = $this->data['room']['og_title'];
		$this->data['Description'] = $this->data['room']['description'];
		$this->data['ogDescription'] = $this->data['room']['description'];
		$this->data['Keywords'] = $this->data['room']['keywords'];
		$this->data['ogImage'] = BASE . 'public/images/' . strtolower( $this->data['room']['tytul_pl'] ) . '.jpg';


		if( Routing::$routing['param'] == 'pl' || Routing::$routing['param'] == 'en' ) {
			setcookie( COOKIE_LANG_NAME, Routing::$routing['param'], time()+157680000, '/' );
			header( "Location: " . BASE );
			exit();
		}

		// $this->data['seo'] = [
		// 	'title' => ' - ' . $this->data['strona']['tytul_' . LANG],
		// 	'description' => $this->data['dictionary'][50][LANG],
		// 	'keywords' => $this->data['dictionary'][48][LANG] . $this->data['strona']['tytul_' . LANG],
		// 	'author' => $this->data['dictionary'][49][LANG],
		// 	'url' => ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}",
		// 	'type' => 'article',
		// 	'image' => ( @file_get_contents( BASE . 'userfiles/images/artykuly/' . $this->data['artykul']['image'] ) ) ? BASE . 'userfiles/images/artykuly/' . $this->data['artykul']['image'] : BASE . 'userfiles/images/logo/secandas-logo.jpg',
		// ];

	}
}