<?php

require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

$poplar=$_GET["poplar"];
$locus_name=$_GET["MI"];

if ($poplar=="up") {
    $sql = "select * FROM poplar_up_gene WHERE locus_name='$locus_name'";

}
if ($poplar=="down") {
    $sql = "select * FROM poplar_down_gene WHERE locus_name='$locus_name'";

}
$re_gene=mysqli_query($conn,$sql) or die;
$info_gene=mysqli_fetch_row($re_gene);


$sql_treeA="select * from poplar_treeA WHERE locus_name='$locus_name'";
$re_treeA = mysqli_query($conn,$sql_treeA) or die;
$info_treeA = mysqli_fetch_row($re_treeA);

$sql_treeB="select * from poplar_treeB WHERE locus_name='$locus_name'";
$re_treeB = mysqli_query($conn,$sql_treeB) or die;
$info_treeB = mysqli_fetch_row($re_treeB);

$sql_treeC="select * from poplar_treeC WHERE locus_name='$locus_name'";
$re_treeC = mysqli_query($conn,$sql_treeC) or die;
$info_treeC = mysqli_fetch_row($re_treeC);
?>

<div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">
<!--    <table border=0 width=90% bgcolor=black cellspacing=1  align='center' style='table-layout:fixed'>-->
    <table border=0 width=95%  cellspacing=1  align="center">
        <tr><td colspan=2 bgcolor=#ccccff width="100%">

                <table width="100%"><tr><td width="80%"><a name="bi"></a><b><font size="2" color=#0000cc>Gene transcriptomics data</font></b>&nbsp;&nbsp;&nbsp;</td>
                        <td width="20%" align=right></td>

                    </tr></table>

            </td></tr>



<?php

echo" <tr>
 <td bgcolor=#DDF7DF width='20%'><b><font size='2'>Locus name</font></b></td>
 <td bgcolor=#E4E8EA width='80%'><font size='2'> $locus_name</font></td>
 </tr>";

if ($poplar=="up") {
    echo "
        
        <tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Reguated</b></font></td>
            <td bgcolor=#E4E8EA width='80%'><font size='2'>upReguated</font></td></tr>";
}

if ($poplar=="down") {
    echo "
        
        <tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Reguated</b></font></td>
            <td bgcolor=#E4E8EA width='80%'><font size='2'>downReguated</font></td></tr>";
}

if ($info_gene[2]!="" && $info_gene[3]=="" ){
    echo "
        
        <tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Gene</b></font></td>
            <td bgcolor=#E4E8EA width='80%'><font size='2'>$info_gene[2]</font></td></tr>";

}
if ($info_gene[2]=="" && $info_gene[3]!="" ){
    echo "
        
        <tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Description</b></font></td>
            <td bgcolor=#E4E8EA width='80%'><font size='2'>$info_gene[3]</font></td></tr>";

}
if ($info_gene[2]!="" && $info_gene[3]!="" ) {
    echo "
        <tr><td bgcolor=#DDF7DF width='20%'><b><font size='2'>Gene</font></b></td>
            <td bgcolor=#E4E8EA width='80%'><font size='2'>$info_gene[2]</font></td></tr>

        <tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Description</b></font></td>
            <td bgcolor=#E4E8EA width='80%'><font size='2'>$info_gene[3]</font></td></tr>";
}

echo "<tr >
            <td bgcolor=#DDF7DF width='20%'><font size='2'><b>Time</b></font></td>
            
            <td bgcolor=#DDF7DF width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td  bgcolor=#DDF7DF   width='33%'><font size='2'><b>TreeA</b></font></td>
            <td bgcolor=#DDF7DF  width='33%'><font size='2'><b>TreeB</b></font></td>
            <td bgcolor=#DDF7DF width='33%'><font size='2'><b>TreeC</b></font></td>
            </tr>
            </table>
            </tr>";


echo "<tr >
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Sept.22</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td  width='33%'><font size='2'>$info_treeA[2]</font></td>
            <td  width='33%'><font size='2'>$info_treeB[2]</font></td>
            <td width='33%'><font size='2'>$info_treeC[2]</font></td>
            </tr>
            </table>
            </tr>";

echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Sept.29</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td   width='33%'><font size='2'>$info_treeA[3]</font></td>
            <td  width='33%'><font size='2'>$info_treeB[3]</font></td>
            <td  width='33%'><font size='2'>$info_treeC[3]</font></td>
            </tr>
            </table>
            </tr>";

echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Oct.2</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td  width='33%'><font size='2'>$info_treeA[4]</font></td>
            <td  width='33%'><font size='2'>$info_treeB[4]</font></td>
            <td  width='33%'><font size='2'>$info_treeC[4]</font></td>
            </tr>
            </table>
            </tr>";

echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Oct.6</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td  width='33%'><font size='2'>$info_treeA[5]</font></td>
            <td width='33%'><font size='2'>$info_treeB[5]</font></td>
            <td width='33%'><font size='2'>$info_treeC[5]</font></td>
            </tr>
            </table>
            </tr>";

echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Oct.9</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td  width='33%'><font size='2'>$info_treeA[6]</font></td>
            <td width='33%'><font size='2'>$info_treeB[6]</font></td>
            <td width='33%'><font size='2'>$info_treeC[6]</font></td>
            </tr>
            </table>
            </tr>";

echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Oct.13</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td  width='33%'><font size='2'>$info_treeA[7]</font></td>
            <td width='33%'><font size='2'>$info_treeB[7]</font></td>
            <td width='33%'><font size='2'>$info_treeC[7]</font></td>
            </tr>
            </table>
            </tr>";

echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Oct.16</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td  width='33%'><font size='2'>$info_treeA[8]</font></td>
            <td width='33%'><font size='2'>$info_treeB[8]</font></td>
            <td  width='33%'><font size='2'>$info_treeC[8]</font></td>
            </tr>
            </table>
            </tr>";


echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Oct.20</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td width='33%'><font size='2'>$info_treeA[9]</font></td>
            <td width='33%'><font size='2'>$info_treeB[9]</font></td>
            <td  width='33%'><font size='2'>$info_treeC[9]</font></td>
            </tr>
            </table>
            </tr>";

echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Oct.23</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td  width='33%'><font size='2'>$info_treeA[10]</font></td>
            <td width='33%'><font size='2'>$info_treeB[10]</font></td>
            <td  width='33%'><font size='2'>$info_treeC[10]</font></td>
            </tr>
            </table>
            </tr>";

echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Oct.27</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td  width='33%'><font size='2'>$info_treeA[11]</font></td>
            <td width='33%'><font size='2'>$info_treeB[11]</font></td>
            <td width='33%'><font size='2'>$info_treeC[11]</font></td>
            </tr>
            </table>
            </tr>";

echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Oct.30</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td width='33%'><font size='2'>$info_treeA[12]</font></td>
            <td  width='33%'><font size='2'>$info_treeB[12]</font></td>
            <td  width='33%'><font size='2'>$info_treeC[12]</font></td>
            </tr>
            </table>
            </tr>";

echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Nov.3</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td width='33%'><font size='2'>$info_treeA[13]</font></td>
            <td width='33%'><font size='2'>$info_treeB[13]</font></td>
            <td width='33%'><font size='2'>$info_treeC[13]</font></td>
            </tr>
            </table>
            </tr>";

echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Nov.6</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td width='33%'><font size='2'>$info_treeA[14]</font></td>
            <td  width='33%'><font size='2'>$info_treeB[14]</font></td>
            <td  width='33%'><font size='2'>$info_treeC[14]</font></td>
            </tr>
            </table>
            </tr>";

echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Nov.10</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td  width='33%'><font size='2'>$info_treeA[15]</font></td>
            <td width='33%'><font size='2'>$info_treeB[15]</font></td>
            <td  width='33%'><font size='2'>$info_treeC[15]</font></td>
            </tr>
            </table>
            </tr>";

echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Nov.13</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td  width='33%'><font size='2'>$info_treeA[16]</font></td>
            <td  width='33%'><font size='2'>$info_treeB[16]</font></td>
            <td  width='33%'><font size='2'>$info_treeC[16]</font></td>
            </tr>
            </table>
            </tr>";

echo "<tr>
            <td bgcolor=#DDF7DF width='20%'><font size='2'>Nov.17</font></td>
            
            <td bgcolor=#E4E8EA width=80%>	
	<table width='100%' cellspacing='0'>
       <tr>
            <td  width='33%'><font size='2'>$info_treeA[17]</font></td>
            <td  width='33%'><font size='2'>$info_treeB[17]</font></td>
            <td  width='33%'><font size='2'>$info_treeC[17]</font></td>
            </tr>
            </table>
            </tr>";

?>

    </table>




</div>

<?php
require ('common_footer.php');
?>
