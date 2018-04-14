<?php
/* 
 * *****************************************************************************
 * Filename  : .php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$hal    = $_GET['page'];
if($hal=='beranda' || $hal=='') {
    $beranda  = "class='active-menu'";
}
else {
    $beranda  = "";
}

if($hal=='blog' || $hal=='user' || $hal=='kategori' || $hal=='artikel'  ) {
    $blog  = "class='active-menu'";
}
else {
    $blog  = "";
}

if($hal=='team' || $hal=='profil') {
    $team  = "class='active-menu'";
}
else {
    $team  = "";
}

if($hal=='info') {
    $info  = "class='active-menu'";
}
else {
    $info  = "";
}
if($hal=='kontak') {
    $kontak  = "class='active-menu'";
}
else {
    $kontak  = "";
}
