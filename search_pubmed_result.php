<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>


 <div style="height:820px;width:1060px;overflow-y:scroll;overflow-x:hidden">

<?php
$BInfoItem1=$_POST["selectpubmed1"];
$BInfoItem2=$_POST["selectpubmed2"];
$BInfoItem3=$_POST["selectpubmed3"];

if($BInfoItem3=='Pand'){$BInfoItem3='AND';}
if($BInfoItem3=='Por'){$BInfoItem3='OR';}


$BInfoValue1=trim($_POST["name31"]);
$BInfoValue2=trim($_POST["name32"]);

$tag=0;
if($BInfoValue1!=''){$tag=$tag+1;}
if($BInfoValue2!=''){$tag=$tag+2;}
if($tag==1){
   if( $BInfoItem1 == 'PT1' ){
   $sql="select distinct * FROM pubmed WHERE  title like '%$BInfoValue1%' ";
   }
   elseif($BInfoItem1 =='PA1' ){
   $sql="select distinct * FROM pubmed WHERE  author like '%$BInfoValue1%' ";
   }
   elseif($BInfoItem1 =='PK1' ){
   $sql="select distinct * FROM pubmed WHERE  (journal_title_date like '%$BInfoValue1%') or (title like '%$BInfoValue1%') or (author like '%$BInfoValue1%') ";
   }
   elseif($BInfoItem1 =='PJ1' ){
   $sql="select distinct * FROM pubmed WHERE  journal_title_date like '%$BInfoValue1%' ";
   }
   elseif($BInfoItem1 =='PD1' ){
   $sql="select distinct * FROM pubmed WHERE  journal_title_date like '%$BInfoValue1%' ";
   }
}
elseif($tag==2){
   if( $BInfoItem2 == 'PT2' ){
   $sql="select distinct * FROM pubmed WHERE  title like '%$BInfoValue2%' ";
   }
   elseif($BInfoItem2 =='PA2' ){
   $sql="select distinct * FROM pubmed WHERE  author like '%$BInfoValue2%' ";
   }
   elseif($BInfoItem2 =='PK2' ){
   $sql="select distinct * FROM pubmed WHERE  (journal_title_date like '%$BInfoValue2%') or (title like '%$BInfoValue2%') or (author like '%$BInfoValue2%') ";
   }
   elseif($BInfoItem2 =='PJ2' ){
   $sql="select distinct * FROM pubmed WHERE  journal_title_date like '%$BInfoValue2%' ";
   }
   elseif($BInfoItem2 =='PD2' ){
   $sql="select distinct * FROM pubmed WHERE  journal_title_date like '%$BInfoValue2%' ";
   }
}
elseif($tag==3){
   if (( $BInfoItem1 == 'PT1' )&&( $BInfoItem2 == 'PT2' )){
   $sql="select distinct * FROM pubmed WHERE  (title like '%$BInfoValue1%') $BInfoItem3  (title like '%$BInfoValue2%')  ";
   }
   elseif (( $BInfoItem1 == 'PT1' )&&( $BInfoItem2 == 'PA2' )){
   $sql="select distinct * FROM pubmed WHERE  (title like '%$BInfoValue1%') $BInfoItem3  (author like '%$BInfoValue2%')  ";
   }
   elseif (( $BInfoItem1 == 'PT1' )&&( $BInfoItem2 == 'PK2' )){
   $sql="select distinct * FROM pubmed WHERE (title like '%$BInfoValue1%') $BInfoItem3  ((journal_title_date like '%$BInfoValue2%') or (title like '%$BInfoValue2%') or (author like '%$BInfoValue2%') )  ";
   }
   elseif (( $BInfoItem1 == 'PT1' )&&( $BInfoItem2 == 'PJ2' )){
   $sql="select distinct * FROM pubmed WHERE  (title like '%$BInfoValue1%') $BInfoItem3  (journal_title_date  like '%$BInfoValue2%' )  ";
   }
   elseif (( $BInfoItem1 == 'PT1' )&&( $BInfoItem2 == 'PD2' )){
   $sql="select distinct * FROM pubmed WHERE  (title like '%$BInfoValue1%') $BInfoItem3  (journal_title_date  like '%$BInfoValue2%' ) ";
   }
   
   
   elseif(( $BInfoItem1 == 'PA1' )&&( $BInfoItem2 == 'PT2' )){
   $sql="select distinct * FROM pubmed WHERE  (author like '%$BInfoValue1%')  $BInfoItem3  (title like '%$BInfoValue2%')  ";
   }
   elseif (( $BInfoItem1 == 'PA1' )&&( $BInfoItem2 == 'PA2' )){
   $sql="select distinct * FROM pubmed WHERE  (author like '%$BInfoValue1%')  $BInfoItem3  (author like '%$BInfoValue2%')  ";
   }
   elseif (( $BInfoItem1 == 'PA1' )&&( $BInfoItem2 == 'PK2' )){
   $sql="select distinct * FROM pubmed WHERE  (author like '%$BInfoValue1%') $BInfoItem3  ((journal_title_date like '%$BInfoValue2%') or (title like '%$BInfoValue2%') or (author like '%$BInfoValue2%') )  ";
   }
   elseif (( $BInfoItem1 == 'PA1' )&&( $BInfoItem2 == 'PJ2' )){
   $sql="select distinct * FROM pubmed WHERE  (author like '%$BInfoValue1%') $BInfoItem3  (journal_title_date  like '%$BInfoValue2%' )  ";
   }
   elseif (( $BInfoItem1 == 'PA1' )&&( $BInfoItem2 == 'PD2' )){
   $sql="select distinct * FROM pubmed WHERE  (author like '%$BInfoValue1%')  $BInfoItem3 (journal_title_date  like '%$BInfoValue2%' ) ";
   }


   

   
   
   
   elseif(( $BInfoItem1 == 'PK1' )&&( $BInfoItem2 == 'PT2' )){
   $sql="select distinct * FROM pubmed WHERE  ((journal_title_date like '%$BInfoValue1%') or (title like '%$BInfoValue1%') or (author like '%$BInfoValue1%'))  $BInfoItem3  ( title like '%$BInfoValue2%' ) ";
   }
   elseif (( $BInfoItem1 == 'PK1' )&&( $BInfoItem2 == 'PA2' )){
   $sql="select distinct * FROM pubmed WHERE  ((journal_title_date like '%$BInfoValue1%') or (title like '%$BInfoValue1%') or (author like '%$BInfoValue1%'))  $BInfoItem3  ( author like '%$BInfoValue2%' ) ";
   }
   elseif (( $BInfoItem1 == 'PK1' )&&( $BInfoItem2 == 'PK2' )){
   $sql="select distinct * FROM pubmed WHERE  ((journal_title_date like '%$BInfoValue1%') or (title like '%$BInfoValue1%') or (author like '%$BInfoValue1%'))  $BInfoItem3  ((journal_title_date like '%$BInfoValue2%') or (title like '%$BInfoValue2%') or (author like '%$BInfoValue2%') )  ";
   }
   elseif (( $BInfoItem1 == 'PK1' )&&( $BInfoItem2 == 'PJ2' )){
   $sql="select distinct * FROM pubmed WHERE  ((journal_title_date like '%$BInfoValue1%') or (title like '%$BInfoValue1%') or (author like '%$BInfoValue1%'))  $BInfoItem3  (journal_title_date  like '%$BInfoValue2%' ) ";
   }
   elseif (( $BInfoItem1 == 'PK1' )&&( $BInfoItem2 == 'PD2' )){
   $sql="select distinct * FROM pubmed WHERE  ((journal_title_date like '%$BInfoValue1%') or (title like '%$BInfoValue1%') or (author like '%$BInfoValue1%'))  $BInfoItem3 ( journal_title_date  like '%$BInfoValue2%' ) ";
   }
   
   
     
   
   
   elseif(( $BInfoItem1 == 'PJ1' )&&( $BInfoItem2 == 'PT2' )){
   $sql="select distinct * FROM pubmed WHERE  (journal_title_date like '%$BInfoValue1%')  $BInfoItem3  (title like '%$BInfoValue2%' ) ";
   }
   elseif (( $BInfoItem1 == 'PJ1' )&&( $BInfoItem2 == 'PA2' )){
   $sql="select distinct * FROM pubmed WHERE  (journal_title_date like '%$BInfoValue1%') $BInfoItem3  (author like '%$BInfoValue2%')  ";
   }
   elseif (( $BInfoItem1 == 'PJ1' )&&( $BInfoItem2 == 'PK2' )){
   $sql="select distinct * FROM pubmed WHERE  (journal_title_date like '%$BInfoValue1%')  $BInfoItem3  ((journal_title_date like '%$BInfoValue2%') or (title like '%$BInfoValue2%') or (author like '%$BInfoValue2%') )  ";
   }
   elseif (( $BInfoItem1 == 'PJ1' )&&( $BInfoItem2 == 'PJ2' )){
   $sql="select distinct * FROM pubmed WHERE  (journal_title_date like '%$BInfoValue1%')  $BInfoItem3  (journal_title_date  like '%$BInfoValue2%' ) ";
   }
   elseif (( $BInfoItem1 == 'PJ1' )&&( $BInfoItem2 == 'PD2' )){
   $sql="select distinct * FROM pubmed WHERE  (journal_title_date like '%$BInfoValue1%')  $BInfoItem3  (journal_title_date  like '%$BInfoValue2%' ) ";
   }
   
   
   
   
 elseif(( $BInfoItem1 == 'PD1' )&&( $BInfoItem2 == 'PT2' )){
   $sql="select distinct * FROM pubmed WHERE  (journal_title_date like '%$BInfoValue1%')  $BInfoItem3  (title like '%$BInfoValue2%')  ";
   }
   elseif (( $BInfoItem1 == 'PD1' )&&( $BInfoItem2 == 'PA2' )){
   $sql="select distinct * FROM pubmed WHERE  (journal_title_date like '%$BInfoValue1%') $BInfoItem3  (author like '%$BInfoValue2%' ) ";
   }
   elseif (( $BInfoItem1 == 'PD1' )&&( $BInfoItem2 == 'PK2' )){
   $sql="select distinct * FROM pubmed WHERE  (journal_title_date like '%$BInfoValue1%') $BInfoItem3  ((journal_title_date like '%$BInfoValue2%') or (title like '%$BInfoValue2%') or (author like '%$BInfoValue2%') )  ";
   }
   elseif (( $BInfoItem1 == 'PD1' )&&( $BInfoItem2 == 'PJ2' )){
   $sql="select distinct * FROM pubmed WHERE (journal_title_date like '%$BInfoValue1%') $BInfoItem3  (journal_title_date  like '%$BInfoValue2%' ) ";
   }
   elseif (( $BInfoItem1 == 'PD1' )&&( $BInfoItem2 == 'PD2' )){
   $sql="select distinct * FROM pubmed WHERE  (journal_title_date like '%$BInfoValue1%') $BInfoItem3  (journal_title_date  like '%$BInfoValue2%' ) ";
   }
   
   
}



