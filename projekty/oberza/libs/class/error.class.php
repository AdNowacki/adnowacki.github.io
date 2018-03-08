<?php 

class Error {
	public $vars = array();
/**
 * $infos tablica przechowująca komunikaty błędów
 * @var array
 */
	public static $infos = array();

	function __set( $n, $v ) {
		$this->vars[$n] = $v;
	}

	function __get( $n ) {
		return $this->vars[$n];
	}

/**
 * setMessage tworzenie komunikatów błędu
 * @var $index - indeks pod którym będzie przechowywany komunikat w tablice Error::$infos
 * @var $value - treść komunikatu
 * @var $type - typ komunikatu (success, error)
 */
	public static function setMessage( $index, $value, $type, $errorCode = null ) {
		self::$infos[$index]['type'] = $type;
		self::$infos[$index]['message'] = $value;
		self::$infos[$index]['code'] = $errorCode;

	}

/**
 * getMessageItem - pobranie komunikatu o konkretnym indeksie
 * return array
 */
	public static function getMessageItem( $index ) {
		return ( self::$infos[ $index ] ) ? self::$infos[ $index ] : [];
	}

/**
 * getMessage - pobranie wszystkich komunikatów
 * return array
 */
	public static function getMessage() {
		return self::$infos;
	}
}
