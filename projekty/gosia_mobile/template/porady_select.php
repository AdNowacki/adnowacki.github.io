
<!-- Szczegóły porady -->
	<div class="chosen">

		<!-- Lewa strona -->
		<div class="chosen_det">

			<div class="title_m">
				<div class="title_img_m"></div>
				<h1 title="jAK ZAANGAŻOWAĆ CAŁA RODZINĘ DO SPRZĄTANIA?">jAK ZAANGAŻOWAĆ CAŁA RODZINĘ DO SPRZĄTANIA?</h1>
			</div>

			<!-- galeria -->
			<div class="chosen_img">
				<!-- wybrane zdjęcie 418x418px -->
				<div class="current_img">
					<img src="images/359.GIF" alt="loader" class="loader" />
					<img src="images/big_oth-tip3.jpg" alt="Porada obraz 1" />

					<a href="#prev" id="m_prev"></a>
					<a href="#next" id="m_next"></a>
				</div>
				<!-- wybrane zdjęcie end -->
				<?php
				/*   UWAGA - grafik w ogóle zmienił proporcje miniatur galerii w wersji mobilnej !!!!!!!!!!!!!
				*
				*	Aby galeria działała, do alta wrzucić nazwę pliku z rozszerzenia
				*	Funkcja galerii pobiera strybut alt, dodaje prefix big_nazwa_pliku
				*	UWAGA - jak będziesz podpinał pod swój system, zmień w linii 241 pliku script.js ścieżkę do obrazów	
				*
				*/
				?>
				<div class="gallery">
					<div><img src="images/oth-tip3.jpg" alt="oth-tip3.jpg" /></div> <!--90x90px-->
					<div><img src="images/oth-tip4.jpg" alt="oth-tip4.jpg" /></div> <!--90x90px-->
					<div><img src="images/oth-tip3.jpg" alt="oth-tip5.jpg" /></div> <!--90x90px-->
				</div>
			</div>
			<!-- galeria -->


			<!-- opis -->
			<div class="chosen_description">
				<h2>Zamień je w grę!</h2>
				<p>Za domowe obowiązki przydzielaj punkty, które zwycięska drużyna wymieni na wyjście do kina czy słodki deser. </p>

				<h2>Próbowaliście?</h2>
				<a href="#" class="ot_link">Pokaż dzieciom, dlaczego powinny sprzątać.</a>
				<a href="#" class="ot_link">Znacie zimowe rozrywki, w których każdy domownik chętnie bierze udział?</a>
			</div>
			<!-- opis end -->

		</div>
		<!-- Lewa strona end -->
		
		<!-- prawa strona -->
		<?php 
		/**
		*	Aby ustawić kolor tła dla powiązanych, do #rel należy dodać odpowiednią klasę kategorii z listy poniżej. Domyślnie, gdy brak klasy div ma nadane fioletowe tło
		*	KLASY KATEGORII
		*	Sprzątanie - 			.sp - niebieski kolor
		*	Przechowywanie żywn - 	.zyw - zielony kolor
		*	Pieczenie -				.pie - żółty kolor
		*	Pozostałe - 			.poz - fioletowy kolor
		*/

		?>
		<div class="rel sp">
			<h3>PRODUKTY POWIĄZANE</h3>
			<a href="#" title="Tytuł porady"><img src="images/powiazane1.png" alt="Tytuł porady" /></a>
			<a href="#" title="Tytuł porady"><img src="images/powiazane2.png" alt="Tytuł porady" /></a>
			<a href="#" title="Tytuł porady"><img src="images/powiazane1.png" alt="Tytuł porady" class="last" /></a>
		</div>
		<!-- prawa strona end -->
	</div>
<!-- Szczegóły porady end -->



