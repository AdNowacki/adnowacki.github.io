<?php

class Helper {
	public $vars = array();
	public $lang;
	public static $breadcrumbs;
	public static $dictionary;
	public static $dictionary_event;

	function __set( $n, $v ) {
		$this->vars[$n] = $v;
	}

	function __get( $n ) {
		return $this->vars[$n];
	}

/**
 * lang ustawia stałą LANG_DEFAULT - wersja językowa strony
 * @return [type] [description]
 */
	function lang() {
		if( $_COOKIE[COOKIE_LANG_NAME] )
			define( 'LANG_DEFAULT' , $_COOKIE[COOKIE_LANG_NAME] );
		else
			define( 'LANG_DEFAULT' , 'pl' );

		$this->lang = LANG_DEFAULT;
	}

/**
 * uri_string formatuje tytuły na odpowiedni ciąg znaków dla url
 * @param  [string] $string string do sformatowania
 * @return [string]         sformatowany string
 */
	static function uri_string( $string ) {
		$string = mb_strtolower( $string, 'UTF-8' );

		$alias = str_replace(array('ą', 'ć', 'ę', 'ł', 'ń', 'ó', 'ś', 'ź', 'ż','"',"'"), array('a', 'c', 'e', 'l', 'n', 'o', 's', 'z', 'z','',''), $string);
		$alias = str_replace(array(',', ':', ';', ' ', '_','"',"'",'"','&quot;', '"','?', '&', '(', ')', 'amp'), array('-', '-', '-', '-', '-','-',"-",'-','-','-','-', '-', '-', '-', ''), $alias);

		return $alias;
	}

