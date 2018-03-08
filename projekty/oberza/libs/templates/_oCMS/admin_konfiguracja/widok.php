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
		<h1>Ustawienia stałych tekstów strony</h1>
		<div class="row">
			<div class="wctn row">
				<?php /* <a href="<?= BASE; ?>admin_artykuly/dodaj" class="or-btn or-link" value="1">Dodaj artykul</a> */ ?>
				<br><br>
				<?php 
					$page = Helper::paginationCurrent( array( 'current' => (int)$_GET['p'], 'allpages' => ceil( $this->data['TOTAL'] / PERPAGE ) ) ); 
					$linkPage = ( $_GET['p'] ) ? '/' . (int)$_GET['p'] : ''
				?>

				<?php if( $this->data['config'] ) : ?>
					<?php require "libs/templates/_elements/_admin_search.php"; ?>
					<table class="t-results">
						<tr>
							<th class='w5'>ID</th>
							<th class='w25'>Nazwa</th>
							<th class='w25'>Wartość PL</th>
							<th class='w25 center-a'>Operacje</th>
						</tr>
					<?php 
						$lp = ( $_GET['p'] ) ? ( (int)$_GET['p'] - 1 ) : 0;
						$lp *= PERPAGE;
					?>
					<?php foreach( $this->data['config'] as $aData ) : ?>
						<?php $lp++; ?>
						<?php $off = ( $aData['stat'] != 1 ) ? "class='toff'" : ""; ?>
						<tr <?= $off; ?>>
							<td class='w5 rel'><i class="icon-eye-off" title='Wyłączone'></i><?= $aData['id']; ?></td>
							<td class='w25'><?= $aData['nazwa']; ?></td>
							<td class='w25'><?= $aData['pl']; ?></td>
							<td class='w25 center-a'>
								<a href="<?= BASE . Routing::$routing['controller']; ?>/edytuj/<?= $aData['id']; ?><?= $linkPage; ?>" class='show-link'><i class="icon-pencil"></i> edytuj</a>
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
