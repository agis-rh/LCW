<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Edit Kategori Topik forum</h3>
						<span class="fr expand-collapse-text">Collapse</span>
						<span class="fr expand-collapse-text initial-expand">Expand</span>
					
					</div> <!-- end content-module-heading -->
                                        <form action="" method="POST" enctype="multipart/form-data">
					
					
<?php
$id_team    = $_SESSION['id_team'];
$tanggal    = date("Y-m-d");
$jam        = date("H:i:s");
if($_POST['delete_cek']) {
    $cekid  =   $_POST['cek'];
    if(count($cekid) < 1) {
        echo "<br><div class='error-box round'>
Tidak ada data sensor kata yang dipilih untuk dihapus.</div>
<a href='javascript:;' onclick='self.history.back()' class='button round dark' />Kembali</a>";
        
    }
    else {
            $cekid  =   $_POST['cek'];
                                        for($i=0;$i<count($cekid);$i++) {
                                            $fquery->add_log_team($id_team,'Menghapus data sensor kata',$tanggal,$jam);
                                            $fquery->hapus_sensor($cekid[$i]);
                                            echo "<script>window.location='admin.php?page=sensorkata';</script>";
                                        }
        }
}
else if($_POST['edit_cek']) {
    $cekid  =   $_POST['cek'];
    if(count($cekid) < 1) {
        echo "<br><div class='error-box round'>
Tidak ada data sensor kata yang dipilih untuk diedit.</div>
<a href='javascript:;' onclick='self.history.back()' class='button round dark' />Kembali</a>";
        
    }
    else {
        $cekid  =   $_POST['cek'];
            for($i=0;$i<count($cekid);$i++) {
                                ?>

					
					<div class="content-module-main">
                                            <?php
                                            $data   = $fquery->get_one_sensor($cekid[$i]);
                                            ?>
                                                <fieldset>
									<p>
										<label for="full-width-input">Kata awal</label>
                                                                                <input type="hidden" name="edit[]">
                                                                                <input type="hidden" name="id_sensor[]" value="<?php echo $data['id_sensor']; ?>">
                                                                                <input type="text" value="<?php echo $data['word']; ?>" required name="word[]" id="full-width-input" class="default-width-input form-control"/>
										<em>Kata yang akan disensor.</em>								
									</p>
	
									<p>
										<label for="textarea">Kata pengganti</label>
                                                                                <input type="text" value="<?php echo $data['replacer']; ?>" required name="replace[]" id="full-width-input" class="default-width-input form-control"/>
										<em>Isi sebagai kata pengganti.</em>
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
										<label for="full-width-input">Kata awal</label>
                                                                                <input type="hidden" name="add[]">
                                                                                <input type="text" required name="word[]" id="full-width-input" class="default-width-input form-control"/>
										<em>Isi kata yang akan disensor.</em>								
									</p>
	
									<p>
										<label for="textarea">Kata pengganti</label>
                                                                                <input type="text" required name="replace[]" id="full-width-input" class="default-width-input form-control"/>
                                                                                <em>Isi sebagai kata pengganti.</em>
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
if($_POST['save']) {
    $edit       = $_POST['edit'];
    $word       = $_POST['word'];
    $replace    = $_POST['replace'];
    $idsensor   = $_POST['id_sensor'];
    $jumlah     = count($edit);
    if($jumlah < 1) {
        echo "<div class=''></div>";
    }
    else {
        $fquery->add_log_team($id_team,"Mengubah $jumlah data sensor kata",$tanggal,$jam);
        for($ai=1;$ai<=$jumlah;$ai++) {
            $a = $ai-1;
            $fquery->edit_sensor($word[$a],$replace[$a],$idsensor[$a]);
            echo "<script>window.location='admin.php?page=sensorkata';</script>";
        }
    }
}

else if($_POST['add_row']) {
    $add        = $_POST['add'];
    $word      = $_POST['word'];
    $replace     = $_POST['replace'];
    $jumlah_add = count($add);
    $fquery->add_log_team($id_team,"menambahkan $jumlah_add data sensor kata",$tanggal,$jam);

    for($b=1;$b<=$jumlah_add;$b++) {
        $c = $b-1;
            $fquery->add_sensor($word[$c],$replace[$c]);
            echo "<script>window.location='admin.php?page=sensorkata';</script>";
    }
}