<?php

// Power function to return value of a ^ b mod P
function ModPower($a,$b,$p){
	if($b===1)
		return $a;
	else
		return pow($a,$b)%$p;

}


$p=23; // A prime number P is taken
$G=9;  // A primitve root for P, G is taken
$a=4;   // Alice will choose the private key a 
$x = ModPower($G, $a, $p);  // gets the generated key
$b=3;  // Bob will choose the private key b

$y = ModPower($G, $b, $p);  // gets the generated key
echo $ka = ModPower($y, $a, $p); // Secret key for Alice
echo "<br>";
echo $kb = ModPower($x, $b, $p); // Secret key for Bob

?>