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
									<th>Tema template</th>
                                                                        <th>Pembuat</th>
                                                                        <th>Aktif</th>
									<th>Actions</th>
								</tr>
							
							</thead>
	
							
							<tbody>
                                                            <?php
                                                            $no = 1;
                                                            $info = $fquery->show_template();
                                                            foreach ($info as $row) {
                                                                echo "
                                                                    <tr>
                                                                            <td><input type='checkbox' name='cek[]' id='id-$no' value='$row[id_info]'>$no.</td>
                                                                            <td>$row[judul]</td>
                                                                            <td>$row[pembuat]</td>
                                                                            <td>$row[aktif] atau <a href='admin.php?page=template&aksi=aktif&id_template=$row[id_templates]' class='table-actions-button'>Aktifkan</a></td>
                                                                            <td>
                                                                                    <a href='admin.php?page=template&aksi=edit&id_template=$row[id_templates]' class='table-actions-button ic-table-edit'></a>     
                                                                            </td>
                                                                    </tr>	";
                                                                $no++;
                                                            }
                                                            ?>
							</tbody>
                                                        
							<tfoot>
                                                            
                                                            <tr>
								
									<td colspan="5" class="table-footer">
                                                                            	
                                                                               <a href="admin.php?page=template&aksi=add_template" class="round button blue text-upper small-button">Tambah Template</a>	
                                                                                
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
                                if($_GET['page']=='template' && $_GET['aksi']=='aktif') {
                                   
                                    $id_template    = $_GET['id_template'];
                                    $fquery->add_log_team($id_team,'Menghapus data informasi sekolah',$tanggal,$jam);
                                    $query1=mysql_query("UPDATE templates SET aktif='Y' WHERE id_templates='$id_template'");
                                    $query2=mysql_query("UPDATE templates SET aktif='N' WHERE id_templates!='$id_template'");
                                    if($query1==1 && $query2) {
                                        echo "<script>window.location='admin.php?page=template';</script>";
                                    }
                                }



