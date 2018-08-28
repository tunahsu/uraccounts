<?php
	session_start();
	require_once 'dbconfig.php';
	
	if(!isset($_SESSION['user_session'])){
		header("Location:index.php");
	}
	
	$sql=$db_con->prepare("SELECT * FROM user_accounts WHERE `id`=:id ORDER BY `website` ASC");
	$sql->execute(array(":id"=>$_SESSION['user_session']));
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Your accounts</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
	<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
	<script type="text/javascript" src="jquery/jquery-1.11.3-jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="zeroclipboard/ZeroClipboard.js"></script>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/list.js"></script>
	<script type="text/javascript" src="js/fade.js"></script>
	<link href="styles/style.css" rel="stylesheet" media="screen">
	<link href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
	<link rel="Shortcut Icon" type="image/x-icon" href="favico.ico">
</head>

<body>

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Your accounts</a>
			</div>
			<div class="navbar-header logout">
				<a class="navbar-brand logout" href="logout.php">Log out</a>
			</div>
		</div>
	</nav>
    
    
	<div class="body-container">
		<div class="container">
			<div class="account_list">
				<table id="myTable" class="table">
					<thead>
						<tr>
							<td>Website</td>
							<td>Username</td>
							<td>Password</td>
							<td class="no_sorting"></td>
							<td class="no_sorting"></td>
						</tr>
					</thead>
					<tbody>
						<?php
							while($rows=$sql->fetch(PDO::FETCH_ASSOC)){
								$website=$rows['website'];
								$web_id=$rows['web_id'];
								$url=$rows['url'];
								$user_name=$rows['user_name'];
								$user_pass=base64_decode($rows['user_pass']);
						?>
							<tr>
								<td><a href="<?=$url?>" target="_blank"><?=$website?><a></td>
								<td><font class="clipboard" data-clipboard-text="<?=$user_name?>" data-hover="點我複製" data-copied="複製完成！"><?=$user_name?></font></td>
								<td><font class="clipboard" data-clipboard-text="<?=$user_pass?>" data-hover="點我複製" data-copied="複製完成！"><?=$user_pass?></font></td>
								<td><a href="process.php?web_id=<?=$web_id?>&action=delete_website">Delete</a></td>
								<td><a href="update_website.php?web_id=<?=$web_id?>&action=update_website">Update</a></td>
							</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div id="add_web">+</div>
	<div id="gotop">˄</div>
</body>
</html>