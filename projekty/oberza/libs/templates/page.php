<!doctype html>
    <!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pl"> <![endif]-->
    <!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="pl"> <![endif]-->
    <!--[if IE 8]><html class="no-js lt-ie9" lang="pl"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js" lang="pl"> <!--<![endif]-->

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title><?= $title = ( $this->data['Title'] ) ? $this->data['dictionary_page'][58][LANG] . ' ' . $this->data['Title'] : $this->data['dictionary_page'][58][LANG]; ?></title>

        <meta name="description" content="<?= $desc = ( $this->data['Description'] ) ? $this->data['Description'] : $this->data['dictionary_page'][59][LANG]; ?>" />
        <meta name="keywords" content="<?= $kw = ( $this->data['Keywords'] ) ? $this->data['Keywords'] : $this->data['dictionary_page'][60][LANG]; ?>" />
        <meta name='author' content='Adam Nowacki | adam@grochow.waw.pl' />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <meta name="format-detection" content="telephone=no"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name='robots' content='index, follow' />

        <meta property='og:title' content='<?= $ogTitle = ( $this->data['ogTitle'] ) ? $this->data['ogTitle'] : $this->data['dictionary_page'][58][LANG]; ?>' />
        <meta property='og:description' content='<?= $ogDesc = ( $this->data['ogDescription'] ) ? $this->data['ogDescription'] : $this->data['dictionary_page'][59][LANG]; ?>' />
        <meta property='og:url' content='<?= BASE; ?>' />
        <meta property='og:site_name' content='<?= $this->data['dictionary_page'][58][LANG]; ?>' />
        <meta property='og:type' content='website' />
        <meta property="og:image" content="<?= $this->data['ogImage']; ?>" />
        
        

        <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE; ?>public/fav/apple-touch-icon.png?v2">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE; ?>public/fav/favicon-32x32.png?v2">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE; ?>public/fav/favicon-16x16.png?v2">
        <link rel="manifest" href="<?= BASE; ?>public/fav/manifest.json">
        <link rel="mask-icon" href="<?= BASE; ?>public/fav/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">


        <link rel="stylesheet" href="<?= BASE; ?>public/scss/reset.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/components/bootstrap/css/bootstrap.min.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/components/bootstrap/css/bootstrap-theme.min.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/components/fullpagejs/jquery.fullPage.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/components/datepicker/dist/datepicker.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/components/magnific/dist/magnific-popup.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/components/slick/slick.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/components/slick/slick-theme.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/scss/style.css" type="text/css" media="all" />

        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-22374047-9', 'auto');
  ga('send', 'pageview');

</script>


    </head>
    <body>
        
        <?php 
            try {
                $this->renderView(); 
            } catch (viewException $e) {
                Error::setMessage( 'template_file', $e->getMessage() . ' kod błędu:' . $e->getCode(), 'error' );
                $this->template_file = Helper::writeError404();
                $this->renderView(); 
            }
        ?>

        <?= "<script src='http://wis.upperbooking.com/oberzasasiadow/booking?locale=" . LANG . "' async></script>"; ?>
        <script type="text/javascript" src="<?= BASE; ?>public/js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="<?= BASE; ?>public/components/fullpagejs/vendors/scrolloverflow.js"></script>
        <script type="text/javascript" src="<?= BASE; ?>public/components/fullpagejs/jquery.fullPage.min.js"></script>
        <script type="text/javascript" src="<?= BASE; ?>public/components/datepicker/dist/datepicker.js"></script>
        <script type="text/javascript" src="<?= BASE; ?>public/components/velocity/velocity.min.js"></script>
        <script type="text/javascript" src="<?= BASE; ?>public/components/magnific/dist/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="<?= BASE; ?>public/components/slick/slick.min.js"></script>
        <script type="text/javascript" src="<?= BASE; ?>public/js/date.js"></script>
        <script type="text/javascript" src="<?= BASE; ?>public/js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="<?= BASE; ?>public/js/_main.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyBg2jCN5LvFlgXFrt9zvb1m_0XQdUcmF_E&callback=initMap" async defer></script>

    </body>
</html>
