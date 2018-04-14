<script src="ajax-jquery/jquery/validasi_kontak.js"></script>
<!-- Start Main Body Wrap -->
    <div id="main-wrap">
        
        <!-- Start Left Section -->
        <div class="leftsection">

            <!-- Start Google Maps -->
        	<div class="blogwrapstart">
            
            	<div id="map_canvas">
                 <iframe 
                 src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d656.1694589763101!2d108.2082331!3d-6.9832055!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f30cbf7c31831%3A0xec7df93b3c6a52d8!2sSMKN+Lemahsugih!5e1!3m2!1sid!2sid!4v1421816967442" 
                 width="600" height="450" class="google_maps" frameborder="0" style="border:0">
                 </iframe>   
                </div>
                <span class="box-arrow"></span>
            
            </div>
            <!-- End Google Maps -->
        
        </div>
        <!-- End Left Section -->
        
        <!-- Start Right Section -->
        <div class="rightsection">
            
        	<!-- Start Blog Widget -->
            <div class="blogwidgetstart">
            	<!-- Start Categories Widget -->
            	<div class="widgettitle"><h4>Rincian Informasi</h4></div>
                
                <div class="widgetbody">
                
                	
                    	<div class="contactdetails">
                    
                             <ul>
                    
                                <li class="tick"><?php echo $settings['email_web']; ?></li>
                                <li class="tick"><?php echo $settings['phone_number']; ?></li>
                                <li class="tick">Rekayasa Perangkat Lunak SMKN 1 lemahsugih</li>
                                
                            </ul>
                            
                        </div>
                    
                
              </div>
              <!-- End Categories Widget -->
              <span class="box-arrow"></span>
            
            </div>
            <!-- End Blog Widget -->
            
            
            
              <div class="blogwidget">
            	<!-- Start Categories Widget -->
            	<div class="widgettitle"><h4>Hubungi tim</h4></div>
                
                <div class="widgetbody">
                
                	
                    	<div class="contactdetails">
                    
                             <ul>
                                <?php
                                $proftim    = $fquery->show_team();
                                foreach ($proftim as $timprof) {
                                echo "<li class='tick'><a href='profil-".$timprof['id_team']."-".strtolower(str_replace(" ", "-", $timprof['first'])).".html' title=''>".$timprof['profesi']."</a></li>";
                                }
                                ?>
                            </ul>
                            
                        </div>
                    
                
              </div>
              <!-- End Categories Widget -->
              <span class="box-arrow"></span>
            
            </div>
            <!-- End Blog Widget -->
        
        </div>
        <!-- End Right Section -->
        
        <!-- Start Full Width -->
        <div class="boxes-full">
        
        	<div class="boxes-padding fullpadding">
            
            <div id="contactwarning"></div>
            <div id="contactajax"></div>
            <div id="hide-form">
            <form action="ajax-jquery/php/kontak.php" method="post" name="ajaxcontactform" id="ajaxcontactform">
            
            	<div class="contacttextarea">
                	<input name="contactformid" id="contactformid" type="hidden" value="1" />
                
                	<fieldset>
                            <textarea name="konten" id="konten" cols="5" rows="5" class="contacttextarea form-control" placeholder="Tinggalkan pesan anda terhadap kami"></textarea>
                    </fieldset>
                
                </div>
                
                <div class="contacttextboxes">
                
                	<fieldset>
                            <input id="nama" name="nama" type="text" class="contacttextform form-control" placeholder="Nama lengkap">
                    </fieldset>
                    
                	<fieldset>
                            <input id="subjek" name="subjek" type="text" class="contacttextform form-control" placeholder="Subjek pesan">
                    </fieldset>
                    
                	<fieldset>
                            <input id="email" name="email" type="text" class="contacttextform form-control" placeholder="Alamat Email">
                    </fieldset>
                    	<fieldset>
                            <input id="web" name="web" type="text" class="contacttextform form-control" placeholder="Alamat web anda">
                    </fieldset>
                    
                	<fieldset>
                    	<input name="send" type="submit" class="contactformbutton" value="Kirim">
                    </fieldset>
                
                </div>
                
            </form>
            </div>
            </div>
            
            <span class="box-arrow"></span>
            
        </div>
        <!-- End Full Width -->
        
    </div>
    <!-- End Main Body Wrap -->