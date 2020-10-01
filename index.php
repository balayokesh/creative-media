<?php 
	session_start();

	//If already signed in then redirect to app.php
	if(isset($_SESSION['user_mailid'])){
		header("location: app.php");
	}
	
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Creative Media | Sign in</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		
	</body>

</html>

<?php 
	require_once 'client/vendor/autoload.php';

	// init configurations
	$clientId = "732279262537-gnfe3jf4ba77unsbpupsp893v425m2rk.apps.googleusercontent.com";
	$clientSecret = "bfqHUV0Y1jlrB8kpyUHVpFqF";
	$redirectUri = "http://localhost/creative-media/index.php";

	// Creating client request
	$client = new Google_Client();
	$client->setClientId($clientId);
	$client->setClientSecret($clientSecret);
	$client->setRedirectUri($redirectUri);

	$client->addScope('email');
	$client->addScope('profile');

	if(isset($_GET['code'])){
		$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
		$client->setAccessToken($token['access_token']);

		// Getting profile info
		$google_oauth = new Google_Service_Oauth2($client);
		$google_account_info = $google_oauth->userinfo->get();

		$email = $google_account_info->email;
		$name = $google_account_info->name;
		$picture = $google_account_info->picture;

		$_SESSION['user_mailid'] = $email;
		$_SESSION['user_name'] = $name;
		$_SESSION['profile_picture'] = $picture;
		header("location: app.php");
	}
	else{
		echo "<a href=". $client->createAuthUrl().">Google Login</a>";
		echo "<a href='app.php'</a>";
	}
?>