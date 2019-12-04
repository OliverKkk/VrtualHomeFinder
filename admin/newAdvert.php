<?php 
require("../scripts/dbScripts.php");
$pass=getAdminPassword();

$catId=getCategoryId($_POST["category"]);

$location=$_POST["location"];
$price=$_POST["price"];

$rooms=$_POST["rooms"];
$water=$_POST["water"];
$elec=$_POST["elec"];
$desc=$_POST["description"];
$agent=$_POST["agent"];
$agent_no=$_POST["agent_no"];
$success=false;

$res=getResult("INSERT INTO `houses` (`category_id` , `location` , `price`,`agent`,`agent_number`) 
				VALUES ('{$catId}' , '{$location}' , '{$price}','{$agent}','$agent_no') ");


$res2=getResult("INSERT INTO house_details (`category_id`,`elec_connection` , `water_connection` , `description` ,`rooms`) 
				VALUES ('{$catId}', '{$elec}' , '{$water}' , '{$desc}' , '{$rooms}') ");
if($res>0 && $res2>0){$success=true;}
else{
	$error="Sorry there was an error , the advert has not been entered";
	header("location:admin.php?error={$error}&tok={$pass}#adv");

}






$path="../images/adverts/";
$res3=getResult("select `house_id` from `houses`");

$index;
while($arr=mysql_fetch_array($res3)){
		foreach($arr as $key=>$value){
			$index=$value;
			
		}
	}


$front= $_FILES['uploadFront']['tmp_name'];
$frontType= $_FILES['uploadFront']['type']; 
$name=addExt($index."thumb" , $frontType);
//savePic($front ,$name,150 ,$path ,$frontType);
$frontPic=getBlob($front,150,$frontType);

$back= $_FILES['uploadBack']['tmp_name'];
$backType= $_FILES['uploadBack']['type'];
$name=addExt($index."back" , $backType);
//savePic($back , $name ,150 ,$path ,$backType);
$backPic=getBlob($back,150,$backType);

$compound= $_FILES['uploadCompound']['tmp_name'];
$compoundType= $_FILES['uploadCompound']['type'];
$name=addExt($index."compound" , $compoundType);
//savePic($compound , $name ,150 ,$path ,$compoundType);
$compoundPic=getBlob($compound,150,$compoundType);

$interior= $_FILES['uploadInterior']['tmp_name'];
$interiorType= $_FILES['uploadInterior']['type'];
$name=addExt($index."interior" , $interiorType);
//savePic($interior , $name ,150 ,$path ,$interiorType);
$interiorPic=getBlob($interior,150,$interiorType);


$main= $_FILES['uploadMain']['tmp_name'];
$mainType= $_FILES['uploadMain']['type'];
$name=addExt($index."main" , $mainType);
//savePic($main , $name ,150 , $path,$mainType);
$mainPic=getBlob($main,150,$mainType);


$rs=getResult("INSERT INTO `house_pics`(`house_id`,`front`,`back`,`interior`,`compound`,`main`)VALUES
			   ('{$index}','{$frontPic}','{$backPic}','{$interiorPic}','{$compoundPic}','$mainPic')");

if($rs>0){$success=true;}else $success=false;


function addExt($name , $type){
	if($type== "image/jpeg" || $type == "image/pjpeg"){ 
       $name.=".jpg";
	   return $name;
    } 
    if($type == "image/gif"){ 
       $name.=".gif";
	   return $name;
    } 
    if($type == "image/png" || $type == "image/x-png"){ 
         $name.=".png";
	   	 return $name;
    } 

	

}

if($success==true){
	$error="The new advert has been saved in the database";
	header("location:admin.php?error={$error}&tok={$pass}#adv");
	
}else{
	$error="Sorry there was an error , the advert has not been entered";
	header("location:admin.php?error={$error}&tok={$pass}#adv");
	
	}

?>