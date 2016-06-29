<?php 

function checkwinner($xopos,$numturn){

	if ($numturn >= 6){

		if (checkhor($xopos) != "no winner") {
			return checkhor($xopos);
			}elseif (checkver($xopos) != "no winner") {
				return checkver($xopos);
				}elseif (checkdiag($xopos) != "no winner") {
					return checkdiag($xopos);
				}
	}
	return "no winner";	
}

function checkhor($xopos){

	$x = 0;
	$y = 3;
	
	while ( $x < 8) {
	
		if (substr($xopos,$x,$y) == "xxx") {

			return "Player X is the Winner";

			}elseif (substr($xopos,$x,$y) == "ooo") {

				return "Player O is the Winner";	
			
			}
		$x += 3;
	}

return "no winner";
}

#This function checks for winner vertically. Variable n is used to loop through each column (3). The x variable is used to determine what index in string to add to $strwin. Variable i used only add three character to string. 


function checkver($xopos){

	
	$n = 0;
	
	while ($n < 3) {

		$x = $n;
		$strwin = "";
		$i = 0;

		while ( $i < 3) {

		$strwin .= $xopos[$x];
		$x += 3;
		$i += 1;
		}

		if ($strwin == "xxx") {
			return "Player X is the Winner";
		}elseif ($strwin == "ooo") {
			return "Player O is the Winner";
		}
		$n += 1;
	}

	return "no winner";



}

function checkdiag($xopos){

	$x = 0;
	$y = 4;
	$n = 0;


	while ( $n < 2 ) {
		$strwin = "";
		$i = 0;

		while ( $i < 3) {
			$strwin .= $xopos[$x];
			$i +=1;
			$x +=$y;
		}
			if ($strwin == "xxx") {
				return "Player X is the Winner";
			}elseif ($strwin == "ooo") {
				return "Player O is the Winner";
			}
			$y = 2;
			$n +=1;
			$x = 2;

	}
		
	return "no winner";
}


function display($i,$xopos,$numturn){



	if ($xopos[$i]== "x") {

			echo '<img src = "images/x.png" class = "symbol__x">';
		}elseif ($xopos[$i] == "o") {
			echo '<img src = "images/o.png" class = "symbol__o">';
		}else{
			$link =  '<a href = "index.php?newxo=' . strval($i) . "&xopos=" . $xopos . "&numturn=" . $numturn . '" class = symbol__blank>#</a>';
			echo $link;
		}

		
}

function addSymbol ($newxo,$xopos,$whoturn){

		$xopos[$newxo] = $whoturn;
	
		return $xopos;
}

function changeTurn ($numturn){
	
	if ($numturn % 2 == 0){
		$whoturn = "o";
	}
	else {
		$whoturn = "x";
	}
	return $whoturn;
}

?>



