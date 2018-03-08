<?php

/**
 * Model indexModel
 * Template templates/index/*
 * główny widok sklepu
 */

class restoController extends Controller {
	function index() {
		$this->access = 'public';
	}
	function widok() {
		$this->getData();
	}
	function admin() {
		$this->oCMS = true;
		$this->getData();
	}
	function video() {
		$this->getData();
	}
	function szukaj() {
		$this->getData();
	}
}
