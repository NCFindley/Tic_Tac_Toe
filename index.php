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

	#Determines if its game first round and initialize variables. Else change person turn and add x/o choice.
	if ($xopos == "") {
			$xopos = "000000000";
			$numturn = 1;
			$whoturn = "x";
			$whoisx = changewhoisx($whoisx);
			$whoiso = changewhoiso($whoiso);
		}else{
			$xopos = addSymbol($newxo,$xopos,$whoturn);
			$whoturn = changeTurn($whoturn);
			$numturn += 1;
		}


	$winner = checkwinner($xopos,$numturn);
	$winplayer = winplayer($whoturn,$whoisx,$whoiso);
	$playerturn = playerturn($whoturn,$whoisx,$whoiso);
	$display = headerdisplay($winner,$whoturn,$numturn,$winplayer, $playerturn);
?>

<head>
	<title></title>
</head>
<body>
	<h1>Time for Tic Tac Toe!</h1>
	<h2><?php echo $display ?></h2>

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
							<?php echo display($i,$xopos,$numturn,$whoturn,$player1wins,$player2wins,$whoisx,$whoiso); 
							$i +=1;
							$x +=1; ?>
						</div> <?php

					}
				?> </div>
				<?php 

				} ?>

				
		</dir>	
		<div>
			<ol class = "results__list">
				<p> Player 1 Wins: <?php echo $player1;  ?></p>
				<p> Player 2 Wins: <?php echo $player2;  ?></p>
				<li> <a href="index.php"> New Game</a></li>
				<li> <a href="index.php"> Reset</a></li>
			</ol>
			
		</div>
</body>
</html>