<?php

require('../common_head_for_help_page.php');

?>

<div style="height:820px;width:760px;overflow-y:scroll;overflow-x:scroll">

<p style="margin-left:20px"><font size="3"> <b>Analysis with WebLab</b><hr width="730px" align="center"/></font></p>

<p style="margin-left:20px"><font size="2">
Sequences of SAGs in LSD can be sent to the bioinformatics analysis platform <a href="http://weblab.cbi.pku.edu.cn/" target="_blank"><b>WebLab</b></a> for further computational study in one click. Users can submit sequences to WebLab in three ways:<br><br>
1. Select SAGs via species browser and submit their sequences to WebLab.<br>
2. Search for SAGs by Text Search and submit their sequences to WebLab.<br>
3. Select mutated SAGs via phenotype browser and submit their sequences to WebLab.<br><br>
</font></p>


<p style="margin-left:20px"><font  size="2"> 
DQ869673 (NAM-B1) encodes a NAC transcription factor (NAM-B1) that accelerates senescence in Wheat (Triticum turgidum). AtNAP (AT1G69490), a NAC transcription factor, plays an important role in regulating leaf senescence in <i>Arabidopsis thaliana</i>. AT3G15510 and AT1G52880 are senescence-associated NAC transcription factor in Arabidopsis thaliana. LOC_Os01G66120 is a senescence-associated NAC transcription factor in Oryza sativa (Rice). We analyze these genes in detail here to show user how to analyze data in Weblab and demonstrate that some SAGs, especially transcript factor, are conserved among different species.<br><br>
(1) <B>Pairwise alignment</B><br>
User can do both local and global pairwise alignment with water or needle in WebLab<br><br>
First Step: get sequences separately from LSD and extract them to WebLab <br><br>
<img src="weblabcase1.jpg" width="730" align="center"/> <br><br>
Second Step: select the pairwise alignment program like water<br><br>
<img src="weblabcase2.jpg" width="730" align="center"/> <br><br>
Third Step: select your queries, adjust the parameters and run the program<br><br>
<img src="weblabcase3.jpg" width="730" align="center"/> <br><br>
Part of Result:<br><br>
<img src="weblabcase4.jpg" width="730" align="center"/> <br><br><br><br>


(2) <B>Multiple alignment</B><br>
User can do multiple alignment in WebLab<br><br>
First Step: get sequences together from LSD and extract it to WebLab<br><br>
<img   src="weblabcase5.jpg" width="730" align="center"/> <br><br>
Second Step: select the multiple alignment program like emma<br><br>
<img   src="weblabcase6.jpg" width="730" align="center"/> <br><br>
Third Step: select your query, adjust the parameters and run the program<br><br>
<img   src="weblabcase7.jpg" width="730" align="center"/> <br><br>
Part of Result:<br><br>
<img   src="weblabcase8.jpg" width="730" align="center"/> <br><br><br><br>


(3) <B>Construct phylogenetic tree</B><br>
User can construct phylogenetic tree with neighbor-joining or maximum parsimony method in WebLab<br><br>
First Step: do multiple alignment as mentioned above<br><br>
Second Step: select the method like neighbor-joining<br><br>
<img   src="weblabcase9.jpg" width="730" align="center"/> <br><br>
Third Step: flow the chart to construct the phylogenetic tree step by step (There is link to program interface on every rectangular)<br><br>
<img   src="weblabcase10.jpg" width="730" align="center"/> <br><br>
Fourth Step: select your multiple alignment result, adjust the parameters and run the program fseqboot<br><br>
<img   src="weblabcase11.jpg" width="730" align="center"/> <br><br>
Final Result:<br><br>
<img   src="weblabcase12.jpg" width="730" align="center"/> <br><br><br><br>



(4) <B>Make weblogo</B><br>
User can make Weblogo for multiple sequences in WebLab<br><br>
First Step: do multiple alignment as mentioned above<br><br>
Second Step: select the program to make weblogo<br><br>
<img   src="weblabcase13.jpg" width="730" align="center"/> <br><br>
Third Step: select your multiple alignment result, adjust the parameters and run the program<br><br>
<img   src="weblabcase14.jpg" width="730" align="center"/> <br><br>
Result:<br><br>
<img   src="weblabcase15.jpg" width="730" align="center"/> <br><br><br><br>




(5) <B>Confirm gene structure</B><br>
User can confirm gene structure with program dottup in WebLab using genomic sequence and CDS of one query<br><br>
First Step: get genomic sequence and CDS of one query from LSD and extract them to WebLab<br><br>
<img   src="weblabcase16.jpg" width="730" align="center"/> <br><br>
Second Step: select program dottup<br><br>
<img   src="weblabcase17.jpg" width="730" align="center"/> <br><br>
Third Step: select the genomic sequence and CDS, adjust the parameter and run the program<br><br>
<img   src="weblabcase18.jpg" width="730" align="center"/> <br><br>
Result:<br><br>
<img   src="weblabcase19.jpg" width="730" align="center"/> <br><br>
Note: <br>
the x axis means the genomic sequence of LOC_Os1g66120.1, and the y axis means the CDS of LOC_Os1g66120.1. From this picture we can confirm the project of real line to x axis is the exon of LOC_Os1g66120.1, while other space of x axis is the promoter or intron of LOC_Os1g66120.1. 
<br><br><br><br>


(6) <B>Compute GC content for a mRNA sequence</B><br>
User can compute the GC content for a gene's mRNA sequence with program geecee in WebLab<br><br>
First Step: get the mRNA sequence of one query from LSD and extract it to WebLab<br><br>
<img   src="weblabcase20.jpg" width="730" align="center"/> <br><br>
Second Step: select the program geecee<br><br>
<img   src="weblabcase21.jpg" width="730" align="center"/> <br><br>
Third Step: select the mRNA sequence, adjust the parameter and run the program<br><br>
<img   src="weblabcase22.jpg" width="730" align="center"/> <br><br>
Result:<br><br>
<img   src="weblabcase23.jpg" width="730" align="center"/> <br><br><br><br>

(7) <B>Compute codon usage bias for a CDS</B><br>
User can compute the codon usage bias for a gene��s CDS with program cai in WebLab<br><br>
First Step: get the CDS of one query from LSD and extract it to WebLab<br><br>
<img   src="weblabcase24.jpg" width="730" align="center"/> <br><br>
Second Step: select the program cai<br><br>
<img   src="weblabcase25.jpg" width="730" align="center"/> <br><br>
Third Step: select the CDS, adjust the parameter and run the program<br><br>
<img   src="weblabcase26.jpg" width="730" align="center"/> <br><br>
Result:<br><br>
<img   src="weblabcase27.jpg" width="730" align="center"/> <br><br>


</font></p>
</div>
   </td>
   </tr>

<?php

require ('../common_footer.php');

?>

</table>
</body>
</html>
