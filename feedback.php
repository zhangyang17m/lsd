<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');


if($_POST['mySumbit']){
        $subject='"'.$_POST['subject'].'"';
        $useremail='"'.$_POST['email'].'"';
		$comment='"'.$_POST['comment'].'"';
		
	#	echo "$subject<br>$comment";
	    $exe=system("./mail/mail.pl  -s  $subject  -c  $comment -e $useremail",$ok);

 #      $ok=mail("liuxiaochuan666@126.com",$subject,$comment);
 #       echo "$exe<br/>";
#		echo "$ok<br/>";
		if($ok){
                  echo "<p class='sltext'  > Send feedback failed!<br> You can directly email to: zhangyang17m@big.ac.cn.</p>";
                }
		if(!$ok)
		{
                  echo "<p class='sltext'  > Thanks very much for your comments!</p>";
                }

        exit();
}
?>
<script language="javascript">
        function checksubmit(){
                if(form1.subject.value=="") {
                        alert("Please input Subject name!");
                        form1.subject.focus();
                        return false;
                }
				
                else if(form1.comment.value==""){
                        alert("Please input your content!");
                        form1.comment.focus();
                        return false;
                }
				
                else{
				        if(form1.email.value!=""){
				         var str=form1.email.value;
				         var result=str.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/);
                         if(result==null) { alert("Please input your correct email address!"); form1.email.focus(); return false;}
                         }
                       return ture;
                }
        }
</script>


 <div style="height:820px;width:760px;overflow-y:hidden;overflow-x:hidden">


  <form name="form1" method="POST" action="feedback.php" enctype="multipart/form-data" onsubmit="return checksubmit()" style="margin-left:20px"> 
    <p> <b><font size="2">Welcome to give feedback for improving LSD:</font></b>&nbsp;&nbsp;&nbsp;<a href='/help/feedback.php'><img src='image/help.gif' width='15' height='15' border='0'/></a>
	</p>
    <table width="90%" cellspacing="1"  cellpadding="5" class="colBorder">
	    
        <tr class="colHead"><td colspan="2" class="space5"><b>Feedback</b></td></tr>
        
        <tr>
            <td class="col1" width="30%"  height="40" valign="middle" ><B>Subject: </B></td>
             <td  class="col2" width="70%"><input type="text" name="subject" size="35" value=""/> </td>
        </tr>
		<tr>
            <td class="col1" width="30%"  height="40" valign="middle" ><B>Your email address: </B></td>
             <td  class="col2" width="70%"><input type="text" name="email"  size="35" value=""/> </td>
        </tr>
         <tr>
            <td class="col1" width="30%" ><B>Content: </B></td>
             <td  class="col2" width="70%" height="200" valign="middle" >
                    <textarea name="comment"  rows="8" cols="40"></textarea>
             </td>
        </tr>
		
	<tr>
            <td class="col1" width="30%"  height="40" valign="middle" ><B>Confirmation Code: </B></td>
             <td  class="col2" width="70%"><input type="text" name="AuthInput"   id="AuthInput"  size="8" maxlength="4" />
                 <script>document.write("<img src=\"authimg.php?n=",Math.random(),"\" />");</script> </td>
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

