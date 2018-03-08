<nav id='nav'>
    <div class="fleft">
        <a href="<?= BASE; ?>" id='home'><img src="<?= BASE; ?>public/images/logo.svg" alt=""> <?= $this->data['dictionary_page'][11][LANG]; ?></a>
        <a href="tel:+48126333444" id='phone'><img src="<?= BASE; ?>public/images/phone-ico.jpg" alt=""> <span><?= $this->data['dictionary_page'][9][LANG]; ?></span></a>
    </div>
    <a href="#bookingpage" class='booking_link'><?= $this->data['dictionary_page'][19][LANG]; ?></a>
    <span class='lang'>
        <button class='lang_link_active'><?= strtoupper( LANG ); ?> <img src="<?= BASE; ?>public/images/scroll.svg"></button>
        <?php 
            $link = Routing::$routing['controller'] . '/' . Routing::$routing['action']; 
            $link .= ( Routing::$routing['param'] ) ? '/' . Routing::$routing['param'] : '';
        ?>
        <?php if( LANG == 'pl' ) : ?>
            <a href="<?= BASE . $link . '?lang=en'; ?>" class='lang_link'>EN</a>
        <?php else : ?>
            <a href="<?= BASE . $link . '?lang=pl'; ?>" class='lang_link'>PL</a>
        <?php endif; ?>
    </span>
    <a href="#" class='menu-link' id='menunav' data-open='Menu' data-close='<?= $this->data['dictionary_page'][21][LANG]; ?>'><span><?= $this->data['dictionary_page'][20][LANG]; ?></span> <i></i><i class="close-ico"></i></a>
</nav>