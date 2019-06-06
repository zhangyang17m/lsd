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
<title>Modify geno information</title>
<link rel="stylesheet" type="text/css" href="/mycss" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<?php
require ('code.php');
require ('dbconnect.php');
include("head.php");

// Get paramater
$id=$_GET['id'];
$name=$_SESSION['username'];
$sql="SELECT * FROM member WHERE name='$name'";
$re=mysql_query($sql);
$info=mysqli_fetch_array($re);
$hormone="$info[0]";


?>

<form name="form1" method="post" action="check_mg2h.php" onsubmit="return checksubmit()">
<table width="80%" border="0" align="center">
	<tr>
		<td class=header2C colspan="2" align="left"><font size="6">Add gene information</font>
		<input type="hidden" name="plant_name" value="<?php echo $plant_name; ?>">
		</td>
	</tr>

<?php
// Get gene_hormone_plant information	
		$sql="SELECT * FROM gene_hormone_info WHERE id='$id'";
		$mu=mysqli_query($conn,$sql) or die(mysqli_error());
		$info=mysqli_fetch_array($mu);

		// the id of an entry in the gene_hormone_info table
		echo "<input type='hidden' name='id' value='$info[id]'>";
		// ACCESSE ID
                echo "<tr>
                                <td class=contentB>Accesse ID</td>
                                <td class=content>
                                        <input type='text' name='accesse_id'  readonly='true' value=\"$info[accesse_id]\">
                                </td>
                        </tr>";
                // Gene Name
                echo "<tr>
                                <td class=contentB>GenBank id</td>
                                <td class=content>
                                        <input type='text' name='genbank_id' value=\"$info[genbank_id]\">
                                </td>
                        </tr>";
                
                
                // Locus_name
		echo "<tr>
				<td class=contentB>Locus name (eg. AT1G05010)</td>
				<td class=content>
					<input type='text' name='locus_name' value=\"$info[locus_name]\">
				</td>
			</tr>";
		// Alias
		echo "<tr>
				<td class=contentB>Alias</td>
				<td class=content>
					<input type='text' name='alias' value=\"$info[alias]\">
				</td>
			</tr>";			

		// Species
		echo "<tr>
				<td class=contentB>Species</td>
				<td class=content>
                                 <input type='text' name='species' value=\"$info[species]\">
                                </td>
			</tr>";

		// Function category
		echo "<tr>
						<td class=contentB>Function category</td>";
		
		$no="--------------------------------------------------";
		$options = array($no,"Chlorophyll degradation","Chlorophyll biosynthesis","Hormone response pathway","Transcription regulation","Signal transduction","Nutrient recycling","Protein degradation/modification","Nucleic acid degradation","Lipid/Carbohydrate metabolism","Redox regulation","Environmental factors","Others");
		if(!$info[hormone_role]){
			echo "<td class=content>";
        	$default=$no;		
		}
		else{
			echo "<td class=content>";
			$default=$info[hormone_role];
		}
		echo "<select name='S_hormone_role' onChange=T_hormone_role.value=this.value>";
		print_options($options,$default);
		echo "</select>";
                if($info[hormone_role]!='')
                {
                   list($info[hormone_role], $info[small_role]) = split (':', $info[hormone_role]);
                }
		echo "<input type='text' name='T_hormone_role'  size='35' value=\"$info[hormone_role]\">";
		
		        
                // small_Function_category
				   
				   echo "\t\tSmall Function category:\t";
				
              //    echo "\t\tSmall Function category:\t<input type='text' name='small_role' value=\"$info[small_role]\" >";
				  $no="------";
                  $options = array($no,"ET","SA","JA","ABA","BR","GA","CK","Auxin");
				  if(!$info[samll_role]){
                    //    echo "<td class=content>";
                        $default=$no;
                  }
                  else{
                  //      echo "<td class=content>";
                        $default=$info[small_role];
                  }
                  echo "<select name='S_small_role' onChange=T_small_role.value=this.value>";
                  print_options($options,$default);
                  echo "</select>";

                  echo "<input type='text' name='T_small_role' value=\"$info[small_role]\">";
				 
				echo "</td>";

                echo "</tr>";
		
		// Gene description
		echo "<tr>
				<td class=contentB>Gene description</td>
				<td class=content>
				<input type='text' name='gene_description' value=\"$info[gene_description]\" size='70'>
				</td>
			</tr>";						
                
                // Gene Effect
                echo "<tr> <td class=contentB>Effect</td>";
                $no="----------------------------------";
                $options = array($no,"promote","delay","unclear");
                 if(!$info[effect]){
                        echo "<td class=content>";
                        $default=$no;
                }
                else{
                        echo "<td class=content>";
                        $default=$info[effect];
                }
                echo "<select name='S_effect' onChange=T_effect.value=this.value>";
                print_options($options,$default);
                echo "</select>";

                echo "<input type='text' name='T_effect' value=\"$info[effect]\">";
                echo "</td>";
                
                echo "</tr>";
                  
                //Gene Evidence
                echo "<tr> <td class=contentB>Evidence</td>";
                $no="----------------------------------";
                $options = array($no,"Genetic evidence:Mutant","Genetic evidence:Transgene","Genetic evidence:QTL","Molecular evidence:RT-PCR","Molecular evidence:Real-Time PCR","Molecular evidence:Northern","Molecular evidence:Y2H","Molecular evidence:SSH","Physiologic evidence:Ion leakage","Physiologic evidence:Fv/Fm","Physiologic evidence:Chl Content","Genomic evidence:microarray data","Proteomic evidence");
                 if(!$info[gene_evidence]){
                        echo "<td class=content>";
                        $default=$no;
                }
                else{
                        echo "<td class=content>";
                        $default=$info[gene_evidence];
                }
                echo "<select name='S_evidence' onChange=T_evidence.value=this.value>";
                print_options($options,$default);
                echo "</select>";

                echo "<input type='text' name='T_evidence' value=\"$info[gene_evidence]\" size='50'>";
                echo "</td>";

                echo "</tr>";
                


 
                // Pubmed ID
		echo "<tr>
				<td class=contentB>Pubmed ID<BR>separate multi reference by ;<P class=warn>eg:10157;29065</p></td>
				<td class=content>
					<input type='text' name='pmid' value=\"$info[pmid]\"  size='70'>
				</td>
			</tr>";	
			
		echo "<tr>
				<td colspan='2' align='right'>
					<input type='reset' value='Reset'>&nbsp;
					<input type='submit' value='Submit'>
				</td>
			</tr>";
				
		echo "<tr><td colspan='2'>";	
		print_g2h2p($info[accesse_id],$info[alias]);	
		echo "</td></tr>";
											
?>	
</table>


<table width="80%" border="0" align="center">	
	
</table>

</form>
</body>
</html>



<?php
function print_g2h2p($accesse_id,$alias){
	global $conn,$hormone;
	$count=1;
	
	$sql="SELECT * FROM gene_hormone_plant WHERE hormone='$hormone' AND accesse_id='$accesse_id' AND alias='$alias'";
	$mu=mysqli_query($conn,$sql) or die(mysqli_error());
	

	echo "<div class='header'>Please note that this gene is related to the following mutants:</div>";
	while($info=mysqli_fetch_array($mu)){
		echo "<div>$info[plant_name]</div>";
		echo "<input type='hidden' name='id$count' value=$info[id]>";

		$count++;
	}
	$geneCount=$count-1;
	echo "<input type='hidden' name='geneCount' value='$geneCount'>";
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
		else if(form1.locus_name.value.toLowerCase()=="unclone"){
			if(form1.alias.value==""){
				alert("Input alias for unclone gene!")
				form1.alias.select()
				return false
			}
		}
		else{
			return ture
		}
	}
</script>
