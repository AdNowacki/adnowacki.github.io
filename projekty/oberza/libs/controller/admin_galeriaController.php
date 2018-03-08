<?php

/**
 * Model indexModel
 * Template templates/index/*
 * główny widok sklepu
 */

class admin_galeriaController extends Controller {
	public $oCMS = true;

	function index() {
		if( !Auth::sessionAuthExist() ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->access = 'public';
	}

	function widok() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getData();
	}

	function wlacz() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getData();
	}

	function wylacz() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getData();
	}

	function usun() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getData();
	}

	function edytuj() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getData();
	}

	function dodaj() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getData();
	}

	function dol() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getData();
	}

	function gora() {
		if( !Auth::sessionAuthExist() || Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom'] ) ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getData();
	}

}
