<?php

require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>

<div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">

    <?php

    $BInfoItem1=$_POST["selectpoplar"];

    $BInfoValue1=trim($_POST["name71"]);

    $tag=0;
    if($BInfoValue1!=''){$tag=$tag+1;}

    if($tag==1){
        if($BInfoItem1 =='PLA1'){
            $sql = "select distinct locus_name, gene, gene_description FROM poplar_up_gene WHERE locus_name like '%$BInfoValue1%' order by locus_name";
            $sql2 = "select distinct locus_name, gene, gene_description FROM poplar_down_gene WHERE locus_name like '%$BInfoValue1%' order by locus_name";

        }
    }
    $result=mysqli_query($conn,$sql) or die;
    $re_num=mysqli_num_rows($result);

    $result2=mysqli_query($conn,$sql2) or die;
    $re_num2=mysqli_num_rows($result2);
    ?>

    <P class="header">
        Here are <font color="#FF0000"><?php echo $re_num?></font> result(s).
    </P>

    <table border=0 width=90% bgcolor=black cellspacing=1  align="center" style="table-layout:fixed"  >

        <?php


        $count=1;
        echo "<form name='form7' id='form7' method='post'>";
        echo "<tr>
	<td class=header2C width=20%>Locus name</td>
	<td class=header2C width=10%>Reguated</td>
	<td class=header2C width=70%>Description</td>
	

      </tr>";


        while($info=mysqli_fetch_array($result)){


            $bgcolor = ($count % 2)==1 ? '#ededed' : 'white';
            echo "<tr bgcolor=$bgcolor>";



            echo "  <td width=20%><a href='poplar_gene_info.php?poplar=up&MI=$info[0]'>&nbsp;$info[0]</td> ";
            echo "  <td width=10%>up</td> ";

            echo "  <td width=70%>&nbsp;$info[2]</td>
	     </tr>";
            $count++;

        }


        while($info2=mysqli_fetch_array($result2)){


            $bgcolor = ($count % 2)==1 ? '#ededed' : 'white';
            echo "<tr bgcolor=$bgcolor>";



            echo "  <td width=20%><a href='poplar_gene_info.php?poplar=up&MI=$info2[0]'>&nbsp;$info2[0]</td> ";
            echo "  <td width=10%>down</td> ";

            echo "  <td width=70%>&nbsp;$info2[2]</td>
	     </tr>";
            $count++;

        }

        ?>

    </table></div>

<?php
require ('common_footer.php');
?>
