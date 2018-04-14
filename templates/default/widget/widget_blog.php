
                
                 <div class="blogwidgetstart">
                           <?php require_once ("$folder/tabs.php"); ?>
            </div>
            <!-- End Blog Widget -->
            
        	<!-- Start Blog Widget -->
            <div class="blogwidget">
            	<!-- Start Categories Widget -->
            	<div class="widgettitle"><h4>Kategori Blog</h4></div>
                
                <div class="widgetbody">
                
                	<div class="blogcategories">
                    
                    	<ul>
                            <?php
                            $data   = $fquery->show_kategori();
                            foreach($data as $row) {
                                echo "<li><a href='kategori-".$row['id_kategori']."-".  strtolower(str_replace(" ","-",$row['nama'])).".html' title='$row[nama]'> ".$row['nama']."</a></li>";
                            }
                            ?>
                            
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
            	<div class="widgettitle"><h4> Artikel Terbaru</h4></div>
                
                <div class="widgetbody">
                
                	<div class="blogcategories">
                    
                    	<ul>
                            <?php
                            $data   = $fquery->show_berita_top();
                            foreach($data as $row) {
                                echo "<li><a href='artikel-".$row['id_berita']."-".  strtolower(str_replace(" ","-",$row['judul'])).".html' title='$row[judul]'> "
                                        . "<i  class='fa fa-newspaper-o'></i> ".$row['judul']."</a></li>";
                            }
                            ?>                  
                        </ul>
                    
                    </div>
                
              </div>
              <!-- End Categories Widget -->
              <span class="box-arrow"></span>
            
            </div>
            <!-- End Blog Widget -->
            
        