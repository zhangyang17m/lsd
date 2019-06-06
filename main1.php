<?php
require ('dbconnect.php');
require ('code.php');
?>

<html>
  <head>
    <title>Main</title>
    <link rel="stylesheet" type="text/css" href="/style.css" />
  </head>
  <body>

    <div  class="al">
	<br/>
	<br/>
	
	
    	<p  class="info" align="center">Welcome to the Leaf Senescence DataBase! </p> <hr/>
	  	 <div class="bk"><p > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Plant hormones are small organic molecules which influence numerous aspects of plant growth and every aspect of plant development. The aim of the Arabidopsis hormone database is to provide a systematic and comprehensive view of morphological phenotypes regulated by plant hormones, as well as regulatory genes participating in numerous plant hormone responses. <br>
		  &nbsp;&nbsp;&nbsp;By interegrating the data from mutant studies, transgenic analysis and gene ontology annotation, we 
identify genes related to the stimulus of eight plant hormones, including abscisic acid, auxin, brassinosteroid, cytokinin, ethylene, gibberellin, jasmonic acid and salicylic acid. <BR>
		  &nbsp;&nbsp;&nbsp;Another pronounced characteristics of this database is that we have developed <a href=/cgi-bin/phenotypeBrowse.pl><B>phenotype ontology</B></a> to precisely describe all kinds of morphological processes regulated by plant hormones with <img src="image/qq112.jpg" alt="" width="200" height="300" align="right" style="float:right">standardized vocabularies.
    	</p>
        </div>
	</div>
  <table border=0 cellspacing="5" cellpadding="0"> 
   	<tr>
		<td>
			<table border=0 width=370 cellpadding="0">
			  <tr>
				<td>
					<p class="header">Number of hormone related genes in the database</p>
				</td>		
			  </tr>
			</table> 
		
			<table border=0 width=370 bgcolor=black cellspacing=1>  
			  <tr>
				<td class=headerC rowspan="3" width=30%>Hormone</td>
				<td class=headerC colspan="5" width=70%># of Genes (support evidence)</td>
			  </tr>
			  
			  <tr>
				<td class=headerC colspan="2" width=40%>Genetic study</td>
				<td class=headerC rowspan="2" width=20%>Gene Ontology annotation</td>
				<td class=headerC rowspan="2" width=10%>All</td>
			  </tr>
			  <tr>
				<td class=headerC width=20%>Mutant</td>
				<td class=headerC width=20%>Transgenic</td>
			  </tr>
			  <?php
#				  $sql="select distinct hormone from plant_hormone order by hormone";
#				  $result=mysqli_query($conn,$sql);
#				  while($info=mysqli_fetch_array($result)){
#					  print_number_MG($info[0]);
#				  }
				  print_number_MG("auxin");
                                  print_number_MG("gibberellin"); 
                                  print_number_MG("cytokinin"); 
                                  print_number_MG("abscisic acid"); 
                                  print_number_MG("ethylene"); 
                                  print_number_MG("jasmonic acid"); 
                                  print_number_MG("salicylic acid"); 
                                  print_number_MG("brassinosteroid"); 

				  print_number_MG("ALL hormone");
			  ?>
			 </table>
	 	</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp</td>
		<td valign="top">
			<table border=0 width=340 cellpadding=0>
			  <tr>
				<td>
					<p class="header">Browse Phenotypes</p>
				</td>		
			  </tr>
			</table>
			
			<table border=0 width=340>
			  <tr>
				<td>
					<a href=/cgi-bin/phenotypeBrowse.pl><img src="/image/po.jpg" border=0></a>
				</td>		
			  </tr>
			</table>		
	 	  
    </table>



  </body>
</html>

