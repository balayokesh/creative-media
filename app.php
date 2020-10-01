<?php 

	session_start();
	include "php-assets/connection.php";

	// If not signed in redirect to sign in (index) page
	if(!(isset($_SESSION['user_mailid']))){
		header("location: index.php");
	}
	
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Creative Media</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<h1>This is app</h1>
		<?php 
			echo $_SESSION['user_mailid'];
			echo $_SESSION['user_name'];
			echo "<img src='".$_SESSION['profile_picture']."'/>";
		 ?>
		 <form action="php-assets/logout.php">
		 	<input type="submit" name="submit" id="submit" value="log out">
		 </form>
	</body>

</html>