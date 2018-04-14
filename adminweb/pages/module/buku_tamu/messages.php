<?php
/* 
 * *****************************************************************************
 * Filename  : .php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
include "../../../../system/functions.php";
$fquery = new Functions();
$data   = $fquery->noread_bukutamu();
$jumlah = mysql_num_rows($data);
if($jumlah > 0) {
    echo "$jumlah new messages";
}
else {
    echo "No new messages";
}

