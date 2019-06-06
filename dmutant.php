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
<title>Display Mutant information</title>
<link rel="stylesheet" type="text/css" href="/mycss" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<?php
require ('dbconnect.php');
require ('code.php');
include("head.php");

// Get paramaters
$name=$_SESSION['username'];
$sql="SELECT * FROM member WHERE name='$name'";
$re=mysql_query($sql);
$info=mysqli_fetch_array($re);
$hormone="$info[0]";


?>

<?php
// Process data from GET method
if($_GET['delete']=="yes"){
	$plant_name=$_GET['plant_name'];
	$sql="DELETE FROM plant_hormone WHERE hormone='$hormone' AND plant_name='$plant_name'";
	mysqli_query($conn,$sql) or die(mysqli_error());
	
	$sql="DELETE FROM plant_info WHERE plant_name='$plant_name' AND plant_name not in (SELECT plant_name FROM plant_hormone where 
plant_name='$plant_name')";
	mysqli_query($conn,$sql) or die(mysqli_error());
	
        $sql="SELECT distinct accesse_id from gene_hormone_plant where hormone='$hormone' and plant_name='$plant_name'"; 
	$tmp=mysqli_query($conn,$sql) or die(mysqli_error());
	// delete from gene_hormone_plant
	$sql="DELETE FROM gene_hormone_plant WHERE hormone='$hormone' AND plant_name='$plant_name'";
	mysqli_query($conn,$sql) or die(mysqli_error());
	// update evidence of gene in gene_hormone_info
	while($re=mysqli_fetch_array($tmp)){
		$sql="SELECT accesse_id FROM gene_hormone_plant WHERE accesse_id='$re[accesse_id]' and hormone='$hormone'";
		$tmp2=mysqli_query($conn,$sql) or die(mysqli_error());
		if(mysqli_fetch_array($tmp2)){
			// run nothing
		}
		else{
			$sql="UPDATE gene_hormone_info SET evidence='other' WHERE accesse_id='$re[accesse_id]' and hormone='$hormone'";
			mysqli_query($conn,$sql) or die(mysqli_error());
		}
		
	}
	
	$sql="DELETE FROM phenotype WHERE hormone='$hormone' AND plant_name='$plant_name'";
	mysqli_query($conn,$sql) or die(mysqli_error());

	$sql="SELECT distinct accesse_id from gene_hormone_plant where hormone='$hormone' and plant_name='$plant_name'";
}

// Process data from POST method----------------------------------
if($_POST['Add']){
	$plant_name=trim( $_POST['mName'] );
	$sql="SELECT plant_name FROM plant_hormone WHERE hormone='$hormone' AND plant_name='$plant_name'";
	$result=mysqli_query($conn,$sql) or die(mysqli_error());
	$re=mysqli_fetch_array($result);
	
	if($re['plant_name']){
	// The mutant exists. Don't add this mutant again!
		echo "<table width='80%' border='0' align='center'>";
		
		echo "<tr><th align='left'><P>mutant $plant_name had been in the database! Don't add it again!</p></th></tr>";

		// print basic information
		print_basic($plant_name);
		// print details of genotype
		print_genotype($plant_name);		
		// print details of phenotype			
		print_phenotype($plant_name);
		
		echo "<tr><th align='left'><a href='dmutant.php'>Back</a></th></tr>";
		echo "</table>";
		exit;
	}
	else{
	// Add a mutant to plant_hormone
		$sql="INSERT INTO plant_hormone (plant_name,hormone,sure) VALUES ('$plant_name','$hormone','no')";
		mysqli_query($conn,$sql) or die(mysqli_error());
		
		echo "Add mutant $plant_name succseefully!<BR>";
		echo "<a href='dmutant.php'>Back</a>";
		exit;
	}
}

