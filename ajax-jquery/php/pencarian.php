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
                $keyword  = $_REQUEST['id_berita'];
                // response AJAX
                echo "success";
        }



