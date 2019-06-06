<?php

require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>
<html>
<head>

<link rel="StyleSheet" href="dtree.css" type="text/css" />
<script type="text/javascript" src="dtree.js"></script>

</head>
<body>
<div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">

<p class="info">

<?php
	$sqlname = "select distinct species from gene_hormone_info ORDER by species";
	$re_name = mysqli_query($conn, $sqlname);
	if (!$re_name) die(mysqli_error($conn));
	$tmp_all_species_num = mysqli_num_rows($re_name);
	$all_species_num = $tmp_all_species_num-1;

echo "<font color=blue size=3 >Browse by Tree:</font> <font color=black size=3 >( Total : </font><font color=red>$all_species_num</font><font color=black size=3 > Species )</font><br><br>"

?>

<script type="text/javascript">
		
	d = new dTree('d');
 
	d.add(0, -1, 'Magnoliophyta');
		
	d.add(11, 0, 'core eudicotyledons', '', '', '', '', '', 'open');
		
	d.add(21, 11, 'Caryophyllales');

<?php
			  
	$sql_m_31 = "select distinct * from gene_hormone_info where species = 'Carnation (Dianthus caryophyllus)'";
	$result_m_31 = mysqli_query($conn, $sql_m_31) or die;
	$re_num_m_31 = mysqli_num_rows($result_m_31);

?>
		
	var str='Carnation (<i>Dianthus caryophyllus</i>) ( <a href=browse_species.php?speciesname=Carnation%20(Dianthus%20caryophyllus)><font color=#FF0000><?php echo $re_num_m_31?></font></a> )';

	d.add(31, 21, str);
		
	d.add(32, 21, 'Amaranthaceae');		
	
<?php

	$sql_m_41 = "select distinct * from gene_hormone_info where species = 'Grain Amaranths (Amaranthus hypochondriacus)'";
	$result_m_41 = mysqli_query($conn, $sql_m_41) or die;
	$re_num_m_41 = mysqli_num_rows($result_m_41);

?>
	
	var str='Grain Amaranths (<i>Amaranthus hypochondriacus</i>) ( <a href=browse_species.php?speciesname=Grain%20Amaranths%20(Amaranthus%20hypochondriacus)><font color=#FF0000><?php echo $re_num_m_41?></font></a> )';

	d.add(41, 32, str);

	d.add(42, 32, 'Chenopodioideae');

<?php

        $sql_m_51 = "select distinct * from gene_hormone_info where species = 'Spinach (Spinacia oleracea)'";
        $result_m_51 = mysqli_query($conn, $sql_m_51) or die;
        $re_num_m_51 = mysqli_num_rows($result_m_51);

?>

	var str='Spinach (<i>Spinacia oleracea</i>) ( <a href=browse_species.php?speciesname=Spinach%20(Spinacia%20oleracea)><font color=#FF0000><?php echo $re_num_m_51?></font></a> )';

	d.add(51, 42, str);		

<?php

        $sql_m_52 = "select distinct * from gene_hormone_info where species = 'Red goosefoot (Chenopodium rubrum)'";
        $result_m_52 = mysqli_query($conn, $sql_m_52) or die;
        $re_num_m_52 = mysqli_num_rows($result_m_52);

?>

	var str='Red goosefoot (<i>Chenopodium rubrum</i>) ( <a href=browse_species.php?speciesname=Red%20goosefoot%20(Chenopodium%20rubrum)><font color=#FF0000><?php echo $re_num_m_52?></font></a> )';

	d.add(52, 42, str);

	d.add(22, 11, 'asterids');

<?php

        $sql_m_71 = "select distinct * from gene_hormone_info where species = 'Tea (Camellia sinensis)'";
        $result_m_71 = mysqli_query($conn, $sql_m_71) or die;
        $re_num_m_71 = mysqli_num_rows($result_m_71);

?>

        var str='Tea (<i>Camellia sinensis</i>) ( <a href=browse_species.php?speciesname=Tea%20(Camellia%20sinensis)><font color=#FF0000><?php echo $re_num_m_71?></font></a> )';

	d.add(71, 22, str);

	d.add(72, 22, 'campanulids');

<?php

        $sql_m_81 = "select distinct * from gene_hormone_info where species = 'Balloon flower (Platycodon grandiflorum)'";
        $result_m_81 = mysqli_query($conn, $sql_m_81) or die;
        $re_num_m_81 = mysqli_num_rows($result_m_81);

