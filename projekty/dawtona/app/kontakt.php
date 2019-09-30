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

<body class="normal-page">

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
        <img src="dist/assets/images/nav-btn-open.png" alt="" data-action="open">
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
              <a href="/dawtona/app/#1" class="mnav__link">
                <img src="dist/assets/images/nav-drugie-sniadanie.png" alt="">
                Drugie śniadanie?
              </a>
            </li>
            <li>
              <a href="/dawtona/app/#2" class="mnav__link">
                <img src="dist/assets/images/nav-musy-owocowe.png" alt="">
                Musy owocowe
              </a>
            </li>
            <li>
              <a href="/dawtona/app/#3" class="mnav__link">
                <img src="dist/assets/images/nav-musy-warzywne.png" alt="">
                Musy warzywne
              </a>
            </li>
            <li>
              <a href="/dawtona/app/#4" class="mnav__link">
                <img src="dist/assets/images/nav-musy-zboza.png" alt="">
                Musy+zboża
              </a>
            </li>
            <li>
              <a href="/dawtona/app/#5" class="mnav__link">
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

  <!-- content -->
  <div class="position-relative">

    <img src="dist/assets/images/kiwi-xs-rotate.png" alt="" class="decor-image mobile" data-fruit="contact-kiwi-mobile">
    <img src="dist/assets/images/bilberry-contact-mobile.png" alt="" class="decor-image mobile" data-fruit="bilberry-contact-mobile">
    <img src="dist/assets/images/contact-rapsberry-xxl.png" alt="" class="decor-image mobile" data-fruit="contact-rapsberry-xxl-mobile">

    <div class="container mcontent">
      <div class="row">
        <div class="col-12">
          <h2 class="mtitle mtitle--fs-l mtitle--lh1 text-center pt-140 mb-100 mb-mobile-10">
            kontakt
          </h2>
        </div>
      </div>
      <div class="row my-40 text-center">
        <div class="col-md-6">
          <p>
            <strong>DAWTONA SP. Z O.O.</strong><br>
            ul. Bieniewicka 52<br>
            05-870 Błonie k. Warszawy <br>
            NIP: 118 213 59 17
          </p>
          <p>
            <a href="mailto:dawtona@dawtona.pl">
              dawtona@dawtona.pl
              <img src="dist/assets/images/arr-right.png" alt="">
            </a>
          </p>
          <img src="dist/assets/images/cherry-title.png" alt="" class="mobile my-20 maxw-20">
        </div>
        <div class="col-md-6 position-relative">
          <p>
            Oferty marketingowe<br>
            oraz zapytania dotyczące<br>
            sponsoringu prosimy<br>
            kierować wyłącznie na adres:
          </p>
          <p>
            <a href="mailto:marketing@dawtona.pl">
              marketing@dawtona.pl
              <img src="dist/assets/images/arr-right.png" alt="">
            </a>
          </p>
          <img src="dist/assets/images/kiwi-xs-rotate.png" alt="" class="decor-image for-desktop" data-fruit="contact-kiwi">
        </div>
      </div>
    </div>
  </div>

  <!-- F O O T E R    C O M P O N E N T  src/components/_footer.scss -->
  <footer class="mfooter mfooter--fruits py-110 pt-mobile-20" data-overflow-hidden>

    <img src="dist/assets/images/fruit-footer-banan-2.png" alt="" class="decor-image" data-fruit="fruit-footer-banan-2">
    <img src="dist/assets/images/contact-rapsberry-xxl.png" alt="" class="decor-image for-desktop" data-fruit="contact-rapsberry-xxl">

    <img src="dist/assets/images/produkty-grupa-4.png" alt="" class="maxw-90">
  </footer>
  <!-- / footer -->

  <button id="scroll-to-top">
    <img src="dist/assets/images/scroll-to-top.png" alt="">
  </button>


  <script src="dist/main.min.js"></script>
</body>

</html>