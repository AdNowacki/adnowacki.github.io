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
        <h1><?= $this->data['dictionary'][73][LANG]; ?></h1>
        <span class="article-date">&nbsp;</span>
        <div>
            <div class="form-order">
                <form method="post">
                    <div class='input-d'>
                        <input type="text" name='imie' value='<?= $this->data['imie']; ?>' required placeholder='<?= $this->data['dictionary'][74][LANG]; ?>'>
                    </div>
                    <div class='input-d'>
                        <input type="text" name='nazwisko' value='<?= $this->data['nazwisko']; ?>' required placeholder='<?= $this->data['dictionary'][75][LANG]; ?>'>
                    </div>
                    <div class='input-d'>
                        <input type="text" name='email' value='<?= $this->data['email']; ?>' required placeholder='<?= $this->data['dictionary'][76][LANG]; ?>'>
                    </div>
                    <div class='input-d'>
                        <input type="text" name='firma' value='<?= $this->data['firma']; ?>' required placeholder='<?= $this->data['dictionary'][77][LANG]; ?>'>
                    </div>
                    <div class='input-d'>
                        <input type="text" name='stanowisko' value='<?= $this->data['stanowisko']; ?>' required placeholder='<?= $this->data['dictionary'][78][LANG]; ?>'>
                    </div>

                    <div class="checkbox">
                        <label for="zgoda">
                            <input type="checkbox" required id='zgoda' name='zgoda'>
                            <span></span>
                            <?= $this->data['dictionary'][62][LANG]; ?>
                        </label>
                    </div>
                    <div class="btn-form">
                        <button name='send-btn' value='1'><?= $this->data['dictionary'][79][LANG]; ?></button>
                    </div>
                </form>
            </div>
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