<?php

/**
 * Model indexModel
 * Template templates/index/*
 * główny widok sklepu
 */

class stronaController extends Controller {

	function index() {
		$this->access = 'public';
	}
	function widok() {
		// $this->paramIdExist();
		$this->getData();
	}
}
