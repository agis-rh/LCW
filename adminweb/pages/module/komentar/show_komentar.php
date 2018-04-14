
                            <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Daftar Data Komentar</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
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
                                            echo "<div class='information-box'>
                                                    Ada $total orang yang berkomentar pada berita yang telah dipublikasikan. 
                                                  </div> ";
                                            
                                            if($noconfirm > 0) {
                                            echo "<div class='confirmation-box'>
                                                 Ada $noconfirm komentar yang belum dikonfirmasi untuk dipublikasikan.
                                                  </div>";
                                            }
                                            else {
                                                echo "";
                                            }
                                            ?>
                                            <form action="" method="POST">
						<table>
						
							<thead>
						
                                                            <tr><th width="60"><i class="fa fa-check"></i> No.</th>
									<th>Nama Lengkap</th>
									<th>Judul Berita</th>
                                                                        <th>Waktu</th>
                                                                        <th>Publish</th>
                                                                        <th>Actions</th>
                                                                        
                                                                        
								</tr>
							
							</thead>
	
							
							<tbody>
                                                            <?php
                                                            $batas  = $general['batas_paging_admin'];
                                                            $posisi = $paging->cariPosisi($batas);
                                                            $no     = $posisi+1;
                                                            if($_SESSION['level']=='admin') {
                                                                $info = $fquery->paging_komentar($posisi,$batas);
                                                            }
                                                            else {
                                                                $info = $fquery->paging_komentar_id_team($posisi,$batas,$_SESSION['id_team']);
                                                            } 
                                                            foreach ($info as $row) {
                                                                echo "
                                                                    <tr><td>
                                                                    <input type='checkbox' name='cek[]' id='id-$no' value='$row[id_komentar]'>$no.</td>
                                                                            <td><a href='admin.php?page=komentar&aksi=details&id_komentar=$row[id_komentar]'>$row[komentator]</a></td>
                                                                            <td>$row[judul]</td>
                                                                            <td>".  tanggal($row['tanggal'])."</td> 
                                                                            <td>".$row['publish']."</td> 
                                                                                
                                                                            <td>
                                                                                    <a href='admin.php?page=komentar&aksi=confirm&id_komentar=$row[id_komentar]' class='table-actions-button'><i class='fa fa-check'></i></a>
                                                                                    <a href='admin.php?page=komentar&aksi=hapus&id_komentar=$row[id_komentar]' class='table-actions-button ic-table-delete'></a>
                                                                            </td>
                                                                    </tr>	";
                                                                $no++;
                                                            }
                                                            ?>
							</tbody>
                                                        
							<tfoot>
                                                            <tr><td colspan="5" class="table-footer">
                                                                        <?php
                                                                        $active     = "komentar";
                                                                        $page       = $_GET['halaman'];
                                                                        if($_SESSION['level']=='admin') {
                                                                            $jml_data   = $fquery->jumlah_komentar();
                                                                        }
                                                                        else {
                                                                            $jml_data   = $fquery->jumlah_komentar_id_team($_SESSION['id_team']);
                                                                        }
                                                                        $jml_page   = $paging->jumlahPage($jml_data,$batas);
                                                                        $link       = $paging->linkHalaman($page,$jml_page,$active);
                                                                        echo $link;
                                                                        ?>
                                                                </td>
                                                            </tr>
							
								<tr>
                                                                <td colspan="5" class="table-footer">
                                                                    <label class="alt-label">
                                                                        <input name="pilih" type="radio"
                                                                               onclick="for(i=1;i<=<?php echo $no;?>;i++){document.getElementById('id-'+i).checked=true;}"/>
                                                                        Tandai semua
                                                                    </label>
                                                                     <label class="alt-label">
                                                                         <input name="pilih" type="radio"
                                                                                onclick="for(i=1;i<=<?php echo $no;?>;i++){document.getElementById('id-'+i).checked=false;}"/>
                                                                        Hapus semua yang ditandai
                                                                    </label>
                                                                </td>
                                                            </tr>
								
									<td colspan="5" class="table-footer">
									    <input type="submit" name="publish_cek" class="round button dark text-upper small-button" onclick="window.confirm('Hapus data berita yang ditandai ?')" value="Publikasikan komentar">	                                             
                                                                            <input type="submit" name="unpublish_cek" class="round button dark text-upper small-button" onclick="window.confirm('Hapus data berita yang ditandai ?')" value="Jangan publikasikan komentar">	                                             
                                                                            <input type="submit" name="delete_cek" class="round button dark text-upper small-button" onclick="window.confirm('Hapus data berita yang ditandai ?')" value="Hapus data">	                                                                                
									</td>
									
								</tr>
							
							</tfoot>
							
						</table>
                                            </form>
					
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
                                
                                <?php
                                $id_komentar    = $_GET['id_komentar'];
                                if($_GET['aksi']=='hapus') {
                                        $fquery->hapus_komentar($id_komentar);
                                        echo "<script>window.location='admin.php?page=komentar';</script>";
                                }
                                else if($_GET['aksi']=='confirm') {
                                        $fquery->publish_komentar($id_komentar);
                                        echo "<script>window.location='admin.php?page=komentar';</script>";
                                }
                                else if($_POST['delete_cek']) {
                                    $cekid  =   $_POST['cek'];
                                    if(count($cekid) < 1) {
                                        echo "<br><div class='error-box round'>
                                                      Tidak ada data komentar berita yang dipilih untuk dihapus.</div>";
                                    }
                                    else {
                                        $cekid  =   $_POST['cek'];
                                        for($i=0;$i<count($cekid);$i++) {
                                            $fquery->hapus_komentar($cekid[$i]);
                                            echo "<script>window.location='admin.php?page=komentar';</script>";
                                        }
                                    }
                                }
                                else if($_POST['publish_cek']) {
                                    $cekid  =   $_POST['cek'];
                                    if(count($cekid) < 1) {
                                        echo "<br><div class='error-box round'>
                                                      Tidak ada data komentar berita yang dipilih untuk dipublikasikan.</div>";
                                    }
                                    else {
                                        $cekid  =   $_POST['cek'];
                                        for($i=0;$i<count($cekid);$i++) {
                                            $fquery->publish_komentar($cekid[$i]);
                                            echo "<script>window.location='admin.php?page=komentar';</script>";
                                        }
                                    }
                                }
                                
                                else if($_POST['unpublish_cek']) {
                                    $cekid  =   $_POST['cek'];
                                    if(count($cekid) < 1) {
                                        echo "<br><div class='error-box round'>
                                                      Tidak ada data komentar berita yang dipilih untuk tidak dipublikasikan.</div>";
                                    }
                                    else {
                                        $cekid  =   $_POST['cek'];
                                        for($i=0;$i<count($cekid);$i++) {
                                            $fquery->unpublish_komentar($cekid[$i]);
                                            echo "<script>window.location='admin.php?page=komentar';</script>";
                                        }
                                    }
                                }

