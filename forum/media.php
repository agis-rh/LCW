<?php
error_reporting(0);
session_start();
include 'config/koneksi.php';
include 'config/paging.php';
include 'config/paging.id.php';
$paging = new Paging();
$pagingid = new PagingId();
if($_SESSION['signed_in'] ==true) {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forum</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
    
<!-----------body--------->
    <body class="skin-blue">
    <header class="header">
    <a href="?module=home" class="logo">
    <i class="fa fa-comments"></i>     Forum</a>
            
            
            
<!----------logout--------->
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="logout.php" class="dropdown-toggle" title="Logout" data-toggle="dropdown">
                                <i class="fa fa-power-off"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
      
      
<!----------online profie---->  
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="left-side sidebar-offcanvas">
                <section class="sidebar">
                    <div class="user-panel">



<!-------name user------->
<?php
include 'koneksi.php';
$tampil="select * from member_forum where id_member='$_SESSION[id_member]'";
$sql=mysql_query($tampil);
while($data=mysql_fetch_array($sql)){
    
                echo"<div class='pull-left image'>
                    <img src='member/$data[image]' width='178px' height='178px' class='img-circle' alt='User Image' />
                    </div>
                    <div class='pull-left info'>
                    <p>Hello, $data[first_name] $data[last_name]</p>";
                }
?>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    
    
    
                  
<!--------sidebar menu-------->
<ul class="sidebar-menu">
<li class="active">
<a href="?module=home">
<i class="fa fa-home"></i> <span>Beranda</span>
</a>
</li>

<li>
<a href="?module=member">
<i class="fa fa-group"></i> <span>Anggota</span>
</a>
</li>

<li>
<a href="?module=newtopic">
<i class="fa fa-edit"></i> <span>Buat Topik</span> <small class="badge pull-right bg-green">new</small>
</a>
</li>

<li>
<a href="?module=profile">
<i class="fa fa-user"></i> <span>Profil</span> 
</a>
</li>

<li>
<a href="?module=mytopics">
<i class="fa fa-clipboard"></i> <span>Topik Saya</span> 
</a>
</li>

<li>
<a href="logout.php">
<i class="fa fa-sign-out"></i> <span>Logout</span>
</a>
</li>
</ul>
</section>
<!--------end sidebar-------->





</aside>
<aside class="right-side">







<!-------title--------->          
<section class="content-header">
<h1><small>Copyright &copy; 2015</small></h1>
<ol class="breadcrumb">
<li><a href="?module=home"><i class="fa fa-group"></i> Forum</a></li>
<li class="active"><?php include "config/breadcrumb.php";?></li>
</ol>
</section>
<br />



<!--------content area---->
<?php
include "konten.php";
?> 


</div>
</section>
</aside>
</div>
</body>
</html>
<?php
}
else {
    header("location: index.php");
}