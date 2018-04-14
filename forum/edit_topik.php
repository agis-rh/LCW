<?php
include 'config/koneksi.php';
$id=$_GET['id'];
$sql=mysql_query("select * from topik_forum where id_topik='$_GET[id]'");
$data=mysql_fetch_array($sql);



echo "<div class='col-md-5'>
		  <div class='alert alert-info' >
	    <i class='fa fa-edit'></i>
	    <b>Edit Topik </b>
	    </div>

      <form method=post action='?module=proses_edit&id=$id'>
		  <div class='input-group'>
		  <span class='input-group-addon'><i class='fa fa-envelope'></i></span>
      <input type=text class='form-control' required='required' value='$data[subjek]' placeholder='Subjek . .' name='subjek' size=40 />
      </div><br />
              
		  <div class='input-group'>
		  <span class='input-group-addon'><i class='fa fa-tags'></i></span>
		  <select name=id_kategori required='required' class='form-control' >
		  <option value=0 selected>- Pilih Kategori -</option>";



					 $tampil=mysql_query("SELECT * FROM kategori_forum ORDER BY nama");
          if ($data[id_kategori]==0){
            echo "<option value=0 selected>- Pilih Kategori -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($data[id_kategori]==$w[id_kategori]){
              echo "<option value=$w[id_kategori] selected>$w[nama]</option>";
            }
            else{
              echo "<option value=$w[id_kategori]>$w[nama]</option>";
            }
          }


		echo "</select></div><br />	
          <div class='input-group'>
					<textarea name='deskripsi' required='required'  class='form-control' placeholder='Deskripsi . .' cols=75 rows=4 />$data[deskripsi]</textarea>
          </div><br />
					<tr><td colspan=2>
          <button type='submit' name='save' class='btn btn-primary pull-left'><i class='fa fa-share-square'></i> Simpan</button></td></tr>
			    </form></div>";


?>



