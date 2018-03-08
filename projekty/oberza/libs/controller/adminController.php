<?php

/**
 * Model indexModel
 * Template templates/index/*
 * główny widok sklepu
 */

class adminController extends Controller {
	public $oCMS = true;

	function index() {
		if( !Auth::sessionAuthExist() ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->access = 'public';
	}

	function widok() {
		if( !Auth::sessionAuthExist() ) {
			header( "Location: " . BASE . "index/admin" );
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
		// $_SESSION['success'] = true;
		header( "Location: " . BASE . "index/admin" );
		exit();

	}

}
