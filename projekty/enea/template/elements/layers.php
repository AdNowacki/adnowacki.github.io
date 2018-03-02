
<!-- Rejestracja warstwa podpięta pod button "Zgłoś swoją szkołę" - plik index krok 1  -->
<div class="layer" id="registration">
	<div>
		<form id="f_reg" method="post">
			<div class="close_layer" title="Zamknij"></div>
			<fieldset>
				<h2 class="aywr">Formularz zgłoszeniowy</h2>
				<div class="form_box">
					<div class="regi">
						<div class="input">
							<label for="nazwa_sz" class="aywr">Nazwa szkoły</label>
							<input type="text" name="nazwa_sz" id="nazwa_sz" />
							<span class="error">* pole obowiązkowe</span>
						</div>
						<div class="input">
							<label for="adres_sz" class="aywr">Adres szkoły</label>
							<input type="text" name="adres_sz" id="adres_sz" />
							<span class="error">* pole obowiązkowe</span>
							<div class="m_info"><img src="images/minfo.png" alt="Podpowiedź" title="Podpowiedź 1. Adres szkoły Podpowiedź 1. Adres szkoły Podpowiedź 1. Adres szkoły Podpowiedź 1. Adres szkoły " /></div>
						</div>
						<div class="input">
							<label for="imie_zg" class="aywr">Imię osoby zgłaszającej</label>
							<input type="text" name="imie_zg" id="imie_zg" />
							<span class="error">* pole obowiązkowe</span>
							<div class="m_info"><img src="images/minfo.png" alt="Podpowiedź" title="Podpowiedź 2. Adres szkoły Podpowiedź 2. Adres szkołyPodpowiedź 2. Adres szkołyPodpowiedź 2. Adres szkołyPodpowiedź 2. Adres szkołyPodpowiedź 2. Adres szkoły" /></div>
						</div>
						<div class="input">
							<label for="nazwisko_zg" class="aywr">Nazwisko osoby zgłaszajacej</label>
							<input type="text" name="nazwisko_zg" id="nazwisko_zg" />
							<span class="error">* pole obowiązkowe</span>
						</div>
						<div class="input">
							<label for="telefon_zg" class="aywr">Telefon osoby zgłaszajacej</label>
							<input type="text" name="telefon_zg" id="telefon_zg" />
							<span class="error">* pole obowiązkowe</span>
						</div>
						<div class="input">
							<label for="email_zg" class="aywr">Adres e-mail osoby zgłaszajacej</label>
							<input type="text" name="email_zg" id="email_zg" />
							<span class="error">* pole obowiązkowe</span>
						</div>
					</div>
					<div class="log">
						<div class="input">
							<label for="login" class="aywr">Login</label>
							<input type="text" name="login" id="login" />
							<span class="error">* pole obowiązkowe</span>
						</div>

						<div class="input">
							<label for="haslo" class="aywr">Hasło</label>
							<input type="password" name="haslo" id="haslo" />
							<span class="error">* pole obowiązkowe</span>
						</div>

						<div class="input">
							<label for="powt_haslo" class="aywr">Powtórz hasło</label>
							<input type="password" name="powt_haslo" id="powt_haslo" />
							<span class="error">* pole obowiązkowe</span>
						</div>
					</div>

					<div class="aywr accept_reg">
						<input type="checkbox" name="accept_reg" id="accept_reg" value="1" />
						<span class="checkbox"></span>
						<label for="accept_reg">Zapoznałem się i akceptuję zapisy </label> <a href="#">Regulaminu</a>
						<div class="clear"></div>
						<span class="error">* pole obowiązkowe</span>
					</div>

					<button type="submit" name="zgloszenie" class="aywr">Wyślij zgłoszenie</button>

					<div class="error_txt">*Przed wysłaniem zgłoszenia<br />wypełnij brakujące pola</div>
				</div>
			</fieldset>
		</form>
	</div>

</div>
<!-- Rejestracja end -->




<!-- Logowanie - warstwa nie podpięta -->
<div class="layer" id="login" =>
	<div>
		<form id="f_log" method="post">
			<div class="close_layer" title="Zamknij"></div>
			<fieldset>
				<h2 class="aywr">Logowanie</h2>
				<div class="form_box">
					<div class="regi">
						<div class="input">
							<label for="log_login" class="aywr">Login</label>
							<input type="text" name="log_login" id="log_login" />
							<!-- <span class="error">* pole obowiązkowe</span> -->
						</div>
						<div class="input">
							<label for="log_haslo" class="aywr">Hasło</label>
							<input type="password" name="log_haslo" id="log_haslo" />
							<!-- <span class="error">* pole obowiązkowe</span> -->
						</div>

					</div>

					<div class="pass"><a href="#">przypomnij hasło</a></div>

					<button type="submit" name="logowanie" class="aywr">Zaloguj</button>

				</div>
			</fieldset>
		</form>
	</div>

</div>
<!-- Logowanie end -->




