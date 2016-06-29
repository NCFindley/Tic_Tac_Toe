<!DOCTYPE html>
<html>
<link type="text/css" rel="stylesheet" href="stylesheet.css">
<?php 


	include("functions.php"); 

	$xopos = $_GET["xopos"];
	$newxo = $_GET["newxo"];
	$whoturn = $_GET["whoturn"];

	if ($xopos == "") {
			$xopos = "000000000";
			$whoturn = "x";
		}else{
			$xopos = addSymbol($newxo,$xopos,$whoturn);
			$whoturn = changeTurn($whoturn);
		}
?>

<head>
	<title></title>
</head>
<body>
	<h1>Time for Tic Tac Toe!</h1>
	<h2>Player <?php echo $whoturn; ?> Turn</h2>

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
							<?php echo display($i,$xopos,$whoturn); 
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