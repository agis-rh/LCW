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
    var $username = "lcw10_rplsol";
    var $password = "dox5ynnw";
    var $database = "lcw10_rplsol";
    
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