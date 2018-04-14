<?php
/* 
 * *****************************************************************************
 * Filename  : logout.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
session_start();
$tanggal    = date("Y-m-d");
$jam        = date("H:i:s");
// Offline
$fquery->offline($id_team);
$add_log    = $fquery->add_log_team($id_team,'Keluar sistem control panel',$tanggal,$jam);
session_destroy();
echo "<script>window.location='index.php';</script>";