<?php

require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>

<?php

$speciesname=$_GET["speciesname"];
$sql="select distinct locus_name, species, hormone_role, effect, gene_evidence, pmid, genbank_id, accesse_id, alias FROM gene_hormone_info WHERE species = '$speciesname' ORDER by locus_name, genbank_id, alias";
$result=mysqli_query($conn,$sql) or die;
$re_num=mysqli_num_rows($result);
global $ref;
?>

<?php

if( isset($_GET['listall']) ){
	$listall = intval( $_GET['listall'] );   
}
else{
	$listall = 1;
} 

// obtain the current page
if( isset($_GET['page']) ){
	$page = intval( $_GET['page'] );
}
else{
	$page = 1;
}
$page_size=20;

echo "<div style='height:820px;width:1260px;overflow-y:scroll;overflow-x:hidden'><P class='header'>Here are <font color='#FF0000'>$re_num</font> result(s).</P><table border=0 width=90% bgcolor=black cellspacing=1  align='center' style='table-layout:fixed'>";

$count=1;
if ($listall==0){
//echo "<form name='form1' id='form1' method='post' action='getseqtoweblab.php'>";
//echo "<tr>
//
//	<td class=header2C width='5%'></td>
//	<td class=header2C width='20%'>Locus</td>
//	<td class=header2C width='15%'>Species</td>
//	<td class=header2C width='20%'>Function</td>
//	<td class=header2C width='10%'>Effect</td>
//	<td class=header2C width='25%'>Evidence</td>
//	<td class=header2C width='10%'>Sequence</td>
//      </tr>";

    echo "<tr>

	<td class=header2C width='20%'>Locus</td>
	<td class=header2C width='15%'>Species</td>
	<td class=header2C width='20%'>Function</td>
	<td class=header2C width='10%'>Effect</td>
	<td class=header2C width='25%'>Evidence</td>
      </tr>";

while ($info=mysqli_fetch_array($result)){

	$pmid=explode(";",$info[5]);
	for($i=0;$i<count($pmid);$i++){
		if($pmid[$i]!=""){
			$ref=$ref."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[$i] target=_blank>$pmid[$i];</a>";
		}
	}
	$bgcolor = ($count % 2)==1 ? '#ededed' : 'white';	
	echo "<tr bgcolor=$bgcolor>";

//	echo "<td width='5%' > <input type='checkbox' name='item_$info[7]' value='$info[7]'></input></td>";
	
	if ($info[0] != "UNCLONE"){
	echo "<td width='20%'><a href='get_gene_detail.php?AI=$info[7]'>$info[0]</a></td>";}  // show locus_name
	elseif ($info[6] == ""){
        echo "<td width='20%'><a href='get_gene_detail.php?AI=$info[7]'>$info[8]</a></td>";}  // show alias
        else {echo "<td width='20%'><a href='get_gene_detail.php?AI=$info[7]'>$info[6]</a></td> ";} // if no locus_name,show genbank_id
    echo "<td width='15%'><i>$info[1]</i></td>";
    $char_info=$info[2][strlen($info[2])-1];
	if($char_info==":"){$fun_array=explode(":",$info[2]); $fun=$fun_array[0];}
    else{$fun=$info[2];}
	echo "	<td width='20%' >$fun</td>
	
		<td width='10%'>$info[3]</td>";
	
	$gene_evidence_num_array=explode(");",$info[4]);
	$real_gene_evidence="";
	
	for($j=0;$j<count($gene_evidence_num_array);$j++){	
	$gene_evidence_array=explode("(",$gene_evidence_num_array[$j]);
	if($real_gene_evidence!=""){$real_gene_evidence=$real_gene_evidence."; ".$gene_evidence_array[0];}
	else{$real_gene_evidence=$gene_evidence_array[0];}
    }
	echo "<td width='25%'>$real_gene_evidence</td>";
//	echo "<td width='10%'><select name='$info[7]' style='width:100%; height:100%'><option value='mRNA'>mRNA</option><option value= 'CDS'>CDS</option><option value='Protein'>Protein</option><option value= 'Genomic'>Genomic</option></select></td>";
echo "</tr>";
        
	$ref="";
	$count++;
   }

//echo "<tr><td colspan=7 bgcolor='white' class=r> <input type='submit' value='submit to WebLab'>&nbsp;<a href='/help/weblab.php'><img src='image/help.gif' width='15' height='15' border='0'/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='reset' value='Reset'></td></tr></form>";
echo "</table></div></td></tr><tr><td colspan='2' class=c> <hr color='#006600' size='2' width='100%'><B>&copy;&nbsp;Center for Bioinformatics(<a href='http://www.cbi.pku.edu.cn' target='_blank'>CBI</a>), Peking University</B></td></tr></table></body></html>";

exit(); 	

}

