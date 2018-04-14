<?php
include "config/koneksi.php";
include "config/library.php";
error_reporting(0);
echo "<section class='col-lg-10 connectedSortable'>
	<div class='col-md-7'>
    <div class='alert alert-info' >
    <i class='fa fa-edit'></i>
    <b>Membuat Topik Baru</b>
    </div></div>";

	if($_SERVER['REQUEST_METHOD']!='POST'){	
		$sql = "SELECT * FROM	kategori_forum";
		$hasil = mysql_query($sql);
		
  
                                        
                                       
		echo " <div class='col-md-7'>
       		  <form method=post action=''>
		      <div class='input-group'>
		      <span class='input-group-addon'><i class='fa fa-envelope'></i></span>
              <input type=text class='form-control' required='required' placeholder='Subjek . .' name='subjek' size=40 />
              </div><br />
              
		      <div class='input-group'>
		      <span class='input-group-addon'><i class='fa fa-tags'></i></span>
		      <select name=id_kategori required='required' class='form-control' >
		      <option value=0 selected>- Pilih Kategori -</option>";
					while($r=mysql_fetch_assoc($hasil)){
						echo "<option value=$r[id_kategori]>$r[nama]</option>";
					}

			  echo "</select></div><br />	
                    <div class='input-group'>
					<textarea name='deskripsi' required='required'  class='form-control' placeholder='Deskripsi . .' cols=75 rows=4 /></textarea>
                    </div><br />
					<tr><td colspan=2>
                    <button type='submit' class='btn btn-primary pull-left'><i class='fa fa-share-square'></i> Kirim</button></td></tr>
					</form></div>";
	}
	else{
	   date_default_timezone_set('Asia/jakarta');
	   $jam=date('H:i:s');
	  $sql2 = "INSERT INTO topik_forum(subjek, id_kategori, id_member, deskripsi, waktu, hari,  tanggal)
			   VALUES('$_POST[subjek]', '$_POST[id_kategori]', '$_SESSION[id_member]', '$_POST[deskripsi]','$jam','$hari_ini', NOW())";
		$hasil2 = mysql_query($sql2);
        $id_topik = mysql_insert_id();
        
				
    header('location:?module=topik&id='.$id_topik);
	}



?>
</section>