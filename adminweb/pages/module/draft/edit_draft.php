<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Edit Berita</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
						
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <?php
                                                $id_draft  = $_GET['id_draft'];
                                                $data        = $fquery->get_one_draft($id_draft);
                                                ?>
                                                <fieldset>
									<p>
										<label for="full-width-input">Judul berita</label>
                                                                                <input type="hidden" name="id_draft" value="<?php echo $_GET['id_draft']; ?>">
                                                                                <input type="text" value="<?php echo $data['judul']; ?>" required maxlength="150" name="judul" id="full-width-input" class="default-width-input form-control"/>
										<em>Judul berita maksimal 150 karakter, tanpa spesial karakter.</em>								
									</p>
	
									<p>
										<label for="textarea">Konten Berita</label>
                                                                                <textarea id="text" rows="15" placeholder="Masukan teks konten disini......." name="konten" class="full-width-textarea form-control"><?php echo $data['konten']; ?></textarea>
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
                                                                                    echo "<option value='".$row['id_kategori']."'";
                                                                                    echo  $row['id_kategori']==$data['id_kategori'] ? 'selected' : '';
                                                                                    echo ">$row[nama]";
                                                                                    echo "</option>";
                                                                                }
                                                                                ?>
                                                                                </select>
										<em>Pilih kategori berita.</em>								
									</p>    
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        <p>
										<label>Sebagai Headline berita ?</label>
                                                                                <?php
                                                                                if($data['headline']=='1') { ?>
                                                                                <label class="alt-label"><input required value="1" checked name="headline" type="radio"/>Ya</label>
                                                                                <label class="alt-label"><input required value="0" name="headline" type="radio"/>Tidak</label>
                                                                                <?php } 
                                                                                else { ?>
                                                                                <label class="alt-label"><input required value="1" name="headline" type="radio"/>Ya</label>
                                                                                <label class="alt-label"><input required value="0" checked name="headline" type="radio"/>Tidak</label>
                                                                               
                                                                                <?php } ?>
									</p>
										
									<div class="stripe-separator"><!--  --></div>
	                                                                        	
                                                                        <input type="submit" name="save" value="Save" class="round blue ic-right-arrow" />
                                                                        <input type="submit" name="publish" value="Publish" class="round blue ic-favorite" />
                                                                        <a href="javascript:;" onclick="self.history.back()" class="button round dark" />Kembali</a>
                                                                        
									
                                               
                                                </fieldset>
                                            </form>
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->

                                        <?php
                                        $id_draft   = $_POST['id_draft'];
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
                                                $fquery->edit_draft($kategori,$judul,$konten,$headline,$id_draft);
                                                echo "<script>window.location='admin.php?page=draft';</script>";
                                            }
                                            else {
                                                if(move_uploaded_file($file, $ok)) {
                                                    $fquery->edit_image_draft($kategori,$judul,$konten,$filename,$headline,$id_draft);
                                                    echo "<script>window.location='admin.php?page=draft';</script>";                                                    
                                                }
                                                else {
                                                    echo "<br><div class='error-box round'>Maaf, gambar yang diunggah gagal terupload. Silahkan cek kembali file tujuan.</div>";
                                                }
                                            }
                                        }
                                        else if($_POST['publish']) {
                                            $publish    = "Y";
                                            $draft      = $fquery->get_one_draft($id_draft);
                                            if(empty($file)) {
                                                $fquery->add_berita($kategori,$judul,$konten,$tanggal,$jam,$draft['gambar'],$headline,$id_team,$publish);
                                                $fquery->hapus_draft($draft['id_draft']);
                                                echo "<script>window.location='admin.php?page=berita';</script>";
                                            }
                                            else {
                                                if(move_uploaded_file($file, $ok)) {
                                                    $fquery->add_berita($kategori,$judul,$konten,$tanggal,$jam,$filename,$headline,$id_team,$publish);
                                                    $fquery->hapus_draft($draft['id_draft']);
                                                    echo "<script>window.location='admin.php?page=berita';</script>";
                                                }
                                                else {
                                                    echo "<br><div class='error-box round'>Maaf, gambar yang diunggah gagal terupload. Silahkan cek kembali file tujuan.</div>";
                                                }
                                            }
                                        }
                                        ?>