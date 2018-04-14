<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title> Registration </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Daftar anggota forum</div>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="first_name" required="required" class="form-control" placeholder="Nama"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name"  class="form-control" placeholder="Nama akhiran"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" required="required" class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" required="required" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" required="required" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" required="required" class="form-control" placeholder="Kontak"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" required="required" class="form-control" placeholder="Alamat"/>
                    </div>
                    <div class="form-group">
                                            <label for="exampleInputFile">Foto</label>
                                            <input type="file" name="foto">
                    </div>
                    </div>

                <div class="footer">                    
                    <button type="submit" name="save" class="btn bg-olive btn-block">Simpan</button>
                    <a href="index.php" class="text-center">Login akun anggota forum</a>
                </div>
               </form>

            <div class="margin text-center">
                <span>Sosial media</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div> 
    </body>
</html>



<?php
include 'config/koneksi.php';
if(isset($_POST['save'])){
    $tanggal = date("Y-m-d");
    $first=addslashes(strip_tags($_POST['first_name']));
    $last=addslashes(strip_tags($_POST['last_name']));
    $username=addslashes(strip_tags($_POST['username']));
    $password=sha1($_POST['password']);
    $email=addslashes(strip_tags($_POST['email']));
    $phone=addslashes(strip_tags($_POST['phone']));
    $address=addslashes(strip_tags($_POST['address']));
    
    $file   = $_FILES['foto']['tmp_name'];
    $filename= $_FILES['foto']['name'];
    $dir    = "member/";
    $upload = $dir.$filename;
    if(move_uploaded_file($file,$upload)) {
    
    $query="INSERT INTO member_forum VALUES('','$first','$last','$username','$password','$filename','$email','$phone','$address','$tanggal','','Y')";
    $sql=mysql_query($query);
    if($sql){
        echo "<script>alert('Pendaftaran Berhasil, Silahkan Log In !');</script>";
        header('location:index.php');
    }else{
      echo "<script>alert('Pendaftaran Gagal, Coba Lagi !');</script>";
        header('location:register.php');  
    }
    }
    else {
        echo "<script>alert('Gagal upload');<script>";
    }
}
?>