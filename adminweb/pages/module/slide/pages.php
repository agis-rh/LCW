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
$folder = "pages/module/slide/";
if($page=='slide' && $aksi=='add_slide') {
    include $folder.'add_slide.php';
}
else if($page=='slide' && $aksi=='edit') {
    include $folder.'edit_slide.php';
}
else if($page=='slide'){
    include $folder.'show_slide.php';
}

