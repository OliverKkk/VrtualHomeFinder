<?php 

require("../scripts/dbScripts.php");
$adminPass=getAdminPassword();
//$adminPass=getAdminPassword(false);
//echo $adminPass;exit();
$loginPass;
$hashLogin;
$log=check_expired();

if(isset ($_GET["tok"]) ){
	
	$hashLogin=$_GET["tok"];
	
}else{
	
	$loginPass=$_POST["pas"];
	
	//echo "login is :::".$loginPass."<br>";
	
	$hashLogin=md5($loginPass);
}

//echo "hash is ::: ".$hashLogin." admin is :::".$adminPass;exit();

if($hashLogin==$adminPass){
    setcookie("logged","ok",time()+1800);
}else{
 	
	header("location:adminLogin.php?error=The login is incorrect,access denied!");
}

function check_expired(){
	if( !isset($_COOKIE["logged"]) ){
		header("location:adminLogin.php?error=Admin login expired,please login again");
	}else return true;

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="../css/indexStyle.css" />
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
<title>Kenya Virtual Homes admin | Main</title>
<script type="text/javascript">
	function validate(){
		if(document.advert_data.location.value==""){
			alert("please enter a value for house location first !");
			return false;
		}if(document.advert_data.price.value==""){
			alert("please enter a value for house price first !");
			return false;
		}if(document.advert_data.rooms.value==""){
			alert("please enter a value for house rooms first !");
			return false;
		}if(document.advert_data.water.value==""){
			alert("please enter a value for house water connection first !");
			return false;
		}if(document.advert_data.elec.value==""){
			alert("please enter a value for house electricity connection first !");
			return false;
		}if(document.advert_data.description.value==""){
			alert("please enter a brief description of the house first !");
			return false;
		}if(document.advert_data.uploadFront.value==""){
			alert("please upload the Front picture first !");
			return false;
		}if(document.advert_data.uploadBack.value==""){
			alert("please upload the Back picture first !");
			return false;
		}if(document.advert_data.uploadCompound.value==""){
			alert("please upload the Compound picture first !");
			return false;
		}if(document.advert_data.uploadInterior.value==""){
			alert("please upload the Interior picture first !");
			return false;
		}if(document.advert_data.uploadMain.value==""){
			alert("please upload the Main picture first !");
			return false;
		}if(document.advert_data.agent.value==""){
			alert("please upload the Main picture first !");
			return false;
		}if(document.advert_data.agent_no.value==""){
			alert("please upload the Main picture first !");
			return false;
		}
	}
	
	
	function checkCat(){
		if(document.category_data.categoryName.value==""){
		alert("please enter a category name first !");
		return false;
		}
	}
	
	function checkGeneric(){
		if(
		(document.generic_data.infoMail.value=="NOT SET!!!" || document.generic_data.infoMail.value=="") && 
		(document.generic_data.purchaceMail.value=="NOT SET!!!" || document.generic_data.purchaceMail.value=="") && 
		(document.generic_data.advertMail.value=="NOT SET!!!" || document.generic_data.advertMail.value=="") &&
		(document.generic_data.pas.value=="" && document.generic_data.confPas.value=="")
		){
			alert("NO data to send !!");
			return false;
		
		} else{
		
			if(document.generic_data.pas.value !="" ){
				if(document.generic_data.pas.value != document.generic_data.confPas.value){
					alert("The two passwords do not match !!");
					return false;
				}
			}
		}
	
	}
	
	
function pageArray(count){
	var cnt=count;
	var countSpan = document.getElementById("countSpan");
	countSpan.innerHTML = " ";
 	html="Jump to article : <br>";
 	for(i=0;i<count;i++){
 	
	if(i==20 || i>20){
		incr=i+4;
		if( incr<count ){
			i=incr;
		}
	}else if(i==40 || i>40){
		incr=i+9;
		if( incr<count ){
			i=incr;
		}
	}else if(i==80 || i>80){
		incr=i+14;
		if( incr<count ){
			i=incr;
		}
	}else if(i==100 || i>100){
		incr=i+19;
		if( incr<count ){
			i=incr;
		}
	}
 	
	actual=i+1;
 	html+="<a href=\"admin.php?lowLim="+i+"&upLim="+actual+"&tok=<?php echo $adminPass?>#nws\" > | "+actual+"</a>";
 
 }
   
  countSpan.innerHTML = html;

}
</script>
</head>

<body bgcolor="#CBE7EB">
<center>
  <span class="quote" style="text-decoration:underline">Kenya Virtual Homes Administrator 
  Module</span> <br>
  &nbsp;<br>&nbsp;
<span class="subHeader">Control Panel</span>
<br />
  <hr width="100%" color="#FFFFFF"  style="height:5px;"/>
  &nbsp;<br>
  <?php 
	
	
	
	function getUpLim($total){
			
			if( isset($_GET["upLim"]) ){
				
				return $_GET["upLim"];
						
			}else{
				if($total<10){ 
					
					return $total;
					
				}else {return 9;}
			}
		}
		
		function getLowLim(){
			if(isset($_GET["lowLim"])){
				return $_GET["lowLim"];
			}else return 0;
		}

?>
  &nbsp;
  <table width="100%">
  <tr>
  <td align="left">
  <span id="clock">Thursday, January 15, 2009 11:25:40 A.M.</span>
<script type="text/javascript" src="../scripts/clock.js"></script>
  </td>
  <td align="right"><a href="logout.php"><font size="-1">log out</font></a></td>
  </tr>
  </table>
<br>
&nbsp;

<div style="border:#666666 thin dotted; width:100%;" >
<span class="subHeader" style="text-decoration:underline"> Place a new house advertisement</span>
&nbsp;<br>
<span class="bodyText" style="text-decoration:underline"> 
Fill in the house details</span>
&nbsp;<br />
<a name="adv"></a>
&nbsp;<br />
<center>
<span class="subHeader">
<font color="#CC0033">
<?php if(isset($_GET["error"])){echo $_GET["error"];}?> 
</font>
</span>
</center>
&nbsp;<br />

<form action="newAdvert.php" method="post" name="advert_data" onsubmit="return validate()" 
enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="2" cellpadding="2" class="bodyText">
  <tr>
    <td width="18%" align="left">Type</td>
    <td width="82%"><select name="category" style="width:400px;" >
      <?php 
			
			$result=getResult("select `name` from `categories`");
			//$result=getResult("select type from houses");
			
		while($array=mysql_fetch_assoc($result)){
		
			foreach($array as $key => $value){
			echo "<option value=\"{$value}\">{$value}</option>";
			
			}
		 
		 }mysql_free_result($result);
			
		
	    ?>
    </select>
      <!--<input name="type" type="text" size="130" maxlength="256" />-->	</td>
  </tr>
  <tr>
    <td align="left">Location</td>
    <td><input name="location" type="text" size="130" maxlength="256" /></td>
  </tr>
  <tr>
    <td align="left">Price</td>
    <td><input name="price" type="text" size="130" maxlength="256" /></td>
  </tr>
  <tr>
    <td align="left">Rooms</td>
    <td><input name="rooms" type="text" size="130" maxlength="256" /></td>
  </tr>
  <tr>
    <td align="left">Water Connection</td>
    <td><input name="water" type="text" size="130" maxlength="256" /></td>
  </tr>
  <tr >
    <td>Electricity Connection </td>
    <td><input name="elec" type="text" size="130" maxlength="256" /></td>
  </tr>
  <tr >
    <td>Agent </td>
    <td><input name="agent" type="text" size="130" maxlength="256" /></td>
  </tr>
  
  <tr >
    <td>Agent's number </td>
    <td><input name="agent_no" type="text" size="130" maxlength="256" /></td>
  </tr>
  <tr>
    <td align="left">Description</td>
    <td>
	<textarea name="description" cols="98" rows="10"></textarea>	</td>
  </tr>
</table>
 <br>
<span class="bodyText" style="text-decoration:underline"> Upload house images below</span>
&nbsp;<br>
<table width="100%" border="0" cellspacing="2" cellpadding="2" class="bodyText">
  <tr>
    <td width="12%">Front</td>
    <td width="88%"> <input type="file" name="uploadFront" size="100"/></td>
  </tr>
  <tr>
    <td>Living Room </td>
    <td><input type="file" name="uploadBack" size="100"/></td>
  </tr>
  <tr>
    <td>Kitchen</td>
    <td><input type="file" name="uploadCompound" size="100"/></td>
  </tr>
  <tr>
    <td>Bedrooms</td>
    <td><input type="file" name="uploadInterior" size="100"/></td>
  </tr>
  <tr>
    <td>Bathroom</td>
    <td><input type="file" name="uploadMain" size="100"/></td>
  </tr>
</table>
&nbsp;<br>&nbsp;<br>
<table width="76%" border="0" cellspacing="2" cellpadding="2" class="bodyText" style="border:#CCCCCC 2px groove;margin-bottom:10px;">
  <tr>
    <td width="46%" align="left" ><font color="#660000" size="-1" style="font-weight:bolder">Upload advertisement now :</font> </td>
    <td width="54%" align="right">
	<input name="submit" type="submit" value="Submit advert" style="width:200px" onclick="return validate()"/>
	</td>
  </tr>
</table>

</form>

<br>
&nbsp;
<center>
<span class="subHeader" style="text-decoration:underline;">
 Manage house categories
 <br>
 <font color="#CC0033">
 <?php if(isset($_GET["ctms"])){echo $_GET["ctms"];}?>
 </font>
 </span>
</center>
<a name="ct"></a>

<br>
&nbsp;
<table width="" height="" align="center" class="bodyText" 
	style="border:#330066 1px dotted; max-height:350px; overflow:auto; width:603px; height:150;">
<tr>
  <td width="366" height="48" colspan="2" align="left" class="subHeader" style="text-decoration:underline" bgcolor="#E7EAED">
current categories:</td>
</tr>

<?php
		$result=getResult("select * from `categories`");
		$cId;
		
		while($array=mysql_fetch_assoc($result)){
		
			foreach($array as $key => $value){
			
			if($key=="category_id"){
				$cId=$value;
			
			}elseif($key=="name"){
			
			echo "<tr bgcolor=\"#F2F7F4\">";
			echo "<td align=\"left\">{$value}</td>";
				  
			echo "<td><a href=\"editData.php?cat=categories&cId={$cId}\" class=\"smallText\">
			delete category</a>";
			echo "</td></tr>";
			}
			
			}
		}mysql_free_result($result);
		
		?>
	
</table>
<br>&nbsp;
<br>&nbsp;
<center>
<form action="editData.php?cat=newCategory" method="post" name="category_data" onsubmit="return checkCat()">
<table width="603" border="0" cellspacing="2" cellpadding="2" class="bodyText" style="border:#CCCCCC 2px solid;margin-bottom:10px;">
<tr><td width="219">Enter new category name</td>
		<td width="307"><input type="text" name="categoryName" size="50"/></td>
		<td width="53"><input name="submit" type="submit" value="Submit" style="width:50px" /></td>
	  </tr>
</table>
</form>

<br>
&nbsp;
<center>
<span class="subHeader" style="text-decoration:underline;">
 Manage access data
 <br>
 <font color="#CC0033">
 <?php if(isset($_GET["acms"])){echo $_GET["acms"];}?>
 </font>
 </span>
</center>
<a name="ac"></a>
<form action="editData.php?cat=generic" method="post" name="generic_data" onsubmit="return checkGeneric()">
<table width="" height="" align="center" class="bodyText" 
style="border:#330066 1px dotted; max-height:350px; overflow:auto; width:603px; height:150;">

<tr bgcolor="#F1D9F2" style="color:#990033;">
<td>Current admin password:</td>
<td><?php 
	if(getAdminPassword(false) !=""){
		$p=getAdminPassword(false);
		echo $p;
		
	}else echo "This password is blank update imediately";

?></td>
</tr>

<tr bgcolor="#F2F7F4">
<td>New admin password:</td>
<td><input name="pas" type="password" size="50" value=""/></td>
</tr>

<tr bgcolor="#F2F7F4">
<td>Retype password:</td>
<td><input name="confPas" type="password" size="50" value=""/></td>
</tr>

<tr bgcolor="#F2F7F4">
<td>info e-mail address:</td>
<td>
<?php 
	if(getInfoMail()!=""){
		
		echo "<input name=\"infoMail\" type=\"text\" size=\"50\" value=\"".getInfoMail()."\"/>";
	
	}else{

?>

<input name="infoMail" type="text" size="50" value="NOT SET!!!"/>

<?php }?>
</td>
</tr>

<tr bgcolor="#F2F7F4">
<td>purchase request e-mail address:</td>
<td>
<?php 
	if(getPurchaceMail()!=""){
		
		echo "<input name=\"purchaceMail\" type=\"text\" size=\"50\" value=\"".getPurchaceMail()."\"/>";
	
	}else{

?>
<input name="purchaceMail" type="text" size="50" value="NOT SET!!!"/>
<?php }?>
</td>
</tr>

<tr bgcolor="#F2F7F4">
<td>advert request e-mail address:</td>
<td>
<?php 
	if(getAdvertMail()!=""){
		
		echo "<input name=\"advertMail\" type=\"text\" size=\"50\" value=\"".getAdvertMail()."\"/>";
	
	}else{

?>
<input name="advertMail" type="text" size="50" value="NOT SET!!!"/>
<?php } ?>
</td>
</tr>
<tr>
<td colspan="2" align="right" bgcolor="#F2F7F4">
<input name="submit" type="submit" value="Submit" style="width:100px" /></td>
</tr>
</table>
</form>


</center>
<p>

</div>
<br>&nbsp;
<br>&nbsp;
<p>

<?php
 
 if(isset($_GET["cat"])){$type=$_GET["cat"];};
 	$total=mysql_num_rows(getResult("SELECT * FROM `houses`"));
 	$step=5;
	//$startRow=setStartRow();
		
		function setStartRow($step){
			
			//global $step;
			
			if( isset($_GET["key"]) && $_GET["key"]=="next" ){
				
				return $_GET["prev"]+$step;
			
			}elseif( isset($_GET["key"]) && $_GET["key"]=="prev" ){
			
				return $_GET["prev"]-$step;
				
							
			}else return 0;
			
		}
		
	if( isset($_GET["table"]) && $_GET["table"]=="adverts"){
		$startRow=setStartRow($step);
	}else $startRow=0;
 
 $result=getResult("SELECT * FROM `houses` ORDER BY `house_id` DESC LIMIT {$startRow},{$step}");
 
 
 
 
 //$lowLim=getLowLim($total);
// $upLim=getUpLim($total);

?>
<a name="hse" id="jinx"></a>
<div style="border:#666666 thin dotted; width:100%;" >
<span class="subHeader" style="text-decoration:underline"> Current house advertisements<br>
<font color="#CC0033">
<?php
if( isset($_GET["hsems"]) ){echo $_GET["hsems"];}
?>
</font>
</span>
<table  border="0" cellpadding="2" cellspacing="3" class="quote" align="center" style="overflow:scroll;" id="displyTables">
          <tr align="center" bgcolor="#CCCCCC" style="border:thin inset #666666;" height="10px">
            <td width="167" >Image</td>
            <td width="167">House id</td>
            <td width="167">Type</td>
            <td width="167">Location</td>
            <td width="167">Price</td>
			<td width="167">Remove</td>
          </tr>
          <?php
	 while($row=mysql_fetch_assoc($result)){
		$id;
		echo " <tr bgcolor=\"#E2E8E9\" height=10px>";
		foreach($row as $key=>$value){
			
			
			if( $key=="house_id"){
				$id=$value;
				
				echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\"        							                       valign=\"middle\" height=\"20px\">";
				
				echo " <img src=\"../scripts/dbImage.php?id={$id}&cat=houses&def=front\" class=\"link2\" border=\"0\"
						
						width=\"130\" height=\"120\" />";
				
				echo " </td>";
			
				
				
				echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\" 
					  height=\"20px\">";
				echo"<a href=\"../details.php?id={$id}\" class=\"link2\">";
				echo "{$value}";
				echo"</a>";
				echo " </td>";
				
				
			}	
			
					
			
			elseif( $key=="category_id"){
			echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\"
			       height=\"20px\">";
			echo "<a href=\"../details.php?id={$id}\" class=\"link2\">";
			echo getCategoryName($value);
			echo "</a>";
			echo " </td>";
			
			}
			elseif( $key=="location"){
			echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\"
			       height=\"20px\">";
			echo "<a href=\"../details.php?id={$id}\" class=\"link2\">";
			echo "{$value}";
			echo "</a>";
			echo " </td>";
			
			}
			elseif( $key=="price"){
			echo " <td style=\"border-bottom:thin dotted #330033;\" align=\"center\" 
			        height=\"20px\">";
			echo "<a href=\"../details.php?id={$id}\" class=\"link2\">";
			echo "{$value}";
			echo "</a>";
			echo " </td>";
			}
			
			
			
			
			}
			echo " <td style=\"border-bottom:thin dotted #330033;\" align=\"center\" 
			        height=\"20px\">";
			echo "<a href=\"editData.php?cat=house&id={$id}\" class=\"smallText\">";
			echo "Delete this advert";
			echo "</a>";
			echo " </td>";
			
			echo " </tr>";
			
	  
	  }
	  ?>
	  <tr>
	  <td colspan="6">
	 
	  <table width="100%" border="0" cellspacing="2" cellpadding="2" class="smallText" bgcolor="#E2E8E9">
  <tr>
    <td width="61%" align="left">Viewing entry(s) :
	<?php 
	if( isset($_GET["table"]) && $_GET["table"]=="adverts"){
		$startRow=setStartRow($step);
	}else $startRow=0;
	
	if(($startRow+$step)>$total){
		$left=$total;
	
	}else $left=($startRow+$step);
	
	echo $startRow." to ".($left)." of ".$total
	
	?>
	
	</td>
    <td width="18%" align="right">
	<?php 
	
	if( isset($_GET["table"]) && $_GET["table"]=="adverts"){
		$startRow=setStartRow($step);
	}else $startRow=0;
		
	if($startRow>0){
	?>
	
	<a href="admin.php?table=adverts&tok=<?php echo $hashLogin?>&key=prev&prev=<?php echo $startRow;?>#hse"> &lt; BACK </a>
	
	<?php 
	}else {
	echo "START REACHED"; 
	}
	?>	</td>
	
    <td width="21%"  align="right">
	<?php 
	
	if( isset($_GET["table"]) && $_GET["table"]=="adverts"){
		$startRow=setStartRow($step);
	}else $startRow=0;
	
	if(!($startRow+$step>=$total)){
		
	?>
	<a href="admin.php?table=adverts&tok=<?php echo $hashLogin?>&key=next&prev=<?php echo $startRow;?>#hse"> NEXT &gt; </a>
	<?php }else echo "END REACHED" ?>	</td>
  </tr>
</table>
	  </td>
	  </tr>
    </table>
</div>
<br>&nbsp;
<br>&nbsp;
<p>
<?php 
	$step=10;
	$total=mysql_num_rows(getResult("SELECT * FROM `user_info`"));
	
	if( isset($_GET["table"]) && $_GET["table"]=="users"){
		$startRow=setStartRow($step);
	}else $startRow=0;

$result=getResult("SELECT `user_id`,`name` , `username` , `email` FROM `user_info` 
				   ORDER BY `user_id` LIMIT {$startRow},{$step}");
 
?>
<a name="usr" id="jinx"></a>
<div style="border:#666666 thin dotted; width:100%;" >
<span class="subHeader" style="text-decoration:underline"> Current blog users<br>
<font color="#CC0033">
<?php
if( isset($_GET["usrms"]) ){echo $_GET["usrms"];}
?>
</font>
</span>
<table  border="0" cellpadding="2" cellspacing="3" class="quote" align="center" style="overflow:scroll;" 
height="113" width="100%">
	<tr align="center" bgcolor="#CCCCCC" style="border:thin inset #666666;" height="10px">
        <td width="167" >Name</td>
        <td width="167">Username</td>
        <td width="167">E-mail address</td>
		<td width="167">Remove</td>
    </tr>
<?php while($row=mysql_fetch_assoc($result)){ ?>
	<tr bgcolor="#EFF4F5" height="10px" class="bodyText">
	<?php 
		$usr;
		foreach($row as $key=>$value){ 
			if($key=="user_id"){
					$usr=$value;
					continue;
				}
			echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\"height=\"20px\">".$value."</td>";
			
			
		}
		echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\"height=\"20px\">
		<a href=\"editData.php?cat=users&usr={$usr}\" class=\"smallText\">Delete this user</a>
		</td>";
	?>
	</tr>
<?php }?>
<tr>
<td colspan="4">
<table width="100%" border="0" cellspacing="2" cellpadding="2" class="smallText" bgcolor="#E2E8E9">
  <tr>
    <td width="61%" align="left">Viewing entry(s) : <?php 
	
	if( isset($_GET["table"]) && $_GET["table"]=="users"){
		$startRow=setStartRow($step);
	}else $startRow=0;

	if(($startRow+$step)>$total){
		$left=$total;
	
	}else $left=($startRow+$step);
	
	echo $startRow." to ".($left)." of ".$total
	
	?>	</td>
    <td width="18%" align="right">
	<?php 
	
	if( isset($_GET["table"]) && $_GET["table"]=="users"){
		$startRow=setStartRow($step);
	}else $startRow=0;
		
	if($startRow>0){
	?>
	
	<a href="admin.php?table=users&tok=<?php echo $hashLogin?>&key=prev&prev=<?php echo $startRow;?>#usr"> &lt; BACK </a>
	<?php 
	}else {
	echo "START REACHED"; 
	}
	?></td>
	
    <td width="21%"  align="right">
	<?php 
	
	if( isset($_GET["table"]) && $_GET["table"]=="users"){
		$startRow=setStartRow($step);
	}else $startRow=0;
	
	if(!($startRow+$step>=$total)){
		
		
	?>
	<a href="admin.php?table=users&tok=<?php echo $hashLogin?>&key=next&prev=<?php echo $startRow;?>#usr"> NEXT &gt; </a>
	<?php }else echo "END REACHED" ?>	</td>
  </tr>
</table>

</td>
</tr>
</table>
</div>
<br>&nbsp;
<br>&nbsp;
<p>
<?php 
$step=10;
$total=mysql_num_rows(getResult("SELECT * FROM `posts`"));

if( isset($_GET["table"]) && $_GET["table"]=="posts"){
		$startRow=setStartRow($step);
	}else $startRow=0;

$result=getResult("SELECT `post_id`,`user_id` , `headline` , `data`, `comments`,`date` FROM `posts`
				  ORDER BY `post_id` DESC LIMIT {$startRow},{$step}");


?>
<a name="pst" id="jinx"></a>
<div style="border:#666666 thin dotted; width:100%;" >

<span class="subHeader" style="text-decoration:underline">Current blog posts</span><br>
<span class="subHeader">
<font color="#CC0033">
<?php
if( isset($_GET["pstms"]) ){echo $_GET["pstms"];}
?>
</font>
</span>
<table  border="0" cellpadding="2" cellspacing="3" class="quote" align="center" style="overflow:scroll;" 
height="113" width="100%">
	<tr align="center" bgcolor="#CCCCCC" style="border:thin inset #666666;" height="10px">
        <td width="167" >By</td>
        <td width="167">Headline</td>
        <td width="167">Post</td>
		<td width="167">Comments</td>
		<td width="167">Posted on</td>
		<td width="167">Remove</td>
    </tr>
	<?php while($row=mysql_fetch_assoc($result)){ ?>
	<tr bgcolor="#EFF4F5" height="10px" class="bodyText">
		<?php 
		$Pid;
		foreach($row as $key=>$value){ 
			if($key=="post_id"){
				$Pid=$value;
			}elseif($key=="user_id"){
				echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\"height=\"20px\">"
				.getBlogUser($value)."</td>";
			}elseif($key=="headline"){
				echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\"height=\"20px\">".$value."</td>";
			}elseif($key=="data"){
				echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\"height=\"20px\">".$value."</td>";
			}elseif($key=="comments"){
				echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\"height=\"20px\">".$value."</td>";
			}elseif($key=="date"){
				echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\"height=\"20px\">"
				.getFormattedTime($value)."</td>";
			}
			
		}
		echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\"height=\"20px\">
		<a href=\"editData.php?cat=posts&Pid={$Pid}\" class=\"smallText\">Delete this post</a>
		</td>";
		
		?>
	  </tr>
<?php }?>
<tr>
<td colspan="6"><table width="100%" border="0" cellspacing="2" cellpadding="2" class="smallText" bgcolor="#E2E8E9">
  <tr>
    <td width="61%" height="34" align="left">Viewing entry(s) :
	 <?php if( isset($_GET["table"]) && $_GET["table"]=="posts"){
		$startRow=setStartRow($step);
	}else $startRow=0;
	
	if(($startRow+$step)>$total){
		$left=$total;
	
	}else $left=($startRow+$step);
	
	echo $startRow." to ".($left)." of ".$total
	
	?></td>
    <td width="18%" align="right"><?php 
	
	if( isset($_GET["table"]) && $_GET["table"]=="posts"){
		$startRow=setStartRow($step);
	}else $startRow=0;
	
	if($startRow>0){
	?>
        <a href="admin.php?table=posts&tok=<?php echo $hashLogin?>&key=prev&prev=<?php echo $startRow;?>#pst"> &lt; BACK </a>
        <?php 
	}else {
	echo "START REACHED"; 
	}
	?>    </td>
    <td width="21%"  align="right"><?php 
	
	if( isset($_GET["table"]) && $_GET["table"]=="posts"){
		$startRow=setStartRow($step);
	}else $startRow=0;
	
	if(!($startRow+$step>=$total)){
		
	?>
        <a href="admin.php?table=posts&tok=<?php echo $hashLogin?>&key=next&prev=<?php echo $startRow;?>#pst"> NEXT &gt; </a>
        <?php }else echo "END REACHED" ?>    </td>
  </tr>
</table></td>
</tr>
</table>
</div>


<br>&nbsp;
<br>&nbsp;
<p>
  <?php 
/*$total=mysql_num_rows(getResult("SELECT * FROM `posts`"));

if( isset($_GET["table"]) && $_GET["table"]=="posts"){
	$lowLim=getLowLim($total);
	$upLim=getUpLim($total);
	}else{
		$lowLim=0;
		if($total==0){
		$upLim=0;
		}elseif($total<10){
		$upLim=$total;
		}
	}



//$result=getResult("SELECT `post_id`,`user_id` , `headline` , `data`, `comments`,`date` FROM `posts`
				 // ORDER BY `post_id` LIMIT {$lowLim},{$upLim}");

*/
?>
  <a name="nws" id="jinx"></a>
<div style="border:#666666 thin dotted; width:100%;" >
<span class="subHeader" style="text-decoration:underline">Current news articles</span><br>
<span class="subHeader">
<font color="#CC0033">
<?php
if( isset($_GET["nwsms"]) ){echo $_GET["nwsms"];}
?>
</font>
</span>
<p>
<?php 
		
		
		$totalPosts=mysql_num_rows(getResult("SELECT * FROM `news`"));
		
		function getNwsUpLim(){
			global $totalPosts;
			if( isset($_GET["upLim"]) ){
				
				return $_GET["upLim"];
						
			}else{
				if($totalPosts<2){ 
					
					return $totalPosts;
					
				}else {return 1;}
			}
		}
		
		function getNwsLowLim(){
			if(isset($_GET["lowLim"])){
				return $_GET["lowLim"];
			}else return 0;
		}
		
	
	
		$execute=true;
		$picture;
		$lowLim=getNwsLowLim();
		$upLim=getNwsUpLim();
		$authorMail;
		$views;
		$result=getResult("SELECT  `news_id`,`headline` , `date` ,`picName`,`data`, `author_email` , `views`,`author`
						  FROM `news` ORDER BY `news_id` DESC LIMIT {$lowLim},{$upLim}");
		$returned=mysql_num_rows($result);
		if(!($returned>0)){ echo "<span class=\"quote\"><font color=\"#990000\" size=\"+2\">NO ARTICLES TO VIEW</font></span>
								  <br>&nbsp;<a href=\"../index.php\"> Back to home page </a>"; 
		$execute=false;
		}
		
		
		
	?>
	<!--<font color="#990000"/>-->
	<?php if($execute==true){  
		$row=mysql_fetch_array($result);
		$sentHeadline=false;
		$headline;
		$id;
	
	?>
	
	
	<table width="101%" class="smallText" style="border:#999999 3px double" cellpadding="3" cellspacing="5" 
	 id="">
            <?php foreach($row as $key=>$value){    ?>
           	
			<?php if($key == "news_id"){$id=$value;}
			elseif($key == "headline" && $sentHeadline!=true){ 
			
			$sentHeadline=true; 
			$headline=$value;
			
			?>
			
            <tr bgcolor="#DBE0E8">
              <td width="16%" valign="middle" align="left"><img src="../images/ico_archive.gif"/>&nbsp;Headline:</td>
              <td colspan="2" align="left" class="subHeader"><font color="#660000"><?php echo $value?></font></td>
            </tr>
            <?php } elseif($key =="date" ){?>
            <tr>
              <td width="16%" valign="middle" align="left"><img src="../images/ico_date.gif"/>&nbsp;Posted on:</td>
              <td colspan="2" align="left"><?php echo getFormattedTime($value)?> </td>
            </tr>
            <?php 
				}elseif($key =="jpegPicture" ){
					$picture=$value;
				} elseif($key =="data" ){
			?>
            <tr>
              <td colspan="3" align="justify" style="border:#666666 1px dotted; height:200;overflow:scroll; font-size:13px;">
			  
			  <table align="left" border="0" width="100%">
			 	 <tr>
			  		<td align="left"> 
					<img src="../scripts/dbImage.php?id=<?php echo $id?>&cat=news" alt="NO IMAGE" /></img>
					<p></td>
			  	</tr>
				<tr>
					<td align="center">
					<br>&nbsp;
					<textarea name="textarea"  cols="120" rows="15" readonly="readonly" wrap="virtual" 
				bgcolor="#CBE7EB" style="background-color:#CBE7EB;border:0px; width:100%;" 
				class="bodyText" ><?php echo trim($value)?></textarea></td>
				</tr>
			  </table>
			  		  	  
			  </td> 
            </tr>
            <?php } 
			elseif($key =="author_email" ){
				$authorMail=$value;
		
			}elseif($key =="views" ){
				$views=$value;
			}elseif($key =="author" ){
			
			?>
            <tr>
              <td width="16%" valign="middle" align="left"><img src="../images/ico_user.gif" />&nbsp;Author:</td>
              <td width="31%" align="left"><?php echo $value; ?></td>
              <td width="53%" align="right">
			 <font size="-2"> <a href="mailto:<?php echo $authorMail; ?>"> email <?php echo $value;?></a> &nbsp; |
			  &nbsp; viewd : <?php
			  echo $views+1;
			 
			  $res=getResult("UPDATE `news` SET `views` = '".($views+1)."' WHERE `news_id` ='{$id}' LIMIT 1");
			  
			
			  
			  ?> times</font>
			  
			  <?php  }?> </td>
            </tr>
            <?php } ?>
            <?php //}?>
    </table>
		<?php }?>
		<a href="editData.php?cat=news&id=<?php echo $id?>&headline=<?php echo $headline;?>"><font color="#990000">
		delete this article</font></a>
		<br />&nbsp;
			<table width="100%" border="0" cellspacing="2" cellpadding="2" class="smallText" >
  <tr bgcolor="#E2E8E9">
    <td width="61%" align="left" >Viewing Article : <?php echo $upLim." of ".$totalPosts?></td>
	
    <td width="18%" align="right">
	<?php 
	$lowLim=getNwsLowLim();
	$upLim=getNwsUpLim();
	if(!(($lowLim-1)<0) ){	
		
		if( $lowLim-1 == 0 ){
			$lowLim=0;
			$upLim=1;
		}else{
			$lowLim-=1;
			$upLim-=1;
		
		}
	?>
	
	<a href="admin.php?lowLim=<?php echo $lowLim ?>&upLim=<?php echo $upLim ?>&tok=<?php echo $adminPass?>#nws" 
	onmouseover="pageArray(<?php echo $totalPosts?>)"> &lt; BACK </a>
	
	<?php 
	}else {
	echo "START REACHED"; 
	}
	?>	</td>
	
    <td width="21%"  align="right">
	<?php 
	$lowLim=getNwsLowLim();
	$upLim=getNwsUpLim();
	if($upLim!=$totalPosts) {
		
		$left=$totalPosts-$upLim;
	 	
		if($left>1){
	
			$upLim+=1;
	
		}else $upLim+=$left;
		
	?>
	<a href="admin.php?lowLim=<?php echo $lowLim+1 ?>&upLim=<?php echo $upLim ?>&tok=<?php echo $adminPass?>#nws" 
	onmouseover="pageArray(<?php echo $totalPosts?>)"> NEXT &gt; </a>
	<?php }else echo "END REACHED" ?>	</td>
  </tr>
  <tr bgcolor="#EDF1F0" >
    <td align="center" colspan="3" >
  <span id="countSpan" class="smallText" > &lt;--more--&gt;</span>
 </td>
  </tr>
</table>
</div>

</center>







</body>
</html>
