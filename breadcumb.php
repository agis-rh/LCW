<?php
/* 
 * *****************************************************************************
 * Filename  : breadcumb.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */

$halaman        = $_GET['page'];
$id_berita      = $_GET['id_berita'];
$id_kategori    = $_GET['id_kategori'];
$id_profil      = $_GET['id_profil'];
$id_user        = $_GET['id_user'];
if(isset($id_berita)) {
    $data = $fquery->get_one_berita($id_berita);
    echo "Blog artikel dengan judul : $data[judul]";
}
else if(isset($id_profil)) {
    $data = $fquery->profil_team($id_profil);
    echo "Info Profil ".$data[first_name]." ".$data[last_name]."";
}
else if(isset($id_kategori)) {
    $data = $fquery->get_one_kategori($id_kategori);
    echo "Blog artikel dengan kategori : ".$data[nama]."";
}
else if(isset($id_user)) {
    $data = $fquery->get_one_team($id_user);
    echo "Kumpulan blog artikel oleh : ".$data['first_name']." ".$data['last_name']."";
}



else if($halaman=='blog') {
    echo "Halaman kumpulan blog artikel";
}
else if($halaman=='kontak') {
    echo "Silahkan untuk menghubungi kami";
}
else if($halaman=='info') {
    echo "Informasi Profil Sekolah";
}

else if($halaman=='team') {
    echo "Informasi Profil Tim";
}
else {
    echo "Selamat datang di situs $settings[nama_web]";
}


