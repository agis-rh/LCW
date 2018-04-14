<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Tambah Develover Team</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
						
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <fieldset>
									<p>
										<label for="full-width-input">First Name</label>
                                                                                <input type="text" required maxlength="150" name="first" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama depan.</em>								
									</p>
                                                                        <p>
										<label for="full-width-input">Last Name</label>
                                                                                <input type="text" maxlength="150" name="last" id="full-width-input" class="default-width-input form-control"/>
										<em>Nama belakang.</em>								
									</p>
                                                                        <p>
										<label for="full-width-input">Username</label>
                                                                                <input type="text" required maxlength="150" name="username" id="full-width-input" class="default-width-input form-control"/>
										<em>Username akan digunakan untuk login.</em>								
									</p>
                                                                        
                                                                        <p>
										<label for="full-width-input">Password</label>
                                                                                <input type="password" required maxlength="150" name="password" id="full-width-input" class="default-width-input form-control"/>
										<em>Password.</em>								
									</p>
                                                                        
                                                                        <p>
										<label for="full-width-input">E-mail</label>
                                                                                <input type="email" required maxlength="150" name="email" id="full-width-input" class="default-width-input form-control"/>
										<em>E-mail yang anda digunakan.</em>								
									</p><br>
                                                                        <p>
										<label>Jenis kelamin</label>
                                                                                
                                                                                <label class="alt-label"><input value="L" required name="gender" type="radio"/>Laki - Laki</label>
                                                                                <label class="alt-label"><input value="P" required name="gender" type="radio"/>Perempuan</label>
                                                                        </p><br>
									<p>
										<label for="textarea">Alamat</label>
                                                                                <textarea rows="15" placeholder="Masukan teks alamat disini......." name="alamat" class="full-width-textarea form-control"></textarea>
									</p>
                                                                        <p>
										<label for="full-width-input">Identitas Foto</label>
                                                                                <input type="file" name="gambar" class="default-width-input form-control"/>
										<em>Format gambar (*.jpg, *.gif, *.png).</em>								
									</p>
                                                                        <p>
										<label for="full-width-input">Tanggal Lahir</label>
                                                                                <input type="text" required placeholder="Contoh format tanggal : 1996-09-13"  maxlength="10" name="tgl_lahir" class="default-width-input form-control"/>
										
										<em>Tanggal lahir.</em>								
									</p>
                                                                        
                                                                        <p>
										<label for="full-width-input">No. Handphone</label>
                                                                                <input type="text" required placeholder="" name="no_hp" class="default-width-input form-control"/>
										
										<em>Nomor Handphone.</em>								
									</p>
                                                                        
                                                                        <p>
										<label for="full-width-input">Kategori Profesi</label>
                                                                                <select name="profesi" required class="default-width-input form-control"/>
                                                                                <option value="0">Uncategorized </option>
                                                                                <?php
                                                                                $profesi = $fquery->show_profesi();
                                                                                foreach($profesi as $row) {
                                                                                    echo "<option value='".$row['id_profesi']."'>$row[nama]";
                                                                                    echo "</option>";
                                                                                }
                                                                                ?>
                                                                                </select>
										<em>Pilih kategori profesi.</em>								
									</p>    
                                                                        
                                                                        <p>
										<label for="full-width-input">Level</label>
                                                                                <select name="level" required class="default-width-input form-control"/>
                                                                                <option value="user">User </option>
                                                                                <option value="admin">Administartor </option>
                                                                                
                                                                                </select>
										<em>Pilih level.</em>								
									</p>    
										
									<div class="stripe-separator"><!--  --></div>
	                                                                        	
                                                                        <input type="submit" name="save" value="Save" class="round blue ic-right-arrow" />
                                                                        <a href="javascript:;" onclick="self.history.back()" class="button round dark" />Kembali</a>
                                                                        
									
                                               
                                                </fieldset>
                                            </form>
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->

                                        <?php
                                        $first      = $_POST['first'];
                                        $last       = $_POST['last'];
                                        $username   = $_POST['username'];
                                        $password   = md5($_POST['password']);
                                        $profesi    = $_POST['profesi'];
                                        $email      = $_POST['email'];
                                        $gender     = $_POST['gender'];
                                        $tgl_lahir  = $_POST['tgl_lahir'];
                                        $alamat     = $_POST['alamat'];
                                        $no_hp      = $_POST['no_hp'];
                                        $level      = $_POST['level'];
                                        
                                        
                                        $file       = $_FILES['gambar']['tmp_name'];
                                        $filename   = $_FILES['gambar']['name'];
                                        $dir        = "../photos/users/";
                                        $ok         = $dir.$filename;
                                        
                                        if($_POST['save']) {
                                            $id_team    = $_SESSION['id_team'];
                                            $tanggal    = date("Y-m-d");
                                            $jam        = date("H:i:s");
                                            if(empty($file)) {
                                                $fquery->add_log_team($id_team,'Menambahkan data team developer',$tanggal,$jam);
                                                $fquery->add_team($first,$last,$username,$password,$profesi,$file,$email,$gender,$tgl_lahir,$alamat,$no_hp,$level);
                                                echo "<script>window.location='admin.php?page=team';</script>";
                                            }
                                            else {
                                                if(move_uploaded_file($file, $ok)) {
                                                    $fquery->add_log_team($id_team,'Menambahkan data team developer',$tanggal,$jam);
                                                    $fquery->add_team($first,$last,$username,$password,$profesi,$filename,$email,$gender,$tgl_lahir,$alamat,$no_hp,$level);
                                                    echo "<script>window.location='admin.php?page=team';</script>";
                                                }
                                                else {
                                                    echo "<br><div class='error-box round'>Maaf, gambar yang diunggah gagal terupload. Silahkan cek kembali file tujuan.</div>";
                                                }
                                            }
                                        }
                                        