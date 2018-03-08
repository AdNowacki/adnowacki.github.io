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
		<h1>Edytuj stronę: <strong><?= $this->data['strona']['tytul_pl']; ?></strong></h1>
		<div class="row">
			<div class="wctn row">
				<div class="col-sm-8">
					<form method="post" class="uedit uadd form-ocms" enctype="multipart/form-data">
	                	<div class="form-field">
	                        <label for="tytul_pl">tytuł strony</label>
	                        <input name="tytul_pl" id="tytul_pl" required value="<?= htmlentities( $this->data['strona']['tytul_pl'] ); ?>" type="text">
	                    </div>
	                    
						<div class="form-field">
	                        <label for="zajawka_pl">zajawka strony</label>
	                        <textarea class='wyswig' name="zajawka_pl" id="zajawka_pl"><?= $this->data['strona']['zajawka_pl']; ?></textarea>
	                    </div>

	                    <div class="form-field">
	                        <label for="opis_pl">opis strony</label>
	                        <textarea class='wyswig' name="opis_pl" id="opis_pl"><?= $this->data['strona']['tresc_pl']; ?></textarea>
	                    </div>

	                    <div class="form-field form-field-checkbox">
	                        <label for="stat">
	                        	<?php $checked = ( $this->data['strona']['stat'] == 1 ) ? 'checked' : '';  ?>
	                        	<input type="checkbox" name='stat' id='stat' value='1' <?= $checked; ?>> Zaznacz aby aktywowac wpis
	                        </label>
	                    </div>

	                    <div class="form-field form-field-checkbox">
	                        <label for="menu">
	                        	<?php $checked = ( $this->data['strona']['menu'] == 1 ) ? 'checked' : '';  ?>
	                        	<input type="checkbox" name='menu' id='menu' value='1' <?= $checked; ?>> Zaznacz aby dodac do górnego menu
	                        </label>
	                    </div>

						<br><br>
	                    <div><a href="<?= BASE; ?>admin_strony/widok" class="page-action-link"><i class="icon-wroc"></i> Wróć do listy stron</a> <button name="edit" class="or-btn or-link" value="1">Zapisz</button></div>
	                </form>
                </div>

			</div>
		</div>
	</div>
</div>