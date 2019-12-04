<?php 
	require_once("../scripts/dbScripts.php");
	
	$user=$_POST["user"];
	$pass=sha1($_POST["pas"]);
	
	$sql="select * from user_info where username='{$user}' and password='{$pass}'";
	$result=getResult($sql);
		
	if ( mysql_num_rows($result) > 0 ){
		
		$array=mysql_fetch_array($result);
		
		$name=$array["name"];
		
		$mess="Welcome {$name}, you are now logged in";
		
		setcookie(session_name("user"),$user);
		
				
		header("location:blog.php?message={$mess}");
		
		
	}else{
		$mess="Incorrect login !";
		header("location:blogLogin.php?message={$mess}");
	
		
	}
?>