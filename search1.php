<?php
require ('dbconnect.php');
require ('code.php');
?>






<html>
  <head>
 
   <meta name="Keywords"  content="Leaf Senescence DataBase, PSD, LSD, Leaf Senescence, plant Senescence, database, "/>
   <meta name="Description" content="Leaf Senescence DataBase"/>
   <title>Leaf Senescence DataBase</title>
   <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <style type="text/css">
<!--
.STYLE1 {font-size: 16}
-->
  </style>
  </head>
  <body  leftMargin="0px" topMargin="0px" marginheight="0px" marginwidth="0px"  style="margin:0px auto;">

  <!-- outmost table -->
  <table border=0 width="920" cellspacing=0 cellpadding=0 height=100% align="center"> 
   
   <tr> <!-- each TR has 2 tds -->
    <td bgcolor=#ededed width="160" height="69" class="left2">
	
	<!--  <img  src="/image/left2.jpg" border=0 align="top"/>	-->
	</td> 
    
	<td width="760"  height="69" align="right" valign="top" bgcolor=#ededed  class="right2" >
	<!--   <img width=800 height=70 src="/image/right2.jpg" border=0 align="top"  />	-->

		   
		 
	
  <form  id="cse-search-box" class="smargin"  action="search.php" >
    <input type="hidden" name="cx" value="015028502109286579616:zrflrutr-5g" />
    <input type="hidden" name="cof" value="FORID:10" />
    <input type="hidden" name="ie" value="utf-8" />
    <input type="text" name="q" size="11"  />
   
           <input name="go" value="go"  type="submit" class="sbutton"   >


           <br/ >
              <a href="/index.php" class="stext_a" >Home</a> |
              <a href="mailto:lsd@mail.cbi.pku.edu.cn" class="stext_b" >Contact</a> |
              <a href="about.php"  class="stext_c">About</a></p>
          </form>
		    <script type="text/javascript" src="http://www.google.com/cse/brand?form=cse-search-box&lang=en"></script>
	  </td>
   </tr>

   <tr>
     <td width="160" valign=top height=100% bgcolor=#F7F7F7>

	  <!-- navigation table -->
	  <table width=100% class="navg" border=0>

	   <tr><td><br></td></tr>

<!--	   <tr><td class=navgTitle>Home</td></tr>-->
       <tr><td><br></td></tr>
	  
	   <tr><td class=navgTitle><a href="introduction.php" target="frame1">Introduction</a></td></tr>

	   <tr><td><br></td></tr>

	   <tr><td class=navgTitle>Keyword Search</td></tr>
	   <tr><td class=navgLink>&nbsp;&nbsp;<a href="/searchGene.html" target="frame1">Gene</a></td></tr>
	   <tr><td class=navgLink>&nbsp;&nbsp;<a href="/searchMutant.html" target="frame1">Mutant</a></td></tr>
	   <tr><td class=navgLink>&nbsp;&nbsp;<a href="/cgi-bin/phenotypeCombinatorySearch.pl" target="frame1">Phenotype</a></td></tr>
	   <tr><td class=navgLink>&nbsp;&nbsp;<a href="/searchMicroarray.html" target="frame1">Microarray Data</a></td></tr>



	   <tr><td><br></td></tr>
           <tr><td class=navgTitle>Analysis Tools</td></tr>
           <tr><td class=navgLink>&nbsp;&nbsp;<a href="/blast/blast.html" target="frame1">BLAST</a></td></tr>
           <tr><td class=navgLink>&nbsp;&nbsp;<a href="/blast/blast.html" target="frame1">Clustalw</a></td></tr>

	   <tr><td><br></td></tr>

	   <tr><td class=navgTitle>Browse</td></tr>
           <tr><td class=navgLink><a href="/browsegene.php" target="frame1">&nbsp;&nbsp;All genes</a></td></tr>
	   <tr><td class=navgLink><a href="/cgi-bin/browse_mutant.pl" target="frame1">&nbsp;&nbsp;All mutants</a></td></tr>
	   <tr><td class=navgLink><a href="/cgi-bin/phenotypeBrowse.pl" target="frame1">&nbsp;&nbsp;Phenotypes</a></td></tr>
           <tr><td class=navgLink><a href="/cgi-bin/browse_microarrayExperiment.pl" target="frame1">&nbsp;&nbsp;Microarray Data</a></td></tr>
	   <tr><td><br></td></tr>

           <tr><td class=navgTitle><a href="/help" target="frame1">How to use</a></td></tr>
           <tr><td><br></td></tr>


	   <tr><td class=navgTitle>Feedback</td></tr>
           <tr><td class=navgLink><a href="/help.php" target="frame1">&nbsp;&nbsp;Your contributions</a></td></tr> 
	   <tr><td class=navgLink><a href="/contact.php" target="frame1">&nbsp;&nbsp;Authors</a></td></tr>

	   <tr><td><br></td></tr>
	   <tr><td><br></td></tr>
	  </table>
     <!-- navigation table ends -->	 </td>

	 <td width=760 height=100%> 
 <div id="cse-search-results" class="search"></div>
<script type="text/javascript">
  var googleSearchIframeName = "cse-search-results";
  var googleSearchFormName = "cse-search-box";
  var googleSearchDomain = "www.google.com";
  var googleSearchPath = "/cse";
  var googleSearchFrameWidth = "400";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>

 </td>
   </tr>

<?php
require ('common_footer.php');
?>
</table>


 </body>
</html>



