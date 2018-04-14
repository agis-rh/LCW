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
$folder = "pages/module/profesi/";
if($page=='profesi' && $aksi=='add_profesi') {
    include $folder.'add_profesi.php';
}
else if($page=='profesi' && $aksi=='edit') {
    include $folder.'edit_profesi.php';
}
else if($page=='profesi' && $aksi=='multi_aksi') {
    include $folder.'aksi_multi.php';
}

else if($page=='profesi'){
    include $folder.'show_profesi.php';
}

