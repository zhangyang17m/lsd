<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');
?>


 <div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">

<?php

$sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id FROM gene_hormone_info WHERE evidence<>'GO' ORDER by species,hormone_role";
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

?>


<P class="header">
Here are <font color="#FF0000"><?php echo $re_num?></font> senescence-related genes in Leaf Senescence DataBase.
</P>
<P>
<!--
<ul>
  <li><a href=#GE>Genes identified experimentally</a></li>
  <li><a href=#GO>Genes predicted with homology to known genes</a></li>
</ul>
-->
</P>

<table border=0 width=90% bgcolor=black cellspacing=1  align="center" style="table-layout:fixed"  >

<?php
require ('dbconnect.php');

$count=1;
if ($listall==0){
echo "<tr>
	<td colspan=5><P class=header id=GE>All senescence-related genes supported by genetic evidence (mutant or transgenic study)</P></td>
      </tr>";
echo "<tr>
	<td class=header2C width='10%'>Locus</td>
	<td class=header2C width='15%'>Species</td>
	<td class=header2C width='30%'>Function</td>
	<td class=header2C width='10%'>Effect</td>
	<td class=header2C width='35%'>Evidence</td>
	
      </tr>";

$sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE evidence<>'GO' ORDER by species,hormone_role";
$result=mysqli_query($conn,$sql) or die;
while($info=mysqli_fetch_array($result)){

	$pmid=explode(";",$info[5]);
	for($i=0;$i<count($pmid);$i++){
		if($pmid[$i]!=""){
			$ref=$ref."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[$i] target=_blank>$pmid[$i];</a>";
		}
	}
	$bgcolor = ($count % 2)==1 ? '#ededed' : 'white';	
	echo "<tr bgcolor=$bgcolor>";
	if($info[0]!="UNCLONE"){
	echo "<td width='10%'><a href='get_gene_detail.php?AI=$info[7]'>$info[0]</a></td> ";}  // show locus_name
	elseif($info[6] == ""){
        echo "<td width='10%'><a href='get_gene_detail.php?AI=$info[7]'>$info[8]</a></td> ";}  // show alias
        else {echo "<td width='10%'><a href='get_gene_detail.php?AI=$info[7]'>$info[6]</a></td> ";} // if no locus_name,show genbank_id
    echo "<td width='15%'><i>$info[1]</i></td>";
    $char_info=$info[2][strlen($info[2])-1];
	if($char_info==":"){$fun_array=explode(":",$info[2]); $fun=$fun_array[0];}
    else{$fun=$info[2];}
	echo "	<td width='30%' >$fun</td>
	
		<td width='10%'>$info[3]</td>";
	
	$gene_evidence_num_array=explode(");",$info[4]);
	$real_gene_evidence="";
	
	for($j=0;$j<count($gene_evidence_num_array);$j++){	
	$gene_evidence_array=explode("(",$gene_evidence_num_array[$j]);
	if($real_gene_evidence!=""){$real_gene_evidence=$real_gene_evidence."; ".$gene_evidence_array[0];}
	else{$real_gene_evidence=$gene_evidence_array[0];}
    }
	echo "<td width='35%'>$real_gene_evidence</td>
	     
	      </tr>";
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
echo "<tr>
	<td colspan=5><P class=header id=GE>All senescence-related genes supported by genetic evidence (mutant or transgenic study)</P></td>
      </tr>";
echo "<tr>
	<td class=header2C width='10%'>Locus</td>
	<td class=header2C width='15%'>Species</td>
	<td class=header2C width='30%'>Function</td>
	<td class=header2C width='10%'>Effect</td>
	<td class=header2C width='35%'>Evidence</td>
    </tr>";

$sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE evidence<>'GO' ORDER by species,hormone_role limit ".($page-1)*$page_size .", $page_size";

$re_page=mysqli_query($conn,$sql) or die;;
while($info=mysqli_fetch_array($re_page)){

	$pmid=explode(";",$info[5]);
	for($i=0;$i<count($pmid);$i++){
		if($pmid[$i]!=""){
			$ref=$ref."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[$i] target=_blank>$pmid[$i];</a>";
		}
	}
	$bgcolor = ($count % 2)==1 ? '#ededed' : 'white';	
	echo "<tr bgcolor=$bgcolor>";
	if($info[0]!="UNCLONE"){
	echo "<td width='10%'><a href='get_gene_detail.php?AI=$info[7]'>$info[0]</a></td> ";}  // show locus_name
	elseif($info[6] == ""){
        echo "<td width='10%'><a href='get_gene_detail.php?AI=$info[7]'>$info[8]</a></td> ";}  // show alias
        else {echo "<td width='10%'><a href='get_gene_detail.php?AI=$info[7]'>$info[6]</a></td> ";} // if no locus_name,show genbank_id
    echo "<td width='15%'><i>$info[1]</i></td>";
    $char_info=$info[2][strlen($info[2])-1];
	if($char_info==":"){$fun_array=explode(":",$info[2]); $fun=$fun_array[0];}
    else{$fun=$info[2];}
	echo "	<td width='30%' >$fun</td>
		
		<td width='10%'>$info[3]</td>";
	
	$gene_evidence_num_array=explode(");",$info[4]);
	$real_gene_evidence="";
	
	for($j=0;$j<count($gene_evidence_num_array);$j++){	
	$gene_evidence_array=explode("(",$gene_evidence_num_array[$j]);
	if($real_gene_evidence!=""){$real_gene_evidence=$real_gene_evidence."; ".$gene_evidence_array[0];}
	else{$real_gene_evidence=$gene_evidence_array[0];}
    }
	echo "<td width='35%'>$real_gene_evidence</td>
	     
	      </tr>";
	$ref="";
	
	$count++;
   }
   
   echo "</table>";
  
   
if($page_count>1){
	// display the page number list
	//echo "<tr><td colspan='5' bgcolor='#FFFFFF'>Page: ";
	/*
	for ($j=1;$j<=$page_count;$j++){
		if($j==$page){
			echo "$j  ";
		}
		else{
			echo "<a href=?browsegene.php&page=$j>$j</a>  ";
		}
	}
	*/
	
	echo "<p  ><div align='right'>";
	$getpageinfo =page($page,$re_num,"",$page_size,5);
	echo $getpageinfo['pagecode'];//��ʾ��ҳ��html����
//	echo "<a href=?browsegene.php&listall=0>  list all";
	echo "</div></p>";
}





/*

echo "</table><BR>";

echo "<table border=0 width=90% bgcolor=black cellspacing=1 align=center>";
echo "<tr>
        <td colspan=5><P class=header id=GO>All senescence-related genes supported by evidence from Gene homology annotation.</P>
      </tr>";
echo "<tr>
       	<td class=header2C width=15%>Gene</td>
	<td class=header2C width=20%>Species</td>
	<td class=header2C width=30%>Function category</td>
	<td class=header2C width=10%>Effect</td>
	<td class=header2C width=25%>Evidence</td>
      </tr>";


$sql="select distinct locus_name,species,hormone_role,effect,gene_evidence, pmid FROM gene_hormone_info WHERE evidence='GO' ORDER by species,hormone_role";
$result=mysqli_query($conn,$sql) or die;
while($info=mysqli_fetch_array($result)){

        $pmid=explode(";",$info[5]);
        for($i=0;$i<count($pmid);$i++){
                if($pmid[$i]!=""){
                        $ref=$ref."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[$i] 
target=_blank>$pmid[$i];</a>";
                }
        }
        $bgcolor = ($count % 2)==1 ? '#ededed' : 'white';
        echo "<tr bgcolor=$bgcolor>
	        <td width=15%><a href=/cgi-bin/get_gene_detail.pl?AI=$info[7]>$info[0]</a></td>  
        	<td width=20%>$info[1]</td>
		<td width=25% >$info[2]</td>
		<td width=15%>$info[3]</td>
		<td width=25%>$info[4]</td>
              </tr>";
        $ref="";

	$count++;
}

*/
?>
  
 
  </div>
    </td>
   </tr>

   <tr>
	<td colspan="2" class=c  > <hr color="#006600" size="2" width="100%"><B>&copy;&nbsp;Center for Bioinformatics(<a 
href="http://www.cbi.pku.edu.cn" target="_blank">CBI</a>), Peking University</B></td>
   </tr>
</table>

<?php
function page($page,$total,$phpfile,$pagesize,$pagelen){
    $pagecode = '';//�����������ŷ�ҳ���ɵ�HTML
    $page = intval($page);//���������ҳ��
    $total = intval($total);//��֤�ܼ�¼��ֵ������ȷ
    if(!$total) return array();//�ܼ�¼��Ϊ�㷵�ؿ�����
    $pages = ceil($total/$pagesize);//�����ܷ�ҳ
    //����ҳ��Ϸ���
    if($page<1) $page = 1;
    if($page>$pages) $page = $pages;
    //�����ѯƫ����
    $offset = $pagesize*($page-1);
    //ҳ�뷶Χ����
    $init = 1;//��ʼҳ����
    $max = $pages;//����ҳ����
    $pagelen = ($pagelen%2)?$pagelen:$pagelen+1;//ҳ�����
    $pageoffset = ($pagelen-1)/2;//ҳ���������ƫ����
    
    //����html
    $pagecode='<div class="page">';
    $pagecode.="<span>$page/$pages</span>";//�ڼ�ҳ,����ҳ
    //����ǵ�һҳ������ʾ��һҳ����һҳ������
    if($page!=1){
        $pagecode.="<a href=browsegene.php?page=1>&lt;&lt;</a>";//��һҳ
        $pagecode.="<a href=browsegene.php?page=".($page-1).">&lt;</a>";//��һҳ
    }
    //��ҳ������ҳ�����ʱ����ƫ��
    if($pages>$pagelen){
        //�����ǰҳС�ڵ�����ƫ��
        if($page<=$pageoffset){
            $init=1;
            $max = $pagelen;
        }else{//�����ǰҳ������ƫ��
            //�����ǰҳ����ƫ�Ƴ�������ҳ��
            if($page+$pageoffset>=$pages+1){
                $init = $pages-$pagelen+1;
            }else{
                //����ƫ�ƶ�����ʱ�ļ���
                $init = $page-$pageoffset;
                $max = $page+$pageoffset;
            }
        }
    }
    //����html
    for($i=$init;$i<=$max;$i++){
        if($i==$page){
            $pagecode.='<span>'.$i.'</span>';
        } else {
            $pagecode.="<a href=browsegene.php?page={$i}>$i</a>";
        }
    }
    if($page!=$pages){
        $pagecode.="<a href=browsegene.php?page=".($page+1).">&gt;</a>";//��һҳ
        $pagecode.="<a href=browsegene.php?page=$pages>&gt;&gt;</a>";//���һҳ
    }
    $pagecode.='</div>';
    return array('pagecode'=>$pagecode,'sqllimit'=>' limit '.$offset.','.$pagesize);
}
?>




 </body>
</html>

