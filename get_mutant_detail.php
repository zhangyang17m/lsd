<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

$mutant_name=$_GET["MI"];


$sql="select distinct * FROM plant_info WHERE plant_name='$mutant_name'";

$re_gene=mysqli_query($conn,$sql) or die;

$info=mysqli_fetch_row($re_gene);

	$pmid=explode(";",$info[4]);
	for($i=0;$i<count($pmid);$i++){
		if($pmid[$i]!=""){
			if ($i > 0) {$ref = $ref . "; ";}
			$ref=$ref."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[$i] target=_blank>$pmid[$i]</a>";
		}
	}

?>
	
<div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">

<table border=0 width=94%  cellspacing=1  align="center">

<tr><td colspan=2 bgcolor=#ccccff width="100%">

<table width="100%"><tr><td width="80%"><a name="bi"></a><b><font size="2" color=#0000cc>Basic mutant information</font></b>&nbsp;&nbsp;&nbsp;</td>			
<td width="20%" align=right></td>

</tr></table>

</td></tr>

<?php
   
echo" <tr><td bgcolor=#DDF7DF width='30%'><b><font size='2'>Mutant name</font></b></td><td bgcolor=#E4E8EA width='70%'><font size='2'> $info[0] </font></td></tr>";
	
?>	
	
<!--	<tr><td bgcolor=#DDF7DF width='30%'><b><font size="2">Mutant/Transgenic</font></b></td>-->
<!--	<td bgcolor=#E4E8EA width='70%'><font size="2">--><?// echo $info[6]; ?><!--</font></td></tr>-->
<!--	-->
<!--	<tr><td bgcolor=#DDF7DF width='30%'><font size="2"><b>Ecotype</b></font></td>-->
<!--	<td bgcolor=#E4E8EA width='70%'><font size="2">--><?// echo $info[1]; ?><!--</font></td></tr>-->
<!--	-->
<!--	<tr><td bgcolor=#DDF7DF width='30%'><font size="2"><b>Mutagenesis type</b></font></td>-->
<!--	<td bgcolor=#E4E8EA width='70%'><font size="2">--><?// echo $info[2]; ?><!--</font></td></tr>-->
<!--	-->
<!--	<tr><td bgcolor=#DDF7DF width='30%'><font size="2"><b>(Semi-)Dominant/Recessive</b></font></td>-->
<!--	<td bgcolor=#E4E8EA width='70%'><font size="2">--><?php //echo $info[3]; ?><!--</font></td></tr>-->
<!--	-->
<!--	<tr><td bgcolor=#DDF7DF width='30%'><font size="2"><b>Description</b></font></td>-->
<!--	<td bgcolor=#E4E8EA width='70%'><font size="2">--><?php //echo $info[5]; ?><!--</font></td></tr>-->


<?php

echo "
    <tr><td bgcolor=#DDF7DF width='30%'><b><font size='2'>Mutant/Transgenic</font></b></td>
        <td bgcolor=#E4E8EA width='70%'><font size='2'>$info[6]</font></td></tr>

    <tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Ecotype</b></font></td>
        <td bgcolor=#E4E8EA width='70%'><font size='2'> $info[1]</font></td></tr>

    <tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Mutagenesis type</b></font></td>
        <td bgcolor=#E4E8EA width='70%'><font size='2'> $info[2]</font></td></tr>

    <tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>(Semi-)Dominant/Recessive</b></font></td>
        <td bgcolor=#E4E8EA width='70%'><font size='2'> $info[3]</font></td></tr>

    <tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Description</b></font></td>
        <td bgcolor=#E4E8EA width='70%'><font size='2'> $info[5]</font></td></tr>
";
  ?>
	
<?php	

	if($info[4] != ""){
		echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>References</b></font></td><td bgcolor=#E4E8EA width='70%'><font size='2'></br>";
}

?>

<?php
	
if ($info[4] == "Reported by LSD"){
	echo "Reported by LSD<br/><br/>";
}

