<?php
include "config/koneksi.php";
include "config/library.php";
date_default_timezone_set('Asia/jakarta');
$tanggal = date("Y-m-d");
$jam = date("H:i:s");
session_start();
		$sql = "INSERT INTO tanggapan_forum(id_member, tanggapan, id_topik, tanggal_tanggapan, hari, waktu) 
				VALUES ('$_SESSION[id_member]','$_POST[tanggapan]','$_GET[id]','$tanggal','$hari_ini','$jam')";
		$hasil = mysql_query($sql);

	
						
    header('location:?module=topik&id='.$_GET[id]);


?>
