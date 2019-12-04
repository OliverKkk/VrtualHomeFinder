<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kenya Virtual Homes | Post news article</title>
<link rel="stylesheet" type="text/css" href="../css/indexStyle.css" />
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
	<script type="text/javascript">
<!-- 
function validate(){
	if(document.articleData.uploadFile.value == "" || document.articleData.name.value == "" || 
	document.articleData.email.value == "" || document.articleData.headline.value == "" || 
	document.articleData.article.value == ""){
		alert("Please fill in all the data in the form first !")
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
    <td colspan="3" rowspan="2" align="left"><img src="../images/banImg1.jpg" alt="Header image" width="378" height="127" border="0" /></td>
    <td height="63" colspan="3" id="logo" valign="bottom" 
	align="center" nowrap="nowrap" style="border-bottom:#999999 thin dotted;" >    
	..~KENYA VIRTUAL HOMES~..	</td>
    <td width="4" style="border-bottom:#999999 thin dotted;" ></td>
  </tr>

  <tr bgcolor="#79BDFE" >
    <td height="64" colspan="3" id="slogan" valign="top" align="center">Providing Housing Solutions for Kenyans</td>
	<td width="4"></td>
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
 
    <td width="165" valign="top" bgcolor="#E8F0EC">
	
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
		 <td width="165" height="50"><a href="../blog/blogLogin.php" class="navText">Blog</a>             </td>
		</tr>
		
		<tr>
		 <td width="165" height="50" nowrap="nowrap"><a href="../blog/blogReg.php">Open blog account</a></td>
		</tr>
     	<tr>
		 <td width="165" height="50" nowrap="nowrap"><a href="news.php">View news</a></td>
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
	<span class="subHeader">
	<font size="-1" color="#FF0000"><?php if(isset($_GET["error"])){echo $_GET["error"];}?> </font>
	</span>
	</center>
	&nbsp;<br />
	<form name="articleData" action="enterPost.php" method="post" enctype="multipart/form-data">
		<table width="100%" border="0" cellspacing="2" cellpadding="2" class="bodyText">
  <tr>
    <td width="37%" align="left">Upload article picture : </td>
	<td width="63%" align="center">
	<?php if (isset($_GET["articlePic"])){ 
	echo "<input type=\"file\" name=\"uploadFile\" size=\"50\" value=\"".trim($_GET["articlePic"])."\" />" ;
	}else{
	?>
	<input type="file" name="uploadFile" size="50"/>
	<?php }?>
	</td>
  </tr>
  <tr>
    <td>Enter your name :</td>
	<td width="63%" align="center"> 
	<?php if (isset($_GET["name"])){ 
	echo "<input name=\"name\" type=\"text\" size=\"62\" value=\"".trim($_GET["name"])."\" />" ;
	}else{
	?>
	<input name="name" type="text" size="62"/>
	<?php }?>
	</td>
  </tr>
  <tr>
    <td>Enter e-mail address :</td>
	<td align="center">
	<?php if (isset($_GET["email"])){ 
	echo "<input name=\"email\" type=\"text\" size=\"62\" value=\"".trim($_GET["email"])."\" />" ;
	}else{
	?>
	<input name="email" type="text" size="62"/>
	<?php }?>
	</td>
  </tr>
  <tr>
    <td>Enter your headline :</td>
	<td align="center">
	<?php if (isset($_GET["headline"])){ 
	echo "<input name=\"headline\" type=\"text\" size=\"62\" value=\"".trim($_GET["headline"])."\" />" ;
	}else{
	?>
	<input name="headline" type="text" size="62" maxlength="60"/>
	<?php }?>
	</td>
  </tr>
  <tr>
  <td colspan="2">
  <span class="subHeader">Enter your post below</span><br>
  <?php if (isset($_GET["data"])){ 
	echo "<input name=\"article\" type=\"text\" size=\"62\" value=\"".$_GET["data"]."\" />" ;
	}else{
	?>
  <textarea name="article" cols="85" rows="15" wrap="virtual" class="bodyText" ></textarea>
  <?php }?>
  </td>
  </tr>
  <tr>
  <td colspan="2" align="left">
  <input name="submit" type="submit" value="Submit" style="width:120px;" onclick="return validate()"/>  </td>
  </tr>
</table>

	
	</form>
	
	<br />&nbsp;
	 <a href="news.php?lowLim=0&upLim=1"> <?php echo "----BACK TO NEWS----"; ?> </a>
	 <br />&nbsp;
	   <center>
	  <?php 
	 			
			require_once("../scripts/categoryBox.php");
			echo getCategoryBox(false);
	 
	 	?>
		</center>
		<br>&nbsp;	  </td>
	  
    <td width="1" >&nbsp;</td>
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
	<td width="4" valign="top">
	<br />
	&nbsp;<br /></td>
 </tr>
  <tr>
    <td width="165" height="29" valign="top">
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
				<input name="id_submit" type="submit" class="smallText" border="0"/>
				</td>
			  </tr>
		</table>
	</form>
	
	</td>
    <td width="1">&nbsp;</td>
    <td width="223">&nbsp;</td>
    <td width="305">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="191">&nbsp;</td>
	<td width="4">&nbsp;</td>
  </tr>
</table>


</center>

</body>

</html>
