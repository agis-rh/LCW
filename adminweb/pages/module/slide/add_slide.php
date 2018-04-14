<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Tambah Slide Gambar</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
						
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <fieldset>
                                                                        <p>
										<label for="full-width-input">Upload gambar</label>
                                                                                <input type="file" name="gambar" class="default-width-input form-control"/>
										<em>Format gambar (*.jpg, *.gif, *.png).</em>								
                                                                        </p><br>
									<p>
										<label for="full-width-input">Ketrangan gambar</label>
                                                                                <input type="text" required maxlength="150" name="judul" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama info harus seminimal mungkin.</em>								
                                                                        </p><br>
                                                                        
                                                                        <p>
										<label for="full-width-input">Data-x</label>
                                                                                <input type="text" required maxlength="150" name="data_x" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama info harus seminimal mungkin.</em>								
                                                                        </p><br>
                                                                        
                                                                        <p>
										<label for="full-width-input">Data-y</label>
                                                                                <input type="text" required maxlength="150" name="data_y" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama info harus seminimal mungkin.</em>								
                                                                        </p><br>
                                                                        
                                                                        <p>
										<label for="full-width-input">Data Scale</label>
                                                                                <input type="text" required maxlength="150" name="scale" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama info harus seminimal mungkin.</em>								
                                                                        </p><br>
                                                                        
                                                                        <p>
										<label for="full-width-input">Data Rotate</label>
                                                                                <input type="text" required maxlength="150" name="rotate" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama info harus seminimal mungkin.</em>								
                                                                        </p><br>
                                                                        
                                                                        <p>
										<label>Tipe Slide Gambar</label>
                                                                                <label class="alt-label"><input value="intro" required name="type" type="radio"/>Intro</label>
                                                                                <label class="alt-label"><input value="view" required name="type" type="radio"/>View</label>
                                                                                <label class="alt-label"><input value="capture" required name="type" type="radio"/>Capture</label>
                                                                                
                                                                        </p><br>
                                                                        
                                                                        
                                                                        <p>
										<label>Aktifkan Gambar ?</label>
                                                                                <label class="alt-label"><input value="Y" required name="publik" type="radio"/>Ya</label>
                                                                                <label class="alt-label"><input value="N" required name="publik" type="radio"/>Tidak</label>
									</p>
	
									
									<div class="stripe-separator"><!--  --></div>
	                                                                        	
                                                                        <input type="submit" name="save" value="Save" class="round blue ic-right-arrow" />
                                                                        <a href="javascript:;" onclick="self.history.back()" class="button round dark" />Kembali</a>
                                                                        
									
                                               
                                                </fieldset>
                                            </form>
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->

                                        <?php
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
                                                $fquery->add_log_team($id_team,'Menambahkan data slide gambar',$tanggal,$jam);
                                                $fquery->add_slide($ket,$file,$type,$x,$y,$scale,$rotate,$aktif);
                                                echo "<script>window.location='admin.php?page=slide';</script>";
                                            }
                                            else {
                                                if(move_uploaded_file($file, $ok)) {
                                                    $fquery->add_log_team($id_team,'Menambahkan data slide gambar',$tanggal,$jam);
                                                    $fquery->add_slide($ket,$filename,$type,$x,$y,$scale,$rotate,$aktif);
                                                    echo "<script>window.location='admin.php?page=slide';</script>";
                                                }
                                                else {
                                                    echo "<br><div class='error-box round'>Maaf, gambar yang diunggah gagal terupload. Silahkan cek kembali file tujuan.</div>";
                                                }
                                            }
                                        }