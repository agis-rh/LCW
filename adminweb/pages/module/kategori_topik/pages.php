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
$folder = "pages/module/kategori_topik/";
if($page=='kategori_topik' && $aksi=='add_kategori') {
    include $folder.'add_kategori.php';
}
else if($page=='kategori_topik' && $aksi=='edit') {
    include $folder.'edit_kategori.php';
}
else if($page=='kategori_topik' && $aksi=='multi_aksi') {
    include $folder.'aksi_multi.php';
}
else if($page=='kategori_topik'){
    include $folder.'show_kategori.php';
}

