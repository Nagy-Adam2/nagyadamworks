<?php	
	
		session_start();
		unset($_SESSION['user']);
		header("Location: game-programs-on-the-website.php");
	
?>

