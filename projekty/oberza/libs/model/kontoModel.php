<?php

class kontoModel extends Model {
	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$id = (int)$_SESSION[AUTH_SESSION_NAME]['im'];
		$did = (int)$_SESSION[AUTH_SESSION_NAME]['dealer'];
		$sth = $this->pdo->prepare( "SELECT *, k.id as KID FROM kontrahenci as k JOIN dealerzy as d ON(d.id = k.id_dealera) WHERE k.id = $id AND id_dealera = $did LIMIT 1" );
		$sth->execute();
		$this->data['user']['details'] = $sth->fetch();
		$this->data['user']['type'] = $this->data['user']['details']['typ'];
	}

	function login() {
		if( $_POST['login-send'] == 1 ) {
			$login = ( $_POST['login'] ) ? trim( strip_tags( $_POST['login'] ) ) : null;
			$haslo = ( $_POST['haslo'] ) ? sha1( trim( strip_tags( $_POST['haslo'] ) ) ) : null;

			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			    $ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
			    $ip = $_SERVER['REMOTE_ADDR'];
			}

			if( !$login )
				throw new modelException( $this->data['dictionary'][2][LANG], 4007 );

			if( !$haslo )
				throw new modelException( $this->data['dictionary'][3][LANG], 4008 );

			$sth = $this->pdo->prepare( "SELECT * FROM kontrahenci WHERE email = :login AND haslo='{$haslo}' AND stat = '1' AND usuniety = '0' LIMIT 1" );
			$sth->bindParam( ':login', $login, PDO::PARAM_STR );
			$sth->execute();
			$row = $sth->fetch();


			Auth::register( $row );
			$_SESSION['login_success'] = true;
			$sth = $this->pdo->prepare( "UPDATE kontrahenci SET ostatnie_logowanie = NOW() WHERE id = {$row['id']}" );
			$sth->execute();

			$sth = $this->pdo->prepare( "INSERT logowania (id_usera, ip, data, stat) VALUES({$row['id']}, :ip, NOW(), '1')" );
			$sth->execute( array( ':ip' => $ip ) );

			if( $_POST['redirect'] && $_POST['redirect'] != BASE . 'konto/login' ) {
				header( "Location: " . $_POST['redirect'] );
			} else {
				header( "Location: " . BASE . "konto" );
			}
			exit();
		}
	}

	function logout() {}

/**
 * przypomnij przypominanie hasła
 * @return [type] [description]
 */
	function przypomnij() {
		if( $_POST['remind-send'] == 1 ) {
			$email = Helper::clearInput( $_POST['email'] );
			$sth = $this->pdo->prepare( "SELECT * FROM kontrahenci WHERE email = :email AND stat = '1' AND usuniety = '0' LIMIT 1" );
			$sth->bindParam( ':email', $email );
			$sth->execute();
			if( $sth->rowCount() == 0 )
				throw new modelException( $this->data['dictionary'][6][LANG], 4009 );

			$u = $sth->fetch(PDO::FETCH_ASSOC);
			$id = (int)$u['id'];
			$token = md5( $email . time() );
			$sth = $this->pdo->prepare( "UPDATE kontrahenci SET token = '{$token}' WHERE id = {$id}" );
			$sth->execute();

			$mail = new PHPMailer;
			try {
				$body = file_get_contents( 'public/mailing/reset.html' );
				$link = BASE . 'konto/reset/' . $token;
				$title = $this->data['dictionary'][35]['pl'];
				$ctn = $this->data['dictionary'][36]['pl'];
				$copy_txt = $this->data['dictionary'][34]['pl'] . "<br><br>" . $link;
				$footer_title = $this->data['dictionary'][30]['pl'];
				$footer_phone = $this->data['dictionary'][31]['pl'];
				$footer_mobile = $this->data['dictionary'][32]['pl'];
				$footer_email = $this->data['dictionary'][33]['pl'];

				$body = preg_replace( '/{{__BASE__}}/' , BASE . 'public/mailing/', $body );
				$body = preg_replace( '/{{__TITLE__}}/' , $title, $body );
				$body = preg_replace( '/{{__CONTENT__}}/' , $ctn, $body );
				$body = preg_replace( '/{{__LINK__}}/' , $link, $body );
				$body = preg_replace( '/{{__COPY_LINK__}}/' , $copy_txt, $body );
				$body = preg_replace( '/{{__S_TOP__}}/' , $footer_title, $body );
				$body = preg_replace( '/{{__PHONE__}}/' , $footer_phone, $body );
				$body = preg_replace( '/{{__MOBILE__}}/' , $footer_mobile, $body );
				$body = preg_replace( '/{{__EMAIL__}}/' , $footer_email, $body );

				$mail->isSMTP();
				$mail->SMTPDebug = 0;
				$mail->SMTPAuth = true;
				$mail->addReplyTo( MAIL_FROM, MAIL_FROM_NAME );
				$mail->addAddress( $email, '');
				$mail->Subject = $this->data['dictionary'][37]['pl'];
				$mail->msgHTML( $body );

				if (!$mail->send())
				    throw new modelException( $this->data['dictionary'][7][LANG], 4016 );
				    
				$_SESSION['reset-success']  = true;
				header( "Location: " . BASE . Routing::$routing['controller'] . '/' . Routing::$routing['action'] );
				exit();
			} catch ( phpmailerException $e ) {
				Error::setMessage( 'Wystąpił problem z PHPMailer!', 'error', $e->getCode() );
			} catch ( modelException $e ) {
				Error::setMessage( 'Wystąpił problem z PHPMailer!', 'error', $e->getCode() );
			}

		}
	}

