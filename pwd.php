<?php
session_start();
include("head.php");

// Login first
if(!isset($_SESSION['username'])){
        echo "<a href='userlogin.php'><h1>Please login first</h1></a>";
        exit();
}
?>


<script language="javascript">
	function checklogin(){
		if(pwd.oldp.value==""){
			alert("Please input old password!")
			return false
		}
		if((pwd.newp1.value!="") && (pwd.newp1.value!="") && (pwd.newp1.value==pwd.newp2.value)){
			return true
		}
		else{
			alert("Input different new password in two times");
			pwd.newp1.value=pwd.newp2.value="";
			pwd.newp1.focus();
			return false;
		}
	}
</script>




<form action="pwdok.php" method="post" name="pwd" onsubmit="return checklogin()">
<table align="center" border="0">
<tr><th colspan=2><h1>Change password</h1></th></tr>


 <tr>
 	<th align="right">
 		Old password:
 	</th>
 	<th>
 		<input type="password" name="oldp">
 	</th>
 </tr>

 <tr>
 	<th align="right">
 		New password:
 	</th>
 	<th>
 		<input type="password" name="newp1">
 	</th>
 </tr>
 
  <tr>
 	<th align="right">
 		Retype new password:
 	</th>
 	<th>
 		<input type="password" name="newp2">
 	</th>
 </tr>
 
 <tr>
	<th colspan="2" align="right">
 	<input type="submit" value="Submit">
	</th>
</tr>
</form>
</table>
