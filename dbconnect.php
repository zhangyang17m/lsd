<?php

error_reporting(E_ALL ^ E_WARNING); 

#$conn=mysqli_connect("localhost","root","root")
	#or die("The service is under maintenance for about two weeks. Sorry for the non-convenience.");
$conn=mysqli_connect('localhost:3306','root','password','senescencedb_dev2') or die('Can not connect: '.mysqli_error());
//$conn=mysqli_connect('192.168.118.78','peku','pekU@2018','senescencedb_dev2') or die('Can not connect: '.mysqli_error());

#mysql_select_db("senescencedb_dev",$conn) or die ("The service is under maintenance. Sorry for the non-convenience.");

?>
