
<section class='col-lg-10 connectedSortable'>
	<div class='col-md-7'>
    <div class='alert alert-info' >
    <i class='fa fa-edit'></i>
    <b>Edit Tanggapan</b>
    </div></div>



<?php
include 'config/koneksi.php';
$id=$_GET['id'];
$query=mysql_query("select * from tanggapan_forum where id_tanggapan='$id'");
while($a=mysql_fetch_array($query)){
    
echo"<div class='col-md-7'>
        <form method=post action='proses_edit_tanggapan.php'>
        <input type='hidden' name='id_topik' value='$_GET[id_topik]' />
        <input type='hidden' name='id' value='$a[id_tanggapan]' />
        <div class='input-group'>
		<textarea name='tanggapan' required='required'  class='form-control' placeholder='Tulis tanggapan . .' cols=75 rows=4 />$a[tanggapan]</textarea>
        </div><br />
        <button type='submit' class='btn btn-primary pull-left'><i class='fa fa-share-square'></i> Simpan</button>
		</form></div>";
	}
?>

</section>