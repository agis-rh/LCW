                            <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Data Log Team</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
						<table>
						
							<thead>
						
								<tr>
									<th><input type="checkbox" id="table-select-all"></th>
									<th>Nama users</th>
									<th>Aktifitas yang dilakukan</th>
                                                                        <th>Waktu</th>
                                                                        
                                                                        
								</tr>
							
							</thead>
	
							
							<tbody>
                                                            <?php
                                                            $batas  = $general['batas_paging_admin'];
                                                            $posisi = $paging->cariPosisi($batas);
                                                            if($_SESSION['level']=='admin') {
                                                                $data   = $fquery->paging_log_team($posisi,$batas);
                                                            }
                                                            else {
                                                                $data   = $fquery->paging_log_id_team($posisi,$batas,$_SESSION['id_team']);
                                                            }
                                                            foreach ($data as $row) {
                                                                echo "<tr>
                                                                    <td><input type='checkbox'></td>
									<td>".$row['first_name']." ".$row['last_name']."</td>
									<td>".$row['aktifitas'].". <em style='color: red'>Pada tanggal ".tanggal($row['tanggal'])."</em></td>
									<td>$row[waktu]</td>
									
                                                                    </tr>";
                                                            }
                                                            ?>
							</tbody>
							<tfoot>
                                                            <tr><td colspan="5" class="table-footer">
								
                                                                    
                                                                        <?php
                                                                        $active     = "log_team";
                                                                        $page       = $_GET['halaman'];
                                                                        if($_SESSION['level']=='admin') {
                                                                            $jml_data   = $fquery->jumlah_log_team();
                                                                        }
                                                                        else {
                                                                            $jml_data   = $fquery->jumlah_log_id_team($_SESSION['id_team']);
                                                                        }
                                                                        $jml_page   = $paging->jumlahPage($jml_data,$batas);
                                                                        $link       = $paging->linkHalaman($page,$jml_page,$active);
                                                                        echo $link;
                                                                        ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
								
									<td colspan="5" class="table-footer">
									
											
                                                                                <a href="admin.php?page=log_team&aksi=hapus_all" class="round button blue text-upper small-button">
                                                                                    <span class="fa fa-trash-o"></span> Hapus Semua Log</a>	
	
									</td>
									
								</tr>
							
							</tfoot>
							
						</table>
					
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->

                                <?php
                                if($_GET['aksi']=='hapus_all') {
                                    $fquery->hapus_all_log_team();
                                    echo "<script>window.location='admin.php?page=log_team';</script>";
                                }