<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Manajemen Kategori Topik forum</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
                                        
					
					
<?php
$id_team    = $_SESSION['id_team'];
$tanggal    = date("Y-m-d");
$jam        = date("H:i:s");
if($_POST['delete_cek']) {
    $cekid  =   $_POST['cek'];
    if(count($cekid) < 1) {
        echo "<br><div class='error-box round'>
Tidak ada data kategori topik forum yang dipilih untuk dihapus.</div>
<a href='javascript:;' onclick='self.history.back()' class='button round dark' />Kembali</a>";
        
    }
    else {
            $cekid  =   $_POST['cek'];
                                        for($i=0;$i<count($cekid);$i++) {
                                            $fquery->add_log_team($id_team,'Menghapus kategori topik forum',$tanggal,$jam);
                                            $fquery->hapus_kategori_forum($cekid[$i]);
                                            echo "<script>window.location='admin.php?page=kategori_topik';</script>";
                                        }
        }
}
else if($_POST['edit_cek']) {
    $cekid  =   $_POST['cek'];
    if(count($cekid) < 1) {
        echo "<br><div class='error-box round'>
Tidak ada data kategori topik forum yang dipilih untuk diedit.</div>
<a href='javascript:;' onclick='self.history.back()' class='button round dark' />Kembali</a>";
        
    }
    else {
        echo "<form action='' method='POST' enctype='multipart/form-data'>";
        $cekid  =   $_POST['cek'];
            for($i=0;$i<count($cekid);$i++) {
                                ?>

					
					<div class="content-module-main">
                                            <?php
                                            $data   = $fquery->get_one_kategori_forum($cekid[$i]);
                                            ?>
                                                <fieldset>
									<p>
										<label for="full-width-input">Nama kategori Profesi</label>
                                                                                <input type="hidden" name="edit[]">
                                                                                <input type="hidden" name="id_kategori[]" value="<?php echo $data['id_kategori']; ?>">
                                                                                <input type="text" value="<?php echo $data['nama']; ?>" required placeholder="Kategori forum . . . . ." name="nama[]" id="full-width-input" class="default-width-input form-control"/>
										<em>Isi nama kategori berita.</em>								
									</p>
	
									<p>
										<label for="textarea">Ketrangan profesi</label>
                                                                                <textarea rows="5" placeholder="Masukan teks keterangan disini......." name="ket[]" class="full-width-textarea form-control"><?php echo $data['keterangan']; ?></textarea>
									</p>
                                                                        									
									<div class="stripe-separator"><!--  --></div>
	                                                                        	
                                                                        
                                                                        
									
                                               
                                                </fieldset>
						</div> <!-- end half-size-column -->
				
					
<?php
            }
            ?>
                                                  <div style="margin-left: 20px; margin-bottom: 20px">
                                                    <input type="submit" name="save" value="Save" class="round blue ic-right-arrow" />
                                                    <a href="javascript:;" onclick="self.history.back()" class="button round dark" />Kembali</a></div>
                                                </form>
                                                <?php
    }
    ?>
                                                
                                              
                                                <?php
}
else if($_POST['add_rows']) {
    $jumlah_add     = $_POST['add'];
    echo "<form action='' method='POST' enctype='multipart/form-data'>";
    for($k=1;$k<=$jumlah_add;$k++) {
?>
                
                                                
       <div class="content-module-main">
                                                <fieldset>
									<p>
										<label for="full-width-input">Nama kategori Topik</label>
                                                                                <input type="hidden" name="add[]">
                                                                                <input type="text" required placeholder="Kategori berita . . . . ." name="judul[]" id="full-width-input" class="default-width-input form-control"/>
										<em>Isi nama kategori berita.</em>								
									</p>
	
									<p>
										<label for="textarea">Ketrangan profesi</label>
                                                                                <textarea rows="5" required placeholder="Masukan teks keterangan disini......." name="konten[]" class="full-width-textarea form-control"></textarea>
									</p>
                                                                        									
									<div class="stripe-separator"><!--  --></div>
	                                                                        	
                                                                        
                                                                        
									
                                               
                                                </fieldset>
						</div> <!-- end half-size-column -->
				                                 
                                        
                                        
                                                                     
                                                
<?php
    }
    ?>
          <div style="margin-left: 20px; margin-bottom: 20px">
                                                    <input type="submit" name="add_row" value="Tambahkan" class="round blue ic-right-arrow" />
                                                    <a href="javascript:;" onclick="self.history.back()" class="button round dark" />Kembali</a></div>
                                                </form>                                      
                                                
<?php
}
?>
</div> <!-- end content-module-main -->

<?php
$id_team    = $_SESSION['id_team'];
    $tanggal    = date("Y-m-d");
    $jam        = date("H:i:s");
if($_POST['save']) {
    $edit       = $_POST['edit'];
    $nama       = $_POST['nama'];
    $ket        = $_POST['ket'];
    $idkategori = $_POST['id_kategori'];
    $jumlah     = count($edit);
    if($jumlah < 1) {
        echo "<div class=''></div>";
    }
    else {
        for($ai=1;$ai<=$jumlah;$ai++) {
            $a = $ai-1;
            $fquery->add_log_team($id_team,'Mengubah kategori topik forum',$tanggal,$jam);
            $fquery->edit_kategori_forum($nama[$a],$ket[$a],$idkategori[$a]);
            echo "<script>window.location='admin.php?page=kategori_topik';</script>";
        }
    }
}
else if($_POST['add_row']) {
    $add        = $_POST['add'];
    $judul      = $_POST['judul'];
    $konten     = $_POST['konten'];
    $jumlah_add = count($add);
    $fquery->add_log_team($id_team,"menambahkan $jumlah_add kategori topik forum",$tanggal,$jam);

    for($b=1;$b<=$jumlah_add;$b++) {
        $c = $b-1;
            $fquery->add_kategori_forum($judul[$c],$konten[$c]);
            echo "<script>window.location='admin.php?page=kategori_topik';</script>";
    }
}