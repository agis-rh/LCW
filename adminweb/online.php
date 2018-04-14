<?php
/* 
 * *****************************************************************************
 * Filename  : .php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
session_start();
$id_team    = $_SESSION['id_team'];
include "../system/functions.php";
$fquery = new Functions();
$data = $fquery->show_online($id_team);
$jumlah = $fquery->jumlah_online($id_team);
    if($jumlah > 0) {
        foreach($data as $row) {
            echo "<li><a href='javascript:;'>$row[first_name]</a></li>";
        }
    }
    else {
        echo "<li><a href='javascript:;' style='color: red'><b>No Team Is Online .....</b></a></li>";
    }
