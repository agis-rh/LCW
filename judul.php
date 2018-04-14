<?php
/* 
 * *****************************************************************************
 * Filename  : judul.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$id_berita      = $_GET['id_berita'];
$id_info        = $_GET['id_info'];
$id_kategori    = $_GET['id_kategori'];
$id_profil      = $_GET['id_profil'];
$id_user        = $_GET['id_user'];

$title      = $_GET['page'];
if(isset($id_berita)) {
    $data = $fquery->get_one_berita($id_berita);
    echo "$data[judul] - ".$settings['nama_web']."";
}
else if(isset($id_info)) {
    $data = $fquery->get_one_info($id_info);
    echo "Informasi $data[nama_info] - ".$settings['nama_web']."";
}
else if(isset($id_profil)) {
    $data = $fquery->profil_team($id_profil);
    echo "Info Profil ".$data[first_name]." ".$data[last_name]." - ".$settings['nama_web']."";
}
else if(isset($id_kategori)) {
    $data = $fquery->get_one_kategori($id_kategori);
    echo "Blog artikel dengan kategori ".$data[nama]." - ".$settings['nama_web']."";
}
else if(isset($id_user)) {
    $data = $fquery->get_one_team($id_user);
    echo "Blog artikel oleh ".$data['first_name']." ".$data['last_name']." - ".$settings['nama_web']."";
}
else if($title=='blog') {
    echo "Blog - ".$settings['nama_web']."";
}
else if($title=='kontak') {
    echo "Informasi Kontak - ".$settings['nama_web']."";
}
else if($title=='team') {
    echo "Informasi Profil Tim - ".$settings['nama_web']."";
}
else {
    echo "Teknologi Masa Depan - ".$settings['nama_web']."";
}



