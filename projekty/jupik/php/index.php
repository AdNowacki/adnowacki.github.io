<?php
    error_reporting(0);
    $template = ($_GET["page"]) ? $_GET["page"] : "index";

?>
<!doctype html>
    <!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pl"> <![endif]-->
    <!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="pl"> <![endif]-->
    <!--[if IE 8]><html class="no-js lt-ie9" lang="pl"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js" lang="pl"> <!--<![endif]-->

    <head>
        <title>Jupik</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name='author' content='Adam Nowacki | ad.nowacki@gmail.com' />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name='robots' content='index, follow' />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel='Shortcut icon' href='./public/images/ico.png' type='image/x-icon' />

        <link rel="stylesheet" href="./public/css/reset.min.css" media="all" />
        <link rel="stylesheet" href="./public/css/style.css" media="all" />

    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/pl_PL/all.js#xfbml=1&appId=195139210550287";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <!-- Warstwa dla orientacji portretowej -->
        <div id="disable_layer">
            <span>
                <strong>Obróć urządzenie.</strong><br />
                Strona przystosowana do przeglądania w pozycji horyzontalnej
            </span>
        </div>
        <!-- Warstwa dla orientacji portretowej END -->

        <!-- Pływające menu -->
        <nav id="menu">
            <div>
                <button id="hide_menu">
                    MENU
                    <span></span>
                </button>
                <ul>
                    <li><a href="?page=produkty" <?php if($template == "produkty") echo "class='act'"; ?> title="PRODUKTY">PRODUKTY</a></li>
                    <li><a href="?page=nowy-jupik" <?php if($template == "nowy-jupik") echo "class='act'"; ?> title="NOWY JUPIK">NOWY JUPIK</a></li>
                    <li><a href="?page=porady-eksperta" <?php if($template == "porady-eksperta") echo "class='act'"; ?> title="PORADA EKSPERTA">PORADA EKSPERTA</a></li>
                    <li><a href="?page=kraina-zabaw" <?php if($template == "kraina-zabaw") echo "class='act'"; ?> title="KRAINA ZABAW">KRAINA ZABAW</a></li>
                    <li><a href="?page=konkurs" <?php if($template == "konkurs") echo "class='act'"; ?> title="KONKURS">KONKURS</a></li>
                </ul>
                <div id="social">
                    <a href="#">
                        <img src="./public/images/fb.png" alt="fb" />
                    </a>
                    <a href="#">
                        <img src="./public/images/nk.png" alt="nk" />
                    </a>
                </div>
            </div>
        </nav>
        <!-- Pływające menu END -->

        <!-- Modal -->
        <div class="modal">
            <div class="modal_box">
                <div class="modal_content" id="mod1">
                    <div class="modal_img">
                        <img src="./public/images/modal-img1.jpg" alt="Zabawa 1" />
                        <p>1</p>
                    </div>
                    <div class="modal_txt">
                        <h3>Gra balonem 1</h3>
                        <p>
                            Potrzebna jest elastyczna guma (kupisz w sklepach zabawkowych lub w pasmanterii). W gumie stoją dwie osoby, a trzecia przez nią skacze. Aby zabawa się udała należy przez nią przeskakiwać, naskakiwać, wyskakiwać zgodnie z wymyślonymi regułami. Poziomy do przeskoczenia to kostki, potem łydki, kolana, uda i dalej w górę, aż do szyjek.
                            Potrzebna jest elastyczna guma (kupisz w sklepach zabawkowych lub w pasmanterii). W gumie stoją dwie osoby, a trzecia przez nią skacze. 

                        </p>
                    </div>
                    <button class="modal_close"></button>
                </div>

                <div class="modal_content" id="mod2">
                    <div class="modal_img">
                        <img src="./public/images/modal-img1.jpg" alt="Zabawa 1" />
                        <p>2</p>
                    </div>
                    <div class="modal_txt">
                        <h3>Gra balonem 2</h3>
                        <p>
                            Potrzebna jest elastyczna guma (kupisz w sklepach zabawkowych lub w pasmanterii). W gumie stoją dwie osoby, a trzecia przez nią skacze. Aby zabawa się udała należy przez nią przeskakiwać, naskakiwać, wyskakiwać zgodnie z wymyślonymi regułami. Poziomy do przeskoczenia to kostki, potem łydki, kolana, uda i dalej w górę, aż do szyjek.
                        </p>
                    </div>
                    <button class="modal_close"></button>
                </div>

                <div class="modal_content" id="mod3">
                    <div class="modal_img">
                        <img src="./public/images/modal-img1.jpg" alt="Zabawa 1" />
                        <p>3</p>
                    </div>
                    <div class="modal_txt">
                        <h3>Gra balonem 3</h3>
                        <p>
                            Potrzebna jest elastyczna guma (kupisz w sklepach zabawkowych lub w pasmanterii). W gumie stoją dwie osoby, a trzecia przez nią skacze. Aby zabawa się udała należy przez nią przeskakiwać, naskakiwać, wyskakiwać zgodnie z wymyślonymi regułami. Poziomy do przeskoczenia to kostki, potem łydki, kolana, uda i dalej w górę, aż do szyjek.
                        </p>
                    </div>
                    <button class="modal_close"></button>
                </div>

                <div class="modal_content" id="mod4">
                    <div class="modal_img">
                        <img src="./public/images/modal-img1.jpg" alt="Zabawa 1" />
                        <p>4</p>
                    </div>
                    <div class="modal_txt">
                        <h3>Gra balonem 4</h3>
                        <p>
                            Potrzebna jest elastyczna guma (kupisz w sklepach zabawkowych lub w pasmanterii). W gumie stoją dwie osoby, a trzecia przez nią skacze. Aby zabawa się udała należy przez nią przeskakiwać, naskakiwać, wyskakiwać zgodnie z wymyślonymi regułami. Poziomy do przeskoczenia to kostki, potem łydki, kolana, uda i dalej w górę, aż do szyjek.
                        </p>
                    </div>
                    <button class="modal_close"></button>
                </div>

                <div class="modal_content" id="mod5">
                    <div class="modal_img">
                        <img src="./public/images/modal-img1.jpg" alt="Zabawa 1" />
                        <p>5</p>
                    </div>
                    <div class="modal_txt">
                        <h3>Gra balonem 5</h3>
                        <p>
                            Potrzebna jest elastyczna guma (kupisz w sklepach zabawkowych lub w pasmanterii). W gumie stoją dwie osoby, a trzecia przez nią skacze. Aby zabawa się udała należy przez nią przeskakiwać, naskakiwać, wyskakiwać zgodnie z wymyślonymi regułami. Poziomy do przeskoczenia to kostki, potem łydki, kolana, uda i dalej w górę, aż do szyjek.
                        </p>
                    </div>
                    <button class="modal_close"></button>
                </div>

                <div class="modal_content" id="mod6">
                    <div class="modal_img">
                        <img src="./public/images/modal-img1.jpg" alt="Zabawa 1" />
                        <p>6</p>
                    </div>
                    <div class="modal_txt">
                        <h3>Gra balonem 6</h3>
                        <p>
                            Potrzebna jest elastyczna guma (kupisz w sklepach zabawkowych lub w pasmanterii). W gumie stoją dwie osoby, a trzecia przez nią skacze. Aby zabawa się udała należy przez nią przeskakiwać, naskakiwać, wyskakiwać zgodnie z wymyślonymi regułami. Poziomy do przeskoczenia to kostki, potem łydki, kolana, uda i dalej w górę, aż do szyjek.
                        </p>
                    </div>
                    <button class="modal_close"></button>
                </div>

                <button class="modal_nav" id="m_prev"></button>
                <button class="modal_nav" id="m_next"></button>

            </div>

        </div>
        <!-- Modal END -->

        <!-- Top -->
        <nav id="top">
            <a href="#" title="Jupik"><img src="./public/images/jupik.png" alt="Jupik"></a>
            <button id="show_menu">
                MENU
                <span></span>
            </button>
        </nav>
        <!-- Top END -->

        <!-- Główna część -->
        <div id="skrollr-body">
            <section id="page">

                <!-- Template -->
                <?php require "templates/{$template}.php"; ?>
                <!-- Template END -->

                <!-- Stopa -->
                <footer>
                    <div>
                        <p id="copy">&copy; 2014 Hoop Polska.</p>
                        <nav>
                            <a href="#">KONTAKT</a>
                            <a href="#">POLITYKA PRYWATNOŚCI</a>
                            <a href="?page=regulamin">REGULAMIN</a>
                        </nav>
                        <div class="like">
                            <div class="fb-like" data-href="https://www.facebook.com/JupikWzywa" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
                        </div>
                        <button id="up"></button>
                    </div>
                </footer>
                <!-- Stopa END -->
        
            </section>
        </div>
        <!-- Główna część END -->

        <script type="text/javascript" src="./public/js/jquery1.10.2.easing.modernizr.js"></script>
        <!--[if IE lt 9]>
          <script type="text/javascript" src="./public/js/html5.js"></script>
        <![endif]-->
        <script type="text/javascript" src="./public/js/skrollr.min.js"></script>
        <script type="text/javascript" src="./public/js/jquery.menuFlip.min.js"></script>
        <script type="text/javascript" src="./public/js/config.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#menu ul').menuFlip();
            });
        </script>

    </body>
</html>