<?php
require_once("../scripts/dbScripts.php");

$name=$_POST["name"];
$username=$_POST["userName"];
$pass=$_POST["pas"];
$mail=$_POST["email"];



$result=getResult("select * from user_info where username='{$username}'");



if( mysql_num_rows($result) > 0 ){
	$error="the username you have entered is already in use please select another";
	header("location:blogReg.php?error={$error}& name={$name} & mail={$mail} & 
	user={$username}");
	exit;

}elseif(! (validate_email($mail)) ){
	
		$error="You have entered an invalid e-mail address";
	    header("location:blogReg.php?error={$error}& name={$name} & mail={$mail} & user={$username}");
		exit;

}else{


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kenya Virtual Homes | Blog -  registration</title>
<link rel="stylesheet" type="text/css" href="../css/indexStyle.css" />
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
</head>
<body bgcolor="#CBE7EB">
<center>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr bgcolor="#79BDFE">
    <td colspan="3" rowspan="2" align="left">
	<img src="../images/banImg1.jpg" alt="Header image" width="378" height="127" border="0" />
	</td>
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
    <td colspan="7" bgcolor="#CBE7EB"><img src="../images/spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

  <tr bgcolor="#E8F0EC">
  	<td colspan="7" height="25" id="catch1" align="center">
	THE RELIABLE AND MOST CONVENIENT SOURCE OF REAL ESTATE INFORMATION IN <b><i>KENYA</i></b>	</td>
  </tr>
 <tr>
    <td colspan="7" bgcolor="#CBE7EB"><img src="../images/spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
 
    <td width="172" valign="top" bgcolor="#E8F0EC">
	
	<table border="0" cellspacing="0" cellpadding="0" width="165" id="navigation">
        <tr>
          <td width="165"></td>
        </tr>
        <tr>
         <td width="165" height="50"><a href="../index.php" class="navText">Home</a></td>
        </tr>
        <tr>
           <td width="165" height="50"><a href="../about.php" class="navText">About us</a></td>
        </tr>
        <tr>
            <td width="165" height="50"><a href="../services.php" class="navText">Services</a></td>
        </tr>
        <tr>
          <td width="165" height="50"><a href="../advertise.php" class="navText">Place advert</a></td>
        </tr>
        <tr>
         <td width="165" height="50"><a href="../contact.php" class="navText">Contact us</a>        </tr>
		<tr>
		 <td width="165" height="50"><a href="blogLogin.php" class="navText">Blog</a>             </td>
		</tr>
		
		<tr>
		 <td width="165" height="50" nowrap="nowrap"><a href="blogReg.php">Open blog account</a></td>
		</tr>
     	<tr>
		 <td width="165" height="50" nowrap="nowrap"><a href="../news/news.php">View news</a></td>
		</tr>
	 </table>
	 <?php 
	 //require_once("../scripts/dbscripts.php");
	 echo getHeadlines(false);
	 ?>
	 </td>
    <td width="1"></td>
    <td colspan="2" valign="top" class="bodyText">
	<p><img src="../images/spacer.gif" alt="" width="305" height="1" border="0" /><br />
      &nbsp;<br />
      &nbsp;<br />
       
	   Confirm the registration data below:<p> <br />
	   <table width="100%" cellpadding="3" cellspacing="4"  style="border:thin dotted #999999; text-align:left;" >
	   
	   <?php 
			
			echo "<tr><td>Your Name : </td><td>".$name."</td></tr>";
			echo "<tr><td>Your Username : </td><td>".$username."</td></tr>";
			echo "<tr><td>Your Password : </td><td>".$pass."</td></tr>";
			echo "<tr><td>Your e-mail address : </td><td>".$mail."</td></tr>";
		 	   
	   ?>
	   <tr >
	   
	   <td width="51%" bgcolor="#E1EDC9">
	   <a href="<?php echo "blogDataConfirm.php?name={$name} & mail={$mail} & user={$username} & pwd={$pass}" ?>">
	   Yes, register me</a> 
	   </td>
	   
	   <td width="49%" bgcolor="#E4C8C5"><a href=
	   "<?php echo "blogReg.php?error=Data correction& name={$name} & mail={$mail} & user={$username}" ?>">
	   Data is incorrect</a> </td>
	   </tr>
	   </table>
	   

         
        </p>
        <center>
	  <?php 
	 			
			require_once("../scripts/categoryBox.php");
			echo getCategoryBox(false);
	 
	 	?>
		</center>
		<br>&nbsp;	  </td>
    <td width="9" >&nbsp;</td>
        <td width="191" valign="top" style="border-left:#666666 1px dotted;"><br />
		&nbsp;<br />
		<table border="0" cellspacing="0" cellpadding="0" width="190">
			<tr>
			<td colspan="3" class="subHeader" align="center">CRIBS</td>
			</tr>

			<tr>
			<td width="40"><img src="../images/spacer.gif" alt="" width="40" height="1" border="0" /></td>
			<td width="110" id="sidebar" class="smallText">
			<?php getAdvPic(false); ?>			</td>
			<td width="40">&nbsp;</td>
			</tr>
	  </table>	</td>
	<td width="190" valign="top">
	<br />
	&nbsp;<br />
	<table border="0" cellspacing="0" cellpadding="0" width="190">
			<tr>
			<td colspan="3" class="subHeader" align="center">MORE CRIBS</td>
			</tr>

			<tr>
			<td width="40"><img src="../images/spacer.gif" alt="" width="40" height="1" border="0" /></td>
			<td width="110" id="sidebar" class="smallText">
			
			<?php 
			getAdvPic(false,"4","4");
				 
			?> 			</td>
			<td width="40">&nbsp;</td>
			</tr>
	  </table>		</td>
  </tr>
  <tr>
    <td width="172" height="29" valign="top">
	<a name="idSearch"/>
	<form action="../scripts/search.php" method="post">
	 <table width="100%" border="0" cellspacing="3" cellpadding="3" align="center" bgcolor="#E7F5F2" class="smallText" >
			  <tr class="subHeader" align="center"> 
				<td bg bgcolor="#CCDBD7">Search by house id:</td>
			  </tr>
			  <tr align="center">
				<td> <input name="id" type="text" /></td>
			  </tr>
			   <tr align="center">
				<td class="navText">
				<input name="id_submit" type="submit" class="smallText" border="0"/>				</td>
			  </tr>
		</table>
	</form>	</td>
    <td width="1">&nbsp;</td>
    <td width="195">&nbsp;</td>
    <td width="132">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="191">&nbsp;</td>
	<td width="190">&nbsp;</td>
  </tr>
</table>


</center>
</body>

</html>







<?php }?>