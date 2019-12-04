<?php
	require("../scripts/dbScripts.php");
	$pass=getAdminPassword();
	$cat=$_GET["cat"];
	
	if($cat=="house"){
		$id=$_GET["id"];
		$success=false;
				
		$res=getResult("DELETE FROM `houses` WHERE `house_id`='{$id}'");
		if( $res>0){
			$success=true;
		}else{
			$mes="Failed to delete house advert with id {$id}";
			
			header("location:admin.php?hsems={$mes}& tok={$pass}#hse");
			exit();
		}
					
		
		$res1=getResult("DELETE FROM `house_details` WHERE `house_id`='{$id}'");
		if( $res1>0){
			$success=true;
		}else{
			$mes="Failed to delete house advert with id {$id}";
			
			header("location:admin.php?hsems={$mes}& tok={$pass}#hse");
			exit();
		}
		
		if($success==true){
			$mes="House advert with id {$id} has been deleted from the database";
			header("location:admin.php?hsems={$mes}& tok={$pass}#hse");
		}else{
			$mes="Failed to delete house advert with id {$id}";
			
			header("location:admin.php?hsems={$mes}& tok={$pass}#hse");
			exit();
		}
		
	
	
	
	 }if($cat=="users"){
	 	$id=$_GET["usr"];
		$nm=getBlogUser($id);
		$success=false;
		
		$res=getResult("DELETE FROM `user_info` WHERE `user_id`='{$id}'");
		if( $res>0){
			$success=true;
		}else{
			$mes="Failed to delete user {$nm} ";
			header("location:admin.php?usrms={$mes}& tok={$pass}#usr");
			exit();
		}
		
		$res1=getResult("DELETE FROM `posts` WHERE `user_id`='{$id}'");
		if( $res1>0){
			$success=true;
		}else{
			$mes="Failed to delete user {$nm} ";
			header("location:admin.php?usrms={$mes}& tok={$pass}#usr");
			exit();
		}
		
		
		
		$res2=getResult("DELETE FROM `comments` WHERE `user_id`='{$id}'");
		if( $res2>0){
			$success=true;
		}else{
			$mes="Failed to delete user {$nm} ";
			header("location:admin.php?usrms={$mes}& tok={$pass}#usr");
			exit();
		}
		
		
						
		if($success==true){
			$mes="Blog user {$nm} has been deleted from the database";
			header("location:admin.php?usrms={$mes}& tok={$pass}#usr");
		}else{
			$mes="Failed to delete blog user {$nm}";
			header("location:admin.php?usrms={$mes}& tok={$pass}#usr");
			exit();
		}
	 
	 
	 
	 
	 }if($cat=="posts"){
	 	$id=$_GET["Pid"];
		$head=getPostHeadline($id);
		$success=false;
		
		$res=getResult("DELETE FROM `posts` WHERE `post_id`='{$id}'");
		if( $res>0){
			$success=true;
		}else{
			$mes="Failed to delete blog post with the headline {$head} ";
			header("location:admin.php?pstms={$mes}& tok={$pass}#pst");
			exit();
		}
		
		
		$res1=getResult("DELETE FROM `comments` WHERE `post_id`='{$id}'");				
		if( $res1>0){
			$success=true;
		}else{
			$mes="Failed to delete blog post with the headline {$head} ";
			header("location:admin.php?pstms={$mes}& tok={$pass}#pst");
			exit();
		}
		
						
		if($success==true){
			$mes="Blog post with the headline {$head} has been deleted from the database";
			header("location:admin.php?pstms={$mes}& tok={$pass}#pst");
		}else{
			$mes="Failed to delete blog post with the headline {$head} ";
			header("location:admin.php?pstms={$mes}& tok={$pass}#pst");
			exit();
		}
	 
	 
	 
	 
	 }if($cat=="categories"){
	 	$id=$_GET["cId"];
	 	$success=false;
		
		$res=getResult("DELETE FROM `categories` WHERE `category_id`='{$id}'");
		if( $res>0){
			$success=true;
		}else{
			$mes="Failed to delete the selected category ";
			header("location:admin.php?ctms={$mes}& tok={$pass}#ct");
			exit();
		}
		
		$res1=getResult("DELETE FROM `houses` WHERE `category_id`='{$id}'");
		if( $res1>0){
			$success=true;
		}else{
			$mes="Failed to delete the selected category ";
			header("location:admin.php?ctms={$mes}& tok={$pass}#ct");
			exit();
		}
		
		$res2=getResult("DELETE FROM `house_details` WHERE `category_id`='{$id}'");
		
		if( $res2>0){
			$success=true;
		}else{
			$mes="Failed to delete the selected category ";
			header("location:admin.php?ctms={$mes}& tok={$pass}#ct");
			exit();
		}
		
		if(success==true){
			$mes="The selected category has been deleted";
			header("location:admin.php?ctms={$mes}& tok={$pass}#ct");
		}else{
			$mes="Failed to delete the selected category ";
			header("location:admin.php?ctms={$mes}& tok={$pass}#ct");
			exit();
		}
	 
	 
	 
	 
	 }if($cat=="newCategory" && $_POST["categoryName"]!="" ){
	 	$name=strtolower($_POST["categoryName"]);
		$testRes=getResult("SELECT * FROM `categories` WHERE `name`='{$name}'");
		if(mysql_num_rows($testRes)>0){
			$mes="The category: {$name} already exists";
			header("location:admin.php?ctms={$mes}& tok={$pass}#ct");
			exit();
		}else $res=getResult("INSERT INTO `categories`(`name`)VALUES('{$name}')");
		
		if($res>0){
			$mes="The category: {$name} has been entered";
			header("location:admin.php?ctms={$mes}& tok={$pass}#ct");
		}else{
			$mes="Failed to enter the category:{$name} ";
			header("location:admin.php?ctms={$mes}& tok={$pass}#ct");
			exit();
		}
	 
	 
	 }if($cat=="news" && isset($_GET["id"]) && isset($_GET["headline"]) ){
	 	$id=$_GET["id"];
		$head=$_GET["headline"];
		if($head==""){
			$mes="NO NEWS TO DELETE";
			
			header("location:admin.php?nwsms={$mes}& tok={$pass}#nws");
			exit;
		}
	 	$res=getResult("DELETE FROM `news` WHERE `news_id`='{$id}'");
		
	 	if($res>0){
			$mes="The article with the headline: {$head} has been deleted";
			
			header("location:admin.php?nwsms={$mes}& tok={$pass}#nws");
		}else{
			$mes="Failed to delete the article with headline:{$head} ";
			header("location:admin.php?nwsms={$mes}& tok={$pass}#nws");
			exit();
		}
	 
	 
	 }if($cat=="generic"){
	 	
		
	 	$paswd=addslashes(crypto($_POST["pas"]));
		$infoMail=$_POST["infoMail"];
		$purchaceMail=$_POST["purchaceMail"];
		$advertMail=$_POST["advertMail"];
		
		/*echo "info: ".$infoMail.": was:".getInfoMail()." <br>";
		echo "purchace: ".$purchaceMail.": was:".getPurchaceMail()." <br>";
		echo "adv: ".$advertMail.": was:".getAdvertMail()." <br>";
		
		exit();*/
	 	
		/*if($paswd==""){
			$mes="No password to enter";
			header("location:admin.php?acms={$mes}& tok={$pass}#ac");
			exit();
		}else{*/
		
		if($paswd!=""){
			
			$current=crypto(getAdminPassword(false));
			if($current!=""){
				
				$query="UPDATE `generic` SET `administrator`='{$paswd}' WHERE `administrator`='{$current}'";
				
				
				$rs=getResult($query);
				
				header("location:adminLogin.php?error=password changed,login again");
				
				
			}else{
				$query="INSERT INTO `generic` (`administrator`) VALUES ('{$paswd}')";
				
				
				$rs=getResult($query);
				
				
				header("location:adminLogin.php?error=password changed,login again");
				
			}
		
		}
		
		
		if(validate_email($infoMail)!=true){
			$mes="The info e-mail address is invalid";
			header("location:admin.php?acms={$mes}& tok={$pass}#ac");
			exit();
		}else{
			$current=getInfoMail();
			if($current!=""){
				$rs=getResult("UPDATE `generic` SET `infoMail`='{$infoMail}' WHERE `infoMail`='{$current}'");
				//mysql_free_result($rs);
			}elseif($current==""){
				$rs=getResult("UPDATE `generic` SET `infoMail`='{$infoMail}'WHERE `administrator`='".getAdminPassword(false)."'");
				//mysql_free_result($rs);
			}
		
		}
		
		if(validate_email($purchaceMail)!=true){
			$mes="The purchace request e-mail address is invalid";
			header("location:admin.php?acms={$mes}& tok={$pass}#ac");
			exit();
		}else{
			$current=getPurchaceMail();
			if($current!=""){
				$rs=getResult("UPDATE `generic` SET `purchaceMail`='{$purchaceMail}' WHERE `purchaceMail`='{$current}'");
				//mysql_free_result($rs);
			}else{
				$rs=getResult("UPDATE `generic` SET`purchaceMail`='{$purchaceMail}'WHERE 
				`administrator`='".getAdminPassword(false)."'");
				//mysql_free_result($rs);
			}
		
		}
		
		
		if(validate_email($advertMail)!=true){
			$mes="The advert request e-mail address is invalid";
			header("location:admin.php?acms={$mes}& tok={$pass}#ac");
			exit();
		}else{
			$current=getAdvertMail();
			if($current!=""){
				$rs=getResult("UPDATE `generic` SET `advertMail`='{$advertMail}' WHERE `advertMail`='{$current}'");
				//mysql_free_result($rs);
			}else{
				$rs=getResult("UPDATE `generic` SET `advertMail`='{$advertMail}' WHERE 
				`administrator`='".getAdminPassword(false)."'");
			}
		
		}
		$mes="Update done.";
		header("location:admin.php?acms={$mes}& tok={$pass}#ac");
	 
	 }
	 












?>