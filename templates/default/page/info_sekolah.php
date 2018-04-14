    <?php
    $id_info        = $_GET['id_info'];
    $row            = $fquery->get_one_info($id_info);
    echo "<div class='blogwrapstart'>
            	<div class='blogtitle'><h3><a href='info-$row[id_info]-".  strtolower(str_replace(" ","-",$row['nama_info'])).".html' title='$row[nama_info]'>Tentang ".$row['nama_info']."</a></h3></div>
                
                <div class='blogbody'>
                ";
                if($row['gambar']!='') {
                	echo "<div class='blogimage-info'>
                        <a href='info-$row[id_info]-".  strtolower(str_replace(" ","-",$row['nama_info'])).".html' title='$row[nama_info]'>". "<img src='photos/info/$row[gambar]' alt='".$row['nama_info']."'></a></div>
                    ";
                }
                else {
                    echo "";
                }
                    echo "<div class='blogtext'>
                    	
                        ".$row['isi_info']."
                        
                     
                    
                    </div>
                </div>
                
                <span class='box-arrow'></span>
            
            </div>";
                    
                    
                    ?>
                <div class="boxes-full">
           	<div class="boxes-padding fullpadding">
                    <h3>Baca juga tentang lainnya :</h3>
                    <hr>
                    <br>
                <?php
                $data = $fquery->show_info_other($id_info);
                foreach($data as $other) {
                echo "<a class=\"whitebutton smallsmoothrectange\""
                    . "href='info-$other[id_info]-".  strtolower(str_replace(" ","-",$other['nama_info'])).".html'>"
                        . "$other[nama_info]</a> ";
                }
                ?>
                    <div class="clear"
                    <br><br>
                </div>
                </div>
                </div>