	static function encodeID( $id ) {
		$id = crypt( $id, HASH_KEY );
		$id = urlencode( base64_encode($id) );
		$id = substr( $id , 0, 6);
		return $id;
	}


/**
 * error404 wczytanie template błąd 404
 * @return [string] ścieżka do pliku e404.php
 */
	static function writeError404() {
		header('HTTP/1.0 404 Not Found', true, 404);
        $template_file = TEMPLATE_DIR . 'error/e404.php';
        return $template_file;
	}

/**
 * e404Redirect przekierowanie na stronę z błędem
 * @return [type] [description]
 */
	static function e404Redirect() {
		header( 'HTTP/1.0 404 Not Found', true, 404 );
		header( 'Location: ' . BASE . 'error/e404' );
		exit();
	}

/**
 * breadcrumbs generuje breadcrumbs
 * @param  array  $list elementy do wygenerowania breadcrumbs
 * @return [type]       [description]
 */
	static function breadcrumbs( array $list ) {
		$bc[] = 'Start';
		foreach( $list as &$li ) {
			$bc[] = $li;
		}
		self::$breadcrumbs = $bc;
	}

/**
 * clearInput - czyści dane input
 * @param  [mixed] $value dane do wyczyszczenia
 * @return [mixed]        wyczyszczone dane
 */
	static function clearInput( $value ) {
		return trim( htmlspecialchars( strip_tags( $value ) ) );
	}

/**
 * linkPosition ustawia odpowiednią klasę dla linku-buttona slidera
 * @param  [int] $ind 	status położenia linku slajdu
 * @return [mixed]      [description]
 */
	static function linkPosition( $ind ) {
		switch ($ind) {
			case 0:
				return 'rb';
				break;
			case 1:
				return 'rt';
				break;
			case 2:
				return 'lb';
				break;
			case 3:
				return 'lt';
				break;
			case 4:
				return 'ct';
				break;
			case 5:
				return 'cb';
				break;
			case 6:
				return 'cc';
				break;
			default:
				return 'rb';
				break;
		}
	}

/**
 * pagination generuje paginację
 * @param  array   $data    [description]
 * @param  integer $results [description]
 * @return [type]           [description]
 */
	static function paginationCurrent( array $data, $results = 5 ) {
		$current = ( $data['current'] ) ? $data['current'] : 1;
		$total = $data['allpages'];
		$symetric = ( $results - 1 ) / 2;

		$sort = ( $_GET['sort'] ) ? "&sort[n]={$_GET['sort']['n']}&sort[t]={$_GET['sort']['t']}" : "";

		$next = ( $current == $total ) ? $total : $current + 1;
		$prev = ( $current == 1 ) ? 1 : $current - 1;

		if( $total == 1 )
			return;

		if( $current <= 0 )
			$current = 1;

		if( $current >= $total )
			$current = $total;

		$uri = self::currentUri();
		$uriseparator = ( $_GET['op']['s']['t'] ) ? '&' : '?';

		$string = ( $_GET['s'] ) ? "&s=" . trim( htmlspecialchars( $_GET['s'] ) ) : "";

		$p .= "<div class='pagination'>";
		if( $current == 1 ) {
			$start = 1;
			$stop = 3;	
			for( $i = $start; $i <= $stop; $i++  ) {
				if( $i > $total )
					break;
				if( $i == $current )
					$p .= "<a href='" . $uri . $uriseparator . "p={$i}{$string}{$sort}' class='active'>{$i}</a>";
				else
					$p .= "<a href='" . $uri . $uriseparator . "p={$i}{$string}{$sort}'>{$i}</a>";
			}
			if( $current < ( $total - 2 ) )
				$p .= "<a href='" . $uri . $uriseparator . "p={$total}{$string}{$sort}' class='plast'>{$total}</a>";
		} else if( $current == $total ) {
			$start = $total - 2;
			$stop = ( $current < ( $total - 2 ) ) ? $start + 2 : $total;
				if( $current > 2 && $current - 2 > 1 )
					$p .= "<a href='" . $uri . $uriseparator . "p=1{$string}{$sort}' class='pfirst'>1</a>";

				for( $i = $start; $i <= $stop; $i++  ) {
					if( $i < 1 )
						continue;
					if( $i == $current )
						$p .= "<a href='" . $uri . $uriseparator . "p={$i}{$string}{$sort}' class='active'>{$i}</a>";
					else
						$p .= "<a href='" . $uri . $uriseparator . "p={$i}{$string}{$sort}'>{$i}</a>";
				}

				if( $current < ( $total - 2 ) )
					$p .= "<a href='" . $uri . $uriseparator . "p={$total}{$string}{$sort}' class='plast'>{$total}</a>";
		} else {
			$start = $current - 1;
			$stop = ( $current < ( $total - 2 ) ) ? $start + 2 : $total;
				if( $current > 2 )
					$p .= "<a href='" . $uri . $uriseparator . "p=1{$string}{$sort}' class='pfirst'>1</a>";

				for( $i = $start; $i <= $stop; $i++  ) {
					if( $i == $current )
						$p .= "<a href='" . $uri . $uriseparator . "p={$i}{$string}{$sort}' class='active'>{$i}</a>";
					else
						$p .= "<a href='" . $uri . $uriseparator . "p={$i}{$string}{$sort}'>{$i}</a>";
				}

				if( $current < ( $total - 2 ) )
					$p .= "<a href='" . $uri . $uriseparator . "p={$total}{$string}{$sort}' class='plast'>{$total}</a>";
		}
		$p .= "</div>";



		// $p .= "<section class='pagination row'>";
		// 	if( $current >= 2 )
	 //    		$p .= "<div class='col-sm-2 col-xs-4'><a href='" . $uri . $uriseparator . "page={$prev}{$sort}'><img src='" . BASE . "public/images/pagination-arr-prev.jpg' alt=''> Poprzednie</a></div>";
	 //    	else
	 //    		$p .= "<div class='col-sm-2 col-xs-4'><a href='#'></a></div>";

	 //    	$p .= "<div class='col-sm-8 col-xs-4 pages'>";
	 //    		if( $total >= $results ) {

	 //    			if( $current > $symetric + 1 ) {
		// 			    $p .= "<a href='" . $uri . $uriseparator . "page=1'>1</a>";
		//     			$p .= '<span class="pages-dots">...</span>';
	 //    			}

	 //    			if( $current > $symetric && $current < $total - $symetric ) {
	 //    				for( $i=$current-$symetric; $i<=$current + $symetric; ++$i ) {
	 //    					if( $i == $current )
		// 		        		$p .= "<a href='" . $uri . $uriseparator . "page={$i}{$sort}' class='active'>{$i}</a>";
		// 		        	else
		// 		        		$p .= "<a href='" . $uri . $uriseparator . "page={$i}{$sort}'>{$i}</a>";
		// 		    	}
	 //    			} else if( $current >= $total - $symetric ) {
	 //    				for( $i=$total-($symetric * 2); $i <= $total; ++$i ) {
		// 		        	if( $i == $current )
		// 		        		$p .= "<a href='" . $uri . $uriseparator . "page={$i}{$sort}' class='active'>{$i}</a>";
		// 		        	else
		// 		        		$p .= "<a href='" . $uri . $uriseparator . "page={$i}{$sort}'>{$i}</a>";
		// 		    	}
	 //    			} else {
	 //    				for( $i=1; $i <= $results; ++$i ) {
		// 		        	if( $i == $current ) {
		// 		        		$p .= "<a href='" . $uri . $uriseparator . "page={$i}{$sort}' class='active'>{$i}</a>";
		// 		    		} else {
		// 		        		$p .= "<a href='" . $uri . $uriseparator . "page={$i}{$sort}'>{$i}</a>";
		// 		    		}
		// 		    	}
	 //    			}

	 //    			if( $current < $total - $symetric ) {
		//     			$p .= '<span class="pages-dots">...</span>';
		// 			    $p .= "<a href='" . $uri . $uriseparator . "page={$total}{$sort}'>{$total}</a>";
	 //    			}

	 //    		} else {
		// 	    	for( $i=1; $i <= $total; ++$i ) {
		// 	    		if( $i == $current ) {
		// 	        		$p .= "<a href='" . $uri . $uriseparator . "page={$i}{$sort}' class='active'>{$i}</a>";
		// 	    		} else {
		// 	        		$p .= "<a href='" . $uri . $uriseparator . "page={$i}{$sort}'>{$i}</a>";
		// 	    		}
		// 	    	}
	 //    		}

	 //    	$p .= "</div>";
	 //    	if( $current >= $total )
	 //    		$p .= "<div class='col-sm-2 col-xs-4'></div>";
	 //    	else
	 //    		$p .= "<div class='col-sm-2 col-xs-4'><a href='" . $uri . $uriseparator . "page={$next}{$sort}'>Następne <img src='" . BASE . "public/images/pagination-arr-next.jpg' alt=''></a></div>";
		// $p .= "</section>";

		return $p;
	}


