<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');
?>
<!DOCTYPE html>
<html>
<head>


	<link rel="StyleSheet" href="/dtree.css" type="text/css" />
	<script type="text/javascript" src="/dtree.js"></script>

</head>
<body>
<div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">
  <p class="info1">
  <span style="color: black; font-size: x-small; "><a href="javascript: d.openAll();"><font color=black size=2  >+ Expand all </font></a>&nbsp;&nbsp;&nbsp;<a href="javascript: d.closeAll();"><font color=black size=2 >- Collapse all </font></a></span>&nbsp;&nbsp;&nbsp;<a href="/faq/Phenotype_Ontology.php"><img src='image/help.gif' width='15' height='15' border='0'/></a></p>


    <script type="text/javascript">
        d = new dTree('d');
        d.add(0,-1,'Phenotype');

      <?php
        $sql_m_1="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'";
        $result_m_1=mysqli_query($conn, $sql_m_1) or die;
        $re_num_m_1=mysqli_num_rows($result_m_1);

        $sql_g_1="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.plant_name = gene_hormone_plant.plant_name";
        $result_g_1=mysqli_query($conn, $sql_g_1) or die;
        $re_num_g_1=mysqli_num_rows($result_g_1);
        ?>
        var str='Natural senescence (<?php echo $re_num_m_1?> mutant, <?php echo $re_num_g_1?> gene)';

        d.add(1,0,str,'','','','','','open');
        <?php
        $sql_m_2="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Chlorophyll content'";
        $result_m_2=mysqli_query($conn, $sql_m_2) or die;
        $re_num_m_2=mysqli_num_rows($result_m_2);

        $sql_g_2="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Chlorophyll content' and phenotype.plant_name = gene_hormone_plant.plant_name";
        $result_g_2=mysqli_query($conn, $sql_g_2) or die;
        $re_num_g_2=mysqli_num_rows($result_g_2);
        ?>
        var str='Chlorophyll content (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Chlorophyll_content><font color=#FF0000><?php echo $re_num_m_2?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Chlorophyll_content><font color=#FF0000><?php echo $re_num_g_2?></font></a> genes)';
        d.add(2,1,str);
        <?php
        $sql_m_3="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Chloroplast structure'";
        $result_m_3=mysqli_query($conn, $sql_m_3) or die;
        $re_num_m_3=mysqli_num_rows($result_m_3);

        $sql_g_3="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Chloroplast structure' and phenotype.plant_name =  gene_hormone_plant.plant_name";
        $result_g_3=mysqli_query($conn, $sql_g_3) or die;
        $re_num_g_3=mysqli_num_rows($result_g_3);
        ?>
        var str='Chloroplast structure (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Chloroplast_structure><font color=#FF0000><?php echo $re_num_m_3?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Chloroplast_structure><font color=#FF0000><?php echo $re_num_g_3?></font></a> genes)';
        d.add(3,1,str);
        <?php
        $sql_m_4="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Leaf color'";
        $result_m_4=mysqli_query($conn, $sql_m_4) or die;
        $re_num_m_4=mysqli_num_rows($result_m_4);

        $sql_g_4="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Leaf color' and phenotype.plant_name =  gene_hormone_plant.plant_name";
        $result_g_4=mysqli_query($conn, $sql_g_4) or die;
        $re_num_g_4=mysqli_num_rows($result_g_4);
        ?>
        var str='Leaf color (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Leaf_color><font color=#FF0000><?php echo $re_num_m_4?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Leaf_color><font color=#FF0000><?php echo $re_num_g_4?></font></a> genes)';
        d.add(4,1,str);


        <?php
        $sql_m_5="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Fv/Fm'";
        $result_m_5=mysqli_query($conn, $sql_m_5) or die;
        $re_num_m_5=mysqli_num_rows($result_m_5);

        $sql_g_5="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Fv/Fm' and phenotype.plant_name =  gene_hormone_plant.plant_name";
        $result_g_5=mysqli_query($conn, $sql_g_5) or die;
        $re_num_g_5=mysqli_num_rows($result_g_5);
        ?>
        var str='Fv/Fm (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Fv/Fm><font color=#FF0000><?php echo $re_num_m_5?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Fv/Fm><font color=#FF0000><?php echo $re_num_g_5?></font></a> genes)';
        d.add(5,1,str);
        <?php
        $sql_m_6="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Marker gene expression'";
        $result_m_6=mysqli_query($conn, $sql_m_6) or die;
        $re_num_m_6=mysqli_num_rows($result_m_6);

        $sql_g_6="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Marker gene expression' and phenotype.plant_name =  gene_hormone_plant.plant_name";
        $result_g_6=mysqli_query($conn, $sql_g_6) or die;
        $re_num_g_6=mysqli_num_rows($result_g_6);
        ?>
        var str='Marker gene expression (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Marker_gene_expression><font color=#FF0000><?php echo $re_num_m_6?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Marker_gene_expression><font color=#FF0000><?php echo $re_num_g_6?></font></a> genes)';
        d.add(6,1,str);


        <?php
        $sql_m_7="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute like '%Cell death marker%'";
        $result_m_7=mysqli_query($conn, $sql_m_7) or die;
        $re_num_m_7=mysqli_num_rows($result_m_7);

        $sql_g_7="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute like '%Cell death marker%' and phenotype.plant_name =  gene_hormone_plant.plant_name";
        $result_g_7=mysqli_query($conn, $sql_g_7) or die;
        $re_num_g_7=mysqli_num_rows($result_g_7);
        ?>
        var str='Cell death marker (<?php echo $re_num_m_7?> mutant, <?php echo $re_num_g_7?> gene)';
        d.add(7,1,str);
        <?php
        $sql_m_8="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Cell death marker:Ion leakage'";
        $result_m_8=mysqli_query($conn, $sql_m_8) or die;
        $re_num_m_8=mysqli_num_rows($result_m_8);

        $sql_g_8="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Cell death marker:Ion leakage' and phenotype.plant_name =  gene_hormone_plant.plant_name";
        $result_g_8=mysqli_query($conn, $sql_g_8) or die;
        $re_num_g_8=mysqli_num_rows($result_g_8);
        ?>
        var str='Ion leakage (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Cell_death_marker:Ion_leakage><font color=#FF0000><?php echo $re_num_m_8?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Cell_death_marker:Ion_leakage><font color=#FF0000><?php echo $re_num_g_8?></font></a> genes)';
        d.add(8,7,str);
        <?php
        $sql_m_9="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Cell death marker:DNA ladder'";
        $result_m_9=mysqli_query($conn, $sql_m_9) or die;
        $re_num_m_9=mysqli_num_rows($result_m_9);

        $sql_g_9="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Cell death marker:DNA ladder' and phenotype.plant_name =  gene_hormone_plant.plant_name";
        $result_g_9=mysqli_query($conn, $sql_g_9) or die;
        $re_num_g_9=mysqli_num_rows($result_g_9);
        ?>
        var str='DNA ladder (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Cell_death_marker:DNA_ladder><font color=#FF0000><?php echo $re_num_m_9?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Cell_death_marker:DNA_ladder><font color=#FF0000><?php echo $re_num_g_9?></font></a> genes)';
        d.add(9,7,str);
        <?php
        $sql_m_10="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Cell death marker:Trypan Blue staining'";
        $result_m_10=mysqli_query($conn, $sql_m_10) or die;
        $re_num_m_10=mysqli_num_rows($result_m_10);

        $sql_g_10="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Cell death marker:Trypan Blue staining' and  phenotype.plant_name =  gene_hormone_plant.plant_name";
        $result_g_10=mysqli_query($conn, $sql_g_10) or die;
        $re_num_g_10=mysqli_num_rows($result_g_10);
        ?>
        var str='Trypan Blue staining (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Cell_death_marker:Trypan_Blue_staining><font color=#FF0000><?php echo $re_num_m_10?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Cell_death_marker:Trypan_Blue_staining><font color=#FF0000><?php echo $re_num_g_10?></font></a> genes)';
        d.add(10,7,str);

        <?php
                         $sql_m_11="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Cell death marker:other'";
                         $result_m_11=mysqli_query($conn, $sql_m_11) or die;
             $re_num_m_11=mysqli_num_rows($result_m_11);

                         $sql_g_11="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Cell death marker:other' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_11=mysqli_query($conn, $sql_g_11) or die;
             $re_num_g_11=mysqli_num_rows($result_g_11);
       ?>
               var str='other (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Cell_death_marker:other><font color=#FF0000><?php echo $re_num_m_11?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Cell_death_marker:other><font color=#FF0000><?php echo $re_num_g_11?></font></a> genes)';     
		d.add(11,7,str);
		
		
		
		
		<?php
                          $sql_m_12="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute like '%Redox status%'";
                         $result_m_12=mysqli_query($conn, $sql_m_12) or die;
             $re_num_m_12=mysqli_num_rows($result_m_12);

                         $sql_g_12="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute like '%Redox status%' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_12=mysqli_query($conn, $sql_g_12) or die;
             $re_num_g_12=mysqli_num_rows($result_g_12);
       ?>
               var str='Redox status (<?php echo $re_num_m_12?> mutant, <?php echo $re_num_g_12?> gene)';			   
		d.add(12,1,str);
		
		
		
		<?php
                         $sql_m_13="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Redox status:ROS'";
                         $result_m_13=mysqli_query($conn, $sql_m_13) or die;
             $re_num_m_13=mysqli_num_rows($result_m_13);

                         $sql_g_13="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Redox status:ROS'  and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_13=mysqli_query($conn, $sql_g_13) or die;
             $re_num_g_13=mysqli_num_rows($result_g_13);
       ?>
               var str='ROS (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Redox_status:ROS><font color=#FF0000><?php echo $re_num_m_13?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Redox_status:ROS><font color=#FF0000><?php echo $re_num_g_13?></font></a> genes)';
		d.add(13,12,str);
		
		
		
		
		<?php
                         $sql_m_14="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Redox status:Ascorbic Acid'";
                         $result_m_14=mysqli_query($conn, $sql_m_14) or die;
             $re_num_m_14=mysqli_num_rows($result_m_14);

                         $sql_g_14="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Redox status:Ascorbic Acid'  and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_14=mysqli_query($conn, $sql_g_14) or die;
             $re_num_g_14=mysqli_num_rows($result_g_14);
       ?>
               var str='Ascorbic Acid (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Redox_status:Ascorbic_Acid><font color=#FF0000><?php echo $re_num_m_14?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Redox_status:Ascorbic_Acid><font color=#FF0000><?php echo $re_num_g_14?></font></a> genes)';		
		d.add(14,12, str);
		
		
		
		<?php
                         $sql_m_15="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Redox status:Polyamine'";
                         $result_m_15=mysqli_query($conn, $sql_m_15) or die;
             $re_num_m_15=mysqli_num_rows($result_m_15);

                         $sql_g_15="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Redox status:Polyamine'  and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_15=mysqli_query($conn, $sql_g_15) or die;
             $re_num_g_15=mysqli_num_rows($result_g_15);
       ?>
               var str='Polyamine (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Redox_status:Polyamine><font color=#FF0000><?php echo $re_num_m_15?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Redox_status:Polyamine><font color=#FF0000><?php echo $re_num_g_15?></font></a> genes)';		
		d.add(15,12,str);
		
		
		<?php
                         $sql_m_16="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Redox status:other'";
                         $result_m_16=mysqli_query($conn, $sql_m_16) or die;
             $re_num_m_16=mysqli_num_rows($result_m_16);

                         $sql_g_16="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Redox status:other' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_16=mysqli_query($conn, $sql_g_16) or die;
             $re_num_g_16=mysqli_num_rows($result_g_16);
       ?>
               var str='other (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Redox_status:other><font color=#FF0000><?php echo $re_num_m_16?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Redox_status:other><font color=#FF0000><?php echo $re_num_g_16?></font></a> genes)';		
		d.add(16,12,str);
		
		
		
		 <?php
                          $sql_m_17="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute like '%Biomass%'";
                         $result_m_17=mysqli_query($conn, $sql_m_17) or die;
             $re_num_m_17=mysqli_num_rows($result_m_17);

                         $sql_g_17="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute like '%Biomass%' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_17=mysqli_query($conn, $sql_g_17) or die;
             $re_num_g_17=mysqli_num_rows($result_g_17);
       ?>
               var str='Biomass (<?php echo $re_num_m_17?> mutant, <?php echo $re_num_g_17?>
