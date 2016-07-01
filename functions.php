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
function headerdisplay($winner,$whoturn,$numturn, $winplayer, $prevturn,$prevplayer){


	if ($winner == "no winner") {
		return "It is Turn Number " . $numturn . " and " .$prevplayer . " turn as letter " . ucfirst($whoturn);

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

#This will declare Player one as x and rotate who x is for each game.
function changewhoisx ($whoisx){

	if ($whoisx == "" || $whoisx == "Player 2") {
			return "Player 1";
		}elseif ($whoisx == "Player 1") {
			return "Player 2";
		}
}

#This will declare Player two as o and rotate who o is for each game.

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

#check for winner diagonally. 
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
function display($i,$xopos,$winner,$query){


		if ($xopos[$i]== "x") {

				echo '<img src = "images/x.png" class = "symbol__x">';
			}elseif ($xopos[$i] == "o") {
				echo '<img src = "images/o.png" class = "symbol__o">';
			}elseif ($winner == "no winner"){
				echo $query;
			}	
}

#Query containing variables for next page. 
function query($i,$xopos,$numturn,$whoturn,$player1wins,$player2wins,$whoisx,$whoiso,$tiewins,$comp,$compturn){

	return '<a href = "index.php?newxo=' . $i . "&xopos=" . $xopos . "&numturn=" . $numturn . "&whoturn=" . $whoturn . "&player1wins=" . $player1wins . "&player2wins=" . $player2wins . "&whoisx=" . $whoisx . "&whoiso=" . $whoiso . "&tiewins=" . $tiewins . "&comp=" . $comp . "&compturn=" . $compturn . '"class = symbol__blank>#</a>';
}





#Replace string position with either x or o depending on $whoturn.
function addSymbol ($newxo,$xopos,$whoturn){

		$xopos[$newxo] = $whoturn;
	
		return $xopos;
}

#Change from x to o each turn. 
function changeTurn ($whoturn){
	
	if ($whoturn == "x"){
		return "o";
	}
	else {
		return "x";
	}
}

#Pass variable to new Game. This include Plalyer win count and ties.
function toNewGame($player1wins, $player2wins, $tiewins){

	echo '"index.php?player1wins=' . $player1wins . "&player2wins=" . $player2wins . "&tiewins=" . $tiewins .'"';
}


#Add Computer choice to the Array
function compAdd($xopos,$whoturn){


	if ($xopos[4] == "0"){

		return addSymbol (4,$xopos,$whoturn);
	}elseif ($xops[6] == "0") {
		return addSymbol (6,$xopos,$whoturn);
	}elseif ($xops[2] == "0") {
		return addSymbol (0,$xopos,$whoturn);
	}elseif ($xops[0] == "0") {
		return addSymbol (6,$xopos,$whoturn);
	}elseif ($xops[8] == "0") {
		return addSymbol (8,$xopos,$whoturn);
	}else{
		return compRandom($xopos,$whoturn);
	}

}

function compRandom($xopos, $whoturn){

	$choice = "no";

	while ($choice == "no") {

		$rand = rand(0,8);
		if ($xopos[$rand] == "0") {
			return addSymbol($rand,$xopos,$whoturn);
			$choice = "yes";
		}
	}
}



?>



