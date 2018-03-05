<?php

    switch ($_GET['page']) {
        case 'blog':
            $template = "blog";
            $top = "blog_top";
            break;

        case 'artykul':
            $template = "artykul";
            $top = "blog_top";
            break;

        case 'rejestracja_krok1':
            $template = "rejestracja_krok1";
            $top = "rejestracja1-2_top";
            break;

        case 'rejestracja_krok2':
            $template = "rejestracja_krok2";
            $top = "rejestracja1-2_top";
            break;

        case 'rejestracja_wszyscy':
            $template = "rejestracja_wszyscy";
            $top = "rejestracja1-2_top";
            break;

        case 'rejestracja_krok3':
            $template = "rejestracja_krok3";
            $top = "rejestracja3_top";
            break;

        case 'moje_konto':
            $template = "moje_konto";
            $top = "rejestracja3_top";
            break;

        case 'osiagniecia':
            $template = "osiagniecia";
            $top = "rejestracja3_top";
            break;

        case 'ambasadorzy':
            $template = "ambasadorzy";
            $top = "rejestracja3_top";
            break;

        case 'nagrody':
            $template = "nagrody";
            $top = "rejestracja3_top";
            break;

        case 'nagrody_niezalogowany':
            $template = "nagrody_niezalogowany";
            $top = "index_top";
            break;

        case 'ranking_wszyscy_i_ranking_moje':
            $template = "ranking_wszyscy_i_ranking_moje";
            $top = "rejestracja3_top";
            break;

        case 'wyzwania':
            $template = "wyzwania";
            $top = "rejestracja3_top";
            break;

        case 'jak-to-dziala':
            $template = "jak-to-dziala";
            $top = "rejestracja3_top";
            break;

        case 'jak-to-dziala_niezalogowany':
            $template = "jak-to-dziala_niezalogowany";
            $top = "index_top";
            break;

        default:
            $template = "index";
            $top = "index_top";
            break;
    }

?>


<!doctype html>
    <!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pl"> <![endif]-->
    <!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="pl"> <![endif]-->
    <!--[if IE 8]><html class="no-js lt-ie9" lang="pl"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js" lang="pl"> <!--<![endif]-->

    <head>
        <title></title>

        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name='author' content='' />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name='robots' content='index, follow, all' />
        <link rel='Shortcut icon' href='' type='image/x-icon' />

        <link rel="stylesheet" href="css/reset.css" media="all" />
        <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.3.custom.css" media="all" />
        <link rel="stylesheet" href="css/style.css" media="all" />
        <link rel="stylesheet" href="css/colorbox.css" media="all" />

        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript" src="js/modernizr-2.5.3.min.js"></script>
        <script type="text/javascript" src="js/cufon.js"></script>
        <script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/CentraleSans-Regular_400.font.js"></script>
        <script type="text/javascript" src="js/CentraleSans-Medium_425.font.js"></script>
        <script type="text/javascript" src="js/CentraleSans-Bold_450.font.js"></script>
        <script type="text/javascript" src="js/jquery.colorbox-min.js"></script>

        <script type="text/javascript">

            Cufon.replace('.myriad', { fontFamily: 'Myriad Pro', hover : true });
            Cufon.replace('.gill_sans_light_reg, .gill_sans', { fontFamily: 'CentraleSans-Regular', hover : true });
            Cufon.replace('.gill_sans_light_b', { fontFamily: 'CentraleSans-Bold', hover : true });
            Cufon.replace('.gill_sansMT', { fontFamily: 'CentraleSans-Medium', hover : true });

            /*
                CUFON
                klasa myriad - font Myriad Pro
                klasa gill_sans_light_reg - font Gill Sans Light Regular
                klasa gill_sans_light_b - font Gill Sans Bold
                klasa gill_sansMT - font Gill Sans MT
                klasa gill_sans - font Gill Sans

            */

        </script>



    </head>
    <body>

        <!-- czarna warstwa - nie wiem jaka jest jej funkcjonalność, więc nie podpinam pod nię skryptu -->
        <div id="b_layer">

            <div>
                <div id="close">Zamknij</div>
                <div class="b_log_top">
                    <h5 class="gill_sans_light_reg">Zaloguj się aby wziąć udział w aukcji</h5>
                    <div>
                        <a href="#"><img alt="" src="images/fb.png"></a>
                        <a href="#" class="button_log">Rejestracja w programie<span></span></a>
                    </div>
                </div>
                <div class="b_log_center">
                    <h5 class="gill_sans_light_reg">Mam już konto</h5>
                    <form method="post" id="logowanie">
                        <fieldset>
                            <label for="email" class="gill_sansMT">E-mail</label>
                            <input type="text" placeholder="Podaj adres e-mail" name="email" id="email" />
                            <label for="password" class="gill_sansMT">Hasło</label>
                            <input type="password" placeholder="Wpisz swoje hasło" name="password" id="password" />
                            <a href="#">Zapomniałem hasła</a>
                            <button type="submit"><img src="images/zaloguj.jpg" alt="Zaloguj" /></button>
                        </fieldset>
                    </form>
                </div>
                <div class="b_log_bot"></div>
            </div>

        </div>
        <!-- czarna warstwa - nie wiem jaka jest jej funkcjonalność, więc nie podpinam pod nię skryptu end -->

        <!-- Top -->
        <?php require "template/element/{$top}.php"; ?>
        <!-- Top end -->

        <!-- Kontent -->
        <div id="page">

            <?php require "template/{$template}.php"; ?>

        </div>
        <!-- Kontent end -->

        <!-- stopka -->
        <div id="footer">
            <div>
                <p>© Koninklijke Philips N.V., 2013. Wszelkie prawa zastrzeżone.</p>
                <ul class="gill_sans">
                    <li><a href="#" title="TWARZE TECHNOLOGII">TWARZE TECHNOLOGII</a></li>
                    <li><a href="#" title="PHILIPS BLOG">PHILIPS BLOG</a></li>
                    <li><a href="#" title="NAGRODY">NAGRODY</a></li>
                    <li><a href="#" title="MOJE KONTO">MOJE KONTO</a></li>
                    <li><a href="#" title="MOJE PUNKT">MOJE PUNKTY</a></li>
                </ul>
            </div>
        </div>
        <!-- stopka end -->

    </body>
</html>