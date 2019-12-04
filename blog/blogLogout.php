<?php 
	ob_start();
	
	
	if( isset($_COOKIE[session_name()])){
		
		session_start();
		unset($_SESSION);
		session_destroy();
		setcookie(session_name(),"",time()-5000);
		header("location:blogLogin.php?message=login");
	} else header("location:blogLogin.php?message=login");

	ob_end_flush();
?>