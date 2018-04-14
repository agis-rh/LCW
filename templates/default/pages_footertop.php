 
    	<div class="footerwrap">
    		<!-- Start Latest Tweets -->
               <div id="useful_links">
                <div id="usefultitle">Peta Situs Kami</div>
                <div id="usefulbody">
                
                	<iframe 
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d656.1694589763101!2d108.2082331!3d-6.9832055!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f30cbf7c31831%3A0xec7df93b3c6a52d8!2sSMKN+Lemahsugih!5e1!3m2!1sid!2sid!4v1421816967442" 
                        class="google_maps" style="margin-top: 20px" height="210" frameborder="0" style="border:0">
                        </iframe>
                
                </div>
            </div>
    		<!-- Start Useful Links -->
            <div id="useful_links">
                <div id="usefultitle">Statistik Pengunjung</div>
                <div id="usefulbody">
                    <?php
                    $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
                    $tanggal = date("Y-m-d"); // Mendapatkan tanggal sekarang
                    $tahun   = date("Y");
                    $bulan   = date("Y-m");
                    $waktu   = time(); // 
                    // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
                    $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
                    // Kalau belum ada, simpan data user tersebut ke database
                    if(mysql_num_rows($s) == 0){
                      mysql_query("INSERT INTO statistik VALUES('$ip','$tanggal','$bulan','$tahun','1','$waktu')");
                    } 
                    else{
                      mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
                    }
                    ?>
                    <div id="statistik">
                        
                    </div>
                
                </div>
            </div>
            <!-- End Useful Links -->
    		<!-- Start Testimonials -->
            <div id="latest-testimonial">
                <div id="testimonialtitle">Informasi Profesi Tim</div>
                <div id="testimonialbody">
                	<!-- Starting simple slider -->
                    <div id="simpleslider">
                            <!-- Slide 1 -->
                            <div class="current">
                                <h6>Daftar Profesi Tim</h6>
                                <p>
                                    <?php
                                    $profesi    = $fquery->show_profesi();
                                    foreach ($profesi as $prof) {
                                        echo "$prof[nama], ";
                                    }
                                    ?>
                                    dan lainnya.
                                </p>
                            </div>
                            
                            <?php
                            $profesi1    = $fquery->show_profesi();
                            foreach ($profesi1 as $prof1) {
                                echo "<div>
                                        <h6>$prof1[nama]</h6>
                                        <p>$prof1[keterangan]</p>
                                      </div>";
                                
                            }
                            ?>
                            
                       </div>
                    <!-- Ending simple slider -->
                	<div class="speachlower"></div>
                </div>
            </div>
            <!-- End Latest Testimonials -->
    	</div>
    