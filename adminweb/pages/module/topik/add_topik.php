<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Tambah Kategori Berita</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
						
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <fieldset>
									<p>
										<label for="full-width-input">Nama kategori berita</label>
                                                                                <input type="text" required placeholder="Kategori berita . . . . ." name="judul" id="full-width-input" class="default-width-input form-control"/>
										<em>Isi nama kategori berita.</em>								
									</p>
	
									<p>
										<label for="textarea">Konten Berita</label>
                                                                                <textarea rows="15" placeholder="Masukan teks keterangan disini......." name="konten" class="full-width-textarea form-control"></textarea>
									</p>
                                                                        									
									<div class="stripe-separator"><!--  --></div>
	                                                                        	
                                                                        <input type="submit" name="save" value="Save" class="round blue ic-right-arrow" />
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
                                        if($_POST['save']) {
                                            $fquery->add_kategori($judul,$konten);
                                            $fquery->add_log_team($id_team,'Menambahkan data kategori berita',$tanggal,$jam);
                                            echo "<script>window.location='admin.php?page=kategori_berita';</script>";
                                        }
                                        ?>