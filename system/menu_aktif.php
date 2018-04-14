<?php
/* 
 * *****************************************************************************
 * Filename  : .php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$hal    = $_GET['page'];
if($hal=='dashboard' || $hal=='') {
    $dashboard  = "class='active-tab dashboard-tab'";
}
else {
    $dashboard  = "";
}

if($hal=='komentar') {
    $komentar  = "class='active-tab dashboard-tab'";
}
else {
    $komentar  = "";
}

if($hal=='berita') {
    $berita  = "class='active-tab dashboard-tab'";
}
else {
    $berita  = "";
}

if($hal=='info_sekolah') {
    $info  = "class='active-tab dashboard-tab'";
}
else {
    $info  = "";
}

if($hal=='team') {
    $team  = "class='active-tab dashboard-tab'";
}
else {
    $team  = "";
}

if($hal=='member') {
    $member  = "class='active-tab dashboard-tab'";
}
else {
    $member  = "";
}

if($hal=='general') {
    $umum  = "class='active-tab dashboard-tab'";
}
else {
    $umum  = "";
}




if($hal=='template') {
    $active_template  = "class='active-nav'";
}
else {
    $active_template  = "";
}

if($hal=='sensorkata') {
    $active_sensor  = "class='active-nav'";
}
else {
    $active_sensor  = "";
}

if($hal=='slide') {
    $active_slide  = "class='active-nav'";
}
else {
    $active_slide  = "";
}
if($hal=='draft') {
    $active_draft = "class='active-nav'";
}
else {
    $active_draft  = "";
}

if($hal=='kategori_berita') {
    $active_katberita = "class='active-nav'";
}
else {
    $active_katberita  = "";
}

if($hal=='kategori_topik') {
    $active_kattopik = "class='active-nav'";
}
else {
    $active_kattopik  = "";
}

if($hal=='profesi') {
    $active_profesi = "class='active-nav'";
}
else {
    $active_profesi  = "";
}

if($hal=='topik') {
    $active_topik = "class='active-nav'";
}
else {
    $active_topik  = "";
}

if($hal=='sosial_media') {
    $active_sosmed = "class='active-nav'";
}
else {
    $active_sosmed  = "";
}

if($hal=='log_team') {
    $active_logteam = "class='active-nav'";;
}
else {
    $active_logteam  = "";
}

if($hal=='banner') {
    $active_banner = "class='active-nav'";;
}
else {
    $active_banner  = "";
}

if($hal=='set_komentar') {
    $active_setkomentar = "class='active-nav'";;
}
else {
    $active_setkomentar  = "";
}







