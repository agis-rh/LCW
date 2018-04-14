                                    <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Develover Team</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
						 <form action="" method="POST">
						<table>
						
							<thead>
						
								<tr>
                                                                    <th width="60"><i class="fa fa-check"></i> No.</th>
									<th>Nama Lengkap</th>
									<th>Profesi</th>
									<th>E-mail</th>
                                                                        <th>No. Hp</th>
                                                                        <th>Actions</th>
                                                                        
                                                                        
								</tr>
							
							</thead>
	
							
							
							<tbody>
                                                            <?php
                                                            $batas  = $general['batas_paging_admin'];
                                                            $posisi = $paging->cariPosisi($batas);
                                                            $no     = $posisi+1;
                                                            $info = $fquery->paging_team($posisi,$batas);
                                                            foreach ($info as $row) {
                                                                echo "
                                                                    <tr>";
                                                                if($row['level']=='admin') {
                                                                            echo "<td><input type='checkbox' disabled name='cek[]' id='id-$no' value='$row[id_team]'>$no.</td>";
                                                                }
                                                                else {
                                                                    echo "<td><input type='checkbox' name='cek[]' id='id-$no' value='$row[id_team]'>$no.</td>";
                                                                }
                                                                     echo "<td><a href='admin.php?page=team&aksi=profil&id_team=$row[id_team]'>$row[first] ".$row['last']."</a></td>
                                                                            <td>$row[profesi]</td>
                                                                            <td>$row[email]</td>
                                                                            <td>$row[no_hp]</td>
                                                                                
                                                                            <td>";
                                                                if($row['level']=='admin') {
                                                                 echo "<a href='admin.php?page=team&aksi=edit&id_team=$row[id_team]' class='table-actions-button ic-table-edit'></a>
                                                                            </td>";
                                                                }
                                                                else {
                                                                    echo "<a href='admin.php?page=team&aksi=edit&id_team=$row[id_team]' class='table-actions-button ic-table-edit'></a>
                                                                       <a href='admin.php?page=team&aksi=hapus&id_team=$row[id_team]' class='table-actions-button ic-table-delete'></a>
                                                                            </td>";
                                                                }
                                                                    echo "</tr>	";
                                                                $no++;
                                                            }
                                                            ?>
							</tbody>
                                                        <tfoot>
							
                                                            <tr><td colspan="5" class="table-footer">
								
                                                                    
                                                                        <?php
                                                                        $active     = "team";
                                                                        $page       = $_GET['halaman'];
                                                                        $jml_data   = $fquery->jumlah_team();
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
	
                                                                            <a href="admin.php?page=team&aksi=add_team" class="round button blue text-upper small-button">Tambah Team</a>	
                                                                                
									</td>
									
								</tr>
							
							</tfoot>
							
						</table>
                                                 </form>
					
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
                                
                                <?php
                                    $id_team1   = $_SESSION['id_team'];
                                    $tanggal    = date("Y-m-d");
                                    $jam        = date("H:i:s");
                                if($_GET['aksi']=='hapus') {
                                    $id_team    = $_GET['id_team'];
                                    $data       = $fquery->get_one_team($id_team);
                                    if($data['image']!='') {
                                        $fquery->add_log_team($id_team1,'Menghapus data team developer',$tanggal,$jam);
                                        unlink("../photos/users/$data[image]");
                                        $fquery->hapus_team($id_team);
                                        echo "<script>window.location='admin.php?page=team';</script>";
                                    }
                                    else {
                                        $fquery->add_log_team($id_team1,'Menghapus data team developer',$tanggal,$jam);
                                        $fquery->hapus_team($id_team);
                                        echo "<script>window.location='admin.php?page=team';</script>";
                                    }
                                }
                                
                                 else if($_POST['delete_cek']) {
                                    $cekid  =   $_POST['cek'];
                                    if(count($cekid) < 1) {
                                        echo "<br><div class='error-box round'>
                                                      Tidak ada data team yang dipilih untuk dihapus.</div>";
                                    }
                                    else {
                                        $cekid  =   $_POST['cek'];
                                        $jumlah =   count($cekid);
                                        for($i=0;$i<count($cekid);$i++) {
                                            
                                            $data       = $fquery->get_one_team($cekid[$i]);
                                            if($data['image']!='') {
                                                unlink("../photos/user/$data[gambar]");
                                                $fquery->hapus_team($cekid[$i]);
                                                $fquery->add_log_team($id_team1,"Menghapus ".$jumlah." data team developer",$tanggal,$jam);
                                                echo "<script>window.location='admin.php?page=team';</script>";
                                            }
                                            else {
                                                $fquery->hapus_team($cekid[$i]);
                                                $fquery->add_log_team($id_team1,"Menghapus ".$jumlah." data team developer",$tanggal,$jam);
                                                echo "<script>window.location='admin.php?page=team';</script>";
                                            }
                                            
                                            
                                        }
                                    }
                                }

