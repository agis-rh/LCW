<?php
/* 
 * *****************************************************************************
 * Filename  : title.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$hal    = $_GET['page'];
if($hal=='dashboard' || $hal=='') {
    echo "Halaman Dashboard - control panel";
}
else if($hal=='komentar') {
    echo "Data Komentar - control panel";
}

else if($hal=='berita') {
    echo "Data Berita - control panel";
}

else if($hal=='banner') {
    echo "Data Banner Web - control panel";
}

else if($hal=='sensorkata') {
    echo "Data kata yang disensor - control panel";
}

else if($hal=='info_sekolah') {
    echo "Data Info Sekolah- control panel";
}


else if($hal=='team') {
    echo "Data Team Developer - control panel";
}

else if($hal=='member') {
    echo "Data Member Forum- control panel";
}


else if($hal=='general') {
    echo "Pengaturan Umum - control panel";
}





else if($hal=='draft') {
    echo "Data Draft Berita - control panel";
}

else if($hal=='kategori_berita') {
    echo "Data Kategori Berita - control panel";
}

else if($hal=='kategori_topik') {
    echo "Data Kategori Topik- control panel";
}


else if($hal=='profesi') {
    echo "Data Akun Profesi User - control panel";
}

else if($hal=='topik') {
    echo "Data Topik Forum- control panel";
}


else if($hal=='sosial_media') {
    echo "Sosial Media - control panel";
}

else if($hal=='log_team') {
    echo "Data Log Team Developer - control panel";
}


else if($hal=='log_member') {
    echo "Data Log Member Forum- control panel";
}
else if($hal=='messages') {
    echo "Data Pesan (Buku Tamu) - control panel";
}
else if($hal=='template') {
    echo "Data template web - control panel";
}
else if($hal=='slide') {
    echo "Data slide gambar - control panel";
}








