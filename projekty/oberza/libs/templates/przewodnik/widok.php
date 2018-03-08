<?php
    Helper::infoSystem( [ 'type' => 'success', 'index' => 'login_success', 'message' => $this->data['dictionary'][23][LANG] ] );
    Helper::infoSystem( [ 'type' => 'success', 'index' => I_SUCCESS, 'message' => $_SESSION[I_SUCCESS] ] );
    Helper::infoSystem( [ 'type' => 'error', 'index' => I_ERROR, 'message' => $_SESSION[I_ERROR] ] );
    Helper::infoSystem( [ 'type' => 'info', 'index' => I_INFO, 'message' => $_SESSION[I_INFO] ] );
?>
        
<?php require 'libs/templates/_elements/_page_nav.php'; ?>
<!-- nawigacja -->

<style>
    .plcategory {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 82px;
        background: #fff;
        position: relative;
        z-index: 4;
    }

    .plcategory_td {
        padding: 0 35px;
        text-transform: uppercase;
    }
    .plcategory svg {
        width: 15px;
        vertical-align: middle;
        display: inline-block;
        margin-left: 5px;
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0;
        transition: opacity .2s;
    }

    .plcategory a, .plcategory a:hover, .plcategory a:active, .plcategory a:focus {
        color: #000;
        text-decoration: none;
        position: relative;
        padding-right: 25px;
        display: inline-block;
    }

    .plcategory a:hover, .plcategory a.click {
        text-decoration: underline;
    }
    .plcategory a:hover svg, .plcategory a.click svg, .plcategory a.act svg {
        opacity: 1;
    }

    .plsub {
        font-size: 14px;
        color: #fff;
        text-align: center;
        position: relative;
        z-index: 30;
        height: 30px;
    }

    .plsub .pl-btn {
        background: none;
        padding: 5px 15px;
        border: 0;
        text-transform: uppercase;
    }

    .plsub_item {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        display: none;
        background: #b1b0b0;
    }

    .map-fig {
        width: 100%;
    }
    #map-figure {
        height: 720px;
        /*margin-top: -30px;*/
    }
</style>

<section id="page">
    <?php require 'libs/templates/_elements/_page_nav_static.php'; ?>

    <div class="page">
        <div class="page-image">
            <img src="<?= BASE; ?>public/images/przewodnik.jpg" alt="">
        </div>
        <h1 class="page-image-title"><?= $this->data['dictionary_page'][61][LANG]; ?></h1>
    </div>
