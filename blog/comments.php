<?php 
require("../scripts/dbscripts.php");
if(!checkLogin()){
header("location:blogLogin.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kenya Virtual Homes | Comments</title>
<link rel="stylesheet" type="text/css" href="../css/indexStyle.css" />
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
</head>
<body bgcolor="#CBE7EB">
<center>
  <table width="106%" border="0" cellspacing="0" cellpadding="3">
  <tr bgcolor="#79BDFE">
    <td colspan="3" rowspan="2" align="left"><img src="../images/banImg1.jpg" alt="Header image" width="378" height="127" border="0" /></td>
    <td height="63" colspan="3" id="logo" valign="bottom" 
	align="center" nowrap="nowrap" style="border-bottom:#999999 thin dotted;" >    
	..~KENYA VIRTUAL HOMES~..	</td>
    <td width="4" style="border-bottom:#999999 thin dotted;" ></td>
  </tr>

  <tr bgcolor="#79BDFE" >
    <td height="64" colspan="3" id="slogan" valign="top" align="center">Our Property, Your Comfort</td>
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
	<?php 
	$id=$_GET["id"];
	$result=getResult("SELECT `headline` FROM `posts` WHERE `post_id`='{$id}'");
	$arr=mysql_fetch_array($result);
	$headline=$arr["headline"];
	
	$total=mysql_num_rows(getResult("SELECT * FROM `comments` WHERE `post_id`='{$id}'") );
	$step=5;
	$startRow=setStartRow();
		
	function setStartRow(){
			
			global $step;
			
			if( isset($_GET["key"]) && $_GET["key"]=="next" ){
				
				return $_GET["prev"]+$step;
			
			}elseif( isset($_GET["key"]) && $_GET["key"]=="prev" ){
			
				return $_GET["prev"]-$step;
				
							
			}else return 0;
			
		}
	
	?>
	<center>
	<span class="quote" >Comments on post : "<?php echo $headline?>"</span>
	</center>
	&nbsp;<br />
		<?php 
		
				
		$result=getResult("SELECT `user_id` , `data` , `date` FROM `comments` WHERE `post_id`='{$id}' ORDER BY 
		`comment_id` DESC LIMIT {$startRow},{$step}"); 
		
		?>
	 <table width="93%" border="0" cellspacing="1" cellpadding="2">
	 <?php while ($row=mysql_fetch_array($result)){ $gotId=false;?>
	  	  <tr>
		  <td height="35">
		  <table width="100%" class="smallText" style="border:#999999 3px double" cellpadding="3" cellspacing="5">
            <?php foreach($row as $key=>$value){    ?>
			 <?php if($key == "user_id" && !$gotId){?>
            <tr bgcolor="#DBE0E8">
              <td width="18%" valign="middle" align="left"><img src="../images/ico_user.gif"/>&nbsp;Comment by:</td>
              <td width="82%" colspan="2" align="left" class="subHeader"><font color="#660000">
			  <?php echo getBlogUser($value);$gotId=true?>
			  </font>			  </td>
            </tr>
             <?php } elseif($key =="data" ){?>
            <tr>
              <td colspan="3" align="justify" style="border:#666666 1px dotted;">
               
				<textarea name="" cols="120" rows="5" readonly="readonly" wrap="virtual" 
				bgcolor="#CBE7EB" style="background-color:#CBE7EB;border:0px;" 
				class="smallText" ><?php echo $value?></textarea>                 </td> 
            </tr>
              <?php } elseif($key =="date" ){?>
            <tr>
              <td width="18%" valign="middle" align="left"><img src="../images/ico_date.gif"/>&nbsp;Posted on:</td>
              <td width="82%" colspan="2" align="left"><?php echo getFormattedTime($value)?> </td>
            </tr>
            <?php }?>
			 <?php }?>
          </table></td>
	  	</tr>
	  <?php } ?>
	  </table>
	  <br />&nbsp;
	 <table width="100%" border="0" cellspacing="2" cellpadding="2" class="smallText" bgcolor="#E2E8E9">
  <tr>
    <td width="70%" align="left">Viewing comment(s) : <?php 
	
	if(($startRow+$step)>$total){
		$left=$total;
	
	}else $left=($startRow+$step);
	
	echo $startRow." to ".($left)." of ".$total
	
	?>
	</td>
    <td width="15%" align="right">
	<?php 
	if($startRow>0){
	?>
	
	<a href="comments.php?key=prev&prev=<?php echo $startRow;?>&id=<?php echo $id;?>"> &lt; BACK </a>
	
	<?php 
	}else {
	echo "START REACHED"; 
	}
	?>	
	</td>
	
    <td width="15%"  align="right">
	<?php 
	if(!($startRow+$step>=$total)){
		
	?>
	<a href="comments.php?key=next&prev=<?php echo $startRow;?>&id=<?php echo $id?>"> NEXT &gt; </a>
	<?php }else echo "END REACHED" ?>	
	
	</td>
  </tr>
</table>
	  <br />&nbsp;
	  <a href="blog.php" >----BACK TO BLOG----</a>&nbsp;&nbsp;|&nbsp;&nbsp;
	  <a href="blogLogout.php"><font size="-2" color="#990000">logout</font></a>
	  <br />&nbsp;
	  <center>
	  <?php 
	 			
			require_once("../scripts/categoryBox.php");
			echo getCategoryBox(false);
	 
	 	?>
		</center>
		<br>&nbsp;	  	  </td>
	  
    <td width="1" >&nbsp;</td>
        <td width="171" valign="top" style="border-left:#666666 1px dotted;"><br />
		&nbsp;<br />
		<table border="0" cellspacing="0" cellpadding="0" width="170">
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
	<a name="idSearch"/>
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
    <td width="197">&nbsp;</td>
    <td width="444">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="171">&nbsp;</td>
	<td width="4">&nbsp;</td>
  </tr>
</table>


</center>

</body>

</html>
