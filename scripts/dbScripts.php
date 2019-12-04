<?php 
		
	$DBusername="root";
	
	$host="localhost";
	
	$password="";
	
	//$database="point-2-point";

	$database="point2point";
	
	$purchaceEmail='';
	
	$infoEmail='info@kenyavirtualhomes.com';
	
	$advertEmail='';
	
	$adminpassword="kevo";
	
	
	function getPurchaceMail(){
				
		$result=getResult("SELECT `purchaceMail` FROM `generic` WHERE `administrator`='".addslashes(crypto(getAdminPassword(false)))."'");
	
		$arr=mysql_fetch_array($result);
	
		return $arr["purchaceMail"];
		
		
	}
	
	function getInfoMail(){
		
		//echo "SELECT `infoMail` FROM `generic` WHERE `administrator`='".crypto(getAdminPassword(false))."'"; exit;
		$result=getResult("SELECT `infoMail` FROM `generic` WHERE `administrator`='".addslashes(crypto(getAdminPassword(false)))."'");
	
		$arr=mysql_fetch_array($result);
	
		return $arr["infoMail"];
		
		
	}
	
	function getAdvertMail(){
		
		
		$result=getResult("SELECT `advertMail` FROM `generic`WHERE `administrator`='".addslashes(crypto(getAdminPassword(false)))."'");
	
		$arr=mysql_fetch_array($result);
	
		return $arr["advertMail"];
		
		
	}
	
	function getAdminPassword($encoded=true){
	
	
	$result=getResult("SELECT `administrator` FROM `generic`");
	
	$arr=mysql_fetch_array($result);
	
	$pwd=crypto($arr["administrator"], true);
	
	if($encoded==true){
		return md5(trim($pwd));
	}else return trim($pwd);
		
	
	
	}
	
	
	function getPassword(){
	global $password;
	return $password;
	}
	
	
	function getUsername(){
	global $DBusername;
	return $DBusername;
	}
	
	
	function getHost(){
	global $host;
	return $host;
	}
	
	function getDatabase(){
	global $database;
	return $database;
	}
	
	
	
	
	function getResult( $sql ){
		$host=getHost();
		$use=getUserName();
		$passwd=getPassword();
		$db=getDatabase();
		
		$connection = mysql_connect($host,$use,$passwd)or 
		
		die("Connection to database failed ". mysql_error());
		
		
		$database = mysql_select_db($db,$connection) or 
		die("could not select the database ". mysql_error());
			
		
		$result=mysql_query($sql,$connection) or 
		die("could not create querry ". mysql_error());
		
	
		return $result;
	}

	function checkLogin(){
		$ses=session_name();
		if( isset($_COOKIE[$ses] ) ) {
			
			$usr=$_COOKIE[$ses];
			
			if(( mysql_num_rows(getResult("select * from user_info where username='{$usr}'")) )>0){
				return true;
			
			}else return false;
		
		}else return false;
		
	
	}
	
	
	function getFormattedTime($stamp){
		
	$timeArray=getdate($stamp);
	
	$min=$timeArray["minutes"];
	if($min<10){
		$min="0".$min;
	}
	$hr=$timeArray["hours"];
	if($hr<10){
		$hr="0".$hr;
	}
	$month=$timeArray["month"];
	$day=$timeArray["weekday"];
	$dt=$timeArray["mday"];
	$year=$timeArray["year"];
	$sufix;
	
	if($dt =="1" || $dt == "21" || $dt == "31"){
		$sufix="st";
	}elseif($dt == "2" || $dt == "22"){
		$sufix="nd";
	}elseif($dt == "3" || $dt == "23"){
		$sufix="rd";
	}else $sufix="th";
	
	
	$timeString = $day." ".$dt.$sufix." of ".$month." ".$year." @ ".$hr.":".$min." hrs";
	
	return $timeString;
}

function getBlogUser($id){
	$result=getResult("SELECT `name` FROM `user_info` WHERE `user_id`='{$id}'");
	
	$arr=mysql_fetch_array($result);
	
	return $arr["name"];

}

