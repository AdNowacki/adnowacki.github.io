        <div id="top">
            <div id="top_fix">
                
                <!-- logo -->
                <a href="" id="link_logo" title="Twarze technologii. Ambasadorzy marki Philip"><img src="images/philips-logo.gif" alt="Philips logo" /></a>
                <span class="gill_sans">Twarze technologii. Ambasadorzy marki Philips.</span>
                <!-- logo end -->

                <!-- użytkownik -->

                <?php

                $max_pkt = 2100;
                $uzytk_pkt = 723;
                $rysuj_pkt = "width:";

                $rysuj_pkt .= ceil( ( $uzytk_pkt * 210 ) / $max_pkt );


                ?>

                <div id="user">
                    <img src="images/arr.gif" alt="" id="arr" />
                    <div id="u_img"><img src="images/user.jpg" alt='Małgorzata' /></div>
                    <div id="u_det">
                        <div id="u_welc">Witaj <span>Małgorzata!</span></div>
                        <div id="u_points_box">
                            <div id="u_act_points" style="<?php echo $rysuj_pkt; ?>px">
                                <span class="gill_sans">723 pkt</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- użytkownik end -->

                <!-- Menu górne -->
                <div id="log" class="gill_sansMT">
                    <div><a href="">MOJE KONTO</a></div>
                    <div><a href="">MOJE PUNKTY</a></div>
                    <div><a href="">WYLOGUJ</a></div>
                </div>
                <!-- Menu górne end -->

                <!-- Box blog -->
                <div id="blog_box" class="gill_sans">
                    <div>
                        <span>AMBASADORZY PHILIPSA</span>
                        <br />
                        <a href="#" title="BLOG RODZINY PHILIPSA"><img src="images/blog-box2.png" alt="AMBASADORZY PHILIPSA" /></a>
                    </div>
                </div>
                <!-- Box blog end -->

                <!-- Obrazkowe top menu -->
                <ul id="i_menu" class="gill_sans">
                    <li>
                        <div>
                            <a href="#" title="Nagrody"><img src="images/imenu1.png" alt="" /></a>
                            <div class="r_count">13</div>
                        </div>
                        <p><a href="#" title="Nagrody">Nagrody</a></p>
                    </li>
                    <li class="active">
                        <div>
                            <a href="#" title="Osiągnicia"><img src="images/imenu6.png" alt="" /></a>
                        </div>
                        <p><a href="#" title="Osiągnicia">Osiągnicia</a></p>
                    </li>
                    <li>
                        <div>
                            <a href="#" title="Wyzwania"><img src="images/imenu3.png" alt="" /></a>
                            <div class="r_count">9</div>
                        </div>
                        <p><a href="#" title="Wyzwania">Wyzwania</a></p>
                    </li>
                    <li>
                        <div>
                            <a href="#" title="Ranking"><img src="images/imenu4.png" alt="" /></a>
                        </div>
                        <p><a href="#" title="Ranking">Ranking</a></p>
                    </li>
                    <li>
                        <div>
                            <a href="#" title="Powiadomienia"><img src="images/imenu5.png" alt="" /></a>
                            <div class="r_count">99</div>
                        </div>
                        <p><a href="#" title="Powiadomienia">Powiadomienia</a></p>
                    </li>
                    <li>
                        <a href="#" title="Jak to działa"><img src="images/imenu2.png" alt="" /></a>
                        <p class="last"><a href="#" title="Jak to działa">Jak to działa?</a></p>
                    </li>
                </ul>
                <!-- Obrazkowe top menu end -->

            </div>
        </div>