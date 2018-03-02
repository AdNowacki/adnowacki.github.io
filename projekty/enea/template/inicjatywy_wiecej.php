    	<div class="content" id="inicjatywy">

    		<!-- inicjatywy -->
    		<div class="i_box">

            <div id="border_bg">
        			<div id="border_box">
                        <!-- border -->
                        <div class="bt"></div>
                        <div class="bb"></div>
                        <div class="bl"></div>
                        <div class="br"></div>
                        <!-- border end -->
        				
                        <h1 class="aywr">Inicjatywy</h1>

                        <!-- select inicjatyw -->
                        <form method="post" id="f_list" enctype="multipart/form-data">
                            <fieldset>
                                <select class="styled">
                                  <option value="0">Województwo</option>
                                  <option value="1">mazowieckie</option>
                                  <option value="2">świętokrzyskie</option>
                                  <option value="3">podkarpackie</option>
                                  <option value="4">podlaskie</option>
                                  <option value="5">małopolskie</option>
                                </select>
                            </fieldset>
                            <fieldset class="s_long">
                                <select class="styled">
                                  <option value="0">Nazwa szkoły</option>
                                  <option value="1">Niepubliczny Specjalny Ośrodek Szkolno - Wychowawczy w Przysusze</option>
                                  <option value="2">Specjalny Ośrodek Wychowawczy Zgromadzenia Sióstr Franciszkanek Rodziny Maryi</option>
                                  <option value="3">Zespół Szkół w Zielonce im. Prezydenta Ignacego Mościckiego</option>
                                  <option value="4">Zespół Szkół Nr 3</option>
                                  <option value="6">Zespół Szkół Publiczna Szkoła Podstawowa Publiczne Gimnazjum w Rudzie Wielkiej</option>
                                  <option value="7">Zespół Placówek Oświatowych im. Papieża Jana Pawła II w Dylewie</option>
                                  <option value="8">Zespół Szkoły Podstawowej i Gimnazjum w Emilianowie</option>
                                </select>
                            </fieldset>
                                <button type="submit" name="search">Szukaj</button>
                        </form>
                        <!-- select inicjatyw end -->


                        <!-- inicjatywy więcej -->
                        <div id="m_list">

                          <div class="m_item">
                              <!-- Obrazek 69x69px -->
                              <div class="m_txt">
                                <div class="m_title">
                                  <h2>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur</h2> <!-- 1 linia tekstu -->
                                  <div class="m_count">Liczba głosów: <strong>12</strong></div>

                                  <h3>woj. wielkopolskie &nbsp;&nbsp;&nbsp; Szkoła Podstawowa nr. 3 im. gen. dyw. Tadeusza Kutrzeby w Luboniu</h3><!-- 1 linia tekstu -->

                                </div>
                              </div>
                              <div class="clear"></div>
                          </div>

                          <div class="m_descript">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,<br /> sed do eiusmod tempor incididunt ut 
                            labore et dolore magna aliqua. Ut enim ad minim veniam, <br />quis nostrud exercitation ullamco 
                            laboris nisi ut aliquip ex ea commodo consequat. 
                          </div>

                          <!-- galeria -->
                          <div class="m_gallery">
                            <div class="g_box">
                              <!-- obrazki 129x127px -->
                              <div><img src="images/gallery1.jpg" alt="" /></div>
                              <div><img src="images/gallery2.jpg" alt="" /></div>
                              <div><img src="images/gallery3.jpg" alt="" /></div>
                            </div>
                          </div>
                          <!-- galeria end -->

                          <!-- linki -->
                          <div class="m_links">

                            <div class="link">
                              <div class="icon"><img src="images/icon_mov.png" alt="Kopiuj link"></div>
                              <input type="text" class="input_link" id="to_copy" value="https://www.youtube.com/watch?v=g0I0dBf301M" />
                              <div class="copy"><button id="copy" data-clipboard-target="to_copy"><img src="images/copy.png" alt="Kopiuj przycisk"></button></div>
                            </div>

                            <div class="link">
                              <div class="icon"><img src="images/icon_ppt.png" alt="Prezentacja PPT"></div>
                              <div class="link_txt">Prezentacja multimedialna</div>
                              <div class="copy">
                                <a href="#">
                                  <img src="images/obejrzyj.png" alt="Obejrzyj" />
                                </a>
                              </div>
                            </div>

                          </div>
                          <!-- linki end -->

                          <!-- Głosuj -->
                          <form method="post" id="f_in_v">
                            <fieldset>
                              <input type="hidden" name="vote" value="" />
                              <button type="submit" name="in_vote" class="aywr">Głosuj</button>
                            </fieldset>
                          </form>
                          <!-- Głosuj end -->

                        </div>
                        <!-- inicjatywy więcej end -->

        			</div>
                </div>

    			<div class="k_img">
    				<img src="images/index1.png" alt="Żarówka" id="zarowka" />
    			</div>
    			<div class="clear"></div>
    		</div>
    		<!-- inicjatywy end -->


    	</div>