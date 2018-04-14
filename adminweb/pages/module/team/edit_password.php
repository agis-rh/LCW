<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Change Password</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
                                                                   <?php
                                        $id_team    = $_SESSION['id_team'];
                                        $old        = anti_injection(md5($_POST['old']));
                                        $new        = anti_injection(md5($_POST['new']));
                                        $confirm    = anti_injection(md5($_POST['confirm']));
                                        $tanggal    = date("Y-m-d");
                                        $jam        = date("H:i:s");
                                        $password   = anti_injection(md5($_POST['new']));
                                        if($_POST['save']) {
                                            $cek_password = $fquery->cek_password_team($old,$id_team);
                                            if($cek_password > 0) {
                                                if($new==$confirm) {
                                                    $fquery->add_log_team($id_team,'Mengubah akun password lamanya',$tanggal,$jam);
                                                    $fquery->edit_password_team($password,$id_team);
                                                    echo "<div class='confirmation-box'>"
                                                . "<b>Terima kasih,</b> Password anda telah berhasil diganti."
                                                        . "</div>";
                                                }
                                                else {
                                                    echo "<div class='error-box'>"
                                                . "Password baru yang anda masukan tidak cocok, silahkan konfirmasi password baru anda dengan benar."
                                                        . "</div>";
                                                }
                                            }
                                            else {
                                                echo "<div class='error-box'>"
                                                . "Password lama anda salah, silahkan cek dan coba kembali."
                                                        . "</div>";
                                            }
                                        }
                                        ?>
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <fieldset>
									<p>
										<label for="full-width-input">Old Password</label>
                                                                                <input placeholder="Password saat ini" type="password" required maxlength="150" name="old" id="full-width-input" class="default-width-input form-control"/>
                                                                                <em></em>
										
									</p>
                                                                        <p>
										<label for="full-width-input">New Password</label>
                                                                                <input placeholder="Password baru" type="password" required maxlength="150"  name="new" id="full-width-input" class="default-width-input form-control"/>	
                                                                                <em></em>
									</p>
                                                                        <p>
										<label for="full-width-input">Re-type password</label>
                                                                                <input type="password" required maxlength="150" placeholder="Konfirmasi password" name="confirm" id="full-width-input" class="default-width-input form-control"/>
                                                                                <em></em>
									</p>
										
									<div class="stripe-separator"><!--  --></div>
	                                                                        	
                                                                        <input type="submit" name="save" value="Save" class="round blue ic-right-arrow" />
                                                                        <a href="javascript:;" onclick="self.history.back()" class="button round dark" />Kembali</a>
                                                                        
									
                                               
                                                </fieldset>
                                            </form>
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->

                 