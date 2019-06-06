<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');
?>


 <div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">


<table border=0 width=90%  cellspacing=1  align="center" style="table-layout:fixed"  ><tr><td height=10></td></tr>
<?php
$sqlname="select distinct species from  gene_hormone_info  ORDER by species";
$re_name=mysqli_query($conn, $sqlname);
$num=0;
$all_species_num=mysqli_num_rows($re_name);
echo "<tr><td><font color=blue >Browse by Species:</font> ( Total : <font color=red> $all_species_num </font> Organism )</td></tr><tr><td><table border=1 bordercolor=#ccccff align=center width='100%'><tr color=red border=1>";
while ($fname=mysqli_fetch_row($re_name)){
        if($num%2==0){
	        echo "</tr><tr>";
	}
	$sqlnumber="select distinct * from  gene_hormone_info  where species ='$fname[0]'";
	$re_number=mysqli_query($conn, $sqlnumber);
	$species_num=mysqli_num_rows($re_number);
	$array_species_name=str_replace("_"," ",$fname[0]);

	
	echo "<td width='25%' align=center ><font color='#FF0000'><a href='browse_species.php?speciesname=$fname[0]'>$array_species_name</a></font>($species_num)</td>";
	$num++;
}
		
?>		
</tr>
</table>
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

