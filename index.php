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
		<h1><?php
					foreach ($_SESSION as $key=>$val){

				echo $key. ": ".$val. "<br>";
				
				}
				echo session_status(); 
				$arrtest = $_SESSION["Array"];
				echo $arrtest[0];
				?></h1>

		<dir>
			<?php 
				session_start();

				if (session_status() == 1){
					newGame();
				}else {
					$sympos = $_GET["symbol"];
					addSymbol($sympos);
				}

				$_SESSION["turn"] += 1;
				
				
				$i = 0;

				while ($i < 9) {

					$x = 0; ?>

					<div> 
					 <?php
					while ($x < 3) { ?> 
							<?php echo display($i); 
							$i +=1;
							$x +=1; 			
					}
				?> </div>
				<?php 

				} ?>

				
		</dir>	
		<h3><?php
					foreach ($_SESSION as $key=>$val){

				echo $key. ": ".$val. "<br>";
				
				}
				echo "Session Status " . session_status(); 
				echo " Symbol Status " . $sympos;
				?></h3>
</body>
</html>