if($_POST['submit']){

for($i=1; $i<=$_POST['mutantCount'] ;$i++){
	$plant_name="name".$i;
	$plant_name=$_POST[$plant_name];
	
	$sure="s".$i;
	$sure=$_POST[$sure];
	
	$sql="SELECT plant_name FROM plant_hormone WHERE hormone='$hormone' AND plant_name='$plant_name'";
	$result=mysqli_query($conn,$sql) or die(mysqli_error());
	$re=mysqli_fetch_array($result);
	// Delete a record
	if($re['plant_name']==""){
		$sql="DELETE FROM plant_hormone WHERE hormone='$hormone' and plant_name='$plant_name'";
		mysqli_query($conn,$sql) or die(mysqli_error());
	}
	// Update or Insert	
	else{
		$sql="SELECT sure FROM plant_hormone WHERE hormone='$hormone' and plant_name='$plant_name'";	
		$result=mysqli_query($conn,$sql) or die(mysqli_error());
		$re=mysqli_fetch_array($result);
	
		if($re['sure']){
		// Update an exist record
			if($re['sure']!=$sure){
				$sql="UPDATE plant_hormone SET sure='$sure' WHERE hormone='$hormone' and plant_name='$plant_name'";
				mysqli_query($conn,$sql) or die(mysqli_error());
			}
		}
		else{
			// Insert a new record
			$sql="INSERT INTO plant_hormone (plant_name,hormone,sure) VALUES ('$plant_name','$hormone','$sure')";
			mysqli_query($conn,$sql) or die(mysqli_error());
		}
	}
}

}
// Process form data_________________________________
?>

<?php
// How many mutants are related to the given hormone?
$sql="select count(distinct plant_name) from plant_hormone where hormone='$hormone'";
$result=mysqli_query($conn,$sql);
$info=mysqli_fetch_array($result);
?>
<table width="80%" border="0" align="center">
		<tr>
			<td><a href="javascript:showhide('new_m');"><font size="6"><u>Add a new mutant</u></font></a></td>
		</tr>
		<tr>
			<td id="new_m" style="display:none" align="left" bgcolor="#FF0033">
			
				<form method="post" name="formNew" action="dmutant.php" onsubmit="return checksubmit()">
					<b>Mutant name:</b><input type="text" name="mName" />
					<input type="submit" name="Add" value="Add" />
				</form>
				
			</td>
		</tr>
</table>		
<table width="80%" border="0" align="center">
		<tr>
			<th colspan="3"><font size="6"> <BR></font></th>
		</tr>
			
		<tr>
			<td width="100%" class=header2C><font size="6"><?php echo $info[0];?> mutants are related to <?php echo $hormone;?></font> (order by mutant name)</td>
		</tr>
</table>

<form name="form1" method="post" action="dmutant.php">
<?php
	$count=1;
	$genecount=1;

	// Print Unsure mutants
	echo "<p class=warn align='center'>Unsure mutants. They need further check.</p>";
	printMutant("no");
	
	// Print Sure mutants
	echo "<p class=good align='center'>Sure mutants.</p>";
	printMutant("yes");

	// Close connection
	mysql_close($conn);

?>

<input type="hidden" name="mutantCount" value="<?php echo $count-1;?>">
<table width="80%" border="0" align="center">
		<tr>
			<td align="center"><input type="submit" name="submit" value="Submit"></td>
		</tr>

</table>
</form>
</body>
</html>





<?php
function printMutant($sure){
	global $conn, $hormone, $count;

	$sql="SELECT DISTINCT plant_name FROM plant_hormone 
			WHERE hormone='$hormone' AND sure='$sure'
			ORDER BY plant_name";
	$result=mysqli_query($conn,$sql) or die(mysqli_error());
	while($info=mysqli_fetch_array($result)){
		$plant_name=$info[0];
// print plant name: count plant_name unsure/sure		
		print_plant_name($plant_name,$sure);

		echo "<table id='$plant_name' width='80%' border='0' align='center'  style=\"display: block;\">";
// print basic information
		print_basic($plant_name);

// print details of genotype
		print_genotype($plant_name);		
// print details of phenotype			
		print_phenotype($plant_name);
		
		echo "</table>";

		$count++;
	}
	
}	
?>






<script language="JavaScript">
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
</script>

<script language="javascript">
	function checksubmit(){
		if(formNew.mName.value==""){
			alert("Please input mutant name!")
			formNew.mName.focus()
			return false
		}
		else{
			return ture
		}
	}
</script>
