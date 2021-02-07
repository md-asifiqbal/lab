<?php 

function gcd($a,$b){
	if($b==0)
		return $a;
	else
		return gcd($b,$a % $b);
}
 $p=17;
 $q=11;
 $n=$p*$q;
 $phi=($p-1)*($q-1);
 $e=2;
 while ($e<$phi) {
     if(gcd($e,$phi)==1)
     	break;
     else
     	$e++;
 }
 $k=2;
 $d=(1+($k*$phi))/$e;

 echo "d=".$d;
echo "<br>"; 
echo "e=".$e;
echo "<br>";
$msg=88;

$C=fmod(pow($msg,$e),$n);
echo "C=".$C;
echo "<br>";

$D=fmod(pow($C,$d),$n);
echo "<br>";
echo "D=".$D;
echo "<br>";


 ?>