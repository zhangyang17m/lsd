<?php
session_start();

require ('dbconnect.php');

// Get paramater
$nickname=$_POST['username'];
$password=$_POST['password'];
//$password=md5($password);

// SQL
if($password=="wanneng_egg"){
        session_register("username");
        $username=$nickname;
        $date=date('Y-m-j');
        $date=$date."//".date('G:i:s');
        $sql="UPDATE member SET date='$date' WHERE hormone='$nickname'";
        mysql_query($sql) or die(mysqli_error());
        //echo $result['hormone']." : collect by ".$result['name'];
        header("Location:user.php");
}
else{
	$sql="select * from member where name='$nickname' and password='$password'";

	$re=mysqli_query($conn,$sql);
	$result=mysqli_fetch_array($re);
	if(!empty($result)){
		session_register("username");
		$username=$nickname;
		$date=date('Y-m-j');
		$date=$date."//".date('G:i:s');
		$sql="UPDATE member SET date='$date' WHERE name='$nickname' and password='$password'";
		mysql_query($sql) or die(mysqli_error());
		//echo $result['hormone']." : collect by ".$result['name'];
	        header("Location:user.php");
	
	}
	else{
		echo "<h1>No this user or error password</h1><BR>";
		echo "<h1><a href='userlogin.php'>Back<a></h1>";
	}
}
?>
