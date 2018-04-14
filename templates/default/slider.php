		<script src="myassets/js/ipresenter.packed.js"></script>
                <link rel="stylesheet" href="myassets/css/slider.css">
		<script>
			$(document).ready(function(){
				$('#ipresenter').iPresenter({
					timerPadding: -1,
					controlNav: true,
					controlNavThumbs: true,
					controlNavNextPrev: false
				});
			});
		</script>

			<div class="slider">
		<div id="ipresenter">
                    
                    <?php
                    $slide  = $fquery->show_slide();
                    foreach($slide as $sgambar) {
                       if($sgambar['data_x']=='0' && $sgambar['data_y']=='0') {
                           $kondisi = "";
                       }
                       else {
                           $kondisi = "data-scale='".$sgambar['data_scale']."' data-rotate='".$sgambar['data_rotate']."'";

                       }
                       echo "<div id='".$sgambar['type_slide']."' class='step' data-x='".$sgambar['data_x']."' data-y='".$sgambar['data_y']."' ".$kondisi.">
                            <img src='photos/slider/".$sgambar['filename']."' />
                            <h2>".$sgambar['keterangan']."</h2>"
                            . "</div>";
                        
                    }
                    ?>

			
		</div>
	</div> 
	<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32024393-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
