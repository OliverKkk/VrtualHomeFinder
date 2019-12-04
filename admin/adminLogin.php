<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kenya Virtual Homes admin | Admin-login</title>
<link rel="stylesheet" type="text/css" href="../css/indexStyle.css" />
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />

<script type="text/javascript">
<!--
function validate(){
	
	if(document.login.pas.value==""){
		alert("Enter a password first")
		return false
	}

}
-->

</script>
</head>

<body bgcolor="#CBE7EB">
<center>
<span class="quote" style="text-decoration:underline">Kenya Virtual Homes Administrator Module</span>
<br>
&nbsp;<br>&nbsp;
<span class="subHeader">Administrator Login</span>
<p><br>&nbsp;

<?php 
	
	if( isset($_GET["error"]) ){
	    echo "<span class=\"smallText\"> <font color=\"red\" size=+1>";
		echo $_GET["error"];
		echo "</font></span>";
	}

?>


<br>&nbsp; 
<hr width="70%" color="#FFFFFF"  style="height:5px;"/>
<br>
&nbsp;
<form name="login" action="admin.php" method="post" onsubmit="return validate()">
<table width="54%" height="159" border="0" cellpadding="2" cellspacing="4" 
class="bodyText" style="border:#666666 4px double">
  <tr bgcolor="#E0F1F0" align="left">
    <td width="42%">User :</td>
    <td width="58%"><input name="user" type="text" disabled value="administrator" readonly="true" 
	style="width:200px" height="30px"/></td>
  </tr>
  <tr bgcolor="#E0F1F0" align="left">
    <td>Password :</td>
    <td><input name="pas" type="password" style="width:200px" height="30px" /></td>
  </tr>
  <tr >
  <td height="35" align="left">
  <input name="submit" type="submit" value="Login" style="width:100px; height:30px;"/>
  </td>
  </tr>
</table>
</form>
</center>
</body>
</html>
