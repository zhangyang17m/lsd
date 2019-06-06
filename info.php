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
<title>Modify personal information</title>
</head>
<link rel="stylesheet" type="text/css" href="/mycss" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>


<?php
require ('dbconnect.php');
include("head.php");

$name=$_SESSION['username'];
// Process data from POST method
if($_POST['submit']){
	$name=$_POST['name'];
	$email=$_POST['email'];
        
	$interest=$_POST['interest'];
	$paper=$_POST['paper'];
	$lab=$_POST['lab'];
	$upload_file=$_FILES['upload_file']['tmp_name'];
	$upload_file_name=$_FILES['upload_file']['name'];

	if($upload_file){
		$photoURL="paper/".$upload_file_name;
		$sql="UPDATE member SET lab='$lab',email='$email',interest='$interest',paper='$paper',photo='$photoURL' WHERE name='$name'";
		$re=mysqli_query($conn,$sql) or die(mysqli_error());
		echo "Update successfully!<BR><BR>";	
	}
	else{
		$sql="UPDATE member SET lab='$lab',email='$email',interest='$interest',paper='$paper' WHERE name='$name'";
		$re=mysqli_query($conn,$sql) or die(mysqli_error());
		echo "Update successfully!<BR><BR>";	
	}

	if(!$re){
        echo "Update failed!<BR>";
	}

	//-upload file
	if($upload_file){
		$file_size_max = 600*1000;// 600K(bytes)
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
	
	$Erroe=$_FILES['upload_file']['error'];
	switch($Erroe){
		case 0:
		  Echo  "Upload sucessfully"; break;
		case 1:
		  Echo  "The upload file is larger than the value in upload_max_filesize set in the php.ini"; break;
		case 2:
		  Echo  "The upload file is larger than the value in MAX_FILE_SIZE set in the form";  break;
		case 3:
		  Echo  "The file is upload partially";break;
		case 4:
		  Echo  "File not upload";break;
	}

	exit;
}


$sql="select * from member where name='$name'";
$result=mysqli_query($conn,$sql);
$info=mysqli_fetch_array($result);
?>

<form method="post" action="info.php" enctype="multipart/form-data" onSubmit="return checkmodify()">
	<table width="80%" border="1" align="center">
		<tr>
			<td colspan="2" class="headerC"><font size="6">Administrators for <?php echo $name;?></font></td>
		</tr>
		
		<tr>
			<td class=contentB>name:</td>
			<td>
				<input type="text" name="name" value="<?php echo $info['name']; ?>">
			</td>
		</tr>
                <tr>
                        <td class=contentB>lab:</td>
                        <td>
                                <input type="text" name="lab" value="<?php echo $info['lab']; ?>">
                        </td>
                </tr>
		<tr>
			<td class=contentB>E-mail:</td>
			<td>
				<input type="text" name="email" value="<?php echo $info['email']; ?>">
			</td>
		</tr>		
		
		<tr>
			<td class=contentB>research interests:</td>
			<td>
				<textarea name="interest" cols="60" rows="10" ><?php echo $info['interest']; ?></textarea>
			</td>
		</tr>		

		<tr>
			<td class=contentB>paper:</td>
			<td>
				<textarea name="paper" cols="60" rows="10"><?php echo $info['paper']; ?></textarea>
			</td>
		</tr>

		<tr>
			<td class=contentB>photo:</td>
			<td>
				<?php
				if($info['photo']==""){
					echo "no";
				}
				else {
					echo "<img width=240 src=$info[photo]>";
				}
				?>
			</td>
		</tr>

		<tr>
			<td class=contentB>Upload new photo(<500K):</td>
			<td>
				<input type="file" name="upload_file" size="25">
			</td>
		</tr>
		
		<tr>
			
			<th colspan="2" align="right">
				<input type="Submit" name="submit" value="Submit">
			</td>
		</tr>
		
	</table>

</form>

</body>
</html>


<script language="javascript">
function checkmodify(){
	if(form1.name.value==""){
		alert ("Input name");
		form1.name.focus();
		return false;
	}
	else if(form1.email.value==""){
		alert ("Input email");
		form1.email.focus();
		return false;
	}
	else if(form1.interest.value==""){
		alert ("Input research interests");
		form1.interest.focus();
		return false;
	}
	else{
		return true;
	}
				
}
</script>
