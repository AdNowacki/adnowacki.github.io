<?php

$page = ( $_GET['page'] ) ? $_GET['page'] : 'index';
$menu = ( $_GET['menu'] ) ? $_GET['menu'] : null;

?>

<!doctype html>
    <!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pl"> <![endif]-->
    <!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="pl"> <![endif]-->
    <!--[if IE 8]><html class="no-js lt-ie9" lang="pl"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js" lang="pl" xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"> <!--<![endif]-->
    <head>
        <title></title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name='author' content='' />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <link rel='Shortcut icon' href='../favicon.png' type='image/x-icon' />
        <link rel="stylesheet" href="css/reset.css" media="all" />
        <link rel="stylesheet" href="css/UI/jquery-ui-1.10.4.custom.min.css" media="all" />
        <link rel="stylesheet" href="css/style.css" media="all" />
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css" media="all" />

    </head>
    <body class="contact">
        <!-- Top -->
            <?php
                /** Uwagi
                * Aktywna pozycja głównego menu - dla danego linku dodać klasę act
                */
            ?>

        <!-- Menu porady Gosi -->
        <nav id="top">
            <div>
                <a href="http://sonrisa.pl" title="Gosia - sprytne patenty" id="logo">
                    <img src="images/gosia-sprytne-patenty.png" alt="Gosia - sprytne patenty" />
                </a>
                <ul>
                    <li><a href="#menu" title="Menu" id="menu_m" data-show="0"><img src="images/menu_m.png" alt="Menu" /></a></li>
                </ul>

                <!-- menu główne -->
                <div id="slide_menu">
                    <a href="?page=porady_wszystkie&menu=_menu_porady">Gosia podpowiada</a>
                    <a href="?page=produkty_wszystkie&menu=_menu_kategorie">Produkty</a>
                    <a href="#">Kontakt</a>
                </div>
                <!-- menu główne end -->

            </div>
        </nav>
        <?php if( $menu ) require "template/{$menu}.php";  ?>
        <!-- Top end -->

        <?php require "template/{$page}.php"; ?>

        <!-- footer -->
        <footer>
            <div>
                <p>© 2013 <img src="images/politan.jpg" alt="Politan"> Sp. j., 44-352 Czyżowice, <br />ul. Nowa 28f.</p>
            </div>
        </footer>
        <!-- footer end -->




        <script type="text/javascript" src="js/hammer.min.js"></script>
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="js/modernizr-2.5.3.min.js"></script>
        <script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="js/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <!--script type="text/javascript" src="js/script.min.js"></script-->
        <script>
            // (function($){
            //     $(window).load(function(){$("#scrollbar").mCustomScrollbar({scrollInertia:100});});
            // })(jQuery);
        </script>


    </body>
</html>