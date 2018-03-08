<div class="ctn1360">
    <div class="row">
        <!-- lewa kolumna -->
        <?php require TEMPLATE_DIR . '_elements/_left-nav.php'; ?>
        <!-- END lewa kolumna -->

        <div class="col-xs-1"></div>

        <!-- prawa kolumna -->
        <div class="col-sm-8">
            <!-- opcje sortowania -->
            <section class="list-options row">
                <?php require TEMPLATE_DIR . '_elements/_breadcrumbs.php'; ?>
            </section>
            <!-- END opcje sortowania -->

            <section class="contact">
                <h2 class='section-title'><span><strong>NOWE HASŁO</strong></span></h2>
                    <?php if( Error::getMessageItem( 'empty_routing_param' ) ) : ?>
                        <div class="system-info system-info-error">
                            <div>
                                <?= Error::getMessageItem( 'empty_routing_param' )['message']; ?>
                            </div>
                            <i class='icon-cancel-circled'></i>
                        </div>
                    <?php elseif( Error::getMessageItem( 'error_action_model' ) ) : ?>
                        <div class="system-info system-info-error">
                            <div>
                                <?= Error::getMessageItem( 'error_action_model' )['message']; ?>
                            </div>
                            <i class='icon-cancel-circled'></i>
                        </div>
                    <?php endif; ?>
                    <?php if( Error::getMessageItem( 'error_action_model' )['code'] != 4009 && !Error::getMessageItem( 'empty_routing_param' ) ) : ?>
                        <div class="form-wrap">
                            <!-- nowe konto -->
                                <form action="<?= BASE . $this->controller_name . '/' . $this->action_name . '/' . $this->param; ?>" class='form new-account' method='post'>
                                    <input type="hidden" name='u' value='<?= $this->data['u']['id']; ?>'>
                                    <p>Ustaw swoje nowe hasło</p>
                                    <table>
                                        <!-- jeśli pojawia się error dodajemy do tr klasę validate-error-tr oraz span pod inputem klasy validate-error -->
                                        <tr>
                                            <td class="label"><label for="new-pass">Hasło</label></td>
                                            <td class="input">
                                                <input type="password" autocomplete="off" required pattern='^[^\s]{1}.{4,}[^\s]{1}$' name='new-pass' id='new-pass'>
                                                <!-- <span class='validate-error'><i class="icon-cancel-circled"></i>wypełnij poprawnie pole login</span> -->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><label for="new-pass-2">Powtórz hasło</label></td>
                                            <td class="input">
                                                <input type="password" autocomplete="off" required pattern='^[^\s]{1}.{4,}[^\s]{1}$' name='new-pass-2' id='new-pass-2'>
                                                <!-- <span class='validate-error'><i class="icon-cancel-circled"></i>wypełnij poprawnie pole hasło</span> -->
                                            </td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>
                                                <button name='new-password-send' value='1'>ZMIEŃ</button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <p>Zalogowanie oznacza akceptację <a href="#" class='regulations'>Regulaminu Iveco Store</a> w aktualnym brzmieniu.</p>
                            <!-- END nowe konto -->
                        </div>
                    <?php endif; ?>
                </section>


        </div>
        <!-- END prawa kolumna -->

    </div>

</div>