<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Edit Template</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <fieldset>
									<p>
										<label for="full-width-input">Nama Template</label>
                                                                                <input type="text" required maxlength="150"  name="judul" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama template.</em>								
									</p><br>
	
									<p>
										<label for="textarea">Keterangan</label>
                                                                                <textarea rows="5" placeholder="Masukan teks konten disini......." name="keterangan" class="full-width-textarea form-control"></textarea>
									</p><br>
                                                                        <p>
										<label for="full-width-input">Upload Screenshot Template</label>
                                                                                <input type="file" name="gambar" class="default-width-input form-control"/>
										<em>Format gambar (*.jpg, *.gif, *.png).</em>								
									</p><br>
                                                                        <p>
										<label for="full-width-input">Pembuat</label>
                                                                                <input type="text" required name="pembuat" class="default-width-input form-control"/>
										
										<em>Sebagai hak cipta.</em>								
									</p><br>
                                                                        
                                                                        <p>
										<label for="full-width-input">Folder template</label>
                                                                                <input type="text" required name="folder" class="default-width-input form-control"/>
										
										<em>Direktori template.</em>								
                                                                        </p><br>
			
									<div class="stripe-separator"><!--  --></div>
	                                                                        	
                                                                        <input type="submit" name="save" value="Simpan" class="round blue ic-right-arrow" />
                                                                        <a href="javascript:;" onclick="self.history.back()" class="button round dark" />Kembali</a>
                                                                        
									
                                               
                                                </fieldset>
                                            </form>
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->

                                        <?php
                                        $id_template    = $_POST['id_template'];
                                        $judul          = $_POST['judul'];
                                        $keterangan     = $_POST['keterangan'];
                                        $pembuat        = $_POST['pembuat'];
                                        $folder         = $_POST['folder'];
                                        $aktif          = $_POST['aktif'];
                                        
                                        $file       = $_FILES['gambar']['tmp_name'];
                                        $filename   = $_FILES['gambar']['name'];
                                        $dir        = "../photos/screenshots/";
                                        $ok         = $dir.$filename;
                                        
                                        if($_POST['save']) {
                                            $id_team    = $_SESSION['id_team'];
                                            $tanggal    = date("Y-m-d");
                                            $jam        = date("H:i:s");
                                            if(empty($file)) {
                                                $fquery->add_log_team($id_team,'Menambahkan template web',$tanggal,$jam);
                                                $fquery->add_template($judul,$pembuat,$folder,$keterangan,$file);
                                                echo "<script>window.location='admin.php?page=template';</script>";
                                            }
                                            else {
                                                if(move_uploaded_file($file, $ok)) {
                                                    $fquery->add_log_team($id_team,'Menambahkan template web',$tanggal,$jam);
                                                    $fquery->add_template($judul,$pembuat,$folder,$keterangan,$filename);
                                                    echo "<script>window.location='admin.php?page=template';</script>";
                                                }
                                                else {
                                                    echo "<br><div class='error-box round'>Maaf, gambar yang diunggah gagal terupload. Silahkan cek kembali file tujuan.</div>";
                                                }
                                            }
                                        }
                                        