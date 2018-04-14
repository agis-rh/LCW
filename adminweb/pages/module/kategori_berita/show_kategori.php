                            <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Data Kategori Berita</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
                                            <form action="admin.php?page=kategori_berita&aksi=multi_aksi" method="POST">
						<table>
						
							<thead>
						
                                                            <tr><th width="30">#</th>
									<th width="10"><input type="checkbox" id="table-select-all"></th>
									<th width="200">Nama Kategori</th>
									<th>Keterangan</th>
									<th>Actions</th>
								</tr>
							
							</thead>
	
							
							<tbody>
                                                            <?php
                                                            $batas  = $general['batas_paging_admin'];
                                                            $posisi = $paging->cariPosisi($batas);
                                                            $no     = $paging->cariPosisi($batas)+1;
                                                            $data   = $fquery->paging_kategori($posisi,$batas);
                                                            
                                                            foreach ($data as $row) {
                                                                echo "<tr><td>$no.</td>
                                                                    <td><input type='checkbox' name='cek[]' id='id-$no' value='$row[id_kategori]'></td>
									<td>$row[nama]</td>
									<td>".$row['keterangan']."</td>
									<td>"; 
                                                                ?>
										<a class="load-ajax" href='admin.php?page=kategori_berita&aksi=edit&id_kategori=<?php echo $row['id_kategori'];?>' class='table-actions-button ic-table-edit'></a>
                                                                                <a onclick='window.confirm("Anda yakin ingin menghapus data ini ?");' href='admin.php?page=kategori_berita&aksi=hapus&id_kategori=<?php echo $row['id_kategori'];?>' class='table-actions-button ic-table-delete'></a>
									<?php echo "</td>
                                                                    </tr>   ";
                                                                        $no++;
                                                            }
                                                            ?>
							</tbody>
                                                        
							<tfoot>
                                                            
                                                            <tr><td colspan="5" class="table-footer">
								
                                                                    
                                                                        <?php
                                                                        $active     = "kategori_berita";
                                                                        $page       = $_GET['halaman'];
                                                                        $jml_data   = $fquery->jumlah_kategori();
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
									
                                                                            <input type="submit" name="delete_cek" class="round button dark text-upper small-button" onclick="window.confirm('Hapus data berita yang ditandai ?')" value="Hapus data yang ditandai">	
                                                                            <input type="submit" name="edit_cek" class="round button dark text-upper small-button" value="Edit data yang ditandai">	
                                                                               &nbsp;&nbsp;&nbsp;atau tambah sebanyak &nbsp;&nbsp;&nbsp;
                                                                            <input type="text" size="1" name="add" value="1">
                                                                            <input type="submit" name="add_rows" class="round button blue text-upper small-button" value="Kategori Topik">	
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
                                    $id_kategori  = $_GET['id_kategori'];
                                    $fquery->hapus_kategori($id_kategori);
                                    $fquery->add_log_team($id_team,'Menghapus data kategori berita',$tanggal,$jam);
                                    echo "<script>window.location='admin.php?page=kategori_berita';</script>";
                                }