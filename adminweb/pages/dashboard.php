<?php
$jml_team           = $fquery->jumlah_team();
$jml_member         = $fquery->jumlah_member();
$jml_berita         = $fquery->jumlah_berita_publish();
$jml_unberita         = $fquery->jumlah_berita_unpublish();
$jml_draft          = $fquery->jumlah_draft();
$ultah_team         = $fquery->ultah_team($tanggal);
$ultah_member       = $fquery->ultah_team($tanggal);
$jml_ultah_team     = mysql_num_rows($ultah_team);
$jml_ultah_member   = mysql_num_rows($ultah_member);
?>
                            <div class="half-size-column fl">
					<div class="content-module">
						<div class="content-module-heading cf">
							<h3 class="fl">Selamat Datang</h3>
							<span class="fr expand-collapse-text">Collapse</span>
							<span class="fr expand-collapse-text initial-expand">Expand</span>
						</div> <!-- end content-module-heading -->
						<div class="content-module-main">
                                                    <h1>Hello, <?php echo $login['first_name'].' '.$login['last_name'];?></h1><br>
                                                    <p style="text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Selamat datang dihalaman control panel website. 
                                                            Konten web ini tidak boleh ada atau mengandung unsur fornografi atau unsur SARA yaitu 
                                                            Suku Agama Ras dan Antar Golongan atau plagiat.
                                                        </p>
                                                        <div class="stripe-separator"><!-- --></div>
							<h1>Informasi web :</h1><br>
                                                            <div class="confirmation-box">
                                                                Ada <b><?php echo $jml_berita; ?></b> berita yang sudah di publikasikan.
                                                            </div>
                                                            <div class="confirmation-box">
                                                                Ada <b><?php echo $jml_unberita; ?></b> berita yang belum di publikasikan.
                                                            </div>
                                                            <div class="confirmation-box">
                                                                Ada <b><?php echo $jml_draft; ?></b> draft berita.
                                                            </div>
						</div> <!-- end content-module-main -->
					</div> <!-- end content-module -->
				</div> <!--end half-size-column-->
				<div class="half-size-column fr">
					<div class="content-module">
						<div class="content-module-heading cf">
							<h3 class="fl">Komentar Terbaru</h3>
							<span class="fr expand-collapse-text">Collapse</span>
							<span class="fr expand-collapse-text initial-expand">Expand</span>
						
						</div> <!-- end content-module-heading -->
						<div class="content-module-main cf">
                                                    <?php
                                            if($_SESSION['level']=='admin') {
                                                $total     = $fquery->jumlah_komentar();
                                            }
                                            else {
                                                $total     = $fquery->jumlah_komentar_id_team($_SESSION['id_team']);
                                            }
                                            if($_SESSION['level']=='admin') {
                                                $noconfirm = $fquery->jumlah_komentar_noconfirm();
                                            }
                                            else {
                                                $noconfirm = $fquery->jumlah_komentar_id_team_noconfirm($_SESSION['id_team']);
                                            }
                                            if($total > 0) {
                                                
                                            echo "<div class='information-box'>
                                                    Ada $total orang yang berkomentar pada berita yang telah dipublikasikan. 
                                                  </div>";
                                            if($noconfirm > 0) {
                                            echo "<div class='confirmation-box'>
                                                 Ada $noconfirm komentar yang belum dikonfirmasi untuk dipublikasikan.
                                                  </div>";
                                            }
                                            else {
                                                echo "<div class='confirmation-box'>
                                                 Semua komentar telah dikonformasi.
                                                  </div>";
                                            }
                                            }
                                            else {
                                                    
                                            echo "<div class='warning-box'>
                                                    Belum ada komentar. 
                                                  </div> ";
                                            }
                                            ?>	
						</div> <!-- end content-module-main -->
					</div> <!-- end content-module -->
					<div class="content-module">
						<div class="content-module-heading cf">
							<h3 class="fl">Informasi User</h3>
							<span class="fr expand-collapse-text">Collapse</span>
							<span class="fr expand-collapse-text initial-expand">Expand</span>
						</div> <!-- end content-module-heading -->						
						<div class="content-module-main cf">
                                                            <div class="information-box">
                                                                Saat ini telah ada <b><?php echo $jml_team; ?></b> team developer bergabung.
                                                            </div>
                                                            <div class="information-box">
                                                                 Saat ini telah ada <b><?php echo $jml_member; ?></b> member forum yang bergabung.
                                                            </div>							
						</div> <!-- end content-module-main -->
					</div> <!-- end content-module -->
				</div> <!--end half-size-column-->