gene)';						   
		d.add(17,1,str);
		
		
		
		<?php
                         $sql_m_18="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Biomass:leaves'";
                         $result_m_18=mysqli_query($conn, $sql_m_18) or die;
             $re_num_m_18=mysqli_num_rows($result_m_18);

                         $sql_g_18="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Biomass:leaves'  and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_18=mysqli_query($conn, $sql_g_18) or die;
             $re_num_g_18=mysqli_num_rows($result_g_18);
       ?>
               var str='leaves (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Biomass:leaves><font color=#FF0000><?php echo $re_num_m_18?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Biomass:leaves><font color=#FF0000><?php echo $re_num_g_18?></font></a> genes)';	
		d.add(18,17,str);
		
		
		
		<?php
                         $sql_m_19="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Biomass:seeds'";
                         $result_m_19=mysqli_query($conn, $sql_m_19) or die;
             $re_num_m_19=mysqli_num_rows($result_m_19);

                         $sql_g_19="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Biomass:seeds' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_19=mysqli_query($conn, $sql_g_19) or die;
             $re_num_g_19=mysqli_num_rows($result_g_19);
       ?>
               var str='seeds (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Biomass:seeds><font color=#FF0000><?php echo $re_num_m_19?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Biomass:seeds><font color=#FF0000><?php echo $re_num_g_19?></font></a> genes)';		
		d.add(19,17,str);
		
		
		
		<?php
                         $sql_m_20="SELECT distinct plant_name FROM phenotype WHERE organ='Natural senescence'and attribute='Biomass:fresh weight'";
                         $result_m_20=mysqli_query($conn, $sql_m_20) or die;
             $re_num_m_20=mysqli_num_rows($result_m_20);

                         $sql_g_20="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Natural senescence' and phenotype.attribute='Biomass:fresh weight'  and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_20=mysqli_query($conn, $sql_g_20) or die;
             $re_num_g_20=mysqli_num_rows($result_g_20);
       ?>
               var str='fresh weight (<a href=phenotypesearchmutant.php?organ=Natural_senescence&attribute=Biomass:fresh_weight><font color=#FF0000><?php echo $re_num_m_20?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Natural_senescence&attribute=Biomass:fresh_weight><font color=#FF0000><?php echo $re_num_g_20?></font></a> genes)';		
		d.add(20,17,str);
		
		<?php
                         $sql_m_22="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'";
                         $result_m_22=mysqli_query($conn, $sql_m_22) or die;
             $re_num_m_22=mysqli_num_rows($result_m_22);

                         $sql_g_22="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_22=mysqli_query($conn, $sql_g_22) or die;
             $re_num_g_22=mysqli_num_rows($result_g_22);
       ?>
               var str='Darkness induced senescence (<?php echo $re_num_m_22?> mutant, <?php echo $re_num_g_22?> gene)';
		d.add(22,0,str);
		
		
		<?php
                         $sql_m_23="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Chlorophyll content'";
                         $result_m_23=mysqli_query($conn, $sql_m_23) or die;
             $re_num_m_23=mysqli_num_rows($result_m_23);

                         $sql_g_23="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Chlorophyll content' and phenotype.plant_name = gene_hormone_plant.plant_name";
                         $result_g_23=mysqli_query($conn, $sql_g_23) or die;
             $re_num_g_23=mysqli_num_rows($result_g_23);
       ?>
               var str='Chlorophyll content (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Chlorophyll_content><font color=#FF0000><?php echo $re_num_m_23?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Chlorophyll_content><font color=#FF0000><?php echo $re_num_g_23?></font></a> genes)';			
		d.add(23,22,str);
		
		
		
		 <?php
                         $sql_m_24="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Chloroplast structure'";
                         $result_m_24=mysqli_query($conn, $sql_m_24) or die;
             $re_num_m_24=mysqli_num_rows($result_m_24);

                         $sql_g_24="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Chloroplast structure' and phenotype.plant_name=  gene_hormone_plant.plant_name";
                         $result_g_24=mysqli_query($conn, $sql_g_24) or die;
             $re_num_g_24=mysqli_num_rows($result_g_24);
       ?>
               var str='Chloroplast structure (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Chloroplast_structure><font color=#FF0000><?php echo $re_num_m_24?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Chloroplast_structure><font color=#FF0000><?php echo $re_num_g_24?></font></a> genes)';			
		d.add(24,22,str);
		
		
		
		<?php
                         $sql_m_25="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Leaf color'";
                         $result_m_25=mysqli_query($conn, $sql_m_25) or die;
             $re_num_m_25=mysqli_num_rows($result_m_25);

                         $sql_g_25="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Leaf color' and phenotype.plant_name =gene_hormone_plant.plant_name";
                         $result_g_25=mysqli_query($conn, $sql_g_25) or die;
             $re_num_g_25=mysqli_num_rows($result_g_25);
       ?>
               var str='Leaf color (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Leaf_color><font color=#FF0000><?php echo $re_num_m_25?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Leaf_color><font color=#FF0000><?php echo $re_num_g_25?></font></a> genes)';	
		d.add(25,22,str);
		
		
		
		<?php
                         $sql_m_26="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Fv/Fm'";
                         $result_m_26=mysqli_query($conn, $sql_m_26) or die;
             $re_num_m_26=mysqli_num_rows($result_m_26);

                         $sql_g_26="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Fv/Fm' and phenotype.plant_name =gene_hormone_plant.plant_name";
                         $result_g_26=mysqli_query($conn, $sql_g_26) or die;
             $re_num_g_26=mysqli_num_rows($result_g_26);
       ?>
               var str='Fv/Fm (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Fv/Fm><font color=#FF0000><?php echo $re_num_m_26?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Fv/Fm><font color=#FF0000><?php echo $re_num_g_26?></font></a> genes)';		
		d.add(26,22,str);
		
		
		
		<?php
                         $sql_m_27="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Marker gene expression'";
                         $result_m_27=mysqli_query($conn, $sql_m_27) or die;
             $re_num_m_27=mysqli_num_rows($result_m_27);

                         $sql_g_27="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Marker gene expression' and phenotype.plant_name=  gene_hormone_plant.plant_name";
                         $result_g_27=mysqli_query($conn, $sql_g_27) or die;
             $re_num_g_27=mysqli_num_rows($result_g_27);
       ?>
               var str='Marker gene expression (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Marker_gene_expression><font color=#FF0000><?php echo $re_num_m_27?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Marker_gene_expression><font color=#FF0000><?php echo $re_num_g_27?></font></a> genes)';		
		d.add(27,22,str);
		
		
		
		 <?php
                          $sql_m_28="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute like '%Cell death marker%'";
                         $result_m_28=mysqli_query($conn, $sql_m_28) or die;
             $re_num_m_28=mysqli_num_rows($result_m_28);

                         $sql_g_28="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute like '%Cell death marker%' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_28=mysqli_query($conn, $sql_g_28) or die;
             $re_num_g_28=mysqli_num_rows($result_g_28);
       ?>
               var str='Cell death marker (<?php echo $re_num_m_28?> mutant, <?php echo $re_num_g_28?>
