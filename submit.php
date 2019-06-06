<?php
require ('dbconnect.php');
session_start();
require ('code.php');

require ('common_head.php');



$AuthInput = $_POST["AuthInput"];
$action = $_GET["action"];



if($_POST['mySumbit']){
        if ($_SESSION["Authnum"] != $AuthInput)
        {
?>
         <script language="javascript">
         alert("Enter the Error Confirmation Code!");
         </script>
<?php 
         }
        else
        {
        $subject='"'.$_POST['subject'].'"';
		$mutant='"'.$_POST['mutant'].'"';
		$species='"'.$_POST['species'].'"';
		$pubmed='"'.$_POST['pubmed'].'"';
        $useremail='"'.$_POST['email'].'"';
		$comment='" Gene name:'.$_POST['subject'].'   Mutant name:'.$_POST['mutant'].'   Species:'.$_POST['species'].'   Pubmed Id:'.$_POST['pubmed'].'   Reference information:'.$_POST['comment'].'"';
		
	#	echo "$subject<br>$comment";
	    $exe=system("./mail/mail.pl  -s  $subject  -c  $comment -e $useremail",$ok);

 #      $ok=mail("liuxiaochuan666@126.com",$subject,$comment);
 #       echo "$exe<br/>";
#		echo "$ok<br/>";
		if($ok){
                  echo "<p class='sltext'  > Send feedback failed!<br> You can directly email to: lsd@mail.cbi.pku.edu.cn.</p>";
                }
		if(!$ok)
		{
                  echo "<p class='sltext'  > Thanks very much for your submission!</p>";
                }

        exit();
	}
}
?>
<script language="javascript">

        function checksubmit(){
                if(form2.subject.value=="") {
                        alert("Please input Gene name!");
                        form2.subject.focus();
                        return false;
                }
				
                else if(form2.comment.value==""){
                        alert("Please input reference information!");
                        form2.comment.focus();
                        return false;
                }
				else if ( form2.AuthInput.value=="") {
                        alert("Please Enter the Confirmation Code!");
                        form2.AuthInput.focus();
                        return false;
                } 
                else{
				        if(form2.email.value!=""){
				         var str=form2.email.value;
				         var result=str.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/);
                         if(result==null) { alert("Please input your correct email address!"); form2.email.focus(); return false;}
                         }
                       return ture;
                }
        }
</script>


 <div style="height:820px;width:760px;overflow-y:hidden;overflow-x:hidden">


  <form name="form2" method="POST" action="submit.php" enctype="multipart/form-data" onsubmit="return checksubmit()" style="margin-left:20px"> 
    <p> <b><font size="2">Welcome to submit the new SAG:</font></b>&nbsp;&nbsp;&nbsp;<a href="/help/feedback.php"><img src='image/help.gif' width='15' height='15' border='0'/></a></p>
    <table width="90%" cellspacing="1"  cellpadding="5" class="colBorder">
	    
        <tr class="colHead"><td colspan="2" class="space5"><b>New SAG</b></td></tr>
        
        <tr>
            <td class="col1" width="30%"  height="40" valign="middle" ><B>Gene name: </B></td>
             <td  class="col2" width="70%"><input type="text" name="subject" size="35" value=""/> </td>
        </tr>
		<tr>
            <td class="col1" width="30%"  height="40" valign="middle" ><B>Mutant name: </B></td>
             <td  class="col2" width="70%"><input type="text" name="mutant" size="35" value=""/> </td>
        </tr>
		<tr>
            <td class="col1" width="30%"  height="40" valign="middle" ><B>Species: </B></td>
             <td  class="col2" width="70%"><input type="text" name="species" size="35" value=""/> </td>
        </tr>

         <tr>
            <td class="col1" width="30%" ><B>Reference title: </B></td>
             <td  class="col2" width="70%" height="200" valign="middle" >
                    <textarea name="comment"  rows="8" cols="40"></textarea>
             </td>
        </tr>
		<tr>
            <td class="col1" width="30%"  height="40" valign="middle" ><B>Pubmed ID: </B></td>
             <td  class="col2" width="70%"><input type="text" name="pubmed" size="35" value=""/> </td>
        </tr>
		<tr>
            <td class="col1" width="30%"  height="40" valign="middle" ><B>Your email address: </B></td>
             <td  class="col2" width="70%"><input type="text" name="email"  size="35" value=""/> </td>
        </tr>
		<tr>
            <td class="col1" width="30%"  height="40" valign="middle" ><B>Confirmation Code: </B></td>
             <td  class="col2" width="70%"><input type="text" name="AuthInput"   id="AuthInput"  size="8" maxlength="4" /><script>document.write("<img src=\"authimg.php?n=",Math.random(),"\" />");</script> </td>
        </tr>
		<tr class="colHead"><td colspan="2" class="r" ><input type=reset value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="mySumbit" value="Send"/> </td></tr>
    </table>
    </form>


</div>
   </td>
   </tr>

<?php
require ('common_footer.php');
?>
</table>




 </body>
</html>

