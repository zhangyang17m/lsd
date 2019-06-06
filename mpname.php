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
<title>Modify mutant name</title>
<link rel="stylesheet" type="text/css" href="/mycss" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<?php
require ('code.php');
require ('dbconnect.php');
include("head.php");


$plant_name=$_GET['plant_name'];
$name=$_SESSION['username'];
$sql="SELECT * FROM member WHERE name='$name'";
$re=mysql_query($sql);
$info=mysqli_fetch_array($re);
$hormone="$info[0]";


// Process data from FORM
if($_POST['rename']){
	$oldname=$_POST['oldname'];
	$newname=$_POST['newname'];
	
	$sql="SELECT plant_name FROM plant_hormone WHERE hormone='$hormone' AND plant_name='$newname'";
	$result=mysqli_query($conn,$sql) or die(mysqli_error());
	$re=mysqli_fetch_array($result);
	
	if($re['plant_name']){
	// The mutant with new name exists. You cann't rename it!
		echo "<table width='80%' border='0' align='center'>";
		
		echo "<tr><th align='left'><P>mutant $newname had been in the database! <BR>Please give $oldname another name!</p></th></tr>";

		echo "<tr><th align='left'><a href='mpname.php?plant_name=$oldname'>Back</a></th></tr>";
		echo "</table>";
		exit;
	}
	// Update data
	else{
		// Update plant_hormone
		$sql="UPDATE plant_hormone SET plant_name='$newname' WHERE hormone='$hormone' AND plant_name='$oldname' ";
		mysql_query($sql) or die("Update plant_hormone:  mysqli_error()");
		
		// Update gene_hormone_plant
		$sql="UPDATE gene_hormone_plant SET plant_name='$newname' WHERE hormone='$hormone' AND plant_name='$oldname' ";
		mysql_query($sql) or die("Update gene_hormone_plant:  mysqli_error()");
		
		// Update phenotype
		$sql="UPDATE phenotype SET plant_name='$newname' WHERE hormone='$hormone' AND plant_name='$oldname' ";
		mysql_query($sql) or die("Update phenotype:  mysqli_error()");
		
		// Update plant_info
		$sql="UPDATE plant_info SET plant_name='$newname' WHERE plant_name='$oldname' ";
		mysql_query($sql) or die("Update plant_info:  mysqli_error()");
		
		
		echo "<table width='80%' border='0' align='center'>";
		
		echo "<tr><th align='left'>Rename succesfully</th></tr>";
		// print basic information
		print_basic($newname);

		// print details of genotype
		print_genotype($newname);		
		// print details of phenotype			
		print_phenotype($newname);
		
		echo "<tr><th align='left'><a href='dmutant.php?plant_name=$oldname'>Back</a></th></tr>";
		echo "</table>";
		exit;
	}	
}
// Data from GET method
else{
	if($plant_name==""){
		echo "You did not select the mutant that you want to change!<BR>";
		echo "<a href='dmutant.php'>Back</a>";
		exit;
	}
}
?>	
<form name="form1" method="post" action="mpname.php" onsubmit="return checksubmit()">	
	<table width="80%" border="0" align="center">
	
    <tr>
          <td class=headerC colspan="2">
                         Change Mutant name            
       	 </td>
     </tr>
	 <tr>        
		 <td class=contentB>    
			Old mutant name:
		 </td>
		  <td class=content>    
			<?php echo "$plant_name"; ?>
			<input type="hidden" name="oldname" value="<?php echo $plant_name ?>">
		 </td>
	</tr>	
 	 <tr>        
		 <td class=contentB>    
			New mutant name:
		 </td>
		  <td class=content>    
			<input type="text" name="newname">
		 </td>
	</tr>
	

	<tr>
		<th align="right">
			<input type="submit" name="rename" value="Rename" />
		</th>
	</tr>

	</table>
</form>
</body>
</html>



<script language="javascript">
	function checksubmit(){
		if(form1.newname.value==""){
			alert("Please input new plant name!");
			form1.newname.focus();
			return false;
		}
		else{
			return ture;
		}
	}
</script>
