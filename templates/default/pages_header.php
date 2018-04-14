        <!-- Start navigation area -->
        <div id="navigation">

        	<div id="navigation_wrap">

                <!-- Start contact info area -->
                <div id="conteactinfo" style="font-weight: 900"><i class="fa fa-desktop"></i> <?php echo $settings['email_web']; ?>  &nbsp;&nbsp;&nbsp;  <strong><i class="fa fa-phone-square"></i> </strong> <?php echo $settings['phone_number']; ?></div>
                <!-- End contact info area -->
                <!-- Start navigation -->
                <div id="navi">
                
                    <ul class="cl-effect-15">
                    
                        <li><a <?php echo $beranda; ?> href="home.html" title="Beranda">Beranda</a></li>
                        <li><a <?php echo $blog; ?> href="blog.html" title="Blog" >Blog</a>
                        </li>
                        <li><a <?php echo $info; ?> href="javascript:;" title="Informasi Profil Sekolah">Profil Sekolah</a>
                        	<ul>
                                    <?php
                                    $info = $fquery->show_info();
                                    foreach ($info as $row) {
                                        echo "<li><a href='info-".$row['id_info']."-".strtolower(str_replace(" ","-",$row['nama_info'])).".html' title='$row[nama_info]'>".$row['nama_info']."</a></li>";
                                    }
                                    ?>
                            </ul>
                        </li>
                        <li><a <?php echo $team; ?> href="team.html" title="Informasi Profil Team">Profil Tim</a>
                        </li>
                        <li><a <?php echo $kontak; ?> href="kontak.html" title="Informasi Kontak">Kontak</a>
                        </li>
                        
                        <li><a href="forum/" title="Halaman Forum"> Forum</a></li>
                    </ul>
                
                </div>
                <!-- End navigation -->
                
			</div>
        
        </div>
        <!-- End navigation area -->
        <div class="clear"></div>
        <!-- Start Social & Logo area -->
        <div id="header_small">
        	<!-- Start Social area -->
        	<div class="social">
            	
                <ul>
                <li><a target="_blank" href="https://plus.google.com/u/0/112484329121410065388/" class="social-google"></a></li>
                <li><a target="_blank" href="http://www.facebook.com/robotic.pemrogram" class="social-facebook"></a></li>
                <li><a target="_blank" href="http://www.twitter.com/RPL_Soulution" class="social-twitter"></a></li>
                </ul>
                
            </div>
                <div class="search">
                <form action="pencarian.html" method="post" name="ajaxsearchform" id="ajaxsearchform">
                    <input class="input-search form-control" id="keyword" placeholder="Mesin pencarian informasi ..." type="text" name="keyword">
                    <input type="submit" name="search" value="SEARCH" class="button-search">
                </form>
            </div>
            <!-- End Socialarea -->
            
            <!-- Start Logo area -->
            <div id="logo">
                <img src="myassets/images/logo1.png">
            </div>
            <!-- End Logo area -->
            
        </div>
        <div class="clear"></div>
        <!-- End Social & Logo area -->

<?php
if($_GET['page']=='beranda' || $_GET['page']=='') {
    include "$folder/slider.php";
}
else {
    echo "";
}