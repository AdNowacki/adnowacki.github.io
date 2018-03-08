<?php

class indexModel extends Model {
	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$this->data['Title'] = ' - Home';
		$this->data['ogTitle'] = 'Aparthotel Oberża. Poczuj się jak w domu.';
		$this->data['Description'] = 'Aparthotel w centrum Krakowa o charakterze butikowym, polecany przez Michelin. Profesjonalna obsługa, doskonała restauracja.';
		$this->data['ogDescription'] = 'Aparthotel w centrum Krakowa o charakterze butikowym, polecany przez Michelin. Profesjonalna obsługa, doskonała restauracja.';
		$this->data['Keywords'] = 'hotel Kraków aparthotel Kraków, nocleg w Krakowie, pokoje , hotel butikowy, apartamenty kraków, pokoje, nocleg, noclegi, Kazimierz, boutique, pobyty, wczasy, urlop, weekend break Kraków, city break Kraków';
		$this->data['ogImage'] = '';


		if( Routing::$routing['param'] == 'pl' || Routing::$routing['param'] == 'en' ) {
			setcookie( COOKIE_LANG_NAME, Routing::$routing['param'], time()+157680000, '/' );
			header( "Location: " . BASE . Routing::$routing['controller'] . '/' . Routing::$routing['action'] );
			exit();
		}

