<?php
include "config/koneksi.php";
session_start();
session_destroy();
mysql_query("UPDATE member_forum SET aktif='N' WHERE id_member='$_SESSION[id_member]'");
header("location: index.php");
?>