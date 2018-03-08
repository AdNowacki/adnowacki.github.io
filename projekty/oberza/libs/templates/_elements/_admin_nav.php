<nav id="admin-nav">
	<h1>O!CMS</h1>
	<?php /* <h1><img src="<?= BASE; ?>public/images/sas.jpg" style='display: block; opacity: 1; height: 50px;' alt=""></h1> */ ?>
	<div>
		<a href="<?= BASE; ?>admin" <?php if( Helper::activeNavigate( 'admin' ) ) echo "class='act'"; ?>>Start</a>
		<?php if( $this->data['user_log']['uprawnienia'] == 'admin' || $this->data['user_log']['uprawnienia'] == 'superadmin' || $this->data['user_log']['uprawnienia'] == 'user' ) : ?>


		<a href="#" class='sub-nav <?php if( Helper::activeNavigate( 'admin_galeria' ) || Helper::activeNavigate( 'admin_zdjecia' ) ) echo " act"; ?>'>Galeria</a>
		<div class="sub" <?php if( Helper::activeNavigate( 'admin_galeria' ) || Helper::activeNavigate( 'admin_zdjecia' ) ) echo "style='display: block'"; ?>>
			<a href="<?= BASE; ?>admin_galeria" <?php if( Helper::activeNavigate( 'admin_galeria', 'widok' ) ) echo "class='act'"; ?>>Przeglądaj galerię</a>
			<a href="<?= BASE; ?>admin_galeria/dodaj" <?php if( Helper::activeNavigate( 'admin_galeria', 'dodaj' ) ) echo "class='act'"; ?>>Dodaj zdjęcie do galerii</a>
		</div>
		<?php /*
			<a href="#" class='sub-nav <?php if( Helper::activeNavigate( 'admin_kategorie' ) || Helper::activeNavigate( 'admin_kategorie_newsroom' ) || Helper::activeNavigate( 'admin_kategorie_wydarzenia' ) || Helper::activeNavigate( 'admin_kategorie_firm' ) || Helper::activeNavigate( 'admin_kategorie_galeria' ) ) echo " act"; ?>'>Kategorie</a>
			<div class="sub" <?php if( Helper::activeNavigate( 'admin_kategorie' ) || Helper::activeNavigate( 'admin_kategorie_newsroom' ) || Helper::activeNavigate( 'admin_kategorie_wydarzenia' ) || Helper::activeNavigate( 'admin_kategorie_firm' ) || Helper::activeNavigate( 'admin_kategorie_galeria' ) ) echo "style='display: block'"; ?>>
				<a href="<?= BASE; ?>admin_kategorie" <?php if( Helper::activeNavigate( 'admin_kategorie', 'widok' ) ) echo "class='act'"; ?>>Przeglądaj kategorie artykułów</a>
				<a href="<?= BASE; ?>admin_kategorie/dodaj" <?php if( Helper::activeNavigate( 'admin_kategorie', 'dodaj' ) ) echo "class='act'"; ?>>Dodaj kategorię artykułu</a>
				<div class="separator-line"></div>
				<a href="<?= BASE; ?>admin_kategorie_wydarzenia" <?php if( Helper::activeNavigate( 'admin_kategorie_wydarzenia', 'widok' ) ) echo "class='act'"; ?>>Przeglądaj kategorie wydarzeń</a>
				<a href="<?= BASE; ?>admin_kategorie_wydarzenia/dodaj" <?php if( Helper::activeNavigate( 'admin_kategorie_wydarzenia', 'dodaj' ) ) echo "class='act'"; ?>>Dodaj kategorię wydarzenia</a>

				<div class="separator-line"></div>
				<a href="<?= BASE; ?>admin_kategorie_newsroom" <?php if( Helper::activeNavigate( 'admin_kategorie_newsroom', 'widok' ) ) echo "class='act'"; ?>>Przeglądaj kategorie newsroom</a>
				<a href="<?= BASE; ?>admin_kategorie_newsroom/dodaj" <?php if( Helper::activeNavigate( 'admin_kategorie_newsroom', 'dodaj' ) ) echo "class='act'"; ?>>Dodaj kategorię newsroom</a>

				<div class="separator-line"></div>
				<a href="<?= BASE; ?>admin_kategorie_firm" <?php if( Helper::activeNavigate( 'admin_kategorie_firm', 'widok' ) ) echo "class='act'"; ?>>Przeglądaj kategorie firm</a>
				<a href="<?= BASE; ?>admin_kategorie_firm/dodaj" <?php if( Helper::activeNavigate( 'admin_kategorie_firm', 'dodaj' ) ) echo "class='act'"; ?>>Dodaj kategorię firm</a>

				<div class="separator-line"></div>
				<a href="<?= BASE; ?>admin_kategorie_galeria" <?php if( Helper::activeNavigate( 'admin_kategorie_galeria', 'widok' ) ) echo "class='act'"; ?>>Przeglądaj kategorie galerii</a>
				<a href="<?= BASE; ?>admin_kategorie_galeria/dodaj" <?php if( Helper::activeNavigate( 'admin_kategorie_galeria', 'dodaj' ) ) echo "class='act'"; ?>>Dodaj kategorię galerii</a>

			</div>
			
			<a href="#" class='sub-nav <?php if( Helper::activeNavigate( 'admin_artykuly' ) ) echo " act"; ?>'>Artykuły</a>
			<div class="sub" <?php if( Helper::activeNavigate( 'admin_artykuly' ) ) echo "style='display: block'"; ?>>
				<a href="<?= BASE; ?>admin_artykuly" <?php if( Helper::activeNavigate( 'admin_artykuly', 'widok' ) ) echo "class='act'"; ?>>Przeglądaj artykuły</a>
				<a href="<?= BASE; ?>admin_artykuly/dodaj" <?php if( Helper::activeNavigate( 'admin_artykuly', 'dodaj' ) ) echo "class='act'"; ?>>Dodaj artykuł</a>
			</div>
			
			<a href="<?= BASE; ?>admin_czytelnicy" <?php if( Helper::activeNavigate( 'admin_czytelnicy' ) ) echo "class='act'"; ?>>Czytelnicy artykułów</a>

			<a href="#" class='sub-nav <?php if( Helper::activeNavigate( 'admin_wydarzenia' ) ) echo " act"; ?>'>Wydarzenia</a>
			<div class="sub" <?php if( Helper::activeNavigate( 'admin_wydarzenia' ) ) echo "style='display: block'"; ?>>
				<a href="<?= BASE; ?>admin_wydarzenia" <?php if( Helper::activeNavigate( 'admin_wydarzenia', 'widok' ) ) echo "class='act'"; ?>>Przeglądaj wydarzenia</a>
				<a href="<?= BASE; ?>admin_wydarzenia/dodaj" <?php if( Helper::activeNavigate( 'admin_wydarzenia', 'dodaj' ) ) echo "class='act'"; ?>>Dodaj wydarzenie</a>
			</div>

			<a href="#" class='sub-nav <?php if( Helper::activeNavigate( 'admin_online' ) ) echo " act"; ?>'>Czytaj online</a>
			<div class="sub" <?php if( Helper::activeNavigate( 'admin_online' ) ) echo "style='display: block'"; ?>>
				<a href="<?= BASE; ?>admin_online" <?php if( Helper::activeNavigate( 'admin_online', 'widok' ) ) echo "class='act'"; ?>>Przeglądaj czasopisma</a>
				<a href="<?= BASE; ?>admin_online/dodaj" <?php if( Helper::activeNavigate( 'admin_online', 'dodaj' ) ) echo "class='act'"; ?>>Dodaj czasopismo</a>
			</div>

			<a href="#" class='sub-nav <?php if( Helper::activeNavigate( 'admin_prenumerata' ) ) echo " act"; ?>'>
				Prenumerata
				<?php if( $this->data['new'] && $this->data['new']['_NEW_'] > 0 ) : ?>
					<span class="new-order">nowe: <?= $this->data['new']['_NEW_']; ?></span>
				<?php endif; ?>
			</a>
			<div class="sub" <?php if( Helper::activeNavigate( 'admin_prenumerata' ) ) echo "style='display: block'"; ?>>
				<a href="<?= BASE; ?>admin_prenumerata/nowe" <?php if( Helper::activeNavigate( 'admin_prenumerata', 'nowe' ) ) echo "class='act'"; ?>>Nowe zgłoszenia</a>
				<a href="<?= BASE; ?>admin_prenumerata" <?php if( Helper::activeNavigate( 'admin_prenumerata', 'widok' ) ) echo "class='act'"; ?>>Wszystkie zgłoszenia</a>
			</div>

			<a href="#" class='sub-nav <?php if( Helper::activeNavigate( 'admin_firmy' ) ) echo " act"; ?>'>Baza firm</a>
			<div class="sub" <?php if( Helper::activeNavigate( 'admin_firmy' ) ) echo "style='display: block'"; ?>>
				<a href="<?= BASE; ?>admin_firmy" <?php if( Helper::activeNavigate( 'admin_firmy', 'widok' ) ) echo "class='act'"; ?>>Przeglądaj firmy</a>
				<a href="<?= BASE; ?>admin_firmy/dodaj" <?php if( Helper::activeNavigate( 'admin_firmy', 'dodaj' ) ) echo "class='act'"; ?>>Dodaj firmę</a>
			</div>

			<a href="#" class='sub-nav <?php if( Helper::activeNavigate( 'admin_eksperci' ) ) echo " act"; ?>'>Eksperci</a>
			<div class="sub" <?php if( Helper::activeNavigate( 'admin_eksperci' ) ) echo "style='display: block'"; ?>>
				<a href="<?= BASE; ?>admin_eksperci" <?php if( Helper::activeNavigate( 'admin_eksperci', 'widok' ) ) echo "class='act'"; ?>>Przeglądaj ekspertów</a>
				<a href="<?= BASE; ?>admin_eksperci/dodaj" <?php if( Helper::activeNavigate( 'admin_eksperci', 'dodaj' ) ) echo "class='act'"; ?>>Dodaj eksperta</a>
			</div>


			<a href="<?= BASE; ?>admin_slider" <?php if( Helper::activeNavigate( 'admin_slider' ) ) echo "class='act'"; ?>>Slider</a>
			<a href="<?= BASE; ?>admin_podslider" <?php if( Helper::activeNavigate( 'admin_podslider' ) ) echo "class='act'"; ?>>Podslider</a>
			
			<a href="#" class='sub-nav <?php if( Helper::activeNavigate( 'admin_strony' ) ) echo " act"; ?>'>Strony</a>
			<div class="sub" <?php if( Helper::activeNavigate( 'admin_strony' ) ) echo "style='display: block'"; ?>>
				<a href="<?= BASE; ?>admin_strony" <?php if( Helper::activeNavigate( 'admin_strony', 'widok' ) ) echo "class='act'"; ?>>Przeglądaj strony</a>
				<a href="<?= BASE; ?>admin_strony/dodaj" <?php if( Helper::activeNavigate( 'admin_strony', 'dodaj' ) ) echo "class='act'"; ?>>Dodaj stronę</a>
			</div>

			<a href="#" class='sub-nav <?php if( Helper::activeNavigate( 'admin_galeria' ) || Helper::activeNavigate( 'admin_zdjecia' ) ) echo " act"; ?>'>Galeria</a>
			<div class="sub" <?php if( Helper::activeNavigate( 'admin_galeria' ) || Helper::activeNavigate( 'admin_zdjecia' ) ) echo "style='display: block'"; ?>>
				<a href="<?= BASE; ?>admin_galeria" <?php if( Helper::activeNavigate( 'admin_galeria', 'widok' ) ) echo "class='act'"; ?>>Przeglądaj galerie</a>
				<a href="<?= BASE; ?>admin_galeria/dodaj" <?php if( Helper::activeNavigate( 'admin_galeria', 'dodaj' ) ) echo "class='act'"; ?>>Dodaj galerię</a>
			</div>

			<a href="#" class='sub-nav <?php if( Helper::activeNavigate( 'admin_reklama' ) ) echo " act"; ?>'>
				Reklama
				<?php if( $this->data['adv_no_active'] && $this->data['adv_no_active']['_NEW_'] > 0 ) : ?>
					<span class="new-order">nieaktywne: <?= $this->data['adv_no_active']['_NEW_']; ?></span>
				<?php endif; ?>
			</a>
			<div class="sub" <?php if( Helper::activeNavigate( 'admin_reklama' ) ) echo "style='display: block'"; ?>>
				<a href="<?= BASE; ?>admin_reklama" <?php if( Helper::activeNavigate( 'admin_reklama', 'widok' ) || Helper::activeNavigate( 'admin_reklama', 'widok_top' ) ) echo "class='act'"; ?>>Przeglądaj reklamy</a>
				<a href="<?= BASE; ?>admin_reklama/dodaj" <?php if( Helper::activeNavigate( 'admin_reklama', 'dodaj' ) ) echo "class='act'"; ?>>Dodaj reklamę boczną</a>
				<a href="<?= BASE; ?>admin_reklama/dodaj_top" <?php if( Helper::activeNavigate( 'admin_reklama', 'dodaj_top' ) ) echo "class='act'"; ?>>Dodaj reklamę górną</a>
			</div>
			<a href="<?= BASE; ?>admin_newsletter" <?php if( Helper::activeNavigate( 'admin_newsletter' ) ) echo "class='act'"; ?>>Newsletter</a>

			*/ ?>

		<?php endif; ?>
		
		<?php /*
		<a href="#" class='sub-nav <?php if( Helper::activeNavigate( 'admin_biura' ) || Helper::activeNavigate( 'admin_newsroom' ) || Helper::activeNavigate( 'admin_users' ) ) echo " act"; ?>'>Newsroom</a>
		<div class="sub" <?php if( Helper::activeNavigate( 'admin_biura' ) || Helper::activeNavigate( 'admin_newsroom' ) || Helper::activeNavigate( 'admin_users' ) ) echo "style='display: block'"; ?>>
			<a href="<?= BASE; ?>admin_newsroom" <?php if( Helper::activeNavigate( 'admin_newsroom' ) ) echo "class='act'"; ?>>Artykuły</a>
			<?php if( $this->data['user_log']['uprawnienia'] == 'admin' || $this->data['user_log']['uprawnienia'] == 'superadmin' ) : ?>
				<?php <a href="<?= BASE; ?>admin_biura" <?php if( Routing::$routing['controller'] == 'admin_biura' || Helper::activeNavigate( 'admin_users' ) ) echo "class='act'"; ?>>Biura prasowe</a> ?>
				<a href="<?= BASE; ?>admin_users" <?php if( Helper::activeNavigate( 'admin_users' ) ) echo "class='act'"; ?>>Administratorzy newsroom</a>
			<?php endif; ?>
		</div>
		*/ ?>
		<?php /*
		<?php if( $this->data['user_log']['uprawnienia'] == 'admin' || $this->data['user_log']['uprawnienia'] == 'superadmin' ) : ?>
			<a href="<?= BASE; ?>admin_konfiguracja" <?php if( Helper::activeNavigate( 'admin_konfiguracja' ) ) echo "class='act'"; ?>>Ustawienia tekstów strony</a>
			<a href="<?= BASE; ?>admin_u" <?php if( Helper::activeNavigate( 'admin_u' ) ) echo "class='act'"; ?>>Zarządzaj użytkownikami</a>
		<?php endif; ?>
		*/ ?>
		<a href="<?= BASE; ?>profil" <?php if( Helper::activeNavigate( 'profil' ) ) echo "class='act'"; ?>>Profil</a>
		<a href="<?= BASE; ?>admin/logout">Wyloguj</a>
	</div>
</nav>