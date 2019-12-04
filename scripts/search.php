<?php 
require("dbScripts.php");

$id=$_POST["id"];

$numero=false;

if(is_numeric($id)==1){
	$numero=true;
}

if($id==""){
	invalid();
 
}/*elseif($numero==false){
	
	//header("location:../details.php?id={$id}");
	//exit;

}*/elseif($numero==true && validate("select * from houses where house_id={$id}")==true ){
	
	header("location:../details.php?id={$id}");
	exit;

}else
	invalid();

function validate( $sql ){
	
	$result=getResult($sql);
	
	if (count(mysql_fetch_array($result))<=1){
				
		return false;
	
	}else return true;


}
function invalid(){
	echo "
	<html>
	<body bgcolor=\"#79BDFE\">
	<center>
	<div style=\"margin-top:180px; margin-left:80px; border:thin solid #E8F0EC; 
	width:400px; height=100px; font-family:Arial, Verdana,sans-serif;
	color:#660000;line-height:20px;\">
	<font size=-1>
	Sorry ,no matching result found in the database<br>
	the id used for the search is invalid<br>
	prealse ensure you have the correct id and try again 
										
	<p>
	<a href=\"../index.php\" 
	style=\"color:#003366;text-decoration:underline;\" class=\"linktext\"> 
	back to home page..<a/>
	</font >
	</div>
	<center>
	
	</body>
	</html>
	";


}

?>