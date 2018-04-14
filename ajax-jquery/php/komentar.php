<?php
/* 
 * *****************************************************************************
 * Filename  : login_proses.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 * koneksi database
 */

require_once ("../../system/functions.php");
// membuat objek baru
$fquery = new Functions();
	$is_ajax = $_REQUEST['is_ajax'];
	if(isset($is_ajax) && $is_ajax) {
            $id_berita  = $_REQUEST['id_berita'];
            $nama       = $_REQUEST['nama'];
            $email      = $_REQUEST['email'];
            $konten     = $_REQUEST['konten'];
            $tanggal    = date("Y-m-d");
            $waktu      = date("H:i:s");
            
            $settings   = $fquery->get_one_setting();
            if($settings['filter_komentar']=='Y') {
                $send = $fquery->add_confirm_komentar($id_berita,$nama,$email,$konten,$tanggal,$waktu);
                if($send==1) {
                // response AJAX
                echo "success";
                }
            }
            else {
                $send = $fquery->add_live_komentar($id_berita,$nama,$email,$konten,$tanggal,$waktu);
                if($send==1) {
                // response AJAX
                echo "success";
                }
            }
}



