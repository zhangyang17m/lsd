<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');
?>

<script language="javascript">
        	function checksubmit_gene(){
                	if((form1.name11.value=="")&&(form1.name12.value=="")) {
                        	alert("Please input search content!");
                        	form1.name11.focus();
                        	return false;
                	}
				      
                	return ture;
                }
				
				
		function checksubmit_mutant(){
                	if((form2.name21.value=="")&&(form2.name22.value=="")) {
                        	alert("Please input search content!");
                        	form2.name21.focus();
                        	return false;
                        }
				      
                        return ture;
                }
		
		function checksubmit_pmid(){
                	if((form3.name31.value=="")&&(form3.name32.value=="")) {
                        	alert("Please input search content!");
                        	form3.name31.focus();
                        	return false;
                        }
				      
                        return ture;
                }

                function checksubmit_primer(){
                	if((form4.name41.value=="")&&(form4.name42.value=="")) {
                        	alert("Please input search content!");
                        	form4.name41.focus();
                        	return false;
                        }
			return ture;
		}

		function checksubmit_miRNA(){
                        if((form5.name51.value=="")) {
                                alert("Please input search content!");
                                form5.name51.focus();
                                return false;
                        }
                        return ture;
                }

            function checksubmit_ecotype(){
                        if((form6.name61.value=="")) {
                                alert("Please input search content!");
                                form6.name61.focus();
                                return false;
                        }
                        return ture;
                }

            function checksubmit_poplar(){
                if((form7.name71.value=="")) {
                    alert("Please input search content!");
                    form7.name71.focus();
                    return false;
                }
                return ture;
            }



</script>




<div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">


<form  name="form1" method=post action="search_gene_result.php" ENCTYPE = "multipart/form-data" onsubmit="return checksubmit_gene()">
    <table border=0 width=100% cellpadding=3>
     <tr><td class=header2C11>Search Genes by Locus Name, Alias Name or Keyword&nbsp;&nbsp;&nbsp;<a href="/help/text.php#Gene"><img src="image/help.gif" width="15" height="15" border="0"/></a><hr/></td></tr>
	 <tr><td class=c bgcolor=#F7F7F7>
	  <table align=center border=0 width=90% cellpadding=4>
	   <tr>
	    <td class=r>
		 <b>Term(s): </b>
	    </td>
		<td>
	      <input type=text name="name11" size=25>&nbsp;<b>within:</b>
		<select name="selectGeninf1">
    	          <option value="GF1">All Fields</option>
		  <option value="LA1">Locus Name</option>
		  <option value="GK1">GenBank ID</option>
		  <option value="AN1">Alias Name</option>
		  <option value="SP1">Species</option>
		  <option value="FC1">Function Category</option>
		  <option value="ES1">Effect for Senescence</option>
		  <option value="KW1">Gene Description</option>
		</select>
                  <br/><B>(e.g. AT5G45900, APG7)</B>
	    </td>
	   </tr>
	   
	   <tr>
		<td class=r>
		 <select name="selectGeninf3">
		  <option value="Pand">AND  </option>
		  <option value="Por">OR   </option>
		 </select>
		</td>
		<td>
	     <input type=text name="name12" size=25>&nbsp;<b>within:</b>
		<select name="selectGeninf2">
                  <option value="GF2">All Fields</option>
		  <option value="LA2">Locus Name</option>
		  <option value="GK2">GenBank ID</option>
		  <option value="AN2">Alias Name</option>
		  <option value="SP2">Species</option>
		  <option value="FC2">Function Category</option>
		  <option value="ES2">Effect for Senescence</option>
		  <option value="KW2">Gene Description</option>
	        </select>
	    </td>
		</tr>
	   <tr>
	  
		<td class=r>
		 &nbsp;&nbsp;
		</td><td align=left>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=reset value="Reset">
		</td>

	   </tr>
	  </table>
	  </td>
	 </tr>
	</table>
	</form>

