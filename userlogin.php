<?php
session_start();

if(isset($_SESSION['username'])){
	$hormone = $_SESSION['username'];
	header("Location:user.php");
	exit;
}
?>

<script language="javascript">
	function checklogin(){
		if((login.username.value!="") && (login.password.value!="")){
			return true
		}
		else{
			alert("Please input administrator or password!")
			return false
		}
	}
</script>

<form action="checklogin.php" method="post" name="login" onsubmit="return checklogin()">
<table align="center" border="0">
<tr><th colspan=2><h1>User Login</h1></th></tr>


 <tr>
 	<th align="right">
 		Administrator:
 	</th>
 	<th>
 		<input type="text" name="username">
 	</th>
 </tr>

 <tr>
 	<th align="right">
 		Password:
 	</th>
 	<th>
 		<input type="password" name="password">
 	</th>
 </tr>
 
 <tr>
	<th colspan="2" align="right">
 	<input type="submit" value="login">
	</th>
</tr>
</form>
</table>
