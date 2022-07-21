<?php
include "rendszer/kapcsolat.inc";
logincheckgame();

if(isset($_POST['kilepes'])) { 
		unset($_SESSION['user']);
		header("Location: ../jatekprogramok-a-weboldalon.php");
}

if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();

if (!mysqli_select_db($connection,$databaseName)) showerror();

$query ="SELECT levels FROM users WHERE user_name='$_SESSION[user]'";
if(!($result=@mysqli_query($connection,$query))) showerror();

$row= mysqli_fetch_array($result);
$levels = $row['levels'];
?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<META charset="UTF-8" />
	<META name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
	<META name="MADE" content="nagyadamworks@gmail.com" />
	<META name="DATE" content="2018.11.24." />
	<META http-equiv="CONTENT-LANGUAGE" content="hungarian" />
	<link href="jatekprogram/trevon.css" rel="styleshett" type="text/css" />
	<style type="text/css">
		button.open-submenu-karakterlap {
		font-family: Arial;
		cursor: pointer;
		display: block;
		padding: 5px 8px;
		margin-left: auto;
		color: #8aacb8;
		position: absolute;
		right: 293px;
		top: 10px;
		}
		.lap {
		display: none;	
		position: absolute;
		right: 2px;
		top: 40px;
		}
		button.open-submenu-ranglista {
		font-family: Arial;
		cursor: pointer;
		display: block;
		padding: 5px 8px;
		margin-left: auto;
		color: #8aacb8;
		position: absolute;
		right: 206px;
		top: 10px;
		}
		.rang {
		display: none;
		position: absolute;
		right: 2px;
		top: 40px;
		}
		button.open-submenu-csevego {
		font-family: Arial;
		cursor: pointer;
		display: block;
		padding: 5px 8px;
		margin-left: auto;
		color: #8aacb8;
		position: absolute;
		right: 126px;
		top: 10px;
		}
		.csevego {
		display: none;
		position: absolute;
		right: 20px;
		top: 40px;	
		}
		form.kilepes {
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
			
		"01":["jatekprogram/01/controller-01.js", "jatekprogram/01/display-01.js", "jatekprogram/01/engine-01.js", "jatekprogram/01/game-01.js", "jatekprogram/01/main-01.js"],
		"02":["jatekprogram/02/controller-02.js", "jatekprogram/02/display-02.js", "jatekprogram/01/engine-01.js", "jatekprogram/02/game-02.js", "jatekprogram/02/main-02.js"],
		"03":["jatekprogram/02/controller-02.js", "jatekprogram/03/display-03.js", "jatekprogram/01/engine-01.js", "jatekprogram/03/game-03.js", "jatekprogram/03/main-03.js"],
		"04":["jatekprogram/02/controller-02.js", "jatekprogram/04/display-04.js", "jatekprogram/01/engine-01.js", "jatekprogram/04/game-04.js", "jatekprogram/03/main-03.js"],
		"05":["jatekprogram/02/controller-02.js", "jatekprogram/05/display-05.js", "jatekprogram/01/engine-01.js", "jatekprogram/05/game-05.js", "jatekprogram/05/main-05.js"],
		"06":["jatekprogram/02/controller-02.js", "jatekprogram/05/display-05.js", "jatekprogram/06/engine-06.js", "jatekprogram/06/game-06.js", "jatekprogram/06/main-06.js"],
			
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
		$('.open-submenu-karakterlap').on('click', function() {
			$('.lap').slideToggle(50);
			$('.csevego').slideUp(50);
			$('.rang').slideUp(50);
		});
		$('.open-submenu-ranglista').on('click', function() {
			$('.rang').slideToggle(50);
			$('.csevego').slideUp(50);
			$('.lap').slideUp(50);
		});
		$('.open-submenu-csevego').on('click', function() {
			$('.csevego').slideToggle(50);
			$('.rang').slideUp(50);
			$('.lap').slideUp(50);
		});
	});
	</script>

<title>Trevon</title>
		
</head>
<body>
	<canvas height="630px" width="1120px"></canvas>
	<button class="open-submenu-karakterlap">Karakterlap </button>
	<div class="lap"><iframe name="Karakterlap" src="rendszer/character-lap.php" width="100%" height="480px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe></div>
	<button class="open-submenu-ranglista">Rang lista </button>
	<div class="rang"><iframe name="Rang-lista" src="rendszer/rang-lista.php" width="100%" height="380px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe></div>
	<button class="open-submenu-csevego">Cseveg&ocirc;</button>
	<div class="csevego"><iframe name="Csevego" src="rendszer/kuldes.php" width="100%" height="380px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe></div>
	<form class="kilepes" action="trevon.php" method="POST"><input type="submit" name="kilepes" value="Kil&eacute;p&eacute;s"></form>
</body>
</html>