<?php

$msg="Cryptography and Network Security";
$offset=2;
$letters="ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 

function encrypt($msg,$offset){
	$letters="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $en_text='';
    for($i=0;$i<strlen($msg);$i++){
    	if(ctype_upper($msg{$i})){
    	$code=ord($msg{$i});
    	$code=fmod(($code+$offset-65),26)+65;
    	$en_text.=chr($code);
      }else{
      	$code=ord($msg{$i});
    	$code=fmod(($code+$offset-97),26)+97;
    	$en_text.=chr($code);
      }
    }

	return $en_text;
}

function BruteForce($msg){
	$msg=strtoupper($msg);
  $letters="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  for ($i = 0; $i < strlen($letters); $i++) {
  	$result='';
  	for ($j = 0; $j <strlen($msg); $j++) {
  		if(strpos($letters,$msg{$j}) >=0){
  			$num=strpos($letters,$msg{$j});
  			$num=$num-$i;
  			if($num<0){
  				$num+=strlen($letters);
  			}
  			$result.=$letters{$num};
  		}else{
  			$result.=$msg{$j};
  		}
  	}

  	echo "#".$i."--".$result."<br>";
  }
}


$en_msg=encrypt($msg,$offset);
printf("Encrypt Message: %s<br>",$en_msg);
BruteForce($en_msg);




  ?>