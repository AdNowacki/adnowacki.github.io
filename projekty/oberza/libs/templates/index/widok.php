<?php
    Helper::infoSystem( [ 'type' => 'success', 'index' => 'login_success', 'message' => $this->data['dictionary'][23][LANG] ] );
    // Helper::infoSystem( [ 'type' => 'success', 'index' => I_SUCCESS, 'message' => $_SESSION[I_SUCCESS] ] );
    Helper::infoSystem( [ 'type' => 'error', 'index' => I_ERROR, 'message' => $_SESSION[I_ERROR] ] );
    Helper::infoSystem( [ 'type' => 'info', 'index' => I_INFO, 'message' => $_SESSION[I_INFO] ] );
?>

<!-- więcej -->
<section class="more-details">
    <button id="ctn-close"><?= strtoupper( $this->data['dictionary_page'][21][LANG] ); ?></button>
    <div class="more-details-top"></div>
    <div class="more-details-bottom"></div>
    <div class="more-details-ctn">
        <div class="more-details-ctn-item" data-detail-item='1'>
            <h2><?= $this->data['dictionary_page'][22][LANG]; ?></h2>
            <?= $this->data['dictionary_page'][23][LANG]; ?>
        </div>

        <div class="more-details-ctn-item" data-detail-item='2'>
            <h2><?= $this->data['dictionary_page'][24][LANG]; ?></h2>
            <?= $this->data['dictionary_page'][25][LANG]; ?>
        </div>

        <div class="more-details-ctn-item" data-detail-item='3'>
            <h2><?= $this->data['dictionary_page'][26][LANG]; ?></h2>
            <?= $this->data['dictionary_page'][27][LANG]; ?>
        </div>
    </div>
</section>
<!-- więcej end -->
<!-- secret -->

<div class="secret-ctn">
    <button id='sformbtn'><?= $this->data['dictionary_page'][28][LANG]; ?></button>
    <form method="post" id='sform' <?php if( $this->data['error'] || $_SESSION[I_SUCCESS] ) echo "class='open'"; ?>>
        <button id="sclose"><img src="<?= BASE; ?>public/images/close-ico.svg" alt=""></button>
        <p class='stitle'>SECRET DEAL</p>
        <?php if( $this->data['error'] ) : ?>
            <p class="sdescription" style='color: #c91818;'><?= $this->data['error']; ?></p>
        <?php endif; ?>
        <?php if( $_SESSION[I_SUCCESS] ) : ?>
            <p class="sdescription" style='color: #23c03d;'><?= $_SESSION[I_SUCCESS]; ?></p>
            <?php unset( $_SESSION[I_SUCCESS] ); ?>
        <?php endif; ?>
        <p class='sdescription'>
            <em><?= $this->data['dictionary_page'][29][LANG]; ?></em>
        </p>
        <input type="email" name='email' value='<?= $this->data['email']; ?>' placeholder='<?= $this->data['dictionary_page'][30][LANG]; ?>'>
        <input type="text" autocomplete='off' name='data-start' value='<?= $this->data['start']; ?>' placeholder='<?= $this->data['dictionary_page'][31][LANG]; ?>' data-toggle="datepicker">
        <input type="text" autocomplete='off' name='data-stop' value='<?= $this->data['stop']; ?>' placeholder='<?= $this->data['dictionary_page'][32][LANG]; ?>' data-toggle="datepicker">
        <button name='send_secret' value='1'>Wyslij</button>
    </form>
    
</div>
<!-- secret end -->

<!-- nawigacja -->
<nav id='nav'>
    <a href="#booking" class='booking_link'><?= $this->data['dictionary_page'][7][LANG]; ?></a>
    <?php /*
    <span class='lang'>
        <button class='lang_link_active'>PL <img src="<?= BASE; ?>public/images/scroll.svg"></button>
        <a href="#" class='lang_link'>EN</a>
    </span>
    */?>

    <span class='lang'>
        <button class='lang_link_active'><?= strtoupper( LANG ); ?> <img src="<?= BASE; ?>public/images/scroll.svg"></button>
        <?php 
            $link = Routing::$routing['controller'] . '/' . Routing::$routing['action']; 
            $link .= ( Routing::$routing['param'] ) ? '/' . Routing::$routing['param'] : '';
        ?>
        <?php if( LANG == 'pl' ) : ?>
            <a href="<?= BASE . $link . '?lang=en'; ?>" class='lang_link'>EN</a>
        <?php else : ?>
            <a href="<?= BASE . $link . '?lang=pl'; ?>" class='lang_link'>PL</a>
        <?php endif; ?>
    </span>
    
    <a href="#" class='menu-link' id='menunav' data-open='<?= strtoupper( $this->data['dictionary_page'][20][LANG] ); ?>' data-close='<?= strtoupper( $this->data['dictionary_page'][21][LANG] ); ?>'><span><?= $this->data['dictionary_page'][20][LANG]; ?></span> <i></i><i class="close-ico"></i></a>
