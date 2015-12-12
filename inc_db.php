<?php
	$server	= "127.0.0.1";
	$user		= "root";
	$pass		= "";
	$db 		= "db_anam";
	
	$connect 	= mysql_connect($server,$user,$pass);
	$selectDb 	= mysql_select_db($db,$connect);
	if($selectDb){
		//echo "Connection is true";
	} else {
		echo "No database Found";
	}
?>