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
<title>Check genotype information</title>
<link rel="stylesheet" type="text/css" href="/mycss" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<?php
require ('code.php');
require ('dbconnect.php');
include("head.php");

// process data from GET methods
// Delete a gene in gene_hormone_info
if($_GET['delete']=="yes"){
	$accesse_id=$_GET['accesse_id'];
         
        $plant_name=$_GET['plant_name'];
        
        $name=trim($_SESSION['username']);
        $sql="SELECT * FROM member WHERE name='$name'";
        $re=mysql_query($sql);

        $info=mysqli_fetch_array($re);
        $hormone="$info[0]";

	
	$sql="DELETE FROM gene_hormone_info WHERE id=$_GET[deleteid] and evidence<>'GO'";
	mysql_query($sql) or die(mysqli_error());
	$sql="DELETE FROM gene_hormone_plant WHERE accesse_id='$accesse_id' AND hormone='$hormone'";
	mysql_query($sql) or die(mysqli_error());

//	$locus_name=$_GET['locus_name'];
//	$alias=$_GET['alias'];
}
else{
// process data from POST methods
	// Get paramater
	$id=$_POST['id'];
	$geneCount=$_POST['geneCount'];
	
        $species=trim( $_POST['species'] );
        $accesse_id=trim( $_POST['accesse_id'] );
        $genbank_id=trim( $_POST['genbank_id'] );
	$locus_name=trim( $_POST['locus_name'] );
	$locus_name=strtoupper($locus_name);	// upper string
        $effect=trim( $_POST['T_effect'] );	
        $gene_evidence=trim( $_POST['T_evidence'] );       
	$alias=trim( $_POST['alias'] );
	$hormone_role=trim( $_POST['T_hormone_role'] ).":".trim( $_POST['T_small_role'] );
	$gene_description=trim( $_POST['gene_description'] );
     
//	$evidence=trim( $_POST['T_evidence'] );
	
	$pmid=trim( $_POST['pmid'] );
	$pmid=savepmid($pmid);
	
        
        $name=trim($_SESSION['username']);
        $sql="SELECT * FROM member WHERE name='$name'";
        $re=mysql_query($sql);
        $info=mysqli_fetch_array($re);
        $hormone="$info[0]";


	if($locus_name==""&&$genbank_id==""){
		echo "You did not input locus_name or genbank_id<BR>";
		echo "<a href='dmutant.php'>Back</a>";
		exit;
	}
	
	if($id){
                $accesse_id="LSD_".$id;
		// Update gene_hormone_info
		$sql="UPDATE gene_hormone_info SET 
locus_name='$locus_name',alias='$alias',hormone_role='$hormone_role',effect='$effect',gene_evidence='$gene_evidence',gene_description='$gene_description',pmid='$pmid',name='$name',species='$species',accesse_id='$accesse_id',genbank_id='$genbank_id',hormone='$hormone'  WHERE id='$id'";
		mysql_query($sql) or die(mysqli_error());
		
		// Update gene_hormone_plant
		for($i=1;$i<=$geneCount;$i++){
			$id_ghp="id".$i;
			$id_ghp=$_POST[$id_ghp];
			$sql="UPDATE gene_hormone_plant SET accesse_id='$accesse_id',alias='$alias' WHERE id='$id_ghp'";
			mysql_query($sql) or die(mysqli_error());
		}
	
	}
	else{
		// Insert gene_hormone_info
		// check whether input gene exists in the database. if yes--> do not insert again; else --> insert new gene
		if($locus_name=="UNCLONE"){
			if ($alias){
                          $sql="SELECT * FROM gene_hormone_info WHERE accesse_id='$accesse_id' and alias='$alias' and evidence<>'GO' and hormone='$hormone'";
			  $re=mysql_query($sql) or die(mysqli_error());
			  if($result=mysqli_fetch_array($re)){
				  echo "<p class=warn>alias:$alias exist in the database. <BR>Do not add this gene again!</P>";
				  echo "<a href=dgene.php>Back</a>";
				  exit;
		       	  }
		        }
                }
		else{
			$sql="SELECT * FROM gene_hormone_info WHERE accesse_id='$accesse_id' and locus_name='$locus_name' and evidence<>'GO' and hormone='$hormone'";
			$re=mysql_query($sql) or die(mysqli_error());
			if($result=mysqli_fetch_array($re)){
				echo "<p class=warn>locus_name:$locus_name exist in the database. <BR>Do not add this gene again!</P>";
				echo "<a href=dgene.php>Back</a>";
				exit;
			}
			
			if ($alias){
                          $sql="SELECT * FROM gene_hormone_info WHERE accesse_id='$accesse_id' and alias='$alias' and evidence<>'GO' and hormone='$hormone'";
			  $re=mysql_query($sql) or die(mysqli_error());
			  if($result=mysqli_fetch_array($re)){
				  echo "<p class=warn>alias:$alias exist in the database. <BR>Do not add this gene again!</P>";
				  echo "<a href=dgene.php>Back</a>";
				  exit;
			  }
		        }
                }
		
		// Insert new gene
                #$accesse_id="LSD_".$id;
		$sql="INSERT INTO gene_hormone_info (accesse_id,genbank_id,locus_name,alias,name,hormone_role,gene_description,pmid,sure,evidence,species,hormone,effect,gene_evidence) VALUES 
('$accesse_id','$genbank_id','$locus_name','$alias','$name','$hormone_role','$gene_description','$pmid','no','other','$species','$hormone','$effect','$gene_evidence')";
		mysql_query($sql) or die(mysqli_error());
                $sql="select id FROM gene_hormone_info WHERE genbank_id='$genbank_id' and locus_name= '$locus_name'";
                $re=mysql_query($sql) or die(mysqli_error());
                $info=mysqli_fetch_array($re);
                $id=$info[id];
                $accesse_id="LSD_".$id;
                $sql="UPDATE gene_hormone_info SET accesse_id='$accesse_id' WHERE id='$id'";
                mysql_query($sql) or die(mysqli_error());

	} 

}

