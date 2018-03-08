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

<div class="row">
    <!-- lewa strona -->
    
    <div class="col-sm-8 left-s-ctn article-show">
        <h1 style='font-size: 25px;'><?= $this->data['dictionary'][89][LANG]; ?> <em><?= $this->data['search']; ?></em> (<?= $res = ( count( $this->data['results'] ) > 0 ) ? count( $this->data['results'] ) : 0; ?>)</h1>
        <span class="article-date">&nbsp;</span>
        <!-- wydarzenia -->
        <?php $page = Helper::pagination( array( 'current' => (int)$_GET['p'], 'allpages' => ceil( $this->data['TOTAL'] / PERPAGE ) ) ); ?>
        <?php if( $this->data['results'] ) : ?>
            <div class="row events">
                <?php foreach( $this->data['results'] as $aData ) : ?>
                    <div class="event-i event-i-results">
                        <span class="results-category"><?= strtoupper( $aData['_TYPE_LINK_'] ); ?></span>
                        <div class="col-sm-12 e-txt results">
                            <p class="e-title e-results-title"><?= $aData['tytul_' . LANG]; ?></p>
                            <div class="e-ctn e-results-content"><?= strip_tags( $aData['zajawka_' . LANG] ); ?></div>

                            <div class="link-group">
                                <a href="<?= BASE; ?><?= $aData['_TYPE_LINK_']; ?>/widok/<?= $aData['id']; ?>/<?= Helper::uri_string( $aData['tytul_' . LANG] ); ?>" class='more'><?= $this->data['dictionary'][90][LANG]; ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- ! wydarzenia -->
        <?php else : ?>
            <?php require 'libs/templates/_elements/_no_data.php'; ?>
        <?php endif; ?>

        <?php $page = Helper::pagination( array( 'current' => (int)$_GET['p'], 'allpages' => ceil( $this->data['TOTAL'] / PERPAGE ) ) ); ?>
        <div class="row">
            <?= $page; ?>
        </div>

    </div>
    <!-- ! lewa strona -->

    <!-- prawa strona -->
    <div class="col-sm-4 right-s-ctn">
        <!-- popularne -->
        <?php require "libs/templates/_elements/mainpage_popular.php"; ?>
        <!-- ! popularne -->

        <!-- reklama 1 -->
        <?php require "libs/templates/_elements/mainpage_advert_1.php"; ?>
        <!-- ! reklama 1 -->

        <!-- sacandas -->
        <?php require "libs/templates/_elements/mainpage_secandas.php"; ?>
        <!-- ! sacandas -->

        <!-- znajdź nas na fb -->
        <?php require "libs/templates/_elements/mainpage_fb.php"; ?>
        <!-- ! znajdź nas na fb -->

        <!-- reklama 2 -->
        <?php require "libs/templates/_elements/mainpage_advert_2.php"; ?>
        <!-- ! reklama 2 -->

        <!-- newsroom -->
        <?php require "libs/templates/_elements/mainpage_newsroom.php"; ?>
        <!-- ! newsroom -->

        <!-- ekspert -->
        <?php require "libs/templates/_elements/mainpage_expert.php"; ?>
        <!-- ! ekspert -->

        <!-- reklama 3 -->
        <?php require "libs/templates/_elements/mainpage_advert_3.php"; ?>
        <!-- ! reklama 3 -->

    </div>
    <!-- ! prawa strona -->
    
</div>