<?php
    Helper::infoSystem( [ 'type' => 'success', 'index' => 'login_success', 'message' => $this->data['dictionary'][23][LANG] ] );
    Helper::infoSystem( [ 'type' => 'success', 'index' => I_SUCCESS, 'message' => $_SESSION[I_SUCCESS] ] );
    Helper::infoSystem( [ 'type' => 'error', 'index' => I_ERROR, 'message' => $_SESSION[I_ERROR] ] );
    Helper::infoSystem( [ 'type' => 'info', 'index' => I_INFO, 'message' => $_SESSION[I_INFO] ] );
?>
        
<?php require 'libs/templates/_elements/_page_nav.php'; ?>
<!-- nawigacja -->


<section id="page">
    <?php require 'libs/templates/_elements/_page_nav_static.php'; ?>

    <div class="page">
        <div class="page-image">
            <img src="<?= BASE; ?>public/images/kontakt-bg.jpg" alt="">
        </div>
        <h1 class="page-image-title"><?= $this->data['dictionary_page'][18][LANG]; ?></h1>
    </div>

    <div class="page-ctn page-ctn-nomargin">
        <div class="bs container">
            <div class="row">
                <div class="col-sm-3 col-address">
                    <h2><?= $this->data['dictionary_page'][40][LANG]; ?></h2>
                    <p><?= $this->data['dictionary_page'][41][LANG]; ?></p>
                    <p><?= $this->data['dictionary_page'][42][LANG]; ?></p>
                    <p><a href='mailto:<?= $this->data['dictionary_page'][10][LANG]; ?>'><img src="<?= BASE; ?>public/images/ico1.png" alt=""><?= $this->data['dictionary_page'][10][LANG]; ?></a></p>
                    <p><a href='tel:+48<?= preg_replace( "/\s/", "", $this->data['dictionary_page'][43][LANG] ); ?>'><img src="<?= BASE; ?>public/images/ico2.png" alt=""><?= $this->data['dictionary_page'][43][LANG]; ?></a></p>
                    <p><a href='tel:+48<?= preg_replace( "/\s/", "", $this->data['dictionary_page'][9][LANG] ); ?>'><img src="<?= BASE; ?>public/images/ico2.png" alt=""><?= $this->data['dictionary_page'][9][LANG]; ?></a></p>
                </div>
                <div class="col-sm-9 col-map">
                    <div id="contact-map" style='height: 800px; width: 100%;'>
                        
                    </div>
                    <!-- <img src="<?= BASE; ?>public/images/contact-map.jpg" alt=""> -->
                </div>
            </div>
        </div>
    </div>

    <div class="booking-black">
        <?php require 'libs/templates/_elements/_booking_form.php'; ?>
    </div>
</section>

<script>
    var map,
    mapOptions = {lat: 50.052788,lng: 19.945304,zoom: 17,marker: '',address : 'Kraków, Miodowa 25'},
    mapID = document.getElementById('contact-map');

      function initMap() {
        map = new google.maps.Map(mapID, {
          center: {lat: mapOptions.lat, lng: mapOptions.lng},
            disableDefaultUI: true,
          zoom: mapOptions.zoom
        });

        var marker = new google.maps.Marker({
            position: {lat: mapOptions.lat, lng: mapOptions.lng},
            icon: 'http://aparthotel.oberza.pl/public/images/marker.png',
            map: map
          });
    }
</script>

<?php require 'libs/templates/_elements/_page_footer.php'; ?>