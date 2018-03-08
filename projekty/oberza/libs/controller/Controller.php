<?php

abstract class Controller {

	public $oCMS = false;

	public $vars = array();

/**
 * $name przechowuje nazwę kontrolera
 * @var [string]
 */
	public $name;

/*
 * $actionName przechowuje nazwę akcji kontrolera
 * @var [type]
 */
	public $actionName;

/**
 * $helper przechowuje refernencję do obiektu helpera.
 * @var [type]
 */
	public $helper;

/**
 * $model obiekt Modelu
 * @var [type]
 */
	public $model;

/**
 * $view obiekt Widoku
 * @var [type]
 */
	public $view;

/**
 * $access dostęp do strony
 * @var [string] public | private
 */
	public $access = 'private';

/**
 * $data 
 * @var [type]
 */
	protected $data;

	function __set( $n, $v ) {
		$this->vars[$n] = $v;
	}

	function __get( $n ) {
		return $this->vars[$n];
	}

/**
 * getControllerClass pobieran nazwę klasy
 * @return [type] [description]
 */
	function getControllerClass() {
		return get_class($this);
	}

/**
 * index - abstrakcyjna metoda index
 * @return [] []
 */
	abstract function index();

/**
 * [show description]
 * @return [type] [description]
 */
	abstract function widok();

/**
 * setView ustawia obiekt Widoku
 */
	function setView() {
		$this->view = new View();
	}

/**
 * startModel ustawia obiekt Modelu i wywołuje jego akcję
 * @param  [type] $nameModel [description]
 * @return [type]            [description]
 */
	function setModel( $nameModel ) {
		$n = $nameModel . 'Model';
		$this->model = new $n( $nameModel );
		// pobieranie treści z tabeli config
	    try {
	        $this->model->dictionary();
	        $this->model->pageDictionary();
	    } catch (modelException $e) {
	        Error::setMessage( 'no-data-config', 'Brak tłumaczeń', 'error', $e->getCode() );
	    }
		Routing::startActionModel();
	}

/**
 * paramIdExist sprawdza czy parametr Routing::$routing['param'] istnieje
 * @return [type] [description]
 */
	function paramIdExist() {
		try {
			if( !Routing::$routing['param'] )
				throw new controllerException( "Ta strona wymaga wprowadzenia parametru" , 2003 );
		} catch (controllerException $e) {
			$message = $e->getMessage();
			Error::setMessage( 'empty_routing_param', $message, 'error', $e->getCode() );
		}
	}

/**
 * renderTemplate ustawia plik strukturalny template'u katalog i plik główny template'u
 * @return [type] [description]
 */
	function renderTemplate() {
		try {
			if( !$this->oCMS )
				$this->view->setStructureFile( TEMPLATE_DIR . 'page.php', $this->name, $this->actionName );
			else
				$this->view->setStructureFile( TEMPLATE_DIR . 'admin.php', '_oCMS/' . $this->name, $this->actionName );
		} catch (viewException $e) {
        	Error::setMessage( 'template_file', $e->getMessage() . ' kod błędu:' . $e->getCode(), 'error' );
			$this->view->setStructureFile( TEMPLATE_DIR . 'page.php', 'index', 'index' );
		}
	}

/**
 * getData pobranie 
 * @param  [type] $index [description]
 * @return [type]        [description]
 */
	function getData( $index = null ) {
		if( $index )
			$this->data[$index]	= $this->model->getData( $index );
		else 
			$this->data = $this->model->getData( $index );
		
		$this->view->data = $this->data;
	}


/**
 * addToBasket dodawanie produktu do koszyka
 */
	function addToBasket() {
		if( $_POST['add_to_cart'] == 1 ) {
	
			$pid = (int)$_POST['product_id'];
			$mid = (int)$_POST['model_id'];
			$cid = (int)$_POST['category_id'];

			$color = ( $_POST["option-color"] ) ? $_POST["option-color"] : NULL;
			$size = ( $_POST["option-size"] ) ? $_POST["option-size"] : NULL;
			unset( $_POST['add_to_cart'] );


			if( $_SESSION[BASKET_SESSION_NAME][$mid] ) {
				if( $size )
					$_SESSION[BASKET_SESSION_NAME][$mid][$size] = $_POST;
				else
					$_SESSION[BASKET_SESSION_NAME][$mid][0] = $_POST;
			} else {
				if( $size )
					$_SESSION[BASKET_SESSION_NAME][$mid][$size] = $_POST;
				else
					$_SESSION[BASKET_SESSION_NAME][$mid][0] = $_POST;			}

			$_SESSION['addTo'] = 'Dodano <strong>' . trim( htmlspecialchars( $_POST['product_name'] ) ) . '</strong> do koszyka';

			header( "Location: " . BASE . Routing::$routing['controller'] . '/' . Routing::$routing['action'] . '/' . Routing::$routing['param'] . '/' . Helper::uri_string( Routing::$routing['title'] ) );
			exit();
		}
	}


	function removeBasket() {
		$_SESSION[BASKET_SESSION_NAME] = NULL;
		unset( $_SESSION[BASKET_SESSION_NAME] );
	}

	function shipOptions() {
		// var_dump( $_SESSION[BASKET_SESSION_NAME] );
	}

	/**
 * isParamNumeric sprawdza czy parametr jest typu numerycznego - jeśli nie błąd 404
 * @param  [type]  $val [description]
 * @return boolean      [description]
 */
	function isParamNumeric( $val ) {
		if( !is_numeric( $val ) ) {
			header( "HTTP/1.0 404 Not Found" );
			header( "Location: " . BASE . "error/e404" );
			exit();
		}
	}


}


