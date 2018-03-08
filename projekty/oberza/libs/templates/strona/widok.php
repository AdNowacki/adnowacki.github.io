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


<h3 class='title-lines title-lines-page title-lines-offset'>
    <span><?= $this->data['strona']['tytul_' . LANG]; ?></span>
</h3>
<div class="row">
    <!-- lewa strona -->
    <div class="col-sm-3">
        <?php if( $this->data['sacandas'] ) : ?>
            <figure class="sacandas">
                <img src="<?= BASE; ?>userfiles/images/online/<?= $this->data['sacandas']['image']; ?>" style='max-width: 100%;' alt="">
            </figure>
        <?php endif; ?>
    </div>
    <!-- ! lewa strona -->

    <!-- prawa strona -->
    <div class="col-sm-9 left-s-ctn article-show">
        <div class="article-ctn no-border subpage">
            <?php if( $this->data['strona'] ) : ?>
                <div class="article-ctn-txt">
                    <div class="article-ctn-long">
                        <?php if( $this->data['strona']['require_file'] ) : ?>
                            <?php
                                $file = @file_get_contents( "libs/templates/_elements/{$this->data['strona']['require_file']}.php" );
                                if( $file ) {
                                    $page = preg_replace( "/{{_FILE_}}/" , $file, $this->data['strona']['tresc_' . LANG] );
                                    $page = preg_replace( "/{{_BASE_}}/" , BASE, $page );
                                    $page = preg_replace( "/{{_PARAM_}}/" , Routing::$routing['param'], $page );
                                    $page = preg_replace( "/{{_DICTIONARY5_}}/" , $this->data['dictionary'][5][LANG], $page );
                                    $page = preg_replace( "/{{_DICTIONARY60_}}/" , $this->data['dictionary'][60][LANG], $page );
                                    $page = preg_replace( "/{{_DICTIONARY61_}}/" , $this->data['dictionary'][61][LANG], $page );
                                    $page = preg_replace( "/{{_DICTIONARY62_}}/" , $this->data['dictionary'][62][LANG], $page );
                                    $page = preg_replace( "/{{_DICTIONARY63_}}/" , $this->data['dictionary'][63][LANG], $page );
                                    echo $page;
                                } else {
                                    echo $this->data['strona']['tresc_' . LANG];
                                }
                            ?>
                        <?php else : ?>
                            <?= $this->data['strona']['tresc_' . LANG]; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else : ?>
                <?php require "libs/templates/_elements/_no_data.php"; ?>
            <?php endif; ?>
        </div>

        
    </div>
    <!-- ! prawa strona -->
    
</div>