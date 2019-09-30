<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="format-detection" content="telephone=no">
  <title>dawtona</title>
  <meta property="og:url" content="" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="" />
  <meta property="og:description" content="" />
  <meta property="og:image" content="" />

  <link rel="preload" href="dist/style.production.css" as="style">
  <link rel="preload" href="dist/main.min.js" as="script">
  <meta name="author" content="Sohaus, info@sohaus.pl">
  <link rel="stylesheet" href="dist/preloader.css">
  <link rel="stylesheet" href="dist/style.css">

  <script>
    var head = document.head;
    document.addEventListener("DOMContentLoaded", function(){
      document.querySelectorAll('[data-src]').forEach(function(img){
        img.src = img.dataset.src;
        img.removeAttribute('data-src');
        if(img.classList.contains('hide-preloader')) {
          document.body.classList.add('page-loaded');
          setTimeout(function(){
            document.querySelectorAll('[data-view]')[0].classList.add('view--animate-images');
          },260)
          setTimeout(function(){
            var preloader = document.getElementById('preloader');
            preloader.parentElement.removeChild(preloader);
          },1500);
          return;
        }
      })
      
    });
  </script>
</head>

<body>

<!-- preloader -->
<div id="preloader">
  
</div>
<script src="dist/preloader.js"></script>


