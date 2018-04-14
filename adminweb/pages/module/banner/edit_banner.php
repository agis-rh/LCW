<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Edit Banner</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					<?php
                                        $id_banner  = $_GET['id_banner'];
                                        $data       = $fquery->get_one_banner($id_banner);
                                        ?>
					<div class="content-module-main">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <fieldset>
									<p>
										<label for="full-width-input">Nama situs</label>
                                                                                <input value="<?php echo $data['keterangan'];?>" type="text" required maxlength="150"  name="judul" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama situs atau keterangan.</em>								
									</p><br>
	
									<p>
                                                                        <label for="textarea">alamat situs</label>
                                                                        <input value="<?php echo $data['alamat'];?>" type="text"  name="alamat" id="full-width-input" class="default-width-input form-control"/>
									</p><br>
                                                                        <?php
                                                                        if($data['gambar']!='') { ?>
                                                                        <img src="../photos/banner/<?php echo $data['gambar'];?>" width="50%"><br><br>
                                                                        <?php
                                                                        }
                                                                        else {
                                                                            echo "<p><b style='color:red;'>Tidak ada gambar banner</b></p><br>";
                                                                        }
                                                                        ?>
                                                                        <p>
                                                                        <p>
										<label for="full-width-input">Ganti Gambar Banner</label>
                                                                                <input type="file" name="gambar" class="default-width-input form-control"/>
										<em>Format gambar (*.jpg, *.gif, *.png).</em>								
									</p><br>
                                                                        <p>
										<label>Status</label>
                                                                               <?php
                                                                                if($data['publish']=='Y') { ?>
                                                                                <label class="alt-label"><input value="Y" checked required name="aktif" type="radio"/>Banner aktif</label>
                                                                                <label class="alt-label"><input value="N" required name="aktif" type="radio"/>Banner Tidak Aktif</label>
                                                                                <?php }
                                                                                else { ?>
                                                                                <label class="alt-label"><input value="Y" required name="aktif" type="radio"/>Banner aktif</label>
                                                                                <label class="alt-label"><input value="N" checked required name="aktif" type="radio"/>Banner Tidak Aktif</label>
                                                                                <?php } ?>
									</p>
                                                                        
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
                                        $aktif      = $_POST['aktif'];
                                        
                                        $file       = $_FILES['gambar']['tmp_name'];
                                        $filename   = $_FILES['gambar']['name'];
                                        $dir        = "../photos/banner/";
                                        $ok         = $dir.$filename;
                                        
                                        if($_POST['save']) {
                                            $id_team    = $_SESSION['id_team'];
                                            $tanggal    = date("Y-m-d");
                                            $jam        = date("H:i:s");
                                            if(empty($file)) {
                                                $fquery->add_log_team($id_team,'Mengubah banner web',$tanggal,$jam);
                                                $fquery->edit_banner($alamat,$judul,$aktif,$id_banner);
                                                echo "<script>window.location='admin.php?page=banner';</script>";
                                            }
                                            else {
                                                $get_one = $fquery->get_one_banner($id_banner);
                                                if($get_one['gambar']!='') {
                                                    unlink("../photos/banner/$get_one[gambar]");
                                                }
                                                if(move_uploaded_file($file, $ok)) {
                                                    $fquery->add_log_team($id_team,'Mengubah banner web',$tanggal,$jam);
                                                    $fquery->edit_gambar_banner($alamat,$filename,$judul,$aktif,$id_banner);
                                                    echo "<script>window.location='admin.php?page=banner';</script>";
                                                }
                                                else {
                                                    echo "<br><div class='error-box round'>Maaf, gambar yang diunggah gagal terupload. Silahkan cek kembali file tujuan.</div>";
                                                }
                                            }
                                        }
                                        