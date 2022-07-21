<?php
include "connection.inc";
logincheck();

if(isset($_POST['checkout'])) { 
		unset($_SESSION['user']);
		header("Location: dispatch.php");
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
	<link rel="stylesheet" href="../../index/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="../../index/style.css" type="text/css" />
	<META charset="UTF-8" />
	<META name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
	<META name="MADE" content="nagyadamworks@gmail.com" />
	<META name="DATE" content="2018.11.24." />
	<META http-equiv="CONTENT-LANGUAGE" content="english" />
</head>
<body>
	<div>
		<form action="dispatch.php" method="POST" style="position: absolute; right: 10px;"><input type="submit" name="checkout" title="Check-Out" alt="Check-Out" value="X"></form>
		<iframe name="Chat" src="answer.php" width="100%" height="250px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe>
	</div>
	<form action="insert-di.php" method="post">
		
		<label for="textarea_id">Write the chat:</label><br />
		<textarea id="textarea_id" name="item"></textarea><br />
		
		<input class="right" type="submit" name="dispatch" Value="Post" />
	</form>
</body>
</html>