</section>
    <div class="plcategory">
        <div class="plcategory_td">
            <a href="#" data-cat='1' class='plcategory_link act'>
                <strong>historia</strong>
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="0" viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;"
                     xml:space="preserve">
                <g>
                    <path d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751
                        c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0
                        c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/>
                </g>
                </svg>
            </a>
        </div>
        <div class="plcategory_td">
            <a href="#" data-cat='2' class='plcategory_link'>
                <strong>kultura</strong>
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="0" viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;"
                     xml:space="preserve">
                <g>
                    <path d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751
                        c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0
                        c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/>
                </g>
                </svg>
            </a>
        </div>
        <div class="plcategory_td">
            <a href="#" data-cat='3' class='plcategory_link'>
                <strong>żydowski</strong><br>kazimierz
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="0" viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;"
                     xml:space="preserve">
                <g>
                    <path d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751
                        c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0
                        c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/>
                </g>
                </svg>
            </a>
        </div>
        <div class="plcategory_td">
            <a href="#" data-cat='4' class='plcategory_link'>
                <strong>rozrywka</strong>
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="0" viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;"
                     xml:space="preserve">
                <g>
                    <path d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751
                        c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0
                        c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/>
                </g>
                </svg>
            </a>
        </div>
        <div class="plcategory_td">
            <a href="#" data-cat='5' class='plcategory_link'>
                <strong>varia</strong>
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="0" viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;"
                     xml:space="preserve">
                <g>
                    <path d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751
                        c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0
                        c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/>
                </g>
                </svg>
            </a>
        </div>
    </div>
    <div class="plsub">
        <div class="plsub_item" data-cat-target='1' style='display: block;'>
            <button class='pl-btn' data-address='Kraków, Rynek Główny' data-lat='' data-lng=''><?= $this->data['dictionary_page'][66][LANG]; ?></button> 
            | 
            <button class='pl-btn' data-address='Kraków, Brama Floriańska' data-lat='' data-lng=''><?= $this->data['dictionary_page'][68][LANG]; ?></button> | 
            <button class='pl-btn' data-address='Kraków, Wawel' data-lat='' data-lng=''><?= $this->data['dictionary_page'][67][LANG]; ?></button> | 
            <!-- <button class='pl-btn' data-address='Kraków, Synagoga Stara' data-lat='' data-lng=''><?= $this->data['dictionary_page'][70][LANG]; ?></button> -->
            <button class='pl-btn' data-address='Kraków, Plac Nowy' data-lat='' data-lng=''><?= $this->data['dictionary_page'][97][LANG]; ?></button> | 
            <button class='pl-btn' data-address='Kraków, Dworzec Główny' data-lat='' data-lng=''><?= $this->data['dictionary_page'][98][LANG]; ?></button>
        </div>
        <div class="plsub_item" data-cat-target='2'></div> 
        <div class="plsub_item" data-cat-target='3'>
            <button class='pl-btn' data-address='Kraków, Kosciół na Skałce' data-lat='' data-lng=''><?= $this->data['dictionary_page'][79][LANG]; ?></button> | 
            <button class='pl-btn' data-address='Kraków, Lody na Starowislanej' data-lat='' data-lng=''><?= $this->data['dictionary_page'][80][LANG]; ?></button> | 
            <button class='pl-btn' data-address='Kraków, Cmentarz Żydowski' data-lat='' data-lng=''><?= $this->data['dictionary_page'][81][LANG]; ?></button> |
            <button class='pl-btn' data-address='Kraków, Singer' data-lat='' data-lng=''><?= $this->data['dictionary_page'][82][LANG]; ?></button> | 
            <button class='pl-btn' data-address='Kraków, Alchemia' data-lat='' data-lng=''><?= $this->data['dictionary_page'][83][LANG]; ?></button>
        </div> 
        <div class="plsub_item" data-cat-target='4'></div> 
        <div class="plsub_item" data-cat-target='5'></div> 
    </div>

        <section id="map">
            <div class="page-ctn page-ctn-nomargin page-ctn-100">
                <div class="bs">
                    <div class="row flex">
                        <div class="col-sm-12 map-fig">
                            <div id="distance">
                                <table>
                                    <tr>
                                        <td style='text-align: center;'><img src="<?= BASE; ?>public/images/place-ico2.jpg" alt=""></td>
                                        <td style='text-align: center;'><img src="<?= BASE; ?>public/images/place-ico1.jpg" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td class='placetime' style='text-align: center; padding: 4px 20px;'></td>
                                        <td class='placeroute' style='text-align: center; padding: 4px 20px;'></td>
                                    </tr>
                                </table>
                            </div>
                            <div id="map-figure"></div>
                        </div>
