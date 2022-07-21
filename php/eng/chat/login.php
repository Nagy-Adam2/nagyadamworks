<?php
include "connection.inc";
if (isset($user)) { $user = clean($user,8); }
$password = clean($password,30);
session_start();
$hiba=0;
$elsoe =(isset($_POST['elsoe']))? $_POST['elsoe']=1:0;

if (empty($_POST['user']) || empty($_POST['password']))
{
	$hiba = 1;

	if (empty($_POST['user']))
	{
		$hibalista[]="You did not enter your username!";
	}	
	if (empty($_POST['password']))
	{	
		$hibalista[]="You did not enter your password!";
	}
}
else
{
	if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();

	if (!mysqli_select_db($connection, $databaseName))showerror();
	
	mysqli_query($connection,"SET NAMES utf8");
	
	clean($_POST['user'],8);
	
	$query ="SELECT user_name, password FROM users WHERE user_name='$_POST[user]'";

	if(!($result=@mysqli_query($connection,$query))) showerror();


	if (mysqli_num_rows($result) == 0) {
		
		$_POST['password']='';
		
		header("Location: registration.php");
	}
	else
	{	
		$row= @mysqli_fetch_array($result);
		
		if (md5($_POST['password'])!= $row['password'])
		{
			$hiba=1;
			$hibalista[]=("You have entered the wrong password! Please type again!");
			$_POST['password']='';
		}
		else
		{
			if(!isset($_SESSION['user']))
			$_SESSION['user'] = $_POST['user'];			
			header("Location: dispatch.php");
		}
	}
}

if ($hiba != 0)
{
	if ($elsoe==1)
		foreach ( $hibalista as $i => $ertek )
  		{
			print ("$ertek<br />");
		}
	print ("<br />");
}

if (isset($_POST['user']) || isset($_POST['password'])) {
  $user = $_POST['user'];
  $password = $_POST['password'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<META charset="UTF-8" />
	<META name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
	<META name="MADE" content="nagyadamworks@gmail.com" />
	<META name="DATE" content="2018.11.24." />
	<META http-equiv="CONTENT-LANGUAGE" content="english" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Login</title>
</head>
<body onLoad="setTimeout(read,40000)">
<div id="stylish" class="form">
<h1>Login</h1>
<form id="form" name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"><!--$_SERVER['PHP_SELF']-->
	<table>
	<tr>
	<td colspan="2"><p>If our user has not registered yet,<br /> please click <a href="registration.php">HERE!</a><br />
	<font face color="red">*: Mandatory field!</font></p></td>
	</tr>
	<tr>
	<td>User:*</td><td><input type="text" name="user" id="user" size="10" maxlength="8" /></td>
	</tr><tr>
	<td>Password:*</td><td><input type="password" name="password" id="password" size="10" maxlength="30" /></td>
	</tr><tr>
	<td colspan="2"><input type="hidden" name="elsoe" value="$_POST['elsoe']" /><input type="submit" value="Login" />
	<input class="right" type="button" name="cancel" onClick="location.href='read.php'" Value="Cancel" /></td>
	</tr>
	</table>
</form>
</div>
</body>
</html>