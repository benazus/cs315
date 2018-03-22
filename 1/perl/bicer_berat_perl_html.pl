# Perl Scoping
# Berat Biçer, 21503050, Section 3
# 22.11.2017
use CGI;

# Demonstrates different scoping mechanisms in Perl

# The subroutine &ReadParse" (from the external utility program cgi-lib.pl) gets the data that was just submitted and makes it available to you.  For instance  $in{first_name}  has the first name.
CGI::ReadParse();
 
# The subroutine  "&PrintHeader"  (also from cgi-lib.pl)  is essential to print output to the user's screen.
CGI::PrintHeader();

$a = 1; # global a
$b = 2; # global b
$c = 3; # global c

sub function1{
	my $a = 4; # creates lexical scoped variable a
	local $b = 5; # creates dynamically scoped variable b
	local $c = 6; # creates dynamically scoped variable b
	$function1 = "In function1: \$a = $a, \$b = $b, \$c = $c\n"; 
	function2();	
}

sub function2{
	$function2 = "In function2: \$a = $a, \$b = $b, \$c = $c\n";	
	function3();
}

sub function3(){
	my $c = 123; # creates a dynamically scoped variable c
	$function3 =  "In function3: \$a = $a, \$b = $b, \$c = $c\n";
}

function1(); # call 1
$print = "Execution 1 ::\n $function1 $function2 $function3 In main-1: \$a = $a, \$b = $b, \$c = $c\n\n";

function2(); # call 2
$print = "$print Execution 2 ::\n $function2 $function3 In main-2: \$a = $a, \$b = $b, \$c = $c\n\n";


function3(); # call 3
$print = "$print Execution 3 ::\n $function3 In main-3: \$a = $a, \$b = $b, \$c = $c";

# Prints the output to a HTML file
print <<"birat"; # Prints through the line with alice
<html>
	<body style="background-color: white;">
		<center>
			<H2>Perl Output</H2>
		</center>
	
		<pre>
$print
		</pre>
	</body>
</html>
birat
