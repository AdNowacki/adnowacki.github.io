<?php
    Helper::infoSystem( [ 'type' => 'success', 'index' => 'login_success', 'message' => $this->data['dictionary'][23][LANG] ] );
    Helper::infoSystem( [ 'type' => 'success', 'index' => I_SUCCESS, 'message' => $_SESSION[I_SUCCESS] ] );
    Helper::infoSystem( [ 'type' => 'error', 'index' => I_ERROR, 'message' => $_SESSION[I_ERROR] ] );
    Helper::infoSystem( [ 'type' => 'info', 'index' => I_INFO, 'message' => $_SESSION[I_INFO] ] );
?>
        
<?php require 'libs/templates/_elements/_page_nav.php'; ?>
<!-- nawigacja -->


<section id="page">
    <?php require 'libs/templates/_elements/_page_nav_static.php'; ?>

    <div class="page">
        <div class="page-image">
            <img src="<?= BASE; ?>public/images/galeria-bg.jpg" alt="">
        </div>
        <h1 class="page-image-title"><?= $this->data['dictionary_page'][39][LANG]; ?></h1>
    </div>

    <div class="page-ctn page-ctn-center">
        <div class="bs container">

            <div class="row">
                <div class="col-sm-12 grid-gallery-ctn">
                    <?php if( $this->data['galeria'] ) : ?>
                        <div class="grid-gallery-txt">
                            <?php foreach( $this->data['galeria'] as $aData ) : ?>
                                <figure>
                                    <figcaption><?= $aData['tytul_' . LANG]; ?></figcaption>
                                    <a href="<?= BASE; ?>userfiles/images/galeria/<?= $aData['image']; ?>" class='lightbox'><img src="<?= BASE; ?>userfiles/images/galeria/<?= $aData['image']; ?>" alt=""></a>
                                </figure>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>  
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="booking-black">
        <?php require 'libs/templates/_elements/_booking_form.php'; ?>
    </div>
</section>

<?php require 'libs/templates/_elements/_page_footer.php'; ?>