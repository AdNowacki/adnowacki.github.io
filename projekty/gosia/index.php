<?php
error_reporting(0);

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
        <!-- <link rel="stylesheet" href="css/style.min.css" media="all" /> -->
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css" media="all" />

    </head>
    <body>

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
                    <li><a href="index.php?page=porady_wszystkie&menu=_menu_porady" title="Gosia podpowiada" class="act">Gosia podpowiada</a></li>
                    <li><a href="index.php?page=produkty_wszystkie&menu=_menu_kategorie" title="Produkty">Produkty</a></li>
                    <li><a href="#" title="Kontakt">Kontakt</a></li>
                    <li>
                        <a href="#" title="Facebook" id="fbl">
                            <img src="images/fb-h.jpg" alt="Facebook" />
                            <img src="images/fb.jpg" alt="Facebook" id="gray" />
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php if( $menu ) require "template/{$menu}.php";  ?>
        <!-- Top end -->

        <?php require "template/{$page}.php"; ?>

        <!-- footer -->
        <footer>
            <div>
                <p>© 2013 <img src="images/politan.jpg" alt="Politan"> Sp. j., 44-352 Czyżowice, ul. Nowa 28f.</p>
                <ul>
                    <li><a href="#" title="O Marce">O Marce</a></li>
                    <li><a href="#" title="Press room">Press room</a></li>
                    <li><a href="#" title="Kontakt">Kontakt</a></li>
                    <li><a href="#" title="Do pobrania">Do pobrania</a></li>
                </ul>
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
            (function($){
                $(window).load(function(){$("#scrollbar").mCustomScrollbar({scrollInertia:100});});
            })(jQuery);
        </script>


    </body>
</html>