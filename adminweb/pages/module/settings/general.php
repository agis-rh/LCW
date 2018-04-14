<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Pengaturan Umum Web</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
                                            <?php
                                            $data = $fquery->get_one_setting();
                                            ?>
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                
                                                <fieldset>
                                                                        <p>
										<label for="full-width-input">Nama Website</label>
                                                                                <input value="<?php echo $data['nama_web']; ?>" type="text" placeholder="Website name" required  name="nama" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama atau judul web.</em>								
                                                                        </p><br>
                                                                        <p>
										<label for="full-width-input">Web e-mail</label>
                                                                                <input value="<?php echo $data['email_web']; ?>" type="email" placeholder="Website e-mail" required  name="email" id="full-width-input" class="default-width-input form-control"/>
										<em>E-mail web.</em>								
                                                                        </p><br>
                                                                        <p>
                                                                            <label for="full-width-input">Call Center </label>
                                                                            <input value="<?php echo $data['phone_number']; ?>" type="text" placeholder="Nomor Pusat" required  name="phone" id="full-width-input" class="default-width-input form-control"/>
										<em>Phone Number.</em>								
                                                                        </p><br>
                                                                        <p>
										<label for="full-width-input">Meta Keyword</label>
                                                                                <input value="<?php echo $data['meta_keyword']; ?>" type="text" placeholder="Meta keyword" required  name="keyword" id="full-width-input" class="default-width-input form-control"/>
										<em>Kata kunci website untuk SEO.</em>								
                                                                        </p><br>
                                                                        <p>
										<label for="full-width-input">Meta description</label>
                                                                                <textarea placeholder="Meta description" required  name="deskripsi" id="full-width-input" class="default-width-input form-control"><?php echo $data['meta_deskripsi']; ?></textarea>
										<em>Deskripsi website untuk SEO .</em>								
                                                                        </p><br>
									<p>
										<label for="full-width-input">Alamat Situs</label>
                                                                                <input value="<?php echo $data['domain']; ?>" type="text" placeholder="Example www.domain.com" required maxlength="150" name="domain" id="full-width-input" class="default-width-input form-control"/>
										<em>Alamat situs atau website saat ini.</em>								
                                                                        </p><br>
	

                                                                        <p>
										<label for="full-width-input">Favicon web</label>
                                                                                <input type="file" name="gambar" class="default-width-input form-control"/>
										<em>Format gambar (*.jpg, *.gif, *.png).</em>								
                                                                        </p><br>
                                                                        <p >
										<label>Pengaturan Komentar</label>
                                                                                <?php
                                                                                if($data['filter_komentar']=='Y') { ?>
                                                                                <label style="color: #0080FF" class="alt-label"><input value="Y"  checked required name="filter" type="radio"/>
                                                                                    Filter komentar secara otomatis, setiap komentar harus dikonfirmasi terlebih dahulu sebelum dipublikasikan.</label>
                                                                                <label class="alt-label"><input value="N" required name="filter" type="radio"/>
                                                                                    Tanpa filter komentar secara otomatis, setiap komentar akan langsung dipublikasikan.</label>
                                                                                <?php }
                                                                                else { ?>
                                                                                <label class="alt-label"><input value="Y" required name="filter" type="radio"/>
                                                                                    Filter komentar secara otomatis, setiap komentar harus dikonfirmasi terlebih dahulu sebelum dipublikasikan.</label>
                                                                                <label style="color: #0080FF" class="alt-label"><input value="N"  checked required name="filter" type="radio"/>
                                                                                    Tanpa filter komentar secara otomatis, setiap komentar akan langsung dipublikasikan.</label>
                                                                                <?php } ?>
                                                                        </p><br>
                                                                        <p>
										<label for="full-width-input">Batas Data Halaman Admin</label>
                                                                                <input value="<?php echo $data['batas_paging_admin']; ?>" type="text" required style="width: 30px" maxlength="2" name="paging_admin" class="default-width-input form-control"/>
										
										<em>Batas halaman ini untuk membuat link halaman setiap data di administrator. Contoh hal 1, 2, 3</em>								
									</p><br>
                                                                        <p>
										<label for="full-width-input">Batas Data Halaman Homepage</label>
                                                                                <input value="<?php echo $data['batas_paging_homepage']; ?>" type="text" required style="width: 30px" maxlength="2" name="paging_home" class="default-width-input form-control"/>
										
										<em>Batas halaman ini untuk membuat link halaman setiap data di homepage. Contoh hal 1, 2, 3</em>								
									</p>
							 
									<div class="stripe-separator"><!--  --></div>
	                                                                        	
                                                                        <input type="submit" name="save" value="Save" class="round blue ic-right-arrow" />
                                                                        <a href="javascript:;" onclick="self.history.back()" class="button round dark" />Kembali</a>
                                                                        
									
                                               
                                                </fieldset>
                                            </form>
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->

                                        <?php
                                        $nama       = $_POST['nama'];
                                        $email      = $_POST['email'];
                                        $phone      = $_POST['phone'];
                                        $keyword    = $_POST['keyword'];
                                        $deskripsi  = $_POST['deskripsi'];
                                        $domain     = $_POST['domain'];
                                        $filter     = $_POST['filter'];
                                        $admin      = $_POST['paging_admin'];
                                        $homepage   = $_POST['paging_home'];
                                        
                                        $file       = $_FILES['gambar']['tmp_name'];
                                        $filename   = $_FILES['gambar']['name'];
                                        $dir        = "../photos/favicon/";
                                        $ok         = $dir.$filename;
                                        
                                        if($_POST['save']) {
                                            $id_team    = $_SESSION['id_team'];
                                            $tanggal    = date("Y-m-d");
                                            $jam        = date("H:i:s");
                                            if(empty($file)) {
                                                $fquery->add_log_team($id_team,'Memperbaharui pengaturan umum web',$tanggal,$jam);
                                                $fquery->edit_setting($nama,$email,$phone,$keyword,$deskripsi,$domain,$filter,$admin,$homepage);
                                                echo "<script>window.location='admin.php?page=general';</script>";
                                            }
                                            else {
                                                if(move_uploaded_file($file, $ok)) {
                                                    $fquery->add_log_team($id_team,'Memperbaharui pengaturan umum web',$tanggal,$jam);
                                                    $fquery->edit_favicon($nama,$email,$phone,$keyword,$deskripsi,$domain,$filename,$filter,$admin,$homepage);
                                                    echo "<script>window.location='admin.php?page=general';</script>";
                                                }
                                                else {
                                                    echo "<br><div class='error-box round'>Maaf, gambar yang diunggah gagal terupload. Silahkan cek kembali file tujuan.</div>";
                                                }
                                            }
                                        }