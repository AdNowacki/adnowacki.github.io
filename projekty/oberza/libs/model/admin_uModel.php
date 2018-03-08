<?php

class admin_uModel extends Model {

	public $options = [ 'Table' => 'users', 'Redirect' => 'admin_u', 'SearchCol' => '',];
	public $data = [ 'admin' => true ];

	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$this->getUser();
		$client = (int)$_SESSION[AUTH_SESSION_NAME]['client'];
		$uid = (int)$_SESSION[AUTH_SESSION_NAME]['im'];
		$id = Routing::$routing['param'];

		$limit = PERPAGE;
		$offset = ( !$_GET['p'] ) ? 0 : ( (int)$_GET['p'] - 1 ) * PERPAGE;

		$this->data['search'] = trim( strip_tags( $_GET['search'] ) );
		$search = ( $_GET['search'] ) ? " AND imie REGEXP '" . trim( strip_tags( $_GET['search'] ) ) . "' OR nazwisko REGEXP '" . trim( strip_tags( $_GET['search'] ) ) . "'" : '';
			
		$sth = $this->pdo->prepare( "SELECT * FROM {$this->options['Table']} WHERE ( uprawnienia = 'admin' || uprawnienia = 'user' ) {$search} ORDER BY nazwisko, imie LIMIT {$limit} OFFSET {$offset}" );
		$sth->execute();
		$this->data['users'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		$sth = $this->pdo->prepare( "SELECT COUNT(*) as TOTAL FROM {$this->options['Table']} WHERE ( uprawnienia = 'admin' || uprawnienia = 'user' ) {$search}" );
		$sth->execute();
		$total = $sth->fetch( PDO::FETCH_ASSOC );
		$this->data['TOTAL'] = $total['TOTAL'];

		$sth = $this->pdo->prepare( "SELECT * FROM {$this->options['Table']} WHERE id = {$this->data['user_log']['id']} AND uprawnienia = 'superadmin' LIMIT 1" );
		$sth->execute();
		$this->data['superadmin'] = $sth->fetch( PDO::FETCH_ASSOC );


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

		header( "Location: " . BASE . $this->options['Redirect'] . "/widok/" . Routing::$routing['title'] );
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

		header( "Location: " . BASE . $this->options['Redirect'] . "/widok/" . Routing::$routing['title'] );
		exit();
	}
	function usun() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$id = explode( ';', Routing::$routing['param'] );
		$c = Routing::$routing['title'];
		$ids = $id[0];
		$target = $id[1];
		if( $c != 'confirm' ) {
			header( "Location: " . BASE . $this->options['Redirect'] );
			exit();
		}

		$sth = $this->pdo->prepare( "SELECT image, pozycja FROM {$this->options['Table']} WHERE id = $ids LIMIT 1" );
		$sth->execute();

		$sth = $this->pdo->prepare( "DELETE FROM {$this->options['Table']} WHERE id = $ids LIMIT 1" );
		$sth->execute();

		if( $sth->rowCount() > 0 ) {
			$_SESSION[I_SUCCESS] = "Poprawnie usunięto wpis";
		} else {
			$_SESSION[I_ERROR] = "Wystąpił problem z usunięciem wpisu";
		}