if( $re_num ){
   if( $re_num <=$page_size ){ $page_count = 1; }               //$re_num<pagesize, only one page
   if( $re_num % $page_size ){                                  //$re_num%page_size not 0,page wiil be
       $page_count = (int)($re_num / $page_size) + 1;           
   }
   else{
       $page_count = $re_num / $page_size;       //$re_num%page=0
   }
}


//echo "<form name='form1' id='form1' method='post' action='getseqtoweblab.php'>";
//echo "<tr>
//	<td class=header2C width='5%'></td>
//	<td class=header2C width='20%'>Locus</td>
//	<td class=header2C width='15%'>Species</td>
//	<td class=header2C width='20%'>Function</td>
//	<td class=header2C width='10%'>Effect</td>
//	<td class=header2C width='25%'>Evidence</td>
//	<td class=header2C width='10%'>Sequence</td>
//      </tr>";

echo "<tr>

	<td class=header2C width='20%'>Locus</td>
	<td class=header2C width='15%'>Species</td>
	<td class=header2C width='20%'>Function</td>
	<td class=header2C width='10%'>Effect</td>
	<td class=header2C width='25%'>Evidence</td>
      </tr>";

$sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE species = '$speciesname' ORDER by locus_name, genbank_id limit ".($page-1)*$page_size .", $page_size";

$re_page=mysqli_query($conn,$sql) or die;
while($info=mysqli_fetch_array($re_page)){

	$pmid=explode(";",$info[5]);
	for($i=0;$i<count($pmid);$i++){
                        if($pmid[$i]!=""){
			$ref=$ref."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[$i] target=_blank>$pmid[$i];</a>";
		}
	}
	$bgcolor = ($count % 2)==1 ? '#ededed' : 'white';	
	echo "<tr bgcolor=$bgcolor>";
//	echo "<td width='5%' > <input type='checkbox' name='item_$info[7]' value='$info[7]'></input></td>";
	if($info[0]!="UNCLONE"){
	echo "<td width='20%'><a href='get_gene_detail.php?AI=$info[7]'>$info[0]</a></td> ";}  // show locus_name
	elseif($info[6] == ""){
        echo "<td width='20%'><a href='get_gene_detail.php?AI=$info[7]'>$info[8]</a></td> ";}  // show alias_name
        else {echo "<td width='20%'><a href='get_gene_detail.php?AI=$info[7]'>$info[6]</a></td> ";} // if no locus_name,show genbank_id
    echo "<td width='15%'><i>$info[1]</i></td>";
    $char_info=$info[2][strlen($info[2])-1];
	if($char_info==":"){$fun_array=explode(":",$info[2]); $fun=$fun_array[0];}
    else{$fun=$info[2];}
	echo "	<td width='20%' >$fun</td>
		
		<td width='10%'>$info[3]</td>";
	
	$gene_evidence_num_array=explode(");",$info[4]);
	$real_gene_evidence="";
	
	for($j=0;$j<count($gene_evidence_num_array);$j++){	
	$gene_evidence_array=explode("(",$gene_evidence_num_array[$j]);
	if($real_gene_evidence!=""){$real_gene_evidence=$real_gene_evidence."; ".$gene_evidence_array[0];}
	else{$real_gene_evidence=$gene_evidence_array[0];}
    }
	echo "<td width='25%'>$real_gene_evidence</td>";
//	echo "<td width='10%'><select name='$info[7]' style='width:100%; height:100%'><option value='mRNA'>mRNA</option><option value= 'CDS'>CDS</option><option value='Protein'>Protein</option><option value= 'Genomic'>Genomic</option></select> </td>
echo "</tr>";
	
	$ref="";
	$count++;
   }
   
