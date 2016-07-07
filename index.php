<!DOCTYPE html>
<html>
<link type="text/css" rel="stylesheet" href="stylesheet.css">
<?php 

	$myFile = "current.txt";
	$myHistory = "history.txt";
	

	include("functions.php"); 
#Array Order from file
# $xopos, $newxo, $numturn, $player1wins, $player2wins, $whoturn, $whoisx, $whoiso, $tiewins, $comp, $compturn

	$newGame = $_GET["newGame"];
	$gamenum = $_GET["gamenum"];


	if ($gamenum != "") {

		$fh = fopen($myHistory, 'r') or die("Can't open file");

		$lines = file($myHistory, FILE_IGNORE_NEW_LINES);

		$lines = array_slice($lines, $gamenum,4);
			$xopos = $lines[0];
			$tempnumturn = $lines[1];
			$tempwinner = $lines[2];
			$tempwinplayer = $lines[3];
		
		
		fclose($fh);

	}elseif ($newGame == "yes") {
		$fh = fopen($myFile, 'w') or die("Can't open file");
		fclose($fh);
	}else{

		#Array Order from file
		# $xopos, $newxo, $numturn, $player1wins, $player2wins, $whoturn, $whoisx, $whoiso, $tiewins, $comp, $compturn
		$fh = fopen($myFile, 'r') or die("Can't open file");
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

	}

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
		}elseif ($gamenum == "") {
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

	if ($gamenum != "") {
		$numturn = $tempnumturn;
		$winner = $tempwinner;
		$winplayer = $tempwinplayer;
	}

	$display = headerdisplay($winner,$whoturn,$numturn,$winplayer, $prevturn,$prevplayer);

	#Increase count for winner
				

	$tiewins = winTie($winner,$winplayer,$tiewins);
	$player1wins = winPlayer1($winner,$winplayer,$player1wins);
	$player2wins = winPlayer2($winner,$winplayer,$player2wins);
?>

<head>
	<title></title>
</head>
<body>
	<h1>Time for Tic Tac Toe!</h1>
	<h2><?php echo $display;?></h2>
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


				if ($winner != "no winner") {
					$fh = fopen($myHistory, 'a') or die("Can't open file");

					fwrite($fh, $xopos . "\n");
					fwrite($fh, $numturn - 1 . "\n");
					fwrite($fh, $winner . "\n");
					fwrite($fh, $winplayer . "\n");

					fclose($fh);

					$fh = fopen($myFile, 'w') or die("Can't open file");
					fclose($fh);

				}else{
					$fh = fopen($myFile, 'w') or die("Can't open file");

					fwrite($fh, $xopos . "\n");
					fwrite($fh, $numturn  . "\n");
					fwrite($fh, $player1wins . "\n");
					fwrite($fh, $player2wins . "\n");
					fwrite($fh, $whoturn . "\n");
					fwrite($fh, $whoisx . "\n");
					fwrite($fh, $whoiso . "\n");
					fwrite($fh, $tiewins . "\n");
					fwrite($fh, $comp . "\n");
					fwrite($fh, $compturn . "\n");


			
					fclose($fh);
				}
			

			?>
			<ol class = "results__list">
				<p> Player 1 Wins: <?php echo $player1wins;  ?></p>
				<p> Player 2 Wins: <?php echo $player2wins;  ?></p>
				<p> Tie Games: <?php echo $tiewins;  ?></p>
				<li> <a href="index.php?comp=yes"> Vs Computer?</li>
				<li> <a href= <?php toNewGame($player1wins, $player2wins,$tiewins)    ?>> New Game</a></li>
				<li> <a href="index.php?newGame=yes"> Reset</a></li>
			</ol>
			
			<ol>

				<?php 
					$i = 0;
					$x = 1;
					$historyLines = file($myHistory, FILE_IGNORE_NEW_LINES);
					while ($i  < count($historyLines)) { ?>

						<li> <a href = "index.php?gamenum=<?php echo $i; ?>">Game <?php echo $x; ?></a>
						<?php
						$x += 1;
						$i +=4;
						
					}


				?>



			</ol>
		</div>
</body>
</html>