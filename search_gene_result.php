<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>

<div style="height:820px;width:1260px;overflow-y:scroll;overflow-x:hidden">

    <?php
    $BInfoItem1=$_POST["selectGeninf1"];
    $BInfoItem2=$_POST["selectGeninf2"];
    $BInfoItem3=$_POST["selectGeninf3"];

    if($BInfoItem3=='Pand'){$BInfoItem3='AND';}
    if($BInfoItem3=='Por'){$BInfoItem3='OR';}

    $BInfoValue1=trim($_POST["name11"]);
    $BInfoValue2=trim($_POST["name12"]);

    $tag=0;
    if($BInfoValue1!=''){$tag=$tag+1;}
    if($BInfoValue2!=''){$tag=$tag+2;}

    if($tag==1){
        if( $BInfoItem1 == 'GF1' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (locus_name like '%$BInfoValue1%' ) or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%' ) or (species like '%$BInfoValue1%') or (gene_description like '%$BInfoValue1%' )  or (hormone_role like '%$BInfoValue1%' ) or (effect like '%$BInfoValue1%' )";
        }
        elseif($BInfoItem1 =='LA1' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  locus_name like '%$BInfoValue1%' ";
        }
        elseif($BInfoItem1 =='GK1' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  genbank_id like '%$BInfoValue1%' ";
        }
        elseif($BInfoItem1 =='AN1' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  alias  like '%$BInfoValue1%'  ";
        }
        elseif($BInfoItem1 =='SP1' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  species like '%$BInfoValue1%'  ";
        }
        elseif($BInfoItem1 =='FC1' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  hormone_role like '%$BInfoValue1%'  ";
        }
        elseif($BInfoItem1 =='ES1' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  effect like '%$BInfoValue1%'  ";
        }
        elseif($BInfoItem1 =='KW1' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE gene_description  like '%$BInfoValue1%' ";
        }
    }
    elseif($tag==2){
        if( $BInfoItem2 == 'GF2' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (locus_name like '%$BInfoValue2%' ) or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%' ) or (species like '%$BInfoValue2%') or (gene_description like '%$BInfoValue2%' ) or (hormone_role like '%$BInfoValue2%' ) or (effect like '%$BInfoValue2%' ) ";
        }
        elseif($BInfoItem2 =='LA2' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  locus_name like '%$BInfoValue2%' ";
        }
        elseif($BInfoItem2 =='GK2' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  genbank_id like '%$BInfoValue2%' ";
        }
        elseif($BInfoItem2 =='AN2' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  alias  like '%$BInfoValue2%'  ";
        }
        elseif($BInfoItem2 =='SP2' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  species like '%$BInfoValue2%'  ";
        }
        elseif($BInfoItem2 =='FC2' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  hormone_role like '%$BInfoValue2%'  ";
        }
        elseif($BInfoItem2 =='ES2' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  effect like '%$BInfoValue2%'  ";
        }
        elseif($BInfoItem2 =='KW2' ){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE gene_description  like '%$BInfoValue2%' ";
        }
    }
    elseif($tag==3){
        if (( $BInfoItem1 == 'GF1' )&&( $BInfoItem2 == 'GF2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  ( (locus_name like '%$BInfoValue1%' ) or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%' ) or (species like '%$BInfoValue1%') or (gene_description like '%$BInfoValue1%' )  or (hormone_role like '%$BInfoValue1%' ) or (effect like '%$BInfoValue1%' )  )  $BInfoItem3 ( (locus_name like '%$BInfoValue2%' ) or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%' ) or (species like '%$BInfoValue2%') or (gene_description like '%$BInfoValue2%' ) or (hormone_role like '%$BInfoValue2%' )  or (effect like '%$BInfoValue2%' ) ) ";
        }
        elseif (( $BInfoItem1 =='GF1' )&&( $BInfoItem2 =='LA2'  )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  ((locus_name like '%$BInfoValue1%' ) or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%' ) or (species like '%$BInfoValue1%') or (gene_description like '%$BInfoValue1%' ) or (hormone_role like '%$BInfoValue1%' ) or (effect like '%$BInfoValue1%' )  )   $BInfoItem3   (locus_name like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='GF1' )&&( $BInfoItem2 =='GK2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  ((locus_name like '%$BInfoValue1%' ) or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%' ) or (species like '%$BInfoValue1%') or (gene_description like '%$BInfoValue1%' )  or (hormone_role like '%$BInfoValue1%' )  or (effect like '%$BInfoValue1%' ) )   $BInfoItem3   (genbank_id like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='GF1' )&&( $BInfoItem2 =='AN2')){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  ((locus_name like '%$BInfoValue1%' ) or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%' ) or (species like '%$BInfoValue1%') or (gene_description like '%$BInfoValue1%' ) or (hormone_role like '%$BInfoValue1%' ) or (effect like '%$BInfoValue1%' )  )   $BInfoItem3   (alias like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='GF1' )&&( $BInfoItem2 =='SP2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  ((locus_name like '%$BInfoValue1%' ) or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%' ) or (species like '%$BInfoValue1%') or (gene_description like '%$BInfoValue1%' ) or (hormone_role like '%$BInfoValue1%' ) or (effect like '%$BInfoValue1%' )  )   $BInfoItem3   (species  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='GF1' )&&( $BInfoItem2 =='KW2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  ((locus_name like '%$BInfoValue1%' ) or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%' ) or (species like '%$BInfoValue1%') or (gene_description like '%$BInfoValue1%' ) or (hormone_role like '%$BInfoValue1%' ) or (effect like '%$BInfoValue1%' )  )   $BInfoItem3   (gene_description  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='GF1' )&&( $BInfoItem2 =='FC2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  ((locus_name like '%$BInfoValue1%' ) or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%' ) or (species like '%$BInfoValue1%') or (gene_description like '%$BInfoValue1%' ) or (hormone_role like '%$BInfoValue1%' ) or (effect like '%$BInfoValue1%' )  )   $BInfoItem3   (hormone_role  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='GF1' )&&( $BInfoItem2 =='ES2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  ((locus_name like '%$BInfoValue1%' ) or (genbank_id like '%$BInfoValue1%') or (alias like '%$BInfoValue1%' ) or (species like '%$BInfoValue1%') or (gene_description like '%$BInfoValue1%' ) or (hormone_role like '%$BInfoValue1%' ) or (effect like '%$BInfoValue1%' )  )   $BInfoItem3   (effect  like '%$BInfoValue2%' )  ";
        }



        elseif (( $BInfoItem1 =='LA1' )&&( $BInfoItem2 == 'GF2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (locus_name like '%$BInfoValue1%' )   $BInfoItem3 ( (locus_name like '%$BInfoValue2%' ) or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%' ) or (species like '%$BInfoValue2%') or (gene_description like '%$BInfoValue2%' )  or (hormone_role like '%$BInfoValue2%' )  or  (effect  like '%$BInfoValue2%' ) ) ";
        }
        elseif (( $BInfoItem1 =='LA1' )&&( $BInfoItem2 =='LA2'  )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (locus_name like '%$BInfoValue1%' )   $BInfoItem3   (locus_name like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='LA1' )&&( $BInfoItem2 =='GK2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (locus_name like '%$BInfoValue1%' )   $BInfoItem3   (genbank_id like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='LA1' )&&( $BInfoItem2 =='AN2')){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (locus_name like '%$BInfoValue1%' )   $BInfoItem3   (alias like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='LA1' )&&( $BInfoItem2 =='SP2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (locus_name like '%$BInfoValue1%' )   $BInfoItem3   (species  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='LA1' )&&( $BInfoItem2 =='KW2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (locus_name like '%$BInfoValue1%' )   $BInfoItem3   (gene_description  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='LA1' )&&( $BInfoItem2 =='FC2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (locus_name like '%$BInfoValue1%' )   $BInfoItem3   (hormone_role  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='LA1' )&&( $BInfoItem2 =='ES2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (locus_name like '%$BInfoValue1%' )   $BInfoItem3   (effect  like '%$BInfoValue2%' )  ";
        }




        elseif (( $BInfoItem1 =='GK1' )&&( $BInfoItem2 == 'GF2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (genbank_id  like '%$BInfoValue1%' )   $BInfoItem3 ( (locus_name like '%$BInfoValue2%' ) or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%' ) or (species like '%$BInfoValue2%') or (gene_description like '%$BInfoValue2%' ) or (hormone_role like '%$BInfoValue2%' )  or  (effect  like '%$BInfoValue2%' ) ) ";
        }
        elseif (( $BInfoItem1 =='GK1' )&&( $BInfoItem2 =='LA2'  )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (genbank_id  like '%$BInfoValue1%' )   $BInfoItem3   (locus_name like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='GK1' )&&( $BInfoItem2 =='GK2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (genbank_id  like '%$BInfoValue1%' )   $BInfoItem3   (genbank_id like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='GK1' )&&( $BInfoItem2 =='AN2')){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (genbank_id  like '%$BInfoValue1%' )   $BInfoItem3   (alias like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='GK1' )&&( $BInfoItem2 =='SP2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (genbank_id  like '%$BInfoValue1%' )   $BInfoItem3   (species  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='GK1' )&&( $BInfoItem2 =='KW2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (genbank_id  like '%$BInfoValue1%' )   $BInfoItem3   (gene_description  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='GK1' )&&( $BInfoItem2 =='FC2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (genbank_id  like '%$BInfoValue1%' )   $BInfoItem3   (hormone_role  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='GK1' )&&( $BInfoItem2 =='ES2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (genbank_id  like '%$BInfoValue1%' )   $BInfoItem3   (effect  like '%$BInfoValue2%' )  ";
        }



        elseif (( $BInfoItem1 =='AN1' )&&( $BInfoItem2 == 'GF2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (alias  like '%$BInfoValue1%' )   $BInfoItem3 ( (locus_name like '%$BInfoValue2%' ) or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%' ) or (species like '%$BInfoValue2%') or (gene_description like '%$BInfoValue2%' )  or (hormone_role like '%$BInfoValue2%' )  or  (effect  like '%$BInfoValue2%' ) ) ";
        }
        elseif (( $BInfoItem1 =='AN1' )&&( $BInfoItem2 =='LA2'  )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (alias  like '%$BInfoValue1%' )   $BInfoItem3   (locus_name like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='AN1' )&&( $BInfoItem2 =='GK2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (alias  like '%$BInfoValue1%' )   $BInfoItem3   (genbank_id like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='AN1' )&&( $BInfoItem2 =='AN2')){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (alias  like '%$BInfoValue1%' )   $BInfoItem3   (alias like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='AN1' )&&( $BInfoItem2 =='SP2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (alias  like '%$BInfoValue1%' )   $BInfoItem3   (species  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='AN1' )&&( $BInfoItem2 =='KW2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (alias  like '%$BInfoValue1%' )   $BInfoItem3   (gene_description  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='AN1' )&&( $BInfoItem2 =='FC2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (alias  like '%$BInfoValue1%' )   $BInfoItem3   (hormone_role  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='AN1' )&&( $BInfoItem2 =='ES2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (alias  like '%$BInfoValue1%' )   $BInfoItem3   (effect  like '%$BInfoValue2%' )  ";
        }



        elseif (( $BInfoItem1 =='SP1' )&&( $BInfoItem2 == 'GF2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (species  like '%$BInfoValue1%' )   $BInfoItem3  ( (locus_name like '%$BInfoValue2%' ) or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%' ) or (species like '%$BInfoValue2%') or (gene_description like '%$BInfoValue2%' )  or (hormone_role like '%$BInfoValue2%' )   or  (effect  like '%$BInfoValue2%' ) ) ";
        }
        elseif (( $BInfoItem1 =='SP1' )&&( $BInfoItem2 =='LA2'  )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (species  like '%$BInfoValue1%' )   $BInfoItem3   (locus_name like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='SP1' )&&( $BInfoItem2 =='GK2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (species  like '%$BInfoValue1%' )   $BInfoItem3   (genbank_id like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='SP1' )&&( $BInfoItem2 =='AN2')){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (species  like '%$BInfoValue1%' )   $BInfoItem3   (alias like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='SP1' )&&( $BInfoItem2 =='SP2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (species  like '%$BInfoValue1%' )   $BInfoItem3   (species  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='SP1' )&&( $BInfoItem2 =='KW2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (species  like '%$BInfoValue1%' )   $BInfoItem3   (gene_description  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='SP1' )&&( $BInfoItem2 =='FC2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (species  like '%$BInfoValue1%' )   $BInfoItem3   (hormone_role  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='SP1' )&&( $BInfoItem2 =='ES2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (species  like '%$BInfoValue1%' )   $BInfoItem3   (effect  like '%$BInfoValue2%' )  ";
        }


        elseif (( $BInfoItem1 =='KW1' )&&( $BInfoItem2 == 'GF2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (gene_description  like '%$BInfoValue1%' )   $BInfoItem3 ( (locus_name like '%$BInfoValue2%' ) or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%' ) or (species like '%$BInfoValue2%') or (gene_description like '%$BInfoValue2%' ) or (hormone_role like '%$BInfoValue2%' ) or  (effect  like '%$BInfoValue2%' ) ) ";
        }
        elseif (( $BInfoItem1 =='KW1' )&&( $BInfoItem2 =='LA2'  )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (gene_description  like '%$BInfoValue1%' )   $BInfoItem3   (locus_name like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='KW1' )&&( $BInfoItem2 =='GK2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (gene_description  like '%$BInfoValue1%' )   $BInfoItem3   (genbank_id like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='KW1' )&&( $BInfoItem2 =='AN2')){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (gene_description  like '%$BInfoValue1%' )   $BInfoItem3   (alias like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='KW1' )&&( $BInfoItem2 =='SP2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (gene_description  like '%$BInfoValue1%' )   $BInfoItem3   (species  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='KW1' )&&( $BInfoItem2 =='KW2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (gene_description  like '%$BInfoValue1%' )   $BInfoItem3   (gene_description  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='KW1' )&&( $BInfoItem2 =='FC2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (gene_description  like '%$BInfoValue1%' )   $BInfoItem3   (hormone_role  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='KW1' )&&( $BInfoItem2 =='ES2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (gene_description  like '%$BInfoValue1%' )   $BInfoItem3   (effect  like '%$BInfoValue2%' )  ";
        }



        elseif (( $BInfoItem1 =='FC1' )&&( $BInfoItem2 == 'GF2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (hormone_role  like '%$BInfoValue1%' )   $BInfoItem3 ( (locus_name like '%$BInfoValue2%' ) or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%' ) or (species like '%$BInfoValue2%') or (gene_description like '%$BInfoValue2%' ) or (hormone_role like '%$BInfoValue2%' ) or  (effect  like '%$BInfoValue2%' ) ) ";
        }
        elseif (( $BInfoItem1 =='FC1' )&&( $BInfoItem2 =='LA2'  )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (hormone_role  like '%$BInfoValue1%' )   $BInfoItem3   (locus_name like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='FC1' )&&( $BInfoItem2 =='GK2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (hormone_role  like '%$BInfoValue1%' )   $BInfoItem3   (genbank_id like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='FC1' )&&( $BInfoItem2 =='AN2')){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (hormone_role  like '%$BInfoValue1%' )   $BInfoItem3   (alias like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='FC1' )&&( $BInfoItem2 =='SP2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (hormone_role  like '%$BInfoValue1%' )   $BInfoItem3   (species  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='FC1' )&&( $BInfoItem2 =='KW2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (hormone_role  like '%$BInfoValue1%' )   $BInfoItem3   (gene_description  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='FC1' )&&( $BInfoItem2 =='FC2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (hormone_role  like '%$BInfoValue1%' )   $BInfoItem3   (hormone_role  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='FC1' )&&( $BInfoItem2 =='ES2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (hormone_role  like '%$BInfoValue1%' )   $BInfoItem3   (effect  like '%$BInfoValue2%' )  ";
        }




        elseif (( $BInfoItem1 =='ES1' )&&( $BInfoItem2 == 'GF2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (effect  like '%$BInfoValue1%' )   $BInfoItem3 ( (locus_name like '%$BInfoValue2%' ) or (genbank_id like '%$BInfoValue2%') or (alias like '%$BInfoValue2%' ) or (species like '%$BInfoValue2%') or (gene_description like '%$BInfoValue2%' ) or (hormone_role like '%$BInfoValue2%' ) or  (effect  like '%$BInfoValue2%' ) ) ";
        }
        elseif (( $BInfoItem1 =='ES1' )&&( $BInfoItem2 =='LA2'  )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (effect  like '%$BInfoValue1%' )   $BInfoItem3   (locus_name like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='ES1' )&&( $BInfoItem2 =='GK2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (effect  like '%$BInfoValue1%' )   $BInfoItem3   (genbank_id like '%$BInfoValue2%' )  ";
        }
        elseif (( $BInfoItem1 =='ES1' )&&( $BInfoItem2 =='AN2')){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (effect  like '%$BInfoValue1%' )   $BInfoItem3   (alias like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='ES1' )&&( $BInfoItem2 =='SP2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (effect  like '%$BInfoValue1%' )   $BInfoItem3   (species  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='ES1' )&&( $BInfoItem2 =='KW2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (effect  like '%$BInfoValue1%' )   $BInfoItem3   (gene_description  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='ES1' )&&( $BInfoItem2 =='FC2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (effect  like '%$BInfoValue1%' )   $BInfoItem3   (hormone_role  like '%$BInfoValue2%' )  ";
        }
        elseif(( $BInfoItem1 =='ES1' )&&( $BInfoItem2 =='ES2' )){
            $sql="select distinct locus_name,species,hormone_role,effect,gene_evidence,pmid,genbank_id,accesse_id,alias FROM gene_hormone_info WHERE  (effect  like '%$BInfoValue1%' )   $BInfoItem3   (effect  like '%$BInfoValue2%' )  ";
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

        echo "<form name='form1' id='form1' method='post' action='getseqtoweblab.php'>";

        //	<td class=header2C width='5%'></td>
        echo "<tr><td class=header2C width='20%'>Locus</td>
	<td class=header2C width='15%'>Species</td>
	<td class=header2C width='20%'>Function</td>
	<td class=header2C width='10%'>Effect</td>
	<td class=header2C width='25%'>Evidence</td></tr>";
        //	<td class=header2C width='10%'>Sequence</td>


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
//	echo "<td width='5%' > <input type='checkbox' name='item_$info[7]' value='$info[7]'></input></td>";
            if($info[0] != "UNCLONE"){
                echo "<td width='20%'><a href='get_gene_detail.php?AI=$info[7]'>$info[0]</a></td> ";}  // show locus_name
            elseif($info[6] == ""){
                echo "<td width='20%'><a href='get_gene_detail.php?AI=$info[7]'>$info[8]</a></td> ";}
            else {echo "<td width='10%'><a href='get_gene_detail.php?AI=$info[7]'>$info[6]</a></td> ";} // if no locus_name,show genbank_id
            echo "<td width='15%'><i>$info[1]</i></td>";
            $char_info=$info[2][strlen($info[2])-1];
            if($char_info==":"){$fun_array=explode(":",$info[2]); $fun=$fun_array[0];}
            else{$fun=$info[2];}
            echo "	<td width='20%' >$fun</td>
	
		<td width='10%'>$info[3]</td>";

            $gene_evidence_num_array=explode(");",$info[4]);
            $real_gene_evidence="";

            for($j=0;$j<count($gene_evidence_num_array);$j++){
                $gene_evidence_array=explode("(",$gene_evidence_num_array[$j]);
                if($real_gene_evidence!=""){$real_gene_evidence=$real_gene_evidence."; ".$gene_evidence_array[0];}
                else{$real_gene_evidence=$gene_evidence_array[0];}
            }
            echo "<td width='25%'>$real_gene_evidence</td>";
//	echo "<td width='10%'><select name='$info[7]' style='width:100%; height:100%'><option value='mRNA'>mRNA</option><option value= 'CDS'>CDS</option><option value='Protein'>Protein</option><option value= 'Genomic'>Genomic</option></select> </td>
            echo "</tr>";

            $ref="";
            $count++;


        }

        //echo "<tr><td colspan=7 bgcolor='white' class=r> <input type='submit' value='submit to WebLab'>&nbsp;<a href='/help/weblab.php'><img src='image/help.gif' width='15' height='15' border='0'/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='reset' value='Reset'></td></tr>
        echo " </form>";
        echo "</table></div></td></tr><tr><td colspan='2' class=c> <hr color='#006600' size='2' width='100%'><B>&copy;&nbsp;Center for Bioinformatics(<a href='http://www.cbi.pku.edu.cn' target='_blank'>CBI</a>), Peking University</B></td></tr></table></body></html>";

        ?>