<?php /*

                        <div class="col-sm-3 places">
                            <h3 class="category-place"><?= $this->data['dictionary_page'][62][LANG]; ?></h3>
                            <div class="place-btns">
                                <button class='pl-btn' data-address='Kraków, Rynek Główny' data-lat='' data-lng=''><?= $this->data['dictionary_page'][66][LANG]; ?></button>
                                <button class='pl-btn' data-address='Kraków, Wawel' data-lat='' data-lng=''><?= $this->data['dictionary_page'][67][LANG]; ?></button>
                                <button class='pl-btn' data-address='Kraków, Brama Floriańska' data-lat='' data-lng=''><?= $this->data['dictionary_page'][68][LANG]; ?></button>
                                <button class='pl-btn' data-address='Kraków, Plac Nowy' data-lat='' data-lng=''><?= $this->data['dictionary_page'][69][LANG]; ?></button>
                                <button class='pl-btn' data-address='Kraków, Synagoga Stara' data-lat='' data-lng=''><?= $this->data['dictionary_page'][70][LANG]; ?></button>
                            </div>
                            <h3 class="category-place"><?= $this->data['dictionary_page'][63][LANG]; ?></h3>
                            <div class="place-btns">
                                <button class='pl-btn' data-address='Kraków, Kopiec Krakusa' data-lat='' data-lng=''><?= $this->data['dictionary_page'][71][LANG]; ?></button>
                                <button class='pl-btn' data-address='Kraków, Park Bednarskiego' data-lat='' data-lng=''><?= $this->data['dictionary_page'][72][LANG]; ?></button>
                                <button class='pl-btn' data-address='Kraków, Stadion Korony' data-lat='' data-lng=''><?= $this->data['dictionary_page'][73][LANG]; ?></button>
                                <button class='pl-btn' data-address='Kraków, Planty' data-lat='' data-lng=''><?= $this->data['dictionary_page'][74][LANG]; ?></button>
                            </div>

                            <h3 class="category-place"><?= $this->data['dictionary_page'][64][LANG]; ?></h3>
                            <div class="place-btns">
                                <button class='pl-btn' data-address='Kraków, Fabryka Schindlera' data-lat='' data-lng=''><?= $this->data['dictionary_page'][75][LANG]; ?></button>
                                <button class='pl-btn' data-address='Kraków, Muzeum Narodowe' data-lat='' data-lng=''><?= $this->data['dictionary_page'][76][LANG]; ?></button>
                                <button class='pl-btn' data-address='Kraków, MOCAK' data-lat='' data-lng=''><?= $this->data['dictionary_page'][77][LANG]; ?></button>
                                <button class='pl-btn' data-address='Kraków, Cricoteka' data-lat='' data-lng=''><?= $this->data['dictionary_page'][78][LANG]; ?></button>
                            </div>
                            <h3 class="category-place"><?= $this->data['dictionary_page'][65][LANG]; ?></h3>
                            <div class="place-btns">
                                <button class='pl-btn' data-address='Kraków, Kosciół na Skałce' data-lat='' data-lng=''><?= $this->data['dictionary_page'][79][LANG]; ?></button>
                                <button class='pl-btn' data-address='Kraków, Lody na Starowislanej' data-lat='' data-lng=''><?= $this->data['dictionary_page'][80][LANG]; ?></button>
                                <button class='pl-btn' data-address='Kraków, Cmentarz Żydowski' data-lat='' data-lng=''><?= $this->data['dictionary_page'][81][LANG]; ?></button>
                                <button class='pl-btn' data-address='Kraków, Singer' data-lat='' data-lng=''><?= $this->data['dictionary_page'][82][LANG]; ?></button>
                                <button class='pl-btn' data-address='Kraków, Alchemia' data-lat='' data-lng=''><?= $this->data['dictionary_page'][83][LANG]; ?></button>
                            </div>

       <!--                      <button id="more-places">Rozwiń</button>
                            <div class="hide"> 
                                <h3 class="category-place"><strong>muzea</strong><br>&nbsp;</h3>
                                <div class="place-btns">
                                    <button class='pl-btn' data-lat='' data-lng=''>Fabryka Schindlera</button>
                                    <button class='pl-btn' data-lat='' data-lng=''>Muzeum Narodowe</button>
                                    <button class='pl-btn' data-lat='' data-lng=''>MOCAK</button>
                                    <button class='pl-btn' data-lat='' data-lng=''>Cricoteka</button>
                                </div>
                                <h3 class="category-place"><strong>żydowski</strong><br>kazimierz</h3>
                                <div class="place-btns">
                                    <button class='pl-btn' data-lat='' data-lng=''>Kosciół na Skałce</button>
                                    <button class='pl-btn' data-lat='' data-lng=''>Lody na Starowislanej</button>
                                    <button class='pl-btn' data-lat='' data-lng=''>Cmentarz Żydowski</button>
                                    <button class='pl-btn' data-lat='' data-lng=''>Singer</button>
                                    <button class='pl-btn' data-lat='' data-lng=''>Alchemia</button>
                                </div>
                            </div> -->
                        </div>

                        */ ?>
                    </div>


                </div>
            </div> 

            <div class="booking-black">
                <?php require 'libs/templates/_elements/_booking_form.php'; ?>
            </div>

        </section>

<?php require 'libs/templates/_elements/_page_footer.php'; ?>

