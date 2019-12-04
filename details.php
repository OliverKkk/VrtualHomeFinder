<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kenya Virtual Homes | Details</title>
<link rel="stylesheet" type="text/css" href="css/indexStyle.css" />
<link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />

<script type="text/javascript">
<!--
function validate(){
	if(document.p_info.name.value==""){
	alert("Please enter your name")
	return false
	}
	if(document.p_info.number.value==""){
	alert("Please enter your phone number")
	return false
	}
	if(document.p_info.email.value==""){
	alert("Please enter your e-mail address")
	return false
	}
	if(document.p_info.pobox.value==""){
	alert("Please enter your Address")
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
    <td colspan="3" rowspan="2" align="left"><img src="images/banImg1.jpg" alt="Header image" width="378" height="127" border="0" /></td>
    <td height="63" colspan="3" id="logo" valign="bottom" 
	align="center" nowrap="nowrap" style="border-bottom:#999999 thin dotted;" >    
	..~KENYA VIRTUAL HOMES~..	</td>
    <td width="8" style="border-bottom:#999999 thin dotted;" ></td>
  </tr>

  <tr bgcolor="#79BDFE" >
    <td height="64" colspan="3" id="slogan" valign="top" align="center">Providing Housing Solutions for Kenyans</td>
	<td width="8"></td>
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
 
    <td width="174" valign="top" bgcolor="#E8F0EC">
	
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
         <td width="165" height="50"><a href="contact.php" class="navText">Contact us</a>        
		 </tr>
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
    <?php 
	  
	  $id=$_GET["id"];
	  ?>
	  <table width="100%" border="0" cellspacing="10" cellpadding="0" class="quote"  bgcolor="#D9EAE9"  height="86">
  <tr>
    <td width="23%" align="center" valign="bottom">
	<img src="scripts/dbImage.php?id=<?php echo $id;?>& cat=houses& def=front" id="dispimg"/>
	<br>Front	</td>
	
    <td width="23%" align="center" valign="bottom">
	<img src="scripts/dbImage.php?id=<?php echo $id;?>&cat=houses&def=back" id="dispimg"/>
	<br>Back	</td>
	
    <td width="23%" align="center" valign="bottom">
	<img src="scripts/dbImage.php?id=<?php echo $id;?>&cat=houses&def=main" id="dispimg"/>
	<br>Main	</td>
    
	<td width="23%" align="center" valign="bottom">
	<img src="scripts/dbImage.php?id=<?php echo $id;?>&cat=houses&def=interior" id="dispimg"/>
	<br>Interior	</td>
    
	<td width="23%" align="center" valign="bottom">
	<img src="scripts/dbImage.php?id=<?php echo $id;?>&cat=houses&def=compound" id="dispimg"/>
	<br>Compound	</td>
  </tr>
</table>
	<?php 
	  
	  $result=getResult("select d.description,d.rooms,d.water_connection,
	                     d.elec_connection,h.price,h.house_id,h.agent,h.agent_number
	                     from house_details d , houses h  
						 where d.house_id={$id} and h.house_id={$id}");
	  
	 
	 ?>
	 <table width="100%" border="0" cellspacing="4" cellpadding="2" >
	 
	 <?php
	 	$i=0;
	  while($array=mysql_fetch_assoc($result)){
	  	echo" <tr > ";
		
		foreach($array as $key=>$value){
		    $title=ucfirst( str_replace("_"," ",mysql_field_name($result,$i)));
			
			if($key == "description"){
			?>
			 
				<td colspan="2" align="left" id="dispTd" valign="top" height="20">
				<?php echo $value;?></td>
				<br>&nbsp;
			  </tr>
						
			<?php
			//continue;
			}else{
			
			?>
			<td align="left" id="dispTd"><?php echo "<font size='2' color='red' style='Verdana'>".$title." :</font>";?></td>
			<td align="left" id="dispTd"><?php echo $value;?></td>
			 </tr>
			
			<?php
			 
			}
		
		 $i++;
		
		}
				
	  	
	  }mysql_free_result($result);
	  
	  
	  
	  ?>
	  </table>
	  
	  <p align="left" class="subHeader" >&nbsp;<a name="frm" id="jinx"></a><br>
	  
	  <span >SEND PURCHACE/RENTAL REQUEST (fill the form below)<br>
	  <?php 
	  if (isset($_GET["error"])){
	  echo "<font color=\"red\" size=\"-1\">".$_GET["error"]."</font>" ;
	  }
	  
	  ?>
	  
	  </span>
	   <form name="p_info"   action="purchace.php?id=<?php echo $id;?>" method="post" 
	   onsubmit="return validate()">
	  <table width="505" height= "143" border="0" cellpadding="0" cellspacing="0" 
	  class="smallText" style="text-align:left; border:#999999 1px dotted;">
		  <tr>
			<td width="147" height="37" align="left">Name :</td>
			<td width="358">
			<?php if (isset( $_GET["name"])){
				$val=trim($_GET["name"]);
				echo "<input name=\"name\" type=\"text\" size=\"45\" value=\"{$val}\"/>";
			}else{?>
			<input name="name" type="text" size="45" value=""/>
			<?php }?>
			</td>
		  </tr>
		  <tr>
			<td height="33" align="left">Mobile number :</td>
			<td>
			<?php if (isset( $_GET["number"])){
				$val=rawurldecode(trim($_GET["number"]));
				echo "<input name=\"number\" type=\"text\" size=\"45\" value=\"{$val}\"/>";
			}else{?>
			<input name="number" type="text" size="45" value="enter as follows,(+123-456-789-101)"/>
			<?php }?>
			</td>
					 
		  </tr>
		  <tr>
			<td height="33" align="left">E-mail address :</td>
			<td>
			<?php if (isset( $_GET["email"])){
				$val=trim($_GET["email"]);
				echo "<input name=\"email\" type=\"text\" size=\"45\" value=\"{$val}\"/>";
			}else{?>
			<input name="email" type="text" size="45" value=""/>
			<?php }?>
			</td>
		  </tr>
		  <tr>
			<td height="26" align="left">Residential address :</td>
			<td>
			<?php if (isset( $_GET["pobox"])){
				$val=trim($_GET["pobox"]);
				echo "<input name=\"pobox\" type=\"text\" size=\"45\" value=\"{$val}\"/>";
			}else{?>
			<input name="pobox" type="text" size="45" value=""/>
			<?php }?>
			</td>
		  </tr>
		  <tr >
		  <td colspan="2" valign="bottom">
		  <input type="submit" class="smallText" value="Sent request" /></td>
		  </tr>
	</table>
	</form>
	  <br>&nbsp;
	  
	
	
	   <br />&nbsp;
	   <center>
	  <?php 
	 			
				require_once("scripts/categoryBox.php");
				echo getCategoryBox();
	 
	 	?>
		</center>
		<br>&nbsp;	  </td>
	  
    <td width="1" >&nbsp;</td>
        <td width="5" valign="top" style="border-left:#666666 1px dotted;"><br />
	  &nbsp;<br /></td>
        <td width="8" valign="top">
	<br />
	&nbsp;<br /></td>
 </tr>
  <tr>
    <td width="174" height="29" valign="top">
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
	</form>	</td>
    <td width="1">&nbsp;</td>
    <td width="202">&nbsp;</td>
    <td width="523">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="5">&nbsp;</td>
	<td width="8">&nbsp;</td>
  </tr>
</table>


</center>


<center>
</center>
</body>

</html>
