<!DOCTYPE html>
<?php
session_start();
include "../system/functions.php";
$fquery = new Functions();
$general = $fquery->get_one_setting();
if(empty($_SESSION['id_team'])) {
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login Control Panel</title>
	
	<!-- Stylesheets -->
	    <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/stylesheet.css">
        <link rel="shortcut icon" href="../photos/favicon/<?php echo $general['favicon'];?>"
        

	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body>

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width">
		
                    <a href="../index.php" class="round button dark ic-left-arrow image-left ">Return to website</a>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header">
		
		<div class="page-full-width cf">
	
			<div id="login-intro" class="fl">
			
				<h1>Control Panel</h1>
				<h5>Silahkan masukan akun dibawah ini dengan benar !</h5>
			
			</div> <!-- login-intro -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 39px height. -->
                        <a href="#" id="company-branding" class="fr"><img src="assets/images/company-logo.png" alt="Blue Hosting" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
	
		<form action="" method="POST" id="login-form">
		
			<fieldset>

				<p>
					<label for="login-username">username or email</label>
                                        <input required type="text" name="user_or_email" placeholder="Username atau email" id="login-username" class="round form-control full-width-input" autofocus />
				</p>

				<p>
					<label for="login-password">password</label>
                                        <input required type="password" name="password"  placeholder="Password anda"id="login-password" class="round form-control full-width-input" />
				</p>
				
				
                                <input type="submit" name="submit" value="LOG IN" class="button round blue image-right ic-lock">

			</fieldset>
                        <?php
                        if(isset($_POST['submit'])) {
                            $tanggal           = date("Y-m-d");
                            $waktu             = date("H:i:s");
                            $time              = date("Y-m-d H:i:s");
                            $useroremail       = anti_injection($_POST['user_or_email']);
                            $password          = anti_injection(md5($_POST['password']));

                            // pastikan username dan password adalah berupa huruf atau angka.
                            
                                $login_username      = $fquery->login_username($useroremail,$password);
                                $login_email         = $fquery->login_email($useroremail,$password);
                                
                                $jumlah_login_username     = mysql_num_rows($login_username);
                                $jumlah_login_email        = mysql_num_rows($login_email);
                                
                                $data_one       = mysql_fetch_array($login_username);
                                $data_two       = mysql_fetch_array($login_email);
                                
                                if($jumlah_login_username > 0) {
                                    
                                    session_start();
                                    $_SESSION['KCFINDER']=array();
                                    $_SESSION['KCFINDER']['disabled'] = false;
                                    $_SESSION['KCFINDER']['uploadURL'] = "upload/";
                                    $_SESSION['KCFINDER']['uploadDir'] = "";
                                    
                                    $_SESSION['id_team']    = $data_one['id_team'];
                                    $_SESSION['level']      = $data_one['level'];
                                    // Online
                                    $fquery->online($data_one['id_team']);
                                    $fquery->add_log_team($data_one['id_team'],'Login control panel', $tanggal, $waktu);
                                    $fquery->last_login($time, $data_one['id_team']);
                                    echo "<script>window.location='admin.php';</script>";
                                }
                                else {
                                        if($jumlah_login_email > 0) {

                                            session_start();
                                            $_SESSION['KCFINDER']=array();
                                            $_SESSION['KCFINDER']['disabled'] = false;
                                            $_SESSION['KCFINDER']['uploadURL'] = "upload/";
                                            $_SESSION['KCFINDER']['uploadDir'] = "";
                                            $_SESSION['id_team']    = $data_two['id_team'];
                                            $_SESSION['level']      = $data_two['level'];
                                            // Online
                                            $fquery->online($data_two['id_team']);
                                            $fquery->add_log_team($data_two['id_team'],'Login control panel', $tanggal, $waktu);
                                            $fquery->last_login($time, $data_two['id_team']);
                                            echo "<script>window.location='admin.php';</script>";
                                        }
                                        else {
                                            echo "<br/><div class='error-box round'><b>Failed access !</b> username atau password salah, silahkan dicek kembali.</div>";   
                                        }
                                }
                        }
                        ?>
		</form>
		
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright <?php echo date("Y");?> SMKN 1 Lemahsugih. All rights reserved.</p>
		<p><strong>Bright Side Of Technology</strong></p>
	
	</div> <!-- end footer -->

</body>
</html>
<?php
}
else {
    header("Location: admin.php");
}