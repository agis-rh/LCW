                            <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Data Kategori Profesi</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
                                            <form action="admin.php?page=profesi&aksi=multi_aksi" method="POST">
						<table>
						
							<thead>
						
								<tr>
                                                                    <th width="60"><i class="fa fa-check"></i> No.</th>
									<th width="200">Nama Profesi</th>
									<th>Keterangan</th>
									<th>Actions</th>
								</tr>
							
							</thead>
	
							
							<tbody>
                                                            <?php
                                                            $batas  = $general['batas_paging_admin'];
                                                            $posisi = $paging->cariPosisi($batas);
                                                            $no     = $posisi+1;
                                                            $data   = $fquery->paging_profesi($posisi,$batas);
                                                            foreach ($data as $row) {
                                                                echo "<tr>
                                                                    <td><input type='checkbox' name='cek[]' id='id-$no' value='$row[id_profesi]'>$no.</td>
									<td>$row[nama]</td>
									<td>".$row['keterangan']."</td>
									<td>"; 
                                                                ?>
										<a href='admin.php?page=profesi&aksi=edit&id_profesi=<?php echo $row['id_profesi'];?>' class='table-actions-button ic-table-edit'></a>
                                                                                <a onclick='window.confirm("Anda yakin ingin menghapus data ini ?");' href='admin.php?page=profesi&aksi=hapus&id_profesi=<?php echo $row['id_profesi'];?>' class='table-actions-button ic-table-delete'></a>
									<?php echo "</td>
                                                                    </tr>   ";
                                                                        $no++;
                                                            }
                                                            ?>
							</tbody>
							<tfoot>
                                                            <tr><td colspan="5" class="table-footer">
								
                                                                    
                                                                        <?php
                                                                        $active     = "profesi";
                                                                        $page       = $_GET['halaman'];
                                                                        $jml_data   = $fquery->jumlah_profesi();
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
                                                                            <input type="submit" name="edit_cek" value="Edit data yang ditandai" class="round button dark text-upper small-button">
                                                                            &nbsp;&nbsp;&nbsp;atau tambah sebanyak &nbsp;&nbsp;&nbsp;
                                                                            <input type="text" size="1" name="add" value="1">
                                                                            <input type="submit" name="add_rows" class="round button blue text-upper small-button" value="Kategori Profesi">	
	
									</td>
									
								</tr>
							
							</tfoot>
							
						</table>
                                            </form>
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->

                                <?php
                                if($_GET['aksi']=='hapus') {
                                    $id_team    = $_SESSION['id_team'];
                                    $tanggal    = date("Y-m-d");
                                    $jam        = date("H:i:s");
                                    $fquery->add_log_team($id_team,'Menghapus kategori profesi user',$tanggal,$jam);
                                    $id_profesi  = $_GET['id_profesi'];
                                    $fquery->hapus_profesi($id_profesi);
                                    echo "<script>window.location='admin.php?page=profesi';</script>";
                                }