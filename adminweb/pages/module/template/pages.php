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
$folder = "pages/module/template/";
if($page=='template' && $aksi=='add_template') {
    include $folder.'add_template.php';
}
else if($page=='template' && $aksi=='edit') {
    include $folder.'edit_template.php';
}
else if($page=='template'){
    include $folder.'show_template.php';
}

