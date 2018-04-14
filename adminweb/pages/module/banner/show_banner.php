                                    <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Tata Letak Web</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
						 <form action="" method="POST">
						<table>
						
							<thead>
						
								<tr>
                                                                    <th width="60"><i class="fa fa-check"></i> No.</th>
									<th>Alamat</th>
                                                                        <th>Keterangan</th>
                                                                        <th>Aktif</th>
									<th>Actions</th>
								</tr>
							
							</thead>
	
							
							<tbody>
                                                            <?php
                                                            $no = 1;
                                                            $info = $fquery->show_banner();
                                                            foreach ($info as $row) {
                                                                echo "
                                                                    <tr>
                                                                            <td><input type='checkbox' name='cek[]' id='id-$no' value='$row[id_banner]'>$no.</td>
                                                                            <td>$row[alamat]</td>
                                                                            <td>$row[keterangan]</td>
                                                                            <td>$row[publish]</td>
                                                                            <td>
                                                                                    <a href='admin.php?page=banner&aksi=edit&id_banner=$row[id_banner]' class='table-actions-button ic-table-edit'></a> 
                                                                                    <a href='admin.php?page=banner&aksi=hapus&id_banner=$row[id_banner]' class='table-actions-button ic-table-delete'></a> 
                                                                            </td>
                                                                    </tr>	";
                                                                $no++;
                                                            }
                                                            ?>
							</tbody>
                                                        
							<tfoot>
                                                            
                                                            <tr>
								
									<td colspan="5" class="table-footer">
                                                                            	
                                                                               <a href="admin.php?page=banner&aksi=add_banner" class="round button blue text-upper small-button">Tambah Banner Web</a>	
                                                                                
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
                                if($_GET['page']=='banner' && $_GET['aksi']=='hapus') {
                                   
                                    $id_banner    = $_GET['id_banner'];
                                    $fquery->add_log_team($id_team,'Menghapus data banner web',$tanggal,$jam);
                                    $get_one = $fquery->get_one_banner($id_banner);
                                    if($get_one['gambar']!='') {
                                        unlink("../photos/banner/$get_one[gambar]");
                                    }
                                    $fquery->hapus_banner($id_banner);
                                    echo "<script>window.location='admin.php?page=banner';</script>";
                                }



