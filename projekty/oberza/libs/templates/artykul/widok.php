
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
        <button class="close-btn"><i class="icon-cancel-circled-outline"></i></button>
    </div>
<?php endif; ?>


<div class="row">
    <!-- lewa strona -->
    <div class="col-sm-8 left-s-ctn article-show">
        <?php if( $this->data['artykul'] ) : ?>
            <h1><?= $this->data['artykul']['tytul_' . LANG]; ?> </h1>
            <span class="article-date"><?= $this->data['dictionary'][66][LANG]; ?> <?= $this->data['artykul']['data']; ?> | 
                <?php if( $this->data['kategorie'] ) : ?>
                    <?php foreach( $this->data['kategorie'] as $aData ) : ?>
                        <a href="<?= BASE; ?>artykuly/kategoria/<?= $aData['KID']; ?>/<?= $aData['nazwa_' . LANG]; ?>"><?= $aData['nazwa_' . LANG]; ?></a> ,
                    <?php endforeach; ?>
                <?php endif; ?>
            </span>
            <div class="article-ctn">
            	<?php if( @file_get_contents( 'userfiles/images/artykuly/' . $this->data['artykul']['image'] ) ) : ?>
                	<figure><img src="<?= BASE; ?>userfiles/images/artykuly/<?= $this->data['artykul']['image']; ?>" alt=""></figure>
            	<?php endif; ?>
                <div class="article-ctn-txt">
                    <div class="article-ctn-short">
                        <?= $this->data['artykul']['zajawka_' . LANG]; ?>
                    </div>
                </div>
                <?php if( $this->data['artykul']['ograniczony_dostep'] == 1 && !$_COOKIE[COOKIES_ARTICLE_ACCESS] ) : ?>
                    <div class="allow-form">
                        <form method='post'>
                            <p>
                                <?= $this->data['dictionary'][67][LANG]; ?>
                                <div class="email-input">
                                    <input type="email" name='email-article' required placeholder='<?= $this->data['dictionary'][61][LANG]; ?>'>
                                    <button name='send-btn-email' value='1'><?= $this->data['dictionary'][68][LANG]; ?></button>
                                </div>
                                <?php /*
                                <strong>NOWI UŻYTKOWNICY</strong> mogą uzyskać bezpłatny dostęp do artykułów <br>
                                i mozliwość ich komentowania, zamawiając <strong>SUBSKRYPCJĘ</strong> naszego e-biuletynu.
                                */ ?>
                            </p>
                            <?php /* <div class="link-group no-margin-b"><a href="wydarzenie/widok/1" class="more">Zamów subskrycję</a></div> */ ?>
                        </form>
                    </div>
                <?php else : ?>
                    <div class="article-ctn-txt">
                        <div class="article-ctn-long">
                            <?= $this->data['artykul']['tresc_' . LANG]; ?>
                        </div>
                        <?php if( $this->data['artykul']['issue'] && $_COOKIE[COOKIES_ARTICLE_ACCESS] ) : ?>
                            <div class="issue-link">
                                <a href="<?= $this->data['artykul']['issue']; ?>" target='_blank'><?= $this->data['dictionary'][69][LANG]; ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="sources">
            	<?php if( $this->data['artykul']['zrodlo'] ) : ?>
                	<h4 class="source"><?= $this->data['dictionary'][71][LANG]; ?> <em><?= $this->data['artykul']['zrodlo']; ?></em></h4>
            	<?php endif; ?>
                <div class="row">
    	               <div class="col-sm-8 tags">
                    <?php if( $this->data['tagi'] ) : ?>
    	                    <h5><?= $this->data['dictionary'][72][LANG]; ?></h5>
    	                    <?php foreach( $this->data['tagi'] as $aData ) : ?>
    	                    	<a href="<?= BASE; ?>artykuly/tag/?t=<?= trim( $aData ); ?>">#<?= trim( $aData ); ?></a>
    	                	<?php endforeach; ?>
                    <?php endif; ?>
    	            </div>
                    <div class="col-sm-4 share">
                        <div class="fb-share-button" data-href="<?= BASE; ?>artykul/widok/<?= Routing::$routing['param']; ?>" data-layout="button_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Udostępnij</a></div>
                    </div>
                </div>
            </div>
            
            <?php if( $this->data['powiazane'] ) : ?>
                <div class="row linked">
                    <div class="col-xs-12">
                        <h3 class='title-lines title-lines-page'>
                            <span><?= $this->data['dictionary'][70][LANG]; ?></span>
                        </h3>
                    </div>
                    <div class="row">
                        <?php $k = 0; ?>
                        <?php foreach( $this->data['powiazane'] as $apData ) : ?>
                            <?php if( $k >= 2 ) break; ?>
                            <div class="col-sm-6">
                                <div class="article-i article-item article-i-link article-item-box article-i-sim">
                                    <div class="article-title">
                                        <h2><?= $apData['tytul_' . LANG]; ?></h2>
                                        <?php /* <p><?= $apData['zajawka_' . LANG]; ?></p> */ ?>
                                        <span><?= $apData['data']; ?></span>
                                    </div>
                                    <?php if( @file_get_contents( 'userfiles/images/artykuly/' . $apData['image'] ) ) : ?>
                                        <?php $imgClass = Helper::imageOrientation( 'userfiles/images/artykuly/' . $apData['image'] ); ?>
                                        <img src="<?= BASE; ?>userfiles/images/artykuly/<?= $apData['image']; ?>" <?= $imgClass; ?> alt="">
                                    <?php else : ?>
                                        <div class="no-image"></div>
                                    <?php endif; ?>
                                    <!-- <h4 class="category-title">SEC&amp;Tech</h4> -->
                                    <a href="<?= BASE; ?>artykul/widok/<?= $apData['AID']; ?>/<?= Helper::uri_string( $apData['tytul_' . LANG] ); ?>"></a>
                                </div>
                            </div>
                            <?php $k++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
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