<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>dawtona</title>
  <meta property="og:url" content="" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="" />
  <meta property="og:description" content="" />
  <meta property="og:image" content="" />

  <link rel="preload" href="dist/style.production.css" as="style">
  <link rel="preload" href="dist/main.min.js" as="script">

  <link rel="stylesheet" href="dist/style.production.css">
</head>

<body>

  <!-- H E A D E R    C O M P O N E N T  src/components/_header.scss -->
  <header class="mheader" data-overflow-hidden>
    <div class="mheader__col">
      <a href="/">
        <img src="dist/assets/images/drugie-sniadanie-logo-head.png" class="mheader__logo" alt="Drugie Śniadanie Dawtona logo">
      </a>
    </div>
    <div class="mheader__col">

      <!-- M E N U   B U T T O N   C O M P O N E N T  src/components/_navigation.scss -->
      <button class="mnav-action-btn" id="nav-action">
        <img src="dist/assets/images/nav-btn-open-decor.png" alt="" data-action="open">
        <img src="dist/assets/images/nav-btn-close.png" alt="" data-action="close">
      </button>
      <button class="mnav-action-btn" id="nav-action-back">
        <img src="dist/assets/images/back-btn.png" alt="">
      </button>
    </div>
  </header>

  <!-- M E N U   C O N T E N T   C O M P O N E N T  src/components/_navigation.scss -->
  <nav class="mnav">
    <img src="dist/assets/images/malina-nav.png" alt="" class="decor-image" data-fruit="raspberry">
    <img src="dist/assets/images/kokos-nav.png" alt="" class="decor-image" data-fruit="coconut-nav">

    <div class="container">
      <div class="row">
        <div class="col-md-6 mnav__col mnav__border-decor">
          <ul class="mnav__links">
            <li>
              <a href="?page=sniadanie" class="mnav__link">
                <img src="dist/assets/images/nav-drugie-sniadanie.png" alt="">
                Drugie śniadanie?
              </a>
            </li>
            <li>
              <a href="?page=owocowe" class="mnav__link">
                <img src="dist/assets/images/nav-musy-owocowe.png" alt="">
                Musy owocowe
              </a>
            </li>
            <li>
              <a href="?page=warzywne" class="mnav__link">
                <img src="dist/assets/images/nav-musy-warzywne.png" alt="">
                Musy warzywne
              </a>
            </li>
            <li>
              <a href="?page=zboza" class="mnav__link">
                <img src="dist/assets/images/nav-musy-zboza.png" alt="">
                Musy+zboża
              </a>
            </li>
            <li>
              <a href="?page=picie" class="mnav__link">
                <img src="dist/assets/images/nav-do-picia.png" alt="">
                Do picia
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-6 mnav__col">
          <ul class="mnav__links mnav__links--xs">
            <li>
              <a href="o-nas.php" class="mnav__link">
                O nas
              </a>
            </li>
            <li>
              <a href="kontakt.php" class="mnav__link">
                Kontakt
              </a>
            </li>
            <li>
              <a href="gdzie-kupic.php" class="mnav__link">
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
                <img src="dist/assets/images/icon-fb.png" alt="">
              </a>
              <a href="#twitter">
                <img src="dist/assets/images/icon-twitter.png" alt="">
              </a>
              <a href="#instagram">
                <img src="dist/assets/images/icon-instagram.png" alt="">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <figure class="text-center my-50">
      <img src="dist/assets/images/produkty-grupa-4-nav.png" alt="" class="maxw-90">
    </figure>
  </nav>

  <!-- news slider -->
  <div class="position-relative">
    
    <img src="dist/assets/images/news-slide-banan.png" alt="" class="decor-image decor-image--top-layer" data-fruit="news-slide-banan">
    <img src="dist/assets/images/carrot-hover.png" alt="" class="decor-image decor-image--top-layer" data-fruit="news-carrot">
    <img src="dist/assets/images/home-main-raspberry-small.png" alt="" class="decor-image decor-image--top-layer" data-fruit="news-raspberry">

    <div class="news-slider">
      <div class="news-slider__inner">
        <div>
          <!-- news slide 1 -->
          <div class="news-slider__el news-slider__el--active" data-news-slide="1">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-sm-6">
                  <img src="dist/assets/images/slide-1-image.png" alt="">
                </div>
                <div class="col-sm-6">
                  <article class="news">
                    <span class="news-date">06/02/19</span>
                    <h2 class="news-title">
                      dawtona z nowym smakiem na polskim rynku
                    </h2>
                    <div class="news-slider__content">
                      <p>
                        W niektórych polskich sklepach w Polsce można spotkać nowy wariant Dawtona Drugie Śniadanie o w pojemnościach 0.5 i 1 l. To nowa oferta koncernu na nasz rynek, która szerzej będzie komunikowana w połowie sierpnia br.
                      </p>
                    </div>
                    <img src="dist/assets/images/bilberry-title.png" alt="" class="mt-30 ml-40">
                  </article>
                </div>
              </div>
            </div>
          </div>

          <!-- news slide 2 -->
          <div class="news-slider__el" data-news-slide="2">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-sm-6">
                  <img src="dist/assets/images/slide-1-image.png" alt="">
                </div>
                <div class="col-sm-6">
                  <article class="news">
                    <span class="news-date">09/02/19</span>
                    <h2 class="news-title">
                      dawtona z nowym smakiem na polskim rynku 2012
                    </h2>
                    <div class="news-slider__content">
                      <p>
                        W niektórych polskich sklepach w Polsce można spotkać nowy wariant Dawtona Drugie Śniadanie o w pojemnościach 0.5 i 1 l. To nowa oferta koncernu na nasz rynek, która szerzej będzie komunikowana w połowie sierpnia br.
                      </p>
                    </div>
                    <img src="dist/assets/images/bilberry-title.png" alt="" class="mt-30 ml-40">
                  </article>
                </div>
              </div>
            </div>
          </div>

          <!-- news slide 3 -->
          <div class="news-slider__el" data-news-slide="3">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-sm-6">
                  <img src="dist/assets/images/slide-1-image.png" alt="">
                </div>
                <div class="col-sm-6">
                  <article class="news">
                    <span class="news-date">09/02/2015</span>
                    <h2 class="news-title">
                      dawtona z nowym smakiem na polskim rynku 2012
                    </h2>
                    <div class="news-slider__content">
                      <p>
                        W niektórych polskich sklepach w Polsce można spotkać nowy wariant Dawtona Drugie Śniadanie o w pojemnościach 0.5 i 1 l. To nowa oferta koncernu na nasz rynek, która szerzej będzie komunikowana w połowie sierpnia br.
                      </p>
                    </div>
                    <img src="dist/assets/images/bilberry-title.png" alt="" class="mt-30 ml-40">
                  </article>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- VIEW SLIDER NAVIGATION -->
      <div class="view-navigation">
        <button class="view-navigation__action" data-news-slider-action="prev">
          <img src="dist/assets/images/prev.png" alt="">
        </button>
        <span class="view-navigation__current">01</span>
        <div class="view-navigation__separator"></div>
        <span class="viev-navigation__all-slides"></span>
        <button class="view-navigation__action" data-news-slider-action="next">
          <img src="dist/assets/images/next.png" alt="">
        </button>
      </div>
    </div>
  </div>

  <!-- others news -->
  <div class="container position-relative py-90">
    <img src="dist/assets/images/banan-slice.png" class="decor-image" alt="" data-fruit="news-banan-slice-xxl">
    <div class="row">
      <div class="col-12 text-center mb-30">
        <h2 class="mtitle mtitle--no-transform mtitle--fs-l mtitle--lh0-6 mtitle--light-decor-color">
          Pozostałe<br>
          <span class="mtitle__xs">aktualności</span>
        </h2>
      </div>
      <div class="col-md-4 news">
        <div class="news__el">
          <figure>
            <img src="dist/assets/images/nesw-1.png" alt="" class="news__picture">
          </figure>
          <div class="news__details mt-40">
            <span class="news-date news-date--s">06/02/19</span>
            <h2 class="news-title news-title--s">
              dawtona z nowym smakiem na polskim rynku
            </h2>
          </div>
          <a href="#"></a>
        </div>
      </div>
      <div class="col-md-4 news">
        <div class="news__el">
          <figure>
            <img src="dist/assets/images/news-2.png" alt="" class="news__picture">
          </figure>
          <div class="news__details mt-40">
            <span class="news-date news-date--s">06/02/19</span>
            <h2 class="news-title news-title--s">
              dawtona z nowym smakiem na polskim rynku
            </h2>
          </div>
          <a href="#"></a>
        </div>
      </div>
      <div class="col-md-4 news">
        <div class="news__el">
          <figure>
            <img src="dist/assets/images/news-3.png" alt="" class="news__picture">
          </figure>
          <div class="news__details mt-40">
            <span class="news-date news-date--s">06/02/19</span>
            <h2 class="news-title news-title--s">
              dawtona z nowym smakiem na polskim rynku
            </h2>
          </div>
          <a href="#"></a>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->
  <footer class="mfooter py-30 mb-150">
    <img src="dist/assets/images/footer-grain.png" alt="" class="decor-image" data-fruit="footer-grain">
    <img src="dist/assets/images/footer-cherry.png" alt="" class="decor-image" data-fruit="footer-cherry">
    <img src="dist/assets/images/footer-strawberry.png" alt="" class="decor-image" data-fruit="footer-strawberry">

    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-3 text-center">
          <img src="dist/assets/images/footer-p-1.png" alt="">
        </div>
        <div class="col-md-6">
          <h2 class="mtitle mtitle--no-transform mtitle--fs-m mtitle--lh1">
            “ Dbamy o to, by Drugie Śniadanie<br>
            było nie tylko smaczne,<br>
            ale i odżywcze”. 
          </h2>
        </div>
        <div class="col-md-3 text-center">
          <img src="dist/assets/images/footer-p-2.png" alt="">
        </div>
      </div>
    </div>
  </footer>
  
  <script src="dist/main.min.js"></script>
</body>

</html>