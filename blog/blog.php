<?php 
require("../scripts/dbscripts.php");

function stool(){
	if(checkLogin()){
		return "log";
		//header("location:");
		
	}else return "NO";

}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kenya Virtual Homes | Blog - main</title>
<link rel="stylesheet" type="text/css" href="../css/indexStyle.css" />
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />

<script type="text/javascript">
<!-- 
function checkLogin(){
	var loged="<?php echo stool()?>";
	
	if(loged=="log"){
		return;
	}else{
		url="blogLogin.php?message=login";
		location = url;
		//alert("you are not loged in!");
		}

}

function commentField(Pid , Uid ){
	var loged="<?php echo stool()?>";
	
	if(!loged=="NO"){
		
		url="blogLogin.php?message=login";
		location = url;
		alert("Not loged in!!");
	}else if(loged=="log"){
		
		var com=prompt('Enter your comment below, press enter and allow the popup to open a page','');
		if(! com == ""){
	
			url="submitComment.php?comment="+com+"&Pid="+Pid+"&usrId="+Uid+"";
		
			location = url;
			alert(com+"..has been suibmitted");
	
		}
	}
}


/*
function commentField( Pid , Uid ){
	var commentRow = document.getElementById("commentRow");

	var html="<span class=\"subHeader\">YOUR COMMENT HERE:</span><br>"+
		"<form action=\"submitComment.php?Pid="+Pid+"&usrId="+Uid+" method=\"post\">"+
		"<textarea name=\"textarea\" cols=\"120\" rows=\"5\" readonly=\"readonly\" wrap=\"virtual\" "+
		"bgcolor=\"#CBE7EB\" style=\"background-color:#CBE7EB;border:0px;\" "+
		"class=\"smallText\" ></textarea>"+
		"<br align=\"right\">"+
		"<input name=\"submit\"type=\"submit\" class=\"smallText\" border=\"0\"/>"+
		"</br>"+
	"</form>";
	commentRow.innerHTML = html;



}
*/

-->


</script>

</head>
<body bgcolor="#CBE7EB" onload="return checkLogin()">
<center>
<table width="99%" border="0" cellspacing="0" cellpadding="3">
  <tr bgcolor="#79BDFE">
    <td colspan="3" rowspan="2" align="left"><img src="../images/banImg1.jpg" alt="Header image" width="378" height="127" border="0" /></td>
    <td height="63" colspan="3" id="logo" valign="bottom" 
	align="center" nowrap="nowrap" style="border-bottom:#999999 thin dotted;" >    
	..~POINT~2~POINT~..	</td>
    <td width="1" style="border-bottom:#999999 thin dotted;" ></td>
  </tr>

  <tr bgcolor="#79BDFE" >
    <td height="64" colspan="3" id="slogan" valign="top" align="center">Our Property, Your Comfort</td>
	<td width="1"></td>
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
 
    <td width="181" valign="top" bgcolor="#E8F0EC">
	
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
	 ?>	 </td>
    <td width="1"></td>
    <td colspan="2" valign="top">
	
	
	<?php 
		
		$usr=$_COOKIE[session_name()];
		$result=getResult("select * from user_info where username='{$usr}'");
		$array=mysql_fetch_array($result);
		
		$name=$array["name"];
		$usrId=$array["user_id"];
		
		$total=mysql_num_rows(getResult("SELECT * FROM `posts`"));
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
	<table width="100%" height="48" border="0" cellpadding="2" cellspacing="1"  class="smallText">
  <tr bgcolor="#E8F0F0">
    <td width="68%" height="39" valign="top" align="left" style="border:#CCCCCC 4px ridge;"><font size="-1">
	<?php echo "<b>".$name."</b>logged in " ?></font>	</td>
    <td width="21%" valign="bottom" align="right" style="border:#FFFFFF 2px inset;">
	<a href="post.php?id=<?php echo $usrId?>&name=<?php echo $name?>" onclick="return checkLogin()">
	<font size="-2">Submit a blog post</font></a>	</td>
    <td width="11%" valign="bottom" align="right" style="border:#FFFFFF 2px inset;">
	<a href="blogLogout.php"><font size="-2" color="#990000">logout</font></a>	</td>
  </tr>
