<?php

/**
 * Model indexModel
 * Template templates/index/*
 * główny widok sklepu
 */

class profilController extends Controller {
	public $oCMS = true;

	function index() {
		$this->access = 'public';
	}
	function widok() {
		if( !Auth::sessionAuthExist() ) {
			header( "Location: " . BASE . "index/admin" );
			exit;
		}
		$this->getData();
	}
}
