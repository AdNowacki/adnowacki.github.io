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
		<h1>Witaj <?= $this->data['user_log']['imie']; ?> <?= $this->data['user_log']['nazwisko']; ?> w panelu administracyjnym</h1>
		<div class="row">
			<div class="wctn row" style='text-align: center;'>
				<div class="dashboard">	
						
						<div class="dashboard-item">
							<h4>Zdjęcia w galerii</h4>
							<div class="dashboard-stat">
								<p class="all-items">
									<span class='dashboard-label'>wszystkich</span>
									<span class='dashboard-value'><?= $this->data['galerie_total']['_TOTAL_']; ?></span>
								</p>
								<p class="non-active-items">
									<span class='dashboard-label'>nieaktywnych</span>
									<span class='dashboard-value'><?= $this->data['galerie_total']['_TOTAL_NON_ACTIVE_']; ?></span>
								</p>
								<a href="<?= BASE; ?>admin_galeria">zobacz</a>
							</div>
						</div>

				</div>
			</div>
		</div>
	</div>
</div>
