<!DOCTYPE html>
<html lang="en">
<head>
	<META charset="UTF-8" />
	<META name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
	<META name="MADE" content="nagyadamworks@gmail.com" />
	<META name="DATE" content="2018.11.24." />
	<META http-equiv="CONTENT-LANGUAGE" content="english" />
<style type="text/css">
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
		<iframe name="Chat" src="answer.php" width="100%" height="250px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe>
	</div>
	<form action="insert-di.php" method="post">
		
		<label for="textarea_id">Write the chat:</label><br />
		<textarea id="textarea_id" name="item"></textarea><br />
		
		<input class="right" type="button" name="login" onClick="location.href='login.php'" Value="Login" />
	</form>
</body>
</html>
