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
		
		$(function(){
			
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
		});
	</script>	
  </head>
  <body>

  <div  class="al">
	
    	<p  class="info" align="center">Welcome to the Leaf Senescence DataBase! </p> <hr/>
	  	 
	</div>
	
	<div class="kk">
 <div id="page-wrap"  >
											
	<div class="slider-wrap">
		<div id="main-photo-slider" class="csw">
			<div class="panelContainer">

				<div class="panel" title="Panel 1">
					<div class="wrapper">
						<img src="image/pic1.jpg" alt="temp" />
						<div class="photo-meta-data">
							Photo Credit: <a href="http://www.pku.edu.cn/" target="_blank">Peking University</a><br />
							<span>In Peking, China</span>						</div>
					</div>
				</div>
				<div class="panel" title="Panel 2">
					<div class="wrapper">
						<img src="image/pic2.jpg" alt="temp" />
						<div class="photo-meta-data">
							The autumn of Peking University<br />
							<span>by Wei Ming Lake</span>						</div>
					</div>
				</div>		
				<div class="panel" title="Panel 3">
					<div class="wrapper">
						
						<img src="image/pic3.jpg" alt="scotch egg" class="floatLeft"/>
						
						<h3>Class of leaf senescence:</h3>
						
						<ul>
							<li>Natural senescence</li>
							<li>Darkness induced senescence</li>
							<li>Nutritional Deficiency induced senescence</li>
							<li>Stress induced senescence</li>
						</ul>
					</div>
				</div>
				<div class="panel" title="Panel 4">
					<div class="wrapper">
						<img src="image/pic4.jpg" alt="temp" />
						<div class="photo-meta-data">
							Leaf Senescence<br />
							<span>Phenotype pictures</span>						</div>
					</div>
				</div>
				<div class="panel" title="Panel 5">
					<div class="wrapper">
						<img src="image/pic5.jpg" alt="temp" />
						<div class="photo-meta-data">
							Leaf Senescence<br />
							<span>Mutants pictures</span>						</div>
					</div>
				</div>
			</div>
		</div>

		<a href="#1" class="cross-link active-thumb"><img src="image/pic1-1thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a>
		<div id="movers-row">
			<div><a href="#2" class="cross-link"><img src="image/pic2-2thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
			<div><a href="#3" class="cross-link"><img src="image/pic3-3thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
			<div><a href="#4" class="cross-link"><img src="image/pic4-4thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
			<div><a href="#5" class="cross-link"><img src="image/pic5-5thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
		</div>
	</div>

	</div>
</div>
<br/>


<p class="sltext"> 
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Leaf senescence has been recognized as the last phase of plant development, a highly ordered process regulated by genes known as senescence associated genes (SAGs). Leaf senescence is induced as part of plant development but can also be prematurely induced as a result of environmental changes or harvesting. Premature senescence leads to reduced yield and quality of crops and this is likely to be of increasing concern in times of climate change and parallel population growth. Therefore, it might be expected that more research should be focused on this important topic in the future as increased understanding of the senescence traits will lead to the development of crops with improved yield, stress tolerance and shelf life. At present, great progresses have been achieved in leaf senescence research using Arabidopsis thaliana. </p>
   <p class="rltext">However, how the leaf senescence process is initiated and </p>
   <p class="botext">regulated remains largely unanswered. Luckily, with the development of genome research, more and more plant genome had been sequenced and analyzed, which offer us a good opportunity to analyze homologous gene of SAGs found in Arabidopsis thaliana. <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By integrating the data from mutant studies, transgenic analysis and gene ontology annotation, we identify genes related to regulation of the leaf senescence in various species, including Arabidopsis thaliana, Oryza sativa, Pisum sativum, Solanum lycopersicum cv. MicroTom, Brassica oleracea L. var. Italica, Medicago sativa, Solanum tuberosum L. cv. D, Glycine max, Hordeum vulgare, Zea mays, Rosa hybrid, etc. <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Another pronounced characteristic of this database is that we have categorized these genes according to their functions in regulation leaf senescence and developed ontology to precisely describe senescence-associated phenotypes with standardized vocabularies. 
    	</p>
  </body>
</html>

