                            <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Data Topik Forum</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
						<table>
						
							<thead>
						
								<tr>
									<th><input type="checkbox" id="table-select-all"></th>
									<th width="200">Nama Lengkap</th>
									<th>Subjek</th>
									<th>Kategori</th>
                                                                        <th>Tanggal Buat</th>
                                                                        
								</tr>
							
							</thead>
	
							
							<tbody>
                                                            <?php
                                                            $batas  = $general['batas_paging_admin'];
                                                            $posisi = $paging->cariPosisi($batas);
                                                            $data   = $fquery->paging_topik($posisi,$batas);
                                                            foreach ($data as $row) {
                                                                echo "<tr>
                                                                    <td><input type='checkbox'></td>
									<td>$row[first_name] ".$row['last_name']."</td>
									<td>".$row['subjek']."</td>
									<td>$row[nama]</td>
                                                                        <td>".tanggal($row['tanggal'])."</td>
                                                                        
                                                                    </tr>   ";
                                                            }
                                                            ?>
							</tbody>
							<tfoot>
                                                            <tr><td colspan="5" class="table-footer">
								
                                                                    
                                                                        <?php
                                                                        $active     = "topik";
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
                                                            <tr>
								
									<td colspan="5" class="table-footer">
                                                                            	
                                                                 		
										<a href="#" class="round button blue text-upper small-button">Apply to selected</a>	
									</td>
									
								</tr>
							
							</tfoot>
							
						</table>
					
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