<?php
include 'config/koneksi.php';
$id=$_GET['id'];
$hapus=mysql_query("delete  from tanggapan_forum where id_tanggapan='$id'");

header('location:media.php?module=topik&id='.$_GET['id_topik']);
?>