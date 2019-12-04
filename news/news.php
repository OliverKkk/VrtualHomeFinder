<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kenya Virtual Homes | News</title>
<link rel="stylesheet" type="text/css" href="../css/indexStyle.css" />
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
<script type="text/javascript">
<!--
function pageArray(count){
var cnt=count;
var countSpan = document.getElementById("countSpan");
countSpan.innerHTML = " ";
 html="Jump to article : <br>";
 for(i=0;i<count;i++){
 	
	if(i==20 || i>20){
		incr=i+4;
		if( incr<count ){
			i=incr;
		}
	}else if(i==40 || i>40){
		incr=i+9;
		if( incr<count ){
			i=incr;
		}
	}else if(i==80 || i>80){
		incr=i+14;
		if( incr<count ){
			i=incr;
		}
	}else if(i==100 || i>100){
		incr=i+19;
		if( incr<count ){
			i=incr;
		}
	}
 	
	actual=i+1;
 	html+="<a href=\"news.php?lowLim="+i+"&upLim="+actual+"\" > | "+actual+"</a>";
 
 }
		
  
 
  countSpan.innerHTML = html;


}
/*function exited(){
	var countSpan = document.getElementById("countSpan");
	countSpan.innerHTML = " ";
	countSpan.innerHTML = " &lt;--click for more options--&gt;";
	
}*/



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
    <td width="12" style="border-bottom:#999999 thin dotted;" ></td>
  </tr>

  <tr bgcolor="#79BDFE" >
    <td height="64" colspan="3" id="slogan" valign="top" align="center">Providing Housing Solutions for Kenyans</td>
	<td width="12"></td>
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
    <td colspan="2" valign="top" align="center"><img src="../images/spacer.gif" alt="" width="305" height="1" border="0" /><br />
	<a name="top"></a>
	&nbsp;<br />
	<a href="postArticle.php">POST AN ARTICLE</a> | <a href="#bottom"><font size="-2">skip to bottom</font></a>
	&nbsp;<br />
	&nbsp;<br />
	
	<?php 
		//require("../scripts/dbscripts.php");
		
		$totalPosts=mysql_num_rows(getResult("SELECT * FROM `news`"));
		
		function getUpLim(){
			global $totalPosts;
			if( isset($_GET["upLim"]) ){
				
				return $_GET["upLim"];
						
			}else{
				if($totalPosts<2){ 
					
					return $totalPosts;
					
				}else {return 1;}
			}
		}
		
		function getLowLim(){
			if(isset($_GET["lowLim"])){
				return $_GET["lowLim"];
			}else return 0;
		}
		
	
	
		$execute=true;
		$picture;
		$lowLim=getLowLim();
		$upLim=getUpLim();
		$authorMail;
		$views;
		$result=getResult("SELECT  `news_id`,`headline` , `date` ,`picName`,`data`, `author_email` , `views`,`author`
						  FROM `news` ORDER BY `news_id` DESC LIMIT {$lowLim},{$upLim}");
		$returned=mysql_num_rows($result);
		if(!($returned>0)){ echo "<span class=\"quote\"><font color=\"#990000\" size=\"+2\">NO ARTICLES TO VIEW</font></span>
								  <br>&nbsp;<a href=\"../index.php\"> Back to home page </a>"; 
		$execute=false;
		}
		
		
		
	?>
	<!--<font color="#990000"/>-->
	<?php if($execute==true){  
		$row=mysql_fetch_array($result);
		$sentHeadline=false;
		$id;
	
	?>
	
	
	<table width="101%" class="smallText" style="border:#999999 3px double" cellpadding="3" cellspacing="5" 
	 id="">
            <?php foreach($row as $key=>$value){    ?>
           	
			<?php if($key == "news_id"){$id=$value;}
			elseif($key == "headline" && $sentHeadline!=true){ $sentHeadline=true;?>
			
            <tr bgcolor="#DBE0E8">
              <td width="16%" valign="middle" align="left"><img src="../images/ico_archive.gif"/>&nbsp;Headline:</td>
              <td colspan="2" align="left" class="subHeader"><font color="#660000"><?php echo $value?></font></td>
            </tr>
            <?php } elseif($key =="date" ){?>
            <tr>
              <td width="16%" valign="middle" align="left"><img src="../images/ico_date.gif"/>&nbsp;Posted on:</td>
              <td colspan="2" align="left"><?php echo getFormattedTime($value)?> </td>
            </tr>
            <?php 
				}elseif($key =="jpegPicture" ){
					$picture=$value;
				} elseif($key =="data" ){
			?>
            <tr>
              <td colspan="3" align="justify" style="border:#666666 1px dotted; height:200;overflow:scroll; font-size:13px;">
			  
			  <table align="left" border="0">
			 	 <tr>
			  		<td align="left"> 
					<!-- don't get pic from file**<img src="pics/<?php //echo $picture?>" align=""> </img>	<p>	*** -->
					<img src="../scripts/dbImage.php?id=<?php echo $id?>&cat=news" align="NO IMAGE" /></img>	<p>	
				   </td>
			  	</tr>
				<tr>
					<td align="center">
					<br>&nbsp;
					<textarea name="textarea" cols="120" rows="15" readonly="readonly" wrap="virtual" 
				bgcolor="#CBE7EB" style="background-color:#CBE7EB;border:0px;" 
				class="bodyText" ><?php echo trim($value)?></textarea></td>
				</tr>
			  </table>			  </td> 
            </tr>
            <?php } 
			elseif($key =="author_email" ){
				$authorMail=$value;
		
			}elseif($key =="views" ){
				$views=$value;
			}elseif($key =="author" ){
			
			?>
            <tr>
              <td width="16%" valign="middle" align="left"><img src="../images/ico_user.gif" />&nbsp;Author:</td>
              <td width="31%" align="left"><?php echo $value; ?></td>
              <td width="53%" align="right">
			 <font size="-2"> <a href="mailto:<?php echo $authorMail; ?>"> email <?php echo $value;?></a> &nbsp; |
			  &nbsp; viewd : <?php
			  echo $views+1;
			 
			  $res=getResult("UPDATE `news` SET `views` = '".($views+1)."' WHERE `news_id` ='{$id}' LIMIT 1");
			  
			
			  
			  ?> times</font>
			  
			  <?php  }?> </td>
            </tr>
            <?php } ?>
            <?php //}?>
        </table>
		<?php }?>
		<a name="bottom"></a>
		<br />&nbsp;
			<table width="100%" border="0" cellspacing="2" cellpadding="2" class="smallText" >
  <tr bgcolor="#E2E8E9">
    <td width="61%" align="left" >Viewing Article : <?php echo $upLim." of ".$totalPosts?></td>
	
    <td width="18%" align="right">
	<?php 
	$lowLim=getLowLim();
	$upLim=getUpLim();
	if(!(($lowLim-1)<0) ){	
		
		if( $lowLim-1 == 0 ){
			$lowLim=0;
			$upLim=1;
		}else{
			$lowLim-=1;
			$upLim-=1;
		
		}
	?>
	
	<a href="news.php?lowLim=<?php echo $lowLim ?>&upLim=<?php echo $upLim ?>" onmouseover="pageArray(<?php echo$totalPosts?>)"> &lt; BACK </a>
	
	<?php 
	}else {
	echo "START REACHED"; 
	}
	?>	</td>
	
    <td width="21%"  align="right">
	<?php 
	$lowLim=getLowLim();
	$upLim=getUpLim();
	if($upLim!=$totalPosts) {
		
		$left=$totalPosts-$upLim;
	 	
		if($left>1){
	
			$upLim+=1;
	
		}else $upLim+=$left;
		
	?>
	<a href="news.php?lowLim=<?php echo $lowLim+1 ?>&upLim=<?php echo $upLim ?>" onmouseover="pageArray(<?php echo$totalPosts?>)"> NEXT &gt; </a>
	<?php }else echo "END REACHED" ?>	</td>
  </tr>
  <tr bgcolor="#EDF1F0" >
    <td align="center" colspan="3" >
  <span id="countSpan" class="smallText" > &lt;--more--&gt;</span> </td>
  </tr>
</table>
	<br />&nbsp;
	<a href="#top"><font size="-2">| back to top |</font></a>
	 <br />&nbsp;
	  <center>
	    <?php 
	 			
			require_once("../scripts/categoryBox.php");
			echo getCategoryBox(false);
	 
	 	?>
	  </center>
		<br>&nbsp;	  </td>
	  
    <td width="6" ></td>
      <td width="3" valign="top" style="border-left:#666666 1px dotted;"></td>
        <td width="12" valign="top">
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
				<input name="id_submit" type="submit" class="smallText" border="0"/>				</td>
			  </tr>
		</table>
	</form>	</td>
    <td width="1">&nbsp;</td>
    <td width="216">&nbsp;</td>
    <td width="487">&nbsp;</td>
    <td width="6">&nbsp;</td>
    <td width="3">&nbsp;</td>
	<td width="12">&nbsp;</td>
  </tr>
</table>


</center>

</body>

</html>
