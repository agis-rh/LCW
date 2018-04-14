<?php
/* 
 * *****************************************************************************
 * Filename  : connection.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
class Connection {
    var $hostname = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "apps_lcw";
    
    public function __construct() {
        $connectdb = mysql_connect($this->hostname,$this->username,$this->password);
        if($connectdb) {
            $selectdb  = mysql_select_db($this->database);
            if(!$selectdb) {
                header("Location: error/error_select_db.php");
            }
        }
        else {
            header("Location: error/error_connect.php");
        }
    }
}
    
                        