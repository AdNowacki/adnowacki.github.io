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
        <h1><?= $this->data['dictionary'][81][LANG]; ?> <em><?= $this->data['kategoria']['nazwa_' . LANG]; ?></em></h1>
        <span class="article-date">&nbsp;</span>
        <?php if( $this->data['artykuly'] ) : ?>
            <?php foreach( $this->data['artykuly'] as $aData ) : ?>
                <!-- artykuły horyzontalne -->
                <div class="col-sm-12 article-item article-item-scale article-item-horizontal">
                    <div class="article-i article-i-scale row">
                        <div class="col-sm-6">
                            <?php if( @file_get_contents( 'userfiles/images/artykuly/' . $aData['image'] ) ) : ?>
                                <img src="<?= BASE; ?>userfiles/images/artykuly/<?= $aData['image']; ?>" alt="">
                            <?php else : ?>
                                <div class="no-image"></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6 article-txt">
                            <div class="article-title">
                                <br><br>
                                <span><?= $aData['data']; ?></span>
                                <h2><?= $aData['tytul_' . LANG]; ?></h2>
                                <p><?= mb_substr( $aData['zajawka_' . LANG], 0, 300, 'utf-8'); ?></p>
                            </div>
                        </div>
                        <div class="link-group">
                            <span class="more"><?= $this->data['dictionary'][64][LANG]; ?></span>
                        </div>
                        <a href="<?= BASE; ?>artykul/widok/<?= $aData['id']; ?>/<?= explode( '.' , $aData['image'] )[0]; ?>"></a>
                    </div>
                    <?php /* <h4 class="category-title">SEC&Tech</h4> */ ?>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <?php require 'libs/templates/_elements/_no_data.php'; ?>
        <?php endif; ?>
        
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