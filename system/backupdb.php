<?php
/* 
 * *****************************************************************************
 * Filename  : backupdb.php                                                      
 * Creator   : SUNARDI                                   
 * © Copyright and Powered by IBeESNay                          
 * *****************************************************************************
 */

function do_backupdb() {
    $tables = '*';

	//get all of the tables
	if($tables == '*'){
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}else{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//cycle through
	foreach($tables as $table){
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
		
		$return.= 'DROP TABLE IF EXISTS '.'`'.$table.'`'.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE `'.$table.'`'));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) {
			while($row = mysql_fetch_row($result)){
				$return.= 'INSERT INTO `'.$table.'` VALUES(';
				for($j=0; $j<$num_fields; $j++) {
					$row[$j] = addslashes($row[$j]);
					$row[$j] = preg_replace("/\r\n/","\\r\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '\''.$row[$j].'\'' ; } else { $return.= '\'\''; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	
    //save file
    $tanggal=date("Y-m-d");
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=WEB-UPI-backup-".date("Y-m-d H:i:s").".sql");
    header("Pragma: no-cache");
    header("Expires: 0");
    print "$return";
    
    }