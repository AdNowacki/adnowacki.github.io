<?php

/**
 * Model indexModel
 * Template templates/index/*
 * główny widok sklepu
 */

class admin_konfiguracjaController extends Controller {
	public $oCMS = true;

	function index() {
		if( !Auth::sessionAuthExist() ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->access = 'public';
	}

	function widok() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getData();
	}

	function edytuj() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getData();
	}

	function dodaj() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getData();
	}

}
