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
<title>Check mutant basic information</title>
<link rel="stylesheet" type="text/css" href="/mycss" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>


<?php
require ('code.php');
require ('dbconnect.php');
include("head.php");
?>

	
<table width='80%' border='0' align='center'>


<?php
// Get paramaters
$plant_name=$_POST['plant_name'];
if($plant_name==""){
	echo "You did not select an mutant<BR>";
	echo "<a href='dmutant.php'>Back</a>";
	exit;
}

$plant_type=$_POST['T_plant_type'];
$plant_type=trim($plant_type);

$ecotype=$_POST['T_ecotype'];
$ecotype=trim($ecotype);

$mutagenesis_type=$_POST['T_mutagenesis_type'];
$mutagenesis_type=trim($mutagenesis_type);

$dominant_recessive=$_POST['S_dominant_recessive'];
$dominant_recessive=trim($dominant_recessive);

$comment=$_POST['comment'];
$comment=trim($comment);

$pmid=$_POST['pmid'];
$pmid=trim($pmid);
$pmid=savepmid($pmid);

$sql="SELECT plant_name FROM plant_info WHERE plant_name='$plant_name'";
$result=mysqli_query($conn,$sql) or die (mysqli_error());
$re=mysqli_fetch_array($result);
		
// Update record
if($re[0]){
	$sql="UPDATE plant_info SET 
ecotype='$ecotype',mutagenesis_type='$mutagenesis_type',dominant_recessive='$dominant_recessive',pmid='$pmid',comment='$comment',plant_type='$plant_type' 
WHERE plant_name='$plant_name'";
}
// Insert record
else{
	$sql="INSERT INTO plant_info (plant_name,ecotype,mutagenesis_type,dominant_recessive,pmid,comment,plant_type) VALUES 
		('$plant_name','$ecotype','$mutagenesis_type','$dominant_recessive','$pmid','$comment','$plant_type')";
}
// Process database
mysqli_query($conn,$sql) or die ($sql);



// data after updation
$sql="SELECT * FROM plant_info WHERE plant_name='$plant_name'";
$tmp=mysqli_query($conn,$sql) or die(mysql.error());

echo "<tr><th>Updated Basic information for <BR> mutant <U><I>$plant_name</I></U></tr>";
print_basic($plant_name);

?>

<tr>
<th><BR /></th>
</tr>


<tr>
	<th>
		<a href="dmutant.php"> OK</a>
	</th>
</tr>


</table>


</body>
</html>
