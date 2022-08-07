<?php 
	$host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "creative-media";
	$db = mysqli_connect($host, $db_user, $db_password, $db_name);
	if($db){
		// proceed with connection
	}
	else{
		echo "DB connection error";
	}
?>