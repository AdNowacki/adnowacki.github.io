<?php

/**
 * Model logowanieModel
 * Template templates/logowanie/*
 * widok logowania
 */

class kontoController extends Controller {

	function index() {
		if( !Auth::sessionAuthExist() ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
	}

	function widok() {
		if( !Auth::sessionAuthExist() ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getData();
		$this->view->user_place = $this->data['user']['details'];
	}

	function login() {
		if( Auth::sessionAuthExist() ) {
			header( "Location: " . BASE . "konto" );
			exit;
		}
		$this->getData();
	}

	function logout() {
		if( !Auth::sessionAuthExist() ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		Auth::unregister();
		$_SESSION['logout-success'] = true;
		header( "Location: " . BASE );
		exit();

	}

	function przypomnij() {
		$this->getData();


	}

	function uzytkownik() {
		$this->paramIdExist();
		$this->getData();
	}

	function reset() {
		$this->paramIdExist();
		$this->getData();
	}
}


