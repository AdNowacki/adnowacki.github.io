<?php require TEMPLATE_DIR . "_elements/_user.php"; ?>
<?php //require TEMPLATE_DIR . "_elements/_adminnav.php"; ?>

<?php
	Helper::infoSystem( [ 'type' => 'success', 'index' => 'login_success', 'message' => $this->data['dictionary'][23][LANG] ] );
	Helper::infoSystem( [ 'type' => 'success', 'index' => I_SUCCESS, 'message' => $_SESSION[I_SUCCESS] ] );
	Helper::infoSystem( [ 'type' => 'error', 'index' => I_ERROR, 'message' => $_SESSION[I_ERROR] ] );
	Helper::infoSystem( [ 'type' => 'info', 'index' => I_INFO, 'message' => $_SESSION[I_INFO] ] );
?>

<?php if( Error::getMessageItem( 'error_action_model' ) ) : ?>
	<div class="system-info system-info-error">
        <div>
            <?= Error::getMessageItem( 'error_action_model' )['message']; ?>
        </div>
        <button class="close-btn"></button>
    </div>
<?php endif; ?>

<div class="content admin-content">
	<div class="ctn1360">
		<h1>Lista stron</h1>
		<div class="row">
			<div class="wctn row">
				<a href="<?= BASE; ?>admin_strony/dodaj" class="or-btn or-link" value="1">Dodaj stronę</a>
				<br><br>
				<?php 
					$page = Helper::paginationCurrent( array( 'current' => (int)$_GET['p'], 'allpages' => ceil( $this->data['TOTAL'] / PERPAGE ) ) ); 
				?>

				<?php if( $this->data['strony'] ) : ?>
					<?php require "libs/templates/_elements/_admin_search.php"; ?>
					<table class="t-results">
						<tr>
							<th class='w5'>Pozycja</th>
							<th class='w20'>Szczegóły</th>
							<th class='w20'>Tytuł</th>
							<th class='w35'>Zajawka</th>
							<th class='w10 center-a'>Operacje</th>
							<th class='w10 center-a'>Pozycja</th>
						</tr>
					<?php 
						$lp = ( $_GET['p'] ) ? ( (int)$_GET['p'] - 1 ) : 0;
						$lp *= PERPAGE;
					?>
					<?php foreach( $this->data['strony'] as $aData ) : ?>
						<?php $lp++; ?>
						<?php $off = ( $aData['stat'] != 1 ) ? "class='toff'" : ""; ?>
						<tr <?= $off; ?>>
							<td class='w5 rel'><i class="icon-eye-off" title='Wyłączone'></i><?= $aData['pozycja']; ?></td>
							<td class='w20'>
								<div class="det-item">
									<em>dodający: <strong><?= $aData['user']['imie']; ?> <?= $aData['user']['nazwisko']; ?></em></strong><br>
									<em>data dodania: <strong><?= $aData['data_dodania']; ?></em></strong><br>
									<em>wyswietlenia: <strong><?= $aData['wyswietlenia']; ?></em></strong><br>
								</div>
							</td>
							<td class='w20'><?= $aData['tytul_' . LANG]; ?></td>
							<td class='w35'><?= mb_substr( $aData['zajawka_' . LANG] , 0, 150, 'utf-8' ); ?></td>
							<td class='w10 center-a'>
								<a href="<?= BASE . Routing::$routing['controller']; ?>/edytuj/<?= $aData['id']; ?>" class='show-link'><i class="icon-pencil"></i> edytuj</a>
								<?php if( $aData['stat'] == 1 ) : ?>
									<a href="<?= BASE . Routing::$routing['controller']; ?>/wylacz/<?= $aData['id']; ?>" class='show-link'><i class="icon-eye-off"></i> wyłącz</a>
								<?php else : ?>
									<a href="<?= BASE . Routing::$routing['controller']; ?>/wlacz/<?= $aData['id']; ?>" class='show-link'><i class="icon-eye"></i> włącz</a>
								<?php endif; ?>
								<?php if( !Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user'] ) ) : ?>
									<a href="<?= BASE . Routing::$routing['controller']; ?>/usun/<?= $aData['id']; ?>" data-message='Czy na pewno chcesz usunąć wpis?' data-tab='admin_strony' data-i='<?= $aData['id']; ?>' class='show-link show-link-off'><i class="icon-trash"></i> usuń</a>
								<?php endif; ?>
							</td>
							<td class='w10 center-a'>
								<?php if( $lp == 1 ) : ?>
									<a href="<?= BASE . Routing::$routing['controller']; ?>/dol/<?= $aData['id']; ?>" data-i='<?= $aData['id']; ?>' class='show-link'><i class="icon-down-open"></i></a>
								<?php elseif( $lp == $this->data['TOTAL'] ) : ?>
									<a href="<?= BASE . Routing::$routing['controller']; ?>/gora/<?= $aData['id']; ?>" data-i='<?= $aData['id']; ?>' class='show-link'><i class="icon-up-open"></i></a>
								<?php else : ?>
									<a href="<?= BASE . Routing::$routing['controller']; ?>/gora/<?= $aData['id']; ?>" data-i='<?= $aData['id']; ?>' class='show-link'><i class="icon-up-open"></i></a>
									<a href="<?= BASE . Routing::$routing['controller']; ?>/dol/<?= $aData['id']; ?>" data-i='<?= $aData['id']; ?>' class='show-link'><i class="icon-down-open"></i></a>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?= $page; ?>
				<?php else : ?>
					<?php require "libs/templates/_elements/_no_data.php"; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
