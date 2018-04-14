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
$folder = "pages/module/log_team/";
if($page=='log_team' && $aksi=='add_log') {
    include $folder.'add_log_team.php';
}
else if($page=='log_team'){
    include $folder.'show_logs.php';
}

