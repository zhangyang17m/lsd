<?php

require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

$accesse_id=$_GET["AI"];

$sql="select locus_name,alias,hormone_role,gene_description,pmid,species,CONCAT(accesse_id),genbank_id,effect,gene_evidence FROM gene_hormone_info WHERE CONCAT(accesse_id)= '$accesse_id'";

$re_gene=mysqli_query($conn,$sql) or die;

$info=mysqli_fetch_row($re_gene);

$pmid=explode(";",$info[4]);
for($i=0;$i<count($pmid);$i++){
    if($pmid[$i]!=""){
        $ref=$ref."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[$i] target=_blank>$pmid[$i];</a>";
    }
}

?>

<div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">

    <table border=0 width=94%  cellspacing=1  align="center">

        <tr><td colspan=2 bgcolor=#ccccff width="100%">

                <table width="100%"><tr><td width="80%"><a name="bi"></a><b><font size="2" color=#0000cc >Basic information</font></b>&nbsp;&nbsp;&nbsp;</td>

                        <td width="20%" align=right></td>

                    </tr></table>

            </td></tr>

        <?php

        if($info[0] != "UNCLONE"){

            echo "<tr><td bgcolor=#DDF7DF width='30%'><b><font size='2'>Locus name</font></b></td>";

            if (preg_match("/AT[\S]+G[\d]+/", $info[0]) || preg_match("/ATBP2/", $info[0]) || preg_match("/DRR1/", $info[0]) || preg_match("/OLD2/", $info[0])){
                echo "<td bgcolor=#E4E8EA width='70%'><font size='2'> <a href='http://www.arabidopsis.org/servlets/TairObject?type=locus&name=$info[0]' target=\"_blank\">$info[0]</a></font></td></tr>";
            }

            elseif (preg_match("/LOC_Os[\S]+g[\d]+/", $info[0])){
                echo "<td bgcolor=#E4E8EA width='70%'><font size='2'> <a href='http://rice.plantbiology.msu.edu/cgi-bin/ORF_infopage.cgi?orf=$info[0]' target=\"_blank\">$info[0]</a></font></td></tr>";
            }

            elseif (preg_match("/GRMZM[\d]+G[\d]+/", $info[0]) || preg_match("/AC[\d]+.[\d]+_FG[\d]+/", $info[0])){
                echo "<td bgcolor=#E4E8EA width='70%'><font size='2'> <a href='http://maizegdb.org/cgi-bin/displaygenemodelrecord.cgi?id=$info[0]' target=\"_blank\">$info[0]</a></font></td></tr>";
            }

            elseif (preg_match("/GSMUA_Achr[\S]+G[\d]+_[\d+]/", $info[0])){
                echo "<td bgcolor=#E4E8EA width='70%'><font size='2'> <a href='http://banana-genome.cirad.fr/cgi-bin/gbrowse/musa_acuminata/?name=$info[0]' target=\"_blank\">$info[0]</a></font></td></tr>";
            }

            elseif (preg_match("/SGN-U579159/", $info[0])){
                echo "<td bgcolor=#E4E8EA width='70%'><font size='2'> <a href='http://solgenomics.net/search/unigene.pl?unigene_id=$info[0]' target=\"_blank\">$info[0]</a></font></td></tr>";
            }

            else{
                echo "<td bgcolor=#E4E8EA width='70%'><font size='2'> $info[0] </font></td></tr>";
            }
        }

        elseif($info[7] == ""){

        }

        else{

            echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>GenBank ID</b></font></td><td bgcolor=#E4E8EA width='70%'><font size='2'> <a href=http://www.ncbi.nlm.nih.gov/nuccore/$info[7] target=_blank>$info[7]</a></font></td></tr>";

        }

        ?>

        <?php

        if ($info[1]){

            echo "<tr><td bgcolor=#DDF7DF width='30%'><b><font size='2'>Alias</font></b></td>";
            echo "<td bgcolor=#E4E8EA width='70%'><font size='2'>$info[1]</font></td></tr>";

        }

        echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Organism</b></font></td>";
        if (preg_match ("/\(/", $info[5])){

            preg_match ("/(.+) \((.+)\)/", $info[5], $species_match);
            echo "<td bgcolor=#E4E8EA width='70%'><font size='2'>$species_match[1] (<i>$species_match[2]</i>)</font></td></tr>";
        }
        else {
            echo "<td bgcolor=#E4E8EA width='70%'><font size='2'><i>$info[5]</i></font></td></tr>";
        }



        echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Taxonomic identifier</b></font></td><td bgcolor=#E4E8EA width='70%'><font size='2'>";
        if (preg_match ("/\(/", $info[5])){

            preg_match ("/(.+) \((.+)\)/", $info[5], $species_match);
            $species_array = explode (" ", $species_match[2]);
            $species="";
            for($k=0; $k<count($species_array); $k++){
                if ($k==0){
                    $species=$species_array[$k];
                }
                if ($k!=0){
                    $species=$species."+".$species_array[$k];
                }
            }

            echo "<a href=http://www.ncbi.nlm.nih.gov/Taxonomy/Browser/wwwtax.cgi?name=$species target=_blank>[NCBI]</a>";
        }
        elseif (preg_match ("/Pseudomonas putida strain: G7/", $info[5])){

            echo "<a href=http://www.ncbi.nlm.nih.gov/Taxonomy/Browser/wwwtax.cgi?name=Pseudomonas+putida target=_blank>[NCBI]</a>";
        }
        else {
            $species_array = explode(" ", $info[5]);
            $species = "";
            for($k=0; $k<count($species_array); $k++){
                if ($k==0){
                    $species=$species_array[$k];
                }
                if ($k!=0){
                    $species=$species."+".$species_array[$k];
                }
            }

            echo "<a href=http://www.ncbi.nlm.nih.gov/Taxonomy/Browser/wwwtax.cgi?name=$species target=_blank>[NCBI]</a>";
        }
        echo "</font></td></tr>";


        echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Function category</b></font></td>";
        $char_info=$info[2][strlen($info[2])-1];
        if($char_info==":"){

            $fun_array=explode(":",$info[2]); $fun=$fun_array[0];

        }
        else {

            $fun=$info[2];

        }
        echo "<td bgcolor=#E4E8EA width='70%'><font size='2'>$fun</font></td></tr>";

        echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Effect for Senescence</b></font></td><td bgcolor=#E4E8EA width='70%'><font size='2'>$info[8]</font></td></tr>";


        echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Gene Description</b></font></td><td bgcolor=#E4E8EA width='70%'><font size='2'>$info[3]</font></td></tr>";

        echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Evidence</b></font></td>";
        $gene_evidence_num_array=explode(");",$info[9]);
        $real_evidence="";
        $num_j=0;
        for($m=0;$m<count($gene_evidence_num_array);$m++){
            $evidence_array=explode("(",$gene_evidence_num_array[$m]);
            if ($real_evidence!=""){
                $real_evidence=$real_evidence."; ".$evidence_array[0];
            }
            else {
                $real_evidence=$evidence_array[0];
            }
            $evidence_pmid_array=$evidence_array[1];
            $evidence_real_pmid_array=explode(";",$evidence_pmid_array);
            $ref_num="[";
            for($j=0;$j<count($evidence_real_pmid_array);$j++){
                $num_j=1+$num_j;
                if ($j==0){
                    $ref_num=$ref_num."Ref ".$num_j;
                }
                if ($j!=0){
                    $ref_num=$ref_num.", Ref ".$num_j;
                }
            }
            $ref_num=$ref_num."]";
            $real_evidence=$real_evidence." ".$ref_num;
        }

        echo "<td bgcolor=#E4E8EA width='70%'><font size='2'>$real_evidence</font></td></tr>";

        echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>References</b></font></td><td bgcolor=#E4E8EA width='70%'><font size='2'></br>";
        $pmid=explode(";",$info[4]);
        $num=0;
        for ($i=0;$i<count($pmid);$i++){

            if ($pmid[$i] == "0"){

                $num=$i+1;
                $real_pmd_journal_title_date="Plant, Cell & Environment 2004, 27(5):521-549.";
                $pmd_paper_author="Y.GUO, Z.CAI, S.GAN.";
                $pmd_paper_title="Transcriptome of Arabidopsis leaf senescence.";
                $pmd_paper_author=$num.": ".$pmd_paper_author;
                echo "$pmd_paper_author</br><a href=http://onlinelibrary.wiley.com/doi/10.1111/j.1365-3040.2003.01158.x/abstract target=_blank><font size='2'>$pmd_paper_title</font></a></br>$real_pmd_journal_title_date</br></br>";
            }

            elseif ($pmid[$i] == "1"){
                $num=$i+1;
                $real_pmd_journal_title_date="Physiologia Plantarum 1996, 97(3):576-582.";
                $pmd_paper_author="Pérez-Rodríguez J, Valpuesta V.";
                $pmd_paper_title="Expression of glutamine synthetase genes during natural senescence of tomato leaves.";
                $pmd_paper_author=$num.":  ".$pmd_paper_author;
                echo "$pmd_paper_author</br><a href=http://onlinelibrary.wiley.com/doi/10.1111/j.1399-3054.1996.tb00518.x/abstract target=_blank><font size='2'>$pmd_paper_title</font></a></br>$real_pmd_journal_title_date</br></br>";
            }

            elseif ($pmid[$i] == "2"){

                $num=$i+1;

                $real_pmd_journal_title_date="Journal of Plant Biology 2009, 52:79.";

                $pmd_paper_author="Soon Il KwonHong Joo ChoKisuk BaeJin Hee JungHak Chul JinOhkmae K. Park.";

                $pmd_paper_title="Role of an Arabidopsis Rab GTPase RabG3b in Pathogen Response and Leaf Senescence.";

                $pmd_paper_author=$num.":  ".$pmd_paper_author;

                echo "$pmd_paper_author</br><a href=https://link.springer.com/article/10.1007%2Fs12374-009-9011-4 target=_blank><font size='2'>$pmd_paper_title</font></a></br>$real_pmd_journal_title_date</br></br>";

            }

            elseif ($pmid[$i] == "3"){

                $num=$i+1;

                $real_pmd_journal_title_date="Scientia Horticulturae 2014, 165:51-61.";

                $pmd_paper_author="Ping Wang, Xun Sun, Zhiyong Yue, Dong Liang, Na Wang, Fengwang Ma.";

                $pmd_paper_title="Isolation and characterization of MdATG18a, a WD40-repeat AuTophaGy-related gene responsive to leaf senescence and abiotic stress in Malus.";

                $pmd_paper_author=$num.":  ".$pmd_paper_author;

                echo "$pmd_paper_author</br><a href=https://doi.org/10.1016/j.scienta.2013.10.038 target=_blank><font size='2'>$pmd_paper_title</font></a></br>$real_pmd_journal_title_date</br></br>";

            }

            elseif($pmid[$i] != ""){
                $sql_pubmed="select distinct * FROM pubmed WHERE pubmed_id='$pmid[$i]'";
                $re_pubmed=mysqli_query($conn, $sql_pubmed) or die;
                $info_pubmed=mysqli_fetch_row($re_pubmed);
                $num=$i+1;
                $real_pmd_journal_title_date=$info_pubmed[3];
                $pmd_paper_author=$info_pubmed[1];
                $pmd_paper_title=$info_pubmed[2];
                $pmd_paper_author=$num.":  ".$pmd_paper_author;
                echo "$pmd_paper_author</br><a href=http://www.ncbi.nlm.nih.gov/pubmed?cmd=search&term=$pmid[$i] target=_blank><font size='2'>$pmd_paper_title</font></a></br>$real_pmd_journal_title_date</br></br>";
            }

        }
        echo "</font></td></tr>";

        $sql_GO = "select GO from interpro where (locus_name = '$info[0]' OR locus_name = '$info[7]')";
        $result_sql_GO = mysqli_query ($conn, $sql_GO) or die;

        while ($info_GO = mysqli_fetch_array ($result_sql_GO)){
            if ($info_GO[0] != ""){
                $info_GO_all .= $info_GO[0]. "|";
            }
        }

        if ($info_GO_all != ""){
            echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Gene Ontology</b></font></td>";
            echo "<td bgcolor=#E4E8EA width='70%'>";
            $GO_id_tmp = explode ("|", $info_GO_all);
            $GO_id = array_unique ($GO_id_tmp);

            $GO_aspect_term_id_all = array();
            for ($i=0; $i<count($GO_id); $i++){

                $sql_GO_content = "select GO_aspect, GO_term, GO_pmid, GO_id from GO_content where GO_id = '$GO_id[$i]'";
                $result_sql_GO_content = mysqli_query ($conn, $sql_GO_content) or die;
                $result_num_GO_content = mysqli_num_rows ($result_sql_GO_content);
                $info_GO_content = mysqli_fetch_array ($result_sql_GO_content);

                if ($result_num_GO_content != 0){
                    $GO_aspect_tmp = explode ("_", $info_GO_content[0]);
                    $GO_aspect = $GO_aspect_tmp[0] . " " . $GO_aspect_tmp[1];
                    $GO_term = $info_GO_content[1];
                    $GO_id_again = $info_GO_content[3];
                    $GO_aspect_term_id = $GO_aspect . "_" . $GO_term . "_" . $GO_id_again;
                    array_push ($GO_aspect_term_id_all, $GO_aspect_term_id);
                }
            }
            sort ($GO_aspect_term_id_all);

            $flag_B = 0;
            $flag_M = 0;
            $flag_C = 0;

            echo "<table width='100%' cellspacing='1'>";

            for ($j=0; $j<count($GO_aspect_term_id_all); $j++){
                $GO_aspect_term_id_all_info = explode ("_", $GO_aspect_term_id_all[$j]);

                if ($GO_aspect_term_id_all_info[0] == "biological process" && $flag_B == 0){
                    echo "<tr><td bgcolor=#DDF7DF width='30%'><b><font size='2' color='#CC3399'><a href='http://amigo.geneontology.org/amigo/term/GO:0008150' target='_blank' style='color:#CC3399'>$GO_aspect_term_id_all_info[0]</a></font></b></td><td bgcolor=#DDF7DF width='70%' ><ul style = 'margin:0'><li style='list-style-type:none; margin:5 0'><font size='2' color='#CC3399'><a href='http://amigo.geneontology.org/amigo/term/$GO_aspect_term_id_all_info[2]' target='_blank'>$GO_aspect_term_id_all_info[1]</a></font></li>";
                    $flag_B = 1;
                    continue;
                }

                if ($GO_aspect_term_id_all_info[0] == "biological process" && $flag_B == 1){
                    echo "<li style='list-style-type:none; margin:5 0'><font size='2' color='#CC3399'><a href= 'http://amigo.geneontology.org/amigo/term/$GO_aspect_term_id_all_info[2]' target='_blank'>$GO_aspect_term_id_all_info[1]</a></font></li>";
                    continue;
                }

                if ($GO_aspect_term_id_all_info[0] == "molecular function" && $flag_M == 0){
                    echo "</ul></td></tr>";
                    echo "<tr><td bgcolor=#DDF7DF width='30%'><b><font size='2' color='#CC3399'><a href='http://amigo.geneontology.org/amigo/term/GO:0003674' target='_blank' style='color:#CC3399'>$GO_aspect_term_id_all_info[0]</a></font></b></td><td bgcolor=#DDF7DF width='70%'><ul style = 'margin:0'><li style='list-style-type:none; margin:5.0'><font size='2' color='#CC3399'><a href= 'http://amigo.geneontology.org/amigo/term/$GO_aspect_term_id_all_info[2]' target='_blank'>$GO_aspect_term_id_all_info[1]</a></font></li>";
                    $flag_M = 1;
                    continue;
                }

                if ($GO_aspect_term_id_all_info[0] == "molecular function" && $flag_M == 1){
                    echo "<li style='list-style-type:none; margin:5 0'><font size='2' color='#CC3399'><a href= 'http://amigo.geneontology.org/amigo/term/$GO_aspect_term_id_all_info[2]' target='_blank'>$GO_aspect_term_id_all_info[1]</a></font></li>";
                    continue;
                }

                if ($GO_aspect_term_id_all_info[0] == "cellular component" && $flag_C == 0){
                    echo "</ul></td></tr>";
                    echo "<tr><td bgcolor=#DDF7DF width='30%'><b><font size='2' color='#CC3399'><a href='http://amigo.geneontology.org/amigo/term/GO:0005575' target='_blank' style='color:#CC3399'>$GO_aspect_term_id_all_info[0]</a></font></b></td><td bgcolor=#DDF7DF width='70%'><ul style = 'margin:0'><li style = 'list-style-type:none; margin:5 0'><font size='2' color='#CC3399'><a href= 'http://amigo.geneontology.org/amigo/term/$GO_aspect_term_id_all_info[2]' target='_blank'>$GO_aspect_term_id_all_info[1]</a></font></li>";
                    $flag_C = 1;
                    continue;
                }

                if ($GO_aspect_term_id_all_info[0] == "cellular compoment" && $flag_C == 1){
                    echo "<li style='list-style-type:none; margin:5 0'><font size='2' color='#CC3399'><a href= 'http://amigo.geneontology.org/amigo/term/$GO_aspect_term_id_all_info[2]' target='_blank'>$GO_aspect_term_id_all_info[1]</a></font></li>";
                    continue;
                }
            }

            echo "</ul></td></tr></table></td></tr>";
        }

        $sql_pathway = "select pathway from interpro where (locus_name = '$info[0]' OR locus_name = '$info[7]')";
        $result_sql_pathway = mysqli_query ($conn, $sql_pathway) or die;

        while ($info_pathway = mysqli_fetch_array ($result_sql_pathway)){
            if ($info_pathway[0] != ""){
                $info_pathway_all .= $info_pathway[0]. "|";
            }
        }

        if ($info_pathway_all != ""){

            echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Pathway</b></font></td>";
            echo "<td bgcolor=#E4E8EA width='70%'>";

            $pathway_id_tmp = explode ("|", $info_pathway_all);
            $pathway_id = array_unique ($pathway_id_tmp);

            $flag_KEGG = 0;
            $flag_MetaCyc = 0;
            $flag_UniPathway = 0;
            $flag_Reactome = 0;

            echo "<table width='100%' cellspacing='1'>";

            for ($i=0; $i<count($pathway_id); $i++){
                $pathway_id_info = explode (": ", $pathway_id[$i]);

                if ($pathway_id_info[0] == "KEGG" && $flag_KEGG == 0){
                    $pathway_map_ec = explode ("+", $pathway_id_info[1]);
                    if (preg_match("/-/", $pathway_map_ec[1])){
                        echo "<tr><td bgcolor=#DDF7DF width='30%'><b><font size='2' color='#CC3399'><a href = 'http://www.genome.jp/kegg/' target='_blank' style='color:#CC3399'>$pathway_id_info[0]</a></font></b></td><td bgcolor=#DDF7DF width='70%'><ul style='margin:0'><li style='list-style-type:none; margin:5 0'><font size='2' color='#CC3399'><a href = 'http://www.genome.jp/dbget-bin/www_bget?map$pathway_map_ec[0]' target='_blank'>map$pathway_map_ec[0]</a></font>&nbsp(EC $pathway_map_ec[1])</li>";
                    }
                    else {
                        echo "<tr><td bgcolor=#DDF7DF width='30%'><b><font size='2' color='#CC3399'><a href = 'http://www.genome.jp/kegg/' target='_blank' style='color:#CC3399'>$pathway_id_info[0]</a></font></b></td><td bgcolor=#DDF7DF width='70%'><ul style='margin:0'><li style='list-style-type:none; margin:5 0'><font size='2' color='#CC3399'><a href = 'http://www.genome.jp/dbget-bin/www_bget?map$pathway_map_ec[0]' target='_blank'>map$pathway_map_ec[0]</a></font><a href = 'http://www.genome.jp/dbget-bin/www_bget?ec:$pathway_map_ec[1]' target='_blank'>&nbsp(EC $pathway_map_ec[1])</a></li>";
                    }
                    $flag_KEGG = 1;
                    continue;
                }

                if ($pathway_id_info[0] == "KEGG" && $flag_KEGG == 1){
                    $pathway_map_ec = explode ("+", $pathway_id_info[1]);
                    if (preg_match("/-/", $pathway_map_ec[1])){
                        echo "<li style='list-style-type:none; margin:5	0'><font size='2' color='#CC3399'><a href = 'http://www.genome.jp/dbget-bin/www_bget?map$pathway_map_ec[0]' target='_blank'>map$pathway_map_ec[0]</a></font>&nbsp(EC $pathway_map_ec[1])</li>";
                    }
                    else {
                        echo "<li style='list-style-type:none; margin:5 0'><font size='2' color='#CC3399'><a href = 'http://www.genome.jp/dbget-bin/www_bget?map$pathway_map_ec[0]' target='_blank'>map$pathway_map_ec[0]</a></font><a href = 'http://www.genome.jp/dbget-bin/www_bget?ec:$pathway_map_ec[1]' target='_blank'>&nbsp(EC $pathway_map_ec[1])</a></li>";
                    }
                    continue;
                }

                if ($pathway_id_info[0] == "MetaCyc" && $flag_MetaCyc == 0){
                    echo "</ul></td></tr>";
                    echo "<tr><td bgcolor=#DDF7DF width='30%'><b><font size='2' color='#CC3399'><a href = 'http://www.metacyc.org/' target='_blank' style='color:#CC3399'>$pathway_id_info[0]</a></font></b></td><td bgcolor=#DDF7DF width='70%'><ul style='margin:0'><li style='margin:5 0; list-style-type:none'><font size='2' color='#CC3399'><a href = 'http://biocyc.org/META/NEW-IMAGE?type=NIL&object=$pathway_id_info[1]&redirect=T' target='_blank'>$pathway_id_info[1]</a></font></li>";
                    $flag_MetaCyc = 1;
                    continue;
                }

                if ($pathway_id_info[0] == "MetaCyc" && $flag_MetaCyc == 1){
                    echo "<li style='margin:5 0; list-style-type:none'><font size='2' color='#CC3399'><a href = 'http://biocyc.org/META/NEW-IMAGE?type=NIL&object=$pathway_id_info[1]&redirect=T' target='_blank'>$pathway_id_info[1]</a></font></li>";
                    continue;
                }


                if ($pathway_id_info[0] == "UniPathway" && $flag_UniPathway == 0){
                    echo "</ul></td></tr>";
                    echo "<tr><td bgcolor=#DDF7DF width='30%'><b><font size='2' color='#CC3399'><a href = 'http://www.grenoble.prabi.fr/obiwarehouse/unipathway' target='_blank' style='color:#CC3399'>$pathway_id_info[0]</a></font></b></td><td bgcolor=#DDF7DF width='70%'><ul style='margin:0'><li style='margin:5 0; list-style-type:none'><font size='2' color='#CC3399'><a href = 'http://www.grenoble.prabi.fr/obiwarehouse/unipathway/upa?upid=$pathway_id_info[1]' target='_blank'>$pathway_id_info[1]</a></font></li>";
                    $flag_UniPathway = 1;
                    continue;
                }

                if ($pathway_id_info[0] == "UniPathway" && $flag_UniPathway == 1){
                    echo "<li style='margin:5 0; list-style-type:none'><font size='2' color='#CC3399'><a href = 'http://www.grenoble.prabi.fr/obiwarehouse/unipathway/upa?upid=$pathway_id_info[1]' target='_blank'>$pathway_id_info[1]</a></font></li>";
                    continue;
                }

                if ($pathway_id_info[0] == "Reactome" && $flag_Reactome == 0){
                    echo "</ul></td></tr>";
                    echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2' color='#CC3399'><b><a href = 'http://www.reactome.org/ReactomeGWT/entrypoint.html' target='_blank' style='color:#CC3399'>$pathway_id_info[0]</a></b></font></td><td bgcolor=#DDF7DF width='70%'><ul style='margin:0'><li style='margin:5 0; list-style-type:none'><font size='2' color='#CC3399'><a href = 'http://www.reactome.org/cgi-bin/eventbrowser_st_id?ST_ID=$pathway_id_info[1]&redirect=T' target='_blank'>$pathway_id_info[1]</a></font></li>";
                    $flag_Reactome = 1;
                    continue;
                }

                if ($pathway_id_info[0] == "Reactome" && $flag_Reactome == 1){
                    echo "<li style='margin:5 0; list-style-type:none'><font size='2' color='#CC3399'><a href = 'http://www.reactome.org/cgi-bin/eventbrowser_st_id?ST_ID=$pathway_id_info[1]&redirect=T' target='_blank'>$pathway_id_info[1]</a></font></li>";
                    continue;
                }
            }
            echo"</ul></td></tr></table></td></tr>";
        }

        $sql_ppi="select distinct locus_name,target_entry FROM PPI WHERE locus_name = '$info[0]' OR locus_name = '$info[7]'";
        $re_gene_ppi=mysqli_query($conn, $sql_ppi) or die;
        $re_num_gene_ppi=mysqli_num_rows($re_gene_ppi);

        if($re_num_gene_ppi != 0){

            $info_ppi=mysqli_fetch_row($re_gene_ppi);
            echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Protein-Protein Interaction</b></font></td>";
            echo "<td bgcolor=#E4E8EA width='70%'>";
            echo "<table width='100%' cellspacing='1'>";
            echo "<tr><td bgcolor=#DDF7DF width='30%'><b><font size='2' color='#CC3399'><a href = 'http://string-db.org/' target='_blank' style='color:#CC3399'>STRING</a></font></b></td><td bgcolor=#DDF7DF width='70%'><ul style='margin:0'><li style='margin:5 0; list-style-type:none'><font size='2'><a href=http://string-db.org/newstring_cgi/show_network_section.pl?identifier=$info_ppi[1] target='_blank'>$info_ppi[1]</a></font></li></ul></td></tr></table></td></tr>";

        }

        $sql="select * FROM seq_cdna  WHERE accesse_id='$accesse_id' order by gene_model";
        $re_gene_seq=mysqli_query($conn,$sql) or die;
        $re_num_seq=mysqli_num_rows($re_gene_seq);
        if ($re_num_seq != 0){
            echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Sequence</b></font></td><td bgcolor=#E4E8EA width='70%'><font size='2'>";
        }

        $sql="select * FROM seq_genomic  WHERE accesse_id='$accesse_id'";
        $re_gene_seq_genomic=mysqli_query($conn,$sql) or die;
        $re_num_seq_genomic=mysqli_num_rows($re_gene_seq_genomic);

        $sql="select * FROM seq_cds  WHERE accesse_id='$accesse_id'";
        $re_gene_seq_cds=mysqli_query($conn,$sql) or die;
        $re_num_seq_cds=mysqli_num_rows($re_gene_seq_cds);

        $sql="select * FROM seq_pep  WHERE accesse_id='$accesse_id'";
        $re_gene_seq_pep=mysqli_query($conn,$sql) or die;
        $re_num_seq_pep=mysqli_num_rows($re_gene_seq_pep);

        while($info_seq1=mysqli_fetch_array($re_gene_seq)){
            if($info_seq1[4] != '') echo $info_seq1[4];
            if($re_num_seq_genomic > 0){
                echo "  |"."  ";
                echo "<a href='get_gene_seq.php?GM=$info_seq1[4]&DB=Genomic'>Genomic</a>";
            }
            if($info_seq1[5]!=''){
                echo "  |"."  ";
                echo "<a href='get_gene_seq.php?GM=$info_seq1[4]&DB=cDNA'>mRNA</a>";
            }
            if($re_num_seq_cds >0){
                echo "  |"."  ";
                echo "<a href='get_gene_seq.php?GM=$info_seq1[4]&DB=CDS'>CDS</a>";
            }
            if($re_num_seq_pep >0){
                echo "  |"."  ";
                echo "<a href='get_gene_seq.php?GM=$info_seq1[4]&DB=Protein'>Protein</a>";
            }
            echo "<br>";
        }


        echo "</font></td></tr>";
        ?>


        <?php

        $sql_m="select distinct plant_info.plant_name, plant_info.ecotype, plant_info.mutagenesis_type, plant_info.pmid, plant_info.plant_type FROM gene_hormone_plant, plant_info WHERE plant_info.plant_name=gene_hormone_plant.plant_name and gene_hormone_plant.accesse_id='$accesse_id'";
        $result_m=mysqli_query($conn, $sql_m) or die;
        $re_m_num=mysqli_num_rows($result_m);

        if($re_m_num != 0){

            echo "<tr><td colspan=2 bgcolor=#ccccff width='100%'><table width='100%'><tr><td width='80%'><a name='cr'></a><b><font size='2' color=#0000cc>Mutant information</font></b>&nbsp;&nbsp;&nbsp;</td><td width='20%' align=right></td></tr></table></td></tr>";

        }

        if($re_m_num==1)
        {

            $info_mutant=mysqli_fetch_row($result_m);


            echo" <tr><td bgcolor=#DDF7DF width='30%'><b><font size='2'>Mutant name</font></b></td>
    <td bgcolor=#E4E8EA width='70%'><font size='2'> <a href='get_mutant_detail.php?MI=$info_mutant[0]'>$info_mutant[0]</a> </font></td></tr>";

            echo" <tr><td bgcolor=#DDF7DF width='30%'><b><font size='2'>Mutant/Transgenic</font></b></td>
    <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_mutant[4]</font></td></tr>";

            echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Ecotype</b></font></td>
	<td bgcolor=#E4E8EA width='70%'><font size='2'>$info_mutant[1]</font></td></tr>
	
	<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Mutagenesis type</b></font></td>
	<td bgcolor=#E4E8EA width='70%'><font size='2'>$info_mutant[2]</font></td></tr>";





        }

        elseif($re_m_num>1) {
            $num_mutant=1;
            while($info_mutant=mysqli_fetch_array($result_m)){



                echo"<tr><td colspan=2 width='100%' >
		<table width='100%'  cellspacing='1'  ><tr><td rowspan='5' bgcolor=#DDF7DF width='10%'><b><font size='2' color='#CC3399'>Mutated $num_mutant</font></b></td>";

                echo" <tr><td bgcolor=#DDF7DF width='20%'><b><font size='2'>Mutant name</font></b></td>
    <td bgcolor=#E4E8EA width='70%'><font size='2'> <a href='get_mutant_detail.php?MI=$info_mutant[0]'>$info_mutant[0]</a> </font></td></tr>";

                echo" <tr><td bgcolor=#DDF7DF width='20%'><b><font size='2'>Mutant/Transgenic</font></b></td>
    <td bgcolor=#E4E8EA width='70%'><font size='2'>$info_mutant[4]</font></td></tr>";

                echo "<tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Ecotype</b></font></td>
	<td bgcolor=#E4E8EA width='70%'><font size='2'>$info_mutant[1]</font></td></tr>
	
	<tr><td bgcolor=#DDF7DF width='20%'><font size='2'><b>Mutagenesis type</b></font></td>
	<td bgcolor=#E4E8EA width='70%'><font size='2'>$info_mutant[2]</font></td></tr>";

                echo "</table></td></tr>";
                $num_mutant++;

            }
        }

        ?>

        <?php

        $sql="select * FROM chipdata WHERE locus_name ='$info[0]'";

        $re_gene=mysqli_query($conn,$sql) or die;
        $re_num_chipdata=mysqli_num_rows($re_gene);

        if ($re_num_chipdata != 0){

            echo "<tr><td colspan=2 bgcolor=#ccccff width='100%'><table width='100%'><tr><td width='80%'  ><a name='cr'></a><b><font size='2' color=#0000cc>Microarray</font></b>&nbsp;&nbsp;&nbsp;</td><td width='20%' align=right></td></tr></table></td></tr>";

        }

        if($re_num_chipdata > 0){$info_chip=mysqli_fetch_row($re_gene);
            $col=$info_chip[2];
            $nahg=$info_chip[3];
            $coi1=$info_chip[4];
            $ein2=$info_chip[5];
            $dl=$info_chip[6];
            $celldeath=$info_chip[7];
            echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Expression Level (Log2 ratio)</b></font></td>";
            echo "<td bgcolor=#E4E8EA width='70%'><font size='2'><img src='pic.php?COL=$col&NAHG=$nahg&COIL=$coi1&EIN2=$ein2&DL=$dl&CELLDEATH=$celldeath'/></font></td></tr>";


            echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Sampling</b></font></td>
	<td bgcolor=#E4E8EA width='70%'><font size='2'>Buchanan-Wollaston V, Page T, Harrison E, Breeze E, Lim PO, Nam HG, Lin JF, Wu SH, Swidzinski J, Ishizaki K, Leaver CJ.<br> <a  href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=15860015 target='_blank'><font size='2'>Comparative transcriptome analysis reveals significant differences in gene expression and signalling pathways between developmental and dark/starvation-induced senescence in Arabidopsis.</font></a>  <br>Plant J. 2005 May;42(4)</font></td></tr>";

            echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Comparation</b></font></td>
	<td bgcolor=#E4E8EA width='70%'><font size='2'>Legends:<br>Col: wild type, indicates the ratio of expression in senescing leaves/green leaves.<br>NahG, coi1 and ein2:  indicates the ratio of expression in senescing leaves of mutant/senescing wild type.";
            if($dl!=0){echo "<br>D/L: ratio of DARK 5d/control.";}
            if($celldeath!=0){echo "<br>CD:  Cell Death, ratio of starved cell suspension culture/control.";}
            echo "<br>Genes showing at least 3 fold (ratio) up regulation during leaf senescence. </font></td></tr>";


        }

        ?>

        <?php

        $target_file="";
        $target_file="./miRNA/".$info[0].".target.full";
        if (!(file_exists($target_file))){$target_file="./miRNA/".$info[7].".target.full";}
        if(file_exists($target_file)){
            echo "<tr><td colspan=2 bgcolor=#ccccff width='100%'><table width='100%'><tr><td width='80%'><a name='cr'></a><b><font size='2' color=#0000cc>miRNA Interaction</font></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='faq/miRNA.php'><img src='image/help.gif' width='15' height='15' border='0'/></a></td><td width='20%' align=right></td></tr></table></td></tr>";
            echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Details</b></br></font></td>";
            echo "<td bgcolor=#E4E8EA width='70%'><table border=1 width='100%' align=center><tr><td colspan=2 align=center>";
            $fp=fopen($target_file,'r');
            echo "</td></tr><tr><td bgcolor=#E4E8EA bordercolor='#3399CC' ><font face='Courier New' size=2 >";
            $cout_miRNA=0;
            while (!feof($fp)){

                $bruce=fgets($fp);

                if(preg_match("/length:/", $bruce)){
                    continue;
                }

                $pattern  = "/\s/";
                $substr=strstr($bruce, "miRNA:");
                $substr_target=strstr($bruce, "target:");
                $substr_mfe=strstr($bruce, "mfe:");
                $substr_pvalue=strstr($bruce, "p-value:");

                $substr  = preg_replace("/\s+/", '',$substr);
                $str  = preg_replace($pattern,'&nbsp;',$bruce);


                if($substr_target !=''){
                    $cout_miRNA++;
                    if($cout_miRNA>1){echo "<hr>";}
                    echo "<font face='Courier New' size=2 >$str<br/></font>";

                }
                elseif($substr_mfe !=''){
                    echo "<font face='Courier New' size=2 >$str<br/></font>";

                }
                elseif($substr_pvalue !=''){
                    echo "<font face='Courier New' size=2 >$str<br/></font><br>";

                }

                elseif($substr !=''){
                    $substr  = str_replace("miRNA:","",$substr);
                    $substr  = str_replace("__miRBase","",$substr);

                    echo "<font face='Courier New' size=2 >miRNA:&nbsp;<a href='http://microrna.sanger.ac.uk/cgi-bin/sequences/mirna_entry.pl?acc=$substr' target=_blank><font face='Courier New' size=2 >$substr<br/></font></a></font>";

                }
                else { $str  = str_replace("__miRBase","",$str);
                    $str  = str_replace("__PMRD","",$str);
                    $String_null=str_replace("&nbsp;","",$str);
                    if($String_null!=''){
                        echo "<font face='Courier New' size=2 >$str</font><br>";}
                }


            }


            echo "</td></tr></table>";

            echo "</td></tr>";
        }

        ?>





        <?php

        $sql="select * FROM orthomcl where locus_name = '$info[0]' OR locus_name = '$info[7]'";
        $re_gene_orthomcl=mysqli_query($conn,$sql) or die;
        $re_num_orthomcl=mysqli_num_rows($re_gene_orthomcl);

        if ($re_num_orthomcl > 0){
            $info_orthomcl = mysqli_fetch_row($re_gene_orthomcl);

            if ($info_orthomcl[1] != "no_group"){
                echo "<tr><td colspan=2 bgcolor=#ccccff width='100%'><table width='100%'><tr><td width='80%'><a name='cr'></a><b><font size='2' color=#0000cc>Ortholog Group</font></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='faq/orthologous.php'><img src='image/help.gif' width='15' height='15' border='0'/></a></td><td width='20%' align=right></td></tr></table></td></tr>";

                echo "<tr><td bgcolor=#DDF7DF width='30%'><font size='2'><b>Ortholog Groups: <font color=red><a href='http://orthomcl.org/cgi-bin/OrthoMclWeb.cgi?rm=sequenceList&groupac=$info_orthomcl[1]' target='_blank'>$info_orthomcl[1]</a></font></b></font></td>";
                echo "<td bgcolor=#E4E8EA width='70%'><font size='2'>";
                echo "<table width='100%' border=1 ><tr><td><B>Accession</B></td><td><B>Taxon</B></td></tr>";

                $sql="select * FROM orthomcl_group where orthomcl_group_name = '$info_orthomcl[1]'";
                $re_gene_orthomcl_group=mysqli_query($conn,$sql) or die;
                $info_orthomcl_group=mysqli_fetch_row($re_gene_orthomcl_group);
                $seq_id_group=$info_orthomcl_group[1];
                $seq_id_group_array=explode(" ",$seq_id_group);
                sort($seq_id_group_array);

                for ($i=0;$i<count($seq_id_group_array);$i++){

                    if ($seq_id_group_array[$i]!=""){
                        $every_seq_id_group_array=explode("|",$seq_id_group_array[$i]);
                        $sql = "select * FROM taxon where species_abbreviation_name = '$every_seq_id_group_array[0]'";
                        $re_gene_orthomcl_taxon=mysqli_query($conn,$sql) or die;
                        $info_orthomcl_taxon=mysqli_fetch_row($re_gene_orthomcl_taxon);

                        if ($info_orthomcl[2] == $seq_id_group_array[$i] && $info_orthomcl_taxon[1] != '' && $info_orthomcl_taxon[2] == 'yes'){
                            if ($info[0] != "UNCLONE"){
                                echo "<tr><td><a href='http://orthomcl.org/cgi-bin/OrthoMclWeb.cgi?rm=sequence&accession=$every_seq_id_group_array[1]&taxon=$info_orthomcl_taxon[0]' target='_blank'>$every_seq_id_group_array[1]</a> ( $info[0] ) </td><td>$info_orthomcl_taxon[1]</td></tr>";
                            }
                            if ($info[0] == "UNCLONE" && $info[7]){
                                echo "<tr><td><a href='http://orthomcl.org/cgi-bin/OrthoMclWeb.cgi?rm=sequence&accession=$every_seq_id_group_array[1]&taxon=$info_orthomcl_taxon[0]' target='_blank'>$every_seq_id_group_array[1]</a> ( $info[7] ) </td><td>$info_orthomcl_taxon[1]</td></tr>";
                            }
                        }

                        elseif ($info_orthomcl_taxon[1] != '' && $info_orthomcl_taxon[2] == 'yes') {
                            echo "<tr><td><a href='http://orthomcl.org/cgi-bin/OrthoMclWeb.cgi?rm=sequence&accession=$every_seq_id_group_array[1]&taxon=$info_orthomcl_taxon[0]' target='_blank'>$every_seq_id_group_array[1]</a></td><td>$info_orthomcl_taxon[1]</td></tr>";
                        }
                    }
                }

                echo "</table></font></td></tr>";
            }
        }

        ?>

        <?php
        $sql="select * FROM  interpro where (locus_name ='$info[0]' OR locus_name = '$info[7]') ORDER by (domain_start_match+0), analysis_method";
        $re_gene_interpro=mysqli_query($conn,$sql) or die;
        $re_num_interpro=mysqli_num_rows($re_gene_interpro);

        if ($re_num_interpro > 0){
            echo "<tr><td colspan=2 bgcolor=#ccccff width='100%'><table width='100%'><tr><td width='80%'><a name='cr'></a><b><font size='2' color=#0000cc>Cross Link</font></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='faq/crosslink.php'><img src='image/help.gif' width='15' height='15' border='0'/></a></td><td width='20%' align=right></td></tr></table></td></tr>";
            echo "<tr><td bgcolor=#E4E8EA width='100%' colspan=2><font size='2'>";
            echo "<table width='100%' border=1 ><tr><td><B>Database</B></td><td><B>Entry ID</B></td><td><B>E-value</B></td><td><B>Start</B></td><td><B>End</B></td><td><B>InterPro ID</B></td><td><B>Description</B></td></tr>";
            while($info_interpro = mysqli_fetch_array($re_gene_interpro)){
                $evalue_array = explode("E",$info_interpro[9]);
                $evalue_array_0 = number_format($evalue_array[0],1);
                $evalue_array_1 = $evalue_array[1];
                if ($info_interpro[9] == "-"){
                    $info_interpro[9] = "NA";
                }
                elseif ($evalue_array_1 != ""){
                    $info_interpro[9] = $evalue_array_0 . "E" . $evalue_array_1;
                }
                else {
                    $info_interpro[9] = $evalue_array_0;
                }

                if ($info_interpro[4]=="Gene3D"){
                    echo "<tr><td><a href='http://gene3d.biochem.ucl.ac.uk/' target='_blank'>Gene3D</a></td><td><a href='http://gene3d.biochem.ucl.ac.uk/superfamily/?accession=$info_interpro[5]' target='_blank'>$info_interpro[5]</a></td><td>$info_interpro[9]</td><td>$info_interpro[7]</td><td>$info_interpro[8]</td><td>";
                }

                elseif ($info_interpro[4]=="PANTHER"){
                    echo "<tr><td><a href='http://www.pantherdb.org/' target='_blank'>PANTHER</a></td><td><a href='http://www.pantherdb.org/panther/family.do?clsAccession=$info_interpro[5]' target='_blank'>$info_interpro[5]</a></td><td>$info_interpro[9]</td><td>$info_interpro[7]</td><td>$info_interpro[8]</td><td>";
                }

                elseif ($info_interpro[4]=="Pfam"){
                    echo "<tr><td><a href='http://pfam.sanger.ac.uk/' target='_blank'>Pfam</a></td><td><a href='http://pfam.sanger.ac.uk/family/$info_interpro[5]' target='_blank'>$info_interpro[5]</a></td><td>$info_interpro[9]</td><td>$info_interpro[7]</td><td>$info_interpro[8]</td><td>";
                }

                elseif ($info_interpro[4]=="ProSitePatterns"){
                    echo "<tr><td><a href='http://prosite.expasy.org/' target='_blank'>ProSitePatterns</a></td><td><a href='http://prosite.expasy.org/$info_interpro[5]' target='_blank'>$info_interpro[5]</a></td><td>$info_interpro[9]</td><td>$info_interpro[7]</td><td>$info_interpro[8]</td><td>";
                }

                elseif ($info_interpro[4]=="SUPERFAMILY"){
                    $every_interpro_array=explode("SSF",$info_interpro[5]);
                    echo "<tr><td><a href='http://supfam.cs.bris.ac.uk/SUPERFAMILY/'>SUPERFAMILY</a></td><td><a href='http://supfam.org/SUPERFAMILY/cgi-bin/scop.cgi?sunid=$every_interpro_array[1]' target='_blank'>$info_interpro[5]</a></td><td>$info_interpro[9]</td><td>$info_interpro[7]</td><td>$info_interpro[8]</td><td>";
                }

                elseif ($info_interpro[4]=="PRINTS"){
                    echo "<tr><td><a href='http://www.bioinf.man.ac.uk/dbbrowser/PRINTS/index.php' target='_blank'>PRINTS</a></td><td><a href='http://www.bioinf.manchester.ac.uk/cgi-bin/dbbrowser/sprint/searchprintss.cgi?display_opts=Prints&category=None&queryform=false&prints_accn=$info_interpro[5]' target='_blank'>$info_interpro[5]</a></td><td>$info_interpro[9]</td><td>$info_interpro[7]</td><td>$info_interpro[8]</td><td>";
                }

                elseif ($info_interpro[4]=="SMART"){
                    echo "<tr><td><a href='http://smart.embl-heidelberg.de/' target='_blank'>SMART</a></td><td><a href='http://smart.embl.de/smart/do_annotation.pl?DOMAIN==$info_interpro[5]' target='_blank'>$info_interpro[5]</a></td><td>$info_interpro[9]</td><td>$info_interpro[7]</td><td>$info_interpro[8]</td><td>";
                }

                elseif ($info_interpro[4]=="PIRSF"){
                    echo "<tr><td><a href='http://pir.georgetown.edu/pirsf/' target='_blank'>PIRSF</a></td><td><a href='http://pir.georgetown.edu/cgi-bin/ipcSF?id=$info_interpro[5]' target='_blank'>$info_interpro[5]</a></td><td>$info_interpro[9]</td><td>$info_interpro[7]</td><td>$info_interpro[8]</td><td>";
                }

                elseif ($info_interpro[4]=="ProSiteProfiles"){
                    echo "<tr><td><a href='http://prosite.expasy.org/' target='_blank'>ProSiteProfiles</a></td><td><a href='http://prosite.expasy.org/$info_interpro[5]' target='_blank'>$info_interpro[5]</a></td><td>$info_interpro[9]</td><td>$info_interpro[7]</td><td>$info_interpro[8]</td><td>";
                }

                elseif ($info_interpro[4]=="TIGRFAM"){
                    echo "<tr><td><a href='http://www.jcvi.org/cgi-bin/tigrfams/index.cgi'  target='_blank'>TIGRFAM</a></td><td><a href='http://www.jcvi.org/cgi-bin/tigrfams/HmmReportPage.cgi?acc=$info_interpro[5]'  target='_blank'>$info_interpro[5]</a></td><td>$info_interpro[9]</td><td>$info_interpro[7]</td><td>$info_interpro[8]</td><td>";
                }

                elseif ($info_interpro[4]=="Coils"){
                    echo "<tr><td><a href='http://www.mybiosoftware.com/protein-sequence-analysis/6236' target='_blank'>Coils</a></td><td>$info_interpro[5]</td><td>$info_interpro[9]</td><td>$info_interpro[7]</td><td>$info_interpro[8]</td><td>";
                }

                elseif($info_interpro[4]=="Hamap"){
                    echo "<tr><td><a href='http://hamap.expasy.org/' target='_blank'>Hamap</a></td><td><a href='http://hamap.expasy.org/unirule/$info_interpro[5]' target='_blank'>$info_interpro[5]</a></td><td>$info_interpro[9]</td><td>$info_interpro[7]</td><td>$info_interpro[8]</td><td>";
                }

                if ($info_interpro[12] == "" && $info_interpro[13] == ""){
                    $info_interpro[12] = "No hit";
                    $info_interpro[13] = "NA";
                }

                if ($info_interpro[12] != "No hit"){
                    echo "<a href='http://www.ebi.ac.uk/interpro/entry/$info_interpro[12]' target='_blank'>$info_interpro[12]</a></td><td>$info_interpro[13]</td></tr>";
                }
                else {
                    echo "$info_interpro[12]</td><td>$info_interpro[13]</td></tr>";
                }
            }

            echo "</table></font></td></tr>";

        }

        ?>

