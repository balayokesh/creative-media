<?php 
	session_start();
	include "connection.php";
	$iplchat_username = $_SESSION['user_name'];
	$iplchat_usermail = $_SESSION['user_mailid'];
	$iplchat_profile_picture = $_SESSION['profile_picture'];
	$ipl_message = $_POST['message-IPL'];

	$sql1 = "INSERT INTO IPL_Fun_Chat(name, email, msg, profile_picture) VALUES ('$iplchat_username', '$iplchat_usermail', '$ipl_message', '$iplchat_profile_picture')";
	if (mysqli_query($db, $sql1)){
		header('location: ../app.php');
	}
	else{
		echo "ERROR: Could not able to execute $sql1. " . mysqli_error($db);
	}

?>