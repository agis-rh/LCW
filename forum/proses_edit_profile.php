<?php
include 'config/koneksi.php';
$id=$_GET['id'];

    $a=mysql_query("UPDATE member_forum SET first_name='$_POST[first_name]', last_name='$_POST[last_name]', email='$_POST[email]', no_hp='$_POST[phone]', alamat='$_POST[address]'
    WHERE id_member='$id'");

header('location:?module=profile&id='.$_GET[id]);
   
?>