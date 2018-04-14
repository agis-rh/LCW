<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Tambah Banner</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <fieldset>
									<p>
										<label for="full-width-input">Nama situs</label>
                                                                                <input type="text" required maxlength="150"  name="judul" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama situs atau keterangan.</em>								
									</p><br>
	
									<p>
										<label for="textarea">alamat situs</label>
                                                                                <input type="text"  name="alamat" id="full-width-input" class="default-width-input form-control"/>
									</p><br>
                                                                        <p>
										<label for="full-width-input">Upload Gambar Banner</label>
                                                                                <input type="file" name="gambar" class="default-width-input form-control"/>
										<em>Format gambar (*.jpg, *.gif, *.png).</em>								
									</p><br>
                                                                        
									<div class="stripe-separator"><!--  --></div>
	                                                                        	
                                                                        <input type="submit" name="save" value="Simpan" class="round blue ic-right-arrow" />
                                                                        <a href="javascript:;" onclick="self.history.back()" class="button round dark" />Kembali</a>
                                                                        
									
                                               
                                                </fieldset>
                                            </form>
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->

                                        <?php
                                        $judul      = $_POST['judul'];
                                        $alamat     = $_POST['alamat'];
                                        
                                        $file       = $_FILES['gambar']['tmp_name'];
                                        $filename   = $_FILES['gambar']['name'];
                                        $dir        = "../photos/banner/";
                                        $ok         = $dir.$filename;
                                        
                                        if($_POST['save']) {
                                            $id_team    = $_SESSION['id_team'];
                                            $tanggal    = date("Y-m-d");
                                            $jam        = date("H:i:s");
                                            if(empty($file)) {
                                                $fquery->add_log_team($id_team,'Menambahkan banner web',$tanggal,$jam);
                                                $fquery->add_banner($alamat,$file,$judul);
                                                echo "<script>window.location='admin.php?page=banner';</script>";
                                            }
                                            else {
                                                if(move_uploaded_file($file, $ok)) {
                                                    $fquery->add_log_team($id_team,'Menambahkan banner web',$tanggal,$jam);
                                                    $fquery->add_banner($alamat,$filename,$judul);
                                                    echo "<script>window.location='admin.php?page=banner';</script>";
                                                }
                                                else {
                                                    echo "<br><div class='error-box round'>Maaf, gambar yang diunggah gagal terupload. Silahkan cek kembali file tujuan.</div>";
                                                }
                                            }
                                        }
                                        