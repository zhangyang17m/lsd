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
<title>Modify genotype information</title>
<link rel="stylesheet" type="text/css" href="/mycss" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<?php
require ('dbconnect.php');
include("head.php");

// Get paramater
$plant_name=$_GET['plant_name'];

$name=$_SESSION['username'];;
$sql="SELECT * FROM member WHERE name='$name'";
$re=mysqli_error;
$info=mysqli_fetch_array($re);
$hormone="$info[0]";

?>

<form name="form1" method="post" action="mg2h2p.php" onsubmit="return checksubmit()">
<table width="80%" border="0" align="center">
	<tr>
		<th colspan="7" align="center"><font size="6">Add a gene related to <I><U><?php echo $plant_name; ?></U></I></font>
		<input type="hidden" name="plant_name" value="<?php echo $plant_name; ?>">
		</th>
	</tr>
	
	<tr>
		<th colspan="7" align="left"><font size="4">Select a gene first (order by alias)</font>
		<input type="hidden" name="plant_name" value="<?php echo $plant_name; ?>">
		</th>
	</tr>	
<?php
// Get gene list from gene_hormone_info
	// Table header
	echo "<tr>
			<td class=headerC>&nbsp;</td>
                        <td class=headerC>accesse id</td>
                        <td class=headerC>genbank id</td>
			<td class=headerC>locus name</td>
			<td class=headerC>alias</td>
			<td class=headerC>species</td>
			<td class=headerC>role</td>
                        <td class=headerC>effect</td>
                        <td class=headerC>evidence</td>
			<td class=headerC>gene description</td>
			<td class=headerC>pubmed</td>
		</tr>";

	$sql="SELECT * FROM gene_hormone_info WHERE hormone='$hormone' and evidence<>'GO' ORDER BY alias";
	$mu=mysqli_query($conn,$sql) or die(mysqli_error());
	while($info=mysqli_fetch_array($mu)){
		echo "<tr>
			<td class=content><input type='radio' name='addGeneID' value='$info[id]'></td>
			<td class=content>$info[accesse_id]</td>
                        <td class=content>$info[genbank_id]</td>
                        <td class=content>$info[locus_name]</td>
			<td class=content>$info[alias]</td>
			<td class=content>$info[species]</td>
			<td class=content>$info[hormone_role]</td>
                        <td class=content>$info[effect]</td>
                        <td class=content>$info[gene_evidence]</td>
			<td class=content>$info[gene_description]</td>
			<td class=content>$info[pmid]</td>
		</tr>";
	}
									
?>	
     <tr>
         <td colspan='7'><P class=warn>The gene is not in the list?&nbsp;<a href='mg2h.php'>Add it!</a></P></td>
     <tr>
</table>


<table width="80%" border="0" align="center">
	<tr>
		<td align='right'><input type="submit" value="Next" /></td>
	</tr>
	
</table>

</form>
</body>
</html>


<script language="javascript">
	function checksubmit(){
		if(form1.selectID.value==""){
			alert("Please select a gene!")
			return false
		}
		else{
			return ture
		}
	}
</script>
