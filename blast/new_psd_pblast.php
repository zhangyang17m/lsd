

<script language="javascript">
        function changeprogram(programid){
  //	  document.all("matrix").style.visibility = "hidden"; 	//它们都可以实现对域的隐藏，但visibility要占用域的空间，而display则不会！(http://www.cnblogs.com/bowen80/archive/2008/04/22/1164824.html)
      //    document.all("matrix").style.display="none";        
	    //   alert(programid);      
           if(programid=="blastn")
		   {
		      document.all("blastndiv").style.display="block"; 
			  document.all("blastpdiv").style.display="none"; 
			  document.all("blastxdiv").style.display="none"; 
			  document.all("tblastndiv").style.display="none";
			   MainBlastForm.DATALIB.value="cds";
			  
			}
		     
           if(programid=="blastp")
		   {
		      document.all("blastndiv").style.display="none"; 
			  document.all("blastpdiv").style.display="block"; 
			  document.all("blastxdiv").style.display="none"; 
			  document.all("tblastndiv").style.display="none"; 
			  MainBlastForm.DATALIB.value="protein";
			  
			}
			 if(programid=="blastx")
		   {
		      document.all("blastndiv").style.display="none"; 
			  document.all("blastpdiv").style.display="block"; 
			  document.all("blastxdiv").style.display="block"; 
			  document.all("tblastndiv").style.display="none"; 
			  MainBlastForm.DATALIB.value="protein";
			  
			}
	
		if(programid=="tblastn")
		   {
		      document.all("blastndiv").style.display="none"; 
			  document.all("blastpdiv").style.display="block"; 
			  document.all("blastxdiv").style.display="none"; 
			  document.all("tblastndiv").style.display="block";
			  MainBlastForm.DATALIB.value="cds";
			  
			}
           
        }
		
		
		    function checksubmit(){
			if (MainBlastForm.PROGRAM.value=='blastn')
			 {
			    MainBlastForm.OTHER_ADVANCED.value=MainBlastForm.Match_Scores.value;
			 }
			 return true;
			}
			
			function  showseq()
			{
			  //alert("seq");
			 if (MainBlastForm.PROGRAM.value=='blastp') {
			  MainBlastForm.SEQUENCE.value='>AT4G35580.1\nMGAVSMESLPLGFRFRPTDEELVNHYLRLKINGRHSDVRVIPDIDVCKWEPWDLPALSVIKTDDPEWFFFCPRDRKYPNGHRSNRATDSGYWKATGKDRSIKSKKTLIGMKKTLVFYRGRAPKGERTNWIMHEYRPTLKDLDGTSPGQSPYVLCRLFHKPDDRVNGVKSDEAAFTASNKYSPDDTSSDLVQETPSSDAAVEKPSDYSGGCGYAHSNSTADGTMIEAPEENLWLSCDLEDQKAPLPCMDSIYAGDFSYDEIGFQFQDGTSEPDVSLTELLEEVFNNPDDFSCEESISRENPAVSPNGIFSSAKMLQSAAPEDAFFNDFMAFTDTDAEMAQLQYGSEGGASGWPSDTNSYYSDLVQQEQMINHNTENNLTEGRGIKIRARQPQNRQSTGLINQGIAPRRIRLQLQSNSEVKEREEVNEGHTVIPEAKEAAAKYSEKSGSLVKPQIKLRARGTIGQVKGERFADDEVQVQSRKRRGGKRWKVVATVMVAVMVGVGMGIWRTLVSS';}
			 if (MainBlastForm.PROGRAM.value=='blastn') {
			  MainBlastForm.SEQUENCE.value='>AT4G35580.1\nATGGGTGCTGTATCGATGGAGTCGCTTCCTTTAGGTTTCAGATTCAGACCTACCGATGAAGAGCTCGTCAATCACTACCTCCGTCTCAAGATCAACGGACGTCACTCCGATGTCCGTGTCATCCCTGATATCGATGTCTGCAAATGGGAACCTTGGGATCTTCCTGCTCTCTCGGTGATTAAGACGGATGATCCAGAGTGGTTCTTTTTCTGCCCTCGTGATCGGAAATACCCTAATGGTCATCGCTCTAACAGAGCAACTGACTCTGGCTATTGGAAAGCTACTGGTAAAGATCGTAGCATCAAGTCTAAGAAGACTTTAATCGGTATGAAGAAGACTCTTGTCTTCTATCGTGGACGAGCTCCTAAAGGTGAGCGGACTAATTGGATTATGCACGAGTATCGTCCCACTCTTAAGGATCTTGATGGCACTTCCCCTGGCCAAAGCCCTTACGTTCTTTGTCGCCTCTTCCACAAGCCTGATGATCGGGTTAATGGTGTCAAGTCCGATGAAGCAGCTTTTACGGCCAGCAACAAATACTCACCTGATGATACATCATCTGATCTTGTTCAAGAAACACCTTCCTCTGATGCTGCTGTTGAGAAACCATCAGATTATTCAGGTGGATGCGGTTATGCTCATAGTAATAGTACCGCAGATGGGACAATGATTGAGGCACCTGAAGAGAATCTTTGGTTATCTTGTGACCTTGAAGATCAAAAGGCACCACTACCGTGTATGGATTCTATATATGCTGGTGATTTCAGTTACGATGAGATTGGATTCCAATTTCAAGATGGTACCAGCGAACCAGATGTATCACTAACAGAATTGTTGGAGGAGGTGTTCAATAACCCTGATGACTTCTCTTGCGAGGAATCGATCAGTCGAGAGAATCCAGCAGTCTCACCAAATGGGATATTTTCATCTGCTAAAATGCTGCAGTCTGCAGCACCAGAGGATGCTTTCTTCAACGACTTCATGGCTTTCACTGATACAGATGCTGAGATGGCGCAATTGCAGTATGGTTCAGAAGGTGGAGCTTCTGGTTGGCCAAGTGACACTAATTCATACTATAGTGATTTGGTTCAGCAAGAGCAAATGATCAATCATAACACAGAGAACAACCTCACAGAAGGGAGAGGGATAAAGATCCGGGCTCGACAGCCTCAGAACCGGCAGAGTACAGGATTGATAAACCAGGGTATTGCTCCAAGGAGAATCCGTCTGCAGCTGCAGTCTAACTCTGAAGTAAAAGAACGAGAGGAGGTGAATGAAGGACACACTGTTATTCCCGAGGCCAAAGAAGCTGCAGCTAAATACTCAGAGAAGAGTGGTTCTTTGGTTAAACCTCAAATAAAGCTCAGGGCGCGGGGAACTATAGGCCAAGTAAAAGGAGAGAGATTTGCAGACGACGAGGTACAGGTGCAGAGCAGAAAGAGACGAGGAGGGAAGCGATGGAAGGTGGTTGCAACGGTAATGGTGGCTGTGATGGTTGGGGTAGGGATGGGTATATGGAGGACACTGGTGAGTTCATGA';
			  }
			  if (MainBlastForm.PROGRAM.value=='blastx') {
			  MainBlastForm.SEQUENCE.value='>AT4G35580.1\nATGGGTGCTGTATCGATGGAGTCGCTTCCTTTAGGTTTCAGATTCAGACCTACCGATGAAGAGCTCGTCAATCACTACCTCCGTCTCAAGATCAACGGACGTCACTCCGATGTCCGTGTCATCCCTGATATCGATGTCTGCAAATGGGAACCTTGGGATCTTCCTGCTCTCTCGGTGATTAAGACGGATGATCCAGAGTGGTTCTTTTTCTGCCCTCGTGATCGGAAATACCCTAATGGTCATCGCTCTAACAGAGCAACTGACTCTGGCTATTGGAAAGCTACTGGTAAAGATCGTAGCATCAAGTCTAAGAAGACTTTAATCGGTATGAAGAAGACTCTTGTCTTCTATCGTGGACGAGCTCCTAAAGGTGAGCGGACTAATTGGATTATGCACGAGTATCGTCCCACTCTTAAGGATCTTGATGGCACTTCCCCTGGCCAAAGCCCTTACGTTCTTTGTCGCCTCTTCCACAAGCCTGATGATCGGGTTAATGGTGTCAAGTCCGATGAAGCAGCTTTTACGGCCAGCAACAAATACTCACCTGATGATACATCATCTGATCTTGTTCAAGAAACACCTTCCTCTGATGCTGCTGTTGAGAAACCATCAGATTATTCAGGTGGATGCGGTTATGCTCATAGTAATAGTACCGCAGATGGGACAATGATTGAGGCACCTGAAGAGAATCTTTGGTTATCTTGTGACCTTGAAGATCAAAAGGCACCACTACCGTGTATGGATTCTATATATGCTGGTGATTTCAGTTACGATGAGATTGGATTCCAATTTCAAGATGGTACCAGCGAACCAGATGTATCACTAACAGAATTGTTGGAGGAGGTGTTCAATAACCCTGATGACTTCTCTTGCGAGGAATCGATCAGTCGAGAGAATCCAGCAGTCTCACCAAATGGGATATTTTCATCTGCTAAAATGCTGCAGTCTGCAGCACCAGAGGATGCTTTCTTCAACGACTTCATGGCTTTCACTGATACAGATGCTGAGATGGCGCAATTGCAGTATGGTTCAGAAGGTGGAGCTTCTGGTTGGCCAAGTGACACTAATTCATACTATAGTGATTTGGTTCAGCAAGAGCAAATGATCAATCATAACACAGAGAACAACCTCACAGAAGGGAGAGGGATAAAGATCCGGGCTCGACAGCCTCAGAACCGGCAGAGTACAGGATTGATAAACCAGGGTATTGCTCCAAGGAGAATCCGTCTGCAGCTGCAGTCTAACTCTGAAGTAAAAGAACGAGAGGAGGTGAATGAAGGACACACTGTTATTCCCGAGGCCAAAGAAGCTGCAGCTAAATACTCAGAGAAGAGTGGTTCTTTGGTTAAACCTCAAATAAAGCTCAGGGCGCGGGGAACTATAGGCCAAGTAAAAGGAGAGAGATTTGCAGACGACGAGGTACAGGTGCAGAGCAGAAAGAGACGAGGAGGGAAGCGATGGAAGGTGGTTGCAACGGTAATGGTGGCTGTGATGGTTGGGGTAGGGATGGGTATATGGAGGACACTGGTGAGTTCATGA';
			  }
			  if (MainBlastForm.PROGRAM.value=='tblastn') {
			  MainBlastForm.SEQUENCE.value='>AT4G35580.1\nMGAVSMESLPLGFRFRPTDEELVNHYLRLKINGRHSDVRVIPDIDVCKWEPWDLPALSVIKTDDPEWFFFCPRDRKYPNGHRSNRATDSGYWKATGKDRSIKSKKTLIGMKKTLVFYRGRAPKGERTNWIMHEYRPTLKDLDGTSPGQSPYVLCRLFHKPDDRVNGVKSDEAAFTASNKYSPDDTSSDLVQETPSSDAAVEKPSDYSGGCGYAHSNSTADGTMIEAPEENLWLSCDLEDQKAPLPCMDSIYAGDFSYDEIGFQFQDGTSEPDVSLTELLEEVFNNPDDFSCEESISRENPAVSPNGIFSSAKMLQSAAPEDAFFNDFMAFTDTDAEMAQLQYGSEGGASGWPSDTNSYYSDLVQQEQMINHNTENNLTEGRGIKIRARQPQNRQSTGLINQGIAPRRIRLQLQSNSEVKEREEVNEGHTVIPEAKEAAAKYSEKSGSLVKPQIKLRARGTIGQVKGERFADDEVQVQSRKRRGGKRWKVVATVMVAVMVGVGMGIWRTLVSS';}
			}
