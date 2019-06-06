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
require ('dbconnect.php');
include("head.php");


// process data from GET methods
// Delete a gene in gene_hormone_plant
if($_GET['delete']=="yes"){
        $name=trim( $_SESSION['username'] );      
        
        $sql="SELECT * FROM member WHERE name='$name'";
        $re=mysql_query($sql);
        $info=mysqli_fetch_array($re);
        $hormone="$info[0]";

        $plant_name=$_GET['plant_name'];
        $locus_name=$_GET['locus_name']; 
//      $alias=$_GET['alias'];
        $accesse_id=$_GET['accesse_id'];

	$sql="DELETE FROM gene_hormone_plant WHERE id=$_GET[deleteid]";
	mysql_query($sql) or die(mysqli_error());
	
	$sql="SELECT accesse_id FROM gene_hormone_plant WHERE accesse_id='$accesse_id'";
	$tmp=mysql_query($sql) or die(mysqli_error());
	if($dt=mysqli_fetch_array($tmp)){
		// the gene is still in the table gene_hormone_plant
		$dontRunany=1;
	}
	else{
		// the gene is not in the table gene_hormone_plant
	        $sql="UPDATE gene_hormone_info SET evidence='other' WHERE accesse_id='$accesse_id' AND hormone='$hormone' AND evidence<>'GO'";
        	mysql_query($sql) or die(mysqli_error());
	}
}
else{
// process data from POST methods
	// Get paramater
	$id1=$_POST['id1'];
	$locus_name=trim( $_POST['locus_name'] );
        $accesse_id=$_GET['accesse_id'];
	$alias=trim( $_POST['alias'] );
	$mutated_site=trim( $_POST['mutated_site'] );
	$plant_name=trim( $_POST['plant_name'] );
	$genbank_id=$_GET['genbank_id'];

        $name=trim( $_SESSION['username'] );

        $sql="SELECT * FROM member WHERE name='$name'";
        $re=mysql_query($sql);
        $info=mysqli_fetch_array($re);
        $hormone="$info[0]";

	if($locus_name==""){
		echo "You did not input Locus name<BR>";
		echo "<a href='dmutant.php'>Back</a>";
		exit;
	}
	
	if($id1){
		// Update gene_hormone_plant
		$sql="UPDATE gene_hormone_plant SET locus_name='$locus_name',alias='$alias',mutated_site='$mutated_site' WHERE id='$id1'";
		mysql_query($sql) or die(mysqli_error());
	}
	else{
		// Insert gene_hormone_plant
		$sql="INSERT INTO gene_hormone_plant (accesse_id,genbank_id,locus_name,alias,hormone,plant_name,mutated_site) VALUES ('$accesse_id','$genbank_id','$locus_name','$alias','$hormone','$plant_name','$mutated_site')";
		mysql_query($sql) or die(mysqli_error());
	}

}

?>


<table width="80%" border="0" align="center">
<?php
$gene_count=1;

print_plant_name($plant_name);
print_genotype($plant_name);
?>

<tr>
	<th><a href='dmutant.php'>OK</a></th>
</tr>
</table>



</body>
</html>



<?php
// print plant name
function print_plant_name($plant_name){
		echo "<tr>";
			// plant_name
			echo "<th colspan='7' bgcolor='#e0e0e0' align='left'>Mutant:&nbsp;<u><I>$plant_name</I></u></th>";
		echo "</tr>";
}
?>


<?php
function print_genotype($plant_name){
	global $conn, $hormone, $count,$gene_count;
		
	$sql="SELECT * 		FROM gene_hormone_plant 
				WHERE hormone='$hormone' and plant_name='$plant_name'
				ORDER BY alias";
	$tmp=mysqli_query($conn,$sql) or die(mysqli_error());
	
	echo "<tr>
			<td>
				<table width='95%' border='0' align='right'>";
	echo "<tr><th colspan='7' align='left' bgcolor='#e0ecff'><font size='1'>Genotype information</font></th></tr>";
	echo "<tr>      
                        <td class=headerC>Accesse id</td>
                        <td class=headerC>Genbank id</td>
			<td class=headerC>Locus id</td>
			<td class=headerC>Alias</td>
                        <td class=headerC>Species</td>			
			<td class=headerC>Mutated site</td>
			<td class=headerC>role</td>
                        <td class=headerC>effect</td>
                        <td class=headerC>evidence</td>
			<td class=headerC>Description</td>
			<td class=headerC>Pubmed</td>
			<td class=headerC>M/D</td>
		</tr>";	
	while($dt=mysqli_fetch_array($tmp)){
		if($dt['locus_name']=='UNCLONE'){
                $sql="SELECT * FROM gene_hormone_info
                                WHERE hormone='$hormone' and accesse_id='$dt[accesse_id]'  and evidence<>'GO'";
        }
                else if($dt['locus_name']!=""){ $sql="SELECT * FROM gene_hormone_info
                                WHERE hormone='$hormone' and  accesse_id='$dt[accesse_id]'  and evidence<>'GO'";}
                $generesult=mysqli_query($conn,$sql) or die(mysqli_error());
                $gene=mysqli_fetch_array($generesult);

                if($dt['accesse_id']==""){
                        $dt['accesse_id']="-";
                }
                if($dt['genbank_id']==""){
                        $dt['genbank_id']="-";
                }
                if($dt['locus_name']==""){
                        $dt['locus_name']="-";
                }

                if($dt['alias']==""){
                        $dt['alias']="-";
                }

                if($dt['mutated_site']==""){
                        $dt['mutated_site']="-";
                }
                if($gene['gene_evidence']==""){
                        $gene['gene_evidence']="-";
                }
                if($gene['effect']==""){
                        $gene['effect']="-";
                }
                if($gene['species']==""){
                        $gene['species']="-";
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
                        $gene['pmid']=$gene['pmid'];
                }
               
                echo "<tr>
                                <td class=content>$dt[accesse_id]</td>
                                <td class=content>$dt[genbank_id]</td>
                                <td class=content>$dt[locus_name]</td>
                                <td class=content>$dt[alias]</td>
                                <td class=content>$gene[species]</td>
                                <td class=content>$dt[mutated_site]</td>
                                <td class=content>$gene[hormone_role]</td>
                                <td class=content>$gene[effect]</td>
                                <td class=content>$gene[gene_evidence]</td>
                                <td class=content>$gene[gene_description]</td>
                                <td class=content>$gene[pmid]</td>		
				<td class=bb>
					<a href='mg2h2p.php?accesse_id=$dt[accesse_id]&plant_name=$plant_name'>M</a>&nbsp
					<a href=\"javascript:showhide('gene$gene_count');\">D</a>
				</td>

				<td id='gene$gene_count' style=\"display: none;\">
					<a href='check_mg2h2p.php?plant_name=$plant_name&deleteid=$dt[id]&delete=yes&accesse_id=$dt[accesse_id]'>Yes<BR></a>
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


<script language="JavaScript">
function showhide( child_id )
{
	if ( document.getElementById(child_id).style.display == "none" )
	{
		document.getElementById(child_id).style.display = "block";
	}
	else
	{
		document.getElementById(child_id).style.display = "none";
	}
}
</script>