gene)';			   
		d.add(28,22,str);
		
		
		
		
		   <?php
                         $sql_m_29="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Cell death marker:Ion leakage'";
                         $result_m_29=mysqli_query($conn, $sql_m_29) or die;
             $re_num_m_29=mysqli_num_rows($result_m_29);

                         $sql_g_29="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Cell death marker:Ion leakage' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_29=mysqli_query($conn, $sql_g_29) or die;
             $re_num_g_29=mysqli_num_rows($result_g_29);
       ?>
               var str='Ion leakage (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Cell_death_marker:Ion_leakage><font color=#FF0000><?php echo $re_num_m_29?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Cell_death_marker:Ion_leakage><font color=#FF0000><?php echo $re_num_g_29?></font></a> genes)';		
		d.add(29,28,str);
		
		
		<?php
                         $sql_m_30="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Cell death marker:DNA ladder'";
                         $result_m_30=mysqli_query($conn, $sql_m_30) or die;
             $re_num_m_30=mysqli_num_rows($result_m_30);

                         $sql_g_30="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Cell death marker:DNA ladder' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_30=mysqli_query($conn, $sql_g_30) or die;
             $re_num_g_30=mysqli_num_rows($result_g_30);
       ?>
               var str='DNA ladder (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Cell_death_marker:DNA_ladder><font color=#FF0000><?php echo $re_num_m_30?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Cell_death_marker:DNA_ladder><font color=#FF0000><?php echo $re_num_g_30?></font></a> genes)';		
		d.add(30,28, str);
		
		
		
		
		<?php
                         $sql_m_31="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Cell death marker:Trypan Blue staining'";
                         $result_m_31=mysqli_query($conn, $sql_m_31) or die;
             $re_num_m_31=mysqli_num_rows($result_m_31);

                         $sql_g_31="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Cell death marker:Trypan Blue staining' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_31=mysqli_query($conn, $sql_g_31) or die;
             $re_num_g_31=mysqli_num_rows($result_g_31);
       ?>
               var str='Trypan Blue staining (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Cell_death_marker:Trypan_Blue_staining><font color=#FF0000><?php echo $re_num_m_31?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Cell_death_marker:Trypan_Blue_staining><font color=#FF0000><?php echo $re_num_g_31?></font></a> genes)';     		
		d.add(31,28,str);
		
		
		
		
		
		
		<?php
                         $sql_m_32="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Cell death marker:other'";
                         $result_m_32=mysqli_query($conn, $sql_m_32) or die;
             $re_num_m_32=mysqli_num_rows($result_m_32);

                         $sql_g_32="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Cell death marker:other'  and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_32=mysqli_query($conn, $sql_g_32) or die;
             $re_num_g_32=mysqli_num_rows($result_g_32);
       ?>
               var str='other (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Cell_death_marker:other><font color=#FF0000><?php echo $re_num_m_32?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Cell_death_marker:other><font color=#FF0000><?php echo $re_num_g_32?></font></a> genes)';                 
		d.add(32,28,str);
		
		
		
		<?php
                          $sql_m_33="SELECT distinct plant_name FROM phenotype WHERE
organ='Darkness induced senescence'and attribute like '%Redox status%'";
                         $result_m_33=mysqli_query($conn, $sql_m_33) or die;
             $re_num_m_33=mysqli_num_rows($result_m_33);

                         $sql_g_33="SELECT distinct gene_hormone_plant.accesse_id FROM
gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence'
and phenotype.attribute like '%Redox status%' and
phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_33=mysqli_query($conn, $sql_g_33) or die;
             $re_num_g_33=mysqli_num_rows($result_g_33);
       ?>
               var str='Redox status (<?php echo $re_num_m_33?> mutant, <?php echo $re_num_g_33?> gene)';			   			   
		d.add(33,22,str);
		
		
		
		
		<?php
                         $sql_m_34="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Redox status:ROS'";
                         $result_m_34=mysqli_query($conn, $sql_m_34) or die;
             $re_num_m_34=mysqli_num_rows($result_m_34);

                         $sql_g_34="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Redox status:ROS'  and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_34=mysqli_query($conn, $sql_g_34) or die;
             $re_num_g_34=mysqli_num_rows($result_g_34);
       ?>
               var str='ROS (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Redox_status:ROS><font color=#FF0000><?php echo $re_num_m_34?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Redox_status:ROS><font color=#FF0000><?php echo $re_num_g_34?></font></a> genes)';		
		d.add(34,33,str);
		
		
		
		
		<?php
                         $sql_m_35="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Redox status:Ascorbic Acid'";
                         $result_m_35=mysqli_query($conn, $sql_m_35) or die;
             $re_num_m_35=mysqli_num_rows($result_m_35);

                         $sql_g_35="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Redox status:Ascorbic Acid' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_35=mysqli_query($conn, $sql_g_35) or die;
             $re_num_g_35=mysqli_num_rows($result_g_35);
       ?>
               var str='Ascorbic Acid (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Redox_status:Ascorbic_Acid><font color=#FF0000><?php echo $re_num_m_35?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Redox_status:Ascorbic_Acid><font color=#FF0000><?php echo $re_num_g_35?></font></a> genes)';	
		d.add(35,33,str);
		
		
		
		<?php
                         $sql_m_36="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Redox status:Polyamine'";
                         $result_m_36=mysqli_query($conn, $sql_m_36) or die;
             $re_num_m_36=mysqli_num_rows($result_m_36);

                         $sql_g_36="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Redox status:Polyamine' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_36=mysqli_query($conn, $sql_g_36) or die;
             $re_num_g_36=mysqli_num_rows($result_g_36);
       ?>
               var str='Polyamine (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Redox_status:Polyamine><font color=#FF0000><?php echo $re_num_m_36?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Redox_status:Polyamine><font color=#FF0000><?php echo $re_num_g_36?></font></a> genes)';		
		d.add(36,33,str);
		
		
		
		<?php
                         $sql_m_37="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Redox status:other'";
                         $result_m_37=mysqli_query($conn, $sql_m_37) or die;
             $re_num_m_37=mysqli_num_rows($result_m_37);

                         $sql_g_37="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Redox status:other' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_37=mysqli_query($conn, $sql_g_37) or die;
             $re_num_g_37=mysqli_num_rows($result_g_37);
       ?>
               var str='other (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Redox_status:other><font color=#FF0000><?php echo $re_num_m_37?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Redox_status:other><font color=#FF0000><?php echo $re_num_g_37?></font></a> genes)';
		d.add(37,33,str);
		
		
		
		
		<?php
                          $sql_m_38="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute like '%Biomass%'";
                         $result_m_38=mysqli_query($conn, $sql_m_38) or die;
             $re_num_m_38=mysqli_num_rows($result_m_38);

                         $sql_g_38="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute like '%Biomass%' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_38=mysqli_query($conn, $sql_g_38) or die;
             $re_num_g_38=mysqli_num_rows($result_g_38);
       ?>
               var str='Biomass (<?php echo $re_num_m_38?> mutant, <?php echo $re_num_g_38?> gene)';						   		
		d.add(38,22,str);
		
		
		
		
		<?php
                         $sql_m_39="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Biomass:leaves'";
                         $result_m_39=mysqli_query($conn, $sql_m_39) or die;
             $re_num_m_39=mysqli_num_rows($result_m_39);

                         $sql_g_39="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Biomass:leaves' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_39=mysqli_query($conn, $sql_g_39) or die;
             $re_num_g_39=mysqli_num_rows($result_g_39);
       ?>
               var str='leaves (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Biomass:leaves><font color=#FF0000><?php echo $re_num_m_39?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Biomass:leaves><font color=#FF0000><?php echo $re_num_g_39?></font></a> genes)';	
		d.add(39,38,str);
		
		
		
		
		<?php
                         $sql_m_40="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Biomass:seeds'";
                         $result_m_40=mysqli_query($conn, $sql_m_40) or die;
             $re_num_m_40=mysqli_num_rows($result_m_40);

                         $sql_g_40="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Biomass:seeds' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_40=mysqli_query($conn, $sql_g_40) or die;
             $re_num_g_40=mysqli_num_rows($result_g_40);
       ?>
               var str='seeds (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Biomass:seeds><font color=#FF0000><?php echo $re_num_m_40?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Biomass:seeds><font color=#FF0000><?php echo $re_num_g_40?></font></a> genes)';
		d.add(40,38,str);
		
		
		
		<?php
                         $sql_m_41="SELECT distinct plant_name FROM phenotype WHERE organ='Darkness induced senescence'and attribute='Biomass:fresh weight'";
                         $result_m_41=mysqli_query($conn, $sql_m_41) or die;
             $re_num_m_41=mysqli_num_rows($result_m_41);

                         $sql_g_41="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Darkness induced senescence' and phenotype.attribute='Biomass:fresh weight'  and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_41=mysqli_query($conn, $sql_g_41) or die;
             $re_num_g_41=mysqli_num_rows($result_g_41);
       ?>
               var str='fresh weight (<a href=phenotypesearchmutant.php?organ=Darkness_induced_senescence&attribute=Biomass:fresh_weight><font color=#FF0000><?php echo $re_num_m_41?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Darkness_induced_senescence&attribute=Biomass:fresh_weight><font color=#FF0000><?php echo $re_num_g_41?></font></a> genes)';
		d.add(41,38,str);
		
		<?php
                         $sql_m_43="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'";
                         $result_m_43=mysqli_query($conn, $sql_m_43) or die;
             $re_num_m_43=mysqli_num_rows($result_m_43);

                         $sql_g_43="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_43=mysqli_query($conn, $sql_g_43) or die;
             $re_num_g_43=mysqli_num_rows($result_g_43);
       ?>
               var str='Nutritional Deficiency induced (<?php echo $re_num_m_43?> mutant, <?php echo $re_num_g_43?>