<!-- Głosowanie  warstwa podpięta pod button "Zagłosuj na inicjatywę" - plik index krok 3 -->
<div class="layer" id="vote">
	<div>
		<form id="f_vote" method="post">
			<div class="close_layer" title="Zamknij"></div>
			<fieldset>
				<div class="form_box">
					<div class="regi">
						<div class="input">
							<label for="glos_imie" class="aywr">Imię</label>
							<input type="text" name="glos_imie" id="glos_imie" />
							<span class="error">* pole obowiązkowe</span>
						</div>
						<div class="input">
							<label for="glos_nazwisko" class="aywr">Nazwisko</label>
							<input type="text" name="glos_nazwisko" id="glos_nazwisko" />
							<span class="error">* pole obowiązkowe</span>
						</div>
						<div class="input">
							<label for="glos_email" class="aywr">Adres e-mail</label>
							<input type="text" name="glos_email" id="glos_email" />
							<span class="error">* pole obowiązkowe</span>
						</div>
					</div>

					<!-- Wiek -->
					<div class="aywr accept_reg year">
						<input type="radio" name="year18" id="year18" value="1" />
						<span class="checkbox" id="y18_1"></span>
						<label for="year18">Mam skończone 18 lat</label></a>
						<span class="error">* pole obowiązkowe</span>

						<input type="radio" name="year18" id="not_year18" value="0" />
						<span class="checkbox" id="y18_2"></span>
						<label for="not_year18">Nie ma ukończonych 18 lat</label>
						<div class="clear"></div>
					</div>
					<!-- Wiek end -->



					<!-- Zgody -->
					<div class="aywr accept_reg zgody" id="z1">
						<input type="checkbox" name="zgoda1" id="zgoda1" value="1" />
						<span class="checkbox" id="zgoda1_"></span>
						<label for="zgoda1">
							Zgodnie z ustawą z dnia 29.08.1997 roku o ochronie danych osobowych 
							(Dz. U. z 2002r. Nr 101, poz. 926 ze zm.) wyrażam zgodę na przetwarzanie 
							moich danych osobowych przez ENEA SA, 60-201 Poznań, ul. Górecka 1, 
							REGON 630139960, NIP 777-00-20-640, zarejestrowaną przez VIII Wydział 
							Gospodarczy Krajowego Rejestru Sądowego Sądu Rejonowego Poznań - 
							Nowe Miasto i Wilda w Poznaniu pod nr KRS: 0000012483 dla celów 
							przeprowadzenia konkursu pod nazwą „W kontakcie z energią”.
						</label>
						<div class="clear"></div>
						<span class="error">* pole obowiązkowe</span>
					</div>

					<div class="aywr accept_reg zgody" id="z2">
						<input type="checkbox" name="zgoda2" id="zgoda2" value="1" />
						<span class="checkbox" id="zgoda2_"></span>
						<label for="zgoda2">
							Zgodnie z ustawą z dnia 29.08.1997 roku o ochronie danych osobowych 
							(Dz. U. z 2002r. Nr 101, poz. 926 ze zm.) wyrażam zgodę na przetwarzanie 
							moich danych osobowych przez ENEA SA, 60-201 Poznań, ul. Górecka 1, 
							REGON 630139960, NIP 777-00-20-640, zarejestrowaną przez VIII Wydział 
							Gospodarczy Krajowego Rejestru Sądowego Sądu Rejonowego Poznań - 
							Nowe Miasto i Wilda w Poznaniu pod nr KRS: 0000012483 dla celów 
							marketingowych, w tym w szczególności związanych z przesyłaniem 
							informacji handlowych drogą elektroniczną.
						</label>
						<div class="clear"></div>
						<span class="error">* pole obowiązkowe</span>
					</div>

					<div class="aywr accept_reg zgody" id="z3">
						<input type="checkbox" name="zgoda3" id="zgoda3" value="1" />
						<span class="checkbox" id="zgoda3_"></span>
						<label for="zgoda3">
							Zgodnie z ustawą z dnia 18 lipca 2002 r. o 
							świadczeniu usług drogą elektroniczną (Dz. U. z 2002 r. nr 144, poz. 1204, z późn. zm.) 
							wyrażam zgodę na otrzymywanie informacji handlowych drogą elektroniczną na podany przeze 
							mnie adres e-mail.
						</label>
						<div class="clear"></div>
						<span class="error">* pole obowiązkowe</span>
					</div>

					<!-- Zgody end -->

					<button type="submit" name="vote" class="aywr">Głosuj</button>

					<div class="error_txt">*Przed wysłaniem zgłoszenia<br />wypełnij brakujące pola</div>
				</div>
			</fieldset>
		</form>
	</div>

</div>
<!-- Głosowanie end -->



<!-- Podziękowania warstwa nie podpięta -->
<div class="layer" id="thx">

		<div id="f_thx">
			<div class="close_layer" title="Zamknij"></div>
				<h2 class="aywr">Dziękujemy za oddanie głosu</h2>
				<h3 class="aywr">Teraz wejdź na maila, który podałeś i potwierdź swój głos klikając w link!</h3>

				<button name="thx" class="aywr">Zamknij</button>
		</div>


</div>
<!-- Podziękowania end -->

