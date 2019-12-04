<?php 
require_once("../scripts/dbScripts.php");

$res=getResult("SELECT `blobPicture` FROM `news` WHERE `news_id`='1'");

$arr=mysql_fetch_assoc($res);

//$img=imagecreatefrom
$arr["blobPicture"];

?>