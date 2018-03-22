<!-- HTML file that displaying subprogram properties in PHP -->
<!-- Created for Bilkent University Fall 2017 CS315 Homework 2 -->
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
# Parameter Correspondance
$var1 = 679;
$var2 = "bErAt"; 
$var3 = "278kjndDSGUJmsdbkq-dsajb28kj";
$var4 = 882*4-2456;
$var5 = 673.52;

function paraCorr($a, $b, $c, $d, $e){
	echo "paraCorr: \$a = $a, \$b = $b, \$c = $c, \$d = $d, \$e = $e" . "<br/>";
}

paraCorr($var1, $var2, $var3, $var4, $var5);
paraCorr($var2, $var3, $var4, $var5, $var1);
paraCorr($var3, $var4, $var5, $var1, $var2);
paraCorr($var4, $var5, $var1, $var2, $var3);
paraCorr($var5, $var1, $var2, $var3, $var4);
echo "<br/><br/>";
# -----------------------------------------
# Formal Parameter Default Values
$var1 = 679;
$var2 = "bErAt"; 
$var3 = "278kjndDSGUJmsdbkq-dsajb28kj";
$var4 = 882*4-2456;
$var5 = 673.52;

function defPara($a ="berat", $b = "bicer", $c = "21503050", $d = "section3", $e = "cs315"){
	echo "defPara: \$a = $a, \$b = $b, \$c = $c, \$d = $d, \$e = $e" . "<br/>";
}

defPara();
defPara($var1);
defPara($var1, $var2);
defPara($var1, $var2, $var3);
defPara($var1, $var2, $var3, $var4);
defPara($var1, $var2, $var3, $var4, $var5);
echo "<br/>";
echo "<br/>";

# -----------------------------------------
# Variable Number of Actuals
# 1st Method: use an array of parameters
$var1 = 679;
$var2 = "bErAt"; 
$var3 = "278kjndDSGUJmsdbkq-dsajb28kj";
$var4 = 882*4-2456;
$var5 = 673.52;

function varArgArray($var){
	for($i = 0; $i < sizeof($var); $i++){
		echo "varArgArray: \$var$i = " . $var[$i] . "<br/>";
	}
}

# size = 1
$arr = [$var1];
varArgArray($arr);
echo "<br/>";
# size = 2
$arr = [$var1, $var2];
varArgArray($arr);
echo "<br/>";
# size = 3
$arr = [$var1, $var2, $var3];
varArgArray($arr);
echo "<br/>";
# size = 4
$arr = [$var1, $var2, $var3, $var4];
varArgArray($arr);
echo "<br/>";
# size = 5
$arr = [$var1, $var2, $var3, $var4, $var5];
varArgArray($arr);
echo "<br/>";

# 2nd Method: Use func_num_args, func_get_args, func_get_arg($i)
function varArgWithBuiltIn(){
	for($i = 0; $i < func_num_args(); $i++){
		echo "varArgWithBuiltIn: \$var$i = " . func_get_arg($i) . "<br/>";
	}
}

# empty arguments
varArgWithBuiltIn();
echo "<br/>";
# size = 1
$arr = [$var1];
varArgWithBuiltIn($var1);
echo "<br/>";
# size = 2
varArgWithBuiltIn($var1, $var2);
echo "<br/>";
# size = 3
varArgWithBuiltIn($var1, $var2, $var3);
echo "<br/>";
# size = 4
varArgWithBuiltIn($var1, $var2, $var3, $var4);
echo "<br/>";
# size = 5
varArgWithBuiltIn($var1, $var2, $var3, $var4, $var5);
echo "<br/>";
echo "<br/>";

# -----------------------------------------
# Parameter Passing Methods
# Remember pointer logic
class myObj {
	var $foo = 0;
	var $goo = 0;

	function setPara($var1, $var2){
		$this->foo = $var1;
		$this->goo = $var2;
	}
	
	function printData(){
		echo "printData: foo = " . $this->foo . "; goo = " . $this->goo;
	}
}

$var1 = "3663bdPl";

$var2 = "67hahUk";

$var3 = new myObj();
$var3->setPara("yI5/5kjdU7", 428);

$var4 = new myObj();
$var4->setPara("Dsa47j-is5M", 9371);

# Pass by Value
function paraPassDefault($a) {
	$a = 123;
	echo "paraPassDefault: \$a = $a";
	echo "<br/>";
}

# Pass by Reference
function paraPassReference(&$a) {
	$a = 456;
	echo "paraPassReference: \$a = $a";
	echo "<br/>";
}

# Dereference pointer
function paraPassDeref($a){
	$a->foo = "berat";
	$a->goo = "bicer";
	echo "paraPassDeref: ";
	$a->printData();
	echo "<br/>";
}

# New local object
function paraPassNewObj($a){
	$a = new myObj();
	$a->setPara("berat", "bicer");
	echo "paraPassNewObj: ";
	$a->printData();
	echo "<br/>";
}

# Default behavior: pass by value
echo "main of paraPassDefault before: \$var1 = $var1";
echo "<br/>";
paraPassDefault($var1);
echo "main of paraPassDefault after: \$var1 = $var1";
echo "<br/>"; echo "<br/>";

# Pass by reference forced by ”&”
echo "main of paraPassReference before: \$var2 = $var2"; 
echo "<br/>";
paraPassReference($var2);
echo "main of paraPassReference after: \$var2 = $var2"; 
echo "<br/>"; echo "<br/>";

# Dereferencing object, visible outside
echo "main of paraPassDeref before: \$var3->foo = $var3->foo; \$var3->goo = $var3->goo";
echo "<br/>";
paraPassDeref($var3);
echo "main of paraPassDeref after: \$var3->foo = $var3->foo; \$var3->goo = $var3->goo";
echo "<br/>"; echo "<br/>";

# New memory location for the pointer locally, old object is preserved
echo "main of paraPassNewObj before: \$var4->foo = $var4->foo; \$var4->goo = $var4->goo";
echo "<br/>";
paraPassNewObj($var4);
echo "main of paraPassNewObj after: \$var4->foo = $var4->foo; \$var4->goo = $var4->goo";
echo "<br/>"; echo "<br/>";
?>
	</body>
</html>
