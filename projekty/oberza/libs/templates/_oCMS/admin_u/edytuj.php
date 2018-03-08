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
		<h1>Edytuj artykuł: <strong><?= $this->data['artykul']['tytul_pl']; ?></strong></h1>
		<div class="row">
			<div class="wctn row">
				<div class="col-sm-8">
					<form method="post" class="uedit uadd form-ocms" enctype="multipart/form-data">
						<input type="hidden" name='biuro' value='<?= Routing::$routing['param']; ?>'>
						<input type="hidden" name='typ' value='newsroom'>
						<input type="hidden" name='admin' value='0'>

	                	<div class="form-field">
	                        <label for="email">email</label>
	                        <input name="email" id="email" readonly value="<?= $this->data['user']['email']; ?>" type="text">
	                    </div>

	                    <div class="form-field">
	                        <label for="imie">imie</label>
	                        <input name="imie" id="imie" required value="<?= $this->data['user']['imie']; ?>" type="text">
	                    </div>

	                    <div class="form-field">
	                        <label for="nazwisko">nazwisko</label>
	                        <input name="nazwisko" id="nazwisko" required value="<?= $this->data['user']['nazwisko']; ?>" type="text">
	                    </div>

	                    <div class="form-field">
                        	<label for="uprawnienia">uprawnienia</label>
                        	<select name="uprawnienia" id="uprawnienia" required="">
                        		<option value="">-- wybierz uprawnienia dla konta --</option>
                        		<option value="user" <?php if( $this->data['user']['uprawnienia'] == 'user' ) echo 'selected'; ?>>redaktor</option>
                        		<option value="admin" <?php if( $this->data['user']['uprawnienia'] == 'admin' ) echo 'selected'; ?>>administrator</option>
                        		<?php if( $this->data['user_log']['uprawnienia'] == 'superadmin' ) : ?>
                        			<option value="superadmin" <?php if( $this->data['user']['uprawnienia'] == 'superadmin' ) echo 'selected'; ?>>super administrator</option>
                        		<?php endif; ?>
							</select>
                        	<span class="dropdown"><i class="icon-angle-down"></i></span>
                    	</div>

	                    <div class="form-field form-field-checkbox">
	                        <label for="stat">
	                        	<?php $checked = ( $this->data['user']['stat'] == 1 ) ? 'checked' : ''; ?>
	                        	<input type="checkbox" name='stat' id='stat' value='1' <?= $checked; ?>> Zaznacz aby aktywowac konto
	                        </label>
	                    </div>

	                    <div class="form-field form-field-checkbox">
	                        <label for="new_pass">
	                        	<input type="checkbox" name='new_pass' id='new_pass' value='1'> Wygeneruj nowe losowe hasło dla użytkownika
	                        </label>
	                    </div>

						<br><br>
	                    <div><a href="<?= BASE; ?>admin_u/widok/<?= Routing::$routing['title']; ?>" class="page-action-link"><i class="icon-wroc"></i> Wróć do listy użytkowników</a> <button name="edit" class="or-btn or-link" value="1">Zapisz zmiany</button></div>
	                </form>
                </div>
			</div>
		</div>
	</div>
</div>