</script>




<FORM   ACTION="blast/blast.cgi" METHOD=POST  ENCTYPE= "multipart/form-data" NAME="MainBlastForm" class="infoblast"  target="_blank" onsubmit="return checksubmit()" >
<P>Choose program to use and database to search:
</P>

<a href="blast/docs/blast_program.html">Program</a>
<select name = "PROGRAM" class="style3" onchange="changeprogram(this.value)" >
 <!--   <option value=no Selected>--------------  -->
    <option value=blastp > blastp 
    <option value=blastn > blastn
    <option value=blastx> blastx 
   <option value=tblastn> tblastn 
  <!--      <option> tblastx  -->
</select>
&nbsp;&nbsp;<a href="blast/docs/blast_databases.html">LSD Database</a>
<select name = "DATALIB"> 
  <!--    <option VALUE ="seq_cds"> Cds
    <option VALUE ="seq_cdna"> Cdna
    <option VALUE ="seq_up1k"> upstream 1K
    <option VALUE ="seq_down1k"> Downstream 1K
    <option VALUE ="seq_pep"> Protein
-->

   <!--    <option value="no" Selected> ------------ -->
    <option value="protein"> Protein
	<option value="cds"> CDS
    <option value="cdna"> mRNA
    <option value="genomic"> Genomic 



