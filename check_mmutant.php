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
require ('code.php');
require ('dbconnect.php');
include("head.php");

// Get paramater
$plant_name=$_POST['id'];
$name=trim( $_SESSION['username'] );
$sql="SELECT * FROM member WHERE name='$name'";
$re=mysql_query($sql);
$info=mysqli_fetch_array($re);
$hormone="$info[0]";


?>

	
<table width='80%' border='0' align='center'>

<?php
// Delete a mutant
if($_GET['delete']){
	if($_GET['yes']=="yes"){
		$sql="DELETE FROM phenotype WHERE plant_name='$_GET[plant_name]' AND hormone='$hormone'";
		mysqli_query($conn,$sql) or die(mysqli_error());
		
		echo "<tr>
				<th>Delete phenotype for mutant <U><I>$_GET[plant_name]</I></U> successfully</th>
			</tr>
			<tr>
				<th><a href='dmutant.php'><font size='6'>Back</font></a></th>
			</tr>";
	}
	else{
		echo "<tr>
				<th>
					Do you really want to delete <BR>
					phenotype information for <U><I>$_GET[plant_name]</I></U>?
				</th>
			</tr>
			<tr>
				<th><a href='dmutant.php'><font size='6'>No</font></a></th>
			</tr>
			<tr>
				<th><a href='check_mmutant.php?plant_name=$_GET[plant_name]&delete=1&yes=yes'><font size='6'>Yes</font></a></th>
			</tr>";	
	}
	
	exit;
}

?>


<?php
// Update, add or delete attribute information
// Update, add or delete 'other' information
$ot["Natural senescence"]=$_POST['other_Natural senescence'];
$ot["Darkness induced senescence"]=$_POST['other_Darkness induced senescence'];
$ot["Nutritional Deficiency induced"]=$_POST['other_Nutritional Deficiency induced'];
$ot["Stress induced senescence"]=$_POST['other_Stress induced senescence'];
$ot["Others"]=$_POST['other_Others'];

while(list($organ,$phenotype_desc)=each($ot)){
	$phenotype_desc = trim($phenotype_desc);				//trim blank in the head and the tail
	if($phenotype_desc!=""){
		$has_hormone=2;
		
		$sql="SELECT phenotype_desc FROM phenotype WHERE plant_name='$plant_name' and organ='$organ' and attribute='other' and hormone='$hormone' and has_hormone='$has_hormone'";
		$result=mysqli_query($conn,$sql) or die (mysqli_error());
		$re=mysqli_fetch_array($result);
		
		// Update record
		if($re[0]){
			$sql="UPDATE phenotype SET phenotype_desc='$phenotype_desc' WHERE plant_name='$plant_name' and organ='$organ' and attribute='other' and hormone='$hormone' and has_hormone='$has_hormone'";
		}
		// Insert record
		else{
			$sql="INSERT INTO phenotype (plant_name,organ,attribute,has_hormone,hormone,phenotype_desc) VALUES('$plant_name','$organ','other','$has_hormone','$hormone','$phenotype_desc')";
		}
		
		// Process database
		$result=mysqli_query($conn,$sql) or die (mysqli_error()."bbb");
	}
	// Delete a record
	else{
		$has_hormone=2;
	
		$sql="SELECT phenotype_desc FROM phenotype WHERE plant_name='$plant_name' AND organ='$organ' AND attribute='other' AND hormone='$hormone' AND has_hormone='$has_hormone'";
		$result=mysqli_query($conn,$sql) or die (mysqli_error());
		$re=mysqli_fetch_array($result);
		
		// Delete a record
		if($re[0]){
			$sql="DELETE FROM phenotype WHERE plant_name='$plant_name' AND organ='$organ' AND attribute='other' AND hormone='$hormone' AND has_hormone='$has_hormone'";
			// Process database
			$result=mysqli_query($conn,$sql) or die (mysqli_error());
		}
	}
}

