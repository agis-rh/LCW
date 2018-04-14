<script src="myassets/js/jquery.isotope.min.js"></script> 
<script>
$(document).ready(function(){

    var $container = $('#portfolio-container')
    // initialize Isotope
        $container.isotope({
            // options...
            resizable: false, // disable normal resizing
            layoutMode : 'fitRows',
			itemSelector : '.element3',
            animationEngine : 'best-available',

            // set columnWidth to a percentage of container width
            masonry: { columnWidth: $container.width() / 5 }
        });

        // update columnWidth on window resize
        $(window).smartresize(function(){
            $container.isotope({
            // update columnWidth to a percentage of container width
            masonry: { columnWidth: $container.width() / 5 }
            });
        });
        $container.imagesLoaded( function(){

                $container.isotope({
            // options...
                });
        });

        $('#portfolio-filter a').click(function(){
            var selector = $(this).attr('data-filter');
            $container.isotope({ filter: selector });
            return false;
        });
});
</script>
        <!-- End Box -->
        
        <!-- Start Box -->
        <div class="boxes-full">
           	<div class="boxes-padding fullpadding">
                    <div class="split3">
                        <h3>Tentang profesi Tim</h3>
                        <p>
                            Ada beberapa profesi dalam anggota tim situs ini meliputi profesi sebagai 
                            <?php
                            $kat = $fquery->show_profesi();
                            foreach ($kat as $tim) {
                                echo strtolower($tim['nama']).', ';
                            }
                            ?> dan lainnya.
                        </p>
                    </div>
                <!-- Start Quater Split Section -->
            	<?php
                $kattim = $fquery->show_profesi();
                foreach ($kattim as $timprof) {
                    echo "<div class='split3'>
                
                            <h3>".$timprof['nama']."</h3>

                            <p>".$timprof['keterangan']."</p>
                    
                        </div>";
                }
                ?>
                <div class="clear"></div>
                
                
                
                
                
                <center>
                	<!-- Start Portfolio Filter -->
               	  <div id="portfolio-filter">
                      <br>
                    	<ul>
                            <li><a href="#portfolio-filter" title="All" class="whitebutton smallsmoothrectange" data-filter="*">Semua Profesi</a></li>
                            
                            <?php
                            $profesi2   = $fquery->show_profesi();
                            foreach($profesi2 as $profesi3) {
                                echo "<li><a href='#portfolio-filter' title='$profesi3[nama]' class='whitebutton smallsmoothrectange' data-filter='.".str_replace(" ","-",$profesi3['nama'])."'>$profesi3[nama]</a></li>";
                            }
                            ?>
                            
                        
                        </ul>
                    
                    </div>
                </center>
            	<!-- End None Split Section -->
                    
            </div>

            <span class="box-arrow"> </span>
        
        	<div class="boxes-padding fullpadding">
            	
                <!-- Start None Split Section -->
            	<div class="splitnone">
                
                	<div id="portfolio-container">
                    
                    	<!-- Start 4 column portfolio -->
                        <?php
                        $team   = $fquery->show_team();
                        foreach ($team as $tim) {
                        echo "<div class='element3 ".str_replace(" ","-",$tim['profesi'])."'>
                        
                        	<div class='portfoliowrap'>
                                                
                                <div class='title'>".$tim['first']." ".$tim['last']."<span class='titlearrow'></span></div>
                                <div class='portfolioimage '><a href='#show-$tim[id_team]' data-toggle='modal' title='Klik untuk melihat profil $tim[first]'>
                                <img class='foto-tim' style='margin-left:1%;margin-top:3%;width: 98%;' src='photos/users/".$tim[image]."' alt='".$tim['first']." ".$tim['last']."' /></a></div>
                                <div class='text'>
                                Email: <b>".$tim[email]."</b>
                                <span class='textarrow'></span></div>
                            
                            </div>
                        
                        </div>";
                        }
                        ?>

                </div>
            	<!-- End None Split Section -->

            </div>

            <span class="box-arrow"></span>
        
        </div>
        <!-- End Box -->
        </div>
        <?php
        $team1 = $fquery->show_team();
        foreach($team1 as $data) { ?>
        <div id="show-<?php echo $data['id_team'];?>" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2><?php echo $data['first']." ".$data['last']."";?></h2>
                                    </div>
                                         <div class="modal-body">
                                             
                                             
                                                 <?php
                                                 echo "<h4>Status tim sebagai $data[level]</h4>";
                                                 echo "<p>Status profesi adalah $data[profesi]<br>";
                                                 echo "Email yang digunakan $data[email]<br>";
                                                 ?> 
                                             </p>
                                                 
                                         </div>
                                    <div class="modal-footer">
                                        <a href="javascript:;" class="whitebutton smallsmoothrectange" data-dismiss="modal" aria-hidden="true">
                                            Tutup
                                        </a>
                                        <a href="<?php echo "profil-$data[id_team]-".  strtolower(str_replace(" ","-",$data['first'])).".html";?>" class="whitebutton smallsmoothrectange" >
                                            Selengkapnya
                                        </a>
                                    </div>
                                </div>

                            </div>
        </div>
        <?php
        }
        ?>