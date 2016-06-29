<?php 

function newGame(){
	
	$arr = array();

	$_SESSION["array"] = $arr;
	$_SESSION["player"] = "x";
	$_SESSION["turn"] = 0;

}

function display($i){

	$addarray = $_SESSION["array"];

	$player = $_SESSION["player"];

	if ($addarray[$i] == "x") {

			echo '<img src = "images/x.png" id = "symbol">';
		}elseif ($addarray[$i] == "y") {
			echo '<img src = "images/o.png" id = "symbol">';
		}else{
			#echo '<img src = "images/o.png" id = "symbol">';
			$url =  '<a href = "index.php?symbol=' . strval($i) . '">Occupy</a>';
			echo $url;
		}

		
}

function addSymbol ($sympos){

	$addarray = $_SESSION["array"];
	$player = $_SESSION["player"];

	if ($player == "x") {
		$addarray[$sympos] = "x";
		$_SESSION["player"] = "y";
	}elseif ($player == "y"){
		$addarray[$sympos] = "y";
		$_SESSION["player"] = "x";
	}
	
	$_SESSION["array"] = $addarray;
}


?>