?>

        var str='Balloon flower (<i>Platycodon grandiflorum</i>) ( <a href=browse_species.php?speciesname=Balloon%20flower%20(Platycodon%20grandiflorum)><font color=#FF0000><?php echo $re_num_m_81?></font></a> )';

        d.add(81, 72, str);

<?php

        $sql_m_82 = "select distinct * from gene_hormone_info where species = 'Carrot (Daucus carota)'";
        $result_m_82 = mysqli_query($conn, $sql_m_82) or die;
        $re_num_m_82 = mysqli_num_rows($result_m_82);

?>

        var str='Carrot (<i>Daucus carota</i>) ( <a href=browse_species.php?speciesname=Carrot%20(Daucus%20carota)><font color=#FF0000><?php echo $re_num_m_82?></font></a> )';

        d.add(82, 72, str);

	d.add(73, 22, 'Solanales');

	d.add(91, 73, 'Ipomoea');

<?php

        $sql_m_101 = "select distinct * from gene_hormone_info where species = 'Japanese morning glory (Ipomoea nil)'";
        $result_m_101 = mysqli_query($conn, $sql_m_101) or die;
        $re_num_m_101 = mysqli_num_rows($result_m_101);

?>

        var str='Japanese morning glory (<i>Ipomoea nil</i>) ( <a href=browse_species.php?speciesname=Japanese%20morning%20glory%20(Ipomoea%20nil)><font color=#FF0000><?php echo $re_num_m_101?></font></a> )';

        d.add(101, 91, str);

<?php

        $sql_m_102 = "select distinct * from gene_hormone_info where species = 'Sweet potato (Ipomoea batatas)'";
        $result_m_102 = mysqli_query($conn, $sql_m_102) or die;
        $re_num_m_102 = mysqli_num_rows($result_m_102);

?>

        var str='Sweet potato (<i>Ipomoea batatas</i>) ( <a href=browse_species.php?speciesname=Sweet%20potato%20(Ipomoea%20batatas)><font color=#FF0000><?php echo $re_num_m_102?></font></a> )';

        d.add(102, 91, str);

	d.add(92, 73, 'Solanaceae');

<?php

        $sql_m_111 = "select distinct * from gene_hormone_info where species = 'Petunia (Petunia hybrida)'";
        $result_m_111 = mysqli_query($conn, $sql_m_111) or die;
        $re_num_m_111 = mysqli_num_rows($result_m_111);

?>

        var str='Petunia (<i>Petunia hybrida</i>) ( <a href=browse_species.php?speciesname=Petunia%20(Petunia%20hybrida)><font color=#FF0000><?php echo $re_num_m_111?></font></a> )';

        d.add(111, 92, str);

	d.add(112, 92, 'Nicotiana');

<?php

        $sql_m_121 = "select distinct * from gene_hormone_info where species = 'Solanaceae (Nicotiana attenuata)'";
        $result_m_121 = mysqli_query($conn, $sql_m_121) or die;
        $re_num_m_121 = mysqli_num_rows($result_m_121);

?>

        var str='Solanaceae (<i>Nicotiana attenuata</i>) ( <a href=browse_species.php?speciesname=Solanaceae%20(Nicotiana%20attenuata)><font color=#FF0000><?php echo $re_num_m_121?></font></a> )';

        d.add(121, 112, str);

<?php

        $sql_m_122 = "select distinct * from gene_hormone_info where species = 'Tobacco (Nicotiana tabacum)'";
        $result_m_122 = mysqli_query($conn, $sql_m_122) or die;
        $re_num_m_122 = mysqli_num_rows($result_m_122);

?>

        var str='Tobacco (<i>Nicotiana tabacum</i>) ( <a href=browse_species.php?speciesname=Tobacco%20(Nicotiana%20tabacum)><font color=#FF0000><?php echo $re_num_m_122?></font></a> )';

        d.add(122, 112, str);

	d.add(113, 92, 'Solanoideae');

	d.add(131, 113, 'Solanum');

<?php

        $sql_m_141 = "select distinct * from gene_hormone_info where species = 'Potato (Solanum tuberosum)'";
        $result_m_141 = mysqli_query($conn, $sql_m_141) or die;
        $re_num_m_141 = mysqli_num_rows($result_m_141);

?>

        var str='Potato (<i>Solanum tuberosum</i>) ( <a href=browse_species.php?speciesname=Potato%20(Solanum%20tuberosum)><font color=#FF0000><?php echo $re_num_m_141?></font></a> )';

        d.add(141, 131, str);

