<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');

$gene_model=$_GET["GM"];
$db=$_GET["DB"];

if($db=="Genomic"){$db="seq_genomic"; $db2="Gene";}
if($db=="cDNA"){$db="seq_cdna"; $db2="mRNA"; }
if($db=="CDS"){$db="seq_cds"; $db2="Cds"; }
if($db=="Protein"){$db="seq_pep"; $db2="Pep";}

$sql="select * FROM $db WHERE gene_model='$gene_model'";

$re_gene=mysqli_query($conn, $sql) or die;

$info=mysqli_fetch_row($re_gene);

$re_num_gene=mysqli_num_rows($re_gene);
?>

<script language="javascript">
    function check(){

//var o=document.getElementsByTagName('savename');
        if(weblabform.savename.value ==""){alert("null");return false; }
        weblabform.savename.value=weblabform.savename.value+parseInt(Math.random()*100+1);
        return true;

    }
    function weblab(){
        document.weblabform.action="http://weblab.cbi.pku.edu.cn/mydata.gmapAuthSave.do";
//document.weblabform.submit();
    }

    function blast(){
        if(weblabform.seqtype.value=='seq_pep')
            document.weblabform.action="pblast.php";
        else
            document.weblabform.action="nblast.php";
//document.weblabform.submit();
    }

</script>

<div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden" >

    <p  class="info1" ><font face='Courier New' size=2>

            <form name="weblabform" id="weblabform" method="post"  onsubmit="return check()"    target="_blank">

                <?php
                $num_rows=0;
                if($re_num_gene !=0)
                { //echo ">".$info[4]."<br>";


                    for($i=0;$i<strlen($info[5]);$i+=69){
                        if ($i+69<strlen($info[5])){
                            $num_rows++;
                            //print substr($info[5],$i,69);
                            //print "<br>";
                        }
                        else{
                            $num_rows++;
                            //print substr($info[5],$i,strlen($info[5]));
                        }
                    }
                }
                else {echo "Sorry, NO sequence information.";}

                $seq = $seq.">".$info[4]."\n";
                $seq = $seq.$info[5]."\n";
                $num_rows++;
                $num_rows++;
                $num_rows++;
                echo "<br><textarea name='textarea1'   rows=$num_rows cols=70 onchange='sequence.value=this.value' >";
                echo $seq;
                echo "</textarea>";

                echo "<input name='sequence' type='hidden' value='$seq' /> ";
                echo "<input name='seqtype' type='hidden' value='$db' /> ";

                date_default_timezone_set('Asia/Beijing');
                $date=date('Y-m-d H:i:s');
                $data_array=explode(" ",$date);
                $time_array=explode(":",$data_array[1]);
                $weblab_savename=$info[4]."_".$db2."_".$time_array[0]."_".$time_array[1]."_".$time_array[2];
                echo "<input name='savename' type='hidden' value='$weblab_savename'/>";
                ?>

                <br>

                <br>
                <input name="submitblast" type="submit" value="BLAST" onclick="blast()"/>&nbsp;<a href='http://psd.cbi.pku.edu.cn/help/blast.php'><img src="image/help.gif" width="15" height="15" border="0"/></a>&nbsp;&nbsp;&nbsp;
                <!--                <input name="submitlogin" type="submit" value="submit to WebLab" onclick="weblab()"/>&nbsp;<a href='http://psd.cbi.pku.edu.cn/help/weblab.php'><img src="image/help.gif" width="15" height="15" border="0"/></a>-->
            </form></font>
    </p>
</div>
</td>
</tr>

<?php
require ('common_footer.php');
?>
</table>




</body>
</html>

