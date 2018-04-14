                                    <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Data member</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
						<table>
						
							<thead>
						
								<tr>
									<th><input type="checkbox" id="table-select-all"></th>
									<th>Nama Lengkap</th>
									<th>E-mail</th>
                                                                        <th>No. Hp</th>
                                                                        <th>Actions</th>
                                                                        
                                                                        
								</tr>
							
							</thead>
	
							
							
							<tbody>
                                                            <?php
                                                            $batas  = $general['batas_paging_admin'];
                                                            $posisi = $paging->cariPosisi($batas);
                                                            $info = $fquery->paging_member($posisi,$batas);
                                                            foreach ($info as $row) {
                                                                echo "
                                                                    <tr>
                                                                            <td><input type='checkbox'></td>
                                                                            <td>$row[first_name] ".$row['last_name']."</td>
                                                                            <td>$row[email]</td>
                                                                            <td>$row[no_hp]</td>
                                                                                
                                                                            <td>
                                                                                    <a href='admin.php?page=member&aksi=hapus&id_member=$row[id_member]' class='table-actions-button ic-table-delete'></a>
                                                                            </td>
                                                                    </tr>	";
                                                            }
                                                            ?>
							</tbody>
                                                        <tfoot>
							
                                                            <tr><td colspan="5" class="table-footer">
								
                                                                    
                                                                        <?php
                                                                        $active     = "member";
                                                                        $page       = $_GET['halaman'];
                                                                        $jml_data   = $fquery->jumlah_member();
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
                                                                            	
                                                                                                         <a href="admin.php?page=member&aksi=add_member" class="round button blue text-upper small-button">Tambah Data Member</a>	
                                                                                
									</td>
									
								</tr>
							
							</tfoot>
							
						</table>
					
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
                                
                                <?php
                                if($_GET['aksi']=='hapus') {
                                    $id_member    = $_GET['id_member'];
                                    $id_team   = $_SESSION['id_team'];
                                    $tanggal    = date("Y-m-d");
                                    $jam        = date("H:i:s");
                                    $data       = $fquery->get_one_member($id_member);
                                    if($data['image']!='') {
                                        $fquery->add_log_team($id_team,'Menghapus data member forum',$tanggal,$jam);
                                        unlink("../photos/member/$data[image]");
                                        $fquery->hapus_member($id_member);
                                        echo "<script>window.location='admin.php?page=member';</script>";
                                    }
                                    else {
                                        $fquery->add_log_team($id_team,'Menghapus data member forum',$tanggal,$jam);
                                        $fquery->hapus_member($id_member);
                                        echo "<script>window.location='admin.php?page=member';</script>";
                                    }
                                }

