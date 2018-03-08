<button id="admin-nav-btn"><i class="icon-dot-3"></i></button>
<section class="user-detail <?= $border; ?>">
	<div class="user-person">
		<?php /*
		<figure>
			<a href="<?= BASE; ?>profil">
				<?php if( file_exists( "userfiles/images/user/{$this->data['user_log']['id']}.jpg" ) ) : ?>
					<img src="<?= BASE; ?>userfiles/images/user/<?= $this->data['user_log']['id']; ?>.jpg?<?= substr( time() , 0, 15); ?>" alt="">
				<?php elseif( file_exists( "userfiles/images/user/{$this->data['user_log']['id']}.JPG" ) ) : ?>
					<img src="<?= BASE; ?>userfiles/images/user/<?= $this->data['user_log']['id']; ?>.JPG?<?= substr( time() , 0, 15); ?>" alt="">
				<?php elseif( file_exists( "userfiles/images/user/{$this->data['user_log']['id']}.jpeg" ) ) : ?>
					<img src="<?= BASE; ?>userfiles/images/user/<?= $this->data['user_log']['id']; ?>.jpeg?<?= substr( time() , 0, 15); ?>" alt="">
				<?php elseif( file_exists( "userfiles/images/user/{$this->data['user_log']['id']}.JPEG" ) ) : ?>
					<img src="<?= BASE; ?>userfiles/images/user/<?= $this->data['user_log']['id']; ?>.JPEG?<?= substr( time() , 0, 15); ?>" alt="">
				<?php elseif( file_exists( "userfiles/images/user/{$this->data['user_log']['id']}.png" ) ) : ?>
					<img src="<?= BASE; ?>userfiles/images/user/<?= $this->data['user_log']['id']; ?>.png?<?= substr( time() , 0, 15); ?>" alt="">
				<?php elseif( file_exists( "userfiles/images/user/{$this->data['user_log']['id']}.PNG" ) ) : ?>
					<img src="<?= BASE; ?>userfiles/images/user/<?= $this->data['user_log']['id']; ?>.PNG?<?= substr( time() , 0, 15); ?>" alt="">
				<?php else : ?>
					<img src="<?= BASE; ?>userfiles/images/user/default.jpg?<?= substr( time() , 0, 15); ?>" alt="">
				<?php endif; ?>
			</a>
		</figure>
		*/ ?>
		<?php /*
		<span>
			<a href="<?= BASE; ?>profil"><?= $this->data['user_log']['imie']; ?> <?= $this->data['user_log']['nazwisko']; ?> <small>(ostatnie logowanie: <?= $_SESSION[AUTH_SESSION_NAME]['last_format']; ?>)</small></a>
		</span>
		*/ ?>
	</div>
	<a href="<?= BASE; ?>admin/logout" title='Wyloguj' id='logout'><i class="icon-logout"></i></a>
</section>