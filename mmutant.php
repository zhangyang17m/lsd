<?php
session_start();

// Login first
if(!isset($_SESSION['username'])){
        echo "<a href='userlogin.php'><h1>Please login first</h1></a>";
        exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">
<head>
<title>Modify mutant information</title>
<link rel="stylesheet" type="text/css" href="/mycss" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<?php
require ('dbconnect.php');
include("head.php");

// Get paramater
$id=$_GET['id'];
$name=trim( $_SESSION['username'] );
$sql="SELECT * FROM member WHERE name='$name'";
$re=mysql_query($sql);
$info=mysqli_fetch_array($re);
$hormone="$info[0]";


?>


	
<form name="form1" method="post" action="check_mmutant.php" onsubmit="return checksubmit()">
<table width="80%" border="0" align="center">
	<tr>
		<th colspan="3" align="left"><font size="6">Phenotype for <I><?php echo $id; ?></I></font>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		</th>
	</tr>
	
	<tr>
		<td class=headerC width="30%"><font size="4">Attribute</font></td>
              <td class=headerC wwidth="35%"><font size="4">Senescence Phenotype</font></td>   
 <!--		<td class=headerC wwidth="35%"><font size="4"><?php echo $hormone;?></font></td>	-->
	
	</tr>	
</table>

<?php	
	$display="block";

	
	$sql="select * from options";
	$result=mysqli_query($conn,$sql);
	while($info=mysqli_fetch_array($result)){
		$sizeinfo=count($info);
		$namecount++;	
		
		if($lastClass!=$info['class']){
			if($lastClass!=""){
					// print other information
					$othername="other_".$lastClass;
					$sql="SELECT phenotype_desc FROM phenotype WHERE organ='$lastClass' and plant_name='$id' and attribute='other' and has_hormone='2' and hormone='$hormone'";
					$mu=mysqli_query($conn,$sql) or die(mysqli_error());
					$muinfo=mysqli_fetch_array($mu);
					if($muinfo['phenotype_desc']){
						$bgcol="red";
					}
					else{
						$bgcol="white";
					}
					
					echo "<tr>
							<td class=contentB>other</td>
							<td colspan='2' bgcolor='$bgcol'>
								<input type='text' name='$othername' value=\"$muinfo[phenotype_desc]\">
							</td>
							</tr>";
					
					echo "</table>";
//					$display="none";
			}
			
			// The table display Organs(eg. Root).			
			echo "<table width='80%' border='0' align='center' bgcolor='#e0e0e0'><tr>";
			echo "<th colspan='3' align='left'> <img src='image/minus.gif' id='img_$lastClass' onclick=\"showhide('$info[class]','img_$lastClass');\">[ $info[class] ]";
			echo "</th>";
			echo "</tr>
			</table>";
			
			// the next table display attributes of root
			echo "<table width='80%' border='1' align='center' style=\"display: $display;\" id='$info[class]'>";

		}


			

// Attribute ----------------------------------------------		
		$aname="A".$namecount;
		echo "<tr>";
		echo "<td width='30%' class='contentB'>$info[attribute]</td>";
		echo "<input type='hidden' name='$aname' value='$info[attribute]'>";
                
// No hormone -----------------------------------
		$sname="noS".$namecount;
		$tname="noT".$namecount;

	// <select> Dragdown list</select> -----------------------------------
		$sql="select * from phenotype where plant_name='$id' and organ='$info[class]' and  attribute='$info[attribute]' and has_hormone='0' and hormone='$hormone'";
		$mu=mysqli_query($conn,$sql);
		$muinfo=mysqli_fetch_array($mu);
		// default: no change
		if(!$muinfo[phenotype_desc]){
			echo "<td width='35%'>";
			echo "<select name='$sname' onChange=$tname.value=this.value>";
			echo "<option selected value=''>-----------</option>";
		}
		else{
			echo "<td width='35%' bgcolor='red'>";
			echo "<select name='$sname' onChange=$tname.value=this.value>";
                        echo "<option value=''>-----------</option>";
		}
		// default: phenotype_description
		for($i=4;$i<=$sizeinfo;$i++){
			$info[$i]=trim($info[$i]);				//trim blank in the head and the tail
			$info[$i]=trim($info[$i],"\"");		//trim " in the head and the tail
			
			if($info[$i]!=""){
				if($info[$i]==$muinfo[phenotype_desc]){
		                        echo "<option selected value='$muinfo[phenotype_desc]'>$muinfo[phenotype_desc]</option>";
				}
				else{
					echo "<option value='$info[$i]'>$info[$i]</option>";
				}
			}
		}
		echo "</select>";
	// <select> Dragdown list</select> _______________________________

		echo "<input type=text name='$tname' value=\"$muinfo[phenotype_desc]\">";
		echo "</td>";
// No hormone ___________________________________________________
		
/*
// With hormone -----------------------------------
		$sname="yesS".$namecount;
		$tname="yesT".$namecount;

	// <select> Dragdown list</select> -----------------------------------
		$sql="select * from phenotype where plant_name='$id' and attribute='$info[attribute]' and has_hormone='1' and hormone='$hormone'";
		$mu=mysqli_query($conn,$sql);
		$muinfo=mysqli_fetch_array($mu);
		// default: no change
		if(!$muinfo[phenotype_desc]){
			echo "<td width='35%'>";
			echo "<select name='$sname' onChange=$tname.value=this.value>";
			echo "<option selected value=''>-----------</option>";
		}
		else{
			echo "<td width='35%' bgcolor='red'>";
			echo "<select name='$sname' onChange=$tname.value=this.value>";
                        echo "<option value=''>-----------</option>";
		}
		// default: phenotype_description
		for($i=4;$i<=$sizeinfo;$i++){
			$info[$i]=trim($info[$i]);
			if($info[$i]!=""){
				if($info[$i]==$muinfo[phenotype_desc]){
		                        echo "<option selected value='$muinfo[phenotype_desc]'>$muinfo[phenotype_desc]</option>";
				}
				else{
					echo "<option value='$info[$i]'>$info[$i]</option>";
				}
			}
		}
		echo "</select>";
	// <select> Dragdown list</select> _______________________________

		echo "<input type=text name='$tname' value=\"$muinfo[phenotype_desc]\">";
		echo "</td>";
*/
// With hormone _________________________________________

		echo "</tr>";		

		$lastClass=$info['class'];
	}
	
	// print the last "other information"
	$othername="other_".$lastClass;
	$sql="SELECT phenotype_desc FROM phenotype WHERE organ='$lastClass' and plant_name='$id' and attribute='other' and has_hormone='2' and hormone='$hormone'";
	$mu=mysqli_query($conn,$sql) or die(mysqli_error());
	$muinfo=mysqli_fetch_array($mu);
	if($muinfo['phenotype_desc']){
		$bgcol="red";
	}
	else{
		$bgcol="white";
	}
	echo "<tr>
			<td class=contentB>other</td>
			<td colspan='2' bgcolor='$bgcol'>
				<input type='text' name='$othername' value=\"$muinfo[phenotype_desc]\">
			</td>
    	</tr>";	
	echo "</table>";
?>	


<table width="80%" border="1" align="center">	
	<tr><th colspan="3">
		<input type="reset" name="reset" value="Reset">
		<input type="Submit" name="submit" value="Submit">
	</th></tr>
</table>

</form>

<script language="javascript">
	function checksubmit(){
		if(form1.id.value==""){
			alert("Please input plant name!")
			form1.id.focus()
			return false
		}
	}
</script>

<script language="JavaScript">
<!--
function showhide( child_id, img )
{
	var thisImg = document.getElementById(img);
	
	if ( document.getElementById(child_id).style.display == "none" )
	{
		document.getElementById(child_id).style.display = "block";
		thisImg.src = "image/minus.gif";
		thisImg.title = "Hide";
	}
	else
	{
		document.getElementById(child_id).style.display = "none";
		thisImg.src = "image/plus.gif";
		thisImg.title = "Show";
	}
}
//-->
</script>

</body>
</html>