//echo "<tr><td colspan=7 bgcolor='white' class=r> <input type='submit' value='submit to WebLab'>&nbsp;<a href='/help/weblab.php'><img src='image/help.gif' width='15' height='15' border='0'/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='reset' value='Reset'></td></tr></form>";
echo "</table>";
  
   
if($page_count>1){

	$speciesname=str_replace(" ","_",$speciesname);

	echo "<p ><div align='right'>";
	$getpageinfo = page($page, $re_num, "", $page_size, 5, $speciesname);
	echo $getpageinfo['pagecode'];
	echo "</div></p></div></td></tr><tr><td colspan='2' class=c> <hr color='#006600' size='2' width='100%'><B>&copy;&nbsp;Center for Bioinformatics(<a href='http://www.cbi.pku.edu.cn' target='_blank'>CBI</a>), Peking University</B></td></tr></table></body></html>";}

else{
	echo "</div></p></div></td></tr><tr><td colspan='2' class=c> <hr color='#006600' size='2' width='100%'><B>&copy;&nbsp;Center for Bioinformatics(<a href='http://www.cbi.pku.edu.cn' target='_blank'>CBI</a>), Peking University</B></td></tr></table></body></html>";

}
?>

<?php

function page($page,$total,$phpfile,$pagesize,$pagelen,$speciesname){
    
    $speciesname=str_replace("_","%20",$speciesname);
	
    $pagecode = '';
    $page = intval($page);
    $total = intval($total);
    if(!$total) return array();
    $pages = ceil($total/$pagesize);
    
    if($page<1) $page = 1;
    if($page>$pages) $page = $pages;
    
    $offset = $pagesize*($page-1);
    
    $init = 1;
    $max = $pages;
    $pagelen = ($pagelen%2)?$pagelen:$pagelen+1;
    $pageoffset = ($pagelen-1)/2;
    
    
    $pagecode='<div class="page">';
    $pagecode.="<span>$page/$pages <a href=browse_species.php?speciesname=".$speciesname."&listall=0>List All</a></span>";
    if($page!=1){
        $pagecode.="<a href=browse_species.php?speciesname=".$speciesname."&page=1>&lt;&lt;</a>";
        $pagecode.="<a href=browse_species.php?speciesname=".$speciesname."&page=".($page-1).">&lt;</a>";
    }
    
    if($pages>$pagelen){
        
        if($page<=$pageoffset){
            $init=1;
            $max = $pagelen;
        }else{
            
            if($page+$pageoffset>=$pages+1){
                $init = $pages-$pagelen+1;
            }else{
                
                $init = $page-$pageoffset;
                $max = $page+$pageoffset;
            }
        }
    }
    
    for($i=$init;$i<=$max;$i++){
        if($i==$page){
            $pagecode.='<span>'.$i.'</span>';
        } else {
            $pagecode.="<a href=browse_species.php?speciesname=".$speciesname."&page={$i}>$i</a>";
        }
    }
    if($page!=$pages){
        $pagecode.="<a href=browse_species.php?speciesname=".$speciesname."&page=".($page+1).">&gt;</a>";
        $pagecode.="<a href=browse_species.php?speciesname=".$speciesname."&page=$pages>&gt;&gt;</a>";
    }
    $pagecode.='</div>';
    return array('pagecode'=>$pagecode,'sqllimit'=>' limit '.$offset.','.$pagesize);
}

?>
