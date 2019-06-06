<?php
function savepmid($pmid){
	$pmid=trim($pmid);
	
	if(preg_match("^PMID",$pmid)){
		$pmid=preg_replace("PMID:\ +","PMID:",$pmid);
		$pmid=preg_replace("PMID:","",$pmid);
		$pmid=preg_replace("\ +",";",$pmid);	# Don't use \s !!!here \s means "s"
	}
	elseif(preg_match("^[0-9]+",$pmid)){
		$pmid=preg_replace("\s+",";",$pmid);
	}
	
	return $pmid;
}
?>

<?php
function outpmid($pmid){
	if(preg_match("^[0-9]+",$pmid)){
		$tmp = explode(";",$pmid);
		$pmid="";
		while(list($key,$value)=each($tmp)){
			if($pmid==""){
				$pmid="<a href='http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$value' target='_blank'>$value</a>";
			}
			else{
				$pmid="$pmid;<a href='http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$value' target='_blank'>$value</a>";
			}
		}
	}
	
	return $pmid;
}
?>


<?php
function outgenbank_id($genbank_id){
        
           $genbank_id="<a href='http://www.ncbi.nlm.nih.gov/nuccore/$genbank_id' target='_blank'>$genbank_id</a>";
                   
                
        

        return $genbank_id;
}
?>

<?php
function outlocus_name($locus_name){

           $locus_name="<a href='http://www.arabidopsis.org/servlets/TairObject?name=$locus_name&type=locus' target='_blank'>$locus_name</a>";


        return $locus_name;
}
?>



<?php
function print_basic($plant_name){
		global $conn, $hormone, $count;
		
		$sql="SELECT * 
				FROM plant_info 
				WHERE plant_name='$plant_name'";
		$tmp=mysqli_query($conn,$sql);
		echo "<tr>
				<td>
					<table width='95%' border='0' align='right'>";

		echo "<tr bgcolor='#e0ecff'>
						<th colspan='5' align='left'>
							Basic information
						</th>";		
		echo "	<th align='right'>
							<a href='mbasic.php?id=$plant_name' target='_blank'>Modify</a>
						</th>";
		echo "</tr>";
		
		echo "<tr>
				<td class=headerC>Plant type</td>
				<td class=headerC>Ecotype</td>
				<td class=headerC>Mutagenesis type</td>			
				<td class=headerC>Dominant/recessive</td>
				<td class=headerC>Comment</td>
				<td class=headerC>Pubmed</td>
			</tr>";		
		while($dt=mysqli_fetch_array($tmp)){
			if($dt['ecotype']==""){
				$dt['ecotype']="-";
			}
			if($dt['mutagenesis_type']==""){
				$dt['mutagenesis_type']="-";
			}
			if($dt['dominant_recessive']==""){
				$dt['dominant_recessive']="-";
			}
			if($dt['comment']==""){
				$dt['comment']="-";
			}
			if($dt['pmid']==""){
				$dt['pmid']="-";
			}
			else{
				$dt['pmid']=outpmid($dt['pmid']);
			}
			echo "<tr>
					<td class=content>$dt[plant_type]</td>
					<td class=content>$dt[ecotype]</td>
					<td class=content>$dt[mutagenesis_type]</td>
					<td class=content>$dt[dominant_recessive]</td>
					<td class=content>$dt[comment]</td>
					<td class=content>$dt[pmid]</td>
				</tr>";	
		}
		echo "		</table>
				</td>
			</tr>";
}
?>

