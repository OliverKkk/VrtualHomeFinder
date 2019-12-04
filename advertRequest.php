<?php 
	require("scripts/dbscripts.php");
	
	$name=$_POST["name"];
	$number=$_POST["number"];
	$email=$_POST["email"];
	$address=$_POST["pobox"];
	$category=$_POST["category"];
	$encNo=rawurlencode($number);
		
	if(! (validate_email($email)) ){
	
	$error="You have entered an invalid e-mail address!";
	header("location:advertise.php?error={$error}&id={$id}&name={$name}&number={$encNo}&email={$email}&pobox={$address}#form");
		exit;
	}elseif(! (validate_phone_no($number) ) ){
	
	$error=rawurlencode("You have entered an invalid phone number! Please enter as follows,(+123-456-789-101)");
	header("location:advertise.php?error={$error}&name={$name}&number={$encNo}&email={$email}&pobox={$address}#form");
		exit;
	}
	
	


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kenya Virtual Homes | Purchase</title>
<link rel="stylesheet" type="text/css" href="css/indexStyle.css" />
<link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />
</head>
<body bgcolor="#CBE7EB">
<center>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr bgcolor="#79BDFE">
    <td colspan="3" rowspan="2"><img src="images/banImg1.jpg" alt="Header image" width="378" height="127" border="0" /></td>
    <td height="63" colspan="3" id="logo" valign="bottom" 
	align="center" nowrap="nowrap" style="border-bottom:#999999 thin dotted;" >    
	..~KENYA VIRTUAL HOMES~..	</td>
    <td width="190" style="border-bottom:#999999 thin dotted;" ></td>
  </tr>

  <tr bgcolor="#79BDFE" >
    <td height="64" colspan="3" id="slogan" valign="top" align="center">Providing Housing Solutions for Kenyans</td>
	<td width="190"><a href="#idSearch" ><font size="-2" color="#660033" >Click to search by house id</font></a></td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#CBE7EB"><img src="images/spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

  <tr bgcolor="#E8F0EC">
  	<td colspan="7" height="25" id="catch1" align="center">
	THE RELIABLE AND MOST CONVENIENT SOURCE OF REAL ESTATE INFORMATION IN <b><i>KENYA</i></b>	</td>
  </tr>
 <tr>
    <td colspan="7" bgcolor="#CBE7EB"><img src="images/spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
 
    <td width="171" valign="top" bgcolor="#E8F0EC">
	
	<table border="0" cellspacing="0" cellpadding="0" width="165" id="navigation">
        <tr>
          <td width="165"></td>
        </tr>
        <tr>
         <td width="165" height="50"><a href="index.php" class="navText">Home</a></td>
        </tr>
        <tr>
           <td width="165" height="50"><a href="about.php" class="navText">About us</a></td>
        </tr>
        <tr>
            <td width="165" height="50"><a href="services.php" class="navText">Services</a></td>
        </tr>
        <tr>
          <td width="165" height="50"><a href="advertise.php" class="navText">Place advert</a></td>
        </tr>
        <tr>
         <td width="165" height="50"><a href="contact.php" class="navText">Contact us</a> </tr>
		<tr>
		 <td width="165" height="50"><a href="blog/blogLogin.php" class="navText">Blog</a> </td>
		</tr>
		
		<tr>
		 <td width="165" height="50" nowrap="nowrap"><a href="blog/blogReg.php">Open blog account</a></td>
		</tr>
     	<tr>
		 <td width="165" height="50" nowrap="nowrap"><a href="news/news.php">View news</a></td>
		</tr>
	 
	 </table>
	 	
	 <?php 
	 	//require("scripts/dbscripts.php");
	 	echo getHeadlines();
	 ?>
	 
	 
	 </td>
    <td width="1"></td>
    <td colspan="2" valign="top"><img src="images/spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;<br />
	&nbsp;<br />
	
	 <?php 
	 	
		
		$to = getAdvertMail();
		
		$subject = ' New Advertisement request ';	   
        
		$headers = "From: www.point2point.com\r\nX-Mailer: D^mne$$ PHP Script"."\n";
	   
	   
		$body = "Client's name : {$name}\n
		 Client's number : {$number}\n
		 Client's e-mail address : {$email}\n
		 Client's residential address : {$pobox}\n
		 Selected advert category is : {$category}\n";
		
		//echo $to."\n".$subject."\n".$headers."\n".$body."\n";exit();
		
		
		if(mail($to, $subject, $body, $headers)){
		?>
		<center>
		<div id="slogan">
		Your request has been successfully submitted <br> you shall be contacted by phone and e-mail
		</div>
		</center>
		
		<?php
		}else{
		?>
		<div id="slogan">
		<font color="#FF0000">
		Sorry, an error has occured <br> your request has not been submitted, please try again 
		</font>
		</div>
		<?php
		
		}
		
		
	  ?>
	
	
	   <br />&nbsp;
	   <center>
	  <?php 
	 			
				require_once("scripts/categoryBox.php");
				echo getCategoryBox();
	 
	 	?>
		</center>
		<br>&nbsp;	  </td>
	  
    <td width="1" >&nbsp;</td>
        <td width="226" valign="top" style="border-left:#666666 1px dotted;"><br />
		&nbsp;<br />
		<table border="0" cellspacing="0" cellpadding="0" width="190">
			<tr>
			<td colspan="3" class="subHeader" align="center">CRIBS</td>
			</tr>

			<tr>
			<td width="40"><img src="images/spacer.gif" alt="" width="40" height="1" border="0" /></td>
			<td width="110" id="sidebar" class="smallText">
			<?php getAdvPic(); ?>			</td>
			<td width="40">&nbsp;</td>
			</tr>
		</table>	</td>
	<td width="190" valign="top">
	<br />&nbsp;<br />
	<table border="0" cellspacing="0" cellpadding="0" width="190">
			<tr>
			<td colspan="3" class="subHeader" align="center">MORE CRIBS</td>
			</tr>

			<tr>
			<td width="40"><img src="images/spacer.gif" alt="" width="40" height="1" border="0" /></td>
			<td width="110" id="sidebar" class="smallText">
			
			<?php 
				$result=getResult("select house_id from houses limit 4,8");
					
				while($array=mysql_fetch_assoc($result)){
			
					foreach($array as $key => $value){
					
						
						echo "<img src=\"images/adverts/{$value}thumb.jpg\" /><br>
						      <a href=\"details.php?id={$value}\" > more about this house</a>";
						echo "<br><br>";
					
					}
				 }mysql_free_result($result);
			?>			</td>
			<td width="40">&nbsp;</td>
			</tr>
		</table>		</td>
  </tr>
  <tr>
    <td width="171" height="29" valign="top">
	<form action="scripts/search.php" method="post">
	<a name="idSearch"></a>
	 <table width="100%" border="0" cellspacing="3" cellpadding="3" align="center" bgcolor="#E7F5F2" class="smallText" >
			  <tr class="subHeader" align="center"> 
				<td bg bgcolor="#CCDBD7">Search by house id:</td>
			  </tr>
			  <tr align="center">
				<td> <input name="id" type="text" /></td>
			  </tr>
			   <tr align="center">
				<td class="navText">
				<input name="id_submit" type="submit" class="smallText" border="0"/>
				</td>
			  </tr>
		</table>
	</form>
	
	</td>
    <td width="1">&nbsp;</td>
    <td width="194">&nbsp;</td>
    <td width="157">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="226">&nbsp;</td>
	<td width="190">&nbsp;</td>
  </tr>
</table>


</center>

<center>
</center>

</body>

</html>