gene)';
		d.add(43,0,str);
		
		
		
		<?php
                         $sql_m_44="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Chlorophyll content'";
                         $result_m_44=mysqli_query($conn, $sql_m_44) or die;
             $re_num_m_44=mysqli_num_rows($result_m_44);

                         $sql_g_44="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Chlorophyll content' and phenotype.plant_name = gene_hormone_plant.plant_name";
                         $result_g_44=mysqli_query($conn, $sql_g_44) or die;
             $re_num_g_44=mysqli_num_rows($result_g_44);
       ?>
               var str='Chlorophyll content (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Chlorophyll_content><font color=#FF0000><?php echo $re_num_m_44?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Chlorophyll_content><font color=#FF0000><?php echo $re_num_g_44?></font></a> genes)';		
		d.add(44,43, str);
		
		
		
		
		<?php
                         $sql_m_45="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Chloroplast structure'";
                         $result_m_45=mysqli_query($conn, $sql_m_45) or die;
             $re_num_m_45=mysqli_num_rows($result_m_45);

                         $sql_g_45="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Chloroplast structure' and phenotype.plant_name=  gene_hormone_plant.plant_name";
                         $result_g_45=mysqli_query($conn, $sql_g_45) or die;
             $re_num_g_45=mysqli_num_rows($result_g_45);
       ?>
               var str='Chloroplast structure (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Chloroplast_structure><font color=#FF0000><?php echo $re_num_m_45?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Chloroplast_structure><font color=#FF0000><?php echo $re_num_g_45?></font></a> genes)';		
		d.add(45,43,str);
		
		
		
		
		<?php
                         $sql_m_46="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Leaf color'";
                         $result_m_46=mysqli_query($conn, $sql_m_46) or die;
             $re_num_m_46=mysqli_num_rows($result_m_46);

                         $sql_g_46="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Leaf color' and phenotype.plant_name =gene_hormone_plant.plant_name";
                         $result_g_46=mysqli_query($conn, $sql_g_46) or die;
             $re_num_g_46=mysqli_num_rows($result_g_46);
       ?>
               var str='Leaf color (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Leaf_color><font color=#FF0000><?php echo $re_num_m_46?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Leaf_color><font color=#FF0000><?php echo $re_num_g_46?></font></a> genes)';		
		d.add(46,43,str);
		
		
		
		
		<?php
                         $sql_m_47="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Fv/Fm'";
                         $result_m_47=mysqli_query($conn, $sql_m_47) or die;
             $re_num_m_47=mysqli_num_rows($result_m_47);

                         $sql_g_47="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Fv/Fm' and phenotype.plant_name = gene_hormone_plant.plant_name";
                         $result_g_47=mysqli_query($conn, $sql_g_47) or die;
             $re_num_g_47=mysqli_num_rows($result_g_47);
       ?>
               var str='Fv/Fm (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Fv/Fm><font color=#FF0000><?php echo $re_num_m_47?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Fv/Fm><font color=#FF0000><?php echo $re_num_g_47?></font></a> genes)';	
		d.add(47,43,str);
		
		
		
		
		
		<?php
                         $sql_m_48="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Marker gene expression'";
                         $result_m_48=mysqli_query($conn, $sql_m_48) or die;
             $re_num_m_48=mysqli_num_rows($result_m_48);

                         $sql_g_48="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Marker gene expression' and phenotype.plant_name=  gene_hormone_plant.plant_name";
                         $result_g_48=mysqli_query($conn, $sql_g_48) or die;
             $re_num_g_48=mysqli_num_rows($result_g_48);
       ?>
               var str='Marker gene expression (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Marker_gene_expression><font color=#FF0000><?php echo $re_num_m_48?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Marker_gene_expression><font color=#FF0000><?php echo $re_num_g_48?></font></a> genes)';	
		d.add(48,43,str);
		
		
		
		
		
		<?php
                          $sql_m_49="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute like '%Cell death marker%'";
                         $result_m_49=mysqli_query($conn, $sql_m_49) or die;
             $re_num_m_49=mysqli_num_rows($result_m_49);

                         $sql_g_49="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute like '%Cell death marker%' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_49=mysqli_query($conn, $sql_g_49) or die;
             $re_num_g_49=mysqli_num_rows($result_g_49);
       ?>
               var str='Cell death marker (<?php echo $re_num_m_49?> mutant, <?php echo $re_num_g_49?>
gene)';			   			   
		d.add(49,43,str);
		
		
		
		
		
		 <?php
                         $sql_m_50="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Cell death marker:Ion leakage'";
                         $result_m_50=mysqli_query($conn, $sql_m_50) or die;
             $re_num_m_50=mysqli_num_rows($result_m_50);

                         $sql_g_50="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Cell death marker:Ion leakage' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_50=mysqli_query($conn, $sql_g_50) or die;
             $re_num_g_50=mysqli_num_rows($result_g_50);
       ?>
               var str='Ion leakage (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Cell_death_marker:Ion_leakage><font color=#FF0000><?php echo $re_num_m_50?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Cell_death_marker:Ion_leakage><font color=#FF0000><?php echo $re_num_g_50?></font></a> genes)';		
		d.add(50,49,str);
		
		
		
		
		
		<?php
                         $sql_m_51="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Cell death marker:DNA ladder'";
                         $result_m_51=mysqli_query($conn, $sql_m_51) or die;
             $re_num_m_51=mysqli_num_rows($result_m_51);

                         $sql_g_51="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Cell death marker:DNA ladder' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_51=mysqli_query($conn, $sql_g_51) or die;
             $re_num_g_51=mysqli_num_rows($result_g_51);
       ?>
               var str='DNA ladder (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Cell_death_marker:DNA_ladder><font color=#FF0000><?php echo $re_num_m_51?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Cell_death_marker:DNA_ladder><font color=#FF0000><?php echo $re_num_g_51?></font></a> genes)';	
		d.add(51,49,str);
		
		
		
		
		
		<?php
                         $sql_m_52="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Cell death marker:Trypan Blue staining'";
                         $result_m_52=mysqli_query($conn, $sql_m_52) or die;
             $re_num_m_52=mysqli_num_rows($result_m_52);

                         $sql_g_52="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Cell death marker:Trypan Blue staining'  and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_52=mysqli_query($conn, $sql_g_52) or die;
             $re_num_g_52=mysqli_num_rows($result_g_52);
       ?>
               var str='Trypan Blue staining (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Cell_death_marker:Trypan_Blue_staining><font color=#FF0000><?php echo $re_num_m_52?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Cell_death_marker:Trypan_Blue_staining><font color=#FF0000><?php echo $re_num_g_52?></font></a> genes)';    		
		d.add(52,49,str);
		
		
		
		
		<?php
                         $sql_m_53="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Cell death marker:other'";
                         $result_m_53=mysqli_query($conn, $sql_m_53) or die;
             $re_num_m_53=mysqli_num_rows($result_m_53);

                         $sql_g_53="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Cell death marker:other' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_53=mysqli_query($conn, $sql_g_53) or die;
             $re_num_g_53=mysqli_num_rows($result_g_53);
       ?>
               var str='other (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Cell_death_marker:other><font color=#FF0000><?php echo $re_num_m_53?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Cell_death_marker:other><font color=#FF0000><?php echo $re_num_g_53?></font></a> genes)'; 
		d.add(53,49,str);
		
		
		
		
		<?php
                          $sql_m_54="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute like '%Redox status%'";
                         $result_m_54=mysqli_query($conn, $sql_m_54) or die;
             $re_num_m_54=mysqli_num_rows($result_m_54);

                         $sql_g_54="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute like '%Redox status%' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_54=mysqli_query($conn, $sql_g_54) or die;
             $re_num_g_54=mysqli_num_rows($result_g_54);
       ?>
               var str='Redox status (<?php echo $re_num_m_54?> mutant, <?php echo $re_num_g_54?>
