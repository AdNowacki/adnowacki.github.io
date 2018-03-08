<?php

class Auth {

/**
 * checkUserAuth sprawdza czy user zalogowany
 * @return [type] [description]
 */
	static function checkUserAuth() {
		if( !$_SESSION[USER_SESSION_NAME] ) {
			header('HTTP/1.0 404 Not Found', true, 404);
			header("Location: " . BASE . "error/e404");
			exit();
		}
	}

/**
 * checkAdminAuth sprawdza czy sesja do panelu admina jest ustawiona
 * @return [type] [description]
 */
	static function checkAdminAuth() {
		if( !$_SESSION[AUTH_SESSION_NAME] ) {
			header('HTTP/1.0 404 Not Found', true, 404);
			header("Location: " . BASE . "error/e404");
			exit();
		}
	}

/**
 * register rejestracja sesji dostępowej do panelu usera
 * @param  [type] $data [description]
 * @return [type]       [description]
 */
	static function register( $data ) {
		$_SESSION[AUTH_SESSION_NAME]['client'] = $data['id_klienta'];
		$_SESSION[AUTH_SESSION_NAME]['email'] = $data['email'];
		$_SESSION[AUTH_SESSION_NAME]['phone'] = $data['telefon'];
		$_SESSION[AUTH_SESSION_NAME]['last'] = $data['ostatnie_logowanie'];
		$_SESSION[AUTH_SESSION_NAME]['last_format'] = $data['ostatnie_logowanie_format'];
		$_SESSION[AUTH_SESSION_NAME]['i'] = $data['imie'];
		$_SESSION[AUTH_SESSION_NAME]['n'] = $data['nazwisko'];
		$_SESSION[AUTH_SESSION_NAME]['type'] = $data['typ'];
		$_SESSION[AUTH_SESSION_NAME]['permissions'] = $data['uprawnienia'];
		$_SESSION[AUTH_SESSION_NAME]['newsroomID'] = $data['newsroom_klient_id'];
		$_SESSION[AUTH_SESSION_NAME]['admin'] = $data['admin'];
		$_SESSION[AUTH_SESSION_NAME]['im'] = $data['id'];
		$_SESSION[ADMIN_PANEL] = 1;
	}

/**
 * unregister usuwanie sesji rejestracyjnej
 * @return [type] [description]
 */
	static function unregister() {
		$_SESSION[AUTH_SESSION_NAME] = null;
		unset( $_SESSION[AUTH_SESSION_NAME], $_SESSION[ADMIN_PANEL] );
	}

/**
 * sessionAuthExist sprawdza czy sesja uwierzytelniająca istnieje
 * @return [type] [description]
 */
	static function sessionAuthExist() {
		if( $_SESSION[AUTH_SESSION_NAME] )
			return true;

		return false;
	}

/**
 * helloUser przywitanie usera
 * @return [type] [description]
 */
	static function helloUser() {
		if( $_SESSION[AUTH_SESSION_NAME] ) {
			$html = "Witaj " . $_SESSION[AUTH_SESSION_NAME]['i'] . ' ' . $_SESSION[AUTH_SESSION_NAME]['n'];
			$html .= "<br>Twoje ostatnie logowanie: " . $_SESSION[AUTH_SESSION_NAME]['last_format'];
			$html .= "<br><strong><a href='" . BASE . "konto/logout'>wyloguj się</a></strong>";
			return $html;
		}
	}

/**
 * checkUserType - sprawdza czy admin dealera, jeśli nie to wypad
 * @return [type] [description]
 */
	static function checkUserType() {
		if( $_SESSION[AUTH_SESSION_NAME]['type'] != 1 ) {
			header( 'HTTP/1.0 404 Not Found', true, 404 );
			header( 'Location: ' . BASE . 'error/e404' );
			exit();
		}
	}

	static function ifAuth() {
		if( $_SESSION[AUTH_SESSION_NAME] )
			return true;

		return false;
	}

/**
 * accessDenied
 */
	static function accessDenied( $stat, array $elems ) {
		if( in_array( $stat , $elems ) )
			return true;

		return false;
	}
}
