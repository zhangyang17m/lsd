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
<title>Modify mutant basic information</title>
<link rel="stylesheet" type="text/css" href="/mycss" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<?php
require ('code.php');
require ('dbconnect.php');
include("head.php");

// Get paramater
$plant_name=$_GET['id'];
$hormone=$_SESSION['username'];
?>


	
<form name="form1" method="post" action="check_mbasic.php" onsubmit="return checkform()">
<table width="80%" border="0" align="center">
	<tr>
		<th colspan="3" align="left"><font size="6">Basic information for <I><U><?php echo $plant_name; ?></U></I></font>
		<input type="hidden" name="plant_name" value="<?php echo $plant_name; ?>">
		</th>
	</tr>

<?php	
		$sql="SELECT * FROM plant_info WHERE plant_name='$plant_name'";
		$mu=mysqli_query($conn,$sql) or die(mysqli_error());
		$muinfo=mysqli_fetch_array($mu);
		
		// Plant type		
                echo "<tr>
                                                <td class=contentB>Plant type</td>";
		$no="------------------------------------------";
                $options = array("mutant","transgenic",$no);

                if(!$muinfo[plant_type]){
                        echo "<td class=content>";
                        $default=$no;
                }
                else{
                        echo "<td class=content>";
                        $default=$muinfo[plant_type];
                }

                echo "<select name='S_plant_type' onChange=T_plant_type.value=this.value>";
                print_options($options,$default);
                echo "</select>";

                echo "<input type='text' name='T_plant_type' value=\"$muinfo[plant_type]\">";
                echo "</td>";
                echo "</tr>";		

		// Ecotype information
		echo "<tr>
						<td class=contentB>Ecotype</td>";
		
		$no="------------------------------------------";
		$options = array($no,"Col-0","Ws","Ler","C24","Nossen","other");
		if(!$muinfo[ecotype]){
			echo "<td class=content>";
			$default=$no;		
		}
		else{
			echo "<td class=content>";
			$default=$muinfo[ecotype];
		}
		echo "<select name='S_ecotype' onChange=T_ecotype.value=this.value>";
		print_options($options,$default);
		echo "</select>";

		echo "<input type='text' name='T_ecotype' value=\"$muinfo[ecotype]\">";
		echo "</td>";
		echo "</tr>";
		
		// mutagenesis_type information
		echo "<tr>
						<td class=contentB>mutagenesis_type</td>";
		
		$no="------------------------------------------";
		$options = array($no,"EMS","T-DNA insertion_knock out","T-DNA insertion_activation tag","Ds insertion","En-1/Spm-transposon","enhancer trap","gene trap","fast neutron mutagenesis","X-ray","other");
		if(!$muinfo[mutagenesis_type]){
			echo "<td class=content>";
			$default=$no;		
		}
		else{
			echo "<td class=content>";
			$default=$muinfo[mutagenesis_type];
		}
		echo "<select name='S_mutagenesis_type' onChange=T_mutagenesis_type.value=this.value>";
		print_options($options,$default);
		echo "</select>";
	
		echo "<input type='text' name='T_mutagenesis_type' value=\"$muinfo[mutagenesis_type]\">";
		echo "</td>";
		echo "</tr>";	
		
		// dominant_recessive
		echo "<tr>
						<td class=contentB>dominant/recessive/semi-dominant</td>";
		
		$no="------------------------------------------";
		$options = array($no,"dominant","recessive","semi-dominant");
		if(!$muinfo[dominant_recessive]){
			echo "<td class=content>";
			$default=$no;		
		}
		else{
			echo "<td class=content>";
			$default=$muinfo[dominant_recessive];
		}
		echo "<select name='S_dominant_recessive'>";
		print_options($options,$default);
		echo "</select>";
		
		echo "</td>";
		echo "</tr>";			

		// Comment
				echo "<tr>
								<td class=contentB>Comment</td>
								<td class=content>
									<input type='text' name='comment' value=\"$muinfo[comment]\">
								</td>
							</tr>";	
							
		// Pubmed ID
				echo "<tr>
								<td class=contentB>Pubmed ID<BR>separate multi reference by ;<P class=warn>eg:10157;29065</p></td>
								<td class=content>
									<input type='text' name='pmid' value=\"$muinfo[pmid]\">
								</td>
							</tr>";				
?>	

	
</table>


<table width="80%" border="0" align="center">	
	<tr><th colspan="3">
		<input type="reset" name="reset" value="reset" >
		<input type="Submit" name="submit" value="Submit">
	</th></tr>
</table>

</form>

</body>
</html>

<script language="javascript">
        function checkform(){
                if(form1.T_plant_type.value==""){
                        alert("Please select the plant type")
			form1.S_plant_type.focus();
                        return false
                }
        }
</script>

