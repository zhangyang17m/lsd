<?php
if(isset($_GET['sp'])){
	$sp=$_GET['sp'];
	include("web/species_file/$sp.dbcn.php");
	if ($sp=="cs"){ $blast_sp="sweet_orange";}
	else if ($sp=="gm"){ $blast_sp="soybean";}
	else if ($sp=="gh"){ $blast_sp="upland_cotton";}
	else if ($sp=="ha"){ $blast_sp="common_sunflower";}
	else if ($sp=="hv"){ $blast_sp="barley"; }
	else if ($sp=="lj"){ $blast_sp="BaiMaiGen";}
	else if ($sp=="le"){ $blast_sp="tomato";}
	else if ($sp=="md"){ $blast_sp="apple";}
	else if ($sp=="mt"){ $blast_sp="barrel_medic";}
	else if ($sp=="pg"){ $blast_sp="white_spruce";}
	else if ($sp=="pt"){ $blast_sp="loblolly_pine";}
	else if ($sp=="so"){ $blast_sp="sugarcane";}
	else if ($sp=="st"){ $blast_sp="potato";}
	else if ($sp=="sb"){ $blast_sp="sorghum";}
	else if ($sp=="ta"){ $blast_sp="bread_wheat";}
	else if ($sp=="vv"){ $blast_sp="wine_grape";}
	else if ($sp=="zm"){ $blast_sp="maize";}
	else if ($sp=="pp"){ $blast_sp="Phypa_moss";}
	else if ($sp=="cr"){ $blast_sp="Chlre_alga";}
	else if ($sp=="ll"){ $blast_sp="Lycoris_longituba";}

}
?>
<FORM ACTION="blast/blast.cgi" METHOD =POST  ENCTYPE= "multipart/form-data" NAME="MainBlastForm" class="infoblast">
  <P>Choose program to use and database to search:
</P>
<!--
<script>
var regionState = new DynamicOptionList("Species", "DATALIB");
//var regionState = new DynamicOptionList("PROGRAM", "DATABASE");

regionState.forValue("All").addOptions("All","All");
regionState.forValue("At").addOptions("At","At");
regionState.forValue("Os").addOptions("Os","Os");
regionState.forValue("Poplar").addOptions("Poplar","Poplar");
regionState.forValue("Phypa_moss").addOptions("Phypa_moss","Phypa_moss");
regionState.forValue("Chlre_alga").addOptions("Chlre_alga","Chlre_alga");
regionState.forValue("sweet_orange").addOptions("sweet_orange","sweet_orange");
regionState.forValue("soybean").addOptions("soybean","soybean");
regionState.forValue("upland_cotton").addOptions("upland_cotton","upland_cotton");
regionState.forValue("common_sunflower").addOptions("common_sunflower","common_sunflower");
regionState.forValue("barley").addOptions("barley","barley");
regionState.forValue("BaiMaiGen").addOptions("BaiMaiGen","BaiMaiGen");
regionState.forValue("tomato").addOptions("tomato","tomato");
regionState.forValue("apple").addOptions("apple","apple");
regionState.forValue("barrel_medic").addOptions("barrel_medic","barrel_medic");
regionState.forValue("white_spruce").addOptions("white_spruce","white_spruce");
regionState.forValue("loblolly_pine").addOptions("loblolly_pine","loblolly_pine");
regionState.forValue("sugarcane").addOptions("sugarcane","sugarcane");
regionState.forValue("potato").addOptions("potato","potato");
regionState.forValue("sorghum").addOptions("sorghum","sorghum");
regionState.forValue("bread_wheat").addOptions("bread_wheat","bread_wheat");
regionState.forValue("wine_grape").addOptions("wine_grape","wine_grape");
regionState.forValue("maize").addOptions("maize","maize");



regionState.forValue("All").setDefaultOptions("All");
regionState.forValue("Arabidopsis").setDefaultOptions("At");
regionState.forValue("Rice").setDefaultOptions("Os");

</script>
-->
<a href="blast/docs/blast_program.html">Program</a>
<select name = "PROGRAM" class="style3">
 <!--      <option value="no" Selected> ---------  -->
    <option value=blastp 
	<?php if(isset($_GET['db'])) {
		$program = $_GET['db'];
		if($program == "aa") {
			echo "selected";
		}
	}
	?>
    > blastp 
    <option value=blastn
        <?php if(isset($_GET['db'])) {
                $program = $_GET['db']; 
                if($program == "na") {
                        echo "selected";
                }
        }
        ?>

    > blastn
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

   <option value="no" Selected> ------------
    <option value="cds"> CDS
    <option value="cdna"> mRNA
    <option value="genomic"> Genomic 
    <option value="protein"> Protein


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

<P/>Enter sequence below in <a href="blast/docs/fasta.html">FASTA</a>  format<BR>
<textarea name="SEQUENCE" rows=8 cols=70>
<?php
if(isset($_GET['g_name']) && isset($_GET['db'])) {
	$g_name = $_GET['g_name'];
	$db = $_GET['db'];
	if($db == "na") {
		$query_db = "cds_seq";
	} else {
		$query_db = "amino_acid_seq";
	}
	$sql = "select * from ".$query_db." where gene_name='".$g_name."'";
	
	$rs_gene = mysql_query($sql, $conn);
	$g_na = mysqli_fetch_array($rs_gene);
	
	echo ">".$g_na["gene_name"];
	echo "\r\n";
	echo $g_na["sequence"];
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
<a href="blast/docs/newoptions.html#expect">Expect</a>
<select name = "EXPECT">
    <option> 0.0001 
    <option> 0.01 
    <option selected> 0.1
    <option> 1 
    <option> 10 
    <option> 100 
    <option> 1000 
</select>
&nbsp;&nbsp;

<a href="blast/docs/matrix_info.html">Matrix</a>
<select name = "MAT_PARAM" class="style3">
  <option value = "PAM30	 9	 1"> PAM30 </option>
  <option value = "PAM70	 10	 1"> PAM70 </option>
  <option value = "BLOSUM80	 10	 1"> BLOSUM80 </option>
  <option selected value = "BLOSUM62	 11	 1"> BLOSUM62 </option>
  <option value = "BLOSUM45	 14	 2"> BLOSUM45 </option>
</select>
<INPUT TYPE="checkbox" NAME="UNGAPPED_ALIGNMENT" VALUE="is_set"> Perform ungapped alignment 
<P/>
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
<P/>
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
<P/>
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
<a href="blast/docs/full_options.html">Other advanced options:</a> 
&nbsp;&nbsp;&nbsp;&nbsp; 
<INPUT TYPE="text" NAME="OTHER_ADVANCED" VALUE="" MAXLENGTH="50">
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

