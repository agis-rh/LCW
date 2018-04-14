<?php
$data = $fquery->get_one_slide($_GET['id_slide']);
?>
<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Edit Slide Gambar</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
						
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <fieldset>
                                                                        <p>
                                                                            <input type="hidden" name="id_slide" value="<?php echo "$_GET[id_slide]"; ?>">
										<label for="full-width-input">Ganti gambar</label>
                                                                                <input type="file" name="gambar" class="default-width-input form-control"/>
										<em>Format gambar (*.jpg, *.gif, *.png).</em>								
                                                                        </p><br>
                                                                        <?php 
                                                                        if($data['filename']!='') {
                                                                        ?>
                                                                         <p>
										<label for="full-width-input">Gambar Slide Sebelumnya</label>
                                                                                <img src="../photos/slider/<?php echo $data['filename'];?>" width="50%">
										<em>Kosongkan saja jika tidak ingin mengubah gambar.</em>								
									</p>
                                                                        <br>
                                                                        <?php
                                                                        }
                                                                        else {
                                                                            echo "<p style='color:red'>Tidak ada gambar, silahkan untuk mengupload gambar</p><br>";
                                                                        }
                                                                        ?>
									<p>
										<label for="full-width-input">Ketrangan gambar</label>
                                                                                <input value="<?php echo "$data[keterangan]"; ?>" type="text" required maxlength="150" name="judul" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama info harus seminimal mungkin.</em>								
                                                                        </p><br>
                                                                        
                                                                        <p>
										<label for="full-width-input">Data-x</label>
                                                                                <input value="<?php echo "$data[data_x]"; ?>" type="text" required maxlength="150" name="data_x" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama info harus seminimal mungkin.</em>								
                                                                        </p><br>
                                                                        
                                                                        <p>
										<label for="full-width-input">Data-y</label>
                                                                                <input value="<?php echo "$data[data_y]"; ?>" type="text" required maxlength="150" name="data_y" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama info harus seminimal mungkin.</em>								
                                                                        </p><br>
                                                                        
                                                                        <p>
										<label for="full-width-input">Data Scale</label>
                                                                                <input value="<?php echo "$data[data_scale]"; ?>" type="text"  maxlength="150" name="scale" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama info harus seminimal mungkin.</em>								
                                                                        </p><br>
                                                                        
                                                                        <p>
										<label for="full-width-input">Data Rotate</label>
                                                                                <input value="<?php echo "$data[data_rotate]"; ?>" type="text"  maxlength="150" name="rotate" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama info harus seminimal mungkin.</em>								
                                                                        </p><br>
                                                                        
                                                                        <p>
										<label>Tipe Slide Gambar</label>
                                                                                <input required type="text" name="type" value="<?php echo $data['type_slide']; ?>">
                                                                        </p><br>
                                                                        
                                                                        
                                                                        <p>
                                                                            <label>Aktifkan Gambar ?</label>
                                                                            <?php
                                                                            if($data['aktif']=='Y') { ?>
										
                                                                            <label class="alt-label"><input value="Y" checked required name="publik" type="radio"/>Ya</label>
                                                                                <label class="alt-label"><input value="N" required name="publik" type="radio"/>Tidak</label>
                                                                            <?php
                                                                            } else { ?>
                                                                                
                                                                                <label class="alt-label"><input value="Y" required name="publik" type="radio"/>Ya</label>
                                                                                <label class="alt-label"><input value="N" checked required name="publik" type="radio"/>Tidak</label>
                                                                            
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </p>
	
									
									<div class="stripe-separator"><!--  --></div>
	                                                                        	
                                                                        <input type="submit" name="save" value="Save" class="round blue ic-right-arrow" />
                                                                        <a href="javascript:;" onclick="self.history.back()" class="button round dark" />Kembali</a>
                                                                        
									
                                               
                                                </fieldset>
                                            </form>
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->

                                        <?php
                                        $id_slide   = $_POST['id_slide'];
                                        $ket        = $_POST['judul'];
                                        $type       = $_POST['type'];
                                        $x          = $_POST['data_x'];
                                        $y          = $_POST['data_y'];
                                        $scale      = $_POST['scale'];
                                        $rotate     = $_POST['rotate'];
                                        $aktif      = $_POST['publik'];
                                        
                                        $file       = $_FILES['gambar']['tmp_name'];
                                        $filename   = $_FILES['gambar']['name'];
                                        $dir        = "../photos/slider/";
                                        $ok         = $dir.$filename;
                                        
                                        if($_POST['save']) {
                                            $id_team    = $_SESSION['id_team'];
                                            $tanggal    = date("Y-m-d");
                                            $jam        = date("H:i:s");
                                            if(empty($file)) {
                                                $fquery->add_log_team($id_team,'Mengubah data slide gambar',$tanggal,$jam);
                                                $fquery->edit_slide($ket,$type,$x,$y,$scale,$rotate,$aktif,$id_slide);
                                                echo "<script>window.location='admin.php?page=slide';</script>";
                                            }
                                            else {
                                                $get_one    = $fquery->get_one_slide($_GET['id_slide']);
                                                if($get_one['filename']!='') {
                                                unlink("../photos/slider/$get_one[filename]");
                                                }
                                                if(move_uploaded_file($file, $ok)) {
                                                    $fquery->add_log_team($id_team,'Mengubah data slide gambar',$tanggal,$jam);
                                                    $fquery->edit_gambar_slide($ket,$filename,$type,$x,$y,$scale,$rotate,$aktif,$id_slide);
                                                    echo "<script>window.location='admin.php?page=slide';</script>";
                                                }
                                                else {
                                                    echo "<br><div class='error-box round'>Maaf, gambar yang diunggah gagal terupload. Silahkan cek kembali file tujuan.</div>";
                                                }
                                            }
                                        }