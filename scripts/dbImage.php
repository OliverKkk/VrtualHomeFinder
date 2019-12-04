<?php 
ob_start();
	require("dbScripts.php");
	$id=$_GET["id"];
	$cat=$_GET["cat"];
	
	if($cat=="news"){
	$res=getResult("select `blobPicture`, `mimeType` from `news` where `news_id`='{$id}'");
	
	$arr=mysql_fetch_assoc($res);
	$type=$arr["mimeType"];
	$data=$arr["blobPicture"];
	
	if( isset($data) && isset($type) ){
				
			header('Content-Length: '.strlen($data));
			header("Content-type:".$type);
				
			print($data);
		}else{
			print("unable to fetch image ");
			
		}
	}
	if($cat=="houses"){
		$def=$_GET["def"];
		
		if($def=="front"){
			$res=getResult("SELECT `front` FROM `house_pics` WHERE `house_id`='{$id}'");
			$arr=mysql_fetch_assoc($res);
			$data=$arr["front"];
			
			if( isset($data) ){
				
				header('Content-Length: '.strlen($data));
				header("Content-type: image/jpeg ");
				print($data);
			}else{
				print("unable to fetch image ");
			
			}
			
			
		}elseif($def=="back"){
			$res=getResult("SELECT `back` FROM `house_pics` WHERE `house_id`='{$id}'");
			$arr=mysql_fetch_assoc($res);
			$data=$arr["back"];
			
			if( isset($data) ){
				
				header('Content-Length: '.strlen($data));
				header("Content-type: image/jpeg ");
				print($data);
			}else{
				print("unable to fetch image ");
			
			}
			
		
		}elseif($def=="interior"){
			$res=getResult("SELECT `interior` FROM `house_pics` WHERE `house_id`='{$id}'");
			$arr=mysql_fetch_assoc($res);
			$data=$arr["interior"];
			
			if( isset($data) ){
				
				header('Content-Length: '.strlen($data));
				header("Content-type: image/jpeg ");
				print($data);
			}else{
				print("unable to fetch image ");
			
			}
			
		
		}elseif($def=="compound"){
			$res=getResult("SELECT `compound` FROM `house_pics` WHERE `house_id`='{$id}'");
			$arr=mysql_fetch_assoc($res);
			$data=$arr["compound"];
			
			if( isset($data) ){
				
				header('Content-Length: '.strlen($data));
				header("Content-type: image/jpeg ");
				print($data);
			}else{
				print("unable to fetch image ");
			
			}
			
		
		}elseif($def=="main"){
			$res=getResult("SELECT `main` FROM `house_pics` WHERE `house_id`='{$id}'");
			$arr=mysql_fetch_assoc($res);
			$data=$arr["main"];
			
			if( isset($data) ){
				
				header('Content-Length: '.strlen($data));
				header("Content-type: image/jpeg ");
				print($data);
			}else{
				print("unable to fetch image");
			
			}
			
		
		}
		
	}

ob_end_flush();
?>