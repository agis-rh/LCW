                            <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Data Berita</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
						 <form action="" method="POST">
						<table>
						
							<thead>
						
								<tr>
                                                                    <th width="30">#</th>
                                                                    <th width="20"><i class="fa fa-check"></i></th>
									<th width="200">Judul</th>
									<th>Kategori</th>
                                                                        <th>Tanggal</th>
									<th>Publish</th>
									<th>Actions</th>
								</tr>
							
							</thead>
	
							
							<tbody>
                                                            <?php
                                                            $batas  = $general['batas_paging_admin'];
                                                            $posisi = $paging->cariPosisi($batas);
                                                            if($_SESSION['level']=='admin') {
                                                                $data   = $fquery->paging_berita($posisi,$batas);
                                                            }
                                                            else {
                                                                $data   = $fquery->paging_berita_id_team($posisi,$batas,$_SESSION['id_team']);
                                                            }
                                                            $no     = $posisi+1;
                                                            foreach ($data as $row) {
                                                                echo "<tr><td>$no.</td>
                                                                    <td><input type='checkbox' name='cek[]' id='id-$no' value='$row[id_berita]'></td>
									<td>$row[judul]</td>
                                                                        <td>$row[nama]</td>    
									<td>".tanggal($row['tanggal'])."</td>
                                                                            <td>$row[publish]</td>
									<td>"; 
                                                                ?>
										<a href='admin.php?page=berita&aksi=edit&id_berita=<?php echo $row['id_berita'];?>' class='table-actions-button ic-table-edit'></a>
                                                                                <a onclick='window.confirm("Anda yakin ingin menghapus data ini ?");' href='admin.php?page=berita&aksi=hapus&id_berita=<?php echo $row['id_berita'];?>' class='table-actions-button ic-table-delete'></a>
									<?php echo "</td>
                                                                    </tr>   ";
                                                                        $no++;
                                                            }
                                                            ?>
							</tbody>
							<tfoot>
                                                            <tr><td colspan="5" class="table-footer">
								
                                                                    
                                                                        <?php
                                                                        $active     = "berita";
                                                                        $page       = $_GET['halaman'];
                                                                        if($_SESSION['level']=='admin') {
                                                                            $jml_data   = $fquery->jumlah_berita();
                                                                        }
                                                                        else {
                                                                            $jml_data   = $fquery->jumlah_berita_id_team($_SESSION['id_team']);
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
                                                            <tr>
								
									<td colspan="5" class="table-footer">
										
                                                                            <input type="submit" name="delete_cek" value="Hapus data yang ditandai" class="round button dark text-upper small-button">	
                                                                                <a href="admin.php?page=berita&aksi=add_berita" class="round button blue text-upper small-button">Tambah Berita</a>	
	
									</td>
									
								</tr>
							
							</tfoot>
							
						</table>
                                                 </form>
					
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->

                                <?php
                                $id_team    = $_SESSION['id_team'];
                                    $tanggal    = date("Y-m-d");
                                    $jam        = date("H:i:s");
                                if($_GET['aksi']=='hapus') {
                                    $id_berita  = $_GET['id_berita'];
                                    $data       = $fquery->get_one_berita($id_berita);
                                    if($data['gambar']!='') {
                                        unlink("../photos/berita/$data[gambar]");
                                        $fquery->hapus_berita($id_berita);
                                        $fquery->add_log_team($id_team,'Menghapus data berita',$tanggal,$jam);
                                        echo "<script>window.location='admin.php?page=berita';</script>";
                                    }
                                    else {
                                        $fquery->hapus_berita($id_berita);
                                        $fquery->add_log_team($id_team,'Menghapus data berita',$tanggal,$jam);
                                        echo "<script>window.location='admin.php?page=berita';</script>";
                                    }
                                }
                                
                                  else if($_POST['delete_cek']) {
                                    $cekid  =   $_POST['cek'];
                                    if(count($cekid) < 1) {
                                        echo "<br><div class='error-box round'>
                                                      Tidak ada data berita yang dipilih untuk dihapus.</div>";
                                    }
                                    else {
                                        $cekid  =   $_POST['cek'];
                                        $jumlah =   count($cekid);
                                        for($i=0;$i<count($cekid);$i++) {
                                            
                                            $data       = $fquery->get_one_berita($cekid[$i]);
                                            if($data['gambar']!='') {
                                                unlink("../photos/berita/$data[gambar]");
                                                $fquery->hapus_berita($cekid[$i]);
                                                $fquery->add_log_team($id_team,"Menghapus ".$jumlah." data berita",$tanggal,$jam);
                                                echo "<script>window.location='admin.php?page=berita';</script>";
                                            }
                                            else {
                                                $fquery->hapus_berita($cekid[$i]);
                                                $fquery->add_log_team($id_team,"Menghapus ".$jumlah." data berita",$tanggal,$jam);
                                                echo "<script>window.location='admin.php?page=berita';</script>";
                                            }
                                            
                                            
                                        }
                                    }
                                }