else{
$pmid=explode(";",$info[4]);
$num=0;
for ($i=0;$i<count($pmid);$i++){

        if ($pmid[$i] == "0"){

                $num=$i+1;
                $real_pmd_journal_title_date="Plant, Cell & Environment 2004, 27(5):521-549.";
                $pmd_paper_author="Y.GUO, Z.CAI, S.GAN.";
                $pmd_paper_title="Transcriptome of Arabidopsis leaf senescence.";
                $pmd_paper_author=$num.": ".$pmd_paper_author;
                echo "$pmd_paper_author</br><a href=http://onlinelibrary.wiley.com/doi/10.1111/j.1365-3040.2003.01158.x/abstract target=_blank><font size='2'>$pmd_paper_title</font></a></br>$real_pmd_journal_title_date</br></br>";
        }

        elseif ($pmid[$i] == "1"){
                $num=$i+1;
                $real_pmd_journal_title_date="Physiologia Plantarum 1996, 97(3):576-582.";
                $pmd_paper_author="Pï¿½rez-Rodrï¿½guez J, Valpuesta V.";
                $pmd_paper_title="Expression of glutamine synthetase genes during natural senescence of tomato leaves.";
                $pmd_paper_author=$num.":  ".$pmd_paper_author;
                echo "$pmd_paper_author</br><a href=http://onlinelibrary.wiley.com/doi/10.1111/j.1399-3054.1996.tb00518.x/abstract target=_blank><font size='2'>$pmd_paper_title</font></a></br>$real_pmd_journal_title_date</br></br>";
        }
        elseif ($pmid[$i] == "2"){

            $num=$i+1;

            $real_pmd_journal_title_date="Journal of Plant Biology 2009, 52:79.";

            $pmd_paper_author="Soon Il KwonHong Joo ChoKisuk BaeJin Hee JungHak Chul JinOhkmae K. Park.";

            $pmd_paper_title="Role of an Arabidopsis Rab GTPase RabG3b in Pathogen Response and Leaf Senescence.";

            $pmd_paper_author=$num.":  ".$pmd_paper_author;

            echo "$pmd_paper_author</br><a href=https://link.springer.com/article/10.1007%2Fs12374-009-9011-4 target=_blank><font size='2'>$pmd_paper_title</font></a></br>$real_pmd_journal_title_date</br></br>";

        }

        elseif ($pmid[$i] == "3"){

            $num=$i+1;

            $real_pmd_journal_title_date="Scientia Horticulturae 2014, 165:51-61.";

            $pmd_paper_author="Ping Wang, Xun Sun, Zhiyong Yue, Dong Liang, Na Wang, Fengwang Ma.";

            $pmd_paper_title="Isolation and characterization of MdATG18a, a WD40-repeat AuTophaGy-related gene responsive to leaf senescence and abiotic stress in Malus.";

            $pmd_paper_author=$num.":  ".$pmd_paper_author;

            echo "$pmd_paper_author</br><a href=https://doi.org/10.1016/j.scienta.2013.10.038 target=_blank><font size='2'>$pmd_paper_title</font></a></br>$real_pmd_journal_title_date</br></br>";

        }

        elseif($pmid[$i] != ""){
                $sql_pubmed="select distinct * FROM pubmed WHERE pubmed_id='$pmid[$i]'";
                $re_pubmed=mysqli_query($conn, $sql_pubmed) or die;
                $info_pubmed=mysqli_fetch_row($re_pubmed);
                $num=$i+1;
                $real_pmd_journal_title_date=$info_pubmed[3];
                $pmd_paper_author=$info_pubmed[1];
                $pmd_paper_title=$info_pubmed[2];
                $pmd_paper_author=$num.":  ".$pmd_paper_author;
                echo "$pmd_paper_author</br><a href=http://www.ncbi.nlm.nih.gov/pubmed?cmd=search&term=$pmid[$i] target=_blank><font size='2'>$pmd_paper_title</font></a></br>$real_pmd_journal_title_date</br></br>";
        }

}
}

?>	

</font></td></tr>
	
<?php

$sql="select * FROM gene_hormone_plant where plant_name='$mutant_name'";
$result=mysqli_query($conn,$sql) or die;
$re_num=mysqli_num_rows($result);

if($re_num==1)

