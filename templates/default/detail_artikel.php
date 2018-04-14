    <?php
    $id_berita  = $_GET['id_berita'];
    $fquery->add_pembaca_berita($id_berita);
    $detail     = $fquery->detail_web_berita($id_berita);
    $fquery->add_pembaca_berita($id_berita);
    ?>

        <!-- Start Left Section -->
        <div class="leftsection">
        
        <?php
        
        
         echo "<div class='blogwrapstart'>
            	<div class='blogtitle'><h3><a href='artikel-$detail[id_berita]-".  strtolower(str_replace(" ","-",$detail['judul'])).".html' title='$detail[judul]'>".$detail['judul']."</a></h3></div>
                
                <div class='blogbody'>";
                
         if($detail['gambar']=='') {
                	echo "<div class='blogimage'><a href='artikel-$detail[id_berita]-".  strtolower(str_replace(" ","-",$detail['judul'])).".html' title='$detail[judul]'>"
                        . "<img src='myassets/images/blog.png' alt='".$detail['judul']."'></a></div>";
                        
        }
        else {
                            echo "<div class='blogimage'><a href='artikel-$detail[id_berita]-".  strtolower(str_replace(" ","-",$detail['judul'])).".html' title='$detail[judul]'>"
                            . "<img src='photos/berita/".$detail['gambar']."' alt='".$detail['judul']."'></a></div>";

        }
                    echo "<div class='bloginfo'>
                    
                      <p class='usericon'>Oleh: <a href='user-".$detail['id_team']."-".md5($detail['username']).".html'><span>".$detail['first_name']." ".$detail['last_name']."</span></a></p>
                      <p class='tagicon'>Kategori: <a href='kategori-".$detail['id_kategori']."-".  strtolower(str_replace(" ","-",$detail['nama'])).".html'><span>".$detail['nama']."</span></a></p>
                      <p class='calendericon'>Tanggal: <span>".  tanggal($detail['tanggal'])."</span></p>
                      <p class='clockicon'>Waktu: <span>".$detail['waktu']."</span></p>
                    </div>
                    
                    <div class='blogtext'>
                    	
                        ".$detail['konten']."
                    
                    </div>
                </div>
                
                <span class='box-arrow'></span>
            
            </div>";
         
         require_once ("$folder/page/komentar_blog.php");
         ?>
        </div>
        <!-- End Left Section -->
        
        <div class="rightsection">
            <?php require_once("$folder/widget/widget_blog.php"); ?>
        </div>

