<?php
include('JpGraph/jpgraph.php');
include('JpGraph/jpgraph_line.php');
include('JpGraph/jpgraph_error.php');
include('JpGraph/jpgraph_bar.php');


$col=$_GET["COL"];
$nahg=$_GET["NAHG"];
$coi1=$_GET["COIL"];
$ein2=$_GET["EIN2"];
$dl=$_GET["DL"];
$celldeath=$_GET["CELLDEATH"];

$datay1=array();
$datay2=array();


$col_tag=1;
$nahg_tag=1;;
$coi1_tag=1;
$ein2_tag=1;
$dl_tag=1;
$celldeath_tag=1;

if($col >0){array_push($datay1,$col); array_push($datay2,0);}
elseif($col ==0){$col_tag=0;}
else{array_push($datay2,$col); array_push($datay1,0);}

if($nahg >0){array_push($datay1,$nahg); array_push($datay2,0);}
elseif($nahg ==0){$nahg_tag=0;}
else{array_push($datay2,$nahg); array_push($datay1,0);}

if($coi1 >0){array_push($datay1,$coi1); array_push($datay2,0);}
elseif($coi1 ==0){$coi1_tag=0;}
else{array_push($datay2,$coi1); array_push($datay1,0);}

if($ein2 >0){array_push($datay1,$ein2); array_push($datay2,0);}
elseif($ein2 ==0){$ein2_tag=0;}
else{array_push($datay2,$ein2); array_push($datay1,0);}

if($dl >0){array_push($datay1,$dl); array_push($datay2,0);}
elseif($dl ==0){$dl_tag=0;}
else{array_push($datay2,$dl); array_push($datay1,0);}

if($celldeath >0){array_push($datay1,$celldeath); array_push($datay2,0);}
elseif($celldeath ==0){$celldeath_tag=0;}
else{array_push($datay2,$celldeath); array_push($datay1,0);}

//$datay=array(-4.20,1.34,1.26,1.04,5.49,31.65);
//$datay1=array(0,8,19,0,1,31.9);
//$datay2=array(-4.2,0,0,-15.3,0,0);

//print $datay1;
/*echo "$col;$nahg;$coi1;$ein2;$dl;$celldeath";

while (list($key,$value) = each($datay1)) { 

echo "$key : $value<br>"; 

} 

  echo"<br>";
  echo "count($datay1)";
    echo"<br>";
  echo "count($datay2)";
  
  echo "$col;$nahg;$coi1;$ein2;$dl;$celldeath";

while (list($key,$value) = each($datay2)) { 

echo "$key : $value<br>"; 

} 
*/

//$max=4*42;
$datay_min=0;
$datay_min1=min($datay1);
$datay_min2=min($datay2);
if($datay_min1<$datay_min2){$datay_min=$datay_min1;}
else{$datay_min=$datay_min2;}
$max=($datay_min-0.2)*(-100);
// Size of graph
$width=450;
$height=200;
 
// Set the basic parameters of the graph
//$graph = new Graph($width,$height,'auto');
$graph = new Graph($width,$height);


//$graph->SetScale('textlin');
$graph->SetScale('textlin');

 
$top =0;
$bottom = 0;
$left = 0;
$right =0;
$graph->Set90AndMargin($left,$right,$top,$bottom);
 
// Nice shadow
//$graph->SetShadow();
 
// Setup labels




$lbl = array();
if($col_tag==1){array_push($lbl,"Col");}
if($nahg_tag==1){array_push($lbl,"NahG");}
if($coi1_tag==1){array_push($lbl,"coi1");}
if($ein2_tag==1){array_push($lbl,"ein2");}
if($dl_tag==1){array_push($lbl,"D/L");}
if($celldeath_tag==1){array_push($lbl,"CD");}
//$lbl = array("Col","NahG","coi1","ein2","D/L","CD");
$graph->xaxis->SetTickLabels($lbl);
 
// Label align for X-axis
$graph->xaxis->SetLabelAlign('right','center');
//$graph->xaxis->SetLabelSide(50); 

//$graph->xaxis->SetLabelMargin("min"); 
$graph ->xaxis->SetPos("min"); 
//$graph->xaxis->SetLabelMargin($max); 
// Label align for Y-axis
$graph->yaxis->SetLabelAlign('center','bottom');

// We don't want to display Y-axis
//$graph->yaxis->Hide();

// Titles
//$graph->title->Set('Number of incidents');
 
// Create a bar pot
//$bplot = new BarPlot($datay);
//$bplot->SetFillgradient('red','darkred',GRAD_HOR); 
//$bplot->SetFillColor('red');



// Create the first bar
$bplot = new BarPlot($datay1);
$bplot->SetFillgradient('#ff3399','#FF0000',GRAD_WIDE_MIDVER); 
//$bplot->SetColor('red');
 
// Create the second bar
$bplot2 = new BarPlot($datay2);
$bplot2->SetFillgradient('#3399ff','#3399ff',GRAD_WIDE_MIDVER); 
//$bplot2->SetColor('#000013');
 
// And join them in an accumulated bar
$accbplot = new AccBarPlot(array($bplot,$bplot2));
$accbplot->SetWidth(0.6);
$accbplot->SetYMin(0);
$graph->Add($accbplot);

//$accbplot->SetValuePos('top'); 

// Setup the values that are displayed on top of each bar
$accbplot->value->Show();
$accbplot->value->SetColor("black");
$accbplot->value->SetFont(FF_ARIAL,FS_BOLD,9);
$accbplot->value->SetFormat('%.2f');

$accbplot->SetValuePos('max');
//$accbplot->SetValuePos('bottom');

 


//$bplot->SetWidth(0.7);
//$bplot->SetYMin(0);
 
//$graph->Add($bplot);
 
$graph->Stroke();
//echo "<br>getHeight($graph)";

?>

