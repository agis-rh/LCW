<?php
/* 
 * *****************************************************************************
 * Filename  : konten.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$page   = $_GET['page'];
switch ($page) {
    case "dashboard":
        include "pages/dashboard.php";
        break;
/* ********************************************************************* */
    case "template":
        include "pages/module/template/pages.php";
        break;
/* ********************************************************************* */
    case "banner":
        include "pages/module/banner/pages.php";
        break;
/* ********************************************************************* */
    case "sensorkata":
        include "pages/module/sensorkata/pages.php";
        break;
/* ********************************************************************* */
    case "slide":
        include "pages/module/slide/pages.php";
        break;
    case "info_sekolah":
        include "pages/module/sekolah/pages.php";
        break;
/* ********************************************************************* */
    case "general":
        include "pages/module/settings/pages.php";
        break;
/* ********************************************************************* */
    case "berita":
        include "pages/module/berita/pages.php";
        break;
/* ********************************************************************* */
    case "kategori_berita":
        include "pages/module/kategori_berita/pages.php";
        break;
/* ********************************************************************* */
    case "topik":
        include "pages/module/topik/pages.php";
        break;
/* ********************************************************************* */
    case "member":
        include "pages/module/member/pages.php";
        break;
/* ********************************************************************* */
    case "team":
        include "pages/module/team/pages.php";
        break;
/* ********************************************************************* */
    case "komentar":
        include "pages/module/komentar/pages.php";
        break;
/* ********************************************************************* */
    case "draft":
        include "pages/module/draft/pages.php";
        break;
/* ********************************************************************* */
    case "profesi":
        include "pages/module/profesi/pages.php";
        break;
/* ********************************************************************* */
    case "set_komentar":
        include "pages/module/settings/pages.php";
        break;
/* ********************************************************************* */
    case "kategori_topik":
        include "pages/module/kategori_topik/pages.php";
        break;
/* ********************************************************************* */
    case "sosial_media":
        include "pages/module/sosial_media/pages.php";
        break;
/* ********************************************************************* */
    case "log_team":
        include "pages/module/log_team/pages.php";
        break;
/* ********************************************************************* */
    case "log_member":
        include "pages/module/log_member/pages.php";
        break;
/* ********************************************************************* */
    case "messages":
        include "pages/module/buku_tamu/pages.php";
        break;
/* ********************************************************************* */
    case "logout":
        include "logout.php";
        break;
/* ********************************************************************* */
    default:
        include "pages/dashboard.php";
        break;
}

