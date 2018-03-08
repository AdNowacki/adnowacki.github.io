<div class="ctn1360">
    <div class="row">
        <!-- lewa kolumna -->
        <?php require TEMPLATE_DIR . '_elements/_admin-left-nav.php'; ?>
        <!-- END lewa kolumna -->

        <div class="col-xs-1"></div>

        <!-- prawa kolumna -->
        <div class="col-sm-8">
            <!-- breadcrumbs -->
            <section class="list-options row">
                <?php require TEMPLATE_DIR . '_elements/_breadcrumbs.php'; ?>
            </section>
            <!-- END breadcrumbs -->

            <!-- Formularze usera -->

            <h2 class='section-title'><span><strong>DANE ADMINISTRATORA</strong></span></h2>
                
                <!-- info error i success -->
                <?php //require TEMPLATE_DIR . '_elements/_komunikat_error.php'; ?>
                <?php //require TEMPLATE_DIR . '_elements/_komunikat_sukces.php'; ?>
                <!-- END info error i success -->
                <?php if( $_SESSION['login_success'] ) : ?>
                    <div class="system-info system-info-success">
                        <div>
                            <p><?= $this->data['dictionary'][10]['pl']; ?></p>
                        </div>
                        <i class='icon-ok-circled'></i>
                    </div>
                    <?php unset( $_SESSION['login_success'] ); ?>
                <?php endif; ?>

                <?php if( $_SESSION['activate_account_success'] ) : ?>
                    <div class="system-info system-info-success">
                        <div>
                            <p><?= $this->data['dictionary'][11]['pl']; ?></p>
                        </div>
                        <i class='icon-ok-circled'></i>
                    </div>
                    <?php unset( $_SESSION['activate_account_success'] ); ?>
                <?php endif; ?>

                
                
                <div class="form-wrap">
                    <!-- edycja głównej placówki -->
                        <form action="<?= BASE . $this->controller_name . '/' . $this->action_name; ?>" class='form admin-form noborder' method='post'>
                            <table>
                                <tr>
                                    <th colspan='4'>Dane dealera<br><br><br></th>
                                </tr>
                                <!-- jeśli pojawia się error dodajemy do tr klasę validate-error-tr oraz span pod inputem klasy validate-error -->
                                <tr>
                                    <td class="label"><label for="nazwa">Nazwa</label></td>
                                    <td class="input" colspan='3'>
                                        <input type="text" name='nazwa' readonly autocomplete="off" id='nazwa' value='<?= $this->user_place['nazwa']; ?>' maxlength='60'>
                                        <!-- <span class='validate-error'><i class="icon-cancel-circled"></i>wypełnij poprawnie pole login</span> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><label for="ulica">Ulica</label></td>
                                    <td class="input" colspan='3'>
                                        <input type="text" name='ulica' readonly autocomplete="off" id='ulica' value='<?= $this->user_place['ulica']; ?>' maxlength='60'>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><label for="budynek">Nr budynku</label></td>
                                    <td class="input">
                                        <input type="text" name='budynek' readonly autocomplete="off" class='short-input' id='budynek' value='<?= $this->user_place['nr_budynku']; ?>' maxlength='6'>
                                    </td>
                                    <td class="label"><label for="lokal">Nr lokalu</label></td>
                                    <td class="input">
                                        <input type="text" name='lokal' readonly autocomplete="off" class='short-input' id='lokal' maxlength='6' value='<?= $this->user_place['lokal']; ?>'>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><label for="kod_firmy">Kod firmy</label></td>
                                    <td class="input" colspan='3'>
                                        <input type="text" name='kod_firmy' readonly autocomplete="off" id='kod_firmy' value='<?= $this->user_place['kod_dealera']; ?>' maxlength='20'>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><label for="poczta">Kod pocztowy</label></td>
                                    <td class="input" colspan='3'>
                                        <input type="text" name='poczta' readonly autocomplete="off" class='m-short-input' id='<?= $this->user_place['kod']; ?>' value='02-277' maxlength='10'>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><label for="miasto">Miasto</label></td>
                                    <td class="input" colspan='3'>
                                        <input type="text" name='miasto' readonly autocomplete="off" id='miasto' value='<?= $this->user_place['miejscowosc']; ?>' maxlength='60'>
                                    </td>
                                </tr>
                                <?php /*<tr class='btn-action'>
                                    <td colspan='4'>
                                        <button name='admin-account-edit' class='edit-btn' value='1'>EDYTUJ</button>
                                        <button name='admin-account-save' disabled value='1'>ZAPISZ</button>
                                    </td>
                                </tr>
                                */ ?>
                            </table>
                        </form>
                    <!-- END edycja głównej placówki -->


                    <!-- edycja użytkownika -->
                        <form action="<?= BASE . $this->controller_name . '/' . $this->action_name; ?>" class='form admin-form noborder' method='post'>
                            <table>
                                <tr>
                                    <th colspan='4'>Dane użytkownika<br><br><br></th>
                                </tr>
                                <!-- jeśli pojawia się error dodajemy do tr klasę validate-error-tr oraz span pod inputem klasy validate-error -->
                                <tr>
                                    <td class="label"><label for="imie">Imie</label></td>
                                    <td class="input" colspan='3'>
                                        <input type="text" name='imie' readonly autocomplete="off" id='imie' value='<?= $_SESSION[AUTH_SESSION_NAME]['i']; ?>' maxlength='60'>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><label for="nazwisko">Nazwisko</label></td>
                                    <td class="input" colspan='3'>
                                        <input type="text" name='nazwisko' readonly autocomplete="off" id='nazwisko' value='<?= $_SESSION[AUTH_SESSION_NAME]['n']; ?>' maxlength='60'>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><label for="telefon">Telefon</label></td>
                                    <td class="input" colspan='3'>
                                        <input type="text" name='telefon' readonly autocomplete="off" id='telefon' value='<?= $_SESSION[AUTH_SESSION_NAME]['phone']; ?>' maxlength='25'>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><label for="email">Email</label></td>
                                    <td class="input" colspan='3'>
                                        <input type="email" name='email' readonly autocomplete="off" id='email' value='<?= $_SESSION[AUTH_SESSION_NAME]['email']; ?>' maxlength='60'>
                                    </td>
                                </tr>
                                <?php /*
                                <tr class='btn-action'>
                                    <td colspan='4'>
                                        <button name='admin-user-edit' class='edit-btn' value='1'>EDYTUJ</button>
                                        <button name='admin-user-save' disabled value='1'>ZAPISZ</button>
                                    </td>
                                </tr>
                                */ ?>
                            </table>
                        </form>
                    <!-- END edycja użytkownika -->

                </div>

            <!-- END Formularze usera -->


        </div>
        <!-- END prawa kolumna -->

    </div>

</div>