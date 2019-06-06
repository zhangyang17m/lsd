<?php
require ('dbconnect.php');
require ('code.php');
require ('common_head.php');
?>


 <div style="height:820px;width:760px;overflow-y:scroll;overflow-x:hidden">


<table border=0 width=90%  cellspacing=1  align="center" style="table-layout:fixed"  ><tr><td height=10></td></tr>
<?php
//$sql="select distinct pmid FROM plant_info ORDER by plant_name";
//$sql="select distinct pmid FROM gene_hormone_info WHERE evidence<>'GO' ORDER by species,hormone_role";
//$result=mysqli_query($conn,$sql) or die;
//$re_num=mysqli_num_rows($result);

$gene_pubmed="";
//while ($fname=mysqli_fetch_row($result)){
      
	  
//	  $pmid=explode(";",$fname[0]);
	 
	  $fp=fopen("PubMed/pubmed_all_id.final_new",'r');
	  while (!feof($fp))
     {
      $bruce=fgets($fp);
      if($bruce!=""){


	  
	//  for($i=0;$i<count($pmid);$i++){
//	  if($pmid[$i]!=""){
	  $result_pmd = file_get_contents( "http://www.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi?db=pubmed&id=$bruce&retmode=html&rettype=abstract");
	  
	  $result_pmd_replace=str_replace("\n","#",$result_pmd);
	 $result_pmd_array=explode("##",$result_pmd_replace);
	 if($result_pmd_array[1]!=""){$pmd_journal_title_date=$result_pmd_array[1];}
	 if($result_pmd_array[2]!=""){$pmd_paper_title=$result_pmd_array[2];}
	 if($result_pmd_array[3]!=""){$pmd_paper_author=$result_pmd_array[3];}
     if($result_pmd_array[4]!=""){$pmd_paper_address=$result_pmd_array[4];}
	 
	 $pmd_journal_title_date_array=split(":",$pmd_journal_title_date);
	 
	 $real_pmd_journal_title_date=$pmd_journal_title_date_array[1];
	 $real_pmd_journal_title_date=str_replace("#"," ",$real_pmd_journal_title_date);
	 $pmd_paper_author=str_replace("#"," ",$pmd_paper_author);
	 $pmd_paper_title=str_replace("#"," ",$pmd_paper_title);
	 
//	 $gene_pubmed=$gene_pubmed.$pmid[$i]."\n";
	 
     $gene_pubmed=$gene_pubmed.$pmd_paper_author."\t".$pmd_paper_title."\t".$real_pmd_journal_title_date."\t".$pmd_paper_address."\t".$bruce;
//	 $gene_pubmed=$gene_pubmed.$pmd_paper_address."\t".$bruce;
	  }
	}
//	}
	   if( ($File=fopen("PubMed/all_pubmed_new_20101017","w+")) == FALSE){ 
  
       echo("������д�ļ���PubMed/all_pubmed ʧ��");    
       } 
  
       echo ("������д�ļ� PubMed/all_pubmed �ɹ���</br>"); 

	   
	  // $File=@fopen("./download/".$array_species_name.".".$db,"w+");
	  
	  if(!fwrite($File,$gene_pubmed)){ //����Ϣд���ļ� 
        echo ("�������ļ� PubMed/all_pubmed д��ʧ�ܣ�"); 
        fclose($File); 
      }  
  
       echo ("�������ļ� PubMed/all_pubmed �ɹ���"); 
  
    //   fclose ($TxtRes);

    //    @fwrite($File,$seq);
        fclose($File);
		fclose($fp);

	
	

		
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

