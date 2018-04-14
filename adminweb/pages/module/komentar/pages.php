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
$folder = "pages/module/komentar/";
if($page=='komentar' && $aksi=='add_komentar') {
    include $folder.'add_komentar.php';
}
if($page=='komentar' && $aksi=='details') {
    include $folder.'details.php';
}

else if($page=='komentar'){
    include $folder.'show_komentar.php';
}

