<?php
// error_reporting( E_ERROR | E_WARNING | E_PARSE );

// stałe
// domena
define( 'DOMAIN' , 'aparthotel.oberza.pl' );
// katalog w którym znajdue sie stona, jeśli w katalogu głównym to /
define( 'BASE_DIR' , '/' );
// bazowy url
define( 'BASE' , 'http://' . DOMAIN . BASE_DIR );
//ścieżka do katalogu template
define( 'TEMPLATE_DIR' , 'libs/templates/' );
// domyślny kontroller
define( 'CONTROLLER' , 'index' );
// domyślna akcja
define( 'ACTION' , 'widok' );
// paginacja liczba wyników na stronie
define( 'PERPAGE' , 25 );
//nazwa sesji przy logowaniu do admina
define( 'AUTH_SESSION_NAME' , 'mk0K8ZPT6csv4zXBy' );
// sesja usera
define( 'USER_SESSION_NAME' , 'lQkrLNipPT' );
// czy zalogowany do panelu
define( 'ADMIN_PANEL' , 'VaBWO0umsA' );
// sesja koszyka
define( 'BASKET_SESSION_NAME' , 'b' );
// sesja podsumowanie zamówienia
define( 'ORDER_SUMMARY' , 'order-summary' );
// sesja wysyłki
define( 'BASKET_SHIP' , 'ship' );
// prefix tabel w bazie danych
define( 'DB_PREFIX' , '' );
// nazwa ciasteczka przechowującego wersję językową
define( 'COOKIE_LANG_NAME' , 'lang_version' );
// definicja tabeli z tłumaczeniami
define( 'DICTIONARY_TABLE' , 'config' );
// definicja tabeli z użytkownikami systemu
define( 'ADMIN_TABLE' , 'users' );
// indeks tablicy z komunikatem sukcesu
define( 'I_SUCCESS' , 'success' );
// indeks tablicy z komunikatem błędu
define( 'I_ERROR' , 'error' );
// indeks tablicy z komunikatem 
define( 'I_INFO' , 'info' );
// ilosc elementów slidera
define( 'SLIDER_ELEMENTS' , 3 );
// ilosc elementów w podsliderze
define( 'SUB_SLIDER_ELEMENTS' , 2 );
// index cookiesów w którym zapisane są przeglądane artykuły
define( 'COOKIES_ARTICLE' , 'f8ynAra2H' );
// czas przechowywania cookiesa z przeglądanymi artykułami w minutach
define( 'COOKIES_ARTICLE_TIMEOUT' , 15 );
// indeks cookiesów w którym zapisany jest dostęp do artykułów
define( 'COOKIES_ARTICLE_ACCESS' , 'Hgy5Xz1UR' );
// czas przechowywania cookiesa dostępu do artykułów w minutach
define( 'COOKIES_ARTICLE_ACCESS_TIMEOUT' , 120 );
// index cookiesów w którym zapisane są przeglądane newsy
define( 'COOKIES_NEWSROOM' , 'jdfMgcIG' );
// czas przechowywania cookiesa z przeglądanymi newsy w minutach
define( 'COOKIES_NEWSROOM_TIMEOUT' , 15 );
// indeks sesji przechowującej referencje do poprzedniej strony
define( 'REFERER' , 'gMukEeOI' );
// index cookiesów w którym zapisane są przeglądane strony
define( 'COOKIES_PAGE' , 'qgIe!b' );
// czas przechowywania cookiesa z przeglądanymi stronami w minutach
define( 'COOKIES_PAGE_TIMEOUT' , 15 );
// index cookiesów w którym zapisane są przeglądane czasopisma
define( 'COOKIES_ONLINE' , 'chHgO' );
// czas przechowywania cookiesa z przeglądanymi czasopismami w minutach
define( 'COOKIES_ONLINE_TIMEOUT' , 15 );
// index cookiesów w którym zapisane są kliknięte reklamy
define( 'COOKIES_ADV' , 'RcPslar2vF' );
// czas przechowywania cookiesa z klikniętymi reklamami w minutach
define( 'COOKIES_ADV_TIMEOUT' , 15 );

if( !$_GET['lang'] ) {
	if( $_COOKIE[COOKIE_LANG_NAME] == 'en' )
		define( 'LANG' , 'en' );
	else if( $_COOKIE[COOKIE_LANG_NAME] == 'pl' )
		define( 'LANG' , 'pl' );
	else if( $_COOKIE[COOKIE_LANG_NAME] == 'de' )
		define( 'LANG' , 'de' );
	else
		define( 'LANG' , 'pl' );
} else {
	if( $_GET['lang'] == 'pl' ) {
		setcookie( COOKIE_LANG_NAME, 'pl', time()+157680000, '/' );
		define( 'LANG' , 'pl' );
	}
	else if( $_GET['lang'] == 'en' ) {
		setcookie( COOKIE_LANG_NAME, 'en', time()+157680000, '/' );
		define( 'LANG' , 'en' );
	}
}




// zakodowanie parametru id w url
define( 'HASH_KEY', '5o7Fxc6LfDl4QbX' );
// Tytuł strony
define( 'PAGE_TITLE' , 'Pisa' );

// db
define( 'HOST' , 'sql.oberzavi.nazwa.pl' );
define( 'DB' , 'oberzavi_6' );
define( 'USER' , 'oberzavi_6' );
define( 'PASSWORD' , '!Za17rebO%' );

define( 'MAIL_HOST' , 'oberzavi.nazwa.pl' );
define( 'MAIL_CHARSET' , 'utf-8' );
define( 'MAIL_PORT' , 25 );
define( 'MAIL_USER' , 'noreply@oberza.pl' );
define( 'MAIL_PASSWORD' , '!nOrEpLy_2017' );
define( 'MAIL_FROM' , 'noreply@oberza.pl' );
define( 'MAIL_FROM_NAME' , 'Oberża' );


