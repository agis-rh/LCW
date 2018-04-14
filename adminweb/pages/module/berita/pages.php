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
$folder = "pages/module/berita/";
if($page=='berita' && $aksi=='add_berita') {
    include $folder.'add_berita.php';
}
else if($page=='berita' && $aksi=='edit') {
    include $folder.'edit_berita.php';
}
else if($page=='berita'){
    include $folder.'show_berita.php';
}

