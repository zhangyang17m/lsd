<?php
function addHeader($string)
{
	print "<title>".$string."</title>\n";
}

function formatSequence($sequence, $slice_len, $slice_per_row)
{
	$strlen = strlen($sequence);
	$start = 1;
	$i = 1;
	
/* 	echo "<font style='font-size:17px'>+</font>";
	for( $j = 1; $j <= ($slice_len * $slice_per_row); $j++ )
	{
		if( $j % $slice_len )
		{
			echo "<font style='font-size:16px'>-</font>";
		}
		else
		{
			echo "<font style='font-size:17px'>+</font>";
		}
	}
	echo "<br>";
	
	echo "&nbsp;"; */
	echo "<span style='font-size:16px; font-family: monospace'>";
	
	while( ($start+$slice_len-1) < $strlen )
	{
		//echo "<font style='font-size:17px'>".substr($sequence, $start-1, $slice_len)."</font>";
//		echo "<font style='font-size:16px; font-family: monospace'>".substr($sequence, $start-1, $slice_len)."</font>";
		echo substr($sequence, $start-1, $slice_len);
		if( $i < $slice_per_row )
		{
			echo " ";
			$i++;
			$start += $slice_len;
		}
		else
		{
			$start += $slice_len;
			$i = 1;
			echo "&nbsp;&nbsp;".($start-1);
			echo "<br/>";
		}
	}
//	echo "<font style='font-size:16px; font-family: monospace'>".substr($sequence,$start-1,$strlen-$start+1)."</font>";
	echo substr($sequence,$start-1,$strlen-$start+1)."<br/></span>";
}

function linkDB( $db, $id)
{
//$linkage['HMMPfam']="http://www.sanger.ac.uk/cgi-bin/Pfam/getacc?";
	//print $db;
	//print $id;
	//print "here....";
	if( $db == "HMMPfam" or $db == "Pfam")
	{
		//$string = "&nbsp;&nbsp;&nbsp;&nbsp;InterPro ID: ".$id."<br>";
		$replacement = "<a href=http://www.sanger.ac.uk/cgi-bin/Pfam/getacc?$id target=blank>$id</a>";
		return preg_replace("/$id/", $replacement, $id);
		//print "<br>";
	}
	elseif( $db == "PRINTS" )
	{
		$replacement = "<a href=http://umber.sbs.man.ac.uk/cgi-bin/dbbrowser/sprint/searchprintss.cgi?prints_accn=$id&display_opts=Prints&category=None&queryform=false&regexpr=off target=blank>$id</a>";
		return preg_replace("/$id/", $replacement, $id);
		//print "<br>";		
	}
	elseif( $db =="ProDom")
	{
		$replacement = "<a href=http://protein.toulouse.inra.fr/prodom/current/cgi-bin/request.pl?question=DBEN&query=$id target=blank>$id</a>";
		return preg_replace("/$id/", $replacement, $id);
		//print "<br>";
	}
	elseif( $db == "Panther" )
	{
		$replacement = "<a href=https://panther.appliedbiosystems.com/panther/family.do?clsAccession=$id target=blank>$id</a>";
		return preg_replace("/$id/", $replacement, $id);
		//print "<br>";		
	}
	elseif( $db == "PROSITE pattern" )
	{
		$replacement = "<a href=http://www.expasy.org/prosite/$id target=blank>$id</a>";
		return preg_replace("/$id/", $replacement, $id);
		//print "<br>";			
	}
	elseif( $db == "PROSITE profile" )
	{
		$replacement = "<a href=http://www.expasy.org/prosite/$id target=blank>$id</a>";
		return preg_replace("/$id/", $replacement, $id);
		//print "<br>";		
	}
	elseif( $db == "PIR" )
	{
		$replacement = "<a href=http://pir.georgetown.edu/cgi-bin/ipcSF?id=$id target=blank>$id</a>";
		return preg_replace("/$id/", $replacement, $id);
	}
	elseif( $db == "Smart" )
	{
		$replacement = "<a href=http://smart.embl-heidelberg.de/smart/do_annotation.pl?ACC=$id&BLAST=DUMMY target=blank>$id</a>";
		return preg_replace("/$id/", $replacement, $id);
		//print "<br>";		
	}
	elseif( $db == "superfamily" )
	{
		$replacement = "<a href=http://supfam.org/SUPERFAMILY/cgi-bin/scop.cgi?ipid=$id target=blank>$id</a>";
		return preg_replace("/$id/", $replacement, $id);
		//print "<br>";			
	}
	elseif( $db == "Tigr" )
	{
		$replacement = "<a href=http://www.tigr.org/tigr-scripts/CMR2/hmm_report.spl?acc=$id target=blank>$id</a>";
		return preg_replace("/$id/", $replacement, $id);
	}
	else
	{
		return $id;
		//print "<br>";
	}
//$linkage['ProfileScan']="http://www.isrec.isb-sib.ch/cgi-bin/get_pstprf?";
//$linkage['HMMSmart']="
}

function linkGO( $haveGOterm )
{
	$string = "&nbsp;&nbsp;&nbsp;&nbsp;GO Description: ".$haveGOterm."<br>";
	$pattern = "/(GO:\d+)/";
	$replacement = "<a href=http://www.godatabase.org/cgi-bin/amigo/go.cgi?view=details&query=$1 target=blank>$1</a>";
	print preg_replace($pattern, $replacement, $string);
}

function checkQueryStr( $str )
{
	if(preg_match_all("/['\s+\*]/", $str, $out))
	{
		exit();
	}
}
?>
