<?php
include "system/connection.inc";
logincheckgame();

if(isset($_POST['exit'])) { 
		unset($_SESSION['user']);
		header("Location: ../game-programs-on-the-website.php");
}

if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();

if (!mysqli_select_db($connection,$databaseName)) showerror();

mysqli_query($connection,"SET NAMES utf8");
$query ="SELECT levels FROM users WHERE user_name='$_SESSION[user]'";
if(!($result=@mysqli_query($connection,$query))) showerror();

$row= mysqli_fetch_array($result);
$levels = $row['levels'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<META charset="UTF-8" />
	<META name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
	<META name="MADE" content="nagyadamworks@gmail.com" />
	<META name="DATE" content="2018.11.24." />
	<META http-equiv="CONTENT-LANGUAGE" content="english" />
	<link href="gameprogram/trevon.css" rel="styleshett" type="text/css" />
	<style type="text/css">
		button.open-submenu-characterpage {
		font-family: Arial;
		cursor: pointer;
		display: block;
		padding: 5px 8px;
		margin-left: auto;
		color: #8aacb8;
		position: absolute;
		right: 242px;
		top: 10px;
		}
		.page {
		display: none;	
		position: absolute;
		right: 2px;
		top: 40px;
		}
		button.open-submenu-ranklist {
		font-family: Arial;
		cursor: pointer;
		display: block;
		padding: 5px 8px;
		margin-left: auto;
		color: #8aacb8;
		position: absolute;
		right: 162px;
		top: 10px;
		}
		.rank {
		display: none;
		position: absolute;
		right: 2px;
		top: 40px;
		}
		button.open-submenu-chat {
		font-family: Arial;
		cursor: pointer;
		display: block;
		padding: 5px 8px;
		margin-left: auto;
		color: #8aacb8;
		position: absolute;
		right: 106px;
		top: 10px;
		}
		.chat {
		display: none;
		position: absolute;
		right: 20px;
		top: 40px;	
		}
		form.exit {
		position: absolute;
		right: 48px;
		top: 10px;
		}
		input {
		font-family: Arial;
		cursor: pointer;
		display: block;
		padding: 5px 12px;
		margin-left: auto;
		color: #8aacb8;
		}
	</style>
	<script type="text/javascript" src="../../../../../../js/jQuery.js"></script>
	<script type="text/javascript">
	
	let part = String(window.location).split("?")[1];
			
	let parts = {
			
		"01":["gameprogram/01/controller-01.js", "gameprogram/01/display-01.js", "gameprogram/01/engine-01.js", "gameprogram/01/game-01.js", "gameprogram/01/main-01.js"],
		"02":["gameprogram/02/controller-02.js", "gameprogram/02/display-02.js", "gameprogram/01/engine-01.js", "gameprogram/02/game-02.js", "gameprogram/02/main-02.js"],
		"03":["gameprogram/02/controller-02.js", "gameprogram/03/display-03.js", "gameprogram/01/engine-01.js", "gameprogram/03/game-03.js", "gameprogram/03/main-03.js"],
		"04":["gameprogram/02/controller-02.js", "gameprogram/04/display-04.js", "gameprogram/01/engine-01.js", "gameprogram/04/game-04.js", "gameprogram/03/main-03.js"],
		"05":["gameprogram/02/controller-02.js", "gameprogram/05/display-05.js", "gameprogram/01/engine-01.js", "gameprogram/05/game-05.js", "gameprogram/05/main-05.js"],
		"06":["gameprogram/02/controller-02.js", "gameprogram/05/display-05.js", "gameprogram/06/engine-06.js", "gameprogram/06/game-06.js", "gameprogram/06/main-06.js"],
			
	};
			
	switch(part) {
			
		case "01": case "02": case "03": case "04": case "05": case "06": break;
		default:
			part = "06";
					
	}
			
	for (let index = 0; index < parts[part].length; index++) {
			
		let script = document.createElement("script");
		script.setAttribute("type", "text/javascript");
		script.setAttribute("src", parts[part][index]);
		document.head.appendChild(script);
				
	}
	$(function() {
		$('.open-submenu-characterpage').on('click', function() {
			$('.page').slideToggle(50);
			$('.chat').slideUp(50);
			$('.rank').slideUp(50);
		});
		$('.open-submenu-ranklist').on('click', function() {
			$('.rank').slideToggle(50);
			$('.chat').slideUp(50);
			$('.page').slideUp(50);
		});
		$('.open-submenu-chat').on('click', function() {
			$('.chat').slideToggle(50);
			$('.rank').slideUp(50);
			$('.page').slideUp(50);
		});
	});
	</script>

<title>Trevon</title>
		
</head>
<body>
	<canvas height="630px" width="1120px"></canvas>
	<button class="open-submenu-characterpage">Character page </button>
	<div class="page"><iframe name="Character-page" src="system/character-page.php" width="100%" height="480px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe></div>
	<button class="open-submenu-ranklist">Rank list </button>
	<div class="rank"><iframe name="Rank-list" src="system/rank-list.php" width="100%" height="380px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe></div>
	<button class="open-submenu-chat">Chat</button>
	<div class="chat"><iframe name="Chat" src="system/dispatch.php" width="100%" height="380px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe></div>
	<form class="exit" action="trevon.php" method="POST"><input type="submit" name="exit" value="Exit"></form>
</body>
</html>