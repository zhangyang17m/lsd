<?php

require ('dbconnect.php');
require ('code.php');

?>




<html>
  <head>
    <title>Main</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
	<script type="text/javascript" src="js/jquery-easing-1.3.pack.js"></script>
	<script type="text/javascript" src="js/jquery-easing-compatibility.1.2.pack.js"></script>
	<script type="text/javascript" src="js/coda-slider.1.1.1.pack.js"></script>
	
	<script type="text/javascript">
	
		var theInt = null;
		var $crosslink, $navthumb;
		var curclicked = 0;
		
		theInterval = function(cur){
			clearInterval(theInt);
			
			if( typeof cur != 'undefined' )
				curclicked = cur;
			
			$crosslink.removeClass("active-thumb");
			$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
			
			theInt = setInterval(function(){
				$crosslink.removeClass("active-thumb");
				$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
				curclicked++;
				if( 5 == curclicked )
					curclicked = 0;
				
			}, 8000);
		};
		
		/*$(function(){
			
			$("#main-photo-slider").codaSlider();
			
			$navthumb = $(".nav-thumb");
			$crosslink = $(".cross-link");
			
			$navthumb
			.click(function() {
				var $this = $(this);
				theInterval($this.parent().attr('href').slice(1) - 1);
				return false;
			});
			
			theInterval();
		});*/
	</script>	
  </head>
  <body >
  <br/>
  <br/>
  <div  class="al">
	
    	<p  class="info" align="center">Welcome to LSD 3.0: Leaf Senescence Database Update!</p> <hr width="860px" align="left" />
	  	 
	</div>
	
	
<div class="kk" style="margin-left:20px;">

<?php

$sql = "select distinct * from gene_hormone_info";
$result = mysqli_query($conn,$sql);
if (!$result) die(mysqli_error($conn));
$gene_num_tmp = mysqli_num_rows($result);
$gene_num = $gene_num_tmp - 1;

$sql="select distinct * from plant_info";
$result=mysqli_query($conn,$sql);
if (!$result) die(mysqli_error($conn));
$mutant_num=mysqli_num_rows($result);

?>

<p class="sltext" style="font-size:14px; line-height: 23px;"> As in other organisms, plants undergo age-dependent developmental changes during their lifespans. Leaves, the major photosynthetic organs, undergo growth, maturation, and senescence, and ultimately progress to death along age. As the last phase of leaf development, leaf senescence is a highly ordered process regulated by senescence associated genes (SAGs) and is tightly controlled by multiple layers of regulation, including at the level of chromatin and transcription, as well as by post-transcriptional, translational and post-translational regulation.
   <br/><br/> To facilitate the systematical research and comparative study of leaf senescence, we constructed a database of leaf senescence (<a href = 'http://psd.cbi.pek.edu.cn:7001' target = '_blank'>LSD 1.0</a>, August 2011; <a href = 'http://lsd.ic4r.org/' target = '_blank'>LSD 2.0</a>, June 2013) to collect SAGs, mutants, phenotypes and literature references. Now, we update LSD to a new version LSD 3.0 (June 2019).</p>
    <br/><br/><b>LSD 3.0 contains <i>5896</i> genes and <i>466</i> mutants. New features of LSD 3.0 are as follows:<br/></b>
<p class="sltext" style="font-size:12px; line-height: 23px;">
<b>
. 539 genes and 142 mutants from 39 Species ared added in LSD 3.0.<br/>
. 678 senescence-upreguated genes and 910 senescence-downregulatd genes in Poplar has been identified and added.<br/>
. Transcriptomics data of leaf senescence in Poplar are added.</br>
    . Senscence-differentially expressed small RNA (Sen-smallRNA) in <i>Arabidopsis</i> are added.<br/>
. Interaction pairs between Sen-small RNA and Sen-TF are added.<br/>
    . Senescence phenotypes of 90 natural accessions (ecotypes) and 42 images of ecotypes in <i>Arabidopsis</i> are added.<br/>
    . Link LSD3.0 to <a href="http://planttfdb.cbi.pku.edu.cn/" target = '_blank'>Plant Transcription Factor Database</a>.<br>
    . New options of search engines for ecotypes and transcriptomics data are implemented.<br><br/></b></p>

