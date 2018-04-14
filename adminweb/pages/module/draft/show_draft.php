                            <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Data Draft Berita</h3>
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
									<th>Waktu</th>
									<th>Actions</th>
								</tr>
							
							</thead>
	
							
							<tbody>
                                                            <?php
                                                            $batas  = $general['batas_paging_admin'];
                                                            $posisi = $paging->cariPosisi($batas);
                                                            $no     = $posisi=1;
                                                            if($_SESSION['level']=='admin') {
                                                                $data   = $fquery->paging_draft($posisi,$batas);
                                                            }
                                                            else {
                                                                $data   = $fquery->paging_draft_id_team($posisi,$batas,$_SESSION['id_team']);
                                                            }
                                                            foreach ($data as $row) {
                                                                echo "<tr><td>$no.</td>
                                                                    <td><input type='checkbox' name='cek[]' id='id-$no' value='$row[id_draft]'></td>
									<td>$row[judul]</td>
									<td>".tanggal($row['tanggal'])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['waktu']." WIB</td>
                                                                            
									<td>"; 
                                                                ?>
										<a href='admin.php?page=draft&aksi=edit&id_draft=<?php echo $row['id_draft'];?>' class='table-actions-button ic-table-edit'></a>
                                                                                <a onclick='window.confirm("Anda yakin ingin menghapus data ini ?");' href='admin.php?page=draft&aksi=hapus&id_draft=<?php echo $row['id_draft'];?>' class='table-actions-button ic-table-delete'></a>
									<?php echo "</td>
                                                                    </tr>   ";
                                                                        $no++;
                                                            }
                                                            ?>
							</tbody>
							<tfoot>
                                                            <tr><td colspan="5" class="table-footer">
								
                                                                    
                                                                        <?php
                                                                        $active     = "draft";
                                                                        $page       = $_GET['halaman'];
                                                                        if($_SESSION['level']=='admin') {
                                                                            $jml_data   = $fquery->jumlah_draft();
                                                                        }
                                                                        else {
                                                                            $jml_data   = $fquery->jumlah_draft_id_team($_SESSION['id_team']);
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
										
                                                                            <input type="submit" name="delete_cek" value="Hapus data yanng ditandai" class="round button dark text-upper small-button">	
	
                                                                                
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
                                    $id_draft  = $_GET['id_draft'];
                                    $data       = $fquery->get_one_draft($id_draft);
                                    if($data['gambar']!='') {
                                        unlink("../photos/berita/$data[gambar]");
                                        $fquery->hapus_draft($id_draft);
                                        echo "<script>window.location='admin.php?page=draft';</script>";
                                    }
                                    else {
                                        $fquery->hapus_draft($id_draft);
                                        echo "<script>window.location='admin.php?page=draft';</script>";
                                    }
                                }
                                
                                 else if($_POST['delete_cek']) {
                                    $cekid  =   $_POST['cek'];
                                    if(count($cekid) < 1) {
                                        echo "<br><div class='error-box round'>
                                                      Tidak ada data draft berita yang dipilih untuk dihapus.</div>";
                                    }
                                    else {
                                        $cekid  =   $_POST['cek'];
                                        $jumlah =   count($cekid);
                                        for($i=0;$i<count($cekid);$i++) {
                                            
                                            $data       = $fquery->get_one_draft($cekid[$i]);
                                            if($data['gambar']!='') {
                                                unlink("../photos/berita/$data[gambar]");
                                                $fquery->hapus_draft($cekid[$i]);
                                                $fquery->add_log_team($id_team,"Menghapus ".$jumlah." data draft berita",$tanggal,$jam);
                                                echo "<script>window.location='admin.php?page=draft';</script>";
                                            }
                                            else {
                                                $fquery->hapus_draft($cekid[$i]);
                                                $fquery->add_log_team($id_team,"Menghapus ".$jumlah." data draft berita",$tanggal,$jam);
                                                echo "<script>window.location='admin.php?page=draft';</script>";
                                            }
                                            
                                            
                                        }
                                    }
                                }