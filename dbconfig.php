<?php
	//$db_host="localhost:3307";
	//$db_name="tuna_your_account";
	//$db_user="tuna";
	//$db_pass="64DPBxNDLVMcSWry";
	
	$db_host="localhost";
	$db_name="tuna_your_account";
	$db_user="root";
	$db_pass="";
	
	try{
		$db_con=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->exec("SET CHARACTER SET utf8");
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>