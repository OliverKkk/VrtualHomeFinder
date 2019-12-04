
<?php 
function getCategoryBox($inRoot=true){
	$result=getResult("select * from `categories`");
	$cId;

$html= "
<center>
<table  width=\"100%\" height=\"85\" border=\"0\" align=\"left\" cellpadding=\"3\" cellspacing=\"3\" class=\"navText\" 
	  style=\"border:thin dotted #999999; 
	  margin-top:35px;overflow:scroll;\" >
        <tr >
          <td class=\"subHeader\" align=\"center\" style=\"border-bottom:thin dotted #999999;\"> 
		  Select house search category</td>
        </tr>
		";
			
		
		while($array=mysql_fetch_assoc($result)){
		
			foreach($array as $key => $value){
			
			if($key=="category_id"){
				$cId=$value;
			
			}else{
			
				$html.= "<tr>";
				
				if($inRoot==true){
					$html.= "<td align=\"left\"><a href=\"categories.php?cat={$cId}\">
					  	{$value}</a> </td>";
				}elseif($inRoot==false){
					$html.= "<td align=\"left\"><a href=\"../categories.php?cat={$cId}\">
					  	{$value}</a> </td>";
				}
				
				$html.= "</tr>";
			}
		}
		}mysql_free_result($result);
		
	$fin="	
		<tr>
		<td style=\"border-top:#660000 1px dotted;\">
		<a href=\"#idSearch\" ><font size=\"-2\" color=\"#660033\" >Click to search by house id</font></a>
		</td>
		</tr>";
   
    $html.= "
	  </table>
</center>
";



	
	
	return $html;

}
?>