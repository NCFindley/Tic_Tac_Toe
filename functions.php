<?php 

#This functions checks number of turns greater then 6 and calls all the win functions. 

function checkwinner($xopos,$numturn){

	if ($numturn >= 6){

		if (checkhor($xopos) != "no winner") {
			return checkhor($xopos);
			}elseif (checkver($xopos) != "no winner") {
				return checkver($xopos);
				}elseif (checkdiag($xopos) != "no winner") {
					return checkdiag($xopos);
				}elseif ($numturn == 10) {
					return "Tie Game";
				}
	}
	return "no winner";	
}

#This will give string to output to header one. It'll display either the number of turns and who turn it is or the winner. 
function headerdisplay($winner,$whoturn,$numturn, $winplayer, $playerturn){


	if ($winner == "no winner") {
		return "It is Turn Number " . $numturn . " and " . $playerturn . " turn as letter " . $whoturn;

	}elseif ($winner != "Tie Game") {

		return "Congratulations " . $winplayer . " You are the winner";

	}
}

#Return which player won the game. 
function winplayer($whoturn,$whoisx,$whoiso){

	if ($whoturn == "x") {
		$winplayer = $whoiso;
	}elseif ($whoturn == "o") {
		$winplayer = $whoisx;
	}

	return $winplayer;

}

function playerturn($whoturn,$whoisx,$whoiso){

	if ($whoturn == "x") {
		$playerturn = $whoisx;
	}elseif ($whoturn == "o") {
		$playerturn = $whoiso;
	}

	return $playerturn;


}
#This will declare Player one as x for first game. 
function changewhoisx ($whoisx){

	if ($whoisx == "" || $whoisx == "Player 2") {
			return "Player 1";
		}elseif ($whoisx == "Player 1") {
			return "Player 2";
		}
}

function changewhoiso ($whoiso) {

if ($whoiso == "" || $whoiso == "Player 1") {
			return "Player 2";
		}elseif ($whoiso == "Player 2") {
			return "Player 1";
		}

}
#This function checks for winner horizontially. The x variable is increased by 3 for index of 0,3,6 for starting position to find three in row. 
function checkhor($xopos){

	$x = 0;
	$y = 3;
	
	while ( $x < 8) {
	
		if (substr($xopos,$x,$y) == "xxx") {

			return "x";

			}elseif (substr($xopos,$x,$y) == "ooo") {

				return "o";	
			
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
			return "x";
		}elseif ($strwin == "ooo") {
			return "o";
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
				return "x";
			}elseif ($strwin == "ooo") {
				return "o";
			}
			$y = 2;
			$n +=1;
			$x = 2;

	}
		
	return "no winner";
}

#This function display X, O images or link with all variables to be passed to next page. 
function display($i,$xopos,$numturn,$whoturn,$player1wins,$player2wins,$whoisx,$whoiso){

	if ($xopos[$i]== "x") {

			echo '<img src = "images/x.png" class = "symbol__x">';
		}elseif ($xopos[$i] == "o") {
			echo '<img src = "images/o.png" class = "symbol__o">';
		}else{
			$link =  '<a href = "index.php?newxo=' . strval($i) . "&xopos=" . $xopos . "&numturn=" . $numturn . "&whoturn=" . $whoturn . "&player1wins=" . $player1wins . "&player2wins=" . $player2wins . "&whoisx=" . $whoisx . "&whoiso=" . $whoiso .'" class = symbol__blank>#</a>';
			echo $link;
		}

		
}

function addSymbol ($newxo,$xopos,$whoturn){

		$xopos[$newxo] = $whoturn;
	
		return $xopos;
}

function changeTurn ($whoturn){
	
	if ($whoturn == "x"){
		return "o";
	}
	else {
		return "x";
	}
}

?>