function getPostHeadline($id){
	$result=getResult("SELECT `headline` FROM `posts` WHERE `post_id`='{$id}'");
	
	$arr=mysql_fetch_array($result);
	
	return $arr["headline"];

}

function getCategoryName($id){
	$result=getResult("SELECT `name` FROM `categories` WHERE `category_id`='{$id}'");
	
	$arr=mysql_fetch_array($result);
	
	return $arr["name"];


}

function getCategoryId($name){
	$result=getResult("SELECT `category_id` FROM `categories` WHERE `name`='{$name}'");
	
	$arr=mysql_fetch_array($result);
	
	return $arr["category_id"];


}

function validate_email($address) {
  return preg_match('/^[a-z0-9_-][a-z0-9_-]+@([a-z0-9][a-z0-9-]+\.)+[a-z]{2,6}$/i',$address);

}
function validate_phone_no($string){
	 return preg_match('/^[+]\d{3}[-]\d{3}[-]\d{3}[-]\d{3}$/', $string);
 
}

function savePic($uploadedfile , $name ,$newwidth ,$path ,$type){
		
	if($type== "image/jpeg" || $type == "image/pjpeg"){ 
        $src = imagecreatefromjpeg($uploadedfile);
		
    }elseif($type == "image/gif"){ 
       $src = imagecreatefromgif($uploadedfile);
	   
    }elseif($type == "image/png" || $type == "image/x-png"){ 
        $src = imagecreatefrompng($uploadedfile);
    } 
   
	list($width,$height)=getimagesize($uploadedfile);
	
	
	$newheight=($height/$width)*$newwidth;
	
	$tmp=imagecreatetruecolor($newwidth,$newheight);
	
	
	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
	
	
	$filename = $path.$name;
	
	
     if($type== "image/jpeg" || $type == "image/pjpeg"){ 
        imagejpeg($tmp,$filename,100);
		
    } 
    if($type == "image/gif"){ 
       imagegif($tmp,$filename);
	  
    } 
    if($type == "image/png" || $type == "image/x-png"){ 
        imagepng($tmp,$filename); 
		
    } 
   
	imagedestroy($src);
	imagedestroy($tmp); 

}


function newsPicToDb($uploadedfile,$newwidth,$type){
	
	$src = imagecreatefromjpeg($uploadedfile);

	list($width,$height)=getimagesize($uploadedfile);
	
	
	$newheight=($height/$width)*$newwidth;
	$tmp=imagecreatetruecolor($newwidth,$newheight);
	
	
	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
	
	$res=getResult("SELECT `news_id` FROM `news`");
	
	while($array=mysql_fetch_assoc($res)){
	
		$insertId=$array["news_id"];
	}
	
	
	mysql_free_result($res);
	
	
		
	ob_start(); 
    if($type== "image/jpeg" || $type == "image/pjpeg"){ 
        imagejpeg($tmp); 
    } 
    if($type == "image/gif"){ 
          imagegif($tmp); 
    } 
    if($type == "image/png" || $type == "image/x-png"){ 
        imagepng($tmp); 
    } 
	
    $imageBlob = addslashes(ob_get_contents()); 
	
    ob_end_clean();  
		
	$sql="UPDATE `news` SET `blobPicture`=\"".$imageBlob."\" WHERE `news_id`='{$insertId}'";
	
	
	
	$res=getResult($sql);
	
	
	
	
	imagedestroy($src);
	imagedestroy($tmp); 
	
	if($res>0){
		return true;
	}else return false;

}



function getBlob($uploadedfile,$newwidth,$type){
	$size=filesize($uploadedfile);
	//echo "size is {$size}<p>";//exit();
	  if($type== "image/jpeg" || $type == "image/pjpeg"){ 
        $src = imagecreatefromjpeg($uploadedfile);
    } 
    if($type == "image/gif"){ 
          $src = imagecreatefromgif($uploadedfile);
    } 
    if($type == "image/png" || $type == "image/x-png"){ 
       $src = imagecreatefrompng($uploadedfile); 
    } 
	

	list($width,$height)=getimagesize($uploadedfile);
	
	
	$newheight=($height/$width)*$newwidth;
	$tmp=imagecreatetruecolor($newwidth,$newheight);
	
	
	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
	
	ob_start(); 
    if($type== "image/jpeg" || $type == "image/pjpeg"){ 
        imagejpeg($tmp); 
    } 
    if($type == "image/gif"){ 
          imagegif($tmp); 
    } 
    if($type == "image/png" || $type == "image/x-png"){ 
        imagepng($tmp); 
    } 
	
    $imageBlob = addslashes(ob_get_contents()); 
	
    ob_end_clean();  
		
	
	imagedestroy($src);
	imagedestroy($tmp); 
	
	return $imageBlob;

}

