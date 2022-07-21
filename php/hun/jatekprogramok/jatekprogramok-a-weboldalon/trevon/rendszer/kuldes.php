<?php
include "kapcsolat.inc";
logincheck();

if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();

if (!mysqli_select_db($connection,$databaseName)) showerror();

mysqli_query($connection,"SET NAMES utf8");
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
	<form action="insert-ku.php" method="post">
		
		<label for="textarea_id">&Iacute;rj&aacute;l a cseveg&ocirc;be:</label><br />
		<textarea id="textarea_id" name="elem_nev"></textarea><br />
		
		<input class="right" type="submit" name="kuldes" Value="K&uuml;ld&eacute;s" />
	</form>
</body>
</html>