<?php

        $sql_m_142 = "select distinct * from gene_hormone_info where species = 'Tomato (Lycopersicon esculentum)'";
        $result_m_142 = mysqli_query($conn, $sql_m_142) or die;
        $re_num_m_142 = mysqli_num_rows($result_m_142);

?>

        var str='Tomato (<i>Lycopersicon esculentum</i>) ( <a href=browse_species.php?speciesname=Tomato%20(Lycopersicon%20esculentum)><font color=#FF0000><?php echo $re_num_m_142?></font></a> )';

        d.add(142, 131, str);

<?php

        $sql_m_132 = "select distinct * from gene_hormone_info where species = 'Pepper (Capsicum annuum)'";
        $result_m_132 = mysqli_query($conn, $sql_m_132) or die;
        $re_num_m_132 = mysqli_num_rows($result_m_132);

?>

        var str='Pepper (<i>Capsicum annuum</i>) ( <a href=browse_species.php?speciesname=Pepper%20(Capsicum%20annuum)><font color=#FF0000><?php echo $re_num_m_132?></font></a> )';

        d.add(132, 113, str);

	d.add(23, 11, 'rosids');
	
	d.add(151, 23, 'malvids');

<?php

        $sql_m_161 = "select distinct * from gene_hormone_info where species = 'Mangifera indica'";
        $result_m_161 = mysqli_query($conn, $sql_m_161) or die;
        $re_num_m_161 = mysqli_num_rows($result_m_161);

?>

        var str='<i>Mangifera indica</i> ( <a href=browse_species.php?speciesname=Mangifera%20indica><font color=#FF0000><?php echo $re_num_m_161?></font></a> )';

        d.add(161, 151, str);

	d.add(162, 151, 'Brassicaceae');

	d.add(171, 162, 'Brassica');

<?php

        $sql_m_181 = "select distinct * from gene_hormone_info where species = 'Broccoli (Brassica oleracea)'";
        $result_m_181 = mysqli_query($conn, $sql_m_181) or die;
        $re_num_m_181 = mysqli_num_rows($result_m_181);

?>

        var str='Broccoli (<i>Brassica oleracea</i>) ( <a href=browse_species.php?speciesname=Broccoli%20(Brassica%20oleracea)><font color=#FF0000><?php echo $re_num_m_181?></font></a> )';

        d.add(181, 171, str);

<?php

        $sql_m_182 = "select distinct * from gene_hormone_info where species = 'Turnip (Brassica rapa)'";
        $result_m_182 = mysqli_query($conn, $sql_m_182) or die;
        $re_num_m_182 = mysqli_num_rows($result_m_182);

?>

        var str='Turnip (<i>Brassica rapa</i>) ( <a href=browse_species.php?speciesname=Turnip%20(Brassica%20rapa)><font color=#FF0000><?php echo $re_num_m_182?></font></a> )';

        d.add(182, 171, str);

<?php

        $sql_m_191 = "select distinct * from gene_hormone_info where species = 'Chinese cabbage (Brassica campestris)'";
        $result_m_191 = mysqli_query($conn, $sql_m_191) or die;
        $re_num_m_191 = mysqli_num_rows($result_m_191);

?>

        var str='Chinese cabbage (<i>Brassica campestris</i>) ( <a href=browse_species.php?speciesname=Chinese%20cabbage%20(Brassica%20campestris)><font color=#FF0000><?php echo $re_num_m_191?></font></a> )';

        d.add(191, 182, str);

<?php

        $sql_m_192 = "select distinct * from gene_hormone_info where species = 'Brassica rapa var. parachinensis'";
        $result_m_192 = mysqli_query($conn, $sql_m_192) or die;
        $re_num_m_192 = mysqli_num_rows($result_m_192);

?>

        var str='<i>Brassica rapa var. parachinensis</i> ( <a href=browse_species.php?speciesname=Brassica%20rapa%20var.%20parachinensis><font color=#FF0000><?php echo $re_num_m_192?></font></a> )';

        d.add(192, 182, str);

<?php

        $sql_m_183 = "select distinct * from gene_hormone_info where species = 'Rapeseed (Brassica napus)'";
        $result_m_183 = mysqli_query($conn, $sql_m_183) or die;
        $re_num_m_183 = mysqli_num_rows($result_m_183);