/**
 * uzytkownik aktywacja konta nowego użytkownika
 * @return [type] [description]
 */
	function uzytkownik() {
		$token = Routing::$routing['param'];

		// $sth = $this->pdo->prepare( "UPDATE kontrahenci SET ip = '{$ip}' WHERE stat = '0' AND usuniety = '0' AND ip = '' AND data_aktywacji IS NULL AND token = '{$token}'" );
		$sth = $this->pdo->prepare( "SELECT * FROM kontrahenci WHERE stat = '0' AND usuniety = '0' AND ip = '' AND data_aktywacji IS NULL AND token = '{$token}' LIMIT 1" );
		$sth->execute();
		if( $sth->rowCount() == 0 )
			throw new modelException( $this->data['dictionary'][8][LANG], 4009 );

		$this->data['u'] = $sth->fetch();

		if( $_POST['new-account-send'] == 1 ) {
			$uid = (int)$_POST['u'];
			$token = Routing::$routing['param'];
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			    $ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
			    $ip = $_SERVER['REMOTE_ADDR'];
			}

		    $pass = $_POST['new-pass'];
			$pass2 = $_POST['new-pass-2'];

			if( !$pass ) {
				$error = true;
				Error::setMessage( 'password', $this->data['dictionary'][3][LANG], 'error' );
			}

			if( !$pass2 ) {
				$error = true;
				Error::setMessage( 'password2', $this->data['dictionary'][9][LANG], 'error' );
			}


			if( $error )
				throw new modelException( $this->data['dictionary'][10][LANG], 4011 );

			if( $pass != $pass2 )
				throw new modelException( $this->data['dictionary'][11][LANG], 4017 );

			if( !preg_match( '/^[^\s]{1}.{4,}[^\s]{1}$/' , $pass ) )
				throw new modelException( $this->data['dictionary'][12][LANG], 4017 );

			$password = sha1( $pass );

			$sth = $this->pdo->prepare( "UPDATE kontrahenci SET haslo = '{$password}', data_aktywacji = NOW(), ip = '{$ip}', stat = '1' WHERE id = {$uid} AND token = :token AND usuniety = '0' AND stat = '0'" );
			$sth->bindParam( ':token', $token );
			$sth->execute();

			if( $sth->rowCount() == 0 )
				throw new modelException( $this->data['dictionary'][13][LANG], 4018 );

			$sth = $this->pdo->prepare( "SELECT * FROM kontrahenci WHERE id = {$uid} AND token = :token AND usuniety = '0' AND stat = '1' LIMIT 1" );
			$sth->bindParam( ':token', $token );
			$sth->execute();

			if( $sth->rowCount() == 0 )
				throw new modelException( $this->data['dictionary'][14][LANG], 4018 );
			
			$data = $sth->fetch(PDO::FETCH_ASSOC);
			Auth::register( $data );
			$_SESSION['activate_account_success'] = true;
			header( "Location: " . BASE . 'konto' );
			exit();
				
		}
	}

	function reset() {
		$token = Routing::$routing['param'];
		$sth = $this->pdo->prepare( "SELECT * FROM kontrahenci WHERE stat = '1' AND usuniety = '0' AND data_aktywacji IS NOT NULL AND token = '{$token}' LIMIT 1" );
		$sth->execute();
		if( $sth->rowCount() == 0 )
			throw new modelException( $this->data['dictionary'][8][LANG], 4009 );

		$this->data['u'] = $sth->fetch();

		if( $_POST['new-password-send'] == 1 ) {
			$uid = (int)$_POST['u'];
			$pass = $_POST['new-pass'];
			$pass2 = $_POST['new-pass-2'];

			if( !$pass ) {
				$error = true;
				Error::setMessage( 'password', $this->data['dictionary'][3][LANG], 'error' );
			}

			if( !$pass2 ) {
				$error = true;
				Error::setMessage( 'password2', $this->data['dictionary'][9][LANG], 'error' );
			}


			if( $error )
				throw new modelException( $this->data['dictionary'][10][LANG], 4011 );

			if( $pass != $pass2 )
				throw new modelException( $this->data['dictionary'][11][LANG], 4017 );

			if( !preg_match( '/^[^\s]{1}.{4,}[^\s]{1}$/' , $pass ) )
				throw new modelException( $this->data['dictionary'][12][LANG], 4017 );

			$password = sha1( $pass );
			$newtoken = md5( time() );
			$sth = $this->pdo->prepare( "UPDATE kontrahenci SET haslo = '{$password}', token = '{$newtoken}' WHERE id = {$uid} AND token = :token AND usuniety = '0'" );
			$sth->bindParam( ':token', $token );
			if( !$sth->execute() )
				throw new modelException( $this->data['dictionary'][15][LANG], 4019 );

			$_SESSION['new-pass-success'] = true;
			header( 'Location: ' . BASE . 'konto/login' );
			exit();
		}
	}


}
