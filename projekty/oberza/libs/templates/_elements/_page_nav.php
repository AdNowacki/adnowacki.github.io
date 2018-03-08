<div id="menu-ctn">
    <h2><?= strtoupper( $this->data['dictionary_page'][20][LANG] ); ?></h2>
    <ul>
        <li><a href="<?= BASE; ?>"><?= $this->data['dictionary_page'][12][LANG]; ?></a></li>
        <li>
            <button class='submenu'><?= $this->data['dictionary_page'][13][LANG]; ?></button>
            <div class="submenu-ctn">
                <a href="<?= BASE; ?>pokoj/szczegoly/single">Single</a>
                <span>|</span>
                <a href="<?= BASE; ?>pokoj/szczegoly/classic">Classic</a>
                <span>|</span>
                <a href="<?= BASE; ?>pokoj/szczegoly/delux">DELUX</a>
                <span>|</span>
                <a href="<?= BASE; ?>pokoj/szczegoly/studio">Studio</a>
            </div>
        </li>
        <li><a href="<?= BASE; ?>resto"><?= $this->data['dictionary_page'][14][LANG]; ?></a></li>
        <li><a href="<?= BASE; ?>galeria"><?= $this->data['dictionary_page'][15][LANG]; ?></a></li>
        <li><a href="<?= BASE; ?>uslugi"><?= $this->data['dictionary_page'][16][LANG]; ?></a></li>
        <?php /*
        <?php if( !$this->data['mobile'] ) : ?>
            <li><a href="<?= BASE; ?>przewodnik"><?= $this->data['dictionary_page'][17][LANG]; ?></a></li>
        <?php endif; ?>
        */ ?>
        <li><a href="<?= BASE; ?>kontakt"><?= $this->data['dictionary_page'][18][LANG]; ?></a></li>
    </ul>
    <footer>
        <div class="fleft">
            <img src="<?= BASE; ?>public/images/logo.svg" alt=""> <?= $this->data['dictionary_page'][11][LANG]; ?>
        </div>
        <div class="fright">
            <a href="<?= $this->data['dictionary_page'][91][LANG]; ?>" target='_blank'><img src="<?= BASE; ?>public/images/fb.svg" alt=""></a>
            <a href="<?= $this->data['dictionary_page'][92][LANG]; ?>" target='_blank'><img src="<?= BASE; ?>public/images/insta.svg" alt=""></a>
            <a href="https://pl.tripadvisor.com/Hotel_Review-g274772-d954083-Reviews-Aparthotel_Oberza-Krakow_Lesser_Poland_Province_Southern_Poland.html" target='_blank'><img src="<?= BASE; ?>public/images/trip.svg" alt="" style='width: 35px;'></a>
            <!-- <a href="#" target='_blank'><img src="<?= BASE; ?>public/images/whatsapp.svg" alt=""></a> -->
        </div>
    </footer>
</div>