<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');




$sql="select id from  gene_hormone_info";

$re_gene=mysqli_query($conn,$sql) or die;

#$info=mysqli_fetch_row($re_gene);
while($re=mysqli_fetch_array($re_gene)){

  # print $info[$i]."/n";
   $ac_id="LSD_".$re[id];
  # print $ac_id."/n";

    $sql="UPDATE gene_hormone_info  SET accesse_id='$ac_id' where id='$re[id]'";
    mysql_query($sql);
}


	
?>
	

   </td>
   </tr>

<?php
require ('common_footer.php');
?>
</table>




 </body>
</html>

