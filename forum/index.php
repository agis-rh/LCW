<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title> Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-black">



<?php
include "config/koneksi.php";

if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true){
	echo "Anda dalam keadaan Login, Anda bisa <a href=signout.php>Keluar</a> kalau Anda mau.";
}
else{
	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		echo "   <div class='form-box' id='login-box'>
            <div class='header'>Log in</div>
            <form action='' method='post'>
                <div class='body bg-gray'>
                    <div class='form-group'>
                        <input type='text' name='username' class='form-control' placeholder='User ID'/>
                    </div>
                    <div class='form-group'>
                        <input type='password' name='password' class='form-control' placeholder='Password'/>
                    </div>          
                    <div class='form-group'>
                        <input type='checkbox' id='cookie' name='remember_me'/> Ingatkan saya
                    </div>
                </div>
                <div class='footer'>                                                               
                    <button type='submit' class='btn bg-olive btn-block'>Log in</button>  
                    
                    
                    <a href='register.php' class='text-center'>Daftar anggota baru</a>
                </div>
            </form>

            <div class='margin text-center'>
                <span>Sosial media</span>
                <br/>
                <button class='btn bg-light-blue btn-circle'><i class='fa fa-facebook'></i></button>
                <button class='btn bg-aqua btn-circle'><i class='fa fa-twitter'></i></button>
                <button class='btn bg-red btn-circle'><i class='fa fa-google-plus'></i></button>

            </div>
        </div>";
	}
	else{
         date_default_timezone_set('Asia/jakarta');
         $waktu = date("Y-m-d/H:i:s");
	     $password=sha1($_POST['password']);
		 $sql = "SELECT * FROM	member_forum	
                 WHERE username='$_POST[username]' AND	password='$password'";
		$hasil = mysql_query($sql);
		$r=mysql_fetch_array($hasil);
		
		if(mysql_num_rows($hasil) == 0){
			echo "<br />
                    <section class='col-lg-10 connectedSortable login-box'>
                    <div class='col-md-5 '>
                    <div class='alert alert-danger' >
                    <i class='fa fa-lock'></i>
                    <b><marquee>username atau password anda tidak benar !</marquee></b><br />
                    </div><a href='index.php' class='btn btn-primary pull-left'><i class='fa fa-arrow-circle-left'></i> Coba Lagi</a>
                    </div>
                    </section>";
		}
		else{
            session_start();
			$_SESSION['signed_in'] = true;
			$_SESSION['username'] = $r['username'];
            $_SESSION['id_member'] = $r['id_member'];
            mysql_query("UPDATE member_forum SET aktif='Y', last_login='$waktu' WHERE username='$_POST[username]'");
  	         
		
					
			header('location:media.php?module=home');
		}	
	}
}


?>
</body>
</html>
