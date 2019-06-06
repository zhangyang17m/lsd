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
<title>Response to other hormone</title>
</head>
<link rel="stylesheet" type="text/css" href="/mycss" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>


<?php
require ('dbconnect.php');
include("head.php");

$name=$_SESSION['username'];
$sql="SELECT * FROM member WHERE name='$name'";
$re=mysql_query($sql);
$info=mysqli_fetch_array($re);
$hormone="$info[0]";

// Process data from POST method
if($_POST['submit']){
	$plant_name=$_POST['plant_name'];
	$gene_name=$_POST['gene_name'];
	$sendfrom=$name;
	$sendto=$_POST['hormone'];
	$paper_name=$_POST['paper_name'];
	$pmid=$_POST['pmid'];
	$key_note=$_POST['key_note'];
	$upload_file=$_FILES['upload_file']['tmp_name'];
	$upload_file_name=$_FILES['upload_file']['name'];

	for($i=0;$i<sizeof($sendto);$i++){
		if($upload_file){
			$paperURL="paper/".$upload_file_name;
			$sql="INSERT INTO share (plant_name,gene_name,sendfrom,sendto,paper_name,pmid,key_note,paperURL) VALUES ('$plant_name','$gene_name','$sendfrom','$sendto[$i]','$paper_name','$pmid','$key_note','$paperURL')";
			$re=mysqli_query($conn,$sql) or die(mysqli_error());
			echo "<P class=good>send message to <U>$sendto[$i] group</U> successfully!</p><BR>";	
		}
		else{
			$sql="INSERT INTO share (plant_name,gene_name,sendfrom,sendto,paper_name,pmid,key_note) VALUES ('$plant_name','$gene_name','$sendfrom','$sendto[$i]','$paper_name','$pmid','$key_note')";
			$re=mysqli_query($conn,$sql) or die(mysqli_error());
			echo "<P class=good>send message to <U>$sendto[$i] group</U> successfully!</p><BR>";	
		}

	}
	if(!$re){
        echo "<P class=warn>send message failed!<BR></p>";
	}

	//-upload file
	if($upload_file){
		$file_size_max = 1000*1000*1000;// 1M??????????(bytes)
		$store_dir = "/home/pengzy/web/paper/";// ?????????
		$accept_overwrite = 1;//??????????
		// ??????
		if ($upload_file_size > $file_size_max) {
		echo "Sorry, your file is larger than 10M";
		exit;
	}

	// ??????
	if (file_exists($store_dir . $upload_file_name) && !$accept_overwrite) {
	Echo  "exist the same file. Please rename your file.";
	exit;
	}
	
	//?????????
	if (!move_uploaded_file($upload_file,$store_dir.$upload_file_name)) {
	echo "fail to copy your file to the destination";
	exit;
	}
	
	}
	
	Echo  "<p>Upload file:";
	echo $_FILES['upload_file']['name'];
	echo "<br>";
	//???????????? 
	
	Echo  "File type:";
	echo $_FILES['upload_file']['type'];
	//??? MIME ??,?????????????,???mage/gif? 
	echo "<br>";
	
	Echo  "File size:";
	echo $_FILES['upload_file']['size'];
	//????????,?????? 
	echo "<br>";

	//Echo  "the file was temply stored in:";
	//echo $_FILES['upload_file']['tmp_name'];
	//??????????????????? 
	//echo "<br>";
	
	
	$Erroe=$_FILES['upload_file']['error'];
	switch($Erroe){
		case 0:
		  Echo  "<P class=good>Upload sucessfully</p>"; break;
		case 1:
		  Echo  "<P class=warn>The upload file is larger than the value in upload_max_filesize set in the php.ini</p>"; break;
		case 2:
		  Echo  "<P class=warn>The upload file is larger than the value in MAX_FILE_SIZE set in the form</p>";  break;
		case 3:
		  Echo  "<P class=warn>The file is upload partially</p>";break;
		case 4:
		  Echo  "<P class=warn>File not upload</p>";break;
	}

	exit;
}
?>

<form  name="form1" method="post" action="to.php" enctype="multipart/form-data" onsubmit="return checksubmit()">
<table width="80%" border="0" align="center">
	<tr>
		<td align="right">
			Mutant name:		</td>
		<td>
			<input type="text" name="plant_name" />
		</td>
	</tr>
	
	<tr>
		<td align="right">
			Gene name:		</td>
		<td>
			<input type="text" name="gene_name" />
		</td>
	</tr>
	
	<tr>
		<td align="right">
			<b><font size="+1">Response to other member:</font></b>
		</td>
	</tr>
	
	<tr>
	  	<td colspan="2" align="center">
			<input type="checkbox" name="hormone[]" value="lizh"/>
			lizh
			<input type="checkbox" name="hormone[]" value="jiangzq"/>
			jiangzq
			<input type="checkbox" name="hormone[]" value="liuxc"/>
			liuxc
			<input type="checkbox" name="hormone[]" value="luojc"/>
			luojc
			<input type="checkbox" name="hormone[]" value="guohw"/>
			guohw
			
		</td>
	</tr>

	<tr>
		<td align="right" valign="top">
			Reference name:		
		</td>
		<td>
			<textarea name="paper_name"  cols="50" rows="5"></textarea>
		</td>		
	</tr>
	
	<tr>
		<td align="right">
			Pubmed Id:		
		</td>
		<td>
			<input type="text" name="pmid" />
		</td>		
	</tr>

	<tr>
		<td align="right" valign="top">
			Key sentenses:		
		</td>
		<td>
			<textarea name="key_note"  cols="50" rows="5"></textarea>
		</td>		
	</tr>
	
	<tr>
		<td align="right">
			Upload reference:		
		</td>
		<td>
			<input type="file" name="upload_file" />
		</td>		
	</tr>
	
	<tr>
		<td colspan="2" align="center">
			<input type="submit" name="submit" value="Submit" />
	  </td>
	</tr>		
</table>
</form>

</body>
</html>

<script language="javascript">
	function checksubmit(){
		if((form1.plant_name.value=="") && (form1.gene_name.value=="")){
			alert("Please input plant name or gene name!");
			form1.plant_name.focus();
			return false;
		}
		else{
			return ture;
		}
	}
</script>
