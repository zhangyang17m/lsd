use DBI;
my $dbh=DBI->connect("dbi:mysql:arabHormoneMutant","pengzy",'pengzy@cbi2007') or die "Cannot connect database\n";

#&output_seq("seq_cds");
&output_seq("seq_cdna");
&output_seq("seq_up1k");
&output_seq("seq_down1k");
&output_seq("seq_pep");



sub output_seq{
    ($table) = @_;
    my $sth = $dbh->prepare("select distinct locus_name,seq from $table where locus_name IN (select distinct locus_name from gene_hormone_info);");

    $sth->execute;
    my $arref = $sth->fetchall_arrayref;

    # out put result;
    open OUT,">$table"||die;
    foreach(@$arref){
	print OUT ">$_->[0]\n$_->[1]\n";
    }
    close OUT||die;
}






