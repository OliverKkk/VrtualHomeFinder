<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kenya Virtual Homes | Blog -  registration</title>
<link rel="stylesheet" type="text/css" href="../css/indexStyle.css" />
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />

<script type="text/javascript">
<!--
function validate(){
	if(document.reg_info.name.value==""){
	alert("Please enter your name")
	return false
	}
	if(document.reg_info.userName.value==""){
	alert("Please enter a username")
	return false
	}
	if(document.reg_info.pas.value==""){
	alert("Please enter a password")
	return false
	}
	if(document.reg_info.confPass.value==""){
	alert("Please confirm your password")
	return false
	}if( (document.reg_info.confPass.value)!=(document.reg_info.pas.value) ){
	alert("The two passwords do not match")
	return false
	}if(document.reg_info.email.value==""){
	alert("Please enter an email address")
	return false
	}
	
} 

 -->
</script>


</head>
<body bgcolor="#CBE7EB">
<center>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr bgcolor="#79BDFE">
    <td colspan="3" rowspan="2" align="left">
	<img src="../images/banImg1.jpg" alt="Header image" width="378" height="127" border="0" /></td>
    <td height="63" colspan="3" id="logo" valign="bottom" 
	align="center" nowrap="nowrap" style="border-bottom:#999999 thin dotted;" >    
	..~KENYA VIRTUAL HOMES~..	</td>
    <td width="1" style="border-bottom:#999999 thin dotted;" ></td>
  </tr>

  <tr bgcolor="#79BDFE" >
    <td height="64" colspan="3" id="slogan" valign="top" align="center">Providing Housing Solutions for Kenyans</td>
	<td width="1"></td>
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
 
    <td width="174" valign="top" bgcolor="#E8F0EC">
	
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
	 require_once("../scripts/dbscripts.php");
	 echo getHeadlines(false);
	 ?>
	 </td>
    <td width="1"></td>
    <td colspan="2" valign="top"><img src="../images/spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;<br />
	&nbsp;<br />
		<center>
		<span class="pageName" style="text-decoration:underline">Kenya Virtual Homes blog registration</span><br>
		</p>
		<div class="smallText"> Please fill in the form below <br>
		
		<?php 
		
			if(isset($_GET["error"])){
			
			echo "<font size=\"+1\" color=\"#FF0000\">";
			echo $_GET["error"]."<br>";
			echo "</font>";
			
			}
		
		?>
		</div>
		
		</center>
	   
	  <br />&nbsp;
	  
	  <form action="registerBlogger.php" method="post" onsubmit="" name="reg_info">
	  <table width="97%" border="0" cellspacing="2" cellpadding="2" class="subHeader" >
  <tr align="left">
    <td width="31%">Name :</td>
    <td width="69%">
	<?php 
	if (isset( $_GET["name"] )){
	
	$val=trim($_GET["name"]);
	echo "<input name=\"name\" type=\"text\" size=\"50\" value=\"{$val}\"/>";
	
	}else{?>
	<input name="name" type="text" size="50" value=""/>
	<?php }?>
	</td>
  </tr>
  <tr align="left">
    <td>Username :</td>
    <td>
	<?php if (isset( $_GET["user"])){
	$val=trim($_GET["user"]);
	echo "<input name=\"userName\" type=\"text\" size=\"50\" value=\"{$val}\"/>";
	}else{?>
	<input name="userName" type="text" size="50" value=""/>
	<?php }?>
	</td>
  </tr>
  <tr align="left">
    <td>Password</td>
    <td><input name="pas" type="password" size="50" value=""/></td>
  </tr>
  <tr align="left">
    <td>Confirm password:</td>
    <td><input name="confPass" type="password" size="50" value=""/></td>
  </tr>
  <tr align="left">
    <td>e-mail :</td>
    <td>
	<?php if (isset( $_GET["mail"])){
	$val=trim($_GET["mail"]);
	echo "<input name=\"email\" type=\"text\" size=\"50\" value=\"{$val}\"/>";
	}else{?>
	<input name="email" type="text" size="50"/>
	<?php }?>
	</td>
  </tr>
  <tr align="left">
  <td colspan="2">  
  <input name="submit" type="submit" value="Submit" style="width:100px;" onclick="return validate()"/>
  </td>
  </tr>
</table>
</form>
<br>&nbsp;
	  <center>
	  <?php 
	 			
			require_once("../scripts/categoryBox.php");
			echo getCategoryBox(false);
	 
	 	?>
		</center>
		<br>&nbsp;	  </td>
	  
    <td width="45" >&nbsp;</td>
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
	<td width="1" valign="top">	</td>
  </tr>
  <tr>
    <td width="174" height="29" valign="top">
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
    <td width="198">&nbsp;</td>
    <td width="304">&nbsp;</td>
    <td width="45">&nbsp;</td>
    <td width="191">&nbsp;</td>
	<td width="1">&nbsp;</td>
  </tr>
</table>


</center>
</body>

</html>
