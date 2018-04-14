<?php
function sensor($kata){
    $w = mysql_query("SELECT * FROM sensor_kata");
    while ($r = mysql_fetch_array($w)){
        $kata = str_replace($r['word'], $r['replace'], $kata);       
    }
    
    return $kata;
}
