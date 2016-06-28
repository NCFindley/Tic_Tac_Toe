<!DOCTYPE html>
<html>
<link type="text/css" rel="stylesheet" href="stylesheet.css">
<?php 


include("functions.php"); 


?>

<head>
	<title></title>
</head>
<body>
	<h1>Time for Tic Tac Toe!</h1>
	<h2>Player xxx Turn</h2>
		<div>
			<img src="images/hor.png" id = "hor1">
			<img src="images/hor.png" id = "hor2">
			<img src="images/vert.png" id = "vert1">
			<img src="images/vert.png" id = "vert2">
		</div>
		
		<dir>
			<?php 
				#$newsymbol = $_GET["symbol"];
				#addSymbol($newsymbol);
				newGame();
				$i = 0;

				while ($i < 9) {

					$x = 0; ?>

					<div> <?php
					while ($x < 3) { ?> 
							<?php echo display($i); 
							$i +=1;
							$x +=1; 
						
						
					}
				?> </div>
				<?php 

				} ?>


		</dir>	
</body>
</html>