<?php

require('../common_head_for_help_page.php');

?>

<div style="height:820px;width:760px;overflow-y:hidden;overflow-x:hidden">
<p style="margin-left:20px"><font  size="3"> <b>How to predict the interactions between SAGs and miRNAs?</b><hr  width="740px" align="right"/></font></p>
<p style="margin-left:20px"><font  size="2">

Each plant miRNA typically contains a single sequence motif with near-perfect complementarity to its target. According to the RNAhybrid method [1], the criteria we selected to predict interaction between SAGs and miRNAs are mentioned below:<br/><br/>
1. Perfect base pairing of the duplex from nucleotide 8 to 12 counting from the 5' end of the miRNA is needed, because this region includs the presumptive cleavage site in the target sequence<br/>
2. Loops or bulges are no morn than 1 nucleotide in either strand<br/>
3. The end overhangs with a maximum length of 1 nucleotide in either strand<br>
4. The minimum free energy (MFE) value is required to be 60% of the MFE calculated for a miRNA:mRNA hybrid perfect match<br/>
5. For each target sequence, only the best target site for a miRNA is given<br><br/>
For each miRNA and SAG interaction, the details includes miRNA name, target gene name, MFE, P-value, and interactive position. The cross links of miRNAs to miRBase [2] are also given. 

<br>

<br>
<B>Note:</B> The mRNA sequence of each SAG is used to predict the interaction with miRNA.
</br>
</font></p>
 <p style="margin-left:20px"><font  size="3"> <b>Reference</b></font></p>
<p style="margin-left:20px"><font  size="2"> 
[1] Rehmsmeier M, Steffen P, Hochsmann M, Giegerich R: Fast and effective prediction of microRNA/target duplexes. RNA. 2004 10:1507-1517.<br>
[2] Griffiths-Jones S, Saini HK, van Dongen S, Enright AJ: miRBase: tools for microRNA genomics. Nucleic Acids Res. 2008 36(Database issue):D154-158.
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