</select>
<!--
<a href="blast/docs/blast_databases.html">Database</a>
<select name = "DATALIB" class="style3">
<SCRIPT>regionState.printOptions("DATALIB");</SCRIPT>
</select>
-->
<br>
<br>

<!--
Enter here your input data as 
<select name = "INPUT_TYPE"> 
    <option> Sequence in FASTA format 
    <option> Accession or GI 
</select>
-->

<P/>Enter sequence below in <a href="blast/docs/fasta.html">FASTA</a>  format ( <a onclick="javascript:showseq(); " href="javascript:void(0);">example</a> )<BR>
<textarea name="SEQUENCE" rows=8 cols=70>
<?php

$seq=trim($_POST["sequence"]);
$db=trim($_POST["seqtype"]);



if($seq && $db) {

	echo $seq;
}
?>

</textarea>

<BR>
Or load it from disk 
<INPUT TYPE="file" NAME="SEQFILE">
<P>
Set subsequence: From
&nbsp;&nbsp;<input TYPE="text" NAME="QUERY_FROM" VALUE="" SIZE="10">
&nbsp;&nbsp;&nbsp;&nbsp; To
<input TYPE="text" NAME="QUERY_TO" VALUE="" SIZE="10">
<p>
<INPUT TYPE="button" VALUE="Clear sequence" onClick="MainBlastForm.SEQUENCE.value='';MainBlastForm.QUERY_FROM.value='';MainBlastForm.QUERY_TO.value='';MainBlastForm.SEQUENCE.focus();">
<INPUT TYPE="submit" VALUE="Search">
<HR width="80%" align="left">
</p>


