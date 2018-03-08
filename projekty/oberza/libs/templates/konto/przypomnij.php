<div class="ctn1360">
    <div class="row">
        <!-- lewa kolumna -->
        <div class="col-sm-2"></div>
        <!-- END lewa kolumna -->

        <!-- prawa kolumna -->
        <div class="col-sm-8">
            <!-- opcje sortowania -->
            <section class="list-options row">
                <?php require TEMPLATE_DIR . '_elements/_breadcrumbs.php'; ?>
            </section>
            <!-- END opcje sortowania -->

            <section class="contact">
                <h2 class='section-title'><span><strong>PRZYPOMNIENIENIE HASŁA</strong></span></h2>
                
                <!-- info error i success -->
                <?php //require 'templates/elements/_komunikat_error.php'; ?>
                <?php //require 'templates/elements/_komunikat_sukces.php'; ?>
                <!-- END info error i success -->

                <?php if( Error::getMessageItem( 'error_action_model' ) ) : ?>
                    <div class="system-info system-info-error">
                        <div>
                            <?= Error::getMessageItem( 'error_action_model' )['message']; ?>
                        </div>
                        <i class='icon-cancel-circled'></i>
                    </div>
                <?php endif; ?>

                <?php if( $_SESSION['reset-success'] ) : ?>
                    <div class="system-info system-info-success">
                        <div><?= $this->data['dictionary'][9]['pl']; ?></div>
                        <i class='icon-cancel-circled'></i>
                    </div>
                    <?php //unset( $_SESSION['reset-success'] ); ?>
                <?php endif; ?>
                
                <div class="form-wrap">

                    <!-- nowe konto -->
                        <form action="<?= BASE . $this->controller_name . '/' . $this->action_name; ?>" method='post' class='form new-account'>
                            <p>Poniżej podaj mail, na który ma zostać wysłany nowy link aktywacyjny do konta użytkownika.</p>
                            <table>
                                <!-- jeśli pojawia się error dodajemy do tr klasę validate-error-tr oraz span pod inputem klasy validate-error -->
                                <tr>
                                    <td class="label"><label for="email">E-mail</label></td>
                                    <td class="input">
                                    	<?php $value = ( Error::getMessageItem( 'error_action_model' ) ) ? Helper::clearInput( $_POST['email'] ) : ''; ?>
                                        <input type="text" required name='email' autocomplete="off" id='email' value='<?= $value; ?>'>
                                        <!-- <span class='validate-error'><i class="icon-cancel-circled"></i>wypełnij poprawnie pole login</span> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button name='remind-send' value='1'>WYŚLIJ</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    <!-- END nowe konto -->

                    <!-- jakieś kontakty -->
                    <div class="row contact-box">
                        <div class="col-sm-3">
                            <p><strong>Kontakt telefoniczny</strong></p>
                            <p>Wiesław Wszywka</p>
                            <p>22 852 22 22</p>
                            <p>658 223 322</p>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3">
                            <p><strong>Adres do korespondencji</strong></p>
                            <p>Riposta</p>
                            <p>ul. Dolna 21B/40</p>
                            <p>00-037 Warszawa</p>
                        </div>
                    </div>
                    <!-- END jakieś kontakty -->
                </div>

            </section>

        </div>
        <!-- END prawa kolumna -->

    </div>

</div>