function getAdvPic($inRoot=true,$low="0", $hi="4"){
	$result=getResult("SELECT `house_id` FROM `houses` ORDER BY `house_id` DESC limit {$low},{$hi}");
					
		while($array=mysql_fetch_assoc($result)){
			
			foreach($array as $key => $value){
					
					echo "<center>";
					if($inRoot==false){
						echo "<img src=\"../scripts/dbImage.php?id={$value}&cat=houses&def=front\"/> <br><br>";
						echo "<a href=\"../details.php?id={$value}\" > more about this house</a>";
					}else{
					echo "<img src=\"scripts/dbImage.php?id={$value}&cat=houses&def=front\"/> <br><br>";
					echo "<a href=\"details.php?id={$value}\" > more about this house</a>";
					}
					echo "</center>";
					echo "<br><br>";
					
				}
			}mysql_free_result($result);



}

function crypto($text, $decrypt=false){
	$secret = "siri";
	$ivsize = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
	
	if($decrypt==true){
		$niv = mcrypt_create_iv($ivsize, MCRYPT_RAND);
		$dec = mcrypt_decrypt(MCRYPT_BLOWFISH, $secret, $text, MCRYPT_MODE_ECB, $niv);
		return $dec;
	
	}else{
		
		$iv = mcrypt_create_iv($ivsize, MCRYPT_RAND);
		$enc = mcrypt_encrypt(MCRYPT_BLOWFISH, $secret, $text, MCRYPT_MODE_ECB, $iv);
		return $enc;
	}

}

function getHeadlines($inRoot=true){
	
	$res=getResult("SELECT `headline` FROM `news` ORDER BY `news_id` DESC LIMIT 0,9 ");
	
	if(mysql_num_rows($res)==0){
	
		$title="NO NEWS!";
	
	}else{$title="Top 10 headlines";}


	$html="<br>&nbsp;<div style=\"height:200px;max-height:500px; overflow:auto; background-color:#E9FCFC;
	border:4px double #CBE7EB;\">
	<center>  
	<br>
	
	</center>
	<table  width=\"100%\"  border=\"0\" align=\"left\" cellpadding=\"4\" cellspacing=\"3\" class=\"hedlines\" 
	  style=\"margin-top:15px;overflow:auto; border-top:;\" bgcolor=\"#CBE7EB\">
	  <tr>
	  <td bgcolor=\"#E9FCFC\" class=\"subHeader\" style=\"border:6px solid #CBE7EB;padding:5px;\" nowrap=\"nowrap\">
	  {$title}
	</span>
	</tr>
	  
	  
	  ";
	
	
		$c=0;
		while($arr=mysql_fetch_assoc($res)){
	
	
			//print_r($arr);
			//exit;
		for($i=0;$i<count($arr);$i++){
			$name=$arr['headline'];
		if($name!=""){
			if($c==0){
			
				if($inRoot==false){
					$html.="<tr><td><a href=\"../news/news.php\">{$name}</a></td></tr>";
				
				}else $html.="<tr><td><a href=\"./news/news.php\">{$name}</a></td></tr>";
			
			}else {
			
				$low=$c;
				$up=$low+1;
			
				if($inRoot==false){
				
					$html.="<tr><td><a href=\"../news/news.php?lowLim={$low}&upLim={$up}\">{$name}</a></td></tr>";
			
				}else $html.="<tr><td><a href=\"./news/news.php?lowLim={$low}&upLim={$up}\">{$name}</a></td></tr>";
			}
		}
		}
			$c++;
	}

	$html.="</table><div>";
	
	return $html;

}


?>