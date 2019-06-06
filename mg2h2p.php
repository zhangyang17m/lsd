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
<title>Modify genotype information</title>
<link rel="stylesheet" type="text/css" href="/mycss" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<?php
require ('dbconnect.php');
include("head.php");

// Get paramaters
$name=$_SESSION['username'];;
$sql="SELECT * FROM member WHERE name='$name'";
$re=mysql_query($sql);
$info=mysqli_fetch_array($re);
$hormone="$info[0]";



if($_POST['addGeneID']){
	$sql="select * FROM gene_hormone_info WHERE id='$_POST[addGeneID]'";
	$mu=mysqli_query($conn,$sql) or die(mysqli_error());
	$info=mysqli_fetch_array($mu);
        
        $accesse_id=$info['accesse_id'];
        $genbank_id=$info['genbank_id'];	
	$locus_name=$info['locus_name'];
	$alias=$info['alias'];
        $species=$info['species'];
        $role=$info['hormone_role'];
        $effect=$info['effect'];
        $gene_evidence=$info['gene_evidence'];
	$plant_name=$_POST['plant_name'];
	
	// Add a gene to gene_hormone_plant
	$sql="INSERT INTO gene_hormone_plant (accesse_id,genbank_id,locus_name,alias,hormone,plant_name) VALUES ('$accesse_id','$genbank_id','$locus_name','$alias','$hormone','$plant_name')";
	$mu=mysqli_query($conn,$sql) or die(mysqli_error());
	// Update the evidence of the gene
	$sql="UPDATE gene_hormone_info SET evidence='' WHERE id='$_POST[addGeneID]' ";
	$mu=mysqli_query($conn,$sql) or die(mysqli_error());
}
else{
	$locus_name=$_GET['locus_name'];
	$locus_name=($locus_name=='-') ? '' : $locus_name;

	$alias=$_GET['alias'];
	$alias=($alias=='-') ? '' : $alias;

	$plant_name=$_GET['plant_name'];
       
        $accesse_id=$_GET['accesse_id'];
        $accesse_id=($accesse_id=='-') ? '' : $accesse_id;

}



?>

<form name="form1" method="post" action="check_mg2h2p.php" onsubmit="return checksubmit()">
<table width="80%" border="0" align="center">
	<tr>
		<th colspan="2" align="left"><font size="6">Genotype information for <I><U><?php echo $plant_name; ?></U></I></font>
		<input type="hidden" name="plant_name" value="<?php echo $plant_name; ?>">
		</th>
	</tr>
<?php
// Get gene_hormone_plant information	
		$sql="SELECT id,locus_name,alias,mutated_site FROM gene_hormone_plant WHERE plant_name='$plant_name' AND accesse_id = '$accesse_id' AND hormone='$hormone'";
		$mu=mysqli_query($conn,$sql) or die(mysqli_error());
		$info=mysqli_fetch_array($mu);

		// the id of an entry in the gene_hormone_plant table
		echo "<input type='hidden' name='id1' value='$info[id]'>";
		// Locus_name
		echo "<tr>
				<td align='left' witdh='20%'>Locus name</td>
				<td>$info[locus_name]
					<input type='hidden' name='locus_name' value='$info[locus_name]'>
				</td>
			</tr>";
		// Alias
		echo "<tr>
				<td align='left' witdh='20%'>Alias</td>
				<td>$info[alias]
					<input type='hidden' name='alias' value='$info[alias]'>
				</td>
			</tr>";			
		// mutated_site
		echo "<tr>
				<td align='left' witdh='20%'>Mutated site</td>
				<td>
					<input type='text' name='mutated_site' value=\"$info[mutated_site]\" size='60'>
				</td>
			</tr>";	
			
		echo "<tr>
				<th colspan='2'>
					<input type='Submit' name='next' value='Submit'>
				</th>
			</tr>";

		echo "<tr>
				<th colspan='2'>
					&nbsp;
				</th>
			</tr>";			
			