<form name="form2" method=post action="search_mutant_result.php" ENCTYPE = "multipart/form-data" onsubmit="return checksubmit_mutant()">
    <table border=0 width=100% cellpadding=3>
     <tr><td class=header2C11>Search Mutants by Mutant Name, Mutant type or Ecotype&nbsp;&nbsp;&nbsp;<a href="/help/text.php#Mutant"><img src="image/help.gif" width="15" height="15" border="0"/></a><hr/></td></tr>
	 <tr><td class=c bgcolor=#F7F7F7>
	  <table align=center border=0 width=90% cellpadding=4>
	   <tr>
	    <td class=r>
		 <b>Term(s): </b>
	    </td>
		<td>
		  <input type=text name="name21" size=25>&nbsp;<b>within:</b>
		<select name="selectMutinf1">
    	  <option value="MF1">All Fields</option>
		  <option value="MA1">Mutant Name</option>
		  <option value="MT1">Mutant Type</option>		  
		  <option value="ME1">Ecotype</option>
		</select>
                  <br/><B>(e.g. ACBP3-GFP, Col-0)</B>
	    </td>
	   </tr>
	   
	   <tr>
		<td class=r>
		 <select name="selectMutinf3">
		  <option value="Pand">AND  </option>
		  <option value="Por">OR   </option>
		 </select>
		</td>
		<td>
	     <input type=text name="name22" size=25>&nbsp;<b>within:</b>
		  <select name="selectMutinf2">
    	  <option value="MF2">All Fields</option>
		  <option value="MA2">Mutant Name</option>
		  <option value="MT2">Mutant Type</option>		  
		  <option value="ME2">Ecotype</option>
		</select>
	    </td>
		</tr>
	   <tr>
	  
		<td class=r>
		 &nbsp;&nbsp;
		</td><td align=left>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=reset value="Reset">
		</td>

	   </tr>
	  </table>
	  </td>
	 </tr>
	</table>
	</form>

<form  name="form3" method=post action="search_pubmed_result.php" ENCTYPE = "multipart/form-data" onsubmit="return checksubmit_pmid()">
    <table border=0 width=100% cellpadding=3>
     <tr><td class=header2C11>Search Articles by Title, Author or Keyword&nbsp;&nbsp;&nbsp;<a href="/help/text.php#Article"><img src="image/help.gif" width="15" height="15" border="0"/></a><hr/></td></tr>
	 <tr><td class=c bgcolor=#F7F7F7>
	  <table align=center border=0 width=90% cellpadding=4>
	   <tr>
	    <td class=r>
		 <b>Term(s): </b>
	    </td>
		<td>
		  <input type=text name="name31" size=25>&nbsp;<b>within:</b>
		  <select name="selectpubmed1">
		  <option value="PK1">All Fields</option>
		  <option value="PT1">Title</option>
		  <option value="PA1">Author</option>		  
		  <option value="PJ1">Journal</option>
		  <option value="PD1">Date</option>
		  </select>
                  <br/><B>(e.g. Gan SS, senescence)</B>
	    </td>
	   </tr>
	   
	   <tr>
		<td class=r>
		 <select name="selectpubmed3">
		  <option value="Pand">AND  </option>
		  <option value="Por">OR   </option>
		 </select>
		</td>
		<td>
	     <input type=text name="name32" size=25>&nbsp;<b>within:</b>
		  <select name="selectpubmed2">
		  <option value="PK2">All Fields</option>
		  <option value="PT2">Title</option>
		  <option value="PA2">Author</option>		  
		  <option value="PJ2">Journal</option>
		  <option value="PD2">Date</option>
		</select>
	    </td>
		</tr>
	   <tr>
	  
		<td class=r>
		 &nbsp;&nbsp;
		</td><td align=left>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=reset value="Reset">
		</td>

	   </tr>
	  </table>
	  </td>
	 </tr>
	</table>
	</form>


<form name="form4" method=post action="search_primer_result.php" ENCTYPE = "multipart/form-data" onsubmit="return checksubmit_primer()">
    <table border=0 width=100% cellpadding=3>
     <tr><td class=header2C11>Search Primers by Locus Name, Alias Name or Keyword&nbsp;&nbsp;&nbsp;<a href="/help/text.php#Primer"><img src="image/help.gif" width="15" height="15" border="0"/></a><hr/></td></tr>
         <tr><td class=c bgcolor=#F7F7F7>
          <table align=center border=0 width=90% cellpadding=4>
           <tr>
            <td class=r>
                 <b>Term(s): </b>
            </td>
                <td>
                  <input type=text name="name41" size=25>&nbsp;<b>within:</b>
                  <select name="selectPrimer1">
                  <option value="PGF1">All Fields</option>
                  <option value="PLA1">Locus Name</option>
                  <option value="PGK1">GenBank ID</option>
                  <option value="PAN1">Alias Name</option>
                  <option value="PSP1">Species</option>
                  <option value="PPU1">Purpose</option>
                  <option value="PEV1">Validation</option>
                  </select>
                  <br/><B>(e.g. AT4G35770, SEN1)</B>
            </td>
           </tr>

           <tr>
                <td class=r>
                 <select name="selectPrimer3">
                  <option value="Pand">AND  </option>
                  <option value="Por">OR   </option>
                 </select>
                </td>
                <td>
                  <input type=text name="name42" size=25>&nbsp;<b>within:</b>
                  <select name="selectPrimer2">
                  <option value="PGF2">All Fields</option>
                  <option value="PLA2">Locus Name</option>
                  <option value="PGK2">GenBank ID</option>
                  <option value="PAN2">Alias Name</option>
                  <option value="PSP2">Species</option>
                  <option value="PPU2">Purpose</option>
                  <option value="PEV2">Validation</option>
                </select>
            </td>
                </tr>
           <tr>

                <td class=r>
                 &nbsp;&nbsp;
                </td><td align=left>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=reset value="Reset">
                </td>

           </tr>
          </table>
          </td>
         </tr>
        </table>
        </form>


