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
             <video width="100%" autoplay id='banner-video'>
                <source src="<?= BASE; ?>public/video/resto.mp4" type="video/mp4">
            </video> 
        </div>
        <h1 class="page-image-title"><?= $this->data['dictionary_page'][44][LANG]; ?></h1>
    </div>

    <div class="page-ctn page-ctn-center">
        <div class="bs container">

            <div class="row">
                <div class="col-sm-12">
                    <?= $this->data['dictionary_page'][45][LANG]; ?>
                </div>
                <div class="col-sm-12 grid-gallery-ctn">
                    <div class="grid-gallery">
                        <a href="<?= BASE; ?>public/images/gallery-rest-1-max.jpg" class='lightbox'><img src="<?= BASE; ?>public/images/gallery-rest-1.jpg" alt=""></a>
                        <a href="<?= BASE; ?>public/images/gallery-rest-2-max.jpg" class='lightbox'><img src="<?= BASE; ?>public/images/gallery-rest-2.jpg" alt=""></a>
                        <a href="<?= BASE; ?>public/images/gallery-rest-3-max.jpg" class='lightbox'><img src="<?= BASE; ?>public/images/gallery-rest-3.jpg" alt=""></a>
                        <a href="<?= BASE; ?>public/images/gallery-rest-4-max.jpg" class='lightbox'><img src="<?= BASE; ?>public/images/gallery-rest-4.jpg" alt=""></a>
                        <a href="<?= BASE; ?>public/images/gallery-rest-5-max.jpg" class='lightbox'><img src="<?= BASE; ?>public/images/gallery-rest-5.jpg" alt=""></a>
                        <a href="<?= BASE; ?>public/images/gallery-rest-6-max.jpg" class='lightbox'><img src="<?= BASE; ?>public/images/gallery-rest-6.jpg" alt=""></a>
                        <a href="<?= BASE; ?>public/images/gallery-rest-7-max.jpg" class='lightbox'><img src="<?= BASE; ?>public/images/gallery-rest-7.jpg" alt=""></a>
                        <a href="<?= BASE; ?>public/images/gallery-rest-8-max.jpg" class='lightbox'><img src="<?= BASE; ?>public/images/gallery-rest-8.jpg" alt=""></a>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php /*
    <div class="col-sm-12 slider-page">
        <h2>Nasze<br>wyróżnienia</h2>
    </div>
    */ ?>
    <div class="booking-black">
        <?php require 'libs/templates/_elements/_booking_form.php'; ?>
    </div>
</section>

<?php require 'libs/templates/_elements/_page_footer.php'; ?>