<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>


<div style="height:820px;width:1260px;overflow-y:scroll;overflow-x:hidden">

<?php
$BInfoItem1=$_POST["selectPrimer1"];
$BInfoItem2=$_POST["selectPrimer2"];
$BInfoItem3=$_POST["selectPrimer3"];

if($BInfoItem3=='Pand'){$BInfoItem3='AND';}
if($BInfoItem3=='Por'){$BInfoItem3='OR';}

$BInfoValue1=trim($_POST["name41"]);
$BInfoValue2=trim($_POST["name42"]);

$tag=0;
if($BInfoValue1!=''){$tag=$tag+1;}
if($BInfoValue2!=''){$tag=$tag+2;}

if($tag==1){
   if( $BInfoItem1 == 'PGF1'){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (locus_name like '%$BInfoValue1%' ) or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%' ) or (species like '%$BInfoValue1%') or (purpose like '%$BInfoValue1%')  or (experimental_validation like '%$BInfoValue1%')";
   }
   elseif($BInfoItem1 =='PLA1'){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE locus_name like '%$BInfoValue1%'";
   }
   elseif($BInfoItem1 =='PGK1'){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE genbank_id like '%$BInfoValue1%'";
   }
   elseif($BInfoItem1 =='PAN1'){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE alias  like '%$BInfoValue1%'";
   }
   elseif($BInfoItem1 =='PSP1'){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE species like '%$BInfoValue1%'";
   }
   elseif($BInfoItem1 =='PPU1'){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE purpose like '%$BInfoValue1%'";
   }
   elseif($BInfoItem1 =='PEV1'){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE experimental_validation like '%$BInfoValue1%'";
   }
}

if($tag==2){
   if( $BInfoItem2 == 'PGF2'){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (locus_name like '%$BInfoValue2%' ) or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%' ) or (species like '%$BInfoValue2%') or (purpose like '%$BInfoValue2%')  or (experimental_validation like '%$BInfoValue2%')";
   }
   elseif($BInfoItem2 =='PLA2'){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE locus_name like '%$BInfoValue2%'";
   }
   elseif($BInfoItem2 =='PGK2'){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE genbank_id like '%$BInfoValue2%'";
   }
   elseif($BInfoItem2 =='PAN2'){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE alias  like '%$BInfoValue2%'";
   }
   elseif($BInfoItem2 =='PSP2'){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE species like '%$BInfoValue2%'";
   }
   elseif($BInfoItem2 =='PPU2'){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE purpose like '%$BInfoValue2%'";
   }
   elseif($BInfoItem2 =='PEV2'){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE experimental_validation like '%$BInfoValue2%'";
   }
}

