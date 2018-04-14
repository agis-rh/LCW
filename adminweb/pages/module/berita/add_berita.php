<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Tambah Berita</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
						
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <fieldset>
									<p>
										<label for="full-width-input">Judul berita</label>
                                                                                <input type="text" required maxlength="150" name="judul" id="full-width-input" class="default-width-input form-control"/>
										<em>Judul berita maksimal 150 karakter, tanpa spesial karakter.</em>								
									</p>
	
									<p>
										<label for="textarea">Konten Berita</label>
                                                                                <textarea id="text" rows="15" placeholder="Masukan teks konten disini......." name="konten" class="full-width-textarea form-control"></textarea>
									</p>
                                                                        <p>
										<label for="full-width-input">Gambar Headline Berita</label>
                                                                                <input type="file" name="gambar" class="default-width-input form-control"/>
										<em>Format gambar (*.jpg, *.gif, *.png).</em>								
									</p>
                                                                        <p>
										<label for="full-width-input">Kategori Berita</label>
                                                                                <select name="kategori" required class="default-width-input form-control"/>
                                                                                <option value="0">Uncategorized </option>
                                                                                <?php
                                                                                $kategori = $fquery->show_kategori();
                                                                                foreach($kategori as $row) {
                                                                                    echo "<option value='$row[id_kategori]'>$row[nama]</option>";
                                                                                }
                                                                                ?>
                                                                                </select>
										<em>Pilih kategori berita.</em>								
									</p>
                                                                        <p>
										<label>Sebagai Headline berita ?</label>
                                                                                <label class="alt-label"><input required value="1" name="headline" type="radio"/>Ya</label>
                                                                                <label class="alt-label"><input required value="0" name="headline" type="radio"/>Tidak</label>
									</p>
	
                                                                        <p>
										<label>Publikasikan Berita ?</label>
                                                                                <label class="alt-label"><input value="Y" required name="publik" type="radio"/>Ya</label>
                                                                                <label class="alt-label"><input value="N" required name="publik" type="radio"/>Tidak</label>
									</p>
	
									
									<div class="stripe-separator"><!--  --></div>
	                                                                        	
                                                                        <input type="submit" name="save" value="Save" class="round blue ic-right-arrow" />
                                                                        <input type="submit" name="draft" value="Save as Draft" class="round blue ic-favorite" />
                                                                        <a href="javascript:;" onclick="self.history.back()" class="button round dark" />Kembali</a>
                                                                        
									
                                               
                                                </fieldset>
                                            </form>
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->

                                        <?php
                                        $id_team    = $_SESSION['id_team'];
                                        $tanggal    = date("Y-m-d");
                                        $jam        = date("H:i:s");
                                        $judul      = $_POST['judul'];
                                        $konten     = $_POST['konten'];
                                        $kategori   = $_POST['kategori'];
                                        $headline   = $_POST['headline'];
                                        $publik     = $_POST['publik'];
                                        $id_team    = $_SESSION['id_team'];
                                        
                                        $file       = $_FILES['gambar']['tmp_name'];
                                        $filename   = $_FILES['gambar']['name'];
                                        $dir        = "../photos/berita/";
                                        $ok         = $dir.$filename;
                                        
                                        if($_POST['save']) {
                                            if(empty($file)) {
                                                $fquery->add_berita($kategori,$judul,$konten,$tanggal,$jam,$file,$headline,$id_team,$publik);
                                                $fquery->add_log_team($id_team,'Menambah data berita baru',$tanggal,$jam);
                                                echo "<script>window.location='admin.php?page=berita';</script>";
                                            }
                                            else {
                                                if(move_uploaded_file($file, $ok)) {
                                                    $fquery->add_berita($kategori,$judul,$konten,$tanggal,$jam,$filename,$headline,$id_team,$publik);
                                                    $fquery->add_log_team($id_team,'Menambah data berita baru',$tanggal,$jam);
                                                    echo "<script>window.location='admin.php?page=berita';</script>";
                                                }
                                                else {
                                                    echo "<br><div class='error-box round'>Maaf, gambar yang diunggah gagal terupload. Silahkan cek kembali file tujuan.</div>";
                                                }
                                            }
                                        }
                                        else if($_POST['draft']) {
                                            if(empty($file)) {
                                                $fquery->add_draft($kategori,$judul,$konten,$tanggal,$jam,$file,$headline,$id_team);
                                                echo "<script>window.location='admin.php?page=draft';</script>";
                                            }
                                            else {
                                                if(move_uploaded_file($file, $ok)) {
                                                    $fquery->add_draft($kategori,$judul,$konten,$tanggal,$jam,$filename,$headline,$id_team);
                                                    echo "<script>window.location='admin.php?page=draft';</script>";
                                                }
                                                else {
                                                    echo "<br><div class='error-box round'>Maaf, gambar yang diunggah gagal terupload. Silahkan cek kembali file tujuan.</div>";
                                                }
                                            }
                                        }
                                        ?>