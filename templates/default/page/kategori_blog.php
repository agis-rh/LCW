    <?php
    $id_kategori    = $_GET['id_kategori'];
    $batas          = $settings['batas_paging_homepage'];
    $posisi         = $pagingid->cariPosisiId($batas);
    $news           = $fquery->paging_web_kategori_berita($posisi,$batas,$id_kategori);
    $cek_jumlah     = $fquery->jumlah_berita_kategori($id_kategori);
    if($cek_jumlah > 0) {
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
                    
                      <p class='usericon'>Oleh: <a href='user-".$row['id_team']."-".md5($row['username']).".html'><span>".$row['first_name']." ".$row['last_name']."</span></a></p>
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
                $active     = "kategoriblog";
                $namaid     = "id_kategori";
                $id         = $id_kategori;
                $page       = $_GET['halaman'];
                $jml_data   = $fquery->jumlah_berita_kategori($id_kategori);
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
            	<div class='blogtitle'><h3><a href='' title='$row[judul]'>Belum ada artikel pada kategori ini</a></h3></div>
                
                <div class='blogbody'>
                
                </div></div>";
    }
    ?>
        
            