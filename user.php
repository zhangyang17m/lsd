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
$name=$_SESSION['username'];;
$sql="SELECT * FROM member WHERE name='$name'";
$re=mysql_query($sql);
$info=mysqli_fetch_array($re);
$hormone="Leaf $info[0]";
?>	
	
	<table width="80%" border="0" align="center">
	<tr>
		<td class="contentB" style="border-color:#669900" style="border:dashed">
		<BR />
		Oh, welcome!<BR />
		&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF" size="+3"><?php echo "$info[name]"; ?></font> comes back :) <BR /><BR />
		&nbsp;&nbsp;&nbsp;&nbsp;Your great work will contribute to <font color="#0000FF"><?php echo "$hormone" ?> researchers all over the world</font>!
		&nbsp;  <BR />
		</td>	
	</tr>
	<tr>
		<td>
			<BR /><BR />
		</td>	
	</tr>
	
    <tr>
          <td class=headerC>
                         <a href="dmutant.php">Check Mutants related to <?php echo $hormone; ?></a>                
       	 </td>
     </tr>
	 <tr>        
		 <td class=headerC>    
			<a href="dgene.php">Check Genes related to <?php echo $hormone; ?></a>
		 </td>
	</tr>	

         <tr>
                 <td class=headerC>
                        <a href="table.doc">Download the table for literature reading</a>
                 </td>
        </tr>


  	<tr>        
		<th colspan="1"><br></th>
   	</tr>
	
	<?php print_contact($name);?>
        

	<tr>
		<th align="right">
			<a href=info.php> Modify personal statement</a>
		</th>
	</tr>
	<?php
		if($hormone=="abscisic acid"){
			echo "<tr><th><a href='/yu/1K_1_1000.html'>search cis-elements in upstream 1K</a></th></tr>";
			echo "<tr><th><a href='/yu/3K_1_1000.html'>search cis-elements in upstream 3K</a></th></tr>";
		}
	?>
	</table>
</body>
</html>
