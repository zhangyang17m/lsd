<?php

require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>

<?php

$sql="select ECOTYPE_ID, NAME, CS_NUMBER, COUNTRY, FLOWERING, SENESCENCE,IMAGE FROM ecotype";
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

$page_size=30;


echo "<div style='height:820px;width:760px;overflow-y:scroll;overflow-x:hidden'><P class='header'>Here are <font color='#FF0000'>$re_num</font> Senescence phenotypes of natural accessions in Leaf Senescence DataBase.</P><table border=0 width=90% bgcolor=black cellspacing=1  align='center' style='table-layout:fixed'>";

$count=1;

if($listall == 0){

    echo "<tr>
	<td class=header2C width=25%>Ecotype name</td>
	<td class=header2C width=25%>CS number</td>
	<td class=header2C width=15%>Country</td>
	<td class=header2C width=15%>Flowering</td>
	<td class=header2C width=15%>Senescence</td>

      </tr>";

    while($info=mysqli_fetch_array($result)){


        $bgcolor = ($count % 2)==1 ? '#ededed' : 'white';
        echo "<tr bgcolor=$bgcolor>";

        if ($info[6] == "") {
            echo "  <td width=25%>$info[1]</td> ";
        }
        else{
            echo "  <td width=25%>$info[1]&nbsp;(<a href='ecotype_image.php?name=$info[1]'>image)</td> ";
        }
        echo "  <td width=25%><a href='https://www.arabidopsis.org/servlets/Search?type=general&search_action=detail&name=$info[2]&sub_type=germplasm' target='_blank'>$info[2]</a></td> ";
        echo "  <td width=15%>$info[3]</td>
	      <td width=15% >$info[4]</td>
	      <td width=15%>$info[5]</td></tr>";
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
        <td class=header2C width=25%>Ecotype name</td>
	<td class=header2C width=25%>CS number</td>
	<td class=header2C width=15%>Country</td>
	<td class=header2C width=15%>Flowering</td>
	<td class=header2C width=15%>Senescence</td>

      </tr>";

$sql="select ECOTYPE_ID,name, CS_NUMBER, COUNTRY, FLOWERING, SENESCENCE,IMAGE FROM ecotype limit ".($page-1)*$page_size .", $page_size";
$re_page=mysqli_query($conn,$sql) or die;

while($info=mysqli_fetch_array($re_page)){

        $bgcolor = ($count % 2)==1 ? '#ededed' : 'white';
        echo "<tr bgcolor=$bgcolor>";
        if ($info[6] == "") {
            echo "  <td width=25%>$info[1]</td> ";
        }
        else{
            echo "  <td width=25%>$info[1]&nbsp;(<a href='ecotype_image.php?name=$info[1]'>image)</td> ";
        }
        echo "  <td width=25%><a href='https://www.arabidopsis.org/servlets/Search?type=general&search_action=detail&name=$info[2]&sub_type=germplasm' target='_blank'>$info[2]</a></td> ";
        echo "  <td width=15%>$info[3]</td>
	      <td width=15% >$info[4]</td>
	      <td width=15%>$info[5]</td></tr>";

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
    $pagecode.="<span>$page/$pages <a href=ecotype.php?listall=0>List All</a></span>";

    if($page!=1){
        $pagecode.="<a href=ecotype.php?page=1>&lt;&lt;</a>";
        $pagecode.="<a href=ecotype.php?page=".($page-1).">&lt;</a>";
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
            $pagecode.="<a href=ecotype.php?page={$i}>$i</a>";
        }
    }
    if($page!=$pages){
        $pagecode.="<a href=ecotype.php?page=".($page+1).">&gt;</a>";
        $pagecode.="<a href=ecotype.php?page=$pages>&gt;&gt;</a>";
    }
    $pagecode.='</div>';
    return array('pagecode'=>$pagecode,'sqllimit'=>' limit '.$offset.','.$pagesize);
}

?>
