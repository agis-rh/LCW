<?php
$id_bukutamu = $_GET['id_bukutamu'];
$fquery->edit_noread_bukutamu($id_bukutamu);
?>
<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">PESAN</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					<?php
                                        $data   = $fquery->read_bukutamu($id_bukutamu);
                                        ?>
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">
						
							<form action="#">
							
								<fieldset>
                                                                    <h1>Informasi pengirim :</h1>
                                                                    <div class="stripe-separator"></div>
									<p>Nama lengkap : 
										<label for="simple-input"><?php echo $data['nama']. "$data[last_name]";?></label>
									</p>
                                                                        <br>
                                                                        <p>E-mail : 
										<label for="simple-input"><?php echo $data['email'];?></label>
									</p>
                                                                        <br>
									<p>
                                                                            Website :
                                                                            <label for="full-width-input"><?php echo $data['situs'];?></label>
											
                                                                        </p>
                                                                        <div class="stripe-separator"></div>
                                                                        <p>
                                                                            Tanggal kirim :
                                                                            <label><?php echo tanggal($data['tanggal']);?> pada pukul <?php echo $data['waktu'];?></label>
                                                                        </p>
                                                                       </fieldset>
							
							</form>
						
						</div> <!-- end half-size-column -->
						
						<div class="half-size-column fr">
						
							<form action="#">
							
								<fieldset>
                                                                    
									<p>
										
                                                                                <img src='../photos/messages.gif'>
									</p>
									
									<div class="stripe-separator"></div>
                                                                        <h2>SUBJEK :</h2><br>
								
									<p>
                                                                            <?php echo $data['subjek'];?>
										
                                                                        
                                                                        </p>
                                                                        <div class="stripe-separator"></div>
                                                                        <h2>ISI PESAN :</h2><br>
								
									<p>
                                                                            <?php echo $data['konten'];?>
										
                                                                        
                                                                        </p>
									<div class="stripe-separator"><!--  --></div>
	
                                                                       <a href="javascript:;" onclick="self.history.back()" class="button round blue" />
                                                                       <i class="fa fa-arrow-circle-left"></i> Kembali</a>
								</fieldset>
							
							</form>
							
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
	