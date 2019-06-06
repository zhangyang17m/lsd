<?php

require('../common_head_for_help_page.php');

?>

<div style="height:820px;width:760px;overflow-y:hidden;overflow-x:hidden">
<p style="margin-left:20px"><font  size="3"> <b>What is BLAST?</b><hr  width="740px" align="right"/></font></p>
<p style="margin-left:20px"><font  size="2"> 

Basic Local Alignment Search Tool (BLAST) is a heuristic method to find locally optimal alignments between query sequences and subject sequences.
</font></p>
<br>
<br>
<p style="margin-left:20px"><font  size="3"> <b>How does BLAST work?</b><hr  width="740px" align="right"/></font></p>
<p style="margin-left:20px"><font  size="2"> 
BLAST algorithm relies on the statistics of ungapped sequence alignments based on Karlin and Altschul. This statistics allows the probability of obtaining an alignment, which is called Maximal Segment Pair (MSP) with a particular score to be estimated. BLAST algorithm permits nearly all MSPs above a cutoff to be located efficiently in a database. 
BLAST algorithm operates in three steps:<br><br/>
(1)For a given word length w (usually 3 for proteins) and score matrix a list of all words (w-mers) that can can score >T when compared to w-mers from the query is created. <br><br/>
(2)The database is searched using the list of w-mers to to find the corresponding w-mers in the database (hits). <br><br/>
(3)Each hit is extended to determine if an MSP that includes the w-mer scores >S, the preset threshold score for an MSP. Since pair score matrices typically include negative values, extension of the initial w-mer hit may increase or decrease the score. Accordingly, a parameter X defines how great an extension will be tried in an attempt to raise the score above S. <br>


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




