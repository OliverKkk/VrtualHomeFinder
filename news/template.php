<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kenya Virtual Homes | Home</title>
<title>point2point</title>
<link rel="stylesheet" type="text/css" href="../css/indexStyle.css" />
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
</head>
<body bgcolor="#CBE7EB">
<center>
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr bgcolor="#79BDFE">
    <td colspan="3" rowspan="2"><img src="../images/banImg1.jpg" alt="Header image" width="378" height="127" border="0" /></td>
    <td height="63" colspan="3" id="logo" valign="bottom" 
	align="center" nowrap="nowrap" style="border-bottom:#999999 thin dotted;" >    
	..~KENYA VIRTUAL HOMES~..	</td>
    <td width="190" style="border-bottom:#999999 thin dotted;" ></td>
  </tr>

  <tr bgcolor="#79BDFE" >
    <td height="64" colspan="3" id="slogan" valign="top" align="center">Providing Housing Solutions for Kenyans</td>
	<td width="190"></td>
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
	&nbsp;<br />
	
	   <br />&nbsp;
	  <center>
	  <?php 
	 			
			require_once("../scripts/categoryBox.php");
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
			<td width="40"><img src="../images/spacer.gif" alt="" width="40" height="1" border="0" /></td>
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
			<td width="40"><img src="../images/spacer.gif" alt="" width="40" height="1" border="0" /></td>
			<td width="110" id="sidebar" class="smallText">
			
			<?php 
				$result=getResult("select house_id from houses limit 4,8");
					
				while($array=mysql_fetch_assoc($result)){
			
					foreach($array as $key => $value){
					
						
						echo "<img src=\"../images/adverts/{$value}thumb.jpg\" /><br>
						      <a href=\"../details.php?id={$value}\" > more about this house</a>";
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
    <td width="194">&nbsp;</td>
    <td width="157">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="226">&nbsp;</td>
	<td width="190">&nbsp;</td>
  </tr>
</table>


  <a href="http://www.m3world.biz"></a> 
</center>

</body>

</html>
