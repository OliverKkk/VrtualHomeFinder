<?php 
	require_once("../scripts/dbScripts.php");
	$name=$_GET["name"];
	$mail=$_GET["mail"];
	$user=$_GET["user"];
	$pwd=sha1($_GET["pwd"]);
	
	$sqlOne="select * from user_info where name='{$name}' and password='{$pwd}'";
	$result=getResult($sqlOne);
		
	if ( mysql_num_rows($result) > 0 ){
		
		$error="{$name} is already registered";
		header("location:blogReg.php?error={$error}& name={$name} & mail={$mail} & 
		user={$user}");
	
	}else{
	
		$sql="INSERT INTO `user_info` 
			 (`name`, `username`, `password`, `email`)
			 VALUES
			 ('{$name}' , '{$user}' , '{$pwd}' , '{$mail}')";
		
		if (getResult($sql) == 1){
			$mess="Welcome {$name} you may now Log in";
			header("location:blogLogin.php?message={$mess}");
		
		}else{
			$error="System is unable to register user please try at a later time";
			header("location:blogReg.php?error={$error}& name={$name} & mail={$mail} & 
			user={$user}");
		
		}

	}
?>