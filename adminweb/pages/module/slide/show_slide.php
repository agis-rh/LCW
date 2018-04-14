                                    <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Slide Gambar</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
						 <form action="" method="POST">
						<table>
						
							<thead>
						
								<tr>
                                                                    <th width="60"><i class="fa fa-check"></i> No.</th>
									<th>Keterangan Slide</th>
									<th>Gambar</th>
                                                                        <th>Tipe Slide</th>
                                                                        <th>Aktif</th>
									<th>Actions</th>
								</tr>
							
							</thead>
	
							
							<tbody>
                                                            <?php
                                                            $batas  = $general['batas_paging_admin'];
                                                            $posisi = $paging->cariPosisi($batas);
                                                            $no     = $posisi+1;
                                                            $info = $fquery->paging_slide($posisi,$batas);
                                                            foreach ($info as $row) {
                                                                echo "
                                                                    <tr>
                                                                            <td><input type='checkbox' name='cek[]' id='id-$no' value='$row[id_slide]'>$no.</td>
                                                                            <td>$row[keterangan]</td>
                                                                            <td>$row[filename]</td>
                                                                            <td>$row[type_slide]</td>
                                                                            <td>$row[aktif]</td>                                                                            
                                                                            <td>
                                                                                    <a href='admin.php?page=slide&aksi=edit&id_slide=$row[id_slide]' class='table-actions-button ic-table-edit'></a>
                                                                                    <a href='admin.php?page=slide&aksi=hapus&id_slide=$row[id_slide]' class='table-actions-button ic-table-delete'></a>
                                                                            </td>
                                                                    </tr>	";
                                                                $no++;
                                                            }
                                                            ?>
							</tbody>
                                                        
							<tfoot>
                                                            <tr><td colspan="5" class="table-footer">
								
                                                                    
                                                                        <?php
                                                                        $active     = "slide";
                                                                        $page       = $_GET['halaman'];
                                                                        $jml_data   = $fquery->jumlah_slide();
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
                                                                               <a href="admin.php?page=slide&aksi=add_slide" class="round button blue text-upper small-button">Tambah Slide</a>	
                                                                                
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
                                   
                                    $id_slide    = $_GET['id_slide'];
                                    $data       = $fquery->get_one_slide($id_slide);
                                    if($data['filename']!='') {
                                        $fquery->add_log_team($id_team,'Menghapus data slide gambar',$tanggal,$jam);
                                        unlink("../photos/slider/$data[filename]");
                                        $fquery->hapus_slide($id_slide);
                                        echo "<script>window.location='admin.php?page=slide';</script>";
                                    }
                                    else {
                                        $fquery->add_log_team($id_team,'Menghapus data slide gambar',$tanggal,$jam);
                                        $fquery->hapus_slide($id_slide);
                                        echo "<script>window.location='admin.php?page=slide';</script>";
                                    }
                                }
                                
                                
                                 else if($_POST['delete_cek']) {
                                    $cekid  =   $_POST['cek'];
                                    if(count($cekid) < 1) {
                                        echo "<br><div class='error-box round'>
                                                      Tidak ada data slide gambar yang dipilih untuk dihapus.</div>";
                                    }
                                    else {
                                        $cekid  =   $_POST['cek'];
                                        $jumlah =   count($cekid);
                                        for($i=0;$i<count($cekid);$i++) {
                                            
                                            $data       = $fquery->get_one_slide($cekid[$i]);
                                            if($data['filename']!='') {
                                                unlink("../photos/slider/$data[filename]");
                                                $fquery->hapus_slide($cekid[$i]);
                                                $fquery->add_log_team($id_team,"Menghapus ".$jumlah." data slide gambar",$tanggal,$jam);
                                                echo "<script>window.location='admin.php?page=slide';</script>";
                                            }
                                            else {
                                                $fquery->hapus_slide($cekid[$i]);
                                                $fquery->add_log_team($id_team,"Menghapus ".$jumlah." data slide gambar",$tanggal,$jam);
                                                echo "<script>window.location='admin.php?page=slide';</script>";
                                            }
                                            
                                            
                                        }
                                    }
                                }



