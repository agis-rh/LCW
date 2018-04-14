<?php
$server   = "localhost";
$username = "27nay";
$password = "nay27";
$database = "web_lcw";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