<?php
    $distance = $this->data['dictionary_page'][84][LANG];
    $time = $this->data['dictionary_page'][85][LANG];
    echo "<script>";
        echo "var dict = ['$distance', '$time'];";
        echo "console.log(dict);";
    echo "</script>";
?>
<script>
    var map,
    mapOptions = {lat: 50.052788,lng: 19.945304,zoom: 16,marker: '',address : 'Kraków, Miodowa 25',destination : ''},
    mapID = document.getElementById('map-figure');

      function initMap() {var directionsService = new google.maps.DirectionsService; var directionsDisplay = new google.maps.DirectionsRenderer;
        map = new google.maps.Map(mapID, {
          center: {lat: mapOptions.lat, lng: mapOptions.lng},
            disableDefaultUI: true,
          zoom: mapOptions.zoom
        });

        var marker = new google.maps.Marker({
            position: {lat: mapOptions.lat, lng: mapOptions.lng},
            icon: 'http://aparthotel.oberza.pl/public/images/marker2.png',
            map: map
          });

        directionsDisplay.setMap(map);
        directionsDisplay.setOptions( { suppressMarkers: true } );

        var btns = document.querySelectorAll('.pl-btn');
        var divs = document.querySelectorAll('div');
        var distanceTxt = document.getElementById('distance');
        var plTime = document.querySelector('.placetime');
        var plRoute = document.querySelector('.placeroute');

        [].forEach.call(btns, function(btn) {

            btn.addEventListener('click', function() {
                mapOptions.destination = this.dataset.address;
                // distanceTxt.classList.add('text');
                calculateAndDisplayRoute(directionsService, directionsDisplay);
            });
        });
        // document.getElementById('end').addEventListener('change', onChangeHandler);



        function cM(position) {
            var marker = new google.maps.Marker({
                position: position,
                map: map,
                icon: 'http://aparthotel.oberza.pl/public/images/end-2.png'
           });
        };

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            directionsService.route({
              origin: mapOptions.address,
              destination: mapOptions.destination,
              travelMode: 'WALKING',
            }, function(response, status) {
              if (status === 'OK') {
                var route = response.routes[0].legs[0]; 
                cM(route.end_location);
                directionsDisplay.setDirections(response);
                distanceTxt.classList.add('text');
                plTime.innerHTML = dict[0] + ' <br><strong>' + directionsDisplay.directions.routes[0].legs[0].distance.text + '</strong>';
                plRoute.innerHTML = dict[1] + ' <br><strong>' + directionsDisplay.directions.routes[0].legs[0].duration.text + '</strong>';

                // distanceTxt.innerHTML = dict[0] + ' ' + directionsDisplay.directions.routes[0].legs[0].distance.text + '<br>' + dict[1] + ' ' + directionsDisplay.directions.routes[0].legs[0].duration.text;
              } else {
                // window.alert('Directions request failed due to ' + status);
              }
        });


      }
    }


// var directionDisplay;
// var directionsService = new google.maps.DirectionsService();
// var map;

// function initialize() {

//     directionsDisplay = new google.maps.DirectionsRenderer();

//     var center = new google.maps.LatLng(0, 0);

//     var myOptions = {
//         zoom: 7,
//         mapTypeId: google.maps.MapTypeId.ROADMAP,
//         center: center
//     };

//     map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

//     var rendererOptions = {
//         map: map,
//         suppressMarkers: true
//     };

//     directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);

//     directionsDisplay.setMap(map);

//     var start = new google.maps.LatLng(59.33, 18.05);
//     var end = new google.maps.LatLng(59.40, 18.05);


//     var request = {
//         origin: start,
//         destination: end,
//         travelMode: google.maps.DirectionsTravelMode.DRIVING
//     };

//     directionsService.route(request, function (response, status) {
//         if (status == google.maps.DirectionsStatus.OK) {
            
//             var route = response.routes[0].legs[0]; 
            
//             createMarker(route.start_location);
//             createMarker(route.end_location);

//             directionsDisplay.setDirections(response);
//         }
//     });
// }

// function createMarker(position) {
//     var marker = new google.maps.Marker({
//         position: position,
//         map: map,
//         icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
//     });
// }

// initialize();

</script>
