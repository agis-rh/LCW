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
$folder = "pages/module/member/";
if($page=='member' && $aksi=='add_member') {
    include $folder.'add_member.php';
}
else if($page=='member' && $aksi=='edit') {
    include $folder.'edit_member.php';
}
else if($page=='member'){
    include $folder.'show_member.php';
}

