#!/usr/bin/perl 

#use strict;
#use warnings;

use CGI qw(:standard);
use CGI::Carp qw(fatalsToBrowser warningsToBrowser carpout);

use lib qw(/mnt/webApplications/peku/lsd2/mail/);

use mailnotice;

use Digest::MD5 qw(md5 md5_hex md5_base64);

#($infile1,$infile2,$infile3)=@ARGV;
#use Getopt::Std;
use Getopt::Long;
use Getopt::Long qw(:config no_ignore_case bundling);
use vars qw($infile1  $infile2 $infile3);

GetOptions(

                "-s=s"   => \$infile1,
                "-c=s"  => \$infile2,
                "-e=s"   => \$infile3,

          ) ;

#print "content-type:text/plain\n\n";
my $usermail=$infile3;
$usermail=~s/^\s*|\s*$//g;



my $mailman = mailnotice->new(
               sendmail  => 'mailwhere.cbi.pku.edu.cn',
               mailhost  => 'mail.cbi.pku.edu.cn',
               mailauth  => 1,
               mailuser  => 'webnoticer',
               mailpass  => '1234$#@!',
              );


$mailman->notice(
       to       => 'lsdpku@gmail.com',
#       to       => 'lsdb@mail.cbi.pku.edu.cn',
       from     => 'lsdb_feedback@mail.cbi.pku.edu.cn',
       subject  => $infile1,
       message  => $infile2,
#       subject  => 'haha, comeback again$$'.md5_base64($$),
#       message  => 'message received, send by url: http://sapred.cbi.pku.edu.cn/sendmail.cgi'
      );

$mailman->finish();

if($usermail ne "" )
{
my $subject_name="Fwd:".$infile1;
my $content="Thank you very much for your comments:"."\n"."\n".$infile2;
#print "nonull";
my $mailman = mailnotice->new(
               sendmail  => 'mailwhere.cbi.pku.edu.cn',
               mailhost  => 'mail.cbi.pku.edu.cn',
               mailauth  => 1,
               mailuser  => 'webnoticer',
               mailpass  => '1234$#@!',
              );
$mailman->notice(
       to       => $usermail,
       from     => 'lsdpku@gmail.com',
#       from     => 'lsdb@mail.cbi.pku.edu.cn',
       subject  => $subject_name,
       message  => $content,
      );
$mailman->finish();

my $mailman = mailnotice->new(
               sendmail  => 'mailwhere.cbi.pku.edu.cn',
               mailhost  => 'mail.cbi.pku.edu.cn',
               mailauth  => 1,
               mailuser  => 'webnoticer',
               mailpass  => '1234$#@!',
              );
$mailman->notice(
#       to       => 'lsdb@mail.cbi.pku.edu.cn',
       to       => 'lsdpku@gmail.com',
       from     => $usermail,
       subject  => $infile1,
       message  => $infile2,
      );
$mailman->finish();


}
#my $ok=1;
#print "Send email successfully,Thanks for your feedback!\n";
#return $ok;