<?php

        $result_mutant_image_num = 0;
        $mutant_image = "SELECT mutant_name,mutant_description FROM mutant_image WHERE locus_name = '$info[0]' OR locus_name = '$info[7]'";
        $result_mutant_image = mysqli_query($conn, $mutant_image) or die;
        $result_mutant_image_num = mysqli_num_rows($result_mutant_image);

        if ($result_mutant_image_num != 0){

            $result_mutant_image_info = mysqli_fetch_row($result_mutant_image);
            echo "<tr><td colspan='2' bgcolor=#ccccff width='100%'><table width='100%'><tr><td width='80%'><a name='cr'></a><b><font size='2' color=#0000cc>Mutant Image</font></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='/faq/mutant_image.php'><img src='image/help.gif' width='15' height='15' border='0'/></a></td><td width='20%' align=right></td></tr></table></td></tr><tr><td colspan='2' bgcolor=#E4E8EA width='100%'><table width='100%'><tr><td width='80%'><a name='cr'></a><b><font size='2' color=black>$result_mutant_image_info[1]</font></b>&nbsp;&nbsp;&nbsp;</td><td width='20%' align=right></td></tr></table></td></tr>";

        }

        if ($result_mutant_image_info[0] != ""){

            $size=getimagesize("/home/zhaoy/zhaoy/web_psd_development_version/mutant_image/" . $result_mutant_image_info[0] . ".png");

            if ($size[0] > 700){
                $size[1] = $size[1] * 700/$size[0];
                $size[0] = 700;
            }

            $width_size = $size[0] * 0.8;
            $height_size = $size[1] * 0.8;

            echo "<tr><td colspan='2'><img src='mutant_image/$result_mutant_image_info[0].png' width='$width_size' height='$height_size'/></td></tr>";

        }

        ?>

        <?php
        $result_protein_localization_num = 0;
        $protein_localization = "SELECT localization, evidence, pubmed_id FROM protein_localization_info WHERE locus_name = '$info[0]' OR locus_name = '$info[7]'";
        $result_protein_localization = mysqli_query($conn, $protein_localization) or die;
        $result_protein_localization_num = mysqli_num_rows($result_protein_localization);

        if ($result_protein_localization_num != 0){
            echo "<tr><td colspan='2' bgcolor=#ccccff width='100%'><table width='100%'><tr><td width='80%'><a name='cr'></a><b><font size='2' color=#0000cc>Subcellular Localization</font></b>&nbsp;&nbsp;&nbsp;</td><td width='20%' align=right></td></tr></table></td></tr>";
        }

        if ($result_protein_localization_num == 1){

            $result_protein_localization_info = mysqli_fetch_row($result_protein_localization);

            $pmid=explode(";",$result_protein_localization_info[2]);
            if (count($pmid) == 1){
                $ref_localization = "<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[0] target=_blank>$pmid[0]</a>";
            }

            if (count($pmid) > 1){
                for($i=0;$i<count($pmid);$i++){
                    $ref_localization=$ref_localization."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[$i] target=_blank>$pmid[$i];</a>";
                }

            }


            echo "<tr><td bgcolor=#DDF7DF width='30%'><b><font size='2'>Localization</font></b></td><td bgcolor=#E4E8EA width='70%'><font size='2'>$result_protein_localization_info[0]</font></td></tr>";

            echo "<tr><td bgcolor=#DDF7DF width='30%'><b><font size='2'>Evidence</font></b></td><td bgcolor=#E4E8EA width='70%'><font size='2'>$result_protein_localization_info[1]</font></td></tr>";

            echo "<tr><td bgcolor=#DDF7DF width='30%'><b><font size='2'>Pubmed ID</font></b></td><td bgcolor=#E4E8EA width='70%'><font size='2'>$ref_localization</font></td></tr>";

        }


        if ($result_protein_localization_num > 1){
            $num_localization = 1;
            while ($result_protein_localization_info = mysqli_fetch_array($result_protein_localization)){
                $pmid=explode(";",$result_protein_localization_info[2]);
                if (count($pmid) == 1){
                    $ref_localization = "<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[0] target=_blank>$pmid[0]</a>";
                }

                if (count($pmid) > 1){
                    for($i=0;$i<count($pmid);$i++){
                        $ref_localization=$ref_localization."<a href=http://www.ncbi.nlm.nih.gov/sites/entrez?db=pubmed&cmd=search&term=$pmid[$i] target=_blank>$pmid[$i];</a>";
                    }

                }

                echo "<tr><td colspan=2 width='100%'><table width='100%' cellspacing='1'><tr><td rowspan='5' bgcolor=#DDF7DF width='15%'><b><font size='2' color='#CC3399'>Localization $num_localization</font></b></td>";

                echo "<tr><td bgcolor=#DDF7DF width='15%'><b><font size='2'>Localization</font></b></td><td bgcolor=#E4E8EA width='70%'><font size='2'>$result_protein_localization_info[0]</font></td></tr>";

                echo "<tr><td bgcolor=#DDF7DF width='15%'><b><font size='2'>Evidence</font></b></td><td bgcolor=#E4E8EA width='70%'><font size='2'>$result_protein_localization_info[1]</font></td></tr>";

                echo "<tr><td bgcolor=#DDF7DF width='15%'><b><font size='2'>Pubmed ID</font></b></td><td bgcolor=#E4E8EA width='70%'><font size='2'>$ref_localization</font></td></tr>";

                echo "</table></td></tr>";

                $num_localization++;

            }
        }

        ?>

    </table>
</div>
</td>
</tr>

<?php
require ('common_footer.php');
?>

</table>
</body>
</html>

