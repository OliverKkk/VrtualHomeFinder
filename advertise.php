<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kenya Virtual Homes | Advertise</title>
<link rel="stylesheet" type="text/css" href="css/indexStyle.css" />
<link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />

<script type="text/javascript">
<!--
function validate(){
	if(document.adv_info.name.value==""){
	alert("Please enter your name")
	return false
	}
	if(document.adv_info.number.value==""){
	alert("Please enter your phone number")
	return false
	}
	if(document.adv_info.email.value==""){
	alert("Please enter your e-mail address")
	return false
	}
	if(document.adv_info.pobox.value==""){
	alert("Please enter your Address")
	return false
	}
	
} 

 -->
</script>


</head>
<body bgcolor="#CBE7EB">
<center>
<table width="103%" border="0" cellspacing="0" cellpadding="3">
  <tr bgcolor="#79BDFE">
    <td colspan="3" rowspan="2" align="left"><img src="images/banImg1.jpg" alt="Header image" width="378" height="127" border="0" /></td>
    <td height="63" colspan="3" id="logo" valign="bottom" 
	align="center" nowrap="nowrap" style="border-bottom:#999999 thin dotted;" >    
	..~KENYA VIRTUAL HOMES~..	</td>
    <td width="163" style="border-bottom:#999999 thin dotted;" ></td>
  </tr>

  <tr bgcolor="#79BDFE" >
    <td height="64" colspan="3" id="slogan" valign="top" align="center">Providing Housing Solutions for Kenyans</td>
	<td width="163"><a href="#idSearch" ><font size="-2" color="#660033" >Click to search by house id</font></a></td>
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
 
    <td width="167" valign="top" bgcolor="#E8F0EC"><table border="0" cellspacing="0" cellpadding="0" width="165" id="navigation">
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
        <td width="165" height="50"><a href="contact.php" class="navText">Contact us</a></td>
      </tr>
      <tr>
        <td width="165" height="50"><a href="blog/blogLogin.php" class="navText">Blog</a></td>
      </tr>
      <tr>
        <td width="165" height="50" nowrap="nowrap"><a href="blog/blogReg.php">Open blog account</a></td>
      </tr>
      <tr>
        <td width="165" height="50" nowrap="nowrap"><a href="news/news.php">View news</a></td>
      </tr>
    </table>
	
	 <?php 
	 	require("scripts/dbscripts.php");
	 	echo getHeadlines();
	 ?>
	 
	
	</td>
    <td width="1"></td>
    <td colspan="2" valign="top"><img src="images/spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;<br />
	&nbsp;<br />
	
	<div class="bodyText" align="left">
	Kenya Virtual Homes offers you the chance to advertise your real estate property online<br>
	This makes it possible for prospective clients who are looking to acquire property,<br>
	to view all details about your property hence they will be able to place purchace or rental<br>
	orders online
	<p>
	Your client base will be greatly expanded, and your property will sell like hot cakes<br>
	In order to advertise, fill in the form below and we shall get back to you  ASAP	</div>
	<br>&nbsp;
	<span class="subHeader">
	<?php 
	  if (isset($_GET["error"])){
	  echo "<font color=\"red\" size=\"-1\">".rawurldecode($_GET["error"])."</font>" ;
	  }
	  
	  ?>
	  </span>
	  <a name="form"></a>
	<br>
	<form name="adv_info" action="advertRequest.php" onsubmit="return validate()" method="post" >
	<table width="463" height="143" border="0" cellpadding="0" cellspacing="0" class="subHeader">
  <tr>
    <td width="180" height="37" align="left">Name :</td>
    <td width="283">
	<?php if (isset( $_GET["name"])){
			$val=trim($_GET["name"]);
			echo "<input name=\"name\" type=\"text\" size=\"45\" value=\"{$val}\"/>";
		}else{?>
	<input name="name" type="text" size="45" />
	<?php }?>	</td>
  </tr>
  <tr>
    <td height="33" align="left">Mobile number :</td>
    <td>
	<?php if (isset( $_GET["number"])){
		$val=trim($_GET["number"]);
		echo "<input name=\"number\" type=\"text\" size=\"45\" value=\"{$val}\"/>";
	}else{?>
	<input name="number" type="text" size="45" value="enter as follows,(+123-456-789-101)"/>
	<?php }?>	</td>
  </tr>
  <tr>
    <td height="33" align="left">E-mail address :</td>
    <td>
	<?php if (isset( $_GET["email"])){
		$val=trim($_GET["email"]);
		echo "<input name=\"email\" type=\"text\" size=\"45\" value=\"{$val}\"/>";
	}else{?>
	<input name="email" type="text" size="45" />
	<?php }?>	</td>
  </tr>
  <tr>
    <td height="33" align="left">Residential address :</td>
    <td>
	<?php if (isset( $_GET["pobox"])){
				$val=trim($_GET["pobox"]);
				echo "<input name=\"pobox\" type=\"text\" size=\"45\" value=\"{$val}\"/>";
			}else{?>
	<input name="pobox" type="text" size="45" />
	<?php }?>	</td>
  </tr>
  
  <tr>
  <td height="33" align="left">
  Category :  </td>
  
  <td align="left">
  <select name="category" size="1"  style="width:270px;" >
  			
            <?php 
					
			$result=getResult("SELECT `name` FROM `categories`");
			
		while($array=mysql_fetch_assoc($result)){
		
			foreach($array as $key => $value){
			echo "<option value=\"{$value}\">{$value}</option>";
			
			}
		 
		 }mysql_free_result($result);
			
		
	    ?>
          </select>  </td>
  </tr>
  <tr>
 <td align="left">
  <input type="submit" name="submit" value="Submit request" style="width:150px;" />  </td>
  </tr>
