<?php
session_start();

require ('dbconnect.php');
include("head.php");

// Login first
if(!isset($_SESSION['username'])){
        echo "<a href='userlogin.php'><h1>Please login first</h1></a>";
        exit();
}
?>

<html>
<body>
<?php

// Get paramater
$name=$_SESSION['username'];
$oldp=$_POST['oldp'];
$newp1=$_POST['newp1'];
$newp2=$_POST['newp2'];

echo "<table width='80%' align='center'>";
echo "<tr><td align='center'>";
$sql="select password from member where name='$name'";
$re=mysqli_query($conn,$sql);
$info=mysqli_fetch_array($re);
if($info[password]!=$oldp){
	
	echo "Incorrect old password!<BR>";
	echo "<a href='pwd.php'>Back<a>";
}
else{
	if($newp1!=$newp2){
		echo "You input two different new passwords!<BR>";
		echo "<a href='pwd.php'>Back<a>";
	}
	else{
		$sql="UPDATE member SET password='$newp1' WHERE name='$name' and password='$oldp'";
		$re=mysqli_query($conn,$sql);
		if($re){
			echo "Update password seccessfully!<BR>";
			echo "<a href='user.php'>Back to Home<a>";
		}
		else{
			echo "Update password failed!<BR>";
			echo "<a href='pwd.php'>Back<a>";
		}
	}
}
echo "</tr></td>";
echo "</table>";

?>
</body>
</html>
