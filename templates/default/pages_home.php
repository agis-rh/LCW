        <!-- Start Box -->
        <div class="boxes-full">
           	<div class="boxes-padding fullpadding">
                    <div class="split3">
                        <h3>Tentang Kami</h3>
                        <p style="text-align: justify;">
                            Ini merupakan sebuah ide atau pemikiran baru dalam menciptakan sebuah teknologi 
                                yang memuat gambaran – gambaran teknologi masa depan. Dimana pemikiran yang dimuat 
                                merupakan sebuah solusi bagi didunia programming.
                        </p>
                    </div>
                <!-- Start Quater Split Section -->
            	<?php
                $headline = $fquery->headline_web_berita();
                foreach ($headline as $row) {
                    $isi_berita = strip_tags($row['konten']); 
                    $isi = substr($isi_berita,0,130); 
                    $isi = substr($isi_berita,0,strrpos($isi," "));
                    echo "<div class='split3'>
                
                            <h3><a href='artikel-$row[id_berita]-".  strtolower(str_replace(" ","-",$row['judul'])).".html' title='$row[judul]'>".$row['judul']."</a></h3>

                            <p style='text-align: justify;'>".$isi."...</p>
                    
                        </div>";
                }
                ?>
                <div class="clear"></div>
              
            	<!-- End None Split Section -->
                    
            </div>

            <span class="box-arrow"> </span>
        
        
        <!-- End Box -->
        </div>