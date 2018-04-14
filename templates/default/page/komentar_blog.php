<script src="ajax-jquery/jquery/validasi_komentar.js"></script>
    <?php
    $jumlah    = $fquery->jumlah_komentar_berita($detail['id_berita']);
    if($jumlah > 0) {
        echo "<div class='splitnone'><p class='greenalert'><span>ADA $jumlah KOMENTAR</span></p></div>";
                
        $data  = $fquery->show_komentar($detail['id_berita']);
        foreach ($data as $komentar) {
        	
            echo "<div class='blogcomment'>
            
           	  <div class='blogwcommentwrap'>
                
                	<div class='commenttitle'>
                    
                    	<p><span class='avatarname'>$komentar[komentator]</span> <span class='avatardate'>Pada tanggal <span class='avatardateorange'>".tanggal($komentar['tanggal'])."</span>&nbsp;&nbsp;&nbsp;&nbsp;
                            pukul <strong>$komentar[waktu]</strong></span><span class='avatarreply'></span></p>
                    
                  </div>
                    
                      <div class='commentuser'><img style='border-radius: 5px;' src='myassets/images/avatar.jpg' alt='$komentar[komentator]'></div>
                    
                    <div class='commenttext'>
                    
                    <p>
                    ".sensor($komentar['isi'])."
                    </p>
                    
                    </div>
                    
                    <span class='box-arrow'></span>
                
                </div>
            
            </div>";
            
            $balas1  = $fquery->show_balas_komentar($komentar['id_komentar']);
            $jumlah = $fquery->jumlah_balas_komentar($komentar['id_komentar']);
            if($jumlah > 0) {
                foreach ($balas1 as $balas) {
            echo "<div class='blogcomment'>
            
                <div class='blogcommentreply'>
                
                      <div class='blogwcommentwrap'>
                        
                            <div class='commenttitle'>
                            
                                <p><span class='avatarname'>Admin</span> <span class='avatardate'>Tanggal <span class='avatardateorange'>".  tanggal($balas['tanggal'])."</span> "
                    . "&nbsp;&nbsp;&nbsp; pukul <b>".$balas['waktu']."</b></span><span class='avatarreply'></span></p>
                          </div>
                            
                          <div class='commentuserreply'><img style='border-radius:5px;' src='myassets/images/avatar-reply.jpg' alt='John Doe'></div>
                            
                            <div class='commenttextreply'>
                            
                            <p>
                            ".sensor($balas['konten'])."
                            </p>
                            </div>
                            
                            <span class='box-arrow'></span>
                        
                        </div>
                        
                </div>
            
            </div>";
            }
            
            }
            else {
                echo "";
            }
        }
            
    }
    else {
        echo "<div class='splitnone'><p class='warningalert'><span>BELUM ADA KOMENTAR</span></p></div>";
    }
            ?>
            
<div class="boxes-full" style="margin-top: 30px;">
        
        	<div class="boxes-padding fullpadding">
            
            <div id="contactwarning"></div>
            <div id="contactajax"></div>
            <div id="hide-form">
            <form action="ajax-jquery/php/komentar.php" method="post" name="ajaxcontactform" id="ajaxcontactform">
                <input id="id_berita" type="hidden" name="id_berita" value="<?php echo $_GET['id_berita'];?>">
            	<div class="contacttextarea">
                	<input name="contactformid" id="contactformid" type="hidden" value="1" />
                
                	<fieldset>
                            <textarea name="konten" id="konten" cols="5" rows="5" class="contacttextarea form-control" placeholder="Tinggalkan komentar anda disini...."></textarea>
                    </fieldset>
                
                </div>
                
                <div class="contacttextboxes">
                
                	<fieldset>
                            <input id="nama" name="nama" type="text" class="contacttextform form-control" placeholder="Nama lengkap">
                    </fieldset>
                	<fieldset>
                            <input id="email" name="email" type="text" class="contacttextform form-control" placeholder="Alamat email">
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
