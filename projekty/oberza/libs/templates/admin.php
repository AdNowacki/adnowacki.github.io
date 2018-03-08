<!doctype html>
    <!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pl"> <![endif]-->
    <!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="pl"> <![endif]-->
    <!--[if IE 8]><html class="no-js lt-ie9" lang="pl"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js es-t" lang="pl"> <!--<![endif]-->

    <head>
        <title></title>

        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name='author' content='' />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-language" content="pl" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="format-detection" content="telephone=no"/>
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name='robots' content='noindex, nofollow' />

        <link rel="stylesheet" href="<?= BASE; ?>public/admin/scss/reset.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/admin/scss/bootstrap.min.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/admin/scss/bootstrap-theme.min.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/admin/fontello/css/fontello.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/admin/fontello/css/animation.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/admin/plugins/magnificpopup/dist/magnific-popup.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/admin/plugins/datepicker/dist/datepicker.min.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= BASE; ?>public/admin/scss/admin.css" type="text/css" media="all" />
    </head>
    <body>
        <?php if( !$this->data['admin'] ) : ?>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.8";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <?php endif; ?>
        
        <!-- kontent -->
        <section class="content mainpage-content">
            <div class="container-fluid container-fluid-100">
                <?php 
                    if( Auth::sessionAuthExist() )
                        require "libs/templates/_elements/_admin_nav.php";
                    try {
                        $this->renderView(); 
                    } catch (viewException $e) {
                        Error::setMessage( 'template_file', $e->getMessage() . ' kod błędu:' . $e->getCode(), 'error' );
                        $this->template_file = Helper::writeError404();
                        $this->renderView(); 
                    }
                ?>

            </div>
        </section>
        <!-- ! kontent -->


        <script src="<?= BASE; ?>public/js/jquery-2.1.1.min.js"></script>
        <script src="<?= BASE; ?>public/js/bootstrap.min.js"></script>
        <script src='<?= BASE; ?>public/js/babel.6.24.0.min.js'></script>
        <script src='<?= BASE; ?>public/js/react.min.js'></script>
        <script src='<?= BASE; ?>public/js/react-dom.min.js'></script>
        <script src='<?= BASE; ?>public/plugins/magnificpopup/dist/jquery.magnific-popup.min.js'></script>
        <script src='<?= BASE; ?>public/plugins/datepicker/dist/datepicker.min.js'></script>
        <script>
            $('.date').datepicker({
                format : 'yyyy-mm-dd',
                autoHide : true,
            });
        </script>
        <script src='<?= BASE; ?>public/admin/plugins/admin/tinymce/js/tinymce/tinymce.min.js'></script>
        <?php echo '<script type="text/javascript">var BASE_ = "' . BASE . '";</script>'; ?>
        <script type="text/javascript">

            function RoxyFileBrowser(field_name, url, type, win) {
              var roxyFileman = BASE_ + 'public/plugins/admin/fileman/index.html';
              if (roxyFileman.indexOf("?") < 0) {     
                roxyFileman += "?type=" + type;   
              }
              else {
                roxyFileman += "&type=" + type;
              }
              roxyFileman += '&input=' + field_name + '&value=' + win.document.getElementById(field_name).value;
              if(tinyMCE.activeEditor.settings.language){
                roxyFileman += '&langCode=' + tinyMCE.activeEditor.settings.language;
              }
              tinyMCE.activeEditor.windowManager.open({
                 file: roxyFileman,
                 title: 'Roxy Fileman',
                 width: 850, 
                 height: 650,
                 resizable: "yes",
                 plugins: "media",
                 inline: "yes",
                 close_previous: "no"  
              }, {     window: win,     input: field_name    });
              return false; 
            }


            $('.date').datepicker({
                format : 'yyyy-mm-dd',
                autoHide : true,
            });

            tinymce.init({
              selector: '.wyswig',
              file_browser_callback: RoxyFileBrowser,
              width: 650,
              height: 280,
              image_advtab: true,
              language: 'pl',
              plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak code paste",
                    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
                    "table contextmenu directionality emoticons paste textcolor",
                ],
              toolbar1: 'undo redo | insert | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
              toolbar2: 'preview | forecolor backcolor emoticons | code',
              image_advtab: true,
              relative_urls: false,
              // relative_urls: false,
              // filemanager_title:"Responsive Filemanager",
              // filemanager_crossdomain: true,
              // external_filemanager_path: BASE_ + "public/plugins/admin/filemanager/filemanager/",
              // external_plugins: { "filemanager" : BASE_ + "public/plugins/admin/filemanager/filemanager/plugin.min.js"},
              paste_auto_cleanup_on_paste : true,
              paste_remove_styles: true,
              paste_remove_styles_if_webkit: true,
              paste_strip_class_attributes: true,
              paste_as_text: true,
             });

        </script>
        <script src="<?= BASE; ?>public/admin/js/_admin.js" type="text/babel"></script>

    </body>
</html>
