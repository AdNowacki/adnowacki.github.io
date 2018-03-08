<?php
/**
 * Model errorModel
 * Template templates/error/*
 */

class errorController extends Controller {

	function index() {
		header("Location: " . BASE . "error/e404");
		exit();
		$this->renderTemplate();
	}

	function widok() {}

	function e404() {
		header('HTTP/1.0 404 Not Found', true, 404);
		$this->getData();
		$this->renderTemplate();
		exit();
	}
}
