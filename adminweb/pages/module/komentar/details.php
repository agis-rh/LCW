                        <?php
                        $id_komentar   = $_GET['id_komentar'];
                        $data          = $fquery->get_one_komentar($id_komentar);
                        $berita        = $fquery->get_one_berita($data['id_berita']);
                        ?>
                        <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Balas Komentar</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
						
                                            
                                                    
                                                    
                                                    <h1>Informasi Pengirim :</h1>
                                                    <br>
                                                    <p>Nama lengkap : <?php echo $data['komentator'];?></p>
                                                    <p>Email pengirim : <?php echo $data['email'];?></p>
                                                    <p>Pada tanggal <?php echo tanggal($data['tanggal'])." pukul ".$data['waktu']."";?></p>
                                                    <br>
                                                    <p>Berkomentar pada artikel dengan judul <b><?php echo $berita['judul'];?></b></p>
                                                    <p>
                                                        Isi komentar : <span style="color: blue;"><?php echo $data['isi'];?></span>
                                                    </p>
                                                    <br>
								
                                                    <?php
                                                    $jumbalas  = $fquery->jumlah_balas_komentar($data['id_komentar']);
                                                    if($jumbalas > 0) {
                                                        $balas = $fquery->show_balas_komentar($id_komentar);
                                                        foreach ($balas as $value) {
                                                            echo "<p>Isi balas komentar : <span style='color:orange'>$value[konten]</span></p>";
                                                            echo "<p>Pada tanggal ".tanggal($value[tanggal])." pukul $value[waktu]</p>";
                                                            echo "<a class='round button blue text-upper small-button' "
                                                            . "href='admin.php?page=komentar&aksi=details&hapus_balas=ya&id_balas=$value[id_balas]&id_komentar=$value[id_komentar]'>Hapus balasan</a><br><br>";
                                                            
                                                        }
                                                    }
                                                    else {
                                                        echo "<p><b style='color:red;'>Komentar belum dibalas</b></p>";
                                                    }
                                                    ?>
                                                    <br>
                                                    <br>
                                                    <form action="" method="POST">
                                                    <fieldset>
									<p>
										<label for="textarea">Balas Komentar Untuk <?php echo $data['komentator'];?></label>
                                                                                <textarea rows="5" placeholder="Masukan teks keterangan disini......." name="konten" class="full-width-textarea form-control"></textarea>
									</p>
                                                                        									
									<div class="stripe-separator"><!--  --></div>
	                                                                        	
                                                                        <input type="submit" name="save" value="Kirim" class="round blue ic-right-arrow" />
                                                                        <a href="javascript:;" onclick="self.history.back()" class="button round dark" />Kembali</a>
                                                                        
									
                                               
                                                </fieldset>
                                            </form>
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->

                                        <?php
                                        $idkomentar  = $__GET['id_komentar'];
                                        $konten      = $_POST['konten'];
                                        
                                        if($_POST['save']) {
                                            $id_team    = $_SESSION['id_team'];
                                            $tanggal    = date("Y-m-d");
                                            $jam        = date("H:i:s");
                                            $fquery->add_log_team($id_team,'Membalas komentar pengunjung',$tanggal,$jam);
                                            $fquery->add_balas_komentar($id_komentar,$konten,$tanggal,$jam);
                                            echo "<script>window.location='admin.php?page=komentar&aksi=details&id_komentar=$_GET[id_komentar]';</script>";
                                        }
                                        else if($_GET['page']=='komentar' && $_GET['aksi']=='details' && $_GET['hapus_balas']=='ya') {
                                            $fquery->hapus_balas_komentar($_GET['id_balas']);
                                            echo "<script>window.location='admin.php?page=komentar&aksi=details&id_komentar=$_GET[id_komentar]';</script>";
                                        }
                                        