?>

        var str='Rapeseed (<i>Brassica napus</i>) ( <a href=browse_species.php?speciesname=Rapeseed%20(Brassica%20napus)><font color=#FF0000><?php echo $re_num_m_183?></font></a> )';

        d.add(183, 171, str);

	d.add(172, 162, 'Arabidopsis');

<?php

        $sql_m_201 = "select distinct * from gene_hormone_info where species = 'Arabidopsis lyrata'";
        $result_m_201 = mysqli_query($conn, $sql_m_201) or die;
        $re_num_m_201 = mysqli_num_rows($result_m_201);

?>

        var str='<i>Arabidopsis lyrata</i> ( <a href=browse_species.php?speciesname=Arabidopsis%20lyrata><font color=#FF0000><?php echo $re_num_m_201?></font></a> )';

        d.add(201, 172, str);
	
<?php

        $sql_m_202 = "select distinct * from gene_hormone_info where species = 'Arabidopsis thaliana'";
        $result_m_202 = mysqli_query($conn, $sql_m_202) or die;
        $re_num_m_202 = mysqli_num_rows($result_m_202);

?>

        var str='<i>Arabidopsis thaliana</i> ( <a href=browse_species.php?speciesname=Arabidopsis%20thaliana><font color=#FF0000><?php echo $re_num_m_202?></font></a> )';

        d.add(202, 172, str);

	d.add(152, 23, 'fabids');

<?php

        $sql_m_211 = "select distinct * from gene_hormone_info where species = 'Cucumis melo'";
        $result_m_211 = mysqli_query($conn, $sql_m_211) or die;
        $re_num_m_211 = mysqli_num_rows($result_m_211);

?>

        var str='<i>Cucumis melo</i> ( <a href=browse_species.php?speciesname=Cucumis%20melo><font color=#FF0000><?php echo $re_num_m_211?></font></a> )';

        d.add(211, 152, str);
	
	d.add(212, 152, 'Papilionoideae');

<?php

        $sql_m_221 = "select distinct * from gene_hormone_info where species = 'Chinese Milk Vetch (Astragalus sinicus)'";
        $result_m_221 = mysqli_query($conn, $sql_m_221) or die;
        $re_num_m_221 = mysqli_num_rows($result_m_221);

?>

        var str='Chinese Milk Vetch (<i>Astragalus sinicus</i>) ( <a href=browse_species.php?speciesname=Chinese%20Milk%20Vetch%20(Astragalus%20sinicus)><font color=#FF0000><?php echo $re_num_m_221?></font></a> )';

	d.add(221, 212, str);	

<?php

        $sql_m_222 = "select distinct * from gene_hormone_info where species = 'Pea (Pisum sativum)'";
        $result_m_222 = mysqli_query($conn, $sql_m_222) or die;
        $re_num_m_222 = mysqli_num_rows($result_m_222);

?>

        var str='Pea (<i>Pisum sativum</i>) ( <a href=browse_species.php?speciesname=Pea%20(Pisum%20sativum)><font color=#FF0000><?php echo $re_num_m_222?></font></a> )';

        d.add(222, 212, str);

	d.add(223, 212, 'Medicago');

<?php

        $sql_m_231 = "select distinct * from gene_hormone_info where species = 'Medicago truncatula'";
        $result_m_231 = mysqli_query($conn, $sql_m_231) or die;
        $re_num_m_231 = mysqli_num_rows($result_m_231);

?>

        var str='<i>Medicago truncatula</i> ( <a href=browse_species.php?speciesname=Medicago%20truncatula><font color=#FF0000><?php echo $re_num_m_231?></font></a> )';

        d.add(231, 223, str);
	
<?php

        $sql_m_232 = "select distinct * from gene_hormone_info where species = 'Medicago sativa'";
        $result_m_232 = mysqli_query($conn, $sql_m_232) or die;
        $re_num_m_232 = mysqli_num_rows($result_m_232);

?>

        var str='<i>Medicago sativa</i> ( <a href=browse_species.php?speciesname=Medicago%20sativa><font color=#FF0000><?php echo $re_num_m_232?></font></a> )';

        d.add(232, 223, str);

	d.add(224, 212, 'Phaseoleae');

<?php

        $sql_m_241 = "select distinct * from gene_hormone_info where species = 'cowpea (Vigna unguiculata)'";
        $result_m_241 = mysqli_query($conn, $sql_m_241) or die;
        $re_num_m_241 = mysqli_num_rows($result_m_241);

