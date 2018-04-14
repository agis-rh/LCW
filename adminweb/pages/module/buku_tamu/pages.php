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
$folder = "pages/module/buku_tamu/";
if($page=='messages' && $aksi=='read') {
    include $folder.'read.php';
}
else if($page=='messages'){
    include $folder.'show_pesan.php';
}

