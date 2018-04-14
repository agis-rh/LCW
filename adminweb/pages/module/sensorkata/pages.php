<?php
/* 
 * *****************************************************************************
 * Filename  : pages.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$page   = $_GET['page'];
$aksi   = $_GET['aksi'];
$folder = "pages/module/sensorkata/";
if($page=='sensorkata' && $aksi=='add_sensor') {
    include $folder.'add_sensor.php';
}
else if($page=='sensorkata' && $aksi=='edit') {
    include $folder.'edit_sensor.php';
}
else if($page=='sensorkata' && $aksi=='multi_aksi') {
    include $folder.'aksi_multi.php';
}
else if($page=='sensorkata'){
    include $folder.'show_sensor.php';
}

