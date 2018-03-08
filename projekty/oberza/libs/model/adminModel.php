<?php

class adminModel extends Model {
	public $data = [ 'admin' => true ];
	function index() {
		// var_dump( "Model" );
	}

	function widok() {
		$this->getUser();

		$client = (int)$_SESSION[AUTH_SESSION_NAME]['client'];
		$uid = (int)$_SESSION[AUTH_SESSION_NAME]['im'];
		$limit = PERPAGE;
		$offset = ( !$_GET['page'] ) ? 0 : ( (int)$_GET['page'] - 1 ) * PERPAGE;

		$sth = $this->pdo->prepare( "SELECT ( SELECT COUNT(*) as _TOTAL_ FROM artykuly ) as _TOTAL_, ( SELECT COUNT(*) as _TOTAL_ FROM artykuly WHERE stat = '0' ) as _TOTAL_NON_ACTIVE_ FROM artykuly" );
		$sth->execute();
		$this->data['artykuly_total'] = $sth->fetch( PDO::FETCH_ASSOC );

		$sth = $this->pdo->prepare( "SELECT ( SELECT COUNT(*) as _TOTAL_ FROM wydarzenia ) as _TOTAL_, ( SELECT COUNT(*) as _TOTAL_ FROM wydarzenia WHERE stat = '0' ) as _TOTAL_NON_ACTIVE_ FROM wydarzenia" );
		$sth->execute();
		$this->data['wydarzenia_total'] = $sth->fetch( PDO::FETCH_ASSOC );

		$sth = $this->pdo->prepare( "SELECT ( SELECT COUNT(*) as _TOTAL_ FROM czasopisma ) as _TOTAL_, ( SELECT COUNT(*) as _TOTAL_ FROM czasopisma WHERE stat = '0' ) as _TOTAL_NON_ACTIVE_ FROM czasopisma" );
		$sth->execute();
		$this->data['czasopisma_total'] = $sth->fetch( PDO::FETCH_ASSOC );

		$sth = $this->pdo->prepare( "SELECT ( SELECT COUNT(*) as _TOTAL_ FROM firmy ) as _TOTAL_, ( SELECT COUNT(*) as _TOTAL_ FROM firmy WHERE stat = '0' ) as _TOTAL_NON_ACTIVE_ FROM firmy" );
		$sth->execute();
		$this->data['firmy_total'] = $sth->fetch( PDO::FETCH_ASSOC );

		$sth = $this->pdo->prepare( "SELECT ( SELECT COUNT(*) as _TOTAL_ FROM eksperci ) as _TOTAL_, ( SELECT COUNT(*) as _TOTAL_ FROM eksperci WHERE stat = '0' ) as _TOTAL_NON_ACTIVE_ FROM eksperci" );
		$sth->execute();
		$this->data['eksperci_total'] = $sth->fetch( PDO::FETCH_ASSOC );

		$sth = $this->pdo->prepare( "SELECT ( SELECT COUNT(*) as _TOTAL_ FROM reklama ) as _TOTAL_, ( SELECT COUNT(*) as _TOTAL_ FROM reklama WHERE stat = '0' OR ( NOW() < data_start || NOW() > data_stop ) ) as _TOTAL_NON_ACTIVE_ FROM reklama" );
		$sth->execute();
		$this->data['reklama_total'] = $sth->fetch( PDO::FETCH_ASSOC );

		$sth = $this->pdo->prepare( "SELECT ( SELECT COUNT(*) as _TOTAL_ FROM galeria ) as _TOTAL_, ( SELECT COUNT(*) as _TOTAL_ FROM galeria WHERE stat = '0' ) as _TOTAL_NON_ACTIVE_ FROM galeria" );
		$sth->execute();
		$this->data['galerie_total'] = $sth->fetch( PDO::FETCH_ASSOC );

		$sth = $this->pdo->prepare( "SELECT ( SELECT COUNT(*) as _TOTAL_ FROM newsroom ) as _TOTAL_, ( SELECT COUNT(*) as _TOTAL_ FROM newsroom WHERE stat = '0' ) as _TOTAL_NON_ACTIVE_ FROM newsroom" );
		$sth->execute();
		$this->data['newsroom_all_total'] = $sth->fetch( PDO::FETCH_ASSOC );

		$sth = $this->pdo->prepare( "SELECT ( SELECT COUNT(*) as _TOTAL_ FROM newsletter ) as _TOTAL_, ( SELECT COUNT(*) as _TOTAL_ FROM newsletter WHERE ( stat = '0' OR stat = '2' ) ) as _TOTAL_NON_ACTIVE_ FROM newsletter" );
		$sth->execute();
		$this->data['newsletter_total'] = $sth->fetch( PDO::FETCH_ASSOC );

		if( Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom'] ) ) {
			$sth = $this->pdo->prepare( "SELECT ( SELECT COUNT(*) as _TOTAL_ FROM newsroom WHERE id_usera = " . $_SESSION[AUTH_SESSION_NAME]['im'] . " ) as _TOTAL_, ( SELECT COUNT(*) as _TOTAL_ FROM newsroom WHERE stat = '0' AND id_usera = " . $_SESSION[AUTH_SESSION_NAME]['im'] . " ) as _TOTAL_NON_ACTIVE_ FROM newsroom" );
			$sth->execute();
			$this->data['newsroom_total'] = $sth->fetch( PDO::FETCH_ASSOC );
		}

	}
	function logout() {}
}
