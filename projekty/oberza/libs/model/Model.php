<?php

abstract class Model {

	public $vars = array();

	protected $pdo;

/**
 * $name nazwa Modelu
 * @var [type]
 */
	public $name;
/**
 * $data tablica z daymi
 * @var array
 */
	protected $data = array();

/**
 * $sql zapytanie SQL
 * @var [type]
 */
	protected $sql;

/**
 * $table nazwa tabeli na podstawie parametrów uri
 * @var [type]
 */
	protected $table;

	function __set( $n, $v ) {
		$this->vars[$n] = $v;
	}

	function __get( $n ) {
		return $this->vars[$n];
	}

/**
 * index abstrakcyjna metoda index
 * @return [type] [description]
 */
	abstract function index();

/**
 * show abstrakcyjna metoda show
 * @return [type] [description]
 */
	abstract function widok();

	function __construct( $name ) {
		$this->name = $name;
		$this->table = DB_PREFIX . Routing::$routing['controller'];
		try {
			$this->pdo = new PDO( 'mysql:host=' . HOST . ';dbname=' . DB . ';charset=utf8', USER, PASSWORD, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'" ) );
		} catch (PDOException $e) {
        	Error::setMessage( 'pdo_connected', $this->data['dictionary'][16][LANG], 'error' );
		}
	}

/**
 * dictionary pobranie słownika
 * @return [type] [description]
 */
	function dictionary() {
		$sth = $this->pdo->prepare( "SELECT * FROM " . DICTIONARY_TABLE . " WHERE stat = '1'" );
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		foreach( $data as $item ) {
			$i = $item['id'];
			$this->data['dictionary'][$i] = $item;
		}
	}

	function pageDictionary() {
		$sth = $this->pdo->prepare( "SELECT * FROM config_page WHERE stat = '1'" );
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		foreach( $data as $item ) {
			$i = $item['id'];
			$this->data['dictionary_page'][$i] = $item;
		}
	}

	function eventDictionary( $id ) {
		$sth = $this->pdo->prepare( "SELECT * FROM config_event WHERE stat = '1' AND id_wydarzenia = $id ORDER BY id" );
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$j = 1;
		foreach( $data as $item ) {
			$i = $item['id'];
			// $this->data['dictionary_event'][$i] = $item;
			$this->data['dictionary_event'][$j] = $item;
			$j++;
		}
	}

/**
 * categories lista kategorii
 * @return [type] [description]
 */
	function categories() {
		$sth = $this->pdo->prepare( "SELECT * FROM kategorie WHERE stat = '1' AND strona_glowna = '0' AND usuniety = '0' ORDER BY pozycja" );
		$sth->execute();
		if( $sth->rowCount() == 0 )
			throw new modelException( "Brak kategorii", 4020 );
			
		$this->data['categories'] = $sth->fetchAll(PDO::FETCH_ASSOC);
	}

/**
 * slider slider na głownej
 * @return [type] [description]
 */
	function slider() {
		$sth = $this->pdo->prepare( "SELECT * FROM slider WHERE stat = '1' AND ( ( data_start IS NULL AND data_stop IS NULL ) OR ( data_start <= NOW() AND data_stop > NOW() ) ) ORDER BY pozycja" );
		$sth->execute();
		if( $sth->rowCount() == 0 )
			throw new modelException( "Brak elementów slidera", 4021 );
			
		$this->data['slider'] = $sth->fetchAll(PDO::FETCH_ASSOC);
	}

/**
 * banners - baner na głównej
 * @param  integer $limit [description]
 * @return [type]         [description]
 */
	function banners( $limit = 1 ) {
		$sth = $this->pdo->prepare( "SELECT * FROM banery WHERE stat = '1' AND usuniety = '0' AND link <> '' ORDER BY RAND() LIMIT {$limit}" );
		$sth->execute();
		$this->data['banners'] = $sth->fetchAll( PDO::FETCH_ASSOC );
	}

/**
 * mostPopular najczęściej zamawiane
 * @param  integer $limit [description]
 * @return [type]         [description]
 */
	function mostPopular( $limit = 4 ) {
		$sth = $this->pdo->prepare( "SELECT zp.id_produktu as PID, zp.id_model as MID, nazwa_model, nazwa, cena_jednostkowa_1, p.rabat as RABAT, COUNT(id_model) as POPULAR_MODEL FROM zamowienia_produkty as zp JOIN model as m ON(m.id = zp.id_model) JOIN produkty as p ON(p.id = zp.id_produktu) GROUP BY zp.id_produktu ORDER BY COUNT(zp.id_produktu) DESC LIMIT {$limit}" );
		$sth->execute();
		$this->data['most_popular'] = $sth->fetchAll( PDO::FETCH_ASSOC );
		foreach( $this->data['most_popular'] as &$aPopular ) {
			$pid = $aPopular['PID'];
			$sth = $this->pdo->prepare( "SELECT * FROM model WHERE id_produktu = {$pid}" );
			$sth->execute();
			$aPopular['modele'] = $sth->fetchAll(PDO::FETCH_ASSOC);

			$sth = $this->pdo->prepare( "SELECT k.id as KID, k.nazwa as KANZWA FROM kategorie as k JOIN kategorie_produkty as kp ON(k.id = kp.id_kategorii) WHERE kp.id_produktu = {$pid} AND k.stat = '1' AND k.usuniety = '0' LIMIT 1" );
			$sth->execute();
			$aPopular['kategoria'] = $sth->fetch( PDO::FETCH_ASSOC );
		}
	} 

/**
 * mostPopularArticles najczęściej czytane
 * @param  integer $limit [description]
 * @return [type]         [description]
 */
	function mostPopularArticles( $limit = 4 ) {
		$sth = $this->pdo->prepare( "SELECT *, DATE_FORMAT( data_dodania, '%d.%m.%Y' ) as data FROM artykuly ORDER BY wyswietlenia DESC LIMIT {$limit}" );
		if( !$sth->execute() )
			throw new modelException( "Wystąpił problem z pobraniem najpopularniejszych artykułów", 9852 );

		$this->data['mostPopular'] = $sth->fetchAll( PDO::FETCH_ASSOC );
	} 

	function getArticleCategories( array $options ) {
		$sth = $this->pdo->prepare( "SELECT *, t1.id as _ID_ FROM {$options['col']} as t1 RIGHT JOIN {$options['join']} as t2 ON(t1.id = t2.id_kategorii) WHERE t1.typ='{$options['type']}' AND t1.stat = '1' GROUP BY t2.id_kategorii ORDER BY t1.nazwa_" . LANG );
		if( !$sth->execute() )
			throw new modelException( "Wystąpił problem z pobraniem kategorii artykułów", 9852 );
		$ind = $options['data_index'];
		$this->data[$ind] = $sth->fetchAll( PDO::FETCH_ASSOC );
	}

	function getEventsCategories() {
		$sth = $this->pdo->prepare( "SELECT id_kategorii FROM wydarzenia GROUP BY id_kategorii" );
		$sth->execute();
		$list = $sth->fetchAll( PDO::FETCH_ASSOC );
		$cat = "";
		$this->data['eventCategories'] = null;
		foreach ( $list as $value ) {
			$cat .= $value['id_kategorii'] . ',';
		}

		$cat = trim( $cat, ",\n\r\t" );
		if( $cat ) {
			$sth = $this->pdo->prepare( "SELECT * FROM kategorie_w WHERE stat = '1' AND id IN($cat) ORDER BY nazwa_" . LANG );
			$sth->execute();
			$this->data['eventCategories'] = $sth->fetchAll( PDO::FETCH_ASSOC );
		}
	}

	function getCorp($limit = 3) {
		$sth = $this->pdo->prepare( "SELECT * FROM firmy ORDER BY RAND() LIMIT {$limit}" );
		$sth->execute();
		$this->data['main_firmy'] = $sth->fetchAll( PDO::FETCH_ASSOC );
	}

	/* druga nawigacja */
	function getPagesNavigation() {
		$sth = $this->pdo->prepare( "SELECT * FROM strony WHERE stat = '1' AND menu = '1' ORDER BY pozycja" );
		$sth->execute();
		$this->data['menu'] = $sth->fetchAll( PDO::FETCH_ASSOC );
	}

	/* eksperci */
	function getExperts( $limit = 1 ) {
		$sth = $this->pdo->prepare( "SELECT * FROM eksperci ORDER BY RAND() LIMIT {$limit}" );
		$sth->execute();
		$this->data['experts'] = $sth->fetchAll( PDO::FETCH_ASSOC );
	}

	// ostatnie czasopismo
	function getLastMagazine( $limit = 1 ) {
		$sth = $this->pdo->prepare( "SELECT * FROM czasopisma ORDER BY data_publikacji DESC LIMIT {$limit}" );
		$sth->execute();
		$this->data['last_magazine'] = $sth->fetch( PDO::FETCH_ASSOC );
	}

	// new order prenumerata nowe
	function newOrder() {
		$sth = $this->pdo->prepare( "SELECT COUNT(*) as _NEW_ FROM prenumerata WHERE nowe = '1'" );
		$sth->execute();
		$this->data['new'] = $sth->fetch( PDO::FETCH_ASSOC );
	}

	// pobierz reklamy boczne
	function getAdv( $limit = 3 ) {
		$sth = $this->pdo->prepare( "SELECT * FROM reklama WHERE stat = '1' AND NOW() >= data_start AND NOW() <= data_stop AND top = '0' ORDER BY RAND() LIMIT {$limit}" );
		$sth->execute();
		$this->data['adv'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		$ids = '';
		foreach( $this->data['adv'] as $aData ) {
			$ids .= $aData['id'] . ',';
		}

		$ids = trim( $ids, ",\n\t\r" );
		if( !$ids )
			return;
		$sth = $this->pdo->prepare( "UPDATE reklama SET wyswietlenia = (wyswietlenia + 1) WHERE id IN($ids)" );
		$sth->execute();
	}

	function nonActiveAdv() {
		$sth = $this->pdo->prepare( "SELECT COUNT(*) as _NEW_ FROM reklama WHERE stat = '0' OR ( NOW() < data_start OR NOW() > data_stop )" );
		$sth->execute();
		$this->data['adv_no_active'] = $sth->fetch( PDO::FETCH_ASSOC );
	}

	// pobierz reklamy z góry strony
	function getAdvTop( $limit = 1 ) {
		$sth = $this->pdo->prepare( "SELECT * FROM reklama WHERE stat = '1' AND NOW() >= data_start AND NOW() <= data_stop AND top = '1' ORDER BY RAND() LIMIT {$limit}" );
		$sth->execute();
		$this->data['adv_top'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		$ids = '';
		foreach( $this->data['adv_top'] as $aData ) {
			$ids .= $aData['id'] . ',';
		}

		$ids = trim( $ids, ",\n\t\r" );
		if( !$ids )
			return;
		$sth = $this->pdo->prepare( "UPDATE reklama SET wyswietlenia = (wyswietlenia + 1) WHERE id IN($ids)" );
		$sth->execute();
	}

/**
 * popularCategories popularne kategorie
 * @param  integer $limit [description]
 * @return [type]         [description]
 */
	function popularCategories( $limit = 3 ) {
		$sth = $this->pdo->prepare( "SELECT * FROM kategorie WHERE stat = '1' AND strona_glowna = '1' AND usuniety = '0' ORDER BY RAND() LIMIT {$limit}" );
		$sth->execute();
		$this->data['popular_categories'] = $sth->fetchAll( PDO::FETCH_ASSOC );
	}

/**
 * seasonProduct sezonowy produkt
 * @param  integer $limit [description]
 * @return [type]         [description]
 */
	function seasonProduct( $limit = 1 ) {
		$sth = $this->pdo->prepare( "SELECT *, p.id as PID, m.id as MID FROM produkty as p JOIN model as m ON(p.id = m.id_produktu) WHERE m.stat <> '0' AND p.stat <> '0' AND m.usuniety = '0' AND p.usuniety = '0' AND NOW() >= sezon_start AND NOW() < sezon_stop ORDER BY RAND() LIMIT {$limit}" );
		$sth->execute();
		$this->data['season'] = $sth->fetchAll( PDO::FETCH_ASSOC );
	}

/**
 * pages pobiera stałe strony
 * @return [type] [description]
 */
	function pages() {
		$sth = $this->pdo->prepare( "SELECT * FROM strony WHERE stat = '1' ORDER BY pozycja" );
		$sth->execute();
		if( $sth->rowCount() == 0 )
			throw new modelException( "Brak stron do wyświetlenia", 4022 );
			
		$this->data['strony'] = $sth->fetchAll(PDO::FETCH_ASSOC);
	}

/**
 * getModelClass pobieran nazwę klasy
 * @return [type] [description]
 */
	function getModelClass() {
		return get_class($this);
	}

/**
 * setData zapis wyników do właściwości Model::$data pod kluczem o podanym indeksie $index
 * @param [mixed] $index klucz pod którym dane będą przechowywane
 * @param [type] $value dane
 */
	function setData( $index, $value ) {
		$this->data[$index] = $value;
	}

/**
 * getData pobranie danych z właściwości Model::$data. Jeśli przekażemy jako parametr klucz tablicy, to pobrane zostaną tylko te dane
 * @param  [type] $index klucz tablicy Model::$data
 * @return [type]        zwracane dane modelu
 */
	function getData( $index = null ) {
		if( $index ) {
			if( !$this->data[$index] )
				throw new modelException( "Brak wyników", 4003 );
			else
				return $this->data[$index];
		} else {
			return $this->data;
		}
	}

	function getItems() {
		$id = ( Routing::$routing['param'] ) ? (int)Routing::$routing['param'] : null;
		try {
			if( $id ) {
				$sth = $this->pdo->prepare( "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1" );
				$sth->bindParam(':id', $id, PDO::PARAM_INT);
			}
			else {
				$sth = $this->pdo->prepare( "SELECT * FROM {$this->table} ORDER BY id DESC" );
			}
		} catch (PDOException $e) {
        	Error::setMessage( 'pdo_not_data', 'Problem z pobraniem danych kod błędu: 5002', 'error' );
		}

		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);

		if( !$data ) {
			throw new modelException( "Brak wyników do wyświetlenia" , 4005 );
		}

		$this->setData( Routing::$routing['controller'], $data );

	}
/**
 * sql - ustawia zapytanie
 * @param  [type] $sql [description]
 * @return [type]      [description]
 */
	function sql( $sql ) {
		$this->sql = $sql;
		return $this;
	}

	function query() {
		$sth = $this->pdo->prepare( $this->sql );
		$sth->execute();
		$data = array();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		if( !$data ) {
			throw new modelException( "Brak poszukiwanych danych", 4004 );
		}
		return $data;
	}

/**
 * multipleDeleteAction usuwanie kilku rekordów
 * @return [type] [description]
 */
	function multipleDeleteAction() {
		if( $_POST['m-delete'] ) {
			$table = Helper::clearInput( $_POST['_t1'] );
			$ids = Helper::clearInput( $_POST['_i1'] );
			$ids = trim( $ids, ',' );

			// $sth = $this->pdo->prepare( "DELETE FROM {$table} WHERE id IN({$ids})" );
			$sth = $this->pdo->prepare( "UPDATE {$table} SET usuniety = '1', stat = '0' WHERE id IN({$ids})" );
			// $sth->bindParam( ':table', $table );
			// $sth->bindParam( ':ids', $ids );

			$sth->execute();

			if( $sth->rowCount() == 0 )
				throw new modelException( "Wystąpił problem z usunięciem wpisu", 4014 );

			$_SESSION['delete_success'] = "Poprawnie i bezpowrotnie usunięto zaznaczone pozycje.";
			header( "Location: " . BASE . Routing::$routing['controller'] );
			exit();
				
		}
	}

/**
 * shipping - pobiera dostępne opcje wysyłki oraz maksymalną dopuszczalną masę przesyłki
 * @return [type] [description]
 */
	function shipping() {
		$sth = $this->pdo->prepare( "SELECT *, masa_max as MAKSIMUM FROM transport as t JOIN transport_cena as tc ON(tc.id_transportu = t.id) ORDER BY masa_max DESC LIMIT 1" );
		$sth->execute();
		$this->shipping = $sth->fetch(PDO::FETCH_ASSOC);

		$sth = $this->pdo->prepare( "SELECT * FROM transport as t JOIN transport_cena as tc ON(tc.id_transportu = t.id) ORDER BY cena" );
		$sth->execute();
		$this->shippingAll = $sth->fetchAll(PDO::FETCH_ASSOC);
	}

/**
 * getPlaces pobiera placówki usera, jeśli admin pobiera wszystkie placówki, jeśli user, tylko placówki przypisane
 * @return [type] [description]
 */
	function getPlaces() {
		$uid = (int)$_SESSION[AUTH_SESSION_NAME]['im'];
		$did = (int)$_SESSION[AUTH_SESSION_NAME]['dealer'];
		// jeśli admin dealera wyświetla wszystkie dostępne placówki dealaer, w innym wypadku tylko przypisane do uzytkownika
		if( $_SESSION[AUTH_SESSION_NAME]['type'] == '1' )
			$sth = $this->pdo->prepare( "SELECT * FROM oddzialy WHERE id_dealera = {$did} GROUP BY kod_wysylki ORDER BY nazwa" );
			// $sth = $this->pdo->prepare( "SELECT * FROM oddzialy WHERE id_dealera = 1 GROUP BY kod_lokalizacji ORDER BY nazwa" );
		else
			$sth = $this->pdo->prepare( "SELECT * FROM kontrahenci as k JOIN kontrahenci_oddzialy as ko ON(k.id = ko.id_kontrahenta) JOIN oddzialy as o ON(o.id = ko.id_oddzialu) WHERE ko.id_kontrahenta = {$uid} GROUP BY kod_wysylki ORDER BY o.nazwa" );
			// $sth = $this->pdo->prepare( "SELECT * FROM kontrahenci as k JOIN kontrahenci_oddzialy as ko ON(k.id = ko.id_kontrahenta) JOIN oddzialy as o ON(o.id = ko.id_oddzialu) WHERE ko.id_kontrahenta = {$uid} GROUP BY kod_lokalizacji ORDER BY o.nazwa" );
		$sth->execute();


		if( $sth->rowCount() == 0 )
			throw new modelException( "Brak wyników do wyświetlenia", 4005 );

		$this->data['places'] = $sth->fetchAll(PDO::FETCH_ASSOC);
	}

/**
 * newProducts sekcja nowe produkty
 * @param  integer $limit [description]
 * @return [type]         [description]
 */
	function newProducts( $limit = 2 ) {
		$sth = $this->pdo->prepare( "SELECT * FROM produkty WHERE stat <> '0' ORDER BY RAND() LIMIT {$limit}" );
		$sth->execute();
		$this->data['new-products'] = $sth->fetchAll(PDO::FETCH_ASSOC);
		if( !$this->data['new-products'] )
			throw new modelException( "Brak produktów" , 4024 );
		
		foreach ( $this->data['new-products'] as &$aProduct ) {
			$pid = (int)$aProduct['id'];
			$sth = $this->pdo->prepare( "SELECT * FROM kategorie as k JOIN kategorie_produkty as kp ON(k.id = kp.id_kategorii) WHERE kp.id_produktu = {$pid}" );
			$sth->execute();
			$aProduct['kategorie'] = $sth->fetchAll(PDO::FETCH_ASSOC);

			$sth = $this->pdo->prepare( "SELECT * FROM model WHERE id_produktu = {$pid} ORDER BY RAND() LIMIT 1" );
			$sth->execute();
			$aProduct['modele'] = $sth->fetchAll(PDO::FETCH_ASSOC);
		}		
	}


	function seeAlso( array $options ) {
		$limit = ( $options['limit'] ) ? (int)$options['limit'] : 2;
		$category = (int)$options['category'];
		$product = (int)$options['product'];

		$sth = $this->pdo->prepare( "SELECT *, p.id as PID FROM produkty as p JOIN kategorie_produkty as kp ON(p.id = kp.id_produktu) WHERE p.id <> $product AND kp.id_kategorii = {$category} AND p.stat <> '0' ORDER BY RAND() LIMIT {$limit}" );
		$sth->execute();
		$this->data['seealso'] = $sth->fetchAll(PDO::FETCH_ASSOC);
		if( !$this->data['seealso'] )
			return;
		
		foreach ( $this->data['seealso'] as &$aProduct ) {
			$pid = (int)$aProduct['PID'];
			$sth = $this->pdo->prepare( "SELECT * FROM kategorie as k JOIN kategorie_produkty as kp ON(k.id = kp.id_kategorii) WHERE kp.id_produktu = {$pid} AND kp.id_kategorii = {$category}" );
			$sth->execute();
			$aProduct['kategorie'] = $sth->fetchAll(PDO::FETCH_ASSOC);

			$sth = $this->pdo->prepare( "SELECT * FROM model WHERE id_produktu = {$pid}" );
			$sth->execute();
			$aProduct['modele'] = $sth->fetchAll(PDO::FETCH_ASSOC);
		}
	}


/**
 * registerOrder zapis zamówienia do bazy
 * @return [type] [description]
 */
	function registerOrder() {
		try {
			$this->pdo->beginTransaction();
			$order = $_SESSION[ORDER_SUMMARY];
			if( !$order ) {
				$commit = false;
				throw new modelException( "Nie istnieją dane potrzebne do realizacji zamówienia", 4025 );
			}

			$dealer = (int)$_SESSION[AUTH_SESSION_NAME]['dealer'];
			$user = (int)$_SESSION[AUTH_SESSION_NAME]['im'];
			$place = $_SESSION[ORDER_SUMMARY]['order-place'];
			$ship_type = ( $_SESSION[ORDER_SUMMARY]['ship-type'] == 1 ) ? 0 : 1;
			$weight_products = $_SESSION[ORDER_SUMMARY]['ship-weight'];
			$cost_products = $_SESSION[ORDER_SUMMARY]['products-total-cost'];
			$ship_cost = ( $_SESSION[ORDER_SUMMARY]['ship-type'] == 1 ) ? $_SESSION[ORDER_SUMMARY]['ship-total-cost'] : $_SESSION[ORDER_SUMMARY]['ship-total-multi-cost'];
			$message = $_SESSION[ORDER_SUMMARY]['user-message'];
			$weight_gram = ceil($weight_products*1000);
			$sth = $this->pdo->prepare( "INSERT INTO zamowienia (data_start, id_dealera, id_usera, id_placowki, dostawa_typ, waga, koszt, dostawa, uwagi, stat) VALUES( NOW(), {$dealer}, {$user}, {$place}, '{$ship_type}', '{$weight_gram}', '{$cost_products}', '{$ship_cost}', '{$message}', '0' )" );
			$sth->execute();

			if( $sth->rowCount() == 0 ) {
				$commit == false;
				$this->pdo->rollback();
				throw new modelException( "Zamówienie nie zostało zarejestrowane, zgłoś się do administratora", 4026 );
			}

			$lastOrderID = $this->pdo->lastInsertId();
			$orderNumber = sprintf( '%07d', $lastOrderID );
			$token = $orderNumber . time();
			$sth = $this->pdo->prepare( "UPDATE zamowienia SET numer = '{$orderNumber}', token = '{$token}' WHERE id = {$lastOrderID}" );
			$sth->execute();

			if( $sth->rowCount() == 0 ) {
				$commit == false;
				$this->pdo->rollback();
				throw new modelException( "Zamówienie nie zostało zarejestrowane, zgłoś się do administratora", 4026 );
			}

			$commit = true;

			$sql = "INSERT INTO zamowienia_produkty (id_zamowienia, id_produktu, nazwa_produktu, id_model, nazwa_model, kolor, kolor_html, rozmiar, nadruk, kod_produktu, cena_podstawowa, rabat, cena, ilosc, waga, czas_realizacji, cena_calkowita, waga_calkowita, data, stat) VALUES";
			$i = 1;
			foreach( $_SESSION[BASKET_SESSION_NAME] as &$basket ) {
				foreach( $basket as &$basketitem ) {
					$sql .= '(';
					$sql .= "{$lastOrderID}, {$basketitem['product_id']}, '{$basketitem['details']['nazwa']}', '{$basketitem['model_id']}', '{$basketitem['details']['model_nazwa']}',";
					$sql .= ( $basketitem['color-nazwa'] ) ? "'{$basketitem["color-nazwa"]}'," : 'NULL,';
					$sql .= ( $basketitem['color-html'] ) ? "'{$basketitem["color-html"]}'," : 'NULL,';
					$sql .= ( $basketitem['option-size'] ) ? "'{$basketitem["option-size"]}'," : 'NULL,';
					$sql .= "'{$basketitem["nadruk"]}',";
					$sql .= "'{$basketitem['details']['kod_produktu']}',";
					if( $basketitem['count_item'] > 1000 ) 
						$t = 'cena_jednostkowa_4';
					else if( $basketitem['count_item'] > 100 )
						$t = 'cena_jednostkowa_3';
					else if( $basketitem['count_item'] > 10 )
						$t = 'cena_jednostkowa_2';
					else
						$t = 'cena_jednostkowa_1';


					$sql .= "'{$basketitem["details"]["cena_jednostkowa_1"]}',";
					$sql .= ( $basketitem['rabat'] ) ? "'{$basketitem["rabat"]}'," : 'NULL,';
					$sql .= ( $basketitem['rabat'] ) ? bcsub( $basketitem['details']['cena_jednostkowa_1'] , bcmul( $basketitem['details']['cena_jednostkowa_1'], ($basketitem['rabat']/100), 4), 4) . "," : $basketitem['details'][$t] . ',';
					// $sql .= ( $basketitem['rabat'] ) ? $basketitem['details']['SALE_TOTAL'] . "," : $basketitem['details']['REGULAR_TOTAL'] . ',';
					$sql .= "'{$basketitem['count_item']}',";
					$sql .= "'{$basketitem['details']['masa']}',";
					$sql .= "'{$basketitem['details']['czas_realizacji']}',";
					if( $basketitem['rabat'] != 0 )
						$price = $basketitem['details']["SALE_TOTAL"];
						// $price = bcmul( $basketitem['count_item'], bcsub( $basketitem['details']['cena_jednostkowa_1'] , bcmul( $basketitem['details']['cena_jednostkowa_1'] , ( $basketitem['rabat']/100), 4 ), 4 ), 4 );
					else
						$price = bcmul( $basketitem['count_item'], $basketitem['details'][$t], 4);
						// $price = $basketitem['details']['REGULAR_TOTAL'];
					$sql .= "'{$price}',";
					$sql .= "'" . bcmul( $basketitem['details']['masa'] , $basketitem['count_item'], 4 ) . "',";
					$sql .= "NOW(),";
					$sql .= "'0'";
					$sql .= '),';
					
					if( $basketitem['option-size'] )
						$rID = (int)explode( ',', $basketitem['option-size'] )[0];
					else
						$rID = (int)explode( ',', $basketitem['one-size'] )[0];
					$sth = $this->pdo->prepare( "SELECT * FROM rozmiar WHERE id = {$rID} LIMIT 1" );
					$sth->execute();
					$size = $sth->fetch(PDO::FETCH_ASSOC);
					if( $size['czas_realizacji'] == 0 ) {
						$upSth = $this->pdo->prepare( "UPDATE rozmiar SET magazyn = (magazyn - {$basketitem['count_item']}) WHERE id = {$rID} AND magazyn >= {$basketitem['count_item']}" );
						$upSth->execute();
						if( $upSth->rowCount() == 0 ) {
							$this->pdo->rollback();
							throw new modelException( "Niewystarczająca ilość niektórych produktów w magazynie. Zamówienie nie może zostać zrealizowane.", 4027 );
							break;
						}
					}

					$order_list .= "<tr>";
						$order_list .= "<td bgcolor='#f8f8f8' style='font-size: 10px; vertical-align: middle; font-family: Verdana; color: #666666; padding: 6px; border-bottom: 2px solid #fff; border-right: 2px solid #fff;'>{$i}</td>";
						$order_list .= "<td bgcolor='#f8f8f8' style='font-size: 10px; vertical-align: middle; font-family: Verdana; color: #666666; padding: 6px; border-bottom: 2px solid #fff; border-right: 2px solid #fff;'>{$basketitem['details']['kod_produktu']}</td>";
						$order_list .= "<td bgcolor='#f8f8f8' style='font-size: 10px; vertical-align: middle; font-family: Verdana; color: #666666; padding: 6px; border-bottom: 2px solid #fff; border-right: 2px solid #fff;'>{$basketitem['details']['nazwa']} ({$basketitem['details']['model_nazwa']})</td>";
						$order_list .= "<td bgcolor='#f8f8f8' style='font-size: 10px; vertical-align: middle; font-family: Verdana; color: #666666; padding: 6px; border-bottom: 2px solid #fff;'>{$basketitem['count_item']}</td>";
					$order_list .= "</tr>";

					$i++;
				}
			}

			$order_list .= "<tr>";
				$order_list .= "<td bgcolor='#f8f8f8' style='font-size: 10px; vertical-align: middle; font-family: Verdana; color: #666666; padding: 6px; border-bottom: 2px solid #fff; border-right: 2px solid #fff;'>{$i}</td>";
				$order_list .= "<td bgcolor='#f8f8f8' style='font-size: 10px; vertical-align: middle; font-family: Verdana; color: #666666; padding: 6px; border-bottom: 2px solid #fff; border-right: 2px solid #fff;'>-</td>";
				$order_list .= "<td bgcolor='#f8f8f8' style='font-size: 10px; vertical-align: middle; font-family: Verdana; color: #666666; padding: 6px; border-bottom: 2px solid #fff; border-right: 2px solid #fff;'>Transport</td>";
				$order_list .= "<td bgcolor='#f8f8f8' style='font-size: 10px; vertical-align: middle; font-family: Verdana; color: #666666; padding: 6px; border-bottom: 2px solid #fff;'></td>";
			$order_list .= "</tr>";

			$order_list .= "<tr>";
				$order_list .= "<td colspan='2' bgcolor='#002e96' style='color: #fff; padding: 15px; font-size: 12px; font-family: Verdana; text-align: left;'>";
					$order_list .= "<strong>ŁĄCZNA WARTOŚĆ ZAMÓWIENIA</strong>";
				$order_list .= "</td>";
				$order_list .= "<td colspan='2' bgcolor='#002e96' style='color: #fff; padding: 15px; font-size: 12px; font-family: Verdana; text-align: right;'>";
					$order_list .= "<strong>" . number_format( ( $cost_products + $ship_cost ), 2, '.', '' ) . " zł</strong>";
				$order_list .= "</td>";
			$order_list .= "</tr>";
			$sql = rtrim( $sql, ',' );

			$sth = $this->pdo->prepare( $sql );
			$sth->execute();
			if( $sth->rowCount() == 0 ) {
				$this->pdo->rollback();
				throw new modelException( "Zamówienie nie zostało zarejestrowane, zgłoś się do administratora", 4026 );
			}
				
			// wysyłka maila
			$mail = new PHPMailer;
			try {

				$sth = $this->pdo->prepare( "SELECT * FROM oddzialy WHERE id = {$place} LIMIT 1" );
				$sth->execute();
				$place_item = $sth->fetch( PDO::FETCH_ASSOC );

				$sth = $this->pdo->prepare( "SELECT * FROM kontrahenci WHERE id = {$user} LIMIT 1" );
				$sth->execute();
				$user_item = $sth->fetch( PDO::FETCH_ASSOC );

				$body = file_get_contents( 'public/mailing/nowe-zamowienie.html' );
				$link = BASE . 'koszyk/potwierdz/' . $token;
				$title = $this->data['dictionary'][41]['pl'] . " " . $orderNumber;
				$ctn = $this->data['dictionary'][42]['pl'] . " " . $orderNumber;

				$ship_title = $this->data['dictionary'][43]['pl'];

				// $copy_txt = $this->data['dictionary'][34]['pl'] . "<br><br>" . $link;
				$bok = $this->data['dictionary'][44]['pl'];
				$thx = $this->data['dictionary'][45]['pl'];
				$footer_title = $this->data['dictionary'][30]['pl'];
				$footer_phone = $this->data['dictionary'][31]['pl'];
				$footer_mobile = $this->data['dictionary'][32]['pl'];
				$footer_email = $this->data['dictionary'][33]['pl'];

				$body = preg_replace( '/{{__BASE__}}/' , BASE . 'public/mailing/', $body );
				$body = preg_replace( '/{{__TITLE__}}/' , $title, $body );
				$body = preg_replace( '/{{__CONTENT__}}/' , $ctn, $body );
				$body = preg_replace( '/{{__LINK__}}/' , $link, $body );
				// $body = preg_replace( '/{{__COPY_LINK__}}/' , $copy_txt, $body );
				$body = preg_replace( '/{{__S_TOP__}}/' , $footer_title, $body );
				$body = preg_replace( '/{{__PHONE__}}/' , $footer_phone, $body );
				$body = preg_replace( '/{{__MOBILE__}}/' , $footer_mobile, $body );
				$body = preg_replace( '/{{__EMAIL__}}/' , $footer_email, $body );
				$body = preg_replace( '/{{__ORDER__}}/' , $orderNumber, $body );
				$body = preg_replace( '/{{__ORDER_LIST__}}/' , $order_list, $body );
				$body = preg_replace( '/{{__ORDER_SHIP_TITLE__}}/' , $ship_title, $body );
				$body = preg_replace( '/{{__ORDER_SHIP_NAME__}}/' , $user_item['imie'], $body );
				$body = preg_replace( '/{{__ORDER_SHIP_SURNAME__}}/' , $user_item['nazwisko'], $body );
				$address = $place_item['ulica'];
				$address .= " " . $place_item['nr_budynku'];
				if( $place_item['lokal'] )
					$address .= "/" . $place_item['lokal'];
				$city = $place_item['kod'] . ", " . ucfirst( strtolower( $place_item['miejscowosc'] ) );
				$body = preg_replace( '/{{__ORDER_SHIP_ADDRESS__}}/' , $address, $body );
				$body = preg_replace( '/{{__ORDER_SHIP_CITY__}}/' , $city, $body );
				$body = preg_replace( '/{{__BOK_INFO__}}/' , $bok, $body );
				$body = preg_replace( '/{{__ORDER_THANKS__}}/' , $thx, $body );

				$email = $_SESSION[AUTH_SESSION_NAME]['email'];
				$mail->isSMTP();
				$mail->SMTPDebug = 0;
				$mail->SMTPAuth = true;
				$mail->addReplyTo( MAIL_FROM, MAIL_FROM_NAME );
				$mail->addAddress( $email, '');
				$mail->Subject = preg_replace( "/{{__NUMER_ZAMOWIENIA__}}/" , $orderNumber, $this->data['dictionary'][46]['pl'] );
				$mail->msgHTML( $body );

				if (!$mail->send())
				    throw new modelException( "Wystąpił problem z wysłaniem emaila do nowego użtytkownika", 4016 );
				    
			} catch ( phpmailerException $e ) {
				Error::setMessage( 'Wystąpił problem z PHPMailer!', 'error', $e->getCode() );
				// $this->pdo->rollback();
			} catch ( modelException $e ) {
				Error::setMessage( 'Wystąpił problem z PHPMailer!', 'error', $e->getCode() );
				// $this->pdo->rollback();
			}

		} catch (PDOException $e) {
			$commit = false;
		}

		if( $commit ) {
			$this->pdo->commit();
			$_SESSION['register-order'] = $orderNumber;

			try {
				if( $_FILES['file1']['name'] )
					$this->fileUpload( $_FILES['file1'], $lastOrderID, 'logo' );
				if( $_FILES['file2']['name'] )
					$this->fileUpload( $_FILES['file2'], $lastOrderID, 'rozdzielnik' );
				if( $_FILES['file3']['name'] )
					$this->fileUpload( $_FILES['file3'], $lastOrderID, 'inne' );
			} catch ( modelException $e ) {
				Error::setMessage( 'Wystąpił problem z wgraniem załącznika', 'error', $e->getCode() );
				return;
			}

			unset( $_SESSION[BASKET_SESSION_NAME], $_SESSION[ORDER_SUMMARY], $_SESSION[BASKET_SHIP] );
			header( "Location: " . BASE . 'zamowienia/' );
			exit();
			
		} else {
			$this->pdo->rollback();
			throw new modelException( "Zamówienie nie zostało zarejestrowane, zgłoś się do administratora", 4026 );
		}

	}

	function saveXLS($orderID = 1) {
		$orderID = (int)$orderID;
		$sth = $this->pdo->prepare("SELECT *, z.id as ZID FROM zamowienia as z JOIN zamowienia_produkty as zp ON (z.id = zp.id_zamowienia) WHERE z.id = {$orderID} LIMIT 1");
		$sth->execute();
		$this->data['order'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		if( !$this->data['order'] )
			return false;

		$objPHPExcel = new PHPExcel();

	}

	function fileUpload( $file, $order, $name ) {
		if( !$_FILES )
			return false;
		$path = 'userfiles/order-files/';
		if( is_uploaded_file( $file['tmp_name'] ) ) {
			$filename = $name;
			$file_prepare = explode( "." , $file['name'] );
			$ext = end( $file_prepare );

			if( !file_exists( $path . $order ) ) {
				mkdir( $path . $order, 0777 );
			}

			if( !move_uploaded_file( $file['tmp_name'], $path . $order . '/' . $filename . '.' . $ext ) ) {
				throw new modelException( "Wystapił problem z wgraniem załącznika", 4031 );
				return false;
			} 
			return true;
		} else {
			throw new modelException( "Wystapił problem z wgraniem załącznika", 4031 );
			return false;
		}
	}

	function getUser() {
		$uid = (int)$_SESSION[AUTH_SESSION_NAME]['im'];
		$sth = $this->pdo->prepare( "SELECT * FROM " . ADMIN_TABLE . " WHERE id = {$uid} LIMIT 1" );
		$sth->execute();
		$this->data['user_log'] = $sth->fetch( PDO::FETCH_ASSOC );
	}

	function getNewsroom( $limit = 3 ) {
		$sth = $this->pdo->prepare( "SELECT *, DATE_FORMAT( data_dodania, '%d.%m.%Y' ) as data FROM newsroom WHERE id_biura IS NOT NULL AND id_usera IS NOT NULL ORDER BY pozycja LIMIT {$limit}" );
		$sth->execute();
		$this->data['newsroom'] = $sth->fetchAll( PDO::FETCH_ASSOC );

		if( $this->data['newsroom'] ) {
			foreach( $this->data['newsroom'] as $k =>&$aData ) {
				$sth = $this->pdo->prepare( "SELECT * FROM newsroom_klienci WHERE id = {$aData['id_biura']} LIMIT 1" );
				$sth->execute();
				$res = $sth->fetch( PDO::FETCH_ASSOC );

				$sth = $this->pdo->prepare( "SELECT * FROM users WHERE id = {$aData['id_usera']} LIMIT 1" );
				$sth->execute();
				$user = $sth->fetch( PDO::FETCH_ASSOC );

				if( $res['stat'] == 0 || $user['stat'] == 0 )
					unset( $this->data['newsroom'][$k] );
			}
		}
	}

	function isMobile() {
		$detect = new Mobile_Detect();
		$this->data['mobile'] = ( $detect->isMobile() ) ? true : false;
	}

	function setLanguage() {
		if( $_GET['lang'] == 'pl' || $_GET['lang'] == 'en' ) {
			setcookie( COOKIE_LANG_NAME, $_GET['lang'], time()+157680000, '/' );
			
			// $link = Routing::$routing['controller'] . '/' . Routing::$routing['action'];
			// $link .= ( Routing::$routing['param'] != '' ) ? '/' . Routing::$routing['param'] : '';
			// header( "Location: " . BASE . $link );
			// exit();
		} else {

		}
	}

}
