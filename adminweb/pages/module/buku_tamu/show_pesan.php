                            <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Messages</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
                                            <form action="" method="POST">
						<table>
						
							<thead>
						
                                                            <tr><th width="60"><i class="fa fa-check"></i> No.</th>
									<th width="200">Nama Lengkap</th>
									<th>e-mail</th>
                                                                        <th>Tanggal dan waktu</th>
									<th>Actions</th>
								</tr>
							
							</thead>
	
							
							<tbody>
                                                            <?php
                                                            $batas  = 15;
                                                            $posisi = $paging->cariPosisi($batas);
                                                            $no     = $posisi+1;
                                                            $data   = $fquery->paging_bukutamu($posisi,$batas);
                                                            foreach ($data as $row) {
                                                                if($row['di_baca']=='0') {
                                                                    $style = "style='color: red'";
                                                                }
                                                                else {
                                                                    $style = "";
                                                                }
                                                                echo "<tr $style>
                                                                    <td><input type='checkbox' name='cek[]' id='id-$no' value='$row[id_bukutamu]'>$no.</td>
									<td><a href='admin.php?page=messages&aksi=read&id_bukutamu=$row[id_bukutamu]'>$row[nama]</a></td>
									<td>".$row['email']."</td>
                                                                        <td>".tanggal($row['tanggal'])." $row[waktu]</td>
                                                                            
									<td>"; 
                                                                ?>

                                                                                <a onclick='window.confirm("Anda yakin ingin menghapus data ini ?");' href='admin.php?page=messages&aksi=hapus&id_bukutamu=<?php echo $row['id_bukutamu'];?>' class='table-actions-button ic-table-delete'></a>
									<?php echo "</td>
                                                                    </tr>   ";
                                                                        $no++;
                                                            }
                                                            ?>
							</tbody>
							<tfoot>
                                                            <tr><td colspan="5" class="table-footer">
								
                                                                    
                                                                        <?php
                                                                        $active     = "messages";
                                                                        $page       = $_GET['halaman'];
                                                                        $jml_data   = $fquery->jumlah_bukutamu();
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
									
                                                                                <input type="submit" name="delete_cek" class="round button dark text-upper small-button" value="Hapus data yang ditandai">		
	
									</td>
									
								</tr>
							
							</tfoot>
							
						</table>
                                            </form>
					
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->

                                <?php
                                $id_bukutamu    = $_GET['id_bukutamu'];
                                $id_team        = $_SESSION['id_team'];
                                $tanggal        = date("Y-m-d");
                                $jam            = date("H:i:s");
                                if($_GET['aksi']=='hapus') {
                                    $fquery->add_log_team($id_team,'Menghapus data pesan buku tamu',$tanggal,$jam);
                                    $fquery->hapus_bukutamu($id_bukutamu);
                                    echo "<script>window.location='admin.php?page=messages';</script>";
                                }
                                else if($_POST['delete_cek']) {
                                    $cekid  =   $_POST['cek'];
                                    if(count($cekid) < 1) {
                                        echo "<br><div class='error-box round'>
                                                      Tidak ada data pesan yang dipilih untuk dihapus.</div>";
                                    }
                                    else {
                                        $cekid  =   $_POST['cek'];
                                        $jumlah = count($cekid);
                                        for($i=0;$i<count($cekid);$i++) {
                                            $fquery->hapus_bukutamu($cekid[$i]);
                                            $fquery->add_log_team($id_team,"Menghapus $jumlah pesan buku tamu",$tanggal,$jam);
                                            echo "<script>window.location='admin.php?page=messages';</script>";
                                        }
                                    }
                                }