gene)';			   			   			
		d.add(54,43,str);
		
		
		
		
		<?php
                         $sql_m_55="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Redox status:ROS'";
                         $result_m_55=mysqli_query($conn, $sql_m_55) or die;
             $re_num_m_55=mysqli_num_rows($result_m_55);

                         $sql_g_55="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Redox status:ROS' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_55=mysqli_query($conn, $sql_g_55) or die;
             $re_num_g_55=mysqli_num_rows($result_g_55);
       ?>
               var str='ROS (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Redox_status:ROS><font color=#FF0000><?php echo $re_num_m_55?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Redox_status:ROS><font color=#FF0000><?php echo $re_num_g_55?></font></a> genes)';		
		d.add(55,54,str);
		
		
		
		
		<?php
                         $sql_m_56="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Redox status:Ascorbic Acid'";
                         $result_m_56=mysqli_query($conn, $sql_m_56) or die;
             $re_num_m_56=mysqli_num_rows($result_m_56);

                         $sql_g_56="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Redox status:Ascorbic Acid' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_56=mysqli_query($conn, $sql_g_56) or die;
             $re_num_g_56=mysqli_num_rows($result_g_56);
       ?>
               var str='Ascorbic Acid (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Redox_status:Ascorbic_Acid><font color=#FF0000><?php echo $re_num_m_56?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Redox_status:Ascorbic_Acid><font color=#FF0000><?php echo $re_num_g_56?></font></a> genes)';		
		d.add(56,54,str);
		
		
		
		
		<?php
                         $sql_m_57="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Redox status:Polyamine'";
                         $result_m_57=mysqli_query($conn, $sql_m_57) or die;
             $re_num_m_57=mysqli_num_rows($result_m_57);

                         $sql_g_57="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Redox status:Polyamine' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_57=mysqli_query($conn, $sql_g_57) or die;
             $re_num_g_57=mysqli_num_rows($result_g_57);
       ?>
               var str='Polyamine (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Redox_status:Polyamine><font color=#FF0000><?php echo $re_num_m_57?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Redox_status:Polyamine><font color=#FF0000><?php echo $re_num_g_57?></font></a> genes)';	
		d.add(57,54,str);
		
		
		
		
		
		<?php
                         $sql_m_58="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Redox status:other'";
                         $result_m_58=mysqli_query($conn, $sql_m_58) or die;
             $re_num_m_58=mysqli_num_rows($result_m_58);

                         $sql_g_58="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Redox status:other' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_58=mysqli_query($conn, $sql_g_58) or die;
             $re_num_g_58=mysqli_num_rows($result_g_58);
       ?>
               var str='other (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Redox_status:other><font color=#FF0000><?php echo $re_num_m_58?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Redox_status:other><font color=#FF0000><?php echo $re_num_g_58?></font></a> genes)';
		d.add(58,54,str);
		
		
		
		
		
		<?php
                          $sql_m_59="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute like '%Biomass%'";
                         $result_m_59=mysqli_query($conn, $sql_m_59) or die;
             $re_num_m_59=mysqli_num_rows($result_m_59);

                         $sql_g_59="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute like '%Biomass%' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_59=mysqli_query($conn, $sql_g_59) or die;
             $re_num_g_59=mysqli_num_rows($result_g_59);
       ?>
               var str='Biomass (<?php echo $re_num_m_59?> mutant, <?php echo $re_num_g_59?> gene)';						   			
		d.add(59,43,str);
		
		
		
		
		<?php
                         $sql_m_60="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Biomass:leaves'";
                         $result_m_60=mysqli_query($conn, $sql_m_60) or die;
             $re_num_m_60=mysqli_num_rows($result_m_60);

                         $sql_g_60="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Biomass:leaves'  and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_60=mysqli_query($conn, $sql_g_60) or die;
             $re_num_g_60=mysqli_num_rows($result_g_60);
       ?>
               var str='leaves (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Biomass:leaves><font color=#FF0000><?php echo $re_num_m_60?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Biomass:leaves><font color=#FF0000><?php echo $re_num_g_60?></font></a> genes)';	
		d.add(60,59,str);
		
		
		
		
		
		<?php
                         $sql_m_61="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Biomass:seeds'";
                         $result_m_61=mysqli_query($conn, $sql_m_61) or die;
             $re_num_m_61=mysqli_num_rows($result_m_61);

                         $sql_g_61="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Biomass:seeds' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_61=mysqli_query($conn, $sql_g_61) or die;
             $re_num_g_61=mysqli_num_rows($result_g_61);
       ?>
               var str='seeds (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Biomass:seeds><font color=#FF0000><?php echo $re_num_m_61?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Biomass:seeds><font color=#FF0000><?php echo $re_num_g_61?></font></a> genes)';	
		d.add(61,59,str);
		
		
		
		
		<?php
                         $sql_m_62="SELECT distinct plant_name FROM phenotype WHERE organ='Nutritional Deficiency induced'and attribute='Biomass:fresh weight'";
                         $result_m_62=mysqli_query($conn, $sql_m_62) or die;
             $re_num_m_62=mysqli_num_rows($result_m_62);

                         $sql_g_62="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Nutritional Deficiency induced' and phenotype.attribute='Biomass:fresh weight' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_62=mysqli_query($conn, $sql_g_62) or die;
             $re_num_g_62=mysqli_num_rows($result_g_62);
       ?>
               var str='fresh weight (<a href=phenotypesearchmutant.php?organ=Nutritional_Deficiency_induced&attribute=Biomass:fresh_weight><font color=#FF0000><?php echo $re_num_m_62?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Nutritional_Deficiency_induced&attribute=Biomass:fresh_weight><font color=#FF0000><?php echo $re_num_g_62?></font></a> genes)';	
		d.add(62,59,str);
		
		
		
		
		
		<?php
                         $sql_m_64="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'";
                         $result_m_64=mysqli_query($conn, $sql_m_64) or die;
             $re_num_m_64=mysqli_num_rows($result_m_64);

                         $sql_g_64="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_64=mysqli_query($conn, $sql_g_64) or die;
             $re_num_g_64=mysqli_num_rows($result_g_64);
       ?>
               var str='Stress induced senescence (<?php echo $re_num_m_64?> mutant, <?php echo $re_num_g_64?> gene)';
		d.add(64,0,str);
		
		
		
		
		
		
		<?php
                         $sql_m_65="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Chlorophyll content'";
                         $result_m_65=mysqli_query($conn, $sql_m_65) or die;
             $re_num_m_65=mysqli_num_rows($result_m_65);

                         $sql_g_65="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute='Chlorophyll content' and phenotype.plant_name =gene_hormone_plant.plant_name";
                         $result_g_65=mysqli_query($conn, $sql_g_65) or die;
             $re_num_g_65=mysqli_num_rows($result_g_65);
       ?>
               var str='Chlorophyll content (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Chlorophyll_content><font color=#FF0000><?php echo $re_num_m_65?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Chlorophyll_content><font color=#FF0000><?php echo $re_num_g_65?></font></a> genes)';		
		d.add(65,64,str);
		
		
		
		
		
		<?php
                         $sql_m_66="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Chloroplast structure'";
                         $result_m_66=mysqli_query($conn, $sql_m_66) or die;
             $re_num_m_66=mysqli_num_rows($result_m_66);

                         $sql_g_66="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute='Chloroplast structure' and phenotype.plant_name=  gene_hormone_plant.plant_name";
                         $result_g_66=mysqli_query($conn, $sql_g_66) or die;
             $re_num_g_66=mysqli_num_rows($result_g_66);
       ?>
               var str='Chloroplast structure (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Chloroplast_structure><font color=#FF0000><?php echo $re_num_m_66?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Chloroplast_structure><font color=#FF0000><?php echo $re_num_g_66?></font></a> genes)';	
		d.add(66,64,str);
		
		
		
		<?php
                         $sql_m_67="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Leaf color'";
                         $result_m_67=mysqli_query($conn, $sql_m_67) or die;
             $re_num_m_67=mysqli_num_rows($result_m_67);

                         $sql_g_67="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute='Leaf color' and phenotype.plant_name = gene_hormone_plant.plant_name";
                         $result_g_67=mysqli_query($conn, $sql_g_67) or die;
             $re_num_g_67=mysqli_num_rows($result_g_67);
       ?>
               var str='Leaf color (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Leaf_color><font color=#FF0000><?php echo $re_num_m_67?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Leaf_color><font color=#FF0000><?php echo $re_num_g_67?></font></a> genes)';	
		d.add(67,64,str);
		
		
		
		
		
		
		
		<?php
                         $sql_m_68="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Fv/Fm'";
                         $result_m_68=mysqli_query($conn, $sql_m_68) or die;
             $re_num_m_68=mysqli_num_rows($result_m_68);

                         $sql_g_68="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute='Fv/Fm' and phenotype.plant_name = gene_hormone_plant.plant_name";
                         $result_g_68=mysqli_query($conn, $sql_g_68) or die;
             $re_num_g_68=mysqli_num_rows($result_g_68);
       ?>
               var str='Fv/Fm (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Fv/Fm><font color=#FF0000><?php echo $re_num_m_68?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Fv/Fm><font color=#FF0000><?php echo $re_num_g_68?></font></a> genes)';	
		d.add(68,64,str);
		
		
		
		
		
		
		<?php
                         $sql_m_69="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Marker gene expression'";
                         $result_m_69=mysqli_query($conn, $sql_m_69) or die;
             $re_num_m_69=mysqli_num_rows($result_m_69);

                         $sql_g_69="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute='Marker gene expression' and phenotype.plant_name=  gene_hormone_plant.plant_name";
                         $result_g_69=mysqli_query($conn, $sql_g_69) or die;
             $re_num_g_69=mysqli_num_rows($result_g_69);
       ?>
               var str='Marker gene expression (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Marker_gene_expression><font color=#FF0000><?php echo $re_num_m_69?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Marker_gene_expression><font color=#FF0000><?php echo $re_num_g_69?></font></a> genes)';		
		d.add(69,64,str);
		
		
		
		
		
		
		
		
		
		
		           <?php
                          $sql_m_70="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute like '%Cell death marker%'";
                         $result_m_70=mysqli_query($conn, $sql_m_70) or die;
             $re_num_m_70=mysqli_num_rows($result_m_70);

                         $sql_g_70="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute like '%Cell death marker%' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_70=mysqli_query($conn, $sql_g_70) or die;
             $re_num_g_70=mysqli_num_rows($result_g_70);
       ?>
               var str='Cell death marker (<?php echo $re_num_m_70?> mutant, <?php echo $re_num_g_70?>
