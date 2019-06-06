#!/usr/bin/perl

use DBI;

#($infile1)=@ARGV;

#open(IN1,"$infile1")|| die "can't open $infile1";
#my @line1=<IN1>;


# Connect to target DB
my $dbh = DBI->connect('DBI:mysql:database=senescencedb_dev2:localhost:3306','root','root', {'RaiseError' => 1})
	|| die "Database connection not made: $DBI::errstr"; 

# Insert one row 
#my $rows = $dbh->do("INSERT INTO test (id, name) VALUES (1, 'eygle')");

#for($i=0;$i < scalar(@line1);$i++)
#{
#my @array=split(/;/,$line1[$i]);
#my $plantgdb_id=$array[10];
#print $plantgdb_id;

# query 
#print "AAA\n";
my $sqr = $dbh->prepare("select gene_model,seq from seq_genomic;");
#print "BBB\n";
$sqr->execute();
#print "CCC\n";

#my( $id, $name, $title, $phone ); 
my( $gene_model,$seq );
#$sth->bind_columns( undef, \$id, \$name, \$title, \$phone ); 
$sqr->bind_columns( undef, \$gene_model,\$seq );
while( $sqr->fetch() ) { 
#  print "$name, $title, $phone\n"; 
#   if($locus_name=~/^AT/){
   print ">".$gene_model."\n".$seq."\n";
#    }
} 

#$sqr->finish(); 



#my @ref = $sqr->fetchrow_array();
#print "DDD:".scalar(@ref). "\n";
#for (my $i=0;$i < scalar(@ref);$i++)
#{
 #  print "REF:".$ref[$i][0]."\n";
 #  print $i."\n";
 #  $ac_id="LSD_".$ref[$i];
 #  my $sqr1 = $dbh->prepare("UPDATE gene_hormone_info  SET accesse_id='$ac_id' where id='$ref[$i]'");
#}
#print "EEE\n";

#if($ref[0] ne '')
#{
#print $ref[0]."\t".$array[15]."\n";
# update
#my $sqr = $dbh->prepare("UPDATE plantcm SET similar_previous_miRNA = '$array[15]' where id='$ref[0]' ");
#$sqr->execute();
#}
#else {print $line1[$i];}
#}


#while(my @ref = $sqr->fetchrow_array()) {
#        print "$ref[3]\n";
        
#        my $id=$ref[0];
#	$id=~s/^\s*|\s*$//g;    #like the String.trim() method
#	for($i=0;$i < scalar(@line1);$i++ )
#	{  
#	   my @array=split(/\t/,$line1[$i]);
#	   my $array_id=$array[0];
#	   $array_id=~tr/-MIR/-miR/;
#           if($id eq $array_id )
#	     {
#	         my $ref=$array[1];
#		 $ref=~s/^\s*|\s*$//g;    #like the String.trim() method
		 # update
#		 my $sqr = $dbh->prepare("UPDATE plantcm SET reference  = '$ref' where id='$array_id' ");
#		 $sqr->execute();
		 #
	#        print $id."\t".$ref."\n\n";
#	     }
	  # print $id."\t".$array_id."\n";

#	}
	
#	$str1=~tr/T/U/;  
#	$str2=~tr/T/U/;

# update	
#	my $sqr = $dbh->prepare("UPDATE plantcm SET precursor_seq = '$str1' where abbreviation_name='zva' ");
#        $sqr->execute();


#	print $str1."\n";
#	print $str2."\n";

#	print " @ref\n";
#   for (my $i=0;$i< @ref; $i++)
#   {
#    print "$ref[$i]\n";
#   }

#}


# update
# my $sqr = $dbh->prepare("UPDATE plantcm SET abbreviation_name = 'zva' where abbreviation_name='lxc' ");
#$sqr->execute();



$dbh->disconnect();


