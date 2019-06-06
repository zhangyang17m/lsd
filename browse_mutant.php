<?php

require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>

<?php

$sql="select distinct * FROM plant_info ORDER by plant_name";
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

echo "<div style='height:820px;width:760px;overflow-y:scroll;overflow-x:hidden'><P class='header'>Here are <font color='#FF0000'>$re_num</font> senescence-related mutants in Leaf Senescence DataBase.</P><table border=0 width=90% bgcolor=black cellspacing=1  align='center' style='table-layout:fixed'>";

$count=1;

if($listall == 0){

echo "<tr>
	<td class=header2C width=45%>Mutant</td>
	<td class=header2C width=20%>Ecotype</td>
	<td class=header2C width=25%>Mutagenesis type</td>
	<td class=header2C width=10%>Dominance</td>
	
      </tr>";

while($info=mysqli_fetch_array($result)){

	$pmid=explode(";",$info[4]);
	for($i=0;$i<count($pmid);$i++){
		if($pmid[$i]!=""){
			$ref=$ref."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[$i] target=_blank>$pmid[$i];</a>";
		}
	}
	
	$bgcolor = ($count % 2)==1 ? '#ededed' : 'white';	
	echo "<tr bgcolor=$bgcolor>";
	
	echo "<td width=45%><a href='get_mutant_detail.php?MI=$info[0]'>$info[0]</a></td> ";
	echo "<td width=20%>$info[1]</td>
	      <td width=25% >$info[2]</td>
	      <td width=10%>$info[3]</td></tr>";
	
	$count++;
}

echo"</table></div><tr><td colspan='2' class=c> <hr color='#006600' size='2' width='100%'><B>&copy;&nbsp;Center for Bioinformatics(<a href='http://www.cbi.pku.edu.cn' target='_blank'>CBI</a>), Peking University</B></td></tr></body></html>";

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
        <td class=header2C width=45%>Mutant</td>
        <td class=header2C width=20%>Ecotype</td>
        <td class=header2C width=25%>Mutagenesis type</td>
        <td class=header2C width=10%>Dominance</td>
        
      </tr>";

$sql="select distinct * FROM plant_info ORDER by plant_name limit ".($page-1)*$page_size .", $page_size";
$re_page=mysqli_query($conn,$sql) or die;

while($info=mysqli_fetch_array($re_page)){

        $pmid=explode(";",$info[4]);
        for($i=0;$i<count($pmid);$i++){
                if($pmid[$i]!=""){
                        $ref=$ref."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[$i] target=_blank>$pmid[$i];</a>";
                }
        }

        $bgcolor = ($count % 2)==1 ? '#ededed' : 'white';
        echo "<tr bgcolor=$bgcolor>";

        echo "<td width=45%><a href='get_mutant_detail.php?MI=$info[0]'>$info[0]</a></td> ";
        echo "<td width=20%>$info[1]</td>
              <td width=25% >$info[2]</td>
              <td width=10%>$info[3]</td></tr>";

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
        $pagecode.="<span>$page/$pages <a href=browse_mutant.php?listall=0>List All</a></span>";

        if($page!=1){
                $pagecode.="<a href=browse_mutant.php?page=1>&lt;&lt;</a>";
                $pagecode.="<a href=browse_mutant.php?page=".($page-1).">&lt;</a>";
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
                        $pagecode.="<a href=browse_mutant.php?page={$i}>$i</a>";
                }
        }
        if($page!=$pages){
                $pagecode.="<a href=browse_mutant.php?page=".($page+1).">&gt;</a>";
                $pagecode.="<a href=browse_mutant.php?page=$pages>&gt;&gt;</a>";
        }
        $pagecode.='</div>';
        return array('pagecode'=>$pagecode,'sqllimit'=>' limit '.$offset.','.$pagesize);
}

?>

