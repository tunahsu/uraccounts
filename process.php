<?php
	session_start();
	require_once 'dbconfig.php';
	
	if(isset($_POST['action'])){
		$action=$_POST['action'];
	}
	else{
		$action=$_GET['action'];
	}
	switch($action){
		case "signin" :
			$user_name=trim($_POST['user_name']);
			$user_pass=trim($_POST['user_pass']);
			$user_pass=md5($user_pass);
			
			try{	
				$sql=$db_con->prepare("SELECT * FROM `users` WHERE `user_name`=:user_name");
				$sql->execute(array(":user_name"=>$user_name));
				$rows=$sql->fetch(PDO::FETCH_ASSOC);
				
				if($rows['user_pass']==$user_pass){
					echo "ok"; // log in
					$_SESSION['user_session']=$rows['id'];
				}
				else{
					echo "username or password does not exist !";
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
			break;
		
		case "add_website" :
			$id=$_SESSION['user_session'];
			$website=trim($_POST['website']);
			$url=trim($_POST['url']);
			$user_name=trim($_POST['user_name']);
			$user_pass=base64_encode(trim($_POST['user_pass']));
			
			$input=array(':id'=>$_SESSION['user_session'], ':website'=>$website, ':url'=>$url, ':user_name'=>$user_name, ':user_pass'=>$user_pass);
			$sql="INSERT INTO `user_accounts`(id, website, url, user_name, user_pass) VALUES(:id, :website, :url, :user_name, :user_pass)";
			$sth=$db_con->prepare($sql);
			$sth->execute($input);
			
			header("Location:list.php");
			break;
			
		case "delete_website" :
			$web_id=$_GET['web_id'];
			
			$sql="DELETE FROM `user_accounts` WHERE `web_id` = :web_id";
			$sth=$db_con->prepare($sql);
			$sth->execute(array(':web_id'=>$web_id));
			
			header("Location:list.php");
			break;
			
		case "update_website" :
			$web_id=$_POST['web_id'];
			$website=trim($_POST['website']);
			$url=trim($_POST['url']);
			$user_name=trim($_POST['user_name']);
			$user_pass=base64_encode(trim($_POST['user_pass']));
			
			$input=array(':web_id'=>$web_id, ':website'=>$website, ':url'=>$url, ':user_name'=>$user_name, ':user_pass'=>$user_pass);
			$sql="UPDATE `user_accounts` SET `website`=:website, `url`=:url, `user_name`=:user_name, `user_pass`=:user_pass WHERE `web_id`=:web_id";
			$sth=$db_con->prepare($sql);
			$sth->execute($input);
			
			header("Location:list.php");
			break;
		
		case "signup" :
			$user_name=trim($_POST['user_name']);
			$user_pass=trim($_POST['user_pass']);
			$user_pass2=trim($_POST['user_pass2']);
			$response=$_POST["g-recaptcha-response"];
			$secret="6Le_4jQUAAAAACzmP2ZEGkbuS-pnvCYlYL3THXFj";
			$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
			$response = json_decode($verify, true);
			
			if($response['success']==true){
				try{	
					if($user_name!='' && $user_pass!='' && $user_pass2!=''){
						$sql=$db_con->prepare("SELECT * FROM `users` WHERE `user_name`=:user_name");
						$sql->execute(array(":user_name"=>$user_name));
						$rows=$sql->fetch(PDO::FETCH_ASSOC);
						
						if($rows['user_name']==$user_name){
							echo 'Account has been registered.';
						}
						else{
							if($user_pass==$user_pass2){
								$user_pass=md5($user_pass);
								$input=array(':user_name'=>$user_name, ':user_pass'=>$user_pass);
								$sql="INSERT INTO `users`(user_name, user_pass) VALUES(:user_name, :user_pass)";
								$sth=$db_con->prepare($sql);
								$sth->execute($input);
								echo 'ok';	
							}
							else{
								echo 'Two input password must be consistent.';	
							}
						}
					}
					else{
						echo 'Please enter your username & password.';	
					}
				}
				catch(PDOException $e){
					echo $e->getMessage();
				}
			}
			else if($response['success']==false){
				echo 'Verification failed';
			}
			break;	
	}
?>