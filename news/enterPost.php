<?php
	
	require("../scripts/dbScripts.php");
	
	$uploadedFile= $_FILES['uploadFile']['tmp_name'];
	$picName=$_FILES['uploadFile']['name'];
	$picType=$_FILES['uploadFile']['type'];
	$picError=$_FILES['uploadFile']['error'];
	
	if(!($picType== "image/jpeg" || $picType == "image/pjpeg" || $picType == "image/gif" || $picType == "image/png" || 
	   $picType == "image/x-png")){ 
	   
	   $error="The format of the image {$picName} is not supported, please select another";
	    header("location:postArticle.php?error={$error}& name={$name} & email={$email} & headline={$headline} & articlePic={$uploadedFile}");
		exit();
        
    } 
   
	
	$headline= trim($_POST["headline"]);
	$data=trim($_POST["article"]);
	$name=trim($_POST["name"]);
	$email=trim($_POST["email"]);
	
	$sql="SELECT `news_id` FROM `news` WHERE `headline`='{$headline}' AND `data`='{$data}' ";
	$testResult=getResult($sql);
	
	$rows=mysql_num_rows($testResult);
	if($rows>0){
		
		$error="An article with the same data is already submitted";
	    header("location:postArticle.php?error={$error}& name={$name} & email={$email} & headline={$headline} & articlePic={$uploadedFile}");
		exit();
	}
	
	if(! validate_email($email) ){
		$error="You have entered an invalid e-mail address";
	    header("location:postArticle.php?error={$error}& name={$name} & email={$email} & headline={$headline} & articlePic={$uploadedFile}");
		exit();
		
	
	}else{
		
		//savePic($uploadedFile , $picName ,250,"pics/",$picType);
		
		//savePic($uploadedFile , $picName ,250,"../images/adverts/",$picType);
		
		$res=getresult(
		"INSERT INTO `news`
		(`picName`,`mimeType`,`headline`,`data`,`author`,`author_email`,`date`,`views`)
		VALUES 
		('{$picName}','{$picType}','{$headline}','{$data}','{$name}','{$email}','".time()."','0')"
		);
		
		$db=newsPicToDb($uploadedFile,200,$picType);
		
		if($res>0 and $db==true){
			
			$error="Your post with the headline : {$headline}  has been entered ";
			
			header("location:postArticle.php?error={$error}");
			exit();
		}else {
			$error="ERROR! Your post with the headline : {$headline}  not  been entered please try again at a later time";
			
	    	header("location:postArticle.php?error={$error}");
			exit();
		}	
	
	}



?>