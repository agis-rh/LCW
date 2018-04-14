        <!-- Start Right Section -->
        <div class="leftsection">
            
            <?php
            if(isset($_POST['search'])) {
                $keyword        = $_POST['keyword'];
                $query_berita   = mysql_query("SELECT * FROM berita WHERE judul LIKE '%$keyword%' OR konten LIKE '%$keyword%'");
                $query_info     = mysql_query("SELECT * FROM info_sekolah WHERE nama_info LIKE '%$keyword%' OR isi_info LIKE '%$keyword%'");
                $jumlah_berita  = mysql_num_rows($query_berita);
                $jumlah_info    = mysql_num_rows($query_info);
                if($jumlah_berita > 0 ) {
                    
                    while($berita = mysql_fetch_array($query_berita)) {
                        $isi_berita = strip_tags($berita['konten']); 
                        $isi = substr($isi_berita,0,250); 
                        $isi = substr($isi_berita,0,strrpos($isi," "));
                        $replace = "<b>$keyword</b>";
                        $judul  = str_replace($keyword, "<b>$keyword</b>", $isi);
                        echo "<div class='blogwrapstart'>
                            <div class='blogtitle'><h3><a href='artikel-$berita[id_berita]-".  strtolower(str_replace(" ","-",$berita['judul'])).".html' title='$berita[judul]'>".$berita['judul']."</a></h3></div>

                            <div class='blogbody'>";

                                echo "<div class='bloginfo'>
                                    
                            </div>

                                <div class='blogtext'>

                                    <p>".$judul.".....</p>

                                    <p class='blogbutton'>
                                    <a href='artikel-$berita[id_berita]-".  strtolower(str_replace(" ","-",$berita['judul'])).".html' title='$berita[judul]' class='smallsmoothrectange whitebutton'>Baca Selengkapnya</a>
                                          </p>

                                </div>
                            </div>

                            <span class='box-arrow'></span>

                        </div>";
                    }
                }
                else {
                    if($jumlah_info > 0 ) {
                        while($info = mysql_fetch_array($query_info)) {
                        $isi_info = strip_tags($info['isi_info']); 
                        $isi = substr($isi_info,0,250); 
                        $isi = substr($isi_info,0,strrpos($isi," "));
                         echo "<div class='blogwrapstart'>
                            <div class='blogtitle'><h3><a href='info-$info[id_info]-".  strtolower(str_replace(" ","-",$info['nama_info'])).".html' title='$info[nama_info]'>".$info['nama_info']."</a></h3></div>

                            <div class='blogbody'>";

                                echo "<div class='bloginfo'>
                                    
                            </div>

                                <div class='blogtext'>

                                    <p>".$isi.".....</p>

                                    <p class='blogbutton'>
                                    <a href='info-$info[id_info]-".  strtolower(str_replace(" ","-",$info['nama_info'])).".html' title='$info[nama_info]' class='smallsmoothrectange whitebutton'>Baca Selengkapnya</a>
                                          </p>

                                </div>
                            </div>

                            <span class='box-arrow'></span>

                        </div>";
                    }

                    }
                    else {
                         echo "<div class='blogwrapstart'>
                            <div class='blogtitle'><h3><a href='javascript:;'>Tidak menemukan apa-apa</a></h3></div>

                            <div class='blogbody'>";

                                echo "
                                    <div class='blogtext'>

                                    <p>Maaf kata kunci \"$keyword\" tidak dapat ditemukan. Silahkan masukan kata kunci yang lain.!</p>

                                        </div>
                                    </div>

                            <span class='box-arrow'></span>

                        </div>";
                    }
                }
            }
                ?>
            
            <!-- Start Pagination
            <div class='blogwrap'>
            
                <div class='blogpagination'>
                <?php
                /*$active     = "kategoriblog";
                $namaid     = "id_kategori";
                $id         = $id_kategori;
                $page       = $_GET['halaman'];
                $jml_data   = $fquery->jumlah_berita_kategori($id_kategori);
                $jml_page   = $pagingid->jumlahPageId($jml_data,$batas);
                $link       = $pagingid->linkHalamanId($page,$jml_page,$active,$namaid,$id);
                echo $link;*/
                ?>                
                </div>  
                
                <span class='box-arrow'></span>
            </div> 
             End Pagination -->
            
      
            
        </div>
        <!-- End Right Section -->
             <!-- Start Left Section -->
        <div class="rightsection">
            <?php require_once("$folder/widget/widget_blog.php"); ?>
        </div>
        <!-- End Left Section -->
        
        