?>


<table width="80%" border="0" align="center">
<?php
$gene_count=1;

// print information from gene_hormone_info
$sql="SELECT * FROM gene_hormone_info WHERE accesse_id='$accesse_id' AND alias='$alias' AND hormone='$hormone' and evidence<>'GO'";
echo "<tr>
		<th colspan='6'>
			Updated gene information
		</th>
	</tr>";
	
print_geneinfo($sql);

echo "<tr>
		<th colspan='6'>
			<a href='dgene.php'>Back to genes</a>
		</th>
	</tr>";



echo "<tr>
		<th colspan='6' align='left'>
			This gene is related to the following mutants:
		</th>
	</tr>";
$sql="SELECT DISTINCT plant_name from gene_hormone_plant WHERE accesse_id='$accesse_id' AND alias='$alias' AND hormone='$hormone'";
$mu=mysqli_query($conn,$sql) or die(mysqli_error());
while($info=mysqli_fetch_array($mu)){
	print_plant_name2($info[plant_name]);
	print_genotype2($info[plant_name]);

}
?>

<tr>
	<th><a href='dmutant.php'>Back to mutants</a></th>
</tr>
</table>



</body>
</html>



<?php
// print plant name
function print_plant_name2($plant_name){
		echo "<tr>";
			// plant_name
			echo "<th colspan='7' bgcolor='#e0e0e0' align='left'>Mutant:&nbsp;<u><I>$plant_name</I></u></th>";
		echo "</tr>";
}
?>



<?php
function print_genotype2($plant_name){
	global $conn, $hormone, $count,$gene_count;
		
	$sql="SELECT id,accesse_id,genbank_id,locus_name,alias,mutated_site 
				FROM gene_hormone_plant 
				WHERE hormone='$hormone' and plant_name='$plant_name'
				ORDER BY alias";
	$tmp=mysqli_query($conn,$sql) or die(mysqli_error());
	
	echo "<tr>
			<td>
				<table width='95%' border='0' align='right'>";
	echo "<tr><th colspan='7' align='left' bgcolor='#e0ecff'><font size='1'>Genotype information</font></th></tr>";
	echo "<tr>      
                         <td class=headerC>accesse_id</td>
                        <td class=headerC>genbank_id</td>
			<td class=headerC>Locus</td>
			<td class=headerC>Alias</td>			
			<td class=headerC>Mutated site</td>
			<td class=headerC>Hormone role</td>
			<td class=headerC>Description</td>
			<td class=headerC>Pubmed</td>
			<td class=headerC>M/D</td>
		</tr>";	
	while($dt=mysqli_fetch_array($tmp)){
		$sql="SELECT id,hormone_role,gene_description,pmid 
				FROM gene_hormone_info
				WHERE hormone='$hormone' and accesse_id='$dt[accesse_id]' AND alias = '$dt[alias]' and evidence<>'GO'";
		$generesult=mysqli_query($conn,$sql) or die(mysqli_error());
		$gene=mysqli_fetch_array($generesult);
	

		if($dt['locus_name']==""){
			$dt['locus_name']="-";
		}
		if($dt['alias']==""){
			$dt['alias']="-";
		}
		if($dt['mutated_site']==""){
			$dt['mutated_site']="-";
		}
		if($gene['hormone_role']==""){
			$gene['hormone_role']="-";
		}					
		if($gene['gene_description']==""){
			$gene['gene_description']="-";
		}
                if($gene['pmid']==""){
                        $gene['pmid']="-";            
                }
                else{
                        $gene['pmid']=outpmid($gene['pmid']);
                }		
		echo "<tr>     
                                <td class=content>$dt[accesse_id]</td>
                                <td class=content>$dt[genbank_id]</td>
				<td class=content>$dt[locus_name]</td>
				<td class=content>$dt[alias]</td>			
				<td class=content>$dt[mutated_site]</td>
				<td class=content>$gene[hormone_role]</td>
				<td class=content>$gene[gene_description]</td>
				<td class=content>$gene[pmid]</td>
				<td class=content>
					<a href='mg2h2p.php?locus_name=$dt[locus_name]&alias=$dt[alias]&plant_name=$plant_name'>M</a>&nbsp
					<a href=\"javascript:showhide('gene$gene_count');\">D</a>
				</td>

				<td id='gene$gene_count' style=\"display: none;\">
					<a href='check_mg2h2p.php?plant_name=$plant_name&deleteid=$dt[id]&delete=yes&locus_name=$dt[locus_name]'>Yes<BR></a>
					<a href=\"javascript:showhide('gene$gene_count');\">No</a>
				</td>

			</tr>";	
		$gene_count++;		
	}	
	echo "		</table>
			</td>
		</tr>";
}
?>
