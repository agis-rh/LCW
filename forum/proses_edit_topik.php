<?php
include 'config/koneksi.php';
 $id=$_GET['id'];
 $a=mysql_query("UPDATE topik_forum SET subjek='$_POST[subjek]', id_kategori='$_POST[id_kategori]', deskripsi='$_POST[deskripsi]' WHERE id_topik='$id'");

header('location:?module=topik&id='.$_GET[id]);
    

?>