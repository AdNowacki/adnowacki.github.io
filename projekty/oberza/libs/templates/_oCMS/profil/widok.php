<?php require TEMPLATE_DIR . "_elements/_user.php"; ?>

    <?php
        Helper::infoSystem( [ 'type' => 'success', 'index' => 'login_success', 'message' => $this->data['dictionary'][23][LANG] ] );
        Helper::infoSystem( [ 'type' => 'success', 'index' => I_SUCCESS, 'message' => $_SESSION[I_SUCCESS] ] );
        Helper::infoSystem( [ 'type' => 'error', 'index' => I_ERROR, 'message' => $_SESSION[I_ERROR] ] );
        Helper::infoSystem( [ 'type' => 'info', 'index' => I_INFO, 'message' => $_SESSION[I_INFO] ] );
    ?>

    <!-- komunikat błędu -->
    <?php if( Error::getMessageItem( 'error_action_model' ) ) : ?>
        <div class="system-info system-info-error">
            <div>
                <?= Error::getMessageItem( 'error_action_model' )['message']; ?>
            </div>
            <button class="close-btn"></button>
        </div>
    <?php endif; ?>
    <!-- komunikat błędu -->


<div class="content admin-content">
    <div class="ctn1360">
        <h1>Twój profil</h1>
        <div class="row">
            <div class="wctn row">
                <div class="col-sm-8">
                    <form method="post" class="uedit uadd form-ocms user-form-edit" enctype="multipart/form-data">

                        <div class="form-field">
                            <label for="email">email</label>
                            <input name="email" id="email" readonly value="<?= $this->data['user']['email']; ?>" type="text">
                        </div>

                        <div class="form-field">
                            <label for="imie">imie</label>
                            <input name="imie" id="imie" required readonly value="<?= $this->data['user']['imie']; ?>" type="text">
                        </div>

                        <div class="form-field">
                            <label for="nazwisko">nazwisko</label>
                            <input name="nazwisko" id="nazwisko" required readonly value="<?= $this->data['user']['nazwisko']; ?>" type="text">
                        </div>

                        <div class="form-field">
                            <label for="haslo">zmień hasło, zmiana hasła spowoduje automatyczne wylogowanie (minimum 6 znaków)</label>
                            <input name="haslo" id="haslo" readonly value="" type="password">
                        </div>

                        <div class="form-field">
                            <label for="haslo2">powtórz nowe hasło</label>
                            <input name="haslo2" id="haslo2" readonly value="" type="password">
                        </div>


                        <br><br>
                        <div>
                            <a href="<?= BASE; ?>index/admin" class="page-action-link"><i class="icon-wroc"></i> Wróć na początek</a>
                        <span class="or-btn or-link" id='edit-b'>Edytuj</span> 
                        <button name="edit" class="or-btn or-link" disabled value="1">Zapisz zmiany</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>