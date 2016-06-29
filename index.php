<!DOCTYPE html>
<html>
<link type="text/css" rel="stylesheet" href="stylesheet.css">
<?php 


	include("functions.php"); 

	#Get variables from previous turn
	$xopos = $_GET["xopos"];
	$newxo = $_GET["newxo"];
	$numturn = $_GET["numturn"];

	if ($xopos == "") {
			$xopos = "000000000";
			$numturn = 1;
		}else{
			
			$whoturn = changeTurn($numturn);
			$xopos = addSymbol($newxo,$xopos,$whoturn);
			$numturn += 1;
		}
	$whoturn = changeTurn($numturn);
?>

<head>
	<title></title>
</head>
<body>
	<h1>Time for Tic Tac Toe!</h1>
	<h2>Turn <?php echo $numturn . " " . $whoturn ?></h2>

		<dir>
			<?php 

				$winner = checkwinner($xopos,$numturn);

				if ($winner != "no winner") {

					?> 
					<h1><?php echo $winner; ?></h1><?php
				}

				# Display X or O on board
				$i = 0;

				while ($i < 9) {

					$x = 0; ?>
					<div class = "row"> 
					 <?php

				#Create each cell

					while ($x < 3) { ?> 
						<div class = "cell">
							<?php echo display($i,$xopos,$numturn); 
							$i +=1;
							$x +=1; ?>
						</div> <?php

					}
				?> </div>
				<?php 

				} ?>

				
		</dir>	
</body>
</html>