</nav>

<?php require 'libs/templates/_elements/_page_nav.php'; ?>
<!-- nawigacja -->

<ul id="dots">
    <li data-menuanchor="home"><a href="#home"></a></li>
    <li data-menuanchor="hotel"><a href="#hotel"></a></li>
    <li data-menuanchor="kazimierz"><a href="#kazimierz"></a></li>
    <li data-menuanchor="krakow"><a href="#krakow"></a></li>
    <li data-menuanchor="booking"><a href="#booking"></a></li>
</ul>
<div class="scroll-info">
    <?= $this->data['dictionary_page'][33][LANG]; ?>
    <button><img src="<?= BASE; ?>public/images/scroll.svg" alt=""></button>
</div>
<section id="fullpage">
    <!-- page 1 -->
    <div class="fp-section" id='section0' data-index='1'>
        <figure class="i-anim">
            <canvas width='100%' height='100%' id='ctx1'></canvas>
            <div class="section-title">
                <?= $this->data['dictionary_page'][34][LANG]; ?>
            </div>
<!--                     <picture>
                <source media="(max-width: 960px)" srcset="public/images/image-bg-1-mobile.jpg">
                <source media="(min-width: 960px)" srcset="public/images/image-bg-1.jpg">
                <img src="<?= BASE; ?>public/images/image-bg-1.jpg" id='move-bg-1' class='anim-image'>
            </picture>  -->
        </figure>
    </div>

    <!-- page 2 -->
    <div class="fp-section" id='section1' data-index='2'>
        <figure class="i-anim">
            <canvas width='100%' height='100%' id='ctx2'></canvas>
            <div class="section-title">
                <?= $this->data['dictionary_page'][35][LANG]; ?>
                <div class="more">
                    <a href="#" class='show-content' data-ctn='1'><?= $this->data['dictionary_page'][38][LANG]; ?> <span><img src="<?= BASE; ?>public/images/scroll.svg" alt=""></span></a>
                </div>
            </div>
        </figure>
    </div>

    <!-- page 3 -->
    <div class="fp-section" id='section2' data-index='3'>
        <figure class="i-anim">
            <canvas width='100%' height='100%' id='ctx3'></canvas>
            <div class="section-title">
                <?= $this->data['dictionary_page'][36][LANG]; ?>
                <div class="more">
                    <a href="#" class='show-content' data-ctn='2'><?= $this->data['dictionary_page'][38][LANG]; ?> <span><img src="<?= BASE; ?>public/images/scroll.svg" alt=""></span></a>
                </div>
            </div>
        </figure>
    </div>

    <!-- page 4 -->
    <div class="fp-section" id='section3' data-index='4'>
        <figure class="i-anim">
            <canvas width='100%' height='100%' id='ctx4'></canvas>
            <div class="section-title">
                <?= $this->data['dictionary_page'][37][LANG]; ?>
                <div class="more">
                    <a href="#" class='show-content' data-ctn='3'><?= $this->data['dictionary_page'][38][LANG]; ?> <span><img src="<?= BASE; ?>public/images/scroll.svg" alt=""></span></a>
                </div>
            </div>
        </figure>
    </div>

    <!-- page 5 -->
    <div class="fp-section" id='section4' data-index='5'>
        <figure class="i-anim">
            <canvas width='100%' height='100%' id='ctx5'></canvas>
            <div class="section-title">
                <?php require 'libs/templates/_elements/_booking_form_mainpage.php'; ?>
            </div>
        </figure>
    </div>

</section>