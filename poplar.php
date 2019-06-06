<?php

require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>

<div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">

    <a href='poplar.php?' >
    <P class="header" style="height: 20px; margin-left: 10px;color: #0000aa">
       &nbsp;+ &nbsp;&nbsp;Expand 678 senescence-upreguated genes in Poplar
    </P>
    </a>

    <a href='poplar_down.php?' >
        <P class="header" style="height: 20px; margin-left: 10px">
            &nbsp;+ &nbsp;&nbsp;Expand 910 senescence-downreguated genes in Poplar
        </P>
    </a>






<?php

$sql="select locus_name, gene, gene_description FROM poplar_up_gene";
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

echo "<div style='height:820px;width:760px;overflow-y:scroll;overflow-x:hidden'>
<table border=0 width=90% bgcolor=black cellspacing=1  align='center' style='table-layout:fixed'>";

$count=1;

if($listall == 0){

    echo "<tr>
	<td class=header2C width=20%>Locus name</td>
	<td class=header2C width=80%>Description</td>
	

      </tr>";

    while($info=mysqli_fetch_array($result)){


        $bgcolor = ($count % 2)==1 ? '#ededed' : 'white';
        echo "<tr bgcolor=$bgcolor>";



        echo "  <td width=20%><a href='poplar_gene_info.php?poplar=up&MI=$info[0]'>&nbsp;$info[0]</td> ";

        echo "  <td width=80%>&nbsp;$info[2]</td>
	     </tr>";
        $count++;

    }

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
       <td class=header2C width=20%>Locus name</td>
	<td class=header2C width=80%>Description</td>

      </tr>";


$sql="select locus_name, gene, gene_description FROM poplar_up_gene limit ".($page-1)*$page_size .", $page_size";
$re_page=mysqli_query($conn,$sql) or die;

while($info=mysqli_fetch_array($re_page)){

    $bgcolor = ($count % 2)==1 ? '#ededed' : 'white';
    echo "<tr bgcolor=$bgcolor>";
    echo "  <td width=20%><a href='poplar_gene_info.php?poplar=up&MI=$info[0]'>&nbsp;$info[0]</td> ";

    echo "  <td width=80%>&nbsp;$info[2]</td>
	     </tr>";

    $count++;

}

echo "</table>";

if($page_count>1){

    echo "<p ><div align='right'>";
    $getpageinfo =page($page,$re_num,"",$page_size,5);
    echo $getpageinfo['pagecode'];

}

else{

    echo "</div></p></div></td></tr><tr><td colspan='2' class=c> <hr color='#006600' size='2' width='100%'></td></tr></table></body></html>";

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
    $pagecode.="<span>$page/$pages <a href=poplar.php?listall=0>List All</a></span>";

    if($page!=1){
        $pagecode.="<a href=poplar.php?page=1>&lt;&lt;</a>";
        $pagecode.="<a href=poplar.php?page=".($page-1).">&lt;</a>";
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
            $pagecode.="<a href=poplar.php?page={$i}>$i</a>";
        }
    }
    if($page!=$pages){
        $pagecode.="<a href=poplar.php?page=".($page+1).">&gt;</a>";
        $pagecode.="<a href=poplar.php?page=$pages>&gt;&gt;</a>";
    }
    $pagecode.='</div>';
    return array('pagecode'=>$pagecode,'sqllimit'=>' limit '.$offset.','.$pagesize);
}

?>
</div>

<?php
require ('common_footer.php');
?>
