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

    <?php require 'libs/templates/_elements/_page_nav.php'; ?>

    <section id="page">
        <?php require 'libs/templates/_elements/_page_nav_static.php'; ?>

        <?php if( $this->data['room'] ) : ?>
            <div class="page">
                <div class="page-image">
                    <img src="<?= BASE; ?>public/images/<?= $this->data['room']['short_link']; ?>.jpg" alt="">
                </div>
                <h1 class="page-image-title"><?= $this->data['room']['tytul_' . LANG]; ?></h1>
            </div>

            <div class="page-ctn page-ctn-room">
                <div class="bs container">
                    <?= preg_replace("/{{__BASE__}}/", BASE, $this->data['room']['tresc_' . LANG] ); ?>
                </div>
            </div>
            <div class="booking-black">
                <?php require 'libs/templates/_elements/_booking_form.php'; ?>
            </div>
        <?php endif; ?>
    </section>


<?php require 'libs/templates/_elements/_page_footer.php'; ?>