?>

        var str='cowpea (<i>Vigna unguiculata</i>) ( <a href=browse_species.php?speciesname=cowpea%20(Vigna%20unguiculata)><font color=#FF0000><?php echo $re_num_m_241?></font></a> )';

        d.add(241, 224, str);

<?php

        $sql_m_242 = "select distinct * from gene_hormone_info where species = 'Soybean (Glycine max)'";
        $result_m_242 = mysqli_query($conn, $sql_m_242) or die;
        $re_num_m_242 = mysqli_num_rows($result_m_242);

?>

        var str='Soybean (<i>Glycine max</i>) ( <a href=browse_species.php?speciesname=Soybean%20(Glycine%20max)><font color=#FF0000><?php echo $re_num_m_242?></font></a> )';

        d.add(242, 224, str);

	d.add(213, 152, 'Rosoideae');

<?php

        $sql_m_251 = "select distinct * from gene_hormone_info where species = 'Rose (Rosa hybrida)'";
        $result_m_251 = mysqli_query($conn, $sql_m_251) or die;
        $re_num_m_251 = mysqli_num_rows($result_m_251);

?>

        var str='Rose (<i>Rosa hybrida</i>) ( <a href=browse_species.php?speciesname=Rose%20(Rosa%20hybrida)><font color=#FF0000><?php echo $re_num_m_251?></font></a> )';

        d.add(251, 213, str);

<?php

        $sql_m_252 = "select distinct * from gene_hormone_info where species = 'Strawberry (Fragaria x ananassa)'";
        $result_m_252 = mysqli_query($conn, $sql_m_252) or die;
        $re_num_m_252 = mysqli_num_rows($result_m_252);

?>

        var str='Strawberry (<i>Fragaria x ananassa</i>) ( <a href=browse_species.php?speciesname=Strawberry%20(Fragaria%20x%20ananassa)><font color=#FF0000><?php echo $re_num_m_252?></font></a> )';

        d.add(252, 213, str);
	
	d.add(12, 0, 'Liliopsida');
	
<?php

        $sql_m_261 = "select distinct * from gene_hormone_info where species = 'Crocus sativus'";
        $result_m_261 = mysqli_query($conn, $sql_m_261) or die;
        $re_num_m_261 = mysqli_num_rows($result_m_261);

?>

        var str='<i>Crocus sativus</i> ( <a href=browse_species.php?speciesname=Crocus%20sativus><font color=#FF0000><?php echo $re_num_m_261?></font></a> )';

        d.add(261, 12, str);

	d.add(262, 12, 'commelinids');

<?php

        $sql_m_271 = "select distinct * from gene_hormone_info where species = 'Banana (Musa acuminata)'";
        $result_m_271 = mysqli_query($conn, $sql_m_271) or die;
        $re_num_m_271 = mysqli_num_rows($result_m_271);

?>

        var str='Banana (<i>Musa acuminata</i>) ( <a href=browse_species.php?speciesname=Banana%20(Musa%20acuminata)><font color=#FF0000><?php echo $re_num_m_271?></font></a> )';

        d.add(271, 262, str);

	d.add(272, 262, 'Poaceae');

	d.add(281, 272, 'Andropogoneae');

<?php

        $sql_m_291 = "select distinct * from gene_hormone_info where species = 'Maize (Zea mays)'";
        $result_m_291 = mysqli_query($conn, $sql_m_291) or die;
        $re_num_m_291 = mysqli_num_rows($result_m_291);

?>

        var str='Maize (<i>Zea mays</i>) ( <a href=browse_species.php?speciesname=Maize%20(Zea%20mays)><font color=#FF0000><?php echo $re_num_m_291?></font></a> )';

        d.add(291, 281, str);

<?php

        $sql_m_292 = "select distinct * from gene_hormone_info where species = 'Sorghum (Sorghum bicolor)'";
        $result_m_292 = mysqli_query($conn, $sql_m_292) or die;
        $re_num_m_292 = mysqli_num_rows($result_m_292);

?>

        var str='Sorghum (<i>Sorghum bicolor</i>) ( <a href=browse_species.php?speciesname=Sorghum%20(Sorghum%20bicolor)><font color=#FF0000><?php echo $re_num_m_292?></font></a> )';

        d.add(292, 281, str);
	
	d.add(282, 272, 'BEP clade');

<?php

        $sql_m_301 = "select distinct * from gene_hormone_info where species = 'Neosinocalamus affinis'";
        $result_m_301 = mysqli_query($conn, $sql_m_301) or die;
        $re_num_m_301 = mysqli_num_rows($result_m_301);

