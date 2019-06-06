<?php
require ('dbconnect.php');
require ('common_head.php');
?>

<script language="javascript">
    function check(){

        if(weblabform.savename.value == ""){alert("null");return false; }
        weblabform.savename.value=weblabform.savename.value+parseInt(Math.random()*100+1);
        return true;

    }
</script>

<div>
<p >

    <?php
    $items1='';
    $sql="select distinct accesse_id FROM gene_hormone_info WHERE evidence<>'GO' and (genbank_id <> '' or locus_name <> 'UNCLONE') ORDER by species, hormone_role";
    $re_gene_item=mysqli_query($conn, $sql) or die;

    while($info_item=mysqli_fetch_array($re_gene_item)){
        $string="item_".$info_item[0];
        $item=$_POST[$string];
        if($item!=''){$items1=$items1.$item;$items1=$items1." ";}
    }
    ?>
</p>
 <p class="info"><font face='Courier New' size=2>

  <form name="weblabform" id="weblabform" method="post" onsubmit="return check()" action="http://www.weblab.org.cn/mydata.gmapAuthSave.do" target="_blank">

        <?php

        $seq="";
        $seq_name="";
        $items = explode(" ", $items1);
        global $seqtype;

        if(count($items) == 1 && $items[0] == ""){
            echo "<font size='3'>Please select at least one gene.</font>";
            echo "<br/><br/>";
            echo "<input type='button' name='back' value='back' onclick='javascript:history.back();'/>";
        }

        for($i=0;$i<count($items);$i++ ){
            $seqtype = $_POST[$items[$i]];
            if($seqtype=="Genomic"){$db="seq_genomic";}
            if($seqtype=="mRNA"){$db="seq_cdna";}
            if($seqtype=="CDS"){$db="seq_cds";}
            if($seqtype=="Protein"){$db="seq_pep";}

            $sql="select * FROM $db WHERE accesse_id='$items[$i]'";
            $re_gene=mysqli_query($conn, $sql) or die;


            while($info=mysqli_fetch_array($re_gene)){
                $seq = $seq.">".$info[4]."\n";
                $seq = $seq.$info[5]."\n";
                $seq_name=$info[4];
            }
        }

        if(!$seq){
            echo "<font size='3'>There is not the corresponding type sequence for this gene.<font><br/><br/>";
            echo "<input type='button' name='back' value='back' onclick='javascript:history.back();'/>";
            require ('common_footer.php');
            echo "</table></body></html>";
            exit();
        }

        else{
            echo "<textarea name='textarea1' rows=34 cols=70 onchange='sequence.value=this.value'>";
            echo $seq;
            echo "</textarea><br><br></form></p>";
        }

        echo "<input name='sequence' type='hidden' value='$seq'/> ";

        date_default_timezone_set('Asia/Beijing');
        $date=date('Y-m-d H:i:s');
        $data_array=explode(" ",$date);
        $time_array=explode(":",$data_array[1]);
        $weblab_savename=$seq_name."_".$time_array[0]."_".$time_array[1]."_".$time_array[2];
        echo "<input name='savename' type='hidden' value='$weblab_savename'/>";

//        <input name='submitlogin' type='submit' value='submit to WebLab'/>&nbsp;&nbsp;&nbsp;<a href='/help/weblab.php'><img src='image/help.gif' width='15' height='15' border='0'/></a>
echo "</form></p></div></td></tr>";

        ?>
  </form></font></p>
</p>
</div>
        <?php
        require ('common_footer.php');
        ?>

        </table>
        </body>
        </html>
