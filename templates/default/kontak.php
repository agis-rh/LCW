<?php

if(isset($_REQUEST['contactformid']) && $_REQUEST['contactformid'] == 1){
	
	$youremail = "Email Address Here"; // Enter your email here!!

	$nama   = $_POST["nama"];
	$email  = $_POST["email"];
	$subjek = $_POST["subjek"];
	$konten = $_POST["konten"];
	$web    = $_POST['web'];
	echo '<p>Thank you for your email, a member of our staff will contact you soon regarding your email!</p>';

} else {
	echo '<p>Pesan gagal dikirim, silahkan untuk mencoba nya kembali!</p>';
}