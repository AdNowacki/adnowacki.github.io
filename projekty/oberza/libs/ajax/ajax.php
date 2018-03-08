<?php
session_start();
require "../config/config.php";

$pdo = new PDO( "mysql:host=" . HOST . ";dbname=" . DB, USER, PASSWORD, array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ) );

$sth = $pdo->prepare( "SELECT * FROM " . DICTIONARY_TABLE . " ORDER BY id" );
$sth->execute();
$dict = $sth->fetchAll( PDO::FETCH_ASSOC );

foreach( $dict as $item ) {
	$ind = $item['id'];
	$data['dictionary'][$ind] = $item;
}

if( $_POST['type'] == 'dictionary' ) {
	$sth = $pdo->prepare( "SELECT * FROM " . DICTIONARY_TABLE . " ORDER BY id" );
	$sth->execute();
	$dict = $sth->fetchAll( PDO::FETCH_ASSOC );

	foreach( $dict as $item ) {
		$ind = $item['id'];
		$data['dictionary'][$ind] = $item;
	}
	echo json_encode( $data );
}


if( $_POST['type'] == 'edit_user' ) {
	$id = (int)$_POST['id'];
	$col = trim( htmlspecialchars( $_POST['col'] ) );
	$val = trim( htmlspecialchars( $_POST['val'] ) );
	$sth = $pdo->prepare( "UPDATE " . ADMIN_TABLE . " SET `{$col}` = :val WHERE id = {$id}" );
	$sth->execute( array( ':val' => $val ) );
	if( $sth->rowCount() > 0 ) {
		$data = array( 'type' => 'success', 'm' => $data['dictionary'][74][LANG] );
	} else {
		$data = array( 'type' => 'error', 'm' => $data['dictionary'][75][LANG] );
	}
	echo json_encode( $data );
}

if( $_POST['type'] == 'add_comment' ) {
	$id = (int)$_POST['id'];
	$name = htmlspecialchars( trim( $_POST['name'] ) );
	$email = htmlspecialchars( trim( $_POST['email'] ) );
	$comment = nl2br( htmlspecialchars( trim( $_POST['comment'] ) ) );
	$captcha = (int)$_POST['captcha'];


	if( !$name || !$email || !$comment || !$captcha ) {
		$d['type'] = 'error';
		$d['message'] = 'Nie uzupełniono wymaganych pól';
	}


	if( $captcha != $_SESSION['result_captcha'] ) {
		$d['type'] = 'error';
		$d['message'] = 'Wynik działania jest niepoprawny';
	}

	if( !$d['type'] && $d['type'] != 'error' ) {
		$sth = $pdo->prepare( "INSERT INTO komentarze (id_filmu, imie_nazwisko, email, komentarz) VALUES({$id}, :name, :email, :comment )" );
		$sth->execute( 
			array( 
				':name' => $name,
				':email' => $email,
				':comment' => $comment
			 )
		 );

		if( $sth->rowCount() < 1 ) {
			$d['type'] = 'error';
			$d['message'] = 'Wystąpił problem z dodaniem komentarza';
		} else {
			$lastId = $pdo->lastInsertId();
			$sth = $pdo->prepare( "SELECT *, DATE_FORMAT( data, '%d/%m%/%Y %H:%i' ) as data FROM komentarze WHERE id = {$lastId} LIMIT 1" );
			$sth->execute();
			$v = $sth->fetch( PDO::FETCH_ASSOC );

			$d['type'] = 'success';
			$d['message'] = 'Poprawnie dodano komentarz';
			$d['rec'] = $v;
		}
	}

	echo json_encode( $d );


}