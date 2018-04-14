<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Tambah Info Sekolah</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
                                            <?php
                                            $id_info    = $_GET['id_info'];
                                            $data       = $fquery->get_one_info($id_info);
                                            ?>
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <fieldset>
									<p>
										<label for="full-width-input">Judul Info</label>
                                                                                <input type="hidden" name="id_info" value="<?php echo $_GET['id_info']; ?>">
                                                                                <input type="text" required maxlength="150" value="<?php echo $data['nama_info']; ?>" name="judul" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama info harus seminimal mungkin.</em>								
									</p>
	
									<p>
										<label for="textarea">Konten Info</label>
                                                                                <textarea id="text" rows="15" placeholder="Masukan teks konten disini......." name="konten" class="full-width-textarea form-control"><?php echo $data['isi_info']; ?></textarea>
									</p>
                                                                        <p>
										<label for="full-width-input">Ganti Photos</label>
                                                                                <input type="file" name="gambar" class="default-width-input form-control"/>
										<em>Format gambar (*.jpg, *.gif, *.png).</em>								
                                                                        </p><br>
                                                                        <?php 
                                                                        if($data['gambar']!='') {
                                                                        ?>
                                                                         <p>
										<label for="full-width-input">Gambar Info Sebelumnya</label>
                                                                                <img src="../photos/info/<?php echo $data['gambar'];?>" width="50%">
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
										<label for="full-width-input">Posisi Menu</label>
                                                                                <input type="text" required style="width: 30px" value="<?php echo $data['posisi_menu']; ?>" maxlength="2" name="posisi" class="default-width-input form-control"/>
										
										<em>Masukan posisi menu dengan angka.</em>								
									</p>
	
                                                                        <p>
										<label>Publikasikan Info ?</label>
                                                                               <?php
                                                                                if($data['publish']=='Y') { ?>
                                                                                <label class="alt-label"><input value="Y" checked required name="publik" type="radio"/>Ya</label>
                                                                                <label class="alt-label"><input value="N" <?php echo $publish; ?> required name="publik" type="radio"/>Tidak</label>
                                                                                <?php }
                                                                                else { ?>
                                                                                <label class="alt-label"><input value="Y" required name="publik" type="radio"/>Ya</label>
                                                                                <label class="alt-label"><input value="N" checked required name="publik" type="radio"/>Tidak</label>
                                                                                <?php } ?>
									</p>
	
									
									<div class="stripe-separator"><!--  --></div>
	                                                                        	
                                                                        <input type="submit" name="save" value="Save" class="round blue ic-right-arrow" />
                                                                        <a href="javascript:;" onclick="self.history.back()" class="button round dark" />Kembali</a>
                                                                        
									
                                               
                                                </fieldset>
                                            </form>
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->

                                        <?php
                                        $id_info1   = $_POST['id_info'];
                                        $judul      = $_POST['judul'];
                                        $konten     = $_POST['konten'];
                                        $posisi     = $_POST['posisi'];
                                        $publik     = $_POST['publik'];
                                        
                                        $file       = $_FILES['gambar']['tmp_name'];
                                        $filename   = $_FILES['gambar']['name'];
                                        $dir        = "../photos/info/";
                                        $ok         = $dir.$filename;
                                        
                                        if($_POST['save']) {
                                            $id_team    = $_SESSION['id_team'];
                                            $tanggal    = date("Y-m-d");
                                            $jam        = date("H:i:s");
                                            if(empty($file)) {
                                                $fquery->add_log_team($id_team,'Mengubah data informasi sekolah',$tanggal,$jam);
                                                $fquery->edit_info($judul,$konten,$posisi,$publik,$id_info1);
                                                echo "<script>window.location='admin.php?page=info_sekolah';</script>";
                                            }
                                            else {
                                                $get_one    = $fquery->get_one_info($_GET['id_info']);
                                                if($get_one['gambar']!='') {
                                                unlink("../photos/info/$get_one[gambar]");
                                                }
                                                if(move_uploaded_file($file, $ok)) {
                                                    $fquery->add_log_team($id_team,'Mengubah data informasi sekolah',$tanggal,$jam);
                                                    $fquery->edit_image_info($judul,$konten,$filename,$posisi,$publik,$id_info1);
                                                    echo "<script>window.location='admin.php?page=info_sekolah';</script>";
                                                }
                                                else {
                                                    echo "<br><div class='error-box round'>Maaf, gambar yang diunggah gagal terupload. Silahkan cek kembali file tujuan.</div>";
                                                }
                                            }
                                        }
                                        