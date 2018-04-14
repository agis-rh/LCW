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
$folder = "pages/module/banner/";
if($page=='banner' && $aksi=='add_banner') {
    include $folder.'add_banner.php';
}
else if($page=='banner' && $aksi=='edit') {
    include $folder.'edit_banner.php';
}
else if($page=='banner'){
    include $folder.'show_banner.php';
}

