<?php 
	ob_start();
	
	
	if( isset($_COOKIE["logged"])){
		setcookie("logged","",time()-5000);
		header("location:../index.php");
	} //else header("location:blogLogin.php?message=login");

	ob_end_flush();
?>