<svg width="100%" height="100%" id="morph" viewBox="0 0 60 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;"><path d="M0,0l106.045,0c0,0 -39.284,0.836 -47.433,5.224c-8.149,4.388 -0.418,19.642 -17.97,27.164c-17.552,7.522 -29.672,5.224 -32.806,16.716c-3.135,11.493 -7.94,28.836 -7.836,28.836c0.104,0 0,-77.94 0,-77.94Z" style="stroke:#000;stroke-width:0px; fill: rgb(74, 218, 226);"/></svg>

  <!-- H E A D E R    C O M P O N E N T  src/components/_header.scss -->
  <header class="mheader" data-overflow-hidden>
    <div class="mheader__col">
      <a href="/">
        <img data-src="dist/assets/images/drugie-sniadanie-logo-head.png" class="mheader__logo" alt="Drugie Śniadanie Dawtona logo">
      </a>
    </div>
    <div class="mheader__col">

      <!-- M E N U   B U T T O N   C O M P O N E N T  src/components/_navigation.scss -->
      <button class="mnav-action-btn" id="nav-action">
        <span data-action="open">
        <div class="anim-svg-close position-relative">
            <img src="dist/assets/images/menu-text.png" alt="Menu" class="close-text" />
            <svg
              id="menu-btn"
              width="70"
              height="70"
              viewBox="0 0 34 34"
              version="1.1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              xml:space="preserve"
              xmlns:serif="http://www.serif.com/"
              style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"
            >
              <path
                d="M14.778,1.97c-4.656,0 -8.472,5.568 -10.464,11.448c-1.056,3.12 -1.632,6.312 -1.632,8.784c0,7.104 6.216,8.592 13.344,8.592c2.4,0 5.28,-0.528 7.944,-2.736c4.92,-4.08 6.504,-11.88 6.936,-16.584c0.384,-4.512 -9.024,-9.504 -16.128,-9.504Zm7.392,16.872l-10.56,0c-0.432,0 -0.768,-0.336 -0.768,-0.768c0,-0.432 0.336,-0.768 0.768,-0.768l10.56,0c0.432,0 0.768,0.336 0.768,0.768c0,0.432 -0.336,0.768 -0.768,0.768Zm0,-3.192l-10.56,0c-0.432,0 -0.768,-0.336 -0.768,-0.768c0,-0.432 0.336,-0.768 0.768,-0.768l10.56,0c0.432,0 0.768,0.336 0.768,0.768c0,0.432 -0.336,0.768 -0.768,0.768Z"
                style="fill:#fff;fill-rule:nonzero;"
              >
                <animate
                    attributeName="d"
                    keyTimes="0; .33; .66; 1"
                    dur="2s"
                    fill="freeze"
                    repeatCount="indefinite"
                    class="menu-path"
                />
              </path>
            </svg>
          </div>
          <!--
          <img data-src="dist/assets/images/menu-static.png" alt="" data-hover-state="static">
          <img data-src="dist/assets/images/menu-animate.gif" alt="" data-hover-state="hover">
            -->     
        </span>
        <span data-action="close">
          <div class="anim-svg-close position-relative">
            <img src="dist/assets/images/zamknij-text.png" alt="Zamknij" class="close-text" />
            <svg
              width="35"
              height="35"
              viewBox="0 -1 8 8"
              version="1.1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              xml:space="preserve"
              xmlns:serif="http://www.serif.com/"
              style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"
            >
              <path
                d="M2.122,0.595l4.243,4.243c0.375,0.375 0.375,0.982 0,1.357c-0.375,0.375 -0.983,0.375 -1.358,0l-4.242,-4.242c-0.375,-0.375 -0.375,-0.983 0,-1.358c0.375,-0.375 0.982,-0.375 1.357,0Z"
                style="fill:#fff;"
              >
              <animate
                  attributeName="d"
                  keyTimes="0; .33; .66; 1"
                  dur="1.5s"
                  fill="freeze"
                  repeatCount="indefinite"
                  class="p1"
              />
              </path>
              <path
                d="M6.365,0.765c0.375,0.375 0.375,0.982 0,1.357l-4.243,4.243c-0.375,0.375 -0.982,0.375 -1.357,0c-0.375,-0.375 -0.375,-0.983 0,-1.358l4.242,-4.242c0.375,-0.375 0.983,-0.375 1.358,0Z"
                style="fill:#fff;"
              >
                <animate
                  attributeName="d"
                  keyTimes="0; .33; .66; 1"
                  dur="1.5s"
                  fill="freeze"
                  repeatCount="indefinite"
                  class="p2"
                />
              </path>
            </svg>
          </div>
        </span>
        <!-- <img data-src="dist/assets/images/nav-btn-close.png" alt="" data-action="close"> -->
      </button>
      <button class="mnav-action-btn" id="nav-action-back">
        <div class="anim-svg-close anim-svg-close--move position-relative mt--30 svg-rotate-90">
          <img src="dist/assets/images/powrot-text.png" alt="Powrót" class="back-text back-text--m-position" />
          <svg
            width="49"
            height="39"
            viewBox="0 0 12 9"
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            xml:space="preserve"
            xmlns:serif="http://www.serif.com/"
            style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
              <path
                d="M4.31,3.548l3.343,-3.352c0.122,-0.128 0.292,-0.198 0.468,-0.196c0.174,-0.001 0.341,0.069 0.461,0.196l0.387,0.386c0.124,0.122 0.194,0.289 0.194,0.463c0,0.174 -0.07,0.341 -0.194,0.463l-1.505,1.515l3.614,0c0.166,-0.005 0.326,0.066 0.435,0.192c0.11,0.13 0.169,0.295 0.165,0.465l0,0.66c0.004,0.171 -0.055,0.337 -0.165,0.466c-0.108,0.127 -0.268,0.199 -0.435,0.194l-3.614,0l1.505,1.508c0.124,0.124 0.194,0.293 0.194,0.469c0,0.176 -0.07,0.345 -0.194,0.469l-0.387,0.384c-0.255,0.254 -0.674,0.254 -0.929,0l-3.343,-3.35c-0.124,-0.124 -0.192,-0.293 -0.189,-0.468c-0.006,-0.175 0.063,-0.343 0.189,-0.464Z"
                style="fill:#fff;"
              >
                <animate
                  attributeName="d"
                  keyTimes="0; .25; .5; .75; 1"
                  dur="1.5s"
                  repeatCount="indefinite"
                  class="p3"
                />
              </path>
            </svg>
          </div>
        <!-- <img data-src="dist/assets/images/back-btn.png" alt=""> -->
      </button>
    </div>
  </header>

  <!-- M E N U   C O N T E N T   C O M P O N E N T  src/components/_navigation.scss -->
  <nav class="mnav">
    <img data-src="dist/assets/images/malina-nav.png" alt="" class="decor-image" data-fruit="raspberry">
    <img data-src="dist/assets/images/kokos-nav.png" alt="" class="decor-image" data-fruit="coconut-nav">

    <div class="container">
      <div class="row">
        <div class="col-md-6 mnav__col mnav__border-decor">
          <ul class="mnav__links">
            <li>
              <a href="/dawtona/app/#1" class="mnav__link" data-category-number="1">
                <img data-src="dist/assets/images/nav-drugie-sniadanie.png" alt="">
                Drugie śniadanie?
              </a>
            </li>
            <li>
              <a href="/dawtona/app/#2" class="mnav__link" data-category-number="2">
                <img data-src="dist/assets/images/nav-musy-owocowe.png" alt="">
                Musy owocowe
              </a>
            </li>
            <li>
              <a href="/dawtona/app/#3" class="mnav__link" data-category-number="3">
                <img data-src="dist/assets/images/nav-musy-warzywne.png" alt="">
                Musy warzywne
              </a>
            </li>
            <li>
              <a href="/dawtona/app/#4" class="mnav__link" data-category-number="4">
                <img data-src="dist/assets/images/nav-musy-zboza.png" alt="">
                Musy+zboża
              </a>
            </li>
            <li>
              <a href="/dawtona/app/#5" class="mnav__link" data-category-number="5">
                <img data-src="dist/assets/images/nav-do-picia.png" alt="">
                Do picia
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-6 mnav__col">
          <ul class="mnav__links mnav__links--xs">
            <li>
              <a href="kontakt.php" class="mnav__link">
                Kontakt
              </a>
            </li>
            <li>
              <a href="#gdzie-kupic" class="mnav__link" data-scroll="footer" data-category-number="footer">
                Gdzie kupić
              </a>
            </li>
            <li>
              <a href="aktualnosci.php" class="mnav__link">
                Aktualności
              </a>
            </li>
            <li>
              <a href="polityka.php" class="mnav__link">
                Polityka prywatności
              </a>
            </li>
            <li class="mnav__socials">
              <a href="#facebook">
                <img data-src="dist/assets/images/icon-fb.png" alt="">
              </a>
              <a href="#twitter">
                <img data-src="dist/assets/images/icon-twitter.png" alt="">
              </a>
              <a href="#instagram">
                <img data-src="dist/assets/images/icon-instagram.png" alt="">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <figure class="text-center my-50">
      <img data-src="dist/assets/images/produkty-grupa-4-nav.png" alt="" class="maxw-90">
    </figure>
  </nav>

    <!-- V I E W    C O M P O N E N T  src/components/_view.scss -->
    <div id="view-container">
    
    <div id="view-scroll">

      <!-- VIEW SLIDER NAVIGATION -->
      <!-- <div class="view-navigation">
        <button class="view-navigation__action" data-slider-action="prev">
          <img data-src="dist/assets/images/prev.png" alt="">
        </button>
        <span class="view-navigation__current">01</span>
        <div class="view-navigation__separator"></div>
        <span>05</span>
        <button class="view-navigation__action" data-slider-action="next">
          <img data-src="dist/assets/images/next.png" alt="">
        </button>
      </div> -->

      <div class="view-navigation">
        <button class="view-navigation__action" data-slider-action="next">
          <img data-src="dist/assets/images/prev.png" alt="">
        </button>
        <span class="view-navigation__current">01</span>
        <div class="view-navigation__separator"></div>
        <span>05</span>
        <!-- <button class="view-navigation__action" data-slider-action="next">
          <img data-src="dist/assets/images/next.png" alt="">
        </button> -->
      </div>
      

      <!-- HOME VIEW - initial -->
      <div class="view view--active" data-view="home">

        <!-- S L I D E R   S E C T I O N  C O M P O N E N T  src/components/_slider-section.scss -->
        <section class="mslider fill-screen-min">
          <div class="mslider__key">
            <div class="container">
              <div class="row d-flex align-items-center">
                <div class="col-md-3 order-md-1 order-2">
                  <h2 class="mtitle mtitle--rot-xs mtitle--lh0-8 mtitle--fs-xl mt-mobile-60">
                    Drugie<br>
                    <span class="mtitle__m mtitle__xl--mobile">
                      śniadanie
                    </span>
                  </h2>
                  <!-- more button -->
                  <button class="mslider__more">
                    <!-- <span>
                      <img data-src="dist/assets/images/more-static.png" alt="" data-hover-state="static">
                      <img data-src="dist/assets/images/more-hover.gif" alt="" data-hover-state="hover">
                    </span>-->
                    <svg 
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="76px" height="75px"
                        id="svg"
                    >
                        <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                        d="M38.585,50.104 L50.663,38.030 C51.133,37.561 51.368,36.998 51.368,36.343 C51.368,35.699 51.133,35.143 50.663,34.674 L49.272,33.282 C48.826,32.813 48.270,32.578 47.602,32.578 C46.934,32.578 46.377,32.813 45.932,33.282 L40.477,38.716 L40.477,25.660 C40.477,25.018 40.246,24.495 39.782,24.093 C39.318,23.690 38.758,23.490 38.102,23.490 L35.728,23.490 C35.072,23.490 34.513,23.690 34.049,24.093 C33.585,24.495 33.353,25.018 33.353,25.660 L33.353,38.716 L27.917,33.282 C27.447,32.813 26.884,32.578 26.228,32.578 C25.573,32.578 25.010,32.813 24.540,33.282 L23.149,34.674 C22.691,35.156 22.462,35.712 22.462,36.343 C22.462,36.986 22.691,37.548 23.149,38.030 L35.227,50.104 C35.684,50.562 36.247,50.790 36.915,50.790 C37.595,50.790 38.152,50.562 38.585,50.104 Z" style="transform: none;"/>
                        <path
                          stroke="rgb(255, 255, 255)"
                          stroke-width="2px"
                          stroke-linecap="butt"
                          stroke-linejoin="miter"
                          fill="none"
                          d="M18.715,1.390 C39.760,-1.526 78.630,14.369 73.315,36.490 C68.000,58.612 57.830,73.519 52.515,72.890 C47.200,72.261 7.130,65.719 3.115,46.891 C-0.900,28.061 3.158,3.546 18.715,1.390 Z"
                          style="transform: none;"
                        >
                          <animate
                              class="anim"
                              attributeName="d"
                              keyTimes="0; .2; .5; .75; 1"
                              dur="2s"
                              fill="freeze"
                              repeatCount="indefinite"
                          />
                        </path> 
                    </svg>
                    WIĘCEJ
                  </button>
                </div>
                <div class="col-md-8 order-md-2 order-1">
                  <picture>
                    <source media="(max-width: 991px)" srcset="dist/assets/images/home-main-products-m.png">
                    <source media="(min-width: 992px)" srcset="dist/assets/images/home-main-products.png">
                    <img data-src="dist/assets/images/home-main-products.png" alt="" class="maxw-80 maxh-50-mobile maxh-30-mobile-xxs main-animate" data-paralax>
                  </picture>
                </div>
              </div>
            </div>
            <!-- next view -->
            <button class="mslider__next-view pt-mobile-90" data-slider-action="next">
              <img data-src="dist/assets/images/home-main-fruit-product.png" alt="" class="maxw-90">
            </button>
          </div>
        </section>

        <!-- S E C T I O N   C O M P O N E N T src/components/_sections.scss -->
        <section class="sec sec--main pt-150 pb-50">
          <div class="d-flex justify-content-start align-items-center flex-mobile-wrap">
            <div class="sec__col">
              <img data-src="dist/assets/images/bilberry-with-line-2.png" alt="" class="maxw-100 decor-image fade-hide" data-fruit="bilberry-small-with-line-2">
              <img data-src="dist/assets/images/hand.png" alt="" class="maxw-100 maxw-mobile fade-hide">
            </div>
            <div class="sec__col">
              <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-8 swing-hide">
                <span class="mtitle__before mb-20">
                  drugie śniadanie jest:
                </span>
                ZAWSZE<br>
                <span class="mtitle__xl">
                  POD RĘKĄ
                </span>
              </h2>
              <h3 class="mtitle mtitle--no-transform swing-hide">
                W wygodnym opakowaniu
              </h3>
            </div>
            <div class="sec__col for-desktop">
              <img data-src="dist/assets/images/pocket.png" alt="" class="maxw-100 fade-hide" data-paralax>
            </div>
          </div>
        </section>

        <!-- S E C T I O N   C O M P O N E N T src/components/_sections.scss -->
        <section class="sec sec--main-2 pt-60">
          <div class="d-flex justify-content-start align-items-start">
            <div class="sec__col text-right">
              <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-8 swing-hide">
                <span class="mtitle__before mb-20">
                  drugie śniadanie to:
                </span>
                100%<br>
                <span class="mtitle__xl">
                  Smaku
                </span>
              </h2>
              <h3 class="mtitle mtitle--fs-s mtitle--lh1 mt-20 swing-hide">
                Moc owoców <br>i warzyw
              </h3>
              <img data-src="dist/assets/images/billbery-with-line-3.png" alt="" class="decor-image fade-hide" data-fruit="bilberry-small-with-line-3">
              <img data-src="dist/assets/images/strawberry-rotate.png" alt="" class="decor-image fade-hide" data-fruit="strawberry-rotate" data-paralax>
            </div>
            <div class="sec__col text-center flex-fill">
              <img data-src="dist/assets/images/strawberry-splash.png" alt="" class="maxw-100 mt--180 hide-preloader fade-hide" data-paralax>
            </div>
          </div>
        </section>

        <!-- S E C T I O N   C O M P O N E N T src/components/_sections.scss -->
        <section class="sec sec--main-3 pb-80">
          <div class="d-flex justify-content-start align-items-stretch flex-mobile-wrap">
            <div class="sec__col">
              <picture>
                <source media="(max-width: 991px)" srcset="dist/assets/images/banan-kid-m.png">
                <source media="(min-width: 992px)" srcset="dist/assets/images/banan-kid.png">
                <img data-src="dist/assets/images/banan-kid.png" class="maxw-90 move-to-top-100 fade-hide">
              </picture>
            </div>
            <div class="sec__col sec__col--self-align-start">
              <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-8 mt-130 mt-mobile-0 swing-hide">
                <span class="mtitle__before mb-30">
                  drugie śniadanie jest:
                </span>
                Pożywne
              </h2>
              <h3 class="mtitle mtitle--no-transform mtitle--fs-s mtitle--lh1 mt-20 swing-hide">
                Szybka przekąska z dobrym składem 
              </h3>
              <img data-src="dist/assets/images/bilberry-with-line-4.png" alt="" class="decor-image fade-hide" data-fruit="bilberry-small-with-line-4">
              <img data-src="dist/assets/images/raspberry-rotate.png" alt="" class="decor-image fade-hide" data-fruit="raspberry-rotate" data-paralax>
            </div>
            <div class="sec__col text-center flex-fill for-desktop">
              <img data-src="dist/assets/images/mango.png" alt="" class="maxw-100 decor-image fade-hide" data-fruit="mango">
            </div>
          </div>
        </section>

        <!-- S E C T I O N   C O M P O N E N T src/components/_sections.scss -->
        <section class="sec sec--main-4 pb-10">
          <picture>
            <source media="(max-width: 991px)" srcset="dist/assets/images/banan-xl-m.png">
            <source media="(min-width: 992px)" srcset="dist/assets/images/banan-xl.png">
            <img data-src="dist/assets/images/banan-xl.png" alt="" class="decor-image fade-hide" data-fruit="banan-xl" data-paralax>
          </picture>
          
          <div class="d-flex justify-content-start align-items-start flex-mobile-wrap">
            <div class="sec__col sec__col--50 text-right mobile-order-2">
              <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-8 swing-hide">
                <span class="mtitle__before mb-30">
                  drugie śniadanie jest:
                </span>
                Naturalne
              </h2>
              <h3 class="mtitle mtitle--fs-s mtitle--lh1 mt-20 swing-hide">
              Wysokiej jakości składniki<br>bez dodatku cukru
              </h3>
              <picture>
                <source media="(max-width: 991px)" srcset="dist/assets/images/bilberry-with-line-5-m.png">
                <source media="(min-width: 992px)" srcset="dist/assets/images/bilberry-with-line-5.png">
                <img data-src="dist/assets/images/bilberry-with-line-5.png" alt="" class="decor-image fade-hide" data-fruit="bilberry-small-with-line-5">
              </picture>
            </div>
            <div class="sec__col sec__col sec__col--no-spacing-x text-right flex-fill mobile-order-1">
              <picture>
                <source media="(max-width: 991px)" srcset="dist/assets/images/woman-m.png">
                <source media="(min-width: 992px)" srcset="dist/assets/images/woman.png">
                <img data-src="dist/assets/images/woman.png" class="maxw-80 move-to-top-180 fade-hide">
              </picture>
            </div>
          </div>
        </section>

        <!-- S E C T I O N   C O M P O N E N T src/components/_sections.scss -->
        <!-- section summary -->
        <section class="sec sec--main-5 pb-80">
          <img data-src="dist/assets/images/bilberry-xxl.png" alt="" class="decor-image fade-hide" data-fruit="bilberry-main-xxl" data-paralax>

          <div class="text-center pt-mobile-260">
            <img data-src="dist/assets/images/drugie-sniadanie-logo-xxl.png" class="maxw-60 swing-hide" alt="">
            <h3 class="msubtitle mt-30">Dbamy o to, by Drugie Śniadanie było nie tylko smaczne, <br class="for-desktop">ale i pożywne. Stąd wzięło się kilka zasad, których się trzymamy.</h3>
          </div>

          <div class="container my-30">
            <div class="row" data-draw-lines>

              <div class="col-md-4 text-right for-desktop fade-hide">
                <figure><img data-src="dist/assets/images/main-no-sugar.png" alt="" class="maxw-100"></figure>
                <h2 class="small-title">
                  <small>bez dodatku</small><br>
                  cukru
                  <img data-src="dist/assets/images/bilberry-title.png" alt="" class="decor-image" data-fruit="bilberry-title">
                </h2>
                <h3 class="msubtitle mt-20">
                  Nie lubimy przesładzać. W naszych<br>przekąskach nie znajdziesz dodatku cukru.
                </h3>

                <h2 class="small-title mt-260">
                  <small>wysokiej jakości</small><br>
                  składniki
                  <img data-src="dist/assets/images/cherry-title.png" alt="" class="decor-image" data-fruit="cherry-title">
                </h2>
                <h3 class="msubtitle mt-20">
                  Starannie komponujemy<br>wszystkie receptury<br>Drugiego Śniadania.
                </h3>
              </div>

              <div class="col-md-4 text-center position-relative">
                <img src="dist/assets/images/line-1.png" class="line line--1" alt="">
                <img src="dist/assets/images/line-2.png" class="line line--2" alt="">
                <img src="dist/assets/images/line-3.png" class="line line--3" alt="">
                <img src="dist/assets/images/line-4.png" class="line line--4" alt="">
                <img src="dist/assets/images/line-6.png" class="line line--6" alt="">

                <picture>
                  <source media="(max-width: 991px)" srcset="dist/assets/images/product-summary-main-1-m.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/product-summary-main-1.png">
                  <img data-src="dist/assets/images/product-summary-main-1.png" class="maxw-100 maxw-60-mobile-pr fade-hide zindex-2 position-relative">
                </picture>

                <img src="dist/assets/images/line-5.png" class="line line--5" alt="">
              </div>

              <!-- slider tylko dla mobajla -->
              <div class="col-md-4 mobile px-0 position-relative">
                <div class="slider-summary text-center" data-slider="summary-1">
                  <div class="slider-summary__item my-30">
                    <figure><img data-src="dist/assets/images/main-no-sugar.png" alt="" class="maxw-100"></figure>
                    <h2 class="small-title">
                      <small>bez dodatku</small><br>
                      cukru
                    </h2>
                    <h3 class="msubtitle mt-20">
                      Nie lubimy przesładzać. W naszych<br>przekąskach nie znajdziesz dodatku cukru.
                    </h3>
                  </div>
                  <div class="slider-summary__item my-30">
                    <figure>
                      <img data-src="dist/assets/images/main-summary-fruits-group.png" alt="" class="maxw-80 fade-hide">
                    </figure>
                    <h2 class="small-title mt-30">
                      <small>bez zagęstników</small><br>
                      i konserwantów
                    </h2>
                    <h3 class="msubtitle mt-20">
                      Wierzymy, że warzywa i owoce bronią się same.<br>Nie stosujemy zagęstników czy konserwantów.
                    </h3>
                  </div>
                  <div class="slider-summary__item my-30">
                    <img data-src="dist/assets/images/drugie-sniadanie-prods.png" alt="" class="maxw-90 my-30 fade-hide">
                    <h2 class="small-title">
                      <small>praktyczne</small><br>
                      opakowania
                    </h2>
                    <h3 class="msubtitle mt-20">
                      Drugie Śniadanie ma nie tylko bezpieczne<br>(bez BPA!), ale też wygodne opakowanie<br>- możesz je zabrać tam, gdzie tylko chcesz.
                    </h3>
                  </div>
                </div>
                <div class="view-navigation view-navigation--summary">
                  <span class="view-navigation__current">01</span>
                  <div class="view-navigation__separator"></div>
                  <span>03</span>
                </div>
              </div>

              <div class="col-md-4 for-desktop fade-hide">
                <figure><img data-src="dist/assets/images/main-summary-fruits-group.png" alt="" class="maxw-70"></figure>
                <h2 class="small-title mt-30">
                  <small>bez zagęstników</small><br>
                  i konserwantów
                </h2>
                <h3 class="msubtitle mt-20">
                  Wierzymy, że warzywa i owoce bronią się same.<br>Nie stosujemy zagęstników czy konserwantów.
                </h3>
                <img data-src="dist/assets/images/drugie-sniadanie-prods.png" alt="" class="maxw-90 my-20">
                <h2 class="small-title">
                  <small>praktyczne</small><br>
                  opakowania
                </h2>
                <h3 class="msubtitle mt-20">
                  Drugie Śniadanie ma nie tylko bezpieczne<br>(bez BPA!), ale też wygodne opakowanie<br>- możesz je zabrać tam, gdzie tylko chcesz.
                </h3>
              </div>
            </div>
          </div>

          <div class="text-center swing-hide mt-80">
            <h2 class="mtitle mtitle--lh0-8">Dzięki Drugiemu</h2>
            <h3 class="mtitle mtitle--fs-s mtitle--lh1 mt-20">
              śniadaniu...
            </h3>
          </div>

          <div class="container my-30">
            <div class="row">

              <div class="col-md-4 text-right position-relative for-desktop fade-hide">
                <figure class="text-left mt--190"><img data-src="dist/assets/images/banan-m.png" alt="" class="maxw-100" data-paralax></figure>
                <h2 class="small-title">
                  Szybko uzupełnisz<br>
                  <small>składniki odżywcze</small>
                </h2>
                <h3 class="msubtitle mt-20">
                  Nasz organizm nie potrafi “przechowywać”<br>
                  niektórych składników odżywczych <br>
                  i witamin, dlatego warto je uzupełniać<br>
                  co kilka godzin.
                </h3>

                <h2 class="small-title mt-100">
                  Zachowasz <small>prawidłowy<br>
                  rytm codziennej diety</small>
                </h2>
                <h3 class="msubtitle mt-20">
                  Rezygnując z regularnych posiłków, dopuszczamy<br>do “napadów głodu” w czasie których<br>pochłaniamy zwykle za dużo kalorii.
                </h3>
                <img data-src="dist/assets/images/grain-title.png" alt="" class="decor-image" data-fruit="grain-title">
              </div>

              <div class="col-md-4 text-center-mobile">
                <picture>
                  <source media="(max-width: 991px)" srcset="dist/assets/images/main-summary-fruits-group-m.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/product-summary-main-2.png">
                  <img data-src="dist/assets/images/product-summary-main-2.png" class="maxw-100 fade-hide">
                </picture>
                <img data-src="" alt="" class="maxw-100">
              </div>

              <!-- slider tylko dla mobajla -->
              <div class="col-md-4 mobile px-0 position-relative">
                <div class="slider-summary text-center" data-slider="summary-2">
                    <div class="slider-summary__item my-30">
                      <figure class="text-left"><img data-src="dist/assets/images/banan-m.png" alt="" class="maxw-100 for-desktop" data-paralax></figure>
                      <h2 class="small-title small-title--lh0-6">
                        Szybko uzupełnisz<br>
                        <small>składniki odżywcze</small>
                      </h2>
                      <h3 class="msubtitle mt-20">
                        Nasz organizm nie potrafi “przechowywać”<br>
                        niektórych składników odżywczych <br>
                        i witamin, dlatego warto je uzupełniać<br>
                        co kilka godzin.
                      </h3>
                    </div>

                    <div class="slider-summary__item my-30">
                      <h2 class="small-title small-title--lh0-6 mt-100">
                        Zachowasz <small>prawidłowy<br>
                        rytm codziennej diety</small>
                      </h2>
                      <h3 class="msubtitle mt-20">
                        Rezygnując z regularnych posiłków, dopuszczamy<br>do “napadów głodu” w czasie których<br>pochłaniamy zwykle za dużo kalorii.
                      </h3>
                      <img data-src="dist/assets/images/grain-title.png" alt="" class="decor-image for-desktop" data-fruit="grain-title">
                    </div>

                    <div class="slider-summary__item my-30">
                      <figure class="text-right"><img data-src="dist/assets/images/banan-slice.png" alt="" class="maxw-100 for-desktop" data-paralax></figure>
                      <h2 class="small-title small-title--lh0-6 mt-90">
                        Zyskasz energię<br>
                        <small>
                          do działania i poprawisz<br>
                          swoją koncentrację
                        </small>
                      </h2>
                      <h3 class="msubtitle mt-20">
                        Zbyt długie przerwy między posiłkami wpływają na obniżenie naszej efektywności i spadek motywacji do działania. 
                        <img data-src="dist/assets/images/grain-light.png" alt="" class="decor-image" data-fruit="grain-light">
                      </h3>
                    </div>
                    <div class="slider-summary__item my-30">
                      <h2 class="small-title small-title--lh0-6 mt-100">
                        Zrezygnujesz<br>
                        <small>z niezdrowych przekąsek</small><br>
                      </h2>
                      <h3 class="msubtitle mt-20">
                        Kiedy jemy zbyt mało posiłków, łatwiej<br>sięgamy po nieprzemyślane “zapychacze”.
                        <img data-src="dist/assets/images/mint-2.png" alt="" class="decor-image" data-fruit="mint-2">
                      </h3>
                    </div>
                </div>
                <div class="view-navigation view-navigation--summary">
                  <span class="view-navigation__current">01</span>
                  <div class="view-navigation__separator"></div>
                  <span>04</span>
                </div>
              </div>

              <div class="col-md-4 for-desktop fade-hide">
                <figure class="text-right mt--190"><img data-src="dist/assets/images/banan-slice.png" alt="" class="maxw-100 fade-hide" data-paralax></figure>
                <h2 class="small-title mt-90">
                  Zyskasz energię<br>
                  <small>
                    do działania i poprawisz<br>
                    swoją koncentrację
                  </small>
                </h2>
                <h3 class="msubtitle mt-20">
                Zbyt długie przerwy między posiłkami wpływają na obniżenie naszej efektywności i spadek motywacji do działania.
                  <img data-src="dist/assets/images/grain-light.png" alt="" class="decor-image fade-hide" data-fruit="grain-light">
                </h3>

                <h2 class="small-title mt-100">
                  Zrezygnujesz<br>
                  <small>z niezdrowych przekąsek</small><br>
                </h2>
                <h3 class="msubtitle mt-20">
                  Kiedy jemy zbyt mało posiłków, łatwiej<br>sięgamy po nieprzemyślane “zapychacze”.
                  <img data-src="dist/assets/images/mint-2.png" alt="" class="decor-image fade-hide" data-fruit="mint-2">
                </h3>
              </div>
            </div>
          </div>
          <img data-src="dist/assets/images/bilberry-50.png" alt="" class="decor-image for-desktop fade-hide" data-fruit="bilberry-50" data-paralax>
        </section>

        <div class="view__images-area">
          <!-- fruits images -->
          <img data-src="dist/assets/images/home-main-strawbery.png" alt="" class="decor-image" data-fruit="strawberry-main" data-paralax>
          <img data-src="dist/assets/images/home-main-bilberry-small-with-line.png" alt="" class="decor-image" data-fruit="bilberry-small-with-line">
          <img data-src="dist/assets/images/home-main-bilberry-medium.png" alt="" class="decor-image" data-fruit="bilberry-main-medium" data-paralax>
          <img data-src="dist/assets/images/home-main-raspberry-small.png" alt="" class="decor-image" data-fruit="raspberry-main-small" data-paralax>
          <img data-src="dist/assets/images/home-main-raspberry-medium.png" alt="" class="decor-image" data-fruit="raspberry-main-medium" data-paralax>
          <img data-src="dist/assets/images/home-main-mint.png" alt="" class="decor-image" data-fruit="mint-main" data-paralax>
          <img data-src="dist/assets/images/home-main-peach.png" alt="" class="decor-image" data-fruit="peach-main" data-paralax>
        </div>

        <!-- F O O T E R    C O M P O N E N T  src/components/_footer.scss -->
        <footer class="mfooter pt-20 pb-60" data-overflow-hidden>
          <img data-src="dist/assets/images/produkty-grupa-4.png" alt="" class="maxw-90 fade-hide">
          <h2 class="mtitle mtitle--lh1">Gdzie kupić?</h2>
          <h3 class="msubtitle">Produkty Drugie Śniadanie można kupić w:</h3>
          <img data-src="dist/assets/images/truskawka-1.png" alt="" class="decor-image fade-hide" data-fruit="strawberry">
          <img data-src="dist/assets/images/burak-1.png" alt="" class="decor-image" data-fruit="beetroot">
          <picture>
            <source media="(max-width: 991px)" srcset="dist/assets/images/kokos-1-m.png">
            <source media="(min-width: 992px)" srcset="dist/assets/images/kokos-1.png">
            <img data-src="dist/assets/images/kokos-1.png" alt="" class="decor-image" data-fruit="coconut">
          </picture>
          
          <?php include 'baner-rotator.php'; ?>
        </footer>
        <div id="gdzie-kupic"></div>
        <!-- / footer -->
      </div>
      <!-- end HOME VIEW - initial -->

      <!-- FRUITS VIEW -->
      <div class="view" data-view="fruits">
        <!-- S L I D E R   S E C T I O N  C O M P O N E N T  src/components/_slider-section.scss -->
        <section class="mslider mslider--fruits fill-screen-min">
          <div class="mslider__key mslider__key--fruits">
            <div class="container">
              <div class="row d-flex align-items-center">
                <div class="col-md-3 offset-md-1 order-md-1 order-2 pt-160 pt-mobile-40">
                  <h2 class="mtitle mtitle--fs-xxxl mtitle--rot-xs mtitle--lh0-4">
                    MUS<br>
                    <span class="mtitle__m">
                      owocowy
                    </span>
                  </h2>
                  <!-- more button -->
                  <button class="mslider__more mt-mobile-30">
                    <!-- <span>
                      <img data-src="dist/assets/images/more-static.png" alt="" data-hover-state="static">
                      <img data-src="dist/assets/images/more-hover.gif" alt="" data-hover-state="hover">
                    </span> --><svg 
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="76px" height="75px"
                        id="svg"
                    >
                        <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                        d="M38.585,50.104 L50.663,38.030 C51.133,37.561 51.368,36.998 51.368,36.343 C51.368,35.699 51.133,35.143 50.663,34.674 L49.272,33.282 C48.826,32.813 48.270,32.578 47.602,32.578 C46.934,32.578 46.377,32.813 45.932,33.282 L40.477,38.716 L40.477,25.660 C40.477,25.018 40.246,24.495 39.782,24.093 C39.318,23.690 38.758,23.490 38.102,23.490 L35.728,23.490 C35.072,23.490 34.513,23.690 34.049,24.093 C33.585,24.495 33.353,25.018 33.353,25.660 L33.353,38.716 L27.917,33.282 C27.447,32.813 26.884,32.578 26.228,32.578 C25.573,32.578 25.010,32.813 24.540,33.282 L23.149,34.674 C22.691,35.156 22.462,35.712 22.462,36.343 C22.462,36.986 22.691,37.548 23.149,38.030 L35.227,50.104 C35.684,50.562 36.247,50.790 36.915,50.790 C37.595,50.790 38.152,50.562 38.585,50.104 Z" style="transform: none;"/>
                        <path
                          stroke="rgb(255, 255, 255)"
                          stroke-width="2px"
                          stroke-linecap="butt"
                          stroke-linejoin="miter"
                          fill="none"
                          d="M18.715,1.390 C39.760,-1.526 78.630,14.369 73.315,36.490 C68.000,58.612 57.830,73.519 52.515,72.890 C47.200,72.261 7.130,65.719 3.115,46.891 C-0.900,28.061 3.158,3.546 18.715,1.390 Z"
                          style="transform: none;"
                        >
                          <animate
                              class="anim"
                              attributeName="d"
                              keyTimes="0; .2; .5; .75; 1"
                              dur="2s"
                              fill="freeze"
                              repeatCount="indefinite"
                          />
                        /> 
                    </svg>
                    WIĘCEJ
                  </button>
                </div>
                <div class="col-md-8 order-md-2 order-1">
                  <div class="packshot">
                    <div class="packshot__el">
                      <div class="maxw-30 packshot__decor packshot__decor--dots-top top-path">
                        <img data-src="dist/assets/images/malina--1.png" alt="" class="maxw-100">
                      </div>
                      <div class="maxw-30 packshot__decor packshot__decor--dots-bottom bottom-path">
                        <img data-src="dist/assets/images/malina--3.png" alt="" class="maxw-100">
                      </div>
                      <img data-src="dist/assets/images/malina--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                      <img data-src="dist/assets/images/malina--4.png" alt="" class="packshot__decor packshot__decor--element" data-paralax>
                    </div>
                  </div>
                  <!-- <img data-src="dist/assets/images/mus-owocowy-main.png" alt="" class="maxw-90 maxh-65-mobile main-animate" data-paralax> -->
                </div>
              </div>
            </div>
            <!-- next view -->
            <button class="mslider__next-view pt-mobile-120" data-slider-action="next">
              <img data-src="dist/assets/images/fruits-main-vege-product.png" alt="" class="maxw-90">
            </button>
          </div>
        </section>

        <!-- Malina szczegóły pierwszego produktu -->
        <section class="first-p-details">
          <!-- malina view -->
          <div class="pslider__slide pslider__slide--visible">
            <!-- malina first section -->
            <div class="container-fluid position-relative" data-bg="fruits-first">
              <img data-src="dist/assets/images/home-main-raspberry-medium.png" alt="" class="decor-image" data-fruit="slider-fruit-raspberry-1" data-paralax>
              <img data-src="dist/assets/images/home-main-raspberry-medium.png" alt="" class="decor-image mobile" data-fruit="slider-fruit-raspberry-2" data-paralax>

              <div class="container">
                <div class="row align-items-center">
                  <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                    <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-4">
                      malina<br>
                      <span class="mtitle__xs">jagoda, jabłko, banan</span>
                    </h2>
                    <h3 class="msubtitle mt-40">Intensywny smak owoców leśnych.</h3>
                    <span class="decor-line"></span>
                    <br>
                    <picture>
                      <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-malina-m.png">
                      <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-malina.png">
                      <img data-src="dist/assets/images/sklad-malina.png" alt="" class="maxw-90">
                    </picture>
                  </div>
                  <div class="col-md-4 order-md-2 order-1 text-center">
                    <div class="packshot">
                      <div class="packshot__el">
                        <!-- <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20"> -->
                        <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                        <img data-src="dist/assets/images/malina-jagoda--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                        <img data-src="dist/assets/images/malina-jagoda--4.png" alt="" class="packshot__decor packshot__decor--element ml-60 ml-mobile-10" data-paralax>
                      </div>
                    </div>
                    <!-- <img data-src="dist/assets/images/malina-slide.png" alt="" class="maxw-90 maxh-65-mobile"> -->
                  </div>
                  <div class="col-md-4 order-md-3 order-3">
                    <div class="container text-center">
                      <div class="row">
                        <div class="col-6">
                          <h3 class="msubtitle ">
                            <strong>ENERGIA</strong>
                          </h3>
                          <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                            51 kcal
                          </h2>
                          <span class="decor-line decor-line--50"></span>

                          <h3 class="msubtitle">
                            <strong>TŁUSZCZE</strong>
                          </h3>
                          <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                            0 g
                          </h2>
                        </div>
                        <div class="col-6">
                          <h3 class="msubtitle">
                            <strong>WITAMINA C</strong>
                          </h3>
                          <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                            22 mg
                          </h2>
                          <span class="decor-line decor-line--50"></span>

                          <h3 class="msubtitle">
                            <strong>WĘGLOWODANY</strong>
                          </h3>
                          <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                            11 g
                          </h2>
                        </div>
                      </div>
                    </div>
                    <figure class="text-left">
                      <img data-src="dist/assets/images/home-main-raspberry-small.png" alt="" class="mt-30 for-desktop" data-paralax>
                    </figure>
                  </div>
                </div>
              </div>
            </div>
            <div class="more-products">
              <h2 class="mtitle">
                poznaj inne smaki
              </h2>
              <img data-src="dist/assets/images/banan-xxl.png" alt="" class="decor-image" data-fruit="banan-xxl">
              <img data-src="dist/assets/images/rasberry-xxl.png" alt="" class="decor-image" data-fruit="rasberry-xxl">
            </div>
          </div>
        </section>

        <!-- P R O D U C T S  L I S T  C O M P O N E N T  src/components/_products-list.scss -->
        <!-- malina products list --> 
        <div class="products-list">
          <div class="products-list__el">
            <img data-src="dist/assets/images/mus-wisnia.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
            <img data-src="dist/assets/images/banan-malina-wisnia-marakuja-hover.png" alt="" class="products-list__hover-image" data-hover="wisnia-hover-1" data-delay="1">
            <img data-src="dist/assets/images/wisnia-wisnia-hover.png" alt="" class="products-list__hover-image" data-hover="wisnia-hover-2" data-delay="2">
            <img data-src="dist/assets/images/jablko-wisnia-hover.png" alt="" class="products-list__hover-image" data-hover="wisnia-hover-3" data-delay="3">
            <a href="#" class="products-list__show" data-init-category="fruits" data-product="2"></a>
          </div>
          <div class="products-list__el">
            <img data-src="dist/assets/images/mus-mango.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
            <img data-src="dist/assets/images/mango-mango-hover.png" alt="" class="products-list__hover-image" data-hover="mango-mango-hover-1" data-delay="1">
            <img data-src="dist/assets/images/jablko-mango-hover.png" alt="" class="products-list__hover-image" data-hover="apple-mango-hover-2" data-delay="2">
            <a href="#" class="products-list__show" data-init-category="fruits" data-product="3"></a>
          </div>
          <div class="products-list__el">
            <img data-src="dist/assets/images/mus-gruszka.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
            <img data-src="dist/assets/images/jablko-gruszka-hover.png" alt="" class="products-list__hover-image" data-hover="gruszka-hover-1" data-delay="1">
            <img data-src="dist/assets/images/gruszka-gruszka-hover.png" alt="" class="products-list__hover-image" data-hover="gruszka-hover-2" data-delay="2">
            <a href="#" class="products-list__show" data-init-category="fruits" data-product="4"></a>
          </div>
          <div class="products-list__el">
            <img data-src="dist/assets/images/mus-marakuja.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
            <img data-src="dist/assets/images/banan-malina-wisnia-marakuja-hover.png" alt="" class="products-list__hover-image" data-hover="marakuja-hover-1" data-delay="1">
            <img data-src="dist/assets/images/brzoskwinia-marakuja-hover.png" alt="" class="products-list__hover-image" data-hover="marakuja-hover-2" data-delay="2">
            <a href="#" class="products-list__show" data-init-category="fruits" data-product="5"></a>
          </div>
          <div class="products-list__el">
            <img data-src="dist/assets/images/mus-truskawka.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">  
            <img data-src="dist/assets/images/banan-malina-wisnia-marakuja-hover.png" alt="" class="products-list__hover-image" data-hover="truskawka-hover-1" data-delay="1">
            <img data-src="dist/assets/images/jablko-truskawka-hover.png" alt="" class="products-list__hover-image" data-hover="truskawka-hover-2" data-delay="2">
            <img data-src="dist/assets/images/truskawka-truskawka-hover.png" alt="" class="products-list__hover-image" data-hover="truskawka-hover-3" data-delay="3">
            <a href="#" class="products-list__show" data-init-category="fruits" data-product="6"></a>
          </div>
          <div class="products-list__el products-list__el--more">
            <h2 class="mtitle mtitle--lh1">
              <span class="mtitle__s d-block">Poznaj nasze musy </span>
              <span class="mtitle__xl">warzywne</span>
            </h2>
            <img data-src="dist/assets/images/arr-right.png" alt="" class="pt-40 pl-80 pt-mobile-20 pl-mobile-30">
            <a href="#" data-next-products="3"></a>
          </div>
        </div>

        <div class="view__images-area">
          <!-- fruits images -->
          <!-- <img data-src="dist/assets/images/home-main-bilberry-small-with-line.png" alt="" class="decor-image" data-fruit="bilberry-small-with-line--fruits"> -->
          <img data-src="dist/assets/images/fruits-banan.png" alt="" class="decor-image" data-fruit="bilberry-main-medium" data-paralax>
          <img data-src="dist/assets/images/home-main-raspberry-medium.png" alt="" class="decor-image" data-fruit="raspberry-main-medium--fruits" data-paralax>
          <img data-src="dist/assets/images/fruits-strawberry.png" alt="" class="decor-image" data-fruit="fruits-strawberry" data-paralax>
          <img data-src="dist/assets/images/fruits-peach-blur.png" alt="" class="decor-image" data-fruit="peach-blur" data-paralax>
        </div>

        <!-- F O O T E R    C O M P O N E N T  src/components/_footer.scss -->
        <footer class="mfooter mfooter--fruits py-60" data-overflow-hidden>
          <img data-src="dist/assets/images/produkty-grupa-4.png" alt="" class="maxw-70">
          <h2 class="mtitle mtitle--lh1">Gdzie kupić?</h2>
          <h3 class="msubtitle">Produkty Drugie Śniadanie można kupić w:</h3>

          <img data-src="dist/assets/images/fruit-footer-banan-1.png" alt="" class="decor-image" data-fruit="fruit-footer-banan-1">
          <img data-src="dist/assets/images/fruit-footer-banan-2.png" alt="" class="decor-image" data-fruit="fruit-footer-banan-2">
          <img data-src="dist/assets/images/fruit-footer-raspberry.png" alt="" class="decor-image" data-fruit="fruit-footer-raspberry">


          <?php include 'baner-rotator.php'; ?>
        </footer>
        <!-- / footer -->
      </div>
      <!-- end FRUITS VIEW -->

      <!-- VEGETABLES VIEW -->
      <div class="view" data-view="vegetables">
        <!-- S L I D E R   S E C T I O N  C O M P O N E N T  src/components/_slider-section.scss -->
        <section class="mslider mslider--vegetables fill-screen-min">
          <div class="mslider__key mslider__key--fruits">
            <div class="container">
              <div class="row d-flex align-items-center">
                <div class="col-md-3 offset-md-1 order-md-1 order-2 pt-160 pt-mobile-10">
                  <h2 class="mtitle mtitle--fs-xxxl mtitle--rot-xs mtitle--lh1 text-right text-center-mobile pr-40 pr-mobile-0">
                    MUS<br>
                    <span class="mtitle__s d-block">
                      owocowo<br>-warzywny
                    </span>
                  </h2>
                  <!-- more button -->
                  <button class="mslider__more mt-mobile-30">
                    <!-- <span>
                      <img data-src="dist/assets/images/more-static.png" alt="" data-hover-state="static">
                      <img data-src="dist/assets/images/more-hover.gif" alt="" data-hover-state="hover">
                    </span> --><svg 
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="76px" height="75px"
                        id="svg"
                    >
                        <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                        d="M38.585,50.104 L50.663,38.030 C51.133,37.561 51.368,36.998 51.368,36.343 C51.368,35.699 51.133,35.143 50.663,34.674 L49.272,33.282 C48.826,32.813 48.270,32.578 47.602,32.578 C46.934,32.578 46.377,32.813 45.932,33.282 L40.477,38.716 L40.477,25.660 C40.477,25.018 40.246,24.495 39.782,24.093 C39.318,23.690 38.758,23.490 38.102,23.490 L35.728,23.490 C35.072,23.490 34.513,23.690 34.049,24.093 C33.585,24.495 33.353,25.018 33.353,25.660 L33.353,38.716 L27.917,33.282 C27.447,32.813 26.884,32.578 26.228,32.578 C25.573,32.578 25.010,32.813 24.540,33.282 L23.149,34.674 C22.691,35.156 22.462,35.712 22.462,36.343 C22.462,36.986 22.691,37.548 23.149,38.030 L35.227,50.104 C35.684,50.562 36.247,50.790 36.915,50.790 C37.595,50.790 38.152,50.562 38.585,50.104 Z" style="transform: none;"/>
                        <path
                          stroke="rgb(255, 255, 255)"
                          stroke-width="2px"
                          stroke-linecap="butt"
                          stroke-linejoin="miter"
                          fill="none"
                          d="M18.715,1.390 C39.760,-1.526 78.630,14.369 73.315,36.490 C68.000,58.612 57.830,73.519 52.515,72.890 C47.200,72.261 7.130,65.719 3.115,46.891 C-0.900,28.061 3.158,3.546 18.715,1.390 Z"
                          style="transform: none;"
                        >
                          <animate
                              class="anim"
                              attributeName="d"
                              keyTimes="0; .2; .5; .75; 1"
                              dur="2s"
                              fill="freeze"
                              repeatCount="indefinite"
                          />
                        /> 
                    </svg>
                    WIĘCEJ
                  </button>
                </div>
                <div class="col-md-8 order-md-2 order-1">
                  <div class="packshot">
                    <div class="packshot__el">
                      <div class="maxw-30 packshot__decor packshot__decor--dots-top top-path">
                        <img data-src="dist/assets/images/malina--1.png" alt="" class="maxw-100">
                      </div>
                      <div class="maxw-30 packshot__decor packshot__decor--dots-bottom bottom-path">
                        <img data-src="dist/assets/images/malina--3.png" alt="" class="maxw-100">
                      </div>
                      <img data-src="dist/assets/images/cukinia--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                      <img data-src="dist/assets/images/cukinia--4.png" alt="" class="packshot__decor packshot__decor--element packshot__decor--element-2" data-paralax>
                    </div>
                  </div>
                  <!-- <img data-src="dist/assets/images/mus-warzywny-main.png" alt="" class="maxw-90 maxh-65-mobile main-animate" data-paralax> -->
                </div>
              </div>
            </div>
            <!-- next view -->
            <button class="mslider__next-view pt-mobile-120" data-slider-action="next">
              <img data-src="dist/assets/images/vege-main-porridge-product.png" alt="" class="maxw-90">
            </button>
          </div>
        </section>

        <!-- Cukinia szczegóły pierwszego produktu -->
        <section class="first-p-details">
          <div class="pslider__slide pslider__slide--visible">
            <!-- cukinia kiwi szpinak first section -->
            <div class="container-fluid position-relative pb-60" data-bg="vegetables-first">
              <img data-src="dist/assets/images/kiwi-xs.png" alt="" class="decor-image" data-fruit="slider-kiwi-xs" data-paralax>
              <img data-src="dist/assets/images/kiwi-xs.png" alt="" class="decor-image mobile" data-fruit="slider-kiwi-xs-2" data-paralax>
              <img data-src="dist/assets/images/vegetables-banan-rotate.png" alt="" class="decor-image" data-fruit="slider-vege-banan" data-paralax>

              <img data-src="dist/assets/images/banan-cukinia-mobile.png" alt="" class="decor-image mobile" data-fruit="banan-courgette-mobile" data-paralax>
              <img data-src="dist/assets/images/jablko-cukinia-mobile.png" alt="" class="decor-image mobile" data-fruit="apple-courgette-mobile" data-paralax>
              <img data-src="dist/assets/images/lisc-cukinia-mobile.png" alt="" class="decor-image mobile" data-fruit="leaf-courgette-mobile" data-paralax>

              <div class="container">
                <div class="row align-items-center">
                  <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                    <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-4">
                      cukinia<br>
                      <span class="mtitle__xs">kiwi, szpinak, jabłko, banan</span>
                    </h2>
                    <h3 class="msubtitle msubtitle--light-color mt-40">Zielona, warzywno-owocowa<br>bomba witaminowa.</h3>
                    <span class="decor-line"></span>
                    <br>
                    <picture>
                      <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-cukinia-kiwi-szpinak-m.png">
                      <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-cukinia-kiwi-szpinak.png">
                      <img data-src="dist/assets/images/sklad-cukinia-kiwi-szpinak.png" alt="" class="maxw-90">
                    </picture>
                  </div>
                  <div class="col-md-4 order-md-2 order-1 text-center">
                    <div class="packshot">
                      <div class="packshot__el">
                        <!-- <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20"> -->
                        <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                        <img data-src="dist/assets/images/cukinia-szpinak--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                        <img data-src="dist/assets/images/marchew-mango--4.png" alt="" class="packshot__decor packshot__decor--element packshot__decor--element--3 ml-50 ml-mobile-10" data-paralax>
                      </div>
                    </div>
                    <!-- <img data-src="dist/assets/images/cukinia-kiwi-szpinak-slide.png" alt="" class="maxw-90 maxh-65-mobile" data-paralax> -->
                  </div>
                  <div class="col-md-4 order-md-3 order-3">
                    <div class="container text-center">
                      <div class="row">
                        <div class="col-6">
                          <h3 class="msubtitle msubtitle--light-color">
                            <strong>ENERGIA</strong>
                          </h3>
                          <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                            46 kcal
                          </h2>
                          <span class="decor-line decor-line--50"></span>

                          <h3 class="msubtitle msubtitle--light-color">
                            <strong>TŁUSZCZE</strong>
                          </h3>
                          <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                            0 g
                          </h2>
                        </div>
                        <div class="col-6">
                          <h3 class="msubtitle msubtitle--light-color">
                            <strong>WITAMINA C</strong>
                          </h3>
                          <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                            24 mg
                          </h2>
                          <span class="decor-line decor-line--50"></span>

                          <h3 class="msubtitle msubtitle--light-color">
                            <strong>WĘGLOWODANY</strong>
                          </h3>
                          <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                            10 g
                          </h2>
                        </div>
                      </div>
                    </div>
                    <figure class="text-left">
                      <img data-src="dist/assets/images/kiwi-xs-rotate.png" alt="" class="mt-30 for-desktop" data-paralax>
                    </figure>
                  </div>
                </div>
              </div>
            </div>
            <div class="more-products more-products--vegetables">
              <h2 class="mtitle">
                poznaj inne smaki
              </h2>
              <img data-src="dist/assets/images/banan-xxl.png" alt="" class="decor-image" data-fruit="banan-xxl">
              <img data-src="dist/assets/images/vegetables-jablko-more-products.png" alt="" class="decor-image" data-fruit="vegetables-apple-slice">
            </div>
          </div>
        </section>

        <!-- P R O D U C T S  L I S T  C O M P O N E N T  src/components/_products-list.scss -->
        <div class="products-list">
          <div class="products-list__el products-list__el--vegetables">
            <img data-src="dist/assets/images/mus-dynia.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
            <img data-src="dist/assets/images/vege-green-apple-hover.png" alt="" class="products-list__hover-image" data-hover="dynia-hover-1" data-delay="1">
            <img data-src="dist/assets/images/vege-banan-hover.png" alt="" class="products-list__hover-image" data-hover="dynia-hover-2" data-delay="2">
            <img data-src="dist/assets/images/vege-green-dynia-hover.png" alt="" class="products-list__hover-image" data-hover="dynia-hover-3" data-delay="3">
            <a href="#" class="products-list__show" data-init-category="vegetables" data-product="2"></a>
          </div>
          <div class="products-list__el products-list__el--vegetables">
            <img data-src="dist/assets/images/mus-marchew.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
            <img data-src="dist/assets/images/carrot-hover-1.png" alt="" class="products-list__hover-image" data-hover="marchew-hover-1" data-delay="1">
            <img data-src="dist/assets/images/mango-hover-2.png" alt="" class="products-list__hover-image" data-hover="marchew-hover-2" data-delay="2">
            <img data-src="dist/assets/images/green-apple-hover-3.png" alt="" class="products-list__hover-image" data-hover="marchew-hover-3" data-delay="3">

            <a href="#" class="products-list__show" data-init-category="vegetables" data-product="3"></a>
          </div>
          <div class="products-list__el products-list__el--more products-list__el--vegetables-more">
            <h2 class="mtitle mtitle--lh1">
              <span class="mtitle__s d-block">Poznaj nasze musy </span>
              <span class="mtitle__xl">Mus+zboża</span>
            </h2>
            <img data-src="dist/assets/images/arr-right.png" alt="" class="pt-40 pl-80 pt-mobile-20 pl-mobile-30">
            <a href="#" data-next-products="4"></a>
          </div>
        </div>

        <div class="view__images-area">
          <!-- vegetables images -->
          <img data-src="dist/assets/images/fruits-banan.png" alt="" class="decor-image" data-fruit="bilberry-main-medium" data-paralax>
          <img data-src="dist/assets/images/vege-apple-slice.png" alt="" class="decor-image" data-fruit="vege-apple-slice" data-paralax>
          <img data-src="dist/assets/images/kiwi-s.png" alt="" class="decor-image" data-fruit="kiwi-s" data-paralax>
          <picture>
            <source media="(max-width: 991px)" srcset="dist/assets/images/vege-mango-slice-m.png">
            <source media="(min-width: 992px)" srcset="dist/assets/images/vege-mango-slice.png">
            <img data-src="dist/assets/images/vege-mango-slice.png" alt="" class="decor-image" data-fruit="vege-mango-slice" data-paralax>
          </picture>
        </div>

        <!-- F O O T E R    C O M P O N E N T  src/components/_footer.scss -->
        <footer class="mfooter mfooter--vegetables py-60" data-overflow-hidden>
          <img data-src="dist/assets/images/produkty-grupa-4.png" alt="" class="maxw-70">
          <h2 class="mtitle">Gdzie kupić?</h2>
          <h3 class="msubtitle msubtitle--light-color">Produkty Drugie Śniadanie można kupić w:</h3>

          <img data-src="dist/assets/images/marchewka.png" alt="" class="decor-image" data-fruit="carrot">
          <img data-src="dist/assets/images/fruit-footer-banan-2.png" alt="" class="decor-image" data-fruit="fruit-footer-banan-2">


          <?php include 'baner-rotator.php'; ?>
          <img data-src="dist/assets/images/vegetable-footer-decor.png" alt="" class="decor-image" data-fruit="vegetable-fruit-decor">
        </footer>
        <!-- / footer -->
      </div>
      <!-- end VEGETABLES VIEW -->

      <!-- PORRIDGE VIEW -->
      <div class="view" data-view="porridge">
        <!-- S L I D E R   S E C T I O N  C O M P O N E N T  src/components/_slider-section.scss -->
        <section class="mslider mslider--porridge fill-screen-min">

          <div class="mslider__key mslider__key--fruits">
            <div class="container">
              <div class="row d-flex align-items-center">
                <div class="col-md-3 offset-md-1 order-md-1 order-2 pt-160 pt-mobile-40 position-relative">
                  <img data-src="dist/assets/images/ziarno-1.png" alt="" class="decor-image for-desktop" data-fruit="porridge-grain-1" data-paralax>
                  <img data-src="dist/assets/images/ziarno-2.png" alt="" class="decor-image" data-fruit="porridge-grain-2" data-paralax>
                  <img data-src="dist/assets/images/ziarno-3.png" alt="" class="decor-image" data-fruit="porridge-grain-3" data-paralax>

                  <h2 class="mtitle mtitle--dark-color mtitle--fs-xxxl mtitle--rot-xs mtitle--lh1 text-right text-center-mobile pr-50 pr-mobile-0">
                    <span class="mtitle__ms d-block">MUS +<br></span>
                    <span class="mtitle__xxl d-block">
                      zboża
                    </span>
                  </h2>
                  <!-- more button -->
                  <button class="mslider__more mslider__open-fruit-details--dark mt-mobile-30">
                    <!--<span>
                      <img data-src="dist/assets/images/more-static.png" alt="" data-hover-state="static">
                      <img data-src="dist/assets/images/more-hover.gif" alt="" data-hover-state="hover">
                    </span> -->
                    <svg 
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="76px" height="75px"
                        id="svg"
                    >
                        <path fill-rule="evenodd"  fill="#87196d"
                        d="M38.585,50.104 L50.663,38.030 C51.133,37.561 51.368,36.998 51.368,36.343 C51.368,35.699 51.133,35.143 50.663,34.674 L49.272,33.282 C48.826,32.813 48.270,32.578 47.602,32.578 C46.934,32.578 46.377,32.813 45.932,33.282 L40.477,38.716 L40.477,25.660 C40.477,25.018 40.246,24.495 39.782,24.093 C39.318,23.690 38.758,23.490 38.102,23.490 L35.728,23.490 C35.072,23.490 34.513,23.690 34.049,24.093 C33.585,24.495 33.353,25.018 33.353,25.660 L33.353,38.716 L27.917,33.282 C27.447,32.813 26.884,32.578 26.228,32.578 C25.573,32.578 25.010,32.813 24.540,33.282 L23.149,34.674 C22.691,35.156 22.462,35.712 22.462,36.343 C22.462,36.986 22.691,37.548 23.149,38.030 L35.227,50.104 C35.684,50.562 36.247,50.790 36.915,50.790 C37.595,50.790 38.152,50.562 38.585,50.104 Z" style="transform: none;"/>
                        <path
                          stroke="#87196d"
                          stroke-width="2px"
                          stroke-linecap="butt"
                          stroke-linejoin="miter"
                          fill="none"
                          d="M18.715,1.390 C39.760,-1.526 78.630,14.369 73.315,36.490 C68.000,58.612 57.830,73.519 52.515,72.890 C47.200,72.261 7.130,65.719 3.115,46.891 C-0.900,28.061 3.158,3.546 18.715,1.390 Z"
                          style="transform: none;"
                        >
                          <animate
                              class="anim"
                              attributeName="d"
                              keyTimes="0; .2; .5; .75; 1"
                              dur="2s"
                              fill="freeze"
                              repeatCount="indefinite"
                          />
                        /> 
                    </svg>
                    WIĘCEJ
                  </button>
                </div>
                <div class="col-md-8 order-md-2 order-1 position-relative">
                  <img data-src="dist/assets/images/raisin.png" alt="" class="decor-image" data-fruit="raisin" data-paralax>
                  <div class="packshot">
                    <div class="packshot__el">
                      <div class="maxw-30 packshot__decor packshot__decor--dots-top top-path">
                        <img data-src="dist/assets/images/malina--1.png" alt="" class="maxw-100">
                      </div>
                      <div class="maxw-30 packshot__decor packshot__decor--dots-bottom bottom-path">
                        <img data-src="dist/assets/images/malina--3.png" alt="" class="maxw-100">
                      </div>
                      <img data-src="dist/assets/images/wisnia---2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                      <img data-src="dist/assets/images/wisnia---4.png" alt="" class="packshot__decor packshot__decor--element packshot__decor--element-2" data-paralax>
                    </div>
                  </div>
                  <!-- <img data-src="dist/assets/images/owsianka-main.png" alt="" class="maxw-100 maxh-65-mobile main-animate" data-paralax> -->
                </div>
              </div>
            </div>
            <!-- next view -->
            <button class="mslider__next-view pt-mobile-120" data-slider-action="next">
              <img data-src="dist/assets/images/porridge-main-beverages-product.png" alt="" class="maxw-90">
            </button>
          </div>
        </section>

        <!-- Wiśnia daktyle szczegóły pierwszego produktu -->
        <section class="first-p-details">
          <!-- owsianka wiśnia płatki kakao view -->
          <div class="pslider__slide pslider__slide--visible">
            <!-- owsianka wiśnia płatki kakao first section -->
            <div class="container-fluid position-relative" data-bg="porrdiges-first">
              <img data-src="dist/assets/images/porridge-banan-slice-3.png" alt="" class="decor-image" data-fruit="porridge-banan-slice-3" data-paralax>
              <img data-src="dist/assets/images/porridge-banan-slice.png" alt="" class="decor-image for-desktop" data-fruit="porridge-banan-slice" data-paralax>
              <img data-src="dist/assets/images/porridge-banan-slice.png" alt="" class="decor-image mobile" data-fruit="porridge-banan-slice-mobile" data-paralax>
              <img data-src="dist/assets/images/mint-2.png" alt="" class="decor-image mobile" data-fruit="mint-p-mobile" data-paralax>
              <img data-src="dist/assets/images/cherry-title.png" alt="" class="decor-image mobile" data-fruit="cherry-p-mobile" data-paralax>
              <img data-src="dist/assets/images/ziarno-3.png" alt="" class="decor-image for-desktop" data-fruit="porridge-grain-4" data-paralax>
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                    <h2 class="mtitle mtitle--dark-color mtitle--fs-xxl mtitle--lh0-4">
                      wiśnia<br>
                      <span class="mtitle__xs">daktyle, płatki owsiane, kakao</span>
                    </h2>
                    <h3 class="msubtitle msubtitle--dark-color mt-40">
                        Wyjątkowe połączenie intensywnej<br>wiśni i kakao z naturalną<br>słodyczą daktyli.
                    </h3>
                    <span class="decor-line"></span>
                    <br>
                    <picture>
                      <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-owsianka-wisnia-m.png">
                      <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-owsianka-wisnia.png">
                      <img data-src="dist/assets/images/sklad-owsianka-wisnia.png" alt="" class="maxw-90">
                    </picture>
                  </div>
                  <div class="col-md-4 order-md-2 order-1 text-center position-relative">
                    <img src="dist/assets/images/raisin.png" class="decor-image" alt="" data-fruit="pc-raisin" data-paralax>
                    <img src="dist/assets/images/mint-2.png" class="decor-image for-desktop" alt="" data-fruit="pc-mint" data-paralax>
                    <img src="dist/assets/images/ziarno-2.png" class="decor-image" alt="" data-fruit="pc-grain-1" data-paralax>
                    <img src="dist/assets/images/ziarno-5.png" class="decor-image" alt="" data-fruit="pc-grain-2" data-paralax>
                    <div class="packshot">
                      <div class="packshot__el">
                        <!-- <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20"> -->
                        <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                        <img data-src="dist/assets/images/wisnia-daktyle--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                        <img data-src="dist/assets/images/wisnie-daktyle--4.png" alt="" class="packshot__decor packshot__decor--element ml-50 ml-mobile-10" data-paralax>
                        <img data-src="dist/assets/images/wisnie-daktyle--5.png" alt="" class="packshot__decor packshot__decor--top maxw-10" data-paralax>
                      </div>
                    </div>
                    <!-- <img data-src="dist/assets/images/owsianka-wisnia-daktyle-slide.png" alt="" class="maxw-100 maxh-65-mobile" data-paralax> -->
                  </div>
                  <div class="col-md-4 order-md-3 order-3">
                    <div class="container text-center">
                      <div class="row">
                        <div class="col-6">
                          <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                            <strong>ENERGIA</strong>
                          </h3>
                          <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                            79 kcal
                          </h2>
                          <span class="decor-line decor-line--50"></span>

                          <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                            <strong>TŁUSZCZE</strong>
                          </h3>
                          <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                            0,9 g
                          </h2>
                        </div>
                        <div class="col-6">
                          <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                            <strong>BIAŁKO</strong>
                          </h3>
                          <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                            1,5 mg
                          </h2>
                          <span class="decor-line decor-line--50"></span>

                          <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                            <strong>WĘGLOWODANY</strong>
                          </h3>
                          <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                            16 g
                          </h2>
                        </div>
                      </div>
                    </div>
                    <figure class="text-left">
                      <img data-src="dist/assets/images/ziarno-1.png" alt="" class="mt-70 ml-100 maxw-30-mobile" data-paralax>
                    </figure>
                  </div>
                </div>
              </div>
            </div>
            <div class="more-products more-products--porrdiges">
              <h2 class="mtitle mtitle--dark-color">
                poznaj inne smaki
              </h2>
              <img data-src="dist/assets/images/banan-xxl.png" alt="" class="decor-image" data-fruit="banan-xxl">
              <img data-src="dist/assets/images/vegetables-jablko-more-products.png" alt="" class="decor-image" data-fruit="vegetables-apple-slice">
            </div>
          </div>
        </section>

        <!-- P R O D U C T S  L I S T  C O M P O N E N T  src/components/_products-list.scss -->
        <div class="products-list">
          <div class="products-list__el products-list__el--porridge">
            <img data-src="dist/assets/images/owsianka-jagoda.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
            <img data-src="dist/assets/images/ziarno-1.png" alt="" class="products-list__hover-image" data-hover="jagoda-hover-1" data-delay="1">
            <img data-src="dist/assets/images/porridge-apple-hover.png" alt="" class="products-list__hover-image" data-hover="jagoda-hover-2" data-delay="2">
            <img data-src="dist/assets/images/porridge-mint-hover.png" alt="" class="products-list__hover-image" data-hover="jagoda-hover-3" data-delay="3">
            <img data-src="dist/assets/images/ziarno-3.png" alt="" class="products-list__hover-image" data-hover="jagoda-hover-4" data-delay="4">
            <a href="#" class="products-list__show" data-init-category="porridges" data-product="2"></a>
          </div>
          <div class="products-list__el products-list__el--porridge">
            <img data-src="dist/assets/images/owsianka-gujawa.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
            <img data-src="dist/assets/images/home-main-bilberry-small.png" alt="" class="products-list__hover-image" data-hover="gujawa-hover-1" data-delay="1">
            <img data-src="dist/assets/images/porridge-mango-hover.png" alt="" class="products-list__hover-image" data-hover="gujawa-hover-2" data-delay="2">
            <img data-src="dist/assets/images/ziarno-4.png" alt="" class="products-list__hover-image" data-hover="gujawa-hover-3" data-delay="3">
            <img data-src="dist/assets/images/ziarno-5.png" alt="" class="products-list__hover-image" data-hover="gujawa-hover-4" data-delay="4">
            <a href="#" class="products-list__show" data-init-category="porridges" data-product="3"></a>
          </div>

          <div class="products-list__el products-list__el--porridge">
            <img data-src="dist/assets/images/owsianka-truskawka.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
            <img data-src="dist/assets/images/raisin.png" alt="" class="products-list__hover-image" data-hover="t-hover-1" data-delay="1" data-paralax>
            <img data-src="dist/assets/images/strawberry-xxl.png" alt="" class="products-list__hover-image" data-hover="t-hover-2" data-delay="2">
            <img data-src="dist/assets/images/porridge-banan-slice.png" alt="" class="products-list__hover-image" data-hover="t-hover-3" data-delay="3">
            <a href="#" class="products-list__show" data-init-category="porridges" data-product="4"></a>
          </div>

          <div class="products-list__el products-list__el--more products-list__el--porridge-more">
            <h2 class="mtitle mtitle--lh1">
              <span class="mtitle__s d-block">Poznaj nasze przekąski </span>
              <span class="mtitle__xl">do picia</span>
            </h2>
            <img data-src="dist/assets/images/arr-right.png" alt="" class="pt-40 pl-80 pt-mobile-20 pl-mobile-30">
            <a href="#" data-next-products="5"></a>
          </div>
        </div>

        <div class="view__images-area">
          <!-- porridge images -->
          <img data-src="dist/assets/images/fruits-banan.png" alt="" class="decor-image" data-fruit="porridge-banan-medium" data-paralax>
          <img data-src="dist/assets/images/porridge-banan-slice.png" alt="" class="decor-image" data-fruit="porridge-banan-slice" data-paralax>

          <picture>
            <source media="(max-width: 991px)" srcset="dist/assets/images/porridge-cherry-blur-m.png">
            <source media="(min-width: 992px)" srcset="dist/assets/images/porridge-cherry-blur.png">
            <img data-src="dist/assets/images/porridge-cherry-blur.png" alt="" class="decor-image" data-fruit="porridge-cherry-blur" data-paralax>
          </picture>
        </div>

        <!-- F O O T E R    C O M P O N E N T  src/components/_footer.scss -->
        <footer class="mfooter mfooter--porridge py-60" data-overflow-hidden>
          <img data-src="dist/assets/images/produkty-grupa-4.png" alt="" class="maxw-70">
          <h2 class="mtitle mtitle--dark-color">Gdzie kupić?</h2>
          <h3 class="msubtitle msubtitle--dark-color">Produkty Drugie Śniadanie można kupić w:</h3>

          <img data-src="dist/assets/images/cherry-footer-xxl.png" alt="" class="decor-image" data-fruit="cherry-footer-xxl">
          <img data-src="dist/assets/images/fruit-footer-banan-2.png" alt="" class="decor-image" data-fruit="fruit-footer-banan-2">
          <img data-src="dist/assets/images/ziarno-1.png" alt="" class="decor-image" data-fruit="footer-grain-1">
          <img data-src="dist/assets/images/ziarno-3.png" alt="" class="decor-image" data-fruit="footer-grain-3">
          

          <?php include 'baner-rotator.php'; ?>
          <img data-src="dist/assets/images/porridge-footer-decor.png" alt="" class="decor-image" data-fruit="porridge-fruit-decor">
        </footer>
        <!-- / footer -->
      </div>
      <!-- end PORRIDGE VIEW -->
      
      <!-- SOUP VIEW -->
      <div class="view" data-view="soup">
        <!-- S L I D E R   S E C T I O N  C O M P O N E N T  src/components/_slider-section.scss -->
        <section class="mslider mslider--soup fill-screen-min">
            <div class="mslider__key mslider__key--fruits">
              <div class="container">
                <div class="row d-flex align-items-center">
                  <div class="col-md-3 offset-md-1 order-md-1 order-2 pt-160 pt-mobile-10 position-relative">
  
                    <h2 class="mtitle mtitle--fs-xxl mtitle--rot-xs mtitle--lh1 text-right text-center-mobile pr-50 pr-mobile-0 mt-mobile-30">
                      <span class="mtitle__s d-block">przekąski do<br></span>
                      <span class="mtitle__xxl d-block">
                        picia
                      </span>
                    </h2>
                    <!-- more button -->
                    <button class="mslider__more mt-mobile-10" data-init-category="soup">
                      <!--<span>
                        <img data-src="dist/assets/images/more-static.png" alt="" data-hover-state="static">
                        <img data-src="dist/assets/images/more-hover.gif" alt="" data-hover-state="hover">
                      </span> -->
                      <svg 
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="76px" height="75px"
                        id="svg"
                    >
                        <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                        d="M38.585,50.104 L50.663,38.030 C51.133,37.561 51.368,36.998 51.368,36.343 C51.368,35.699 51.133,35.143 50.663,34.674 L49.272,33.282 C48.826,32.813 48.270,32.578 47.602,32.578 C46.934,32.578 46.377,32.813 45.932,33.282 L40.477,38.716 L40.477,25.660 C40.477,25.018 40.246,24.495 39.782,24.093 C39.318,23.690 38.758,23.490 38.102,23.490 L35.728,23.490 C35.072,23.490 34.513,23.690 34.049,24.093 C33.585,24.495 33.353,25.018 33.353,25.660 L33.353,38.716 L27.917,33.282 C27.447,32.813 26.884,32.578 26.228,32.578 C25.573,32.578 25.010,32.813 24.540,33.282 L23.149,34.674 C22.691,35.156 22.462,35.712 22.462,36.343 C22.462,36.986 22.691,37.548 23.149,38.030 L35.227,50.104 C35.684,50.562 36.247,50.790 36.915,50.790 C37.595,50.790 38.152,50.562 38.585,50.104 Z" style="transform: none;"/>
                        <path
                          stroke="rgb(255, 255, 255)"
                          stroke-width="2px"
                          stroke-linecap="butt"
                          stroke-linejoin="miter"
                          fill="none"
                          d="M18.715,1.390 C39.760,-1.526 78.630,14.369 73.315,36.490 C68.000,58.612 57.830,73.519 52.515,72.890 C47.200,72.261 7.130,65.719 3.115,46.891 C-0.900,28.061 3.158,3.546 18.715,1.390 Z"
                          style="transform: none;"
                        >
                          <animate
                              class="anim"
                              attributeName="d"
                              keyTimes="0; .2; .5; .75; 1"
                              dur="2s"
                              fill="freeze"
                              repeatCount="indefinite"
                          />
                        /> 
                    </svg>
                      WIĘCEJ
                    </button>
                  </div>
                  <div class="col-md-8 order-md-2 order-1 position-relative">
                    <!-- <img data-src="dist/assets/images/raisin.png" alt="" class="decor-image" data-fruit="raisin" data-paralax> -->
                    <div class="packshot">
                      <div class="packshot__el">
                        <div class="maxw-30 packshot__decor packshot__decor--dots-top top-path">
                          <img data-src="dist/assets/images/groszek--1.png" alt="" class="maxw-100">
                        </div>
                        <div class="maxw-30 packshot__decor packshot__decor--dots-bottom bottom-path">
                          <img data-src="dist/assets/images/malina--3.png" alt="" class="maxw-100">
                        </div>
                        <img data-src="dist/assets/images/groszek--2.png" alt="" class="maxw-90 packshot__product packshot__product--top-spacing maxh-50-mobile main-animate" data-paralax>
                        <img data-src="dist/assets/images/groszek--4.png" alt="" class="packshot__decor packshot__decor--element packshot__decor--element-2" data-paralax>
                        <!-- <img data-src="dist/assets/images/groszek--5.png" alt="" class="packshot__decor packshot__decor--element packshot__decor--element-5" data-paralax> -->
                      </div>
                    </div>
                    <!-- <img data-src="dist/assets/images/zupa-main.png" alt="" class="maxw-90 maxh-65-mobile main-animate" data-paralax> -->
                  </div>
                </div>
              </div>
              <!-- next view -->
              <button class="mslider__next-view pt-mobile-120" data-slider-action="next">
                <img data-src="dist/assets/images/soup-main-fruits-product.png" alt="" class="maxw-90">
              </button>
            </div>
          </section>

          <!-- Groszek szczegóły pierwszego produktu -->
          <section class="first-p-details" data-overflow-hidden>
            <div class="pslider__slide pslider__slide--visible">
              <!-- groszek mleczko kokosowe view -->
              <div class="container-fluid position-relative" data-bg="soup">
                <img data-src="dist/assets/images/mieta-krzak.png" alt="" class="decor-image" data-fruit="mint-3" data-paralax>
                <img data-src="dist/assets/images/pieprz-l.png" alt="" class="decor-image mobile" data-fruit="pepper-1-2" data-paralax>
                <img data-src="dist/assets/images/pieprz-l.png" alt="" class="decor-image" data-fruit="pepper-1" data-paralax>
                <img data-src="dist/assets/images/burak-2.png" alt="" class="decor-image mobile" data-fruit="s-beetroot-mobile" data-paralax>
                
                <div class="container">
                  <div class="row align-items-center">
                    <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                      <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-4">
                        groszek<br>
                        <span class="mtitle__xs">mleczko kokosowe, mięta</span>
                      </h2>
                      <h3 class="msubtitle msubtitle--decor-color mt-40">
                        Zielony groszek w zgranym duecie<br>
                        z orzeźwiającą miętą i kremowym<br>
                        mlekiem kokosowym.
                      </h3>
                      <span class="decor-line"></span>
                      <br>
                      <img data-src="dist/assets/images/sklad-groszek.png" alt="" class="maxw-90">
                    </div>
                    <div class="col-md-4 order-md-2 order-1 text-center">
                      <div class="packshot">
                        <div class="packshot__el">
                          <!-- <img data-src="dist/assets/images/groszek---1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top"> -->
                          <img data-src="dist/assets/images/groszek---3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom">
                          <img data-src="dist/assets/images/groszek---2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                          <img data-src="dist/assets/images/groszek---4.png" alt="" class="packshot__decor packshot__decor--element" data-paralax>
                        </div>
                      </div>
                      <!-- <img data-src="dist/assets/images/groszek-slide.png" alt="" class="maxw-90 maxh-65-mobile"> -->
                    </div>
                    <div class="col-md-4 order-md-3 order-3">
                      <div class="container text-center">
                        <div class="row">
                          <div class="col-6">
                            <h3 class="msubtitle msubtitle--decor-color msubtitle--decor-color">
                              <strong>ENERGIA</strong>
                            </h3>
                            <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                              136 kcal
                            </h2>
                            <span class="decor-line decor-line--50"></span>
      
                            <h3 class="msubtitle msubtitle--decor-color msubtitle--light-color">
                              <strong>TŁUSZCZE</strong>
                            </h3>
                            <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                              2,7 g
                            </h2>
                          </div>
                          <div class="col-6">
                            <h3 class="msubtitle msubtitle--decor-color msubtitle--light-color">
                              <strong>BIAŁKO</strong>
                            </h3>
                            <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                              6,8 g
                            </h2>
                            <span class="decor-line decor-line--50"></span>
      
                            <h3 class="msubtitle msubtitle--decor-color">
                              <strong>WĘGLOWODANY</strong>
                            </h3>
                            <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                              17 g
                            </h2>
                          </div>
                        </div>
                      </div>
                      <figure class="text-left">
                        <img data-src="dist/assets/images/pieprz-m.png" alt="" class="mt-80 ml-110" data-paralax>
                      </figure>
                    </div>
                  </div>
                </div>
              </div>
              <div class="more-products more-products--soup">
                <h2 class="mtitle">
                  poznaj inne smaki
                </h2>
                <img data-src="dist/assets/images/splash.png" alt="" class="decor-image" data-fruit="splash">
                <img data-src="dist/assets/images/coconut-full.png" alt="" class="decor-image" data-fruit="coconut-full">
              </div>
            </div>
          </section>

          <!-- P R O D U C T S  L I S T  C O M P O N E N T  src/components/_products-list.scss -->
          <div class="products-list">
            <div class="products-list__el products-list__el--soup">
              <img data-src="dist/assets/images/zupa-burak-smietana.png" alt="" class="products-list__figure">
              <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
              <img data-src="dist/assets/images/burak-hover.png" alt="" class="products-list__hover-image" data-hover="burak-smietana-hover-1" data-delay="1">
              <img data-src="dist/assets/images/splash-hover.png" alt="" class="products-list__hover-image" data-hover="burak-smietana-hover-2" data-delay="2">
              <a href="#" class="products-list__show" data-init-category="soup" data-product="2"></a>
            </div>
            <div class="products-list__el products-list__el--soup">
              <img data-src="dist/assets/images/zupa-pomidor-marchew.png" alt="" class="products-list__figure">
              <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
              <img data-src="dist/assets/images/tomato-hover.png" alt="" class="products-list__hover-image" data-hover="pomidor-hover-1" data-delay="1">
              <img data-src="dist/assets/images/carrot-hover.png" alt="" class="products-list__hover-image" data-hover="pomidor-hover-2" data-delay="2">
              <a href="#" class="products-list__show" data-init-category="soup" data-product="3"></a>
            </div>
            <div class="products-list__el products-list__el--soup">
              <img data-src="dist/assets/images/zupa-truskawka-smietana.png" alt="" class="products-list__figure">
              <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
              <img data-src="dist/assets/images/splash-hover-2.png" alt="" class="products-list__hover-image" data-hover="ts-hover-1" data-delay="1">
              <img data-src="dist/assets/images/truskawka.png" alt="" class="products-list__hover-image" data-hover="ts-hover-2" data-delay="2">
              <a href="#" class="products-list__show" data-init-category="soup" data-product="4"></a>
            </div>
            <div class="products-list__el products-list__el--soup">
              <img data-src="dist/assets/images/zupa-seler-smietana.png" alt="" class="products-list__figure">
              <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
              <img data-src="dist/assets/images/celery-hover.png" alt="" class="products-list__hover-image" data-hover="seler-hover-1" data-delay="1">
              <img data-src="dist/assets/images/splash-hover-3.png" alt="" class="products-list__hover-image" data-hover="seler-hover-2" data-delay="2">
              <a href="#" class="products-list__show" data-init-category="soup" data-product="5"></a>
            </div>
            <div class="products-list__el products-list__el--soup">
              <img data-src="dist/assets/images/zupa-marchew-smietana.png" alt="" class="products-list__figure">
              <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
              <img data-src="dist/assets/images/splash-hover-3.png" alt="" class="products-list__hover-image" data-hover="m-hover-1" data-delay="1">
              <img data-src="dist/assets/images/carrot-hover.png" alt="" class="products-list__hover-image" data-hover="m-hover-2" data-delay="2">
              <a href="#" class="products-list__show" data-init-category="soup" data-product="6"></a>
            </div>
            <div class="products-list__el products-list__el--more products-list__el--soup-more">
              <h2 class="mtitle mtitle--lh1">
                <span class="mtitle__s d-block">Poznaj nasze musy </span>
                <span class="mtitle__xl">owocowe</span>
              </h2>
              <img data-src="dist/assets/images/arr-right.png" alt="" class="pt-40 pl-80 pt-mobile-20 pl-mobile-30">
              <a href="#" data-next-products="2"></a>
            </div>
          </div>

          <div class="view__images-area">
            <!-- soup images -->
            <img data-src="dist/assets/images/soup-tomato.png" alt="" class="decor-image" data-fruit="soup-tomato" data-paralax>
            <img data-src="dist/assets/images/soup-celery.png" alt="" class="decor-image" data-fruit="soup-celery" data-paralax>
            <img data-src="dist/assets/images/soup-carrot.png" alt="" class="decor-image" data-fruit="soup-carrot" data-paralax>
            <img data-src="dist/assets/images/soup-basil.png" alt="" class="decor-image mobile" data-fruit="soup-basil-mobile" data-paralax>
            
            <picture>
              <source media="(max-width: 991px)" srcset="dist/assets/images/soup-coconut-mobile.png">
              <source media="(min-width: 992px)" srcset="dist/assets/images/soup-coconut-xxl.png">
              <img data-src="dist/assets/images/soup-coconut-xxl.png" alt="" class="decor-image" data-fruit="soup-coconut-down" data-paralax>
            </picture>
          </div>
  
          <!-- F O O T E R    C O M P O N E N T  src/components/_footer.scss -->
          <footer class="mfooter mfooter--soup py-60" data-overflow-hidden>
            <img data-src="dist/assets/images/produkty-grupa-4.png" alt="" class="maxw-90">
            <h2 class="mtitle">Gdzie kupić?</h2>
            <h3 class="msubtitle msubtitle--decor-color">Produkty Drugie Śniadanie można kupić w:</h3>
  
            <img data-src="dist/assets/images/burak-1.png" alt="" class="decor-image" data-fruit="beetroot">
            <picture>
              <source media="(max-width: 991px)" srcset="dist/assets/images/soup-footer-coconut-m.png">
              <source media="(min-width: 992px)" srcset="dist/assets/images/soup-footer-coconut.png">
              <img data-src="dist/assets/images/soup-footer-coconut.png" alt="" class="decor-image" data-fruit="coconut-footer">
            </picture>
            
            <img data-src="dist/assets/images/truskawka-1.png" alt="" class="decor-image" data-fruit="soup-strawberry-footer">
            
            <?php include 'baner-rotator.php'; ?>
            <img data-src="dist/assets/images/soup-footer-decor.png" alt="" class="decor-image" data-fruit="porridge-fruit-decor">
          </footer>
          <!-- / footer -->
      </div>
      <!-- end SOUP VIEW -->

    </div>
  </div>

  <!-- P R O D U C T S  D E T A I L S  S L I D E R  src/components/_slider-section.scss -->
  <div class="pslider">
    <!-- musy owocowe -->
    <div class="pslider__view" data-slider-view="fruits">
      <!-- malina view -->
      <div class="pslider__slide" data-slider-product="fruits-1">
        <!-- malina first section -->
        <div class="container-fluid position-relative" data-bg="fruits">
          <img data-src="dist/assets/images/home-main-raspberry-medium.png" alt="" class="decor-image" data-fruit="slider-fruit-raspberry-1">
          <img data-src="dist/assets/images/home-main-raspberry-medium.png" alt="" class="decor-image mobile" data-fruit="slider-fruit-raspberry-2">

          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-4">
                  malina<br>
                  <span class="mtitle__xs">jagoda, jabłko, banan</span>
                </h2>
                <h3 class="msubtitle mt-40">Intensywny smak owoców leśnych.</h3>
                <span class="decor-line"></span>
                <br>
                <picture>
                  <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-malina-m.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-malina.png">
                  <img data-src="dist/assets/images/sklad-malina.png" alt="" class="maxw-90">
                </picture>
              </div>
              <div class="col-md-4 order-md-2 order-1 text-center">
                <div class="packshot">
                  <div class="packshot__el">
                    <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20">
                    <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                    <img data-src="dist/assets/images/malina-jagoda--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                    <img data-src="dist/assets/images/malina-jagoda--4.png" alt="" class="packshot__decor packshot__decor--element ml-60 ml-mobile-10" data-paralax>
                  </div>
                </div>
                <!-- <img data-src="dist/assets/images/malina-slide.png" alt="" class="maxw-90 maxh-65-mobile"> -->
              </div>
              <div class="col-md-4 order-md-3 order-3">
                <div class="container text-center">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="msubtitle ">
                        <strong>ENERGIA</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        51 kcal
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle">
                        <strong>TŁUSZCZE</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        0 g
                      </h2>
                    </div>
                    <div class="col-6">
                      <h3 class="msubtitle">
                        <strong>WITAMINA C</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        22 mg
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle">
                        <strong>WĘGLOWODANY</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        11 g
                      </h2>
                    </div>
                  </div>
                </div>
                <figure class="text-left">
                  <img data-src="dist/assets/images/home-main-raspberry-small.png" alt="" class="mt-30 for-desktop">
                </figure>
              </div>
            </div>
          </div>
        </div>
        <div class="more-products">
          <h2 class="mtitle">
            poznaj inne smaki
          </h2>
          <img data-src="dist/assets/images/banan-xxl.png" alt="" class="decor-image" data-fruit="banan-xxl">
          <img data-src="dist/assets/images/rasberry-xxl.png" alt="" class="decor-image" data-fruit="rasberry-xxl">
        </div>
      </div>
      <div class="pslider__slide" data-slider-product="fruits-2">
        <!-- wiśnia first section -->
        <div class="container-fluid position-relative" data-bg="fruits">
          <img data-src="dist/assets/images/jablko-xxl.png" alt="" class="decor-image" data-fruit="slider-apple-xxl">
          <img data-src="dist/assets/images/banan-cut-mobile.png" alt="" class="decor-image mobile" data-fruit="banan-cut-mobile">
          <img data-src="dist/assets/images/jablko-cut-mobile.png" alt="" class="decor-image mobile" data-fruit="jablko-cut-mobile">
          <img data-src="dist/assets/images/jablko-full-mobile.png" alt="" class="decor-image mobile" data-fruit="jablko-full-mobile">

          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-4">
                  wiśnia<br>
                  <span class="mtitle__xs">jabłko, banan</span>
                </h2>
                <h3 class="msubtitle mt-40">Dla tych, który nie mogą oprzeć się <br>kwaskowatej nucie wiśni.</h3>
                <span class="decor-line"></span>
                <br>
                <picture>
                  <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-wisnia-m.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/wisnia-sklad.png">
                  <img data-src="dist/assets/images/sklad-wisnia.png" alt="" class="maxw-90">
                </picture>
              </div>
              <div class="col-md-4 order-md-2 order-1 text-center">
                <div class="packshot">
                  <div class="packshot__el">
                    <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20">
                    <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                    <img data-src="dist/assets/images/wisnia-jablko--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                    <img data-src="dist/assets/images/wisnia-jablko--4.png" alt="" class="packshot__decor packshot__decor--element ml-60 ml-mobile-10" data-paralax>
                  </div>
                </div>
                <!-- <img data-src="dist/assets/images/wisnia-slide.png" alt="" class="maxw-90 maxh-65-mobile"> -->
              </div>
              <div class="col-md-4 order-md-3 order-3">
                <div class="container text-center">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="msubtitle ">
                        <strong>ENERGIA</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        57 kcal
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle">
                        <strong>TŁUSZCZE</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        0 g
                      </h2>
                    </div>
                    <div class="col-6">
                      <h3 class="msubtitle">
                        <strong>WITAMINA C</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        19 mg
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle">
                        <strong>WĘGLOWODANY</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        13 g
                      </h2>
                    </div>
                  </div>
                </div>
                <figure class="text-left">
                  <img data-src="dist/assets/images/cherry-rotate.png" alt="" class="mt-30 for-desktop">
                </figure>
              </div>
            </div>
          </div>
        </div>
        <div class="more-products">
          <h2 class="mtitle">
            poznaj inne smaki
          </h2>
          <img data-src="dist/assets/images/banan-xxl.png" alt="" class="decor-image" data-fruit="banan-xxl">
          <img data-src="dist/assets/images/wisnia-xxl.png" alt="" class="decor-image" data-fruit="cherry-xxl">
        </div>
      </div>
      <div class="pslider__slide" data-slider-product="fruits-3">
        <!-- mango first section -->
        <div class="container-fluid position-relative" data-bg="fruits">
          <img data-src="dist/assets/images/green-apple-rotate-3.png" alt="" class="decor-image for-desktop" data-fruit="green-apple-rotate-3">
          <img data-src="dist/assets/images/banan-cut-mobile-2.png" alt="" class="decor-image mobile" data-fruit="banan-cut-mobile-2">
          <img data-src="dist/assets/images/apple-rotate-mobile.png" alt="" class="decor-image mobile" data-fruit="apple-rotate-mobile">
          <img data-src="dist/assets/images/mango-rotate-mobile.png" alt="" class="decor-image mobile" data-fruit="mango-rotate-mobile">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-4">
                  mango<br>
                  <span class="mtitle__xs">jabłko</span>
                </h2>
                <h3 class="msubtitle mt-40">Doskonałe połączenie owocowej klasyki<br>z egzotycznym mango Alphonso.</h3>
                <span class="decor-line"></span>
                <br>
                <picture>
                  <source media="(min-width: 991px)" srcset="dist/assets/images/sklad-mango-m.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-mango.png">
                  <img data-src="dist/assets/images/sklad-mango.png" alt="" class="maxw-90">
                </picture>
              </div>
              <div class="col-md-4 order-md-2 order-1 text-center">
                <div class="packshot">
                  <div class="packshot__el">
                    <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20">
                    <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                    <img data-src="dist/assets/images/mango-jablko--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                    <img data-src="dist/assets/images/mango-jablko--4.png" alt="" class="packshot__decor packshot__decor--element ml-60 ml-mobile-10" data-paralax>
                  </div>
                </div>
                <!-- <img data-src="dist/assets/images/mango-slide.png" alt="" class="maxw-100 maxh-65-mobile"> -->
              </div>
              <div class="col-md-4 order-md-3 order-3">
                <div class="container text-center">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="msubtitle ">
                        <strong>ENERGIA</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        52 kcal
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle">
                        <strong>TŁUSZCZE</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        0 g
                      </h2>
                    </div>
                    <div class="col-6">
                      <h3 class="msubtitle">
                        <strong>WITAMINA C</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        24 mg
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle">
                        <strong>WĘGLOWODANY</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        12 g
                      </h2>
                    </div>
                  </div>
                </div>
                <figure class="text-left">
                  <img data-src="dist/assets/images/green-apple-rotate-4.png" alt="" class="mt-30 for-desktop">
                </figure>
              </div>
            </div>
          </div>
        </div>
        <div class="more-products">
          <h2 class="mtitle">
            poznaj inne smaki
          </h2>
          <img data-src="dist/assets/images/banan-xxl.png" alt="" class="decor-image" data-fruit="banan-xxl">
          <img data-src="dist/assets/images/mango-slice-xxl.png" alt="" class="decor-image" data-fruit="mango-slice-xxl">
        </div>
      </div>
      <div class="pslider__slide" data-slider-product="fruits-4">
        <!-- gruszka first section -->
        <div class="container-fluid position-relative" data-bg="fruits">
          <img data-src="dist/assets/images/jablko-rotate-4.png" alt="" class="decor-image" data-fruit="apple-rotate-4">
          <img data-src="dist/assets/images/jablko-rotate-5.png" alt="" class="decor-image mobile" data-fruit="apple-rotate-5">
          <img data-src="dist/assets/images/banan-cut-mobile-2.png" alt="" class="decor-image mobile" data-fruit="banan-cut-mobile-2">
          <img data-src="dist/assets/images/grucha-cut-mobile.png" alt="" class="decor-image mobile" data-fruit="grucha-cut-mobile">
          <!-- <img data-src="dist/assets/images/jablko-rotate-5.png" alt="" class="mt-30 for-desktop"> -->
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-4">
                  gruszka<br>
                  <span class="mtitle__xs">śliwka, jabłko</span>
                </h2>
                <h3 class="msubtitle mt-40">Pyszne owoce wprost z polskich sadów.</h3>
                <span class="decor-line"></span>
                <br>
                <picture>
                  <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-gruszka-m.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-gruszka.png">
                  <img data-src="dist/assets/images/sklad-gruszka.png" alt="" class="maxw-90">
                </picture>
              </div>
              <div class="col-md-4 order-md-2 order-1 text-center">
                <div class="packshot">
                  <div class="packshot__el">
                    <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20">
                    <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                    <img data-src="dist/assets/images/gruszka-sliwka--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                    <img data-src="dist/assets/images/gruszka-sliwka--4.png" alt="" class="packshot__decor packshot__decor--element ml-60 ml-mobile-10" data-paralax>
                  </div>
                </div>
                <!-- <img data-src="dist/assets/images/gruszka-slide.png" alt="" class="maxw-90 maxh-65-mobile"> -->
              </div>
              <div class="col-md-4 order-md-3 order-3">
                <div class="container text-center">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="msubtitle ">
                        <strong>ENERGIA</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        49 kcal
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle">
                        <strong>TŁUSZCZE</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        0 g
                      </h2>
                    </div>
                    <div class="col-6">
                      <h3 class="msubtitle">
                        <strong>WITAMINA C</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        17 mg
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle">
                        <strong>WĘGLOWODANY</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        11 g
                      </h2>
                    </div>
                  </div>
                </div>
                <figure class="text-left">
                  <img data-src="dist/assets/images/jablko-rotate-5.png" alt="" class="mt-30 for-desktop">
                </figure>
              </div>
            </div>
          </div>
        </div>
        <div class="more-products">
          <h2 class="mtitle">
            poznaj inne smaki
          </h2>
          <img data-src="dist/assets/images/banan-xxl.png" alt="" class="decor-image" data-fruit="banan-xxl">
          <img data-src="dist/assets/images/gruszka-xxl.png" alt="" class="decor-image" data-fruit="pear-xxl">
        </div>
      </div>
      <div class="pslider__slide" data-slider-product="fruits-5">
        <!-- marakuja first section -->
        <div class="container-fluid position-relative" data-bg="fruits">
        <img data-src="dist/assets/images/jablko-czerwone-mobile.png" alt="" class="decor-image" data-fruit="apple-red-mobile">
        <img data-src="dist/assets/images/banan-cut-mobile-2.png" alt="" class="decor-image" data-fruit="banan-cut-mobile-2">
        <img data-src="dist/assets/images/brzoskwinia-cut-mobile.png" alt="" class="decor-image" data-fruit="peach-cut-mobile">
        
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                <h2 class="mtitle mtitle--fs-xl mtitle--lh0-4">
                  marakuja<br>
                  <span class="mtitle__xs">brzoskwinia, jabłko, banan</span>
                </h2>
                <h3 class="msubtitle mt-40">Tropikalne, orzeźwiające połączenie <br>marakui i brzoskwini.</h3>
                <span class="decor-line"></span>
                <br>
                <picture>
                  <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-marakuja-m.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-marakuja.png">
                  <img data-src="dist/assets/images/sklad-marakuja.png" alt="" class="maxw-90">
                </picture>
              </div>
              <div class="col-md-4 order-md-2 order-1 text-center">
                <div class="packshot">
                  <div class="packshot__el">
                    <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20">
                    <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                    <img data-src="dist/assets/images/marakuja--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                    <img data-src="dist/assets/images/marakuja--4.png" alt="" class="packshot__decor packshot__decor--element ml-60 ml-mobile-10" data-paralax>
                  </div>
                </div>
                <!-- <img data-src="dist/assets/images/marakuja-slide.png" alt="" class="maxw-100 maxh-65-mobile"> -->
              </div>
              <div class="col-md-4 order-md-3 order-3">
                <div class="container text-center">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="msubtitle ">
                        <strong>ENERGIA</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        54 kcal
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle">
                        <strong>TŁUSZCZE</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        0 g
                      </h2>
                    </div>
                    <div class="col-6">
                      <h3 class="msubtitle">
                        <strong>WITAMINA C</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        19 mg
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle">
                        <strong>WĘGLOWODANY</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        12 g
                      </h2>
                    </div>
                  </div>
                </div>
                <figure class="text-left">
                  <img data-src="dist/assets/images/jablko-rotate-5.png" alt="" class="mt-30 for-desktop">
                </figure>
              </div>
            </div>
          </div>
        </div>
        <div class="more-products">
          <h2 class="mtitle">
            poznaj inne smaki
          </h2>
          <img data-src="dist/assets/images/banan-xxl.png" alt="" class="decor-image" data-fruit="banan-xxl">
          <img data-src="dist/assets/images/brzoskwinia-xxl.png" alt="" class="decor-image" data-fruit="peach-slice-xxl">
        </div>
      </div>
      <div class="pslider__slide" data-slider-product="fruits-6">
        <!-- truskawka first section -->
        <div class="container-fluid position-relative" data-bg="fruits">
          <img data-src="dist/assets/images/home-main-raspberry-medium.png" alt="" class="decor-image for-desktop" data-fruit="slider-fruit-raspberry-1">
          <img data-src="dist/assets/images/banan-cut-mobile-2.png" alt="" class="decor-image mobile" data-fruit="banan-cut-mobile-2">
          <img data-src="dist/assets/images/zielone-jablko-mobile.png" alt="" class="decor-image mobile" data-fruit="green-apple-mobile">
          <img data-src="dist/assets/images/truskawka-cut-mobile.png" alt="" class="decor-image mobile" data-fruit="strawberry-cut-mobile">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                <h2 class="mtitle mtitle--fs-l mtitle--lh0-6">
                  truskawka<br>
                  <span class="mtitle__xs">jabłko, banan</span>
                </h2>
                <h3 class="msubtitle mt-40">Klasyczny smak, który uwielbiają<br>mali i duzi.</h3>
                <span class="decor-line"></span>
                <br>
                <picture>
                  <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-truskawka-fruit-m.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-truskawka-fruit.png">
                  <img data-src="dist/assets/images/sklad-truskawka-fruit.png" alt="" class="maxw-90">
                </picture>
              </div>
              <div class="col-md-4 order-md-2 order-1 text-center">
                <div class="packshot">
                  <div class="packshot__el">
                    <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20">
                    <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                    <img data-src="dist/assets/images/truskawka-jablko--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                    <img data-src="dist/assets/images/truskawka-jablko--4.png" alt="" class="packshot__decor packshot__decor--element ml-60 ml-mobile-10" data-paralax>
                  </div>
                </div>
                <!-- <img data-src="dist/assets/images/truskawka-slide-fruit.png" alt="" class="maxw-100 maxh-50-mobile"> -->
              </div>
              <div class="col-md-4 order-md-3 order-3">
                <div class="container text-center">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="msubtitle ">
                        <strong>ENERGIA</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        55 kcal
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle">
                        <strong>TŁUSZCZE</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        0 g
                      </h2>
                    </div>
                    <div class="col-6">
                      <h3 class="msubtitle">
                        <strong>WITAMINA C</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        30 mg
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle">
                        <strong>WĘGLOWODANY</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        12 g
                      </h2>
                    </div>
                  </div>
                </div>
                <figure class="text-left for-desktop">
                  <img data-src="dist/assets/images/strawberry-rotate-3.png" alt="" class="mt-30">
                </figure>
              </div>
            </div>
          </div>
        </div>
        <div class="more-products">
          <h2 class="mtitle">
            poznaj inne smaki
          </h2>
          <img data-src="dist/assets/images/banan-xxl.png" alt="" class="decor-image" data-fruit="banan-xxl">
          <img data-src="dist/assets/images/strawberry-xxl.png" alt="" class="decor-image" data-fruit="strawberry-slice-xxl">
        </div>
      </div>

      <!-- P R O D U C T S  L I S T  C O M P O N E N T  src/components/_products-list.scss -->
      <!-- malina products list --> 
      <div class="products-list">
        <div class="products-list__el">
          <img data-src="dist/assets/images/mus-wisnia.png" alt="" class="products-list__figure">
          <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
          <img data-src="dist/assets/images/banan-malina-wisnia-marakuja-hover.png" alt="" class="products-list__hover-image" data-hover="wisnia-hover-1" data-delay="1">
          <img data-src="dist/assets/images/wisnia-wisnia-hover.png" alt="" class="products-list__hover-image" data-hover="wisnia-hover-2" data-delay="2">
          <img data-src="dist/assets/images/jablko-wisnia-hover.png" alt="" class="products-list__hover-image" data-hover="wisnia-hover-3" data-delay="3">
          <a href="#" class="products-list__show" data-init-category="fruits" data-product="2"></a>
        </div>
        <div class="products-list__el">
          <img data-src="dist/assets/images/mus-mango.png" alt="" class="products-list__figure">
          <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
          <img data-src="dist/assets/images/mango-mango-hover.png" alt="" class="products-list__hover-image" data-hover="mango-mango-hover-1" data-delay="1">
          <img data-src="dist/assets/images/jablko-mango-hover.png" alt="" class="products-list__hover-image" data-hover="apple-mango-hover-2" data-delay="2">
          <a href="#" class="products-list__show" data-init-category="fruits" data-product="3"></a>
        </div>
        <div class="products-list__el">
          <img data-src="dist/assets/images/mus-gruszka.png" alt="" class="products-list__figure">
          <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
          <img data-src="dist/assets/images/jablko-gruszka-hover.png" alt="" class="products-list__hover-image" data-hover="gruszka-hover-1" data-delay="1">
          <img data-src="dist/assets/images/gruszka-gruszka-hover.png" alt="" class="products-list__hover-image" data-hover="gruszka-hover-2" data-delay="2">
          <a href="#" class="products-list__show" data-init-category="fruits" data-product="4"></a>
        </div>
        <div class="products-list__el">
          <img data-src="dist/assets/images/mus-marakuja.png" alt="" class="products-list__figure">
          <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
          <img data-src="dist/assets/images/banan-malina-wisnia-marakuja-hover.png" alt="" class="products-list__hover-image" data-hover="marakuja-hover-1" data-delay="1">
          <img data-src="dist/assets/images/brzoskwinia-marakuja-hover.png" alt="" class="products-list__hover-image" data-hover="marakuja-hover-2" data-delay="2">
          <a href="#" class="products-list__show" data-init-category="fruits" data-product="5"></a>
        </div>
        <div class="products-list__el">
          <img data-src="dist/assets/images/mus-truskawka.png" alt="" class="products-list__figure">
          <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">  
          <img data-src="dist/assets/images/banan-malina-wisnia-marakuja-hover.png" alt="" class="products-list__hover-image" data-hover="truskawka-hover-1" data-delay="1">
          <img data-src="dist/assets/images/jablko-truskawka-hover.png" alt="" class="products-list__hover-image" data-hover="truskawka-hover-2" data-delay="2">
          <img data-src="dist/assets/images/truskawka-truskawka-hover.png" alt="" class="products-list__hover-image" data-hover="truskawka-hover-3" data-delay="3">
          <a href="#" class="products-list__show" data-init-category="fruits" data-product="6"></a>
        </div>
        <div class="products-list__el products-list__el--more">
          <h2 class="mtitle mtitle--lh1">
            <span class="mtitle__s d-block">Poznaj nasze musy </span>
            <span class="mtitle__xl">warzywne</span>
          </h2>
          <img data-src="dist/assets/images/arr-right.png" alt="" class="pt-40 pl-80 pt-mobile-20 pl-mobile-30">
          <a href="#" data-next-products="3"></a>
        </div>
      </div>

      <!-- F O O T E R    C O M P O N E N T  src/components/_footer.scss -->
      <footer class="mfooter mfooter--fruits py-60" data-overflow-hidden>
        <img data-src="dist/assets/images/produkty-grupa-4.png" alt="" class="maxw-90">
        <h2 class="mtitle">Gdzie kupić?</h2>
        <h3 class="msubtitle">Produkty Drugie Śniadanie można kupić w:</h3>

        <img data-src="dist/assets/images/fruit-footer-banan-1.png" alt="" class="decor-image" data-fruit="fruit-footer-banan-1">
        <img data-src="dist/assets/images/fruit-footer-banan-2.png" alt="" class="decor-image" data-fruit="fruit-footer-banan-2">
        <img data-src="dist/assets/images/fruit-footer-raspberry.png" alt="" class="decor-image" data-fruit="fruit-footer-raspberry">


        <?php include 'baner-rotator.php'; ?>
      </footer>
      <!-- / footer -->
      
    </div>

    <!-- musy vegetables -->
    <div class="pslider__view" data-slider-view="vegetables">
      <!-- cukinia kiwi szpinak jabłko banan view -->
      <div class="pslider__slide" data-slider-product="vegetables-1">
        <!-- cukinia kiwi szpinak first section -->
        <div class="container-fluid position-relative pb-60" data-bg="vegetables">
          <img data-src="dist/assets/images/kiwi-xs.png" alt="" class="decor-image" data-fruit="slider-kiwi-xs">
          <img data-src="dist/assets/images/kiwi-xs.png" alt="" class="decor-image mobile" data-fruit="slider-kiwi-xs-2">
          <img data-src="dist/assets/images/vegetables-banan-rotate.png" alt="" class="decor-image" data-fruit="slider-vege-banan">

          <img data-src="dist/assets/images/banan-cukinia-mobile.png" alt="" class="decor-image mobile" data-fruit="banan-courgette-mobile">
          <img data-src="dist/assets/images/jablko-cukinia-mobile.png" alt="" class="decor-image mobile" data-fruit="apple-courgette-mobile">
          <img data-src="dist/assets/images/lisc-cukinia-mobile.png" alt="" class="decor-image mobile" data-fruit="leaf-courgette-mobile">

          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-4">
                  cukinia<br>
                  <span class="mtitle__xs">kiwi, szpinak, jabłko, banan</span>
                </h2>
                <h3 class="msubtitle msubtitle--light-color mt-40">Zielona, warzywno-owocowa<br>bomba witaminowa.</h3>
                <span class="decor-line"></span>
                <br>
                <picture>
                  <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-cukinia-kiwi-szpinak-m.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-cukinia-kiwi-szpinak.png">
                  <img data-src="dist/assets/images/sklad-cukinia-kiwi-szpinak.png" alt="" class="maxw-90">
                </picture>
              </div>
              <div class="col-md-4 order-md-2 order-1 text-center">
                <div class="packshot">
                  <div class="packshot__el">
                    <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20">
                    <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                    <img data-src="dist/assets/images/cukinia-szpinak--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                    <img data-src="dist/assets/images/marchew-mango--4.png" alt="" class="packshot__decor packshot__decor--element packshot__decor--element--3 ml-50 ml-mobile-10" data-paralax>
                  </div>
                </div>
                <!-- <img data-src="dist/assets/images/cukinia-kiwi-szpinak-slide.png" alt="" class="maxw-90 maxh-65-mobile"> -->
              </div>
              <div class="col-md-4 order-md-3 order-3">
                <div class="container text-center">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="msubtitle msubtitle--light-color">
                        <strong>ENERGIA</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        46 kcal
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle msubtitle--light-color">
                        <strong>TŁUSZCZE</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        0 g
                      </h2>
                    </div>
                    <div class="col-6">
                      <h3 class="msubtitle msubtitle--light-color">
                        <strong>WITAMINA C</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        24 mg
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle msubtitle--light-color">
                        <strong>WĘGLOWODANY</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        10 g
                      </h2>
                    </div>
                  </div>
                </div>
                <figure class="text-left">
                  <img data-src="dist/assets/images/kiwi-xs-rotate.png" alt="" class="mt-30 for-desktop">
                </figure>
              </div>
            </div>
          </div>
        </div>
        <div class="more-products more-products--vegetables">
          <h2 class="mtitle">
            poznaj inne smaki
          </h2>
          <img data-src="dist/assets/images/banan-xxl.png" alt="" class="decor-image" data-fruit="banan-xxl">
          <img data-src="dist/assets/images/vegetables-jablko-more-products.png" alt="" class="decor-image" data-fruit="vegetables-apple-slice">
        </div>
      </div>

      <!-- dynia jabłko banan view -->
      <div class="pslider__slide" data-slider-product="vegetables-2">
        <!-- dynia jabłko banan first section -->
        <div class="container-fluid position-relative pb-mobile-60" data-bg="vegetables">
          <img data-src="dist/assets/images/green-apple-pumpkin-1.png" alt="" class="decor-image" data-fruit="green-apple-pumpkin-1">
          <img data-src="dist/assets/images/vegetables-banan-rotate.png" alt="" class="decor-image for-desktop" data-fruit="slider-vege-banan">
          <img data-src="dist/assets/images/green-apple-pumpkin-2.png" alt="" class="decor-image mobile" data-fruit="vege-apple-mobile-2">
          <img data-src="dist/assets/images/vegetables-banan-rotate.png" alt="" class="decor-image mobile" data-fruit="vege-banan-mobile-2">
          <img data-src="dist/assets/images/pumpkin-mobile.png" alt="" class="decor-image mobile" data-fruit="pumpkin-mobile">
          <img data-src="dist/assets/images/lisc-cukinia-mobile.png" alt="" class="decor-image mobile" data-fruit="leaf-pumpkin-mobile-2">

          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-4">
                  dynia<br>
                  <span class="mtitle__xs">jabłko, banan</span>
                </h2>
                <h3 class="msubtitle msubtitle--light-color mt-40">Sycące, słodkie połączenie<br>dyni i owoców.</h3>
                <span class="decor-line"></span>
                <br>
                <picture>
                  <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-dynia-jablko-banan-m.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-dynia-jablko-banan.png">
                  <img data-src="dist/assets/images/sklad-dynia-jablko-banan.png" alt="" class="maxw-90">
                </picture>
                
              </div>
              <div class="col-md-4 order-md-2 order-1 text-center">
                <div class="packshot">
                  <div class="packshot__el">
                    <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20">
                    <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                    <img data-src="dist/assets/images/dynia-jablko--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                    <img data-src="dist/assets/images/marchew-mango--4.png" alt="" class="packshot__decor packshot__decor--element packshot__decor--element--3 ml-50 ml-mobile-10" data-paralax>
                  </div>
                </div>
                <!-- <img data-src="dist/assets/images/dynia-jablko-banan-slide.png" alt="" class="maxw-100 maxh-65-mobile"> -->
              </div>
              <div class="col-md-4 order-md-3 order-3">
                <div class="container text-center">
                  <div class="row">
                    <div class="col-6 order-md-3 order-3">
                      <h3 class="msubtitle msubtitle--light-color">
                        <strong>ENERGIA</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        53 kcal
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle msubtitle--light-color">
                        <strong>TŁUSZCZE</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        0 g
                      </h2>
                    </div>
                    <div class="col-6">
                      <h3 class="msubtitle msubtitle--light-color">
                        <strong>WITAMINA C</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        19 mg
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle msubtitle--light-color">
                        <strong>WĘGLOWODANY</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        12 g
                      </h2>
                    </div>
                  </div>
                </div>
                <figure class="text-left">
                  <img data-src="dist/assets/images/green-apple-pumpkin-2.png" alt="" class="mt-30 for-desktop">
                </figure>
              </div>
            </div>
          </div>
        </div>
        <div class="more-products more-products--vegetables">
          <h2 class="mtitle">
            poznaj inne smaki
          </h2>
          <img data-src="dist/assets/images/banan-xxl.png" alt="" class="decor-image" data-fruit="banan-xxl">
          <img data-src="dist/assets/images/pumpkin-slice-xxl.png" alt="" class="decor-image" data-fruit="pumpkin-slice-xxl">
        </div>
      </div>

      <!-- marchew mango view -->
      <div class="pslider__slide" data-slider-product="vegetables-3">
        <!-- marchew mango first section -->
        <div class="container-fluid position-relative pb-mobile-90" data-bg="vegetables">
          <img data-src="dist/assets/images/carrot-full.png" alt="" class="decor-image" data-fruit="slider-carrot-full">
          <img data-src="dist/assets/images/mango-marchew-mobile.png" alt="" class="decor-image mobile" data-fruit="mango-marchew-mobile">
          <img data-src="dist/assets/images/lisc-cukinia-mobile.png" alt="" class="decor-image mobile" data-fruit="leaf-carrot-mobile-2">
          <img data-src="dist/assets/images/green-apple-pumpkin-2.png" alt="" class="decor-image mobile" data-fruit="vege-carrot-apple-mobile">

          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                <h2 class="mtitle mtitle--fs-l mtitle--lh0-6">
                  marchew<br>
                  <span class="mtitle__xs">mango, jabłko</span>
                </h2>
                <h3 class="msubtitle msubtitle--light-color mt-40">Słodycz najlepszej odmiany<br>mango Alphonso połączona<br>z marchewką i jabłkiem.</h3>
                <span class="decor-line"></span>
                <br>
                <picture>
                  <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-marchew-mango-m.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-marchew-mango.png">
                  <img data-src="dist/assets/images/sklad-marchew-mango.png" alt="" class="maxw-100">
                </picture>
              </div>
              <div class="col-md-4 order-md-2 order-1 text-center">
                <div class="packshot">
                  <div class="packshot__el">
                    <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20">
                    <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                    <img data-src="dist/assets/images/marchew-mango--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                    <img data-src="dist/assets/images/marchew-mango--4.png" alt="" class="packshot__decor packshot__decor--element packshot__decor--element--3 ml-50 ml-mobile-10" data-paralax>
                  </div>
                </div>
                <!-- <img data-src="dist/assets/images/marchew-mango-slide.png" alt="" class="maxw-90 maxh-65-mobile"> -->
              </div>
              <div class="col-md-4 order-md-3 order-3">
                <div class="container text-center">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="msubtitle msubtitle--light-color">
                        <strong>ENERGIA</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        47 kcal
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle msubtitle--light-color">
                        <strong>TŁUSZCZE</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        0 g
                      </h2>
                    </div>
                    <div class="col-6">
                      <h3 class="msubtitle msubtitle--light-color">
                        <strong>WITAMINA C</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        23 mg
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle msubtitle--light-color">
                        <strong>WĘGLOWODANY</strong>
                      </h3>
                      <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        10 g
                      </h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="more-products more-products--vegetables">
          <h2 class="mtitle">
            poznaj inne smaki
          </h2>
          <img data-src="dist/assets/images/more-mango-slice.png" alt="" class="decor-image" data-fruit="more-mango-slice">
          <img data-src="dist/assets/images/more-apple-slice.png" alt="" class="decor-image" data-fruit="more-apple-slice">
        </div>
      </div>

      <!-- P R O D U C T S  L I S T  C O M P O N E N T  src/components/_products-list.scss -->
      <div class="products-list">
        <div class="products-list__el products-list__el--vegetables">
          <img data-src="dist/assets/images/mus-dynia.png" alt="" class="products-list__figure">
          <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
          <img data-src="dist/assets/images/vege-green-apple-hover.png" alt="" class="products-list__hover-image" data-hover="dynia-hover-1" data-delay="1">
          <img data-src="dist/assets/images/vege-banan-hover.png" alt="" class="products-list__hover-image" data-hover="dynia-hover-2" data-delay="2">
          <img data-src="dist/assets/images/vege-green-dynia-hover.png" alt="" class="products-list__hover-image" data-hover="dynia-hover-3" data-delay="3">
          <a href="#" class="products-list__show" data-init-category="vegetables" data-product="2"></a>
        </div>
        <div class="products-list__el products-list__el--vegetables">
          <img data-src="dist/assets/images/mus-marchew.png" alt="" class="products-list__figure">
          <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
          <img data-src="dist/assets/images/carrot-hover-1.png" alt="" class="products-list__hover-image" data-hover="marchew-hover-1" data-delay="1">
          <img data-src="dist/assets/images/mango-hover-2.png" alt="" class="products-list__hover-image" data-hover="marchew-hover-2" data-delay="2">
          <img data-src="dist/assets/images/green-apple-hover-3.png" alt="" class="products-list__hover-image" data-hover="marchew-hover-3" data-delay="3">

          <a href="#" class="products-list__show" data-init-category="vegetables" data-product="3"></a>
        </div>
        <div class="products-list__el products-list__el--more products-list__el--vegetables-more">
          <h2 class="mtitle mtitle--lh1">
            <span class="mtitle__s d-block">Poznaj nasze musy </span>
            <span class="mtitle__xl">Mus+zboża</span>
          </h2>
          <img data-src="dist/assets/images/arr-right.png" alt="" class="pt-40 pl-80 pt-mobile-20 pl-mobile-30">
          <a href="#" data-next-products="4"></a>
        </div>
      </div>

      <!-- F O O T E R    C O M P O N E N T  src/components/_footer.scss -->
      <footer class="mfooter mfooter--vegetables py-60" data-overflow-hidden>
        <img data-src="dist/assets/images/produkty-grupa-4.png" alt="" class="maxw-90">
        <h2 class="mtitle">Gdzie kupić?</h2>
        <h3 class="msubtitle msubtitle--light-color">Produkty Drugie Śniadanie można kupić w:</h3>

        <img data-src="dist/assets/images/marchewka.png" alt="" class="decor-image" data-fruit="carrot">
        <img data-src="dist/assets/images/fruit-footer-banan-2.png" alt="" class="decor-image" data-fruit="fruit-footer-banan-2">

        <?php include 'baner-rotator.php'; ?>
        <img data-src="dist/assets/images/vegetable-footer-decor.png" alt="" class="decor-image" data-fruit="vegetable-fruit-decor">
      </footer>
      <!-- / footer -->

    </div>

    <!-- porridges -->
    <div class="pslider__view" data-slider-view="porridges">
      <!-- owsianka wiśnia płatki kakao view -->
      <div class="pslider__slide" data-slider-product="porridges-1">
        <!-- owsianka wiśnia płatki kakao first section -->
        <div class="container-fluid position-relative" data-bg="porrdiges">
          <img data-src="dist/assets/images/porridge-banan-slice-3.png" alt="" class="decor-image" data-fruit="porridge-banan-slice-3">
          <img data-src="dist/assets/images/porridge-banan-slice.png" alt="" class="decor-image for-desktop" data-fruit="porridge-banan-slice">
          <img data-src="dist/assets/images/porridge-banan-slice.png" alt="" class="decor-image mobile" data-fruit="porridge-banan-slice-mobile">
          <img data-src="dist/assets/images/mint-2.png" alt="" class="decor-image mobile" data-fruit="mint-p-mobile">
          <img data-src="dist/assets/images/cherry-title.png" alt="" class="decor-image mobile" data-fruit="cherry-p-mobile">
          <img data-src="dist/assets/images/ziarno-3.png" alt="" class="decor-image for-desktop" data-fruit="porridge-grain-4">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                <h2 class="mtitle mtitle--dark-color mtitle--fs-xxl mtitle--lh0-4">
                  wiśnia<br>
                  <span class="mtitle__xs">daktyle, płatki owsiane, kakao</span>
                </h2>
                <h3 class="msubtitle msubtitle--dark-color mt-40">
                    Wyjątkowe połączenie intensywnej<br>wiśni i kakao z naturalną<br>słodyczą daktyli.
                </h3>
                <span class="decor-line"></span>
                <br>
                <picture>
                  <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-owsianka-wisnia-m.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-owsianka-wisnia.png">
                  <img data-src="dist/assets/images/sklad-owsianka-wisnia.png" alt="" class="maxw-90">
                </picture>
              </div>
              <div class="col-md-4 order-md-2 order-1 text-center position-relative">
                <img src="dist/assets/images/raisin.png" class="decor-image" alt="" data-fruit="pc-raisin">
                <img src="dist/assets/images/mint-2.png" class="decor-image for-desktop" alt="" data-fruit="pc-mint">
                <img src="dist/assets/images/ziarno-2.png" class="decor-image" alt="" data-fruit="pc-grain-1">
                <img src="dist/assets/images/ziarno-5.png" class="decor-image" alt="" data-fruit="pc-grain-2">
                <div class="packshot">
                  <div class="packshot__el">
                    <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20">
                    <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                    <img data-src="dist/assets/images/wisnia-daktyle--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                    <img data-src="dist/assets/images/wisnie-daktyle--4.png" alt="" class="packshot__decor packshot__decor--element ml-50 ml-mobile-10" data-paralax>
                    <img data-src="dist/assets/images/wisnie-daktyle--5.png" alt="" class="packshot__decor packshot__decor--top maxw-10" data-paralax>
                  </div>
                </div>
                <!-- <img data-src="dist/assets/images/owsianka-wisnia-daktyle-slide.png" alt="" class="maxw-100 maxh-65-mobile"> -->
              </div>
              <div class="col-md-4 order-md-3 order-3">
                <div class="container text-center">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>ENERGIA</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        79 kcal
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>TŁUSZCZE</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        0,9 g
                      </h2>
                    </div>
                    <div class="col-6">
                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>BIAŁKO</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        1,5 mg
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>WĘGLOWODANY</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        16 g
                      </h2>
                    </div>
                  </div>
                </div>
                <figure class="text-left">
                  <img data-src="dist/assets/images/ziarno-1.png" alt="" class="mt-70 ml-100 maxw-30-mobile">
                </figure>
              </div>
            </div>
          </div>
        </div>
        <div class="more-products more-products--porrdiges">
          <h2 class="mtitle mtitle--dark-color">
            poznaj inne smaki
          </h2>
          <img data-src="dist/assets/images/banan-xxl.png" alt="" class="decor-image" data-fruit="banan-xxl">
          <img data-src="dist/assets/images/vegetables-jablko-more-products.png" alt="" class="decor-image" data-fruit="vegetables-apple-slice">
        </div>
      </div>

      <!-- owsianka jagoda view -->
      <div class="pslider__slide" data-slider-product="porridges-2">
        <!-- owsianka jagoda first section -->
        <div class="container-fluid position-relative" data-bg="porrdiges">
          <picture>
            <source media="(max-width: 991px)" srcset="dist/assets/images/banan-xl.png">
            <source media="(min-width: 992px)" srcset="dist/assets/images/porridge-banan-slice-3.png">
            <img data-src="dist/assets/images/porridge-banan-slice-3.png" alt="" class="decor-image" data-fruit="porridge-banan-slice-3-1">
          </picture>
          <img data-src="dist/assets/images/jagoda-duuuuza.png" alt="" class="decor-image" data-fruit="bilberry-vxxl">
          <img data-src="dist/assets/images/mint-2.png" alt="" class="decor-image mobile" data-fruit="mint-p-mobile-2">
          <img data-src="dist/assets/images/ziarno-5.png" alt="" class="decor-image mobile" data-fruit="grain-p-mobile">
          <img data-src="dist/assets/images/ziarno-1.png" alt="" class="decor-image mobile" data-fruit="grain-1-p-mobile">
          
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                <h2 class="mtitle mtitle--dark-color mtitle--fs-xxl mtitle--lh0-4">
                  jagoda<br>
                  <span class="mtitle__xs">płatki jaglane, siemię lniane</span>
                </h2>
                <h3 class="msubtitle msubtitle--dark-color mt-40">
                Połączenie słodkiej, jagodowej jaglanki<br>i prozdrowotnych nasion lnu.
                </h3>
                <span class="decor-line"></span>
                <br>
                <picture>
                  <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-jagoda-m.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-jagoda.png">
                  <img data-src="dist/assets/images/sklad-jagoda.png" alt="" class="maxw-90">
                </picture>
              </div>
              <div class="col-md-4 order-md-2 order-1 text-center position-relative">
                <img src="dist/assets/images/raisin.png" class="decor-image" alt="" data-fruit="pc-raisin">
                <img src="dist/assets/images/mint-2.png" class="decor-image" alt="" data-fruit="pc-mint">
                <img src="dist/assets/images/ziarno-2.png" class="decor-image" alt="" data-fruit="pc-grain-1">
                <img src="dist/assets/images/ziarno-5.png" class="decor-image" alt="" data-fruit="pc-grain-2">

                <div class="packshot">
                  <div class="packshot__el">
                    <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20">
                    <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                    <img data-src="dist/assets/images/jagoda-platki--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                    <img data-src="dist/assets/images/jagoda-platki--4.png" alt="" class="packshot__decor packshot__decor--element packshot__decor--element--4 ml-50 ml-mobile-10" data-paralax>
                    <img data-src="dist/assets/images/wisnie-daktyle--5.png" alt="" class="packshot__decor packshot__decor--top maxw-10" data-paralax>
                  </div>
                </div>

                <!-- <img data-src="dist/assets/images/jagoda-slide.png" alt="" class="maxw-100 maxh-65-mobile"> -->
              </div>
              <div class="col-md-4 order-md-3 order-3">
                <div class="container text-center">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>ENERGIA</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        73 kcal
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>TŁUSZCZE</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        0,9 g
                      </h2>
                    </div>
                    <div class="col-6">
                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>BIAŁKO</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        1,2 mg
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>WĘGLOWODANY</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        15 g
                      </h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="more-products more-products--porrdiges">
          <h2 class="mtitle mtitle--dark-color">
            poznaj inne smaki
          </h2>
          <img data-src="dist/assets/images/jagoda-mango-1.png" alt="" class="decor-image" data-fruit="mango-6">
          <img data-src="dist/assets/images/jagoda-mango-2.png" alt="" class="decor-image" data-fruit="mango-7">
        </div>
      </div>

      <!-- owsianka gujawa view -->
      <div class="pslider__slide" data-slider-product="porridges-3">
        <!-- owsianka gujawa first section -->
        <div class="container-fluid position-relative pb-50" data-bg="porrdiges">
          <picture>
            <source media="(max-width: 991px)" srcset="dist/assets/images/p-banan-m-rotate.png">
            <source media="(min-width: 992px)" srcset="dist/assets/images/porridge-banan-slice-3.png">
            <img data-src="dist/assets/images/porridge-banan-slice-3.png" alt="" class="decor-image" data-fruit="porridge-banan-slice-3-2">
          </picture>
          <img data-src="dist/assets/images/gujawa-mango.png" alt="" class="decor-image" data-fruit="gujawa-mango">
          <img data-src="dist/assets/images/mint-2.png" alt="" class="decor-image mobile" data-fruit="mint-p-mobile-2">
          <img data-src="dist/assets/images/gujawa-xxl-m.png" alt="" class="decor-image mobile" data-fruit="gujawa-xxl-m">

          <img data-src="dist/assets/images/mint-2.png" alt="" class="decor-image mobile" data-fruit="gujawa-mint">
          <img data-src="dist/assets/images/ziarno-2.png" alt="" class="decor-image mobile" data-fruit="gujawa-grain">
          <img data-src="dist/assets/images/ziarno-3.png" alt="" class="decor-image mobile" data-fruit="gujawa-grain-2">

          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                <h2 class="mtitle mtitle--fs-xl mtitle--dark-color mtitle--lh0-4">
                  gujawa<br>
                  <span class="mtitle__xxs">mango, płatki jaglane, wiórki kokosowe</span>
                </h2>
                <h3 class="msubtitle msubtitle--dark-color mt-40">
                  Prawdziwie egzotyczny smak <br>orzeźwiającej gujawy i aromatycznych<br>wiórków kokosowych.
                </h3>
                <span class="decor-line"></span>
                <br>
                <picture>
                  <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-gujawa-m.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-gujawa.png">
                  <img data-src="dist/assets/images/sklad-gujawa.png" alt="" class="maxw-90">
                </picture>
              </div>
              <div class="col-md-4 order-md-2 order-1 text-center position-relative">
                <img src="dist/assets/images/raisin.png" class="decor-image" alt="" data-fruit="pc-raisin">
                <img src="dist/assets/images/ziarno-2.png" class="decor-image" alt="" data-fruit="pc-grain-1">
                <img src="dist/assets/images/ziarno-5.png" class="decor-image" alt="" data-fruit="pc-grain-2">
                <div class="packshot">
                  <div class="packshot__el">
                    <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20">
                    <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                    <img data-src="dist/assets/images/gujawa-mango--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                    <img data-src="dist/assets/images/jagoda-platki--4.png" alt="" class="packshot__decor packshot__decor--element packshot__decor--element--4 ml-50 ml-mobile-10" data-paralax>
                    <!-- <img data-src="dist/assets/images/wisnie-daktyle--5.png" alt="" class="packshot__decor packshot__decor--top" data-paralax> -->
                  </div>
                </div>
                <!-- <img data-src="dist/assets/images/gujawa-slide.png" alt="" class="maxw-100 maxh-65-mobile"> -->
              </div>
              <div class="col-md-4 order-md-3 order-3">
                <div class="container text-center">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>ENERGIA</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        78 kcal
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>TŁUSZCZE</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        1,2 g
                      </h2>
                    </div>
                    <div class="col-6">
                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>BIAŁKO</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        1,2 mg
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>WĘGLOWODANY</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        15 g
                      </h2>
                    </div>
                  </div>
                </div>
                <figure class="text-left">
                  <img data-src="dist/assets/images/mint-2.png" alt="" class="mt-50 ml-10 for-desktop">
                  <img data-src="dist/assets/images/ziarno-1.png" alt="" class="mt-20 ml-100 for-desktop">
                </figure>
              </div>
            </div>
          </div>
        </div>
        <div class="more-products more-products--porrdiges">
          <h2 class="mtitle mtitle--dark-color">
            poznaj inne smaki
          </h2>
          <img data-src="dist/assets/images/more-jagoda.png" alt="" class="decor-image" data-fruit="more-bilberry">
          <img data-src="dist/assets/images/gujawa-xxl.png" alt="" class="decor-image" data-fruit="gujawa-xxl">
        </div>
      </div>

      <!-- owsianka truskawka view -->
      <div class="pslider__slide" data-slider-product="porridges-4">
        <!-- owsianka truskawka first section -->
        <div class="container-fluid position-relative" data-bg="porrdiges">
          <img data-src="dist/assets/images/porridge-banan-slice-3.png" alt="" class="decor-image for-desktop" data-fruit="porridge-banan-slice-3">
          <img data-src="dist/assets/images/banan-slice.png" alt="" class="decor-image mobile" data-fruit="banan-slice-p-mobile">
          <img data-src="dist/assets/images/jagoda-duuuuza.png" alt="" class="decor-image for-desktop" data-fruit="bilberry-vxxl">
          <img data-src="dist/assets/images/strawberry-p-mobile.png" alt="" class="decor-image mobile" data-fruit="strawberry-p-mobile">
          <img data-src="dist/assets/images/ziarno-1.png" alt="" class="decor-image mobile" data-fruit="grain-p2-mobile">
          <img data-src="dist/assets/images/raisin.png" alt="" class="decor-image" data-fruit="raisin-p-mobile" data-paralax>
          <img data-src="dist/assets/images/mint-2.png" alt="" class="decor-image mobile" data-fruit="strawberry-mint">
          <img data-src="dist/assets/images/raisin.png" alt="" class="decor-image mobile" data-fruit="strawberry-raisin">
          <img data-src="dist/assets/images/ziarno-2.png" alt="" class="decor-image mobile" data-fruit="strawberry-grain-2">

          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                <h2 class="mtitle mtitle--fs-l mtitle--dark-color mtitle--lh0-4">
                  truskawka<br>
                  <span class="mtitle__xxs">płatki owsiane, babka płesznik</span>
                </h2>
                <h3 class="msubtitle msubtitle--dark-color mt-40">
                  Klasyczny smak truskawki wzbogaconej <br>o sycące płatki i nasiona.
                </h3>
                <span class="decor-line"></span>
                <br>
                <picture>
                  <source media="(max-width: 991px)" srcset="dist/assets/images/sklad-truskawka-pm.png">
                  <source media="(min-width: 992px)" srcset="dist/assets/images/sklad-truskawka.png">
                  <img data-src="dist/assets/images/sklad-truskawka.png" alt="" class="maxw-100">
                </picture>
              </div>
              <div class="col-md-4 order-md-2 order-1 text-center position-relative">
                <img src="dist/assets/images/ziarno-2.png" class="decor-image" alt="" data-fruit="pc-grain-1">
                <img src="dist/assets/images/ziarno-5.png" class="decor-image" alt="" data-fruit="pc-grain-2">
                <div class="packshot">
                  <div class="packshot__el">
                    <img data-src="dist/assets/images/malina-jagoda--1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-20">
                    <img data-src="dist/assets/images/malina-jagoda--3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                    <img data-src="dist/assets/images/truskawka-platki--2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                    <img data-src="dist/assets/images/truskawka-platki--4.png" alt="" class="packshot__decor packshot__decor--element packshot__decor--element--4 ml-50 ml-mobile-10" data-paralax>
                    <!-- <img data-src="dist/assets/images/wisnie-daktyle--5.png" alt="" class="packshot__decor packshot__decor--top" data-paralax> -->
                  </div>
                </div>
                <!-- <img data-src="dist/assets/images/truskawka-slide.png" alt="" class="maxw-100 maxh-65-mobile"> -->
              </div>
              <div class="col-md-4 order-md-3 order-3">
                <div class="container text-center">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>ENERGIA</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        72 kcal
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>TŁUSZCZE</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        0,7 g
                      </h2>
                    </div>
                    <div class="col-6">
                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>BIAŁKO</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        1,5 mg
                      </h2>
                      <span class="decor-line decor-line--50"></span>

                      <h3 class="msubtitle msubtitle--dark-color msubtitle--light-color">
                        <strong>WĘGLOWODANY</strong>
                      </h3>
                      <h2 class="mtitle mtitle--dark-color mtitle__ms mtitle--no-transform mtitle--lh0-8">
                        14 g
                      </h2>
                    </div>
                  </div>
                </div>
                <figure class="text-left for-desktop">
                  <img data-src="dist/assets/images/mint-2.png" alt="" class="mt-50 ml-10">
                  <img data-src="dist/assets/images/ziarno-1.png" alt="" class="mt-20 ml-100">
                </figure>
              </div>
            </div>
          </div>
        </div>
        <div class="more-products more-products--porrdiges">
          <h2 class="mtitle mtitle--dark-color">
            poznaj inne smaki
          </h2>
          <img data-src="dist/assets/images/banan-ziarno.png" alt="" class="decor-image" data-fruit="banan-grain">
          <img data-src="dist/assets/images/truskawka-duuuza.png" alt="" class="decor-image" data-fruit="strawberry-vxxl">
        </div>
      </div>

      <!-- P R O D U C T S  L I S T  C O M P O N E N T  src/components/_products-list.scss -->
      <div class="products-list">
        <div class="products-list__el products-list__el--porridge">
          <img data-src="dist/assets/images/owsianka-jagoda.png" alt="" class="products-list__figure">
          <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
          <img data-src="dist/assets/images/ziarno-1.png" alt="" class="products-list__hover-image" data-hover="jagoda-hover-1" data-delay="1">
          <img data-src="dist/assets/images/porridge-apple-hover.png" alt="" class="products-list__hover-image" data-hover="jagoda-hover-2" data-delay="2">
          <img data-src="dist/assets/images/porridge-mint-hover.png" alt="" class="products-list__hover-image" data-hover="jagoda-hover-3" data-delay="3">
          <img data-src="dist/assets/images/ziarno-3.png" alt="" class="products-list__hover-image" data-hover="jagoda-hover-4" data-delay="4">
          <a href="#" class="products-list__show" data-init-category="porridges" data-product="2"></a>
        </div>
        <div class="products-list__el products-list__el--porridge">
          <img data-src="dist/assets/images/owsianka-gujawa.png" alt="" class="products-list__figure">
          <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
          <img data-src="dist/assets/images/home-main-bilberry-small.png" alt="" class="products-list__hover-image" data-hover="gujawa-hover-1" data-delay="1">
          <img data-src="dist/assets/images/porridge-mango-hover.png" alt="" class="products-list__hover-image" data-hover="gujawa-hover-2" data-delay="2">
          <img data-src="dist/assets/images/ziarno-4.png" alt="" class="products-list__hover-image" data-hover="gujawa-hover-3" data-delay="3">
          <img data-src="dist/assets/images/ziarno-5.png" alt="" class="products-list__hover-image" data-hover="gujawa-hover-4" data-delay="4">
          <a href="#" class="products-list__show" data-init-category="porridges" data-product="3"></a>
        </div>

        <div class="products-list__el products-list__el--porridge">
          <img data-src="dist/assets/images/owsianka-truskawka.png" alt="" class="products-list__figure">
          <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
          <img data-src="dist/assets/images/raisin.png" alt="" class="products-list__hover-image" data-hover="t-hover-1" data-delay="1" data-paralax>
          <img data-src="dist/assets/images/strawberry-xxl.png" alt="" class="products-list__hover-image" data-hover="t-hover-2" data-delay="2">
          <img data-src="dist/assets/images/porridge-banan-slice.png" alt="" class="products-list__hover-image" data-hover="t-hover-3" data-delay="3">
          <a href="#" class="products-list__show" data-init-category="porridges" data-product="4"></a>
        </div>

        <div class="products-list__el products-list__el--more products-list__el--porridge-more">
          <h2 class="mtitle mtitle--lh1">
            <span class="mtitle__s d-block">Poznaj nasze przekąski </span>
            <span class="mtitle__xl">do picia</span>
          </h2>
          <img data-src="dist/assets/images/arr-right.png" alt="" class="pt-40 pl-80 pt-mobile-20 pl-mobile-30">
          <a href="#" data-next-products="5"></a>
        </div>
      </div>

      <!-- F O O T E R    C O M P O N E N T  src/components/_footer.scss -->
      <footer class="mfooter mfooter--porridge py-60" data-overflow-hidden>
        <img data-src="dist/assets/images/produkty-grupa-4.png" alt="" class="maxw-90">
        <h2 class="mtitle mtitle--dark-color">Gdzie kupić?</h2>
        <h3 class="msubtitle msubtitle--dark-color">Produkty Drugie Śniadanie można kupić w:</h3>

        <img data-src="dist/assets/images/cherry-footer-xxl.png" alt="" class="decor-image" data-fruit="cherry-footer-xxl">
        <picture>
          <source media="(max-width: 991px)" srcset="dist/assets/images/fruit-footer-banan-2-m.png">
          <source media="(min-width: 992px)" srcset="dist/assets/images/fruit-footer-banan-2.png">
          <img data-src="dist/assets/images/fruit-footer-banan-2.png" alt="" class="decor-image" data-fruit="fruit-footer-banan-2">
        </picture>
        
        <img data-src="dist/assets/images/ziarno-1.png" alt="" class="decor-image" data-fruit="footer-grain-1">
        <img data-src="dist/assets/images/ziarno-3.png" alt="" class="decor-image" data-fruit="footer-grain-3">
        

        <?php include 'baner-rotator.php'; ?>
        <img data-src="dist/assets/images/porridge-footer-decor.png" alt="" class="decor-image" data-fruit="porridge-fruit-decor">
      </footer>
      <!-- / footer -->

    </div>

    <!-- soup -->
    <div class="pslider__view" data-slider-view="soup">
        <!-- groszek mleczko kokosowe view -->
        <div class="pslider__slide" data-slider-product="soup-1">
          <!-- groszek mleczko kokosowe view -->
          <div class="container-fluid position-relative" data-bg="soup">
            <img data-src="dist/assets/images/mieta-krzak.png" alt="" class="decor-image" data-fruit="mint-3">
            <img data-src="dist/assets/images/pieprz-l.png" alt="" class="decor-image mobile" data-fruit="pepper-1-2">
            <img data-src="dist/assets/images/pieprz-l.png" alt="" class="decor-image" data-fruit="pepper-1">
            <img data-src="dist/assets/images/burak-2.png" alt="" class="decor-image mobile" data-fruit="s-beetroot-mobile">
            
            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                  <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-4">
                    groszek<br>
                    <span class="mtitle__xs">mleczko kokosowe, mięta</span>
                  </h2>
                  <h3 class="msubtitle msubtitle--decor-color mt-40">
                    Zielony groszek w zgranym duecie<br>
                    z orzeźwiającą miętą i kremowym<br>
                    mlekiem kokosowym.
                  </h3>
                  <span class="decor-line"></span>
                  <br>
                  <img data-src="dist/assets/images/sklad-groszek.png" alt="" class="maxw-90">
                </div>
                <div class="col-md-4 order-md-2 order-1 text-center">
                  <div class="packshot">
                    <div class="packshot__el">
                      <img data-src="dist/assets/images/groszek---1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top">
                      <img data-src="dist/assets/images/groszek---3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom">
                      <img data-src="dist/assets/images/groszek---2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                      <img data-src="dist/assets/images/groszek---4.png" alt="" class="packshot__decor packshot__decor--element" data-paralax>
                    </div>
                  </div>
                  <!-- <img data-src="dist/assets/images/groszek-slide.png" alt="" class="maxw-90 maxh-65-mobile"> -->
                </div>
                <div class="col-md-4 order-md-3 order-3">
                  <div class="container text-center">
                    <div class="row">
                      <div class="col-6">
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--decor-color">
                          <strong>ENERGIA</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          136 kcal
                        </h2>
                        <span class="decor-line decor-line--50"></span>
  
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--light-color">
                          <strong>TŁUSZCZE</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          2,7 g
                        </h2>
                      </div>
                      <div class="col-6">
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--light-color">
                          <strong>BIAŁKO</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          6,8 g
                        </h2>
                        <span class="decor-line decor-line--50"></span>
  
                        <h3 class="msubtitle msubtitle--decor-color">
                          <strong>WĘGLOWODANY</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          17 g
                        </h2>
                      </div>
                    </div>
                  </div>
                  <figure class="text-left">
                    <img data-src="dist/assets/images/pieprz-m.png" alt="" class="mt-80 ml-110">
                  </figure>
                </div>
              </div>
            </div>
          </div>
          <div class="more-products more-products--soup">
            <h2 class="mtitle">
              poznaj inne smaki
            </h2>
            <img data-src="dist/assets/images/splash.png" alt="" class="decor-image" data-fruit="splash">
            <img data-src="dist/assets/images/coconut-full.png" alt="" class="decor-image" data-fruit="coconut-full">
          </div>
        </div>

        <!-- burak view -->
        <div class="pslider__slide" data-slider-product="soup-2">
          <!-- burak view -->
          <div class="container-fluid position-relative" data-bg="soup">
            <img data-src="dist/assets/images/buuurak.png" alt="" class="decor-image for-desktop" data-fruit="beetroot-2">
            <img data-src="dist/assets/images/pieprz-l.png" alt="" class="decor-image mobile" data-fruit="pepper-1-2">
            <img data-src="dist/assets/images/pieprz-l.png" alt="" class="decor-image" data-fruit="pepper-1">
            <img data-src="dist/assets/images/burak-2.png" alt="" class="decor-image mobile" data-fruit="s-beetroot-mobile-2">
            <img data-src="dist/assets/images/beetroot-slice-mobile-2.png" alt="" class="decor-image mobile" data-fruit="beetroot-slice-mobile-2">

            
            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                  <h2 class="mtitle mtitle--fs-xxl mtitle--lh0-4">
                    burak<br>
                    <span class="mtitle__xs">śmietana, chrzan</span>
                  </h2>
                  <h3 class="msubtitle msubtitle--decor-color mt-40">
                    Buraczkowa klasyka z wyrazistym <br>ostrym akcentem.
                  </h3>
                  <span class="decor-line"></span>
                  <br>
                  <img data-src="dist/assets/images/sklad-burak.png" alt="" class="maxw-90">                  
                </div>
                <div class="col-md-4 order-md-2 order-1 text-center">
                  <div class="packshot">
                    <div class="packshot__el">
                      <img data-src="dist/assets/images/groszek---1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-40">
                      <img data-src="dist/assets/images/groszek---3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-50 ml-mobile-10">
                      <img data-src="dist/assets/images/burak---2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                      <img data-src="dist/assets/images/groszek---4.png" alt="" class="packshot__decor packshot__decor--element ml-60 ml-mobile-10" data-paralax>
                    </div>
                  </div>
                  <!-- <img data-src="dist/assets/images/burak-slide.png" alt="" class="maxw-90 maxh-65-mobile"> -->
                </div>
                <div class="col-md-4 order-md-3 order-3">
                  <div class="container text-center">
                    <div class="row">
                      <div class="col-6">
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--decor-color">
                          <strong>ENERGIA</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          111 kcal
                        </h2>
                        <span class="decor-line decor-line--50"></span>
  
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--light-color">
                          <strong>TŁUSZCZE</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          4,3 g
                        </h2>
                      </div>
                      <div class="col-6">
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--light-color">
                          <strong>BIAŁKO</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          3,1 g
                        </h2>
                        <span class="decor-line decor-line--50"></span>
  
                        <h3 class="msubtitle msubtitle--decor-color">
                          <strong>WĘGLOWODANY</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          12 g
                        </h2>
                      </div>
                    </div>
                  </div>
                  <figure class="text-left">
                    <img data-src="dist/assets/images/pieprz-m.png" alt="" class="mt-80 ml-110">
                  </figure>
                </div>
              </div>
            </div>
          </div>
          <div class="more-products more-products--soup">
            <h2 class="mtitle">
              poznaj inne smaki
            </h2>
            <img data-src="dist/assets/images/splash.png" alt="" class="decor-image" data-fruit="splash">
            <img data-src="dist/assets/images/burak-plaster.png" alt="" class="decor-image" data-fruit="more-beetroot">
          </div>
        </div>

        <!-- pomidor view -->
        <div class="pslider__slide" data-slider-product="soup-3">
          <!-- pomidor view -->
          <div class="container-fluid position-relative" data-bg="soup">
            <img data-src="dist/assets/images/soup-carrot.png" alt="" class="decor-image" data-fruit="soup-carrot-2">
            <img data-src="dist/assets/images/pieprz-l.png" alt="" class="decor-image mobile" data-fruit="pepper-1-2">
            <img data-src="dist/assets/images/pieprz-l.png" alt="" class="decor-image" data-fruit="pepper-1">
            <img data-src="dist/assets/images/pietrucha.png" alt="" class="decor-image mobile" data-fruit="pietrucha">

            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                  <h2 class="mtitle mtitle--fs-xl mtitle--lh0-4">
                    pomidor<br>
                    <span class="mtitle__xs">marchew, pietruszka</span>
                  </h2>
                  <h3 class="msubtitle msubtitle--decor-color mt-40">
                    Królowa polskich zup w niezwykle <br>świeżej odsłonie.
                  </h3>
                  <span class="decor-line"></span>
                  <br>
                  <img data-src="dist/assets/images/sklad-pomidor.png" alt="" class="maxw-90">
                </div>
                <div class="col-md-4 order-md-2 order-1 text-center">
                  <div class="packshot">
                    <div class="packshot__el">
                      <img data-src="dist/assets/images/groszek---1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-40">
                      <img data-src="dist/assets/images/groszek---3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-60 ml-mobile-10">
                      <img data-src="dist/assets/images/pomidor---2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                      <img data-src="dist/assets/images/groszek---4.png" alt="" class="packshot__decor packshot__decor--element ml-60 ml-mobile-10" data-paralax>
                    </div>
                  </div>
                  <!-- <img data-src="dist/assets/images/pomidor-slide.png" alt="" class="maxw-90 maxh-65-mobile"> -->
                </div>
                <div class="col-md-4 order-md-3 order-3">
                  <div class="container text-center">
                    <div class="row">
                      <div class="col-6">
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--decor-color">
                          <strong>ENERGIA</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          94 kcal
                        </h2>
                        <span class="decor-line decor-line--50"></span>
  
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--light-color">
                          <strong>TŁUSZCZE</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          4,6 g
                        </h2>
                      </div>
                      <div class="col-6">
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--light-color">
                          <strong>BIAŁKO</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          3,0 g
                        </h2>
                        <span class="decor-line decor-line--50"></span>
  
                        <h3 class="msubtitle msubtitle--decor-color">
                          <strong>WĘGLOWODANY</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          8,2 g
                        </h2>
                      </div>
                    </div>
                  </div>
                  <figure class="text-left">
                    <img data-src="dist/assets/images/pieprz-m.png" alt="" class="mt-80 ml-110">
                  </figure>
                </div>
              </div>
            </div>
          </div>
          <div class="more-products more-products--soup">
            <h2 class="mtitle">
              poznaj inne smaki
            </h2>
            <img data-src="dist/assets/images/pietrucha.png" alt="" class="decor-image" data-fruit="splash">
            <img data-src="dist/assets/images/pomidor.png" alt="" class="decor-image" data-fruit="more-beetroot">
          </div>
        </div>

        <!-- truskawka view -->
        <div class="pslider__slide" data-slider-product="soup-4">
          <!-- truskawka view -->
          <div class="container-fluid position-relative" data-bg="soup">
            <img data-src="dist/assets/images/strawberry-rotate.png" alt="" class="decor-image" data-fruit="soup-strawberry-2">
            <img data-src="dist/assets/images/pieprz-l.png" alt="" class="decor-image" data-fruit="pepper-1">
            <img data-src="dist/assets/images/truskawka-top.png" alt="" class="decor-image mobile" data-fruit="truskawka-top">
            
            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                  <h2 class="mtitle mtitle--fs-l mtitle--lh0-6">
                    truskawka<br>
                    <span class="mtitle__xs">śmietana</span>
                  </h2>
                  <h3 class="msubtitle msubtitle--decor-color mt-40">
                    Słodkie wspomnienie<br>smaków dzieciństwa.
                  </h3>
                  <span class="decor-line"></span>
                  <br>
                  <img data-src="dist/assets/images/sklad-truskawka2.png" alt="" class="maxw-90">
                </div>
                <div class="col-md-4 order-md-2 order-1 text-center">
                  <div class="packshot">
                    <div class="packshot__el">
                      <img data-src="dist/assets/images/groszek---1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-40">
                      <img data-src="dist/assets/images/groszek---3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-60 ml-mobile-10">
                      <img data-src="dist/assets/images/truskawka2---2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                      <img data-src="dist/assets/images/groszek---4.png" alt="" class="packshot__decor packshot__decor--element ml-60 ml-mobile-10" data-paralax>
                    </div>
                  </div>
                  <!-- <img data-src="dist/assets/images/truskawka2-slide.png" alt="" class="maxw-90 maxh-65-mobile"> -->
                </div>
                <div class="col-md-4 order-md-3 order-3">
                  <div class="container text-center">
                    <div class="row">
                      <div class="col-6">
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--decor-color">
                          <strong>ENERGIA</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          178 kcal
                        </h2>
                        <span class="decor-line decor-line--50"></span>
  
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--light-color">
                          <strong>TŁUSZCZE</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          8,5 g
                        </h2>
                      </div>
                      <div class="col-6">
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--light-color">
                          <strong>BIAŁKO</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          3,0 g
                        </h2>
                        <span class="decor-line decor-line--50"></span>
  
                        <h3 class="msubtitle msubtitle--decor-color">
                          <strong>WĘGLOWODANY</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          20 g
                        </h2>
                      </div>
                    </div>
                  </div>
                  <figure class="text-left">
                    <img data-src="dist/assets/images/pieprz-m.png" alt="" class="mt-80 ml-110">
                  </figure>
                </div>
              </div>
            </div>
          </div>
          <div class="more-products more-products--soup">
            <h2 class="mtitle">
              poznaj inne smaki
            </h2>
            <img data-src="dist/assets/images/splash.png" alt="" class="decor-image" data-fruit="splash">
            <img data-src="dist/assets/images/truskawka-duuuza.png" alt="" class="decor-image" data-fruit="more-beetroot">
          </div>
        </div>

        <!-- seler view -->
        <div class="pslider__slide" data-slider-product="soup-5">
          <!-- seler view -->
          <div class="container-fluid position-relative" data-bg="soup">
            <img data-src="dist/assets/images/pietrucha-2.png" alt="" class="decor-image" data-fruit="parsley-2">
            <img data-src="dist/assets/images/pietrucha-3.png" alt="" class="decor-image" data-fruit="parsley-3">
            <img data-src="dist/assets/images/pieprz-l.png" alt="" class="decor-image mobile" data-fruit="pepper-1-2">
            <img data-src="dist/assets/images/pieprz-l.png" alt="" class="decor-image" data-fruit="pepper-1">

            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                  <h2 class="mtitle mtitle--fs-l mtitle--lh0-6">
                    seler<br>
                    <span class="mtitle__xs">śmietana, pietruszka</span>
                  </h2>
                  <h3 class="msubtitle msubtitle--decor-color mt-40">
                    Wytrawna kompozycja delikatnych <br>białych warzyw.
                  </h3>
                  <span class="decor-line"></span>
                  <br>
                  <img data-src="dist/assets/images/sklad-seler.png" alt="" class="maxw-90">
                </div>
                <div class="col-md-4 order-md-2 order-1 text-center">
                  <div class="packshot">
                    <div class="packshot__el">
                      <img data-src="dist/assets/images/groszek---1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-40">
                      <img data-src="dist/assets/images/groszek---3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-60 ml-mobile-10">
                      <img data-src="dist/assets/images/seler---2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                      <img data-src="dist/assets/images/groszek---4.png" alt="" class="packshot__decor packshot__decor--element ml-60 ml-mobile-10" data-paralax>
                    </div>
                  </div>
                  <!-- <img data-src="dist/assets/images/seler-slide.png" alt="" class="maxw-90 maxh-65-mobile"> -->
                </div>
                <div class="col-md-4 order-md-3 order-3">
                  <div class="container text-center">
                    <div class="row">
                      <div class="col-6">
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--decor-color">
                          <strong>ENERGIA</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          115 kcal
                        </h2>
                        <span class="decor-line decor-line--50"></span>
  
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--light-color">
                          <strong>TŁUSZCZE</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          5,7 g
                        </h2>
                      </div>
                      <div class="col-6">
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--light-color">
                          <strong>BIAŁKO</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          2,9 g
                        </h2>
                        <span class="decor-line decor-line--50"></span>
  
                        <h3 class="msubtitle msubtitle--decor-color">
                          <strong>WĘGLOWODANY</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          9,8 g
                        </h2>
                      </div>
                    </div>
                  </div>
                  <figure class="text-left">
                    <img data-src="dist/assets/images/pieprz-m.png" alt="" class="mt-80 ml-110">
                  </figure>
                </div>
              </div>
            </div>
          </div>
          <div class="more-products more-products--soup">
            <h2 class="mtitle">
              poznaj inne smaki
            </h2>
            <img data-src="dist/assets/images/splash.png" alt="" class="decor-image" data-fruit="splash">
            <img data-src="dist/assets/images/seler-cut.png" alt="" class="decor-image" data-fruit="more-beetroot">
          </div>
        </div>

        <!-- marchew view -->
        <div class="pslider__slide" data-slider-product="soup-6">
          <!-- marchew view -->
          <div class="container-fluid position-relative" data-bg="soup">
            <img data-src="dist/assets/images/soup-carrot.png" alt="" class="decor-image" data-fruit="soup-carrot-2">
            <img data-src="dist/assets/images/soup-carrot.png" alt="" class="decor-image mobile" data-fruit="soup-carrot-rotate">
            <img data-src="dist/assets/images/pieprz-l.png" alt="" class="decor-image mobile" data-fruit="pepper-1-2">
            <img data-src="dist/assets/images/pieprz-l.png" alt="" class="decor-image" data-fruit="pepper-1">

            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-4 order-md-1 order-2 text-right text-center-mobile my-mobile-40">
                  <h2 class="mtitle mtitle--fs-l mtitle--lh0-6">
                    marchew<br>
                    <span class="mtitle__xs">śmietana, batat</span>
                  </h2>
                  <h3 class="msubtitle msubtitle--decor-color mt-40">
                    Esencjonalne połączenie<br>warzywnej słodyczy.
                  </h3>
                  <span class="decor-line"></span>
                  <br>
                  <img data-src="dist/assets/images/sklad-marchew.png" alt="" class="maxw-90">                  
                </div>
                <div class="col-md-4 order-md-2 order-1 text-center">
                  <div class="packshot">
                    <div class="packshot__el">
                      <img data-src="dist/assets/images/groszek---1.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-top packshot__decor--visible ml-40">
                      <img data-src="dist/assets/images/groszek---3.png" alt="" class="maxw-30 packshot__decor packshot__decor--dots-bottom packshot__decor--visible ml-60 ml-mobile-10">
                      <img data-src="dist/assets/images/marchew---2.png" alt="" class="maxw-90 packshot__product maxh-50-mobile main-animate" data-paralax>
                      <img data-src="dist/assets/images/groszek---4.png" alt="" class="packshot__decor packshot__decor--element ml-60 ml-mobile-10" data-paralax>
                    </div>
                  </div>
                  <!-- <img data-src="dist/assets/images/marchew-slide.png" alt="" class="maxw-90 maxh-65-mobile"> -->
                </div>
                <div class="col-md-4 order-md-3 order-3">
                  <div class="container text-center">
                    <div class="row">
                      <div class="col-6">
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--decor-color">
                          <strong>ENERGIA</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          142 kcal
                        </h2>
                        <span class="decor-line decor-line--50"></span>
  
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--light-color">
                          <strong>TŁUSZCZE</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          6,1 g
                        </h2>
                      </div>
                      <div class="col-6">
                        <h3 class="msubtitle msubtitle--decor-color msubtitle--light-color">
                          <strong>BIAŁKO</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          2,3 g
                        </h2>
                        <span class="decor-line decor-line--50"></span>
  
                        <h3 class="msubtitle msubtitle--decor-color">
                          <strong>WĘGLOWODANY</strong>
                        </h3>
                        <h2 class="mtitle mtitle__ms mtitle--no-transform mtitle--lh0-8">
                          16 g
                        </h2>
                      </div>
                    </div>
                  </div>
                  <figure class="text-left">
                    <img data-src="dist/assets/images/pieprz-m.png" alt="" class="mt-80 ml-110">
                  </figure>
                </div>
              </div>
            </div>
          </div>
          <div class="more-products more-products--soup">
            <h2 class="mtitle">
              poznaj inne smaki
            </h2>
            <img data-src="dist/assets/images/splash.png" alt="" class="decor-image" data-fruit="splash">
            <img data-src="dist/assets/images/marchewka-cut.png" alt="" class="decor-image" data-fruit="more-beetroot">
          </div>
        </div>
  
        <!-- P R O D U C T S  L I S T  C O M P O N E N T  src/components/_products-list.scss -->
        <div class="products-list">
          <div class="products-list__el products-list__el--soup">
            <img data-src="dist/assets/images/zupa-burak-smietana.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
            <img data-src="dist/assets/images/burak-hover.png" alt="" class="products-list__hover-image" data-hover="burak-smietana-hover-1" data-delay="1">
            <img data-src="dist/assets/images/splash-hover.png" alt="" class="products-list__hover-image" data-hover="burak-smietana-hover-2" data-delay="2">
            <a href="#" class="products-list__show" data-init-category="soup" data-product="2"></a>
          </div>
          <div class="products-list__el products-list__el--soup">
            <img data-src="dist/assets/images/zupa-pomidor-marchew.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
            <img data-src="dist/assets/images/tomato-hover.png" alt="" class="products-list__hover-image" data-hover="pomidor-hover-1" data-delay="1">
            <img data-src="dist/assets/images/carrot-hover.png" alt="" class="products-list__hover-image" data-hover="pomidor-hover-2" data-delay="2">
            <a href="#" class="products-list__show" data-init-category="soup" data-product="3"></a>
          </div>
          <div class="products-list__el products-list__el--soup">
            <img data-src="dist/assets/images/zupa-truskawka-smietana.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
            <img data-src="dist/assets/images/splash-hover-2.png" alt="" class="products-list__hover-image" data-hover="ts-hover-1" data-delay="1">
            <img data-src="dist/assets/images/truskawka.png" alt="" class="products-list__hover-image" data-hover="ts-hover-2" data-delay="2">
            <a href="#" class="products-list__show" data-init-category="soup" data-product="4"></a>
          </div>
          <div class="products-list__el products-list__el--soup">
            <img data-src="dist/assets/images/zupa-seler-smietana.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
            <img data-src="dist/assets/images/celery-hover.png" alt="" class="products-list__hover-image" data-hover="seler-hover-1" data-delay="1">
            <img data-src="dist/assets/images/splash-hover-3.png" alt="" class="products-list__hover-image" data-hover="seler-hover-2" data-delay="2">
            <a href="#" class="products-list__show" data-init-category="soup" data-product="5"></a>
          </div>
          <div class="products-list__el products-list__el--soup">
            <img data-src="dist/assets/images/zupa-marchew-smietana.png" alt="" class="products-list__figure">
            <img data-src="dist/assets/images/products-list-hover.png" alt="" class="products-list__hover">
            <img data-src="dist/assets/images/splash-hover-3.png" alt="" class="products-list__hover-image" data-hover="m-hover-1" data-delay="1">
            <img data-src="dist/assets/images/carrot-hover.png" alt="" class="products-list__hover-image" data-hover="m-hover-2" data-delay="2">
            <a href="#" class="products-list__show" data-init-category="soup" data-product="6"></a>
          </div>
          <div class="products-list__el products-list__el--more products-list__el--soup-more">
            <h2 class="mtitle mtitle--lh1">
              <span class="mtitle__s d-block">Poznaj nasze musy </span>
              <span class="mtitle__xl">owocowe</span>
            </h2>
            <img data-src="dist/assets/images/arr-right.png" alt="" class="pt-40 pl-80 pt-mobile-20 pl-mobile-30">
            <a href="#" data-next-products="2"></a>
          </div>
        </div>
  
        <!-- F O O T E R    C O M P O N E N T  src/components/_footer.scss -->
        <footer class="mfooter mfooter--soup py-60" data-overflow-hidden>
          <img data-src="dist/assets/images/produkty-grupa-4.png" alt="" class="maxw-90">
          <h2 class="mtitle">Gdzie kupić?</h2>
          <h3 class="msubtitle msubtitle--decor-color">Produkty Drugie Śniadanie można kupić w:</h3>

          <img data-src="dist/assets/images/burak-1.png" alt="" class="decor-image" data-fruit="beetroot">
          <img data-src="dist/assets/images/soup-footer-coconut.png" alt="" class="decor-image" data-fruit="coconut-footer">
          <img data-src="dist/assets/images/truskawka-1.png" alt="" class="decor-image" data-fruit="soup-strawberry-footer">
          

          <?php include 'baner-rotator.php'; ?>
          <img data-src="dist/assets/images/soup-footer-decor.png" alt="" class="decor-image" data-fruit="porridge-fruit-decor">
        </footer>
        <!-- / footer -->
  
      </div>
  </div>
  <button id="scroll-to-top" class="main-view-scroll-top">
    <img src="dist/assets/images/scroll-to-top.png" alt="">
  </button>
  <script src="dist/main.js"></script>
</body>
</html>