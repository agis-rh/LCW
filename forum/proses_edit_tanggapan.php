<?php
include 'config/koneksi.php';
 $id=$_POST['id'];
 $id_topik=$_POST['id_topik'];

$a=mysql_query("UPDATE tanggapan_forum SET tanggapan='$_POST[tanggapan]'WHERE id_tanggapan='$id'");

header("location:media.php?module=topik&id=".$_POST['id_topik']);
   
?>