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
$folder = "pages/module/draft/";
if($page=='draft' && $aksi=='add_draft') {
    include $folder.'add_draft.php';
}
else if($page=='draft' && $aksi=='edit') {
    include $folder.'edit_draft.php';
}
else if($page=='draft'){
    include $folder.'show_draft.php';
}

