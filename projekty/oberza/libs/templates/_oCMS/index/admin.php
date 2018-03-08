<!-- slider -->
<!-- END slider -->

<div class="ctn1360">

    <?php if( $_SESSION['change_password'] ) : ?>
        <div class="system-info system-info-success system-info-100">
            <div>
                <p><?= $_SESSION['change_password']; ?></p>
            </div>
            <button class="close-btn"></button>
        </div>
        <?php unset( $_SESSION['change_password'] ); ?>
    <?php endif; ?>


    <div class="row">
        <div class="col-sm-12 mm">
            <form class='user-form user-form-admin' method='post' action='<?= BASE . $this->controller_name . '/' . $this->action_name; ?>'>
                <div class="bord bt"></div>
                <div class="bord br"></div>
                <div class="bord bb"></div>
                <div class="bord bl"></div>
                <h1>
                    <span id='l1'>O</span><span id='l2'>!</span><span id='l3'>C</span><span id='l4'>M</span><span id='l5'>S</span>
                    <img src="<?= BASE; ?>public/images/a1.png" id='a1' alt="">
                    <img src="<?= BASE; ?>public/images/a2.png" id='a2' alt="">
                    <?php /*
                    <img src="<?= BASE; ?>public/images/sas.png" style='display: block; opacity: 1; height: 50px;' alt="">
                    */ ?>
                </h1>
                <h3><?= $this->data['dictionary'][2][LANG]; ?></h3>
                <?php 
                	$this->postLogin = ( Error::getMessageItem( 'error_action_model' )['code'] == 4007 || Error::getMessageItem( 'error_action_model' )['code'] == 4009 ) ? Helper::clearInput( $_POST['login'] ) : NULL; 
                ?>
                <input type="text" name='login' required id='login' value='<?= $this->postLogin; ?>' placeholder='<?= $this->data['dictionary'][3][LANG]; ?>'>
                <input type="password" required name='haslo' id='haslo' autocomplete="off" placeholder='<?= $this->data['dictionary'][4][LANG]; ?>'>
                <!-- komunikat błędu -->
                <?php if( Error::getMessageItem( 'error_action_model' ) ) : ?>
                    <div class="user-fm">
                        <?= Error::getMessageItem( 'error_action_model' )['message']; ?>
                    </div>
                <?php endif; ?>
                <?php if( $_SESSION['error'] ) : ?>
                    <div class="user-fm">
                        <?= $_SESSION['error']; ?>
                    </div>
                    <?php unset( $_SESSION['error'] ); ?>
                <?php endif; ?>
                <?php if( $_SESSION['success'] ) : ?>
                    <div class="user-fm">
                        <?= $_SESSION['success']; ?>
                    </div>
                    <?php unset( $_SESSION['info_success'] ); ?>
                <?php endif; ?>
                <!-- komunikat błędu -->
                <button name='login-send' class='g-btn' value='1'><?= $this->data['dictionary'][5][LANG]; ?></button>
                <?php if( isset( $_GET['r'] ) ) : ?>
                    <input type="hidden" name='redirect' value='<?= $_SERVER['HTTP_REFERER']; ?>'>
                <?php endif; ?>
            </form>
        </div>
        <!-- END lewa kolumna -->



    </div>


</div>


