<!DOCTYPE HTML>
<html>
	<head>
		<title>Creative Media | Sign in</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" type="image/png" href="images/cmlogo.png">
		<style type="text/css">
			*{
				scroll-behavior: smooth;
			}
		</style>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<section id="header" class="dark">
				<header>
					<h1>CREATIVE MEDIA</h1>
					<p>Media where creative minds meet together</p>
				</header>
				<footer>

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

					<!-- <a href="app.php" class="button scrolly">Join Creative media</a> -->
				</footer>
			</section>

		<!-- First -->
			<section id="first" class="main">
				<header>
					<div class="container">
						<h2>Creative Media - Where creative minds meet together</h2>
						<p>Creative media is a social media where you can join room chats.  Chat with similar minded persons.  Change your interest into creativity.  Have fun by being involved in your interested rooms chats.</p>
					</div>
				</header>
				<div class="content dark style1 featured">
					<div class="container">
						<div class="row">
							<div class="col-4 col-12-narrow">
								<section>
									<span class="feature-icon"><span class="icon fa-clock"></span></span>
									<header>
										<h3>Have fun time</h3>
									</header>
									<p>Are you tired of working for long time.  Let's have a fun group chat.  Select the room that interest you a lot.  Have some fun time during this boredom lockdown.</p>
								</section>
							</div>
							<div class="col-4 col-12-narrow">
								<section>
									<span class="feature-icon"><span class="icon solid fa-share-alt"></span></span>
									<header>
										<h3>Social Networking</h3>
									</header>
									<p>Find the like minded people who have similar interests of yours.  Join the public room chat, share some knowledge stack, get benefitted.  Let's explore some creativity by knowledge sharing.</p>
								</section>
							</div>
							<div class="col-4 col-12-narrow">
								<section>
									<span class="feature-icon"><span class="icon solid fa-cloud"></span></span>
									<header>
										<h3>Quick login,100% privacy</h3>
									</header>
									<p>No need to remember password and stuff.  Just click on Join creative media button and get logged in with your google account.  It's 100% secured about your user information. </p>
								</section>
							</div>
							<div class="col-12">
								<footer>
									<a href="#" class="button">Join creative media</a>
								</footer>
							</div>
						</div>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<section id="footer">
				<ul class="icons">
					<li><a href="https://twitter.com/yokesh_mani" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="https://facebook.com/balayokesh.395" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
					<li><a href="https://instagram.com/yokesh_004" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="https://github.com/yokesh004" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
				</ul>
				<div class="copyright">
					<ul class="menu">
						<li>Thanks for visiting this page.</li><li>Design: <a href="http://balayokesh.xyz">Bala Yokesh Mani</a></li>
					</ul>
				</div>
			</section>
	</body>
</html>