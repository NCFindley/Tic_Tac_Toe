<?php 

function newGame(){
	
	session_start();
	$arr = array();

	$_SESSION["array"]=$arr;

}

function display($i){

	$addarray = $_SESSION["array"];

	$player = $_SESSION["player"];

	if ($addarray[$i] == "x") {

			return '<img src = "images/x.png" id = "symbol">';
		}elseif ($addarray[$i] == "y") {
			echo '<img src = "images/o.png" id = "symbol">';
		}else{
			echo '<img src = "images/o.png" id = "symbol">';
			#$url =  '<a href = "index.php?symbol=' . strval($i) . '">';
			#echo $url;
		}

		
}

function addSymbol (){




	
}











?>