</table>
</form>
	   <br />&nbsp;
	   <center>
	  <?php 
	 			
				require_once("scripts/categoryBox.php");
				echo getCategoryBox();
	 
	 	?>
		</center>
		<br>&nbsp;	  </td>
	  
    <td width="1" >&nbsp;</td>
        <td width="194" valign="top" style="border-left:#666666 1px dotted;"><br />
		&nbsp;<br />
		<table border="0" cellspacing="0" cellpadding="0" width="178">
			<tr>
			<td colspan="3" class="subHeader" align="center">CRIBS</td>
			</tr>

			<tr>
			<td width="40"><img src="images/spacer.gif" alt="" width="40" height="1" border="0" /></td>
			<td width="126" id="sidebar" class="smallText">
			<?php getAdvPic(); ?>			</td>
			<td width="12">&nbsp;</td>
			</tr>
	  </table>	</td>
	<td width="163" valign="top" class="bodyText">
	<br />
	&nbsp;
	<center><span class="subHeader">ADVERTS</span></center>

	<center>	
				    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="149" height="226" title="flash1">
                      <param name="movie" value="flash/m3Flash1.swf" />
                      <param name="quality" value="high" />
                      <embed src="flash/fl-ad4.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="149" height="90%"></embed>
	      </object>
			  
			  <br>&nbsp;
			  <p><img src="images/adverts/adv4.jpg" width="143" height="148" alt="ADVERTISEMENT SPACE "/>
			  
			   <br>
			   &nbsp;
		  <p><img src="images/adverts/adv5.jpg" width="148" height="158" alt="ADVERTISEMENT SPACE "/>
			  <br>
	  </center>		</td>
  </tr>
  <tr>
    <td width="167" height="29" valign="top">
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
				<input name="id_submit" type="submit" class="smallText" border="0"/>				</td>
			  </tr>
		</table>
	</form>	</td>
    <td width="1">&nbsp;</td>
    <td width="203">&nbsp;</td>
    <td width="262">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="194">&nbsp;</td>
	<td width="163">&nbsp;</td>
  </tr>
</table>


</center>
<center>
</center>
</body>

</html>
