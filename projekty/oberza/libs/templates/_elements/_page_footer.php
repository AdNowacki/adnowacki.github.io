<footer class='page-footer'>
    <p class="contact-f"><?= $this->data['dictionary_page'][8][LANG]; ?> <a href="tel:+48<?= preg_replace( "/\s/" , '', $this->data['dictionary_page'][9][LANG] ); ?>"><?= $this->data['dictionary_page'][9][LANG]; ?></a> | <a href="mailto:<?= $this->data['dictionary_page'][10][LANG]; ?>"><?= $this->data['dictionary_page'][10][LANG]; ?></a></p>
    <div class="container-fluid">
        <div class="row">
            <?php /*
            <div class="col-md-4 logo-f">
                <a href="<?= BASE; ?>" id="home-f"><img src="<?= BASE; ?>public/images/logo.svg" alt=""> <?= $this->data['dictionary_page'][11][LANG]; ?></a>
            </div>
            <div class="col-md-8 nav-f">
                <a href="<?= BASE; ?>home"><?= $this->data['dictionary_page'][12][LANG]; ?></a>
                <a href="<?= BASE; ?>pokoj/widok/single"><?= $this->data['dictionary_page'][93][LANG]; ?></a>
                <a href="<?= BASE; ?>pokoj/widok/classic"><?= $this->data['dictionary_page'][94][LANG]; ?></a>
                <a href="<?= BASE; ?>pokoj/widok/delux"><?= $this->data['dictionary_page'][95][LANG]; ?></a>
                <a href="<?= BASE; ?>pokoj/widok/studio"><?= $this->data['dictionary_page'][96][LANG]; ?></a>
                <a href="<?= BASE; ?>restauracja"><?= $this->data['dictionary_page'][14][LANG]; ?></a>
                <a href="<?= BASE; ?>galeria"><?= $this->data['dictionary_page'][15][LANG]; ?></a>
                <a href="<?= BASE; ?>uslugi"><?= $this->data['dictionary_page'][16][LANG]; ?></a>
                <?php /*
                <?php if( !$this->data['mobile'] ) : ?>
                    <a href="<?= BASE; ?>przewodnik"><?= $this->data['dictionary_page'][17][LANG]; ?></a>
                <?php endif; ?>
                
                <a href="<?= $this->data['dictionary_page'][91][LANG]; ?>" target='_blank' class='image-link'><img src="<?= BASE; ?>public/images/fb.svg" alt=""></a>
                <a href="<?= $this->data['dictionary_page'][92][LANG]; ?>" target='_blank' class='image-link'><img src="<?= BASE; ?>public/images/insta.svg" alt=""></a>
                <!-- <a href="#" class='image-link'><img src="<?= BASE; ?>public/images/whatsapp.svg" alt=""></a> -->
            </div>
            */ ?>

            <div class="col-md-12 logo-f">
                <a href="<?= BASE; ?>" id="home-f"><img src="<?= BASE; ?>public/images/logo.svg" alt=""> <?= $this->data['dictionary_page'][11][LANG]; ?></a>
            </div>
            <div class="col-md-12 nav-f">
                <a href="<?= BASE; ?>home"><?= $this->data['dictionary_page'][12][LANG]; ?></a>
                <a href="<?= BASE; ?>pokoj/szczegoly/single"><?= $this->data['dictionary_page'][93][LANG]; ?></a>
                <a href="<?= BASE; ?>pokoj/szczegoly/classic"><?= $this->data['dictionary_page'][94][LANG]; ?></a>
                <a href="<?= BASE; ?>pokoj/szczegoly/delux"><?= $this->data['dictionary_page'][95][LANG]; ?></a>
                <a href="<?= BASE; ?>pokoj/szczegoly/studio"><?= $this->data['dictionary_page'][96][LANG]; ?></a>
                <a href="<?= BASE; ?>resto"><?= $this->data['dictionary_page'][14][LANG]; ?></a>
                <a href="<?= BASE; ?>galeria"><?= $this->data['dictionary_page'][15][LANG]; ?></a>
                <a href="<?= BASE; ?>uslugi"><?= $this->data['dictionary_page'][16][LANG]; ?></a>
                <a href="<?= BASE; ?>kontakt"><?= $this->data['dictionary_page'][18][LANG]; ?></a>
                <?php /*
                <?php if( !$this->data['mobile'] ) : ?>
                    <a href="<?= BASE; ?>przewodnik"><?= $this->data['dictionary_page'][17][LANG]; ?></a>
                <?php endif; ?>
                */ ?>
                <a href="<?= $this->data['dictionary_page'][91][LANG]; ?>" target='_blank' class='image-link'><img src="<?= BASE; ?>public/images/fb.svg" alt=""></a>
                <a href="<?= $this->data['dictionary_page'][92][LANG]; ?>" target='_blank' class='image-link'><img src="<?= BASE; ?>public/images/insta.svg" alt=""></a>
                <a href="https://pl.tripadvisor.com/Hotel_Review-g274772-d954083-Reviews-Aparthotel_Oberza-Krakow_Lesser_Poland_Province_Southern_Poland.html" target='_blank'  class='image-link'><img src="<?= BASE; ?>public/images/trip.svg" alt="" style='width: 35px;'></a>
                <!-- <a href="#" class='image-link'><img src="<?= BASE; ?>public/images/whatsapp.svg" alt=""></a> -->
            </div>
        </div>
    </div>
</footer>

<div id="res">
    <a href="https://www.booking.com/hotel/pl/oberza-sasiadow.pl.html#availability_target"><?= $this->data['dictionary_page'][19][LANG]; ?></a>
</div>