<?php
// print plant name
function print_plant_name($plant_name,$sure){
		global $conn, $hormone, $count;

		$pname="name".$count;
		$sname="s".$count;
		
		$bcol_1 = ($count % 1)==0 ? '#e0e0e0' : 'white';
		echo "<table width='80%' border='0' align='center' bgcolor='$bcol_1'>";
		echo "<tr>";
		// count
		echo "<th width='5%'>$count</th>";
		// plant_name
		echo "<th width='60%' align='left'><img src='image/minus.gif' title='Show' id='img_$count' 
onclick=\"showhide('$plant_name','img_$count');\">  <u><I>$plant_name</I></u></th>";
		echo "<input type='hidden' name='$pname' value='$plant_name'>";
		// Sure or unsure?
		if($sure=="no"){
			echo "<th width='20%' align='right'>
					<input type='radio' name='$sname' value='no' checked>Unsure
					<input type='radio' name='$sname' value='yes'>Sure
				</th>";
		}
		if($sure=="yes"){
			echo "<th width='20%' align='right'>
					<input type='radio' name='$sname' value='no'>Unsure
					<input type='radio' name='$sname' value='yes' checked>Sure
				</th>";
		}
		
		echo "<th align='right'>
				<a href=\"mpname.php?plant_name=$plant_name\">Modify</a>&nbsp;
				<a href=\"javascript:showhide('m_$plant_name');\">Delete</a>
			</th>";	

		echo "<td id='m_$plant_name' style=\"display: none;\">
					<a href='dmutant.php?plant_name=$plant_name&delete=yes'>Yes<BR></a>
					<a href=\"javascript:showhide('m_$plant_name');\">No</a>
				</td>";

		echo "</tr>";
		echo "</table>";
}

?>



