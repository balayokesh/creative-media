<?php 

	session_start();
	// include "php-assets/connection.php";

	//If not signed in redirect to sign in (index) page
	// if(!(isset($_SESSION['user-email']))){
	// 	header("location: index.php");
	// }
	
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
			echo $_SESSION['usermailid'];
		 ?>
	</body>

</html>