<p/>The query sequence is 
<a href="blast/docs/filtered.html">filtered</a> 
for low complexity regions by default.
<BR>
<a href="blast/docs/newoptions.html#filter">Filter</a>
 <INPUT TYPE="checkbox" VALUE="L" NAME="FILTER"> Low complexity
 <INPUT TYPE="checkbox" VALUE="m" NAME="FILTER"> Mask for lookup table only
<P/>
<!-- <a href="blast/docs/newoptions.html#expect">Expect : &nbsp;</a>
<select name = "EXPECT">
    <option > 0.0001
	<option > 0.001 
    <option> 0.01 
    <option selected> 0.1
    <option> 1 
    <option> 10 
    <option> 100 
    <option> 1000 
</select> 
-->
<a href="blast/docs/newoptions.html#expect">Expect : &nbsp;</a><input name='EXPECT' value='0.01' size='15' />
&nbsp;&nbsp; <INPUT TYPE="checkbox" NAME="UNGAPPED_ALIGNMENT" VALUE="is_set">Perform ungapped alignment</input>






&nbsp;&nbsp;


<div id="blastndiv" style="display:none">
<p/>
<a href="blast/docs/newoptions.html#Reward-penalty">Match/Mismatch Scores : &nbsp;</a>
<select name = "Match_Scores" class="style3">
<option value="-r 1 -q  -2"  >1,-2</option>
<option value="-r 1 -q  -3"  >1,-3</option>                  
<option value="-r 1 -q  -4"  >1,-4</option>                  
<option value="-r 2 -q  -3"  selected="selected">2,-3</option>                                 
<option value="-r 1 -q  -1"  >1,-1</option>    
</select>

</div>


<div id="blastpdiv">
<p/>
<a href="blast/docs/matrix_info.html">Matrix : &nbsp;</a>
<select name = "MAT_PARAM" class="style3">
  <option value = "PAM30	 9	 1"> PAM30 </option>
  <option value = "PAM70	 10	 1"> PAM70 </option>
  <option value = "BLOSUM80	 10	 1"> BLOSUM80 </option>
  <option selected value = "BLOSUM62	 11	 1"> BLOSUM62 </option>
  <option value = "BLOSUM45	 14	 2"> BLOSUM45 </option>
</select>
</div >

<P/>




<div id="blastxdiv" style="display:none">
<P/>
<!--
<a href="blast/docs/newoptions.html#gencodes">Query Genetic Codes (blastx only) 
</a>
<select name = "GENETIC_CODE" class="style3">
 <option> Standard (1) 
 <option> Vertebrate Mitochondrial (2) 
 <option> Yeast Mitochondrial (3) 
 <option> Mold Mitochondrial; ... (4) 
 <option> Invertebrate Mitochondrial (5) 
 <option> Ciliate Nuclear; ... (6) 
 <option> Echinoderm Mitochondrial (9) 
 <option> Euplotid Nuclear (10) 
 <option> Bacterial (11) 
 <option> Alternative Yeast Nuclear (12) 
 <option> Ascidian Mitochondrial (13) 
 <option> Flatworm Mitochondrial (14) 
 <option> Blepharisma Macronuclear (15) 
