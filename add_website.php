<?php
	session_start();
	
	if(!isset($_SESSION['user_session'])){
		header("Location:index.php");
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
		</div>
	</nav>
    
    
	<div class="body-container">
		<div class="container">
			<div>
				<form class="form-signin" method="post" id="add-form" action="process.php">
					<center><h3>Add youre new account</h3></center><br>

					<div class="form-group">
						<input type="text" class="form-control" placeholder="Website" name="website" id="website" />
					</div>
					<br>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="URL" name="url" id="url" />
					</div>
					<br>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" />
					</div>
					<br>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Password" name="user_pass" id="user_pass" />
					</div>
					<br>
					<div class="form-group">
						<input type="hidden" name="action" value="add_website" />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default">Add</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
</body>
</html>