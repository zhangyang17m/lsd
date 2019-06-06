<?php

require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>

<div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">

    <?php

    $BInfoItem1=$_POST["selectecotype"];

    $BInfoValue1=trim($_POST["name61"]);

    $tag=0;
    if($BInfoValue1!=''){$tag=$tag+1;}

    if($tag==1){
        if($BInfoItem1 =='PLA1'){
            $sql = "select distinct ecotype_id, name, cs_number, country, flowering, senescence, image FROM ecotype WHERE name like '%$BInfoValue1%' order by name";
        }
    }

    $result=mysqli_query($conn,$sql) or die;
    $re_num=mysqli_num_rows($result);

    ?>

    <P class="header">
        Here are <font color="#FF0000"><?php echo $re_num?></font> result(s).
    </P>

    <table border=0 width=90% bgcolor=black cellspacing=1  align="center" style="table-layout:fixed"  >

        <?php


$count=1;
echo "<form name='form6' id='form6' method='post'>";
echo "<tr>
	<td class=header2C width=25%>Ecotype name</td>
	<td class=header2C width=25%>CS number</td>
	<td class=header2C width=15%>Country</td>
	<td class=header2C width=15%>Flowering</td>
	<td class=header2C width=15%>Senescence</td>
      </tr>";

	$result=mysqli_query($conn,$sql) or die;

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

        ?>

    </table></div>

<?php
require ('common_footer.php');
?>
