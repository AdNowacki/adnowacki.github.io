<?php

class artykulModel extends Model {


	public $options = [ 'Table' => 'artykuly', 'Redirect' => '', 'SearchCol' => '',];

	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$id = (int)Routing::$routing['param'];

		if( !$id )
			throw new modelException( $this->data['dictionary'][99][LANG], 1 );

		if( $_POST['send-btn-email'] == 1 ) {
			$email = strtolower( trim( strip_tags( $_POST['email-article'] ) ) );
			$sth = $this->pdo->prepare( "SELECT * FROM czytelnicy WHERE LOWER(email) = :email LIMIT 1" );
			if( !$sth->execute([':email' => $email]) )
				throw new modelException( $this->data['dictionary'][100][LANG], 1 );

			$user = $sth->fetch( PDO::FETCH_ASSOC );
			if( $sth->rowCount() < 1 ) {
				header( "Location: " . BASE . "artykul/dodaj_konto/{$id}" );
				exit();
			} else {
				$target = BASE . Routing::$routing['controller'] . '/' . Routing::$routing['action'] . '/' . Routing::$routing['param'];
				$sth = $this->pdo->prepare( "INSERT INTO czytelnicy_odwiedziny (id_czytelnika, data_wizyty, miejsce) VALUES( {$user['id']}, NOW(), '{$target}')" );
				$sth->execute();
				$_SESSION[I_SUCCESS] = $this->data['dictionary'][122][LANG];
				setcookie( COOKIES_ARTICLE_ACCESS, '1', time() + (60 * COOKIES_ARTICLE_ACCESS_TIMEOUT), "/");
				header( "Location: " . BASE . "artykul/widok/{$id}");
				exit();
			}
				
		}


		$sth = $this->pdo->prepare( "SELECT *, DATE_FORMAT( data_dodania, '%d.%m.%Y' ) as data FROM {$this->options['Table']} WHERE id = {$id} AND stat = '1' LIMIT 1" );
		if( !$sth->execute() )
			throw new modelException( $this->data['dictionary'][97][LANG], 1 );

		$this->data['artykul'] = $sth->fetch( PDO::FETCH_ASSOC );

