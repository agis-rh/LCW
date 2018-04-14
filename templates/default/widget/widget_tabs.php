    <div class="blogwidgetstart">
           <?php require_once ("$folder/tabs.php"); ?>
            </div>
        	<!-- Start Blog Widget -->
                
        	<!-- Start Blog Widget -->
            <div class="blogwidget">
            	<!-- Start Advertising Widget -->
            	<div class="widgettitle"><h4>Blog artikel user</h4></div>
                
                <div class="widgetbody">
                
                	<div class="blogcategories">
                    
                    	<ul>
                            <?php
                            $data   = $fquery->show_team();
                            foreach($data as $row) {
                                echo "<li><a href='user-".$row['id_team']."-".  strtolower(md5($row['username'])).".html' title='$row[first]'> ".$row['first']." ".$row['last']."</a></li>";
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
            	<div class="widgettitle"><h4>Kategori Blog</h4></div>
                
                <div class="widgetbody">
                
                	<div class="blogcategories">
                    
                    	<ul>
                            <?php
                            $data1   = $fquery->show_kategori();
                            foreach($data1 as $row1) {
                                echo "<li><a href='kategori-".$row1['id_kategori']."-".  strtolower(str_replace(" ","-",$row1['nama'])).".html' title='$row1[nama]'> ".$row1['nama']."</a></li>";
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
            	<div class="widgettitle"><h4>Artikel Terbaru</h4></div>
                
                <div class="widgetbody">
                
                	<div class="blogcategories">
                    
                    	<ul>
                            <?php
                            $data2   = $fquery->show_berita_top();
                            foreach($data2 as $row2) {
                                echo "<li><a href='artikel-".$row2['id_berita']."-".  strtolower(str_replace(" ","-",$row2['judul'])).".html' title='$row2[judul]'> "
                                        . "<i  class='fa fa-newspaper-o'></i> ".$row2['judul']."</a></li>";
                            }
                            ?>                  
                        </ul>
                    
                    </div>
                
              </div>
              <!-- End Categories Widget -->
              <span class="box-arrow"></span>
            
            </div>
            <!-- End Blog Widget -->
            