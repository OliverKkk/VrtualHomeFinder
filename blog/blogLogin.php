<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kenya Virtual Homes | Blog - login</title>
<link rel="stylesheet" type="text/css" href="../css/indexStyle.css" />
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />

<script type="text/javascript">
<!--
function validate(){
	
	if(document.login.user.value==""){
		alert("Enter your username first")
		return false
	}
	if(document.login.pas.value==""){
		alert("Enter your password first")
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
 
    <td width="171" valign="top" bgcolor="#E8F0EC">
	
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
	
	<center>
	<span class="quote">Blog Login</span>
	<br>

<?php 
	
	if( isset($_GET["message"]) ){
	    echo "<span class=\"smallText\"> <font color=\"red\" size=+1>";
		echo $_GET["message"];
		echo "</font></span>";
	}

?>


 
<hr width="100%" color="#FFFFFF"  style="height:1px;"/>
<br>
&nbsp;
<form name="login" action="validateLogin.php" method="post" onsubmit="return validate()">
  <table width="54%" height="159" border="0" cellpadding="2" cellspacing="4" 
class="bodyText" style="border:#666666 4px double">
    <tr bgcolor="#E0F1F0" align="left">
      <td width="42%">Username :</td>
      <td width="58%"><input name="user" type="text" style="width:200px" height="30px"/>      </td>
    </tr>
    <tr bgcolor="#E0F1F0" align="left">
      <td>Password :</td>
      <td><input name="pas" type="password" style="width:200px" height="30px" /></td>
    </tr>
    <tr >
      <td height="35" align="left"><input name="submit" type="submit" value="Login" style="width:100px; height:30px;"/>      </td>
    </tr>
  </table>
</form>
	</center>
	<br />&nbsp;
	  <center>
	  <?php 
	 			
			require_once("../scripts/categoryBox.php");
			echo getCategoryBox(false);
	 
	 	?>
		</center>
		<br>&nbsp;	  	  </td>
	  
    <td width="1" >&nbsp;</td>
        <td width="226" valign="top" style="border-left:#666666 1px dotted;"><br />
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
	<br />&nbsp;<br />
	<table border="0" cellspacing="2" cellpadding="4" width="190">
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
    <td width="171" height="29" valign="top">
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
    <td width="194">&nbsp;</td>
    <td width="157">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="226">&nbsp;</td>
	<td width="190">&nbsp;</td>
  </tr>
</table>


</center>
</body>

</html>