elseif($tag==3){
   if (( $BInfoItem1 == 'PGF1' )&&( $BInfoItem2 == 'PGF2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE ( (locus_name like '%$BInfoValue1%') or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%') or (species like '%$BInfoValue1%') or (purpose like '%$BInfoValue1%') or (experimental_validation like '%$BInfoValue1%') )  $BInfoItem3 ( (locus_name like '%$BInfoValue2%') or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%') or (species like '%$BInfoValue2%') or (purpose like '%$BInfoValue2%') or (experimental_validation like '%$BInfoValue2%') )";
   }
   elseif (( $BInfoItem1 =='PGF1' )&&( $BInfoItem2 =='PLA2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE ( (locus_name like '%$BInfoValue1%') or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%') or (species like '%$BInfoValue1%') or (purpose like '%$BInfoValue1%') or (experimental_validation like '%$BInfoValue1%') ) $BInfoItem3 (locus_name like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PGF1' )&&( $BInfoItem2 =='PGK2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE ( (locus_name like '%$BInfoValue1%') or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%') or (species like '%$BInfoValue1%') or (purpose like '%$BInfoValue1%') or (experimental_validation like '%$BInfoValue1%') ) $BInfoItem3 (genbank_id like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PGF1' )&&( $BInfoItem2 =='PAN2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE ( (locus_name like '%$BInfoValue1%') or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%') or (species like '%$BInfoValue1%') or (purpose like '%$BInfoValue1%') or (experimental_validation like '%$BInfoValue1%') ) $BInfoItem3 (alias like '%$BInfoValue2%')";
   }  
   elseif(( $BInfoItem1 =='PGF1' )&&( $BInfoItem2 =='PSP2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE ( (locus_name like '%$BInfoValue1%') or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%') or (species like '%$BInfoValue1%') or (purpose like '%$BInfoValue1%') or (experimental_validation like '%$BInfoValue1%') ) $BInfoItem3 (species like '%$BInfoValue2%')";
   }
   elseif(( $BInfoItem1 =='PGF1' )&&( $BInfoItem2 =='PPU2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE ( (locus_name like '%$BInfoValue1%') or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%') or (species like '%$BInfoValue1%') or (purpose like '%$BInfoValue1%') or (experimental_validation like '%$BInfoValue1%') ) $BInfoItem3 (purpose  like '%$BInfoValue2%')";
   }
   elseif(( $BInfoItem1 =='PGF1' )&&( $BInfoItem2 =='PEV2' )){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE ( (locus_name like '%$BInfoValue1%') or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%') or (species like '%$BInfoValue1%') or (purpose like '%$BInfoValue1%') or (experimental_validation like '%$BInfoValue1%') ) $BInfoItem3 (experimental_validation  like '%$BInfoValue2%')";
   }

   elseif (( $BInfoItem1 =='PLA1' )&&( $BInfoItem2 == 'PGF2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (locus_name like '%$BInfoValue1%') $BInfoItem3 ( (locus_name like '%$BInfoValue2%') or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%') or (species like '%$BInfoValue2%') or (purpose like '%$BInfoValue2%') or (experimental_validation like '%$BInfoValue2%') )";
   }
   elseif (( $BInfoItem1 =='PLA1' )&&( $BInfoItem2 == 'PLA2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (locus_name like '%$BInfoValue1%') $BInfoItem3 (locus_name like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PLA1' )&&( $BInfoItem2 == 'PGK2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (locus_name like '%$BInfoValue1%') $BInfoItem3 (genbank_id like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PLA1' )&&( $BInfoItem2 =='PAN2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (locus_name like '%$BInfoValue1%') $BInfoItem3 (alias like '%$BInfoValue2%')";
   }  
   elseif (( $BInfoItem1 =='PLA1' )&&( $BInfoItem2 =='PSP2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (locus_name like '%$BInfoValue1%') $BInfoItem3 (species  like '%$BInfoValue2%')";
   }
   elseif(( $BInfoItem1 =='PLA1' )&&( $BInfoItem2 =='PPU2' )){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (locus_name like '%$BInfoValue1%') $BInfoItem3 (purpose like '%$BInfoValue2%')";
   }
   elseif(( $BInfoItem1 =='PLA1' )&&( $BInfoItem2 =='PEV2' )){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (locus_name like '%$BInfoValue1%') $BInfoItem3 (experimental_validation like '%$BInfoValue2%')";
   }

   elseif (( $BInfoItem1 =='PGK1' )&&( $BInfoItem2 == 'PGF2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (genbank_id like '%$BInfoValue1%') $BInfoItem3 ( (locus_name like '%$BInfoValue2%') or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%') or (species like '%$BInfoValue2%') or (purpose like '%$BInfoValue2%') or (experimental_validation like '%$BInfoValue2%') )";
   }
   elseif (( $BInfoItem1 =='PGK1' )&&( $BInfoItem2 == 'PLA2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (genbank_id like '%$BInfoValue1%') $BInfoItem3 (locus_name like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PGK1' )&&( $BInfoItem2 == 'PGK2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (genbank_id like '%$BInfoValue1%') $BInfoItem3 (genbank_id like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PGK1' )&&( $BInfoItem2 =='PAN2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (genbank_id like '%$BInfoValue1%') $BInfoItem3 (alias like '%$BInfoValue2%')";
   }  
   elseif (( $BInfoItem1 =='PGK1' )&&( $BInfoItem2 =='PSP2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (genbank_id like '%$BInfoValue1%') $BInfoItem3 (species  like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PGK1' )&&( $BInfoItem2 =='PPU2' )){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (genbank_id like '%$BInfoValue1%') $BInfoItem3 (purpose like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PGK1' )&&( $BInfoItem2 =='PEV2' )){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (genbank_id like '%$BInfoValue1%') $BInfoItem3 (experimental_validation like '%$BInfoValue2%')";
   }
 
   elseif (( $BInfoItem1 =='PAN1' )&&( $BInfoItem2 == 'PGF2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (alias like '%$BInfoValue1%') $BInfoItem3 ( (locus_name like '%$BInfoValue2%') or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%') or (species like '%$BInfoValue2%') or (purpose like '%$BInfoValue2%') or (experimental_validation like '%$BInfoValue2%') )";
   }
   elseif (( $BInfoItem1 =='PAN1' )&&( $BInfoItem2 == 'PLA2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (alias like '%$BInfoValue1%') $BInfoItem3 (locus_name like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PAN1' )&&( $BInfoItem2 == 'PGK2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (alias like '%$BInfoValue1%') $BInfoItem3 (genbank_id like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PAN1' )&&( $BInfoItem2 =='PAN2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (alias like '%$BInfoValue1%') $BInfoItem3 (alias like '%$BInfoValue2%')";
   }  
   elseif (( $BInfoItem1 =='PAN1' )&&( $BInfoItem2 =='PSP2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (alias like '%$BInfoValue1%') $BInfoItem3 (species  like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PAN1' )&&( $BInfoItem2 =='PPU2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (alias like '%$BInfoValue1%') $BInfoItem3 (purpose like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PAN1' )&&( $BInfoItem2 =='PEV2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (alias like '%$BInfoValue1%') $BInfoItem3 (experimental_validation like '%$BInfoValue2%')";
   }
   
   elseif (( $BInfoItem1 =='PSP1' )&&( $BInfoItem2 == 'PGF2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (species like '%$BInfoValue1%') $BInfoItem3 ( (locus_name like '%$BInfoValue2%') or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%') or (species like '%$BInfoValue2%') or (purpose like '%$BInfoValue2%') or (experimental_validation like '%$BInfoValue2%') )";
   }
   elseif (( $BInfoItem1 =='PSP1' )&&( $BInfoItem2 == 'PLA2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (species like '%$BInfoValue1%') $BInfoItem3 (locus_name like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PSP1' )&&( $BInfoItem2 == 'PGK2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (species like '%$BInfoValue1%') $BInfoItem3 (genbank_id like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PSP1' )&&( $BInfoItem2 =='PAN2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (species like '%$BInfoValue1%') $BInfoItem3 (alias like '%$BInfoValue2%')";
   }  
   elseif (( $BInfoItem1 =='PSP1' )&&( $BInfoItem2 =='PSP2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (species like '%$BInfoValue1%') $BInfoItem3 (species  like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PSP1' )&&( $BInfoItem2 =='PPU2' )){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (species like '%$BInfoValue1%') $BInfoItem3 (purpose like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PSP1' )&&( $BInfoItem2 =='PEV2' )){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (species like '%$BInfoValue1%') $BInfoItem3 (experimental_validation like '%$BInfoValue2%')";
   }

   elseif (( $BInfoItem1 =='PPU1' )&&( $BInfoItem2 == 'PGF2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (purpose like '%$BInfoValue1%') $BInfoItem3 ( (locus_name like '%$BInfoValue2%') or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%') or (species like '%$BInfoValue2%') or (purpose like '%$BInfoValue2%') or (experimental_validation like '%$BInfoValue2%') )";
   }
   elseif (( $BInfoItem1 =='PPU1' )&&( $BInfoItem2 == 'PLA2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (purpose like '%$BInfoValue1%') $BInfoItem3 (locus_name like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PPU1' )&&( $BInfoItem2 == 'PGK2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (purpose like '%$BInfoValue1%') $BInfoItem3 (genbank_id like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PPU1' )&&( $BInfoItem2 =='PAN2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (purpose like '%$BInfoValue1%') $BInfoItem3 (alias like '%$BInfoValue2%')";
   }  
   elseif (( $BInfoItem1 =='PPU1' )&&( $BInfoItem2 =='PSP2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (purpose like '%$BInfoValue1%') $BInfoItem3 (species  like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PPU1' )&&( $BInfoItem2 =='PPU2' )){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (purpose like '%$BInfoValue1%') $BInfoItem3 (purpose like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PPU1' )&&( $BInfoItem2 =='PEV2' )){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (purpose like '%$BInfoValue1%') $BInfoItem3 (experimental_validation like '%$BInfoValue2%')";
   }
   
   elseif (( $BInfoItem1 =='PEV1' )&&( $BInfoItem2 == 'PGF2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (experimental_validation like '%$BInfoValue1%') $BInfoItem3 ( (locus_name like '%$BInfoValue2%') or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%') or (species like '%$BInfoValue2%') or (purpose like '%$BInfoValue2%') or (experimental_validation like '%$BInfoValue2%') )";
   }
   elseif (( $BInfoItem1 =='PEV1' )&&( $BInfoItem2 == 'PLA2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (experimental_validation like '%$BInfoValue1%') $BInfoItem3 (locus_name like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PEV1' )&&( $BInfoItem2 == 'PGK2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (experimental_validation like '%$BInfoValue1%') $BInfoItem3 (genbank_id like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PEV1' )&&( $BInfoItem2 =='PAN2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (experimental_validation like '%$BInfoValue1%') $BInfoItem3 (alias like '%$BInfoValue2%')";
   }  
   elseif (( $BInfoItem1 =='PEV1' )&&( $BInfoItem2 =='PSP2')){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (experimental_validation like '%$BInfoValue1%') $BInfoItem3 (species  like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PEV1' )&&( $BInfoItem2 =='PPU2' )){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (experimental_validation like '%$BInfoValue1%') $BInfoItem3 (purpose like '%$BInfoValue2%')";
   }
   elseif (( $BInfoItem1 =='PEV1' )&&( $BInfoItem2 =='PEV2' )){
   $sql = "select distinct locus_name, genbank_id, alias, species, forward_primer, reverse_primer, purpose, experimental_validation, pmid FROM primer_info WHERE (experimental_validarion like '%$BInfoValue1%') $BInfoItem3 (experimental_validation like '%$BInfoValue2%')";
   }
}

$result=mysqli_query($conn,$sql) or die;
$re_num=mysqli_num_rows($result);
?>

<P class="header">
Here are <font color="#FF0000"><?php echo $re_num?></font> result(s).&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='/faq/primer.php'><img src='image/help.gif' width='15' height='15' border='0'/></a>
</P>

<table border=0 width=90% bgcolor=black cellspacing=1  align="center" style="table-layout:fixed"  >

<?php

require ('dbconnect.php');
$count=1;
	echo "<tr>
		<td class=header2C width='10%'>Locus</td>
		<td class=header2C width='15%'>Species</td>
		<td class=header2C width='25%'>Forwad</td>
		<td class=header2C width='25%'>Reverse</td>
		<td class=header2C width='15%'>Purpose</td>
		<td class=header2C width='10%'>Pubmed ID</td>
      	      </tr>";

	$result=mysqli_query($conn,$sql) or die;
	while($info=mysqli_fetch_array($result)){
		
		if($info[8]==""){
			$ref="Array Designer 4";
		}
		else{
			$pmid=explode(";",$info[8]);
			if (count($pmid) > 1){ 
				for($i=0;$i<count($pmid);$i++){
					if($pmid[$i]!=""){
						$ref=$ref."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[$i] target=_blank>$pmid[$i];</a>";
						}
					}
				}		
			else {$ref=$ref."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[0] target=_blank>$pmid[0]</a>";}
		}
		if($info[0] != ''){
			$gene_detail_sql="select CONCAT('LSD_',gene_hormone_info.id) FROM gene_hormone_info WHERE gene_hormone_info.locus_name = '$info[0]'";
		}
		else{
			$gene_detail_sql="select CONCAT('LSD_',gene_hormone_info.id) FROM gene_hormone_info WHERE gene_hormone_info.genbank_id = '$info[1]'";
		}
		$gene_detail_result=mysqli_query($conn, $gene_detail_sql) or die;
		$gene_detail_info=mysqli_fetch_array($gene_detail_result);
		
		$bgcolor = ($count % 2)==1 ? '#ededed' : 'white';	
		echo "<tr bgcolor=$bgcolor>";
		
		if($info[0]!=""){echo "<td width='10%'><a href='get_gene_detail.php?AI=$gene_detail_info[0]'>$info[0]</a></td> ";}  // show locus_name
		else {echo "<td width='10%'><a href='get_gene_detail.php?AI=$gene_detail_info[0]'>$info[1]</a></td> ";} // if no locus_name,show genbank_id

		echo "<td width='15%'>$info[3]</td>";
		echo "<td width='25%'>$info[4]</td>";
		echo "<td width='25%'>$info[5]</td>";
		echo "<td width='15%'>$info[6]</td>";
		echo "<td width='10%'>$ref</td>";
	
		$ref="";
		$count++;
	}
   
	echo "</table></div>
              <tr><td colspan='2' class=c> <hr color='#006600' size='2' width='100%'><B>&copy;&nbsp;Center for Bioinformatics(<ahref='http://www.cbi.pku.edu.cn' target='_blank'>CBI</a>), Peking University</B></td></tr>";


?>
