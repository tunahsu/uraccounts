<?php
	session_start();
	require_once 'dbconfig.php';
	
	if(!isset($_SESSION['user_session'])){
		header("Location:index.php");
	}
	
	$web_id=$_GET['web_id'];
	$sql=$db_con->prepare("SELECT * FROM user_accounts WHERE `web_id`=:web_id");
	$sql->execute(array(":web_id"=>$web_id));
	$rows=$sql->fetch(PDO::FETCH_ASSOC);
	
	$web_id=$rows['web_id'];
	$website=$rows['website'];
	$url=$rows['url'];
	$user_name=$rows['user_name'];
	$user_pass=base64_decode($rows['user_pass']);
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
				<form class="form-signin" method="post" id="update-form" action="process.php">
					<center><h3>Update account information</h3></center><br>

					<div class="form-group">
						<input type="text" class="form-control" placeholder="Website" name="website" id="website" value="<?=$website?>" />
					</div>
					<br>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="URL" name="url" id="url" value="<?=$url?>" />
					</div>
					<br>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" value="<?=$user_name?>" />
					</div>
					<br>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Password" name="user_pass" id="user_pass" value="<?=$user_pass?>" />
					</div>
					<br>
					<div class="form-group">
						<input type="hidden" name="action" value="update_website" />
						<input type="hidden" name="web_id" value="<?=$web_id?>" />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default">Update</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
</body>
</html>