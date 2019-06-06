<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');
?>


 <div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">
 <p  style="margin-left:350"><font  size="3"> <b>FAQs</b></font></p>


<p style="margin-left:20"><font  size="2"> <B><a href="#LSD">What services does the LSD provide?</a><br><br>
<a href="#BLAST">What is BLAST?</a><br><br>
<a href="#BLASTwork">How does BLAST work?</a><br><br>
<a href="#weblab">What is Weblab?</a><br><br>
<a href="#search">How can I search for known SAGs and mutants?</a>
</B></font><hr  width="720px" align="right"/></p>

<p  id="LSD" style="margin-left:20"><font  size="2"> <B>What services does the LSD provide?</B><br><br>
LSD is a searchable database of published senescence-associated genes (SAGs) and mutants. Each entry in the LSD database represents a gene or mutant obtained from the research paper, with information of GO annotation,PPI and interaction with microRNA. Both genes and mutant phenotypes are available for searching and browsing and entries can also be retrieved by name, keyword, references and annotation. All gene sequence and annotation data are also available for download.</br>

To receive email notification of data updates and Any queries about the website should be directed at psd@mail.cbi.pku.edu.cn.
</font></p>




<p  id="BLAST" style="margin-left:20"><font  size="2"> <B>What is BLAST?</B><br><br>
BLAST (Basic Local Alignment Search Tool) is a heuristic method to find the highest scoring locally optimal alignments between a query sequence and a database. 
</font></p>


<p  id="BLASTwork" style="margin-left:20"><font  size="2"> <B>How does BLAST work?</B><br><br>
The BLAST algorithm and family of programs rely on work on the statistics of ungapped sequence alignments by Karlin and Altschul. The statistics allow the probability of obtaining an alignment (MSP - Maximal Segment Pair) with a particular score to be estimated. The BLAST algorithm permits nearly all MSP's above a cutoff to be located efficiently in a database. 
The algorithm operates in three steps:<br>
&nbsp;&nbsp;&nbsp;&nbsp;(1)For a given word length w (usually 3 for proteins) and score matrix a list of all words (w-mers) that can can score >T when compared to w-mers from the query is created. <br>
&nbsp;&nbsp;&nbsp;&nbsp;(2)The database is searched using the list of w-mers to to find the corresponding w-mers in the database (hits). <br>
&nbsp;&nbsp;&nbsp;&nbsp;(3)Each hit is extended to determine if an MSP that includes the w-mer scores >S, the preset threshold score for an MSP. Since pair score matrices typically include negative values, extension of the initial w-mer hit may increase or decrease the score. Accordingly, a parameter X defines how great an extension will be tried in an attempt to raise the score above S. 

</font></p>


<p  id="weblab" style="margin-left:20"><font  size="2"> <B>What is Weblab?</B><br><br>
WebLab (http://weblab.cbi.pku.edu.cn/) is a multifunctional bioinformatics analysis platform integrating diversified tools with unified, user-friendly web interface. However, WebLab is not a mere bioinformatics toolbox, they also offer powerful data management function, group strategy and knowledge sharing mechanism, which will bring considerable advance of efficiency for both wet bench and in silico scientists working in biomedicine community. 
</font></p>


<p  id="search" style="margin-left:20"><font  size="2"> <B>How can I search for known SAGs and mutants?</B><br><br>
The text search page allows you to search the database in a number of ways. You can search by locus name (e.g. " AT4G35580 " or " LOC_OS02G07890 ") or alias name (e.g. "NTL9") or mutant name(e.g.��ore1-1�� ) in the top panel. The bottom panel allows you to perform BLAST search of a query sequence against the database of known SAGs. <br>
You can also browse the database from the browse pages. From this page you can access published SAGs by organism, mutants or phenotype ontology.<br>
From the results of and type of search or browse you can click on locus name to access the entry page. This page contains information about the GO annotation, PPI and interaction with microRNA, and relative mutants linked to this gene.
</font></p>


</div>
   </td>
   </tr>

<?php
require ('common_footer.php');
?>
</table>




 </body>
</html>

