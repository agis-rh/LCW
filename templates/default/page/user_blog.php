    <?php
    $id_user        = $_GET['id_user'];
    $batas          = $settings['batas_paging_homepage'];
    $posisi         = $pagingid->cariPosisiId($batas);
    $news           = $fquery->paging_berita_id_team($posisi,$batas,$id_user);
    $jumlah         = $fquery->jumlah_berita_id_team($id_user);
    if($jumlah > 0 ) {
    foreach ($news as $row) {
    $isi_berita = strip_tags($row['konten']); 
    $isi = substr($isi_berita,0,130); 
    $isi = substr($isi_berita,0,strrpos($isi," "));
    echo "<div class='blogwrapstart'>
            	<div class='blogtitle'><h3><a href='artikel-$row[id_berita]-".  strtolower(str_replace(" ","-",$row['judul'])).".html' title='$row[judul]'>".$row['judul']."</a></h3></div>
                
                <div class='blogbody'>";
                if($row['gambar']=='') {
                	echo "<div class='blogimage'><a href='artikel-$row[id_berita]-".  strtolower(str_replace(" ","-",$row['judul'])).".html' title='$row[judul]'>"
                        . "<img src='myassets/images/blog.png' alt='".$row['judul']."'></a></div>";
                        
                }
                else {
                        echo "<div class='blogimage'><a href='artikel-$row[id_berita]-".  strtolower(str_replace(" ","-",$row['judul'])).".html' title='$row[judul]'>"
                        . "<img src='photos/berita/".$row['gambar']."' alt='".$row['judul']."'></a></div>";
                        
                }   
                    echo "<div class='bloginfo'>
                    
                      <p class='tagicon'>Kategori: <a href='kategori-".$row['id_kategori']."-".  strtolower(str_replace(" ","-",$row['nama'])).".html'><span>".$row['nama']."</span></a></p>
                      <p class='calendericon'>Tanggal: <span>".  tanggal($row['tanggal'])."</span></p>
                      <p class='clockicon'>Waktu: <span>".$row['waktu']."</span></p>
                      <p class='gamingicon'>Sebanyak <span><b>".$row['reader']."</b> pembaca</span></p>    
                </div>
                    
                    <div class='blogtext'>
                    	
                        <p>".$isi.".....</p>
                        
                     
                        <p class='blogbutton'>
                            <a href='artikel-$row[id_berita]-".  strtolower(str_replace(" ","-",$row['judul'])).".html' title='Baca Selengkapnya' class='smallsmoothrectange whitebutton'>Baca Selengkapnya</a>
                        </p>
                    
                    </div>
                </div>
                
                <span class='box-arrow'></span>
            
            </div>";
    }
    ?>
            
            <!-- Start Pagination -->
            <div class='blogwrap'>
            
                <div class='blogpagination'>
                
                <?php
                $active     = "userblog";
                $namaid     = "id_user";
                $id         = $id_user;
                $page       = $_GET['halaman'];
                $jml_data   = $fquery->jumlah_berita_id_team($id_user);
                $jml_page   = $pagingid->jumlahPageId($jml_data,$batas);
                $link       = $pagingid->linkHalamanId($page,$jml_page,$active,$namaid,$id);
                echo $link;
                ?>                
                </div>  
                
                <span class='box-arrow'></span>
            </div> 
            <!-- End Pagination -->
        <?php
        }
        else {
            echo "<div class='blogwrapstart'>
                <div class='blogtitle'><h3><a href='javascript:;'>Belum ada artikel yang dibuat</a></h3></div>
                
                <div class='blogbody'>
    
                    <div class='blogtext'>
                        
                        <p>Saat ini belum pernah membuat artikel, silahkan pilih user yang lain.</p>
                        
                    
                    </div>
                </div>
                
                <span class='box-arrow'></span>
            
            </div>";
        }
    
        ?>
        
            