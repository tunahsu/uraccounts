<?php
	session_start();
	
	if(isset($_SESSION['user_session'])){
		header("Location:list.php");
	}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Your accounts</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
	<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
	<script type="text/javascript" src="jquery/jquery-1.11.3-jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/signin.js"></script>
	<script type="text/javascript" src="js/fade.js"></script>
	<link href="styles/style.css" rel="stylesheet" media="screen">
	<link rel="Shortcut Icon" type="image/x-icon" href="favico.ico">
</head>

<body>

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Your accounts</a>
			</div>
			<div class="navbar-header logout">
				<a class="navbar-brand logout" href="signup.php">Signup</a>
			</div>
		</div>
	</nav>
    
    
	<div class="body-container">
		<div class="container">
			<div>
				<form class="form-signin" method="post" id="signin-form">
					<center><h3>Sign In</h3></center><br>
					<div id="error">
						<!-- error will be shown here ! -->
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" />
					</div>
					<br>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" name="user_pass" id="user_pass" />
					</div>
					<div class="form-group">
						<input type="hidden" name="action" value="signin" />
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>