<?php

require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>

<?php

$sql="select QTL_accession_id,species,QTL,trait_synonyms,chromosome,pubmed_id from qtl_info";
$result=mysqli_query($conn,$sql) or die;
$re_num=mysqli_num_rows($result);

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

echo "<div style='height:820px;width:760px;overflow-y:scroll;overflow-x:hidden'><P class='header'>Here are <font color='#FF0000'>$re_num</font> result(s).</P><table border=0 width=90% bgcolor=black cellspacing=1  align='center' style='table-layout:fixed'>";

$count=1;
if ($listall==0){
echo "<tr>

        <td class=header2C width='10%'>Locus</td>
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

        if ($info[0] != "UNCLONE"){
        echo "<td width='10%'><a href='get_gene_detail.php?AI=$info[7]'>$info[0]</a></td>";}  // show locus_name
        elseif ($info[6] == ""){
        echo "<td width='10%'><a href='get_gene_detail.php?AI=$info[7]'>$info[8]</a></td>";}  // show alias
        else {echo "<td width='10%'><a href='get_gene_detail.php?AI=$info[7]'>$info[6]</a></td> ";} // if no locus_name,show genbank_id
    echo "<td width='15%'><i>$info[1]</i></td>";
    $char_info=$info[2][strlen($info[2])-1];
        if($char_info==":"){$fun_array=explode(":",$info[2]); $fun=$fun_array[0];}
    else{$fun=$info[2];}
        echo "  <td width='20%' >$fun</td>

                <td width='10%'>$info[3]</td>";

        $gene_evidence_num_array=explode(");",$info[4]);
        $real_gene_evidence="";

        for($j=0;$j<count($gene_evidence_num_array);$j++){
        $gene_evidence_array=explode("(",$gene_evidence_num_array[$j]);
        if($real_gene_evidence!=""){$real_gene_evidence=$real_gene_evidence."; ".$gene_evidence_array[0];}
        else{$real_gene_evidence=$gene_evidence_array[0];}
    }
        echo "<td width='25%'>$real_gene_evidence</td>";
            echo "</tr>";
        $ref="";

        $count++;
   }

   echo "</table></div>
   </td>
   </tr>

   <tr>
        <td colspan='2' class=c> <hr color='#006600' size='2' width='100%'><B>&copy;&nbsp;Center for Bioinformatics(<a 
href='http://www.cbi.pku.edu.cn' target='_blank'>CBI</a>), Peking University</B></td>
   </tr>
</table>
</body>
</html>";
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

?>

<?php

$count=1;
	echo "<tr>
		<td class=header2C width='10%'>QTL id</td>
		<td class=header2C width='20%'>species</td>
		<td class=header2C width='10%'>QTL</td>
		<td class=header2C width='35%'>trait synonyms</td>
		<td class=header2C width='5%'>chr</td>
		<td class=header2C width='20%'>pubmed id</td>
		</tr>";

	$sql="select QTL_accession_id,species,QTL,trait_synonyms,chromosome,pubmed_id from qtl_info limit ".($page-1)*$page_size .", $page_size";
	$re_page=mysqli_query($conn,$sql) or die;
	
	while($info=mysqli_fetch_array($re_page)){

		$pmid=explode(";",$info[5]);
		for($i=0;$i<count($pmid);$i++){
			if($pmid[$i]!=""){
				if ($i > 0) $ref = $ref . "; ";
				$ref=$ref."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[$i] target=_blank>$pmid[$i]</a>";
			}
		}
		$bgcolor = ($count % 2)==1 ? '#ededed' : 'white';	
		echo "<tr bgcolor=$bgcolor>";
		echo "<td width='10%'><a href='http://www.gramene.org/db/qtl/qtl_display?qtl_accession_id=$info[0]' target=\"_blank\">$info[0]</a></td> ";
		echo "<td width='20%'>$info[1]</td>";
		$char_info=$info[2][strlen($info[2])-1];
		if($char_info==":"){$fun_array=explode(":",$info[2]); $fun=$fun_array[0];}
		else{$fun=$info[2];}
		echo "	<td width='10%' >$fun</td>

			<td width='35%'>$info[3]</td>";

		$gene_evidence_num_array=explode(");",$info[4]);
		$real_gene_evidence="";

		for($j=0;$j<count($gene_evidence_num_array);$j++){	
			$gene_evidence_array=explode("(",$gene_evidence_num_array[$j]);
			if($real_gene_evidence!=""){$real_gene_evidence=$real_gene_evidence."; ".$gene_evidence_array[0];}
			else{$real_gene_evidence=$gene_evidence_array[0];}
		}
		echo "<td width='5%'>$real_gene_evidence</td>";
		echo "<td width='20%'>$ref</td></tr>";
		$ref="";

		$count++;

	}

echo "</table>";


if($page_count>1){
	echo "<p ><div align='right'>";
	$getpageinfo =page($page,$re_num,"",$page_size,5);
	echo $getpageinfo['pagecode'];
	echo "</div></p>";
echo "</div></td></tr><tr><td colspan='2' class=c> <hr color='#006600' size='2' width='100%'><B>&copy;&nbsp;Center for Bioinformatics(<a href='http://www.cbi.pku.edu.cn' target='_blank'>CBI</a>), Peking University</B></td></tr></table></body></html>";
}

?>

<?php
function page($page,$total,$phpfile,$pagesize,$pagelen){
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
	$pagecode.="<span>$page/$pages <a href=get_qtl_info.php&listall=0>List All</a></span>";
	if($page!=1){
		$pagecode.="<a href=get_qtl_info.php&page=1>&lt;&lt;</a>";
		$pagecode.="<a href=get_qtl_info.php&page=".($page-1).">&lt;</a>";
	}
	
	if($pages>$pagelen){
		
		if($page<=$pageoffset){
			$init=1;
			$max = $pagelen;
		}
		
		else{
			
			if($page+$pageoffset>=$pages+1){
				$init = $pages-$pagelen+1;
			}
			else{
				
				$init = $page-$pageoffset;
				$max = $page+$pageoffset;
			}
		}
	}
	
	for($i=$init;$i<=$max;$i++){
		if($i==$page){
			$pagecode.='<span>'.$i.'</span>';
		} 
		else {
			$pagecode.="<a href=get_qtl_info.php&page={$i}>$i</a>";
		}
	}
	if($page!=$pages){
		$pagecode.="<a href=get_qtl_info.php&page=".($page+1).">&gt;</a>";
		$pagecode.="<a href=get_qtl_info.php&page=$pages>&gt;&gt;</a>";
	}
	$pagecode.='</div>';
	return array('pagecode'=>$pagecode,'sqllimit'=>' limit '.$offset.','.$pagesize);
}

?>





