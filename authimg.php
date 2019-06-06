<?php

 $IsLetter = false; 
 session_start();
 $Num  = $_GET["n"];
 
 header("Content-type: image/JPG");
 $im   = imagecreate(46,20);
 srand((double)microtime()*1000000);
 $Red  = rand(0,200);
 $Green  = rand(0,200);
 $Blue  = rand(0,200);
 $Color  = imagecolorallocate($im, $Red, $Green, $Blue);
 $BackGround = imagecolorallocate($im, 255,255,255);
 imagefill($im,0,0,$BackGround);
 
 if($IsLetter)
 {
  $a = substr(md5($Num*10000000000000000),0,1);
  $b = substr(md5($Num*10000000000000000),4,1);
  $c = substr(md5($Num*10000000000000000),8,1);
  $d = substr(md5($Num*10000000000000000),12,1);
 }
 else
 {
  $a = substr(hexdec(md5($Num*10000000000000000)),2,1);
  $b = substr(hexdec(md5($Num*10000000000000000)),3,1);
  $c = substr(hexdec(md5($Num*10000000000000000)),4,1);
  $d = substr(hexdec(md5($Num*10000000000000000)),5,1);
 }
 
 $Authnum    = strtoupper($a.$b.$c.$d);
 
 $_SESSION["Authnum"] = $Authnum;
 
 imagestring($im, 5, 5, 2, $Authnum, $Color);
 for($i=0;$i<200;$i++)
 {
     $randcolor = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
     imagesetpixel($im, rand()%70 , rand()%30 , $randcolor);
 }
 imagepng($im);
 imagedestroy($im);
?>
