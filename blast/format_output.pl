#!/usr/bin/perl

use warnings;
use strict;
use DBI;

my $database="";
while (my $line = <STDIN>) {

	if($line=~/^(AT[0-9]+G[0-9]+\.[0-9]+)/){
		my $gene_model=$1;
		$gene_model=~s/^\s*|\s*$//g;

	#my $dbh = DBI->connect("DBI:mysql:database=senescencedb_dev2;host=192.168.118.78","peku","pekU@2018",{'RaiseError' => 1})|| die "Database connection not made: $DBI::errstr";
    my $dbh=DBI->connect('dbi:mysql:senescencedb_dev2:192.168.118.78','peku','pekU@2018') 
or die "Cannot connect database\n";
		my $sqr1 = $dbh->prepare("select accesse_id from seq_genomic where gene_model='$gene_model' ");
		my $sqr2 = $dbh->prepare("select accesse_id from seq_cdna where gene_model='$gene_model' ");
		my $sqr3 = $dbh->prepare("select accesse_id from seq_cds where gene_model='$gene_model' ");
		my $sqr4 = $dbh->prepare("select accesse_id from seq_pep where gene_model='$gene_model' ");
		$sqr1->execute();
		$sqr2->execute();
		$sqr3->execute();
		$sqr4->execute();

		my @ref1 = $sqr1->fetchrow_array();
		my @ref2 = $sqr2->fetchrow_array();
		my @ref3 = $sqr3->fetchrow_array();
		my @ref4 = $sqr4->fetchrow_array();

		if($ref1[0] ne ""){
			$line=~s/^(AT[0-9]+G[0-9]+\.[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref1[0] target=_blank>$1<\/a>/;       

  		}
         
		elsif($ref2[0] ne ""){
			
			$line=~s/^(AT[0-9]+G[0-9]+\.[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref2[0] target=_blank>$1<\/a>/;
		
		}
		
		elsif($ref3[0] ne ""){
		
			$line=~s/^(AT[0-9]+G[0-9]+\.[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref3[0] target=_blank>$1<\/a>/;
		
		}

		elsif($ref4[0] ne ""){

			$line=~s/^(AT[0-9]+G[0-9]+\.[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref4[0] target=_blank>$1<\/a>/;
		
		}
		
	}
	


	elsif($line=~/^(GSMUA_Achr[\w]+T[0-9]+_[0-9]+)/)
        {
		 
         my $gene_model=$1;
         $gene_model=~s/^\s*|\s*$//g;
         
	my $dbh=DBI->connect('dbi:mysql:senescencedb_dev2:192.168.118.78','peku','pekU@2018') 
or die "Cannot connect database\n";

         my $sqr1 = $dbh->prepare("select accesse_id from seq_genomic where gene_model='$gene_model' ");
         my $sqr2 = $dbh->prepare("select accesse_id from seq_cdna where gene_model='$gene_model' ");
         my $sqr3 = $dbh->prepare("select accesse_id from seq_cds where gene_model='$gene_model' ");
         my $sqr4 = $dbh->prepare("select accesse_id from  seq_pep  where gene_model='$gene_model' ");
         $sqr1->execute();
         $sqr2->execute();
         $sqr3->execute();
         $sqr4->execute();

         my @ref1 = $sqr1->fetchrow_array();
         my @ref2 = $sqr2->fetchrow_array();
         my @ref3 = $sqr3->fetchrow_array();
         my @ref4 = $sqr4->fetchrow_array();

         if($ref1[0] ne "")
         {
          
          $line=~s/^(GSMUA_Achr[\w]+T[0-9]+_[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref1[0] target=_blank>$1<\/a>/;       

  
         }
         elsif($ref2[0] ne "")
         {
           $line=~s/^(GSMUA_Achr[\w]+T[0-9]+_[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref2[0] target=_blank>$1<\/a>/;

         }
         elsif($ref3[0] ne "")
         {
           $line=~s/^(GSMUA_Achr[\w]+T[0-9]+_[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref3[0] target=_blank>$1<\/a>/;

         }
         elsif($ref4[0] ne "")
         {
           $line=~s/^(GSMUA_Achr[\w]+T[0-9]+_[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref4[0] target=_blank>$1<\/a>/;

         }

        } 

	elsif($line=~/^(GRMZM[0-9]+G[0-9]+_T[0-9]+)/)
	{
        
         my $gene_model=$1;
         $gene_model=~s/^\s*|\s*$//g;
       my $dbh=DBI->connect('dbi:mysql:senescencedb_dev2:192.168.118.78','peku','pekU@2018') 
or die "Cannot connect database\n";

         my $sqr1 = $dbh->prepare("select accesse_id from seq_genomic where gene_model='$gene_model' ");
         my $sqr2 = $dbh->prepare("select accesse_id from seq_cdna where gene_model='$gene_model' ");
         my $sqr3 = $dbh->prepare("select accesse_id from seq_cds where gene_model='$gene_model' ");
         my $sqr4 = $dbh->prepare("select accesse_id from  seq_pep  where gene_model='$gene_model' ");
         $sqr1->execute();
         $sqr2->execute();
         $sqr3->execute();
         $sqr4->execute();

         my @ref1 = $sqr1->fetchrow_array();
         my @ref2 = $sqr2->fetchrow_array();
         my @ref3 = $sqr3->fetchrow_array();
         my @ref4 = $sqr4->fetchrow_array();

         if($ref1[0] ne "")
         {
          
           $line=~s/^(GRMZM[0-9]+G[0-9]+_T[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref1[0] target=_blank>$1<\/a>/;       

  
         }
         elsif($ref2[0] ne "")
         {
           $line=~s/^(GRMZM[0-9]+G[0-9]+_T[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref2[0] target=_blank>$1<\/a>/;

         }
         elsif($ref3[0] ne "")
         {
           $line=~s/^(GRMZM[0-9]+G[0-9]+_T[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref3[0] target=_blank>$1<\/a>/;

         }
         elsif($ref4[0] ne "")
         {
         
           $line=~s/^(GRMZM[0-9]+G[0-9]+_T[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref4[0] target=_blank>$1<\/a>/;

         }
		}
       
	elsif($line=~/^(SGN-U579159)/){
        
         
          my $gene_model=$1;
          $gene_model=~s/^\s*|\s*$//g;
          my $dbh=DBI->connect('dbi:mysql:senescencedb_dev2:192.168.118.78','peku','pekU@2018') 
or die "Cannot connect database\n";

          my $sqr1 = $dbh->prepare("select accesse_id from seq_genomic where gene_model='$gene_model' ");
          my $sqr2 = $dbh->prepare("select accesse_id from seq_cdna where gene_model='$gene_model' ");
          my $sqr3 = $dbh->prepare("select accesse_id from seq_cds where gene_model='$gene_model' ");
          my $sqr4 = $dbh->prepare("select accesse_id from  seq_pep  where gene_model='$gene_model' ");
          $sqr1->execute();
          $sqr2->execute();
          $sqr3->execute();
          $sqr4->execute();

          my @ref1 = $sqr1->fetchrow_array();
          my @ref2 = $sqr2->fetchrow_array();
          my @ref3 = $sqr3->fetchrow_array();
          my @ref4 = $sqr4->fetchrow_array();

          if($ref1[0] ne ""){
            $line=~s/^(SGN-U579159)/<a href=\.\.\/get_gene_detail.php?AI=$ref1[0] target=_blank>$1<\/a>/;
          }
          elsif($ref2[0] ne ""){
            $line=~s/^(SGN-U579159)/<a href=\.\.\/get_gene_detail.php?AI=$ref2[0] target=_blank>$1<\/a>/;
          }
          elsif($ref3[0] ne ""){
            $line=~s/^(SGN-U579159)/<a href=\.\.\/get_gene_detail.php?AI=$ref3[0] target=_blank>$1<\/a>/;
          }
          elsif($ref4[0] ne ""){
            $line=~s/^(SGN-U579159)/<a href=\.\.\/get_gene_detail.php?AI=$ref4[0] target=_blank>$1<\/a>/;
          }
       }
 
       elsif($line=~/^(LOC_Os[0-9]+g[0-9]+.[0-9]+)/){
          my $gene_model=$1;
          $gene_model=~s/^\s*|\s*$//g;
         my $dbh=DBI->connect('dbi:mysql:senescencedb_dev2:192.168.118.78','peku','pekU@2018') 
or die "Cannot connect database\n";

          my $sqr1 = $dbh->prepare("select accesse_id from seq_genomic where gene_model='$gene_model' ");
          my $sqr2 = $dbh->prepare("select accesse_id from seq_cdna where gene_model='$gene_model' ");
          my $sqr3 = $dbh->prepare("select accesse_id from seq_cds where gene_model='$gene_model' ");
          my $sqr4 = $dbh->prepare("select accesse_id from  seq_pep  where gene_model='$gene_model' ");
          $sqr1->execute();
          $sqr2->execute();
          $sqr3->execute();
          $sqr4->execute();

          my @ref1 = $sqr1->fetchrow_array();
          my @ref2 = $sqr2->fetchrow_array();
          my @ref3 = $sqr3->fetchrow_array();
          my @ref4 = $sqr4->fetchrow_array();

          if($ref1[0] ne ""){
            $line=~s/^(LOC_Os[0-9]+g[0-9]+.[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref1[0] target=_blank>$1<\/a>/;
          }
          elsif($ref2[0] ne ""){
            $line=~s/^(LOC_Os[0-9]+g[0-9]+.[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref2[0] target=_blank>$1<\/a>/;
          }
          elsif($ref3[0] ne ""){
            $line=~s/^(LOC_Os[0-9]+g[0-9]+.[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref3[0] target=_blank>$1<\/a>/;
          }
          elsif($ref4[0] ne ""){
            $line=~s/^(LOC_Os[0-9]+g[0-9]+.[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref4[0] target=_blank>$1<\/a>/;
          }
       }

elsif($line=~/^(AC[0-9]+\.[0-9]+_FGT[0-9]+)/){
          my $gene_model=$1;
          $gene_model=~s/^\s*|\s*$//g;
          my $dbh=DBI->connect('dbi:mysql:senescencedb_dev2:192.168.118.78','peku','pekU@2018') 
or die "Cannot connect database\n";

          my $sqr1 = $dbh->prepare("select accesse_id from seq_genomic where gene_model='$gene_model' ");
          my $sqr2 = $dbh->prepare("select accesse_id from seq_cdna where gene_model='$gene_model' ");
          my $sqr3 = $dbh->prepare("select accesse_id from seq_cds where gene_model='$gene_model' ");
          my $sqr4 = $dbh->prepare("select accesse_id from  seq_pep  where gene_model='$gene_model' ");
          $sqr1->execute();
          $sqr2->execute();
          $sqr3->execute();
          $sqr4->execute();

          my @ref1 = $sqr1->fetchrow_array();
          my @ref2 = $sqr2->fetchrow_array();
          my @ref3 = $sqr3->fetchrow_array();
          my @ref4 = $sqr4->fetchrow_array();

          if($ref1[0] ne ""){
            $line=~s/^(AC[0-9]+\.[0-9]+_FGT[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref1[0] target=_blank>$1<\/a>/;
          }
          elsif($ref2[0] ne ""){
            $line=~s/^(AC[0-9]+\.[0-9]+_FGT[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref2[0] target=_blank>$1<\/a>/;
          }
          elsif($ref3[0] ne ""){
            $line=~s/^(AC[0-9]+\.[0-9]+_FGT[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref3[0] target=_blank>$1<\/a>/;
          }
          elsif($ref4[0] ne ""){
            $line=~s/^(AC[0-9]+\.[0-9]+_FGT[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref4[0] target=_blank>$1<\/a>/;
          }
       }


elsif($line=~/^([A-Z]+_?[0-9]+\.[0-9]+)/){
          my $gene_model=$1;
          $gene_model=~s/^\s*|\s*$//g;
          my $dbh=DBI->connect('dbi:mysql:senescencedb_dev2:192.168.118.78','peku','pekU@2018') 
or die "Cannot connect database\n";

          my $sqr1 = $dbh->prepare("select accesse_id from seq_genomic where gene_model='$gene_model' ");
          my $sqr2 = $dbh->prepare("select accesse_id from seq_cdna where gene_model='$gene_model' ");
          my $sqr3 = $dbh->prepare("select accesse_id from seq_cds where gene_model='$gene_model' ");
          my $sqr4 = $dbh->prepare("select accesse_id from  seq_pep  where gene_model='$gene_model' ");
          $sqr1->execute();
          $sqr2->execute();
          $sqr3->execute();
          $sqr4->execute();

          my @ref1 = $sqr1->fetchrow_array();
          my @ref2 = $sqr2->fetchrow_array();
          my @ref3 = $sqr3->fetchrow_array();
          my @ref4 = $sqr4->fetchrow_array();

          if($ref1[0] ne ""){
            $line=~s/^([A-Z]+_?[0-9]+\.[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref1[0] target=_blank>$1<\/a>/;
          }
          elsif($ref2[0] ne ""){
            $line=~s/^([A-Z]+_?[0-9]+\.[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref2[0] target=_blank>$1<\/a>/;
          }
          elsif($ref3[0] ne ""){
            $line=~s/^([A-Z]+_?[0-9]+\.[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref3[0] target=_blank>$1<\/a>/;
          }
          elsif($ref4[0] ne ""){
            $line=~s/^([A-Z]+_?[0-9]+\.[0-9]+)/<a href=\.\.\/get_gene_detail.php?AI=$ref4[0] target=_blank>$1<\/a>/;
          }
       }

print "$line";
}



