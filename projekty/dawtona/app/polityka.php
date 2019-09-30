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

  <!-- content -->
  <div class="position-relative">
    <img src="dist/assets/images/bilberry-title.png" alt="" class="decor-image" data-fruit="policy-billberry">
    <img src="dist/assets/images/bilberry-contact-mobile.png" alt="" class="decor-image mobile" data-fruit="bilberry-contact-mobile">
    <img src="dist/assets/images/home-main-raspberry-medium.png" alt="" class="decor-image for-desktop" data-fruit="policy-raspberry">
    <img src="dist/assets/images/banan-slice.png" alt="" class="decor-image" data-fruit="policy-banan-slice">
    <img src="dist/assets/images/brzoskwinia-blur.png" alt="" class="decor-image for-desktop" data-fruit="policy-peach-blur">
    <img src="dist/assets/images/cherry-title.png" alt="" class="decor-image for-desktop" data-fruit="policy-cherry">
    <img src="dist/assets/images/mint-2.png" alt="" class="decor-image" data-fruit="policy-mint">

    <div class="container mcontent">
      <div class="row">
        <div class="col-12">
          <h2 class="mtitle mtitle--fs-l mtitle--lh1 text-center pt-140 mb-100">
            polityka prywatności
            <span class="mtitle__s d-block">w Dawtona Sp. z o.o.</span>
          </h2>
          
          <h3>Informacje wstępne</h3>
          <p>
            Szanując prawo do prywatności osób, które powierzyły Dawtona Sp. z o.o. swoje dane osobowe, w tym naszych kontrahentów i ich pracowników, pragniemy zadeklarować, że pozyskane dane przetwarzamy zgodnie z krajowymi i europejskimi przepisami prawa oraz w warunkach zapewaniających ich bezpieczeństwo. Chcąc zapewnić transparentność realizowanych przez siebie procesów przetwarzania przedstawiamy obowiązujące w Dawtona Sp. z o.o. zasady ochrony danych osobowych, ustanowione na gruncie Rozporządzenia Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE (ogólne rozporządzenie o ochronie danych, dalej „RODO”).<br>
            Niniejsza Polityka prywatności nie zastępuje Polityki ochrony danych osobowych, przyjętej i stosowanejw Spółce, która obejmuje wszystkie dane osobowe przetwarzane przez Dawtona Sp. z o.o. w jakiejkolwiek formie, zarówno elektronicznej, jak i papierowej.
          </p>

          <h3>Administrator danych</h3>
          <p>
            Administratorem, czyli podmiotem decydującym o celach i środkach przetwarzania danych osobowych jest Dawtona Sp. z o.o. z siedzibą przy ul. Bieniewickiej 52, 05-870 Błonie. Kontakt z Administratorem jest możliwy poprzez adres e-mail: dawtona@dawtona.pl lub adres korespondencyjny: Dawtona Sp. z o.o., ul. Bieniewicka 52, 05-870 Błonie.<br>
            Administrator wyznaczył Inspektora Ochrony Danych, Pana Kamila Misiaka, z którym można skontaktować się w każdej sprawie dotyczącej przetwarzania danych osobowych poprzez adres e-mail: iod@dawtona.pl lub listownie na adres: Dawtona Sp. z o.o., ul. Bieniewicka 52, 05-870 Błonie.
          </p>

          <h3>Przetwarzanie danych przez Administratora</h3>
          <p>
            W związku z prowadzoną przez siebie działalnością gospodarczą, Administrator zbiera i przetwarza dane osobowe zgodnie z właściwymi przepisami, w tym w szczególności z RODO, i przewidzianymi w nich zasadami przetwarzania danych.<br>
            Administrator zapewnia przejrzystość przetwarzania danych, w szczególności informuje o przetwarzaniu danych w momencie ich zbierania, w tym o celu i podstawie prawnej przetwarzania. Administrator dba o to, by dane były zbierane tylko w zakresie niezbędnym do wskazanego celu i przetwarzane tylko przez okres, w jakim jest to niezbędne.<br>
            Przetwarzając dane, Administrator zapewnia ich bezpieczeństwo i poufność oraz dostęp do informacji o tym przetwarzaniu dla osób, których dane dotyczą. W przypadku, gdyby pomimo stosowanych środków bezpieczeństwa, doszło do naruszenia ochrony danych osobowych (np. „wycieku” danych lub ich utraty), Administrator informuje o takim zdarzeniu osoby, których dane dotyczą, w sposób zgodny z przepisami.
          </p>

          <h3>Bezpieczeństwo danych osobowych</h3>
          <p>
            W celu zapewnienia integralności i poufności danych, Administrator wdrożył procedury umożliwiające dostęp do danych osobowych jedynie osobom upoważnionym i jedynie w zakresie, w jakim jest to niezbędne ze względu na wykonywane przez nie zadania. Administrator stosuje rozwiązania organizacyjne i techniczne w celu zapewnienia, że wszystkie operacje na danych osobowych są dokonywane tylko przez osoby uprawnione.<br>
            Administrator podejmuje ponadto wszelkie niezbędne działania, by także jego podwykonawcy i inne podmioty współpracujące dawały gwarancję stosowania odpowiednich środków bezpieczeństwa w każdym przypadku, gdy przetwarzają dane osobowe na zlecenie Administratora.<br>
            Administrator prowadzi na bieżąco analizę ryzyka i monitoruje adekwatność stosowanych zabezpieczeń danych do identyfikowanych zagrożeń. W razie konieczności, Administrator wdraża dodatkowe środki służące zwiększeniu bezpieczeństwa danych.
          </p>
          <p>
            <strong>Cele oraz podstawy prawne przetwarzania danych przez Administratora</strong>
          </p>
          <p>
            Administrator realizując swoje funkcje biznesowe przetwarza dane w następujących celach i na podstawie poniższych podstaw prawnych:
          </p>
          <p>
            <strong>1) Korespondencja e-mailowa oraz tradycyjna:</strong>
          </p>
          <p>
            w przypadku kierowania do Administratora korespondencji e-mailowej lub drogą tradycyjną, niezwiązanej z usługami świadczonymi na rzecz nadawcy lub inną zawartą z nim umową, dane osobowe zawarte w tej korespondencji są przetwarzane wyłącznie w celu komunikacji i załatwienia sprawy, której dotyczy ta korespondencja. Podstawą prawną przetwarzania jest uzasadniony interes Administratora (art. 6 ust. 1 lit f RODO), polegający na prowadzeniu korespondencji kierowanej do niego w związku z prowadzoną działalnością gospodarczą. Administrator przetwarza jedynie dane osobowe istotne dla sprawy, której dotyczy korespondencja. Całość korespondencji jest przechowywana w sposób zapewniający bezpieczeństwo zawartych w niej danych osobowych oraz innych informacji i ujawniana jedynie osobom upoważnionym.
          </p>
          <p>
            <strong>2) Kontakt telefoniczny:</strong>
          </p>
          <p>
            w przypadku kontaktowania się z Administratorem drogą telefoniczną, w sprawach niezwiązanych z zawartą umową lub świadczonymi usługami, możemy żądać podania danych osobowych tylko wówczas, gdy będzie to niezbędne do obsługi sprawy, której dotyczy kontakt. Podstawą prawną jest w takim wypadku uzasadniony interes Administratora (art. 6 ust. 1 lit f RODO), polegający na konieczności załatwienia zgłoszonej sprawy związanej z prowadzoną działalnością gospodarczą.
          </p>
          <p>
            <strong>3) Monitoring wizyjny oraz kontrola wstępu:</strong>
          </p>
          <p>
            w celu zapewnienia bezpieczeństwa osób i mienia oraz w celu zapewnienia bezpieczeństwa pracowników i w celu kontroli produkcji. Administrator stosuje monitoring wizyjny oraz kontroluje wstęp na teren zarządzany przez Administratora. W szczególności monitoring wizyjny jest wykorzystywany w siedzibie Spółki oraz w Zakładach Produkcyjnych Administratora. Zebrane w ten sposób dane nie są wykorzystywane dla żadnych innych celów. Dane osobowe w postaci nagrań z monitoringu oraz dane zbierane w rejestrze wejść i wyjść są przetwarzane w celu zapewnienia bezpieczeństwa i porządku na terenie obiektu oraz ewentualnie w celu obrony lub dochodzenia roszczeń. Podstawą przetwarzania danych osobowych jest uzasadniony interes Administratora (art. 6 ust. 1 lit. f i c RODO) polegający na zapewnieniu bezpieczeństwa mienia Administratora oraz ochrony jego praw, a w przypadku pracowników i kontroli produkcji wynika to z przepisów prawa (art. 222 KP).
          </p>
          <p>
            <strong>4) Rekrutacja:</strong>
          </p>
          <p>
            w ramach procesów rekrutacyjnych, Administrator oczekuje przekazywania danych osobowych jedynie w zakresie określonym w przepisach prawa pracy. W związku z tym, nie należy przekazywać informacji w szerszym zakresie. W razie, gdy przesłane aplikacje będą zawierać tego rodzaju dodatkowe dane, Administrator uzna, że kandydat wyraża zgodę na ich przetwarzanie w celu rekrutacyjnym. <br>
            Dane osobowe kandydatów są przetwarzane:<br>
            − w celu wykonania obowiązków wynikających z przepisów prawa, związanych z procesem zatrudnienia,
            w tym przede wszystkim Kodeksu pracy – podstawą prawną przetwarzania jest obowiązek prawny ciążący na Administratorze (art. 6 ust. 1 lit c RODO w związku z przepisami Kodeksu pracy);
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- F O O T E R    C O M P O N E N T  src/components/_footer.scss -->
  <footer class="mfooter mfooter--fruits py-110" data-overflow-hidden>

    <img src="dist/assets/images/fruit-footer-banan-2.png" alt="" class="decor-image for-desktop" data-fruit="fruit-footer-banan-2">
    <img src="dist/assets/images/strawberr-footer.png" alt="" class="decor-image" data-fruit="strawberr-footer">

    <img src="dist/assets/images/produkty-grupa-4.png" alt="" class="maxw-90">
  </footer>
  <!-- / footer -->

  <button id="scroll-to-top">
    <img src="dist/assets/images/scroll-to-top.png" alt="">
  </button>


  <script src="dist/main.js"></script>
</body>

</html>