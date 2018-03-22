# Perl Scoping
# Berat Biçer, 21503050, Section 3
# 22.11.2017

# Demonstrates different scoping mechanisms in Perl
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

print "$print\n";
