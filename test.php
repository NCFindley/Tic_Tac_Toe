<?php 
	include("functions.php");

	echo "Testing starts here";

	echo "\n\n\nTesting 1 if there no winner yet";

	if (checkhor("0oxox0ox0", 6) == "no winner"){
		echo "\nSuccess";
	}else{
		echo "\nFailure results were " . checkhor("0oxox0ox0", 6);
	}


	echo "\n\n\nTesting 2 if player O gets 3 in first column";

	if (checkver("oxoo00o00", 7) == "Player O is the Winner"){
		echo "\nSuccess";
	}else{
		echo "\nFailure results were " . checkver("ooox00o00", 6);
	}

	echo "\n\n\nTesting 3 if player x gets 3 in 3rd row";

	if (checkhor("oxo000xxx", 8) == "Player X is the Winner"){
		echo "\nSuccess";
	}else{
		echo "\nFailure results were " . checkhor("oxo000xxx", 8);
	}

	echo "\n\n\nTesting 4 if player x wins diagnolly";

	if (checkdiag("x000x000x") == "Player X is the Winner"){
		echo "\nSuccess";
	}else{
		echo "\nFailure results were " . checkdiag("x000x000x");
	}

	echo "\n\n\nTesting 5 if player x wins diagnolly";

	if (checkdiag("00x0x0x00") == "Player X is the Winner"){
		echo "\nSuccess";
	}else{
		echo "\nFailure results were " . checkdiag("00x0x0x00");
	}
?>