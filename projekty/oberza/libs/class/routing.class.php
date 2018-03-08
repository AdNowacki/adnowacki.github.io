<?php 
/**
 * Routing
 * odpowiedzialny za ustawnienie na podstawie uri nazw kontrolera, akcji i parametrów
 */
class Routing {

/**
 * $routing przechowuje nazwę kontrolera, akcji i parametrów zapytania
 * @var array
 */
	public static $routing = array();

/**
 * $get przechowuje całą tablicę $_GET
 * @var array
 */
	public static $get = array();

/**
 * $allowed_string_params - przechowuje dopuszczalne parametry routingu, poza int
 * @var array
 */
	public static $allowed_string_params = array( 'all', 'total' );

/**
 * $controller nazwa kontrolera
 * @var [type]
 */
	public static $controller;

/**
 * $action nazwa akcji
 * @var [type]
 */
	public static $action;

/**
 * $param parametr do akcji
 * @var [type]
 */
	public static $param;

/**
 * $title parametr tytuł
 * @var [type]
 */
	public static $title;

/**
 * $other_param pozostałe parametry
 * @var [type]
 */
	public static $other_param;

/**
 * $other_param2 pozostałe parametry
 * @var [type]
 */
	public static $other_param2;

/**
 * $other_param3 pozostałe parametry
 * @var [type]
 */
	public static $other_param3;

/**
 * $controller_ob referencja do obiektu kontrollera
 * @var [type]
 */
	private static $controller_ob;

	public static $active = array();


/**
 * setAllowedParam można ustawić dozwolone wartości dla parametru
 * @param array $arr [description]
 */
	public static function setAllowedParam( array $arr ) {
		self::$allowed_string_params = $arr;
	}


/**
 * init start routingu na podstawie zmiennej $_GET
 * @return [type] [description]
 */
	public static function init() {
		self::$routing['controller'] = self::$controller = CONTROLLER;
		self::$routing['action'] = self::$action = ACTION;
		if( $_GET ) {
			self::$get = $_GET;
			self::$routing = self::$get['trace'];
			self::setRoute();
		}

	}

/**
 * setRoute ustawia właściwości statyczne potrzebne do wystarotowania kontrolera i akcji
 */
	public static function setRoute() {
		$trace = explode( '/' , self::$routing );
		self::$routing = array();
		self::$routing['controller'] = ( self::$controller = $trace[0] ) ? self::$controller = str_replace( '-', '', $trace[0] ) : CONTROLLER;
		self::$routing['action'] = ( self::$action = $trace[1] ) ? self::$action = $trace[1] : ACTION;
		self::$routing['param'] = ( self::$param = $trace[2] ) ? self::$param = $trace[2] : NULL;
		self::$routing['title'] = ( self::$title = $trace[3] ) ? self::$title = $trace[3] : NULL;
		self::$routing['other_param'] = ( self::$other_param = $trace[4] ) ? self::$other_param = $trace[4] : NULL;
		self::$routing['other_param2'] = ( self::$other_param2 = $trace[5] ) ? self::$other_param2 = $trace[5] : NULL;
		self::$routing['other_param3'] = ( self::$other_param3 = $trace[6] ) ? self::$other_param3 = $trace[6] : NULL;
		if( self::$routing['param'] ) {
			try {
				self::checkParam();
			} catch (routingException $e) {
				$message = $e->getMessage() . ' kod blędu: ' . $e->getCode();
				Error::setMessage( 'param_allowed', $message, 'error' );
			}
		}
	}

/**
 * checkParam - sprawdzam czy parametr Routing::$param jest liczbą, albo znajduje się w dozwolonych wartościach
 * @return [type] [description]
 */
	public static function checkParam() {
		if( !is_numeric( self::$routing['param'] ) && !in_array( self::$routing['param'], self::$allowed_string_params ) )
			throw new routingException( 'Niedozwolony parametr w adresie URI' , 1001);
	}

/**
 * startController - start kontrollera
 * @return [type] [description]
 */
	public static function startController() {
		self::$controller = ( self::$controller ) ? self::$controller : CONTROLLER;
        $controller = self::$controller . 'Controller';

        try {
        	if( !file_exists( 'libs/controller/' . $controller . '.php' ) ) {
        		Helper::e404Redirect();
        		throw new controllerException( "Brak szukanej strony", 2001 );
        	}
        } catch (controllerException $e) {
        	Error::setMessage( 'controller_include', $e->getMessage() . ' kod błędu:' . $e->getCode(), 'error' );
        	$controller = CONTROLLER . 'Controller';
        }
        require 'libs/controller/' . $controller . '.php';
        self::$controller_ob = new $controller();
        self::$controller_ob->name = self::$controller;
        return self::$controller_ob;
	}

/**
 * startAction - start kontrollera
 * @return [type] [description]
 */
	public static function startAction() {
        $action = ( method_exists( self::$controller_ob , self::$action ) ) ? self::$action : ACTION;

        try {
	        if( !method_exists( self::$controller_ob , $action) ) {
        		Helper::e404Redirect();
        		throw new controllerException( "Brak szukanej strony", 2002 );
	        }
        } catch (controllerException $e) {
        	Error::setMessage( 'controller_action', $e->getMessage() . ' kod błędu:' . $e->getCode(), 'error' );
        	$action = ACTION;
        }
        self::$controller_ob->actionName = $action;
        self::$controller_ob->setView();
        return $action;
	}

/**
 * startModel start Modelu
 * @return [type] [description]
 */
	public static function startModel() {
		$model = self::$controller . 'Model';
		try {
        	if( !file_exists( 'libs/model/' . $model . '.php' ) ) {
        		Helper::e404Redirect();
        		throw new modelException( "Brak szukanej strony", 4001 );
        	}
        } catch (modelException $e) {
        	Error::setMessage( 'model_include', $e->getMessage() . ' kod błędu:' . $e->getCode(), 'error' );
        	$model = CONTROLLER . 'Model';
        	self::$controller = CONTROLLER;
        }
        require 'libs/model/' . $model . '.php';
        self::$controller_ob->setModel( self::$controller );
	}

/**
 * wywołanie akcji Modelu
 * @return [type] [description]
 */
	public static function startActionModel() {
		$action = ( method_exists( self::$controller_ob->model , self::$action ) ) ? self::$action : ACTION;

        try {
	        if( !method_exists( self::$controller_ob->model , $action) ) {
        		Helper::e404Redirect();
        		throw new controllerException( "Brak szukanej akcji modelu", 4002 );
	        }
        } catch (Exception $e) {
        	Error::setMessage( 'model_action', $e->getMessage() . ' kod błędu:' . $e->getCode(), 'error' );
        	$action = ACTION;
        }
        try {
        	self::$controller_ob->model->{$action}();
        } catch ( modelException $e ) {
        	Error::setMessage( 'error_action_model', $e->getMessage(), 'error', $e->getCode() );
        }
	}

/**
 * initHelper inicjalizacja helperów
 * @return [type] [description]
 */
	public static function initHelper() {
		return new Helper();
	}


}