</table>
	<?php 
	if(isset($_GET["message"])){
		echo "<span class=\"subHeader\" align=\"center\">".$_GET["message"]."</span>";
	}
	?>
	   <br/>&nbsp;
	<!-- Start blog data table arrangement-->
	<?php 
		
		$result=getResult("SELECT  `comments`,`post_id` ,`headline` , `date` ,`data`, `user_id` FROM `posts` ORDER BY 
		`post_id` DESC LIMIT {$startRow},{$step}");
		
		$Pid;
	?>
	
	 <table width="100%" border="0" cellspacing="1" cellpadding="2">
	 <?php while ($row=mysql_fetch_array($result)){ ?>
	  	  <tr>
		  <td height="35">
		  <table width="100%" class="smallText" style="border:#999999 3px double" cellpadding="3" cellspacing="5">
            <?php foreach($row as $key=>$value){    ?>
            <?php if($key == "comments"){
					$comms=$value;
					continue;
				}elseif($key == "post_id"){
					$Pid=$value;
					continue;
				}
				?>
            <?php if($key == "headline"){?>
            <tr bgcolor="#DBE0E8">
              <td width="14%" valign="middle" align="left"><img src="../images/ico_archive.gif"/>&nbsp;Title:</td>
              <td width="86%" colspan="2" align="left" class="subHeader"><font color="#660000"><?php echo $value?></font></td>
            </tr>
            <?php } elseif($key =="date" ){?>
            <tr>
              <td width="14%" valign="middle" align="left"><img src="../images/ico_date.gif"/>&nbsp;Posted on:</td>
              <td width="86%" colspan="2" align="left"><?php echo getFormattedTime($value)?> </td>
            </tr>
            <?php } elseif($key =="data" ){?>
            <tr>
              <td colspan="3" align="justify" style="border:#666666 1px dotted;"><textarea name="textarea" cols="120" rows="5" readonly="readonly" wrap="virtual" 
				bgcolor="#CBE7EB" style="background-color:#CBE7EB;border:0px;" 
				class="smallText" ><?php echo $value?></textarea></td> 
            </tr>
			
            <?php } elseif($key =="user_id" ){ $usrId=$value;?>
            <tr>
              <td width="14%" valign="middle" align="left"><img src="../images/ico_user.gif" />&nbsp;Author:</td>
              <td width="43%" align="left">
			  <?php echo getBlogUser($value)?> &nbsp;&nbsp;|&nbsp;&nbsp;<img src="../images/ico_comments.gif"/>&nbsp;
                
                comments : <?php echo $comms?> </td>
              <td width="43%" align="right">
			  <a href="" onclick="commentField(<?php echo $Pid?>,<?php echo $usrId?>)">
			  <font size="-2"> post a comment</font></a> 
			   &nbsp;&nbsp;|&nbsp;&nbsp;
			   <?php if($comms!=0){?>
			   <a href="comments.php?id=<?php echo $Pid?>" ><font size="-2">view comment(s)</font></a>
			  <?php }?> </td>
            </tr>
            <?php } ?>
            <?php }?>
          </table></td>
	  	</tr>
	  <?php } ?>
	  </table>
	  <br />&nbsp;
	  <table width="100%" border="0" cellspacing="2" cellpadding="2" class="smallText" bgcolor="#E2E8E9">
  <tr>
    <td width="61%" align="left">Viewing posts : <?php 
	
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
	
	<a href="blog.php?key=prev&prev=<?php echo $startRow;?>" onclick="return checkLogin()"> &lt; BACK </a>
	
	<?php 
	}else {
	echo "START REACHED"; 
	}
	?>	</td>
	
    <td width="21%"  align="right">
	<?php 
	if(!($startRow+$step>=$total)){
		
	?>
	<a href="blog.php?key=next&prev=<?php echo $startRow;?>" onclick="return checkLogin()"> NEXT &gt; </a>
	<?php }else echo "END REACHED" ?>	</td>
  </tr>
</table>

	  <br />&nbsp;
	  <center>
	    <?php 
	 			
			require_once("../scripts/categoryBox.php");
			echo getCategoryBox(false);
	 
	 	?>
	  </center>
		<br>&nbsp;	  	  </td>
	  
    <td width="1" ></td>
      <td width="5" valign="top" style="border-left:#666666 1px dotted;">
	  <br />
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
	  </table>
	  </td>
      <td width="1" valign="top"></td>
 </tr>
  <tr>
    <td width="181" height="29" valign="top">
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
    <td width="258">&nbsp;</td>
    <td width="450">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="5">&nbsp;</td>
	<td width="1">&nbsp;</td>
  </tr>
</table>


</center>
</body>
<center>
<a href="http://www.m3world.biz">engineerd by m3 : www.m3world.biz</a>
</center>
</html>
