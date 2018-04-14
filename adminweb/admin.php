<?php
session_start();
include "../system/functions.php";
include "../system/menu_aktif.php";
// New Obejek
$fquery  = new Functions();
$paging  = new Paging();
if($_GET['page']=='do_backup') {
    $tg  = date("Y-m-d");
    $jm  = date("H:i:s");
    $fquery->add_log_team($id_team,'Membackup data (database)',$tg, $jm);
    do_backupdb();
}
else if(!empty($_SESSION['id_team'])) {
// Data login
$id_team = $_SESSION['id_team'];
$login   = $fquery->get_one_team($id_team);
$general = $fquery->get_one_setting();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php include ("title.php"); ?></title>
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="../photos/favicon/<?php echo $general['favicon'];?>">
	<!-- jQuery & JS files -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/script.js"></script>  
        <script src="tinymcpuk/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
        <script src="tinymcpuk/jscripts/tiny_mce/tiny_text.js" type="text/javascript"></script>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="../myassets/font-awesome/css/font-awesome.min.css">
</head>
<div id="loading" style="display:none"><img src="assets/images/loading.gif" /><br />Loading data.</div>
<body>
    <div id="load">
        
    </div>

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
                            <li class="v-sep"><a href="../" target="_blank" class="round button dark ic-left-arrow image-left">Website</a></li>
				<li class="v-sep"><a href="javascript:;" class="round button dark menu-user image-left">Sebagai <strong><?php echo $_SESSION['level'];?></strong></a>
					<ul>
                                            <li ><a href="admin.php?page=team&aksi=profil&id_team=<?php echo $_SESSION['id_team'];?>">Profil Saya</a></li>
                                            <li ><a href="admin.php?page=team&aksi=password">Sunting Password</a></li>
                                            <li ><a href="admin.php?page=do_backup">Backup Database</a></li>
					</ul> 
				</li>
			
                                <li class="v-sep"><a href="admin.php?page=messages" class="round button dark menu-email-special image-left"><span id="messages"></span></a></li>
                                <li class="v-sep"><a href="admin.php?page=logout" class="round button dark menu-logoff image-left">Log out</a></li>
                                <li><a href="javascript:;" class="round button blue ic-refresh image-left"><b><span id="jam"></span></b></a></li>
				
			</ul> <!-- end nav -->

					
			<form action="#" method="POST" id="search-form" class="fr">
				<fieldset>
					<input type="text" id="search-keyword" class="round button dark ic-search image-right" placeholder="Search..." />
					<input type="hidden" value="SUBMIT" />
				</fieldset>
			</form>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
                            <?php
                            if($_SESSION['level']=='admin') { ?>
                            <li><a href="admin.php?page=dashboard" <?php echo $dashboard; ?>><i class="fa fa-home"></i> Dashboard</a></li>
				<li><a href="admin.php?page=komentar" <?php echo $komentar; ?>><i class="fa fa-comment"></i> Komentar</a></li>
				<li><a href="admin.php?page=berita" <?php echo $berita; ?>><i class="fa fa-ambulance"></i> Data Berita</a></li>
                                <li><a href="admin.php?page=info_sekolah" <?php echo $info; ?>><i class="fa fa-info-circle"></i> Info Sekolah</a></li>
				<li><a href="admin.php?page=team" <?php echo $team; ?>><i class="fa fa-user"></i> Developer Team</a></li>
                                <li><a href="admin.php?page=member" <?php echo $member; ?>><i class="fa fa-users"></i> Anggota Forum</a></li>
				<li><a href="admin.php?page=general" <?php echo $umum; ?>><i class="fa fa-wrench"></i> Pengaturan Umum</a></li>
                            <?php
                            }
                            else { ?>
                                <li><a href="admin.php?page=dashboard" <?php echo $dashboard; ?>><i class="fa fa-home"></i> Dashboard</a></li>
				<li><a href="admin.php?page=komentar" <?php echo $komentar; ?>><i class="fa fa-comment"></i> Komentar</a></li>
				<li><a href="admin.php?page=berita" <?php echo $berita; ?>><i class="fa fa-ambulance"></i> Berita</a></li>
                                <li><a href="admin.php?page=info_sekolah" <?php echo $info; ?>><i class="fa fa-info-circle"></i> Info Sekolah</a></li>
                                <li><a href="admin.php?page=member" <?php echo $member; ?>><i class="fa fa-users"></i> Anggota Forum</a></li>
				
                            <?php }?>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
                        <a href="#" id="company-branding-small" class="fr"><img src="assets/images/company-logo.png" alt="Blue Hosting" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
        <div class="load-page">
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>MENU NAVIGASI</h3>
                                <ul class="nav">
                                    <?php
                                    if($_SESSION['level']=='admin') { ?>
                                        <li <?php echo $active_template; ?>><a href="admin.php?page=template">Pilih Tata letak</a></li>
                                        <li <?php echo $active_slide; ?>><a href="admin.php?page=slide">Slide Gambar</a></li>
                                        <li <?php echo $active_banner; ?>><a href="admin.php?page=banner">Banner Web</a></li>
                                        <li <?php echo $active_sensor; ?>><a href="admin.php?page=sensorkata">Sensor Kata</a></li>
                                        <li <?php echo $active_draft; ?>><a href="admin.php?page=draft">Draft Berita</a></li>
					<li <?php echo $active_katberita; ?>><a href="admin.php?page=kategori_berita">Kategori Berita</a></li>
                                        <li <?php echo $active_kattopik; ?>><a href="admin.php?page=kategori_topik">Kategori Topik</a></li>
					<li <?php echo $active_profesi; ?>><a href="admin.php?page=profesi">Akun Profesi</a></li>
                                        <li <?php echo $active_topik; ?>><a href="admin.php?page=topik">Topik Forum</a></li>
                                        <li <?php echo $active_sosmed; ?>><a href="admin.php?page=sosial_media">Sosial Media</a></li>
					<li <?php echo $active_logteam; ?>><a href="admin.php?page=log_team">Log Team</a></li>
                                        <li><a href="admin.php?page=logout">Log Out</a></li>
                                    <?php
                                    }
                                    else { ?>
                                        <li <?php echo $active_draft; ?>><a href="admin.php?page=draft">Draft Berita</a></li>
                                        <li <?php echo $active_katberita; ?>><a href="admin.php?page=kategori_berita">Kategori Berita</a></li>
                                        <li <?php echo $active_kattopik; ?>><a href="admin.php?page=kategori_topik">Kategori Topik</a></li>
                                        <li <?php echo $active_topik; ?>><a href="admin.php?page=topik">Topik Forum</a></li>
                                        <li <?php echo $active_logteam; ?>><a href="admin.php?page=log_team">Log Aktifitas</a></li>
                                        <li><a href="admin.php?page=logout">Log Out</a></li>
                                    <?php } ?>
                                        
				</ul>
				
				
				<h3>Team Online</h3>
                                <ul id="online">
                                                                            
				</ul>
                                

				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
			<?php
                        require_once ("konten.php");
                        ?>
		
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
        </div>
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright <?php echo date("Y");?> SMKN 1 Lemahsugih. All rights reserved.</p>
		<p><strong>Bright Side Of Technology</strong></p>
	
	</div> <!-- end footer -->
        <script>
            $(function() {
                $('.load-ajax').click(function() {
                    $('.load-page').fadeIn(2000);
                        var url = $(this).attr('href');
                        $('.load-page').load(url);
                        
                        return false;
                });
            });
            function messages(){
                $.ajax({
                    url: "pages/module/buku_tamu/messages.php",
                    cache: false,
                    success: function(msg){
                        $("#messages").html(msg);
                    }
                });
                var waktu = setTimeout("messages()",1000);
            }
            function online(){
                $.ajax({
                    url: "online.php",
                    cache: false,
                    success: function(msg){
                        $("#online").html(msg);
                    }
                });
                var waktu = setTimeout("online()",1000);
            }
             function jam(){
                $.ajax({
                    url: "jam.php",
                    cache: false,
                    success: function(msg){
                        $("#jam").html(msg);
                    }
                });
                var waktu = setTimeout("jam()",1000);
            }
            $(document).ready(function(){
                messages();
                jam();
                online();
                $("#load").fadeOut(1000);
            });     
    </script>
</body>
</html>

<?php
}
else {
    header('Location: index.php');
}
?>