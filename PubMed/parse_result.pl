#!/usr/bin/perl
($infile1)=@ARGV;
open(IN1,"$infile1")|| die "can't open $infile1";
my @line1=<IN1>;
for($i=0;$i < scalar(@line1);$i++)
{
   my @array=split(/\t/,$line1[$i]);
   my $Journal=$array[2];
    
   my @Journal_array=split(/\./,$Journal);
#   my $length=scalar(@Journal_array);
   my $Journal_real=$Journal_array[1];
   my @date=split(" ",$Journal_real);
   print $date[0]."\n";
}
