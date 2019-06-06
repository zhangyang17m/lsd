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
<title>Display gene information</title>
<link rel="stylesheet" type="text/css" href="/mycss" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<?php
require ('code.php');
require ('dbconnect.php');
include("head.php");

// Get paramater
$plant_name=$_GET['plant_name'];

$name=$_SESSION['username'];
$sql="SELECT * FROM member WHERE name='$name'";
$re=mysql_query($sql);
$info=mysqli_fetch_array($re);
$hormone="$info[0]";


// Process data from POST method
if($_POST['submit']){
	$id=$_POST['id'];
	while(list($key,$geneid)=each($id)){
		$sure="sure$geneid";
		$sure=$_POST[$sure];
		if($sure=="sure"){
			$sure="yes";
		}
		else{
			$sure="no";
		}
		
		$sql="UPDATE gene_hormone_info SET sure='$sure' WHERE id='$geneid' and evidence<>'GO'";
		mysql_query($sql);
	}
}
?>

<?php
// How many genes are related to the given hormone?
$sql="select count(distinct id) from gene_hormone_info where hormone='$hormone' and evidence<>'GO'";
$result=mysqli_query($conn,$sql);
$info=mysqli_fetch_array($result);
?>
<table width="80%" border="0" align="center">
		<tr>
			<td><a href='mg2h.php'><font size="6"><u>Add a new gene</u></font></a></td>
		</tr>

		<tr>
			<th ><font size="6"> <BR></font></th>
		</tr>
			
		<tr>
			<td class=header2C><font size="6"><?php echo $info[0];?> genes are related to <?php echo $hormone;?></font>(order by alias)</td>
		</tr>

<?php
// Get gene list from gene_hormone_info
// Unsure genes
echo "<tr><td><p class=warn align='center'>Unsure genes. They need further check.</p></td></tr>";
echo "<tr><td><p class=header>With mutant/transgenic plant evidence.</p></td></tr>";
$sql="SELECT * FROM gene_hormone_info WHERE hormone='$hormone' AND sure='no' AND evidence<>'GO' AND evidence<>'other' ORDER BY evidence,alias";
print_geneinfo($sql);		

echo "<tr><td><p class=header>Without mutant/transgenic plant evidence.</p></td></tr>";                      
$sql="SELECT * FROM gene_hormone_info WHERE hormone='$hormone' AND sure='no' AND evidence='other' ORDER BY evidence,alias";
print_geneinfo($sql);

// Sure genes
echo "<tr><td><p class=good align='center'>Sure genes.</p></td></tr>";
echo "<tr><td><p class=header>With mutant/transgenic plant evidence.</p></td></tr>";                      
$sql="SELECT * FROM gene_hormone_info WHERE hormone='$hormone' AND sure='yes' AND evidence<>'GO' AND evidence<>'other' ORDER BY evidence,alias";
print_geneinfo($sql);
echo "<tr><td><p class=header>Without mutant/transgenic plant evidence.</p></td></tr>";
$sql="SELECT * FROM gene_hormone_info WHERE hormone='$hormone' AND sure='yes' AND evidence='other' ORDER BY evidence,alias";     
print_geneinfo($sql);
?>	
</table>


</body>
</html>


