<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title><?php require_once ("judul.php"); ?></title>
<!-- Meta data !-->
<meta name="description" content="<?php echo $settings['meta_deskripsi']; ?>" />
<meta name="keywords" content="<?php echo $settings['meta_keyword']; ?>" />
<meta name="apple-mobile-web-app-capable" content="yes" /> 
<meta name="apple-mobile-web-app-status-bar-style" content="grey" /> 
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" /> 
<!-- Link untuk rel !-->
<link rel="shortcut icon" href="photos/favicon/<?php echo $settings['favicon']; ?>" /> 
<link rel="stylesheet" href="myassets/css/main.css" type="text/css">
<link rel="stylesheet" href="myassets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="myassets/css/coba.css">

<!-- Data JavaScript !-->
<script src="myassets/js/jquery-1.8.3.min.js"></script>
<script src="myassets/js/jquery.nivo.slider.js"></script>   
<script src="myassets/js/custom.js"></script>
<script src="myassets/js/bootstrap.js"></script>
<script src="myassets/js/simpleslider.js"></script>  
<script src="myassets/js/nicescroll.min.js"></script>
<script>
function statistik(){
                $.ajax({
                    url: "ajax-jquery/php/statistik.php",
                    cache: false,
                    success: function(msg){
                        $("#statistik").html(msg);
                    }
                });
                var waktu = setTimeout("statistik()",1000);
}
jQuery(document).ready(function() {
    statistik();
});
</script>
</head>

<body onload="initialize()">
    <div id="load"> <div class="load">Loading .....</div></div>
<div id="header">

    <?php 
    require_once("system/menu.aktif.php");
    require_once("$folder/pages_header.php"); ?>
    
</div>
    <div id="main" style="margin-top: 20px;">
        
    <!-- Start H1 Title -->
    <div class="bawah_header">
        <div class="right-bawah-header">
            <h1 class="animation-words"><?php require_once("breadcumb.php"); ?></h1>
        </div>
        
    </div>
    <!-- End H1 Title -->
    <!-- Start Main Body Wrap -->
   
    <div id="main-wrap">
        
       <?php
        require_once ("$folder/konten.php");
       ?>
    
    </div>
    <!-- End Main Body Wrap -->

</div>
<!-- Start Footer -->
<div id="footer">
	<!-- Start Footer Top -->
	<div id="footertop">
            <?php
                require_once ("$folder/pages_footertop.php");
            ?>
	</div>
	<!-- End Footer Top -->
    <div class="clear"></div>
    <!-- Start Footer Bottom -->
    <div id="footerbottom">
     
        <?php
            require_once ("$folder/pages_footerbottom.php");
        ?>
                
    </div>
    <!-- End Footer Bottom -->
</div>
<!-- End Footer -->
<!-- Start Scroll To Top Div -->
<div id="scrolltab"></div>
<!-- End Scroll To Top Div -->
</body>
</html>