// Get gene_hormone_info information
		$sql="SELECT * FROM gene_hormone_info WHERE accesse_id='$accesse_id' AND hormone='$hormone' and 
evidence<>'GO'";
		$mu=mysqli_query($conn,$sql) or die(mysqli_error());
		$info=mysqli_fetch_array($mu);
		
		// the id of an entry in the gene_hormone_info table
		echo "<input type='hidden' name='id2' value='$info[id]'>";
		echo "<tr>
				<th colspan='2' align='left'>Gene information</th>
			</tr>";
		
                // accesse_id
                echo "<tr>
                                <td class=contentB>accesse_id</td>
                                <td class=content>$info[accesse_id]
                                        <input type='hidden' name='accesse_id' value='$info[accesse_id]'>
                                </td>
                        </tr>";

                // genbank_id
                echo "<tr>
                                <td class=contentB>genbank_id</td>
                                <td class=content>$info[genbank_id]
                                        <input type='hidden' name='genbank_id' value='$info[genbank_id]'>
                                </td>
                        </tr>";
                
                // species
                echo "<tr>
                                <td class=contentB>species</td>
                                <td class=content>$info[species]
                                        <input type='hidden' name='species' value='$info[species]'>
                                </td>
                        </tr>";

		// Locus_name
		echo "<tr>
				<td class=contentB>Locus name</td>
				<td class=content>$info[locus_name]
					<input type='hidden' name='locus_name' value='$info[locus_name]'>
				</td>
			</tr>";
		// Alias
		echo "<tr>
				<td class=contentB>Alias</td>
				<td class=content>$info[alias]
					<input type='hidden' name='alias' value='$info[alias]'>
				</td>
			</tr>";	
		// Hormone
		echo "<tr>
				<td class=contentB>Effect</td>
				<td class=content>$info[effect]
                                        <input type='hidden' name='effect' value='$info[effect]'>
                                </td>
			</tr>";
		// Hormone role
		echo "<tr>
				<td class=contentB>Role</td>
				<td class=content>
					$info[hormone_role]
					<input type='hidden' name='hormone_role' value='$info[hormone_role]'>
				</td>";
		echo "</tr>";
                
                echo "<tr>
                                <td class=contentB>evidence</td>
                                <td class=content>
                                        $info[gene_evidence]
                                        <input type='hidden' name='gene_evidence' value='$info[gene_evidence]'>
                                </td>";
                echo "</tr>";
		
		// Gene description
		echo "<tr>
				<td class=contentB>Gene description</td>
				<td class=content>$info[gene_description]
					<input type='hidden' name='gene_description' value='$info[gene_description]'>
				</td>
			</tr>";						
		// Pubmed ID
		echo "<tr>
				<td class=contentB>Pubmed ID</td>
				<td class=content>$info[pmid]
					<input type='hidden' name='pmid' value='$info[pmid]' size='60'>
				</td>
			</tr>";	
		echo "<tr>	
				<th colspan='2' align='left'><a href='mg2h.php?id=$info[id]'>( Modify gene information )</a></th>	
			</tr>";									
?>	
</table>


<table width="80%" border="0" align="center">	
	
</table>

</form>
</body>
</html>


<?php
function print_options($options,$default){
	for($i=0;$i<sizeof($options);$i++){
			$value=$options[$i];
			if(ereg("^-+$",$value)){
				$value="";
			}
			if($options[$i]==$default){
				echo "<option selected value='$value'>$options[$i]</option>";
			}
			else{
				echo "<option value='$value'>$options[$i]</option>";
			}
	}
}
?>


<script language="javascript">
	function checksubmit(){
		if(form1.locus_name.value==""){
			alert("Please input Locus name!")
			form1.locus_name.value="Unclone"
			form1.locus_name.select()
			return false
		}
		else{
			return ture
		}
	}
</script>
