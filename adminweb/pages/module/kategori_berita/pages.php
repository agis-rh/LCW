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
$folder = "pages/module/kategori_berita/";
if($page=='kategori_berita' && $aksi=='add_kategori') {
    include $folder.'add_kategori.php';
}
else if($page=='kategori_berita' && $aksi=='edit') {
    include $folder.'edit_kategori.php';
}
else if($page=='kategori_berita' && $aksi=='multi_aksi') {
    include $folder.'aksi_multi.php';
}
else if($page=='kategori_berita'){
    include $folder.'show_kategori.php';
}