		$this->data['seo'] = [
			'title' => ' - ' . $this->data['artykul']['tytul_' . LANG],
			'description' => strip_tags( $this->data['artykul']['zajawka_' . LANG] ),
			'keywords' => $this->data['artykul']['tagi'],
			'author' => $this->data['artykul']['zrodlo'],
			'url' => ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}",
			'type' => 'article',
			'image' => ( @file_get_contents( BASE . 'userfiles/images/artykuly/' . $this->data['artykul']['image'] ) ) ? BASE . 'userfiles/images/artykuly/' . $this->data['artykul']['image'] : BASE . 'userfiles/images/logo/secandas-logo.jpg',
		];


		if( $this->data['artykul']['tagi'] ) {
			$this->data['tagi'] = explode( ',' , trim( $this->data['artykul']['tagi'] ) );
			$this->data['tagi'] = array_filter( $this->data['tagi'] );
		}

		$sth = $this->pdo->prepare( "SELECT *, k.id as KID FROM kategorie as k JOIN kategorie_artykuly as ka ON(k.id = ka.id_kategorii) WHERE id_artykulu = {$id}" );
		$sth->execute();
		$this->data['kategorie'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		foreach( $this->data['kategorie'] as $aData ) {
			$kategorie .= $aData['KID'] . '|';
		}
		$kategorie = trim( $kategorie, "|\n\t\r" );

		// dodaję liczbę wyswietleń artykułu i ustawiam ciasteczko
		$cookie = ( $_COOKIE[COOKIES_ARTICLE] ) ? unserialize( $_COOKIE[COOKIES_ARTICLE] ) : [];
		if( $cookie ) {
			if( !in_array( $id , $cookie ) ) {
				$show = $this->data['artykul']['wyswietlenia'] + 1;
				$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET wyswietlenia = {$show} WHERE id = {$id}" );
				$sth->execute();
				array_push( $cookie , $id );
				$new_cookie = serialize( $cookie );
				setcookie( COOKIES_ARTICLE, $new_cookie, time() + (60 * COOKIES_ARTICLE_TIMEOUT), "/");
			}
		} else {
			$show = (int)$this->data['artykul']['wyswietlenia'] + 1;
			$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET wyswietlenia = {$show} WHERE id = {$id}" );
			$sth->execute();
			array_push( $cookie , $id );
			$new_cookie = serialize( $cookie );
			setcookie( COOKIES_ARTICLE, $new_cookie, time() + (60 * COOKIES_ARTICLE_TIMEOUT), "/");
		}

		$this->data['kat'] = $this->data['tag'] = [];

		// powiązane
		if( $this->data['artykul']['tagi'] ) {
			$tagi_ = preg_replace( "/(;|,)/" , "|", $this->data['artykul']['tagi'] );
			$tagi_ = trim( $tagi_, ",;|\n\t\r" );
			$tagi_ = str_replace( "| " , "|", $tagi_ );
			$sth = $this->pdo->prepare( "SELECT *, a.id as AID, DATE_FORMAT( a.data_dodania, '%d.%m.%Y' ) as data FROM {$this->options['Table']} as a WHERE tagi REGEXP '{$tagi_}' AND id <> {$id}" );
			$sth->execute();
			$this->data['tag'] = $sth->fetchAll( PDO::FETCH_ASSOC );
		}

		if( $kategorie ) {
			if( $tagi_ ) {
				$sth = $this->pdo->prepare( "SELECT *, a.id as AID, DATE_FORMAT( a.data_dodania, '%d.%m.%Y' ) as data FROM {$this->options['Table']} as a JOIN kategorie_artykuly as ka ON(a.id = ka.id_artykulu) WHERE id_kategorii REGEXP '{$kategorie}' AND id_artykulu <> {$id} AND tagi NOT REGEXP '{$tagi_}'" );
			} else {
				$sth = $this->pdo->prepare( "SELECT *, a.id as AID, DATE_FORMAT( a.data_dodania, '%d.%m.%Y' ) as data FROM {$this->options['Table']} as a JOIN kategorie_artykuly as ka ON(a.id = ka.id_artykulu) WHERE id_kategorii REGEXP '{$kategorie}' AND id_artykulu <> {$id}" );
			}
			$sth->execute();
			$this->data['kat'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		}

		$this->data['powiazane'] = array_merge( $this->data['tag'], $this->data['kat'] );
		shuffle( $this->data['powiazane'] );
	}

	function dodaj_konto() {
		$id = Routing::$routing['param'];

		if( !$id )
			throw new modelException( $this->data['dictionary'][108][LANG], 1 );

		$token = ( $_GET['token'] ) ? $_GET['token'] : "";
		if( $token ) {
			$sth = $this->pdo->prepare( "SELECT * FROM czytelnicy WHERE token = :token LIMIT 1" );
			$sth->execute( [':token' => $token] );
			if( $sth->rowCount() < 1 )
				throw new modelException( $this->data['dictionary'][123][LANG], 1 );

			$this->data['user'] = $sth->fetch( PDO::FETCH_ASSOC );

			$sth = $this->pdo->prepare( "UPDATE czytelnicy SET stat = '1' WHERE token = :token" );
			if( !$sth->execute( [':token' => $token] ) )
				throw new modelException( $this->data['dictionary'][124][LANG], 1 );

			$target = BASE . Routing::$routing['controller'] . '/' . Routing::$routing['action'] . '/' . Routing::$routing['param'];
			$sth = $this->pdo->prepare( "INSERT INTO czytelnicy_odwiedziny (id_czytelnika, data_wizyty, miejsce) VALUES( {$this->data['user']['id']}, NOW(), '{$target}' )" );
			$sth->execute();
			
			$_SESSION[I_SUCCESS] = $this->data['dictionary'][125][LANG];
			setcookie( COOKIES_ARTICLE_ACCESS, '1', time() + (60 * COOKIES_ARTICLE_ACCESS_TIMEOUT), "/");
			if( Routing::$routing['param'] == 'strona' )
				header( "Location: " . BASE . "online/wszystkie" );
			else
				header( "Location: " . BASE . "artykul/widok/{$id}");
			exit();
				
		}

		if( $_POST['send-btn'] == 1 ) {
			$this->data['imie'] = trim( strip_tags( $_POST['imie'] ) );
			$this->data['nazwisko'] = trim( strip_tags( $_POST['nazwisko'] ) );
			$this->data['email'] = trim( strip_tags( $_POST['email'] ) );
			$this->data['firma'] = trim( strip_tags( $_POST['firma'] ) );
			$this->data['stanowisko'] = trim( strip_tags( $_POST['stanowisko'] ) );

			if( !preg_match( "/@/" , $this->data['email'] ) )
				throw new modelException( $this->data['dictionary'][102][LANG], 1);

			$domain = explode( '@' , $this->data['email'] );
			if( !checkdnsrr( end( $domain ),'MX') )
				throw new modelException( $this->data['dictionary'][103][LANG], 1);

			$sth = $this->pdo->prepare( "SELECT * FROM czytelnicy WHERE LOWER( email ) = :email LIMIT 1" );
			$sth->execute( [':email' => strtolower( $this->data['email'] )] );
			if( $sth->rowCount() > 0 )
				throw new modelException( $this->data['dictionary'][126][LANG], 1 );
				

			$token = hash( 'sha256' , $email . $imie . $firma . rand( 1, 10000 ) );
			$sth = $this->pdo->prepare( "INSERT INTO czytelnicy (imie, nazwisko, email, firma, stanowisko, token) VALUES(:imie, :nazwisko, :email, :firma, :stanowisko, '{$token}')" );
			$sth->execute( [
					':imie' => $this->data['imie'],
					':nazwisko' => $this->data['nazwisko'],
					':email' => $this->data['email'],
					':firma' => $this->data['firma'],
					':stanowisko' => $this->data['stanowisko'],
				] );
			if( $sth->rowCount() < 1 ) 
				throw new modelException( $this->data['dictionary'][127][LANG], 1);
				
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = true;
			$mail->addReplyTo( MAIL_FROM, MAIL_FROM_NAME );
			$mail->addAddress( $this->data['email'], '');
			$mail->Subject = $this->data['dictionary'][29][LANG];

			$body = @file_get_contents( 'public/mail/mail.html' );
			$body = preg_replace( "/{{BASE}}/" , BASE, $body );
			$body = preg_replace( "/{{CONTENT}}/" , $this->data['dictionary'][30][LANG], $body );
			$cta = "<table width='600' align='center' border='0' cellspacing='0' cellpadding='0' style='margin: 0 auto;'>
						<tr>
							<td height='30' width='200'></td>
							<td height='30' width='200' bgcolor='#e3010f' style='font-family: Verdana; font-size: 13px; vertical-align: middle; text-align: center; color: #f1f1f1; text-decoration: none;'>
								{{LINK}}
							</td>
							<td height='30' width='200'></td>
						</tr>
					</table>";
			if( $cta )
				$body = preg_replace( "/{{CTA}}/" , $cta, $body );
			else
				$body = preg_replace( "/{{CTA}}/" , "", $body );
			
			$body = preg_replace( "/{{FB}}/" , $this->data['dictionary'][22][LANG], $body );

			if( Routing::$routing['param'] == 'strona' )
				$link = "<a href='" . BASE . "artykul/dodaj_konto/strona/" . Routing::$routing[title] . "/?token={$token}' style='color:#f1f1f1;'><strong>LINK WERYFIKACYJNY</strong></a>";
			else
				$link = "<a href='" . BASE . "artykul/dodaj_konto/{$id}/?token={$token}' style='color:#f1f1f1;'><strong>LINK WERYFIKACYJNY</strong></a>";
			$body = preg_replace( "/{{LINK}}/" , $link, $body );
			$mail->msgHTML( $body );
			if (!$mail->send())
			    throw new modelException( $this->data['dictionary'][115][LANG], 4016 );

			$_SESSION[I_SUCCESS] = $this->data['dictionary'][128][LANG];
			header( "Location: " . BASE . "artykul/dodaj_konto/{$id}" );
			exit();
		}
	}
}
