<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kenya Virtual Homes | Home</title>
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
   	<td width="190" style="border-bottom:#999999 thin dotted;" > </td>  
	
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
          <td width="0"></td>
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
         <td width="165" height="50"><a href="contact.php" class="navText">Contact us</a>        </tr>
		<tr>
		 <td width="165" height="50"><a href="blog/blogLogin.php" class="navText">Blog</a>             </td>
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
      <table width="353" height="198" border="0" cellpadding="0" cellspacing="0">
        <tr bgcolor="#E8F0EC">
          <td class="pageName" align="center"><span class="pageName" 
		  style="border-bottom:thin dotted #999999;">Welcome</span></td>
		</tr>

		<tr>
          <td class="bodyText" align="left">The condition of the industry today is such that<br>
		  it would be a good idea to offer valuable and legitimate information <br>
		  based on local real estate especially in the urban centres due to<br>
		  the high tendancy of rural urban migration in <i>Kenya</i></p></td>
        </tr>
      </table>
	  <center>
	  <?php 
	 			
				require_once("scripts/categoryBox.php");
				echo getCategoryBox();
	 
	 	?>
		</center>
		<br>&nbsp;	  </td>
	  
    <td width="1" >&nbsp;</td>
        <td width="194" valign="top" style="border-left:#666666 1px dotted;"><table border="0" cellspacing="0" cellpadding="0" width="190">
			<tr>
			<td colspan="3" class="subHeader" align="center">CRIBS</td>
			</tr>

			<tr>
			<td width="40"><img src="images/spacer.gif" alt="" width="40" height="1" border="0" /></td>
			<td width="110" id="sidebar" class="smallText">
			<?php getAdvPic(); ?>			
			</td>
			<td width="40">&nbsp;</td>
			</tr>
	  </table>	</td>
	<td width="190" valign="top" class="bodyText"><table width="204" height="381" border="0" cellpadding="0" cellspacing="0">
			<tr>
			<td colspan="3" class="subHeader" align="center">ADVERTS</td>
			</tr>

			<tr>
			<td width="5">&nbsp;</td>
			<td width="172" id="sidebar" class="smallText" valign="top">
						<center>	
						
				    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="186" height="226" title="flash1">
                      <param name="movie" value="flash/m3Flash1.swf" />
                      <param name="quality" value="high" />
					  
                      <embed src="flash/fl-ad1.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="94%" height="90%"></embed>
		      </object>
			  
			  <br>&nbsp;<p><br>
			&nbsp;<br>
			</center> </td>
			<td width="6">&nbsp;</td>
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
    <td width="155">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="194">&nbsp;</td>
	<td width="190" valign="bottom" align="right">
	<a href="admin/adminLogin.php"><font color="#666666" size="-2">admin</font></a>
	</td>
  </tr>
</table>
</center>

<center>
</center>
</body>

</html>