	static function pagination( array $data, $results = 5 ) {
		$current = ( $data['current'] ) ? $data['current'] : 1;
		$total = $data['allpages'];
		$symetric = ( $results - 1 ) / 2;

		$sort = ( $_GET['sort'] ) ? "&sort[n]={$_GET['sort']['n']}&sort[t]={$_GET['sort']['t']}" : "";

		$next = ( $current == $total ) ? $total : $current + 1;
		$prev = ( $current == 1 ) ? 1 : $current - 1;

		if( $total == 1 )
			return;

		if( $current <= 0 )
			$current = 1;

		if( $current >= $total )
			$current = $total;

		$uri = self::currentUri();
		$uriseparator = ( $_GET['op']['s']['t'] ) ? '&' : '?';

		$string = ( $_GET['s'] ) ? "&s=" . trim( htmlspecialchars( $_GET['s'] ) ) : "";

		$p .= "<div class='pages' style='clear: both;'>";
			if( $current > 1 )
		    	$p .= "<a href='{$uri}?p={$prev}' class='page-arr first'><i class='icon-angle-left'></i> Poprzedni</a>";
		    if( $current == 1 ) {
		    	for( $j=1; $j<=3; $j++ ) {
		    		if( $j > $total )
		    			continue;
		    		$border = ( $j == 1 ) ? "style='border-left: 1px solid #bcbec0;'" : "";
		    		$active = ( $current == $j ) ? "class='act'" : "";
		    		$p .= "<a href='{$uri}?p={$j}' {$border} {$active}>{$j}</a>";
		    	}
		    } else if( $current >= $total ) {
		    	$start = ( $total - 3 );
		    	for( $j=$start; $j<=$total; $j++ ) {
		    		if( $j < 1 )
		    			continue;
		    		$border = ( $j == 1 ) ? "style='border-right: 1px solid #bcbec0;'" : "";
		    		$active = ( $current == $j ) ? "class='act'" : "";
		    		$p .= "<a href='{$uri}?p={$j}' {$border} {$active}>{$j}</a>";
		    	}
		    } else {
		    	$start = $current - 1;
		    	$stop = $current + 1;
		    	for( $j=$start; $j<=$stop; $j++ ) {
		    		if( $j < 1 || $j > $total )
		    			continue;
		    		$active = ( $current == $j ) ? "class='act'" : "";
		    		$p .= "<a href='{$uri}?p={$j}' {$active}>{$j}</a>";
		    	}
		    }
		    
			if( $current < $total )
		    	$p .= "<a href='{$uri}?p={$next}' class='page-arr last'>Następny <i class='icon-angle-right'></i></a>";
		$p .= "</div>";

		return $p;
	}

/**
 * currentUri bieżący adres url
 * @return [type] [description]
 */
	static function currentUri() {
		$uri .= BASE;
		$uri .= ( Routing::$routing['controller'] ) ? Routing::$routing['controller'] : '';
		$uri .= ( Routing::$routing['action'] ) ? '/' . Routing::$routing['action'] : '';
		$uri .= ( Routing::$routing['param'] ) ? '/' . Routing::$routing['param'] : '';
		$uri .= ( Routing::$routing['title'] ) ? '/' . Routing::$routing['title'] : '';
		$uri .= ( $_GET['op']['s']['t'] ) ? '?op[s][t]=' . $_GET['op']['s']['t'] : '';
		$uri .= ( $_GET['op']['s']['v'] ) ? '&op[s][v]=' . $_GET['op']['s']['v'] : '';

		return $uri;
	}

/**
 * deliveryTime - formatuje czas realizacji
 * @param  [type] $v [description]
 * @return [type]    [description]
 */
	static function deliveryTime( $v ) {
		switch ( $v ) {
			case 0:
				return '24h';
				break;
			case 1:
				return '1-3dni';
				break;
			case 2:
				return '2-7dni';
				break;
			case 3:
				return '3-14dni';
				break;
			case 4:
				return '4-30dni';
				break;
			default:
				return 'brak danych';
				break;
		}
	}

/**
 * counterBasket liczba elementów w koszyku
 * @return [type] [description]
 */
	static function counterBasket() {
		return ( $_SESSION[BASKET_SESSION_NAME] ) ? count( $_SESSION[BASKET_SESSION_NAME] ) : 0;
	}

/**
 * orderStatus konwersja statusu zamówienia
 * @param  [type] $stat [description]
 * @return [type]       [description]
 */
	static function orderStatus( $stat ) {
		$stat = (int)$stat;
		switch ( $stat ) {
			case 0:
				$status = array( 'message' => 'niepotwierdzone', 'class' => 'status-0' );
				break;
			case 1:
				$status = array( 'message' => 'w trakcie realizacji', 'class' => 'status-1' );
				break;
			case 2:
				$status = array( 'message' => 'anulowane', 'class' => 'status-2' );
				break;
			case 3:
				$status = array( 'message' => 'zrealizowane', 'class' => 'status-3' );
				break;
			default:
				$status = array( 'message' => 'niepotwierdzone', 'class' => 'status-0' );
				break;
		}

		return $status;
	}

