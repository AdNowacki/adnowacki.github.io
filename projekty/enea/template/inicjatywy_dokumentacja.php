    	<div class="content" id="zi">
    		<!-- zgłoszenie inicjatywy -->
    		<div class="i_box">

    			<div id="zi_box">
    				<h1 class="aywr">Zgłoszenie inicjatywy</h1>

    				<form method="post" id="f_doc" enctype="multipart/form-data">
    					<fieldset>
    						<table>
    							<tr>
    								<td class="f_name"><strong>Nazwa inicjatywy</strong><br />(max 70 znaków)</td>
    								<td><input type="text" name="i_nazwa" maxlength="70" /></td>
    							</tr>

    							<tr>
    								<td class="f_name"><strong>Opis inicjatywy</strong><br />(max 500 znaków)</td>
    								<td><textarea name="i_opis" maxlength="500"></textarea></td>
    							</tr>

    							<tr>
    								<td class="f_name"><strong>Link do filmu</strong><br />(max 2 min)</td>
    								<td><input type="text" name="link_film" /></td>
    							</tr>

    							<tr class="mid">
    								<td class="f_name">
    									<span class="ch_f">
    										<strong>Zdjęcie 1</strong><br />(max 5MB)
    									</span> 
    									<span class="is_file"><strong>Załączony plik</strong></span>
    								</td>
    								<td>
    									<div class="custom_f">
    										<input type="file" name="foto1" id="foto1" />
    										<img src="images/dodaj.jpg" alt="Dodaj zdjęcie" />
    									</div>
    									<span class="is_file">
    										<span class="f_nazwa"></span> 
    										<a href="#" title="Usuń" class="a_del"><img src="images/usun.jpg" alt="Usuń" /></a>
    									</span>
    								</td>
    							</tr>

    							<tr class="mid">
    								<td class="f_name">
    									<div class="ch_f">
    										<strong>Zdjęcie 2</strong><br />(max 5MB)
    									</div> 
    									<span class="is_file"><strong>Załączony plik</strong></span>
    								</td>
    								<td>
    									<div class="custom_f">
    										<input type="file" name="foto2" />
    										<img src="images/dodaj.jpg" alt="Dodaj zdjęcie" />
    									</div>
    									<span class="is_file">
    										<span class="f_nazwa"></span> 
    										<a href="#" title="Usuń" class="a_del"><img src="images/usun.jpg" alt="Usuń" /></a>
    									</span>
    								</td>
    							</tr>

    							<tr class="mid">
    								<td class="f_name">
    									<div class="ch_f">
    										<strong>Zdjęcie 3</strong><br />(max 5MB)
    									</div> 
    									<span class="is_file"><strong>Załączony plik</strong></span>
    								</td>
    								<td>
    									<div class="custom_f">
    										<input type="file" name="foto3" />
    										<img src="images/dodaj.jpg" alt="Dodaj zdjęcie" />
    									</div>
    									<span class="is_file">
    										<span class="f_nazwa"></span> 
    										<a href="#" title="Usuń" class="a_del"><img src="images/usun.jpg" alt="Usuń" /></a>
    									</span>
    								</td>
    							</tr>

    							<tr class="mid">
    								<td class="f_name">
    									<div class="ch_f">
    										<strong>Prezentacja power point</strong><br />(max 30MB)
    									</div> 
    									<span class="is_file"><strong>Załączony plik</strong></span>
    								</td>
    								<td>
    									<div class="custom_f">
    										<input type="file" name="ppt" />
    										<img src="images/dodaj.jpg" alt="Dodaj zdjęcie" />
    									</div>
    									<span class="is_file">
    										<span class="f_nazwa"></span> 
    										<a href="#" title="Usuń" class="a_del"><img src="images/usun.jpg" alt="Usuń" /></a>
    									</span>
    								</td>
    							</tr>

    						</table>

                            <button type="submit" name="doc_send" class="aywr">Wyślij zgłoszenie</button>
    					</fieldset>
    				</form>

    			</div>

    			<div class="k_img">
    				<img src="images/index1.png" alt="Żarówka" id="zarowka" />
    			</div>
    			<div class="clear"></div>
    		</div>
    		<!-- zgłoszenie inicjatywy end -->


    	</div>