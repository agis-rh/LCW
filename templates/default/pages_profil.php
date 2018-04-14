<?php
$profil     = $fquery->profil_team($_GET['id_profil']);
?>
<script src="ajax-jquery/jquery/validasi_kontak.js"></script>
<!-- Start Main Body Wrap -->
    <div id="main-wrap">
        
        <!-- Start Left Section -->
        <div class="leftsection">

            <!-- Start Google Maps -->
        	<div class="blogwrapstart">
            
                    <div style='margin:0 auto;'>
                       <?php
                        echo "<div >
                        
                        	<div class='portfoliowrap'>
                                                
                                <div class='title'>".$profil['first_name']." ".$profil['last_name']."<span class='titlearrow'></span></div>
                                <div class='portfolioimage'><a href='profil-".$profil['id_team']."-".  strtolower(str_replace(" ","-",$profil['first_name'])).".html' rel='prettyPhoto' title='Profil $profil[first_name]'>
                                <img style='margin-left:1%;margin-top:1%;width: 98%; border-radius:5px;' src='photos/users/".$profil[image]."' alt='".$profil['first']." ".$profil['last']."' /></a></div>
                                <div class='text'>
                                Lahir pada tanggal <b>".tanggal($profil[tgl_lahir])."</b>
                                <span class='textarrow'></span></div>
                            
                            </div>
                        
                        </div>";
                        ?>
                </div>            
            </div>
            <!-- End Google Maps -->
        
        </div>
        <!-- End Left Section -->
        
        <!-- Start Right Section -->
        <div class="rightsection">
            
            
                   <div class="blogwidgetstart">
            	<!-- Start Categories Widget -->
            	<div class="widgettitle"><h4>Info Umum dan kontak</h4></div>
                
                <div class="widgetbody">
                
                	
                    	<div class="contactdetails">
                    
                             <ul>
                    
                                 <li class="tick">Jenis kelamin 
                                     <b><?php if($profil['gender']=='L') {echo "Laki-laki"; } else { echo "Perempuan"; } ?></b></li>
                                 <li class="tick">Alamat <b><?php echo $profil['alamat']; ?></b></li>                    
                                 <li class="tick">Email <b><?php echo $profil['email']; ?></b></li>
                                 <li class="tick"><b><?php echo $profil['no_hp']; ?></b></li>
                                 <li class="tick">Rekayasa Perangkat Lunak <b>SMKN 1 lemahsugih - Majalengka</b></li>
                                
                            </ul>
                            
                        </div>
                    
                
              </div>
              <!-- End Categories Widget -->
              <span class="box-arrow"></span>
            
            </div>
            <!-- End Blog Widget -->
            
            	<!-- Start Blog Widget -->
            <div class="blogwidget">
            	<!-- Start Categories Widget -->
            	<div class="widgettitle"><h4>Info status Akun</h4></div>
                
                <div class="widgetbody">
                
                	
                    	<div class="contactdetails">
                            <ul>
                                <li class="tick">Sebagai <?php echo $profil['level'];?></li>
                                                                            <?php
                                                                            if($profil['last_login']=='0000-00-00 00:00:00') {
                                                                                $tanggal = "<b style='color:red'>Belum pernah";
                                                                                $jam     = "login</b>";
                                                                            }
                                                                            else {
                                                                            $tanggal    = "Login terakhir pada tanggal " .tanggal(substr($profil['last_login'],0,10)).' Pada Pukul ';
                                                                            $jam        = substr($profil['last_login'],11,19);
                                                                            }
                                                                            
                                                                            ?>
                                                                        <li class="tick"><?php echo $tanggal.' '.$jam;?></li>
									
							
                            
                        </div>
                    
                
              </div>
              <!-- End Categories Widget -->
              <span class="box-arrow"></span>
            
            </div>
                
                   <div class="blogwidget">
            	<!-- Start Categories Widget -->
            	<div class="widgettitle"><h4><?php echo $profil['nama']; ?></h4></div>
                
                <div class="widgetbody">
                
                	
                    	<div class="contactdetails">
                            <ul>
                                <li class="tick"><?php echo $profil['keterangan'];?></li>	
                            </ul>
							
                            
                        </div>
                    
                
              </div>
              <!-- End Categories Widget -->
              <span class="box-arrow"></span>
            
            </div>
                
                
                        <div class="blogwidget">
            	<!-- Start Categories Widget -->
            	<div class="widgettitle"><h4>Artikel yang dibuat</h4></div>
                
                <div class="widgetbody">
                
                	
                    	<div class="contactdetails">
                            <ul>
                                <?php
                                $artikel = $fquery->show_berita_id_team($_GET['id_profil']);
                                $jumlah  = $fquery->jumlah_berita_id_team($_GET['id_profil']);
                                if($jumlah > 0) {
                                    foreach ($artikel as $artikel1) {
                                        echo "<li class='tick'><b><a href='artikel-$artikel1[id_berita]-".  strtolower(str_replace(" ","-",$artikel1['judul'])).".html'>".$artikel1[judul]."</a></b></li>";
                                    }
                                }
                                else {
                                    echo "<li class='tick'><b style='color:red;'>Belum pernah membuat artikel</b>";
                                }
                                ?>
                            </ul>
                        </div>
              </div>
              <!-- End Categories Widget -->
              <span class="box-arrow"></span>
            
            </div>
        
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
                            <textarea name="konten" id="konten" cols="5" rows="5" class="contacttextarea form-control" placeholder="Tinggalkan pesan anda terhadap <?php echo $profil['first_name'];?>"></textarea>
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