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
$folder = "pages/module/team/";
if($page=='team' && $aksi=='add_team') {
    include $folder.'add_team.php';
}
else if($page=='team' && $aksi=='edit') {
    include $folder.'edit_team.php';
}
else if($page=='team' && $aksi=='password') {
    include $folder.'edit_password.php';
}
else if($page=='team' && $aksi=='profil') {
    include $folder.'profil.php';
}
else if($page=='team' && $aksi=='edit_profil') {
    include $folder.'edit_profil.php';
}

else if($page=='team'){
    include $folder.'show_team.php';
}