gene)';			   			   			
		d.add(70,64,str);
		
		
		
		
		
		
		
		
		
		 <?php
                         $sql_m_71="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Cell death marker:Ion leakage'";
                         $result_m_71=mysqli_query($conn, $sql_m_71) or die;
             $re_num_m_71=mysqli_num_rows($result_m_71);

                         $sql_g_71="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute='Cell death marker:Ion leakage' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_71=mysqli_query($conn, $sql_g_71) or die;
             $re_num_g_71=mysqli_num_rows($result_g_71);
       ?>
               var str='Ion leakage (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Cell_death_marker:Ion_leakage><font color=#FF0000><?php echo $re_num_m_71?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Cell_death_marker:Ion_leakage><font color=#FF0000><?php echo $re_num_g_71?></font></a> genes)';	
		d.add(71,70,str);
		
		
		
		
		
		
		<?php
                         $sql_m_72="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Cell death marker:DNA ladder'";
                         $result_m_72=mysqli_query($conn, $sql_m_72) or die;
             $re_num_m_72=mysqli_num_rows($result_m_72);

                         $sql_g_72="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute='Cell death marker:DNA ladder'  and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_72=mysqli_query($conn, $sql_g_72) or die;
             $re_num_g_72=mysqli_num_rows($result_g_72);
       ?>
               var str='DNA ladder (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Cell_death_marker:DNA_ladder><font color=#FF0000><?php echo $re_num_m_72?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Cell_death_marker:DNA_ladder><font color=#FF0000><?php echo $re_num_g_72?></font></a> genes)';	
		d.add(72,70,str);
		
		
		
		
		
		
		
		
		<?php
                         $sql_m_73="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Cell death marker:Trypan Blue staining'";
                         $result_m_73=mysqli_query($conn, $sql_m_73) or die;
             $re_num_m_73=mysqli_num_rows($result_m_73);

                         $sql_g_73="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute='Cell death marker:Trypan Blue staining'  and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_73=mysqli_query($conn, $sql_g_73) or die;
             $re_num_g_73=mysqli_num_rows($result_g_73);
       ?>
               var str='Trypan Blue staining (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Cell_death_marker:Trypan_Blue_staining><font color=#FF0000><?php echo $re_num_m_73?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Cell_death_marker:Trypan_Blue_staining><font color=#FF0000><?php echo $re_num_g_73?></font></a> genes)';  	
		d.add(73,70,str);
		
		
		
		
		
		
		
		
		<?php
                         $sql_m_74="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Cell death marker:other'";
                         $result_m_74=mysqli_query($conn, $sql_m_74) or die;
             $re_num_m_74=mysqli_num_rows($result_m_74);

                         $sql_g_74="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence'  and phenotype.attribute='Cell death marker:other'  and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_74=mysqli_query($conn, $sql_g_74) or die;
             $re_num_g_74=mysqli_num_rows($result_g_74);
       ?>
               var str='other (<a  href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Cell_death_marker:other><font color=#FF0000><?php echo $re_num_m_74?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Cell_death_marker:other><font color=#FF0000><?php echo $re_num_g_74?></font></a> genes)';   	
		d.add(74,70,str);
		
		
		
		
		<?php
                          $sql_m_75="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute like '%Redox status%'";
                         $result_m_75=mysqli_query($conn, $sql_m_75) or die;
             $re_num_m_75=mysqli_num_rows($result_m_75);

                         $sql_g_75="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute like '%Redox status%' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_75=mysqli_query($conn, $sql_g_75) or die;
             $re_num_g_75=mysqli_num_rows($result_g_75);
       ?>
               var str='Redox status (<?php echo $re_num_m_75?> mutant, <?php echo $re_num_g_75?> gene)';		
		d.add(75,64,str);
		
		
		
		
		
		
		
		<?php
                         $sql_m_76="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Redox status:ROS'";
                         $result_m_76=mysqli_query($conn, $sql_m_76) or die;
             $re_num_m_76=mysqli_num_rows($result_m_76);

                         $sql_g_76="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute='Redox status:ROS'  and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_76=mysqli_query($conn, $sql_g_76) or die;
             $re_num_g_76=mysqli_num_rows($result_g_76);
       ?>
               var str='ROS (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Redox_status:ROS><font color=#FF0000><?php echo $re_num_m_76?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Redox_status:ROS><font color=#FF0000><?php echo $re_num_g_76?></font></a> genes)';	
		d.add(76,75,str);
		
		
		
		
		
		
		
		<?php
                         $sql_m_77="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Redox status:Ascorbic Acid'";
                         $result_m_77=mysqli_query($conn, $sql_m_77) or die;
             $re_num_m_77=mysqli_num_rows($result_m_77);

                         $sql_g_77="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute='Redox status:Ascorbic Acid'  and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_77=mysqli_query($conn, $sql_g_77) or die;
             $re_num_g_77=mysqli_num_rows($result_g_77);
       ?>
               var str='Ascorbic Acid (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Redox_status:Ascorbic_Acid><font color=#FF0000><?php echo $re_num_m_77?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Redox_status:Ascorbic_Acid><font color=#FF0000><?php echo $re_num_g_77?></font></a> genes)';	
		d.add(77,75,str);
		
		
		
		
		
		
		
		<?php
                         $sql_m_78="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Redox status:Polyamine'";
                         $result_m_78=mysqli_query($conn, $sql_m_78) or die;
             $re_num_m_78=mysqli_num_rows($result_m_78);

                         $sql_g_78="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute='Redox status:Polyamine'  and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_78=mysqli_query($conn, $sql_g_78) or die;
             $re_num_g_78=mysqli_num_rows($result_g_78);
       ?>
               var str='Polyamine (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Redox_status:Polyamine><font color=#FF0000><?php echo $re_num_m_78?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Redox_status:Polyamine><font color=#FF0000><?php echo $re_num_g_78?></font></a> genes)';	
		d.add(78,75,str);
		
		
		
		
		
		
		<?php
                         $sql_m_79="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Redox status:other'";
                         $result_m_79=mysqli_query($conn, $sql_m_79) or die;
             $re_num_m_79=mysqli_num_rows($result_m_79);

                         $sql_g_79="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute='Redox status:other'  and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_79=mysqli_query($conn, $sql_g_79) or die;
             $re_num_g_79=mysqli_num_rows($result_g_79);
       ?>
               var str='other (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Redox_status:other><font color=#FF0000><?php echo $re_num_m_79?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Redox_status:other><font color=#FF0000><?php echo $re_num_g_79?></font></a> genes)';	
		d.add(79,75,str);
		
		
		
		
		
		
		<?php
                          $sql_m_80="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute like '%Biomass%'";
                         $result_m_80=mysqli_query($conn, $sql_m_80) or die;
             $re_num_m_80=mysqli_num_rows($result_m_80);

                         $sql_g_80="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute like '%Biomass%' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_80=mysqli_query($conn, $sql_g_80) or die;
             $re_num_g_80=mysqli_num_rows($result_g_80);
       ?>
               var str='Biomass (<?php echo $re_num_m_80?> mutant, <?php echo $re_num_g_80?> gene)';						   	
		d.add(80,64,str);
		
		
		
		<?php
                         $sql_m_81="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Biomass:leaves'";
                         $result_m_81=mysqli_query($conn, $sql_m_81) or die;
             $re_num_m_81=mysqli_num_rows($result_m_81);

                         $sql_g_81="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute='Biomass:leaves'  and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_81=mysqli_query($conn, $sql_g_81) or die;
             $re_num_g_81=mysqli_num_rows($result_g_81);
       ?>
               var str='leaves (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Biomass:leaves><font color=#FF0000><?php echo $re_num_m_81?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Biomass:leaves><font color=#FF0000><?php echo $re_num_g_81?></font></a> genes)';	
		d.add(81,80,str);
		
		
		
		
		
		<?php
                         $sql_m_82="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Biomass:seeds'";
                         $result_m_82=mysqli_query($conn, $sql_m_82) or die;
             $re_num_m_82=mysqli_num_rows($result_m_82);

                         $sql_g_82="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence'  and phenotype.attribute='Biomass:seeds'  and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_82=mysqli_query($conn, $sql_g_82) or die;
             $re_num_g_82=mysqli_num_rows($result_g_82);
       ?>
               var str='seeds (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Biomass:seeds><font color=#FF0000><?php echo $re_num_m_82?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Biomass:seeds><font color=#FF0000><?php echo $re_num_g_82?></font></a> genes)';	
		d.add(82,80,str);
		
		
		
		
		<?php
                         $sql_m_83="SELECT distinct plant_name FROM phenotype WHERE organ='Stress induced senescence'and attribute='Biomass:fresh weight'";
                         $result_m_83=mysqli_query($conn, $sql_m_83) or die;
             $re_num_m_83=mysqli_num_rows($result_m_83);

                         $sql_g_83="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Stress induced senescence' and phenotype.attribute='Biomass:fresh weight'  and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_83=mysqli_query($conn, $sql_g_83) or die;
             $re_num_g_83=mysqli_num_rows($result_g_83);
       ?>
               var str='fresh weight (<a href=phenotypesearchmutant.php?organ=Stress_induced_senescence&attribute=Biomass:fresh_weight><font color=#FF0000><?php echo $re_num_m_83?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Stress_induced_senescence&attribute=Biomass:fresh_weight><font color=#FF0000><?php echo $re_num_g_83?></font></a> genes)';	
		d.add(83,80,str);
		
		<?php
                         $sql_m_85="SELECT distinct plant_name FROM phenotype WHERE organ='Others'";
                         $result_m_85=mysqli_query($conn, $sql_m_85) or die;
             $re_num_m_85=mysqli_num_rows($result_m_85);

                         $sql_g_85="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_85=mysqli_query($conn, $sql_g_85) or die;
             $re_num_g_85=mysqli_num_rows($result_g_85);
       ?>
               var str='Others (<?php echo $re_num_m_85?> mutant, <?php echo $re_num_g_85?> gene)';
		d.add(85,0,str);
		
		
		
		
		<?php
                         $sql_m_86="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute='Chlorophyll content'";
                         $result_m_86=mysqli_query($conn, $sql_m_86) or die;
             $re_num_m_86=mysqli_num_rows($result_m_86);

                         $sql_g_86="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others' and phenotype.attribute='Chlorophyll content' and phenotype.plant_name = gene_hormone_plant.plant_name";
                         $result_g_86=mysqli_query($conn, $sql_g_86) or die;
             $re_num_g_86=mysqli_num_rows($result_g_86);
       ?>
               var str='Chlorophyll content (<a href=phenotypesearchmutant.php?organ=Others&attribute=Chlorophyll_content><font color=#FF0000><?php echo $re_num_m_86?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Others&attribute=Chlorophyll_content><font color=#FF0000><?php echo $re_num_g_86?></font></a> genes)';		
		d.add(86,85,str);
		
		
		
		
		
		<?php
                         $sql_m_87="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute='Chloroplast structure'";
                         $result_m_87=mysqli_query($conn, $sql_m_87) or die;
             $re_num_m_87=mysqli_num_rows($result_m_87);

                         $sql_g_87="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others' and phenotype.attribute='Chloroplast structure' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_87=mysqli_query($conn, $sql_g_87) or die;
             $re_num_g_87=mysqli_num_rows($result_g_87);
       ?>
               var str='Chloroplast structure (<a href=phenotypesearchmutant.php?organ=Others&attribute=Chloroplast_structure><font color=#FF0000><?php echo $re_num_m_87?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Others&attribute=Chloroplast_structure><font color=#FF0000><?php echo $re_num_g_87?></font></a> genes)';	
		d.add(87,85,str);
		
		
		
		
		
		<?php
                         $sql_m_88="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute='Leaf color'";
                         $result_m_88=mysqli_query($conn, $sql_m_88) or die;
             $re_num_m_88=mysqli_num_rows($result_m_88);

                         $sql_g_88="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others' and phenotype.attribute='Leaf color' and phenotype.plant_name = gene_hormone_plant.plant_name";
                         $result_g_88=mysqli_query($conn, $sql_g_88) or die;
             $re_num_g_88=mysqli_num_rows($result_g_88);
       ?>
               var str='Leaf color (<a href=phenotypesearchmutant.php?organ=Others&attribute=Leaf_color><font color=#FF0000><?php echo $re_num_m_88?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Others&attribute=Leaf_color><font color=#FF0000><?php echo $re_num_g_88?></font></a> genes)';	
		d.add(88,85,str);
		
		
		
		
		
		<?php
                         $sql_m_89="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute='Fv/Fm'";
                         $result_m_89=mysqli_query($conn, $sql_m_89) or die;
             $re_num_m_89=mysqli_num_rows($result_m_89);

                         $sql_g_89="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others' and phenotype.attribute='Fv/Fm' and phenotype.plant_name = gene_hormone_plant.plant_name";
                         $result_g_89=mysqli_query($conn, $sql_g_89) or die;
             $re_num_g_89=mysqli_num_rows($result_g_89);
       ?>
               var str='Fv/Fm (<a href=phenotypesearchmutant.php?organ=Others&attribute=Fv/Fm><font color=#FF0000><?php echo $re_num_m_89?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Others&attribute=Fv/Fm><font color=#FF0000><?php echo $re_num_g_89?></font></a> genes)';	
		d.add(89,85,str);
		
		
		
		
		
		<?php
                         $sql_m_90="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute='Marker gene expression'";
                         $result_m_90=mysqli_query($conn, $sql_m_90) or die;
             $re_num_m_90=mysqli_num_rows($result_m_90);

                         $sql_g_90="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others' and phenotype.attribute='Marker gene expression' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_90=mysqli_query($conn, $sql_g_90) or die;
             $re_num_g_90=mysqli_num_rows($result_g_90);
       ?>
               var str='Marker gene expression (<a href=phenotypesearchmutant.php?organ=Others&attribute=Marker_gene_expression><font color=#FF0000><?php echo $re_num_m_90?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Others&attribute=Marker_gene_expression><font color=#FF0000><?php echo $re_num_g_90?></font></a> genes)';	
		d.add(90,85,str);
		
		
		
		
		
		            <?php
                          $sql_m_91="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute like '%Cell death marker%'";
                         $result_m_91=mysqli_query($conn, $sql_m_91) or die;
             $re_num_m_91=mysqli_num_rows($result_m_91);

                         $sql_g_91="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others' and phenotype.attribute like '%Cell death marker%' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_91=mysqli_query($conn, $sql_g_91) or die;
             $re_num_g_91=mysqli_num_rows($result_g_91);
       ?>
               var str='Cell death marker (<?php echo $re_num_m_91?> mutant, <?php echo $re_num_g_91?> gene)';			   
		d.add(91,85,str);
		
		
		
		
		
		
		
		<?php
                         $sql_m_92="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute='Cell death marker:Ion leakage'";
                         $result_m_92=mysqli_query($conn, $sql_m_92) or die;
             $re_num_m_92=mysqli_num_rows($result_m_92);

                         $sql_g_92="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others' and phenotype.attribute='Cell death marker:Ion leakage' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_92=mysqli_query($conn, $sql_g_92) or die;
             $re_num_g_92=mysqli_num_rows($result_g_92);
       ?>
               var str='Ion leakage (<a href=phenotypesearchmutant.php?organ=Others&attribute=Cell_death_marker:Ion_leakage><font color=#FF0000><?php echo $re_num_m_92?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Others&attribute=Cell_death_marker:Ion_leakage><font color=#FF0000><?php echo $re_num_g_92?></font></a> genes)';	
		d.add(92,91,str);
		
		
		
		
		
		
		
		
		<?php
                         $sql_m_93="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute='Cell death marker:DNA ladder'";
                         $result_m_93=mysqli_query($conn, $sql_m_93) or die;
             $re_num_m_93=mysqli_num_rows($result_m_93);

                         $sql_g_93="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others' and phenotype.attribute='Cell death marker:DNA ladder'  and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_93=mysqli_query($conn, $sql_g_93) or die;
             $re_num_g_93=mysqli_num_rows($result_g_93);
       ?>
               var str='DNA ladder (<a href=phenotypesearchmutant.php?organ=Others&attribute=Cell_death_marker:DNA_ladder><font color=#FF0000><?php echo $re_num_m_93?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Others&attribute=Cell_death_marker:DNA_ladder><font color=#FF0000><?php echo $re_num_g_93?></font></a> genes)';	
		d.add(93,91,str);
		
		
		
		
		
		
		
		
		<?php
                         $sql_m_94="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute='Cell death marker:Trypan Blue staining'";
                         $result_m_94=mysqli_query($conn, $sql_m_94) or die;
             $re_num_m_94=mysqli_num_rows($result_m_94);

                         $sql_g_94="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others' and phenotype.attribute='Cell death marker:Trypan Blue staining' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_94=mysqli_query($conn, $sql_g_94) or die;
             $re_num_g_94=mysqli_num_rows($result_g_94);
       ?>
               var str='Trypan Blue staining (<a href=phenotypesearchmutant.php?organ=Others&attribute=Cell_death_marker:Trypan_Blue_staining><font color=#FF0000><?php echo $re_num_m_94?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Others&attribute=Cell_death_marker:Trypan_Blue_staining><font color=#FF0000><?php echo $re_num_g_94?></font></a> genes)';  
		d.add(94,91,str);
		
		
		
		
		
		
		<?php
                         $sql_m_95="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute='Cell death marker:other'";
                         $result_m_95=mysqli_query($conn, $sql_m_95) or die;
             $re_num_m_95=mysqli_num_rows($result_m_95);

                         $sql_g_95="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others' and phenotype.attribute='Cell death marker:other'  and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_95=mysqli_query($conn, $sql_g_95) or die;
             $re_num_g_95=mysqli_num_rows($result_g_95);
       ?>
               var str='other (<a href=phenotypesearchmutant.php?organ=Others&attribute=Cell_death_marker:other><font color=#FF0000><?php echo $re_num_m_95?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Others&attribute=Cell_death_marker:other><font color=#FF0000><?php echo $re_num_g_95?></font></a> genes)';   
		d.add(95,91,str);
		
		
		
		
		
		<?php
                          $sql_m_96="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute like '%Redox status%'";
                         $result_m_96=mysqli_query($conn, $sql_m_96) or die;
             $re_num_m_96=mysqli_num_rows($result_m_96);

                         $sql_g_96="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others' and phenotype.attribute like '%Redox status%' and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_96=mysqli_query($conn, $sql_g_96) or die;
             $re_num_g_96=mysqli_num_rows($result_g_96);
       ?>
               var str='Redox status (<?php echo $re_num_m_96?> mutant, <?php echo $re_num_g_96?> gene)';			   			   	
		d.add(96,85,str);
		
		
		
		
		
		
		
		<?php
                         $sql_m_97="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute='Redox status:ROS'";
                         $result_m_97=mysqli_query($conn, $sql_m_97) or die;
             $re_num_m_97=mysqli_num_rows($result_m_97);

                         $sql_g_97="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others'  and phenotype.attribute='Redox status:ROS'   and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_97=mysqli_query($conn, $sql_g_97) or die;
             $re_num_g_97=mysqli_num_rows($result_g_97);
       ?>
               var str='ROS (<a href=phenotypesearchmutant.php?organ=Others&attribute=Redox_status:ROS><font color=#FF0000><?php echo $re_num_m_97?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Others&attribute=Redox_status:ROS><font color=#FF0000><?php echo $re_num_g_97?></font></a> genes)';
		d.add(97,96,str);
		
		
		
		
		
		
		
		<?php
                         $sql_m_98="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute='Redox status:Ascorbic Acid'";
                         $result_m_98=mysqli_query($conn, $sql_m_98) or die;
             $re_num_m_98=mysqli_num_rows($result_m_98);

                         $sql_g_98="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others' and phenotype.attribute='Redox status:Ascorbic Acid'  and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_98=mysqli_query($conn, $sql_g_98) or die;
             $re_num_g_98=mysqli_num_rows($result_g_98);
       ?>
               var str='Ascorbic Acid (<a href=phenotypesearchmutant.php?organ=Others&attribute=Redox_status:Ascorbic_Acid><font color=#FF0000><?php echo $re_num_m_98?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Others&attribute=Redox_status:Ascorbic_Acid><font color=#FF0000><?php echo $re_num_g_98?></font></a> genes)';	
		d.add(98,96,str);
		
		
		
		
		
		
		
		
		<?php
                         $sql_m_99="SELECT distinct plant_name FROM phenotype WHERE  organ='Others'and attribute='Redox status:Polyamine'";
                         $result_m_99=mysqli_query($conn, $sql_m_99) or die;
             $re_num_m_99=mysqli_num_rows($result_m_99);

                         $sql_g_99="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others'  and phenotype.attribute='Redox status:Polyamine'  and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_99=mysqli_query($conn, $sql_g_99) or die;
             $re_num_g_99=mysqli_num_rows($result_g_99);
       ?>
               var str='Polyamine (<a href=phenotypesearchmutant.php?organ=Others&attribute=Redox_status:Polyamine><font color=#FF0000><?php echo $re_num_m_99?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Others&attribute=Redox_status:Polyamine><font color=#FF0000><?php echo $re_num_g_99?></font></a> genes)';	
		d.add(99,96,str);
		
		
		
		
		
		
		
		
		<?php
                         $sql_m_100="SELECT distinct plant_name FROM phenotype WHERE  organ='Others'and attribute='Redox status:other'";
                         $result_m_100=mysqli_query($conn, $sql_m_100) or die;
             $re_num_m_100=mysqli_num_rows($result_m_100);

                         $sql_g_100="SELECT distinct gene_hormone_plant.accesse_id FROM  gene_hormone_plant,phenotype WHERE phenotype.organ='Others'  and phenotype.attribute='Redox status:other'   and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_100=mysqli_query($conn, $sql_g_100) or die;
             $re_num_g_100=mysqli_num_rows($result_g_100);
       ?>
               var str='other (<a  href=phenotypesearchmutant.php?organ=Others&attribute=Redox_status:other><font  color=#FF0000><?php echo $re_num_m_100?></font></a> mutants, <a  href=phenotypesearchgene.php?organ=Others&attribute=Redox_status:other><font  color=#FF0000><?php echo $re_num_g_100?></font></a> genes)';	
		d.add(100,96,str);
		
		
		
		
		<?php
                          $sql_m_101="SELECT distinct plant_name FROM phenotype WHERE  organ='Others'and attribute like '%Biomass%'";
                         $result_m_101=mysqli_query($conn, $sql_m_101) or die;
             $re_num_m_101=mysqli_num_rows($result_m_101);

                         $sql_g_101="SELECT distinct gene_hormone_plant.accesse_id FROM  gene_hormone_plant,phenotype WHERE phenotype.organ='Others'  and phenotype.attribute like '%Biomass%' and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_101=mysqli_query($conn, $sql_g_101) or die;
             $re_num_g_101=mysqli_num_rows($result_g_101);
       ?>
               var str='Biomass (<?php echo $re_num_m_101?> mutant, <?php echo $re_num_g_101?> gene)';						   		
		d.add(101,85,str);
		
		
		
		
		
		
		
		<?php
                         $sql_m_102="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute='Biomass:leaves'";
                         $result_m_102=mysqli_query($conn, $sql_m_102) or die;
             $re_num_m_102=mysqli_num_rows($result_m_102);

                         $sql_g_102="SELECT distinct gene_hormone_plant.accesse_id FROM  gene_hormone_plant,phenotype WHERE phenotype.organ='Others'  and phenotype.attribute='Biomass:leaves'  and phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_102=mysqli_query($conn, $sql_g_102) or die;
             $re_num_g_102=mysqli_num_rows($result_g_102);
       ?>
               var str='leaves (<a href=phenotypesearchmutant.php?organ=Others&attribute=Biomass:leaves><font  color=#FF0000><?php echo $re_num_m_102?></font></a> mutants, <a  href=phenotypesearchgene.php?organ=Others&attribute=Biomass:leaves><font  color=#FF0000><?php echo $re_num_g_102?></font></a> genes)';	
		d.add(102,101,str);
		
		
		
		
		
		
		
		<?php
                         $sql_m_103="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute='Biomass:seeds'";
                         $result_m_103=mysqli_query($conn, $sql_m_103) or die;
             $re_num_m_103=mysqli_num_rows($result_m_103);

                         $sql_g_103="SELECT distinct gene_hormone_plant.accesse_id FROM gene_hormone_plant,phenotype WHERE phenotype.organ='Others' and phenotype.attribute='Biomass:seeds'  and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_103=mysqli_query($conn, $sql_g_103) or die;
             $re_num_g_103=mysqli_num_rows($result_g_103);
       ?>
               var str='seeds (<a href=phenotypesearchmutant.php?organ=Others&attribute=Biomass:seeds><font color=#FF0000><?php echo $re_num_m_103?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Others&attribute=Biomass:seeds><font color=#FF0000><?php echo $re_num_g_103?></font></a> genes)';			
		d.add(103,101,str);
		
		
		
		
		
		
		
		<?php
                         $sql_m_104="SELECT distinct plant_name FROM phenotype WHERE organ='Others'and attribute='Biomass:fresh weight'";
                         $result_m_104=mysqli_query($conn, $sql_m_104) or die;
             $re_num_m_104=mysqli_num_rows($result_m_104);

                         $sql_g_104="SELECT distinct gene_hormone_plant.accesse_id FROM  gene_hormone_plant,phenotype WHERE phenotype.organ='Others'  and phenotype.attribute='Biomass:fresh weight'   and  phenotype.plant_name =  gene_hormone_plant.plant_name";
                         $result_g_104=mysqli_query($conn, $sql_g_104) or die;
             $re_num_g_104=mysqli_num_rows($result_g_104);
       ?>
               var str='fresh weight (<a href=phenotypesearchmutant.php?organ=Others&attribute=Biomass:fresh_weight><font color=#FF0000><?php echo $re_num_m_104?></font></a> mutants, <a href=phenotypesearchgene.php?organ=Others&attribute=Biomass:fresh_weight><font color=#FF0000><?php echo $re_num_g_104?></font></a> genes)';	
		d.add(104,101,str);

      document.write(d);
d.openAll();
</script>

</div>

<?php
require ('common_footer.php');
?>

</body>
</html>

