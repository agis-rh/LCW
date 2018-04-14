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
$folder = "pages/module/topik/";
if($page=='topik' && $aksi=='add_topik') {
    include $folder.'add_topik.php';
}
else if($page=='topik' && $aksi=='edit') {
    include $folder.'edit_topik.php';
}
else if($page=='topik'){
    include $folder.'show_topik.php';
}

