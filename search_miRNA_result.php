<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>

<div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">

<?php

$BInfoItem1=$_POST["selectmiRNA1"];

$BInfoValue1=trim($_POST["name51"]);

$tag=0;
if($BInfoValue1!=''){$tag=$tag+1;}

if($tag==1){
   if($BInfoItem1 =='PLA1'){
   $sql = "select distinct locus_name, miRNA FROM miRNA_info WHERE miRNA like '%$BInfoValue1%' order by miRNA";
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

require ('dbconnect.php');
$count=1;
echo "<form name='form5' id='form5' method='post'>";
echo "<tr>
	<td class=header2C width='50%'>miRNA</td>
	<td class=header2C width='50%'>Interacted Locus</td>
      </tr>";

	$result=mysqli_query($conn,$sql) or die;
	
	while($info=mysqli_fetch_array($result)){
		
		$gene_detail_sql="select CONCAT('LSD_',gene_hormone_info.id) FROM gene_hormone_info WHERE gene_hormone_info.locus_name = '$info[0]' OR gene_hormone_info.genbank_id = '$info[0]'";
		
		$gene_detail_result=mysqli_query($conn, $gene_detail_sql) or die;
		$gene_detail_info=mysqli_fetch_array($gene_detail_result);
		
		$bgcolor = ($count % 2)==1 ? '#ededed' : 'white';
		echo "<tr bgcolor=$bgcolor>";
		
		echo "<td width='50%'>$info[1]</td>";
		echo "<td width='50%'><a href='get_gene_detail.php?AI=$gene_detail_info[0]'>$info[0]</a></td> ";

		$count++;
	}

   
	echo "</table></div>
              <tr><td colspan='2' class=c> <hr color='#006600' size='2' width='100%'><B>&copy;&nbsp;Center for Bioinformatics(<ahref='http://www.cbi.pku.edu.cn' target='_blank'>CBI</a>), Peking University</B></td></tr>";


?>
