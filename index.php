<?php
/* 
 * *****************************************************************************
 * Filename  : index.php                                                      
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$filename   = "system/connection.php";
if(!file_exists($filename)) {
    header('location: installer/install.php');
}
else {
    // menyisipkan functions ---------------------------------------------------
    require_once ("system/functions.php");
    require_once ("system/sensor.kata.php");

    // membuat objek baru
    $fquery     = new Functions();
    $paging     = new PagingHomepage();
    $pagingid   = new PagingId();
    $settings   = $fquery->get_one_setting();

    // Template web ------------------------------------------------------------

    $template   = $fquery->get_template();
    $folder     = $template['folder'];
    require_once ("$folder/template.php");

}
/*
 * SMKN 1 Lemahsugih ***********************************************************
 */