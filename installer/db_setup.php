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
                  Konfigurasi database..</h2>
                  <p>Lakukan konfigurasi database</p>
<hr>
<center>
<form acion='' method='post'>
<p>
<table>
    <tr>
        <td>Nama host</td>
        <td>:</td>
        <td><input type='text' name='host'></td>    
    </tr>
    <tr>
        <td>Nama user</td>
        <td>:</td>
        <td><input type='text' name='user'></td>      
    </tr>
    <tr>
        <td>Kata sandi</td>
        <td>:</td>
        <td><input type='text' name='pass'></td>        
    </tr>
    <tr>
        <td>Nama database</td>
        <td>:</td>
        <td><input type='text' name='dbase'></td>       
    </tr>
    <tr>
    <td colspan='3'>
    <input type='submit' name='kirim' value='Cek konfigurasi'>
    </td>
    </tr>

</table>
</p>
</center>
<hr>
<center>
";

error_reporting(0);
$hostname   = $_POST['host'];
$username   = $_POST['user'];
$password   = $_POST['pass'];
$database   = $_POST['dbase'];

if(isset($_POST['kirim'])) {
    if($connect = mysql_connect($hostname, $username, $password)) {
        $mkdb   = mysql_query("DROP DATABASE IF EXISTS $database");
        $mkdb   = mysql_query("CREATE DATABASE $database");
        if($mkdb) {
        if($db = mysql_select_db($database)) {
            $file_name = "../system/connection.php";
            $fopen = @fopen($file_name,"w+");
            $gets  = fgets($fopen,6);
            $text = ("<?php
/* 
 * *****************************************************************************
 * Filename  : connection.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
class Connection {
    var \$hostname = \"$hostname\";
    var \$username = \"$username\";
    var \$password = \"$password\";
    var \$database = \"$database\";
    
    public function __construct() {
        \$connectdb = mysql_connect(\$this->hostname,\$this->username,\$this->password);
        if(\$connectdb) {
            \$selectdb  = mysql_select_db(\$this->database);
            if(!\$selectdb) {
                header(\"Location: error/error_select_db.php\");
            }
        }
        else {
            header(\"Location: error/error_connect.php\");
        }
    }
}
    
                        ");
	rewind($fopen);
	fwrite($fopen,$text);
	fclose($fopen);
        // Redirect ke setup SQL
        header('location: sql_setup.php');
	
        }
        else {
                $error = "Koneksi ke database gagal, pastikan nama database adalah benar.>";
                echo $error;
            }
        }
        
        else {
            $error = "Database gagal dibuat....";
            echo $error;
        }
    }
    
    else {
        $error     = "Koneksi gagal, pastikan konfigurasi anda benar.";
        echo $error;
    }
}

echo "</center>";