<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>

<div style="height:820px;width:1060px;overflow-y:scroll;overflow-x:hidden">

<?php
$BInfoItem1=$_POST["selectMutinf1"];
$BInfoItem2=$_POST["selectMutinf2"];
$BInfoItem3=$_POST["selectMutinf3"];

if($BInfoItem3=='Pand'){$BInfoItem3='AND';}
if($BInfoItem3=='Por'){$BInfoItem3='OR';}


$BInfoValue1=trim($_POST["name21"]);
$BInfoValue2=trim($_POST["name22"]);

$tag=0;
if($BInfoValue1!=''){$tag=$tag+1;}
if($BInfoValue2!=''){$tag=$tag+2;}
if($tag==1){
   if( $BInfoItem1 == 'MF1' ){
   $sql="select distinct * FROM plant_info WHERE  (plant_name like '%$BInfoValue1%') or (ecotype like '%$BInfoValue1%') or (mutagenesis_type like '%$BInfoValue1%')";
    }
   elseif( $BInfoItem1 == 'MA1' ){
   $sql="select distinct * FROM plant_info WHERE  plant_name like '%$BInfoValue1%' ";
    }
   elseif($BInfoItem1 =='ME1' ){
   $sql="select distinct * FROM plant_info WHERE  ecotype like '%$BInfoValue1%' ";
    }
   elseif($BInfoItem1 =='MT1' ){
   $sql="select distinct * FROM plant_info WHERE  mutagenesis_type like '%$BInfoValue1%' ";
    }
}
elseif($tag==2){
   if( $BInfoItem2 == 'MF2' ){
   $sql="select distinct * FROM plant_info WHERE  (plant_name like '%$BInfoValue2%') or (ecotype like '%$BInfoValue2%') or (mutagenesis_type like '%$BInfoValue2%')";
    }
   elseif( $BInfoItem2 == 'MA2' ){
   $sql="select distinct * FROM plant_info WHERE  plant_name like '%$BInfoValue2%' ";
    }
   elseif($BInfoItem2 =='ME2' ){
   $sql="select distinct * FROM plant_info WHERE  ecotype like '%$BInfoValue2%' ";
    }
   elseif($BInfoItem2 =='MT2' ){
   $sql="select distinct * FROM plant_info WHERE  mutagenesis_type like '%$BInfoValue2%' ";
    }
}

