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
            <img src="<?= BASE; ?>public/images/uslugi-bg.jpg" alt="">
        </div>
        <h1 class="page-image-title"><?= $this->data['dictionary_page'][46][LANG]; ?></h1>
    </div>

    <div class="page-ctn">
        <div class="bs container">

            <div class="row">
                <div class="col-sm-12 col-space">
                    <h2><?= $this->data['dictionary_page'][47][LANG]; ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-space">
                    <figure class="uimage"><img src="<?= BASE; ?>public/images/uslugi_1.jpg" alt=""></figure>
                </div>
                <div class="col-md-6 col-space">
                    <p>
                        <?= $this->data['dictionary_page'][48][LANG]; ?>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-space">
                    <h2 class='t-right'><?= $this->data['dictionary_page'][49][LANG]; ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-space">
                    <p class='t-right'>
                        <?= $this->data['dictionary_page'][50][LANG]; ?>
                    </p>
                </div>
                <div class="col-md-6 col-space">
                    <figure class="uimage"><img src="<?= BASE; ?>public/images/uslugi_2.jpg" alt=""></figure>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-space">
                    <h2><?= $this->data['dictionary_page'][51][LANG]; ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-space">
                    <figure class="uimage"><img src="<?= BASE; ?>public/images/uslugi_3.jpg" alt=""></figure>
                </div>
                <div class="col-md-6 col-space">
                    <p>
                        <?= $this->data['dictionary_page'][52][LANG]; ?>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 col-space">
                    <h2 class='t-right nlp'><?= $this->data['dictionary_page'][53][LANG]; ?></h2>
                    <p class="t-right"><?= $this->data['dictionary_page'][54][LANG]; ?></p>
                </div>
                <div class="col-md-2 col-space"></div>
                <div class="col-md-5 col-space">
                    <h2 class='t-right nlp'><?= $this->data['dictionary_page'][55][LANG]; ?></h2>
                    <p class="t-right"><?= $this->data['dictionary_page'][56][LANG]; ?></p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <p class='t-center'><?= preg_replace( "/{{LINK}}/", $this->data['dictionary_page'][90][LANG], $this->data['dictionary_page'][57][LANG] ) ; ?></p>
                </div>
            </div>

        </div>
    </div>
    <div class="booking-black">
        <?php require 'libs/templates/_elements/_booking_form.php'; ?>
    </div>
</section>
<?php require 'libs/templates/_elements/_page_footer.php'; ?>