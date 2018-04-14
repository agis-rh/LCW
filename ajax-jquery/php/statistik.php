              <?php
              include ("../../system/functions.php");
              $db = new Functions();
              $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
              $tanggal = date("Y-m-d"); // Mendapatkan tanggal sekarang
              $tahun   = date("Y");
              $bulan   = date("Y-m");
              $waktu   = time(); // 

                    $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
                    $bulanini         = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE bulan='$bulan'"));
                    $tahunini         = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tahun='$tahun'"));
                    $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
                    $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
                    $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
                    $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
                    $bataswaktu       = time() - 300;
                    $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

                    $path = "photos/counter/";
                    $ext = ".png";

              $tothitsgbr = sprintf("%011d", $tothitsgbr);
              for ( $i = 0; $i <= 9; $i++ ){
	               $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
              }
              
              
               echo "<table class='statistik'>
                        <tr><td><i class=\"fa fa-user\"></i> &nbsp;&nbsp;Pengunjung hari ini </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$pengunjung </td></tr>
                        <tr><td><i class=\"fa fa-user\"></i> &nbsp;&nbsp;Pengunjung bulan ini </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$bulanini </td></tr>
                        <tr><td><i class=\"fa fa-user\"></i> &nbsp;&nbsp;Pengunjung tahun ini </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$tahunini </td></tr>
                        <tr><td><i class=\"fa fa-users\"></i> &nbsp;Total pengunjung </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$totalpengunjung </td></tr>
                        <tr><td><i class=\"fa fa-refresh\"></i>&nbsp;&nbsp; Hits hari ini </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$hits[hitstoday] </td></tr>
                        <tr><td><i class=\"fa fa-refresh\"></i> &nbsp; Total Hits </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$totalhits </td></tr>
                        <tr><td><i class=\"fa fa-desktop\"></i> &nbsp;&nbsp;Pengunjung Online </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$pengunjungonline </td></tr>
                        </table>";
               //echo "<br /><p style='text-align:right;'>$tothitsgbr</p>";
