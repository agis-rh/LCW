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
$folder = "pages/module/sekolah/";
if($page=='info_sekolah' && $aksi=='add_info') {
    include $folder.'add_info.php';
}
else if($page=='info_sekolah' && $aksi=='edit') {
    include $folder.'edit_info.php';
}
else if($page=='info_sekolah'){
    include $folder.'info_sekolah.php';
}

