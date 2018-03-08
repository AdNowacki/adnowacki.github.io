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
		<h1>Dodaj zdjęcie do galerii</strong></h1>
		<div class="row">
			<div class="wctn row">
				<div class="col-sm-10">
					<form method="post" class="uedit uadd form-ocms" enctype="multipart/form-data">
	                	<div class="form-field">
	                        <label for="tytul_pl">tytuł PL</label>
	                        <input name="tytul_pl" id="tytul_pl" required value="<?= $this->data['tytul_pl']; ?>" type="text">
	                    </div>

	                    <div class="form-field">
	                        <label for="tytul_en">tytuł EN</label>
	                        <input name="tytul_en" id="tytul_en" required value="<?= $this->data['tytul_en']; ?>" type="text">
	                    </div>

	                    <div class="form-field form-field-checkbox">
	                        <label for="stat">
	                        	<?php $checked = ( $this->data['stat'] == 1 ) ? 'checked' : ''; ?>
	                        	<input type="checkbox" name='stat' id='stat' value='1' <?= $checked; ?>> Zaznacz aby aktywowac wpis
	                        </label>
	                    </div>
	                    <div class="form-field">
	                    	<div class="image-input">
	                    		<span>Dodaj obrazek w formacie jpg lub png o szerokosci min. 900px</span>
	                    		<input type="file" name='image_upload' id='image_upload' accept=".png, .jpg, .jpeg">
	                    	</div>
	                    	<div id="image-error"></div>
	                    	<div id="image-prev"></div>
	                    </div>

						<br><br>
	                    <div><a href="<?= BASE; ?>admin_galeria/widok" class="page-action-link"><i class="icon-wroc"></i> Wróć do listy galerii</a> <button name="add" class="or-btn or-link" value="1">Zapisz</button></div>
	                </form>
                </div>

			</div>
		</div>
	</div>
</div>