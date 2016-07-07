<!DOCTYPE html>
<html>
<link type="text/css" rel="stylesheet" href="stylesheet.css">
<?php 

	$myFile = "history.txt";
	$fh = fopen($myFile, 'r') or die("Can't open file");

	include("functions.php"); 
#Array Order from file
# $xopos, $newxo, $numturn, $player1wins, $player2wins, $whoturn, $whoisx, $whoiso, $tiewins, $comp, $compturn


	$lines = file($myFile, FILE_IGNORE_NEW_LINES);

	$xopos = $lines[0];
	$numturn = $lines[1];
	$player1wins = $lines[2];
	$player2wins = $lines[3];
	$whoturn = $lines[4];
	$whoisx= $lines[5];
	$whoiso = $lines[6];
	$tiewins = $lines[7];
	$comp = $lines[8];
	$compturn = $lines[9];

	



	fclose($fh);

	$newxo = $_GET["newxo"];

/*
	#Get variables from previous turn
	$xopos = $_GET["xopos"]; #Length of 9 of 0 and replacing with x or o if cell is selected. 
	$newxo = $_GET["newxo"]; #Index position to replace with  or o in xopos
	$numturn = $_GET["numturn"];
	$player1wins = $_GET["player1wins"];
	$player2wins = $_GET["player2wins"];

	$whoturn = $_GET["whoturn"];
	$whoisx = $_GET["whoisx"];
	$whoiso = $_GET["whoiso"];

	$tiewins = $_GET["tiewins"];
	$comp = $_GET["comp"];
	$compturn = $_GET["compturn"];

	*/

	$prevturn = $whoturn;

	#Determines if its game first round and initialize variables. Else change person turn and add x/o choice.
	if ($xopos == "") {
			$xopos = "000000000";
			$numturn = 1;
			$whoturn = "x";
			$whoisx = changewhoisx($whoisx);
			$whoiso = changewhoiso($whoiso);
			$prevturn = "o";
		}else{
			$xopos = addSymbol($newxo,$xopos,$whoturn);
			$whoturn = changeTurn($whoturn);
			$numturn += 1;
		}


	$winner = checkwinner($xopos,$numturn);

	if ($comp == "yes" && $winner == "no winner"){
		if ($numturn > 1 && $numturn < 10) {
			$xopos = compAdd($xopos,$whoturn);
			$whoturn = changeTurn($whoturn);
			$numturn += 1;
		}
			
	}

	$winner = checkwinner($xopos,$numturn);
	$winplayer = winplayer($whoturn,$whoisx,$whoiso);
	$prevplayer = winplayer($prevturn,$whoisx,$whoiso);
	$display = headerdisplay($winner,$whoturn,$numturn,$winplayer, $prevturn,$prevplayer);

	#Increase count for winner
				

	$tiewins = findWinner($winner,$tiewins);
	$player1wins = findWinner($winner,$player1wins);
	$player2wins = findWinner($winner,$player2wins);
?>

<head>
	<title></title>
</head>
<body>
	<h1>Time for Tic Tac Toe!</h1>
	<h2><?php echo $display . " Test" . $newxo; ?></h2>
		<dir>
				
			
			<?php
				# Display X or O on board
				$i = 0;

				while ($i < 9) {

					$x = 0; ?>
					<div class = "row"> 
					 <?php

				#Create each cell

					while ($x < 3) { ?> 
						<div class = "cell">
							<?php 
							$query = query($i,$xopos,$numturn,$whoturn,$player1wins,$player2wins,$whoisx,$whoiso,$tiewins,$comp,$compturn);
							echo display($i,$xopos,$winner,$query);

							$i +=1;
							$x +=1; ?>
						</div> <?php

					}
				?> </div>
				<?php 

				} ?>

				
		</dir>	
		<div>

			<?php


			$fh = fopen($myFile, 'w') or die("Can't open file");

				fwrite($fh, $xopos . "\n");
				fwrite($fh, $numturn . "\n");
				fwrite($fh, $player1wins . "\n");
				fwrite($fh, $player2wins . "\n");
				fwrite($fh, $whoturn . "\n");
				fwrite($fh, $whoisx . "\n");
				fwrite($fh, $whoiso . "\n");
				fwrite($fh, $tiewins . "\n");
				fwrite($fh, $comp . "\n");
				fwrite($fh, $compturn . "\n");


			
				fclose($fh);

			?>
			<ol class = "results__list">
				<p> Player 1 Wins: <?php echo $player1wins;  ?></p>
				<p> Player 2 Wins: <?php echo $player2wins;  ?></p>
				<p> Tie Games: <?php echo $tiewins;  ?></p>
				<li> <a href="index.php?comp=yes"> Vs Computer?</li>
				<li> <a href= <?php toNewGame($player1wins, $player2wins,$tiewins)    ?>> New Game</a></li>
				<li> <a href="index.php"> Reset</a></li>
			</ol>
			
		</div>
</body>
</html>