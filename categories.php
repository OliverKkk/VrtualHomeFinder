<?php 
	require("scripts/dbscripts.php");
	if(!isset($_GET["cat"])){
		header("location:index.php");
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kenya Virtual Homes | Categories</title>
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
    <td width="14" style="border-bottom:#999999 thin dotted;" ></td>
  </tr>

  <tr bgcolor="#79BDFE" >
    <td height="64" colspan="3" id="slogan" valign="top" align="center">Providing Housing Solutions for Kenyans</td>
	<td width="14"></td>
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
 
    <td width="181" valign="top" bgcolor="#E8F0EC">
	
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
	 	echo getHeadlines();
		$cId=$_GET["cat"];
		
		function setStartRow(){
			
			global $step;
			
			if( isset($_GET["key"]) && $_GET["key"]=="next" ){
				
				return $_GET["prev"]+$step;
			
			}elseif( isset($_GET["key"]) && $_GET["key"]=="prev" ){
			
				return $_GET["prev"]-$step;
				
							
			}else return 0;
			
		}
		
		
	 ?>
	 </td>
    <td width="1"></td>
    <td colspan="2" valign="top"><img src="images/spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;<br />
	&nbsp;<br />
	<?php 
	$total=mysql_num_rows(getResult("SELECT * FROM `houses` WHERE `category_id`={$cId}"));
	$step=5;
	$startRow=setStartRow();
	$mes;
	  
	$sql="SELECT `house_id`, `category_id` , `location` , `price` 
	  	  FROM `houses`
		  WHERE `category_id`='{$cId}'
		  ORDER BY `house_id` DESC 
		  LIMIT {$startRow},{$step}";
		  
	$result=getResult($sql);
	  		 
		
		if(!$total>0){
			$mes= "<br>NO HOUSES IN THIS CATEGORY!!<br>";
		}
	  ?>
	
	<center>
          <span class="quote" style="font-weight:bolder; color:#999999"> Click an item to view more details</span>
		  <span class="quote" >
		  <font color="#CC0033"><?php if(isset($mes)){echo $mes;}?></font></span>
          <hr width="90%" color="#BFD5CD" />
        </center>
        <table width="781" height="133" border="0" cellpadding="2" cellspacing="3" class="quote" align="center" style="overflow:scroll;" id="displyTables">
          <tr align="center" bgcolor="#CCCCCC" style="border:thin inset #666666;" height="10px">
            <td width="167" >Image</td>
            <td width="167">House id</td>
            <td width="167">Type</td>
            <td width="167">Location</td>
            <td width="167">Price</td>
          </tr>
          <?php
		 while($row=mysql_fetch_assoc($result)){
			$id;
			echo " <tr bgcolor=\"#E2E8E9\" height=10px>";
			foreach($row as $key=>$value){
			
			
			if( $key=="house_id"){
				$id=$value;
				
				echo "<td style=\"border-bottom:0px dotted #330033;\" align=\"center\"        							                       valign=\"middle\" height=\"20px\">";
			
				echo " <img src=\"scripts/dbImage.php?id={$id}&cat=houses&def=front\" class=\"link2\" border=\"0\" 
				width=\"130\" height=\"120\"/>";
				
				echo " </td>";
			
				
				
				echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\" 
					  height=\"20px\">";
				echo"<a href=\"details.php?id={$id}\" class=\"link2\">";
				echo "{$value}";
				echo"</a>";
				echo " </td>";
				
				
			}	
			
					
			
			elseif( $key=="category_id"){
			echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\"
			       height=\"20px\">";
			echo "<a href=\"details.php?id={$id}\" class=\"link2\">";
			echo getCategoryName($value);
			echo "</a>";
			echo " </td>";
			
			}
			elseif( $key=="location"){
			echo "<td style=\"border-bottom:thin dotted #330033;\" align=\"center\"
			       height=\"20px\">";
			echo "<a href=\"details.php?id={$id}\" class=\"link2\">";
			echo "{$value}";
			echo "</a>";
			echo " </td>";
			
			}
			elseif( $key=="price"){
			echo " <td style=\"border-bottom:thin dotted #330033;\" align=\"center\" 
			        height=\"20px\">";
			echo "<a href=\"details.php?id={$id}\" class=\"link2\">";
			echo "{$value}";
			echo "</a>";
			echo " </td>";
			}
			
			
			
			
			}
			echo " </tr>";
	  
	  }
	  ?>
        </table>
		<br/>&nbsp;
		
		
		<table width="100%" border="0" cellspacing="2" cellpadding="2" class="smallText" bgcolor="#E2E8E9">
  <tr>
    <td width="61%" align="left">Viewing advert(s) : <?php 
	if(($startRow+$step)>$total){
		$left=$total;
	}else $left=($startRow+$step);
	
	echo $startRow." to ".($left)." of ".$total
	?>
	</td>
    <td width="18%" align="right">
	<?php 
	if($startRow>0){
			
	?>
	
	<a href="categories.php?key=prev&prev=<?php echo $startRow;?>&cat=<?php echo $cId?>"> &lt; BACK </a>
	
	<?php 
	}else {
		echo "START REACHED"; 
	}
	?>	</td>
	
    <td width="21%"  align="right">
	<?php 
	if(!($startRow+$step>=$total)){
			
	?>
	<a href="categories.php?key=next&prev=<?php echo $startRow;?>&cat=<?php echo $cId?>"> NEXT &gt; </a>
	<?php }else echo "END REACHED"; ?>	</td>
  </tr>
</table>
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
        <td width="14" valign="top">
	<br />
	&nbsp;<br /></td>
 </tr>
  <tr>
    <td width="181" height="29" valign="top">
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
    <td width="202">&nbsp;</td>
    <td width="502">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="5">&nbsp;</td>
	<td width="14">&nbsp;</td>
  </tr>
</table>


</center>


<center>
</center>
</body>

</body>

</html>
