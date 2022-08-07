<!DOCTYPE HTML>
<html>
	<head>
		<title>Creative Media | Sign in</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="icon" type="image/png" href="assets/images/logo.png">
		<!-- Import bootstrap Icons -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	</head>

	<body>
		
		<header>
			<h1>CREATIVE MEDIA</h1>
			<p>Media where creative minds meet together</p>

			<?php 
				session_start();

				//If already signed in then redirect to app.php

				if(isset($_SESSION['user_mailid'])){
					header("location: app.php");
				}  

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
					echo "<a class='button' id='google-login' href=". $client->createAuthUrl().">Log in with Google</a>";
					echo "<a href='app.php'></a>";
				}
			?>

		</header>

		<main>
			<div>
				<h2>Creative Media - Where creative minds meet together</h2>
				<p>Creative media is a social media where you can join room chats.  Chat with similar minded persons.  Change your interest into creativity.  Have fun by being involved in your interested rooms chats.</p>
			</div>
			
			<div>
				<div>
					<section>
						<header>
							<h3>Have fun time</h3>
						</header>
						<p>Are you tired of working for long time.  Let's have a fun group chat.  Select the room that interest you a lot.  Have some fun time during this boredom lockdown.</p>
					</section>
				</div>
				<div>
					<section>
						<header>
							<h3>Social Networking</h3>
						</header>
						<p>Find the like minded people who have similar interests of yours.  Join the public room chat, share some knowledge stack, get benefitted.  Let's explore some creativity by knowledge sharing.</p>
					</section>
				</div>
				<div>
					<section>
						<header>
							<h3>Quick login,100% privacy</h3>
						</header>
						<p>No need to remember password and stuff.  Just click on Join creative media button and get logged in with your google account.  It's 100% secured about your user information. </p>
					</section>
				</div>
				<div>
					<a href="#" class="button">Join creative media</a>
				</div>
			</div>
		</main>

		<footer>
			<ul>
				<li>
					<a href="https://twitter.com/balayokeshmani" target="_blank">
						<i class="bi bi-twitter"></i>
					</a>
				</li>
				<li>
					<a href="https://www.facebook.com/profile.php?id=100081029223342" target="_blank">
						<i class="bi bi-facebook"></i>
					</a>
				</li>
				<li>
					<a href="https://instagram.com/yokesh_004" target="_blank">
						<i class="bi bi-instagram"></i>
					</a>
				</li>
				<li>
					<a href="https://github.com/balayokesh" target="_blank">
						<i class="bi bi-github"></i>
					</a>
				</li>
			</ul>
			
			<div>
				Thanks for visiting this page |
				Design by <a href="https://balayokesh.github.io" target="_blank">Bala Yokesh Mani A</a>
			</div>
		</footer>
	</body>
</html>