{ 
   
   echo "<tr><td colspan=2 bgcolor=#ccccff width='100%'><table width='100%'><tr><td width='80%'><a name='cr'></a><b><font size='2' color=#0000cc>Mutated genes</font></b>&nbsp;&nbsp;&nbsp;</td></tr><td width='20%' align=right></td></tr></table></td></tr>";

   $info_mutant=mysqli_fetch_row($result);
   $mutant_access_id=$info_mutant[6];
   
//   $sql_gene="select * FROM gene_hormone_info where CONCAT('LSD_', id)='$mutant_access_id'";
   $sql_gene="select * FROM gene_hormone_info where accesse_id='$mutant_access_id'";
   $result_gene=mysqli_query($conn, $sql_gene) or die;
   $info_gene=mysqli_fetch_row($result_gene);
//   $accesse_id = 'LSD_' . $info_gene[0];
   $accesse_id = $info_gene[10];

   if ($info_gene[1]!="UNCLONE"){ 
     echo" <tr><td bgcolor=#DDF7DF width='30%'><b><font size='2'>Locus name</font></b></td>
     <td bgcolor=#E4E8EA width='70%'><font size='2'> <a href='get_gene_detail.php?AI=$accesse_id'>$info_gene[1]</a> </font></td></tr>";

     if($info_gene[2] != ""){
   echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Alias</b></font></td>
   <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[2]</font></td></tr>";}

   echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Organism</b></font></td>
   <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[9]</font></td></tr>";

   echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Description</b></font></td>
   <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[5]</font></td></tr>";


}
   
   elseif($info_gene[11] == ""){
   echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Alias</b></font></td>
     <td bgcolor=#E4E8EA width='70%'><font size='2'> <a href='get_gene_detail.php?AI=$accesse_id'>$info_gene[2]</a> </font></td></tr>";

   echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Organism</b></font></td>
   <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[9]</font></td></tr>";

   echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Description</b></font></td>
   <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[5]</font></td></tr>";

	
	}

   else{
     echo" <tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>GenBank ID</b></font></td>
     <td bgcolor=#E4E8EA width='70%'><font size='2'> <a href='get_gene_detail.php?AI=$accesse_id'>$info_gene[11]</a> </font></td></tr>";
    
    if($info_gene[2] != ""){
   echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Alias</b></font></td>
   <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[2]</font></td></tr>";}

   echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Organism</b></font></td>
   <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[9]</font></td></tr>";

   echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Description</b></font></td>
   <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[5]</font></td></tr>";


    }
}

if($re_num > 1) { 
  echo "<tr><td colspan=2 bgcolor=#ccccff width='100%'><table width='100%'><tr><td width='80%'><a name='cr'></a><b><font size='2' color=#0000cc>Mutated genes</font></b>&nbsp;&nbsp;&nbsp;</td><td width='20%' align=right></td></tr></table></td></tr>";
  $num_mutant=1;
  while($info_mutant=mysqli_fetch_array($result)){
     
   $mutant_access_id=$info_mutant[6];
      $sql_gene="select * FROM gene_hormone_info where accesse_id='$mutant_access_id'";
   $result_gene=mysqli_query($conn, $sql_gene) or die;
   $info_gene=mysqli_fetch_row($result_gene);
   $accesse_id= $info_gene[10];
   
   echo"<tr><td colspan=2 width='100%' >
		<table width='100%'  cellspacing='1'  ><tr><td rowspan='5' bgcolor=#DDF7DF width='10%'><b><font size='2' color='#CC3399'>Mutated Gene $num_mutant</font></b></td>";

   if($info_gene[1]!="UNCLONE"){
   	   echo" <td bgcolor=#DDF7DF width='20%'><b><font size='2'>Locus name</font></b></td>
    <td bgcolor=#E4E8EA width='70%'><font size='2'><a href='get_gene_detail.php?AI=$accesse_id'>$info_gene[1]</a> </font></td></tr>";
	   if($info_gene[2] != ""){
        echo "<tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Alias</b></font></td>
        <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[2]</font></td></tr>";
        }

        echo "<tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Organism</b></font></td>
        <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[9]</font></td></tr>";


    echo "<tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Description</b></font></td>
        <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[5]</font></td></tr>";

}
    
   elseif($info_gene[11] == ""){
	echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Alias</b></font></td>
	<td bgcolor=#E4E8EA width='70%'><font size='2'> <a href='get_gene_detail.php?AI=$accesse_id'>$info_gene[2]</a> </font></td></tr>";

        echo "<tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Organism</b></font></td>
        <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[9]</font></td></tr>";

    echo "<tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Description</b></font></td>
        <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[5]</font></td></tr>";
}

   else{
	   echo" <td bgcolor=#DDF7DF width='20%'><font size='2'><b>GenBank ID</b></font></td>
	<td bgcolor=#E4E8EA width='70%'><font size='2'><a href='get_gene_detail.php?AI=$accesse_id'>$info_gene[11]</a></font></td></tr>";
		if($info_gene[2] != ""){
        echo "<tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Alias</b></font></td>
        <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[2]</font></td></tr>";
        }

        echo "<tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Organism</b></font></td>
        <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[9]</font></td></tr>";


    echo "<tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Description</b></font></td>
        <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_gene[5]</font></td></tr>";
	


}
	 echo "</table></td></tr>";
	 $num_mutant++;
	 
	}
}

?>

	<tr><td colspan=2 bgcolor=#ccccff width="100%">
	<table width="100%"><tr><td width="80%"  ><a name="cr"></a><b><font size="2" color=#0000cc>Phenotype information</font></b>&nbsp;&nbsp;&nbsp;</td>
	<td width="20%" align=right></td>
	</tr></table>
	</td></tr>

<?php

print_phenotype_show($mutant_name);

?>

</table></div></td></tr>

<?
require ('common_footer.php');
?>

</table>
</body>
</html>

