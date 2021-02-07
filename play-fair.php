<?php
function encrypt($str,$key){
	$en_text="";
	 $matrix=matrix_generator(strtoupper($key));
	


	$str=strtoupper($str);
	$str=str_replace('J','I',$str);
	$str=str_replace(' ','',$str);
	for($i=1;$i<strlen($str);$i++){
		if($str{$i} == $str{$i-1}){
			$str=substr_replace($str,'X',$i,0);
		}
	}
	if(strlen($str)%2 !=0){
		$str.='Z';
	}
	$couples=str_split($str,2);
	foreach ($couples as $couple) {
		$en_couple="";
		$rows=array();
		$columns=array();
		for($i=0;$i<2;$i++){
			for($j=0;$j<5;$j++){
				
				if(in_array($couple{$i},$matrix[$j])){
					$rows[$i]=$j;
					$columns[$i]=array_search($couple{$i},$matrix[$j]);

					break;
				}
			}
		}
		if($columns[0]==$columns[1]){
			$en_couple=$matrix[($rows[0]+1)%5][$columns[0]].$matrix[($rows[1]+1)%5][$columns[1]];
		}
		else if($rows[0]==$rows[1]){
			$en_couple=$matrix[$rows[0]][($columns[0]+1)%5].$matrix[$rows[1]][($columns[1]+1)%5];
		}else{
			$en_couple=$matrix[$rows[0]][$columns[1]].$matrix[$rows[1]][$columns[0]];
		}
		$en_text.=$en_couple;
	}
	return $en_text;
}

function decrypt($str,$key){
	$de_text="";
	 $matrix=matrix_generator(strtoupper($key));
	$str=strtoupper($str);

	$couples=str_split($str,2);
	foreach ($couples as $couple) {
		$de_couple="";
		$rows=array();
		$columns=array();
		for($i=0;$i<2;$i++){
			for($j=0;$j<5;$j++){
				if(in_array($couple{$i},$matrix[$j])){
					$rows[$i]=$j;
					$columns[$i]=array_search($couple{$i},$matrix[$j]);
					break;
				}
			}
		}
		if($columns[0]==$columns[1]){
			$de_couple=$matrix[($rows[0]-1)<0?($rows[0]+4):($rows[0]-1)][$columns[0]].$matrix[($rows[1]-1)<0?($rows[1]+4):($rows[1]-1)][$columns[1]];
		}
		else if($rows[0]==$rows[1]){
			$de_couple=$matrix[$rows[0]][($columns[0]-1)<0?($columns[0]+4):($columns[0]-1)].$matrix[$rows[1]][($columns[1]-1)<0?($columns[1]+4):($columns[1]-1)];
		}else{
			$de_couple=$matrix[$rows[0]][$columns[1]].$matrix[$rows[1]][$columns[0]];
		}
		$de_text.=$de_couple;
	}
	return $de_text;
}

function matrix_generator($key){
	$matrix=array();
	$key=str_replace('J','I',$key);
	$key=str_replace(' ','',$key);
for($x=0;$x<5;$x++){
for($y=0;$y<5;$y++){
	if(empty($matrix[$x][$y])){
		$matrix[$x][$y]=9999999;
		
	}
}

}


	for($i=0;$i<strlen($key);$i++){
		if(ord($key{$i}) >=65 && ord($key{$i}) <=90){
			$found=false;
			for($j=0;$j<count($matrix);$j++){
				if(in_array($key{$i},$matrix[$j])){
					$found=true;
					break;
				}
			}
			if(!$found){
				$added=false;
				for($x=0;$x<5;$x++){
					for($y=0;$y<5;$y++){
						if($matrix[$x][$y]==9999999){
							$matrix[$x][$y]=$key{$i};
							$added=true;
							break;
						}
					}
					if($added){
						break;
					}
				}
			}
		}
	}




	for($i=0;$i<5;$i++){
	for($j=0;$j<5;$j++){
		if($matrix[$i][$j]==9999999){
			for($ch=65;$ch<=90;$ch++){
				if($ch==74){
					continue;

				}
				$found=false;
				
				for($x=0;$x<count($matrix);$x++){

					if(in_array(chr($ch),$matrix[$x])){
						$found=true;
						break;
					}
				}
				if(!$found){
					// echo chr($ch);
					// echo "<br>";
					$matrix[$i][$j]=chr($ch);
					break;
				}
			}
		}
	}
	

}


 for($i=0;$i<5;$i++){
			for($j=0;$j<5;$j++){
				echo $matrix[$i][$j];
				echo "\t";

			}
			echo "<br>";
		}

return $matrix;


}


$en= encrypt('instruments','Monarchy');
echo $en;
echo "<br>";
echo decrypt($en,'Monarchy');

 ?>