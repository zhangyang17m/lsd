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
<title>Messages from others</title>
</head>
<link rel="stylesheet" type="text/css" href="/mycss" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<?php
require ('code.php');
require ('dbconnect.php');
include("head.php");
?>

<table width="80%" border="0" align="center">
<tr>
	<td class=headerC>mutant</th>
	<td class=headerC>gene</th>
	<td class=headerC>hormone</th>
	<td class=headerC>key sentences</th>
	<td class=headerC>paper name</th>
	<td class=headerC>pubmed ID</th>
	<td class=headerC>send from</th>
	<td class=headerC>Download</th>
	<td class=headerC>delete</th>
</tr>

<?php
$name=$_SESSION['username'];
$sql="SELECT * FROM member WHERE name='$name'";
$re=mysql_query($sql);
$info=mysqli_fetch_array($re);
$hormone="$info[0]";

if($_GET['id']){
	// Delete a message send to me
	$sql="DELETE FROM share WHERE id='$_GET[id]'";
	$re=mysqli_query($conn,$sql) or die(mysqli_error());
}

// Get messages send to me!
$sql="SELECT * FROM share WHERE sendto='$name' ORDER BY id";
$re=mysqli_query($conn,$sql) or die(mysqli_error());
while($info=mysqli_fetch_array($re)){
	$info[pmid]=outpmid($info[pmid]);
	
	echo "<tr>
			<td class=content>$info[plant_name]</td>
			<td class=content>$info[gene_name]</td>
			<td class=content>$info[sendto]</td>
			<td class=content>$info[key_note]</td>
			<td class=content>$info[paper_name]</td>
			<td class=content>$info[pmid]</td>
			<td class=content>$info[sendfrom]</td>";
		
	if($info[paperURL]){
		echo "<td class=content><a href='$info[paperURL]'>Download</a></td>";
	}
	else{
		echo "<td class=content>-</td>";
	}	
			
	echo "	<td class=content><a href='from.php?id=$info[id]'>delete</a></td>
		 </tr>";
}


?>
</table>

</body>
</html>
