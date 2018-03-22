<!-- HTML file that displays different scopings in PHP -->
<!-- Created for Bilkent University Fall 2017 CS315 Homework 1 -->
<!-- Berat Biçer, 21503050, Section 3 -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sample Webpage for Displaying Different Scoping Rules in PHP</title>
	</head>

	<body>
		<center>
			<h1>Sample Webpage for Displaying Different Scoping Rules in PHP</h1>
		</center>
<?php
# In PHP, variables are not inherited from parent closures: each variable is visible in its own closure by default
echo "\n		<pre>\n";
$a = 0; # global a
$b = 1; # global b
$c = 2; # global c

function f1($c) { # Expands c of global's scope into f1's scope
	$a = 10; # local a
	global $b; # use global b
	echo "In f1: \$a = $a, \$b = $b & \$c = $c\n";
	
	function f11($b, $a) { # Accepts $b as a parameter
		$c = $GLOBALS["c"]; # use global c
		echo "In f11: \$a = $a, \$b = $b & \$c = $c\n";
		echo "In f11-2: \$a = $a, \$b = $b & \$c = $GLOBALS["c"]\n";
		
		function f111(){
			# echo "In f1: \$a = $a, \$b = $b & \$c = $c" --> Would give an error since we're trying to access nondefined variables for f111's scope
			$a = function () { # closure, a local variable
				global $a; # global a
				$c = 111; # local c
				echo "In anonymous-1 of f111: \$a = $a, \$b = $GLOBALS["b"] & \$c = $c\n"; # use global b
				return $c;
			};
			
			# $a() returns 111 atm
			
			$b = function () use ($a) { # closure, use statement expands the scope of a and allows it to be used in anonymous-2
				global $b; # global b
				$c = 676; # local c
				echo "In anonymous-2 of f111: \$a = ". $a() . " \$b = $b & \$c = $c\n";
				return $c;
			};
			
			# $b() returns 676
			
			$c = function () use ($b) { # closure
				global $a; # global a
				$c = 45; # local c
				echo "In anonymous-3 of f111: \$a = $a, \$b = " . $b() . " & \$c = $c\n";
				return $c;
			};
			
			# $c() returns 45
			
			echo "In f111: \$a = ". $a() . " \$b = " . $b() . " & \$c = " . $c() . "\n";
		}
		
		f111();
	}
	f11($b, $a);
	f2($c);
}

function f2($c) { # $c is c from f1, which is global c
	# echo "In f2-1: \$a = $a, \$b = $b & \$c = $c\n"; --> Error since a & b are not defined atm
	$a = 9174; # local a
	echo "In f2-2: \$a = $a, \$b = $GLOBALS["b"] & \$c = $c\n";
}

f1($c);
echo "In main: \$a = $a, \$b = $b & \$c = $c\n		</pre>\n";
?>
	</body>
</html>
