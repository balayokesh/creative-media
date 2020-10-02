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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
	</head>

	<body>
		<header class="navbar bg-dark text-white fixed-top">
			<h1 class="font-italic text-primary flex-fill" style="font-family: 'Architects Daughter', cursive;">Creative media</h1>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			    <span class="navbar-toggler-icon text-white">&#9776;</span>
			  </button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
			   <ul class="navbar-nav rounded p-3 bg-secondary">
			     <li class="nav-item">
			       	<?php 
			       		echo "<img class='img-fluid rounded-circle col-md-1 col-sm-2 col-3' src='".$_SESSION['profile_picture']."'/>"; 
			       		echo $_SESSION['user_name'];
			       	 ?>
			     </li>
			     <li class="nav-item">
			       	<form action="php-assets/logout.php" class="flex-fill">
			       		<input title=" Log out " type="submit" name="submit" id="submit" value="log out" class="btn btn-danger m-3">
			       	</form>
			     </li>

			   </ul>
			 </div>  
		</header>

		<br><br><br>
		
		<main class="d-flex" style="height: 70vh; overflow-y: scroll;">
				<ul class="nav nav-pills" role="tablist">
					<li class="nav-item" id="room1">
						<a class="nav-link active" data-toggle="pill" href="#IPL_Fun_Chat">IPL Fun chat</a>
					</li>
					<li class="nav-item" id="room2">
						<a class="nav-link" data-toggle="pill" href="#Web_Dev_Chat">Web developers chat</a>
					</li>
				</ul>

			<div class="tab-content">
				<!-- IPL fun chat -->
				<div id="IPL_Fun_Chat" class="container tab-pane active">
					<?php 
						$sql_IPL_Fun_Chat = "SELECT * FROM IPL_Fun_Chat";
						$result_IPL_Fun_Chat = $db->query($sql_IPL_Fun_Chat);
						if ($result_IPL_Fun_Chat -> num_rows > 0){
							while ($row = $result_IPL_Fun_Chat -> fetch_assoc()){
								echo "<div class='border rounded-right p-3'><img class='img-fluid rounded-circle col-md-1 col-sm-2 col-3' src={$row['profile_picture']}>";
								echo "<span class='text-primary'>{$row['name']}</span>";
								echo "<div class='mx-3'><b>{$row['msg']}</b>";
								echo "<br><span class='font-italic text-secondary small'>{$row['msg_sending_time']}</span></div></div><br>";
							}
						}
						else{
							echo "<script>alert('No chats yet.. Start your conversation')</script>";
						}
					?>
					<div class="fixed-bottom w-100">
						<form action="php-assets/ipl-post-msg.php" method="post"class="float-right w-100 d-flex justify-content-end p-3 mx-3 form-group">
							<textarea autofocus="on" name="message-IPL" placeholder="Type your message to IPL fans" class="border-primary form-control" style="max-width: 72%; resize: none;"></textarea>
							<input type="submit" value="&#10148;" name="ipl-msg-send" style="width: 4%" class="btn btn-primary">
						</form>
					</div>
				</div>
				
				<!-- Web developer chat -->
				<div id="Web_Dev_Chat" class="container tab-pane">
					<?php 
						$sql_Web_Dev_Chat = "SELECT * FROM Web_Dev_Chat";
						$result_Web_Dev_Chat = $db->query($sql_Web_Dev_Chat);
						if ($result_Web_Dev_Chat -> num_rows > 0){
							while ($row1 = $result_Web_Dev_Chat -> fetch_assoc()){
								echo "<div id='message-box' class='border rounded-right p-3'><img class='img-fluid rounded-circle col-md-1 col-sm-2 col-3' src={$row1['profile_picture']}>";
								echo "<span class='text-primary'>{$row1['name']}</span>";
								echo "<div class='mx-3'><b>{$row1['msg']}</b>";
								echo "<br><span class='font-italic text-secondary small'>{$row1['msg_sending_time']}</span></div></div><br>";
							}
						}
						else{
							echo "<script>alert('No chats yet.. Start your conversation')</script>";
						}

					?>
					<div class="fixed-bottom w-100">
						<form action="php-assets/webdev-post-msg.php" method="post"class="float-right w-100 d-flex justify-content-end p-3 mx-3 form-group">
							<textarea autofocus="on" name="message-webdev" placeholder="Type your message to web developers" class="border-primary form-control" style="max-width: 72%; resize: none;"></textarea>
							<input type="submit" value="&#10148;" name="ipl-msg-send" style="width: 4%" class="btn btn-primary">
						</form>
					</div>
				</div>
			</div>
		</main>
	</body>

</html>