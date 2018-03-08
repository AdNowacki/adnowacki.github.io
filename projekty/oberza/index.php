<?php
    session_start();
    session_regenerate_id();
    ob_start();

    require 'libs/config/load.php';
    require 'libs/config/config.php';
    require 'libs/class/routing.class.php';

    // ustawienia routingu - dopuszczalne wartości dla parametru Routing::$param poza wartościami numerycznymi
    Routing::setAllowedParam( array( 'total', 'all', 'new', 'import', 'export', 'show', 'hide' ) );
    Routing::init();

    $helper_dictionary = Helper::dictionary();
    $helper_dictionary_event = Helper::dictionary_event();
    // mail
    define( 'MAIL_HOST' , 'oberza.nazwa.pl' );
    define( 'MAIL_CHARSET' , 'utf-8' );
    define( 'MAIL_PORT' , 25 );
    define( 'MAIL_USER' , 'noreply@oberza.pl' );
    define( 'MAIL_PASSWORD' , '!nOrEpLy_2017' );
    define( 'MAIL_FROM' , 'noreply@oberza.pl' );
    define( 'MAIL_FROM_NAME' , 'Oberża' );

    // start kontrollera
    $controller = Routing::startController();
    $controller->helper = Routing::initHelper();
    $controller->helper->lang();
    Routing::startModel();
    // popularne artykuły

/*
    try {
        $controller->model->mostPopularArticles(3);
    } catch ( modelException $e ) {
        Error::setMessage( 'error_action_model', $e->getMessage(), 'error', $e->getCode() );
    }
    try {
        // kategorie artykułów
        $options = ['col' => 'kategorie', 'type' => 'artykul', 'data_index' => 'articleCategories', 'join' => 'kategorie_artykuly'];
        $controller->model->getArticleCategories( $options );

        // kategorie newsroom
        $options = ['col' => 'kategorie_n', 'type' => 'newsroom', 'data_index' => 'newsroomCategories', 'join' => 'kategorie_newsroom'];
        $controller->model->getArticleCategories( $options );

        // kategorie wydarzeń
        $controller->model->getEventsCategories();

        // newsroom
        $controller->model->getNewsroom();

        // menu
        $controller->model->getPagesNavigation();

        // firmy
        $controller->model->getCorp();

        // eksperci
        $controller->model->getExperts();

        // ostatni magazyn
        $controller->model->getLastMagazine();

        if( !$controller->oCMS ) {
            // reklamy online boczne
            $controller->model->getAdv();
            // reklamy online górne
            $controller->model->getAdvTop();
        }

        // nowe zamówienia
        $controller->model->newOrder();
        
        // nieaktzwne reklamy online
        $controller->model->nonActiveAdv();

        
    } catch ( modelException $e ) {
        Error::setMessage( 'error_action_model', $e->getMessage(), 'error', $e->getCode() );
    }
*/
    // $controller->getData();
    
    $controller->model->isMobile();
    $controller->model->setLanguage();
    $action = Routing::startAction();
    $controller->$action();
    $controller->getData();

    if( ( Routing::$routing['controller'] == 'admin' || Routing::$routing['controller'] == 'wydarzenia' || Routing::$routing['controller'] == 'wydarzenie' ) && Routing::$routing['title'] != 'stat' ) 
        Routing::$active['wydarzenia'] = 'class="active"';
    else if( Routing::$routing['controller'] == 'profil' ) 
        Routing::$active['profil'] = 'class="active"';
    else if( Routing::$routing['controller'] == 'spotkania' ) 
        Routing::$active['spotkania'] = 'class="active"';
    else
        Routing::$active['wydarzenia'] = 'class="active"';

    $controller->renderTemplate();

    ob_end_flush();




    