elseif($tag==3){
   if (( $BInfoItem1 == 'MF1' )&&( $BInfoItem2 == 'MF2' )){
   $sql="select distinct * FROM plant_info WHERE  ((plant_name like '%$BInfoValue1%') or (ecotype like '%$BInfoValue1%') or (mutagenesis_type like '%$BInfoValue1%'))  $BInfoItem3 ( (plant_name like '%$BInfoValue2%') or (ecotype like '%$BInfoValue2%') or (mutagenesis_type like '%$BInfoValue2%') ) ";
   }
   elseif (( $BInfoItem1 =='MF1' )&&( $BInfoItem2 =='MA2'  )){
    $sql="select distinct * FROM plant_info WHERE  ((plant_name like '%$BInfoValue1%') or (ecotype like '%$BInfoValue1%') or (mutagenesis_type like '%$BInfoValue1%'))  $BInfoItem3 ( plant_name like '%$BInfoValue2%' ) ";
   }
   elseif (( $BInfoItem1 =='MF1' )&&( $BInfoItem2 =='ME2' )){
   $sql="select distinct * FROM plant_info WHERE  ((plant_name like '%$BInfoValue1%') or (ecotype like '%$BInfoValue1%') or (mutagenesis_type like '%$BInfoValue1%'))  $BInfoItem3 ( ecotype like '%$BInfoValue2%'  ) ";
   }
   elseif (( $BInfoItem1 =='MF1' )&&( $BInfoItem2 =='MT2')){
   $sql="select distinct * FROM plant_info WHERE  ((plant_name like '%$BInfoValue1%') or (ecotype like '%$BInfoValue1%') or (mutagenesis_type like '%$BInfoValue1%'))  $BInfoItem3 (  mutagenesis_type like '%$BInfoValue2%' ) ";
   }  
   
   
   

   elseif (( $BInfoItem1 == 'MA1' )&&( $BInfoItem2 == 'MF2' )){
   $sql="select distinct * FROM plant_info WHERE  (plant_name like '%$BInfoValue1%')  $BInfoItem3 ( (plant_name like '%$BInfoValue2%') or (ecotype like '%$BInfoValue2%') or (mutagenesis_type like '%$BInfoValue2%') ) ";
   }
   elseif (( $BInfoItem1 =='MA1' )&&( $BInfoItem2 =='MA2'  )){
    $sql="select distinct * FROM plant_info WHERE  (plant_name like '%$BInfoValue1%')  $BInfoItem3 ( plant_name like '%$BInfoValue2%' ) ";
   }
   elseif (( $BInfoItem1 =='MA1' )&&( $BInfoItem2 =='ME2' )){
   $sql="select distinct * FROM plant_info WHERE  (plant_name like '%$BInfoValue1%')  $BInfoItem3 ( ecotype like '%$BInfoValue2%'  ) ";
   }
   elseif (( $BInfoItem1 =='MA1' )&&( $BInfoItem2 =='MT2')){
   $sql="select distinct * FROM plant_info WHERE  (plant_name like '%$BInfoValue1%')  $BInfoItem3 (  mutagenesis_type like '%$BInfoValue2%' ) ";
   }    
 
 
 
   elseif (( $BInfoItem1 == 'ME1' )&&( $BInfoItem2 == 'MF2' )){
   $sql="select distinct * FROM plant_info WHERE  (ecotype like '%$BInfoValue1%')  $BInfoItem3 ( (plant_name like '%$BInfoValue2%') or (ecotype like '%$BInfoValue2%') or (mutagenesis_type like '%$BInfoValue2%') ) ";
   }
   elseif (( $BInfoItem1 =='ME1' )&&( $BInfoItem2 =='MA2'  )){
    $sql="select distinct * FROM plant_info WHERE  (ecotype like '%$BInfoValue1%')  $BInfoItem3 ( plant_name like '%$BInfoValue2%' ) ";
   }
   elseif (( $BInfoItem1 =='ME1' )&&( $BInfoItem2 =='ME2' )){
   $sql="select distinct * FROM plant_info WHERE  (ecotype like '%$BInfoValue1%')  $BInfoItem3 ( ecotype like '%$BInfoValue2%'  ) ";
   }
   elseif (( $BInfoItem1 =='ME1' )&&( $BInfoItem2 =='MT2')){
   $sql="select distinct * FROM plant_info WHERE  (ecotype like '%$BInfoValue1%')  $BInfoItem3 (  mutagenesis_type like '%$BInfoValue2%' ) ";
   }     
 
 
 
   elseif (( $BInfoItem1 == 'MT1' )&&( $BInfoItem2 == 'MF2' )){
   $sql="select distinct * FROM plant_info WHERE  (mutagenesis_type like '%$BInfoValue1%')  $BInfoItem3 ( (plant_name like '%$BInfoValue2%') or (ecotype like '%$BInfoValue2%') or (mutagenesis_type like '%$BInfoValue2%') ) ";
   }
   elseif (( $BInfoItem1 =='MT1' )&&( $BInfoItem2 =='MA2'  )){
    $sql="select distinct * FROM plant_info WHERE  (mutagenesis_type like '%$BInfoValue1%')  $BInfoItem3 ( plant_name like '%$BInfoValue2%' ) ";
   }
   elseif (( $BInfoItem1 =='MT1' )&&( $BInfoItem2 =='ME2' )){
   $sql="select distinct * FROM plant_info WHERE  (mutagenesis_type like '%$BInfoValue1%')  $BInfoItem3 ( ecotype like '%$BInfoValue2%'  ) ";
   }
   elseif (( $BInfoItem1 =='MT1' )&&( $BInfoItem2 =='MT2')){   $sql="select distinct * FROM plant_info WHERE  (mutagenesis_type like '%$BInfoValue1%')  $BInfoItem3 (mutagenesis_type like '%$BInfoValue2%') ";
   }     

   
}


$result=mysqli_query($conn,$sql) or die;
$re_num=mysqli_num_rows($result);

?>

<P class="header">
Here are <font color="#FF0000"><?php echo $re_num?></font> result(s).
</P>
<P/>
<table border=0 width=90% bgcolor=black cellspacing=1  align="center" style="table-layout:fixed;"  >

<?php

$count=1;

echo "<tr>
	<td class=header2C width=35%>Mutant</td>
	<td class=header2C width=30%>Ecotype</td>
	<td class=header2C width=20%>Mutagenesis type</td>
	<td class=header2C width=15%>Dominance</td>
	
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
	
	echo "<td width=25%><a href='get_mutant_detail.php?MI=$info[0]'>$info[0]</a></td> ";
    	echo "<td width=20%>$info[1]</td>
		<td width=30% >$info[2]</td>
		<td width=25%>$info[3]</td></tr>";
	
	$count++;

}

echo "</table></div></td></tr><tr><td colspan='2' class=c> <hr color='#006600' size='2' width='100%'><B>&copy;&nbsp;Center for Bioinformatics(<a href='http://www.cbi.pku.edu.cn' target='_blank'>CBI</a>), Peking University</B></td></tr></table></body></html>";

?>
