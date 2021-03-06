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
		<h1>Lista adminów biura prasowego <strong><?= $this->data['biuro']['firma']; ?></strong></h1>
		<div class="row">
			<div class="wctn row">
				<a href="<?= BASE; ?>admin_u/dodaj/<?= Routing::$routing['param']; ?>" class="or-btn or-link" value="1">Dodaj użytkownika</a>
				<br><br>
				<?php 
					$page = Helper::paginationCurrent( array( 'current' => (int)$_GET['p'], 'allpages' => ceil( $this->data['TOTAL'] / PERPAGE ) ) ); 
				?>

				<?php if( $this->data['users'] ) : ?>
					<?php require "libs/templates/_elements/_admin_search.php"; ?>
					<table class="t-results">
						<tr>
							<th class='w5'>l.p.</th>
							<th class='w25'>Imię i nazwisko</th>
							<th class='w15'>Data utworzenia konta</th>
							<th class='w10'>Typ konta</th>
							<th class='w25'>Ostatnie logowanie</th>
							<th class='w20 center-a'>Operacje</th>
						</tr>
						<?php if( $this->data['superadmin'] && !Auth::accessDenied( $_SESSION[AUTH_SESSION_NAME]['permissions'], ['newsroom', 'user', 'admin'] ) ) : ?>
							<tr>
								<td class='w5 rel'>ja</td>
								<td class='w25'><?= $this->data['superadmin']['imie']; ?> <?= $this->data['superadmin']['nazwisko']; ?><br><em><?= $this->data['superadmin']['email']; ?></em></td>
								<td class='w15'><?= $this->data['superadmin']['od_kiedy']; ?></td>
								<td class='w10'><?= $this->data['superadmin']['uprawnienia']; ?></td>
								<td class='w25'><?= $last = ( $this->data['superadmin']['ostatnie_logowanie'] == '0000-00-00 00:00:00' ) ? '-' : $this->data['superadmin']['ostatnie_logowanie']; ?></td>
								<td class='w20 center-a'>
									<a href="<?= BASE; ?>profil" class='show-link'>Mój profil</a>
								</td>
							</tr>
						<?php endif; ?>
					<?php 
						$lp = ( $_GET['p'] ) ? ( (int)$_GET['p'] - 1 ) : 0;
						$lp *= PERPAGE;
					?>
					<?php foreach( $this->data['users'] as $aData ) : ?>
						<?php $lp++; ?>
						<?php $off = ( $aData['stat'] != 1 ) ? "class='toff'" : ""; ?>
						<tr <?= $off; ?>>
							<td class='w5 rel'><i class="icon-eye-off" title='Wyłączone'></i><?= $lp; ?></td>
							<td class='w25'><?= $aData['imie']; ?> <?= $aData['nazwisko']; ?><br><em><?= $aData['email']; ?></em></td>
							<td class='w15'><?= $aData['od_kiedy']; ?></td>
							<td class='w10'><?= $type = ( $aData['uprawnienia'] == 'user' ) ? 'redaktor' : $aData['uprawnienia']; ?></td>
							<td class='w25'><?= $last = ( $aData['ostatnie_logowanie'] == '0000-00-00 00:00:00' ) ? '-' : $aData['ostatnie_logowanie']; ?></td>
							<td class='w20 center-a'>
								<a href="<?= BASE . Routing::$routing['controller']; ?>/edytuj/<?= $aData['id']; ?>/<?= Routing::$routing['param']; ?>" class='show-link'><i class="icon-pencil"></i> edytuj</a>
								<?php if( $aData['stat'] == 1 ) : ?>
									<a href="<?= BASE . Routing::$routing['controller']; ?>/wylacz/<?= $aData['id']; ?>/<?= Routing::$routing['param']; ?>" class='show-link'><i class="icon-eye-off"></i> wyłącz</a>
								<?php else : ?>
									<a href="<?= BASE . Routing::$routing['controller']; ?>/wlacz/<?= $aData['id']; ?>/<?= Routing::$routing['param']; ?>" class='show-link'><i class="icon-eye"></i> włącz</a>
								<?php endif; ?>
								<a href="<?= BASE . Routing::$routing['controller']; ?>/usun/<?= $aData['id']; ?>/<?= Routing::$routing['param']; ?>" data-message='Uwaga! Usunięcie użytkownika będzie skutkowało usunięciem artykułów wprowadzonych przez niego. Czy na pewno chcesz to zrobic?' data-tab='admin_u' data-i='<?= $aData['id']; ?>;<?= Routing::$routing['param']; ?>' class='show-link show-link-off'><i class="icon-trash"></i> usuń</a>
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
