<?php

require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>

<?php

$sql="select accesse_id,locus_name,salk_line,allele_mutagen,genotype,soure from ath_mutant_seed";
$result=mysqli_query($conn,$sql) or die;
$re_num=mysqli_num_rows($result);

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
$page_size=30;

echo "<div style='height:820px;width:760px;overflow-y:scroll;overflow-x:hidden'><P class='header'>Here are <font color='#FF0000'>$re_num</font> result(s).&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='/faq/ath_mutant_seed.php'><img src='image/help.gif' width='15' height='15' border='0'/></a></P><table border=0 width=90% bgcolor=black cellspacing=1  align='center' style='table-layout:fixed'>";

$count=1;

if ($listall == 0){
		echo "<tr>
		<td class=header2C width='20%'>locus name</td>
		<td class=header2C width='20%'>SALK line</td>
		<td class=header2C width='20%'>allele mutagen</td>
		<td class=header2C width='20%'>genotype</td>
		<td class=header2C width='20%'>source</td>
		</tr>";

	while($info=mysqli_fetch_array($result)){

		$bgcolor = ($count % 2)==1 ? '#ededed' : 'white';	
		echo "<tr bgcolor=$bgcolor>";
		
		echo "<td width='20%'><a href='get_gene_detail.php?AI=$info[0]'>$info[1]</a></td>";
		echo "<td width='20%'><a href='http://www.arabidopsis.org/servlets/SeedSearcher?action=detail&stock_number=$info[2]' target=\"_blank\">$info[2]</a></td>";
		echo "<td width='20%'>$info[3]</td>";
		echo "<td width='20%'>$info[4]</td>";
		echo "<td width='20%'>$info[5]</td></tr>";
		$ref="";

		$count++;
}

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


        echo "<tr>
                <td class=header2C width='20%'>locus name</td>
                <td class=header2C width='20%'>SALK line</td>
                <td class=header2C width='20%'>allele mutagen</td>
                <td class=header2C width='20%'>genotype</td>
                <td class=header2C width='20%'>source</td>
                </tr>";

$sql="select accesse_id,locus_name,salk_line,allele_mutagen,genotype,soure from ath_mutant_seed limit ".($page-1)*$page_size .", $page_size";
$re_page=mysqli_query($conn,$sql) or die;

while($info=mysqli_fetch_array($re_page)){

$bgcolor = ($count % 2)==1 ? '#ededed' : 'white';
                echo "<tr bgcolor=$bgcolor>";
                echo "<td width='20%'><a href='get_gene_detail.php?AI=$info[0]'>$info[1]</a></td>";
                echo "<td width='20%'><a href='http://www.arabidopsis.org/servlets/SeedSearcher?action=detail&stock_number=$info[2]' target=\"_blank\">$info[2]</a></td>";
                echo "<td width='20%'>$info[3]</td>";
                echo "<td width='20%'>$info[4]</td>";
                echo "<td width='20%'>$info[5]</td></tr>";
                $ref="";

                $count++;
}

echo "</table>";

if($page_count>1){
	
	echo "<p ><div align='right'>";
	$getpageinfo =page($page,$re_num,"",$page_size,5);
	echo $getpageinfo['pagecode'];
	echo "</div></p></div></td></tr><tr><td colspan='2' class=c> <hr color='#006600' size='2' width='100%'><B>&copy;&nbsp;Center for Bioinformatics(<a href='http://www.cbi.pku.edu.cn' target='_blank'>CBI</a>), Peking University</B></td></tr></table></body></html>";

}

else{

	echo "</div></p></div></td></tr><tr><td colspan='2' class=c> <hr color='#006600' size='2' width='100%'><B>&copy;&nbsp;Center for Bioinformatics(<a href='http://www.cbi.pku.edu.cn' target='_blank'>CBI</a>), Peking University</B></td></tr></table></body></html>";

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
	$pagecode.="<span>$page/$pages <a href=get_ath_mutant_seed.php?listall=0>List All</a></span>";
	
	if($page!=1){
		$pagecode.="<a href=get_ath_mutant_seed.php?page=1>&lt;&lt;</a>";
		$pagecode.="<a href=get_ath_mutant_seed.php?page=".($page-1).">&lt;</a>";
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
			$pagecode.="<a href=get_ath_mutant_seed.php?page={$i}>$i</a>";
		}
	}
	if($page!=$pages){
		$pagecode.="<a href=get_ath_mutant_seed.php?page=".($page+1).">&gt;</a>";
		$pagecode.="<a href=get_ath_mutant_seed.php?page=$pages>&gt;&gt;</a>";
	}
	$pagecode.='</div>';
	return array('pagecode'=>$pagecode,'sqllimit'=>' limit '.$offset.','.$pagesize);
}

?>
