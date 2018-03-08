<?php

class View {
	public $vars = array();
	protected $structure_file = 'libs/templates/page.php';
	protected $view_dir = 'index';
	protected $template_file = 'index';
	public $controller_name;
	public $action_name;
	public $param;
	public $title;
	public $page_title;
	public $data = array();

	function __set( $n, $v ) {
		$this->vars[$n] = $v;
	}

	function __get( $n ) {
		return $this->vars[$n];
	}

	function __construct() {
		$this->controller_name = Routing::$routing['controller'];
		$this->action_name = Routing::$routing['action'];
		$this->param = Routing::$routing['param'];
		$this->title = Routing::$routing['title'];
	}

	function setStructureFile( $path, $dir, $file ) {
		$this->structure_file = $path;
		$this->view_dir = $dir;
		$this->template_file = TEMPLATE_DIR . $dir . '/' . $file . '.php';
		if( !file_exists( $this->structure_file ) )
			throw new viewException( "Plik template'u nie istnieje", 3001 );
		
		require $this->structure_file;
	}

	function renderView() {
		if( !file_exists( $this->template_file ) )
			throw new viewException( "Plik template'u nie istnieje", 3002 );

		require $this->template_file;
	}

/**
 * imagesDirIterator iteracja po obrazach produktu
 * @param  [type] $path [description]
 * @return [type]       [description]
 */
	function imagesProductIterator( $path ) {
		$img = array();
		$dir = new DirectoryIterator( $path );
		foreach( $dir as $fileInfo ) {
		    if($fileInfo->isDot()) continue;
		    $img[] = $fileInfo->getFilename();
		}

		sort( $img );
		return $img;
	}

	function tagsExplode( $tags ) {
		$tags = explode( ',' , $tags );
		return ( $tags ) ? $tags : array();
	}

	function weightFormatter( $value ) {
		if( $value >= 1000 )
			return number_format( ( $value/1000 ), 2, ',', '' ) . 'kg';

		return $value . 'g';
	}
}