?>

	var str='<i>Neosinocalamus affinis</i> ( <a href=browse_species.php?speciesname=Neosinocalamus%20affinis><font color=#FF0000><?php echo $re_num_m_301?></font></a> )';

	d.add(301, 282, str);

<?php

        $sql_m_302 = "select distinct * from gene_hormone_info where species = 'Rice (Oryza sativa)'";
        $result_m_302 = mysqli_query($conn, $sql_m_302) or die;
        $re_num_m_302 = mysqli_num_rows($result_m_302);

?>

        var str='Rice (<i>Oryza sativa</i>) ( <a href=browse_species.php?speciesname=Rice%20(Oryza%20sativa)><font color=#FF0000><?php echo $re_num_m_302?></font></a> )';

        d.add(302, 282, str);

	d.add(303, 282, 'Pooideae');

	d.add(311, 303, 'Triticeae');

	d.add(321, 311, 'Triticum');

<?php

        $sql_m_331 = "select distinct * from gene_hormone_info where species = 'Wheat (Triticum turgidum)'";
        $result_m_331 = mysqli_query($conn, $sql_m_331) or die;
        $re_num_m_331 = mysqli_num_rows($result_m_331);

?>

	var str='Wheat (<i>Triticum turgidum</i>) ( <a href=browse_species.php?speciesname=Wheat%20(Triticum%20turgidum)><font color=#FF0000><?php echo $re_num_m_331?></font></a> )';

	d.add(331, 321, str);

<?php

        $sql_m_332 = "select distinct * from gene_hormone_info where species = 'Wheat (Triticum aestivum)'";
        $result_m_332 = mysqli_query($conn, $sql_m_332) or die;
        $re_num_m_332 = mysqli_num_rows($result_m_332);

?>

        var str='Wheat (<i>Triticum aestivum</i>) ( <a href=browse_species.php?speciesname=Wheat%20(Triticum%20aestivum)><font color=#FF0000><?php echo $re_num_m_332?></font></a> )';

        d.add(332, 321, str);

<?php

        $sql_m_322 = "select distinct * from gene_hormone_info where species = 'Barley (Hordeum vulgare)'";
        $result_m_322 = mysqli_query($conn, $sql_m_322) or die;
        $re_num_m_322 = mysqli_num_rows($result_m_322);

?>

        var str='Barley (<i>Hordeum vulgare</i>) ( <a href=browse_species.php?speciesname=Barley%20(Hordeum%20vulgare)><font color=#FF0000><?php echo $re_num_m_322?></font></a> )';

        d.add(322, 311, str);

	d.add(312, 303, 'Loliinae');
	
	d.add(341, 312, 'Festuca');

<?php

        $sql_m_351 = "select distinct * from gene_hormone_info where species = 'Fescue (Festuca pratensis Huds.)'";
        $result_m_351 = mysqli_query($conn, $sql_m_351) or die;
        $re_num_m_351 = mysqli_num_rows($result_m_351);

?>

        var str='Fescue (<i>Festuca pratensis Huds.</i>) ( <a href=browse_species.php?speciesname=Fescue%20(Festuca%20pratensis%20Huds.)><font color=#FF0000><?php echo $re_num_m_351?></font></a> )';

        d.add(351, 341, str);

<?php

        $sql_m_352 = "select distinct * from gene_hormone_info where species = 'Tall fescue (Festuca arundinacea)'";
        $result_m_352 = mysqli_query($conn, $sql_m_352) or die;
        $re_num_m_352 = mysqli_num_rows($result_m_352);

?>

        var str='Tall fescue (<i>Festuca arundinacea</i>) ( <a href=browse_species.php?speciesname=Tall%20fescue%20(Festuca%20arundinacea)><font color=#FF0000><?php echo $re_num_m_352?></font></a> )';

        d.add(352, 341, str);

<?php

        $sql_m_342 = "select distinct * from gene_hormone_info where species = 'Lolium perenne'";
        $result_m_342 = mysqli_query($conn, $sql_m_342) or die;
        $re_num_m_342 = mysqli_num_rows($result_m_342);

?>

        var str='<i>Lolium perenne</i> ( <a href=browse_species.php?speciesname=Lolium%20perenne><font color=#FF0000><?php echo $re_num_m_342?></font></a> )';

        d.add(342, 312, str);

document.write(d);
d.openAll();
	    
</script>
	
</p>

</div>

<?php
require ('common_footer.php');
?>


</body>
</html>

