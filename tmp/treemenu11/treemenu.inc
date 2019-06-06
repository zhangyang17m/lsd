<?php  
  /*********************************************/
  /*  PHP TreeMenu 1.1                         */
  /*                                           */
  /*  Author: Bjorge Dijkstra                  */
  /*  email : bjorge@gmx.net                   */
  /*                                           */  
  /*  Placed in Public Domain                  */
  /*                                           */  
  /*********************************************/

  /*********************************************/
  /*  Settings                                 */
  /*********************************************/
  /*                                           */      
  /*  $treefile variable needs to be set in    */
  /*  main file                                */
  /*                                           */ 
  /*********************************************/
  
  /*********************************************/
  /*                                           */
  /* - Multiple root node fix by Dan Howard    */
  /*                                           */
  /*********************************************/

  if(isset($PATH_INFO)) {
	  $script       =  $PATH_INFO; 
  } else {
	  $script	=  $SCRIPT_NAME;
  }

  $img_expand   = "tree_expand.gif";
  $img_collapse = "tree_collapse.gif";
  $img_line     = "tree_vertline.gif";  
  $img_split	= "tree_split.gif";
  $img_end      = "tree_end.gif";
  $img_leaf     = "tree_leaf.gif";
  $img_spc      = "tree_space.gif";

 
  /*********************************************/
  /*  Read text file with tree structure       */
  /*********************************************/
  
  /*********************************************/
  /* read file to $tree array                  */
  /* tree[x][0] -> tree level                  */
  /* tree[x][1] -> item text                   */
  /* tree[x][2] -> item link                   */
  /* tree[x][3] -> link target                 */
  /* tree[x][4] -> last item in subtree        */
  /*********************************************/

  $maxlevel=0;
  $cnt=0;
  
  $fd = fopen($treefile, "r");
  if ($fd==0) die("treemenu.inc : Unable to open file ".$treefile);
  while ($buffer = fgets($fd, 4096)) 
  {
    $tree[$cnt][0]=strspn($buffer,".");
    $tmp=rtrim(substr($buffer,$tree[$cnt][0]));
    $node=explode("|",$tmp); 
    $tree[$cnt][1]=$node[0];
    $tree[$cnt][2]=$node[1];
    $tree[$cnt][3]=$node[2];
    $tree[$cnt][4]=0;
    if ($tree[$cnt][0] > $maxlevel) $maxlevel=$tree[$cnt][0];    
    $cnt++;
  }
  fclose($fd);

  for ($i=0; $i<count($tree); $i++) {
     $expand[$i]=0;
     $visible[$i]=0;
     $levels[$i]=0;
  }

  /*********************************************/
  /*  Get Node numbers to expand               */
  /*********************************************/
 
  if ($p!="") $explevels = explode("|",$p);
  
  $i=0;
  while($i<count($explevels))
  {
    $expand[$explevels[$i]]=1;
    $i++;
  }
  
  /*********************************************/
  /*  Find last nodes of subtrees              */
  /*********************************************/
  
  $lastlevel=$maxlevel;
  for ($i=count($tree)-1; $i>=0; $i--)
  {
     if ( $tree[$i][0] < $lastlevel )
     {
       for ($j=$tree[$i][0]+1; $j <= $maxlevel; $j++)
       {
          $levels[$j]=0;
       }
     }
     if ( $levels[$tree[$i][0]]==0 )
     {
       $levels[$tree[$i][0]]=1;
       $tree[$i][4]=1;
     }
     else
       $tree[$i][4]=0;
     $lastlevel=$tree[$i][0];  
  }
  
  
  /*********************************************/
  /*  Determine visible nodes                  */
  /*********************************************/
  
// all root nodes are always visible
  for ($i=0; $i < count($tree); $i++) if ($tree[$i][0]==1) $visible[$i]=1;


  for ($i=0; $i < count($explevels); $i++)
  {
    $n=$explevels[$i];
    if ( ($visible[$n]==1) && ($expand[$n]==1) )
    {
       $j=$n+1;
       while ( $tree[$j][0] > $tree[$n][0] )
       {
         if ($tree[$j][0]==$tree[$n][0]+1) $visible[$j]=1;     
         $j++;
       }
    }
  }
  
  
  /*********************************************/
  /*  Output nicely formatted tree             */
  /*********************************************/
  
  for ($i=0; $i<$maxlevel; $i++) $levels[$i]=1;

  $maxlevel++;
  
  echo "<table cellspacing=0 cellpadding=0 border=0 cols=".($maxlevel+3)." width=100%>\n";
  echo "<tr>";
  for ($i=0; $i<$maxlevel; $i++) echo "<td width=16></td>";
  echo "<td width=100%>&nbsp;</td></tr>\n";
  $cnt=0;
  while ($cnt<count($tree))
  {
    if ($visible[$cnt])
    {
      /****************************************/
      /* start new row                        */
      /****************************************/      
      echo "<tr>";
      
      /****************************************/
      /* vertical lines from higher levels    */
      /****************************************/
      $i=0;
      while ($i<$tree[$cnt][0]-1) 
      {
        if ($levels[$i]==1)
            echo "<td><a name='$cnt'></a><img src=\"".$img_line."\"></td>";
        else
            echo "<td><a name='$cnt'></a><img src=\"".$img_spc."\"></td>";
        $i++;
      }
      
      /****************************************/
      /* corner at end of subtree or t-split  */
      /****************************************/         
      if ($tree[$cnt][4]==1) 
      {
        echo "<td><img src=\"".$img_end."\"></td>";
        $levels[$tree[$cnt][0]-1]=0;
      }
      else
      {
        echo "<td><img src=\"".$img_split."\"></td>";                  
        $levels[$tree[$cnt][0]-1]=1;    
      } 
      
      /********************************************/
      /* Node (with subtree) or Leaf (no subtree) */
      /********************************************/
      if ($tree[$cnt+1][0]>$tree[$cnt][0])
      {
        
        /****************************************/
        /* Create expand/collapse parameters    */
        /****************************************/
        $i=0; $params="?p=";
        while($i<count($expand))
        {
          if ( ($expand[$i]==1) && ($cnt!=$i) || ($expand[$i]==0 && $cnt==$i))
          {
            $params=$params.$i;
            $params=$params."|";
          }
          $i++;
        }
               
        if ($expand[$cnt]==0)
            echo "<td><a href=\"".$script.$params."#$cnt\"><img src=\"".$img_expand."\" border=no></a></td>";
        else
            echo "<td><a href=\"".$script.$params."#$cnt\"><img src=\"".$img_collapse."\" border=no></a></td>";         
      }
      else
      {
        /*************************/
        /* Tree Leaf             */
        /*************************/

        echo "<td><img src=\"".$img_leaf."\"></td>";         
      }
      
      /****************************************/
      /* output item text                     */
      /****************************************/
      if ($tree[$cnt][2]=="")
          echo "<td colspan=".($maxlevel-$tree[$cnt][0]).">".$tree[$cnt][1]."</td>";
      else
          echo "<td colspan=".($maxlevel-$tree[$cnt][0])."><a href=\"".$tree[$cnt][2]."\" target=\"".$tree[$cnt][3]."\">".$tree[$cnt][1]."</a></td>";
          
      /****************************************/
      /* end row                              */
      /****************************************/
              
      echo "</tr>\n";      
    }
    $cnt++;    
  }
  echo "</table>\n";
?>