//$sql="select distinct plant_name FROM plant_info ORDER by plant_name";
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
	<td class=header2C width=10%>Pubmed ID</td>
	<td class=header2C width=50%>Article</td>
	<td class=header2C width=25%>Gene</td>
	<td class=header2C width=15%>Mutant</td>
	
	</tr>";

//$sql="select distinct * FROM plant_info ORDER by plant_name";
$result=mysqli_query($conn,$sql) or die;
while($info=mysqli_fetch_array($result)){

	$pmid=explode(";",$info[4]);
	for($i=0;$i<count($pmid);$i++){
		if($pmid[$i]!=""){
			$ref=$ref."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[$i] target=_blank>$pmid[$i];</a>";
		}
	}
	
	$bgcolor = ($count % 2)==1 ? '#ededed' : 'white';	
	
	echo "<tr bgcolor=$bgcolor>";
	
	echo "<td width=10%><a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$info[4] target=_blank>$info[4]</a></td> ";
	
    	echo "<td width=50%>$info[1]&nbsp;<b>$info[2]</b>&nbsp;$info[3]</td>";
	
	$sql_gene   = "select distinct pmid, accesse_id, locus_name, genbank_id, alias FROM gene_hormone_info WHERE pmid like '%$info[4]%'";
	$sql_mutant = "select distinct pmid, plant_name from plant_info where pmid like '%$info[4]%'";
	
	$result_gene   = mysqli_query($conn, $sql_gene) or die;
	$result_mutant = mysqli_query($conn, $sql_mutant) or die;
	
	$gene_info   = "";
	$mutant_info = "";

	while($info_gene=mysqli_fetch_array($result_gene)){
		if($info_gene[2]!="UNCLONE"){
			$gene_info=$gene_info."<a href='get_gene_detail.php?AI=$info_gene[1]'>".$info_gene[2]."</a></br>";
		}
		elseif($info_gene[3] == ""){
        		$gene_info=$gene_info."<a href='get_gene_detail.php?AI=$info_gene[1]'>".$info_gene[4]."</a></br>";
		}
        	else{
			$gene_info=$gene_info."<a href='get_gene_detail.php?AI=$info_gene[1]'>".$info_gene[3]."</a></br>";
		}
	}
	echo "<td width=25% >$gene_info</td>";

	while($info_mutant=mysqli_fetch_array($result_mutant)){
			$mutant_info = $mutant_info . "<a href='get_mutant_detail.php?MI=$info_mutant[1]'>".$info_mutant[1] . "</a></br>";
	}
        	
	echo "<td width=15% >$mutant_info</td>";
	$count++;

}






?>
</table>

</div>
   </td>
   </tr>

<?php
require ('common_footer.php');
?>
</table>




 </body>
</html>

