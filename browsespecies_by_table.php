<?php

require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

?>

<div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">

<p class="info">

<?php

$sqlname = "select distinct species from gene_hormone_info ORDER by species";
$re_name = mysqli_query($conn,$sqlname);
if (!$re_name) die(mysqli_error($conn));
$tmp_all_species_num = mysqli_num_rows($re_name);
$all_species_num = $tmp_all_species_num-1;

echo "<font color=blue size=3 >Browse by Table:</font> <font color=black size=3 >( Total : </font>$all_species_num<font color=red></font><font color=black size=3> Species )</font><br><br><table border=0 width=90% bgcolor=black cellspacing=1  align='center' style='table-layout:fixed'>";

echo "<tr><td class=header2C width=50%>Species</td><td class=header2C width=50%>Genes Number</td></tr>";

$count=1;

while ($info = mysqli_fetch_array($re_name)){

	$bgcolor = ($count % 2)==1 ? '#ededed' : 'white';
	echo "<tr bgcolor=$bgcolor>";

	if (preg_match ("/Pseudomonas putida strain: G7/", $info[0])){
		continue;
	}	

	if (preg_match ("/\(/", $info[0])){

                preg_match ("/(.+) \((.+)\)/", $info[0], $species_match);
                echo "<td width='50%'>$species_match[1] (<i>$species_match[2]</i>)</td>";
	}
	
	else {
        	echo "<td width='50%'><i>$info[0]</i></td>";
	}

	$sqlname_individual = "select distinct * from gene_hormone_info where species = '$info[0]'";
	$result_sqlname_individual = mysqli_query ($conn,$sqlname_individual) or die;
	$result_sqlname_individual_num = mysqli_num_rows ($result_sqlname_individual);
	
	$new_name = str_replace(" ", "%20", $info[0]);
	
	echo "<td width=50%><a href=browse_species.php?speciesname=$new_name><font color=#FF0000>$result_sqlname_individual_num</font></a></td>";
	
	$count ++;

}

?>

</table>
</p>
</div>


<?php

require ('common_footer.php')

?>

</table>
</body>
</html>
