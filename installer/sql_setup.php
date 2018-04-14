<?php
/* 
 * *****************************************************************************
 * Filename  : install.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
echo "<style>";
echo "body {";
echo "font-family: arial;";
echo "font-size: 12px;";
echo "background: #eee;";
echo "}";
echo "</style>";
echo "<center><h2 style='padding-top:50px; color:red'>
                  Pembuatan Tabel MySQL..</h2>
                  <p>Eksekusi tabel MySQL, silahkan tekan tombol Buat tabel MySQL.</p>
<hr>
<center>
<form acion='' method='post'>
<p>
<input type='submit' name='submit' value='Buat tabel MySQL'>
</p>
</form>
</center>
<center>
";

include ("../system/functions.php");
$fquery = new Functions();
if(isset($_POST['submit'])) {
    $nama_file = "databases/data.sql";
	mysql_query ("SET sql_mode = ''");

    if ($f = fopen ( $nama_file, "r" ))
    	
	//Begin SQL script executing
	$s_sql = "";
	while ($s = fgets ( $f, 10240)) {
		$s = trim( $s ); //Utf with BOM only

		if (! strlen($s)) continue;
		if (mb_substr($s, 0, 1) == '#') continue; //pass comments
		if (mb_substr($s, 0, 2) == '--') continue;
		if (substr($s, 0, 5) == "\xEF\xBB\xBF\x2D\x2D") continue;

		$s_sql .= $s;

		if (mb_substr($s, -1) != ';') continue;

		$res = mysql_query($s_sql);
		if (!$res) {
                    $error .= 'Error eksekusi : ' . $s_sql . '<br />' . mysql_error() . '<hr />';
                    echo $error;
                }
                else {
                    $sccess .= 'Sukses eksekusi : ' . $s_sql . '<br />' .'<hr />';
                }
                    
		$s_sql = '';
	}
        
        if($res) {
            header("location: admin_setup.php");
        }

    fclose($f);
}