<?php
function print_genotype($plant_name){
	global $conn, $hormone, $count,$gene_count;
		
	$sql="SELECT *  FROM gene_hormone_plant 
				WHERE hormone='$hormone' and plant_name='$plant_name'
				ORDER BY alias";
	$tmp=mysqli_query($conn,$sql) or die(mysqli_error());
	
	echo "<tr>
			<td>
				<table width='95%' border='0' align='right'>";
				// All information is in this table
	echo "<tr>
			<th colspan='5' align='left' bgcolor='#e0ecff' border='0'>Genotype information</td>
			<th colspan='7' align='right' bgcolor='#e0ecff' border='0'><a href='Ag2h2p.php?plant_name=$plant_name'>Add a gene<a></th>
		</tr>";
	echo "<tr>      
                        <td class=headerC>Accesse id</td>
                        <td class=headerC>Genbank id</td>
			<td class=headerC>Locus ID</td>
			<td class=headerC>Alias</td>
                        <td class=headerC>Species</td>			
			<td class=headerC>Mutated site</td>
			<td class=headerC>Role</td>
                        <td class=headerC>effect</td>
                        <td class=headerC>evidence</td>
			<td class=headerC>Description</td>
			<td class=headerC>Pubmed</td>
			<td class=headerC>M/D</td>
		</tr>";	
	while($dt=mysqli_fetch_array($tmp)){
                if($dt['locus_name']=='UNCLONE'){
		$sql="SELECT * FROM gene_hormone_info
				WHERE hormone='$hormone' and accesse_id='$dt[accesse_id]' AND alias = '$dt[alias]' and evidence<>'GO'";
	}
                else if($dt['locus_name']!=""){ $sql="SELECT * FROM gene_hormone_info
                                WHERE hormone='$hormone' and accesse_id='$dt[accesse_id]' AND alias = '$dt[alias]' and evidence<>'GO'";}
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
                        $gene['pmid']=outpmid($gene['pmid']); 
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
				<td class=content align='right'>
					<a href='mg2h2p.php?accesse_id=$dt[accesse_id]&alias=$dt[alias]&plant_name=$plant_name' target='_blank'>M</a>&nbsp
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


<?php
function print_phenotype($plant_name){
	global $conn, $hormone, $count;

	$sql="SELECT organ,attribute,has_hormone,phenotype_desc 
				FROM phenotype 
				WHERE hormone='$hormone' and plant_name='$plant_name'
				ORDER BY organ,id";
	$tmp=mysqli_query($conn,$sql);
	while($dt=mysqli_fetch_array($tmp)){
		$mutant[$dt['organ']][$dt['attribute']][$dt['has_hormone']] = $dt['phenotype_desc'];
	}
	
	echo "<tr>
			<td>
				<table width='95%' border='0' align='right'>";
	// No phenotype data
	if(sizeof($mutant)==0){
		echo "<tr bgcolor='#e0ecff'>
						<th colspan='3' align='left'>
							No phenotype data
						</th>";		
		echo "			<th align='right'>
							<a href='mmutant.php?id=$plant_name' target='_blank'>Modify</a>&nbsp;&nbsp;
						</th>";
		echo "</tr>";
	}
	
	// Has phenotype data
	else{
		// Phenotype information		Modify Delete
		echo "<tr bgcolor='#e0ecff'>
						<th colspan='3' align='left'>
							Phenotype information
						</th>";		
		echo "	<th align='right'>
							<a href='mmutant.php?id=$plant_name' target='_blank'>Modify  </a>&nbsp;&nbsp
							<a href=\"javascript:showhide('pheno$plant_name');\">Delete  </a>
				</th>

				<td id='pheno$plant_name' style=\"display: none;\">
					<a href='check_mmutant.php?plant_name=$plant_name&delete=1&yes=yes'>Yes<BR></a>
					<a href=\"javascript:showhide('pheno$plant_name');\">No</a>
				</td>";

		echo "</tr>";
		
		print "<tr>
			<td class=headerC>Class</td>
			<td class=headerC >Attribute</td>
			<td class=headerC colspan='2'>$hormone Phenotype</td>
			
			</tr>";
		
		$stdorgan=array("Natural senescence","Darkness induced senescence","Nutritional Deficiency induced","Stress induced senescence","Others");
		$tt=array_keys($mutant);
		$tt=mysort($stdorgan,$tt);

		while(list($tmporgan) = each($tt)){
			$bcol = ($num % 2)==0 ? '#e0e0e0' : 'white';
			$num++;
			$rowspan=sizeof($mutant[$tmporgan]);
			$rowcount=1;
			echo "<tr>
                              <td rowspan='$rowspan' class=contentB style='background-color:$bcol'>$tmporgan</td>";

			while(list($tmpA,$value) = each($mutant[$tmporgan])){
				// If exists other description
				if($tmpA=="other"){
					$other=$tmpA;
					$otherdesc=$value[2];
					continue;
				}
				
				if($value[0]==""){
					$value[0] = "-";
				}
				if($value[1]==""){
					$value[1] = "-";
				}
				if($rowcount>1){
					echo "<tr>";
				}

				// print phenotype
				echo "
				<td class=contentB style='background-color:$bcol'>$tmpA</td>
				<td class=content style='background-color:$bcol' colspan='2'>$value[0]</td>

				</tr>";
				$rowcount++;
			}
			
			if($other!=""){
				if($rowcount>1){
					echo "<tr>";
				}
				echo "<td class=contentB style='background-color:$bcol'>$other</td>
						<td class=content style='background-color:$bcol' colspan='2'>$otherdesc</td>
					</tr>";
			}
			
			$other="";
			$otherdesc="";
			
		}
	}
	
	echo "		</table>
			</td>
		</tr>";
}
?>

<?php
function print_phenotype_show($plant_name){

	global $conn, $hormone, $count;

	$sql = "SELECT organ, attribute, has_hormone, phenotype_desc FROM phenotype WHERE plant_name='$plant_name' ORDER BY organ, id";
	$tmp = mysqli_query($conn,$sql);
	while ($dt=mysqli_fetch_array($tmp)){

		$mutant[$dt['organ']][$dt['attribute']][$dt['has_hormone']] = $dt['phenotype_desc'];
	}
	
	echo "<tr><td colspan=2 width='100%'><table width='100%' border='0' align='left'>";
	
	// No phenotype data
	if(sizeof($mutant)==0){
		echo "<tr bgcolor='#E4E8EA'><th align='left'><font size='2'>no phenotype data</font></th></tr>";
	}
	
	// Has phenotype data
	else{
		// Phenotype information		
	
		$stdorgan = array("Natural senescence","Darkness induced senescence","Nutritional Deficiency induced","Stress induced senescence","Others");
		$tt = array_keys($mutant);
		$tt = mysort($stdorgan,$tt);

		while (list($tmporgan) = each($tt)){
			$bcol = ($num % 2)==0 ? '#e0e0e0' : 'white';
			$num++;
			$rowspan=sizeof($mutant[$tmporgan]);
			$rowcount=1;
			echo "<tr><td rowspan='$rowspan' width='30%'  style='background-color:#DDF7DF' bgcolor=$bcol><font size='2'><b>$tmporgan</b></font></td>";

			while(list($tmpA,$value) = each($mutant[$tmporgan])){
				// If exists other description
				if($tmpA=="other"){
					$other=$tmpA;
					$otherdesc=$value[2];
					continue;
				}
				
				if($value[0]==""){
					$value[0] = "-";
				}
				if($value[1]==""){
					$value[1] = "-";
				}
				if($rowcount>1){
					echo "<tr>";
				}

				// print phenotype
				echo "<td width='40%' style='background-color:#E4E8EA' bgcolor=$bcol><a href='phenotypesearchgene.php?organ=$tmporgan&attribute=$tmpA'><font size='2'>$tmpA</font></a></td><td width='30%' style='background-color:#E4E8EA' bgcolor=$bcol><font size='2'>$value[0]</font></td></tr>";
				$rowcount++;
			}
			
			if($other!=""){
				if($rowcount>1){
					echo "<tr>";
				}
				echo "<td width='40%' style='background-color:#E4E8EA' bgcolor=$bcol><font size='2'>$other</font></td><td width='30%' style='background-color:#E4E8EA' bgcolor=$bcol><font size='2'>$otherdesc</font></td></tr>";
			}
			
			$other="";
			$otherdesc="";
			
		}
	}
	
	echo "</table></td></tr>";
}
?>



<?php
function print_geneinfo($sql){

    global $conn,$hormone;
    $count=1;

    $mu=mysqli_query($conn,$sql) or die(mysqli_error());
    if($info=mysqli_fetch_array($mu)){
	echo "<form method=post action='dgene.php'>";
	echo "<tr>
			<td>
				<table width='100%' border='0' align='right'>";
	// Table header
	echo "<tr>		
                       
			<td class=headerC>&nbsp;</td>
                        <td class=headerC>accesse id</td>
                        <td class=headerC>genbank id</td>	
			<td class=headerC>locus name</td>
			<td class=headerC>alias</td>
			<td class=headerC>species</td>
			<td class=headerC>role</td>
                        <td class=headerC>effect</td>
                        <td class=headerC>evidence</td>
			<td class=headerC>gene description</td>
			<td class=headerC>pubmed</td>
			<td class=headerC>M/D</td>
			<td class=headerC>Sure</td>
                        <td class=headerC>Submit user</td>

		</tr>";

	$mu=mysqli_query($conn,$sql) or die(mysqli_error());
	while($info=mysqli_fetch_array($mu)){
                if($info['pmid']==""){
                        $info['pmid']="-";            
                }
                else{
                        $info['pmid']=outpmid($info['pmid']);
                }
	        			
                if($info['genbank_id']==""){
                        $info['genbank_id']="-";
                }
                else{
                        $info['genbank_id']=outgenbank_id($info['genbank_id']);
                }
                
                if($info['locus_name']!="UNCLONE"){
                        
                        $info['locus_name']=outlocus_name($info['locus_name']);
                }

		// Get the id of the record in database
		echo "<input type='hidden' name='id[]' value='$info[id]'>";
		echo "<tr onmouseover=this.bgColor='#e8f4ff';onmouseout=this.bgColor='#ffffff';>
			<td class=contentB>$count</td>
                        <td class=content>$info[accesse_id]</td>
                        <td class=content>$info[genbank_id]</td>
			<td class=content>$info[locus_name]</td>
			<td class=content>$info[alias]</td>
			<td class=content>$info[species]</td>
			<td class=content>$info[hormone_role]</td>
                        <td class=content>$info[effect]</td>
                        <td class=content>$info[gene_evidence]</td>
			<td class=content>$info[gene_description]</td>
			<td class=content style=\"word-break: break-all\">$info[pmid]</td>";

		echo "	<td class=content><a href='mg2h.php?id=$info[id]'>M</a>&nbsp;
				<a href=\"javascript:showhide('$info[id]');\">D</a>
			</td>

				<td id='$info[id]' style=\"display: none;\">
					<a href='check_mg2h.php?deleteid=$info[id]&delete=yes&accesse_id=$info[accesse_id]'>Yes<BR></a>
					<a href=\"javascript:showhide('$info[id]');\">No</a>
				</td>";

		// Sure or unsure?
		if($info[sure]=="no"){
			echo "<td class=content>
					<input type='checkbox' name='sure$info[id]' value='sure'/>

				</td>";
		}
		if($info[sure]=="yes"){
			echo "<td class=content>
					<input type='checkbox' name='sure$info[id]' value='sure'  checked='checked'/>
				</td>";
		}
                
		echo "<td class=content>$info[name]</td></tr>";

	
	
		
		$count++;
	}
	echo "<tr>
			<td colspan='12' align='right'><input type='submit' name='submit' value='Submit'></td>
		</tr>";
	echo "		</table>
		</td>
	</tr>";
	echo "</form>";
    }
}	
?>

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

<?php
function mysort($stander,$sortArray){
	for($i=0;$i<sizeof($sortArray);$i++){
		$key=array_search($sortArray[$i],$stander);
		$out[$sortArray[$i]]=$key;	//$out['apple']=5 $out['orrange']=3

	}
	asort($out);
	
	return $out;	// It's an association. Like hash in perl, not array in perl
}
?>

<?php
function print_number_MG($hormone){
	global $conn;
	$geneChip_more=0;
	
	// Transgenic evidence
        $sql="select count(distinct locus_name) from gene_hormone_plant 
		WHERE plant_name in (select plant_name from plant_info where plant_type='transgenic') AND hormone='$hormone'";
        if($hormone=="ALL hormone"){
	        $sql="select count(distinct locus_name) from gene_hormone_plant 
        	        WHERE plant_name in (select plant_name from plant_info where plant_type='transgenic')";
        }
	$result=mysqli_query($conn,$sql);
	$info=mysqli_fetch_array($result);
	$geneOther=$info[0];

	
	// Mutant evidence
        $sql="select count(distinct locus_name) from gene_hormone_plant 
                WHERE plant_name in (select plant_name from plant_info where plant_type='mutant') AND hormone='$hormone'";
        if($hormone=="ALL hormone"){
                $sql="select count(distinct locus_name) from gene_hormone_plant
                        WHERE plant_name in (select plant_name from plant_info where plant_type='mutant')";                       
        }
	$result=mysqli_query($conn,$sql);
	$info=mysqli_fetch_array($result);
	$geneMutant=$info[0];
	
	
	// GO annotation evidence
	$sql="select count(distinct locus_name) from gene_hormone_info where hormone='$hormone' AND evidence='GO'";
	if($hormone=="ALL hormone"){
		$sql="select count(distinct locus_name) from gene_hormone_info where hormone like '%' AND evidence='GO'";
	}
	$result=mysqli_query($conn,$sql);
	$info=mysqli_fetch_array($result);
	$geneGO=$info[0];	

	// Genetic + GO evidence
	$sql="select count(distinct locus_name) from gene_hormone_info where hormone='$hormone' AND evidence<>'other'";
	if($hormone=="ALL hormone"){
                $sql="select count(distinct locus_name) from gene_hormone_info where evidence<>'other'";
        }
        $result=mysqli_query($conn,$sql);
        $info=mysqli_fetch_array($result);
        $geneAll=$info[0];

	// Chip evidence
/*	$sql="select count(distinct locus_name) from gene_hormone_microarray where hormone='$hormone'";
	if($hormone=="ALL hormone"){
		$sql="select count(distinct locus_name) from gene_hormone_microarray where hormone like '%'";
	}
	$result=mysqli_query($conn,$sql);
	$info=mysqli_fetch_array($result);
	$geneChip=$info[0];
	
	// >2 chip ecidence
	$sql="select count(experiment_id) AS num from gene_hormone_microarray where hormone='$hormone' group by locus_name having num>2";
	if($hormone=="ALL hormone"){
		$sql="select count(experiment_id) AS num from gene_hormone_microarray where hormone='$hormone' group by locus_name having num>2";
	}
	$result=mysqli_query($conn,$sql);
	while($info=mysqli_fetch_array($result)){
		$geneChip_more++;
	}
*/	
		
	// hormone	geneLowthroput	geneMutant	geneOther	geneGO	geneChip geneChip_more
	$tmpH = str_replace(" ","%20",$hormone);

	echo "<tr>
				<td class=bb>$hormone</td>

				<td class=bb align='center'><a href=summary.php?hormone=$tmpH&evidence=mutant&number=$geneMutant>$geneMutant</a></td>
				<td class=bb align='center'><a href=summary.php?hormone=$tmpH&evidence=transgenic&number=$geneOther>$geneOther</a></td>
				<td class=bb align='center'><a href=summary.php?hormone=$tmpH&evidence=GeneOntology&number=$geneGO>$geneGO</a></td>
<td class=bb align='center'><a href=summary.php?hormone=$tmpH&evidence=all&number=$geneAll>$geneAll</a></td>";

	// mutant number
/*	$sql="select count(distinct plant_name) from plant_hormone where hormone='$hormone'";
	if($hormone=="ALL hormone"){
		$sql="select count(distinct plant_name) from plant_hormone where hormone like '%'";
	}
	$result=mysqli_query($conn,$sql);
	$info=mysqli_fetch_array($result);
*/	
	echo "</tr>";
	// mutantNumber
//	echo "		<td class=bb align='center'><a href=/cgi-bin/browse_mutant.pl#$hormone>$info[0]</a></td>
//			</tr>";

}

?>

<?php
function print_contact_short($hormone){
	global $conn;
	
	$sql="select * from member where name='$hormone'";
	$result=mysqli_query($conn,$sql);
	$info=mysqli_fetch_array($result);

	echo "$info[name] &nbsp;&nbsp;<a href=\"#$hormone\">($hormone)</a><BR>";

}
?>

<?php
function print_contact($hormone){
	global $conn;
	
	$sql="select * from member where name='$hormone'";
	$result=mysqli_query($conn,$sql);
	$info=mysqli_fetch_array($result);

	echo "<tr>
			<td>
				<table width='100%' border='0' align='right'>";
				
	echo "<tr>
			<td class=header colspan='2' id=\"$hormone\"><p class=header>$hormone: <u>$info[lab]'s Lab</U>&nbsp;<a href=\"#top\">[ top ]</a></p></td>
		</tr>";
		
//	echo "<tr>
//			<td rowspan=3 width=200 class=content>";
//			if($info['photo']==""){
//				echo "no photo";
//			}
//			else {
//				echo "<img width=200 src=$info[photo]>";
//			}
// echo photo-----------------------------
	echo "<tr>";			
//	echo "<td class=bb id=\"$info[name]\">$info[name]</td>";
	echo "<td class=bb><a href='mailto:$info[email]'>$info[email]</a></td></tr>";
	$info['interest'] = preg_replace("[\n]+","</li><li>",$info['interest']);
	echo "<tr>
			<td class=bb colspan='3'>
				<B>Research Interests:</B><BR>
				<ul><li>$info[interest]</li></ul>
			</td>
		</tr>";
	$info['paper'] = preg_replace("[\n]+","</li><li>",$info['paper']);
	echo "<tr>
			<td class=bb colspan='3'>
				<B>Selected paper:</b><br>
				<ul><li>$info[paper]</ul></li>
			</td>
			
		</tr>";
				
	echo "		</table>
		</td>
	</tr>";
}
?>

<script language="JavaScript">
function showhide( child_id, img )
{
	var thisImg = document.getElementById(img);
	
	if ( document.getElementById(child_id).style.display == "none" )
	{
		document.getElementById(child_id).style.display = "block";
		thisImg.src = "image/minus.gif";
		thisImg.title = "Hide";
	}
	else
	{
		document.getElementById(child_id).style.display = "none";
		thisImg.src = "image/plus.gif";
		thisImg.title = "Show";
	}
}
</script>
