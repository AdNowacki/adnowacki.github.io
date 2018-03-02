<?php

$template = ($_GET['page']) ? $_GET['page'] : 'index';
$step = ($_GET['step']) ? "index_" . $_GET['step'] : 'index_krok1';
if(!file_exists( "template/" . $template . ".php" ))
    $template = 'index';



?>

<!doctype html>
    <!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pl"> <![endif]-->
    <!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="pl"> <![endif]-->
    <!--[if IE 8]><html class="no-js lt-ie9" lang="pl"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js" lang="pl" xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"> <!--<![endif]-->

    <head>
        <title></title>
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-language" content="pl" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="format-detection" content="telephone=no"/>
        <meta name='robots' content='index, follow, all' />
        <link rel='Shortcut icon' href='favicon.ico' type='image/x-icon' />

        <link rel="stylesheet" href="css/reset.css" media="all" />
        <link rel="stylesheet" href="css/style.css" media="all" />

        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/modernizr-2.5.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery.customSelect.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/ZeroClipboard.js"></script>


         <script>

         $(document).ready(function() {
            var clip = new ZeroClipboard($("#copy"), {moviePath: "js/ZeroClipboard.swf"}); 
            clip.on( 'complete', function(client, args){
                $('#to_copy').select();
            });
        });

        $(function() {
            $( ".m_info img" ).tooltip({
                show: null,
                position: {
                my: "left top",
                at: "left bottom"
            },
            open: function( event, ui ) {
            ui.tooltip.animate({ top: ui.tooltip.position().top + 10 }, "fast" );
            }
            });
        });

        $(function(){$('select.styled').customSelect();});
        </script>

    </head>
    <body>

        <!-- Warstwy logowania, rejestracji , głosowania, podziękowania -->
        <?php require "template/elements/layers.php"; ?>
        <!-- Warstwy logowania, rejestracji , głosowania, podziękowania end -->

    	<!-- Menu główne -->
        <div id="top">

        	<div id="nav">
        		<a href="#" id="sd" title="Strefa dzieci" class="aywr active">Strefa dzieci</a>
        		<a href="#" id="sg"></a>
        		<a href="#" id="srin" title="Strefa rodziców i nauczycieli" class="aywr">Strefa rodziców i nauczycieli</a>
        	</div>

        	<div id="user_det" class="aywr">
        		Jesteś zalogowany jako <span class="nick">janek_kot</span> 
        		<a href="#">Wyloguj</a> 
        		<img src="images/logout.png" alt="Wyloguj" />
        	</div>
        </div>
    	<!-- Menu główne end -->

    	<!-- content -->

        <?php require "template/{$template}.php"; ?>

    	<!-- content end -->

        <!-- footer -->
        <div id="footer">
            <a href="/" id="enea"><img src="images/enea.png" alt="Enea logo" /></a>
            <div id="f_nav">
                <a href="#">Regulamin</a>
                <span> | </span>
                <a href="#">Ochrona prywatności</a>
            </div>
        </div>
        <!-- footer end -->

    </body>
</html>