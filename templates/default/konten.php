<?php
/* 
 * *****************************************************************************
 * Filename  : konten.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */

$page   = $_GET['page'];
switch($page) {
    case "home":
        include "$folder/pages_home.php";
        break;
    case "pencarian":
        include "$folder/pages_pencarian.php";
        break;
    
    case "blog":
        include "$folder/pages_blog.php";
        break;
    case "team":
        include "$folder/pages_tim.php";
        break;
    case "profil":
        include "$folder/pages_profil.php";
        break;
    
    case "info":
        include "$folder/pages_info.php";
        break;
    case "artikel":
        include "$folder/detail_artikel.php";
        break;
    case "kategori":
        include "$folder/pages_kategori.php";
        break;
    case "user":
        include "$folder/pages_bloguser.php";
        break;
    
    case "kontak":
        include "$folder/pages_kontak.php";
        break;
    case "galeri":
        include "pages/pages_gallery.php";
        break;
    default :
        include "$folder/pages_home.php";
        break;
}