<!--
<div id="page-wrap">			
	<div class="slider-wrap">
		<div id="main-photo-slider" class="csw">
			<div class="panelContainer">
				<div class="panel" title="Panel 1">
					<div class="wrapper">
						<img src="image/tree3.jpg" alt="temp" />
					</div>
				</div>
				<div class="panel" title="Panel 2">
					<div class="wrapper">
						<img src="image/subcellular_location.jpg" alt="temp" />
					</div>
				</div>		
				<div class="panel" title="Panel 3">
					<div class="wrapper">
						<img src="image/pic5.jpg" alt="temp" />
						<div class="photo-meta-data">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Control&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Darkness treatment<br />
							<span> &nbsp;&nbsp;</span> 				</div>
					</div>
				</div>
				<div class="panel" title="Panel 4">
					<div class="wrapper">
						
						<img src="image/phenotype.jpg" alt="scotch egg" class="floatLeft"/>
						<br><br><br><br>Wild Type<br><br><br><br><br><br><br><br>Early-senescence mutant
					</div>
				</div>
				<div class="panel" title="Panel 5">
					<div class="wrapper">
						<img src="image/pic2.jpg" alt="temp" />
						<div class="photo-meta-data">
							The Number of Genes in Leaf Senescence DataBase<br/>
							<span> &nbsp;&nbsp;</span> 
						</div>
					</div>
				</div>
			</div>
		</div>

		<a href="#1" class="cross-link active-thumb"><img src="image/tree3-thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a>
		<div id="movers-row">
		    <div><a href="#2" class="cross-link"><img src="image/subcellular_location-thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
			<div><a href="#3" class="cross-link"><img src="image/pic5-5thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
			<div><a href="#4" class="cross-link"><img src="image/phenotype-thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
			<div><a href="#5" class="cross-link"><img src="image/pic2-2thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
		</div>
	</div>
</div>
-->

<div>
<!--	<br/><br/><img src="image/SAGs_species.png" width="460" height="296" /><br/><br/><br/>-->
	<a target="_blank" href="image/aa.png"><img border="0" src="image/aa.png" width="720" height="200" /></a>
	<a target="_blank" href="image/bb.png"><img border="0" src="image/bb.png" width="720" height="200" /></a>
<!--	<a target="_blank" href="image/Subcellular_localization.png"><img border="0" src="image/Subcellular_localization.png" width="140" height="95" /></a>-->
<!--	<a target="_blank" href="image/EIN2Cox.png"><img border="0" src="image/EIN2Cox.png" width="140" height="95" /></a>-->
<!--	<a target="_blank" href="image/Leaf_senscence_phenotype_database.png"><img border="0" src="image/Leaf_senscence_phenotype_database.png" width="140" height="95" /></a>-->
</div>

<p class="sltext" style="font-size:16px; line-height:23px; text-indent:2em;">
<br/>
<B><font size="-1">Please Cite:</font></B><br/>
<font size="-1">
Li, Z., Zhao, Y., Liu, X., Peng, J., Guo, H., and Luo, J. (2013). LSD 2.0: an update of the leaf senescence database. Nucleic Acids Res. 42(D1): D1200-D1205. <a href="http://nar.oxfordjournals.org/content/42/D1/D1200" target="_blank"><b>[Full Text]</b></a><br/><br/>
Liu, X., Li, Z., Jiang, Z., Zhao, Y., Peng, J., Jin, J., Guo, H., and Luo, J. (2011). LSD: a leaf senescence database. Nucleic Acids Res. 39: D1103-1107. <a href="http://nar.oxfordjournals.org/content/39/suppl_1/D1103" target="_blank"><b>[Full Text]</b></a><br/>
</font><br/>
<br/>
</p>

</div>
</body>
</html>
