package mailnotice;

use strict;
use warnings;

use Exporter;
use vars qw(@ISA @EXPORT @EXPORT_OK $VERSION);

use Carp;
use Net::SMTP;

$VERSION = '0.01';

@ISA = qw(Exporter);
@EXPORT = qw();
@EXPORT_OK = qw();

=head

mailnotice::new

This subroutine is used to create a mailman object.

my $mailman = mailnotice->new(
                              sendhost => $sendhost, #show in email
                              mailhost => $mailhost, #mail server address
                              mailauth => $mailauth, # 0 for no, 1 for yes
                              mailuser => $mailuser, #used if mailauth == 1
                              mailpass => $mailpass, #password for user
                              timeout  => $timeout,
                              debug    => $debug,
                              );

      sendhost   : default localhost
      mailhost   : necessary
      mailauth   : 0
      mailuser   : username for auth
      mailpass   : password for auth
      timeout    : connection timeout, default 120
      debug      : default, 0.

=cut

sub new {
  my ($pkg, %param) = @_;
  my $class = ref($pkg) || $pkg;

  croak("Please input the mailhost with 'mailhost' => host\n")
    unless exists($param{mailhost});

  my $mailhost = $param{mailhost};

  my $sendhost = exists($param{sendhost}) ? $param{sendhost} : 'localhost';
  my $auth     = exists($param{mailauth}) ? $param{mailauth} : 0;
  my $mailuser = exists($param{mailuser}) ? $param{mailuser} : '';
  my $mailpass = exists($param{mailpass}) ? $param{mailpass} : '';
  my $timeout  = exists($param{timeout})  ? $param{timeout}  : 120;
  my $debug    = exists($param{debug})    ? $param{debug}    : 0;

  my $smtp = Net::SMTP->new($mailhost,
			    Hello     => $sendhost,
			    Timeout   => $timeout,
			    Debug     => $debug);

  if ($auth > 0) {
    $smtp->auth($mailuser, $mailpass);
  }

  my $self = {
	      'smtp'     => $smtp,
	     };

  bless $self, $class;

  return $self;
}

=head

mailnotice::notice

send notice message

mailman->notice(
                to       => 'abc@mmm.com',
                from     => 'xyz@nnn.com',
                subject  => 'I am subject',
                message  => 'msg send'
               );

=cut

sub notice {
  my ($self, %param) = @_;

  croak("Unknown to address.\n") unless exists($param{to});

  my $to      = $param{to};
  my $from    = exists($param{from}) ? $param{from} : 'webnoticer';
  my $subject = exists($param{subject}) ? $param{subject} : 'web notice message';
  my $message = exists($param{message}) ? $param{message} : 'ask admin for detail';

  my $smtp = $self->{smtp};

  $smtp->mail($from);
  $smtp->to($to);

  # Start the mail
  $smtp->data();

  # Send the header
  $smtp->datasend("To: $to\n");
  $smtp->datasend("From: $from:\n");
  $smtp->datasend("Subject: $subject\n");
  $smtp->datasend("\n");

  # Send the message
  $smtp->datasend("$message\n\n");

  # Send the termination string
  $smtp->dataend();
}

=head

mailnotice::finish

finish the notice

$mailman->finish();

=cut

sub finish {
  my ($self) = @_;
  my $smtp = $self->{smtp};
  $smtp->quit;
}


1;
