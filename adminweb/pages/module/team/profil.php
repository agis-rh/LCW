<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Profil Saya</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					<?php
                                        $data   = $fquery->profil_team($_GET['id_team']);
                                        ?>
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">
						
							<form action="#">
							
								<fieldset>
                                                                    <h1>Informasi status :</h1>
                                                                    <div class="stripe-separator"></div>
									<p>Nama lengkap : 
										<label for="simple-input"><?php echo $data['first_name']. "$data[last_name]";?></label>
									</p>
                                                                        <br>
                                                                        <p>Jenis kelamin : 
                                                                            <?php
                                                                            if($data['gender']=='L') {
                                                                                $gender = "Laki-laki";
                                                                            }
                                                                            else {
                                                                                $gender = "Perempuan";
                                                                            }
                                                                            ?>
										<label for="simple-input"><?php echo $gender;?></label>
									</p>
                                                                        <br>
									<p>
                                                                            Tanggal lahir :
                                                                            <label for="full-width-input"><?php echo tanggal($data['tgl_lahir']);?></label>
											
                                                                        </p><br>
                                                                        <p>
                                                                            Alamat lengkap :
                                                                            <label for="full-width-input"><?php echo $data['alamat'];?></label>
											
                                                                        </p><br>
                                                                        <p>Profesi sebagai : 
										<label for="simple-input"><?php echo $data['nama'];?></label>
									</p>
                                                                        <div class="stripe-separator"></div>
                                                                        <h1>Informasi kontak :</h1><br>
                                                                        <p>E-mail pribadi : 
										<label for="simple-input"><?php echo $data['email']. "$data[last_name]";?></label>
									</p>
                                                                        <br>
									<p>
                                                                            Nomor Handphone :
                                                                            <label for="full-width-input"><?php echo $data['no_hp'];?></label>
											
                                                                        </p>
                                                                        
				</fieldset>
							
							</form>
						
						</div> <!-- end half-size-column -->
						
						<div class="half-size-column fr">
						
							<form action="#">
							
								<fieldset>
                                                                    
									<p>
										<label for="textarea">Foto Profil :</label>
                                                                                <?php
                                                                                if($data['image']=='') {
                                                                                   
                                                                                echo "<img src='../photos/foto.png' class='foto-profil'>";
                                                                                }
                                                                                else {
                                                                                    echo "<img src='../photos/users/$data[image]' class='foto-profil'>";
                                                                                }
                                                                                ?>
									</p>
									
									<div class="stripe-separator"></div>
                                                                        <h1>Informasi akun :</h1><br>
								
									<p>
                                                                            Level akun :
										<label><?php echo $data['level'];?></label>
										
                                                                        </p><br>
                                                                        <p>
                                                                            Login terakhir :
                                                                            <?php
                                                                            if($data['last_login']=='0000-00-00 00:00:00') {
                                                                                $tanggal = "<b style='color:red'>Belum pernah";
                                                                                $jam     = "login</b>";
                                                                            }
                                                                            else {
                                                                            $tanggal    = tanggal(substr($data['last_login'],0,10)).' Pada Pukul ';
                                                                            $jam        = substr($data['last_login'],11,19);
                                                                            }
                                                                            
                                                                            ?>
										<label><?php echo $tanggal.' '.$jam;?></label>
										
									</p>
	
									<div class="stripe-separator"><!--  --></div>
	
                                                                        <a href="admin.php?page=team&aksi=edit_profil&id_team=<?php echo $_GET['id_team'];?>" class="button round blue" /><i class="fa fa-pencil"></i> Edit Profil</a>
									
								</fieldset>
							
							</form>
							
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
	