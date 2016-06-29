<?php 

function newGame(){
	
	

	

}


function display($i,$xopos,$whoturn){



	if ($xopos[$i]== "x") {

			echo '<img src = "images/x.png" class = "symbol__x">';
		}elseif ($xopos[$i] == "o") {
			echo '<img src = "images/o.png" class = "symbol__o">';
		}else{
			$link =  '<a href = "index.php?newxo=' . strval($i) . "&whoturn=" . $whoturn . "&xopos=" . $xopos . '" class = symbol__blank>#</a>';
			echo $link;
		}

		
}

function addSymbol ($newxo,$xopos,$whoturn){

	
		$xopos[$newxo] = $whoturn;
	
		return $xopos;
}

function changeTurn ($whoturn){
	
	if ($whoturn == "o"){
		$whoturn = "x";
	}
	elseif ($whoturn == "x") {
		$whoturn = "o";
	}
	return $whoturn;
}

?>