// Update, add or delete attribute information
$count=1;
while($count<100){
	$aname="A".$count;
	$aname=$_POST[$aname];	
	
	$ntname="noT".$count;
	$ntname=$_POST[$ntname];
	
	$ytname="yesT".$count;
	$ytname=$_POST[$ytname];
	
	$othername="other".$count;
	$othername=$_POST[$othername];
        
        $organ_array=floor(($count-1)/16);
        if($organ_array==0){$organ="Natural senescence";}
        if($organ_array==1){$organ="Darkness induced senescence";}
        if($organ_array==2){$organ="Nutritional Deficiency induced";}
        if($organ_array==3){$organ="Stress induced senescence";}
        if($organ_array==4){$organ="Others";}
	// No hormone -------------------------------------------
	$ntname = trim($ntname);				//trim blank in the head and the tail
	if($ntname!=""){
		$has_hormone=0;
		$phenotype_desc=$ntname;
	
		$sql="SELECT phenotype_desc FROM phenotype WHERE plant_name='$plant_name' AND attribute='$aname'  AND organ='$organ' AND hormone='$hormone' AND has_hormone='$has_hormone'";
		$result=mysqli_query($conn,$sql) or die (mysqli_error());
		$re=mysqli_fetch_array($result);
		// Update record
		if($re[0]){
			$sql="UPDATE phenotype SET phenotype_desc='$phenotype_desc' WHERE plant_name='$plant_name' AND organ='$organ' and  attribute='$aname' and hormone='$hormone' and has_hormone='$has_hormone'";
		}
		// Insert record
		else{
			$result=mysqli_query($conn, "SELECT class FROM options WHERE attribute='$aname' AND class='$organ'") or die (mysqli_error());
			$re=mysqli_fetch_array($result);
			$organ=$re[0];
			$sql="INSERT INTO phenotype (plant_name,organ,attribute,has_hormone,hormone,phenotype_desc) VALUES('$plant_name','$organ','$aname','$has_hormone','$hormone','$phenotype_desc')";
		}
		
		// Process database
		$result=mysqli_query($conn,$sql) or die (mysqli_error());
	}
	else{
		$has_hormone=0;
		
		$sql="SELECT phenotype_desc FROM phenotype WHERE plant_name='$plant_name' AND organ='$organ' AND attribute='$aname' AND hormone='$hormone' AND has_hormone='$has_hormone'";
		$result=mysqli_query($conn,$sql) or die (mysqli_error());
		$re=mysqli_fetch_array($result);
	
		// Delete a record
		if($re[0]){
			$sql="DELETE FROM phenotype WHERE plant_name='$plant_name' AND attribute='$aname' AND organ='$organ'  AND hormone='$hormone' AND has_hormone='$has_hormone'";
			// Process database
			$result=mysqli_query($conn,$sql) or die (mysqli_error());
		}
	}
	// No hormone ____________________________________________
	
	// With hormone -----------------------------------------
/*	$ytname = trim($ytname);				//trim blank in the head and the tail	
	if($ytname!=""){
		$has_hormone=1;
		$phenotype_desc=$ytname;
	
	//	$sql="SELECT phenotype_desc FROM phenotype WHERE plant_name='$plant_name' and attribute='$aname' AND organ='$organ'  and hormone='$hormone' and has_hormone='$has_hormone'";
		$result=mysqli_query($conn,$sql) or die (mysqli_error());
		$re=mysqli_fetch_array($result);
		// Update record
		if($re[0]){
	//		$sql="UPDATE phenotype SET phenotype_desc='$phenotype_desc' WHERE plant_name='$plant_name' and attribute='$aname' AND organ='$organ' and hormone='$hormone' and has_hormone='$has_hormone'";
		}
		// Insert record
		else{
			$result=mysql_query("SELECT class FROM options WHERE attribute='$aname'",$conn) or die (mysqli_error());
			$re=mysqli_fetch_array($result);
			$organ=$re[0];
	//		$sql="INSERT INTO phenotype (plant_name,organ,attribute,has_hormone,hormone,phenotype_desc) VALUES('$plant_name','$organ','$aname','$has_hormone','$hormone','$phenotype_desc')";
		}
		
		// Process database
		$result=mysqli_query($conn,$sql) or die (mysqli_error());
	}
	// Delete a record
	else{
		$has_hormone=1;
	
	//	$sql="SELECT phenotype_desc FROM phenotype WHERE plant_name='$plant_name' AND organ='$organ' AND attribute='$aname' AND hormone='$hormone' AND has_hormone='$has_hormone'";
		$result=mysqli_query($conn,$sql) or die (mysqli_error());
		$re=mysqli_fetch_array($result);
		
		// Delete a record
		if($re[0]){
	//		$sql="DELETE FROM phenotype WHERE plant_name='$plant_name' AND organ='$organ' AND attribute='$aname' AND hormone='$hormone' AND has_hormone='$has_hormone'";
			// Process database
			$result=mysqli_query($conn,$sql) or die (mysqli_error());
		}
		
	}		
	// With hormone ____________________________________________
*/
	$count++;
}



// data after updation

echo "<tr><th colspan='4'>Updated Information for <BR> mutant <U><I>$plant_name</I></U></tr>";
print_phenotype($plant_name);

?>
<tr>
<th><BR /></th>
</tr>

<form method="post" action="dmutant.php">
<tr>
	<th>
		<a href="dmutant.php"> OK</a>
	</th>
</tr>
<tr>
	<td colspan="4" align="center">
		<BR />
		<BR />

		<input type="hidden" name="mutantCount" value="1">
		<input type="hidden" name="name1" value="<?php echo $plant_name; ?>">
	</td>
</tr>
</form>

</table>



</body>
</html>
