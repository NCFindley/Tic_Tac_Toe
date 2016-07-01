<?php 
	include("functions.php");

	echo "Testing starts here";

	echo "\n\n\nTesting 1 if there no winner yet";

	if (checkwinner("0oxox0ox0", 6) == "no winner"){
		echo "\nSuccess";
	}else{
		echo "\nFailure results were " . checkwinner("0oxox0ox0", 6);
	}


	echo "\n\n\nTesting 2 if player O gets 3 in first column";

	if (checkwinner("oxoo00o00", 7) == "o"){
		echo "\nSuccess";
	}else{
		echo "\nFailure results were " . checkwinner("ooox00o00", 6);
	}

	echo "\n\n\nTesting 3 if player x gets 3 in 3rd row";

	if (checkwinner("oxo000xxx", 8) == "x"){
		echo "\nSuccess";
	}else{
		echo "\nFailure results were " . checkwinner("oxo000xxx", 8);
	}

	echo "\n\n\nTesting 4 if player x wins diagnolly";

	if (checkwinner("x000x000x", 7) == "x"){
		echo "\nSuccess";
	}else{
		echo "\nFailure results were " . checkwinner("x000x000x",7);
	}

	echo "\n\n\nTesting 5 if player x wins diagnolly";

	if (checkwinner("00x0x0x00",8) == "x"){
		echo "\nSuccess";
	}else{
		echo "\nFailure results were " . checkwinner("00x0x0x00",8);
	}
?>