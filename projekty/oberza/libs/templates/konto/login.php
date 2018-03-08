<div class="ctn1360">
    <div class="row">

        <div class="col-xs-2"></div>

        <!-- prawa kolumna -->
        <div class="col-sm-8">
            <!-- opcje sortowania -->
            <section class="list-options row">
                <?php require TEMPLATE_DIR . '_elements/_breadcrumbs.php'; ?>
            </section>
            <!-- END opcje sortowania -->

            <section class="contact">
                <h2 class='section-title'><span><strong>ZALOGUJ SIĘ</strong></span></h2>
                
                <!-- info error i success -->
                <?php //require TEMPLATE_DIR . '_elements/_komunikat_error.php'; ?>
                <?php //require TEMPLATE_DIR . '_elements/_komunikat_sukces.php'; ?>
                <!-- END info error i success -->

                <!-- info error i success -->
                <?php if( Error::getMessageItem( 'error_action_model' ) ) : ?>
                    <div class="system-info system-info-error">
                        <div>
                            <?= Error::getMessageItem( 'error_action_model' )['message']; ?>
                        </div>
                        <i class='icon-cancel-circled'></i>
                    </div>
                <?php endif; ?>
                <!-- END info error i success -->

                <?php if( $_SESSION['logout-success'] ) : ?>
                    <div class="system-info system-info-success">
                        <div>
                            <?= $this->data['dictionary'][7]['pl']; ?>
                        </div>
                        <i class='icon-cancel-circled'></i>
                    </div>
                    <?php unset( $_SESSION['logout-success'] ); ?>
                <?php endif; ?>

                <?php if( $_SESSION['new-pass-success'] ) : ?>
                    <div class="system-info system-info-success">
                        <div>
                            <?= $this->data['dictionary'][8]['pl']; ?>
                        </div>
                        <i class='icon-cancel-circled'></i>
                    </div>
                    <?php unset( $_SESSION['new-pass-success'] ); ?>
                <?php endif; ?>

                <div class="row form-wrap">
                    <!-- formularz logowania -->
                    <div class="col-sm-6">
                        <form class='form' method='post' action='<?= BASE . $this->controller_name . '/' . $this->action_name; ?>'>
                            <table>
                                <!-- jeśli pojawia się error dodajemy do tr klasę validate-error-tr oraz span pod inputem klasy validate-error -->
                                <tr <?php if( Error::getMessageItem( 'error_action_model' )['code'] == 4007 ) echo "class='validate-error-tr'"; ?>>
                                    <td class="label"><label for="login">Login</label></td>
                                    <td class="input">
                                        <?php 
                                            $this->postLogin = ( Error::getMessageItem( 'error_action_model' )['code'] == 4007 || Error::getMessageItem( 'error_action_model' )['code'] == 4009 ) ? Helper::clearInput( $_POST['login'] ) : NULL;
                                        ?>
                                        <input type="text" name='login' required id='login' value='<?= $this->postLogin; ?>'>
                                        <?php if( Error::getMessageItem( 'error_action_model' )['code'] == 4007 ) : ?>
                                            <span class='validate-error'><i class="icon-cancel-circled"></i>wypełnij poprawnie pole login</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr <?php if( Error::getMessageItem( 'error_action_model' )['code'] == 4008 ) echo "class='validate-error-tr'"; ?>>
                                    <td class="label"><label for="haslo">Hasło</label></td>
                                    <td class="input">
                                        <input type="password" required name='haslo' id='haslo'>
                                        <?php if( Error::getMessageItem( 'error_action_model' )['code'] == 4008 ) : ?>
                                            <span class='validate-error'><i class="icon-cancel-circled"></i>wypełnij poprawnie pole hasło</span>
                                        <?php endif; ?>
                                        <a href="<?= BASE; ?>konto/przypomnij" class='form-link'>Zapomniałem hasła</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <button name='login-send' value='1'>ZALOGUJ</button>
                                    </td>
                                </tr>
                            </table>
                            <?php if( isset( $_GET['r'] ) ) : ?>
                                <input type="hidden" name='redirect' value='<?= $_SERVER['HTTP_REFERER']; ?>'>
                            <?php endif; ?>
                        </form>
                        <p>Zalogowanie oznacza akceptację <a href="#" class='regulations'>Regulaminu Iveco Store</a> w aktualnym brzmieniu.</p>
                    </div>
                    <!-- END formularz logowania -->
                    <!-- nowy dealer link -->
                    <div class="col-sm-6 new-dealer-link">
                        <p>Jesteś Dealerem Iveco i nie masz dostępu do serwisu?</p>
                        <p><a href="#">Skontaktuj</a> się z nami!</p>
                    </div>
                    <!-- END nowy dealer link -->
                </div>

            </section>

        </div>
        <!-- END prawa kolumna -->

    </div>

</div>