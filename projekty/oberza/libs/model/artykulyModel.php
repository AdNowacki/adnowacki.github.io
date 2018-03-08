<?php

class artykulyModel extends Model {

	public $options = [ 'Table' => 'artykuly', 'Redirect' => '', 'SearchCol' => '',];

	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$limit = PERPAGE;
		$offset = ( !$_GET['p'] ) ? 0 : ( (int)$_GET['p'] - 1 ) * PERPAGE;

		$sth = $this->pdo->prepare( "SELECT *, DATE_FORMAT( data_dodania, '%d.%m.%Y' ) as data FROM {$this->options['Table']} WHERE stat = '1' ORDER BY data_dodania DESC, pozycja LIMIT {$limit} OFFSET {$offset}" );
		if( !$sth->execute() )
			throw new modelException( $this->data['dictionary'][97][LANG], 1 );

		$this->data['artykuly'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		$sth = $this->pdo->prepare( "SELECT COUNT(*) as TOTAL FROM {$this->options['Table']}" );
		$sth->execute();
		$total = $sth->fetch( PDO::FETCH_ASSOC );
		$this->data['TOTAL'] = $total['TOTAL'];

		$this->data['seo'] = [
			'title' => ' - ' . $this->data['dictionary'][52][LANG],
			'description' => $this->data['dictionary'][50][LANG],
			'keywords' => $this->data['dictionary'][48][LANG],
			'author' => $this->data['dictionary'][49][LANG],
			'url' => ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}",
			'type' => 'article',
			'image' => BASE . 'userfiles/images/logo/secandas-logo.jpg',
		];

	}

	function kategoria() {
		$id = (int)Routing::$routing['param'];

		if( !$id )
			throw new modelException( $this->data['dictionary'][110][LANG], 1 );
		
		$sth = $this->pdo->prepare( "SELECT * FROM kategorie WHERE id = {$id} LIMIT 1" );
		if( !$sth->execute() )
			throw new modelException( $this->data['dictionary'][97][LANG], 1 );
		$this->data['kategoria'] = $sth->fetch( PDO::FETCH_ASSOC );

		if( !$this->data['kategoria'] )
			throw new modelException( $this->data['dictionary'][111][LANG], 1 );
			

		$sth = $this->pdo->prepare( "SELECT * FROM kategorie_artykuly WHERE id_kategorii = {$id}" );
		$sth->execute();
		$this->data['kat'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		$ids = '';
		foreach( $this->data['kat'] as $aData ) {
			$ids .= $aData['id_artykulu'] . ',';
		}
		$ids = trim( $ids, ",;\n\r\t" );

		$sth = $this->pdo->prepare( "SELECT *, DATE_FORMAT( data_dodania, '%d.%m.%Y' ) as data FROM {$this->options['Table']} WHERE id IN($ids) ORDER BY data_dodania DESC" );
		if( !$sth->execute() )
			throw new modelException( $this->data['dictionary'][97][LANG], 1 );
			
		$this->data['artykuly'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		$this->data['seo'] = [
			'title' => ' - ' . $this->data['dictionary'][52][LANG] . ' - ' . html_entity_decode( $this->data['kategoria']['nazwa_' . LANG] ),
			'description' => $this->data['dictionary'][50][LANG],
			'keywords' => $this->data['dictionary'][48][LANG] . html_entity_decode( $this->data['kategoria']['nazwa_' . LANG] ),
			'author' => $this->data['dictionary'][49][LANG],
			'url' => ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}",
			'type' => 'article',
			'image' => BASE . 'userfiles/images/logo/secandas-logo.jpg',
		];
	}

	function tag() {
		$this->data['tag'] = $tag = trim( strip_tags( $_GET['t'] ) );
		$sth = $this->pdo->prepare( "SELECT *, DATE_FORMAT( data_dodania, '%d.%m.%Y' ) as data FROM {$this->options['Table']} WHERE stat = '1' AND tagi REGEXP '{$tag}' ORDER BY data_dodania DESC" );

		if( !$sth->execute() )
			throw new modelException( $this->data['dictionary'][97][LANG], 1 );

		$this->data['artykuly'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		$this->data['seo'] = [
			'title' => ' - ' . $this->data['dictionary'][52][LANG] . ' - ' . html_entity_decode( $this->data['tag'] ),
			'description' => $this->data['dictionary'][50][LANG],
			'keywords' => $this->data['dictionary'][48][LANG] . html_entity_decode( $this->data['tag'] ),
			'author' => $this->data['dictionary'][49][LANG],
			'url' => ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}",
			'type' => 'article',
			'image' => BASE . 'userfiles/images/logo/secandas-logo.jpg',
		];
	}
}
