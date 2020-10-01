<?php 
	session_start();
	// include "php-assets/connection.php";

	// //If already signed in then redirect to app.php
	// // $_SESSION['user-email'] = "balayokeshmani@gmail.com";
	// if(isset($_SESSION['user-email'])){
	// 	header("location: app.php");
	// }
	
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Creative Media | Sign in</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<!-- <a href="">Log in with google</a> -->
	</body>

</html>

<?php 
	require_once 'client/vendor/autoload.php';

	$clientId = "732279262537-gnfe3jf4ba77unsbpupsp893v425m2rk.apps.googleusercontent.com";
	$clientSecret = "bfqHUV0Y1jlrB8kpyUHVpFqF";
	$redirectUri = "http://localhost/creative-media/index.php";

	$client = new Google_Client();
	$client->setClientId($clientId);
	$client->setClientSecret($clientSecret);
	$client->setRedirectUri($redirectUri);

	$client->addScope('email');
	$client->addScope('profile');

	if(isset($_GET['code'])){
		$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
		$client->setAccessToken($token['access_token']);

		$google_oauth = new Google_Service_Oauth2($client);
		$google_account_info = $google_oauth->userinfo->get();

		$email = $google_account_info->email;
		$name = $google_account_info->name;
		$picture = $google_account_info->picture;

		echo "<h1>$email</h1>";
		echo "<h1>$name</h1>";
		echo "<img src='$picture'>";
		$_SESSION['usermailid'] = $email;
	}
	else{
		echo "<a href=". $client->createAuthUrl().">Google Login</a>";
		echo "<a href='app.php'</a>";
	}
?>