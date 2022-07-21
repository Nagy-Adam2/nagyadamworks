<!DOCTYPE html>
<html lang="hu">
<head>
	<META charset="UTF-8" />
	<META name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
	<META name="MADE" content="nagyadamworks@gmail.com" />
	<META name="DATE" content="2018.11.24." />
	<META http-equiv="CONTENT-LANGUAGE" content="hungarian" />
<style>
input.right {
	position: absolute;
	right: 40px;
}
textarea {
	width: 95%;
	height: 50px;
}
</style>
</head>
<body>
	<div>
		<iframe name="Csevego" src="valasz.php" width="100%" height="250px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe>
	</div>
	<form>
		
		<label for="textarea_id">Írjál a csevegőbe:</label><br />
		<textarea id="textarea_id" name="elem_nev"></textarea><br />
		
		<input class="right" type="button" name="bejelentkezes" onClick="location.href='bejelentkezes.php'" Value="Bejelentkezés" />
	</form>
</body>
</html>
