<?php 
	require_once("../scripts/dbScripts.php");
	
	
	if(! isset($_GET["comment"]) || $_GET["comment"]==""){
		$mess="Comment was not submitted because it was blank";
		header("location:blog.php?message={$mess}");
	}else{
		$usrId=$_GET["usrId"];
		$Pid=$_GET["Pid"];
		$data=$_GET["comment"];
		$date=time();
		
		$res=getResult("SELECT `comments` FROM `posts` WHERE `post_id`='{$Pid}'");
		
		$ar=mysql_fetch_array($res);
		
		$comms=$ar["comments"]+1;
		
		$sql="INSERT INTO `comments`
		(`user_id` , `post_id` , `data` , `date`)
		 VALUES
		('{$usrId}' , '{$Pid}' , '{$data}' , '{$date}')
		";
		 
		$sql2="UPDATE `posts` SET `comments`={$comms} WHERE `post_id`='{$Pid}'";
		
		if(getResult($sql)>0 && getResult($sql2)>0){
			$mess="Your comment has been submitted";
			header("location:blog.php?message={$mess}");
		}else{
			$mess="Sorry, an error occured, your comment was not submitted";
			header("location:blog.php?message={$mess}");
		}
	
	}




?>