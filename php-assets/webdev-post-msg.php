<?php 
	session_start();
	include "connection.php";
	$webdevchat_username = $_SESSION['user_name'];
	$webdevchat_usermail = $_SESSION['user_mailid'];
	$webdevchat_profile_picture = $_SESSION['profile_picture'];
	$webdev_message = $_POST['message-webdev'];

	$sql1 = "INSERT INTO Web_Dev_Chat(name, email, msg, profile_picture) VALUES ('$webdevchat_username', '$webdevchat_usermail', '$webdev_message', '$webdevchat_profile_picture')";
	if (mysqli_query($db, $sql1)){
		header('location: ../app.php#Web_Dev_Chat');
	}
	else{
		echo "ERROR: Could not able to execute $sql1. " . mysqli_error($db);
	}

?>