	static function dictionary() {
		$pdo = new PDO( 'mysql:host=' . HOST . ';dbname=' . DB . ';charset=utf8', USER, PASSWORD, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'" ) );
		$sth = $pdo->prepare( "SELECT * FROM " . DICTIONARY_TABLE . " WHERE stat = '1'" );
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		foreach( $data as $item ) {
			$i = $item['id'];
			self::$dictionary['helper_dictionary'][$i] = $item;
		}
	}

	static function dictionary_event() {
		$pdo = new PDO( 'mysql:host=' . HOST . ';dbname=' . DB . ';charset=utf8', USER, PASSWORD, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'" ) );

		$sth = $pdo->prepare( "SELECT * FROM wydarzenia WHERE hash_id = :hash LIMIT 1" );
		$sth->bindParam( ":hash", Routing::$routing['param'] );
		$sth->execute();

		$ev = $sth->fetch( PDO::FETCH_ASSOC );

		$sth = $pdo->prepare( "SELECT * FROM config_event WHERE stat = '1' AND id_wydarzenia = {$ev['id']} ORDER BY id" );
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$j = 1;
		foreach( $data as $item ) {
			$i = $item['id'];
			self::$dictionary_event['helper_dictionary'][$j] = $item;
			$j++;
		}
	}

	static function who( $id ) {
		if( !$id )
			return false;

		$pdo = new PDO( 'mysql:host=' . HOST . ';dbname=' . DB . ';charset=utf8', USER, PASSWORD, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'" ) );
		$sth = $pdo->prepare( "SELECT * FROM uzytkownicy WHERE id = $id LIMIT 1" );
		$sth->execute();
		$data = $sth->fetch( PDO::FETCH_ASSOC );
		if( !$data )
			return false;

		return $data;
	}

	static function place( $id ) {
		if( !$id )
			return false;

		$pdo = new PDO( 'mysql:host=' . HOST . ';dbname=' . DB . ';charset=utf8', USER, PASSWORD, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'" ) );
		$sth = $pdo->prepare( "SELECT * FROM miejsca WHERE id = $id LIMIT 1" );
		$sth->execute();
		$data = $sth->fetch( PDO::FETCH_ASSOC );
		if( !$data )
			return false;

		return $data;
	}


// <li class="active"><a href="#">1</a></li>
// <li><a href="#">2</a></li>
// <li><a href="#">3</a></li>
// <li><a href="#">4</a></li>
// <li><a href="#">...</a></li>
// <li><a href="#">10</a></li>
// </ul>

	static function paginationUser( array $data, $results = 5 ) {
		$current = ( $data['current'] ) ? $data['current'] : 1;
		if( $current <= 0 )
			$current = 1;

		$total = $data['allpages'];
		$symetric = ( $results - 1 ) / 2;

		$sort = ( $_GET['sort'] ) ? "&sort[n]={$_GET['sort']['n']}&sort[t]={$_GET['sort']['t']}" : "";

		$next = ( $current == $total ) ? $total : $current + 1;
		$prev = ( $current == 1 ) ? 1 : $current - 1;

		if( $total == 1 )
			return;

		if( $current <= 0 )
			$current = 1;

		if( $current >= $total )
			$current = $total;

		$uri = self::currentUri();
		$uriseparator = ( $_GET['op']['s']['t'] ) ? '&' : '?';

		$string = ( $_GET['s'] ) ? "&s=" . trim( htmlspecialchars( $_GET['s'] ) ) : "";



		$p .= "<ul class='pagin'>";


			if( $current >= 3 ) {
				if( $current == $total || $current + 2 > $total ) {
					if( $current == ( $total - 1 ) )
						$start = $current - 3;
					elseif( $current == $total )
						$start = $current - 4;
					else
						$start = $current;

					if( $start <= 0 )
						$start = 1;

					$stop = $total;
				} else {
					$start = $current - 2;
					$stop = $current + 2;
				}
				if( $current - 2 > 1 && $start > 1 ) {
					$p .= "<li><a href='" . BASE . Routing::$routing['controller'] . "?p=1'>1</a></li>";
					$p .= "<li><a href='#''>...</a></li>";
				}
				for( $i = $start; $i <= $stop; $i++ ) {
					if( $i == $current )
						$p .= "<li class='active'><a href='" . BASE . Routing::$routing['controller'] . "?p={$i}'>{$i}</a></li>";
					else
						$p .= "<li><a href='" . BASE . Routing::$routing['controller'] . "?p={$i}'>{$i}</a></li>";
				}
			} else {
				$start = 1;
				if( $current == $total )
					$stop = $total;
				else
					$stop = ( $current == 1 ) ? $current + 4 : $current + 3;
				if( $stop >= $total )
					$stop = $total;
				for( $i = $start; $i <= $stop; $i++ ) {
					if( $i == $current )
						$p .= "<li class='active'><a href='" . BASE . Routing::$routing['controller'] . "?p={$i}'>{$i}</a></li>";
					else
						$p .= "<li><a href='" . BASE . Routing::$routing['controller'] . "?p={$i}'>{$i}</a></li>";
				}
			}

			if( $current + 2 < $total && $stop < $total ) {
				$p .= "<li><a href='#''>...</a></li>";
				$p .= "<li><a href='" . BASE . Routing::$routing['controller'] . "?p={$total}'>{$total}</a></li>";
			}
		$p .= "</ul>";


		return $p;
	}

	static function uploadImage( array $options ) {
		$index = $options['index'];
		if( $_FILES[$index] && is_uploaded_file( $_FILES[$index]['tmp_name'] ) ) {

			if( move_uploaded_file( $_FILES[$index]['tmp_name'], $options['tmp_dir'] . $_FILES[$index]['name'] ) ) {
				$getSize = getimagesize( $options['tmp_dir'] . $_FILES[$index]['name'] );
				if( $getSize[0] < $options['width'] ) {
					$_SESSION['info'] = "Wpis został dodany, jednak szerokosc obrazka jest poniżej oczekiwanej wartosci. Oczekiwany rozmiar to szerokość min: {$options['width']}px";
				}

  				$magicianObj = new imageLib( $options['tmp_dir'] . $_FILES[$index]['name'] );
				if( $options['min-width'] && $options['height-auto'] ) {
					$prop = $getSize[0]/$getSize[1];
					if( $getSize[0] >= $options['width'] && $getSize[0] < 1000 )
						$options['width'] = $getSize[0];
					else
						$options['width'] = 1000;

					$options['height'] = floor( $options['width'] / $prop );
				}
				
  				$magicianObj->resizeImage( $options['width'], $options['height'], 'crop');
  				$magicianObj->saveImage($options['dir'] . $options['filename'] . '.' . $options['extension'] );
  				@unlink( $options['tmp_dir'] . $_FILES[$index]['name'] );
			} else {
				$_SESSION['error'] = "Wystąpił problem z dodaniem pliku";
			}
		} else {
			$_SESSION['info'] = "Wpis został dodany, jednak nie dodano pliku";
		}
	}

	static function uploadMultipleImage( array $options ) {
		$index = $options['index'];
		$imageIndex = $options['image-index'];
		if( $_FILES[$index] && is_uploaded_file( $_FILES[$index]['tmp_name'][$imageIndex] ) ) {

			if( move_uploaded_file( $_FILES[$index]['tmp_name'][$imageIndex], $options['tmp_dir'] . $_FILES[$index]['name'][$imageIndex] ) ) {
				$getSize = getimagesize( $options['tmp_dir'] . $_FILES[$index]['name'][$imageIndex] );
				if( $getSize[0] < $options['width'] ) {
					$_SESSION['info'] = "Wpis został dodany, jednak szerokosc obrazka jest poniżej oczekiwanej wartosci. Oczekiwany rozmiar to szerokość min: {$options['width']}px";
				}

  				$magicianObj = new imageLib( $options['tmp_dir'] . $_FILES[$index]['name'][$imageIndex] );
				if( $options['min-width'] && $options['height-auto'] ) {
					$prop = $getSize[0]/$getSize[1];
					if( $getSize[0] >= $options['width'] && $getSize[0] < 1000 )
						$options['width'] = $getSize[0];
					else
						$options['width'] = 1000;

					$options['height'] = floor( $options['width'] / $prop );
				}
				
  				$magicianObj->resizeImage( $options['width'], $options['height'], 'crop');
  				$magicianObj->saveImage($options['dir'] . $options['filename'] . '.' . $options['extension'] );
  				@unlink( $options['tmp_dir'] . $_FILES[$index]['name'][$imageIndex] );
			} else {
				$_SESSION['error'] = "Wystąpił problem z dodaniem pliku";
			}
		} else {
			$_SESSION['info'] = "Wpis został dodany, jednak nie dodano pliku";
		}
	}

/**
 * activeNavigate
 * aktywna nawigacja
 */
	static function activeNavigate( $controller, $action = NULL ) {
		if( $action )
			$active = ( Routing::$routing['controller'] == $controller && Routing::$routing['action'] == $action ) ? true : false;
		else
			$active = ( Routing::$routing['controller'] == $controller ) ? true : false;
		return $active;
	}

/**
 * infoSystem
 * komuniklaty systemowe
 */

	static function infoSystem( array $options ) {
		$ind = $options['index'];
		if( $_SESSION[$ind] ) {
			$m = '';
			$m .= "<div class='system-info system-info-{$options[type]}'>";
		        $m .= "<div>";
		            $m .= "<p>{$options['message']}</p>";
		        $m .= "</div>";
		        $m .= "<button class='close-btn'></button>";
		    $m .= "</div>";
		    echo $m;
			unset( $_SESSION[$ind] );
		}
	}

	static function imageOrientation( $file, $classname = 'class="image_vertical"' ) {
		$image = getimagesize( $file );
		return ( $image[1] > $image[0] ) ? $classname : '';
	}

	static function randomPassword( $length = 8 ) {
		$alphabet = 'abcdefghijklmnopq#rstuvwxyzABCDEF-GHIJKLMNOPQRST_UVWXYZ12$34567890';
		$aLen = strlen( $alphabet ) - 1;
		$pass = '';
		for( $i=1; $i<=$length; $i++ ) {
			$l = rand( 0, $aLen );
			$pass .= $alphabet[$l];
		}

		return $pass;
	}

}
