<?php

function makeArray($a){
	
	$eq=array();
	 $eq=explode("+",$a);
	
	for ($i = 0; $i < count($eq); $i++) {
		$pos=strchr($eq[$i],'x');
		if($pos){
		$index=preg_replace("/[^-0-9]+/", '', $pos);
		 $value=(int)str_replace($pos,'',$eq[$i]);
		 if($value==0)
		 	$value=1;
		$output[$index]=$value;
	}else{
		$output[0]=preg_replace("/[^-0-9]+/", '', $eq[$i]);
	}
	}
	return $output;
}


function add($a,$b){
	 foreach ($a as $key=>$val) {
	 	$c1=$key;
	 }
	 foreach ($b as $key=>$val) {
	 	$c2=$key;
	 }
	 $count=$c1>$c2?$c1:$c2;
	 $output='';
	 for ($i = 0; $i <= $count; $i++) {
	 	if(array_key_exists($i,$a))
	 		$r1=$a[$i];
	 	else
	 		$r1=0;

	 	if(array_key_exists($i,$b))
	 		$r2=$b[$i];
	 	else
	 		$r2=0;

	 	$sum=$r1+$r2;
	 	if($sum==1)
	 		$p='+x^'.$i;
	 	else
	 		$p='+'.$sum.'x^'.$i;
	 	$output.=$p;

	 }
	 $output=str_replace("x^0","",$output);
	 $output=str_replace("x^1","x",$output);
	 return str_replace('+-','-',$output);

}

function sub($a,$b){
	 foreach ($a as $key=>$val) {
	 	$c1=$key;
	 }
	 foreach ($b as $key=>$val) {
	 	$c2=$key;
	 }
	 $count=$c1>$c2?$c1:$c2;
	 $output='';
	 for ($i = 0; $i <= $count; $i++) {
	 	if(array_key_exists($i,$a))
	 		$r1=$a[$i];
	 	else
	 		$r1=0;

	 	if(array_key_exists($i,$b))
	 		$r2=$b[$i];
	 	else
	 		$r2=0;

	 	$sum=$r1-$r2;
	    if($sum==0)
	 		$p='';
	 	else
	 		$p='+'.$sum.'x^'.$i;
	 	$output.=$p;

	 }
	 $output=str_replace("x^0","",$output);
	 $output=str_replace("x^1","x",$output);
	 return str_replace('+-','-',$output);

}


$a="2+x^2+x^3";
$a1=makeArray($a);
$b="1+-1x^1+x^2";
$b1=makeArray($b);

echo add($a1,$b1);
echo "<br>";
echo sub($a1,$b1);
echo "<br>";
?>