</select>
<p/>
-->

<a href="blast/docs/oof_notation.html">Frame shift penalty</a> for blastx 
<select NAME = "OOF_ALIGN" class="style3"> 
 <option> 6
 <option> 7
 <option> 8
 <option> 9
 <option> 10
 <option> 11
 <option> 12
 <option> 13
 <option> 14
 <option> 15
 <option> 16
 <option> 17
 <option> 18
 <option> 19
 <option> 20
 <option> 25   
 <option> 30
 <option> 50
 <option> 1000
 <option selected VALUE = "0"> No OOF
</select>
<P/>
</div >

<div id="tblastndiv" style="display:none">
<P/>
<!--
<a href="blast/docs/newoptions.html#gencodes">Database Genetic Codes (tblast[nx] only)
</a>
<select name = "DB_GENETIC_CODE" class="style3">
 <option> Standard (1)
 <option> Vertebrate Mitochondrial (2)
 <option> Yeast Mitochondrial (3)
 <option> Mold Mitochondrial; ... (4)
 <option> Invertebrate Mitochondrial (5)
 <option> Ciliate Nuclear; ... (6)
 <option> Echinoderm Mitochondrial (9)
 <option> Euplotid Nuclear (10)
 <option> Bacterial (11)
 <option> Alternative Yeast Nuclear (12)
 <option> Ascidian Mitochondrial (13)
 <option> Flatworm Mitochondrial (14)
 <option> Blepharisma Macronuclear (15)
</select>
<p/>
-->
</div>




<div id="advanced_options" style="display:none">
<a href="blast/docs/full_options.html">Other advanced options:</a> 
&nbsp;&nbsp;&nbsp;&nbsp; 
<INPUT TYPE="text" NAME="OTHER_ADVANCED" VALUE="" MAXLENGTH="50">
</div>


<HR width="80%" align="left"		>
<!--
<INPUT TYPE="checkbox" NAME="NCBI_GI" >&nbsp;&nbsp;
<a href="docs/newoptions.html#ncbi-gi"> NCBI-gi</a>
&nbsp;&nbsp;&nbsp;&nbsp;
-->
<INPUT TYPE="checkbox" NAME="OVERVIEW"  CHECKED> 

<a href="blast/docs/newoptions.html#graphical-overview">Graphical Overview</a>
&nbsp;&nbsp;
<a href="blast/docs/options.html#alignmentviews">Alignment view</a>
<select name = "ALIGNMENT_VIEW" class="style3">
    <option value=0> Pairwise
    <option value=1> master-slave with identities
    <option value=2> master-slave without identities
    <option value=3> flat master-slave with identities
    <option value=4> flat master-slave without identities
    <option value=7> BLAST XML
    <option value=9> Hit Table
</select>
<BR>
<br>
<a href="blast/docs/newoptions.html#descriptions">Descriptions</a>
<select name = "DESCRIPTIONS" class="style3">
    <option> 0 
    <option> 10 
    <option selected> 50 
    <option> 100 
    <option> 250 
    <option> 500 
</select>
&nbsp;&nbsp;
<a href="blast/docs/newoptions.html#alignments">Alignments</a>
<select name = "ALIGNMENTS" class="style3">
    <option> 0 
    <option> 10 
    <option selected> 50 
    <option> 100 
    <option> 250 
    <option> 500 
</select>
<a href="blast/docs/color_schema.html">Color schema</a>
<select name = "COLOR_SCHEMA" class="style3">
    <option selected value = 0> No color schema 
    <option value = 1> Color schema 1 
    <option value = 2> Color schema 2  
    <option value = 3> Color schema 3 
    <option value = 4> Color schema 4 
    <option value = 5> Color schema 5 
    <option value = 6> Color schema 6 
</select>
<P/>
<INPUT TYPE="button" VALUE="Clear sequence" onClick="MainBlastForm.SEQUENCE.value='';MainBlastForm.SEQFILE.value='';MainBlastForm.SEQUENCE.focus();">
<INPUT TYPE="submit" VALUE="Search">
</FORM>




<HR width="80%" align="left">
<!--<ADDRESS>
Comments and suggestions to:&lt; <a href="mailto:blast-help@ncbi.nlm.nih.gov">blast-help@ncbi.nlm.nih.gov</a> &gt
</ADDRESS>
<BR>-->
<!-- Created: Thu Mar 16 16:41:05 EST 2000 -->
<!-- hhmts start -->
<!--Last modified: Jan 11, 2002 -->
<!-- hhmts end -->

