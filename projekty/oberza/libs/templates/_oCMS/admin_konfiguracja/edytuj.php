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
		<h1>Edytuj wpis: <strong><?= htmlentities( $this->data['config']['nazwa'] ); ?></strong></h1>
		<div class="row">
			<div class="wctn row">
				<div class="col-sm-8">
					<form method="post" class="uedit uadd form-ocms" enctype="multipart/form-data">
	                	<div class="form-field">
	                        <label for="nazwa">nazwa</label>
	                        <input required="" name="nazwa" id="nazwa" value="<?= htmlentities( $this->data['config']['nazwa'] ); ?>" type="text">
	                    </div>

	                    <div class="form-field">
	                        <label for="pl">treść PL</label>
	                        <textarea required="" name="pl" id="pl" class='long'><?= htmlentities( $this->data['config']['pl'] ); ?></textarea>
	                    </div>

						<br><br>
						<?php $backPage = ( Routing::$routing['title'] ) ? '?p=' . (int)Routing::$routing['title'] : ''; ?>
	                    <div><a href="<?= BASE; ?>admin_konfiguracja/widok<?= $backPage; ?>" class="page-action-link"><i class="icon-wroc"></i> Wróć do ustawień tekstów</a> <button name="edit" class="or-btn or-link" value="1">Zapisz</button></div>
	                </form>
                </div>

			</div>
		</div>
	</div>
</div>