<form name="form5" method=post action="search_miRNA_result.php" ENCTYPE = "multipart/form-data" onsubmit="return checksubmit_miRNA()">
    <table border=0 width=100% cellpadding=3>
     <tr><td class=header2C11>Search miRNA Interactions by miRNA Name&nbsp;&nbsp;&nbsp;<a href="/help/text.php#miRNA"><img src="image/help.gif" width="15" height="15" border="0"/></a><hr/></td></tr>
         <tr><td class=c bgcolor=#F7F7F7>
          <table align=center border=0 width=90% cellpadding=4>
           <tr>
            <td class=r>
                 <b>Term(s): </b>
            </td>
                <td>
                  <input type=text name="name51" size=25>&nbsp;<b>within:</b>
                  <select name="selectmiRNA1">
                  <option value="PLA1">miRNA Name</option>
                  </select>
                  <br/><B>(e.g. ath-miR164a)</B>
                </td>
           </tr>

           <tr>

                <td class=r>
                 &nbsp;&nbsp;
                </td><td align=left>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=reset value="Reset">
                </td>

           </tr>
          </table>
          </td>
         </tr>
        </table>
        </form>



    <form name="form6" method=post action="search_ecotype_result.php" ENCTYPE = "multipart/form-data" onsubmit="return checksubmit_ecotype()">
    <table border=0 width=100% cellpadding=3>
     <tr><td class=header2C11>Search Ecotype by Name&nbsp;&nbsp;<a href="/help/text.php#miRNA"><img src="image/help.gif" width="15" height="15" border="0"/></a><hr/></td></tr>
         <tr><td class=c bgcolor=#F7F7F7>
          <table align=center border=0 width=90% cellpadding=4>
           <tr>
            <td class=r>
                 <b>Term(s): </b>
            </td>
                <td>
                  <input type=text name="name61" size=25>&nbsp;<b>within:</b>
                  <select name="selectecotype">

                      <option value="PLA1">Ecotype Name</option>

                  </select>
                  <br/><B>(e.g. Kar-1)</B>
                </td>
           </tr>

           <tr>

                <td class=r>
                 &nbsp;&nbsp;
                </td><td align=left>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=reset value="Reset">
                </td>

           </tr>
          </table>
          </td>
         </tr>
        </table>
        </form>



    <form name="form7" method=post action="search_poplar_result.php" ENCTYPE = "multipart/form-data" onsubmit="return checksubmit_poplar()">
    <table border=0 width=100% cellpadding=3>
     <tr><td class=header2C11>Search Poplar Transcriptomics by Name&nbsp;&nbsp;<a href="/help/text.php#miRNA"><img src="image/help.gif" width="15" height="15" border="0"/></a><hr/></td></tr>
         <tr><td class=c bgcolor=#F7F7F7>
          <table align=center border=0 width=90% cellpadding=4>
           <tr>
            <td class=r>
                 <b>Term(s): </b>
            </td>
                <td>
                  <input type=text name="name71" size=25>&nbsp;<b>within:</b>
                  <select name="selectpoplar">

                      <option value="PLA1">Locus name</option>

                  </select>
                  <br/><B>(e.g. Potri.001G007000)</B>
                </td>
           </tr>

           <tr>

                <td class=r>
                 &nbsp;&nbsp;
                </td><td align=left>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=reset value="Reset">
                </td>

           </tr>
          </table>
          </td>
         </tr>
        </table>
        </form>

</div>
   </td>
   </tr>


<?php
require ('common_footer.php');
?>
</table>




 </body>
</html>