		if( $_POST['send_secret'] == 1 ) {
			$email = $this->data['email'] = strip_tags( trim( $_POST['email'] ) );
			$start = $this->data['start'] = strip_tags( trim( $_POST['data-start'] ) );
			$stop = $this->data['stop'] = strip_tags( trim( $_POST['data-stop'] ) );

			if( !preg_match( "/@/" , $email ) ) {
				$this->data['error'] = $this->data['dictionary_page'][88][LANG];
			}


			if( !$this->data['error'] ) {
				$body = @file_get_contents( 'public/mail/mail.html' );
				$body = preg_replace( "/{{__CONTENT__}}/", $this->data['dictionary_page'][86][LANG], $body );
				$body = preg_replace( "/{{__BASE__}}/" , BASE, $body );
				$body = preg_replace( "/{{__FB__}}/", $this->data['dictionary_page'][91][LANG], $body );
				$body = preg_replace( "/{{__INSTA__}}/", $this->data['dictionary_page'][92][LANG], $body );
				$body = preg_replace( "/{{CTA}}/", '', $body );

				$mail = new PHPMailer();
				$mail->IsSMTP();
				// $mail->SMTPDebug  = 2;
				$mail->SMTPAuth   = true;
				$mail->Subject    = $this->data['dictionary_page'][87][LANG];
				$mail->MsgHTML( $body );
				$mail->AddAddress( $email );

				if( !$mail->Send() ) {
					$this->data['error'] = $this->data['dictionary_page'][89][LANG];
				} else {
					$_SESSION[I_SUCCESS] = "Poprawnie wysłano wiadomosc";

					$nMail = new PHPMailer();
					$nMail->IsSMTP();
					$nMail->SMTPAuth   = true;
					$nMail->Subject    = "Nowe zgłoszenie Secret Deal";
					$nBody = @file_get_contents( 'public/mail/mail.html' );
					$txt = "Wpłynęło nowe zgłoszenie Secret Deal od:<br><br>";
					$txt .= "email: <strong>{$this->data['email']}</strong><br>";
					$txt .= "Data startu: <strong>{$this->data['start']}</strong><br>";
					$txt .= "Data zakończenia: <strong>{$this->data['stop']}</strong>";
					$nBody = preg_replace( "/{{__CONTENT__}}/", $txt, $nBody );
					$nBody = preg_replace( "/{{__BASE__}}/" , BASE, $nBody );
					$nBody = preg_replace( "/{{__FB__}}/", $this->data['dictionary_page'][91][LANG], $nBody );
					$nBody = preg_replace( "/{{__INSTA__}}/", $this->data['dictionary_page'][92][LANG], $nBody );
					$nBody = preg_replace( "/{{CTA}}/", '', $nBody );
					$nMail->MsgHTML( $nBody );
					$nMail->AddAddress( MAIL_FROM );
					$nMail->Send();
					header( "Location: " . BASE );
					exit();
				}

			}
		}
		
	}

	function admin() {
		$this->data['admin'] = true;
		if( Auth::ifAuth() ) {
			header( "Location: " . BASE . "admin" );
			exit();
		}

		if( Routing::$routing['param'] == 'pl' || Routing::$routing['param'] == 'en' ) {
			setcookie( COOKIE_LANG_NAME, Routing::$routing['param'], time()+157680000, '/' );
			header( "Location: " . BASE );
			exit();
		}

		if( $_POST['remind'] == 1 ) {
			$email = $_POST['email'];

			$sth = $this->pdo->prepare( "SELECT * FROM " . ADMIN_TABLE . " WHERE email = :email LIMIT 1" );
			$sth->execute( array( ':email' => $email ) );
			if( $sth->rowCount() > 0 ) {
				$this->data['u'] = $sth->fetch( PDO::FETCH_ASSOC );
				$token = $this->data['u']['token'];
				// $hashpass = substr( hash('sha512', rand()),0, 10 );
				// $newpass = sha1( $hashpass );
				// $token = sha1( $newpass . time() . $this->data['u']['id'] );
				// $sth = $this->pdo->prepare( "UPDATE uzytkownicy SET haslo = '{$newpass}', token = '{$token}' WHERE id = {$this->data['u']['id']}" );
				// $sth->execute();
				$l = $this->data['u']['lang'];
				$_SESSION[I_SUCCESS] = $this->data['dictionary'][136][$l];
				$mail = new PHPMailer();
				$body = file_get_contents( 'public/mailing/mailing.html' );
				$cta =  BASE . "profil/haslo/" . $this->data['u']['id'] . "/" . $token;
				$body = preg_replace( "/{{CONTENT}}/" , $this->data['dictionary'][134][$l], $body );
				$body = preg_replace( "/{{LANG}}/" , $l, $body );
				$body = preg_replace( "/{{BASE}}/" , BASE, $body );
				$body = preg_replace( "/{{CTA}}/" , $cta, $body );
				$body = preg_replace( "/{{PREFIX}}/" , 'remind', $body );
				$body = preg_replace( "/{{ALT}}/" , $this->data['dictionary'][57][LANG], $body );
				$mail->IsSMTP();
				$mail->SMTPDebug  = 0;
				$mail->SMTPAuth   = true;
				$mail->Subject    = $this->data['dictionary'][135][$l];
				$mail->MsgHTML($body);
				$mail->AddAddress( $this->data['u']['email'] );

				if( !$mail->Send() ) {
					echo "Mailer Error: " . $mail->ErrorInfo;
				}
					
			} else {
				$_SESSION[I_ERROR] = $this->data['dictionary'][6][LANG];
			}

			header("Location: " . BASE . Routing::$routing['controller']);
			exit();
		}

		if( $_POST['login-send'] == 1 ) {

			$login = ( $_POST['login'] ) ? trim( strip_tags( $_POST['login'] ) ) : null;
			$haslo = ( $_POST['haslo'] ) ? sha1( trim( strip_tags( $_POST['haslo'] ) ) ) : null;

			if( !$login )
				throw new modelException( $this->data['dictionary'][7][LANG], 4007 );

			if( !$haslo )
				throw new modelException( $this->data['dictionary'][8][LANG], 4008 );

			// $sth = $this->pdo->prepare( "SELECT *, DATE_FORMAT( ostatnie_logowanie, '%d-%m-%Y %H:%i') as ostatnie_logowanie_format FROM users WHERE email = :login AND haslo='{$haslo}' AND stat = '1' LIMIT 1" );
			$sth = $this->pdo->prepare( "SELECT *, DATE_FORMAT( ostatnie_logowanie, '%d-%m-%Y %H:%i') as ostatnie_logowanie_format FROM " . ADMIN_TABLE . " WHERE email = :login AND haslo='{$haslo}' AND stat = '1' LIMIT 1" );
			$sth->bindParam( ':login', $login, PDO::PARAM_STR );
			$sth->execute();
			$row = $sth->fetch();
			
			if( !$row )
				throw new modelException( $this->data['dictionary'][9][LANG], 4009 );

			if( $row['newsroom_klient_id'] != NULL ) {
				$sth = $this->pdo->prepare( "SELECT * FROM firmy WHERE stat = '1' AND id = {$row['newsroom_klient_id']} LIMIT 1" );
				$sth->execute();
				if( $sth->rowCount() < 1 )
					throw new modelException( $this->data['dictionary'][45][LANG], 4009 );
			}

			Auth::register( $row );
			$_SESSION[I_SUCCESS] = "Poprawnie zalogowano do panelu";
			// $sth = $this->pdo->prepare( "UPDATE " . ADMIN_TABLE . " SET ostatnie_logowanie = NOW(), pierwsze_logowanie = '1' WHERE id = {$row['id']}" );
			$sth = $this->pdo->prepare( "UPDATE " . ADMIN_TABLE . " SET ostatnie_logowanie = NOW() WHERE id = {$row['id']}" );
			$sth->execute();

			if( $row['pierwsze_logowanie'] == '0' ) {
				header( "Location: " . BASE . "profil/haslo/" . $row['id'] );
				exit();
			}

			if( $_SESSION['redirect'] && $_SESSION['redirect'] != BASE . 'konto/login' ) {
				header( "Location: " . $_SESSION['redirect'] );
			} else {
				header( "Location: " . BASE . "admin" );
			}
			$_SESSION['redirect'] = null;
			exit();
		}
	}

	function szukaj() {
		if( !$_GET['szukaj'] ) {
			$this->data['results'] = [];
			return;
		}

		$this->data['search'] = $search = strip_tags( trim( $_GET['szukaj'] ) );

		// szukam artykułów
		$sth = $this->pdo->prepare( "SELECT *, 'artykul' as _TYPE_LINK_ FROM artykuly WHERE stat = '1' AND (tytul_" . LANG . " REGEXP '{$search}' OR tresc_" . LANG . " REGEXP '{$search}')" );
		$sth->execute();
		$this->data['aktualnosci'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		// szukam newsroom
		$sth = $this->pdo->prepare( "SELECT *, 'newsroom' as _TYPE_LINK_ FROM newsroom WHERE stat = '1' AND (tytul_" . LANG . " REGEXP '{$search}' OR tresc_" . LANG . " REGEXP '{$search}')" );
		$sth->execute();
		$this->data['newsroom'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		// szukam wydarzeń
		$sth = $this->pdo->prepare( "SELECT *, 'wydarzenia' as _TYPE_LINK_ FROM wydarzenia WHERE stat = '1' AND (tytul_" . LANG . " REGEXP '{$search}' OR tresc_" . LANG . " REGEXP '{$search}')" );
		$sth->execute();
		$this->data['wydarzenia'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		// szukam stron
		$sth = $this->pdo->prepare( "SELECT *, 'strona' as _TYPE_LINK_ FROM strony WHERE stat = '1' AND (tytul_" . LANG . " REGEXP '{$search}' OR tresc_" . LANG . " REGEXP '{$search}')" );
		$sth->execute();
		$this->data['strony'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		$this->data['results'] = array_merge( $this->data['aktualnosci'], $this->data['newsroom'], $this->data['wydarzenia'], $this->data['strony'] );
	}
}
