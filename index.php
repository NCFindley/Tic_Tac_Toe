<!DOCTYPE html>
<html>
<link type="text/css" rel="stylesheet" href="stylesheet.css">
<?php 


	include("functions.php"); 

	#Get variables from previous turn
	$xopos = $_GET["xopos"];
	$newxo = $_GET["newxo"];
	$numturn = $_GET["numturn"];
	$player1wins = $_GET["player1wins"];
	$player2wins = $_GET["player2wins"];
	$whoturn = $_GET["whoturn"];
	$whoisx = $_GET["whoisx"];
	$whoiso = $_GET["whoiso"];
	$tiewins = $_GET["tiewins"];
	$comp = $_GET["comp"];
	$compturn = $_GET["compturn"];

	$prevturn = $whoturn;

	#Determines if its game first round and initialize variables. Else change person turn and add x/o choice.
	if ($xopos == "") {
			$xopos = "000000000";
			$numturn = 1;
			$whoturn = "x";
			$whoisx = changewhoisx($whoisx);
			$whoiso = changewhoiso($whoiso);
			$prevturn = $whoturn;
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
	$display = headerdisplay($winner,$whoturn,$numturn,$winplayer, $prevturn);
?>

<head>
	<title></title>
</head>
<body>
	<h1>Time for Tic Tac Toe!</h1>
	<h2><?php echo $display; ?></h2>
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

				#Increment count for winner
			
				if ($winner != "no winner") {
					if ($winner == "Tie Game") {
						$tiewins = intval($tiewins) + 1;
					}elseif ($winplayer == "Player 1") {	
						$player1wins = intval($player1wins) + 1;
					}elseif ($winplayer == "Player 2") {
						$player2wins = intval($player2wins) + 1;
					}
				}

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