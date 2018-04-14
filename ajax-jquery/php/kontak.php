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
            $nama       = $_REQUEST['nama'];
            $email      = $_REQUEST['email'];
            $konten     = $_REQUEST['konten'];
            $subjek     = $_POST['subjek'];
            $web        = $_POST['web'];
            $tanggal    = date("Y-m-d");
            $waktu      = date("H:i:s");
            $send       = $fquery->add_buku_tamu($nama,$email,$situs,$subjek,$konten,$tanggal,$waktu);
            if($send==1) {
                // response AJAX
                echo "success";
            }
            else {
                echo "error";
            }
}



