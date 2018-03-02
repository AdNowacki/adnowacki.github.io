            <!-- menu kategorii podobne do menu z pliku _menu_kategorie.php -->

            <?php
            /**
            *   W poniższym menu podkategorii, :hover i aktywny link przybierają kolor tła danej podkategorii, jeśli ma być wszystko fioletowe jak przykład poniżej,
            *   wykomentuj deklarację w style.css od linii 726 do 729
            */
            ?>
            <div id="nav_cat" class="nav_subcat">
                <ul>
                    <li id="label">SORTUJ: </li>
                    <li><a href="index.php?page=produkty_podkategoria&menu=_menu_podkategorie" title="WSZYSTKIE" id="all" class="act">WSZYSTKIE</a></li>
                    <li><a href="index.php?page=produkty_podkategoria&menu=_menu_podkategorie" title="SPRZĄTANIE" class="sp">SPRZĄTANIE</a></li>
                    <li><a href="index.php?page=produkty_podkategoria&menu=_menu_podkategorie" title="PRZECHOWYWANIE ŻYWNOŚCI" class="zyw">PRZECHOWYWANIE ŻYWNOŚCI</a></li>
                    <li><a href="index.php?page=produkty_podkategoria&menu=_menu_podkategorie" title="PIECZENIE" class="pie">PIECZENIE</a></li>
                    <li><a href="index.php?page=produkty_podkategoria&menu=_menu_podkategorie" title="POZOSTAŁE" class="poz">POZOSTAŁE</a></li>
                </ul>
            </div>
            <!-- menu kategorii podobne do menu z pliku _menu_kategorie.php end -->
    

        <!-- submenu -->
        <div id="submenu" class="show cat_prod">
            <!-- podmenu rozwijane -->
            <div id="sub_category">
                <a href="#" title="">mopy, wiadra i kije</a>
                <a href="#" title="">Ścierki</a>
                <a href="#" title="">zmywaki i czyściki</a>
                <a href="#" title="">rękawice</a>
                <a href="#" title="">Worki na śmieci</a>
                <a href="#" title="">Miotły</a>
                <a href="#" title="" class="act">Pozostałe</a>
            </div>
            <!-- podmenu rozwijane end -->

            <?php 
                /**
                *   W span#toggleTxt przechowywany jest nazwa kategorii, albo inny tekst do podmiany w submenu, zależnie czy jest zwinięte, czy rozwinięte
                */
            ?>
            <div id="sub_action">ZWIŃ <img src="images/submenu1.png" alt="" /><span id="toggleTxt">ZMYWAKI I CZYŚCIKI</span></div>
        </div>
        <!-- submenu -->
    <!-- Menu porady Gosi end -->