<?php 
	ob_start();
	require("../scripts/dbScripts.php");
	
	$id=$_GET["id"];
	$post=$_POST["post"];
	$head=$_POST["headline"];
	
	if( isset($id) && isset($post) && isset($head) ){
		
		if(checkDuplicateEntry($id,$head)){
			$mess="You already have a post with the headline : {$head} ,you can not submit it again";
			header("location:blog.php?message={$mess}");
		
		}else {
		
			$res=getResult("
			 INSERT INTO `posts` 
			 (`user_id` , `headline` , `data` , `comments` , `date` )
			 VALUES
			 ('{$id}' , '{$head}' , '{$post}' , '0' , '".time()."' )
			
			");
			
			if($res>0){
				$mess="Your post with the headline : {$head} ,has been submitted";
				header("location:blog.php?message={$mess}");
			}else{
				$mess="Sorry, Your post has not been submitted server may be down, please try again later";
				header("location:blog.php?message={$mess}");		
			}
		
		}
		
		
	}
	
	function checkDuplicateEntry($id,$headline){
		$res=getResult("select * from posts where user_id='{$id}' and headline='{$headline}'");
		
		if (mysql_num_rows($res)>0){
			return true;		
		}else return false ;
		
	}
	
ob_end_flush();
?>