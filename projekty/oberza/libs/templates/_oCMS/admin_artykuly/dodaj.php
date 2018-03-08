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
		<h1>Dodaj nowy artykuł</strong></h1>
		<div class="row">
			<div class="wctn row">
				<div class="col-sm-10">
					<form method="post" class="uedit uadd form-ocms" enctype="multipart/form-data">
	                	<div class="form-field">
	                        <label for="tytul_pl">tutuł</label>
	                        <input name="tytul_pl" id="tytul_pl" required value="<?= $this->data['tytul_pl']; ?>" type="text">
	                    </div>
	                    
						<div class="form-field">
	                        <label for="opis_pl">zajawka</label>
	                        <textarea class='wyswig' name="zajawka_pl" id="zajawka_pl"><?= $this->data['zajawka_pl']; ?></textarea>
	                    </div>

	                    <div class="form-field">
	                        <label for="opis_pl">opis</label>
	                        <textarea class='wyswig' name="opis_pl" id="opis_pl"><?= $this->data['opis_pl']; ?></textarea>
	                    </div>
						
						<?php if( $this->data['categories'] ) : ?>
								<div class="form-field form-categories">
			                        <label for="">kategorie artykułu</label>
									<?php foreach( $this->data['categories'] as $aData ) : ?>
				                        <div class="checkbox-btn">
				                        	<label for='c<?= $aData['id']; ?>'><input type="checkbox" name='kategoria[]' value='<?= $aData['id']; ?>' id='c<?= $aData['id']; ?>'><span><?= $aData['nazwa_' . LANG]; ?></span></label>
				                        </div>
									<?php endforeach; ?>
			                    </div>
						<?php endif; ?>

						<div class="form-field">
	                        <label for="zrodlo">źródło artykułu</label>
	                        <input name="zrodlo" id="zrodlo" value="<?= $this->data['zrodlo']; ?>" type="text">
	                    </div>

	                    <div class="form-field">
	                        <label for="tagi">tagi (każdy tag oddzielony przecinkiem lub srednikiem)</label>
	                        <textarea name="tagi" id="tagi"><?= $this->data['tagi']; ?></textarea>
	                    </div>

	                    <div class="form-field form-field-checkbox">
	                        <label for="dostep">
	                        	<input type="checkbox" name='dostep' id='dostep' value='1'> Ograniczony dostęp do artykułu
	                        </label>
	                    </div>
	                    <div class="form-field">
	                    	<div class="image-input">
	                    		<input type="hidden" name='slider' value='1'>
	                    		<span>Dodaj zdjęcie w formacie jpg lub png o szerokości minimalnej 750px</span>
	                    		<input type="file" name='image_upload' id='image_upload' data-minwidth='750' data-proportion='1' data-proportionx='3' data-proportiony='2' accept=".png, .jpg, .jpeg">
	                    	</div>
	                    	<!-- <p class="info">W związku z możliwością dodawania artykułów do slidera, aby zachować spójność zdjęcie będzie automatycznie przycinane do proporcji 3/2. Optymalny rozmiar obrazka to <strong>750x500 pikseli</strong></p> -->
	                    	<div id="image-error"></div>
	                    	<div id="image-prev"></div>
	                    </div>

						<br><br>
	                    <div><a href="<?= BASE; ?>admin_artykuly/widok" class="page-action-link"><i class="icon-wroc"></i> Wróć do listy artykułów</a> <button name="add" class="or-btn or-link" value="1">Zapisz</button></div>
	                </form>
                </div>

			</div>
		</div>
	</div>
</div>