		header( "Location: " . BASE . $this->options['Redirect'] . '/widok/' . $target );
		exit();
	}

	function edytuj() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getUser();
		$id = (int)Routing::$routing['param'];

		if( !$id )
			throw new modelException( "Brak wymaganego parametru", 1 );
		
		$sth = $this->pdo->prepare( "SELECT * FROM {$this->options['Table']} WHERE id = $id LIMIT 1" );
		$sth->execute();


		if( $sth->rowCount() < 1 )
			throw new modelException( "Szukany wpis nie istnieje", 1);
			
		$this->data['user'] = $sth->fetch( PDO::FETCH_ASSOC );

		if( $_POST['edit'] == 1 ) {
			$this->data['imie'] = trim( $_POST['imie'] );
			$this->data['nazwisko'] = trim( $_POST['nazwisko'] );
			$this->data['uprawnienia'] = trim( $_POST['uprawnienia'] );
			$this->data['stat'] = $_POST['stat'] = ( $_POST['stat'] ) ? 1 : 0;

			$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET imie = :imie, nazwisko = :nazwisko, uprawnienia = '{$this->data[uprawnienia]}' WHERE id = {$id}" );
			
			if( !$sth->execute( [ ':imie' => $this->data['imie'], ':nazwisko' => $this->data['nazwisko'], ] ) ) {
				throw new modelException( "Wystąpił błąd podczas edycji wpisu", 1);
			}

			if( $_POST['new_pass'] ) {
				$pass = Helper::randomPassword();
				$shaPass = sha1( $pass );
				$token = hash( 'sha256' , $id . time() . $shaPass );
				$sth = $this->pdo->prepare( "UPDATE {$this->options['Table']} SET haslo = '{$shaPass}', token = '{$token}' WHERE id = {$id}" );
				$sth->execute();

				$this->data['email'] = $_POST['email'];

				$mail = new PHPMailer;
				$mail->isSMTP();
				$mail->SMTPDebug = 0;
				$mail->SMTPAuth = true;
				$mail->addReplyTo( MAIL_FROM, MAIL_FROM_NAME );
				$mail->addAddress( $this->data['email'], '');
				$mail->Subject = $this->data['dictionary'][135][LANG];

				$body = @file_get_contents( 'public/mail/mail.html' );
				$body = preg_replace( "/{{BASE}}/" , BASE, $body );
				$body = preg_replace( "/{{CONTENT}}/" , $this->data['dictionary'][136][LANG], $body );
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

				$link = "<a href='" . BASE . "index/admin' style='color: #f1f1f1; text-decoration: none;'>PANEL ADMINISTRACYJNY</a>";
				$body = preg_replace( "/{{LINK}}/" , $link, $body );
				$body = preg_replace( "/{{LOGIN}}/" , $this->data['email'], $body );
				$body = preg_replace( "/{{HASLO}}/" , $pass, $body );
				$mail->msgHTML( $body );
				if (!$mail->send())
				    throw new modelException( "Wystąpił problem z wysłaniem emaila", 4016 );
				$_SESSION[I_SUCCESS] = "Poprawnie dodano nowego użytkownika. Na jego adres email została wysłana wiadomosc z danymi dostępowymi";

			}
				
			$_SESSION[I_SUCCESS] = "Poprawnie edytowano wpis";
			header( "Location: " . BASE . $this->options['Redirect'] . "/widok/" . Routing::$routing['title'] );
			exit();
		}
	}

	function dodaj() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getUser();
		$uid = $this->data['user_log']['id'];
		$id = (int)Routing::$routing['param'];


		if( $_POST['add'] == 1 ) {	
			$this->data['typ'] = $_POST['uprawnienia'];
			$this->data['admin_'] = (int)$_POST['admin'];
			$this->data['email'] = strip_tags( trim( $_POST['email'] ) );
			$this->data['imie'] = trim( $_POST['imie'] );
			$this->data['nazwisko'] = trim( $_POST['nazwisko'] );
			$this->data['haslo'] = trim( $_POST['haslo'] );
			$this->data['haslo2'] = trim( $_POST['haslo2'] );
			$this->data['stat'] = $_POST['stat'] = ( $_POST['stat'] ) ? 1 : 0;

			if( !preg_match( "/@/" , $this->data['email'] ) )
				throw new modelException( "Niepoprawny adres email", 1 );

			$domain = end( explode( '@' , $this->data['email'] ) );

			if( !checkdnsrr( $domain,'MX' ) )
				throw new modelException( "Domena adresu email jest nieprawidłowa", 1 );

			if( strlen( $this->data['haslo'] ) < 6 )
				throw new modelException( "Hasło musi składać się z co najmniej 6 znaków", 1 );

			if( $this->data['haslo'] != $this->data['haslo2'] )
				throw new modelException( "Wpisane hasła nie są identyczne", 1 );

			$sth = $this->pdo->prepare( "SELECT * FROM {$this->options['Table']} WHERE email = :email LIMIT 1" );
			$sth->execute( [':email' => $this->data['email']] );
			if( $sth->rowCount() > 0 )
				throw new modelException( "Podany adres email jest już zarejestrowany", 1 );
				

			$haslo = sha1( $this->data['haslo'] );
			$token = sha1( $haslo . $this->data['biuro'] . $this->data['email'], $this->data['imie'] );

				
			$sth = $this->pdo->prepare( "INSERT INTO {$this->options['Table']} (newsroom_klient_id, email, haslo, imie, nazwisko, od_kiedy, uprawnienia, admin, token, stat ) VALUES( NULL, :email, '{$haslo}', :imie, :nazwisko, NOW(), :uprawnienia, '{$this->data['admin_']}', '{$token}', '{$this->data['stat']}' )" );
			$sth->execute( 
				[
					':email' => $this->data['email'], 
					':imie' => $this->data['imie'], 
					':nazwisko' => $this->data['nazwisko'], 
					':uprawnienia' => $this->data['typ'], 
				]
			 );

			if( $sth->rowCount() < 1 ) 
				throw new modelException( "Wystąpił problem z dodaniem wpisu", 1);

			if( $this->data['stat'] == 1 ) {
				$mail = new PHPMailer;
				$mail->isSMTP();
				$mail->SMTPDebug = 0;
				$mail->SMTPAuth = true;
				$mail->addReplyTo( MAIL_FROM, MAIL_FROM_NAME );
				$mail->addAddress( $this->data['email'], '');
				$mail->Subject = $this->data['dictionary'][31][LANG];

				$body = @file_get_contents( 'public/mail/mail.html' );
				$body = preg_replace( "/{{BASE}}/" , BASE, $body );
				$body = preg_replace( "/{{CONTENT}}/" , $this->data['dictionary'][32][LANG], $body );
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


				$link = "<a href='" . BASE . "index/admin' style='color: #f1f1f1; text-decoration: none;'>PANEL ADMINISTRACYJNY</a>";
				$body = preg_replace( "/{{LINK}}/" , $link, $body );
				$body = preg_replace( "/{{LOGIN}}/" , $this->data['email'], $body );
				$body = preg_replace( "/{{HASLO}}/" , $this->data['haslo'], $body );
				$mail->msgHTML( $body );
				if (!$mail->send())
				    throw new modelException( "Wystąpił problem z wysłaniem emaila", 4016 );
			