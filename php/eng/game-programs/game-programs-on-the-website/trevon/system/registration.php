<?php
include "connection.inc";
if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();
if (!mysqli_select_db($connection, $databaseName)) showerror();

function username_verifi($input,$connection)
{
	clean($input,8);
	
	mysqli_query($connection,"SET NAMES utf8");
	$query = "SELECT * FROM users WHERE user_name='$input'";

	if(!($result=@mysqli_query($connection,$query)))showerror();

	if (mysqli_num_rows($result) !=0)
		return 0;
	else 
		return 1;
}

$hiba=0;
$elsoe =(isset($_POST['elsoe']))? $_POST['elsoe']=1:0;

if (empty($_POST['user_name']) || empty($_POST['full_name']) || empty($_POST['reg_felt']) || empty($_POST['email']) ) 
{
	$hiba = 1;
	if (empty($_POST['user_name']))
	{
		$hibalista[]="You did not enter your username!";
	}	
	if (empty($_POST['full_name']))
	{	
		$hibalista[]="You did not enter your full name!";
	}
	if (empty($_POST['reg_felt']))
	{	
		$hibalista[]="You have not accepted the registration condition!";
	}

}

if ((isset($_POST['password1']) || isset($_POST['password2'])) && (strcmp($_POST['password1'],$_POST['password2'] ) || empty($_POST['password1'])))
{
	$hiba=1;
	$hibalista[]="You have not entered a password or they do not match!";
}

if (isset($_POST['user_name']) && !username_verifi($_POST['user_name'],$connection))
{
	$hibalista[]="Existing username, choose in another!";
	$_POST['user_name']='';
	$hiba=1;
}

if ($hiba==0)
{
	if (!mysqli_select_db($connection, $databaseName)) showerror();
	clean($_POST['password1'],15);
	$password=md5($_POST['password1']);
	$entry_time=date('Y'.'m'.'d');
	
	clean($_POST['user_name'],8);
	clean($_POST['full_name'],30);
	clean($_POST['email'],30);
	mysqli_query($connection,"SET NAMES utf8");
	
	$insert_into = "INSERT INTO users VALUES ('$_POST[user_id]','$_POST[user_name]','$_POST[full_name]','$_POST[email]','$password','$entry_time',1)";
	if(!($result=@mysqli_query($connection,$insert_into)))
		print("Upload failed");
	else
		header("Location: login.php");
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

if (isset($user_name) || isset($full_name) || isset($email)) {
  $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
  $full_name = $connection->real_escape_string($_POST['full_name']);
  $email = $connection->real_escape_string($_POST['email']);
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
<title>Registration form fill in</title>
<link rel="stylesheet" type="text/css" href="../../../../../../../css/style.css" />
</head>
<body>
<div class="stylish" class="form">
	<h1>Registration</h1>
	<p><font face color="red">*: Mandatory field!</font></p><br>
	<form id="form" name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<table class ="small">
	<tr>
		<td width=170><strong>Username:*</strong></td>
		<td><input type="text" name="user_name" value="" size=30 maxlength=8></td>
	</tr>
	<tr>
		<td width=170><strong>Full name:*</strong></td> 
		<td><input type="text" name="full_name" value="" size=30 maxlength=30></td>
	</tr>
	<tr>
		<td width=170><strong>E-mail address:*</strong></td>
		<td><input type="text" name="email" value="" size=30 maxlength=30></td>
	</tr>
	<tr>
		<td width=170><strong>Password:*</strong></td>
		<td><input type="password" name="password1" size=30 maxlength=15></td>
	</tr>
	<tr>
		<td width=170><strong>Password again:*</strong></td>
		<td><input type="password" name="password2" size=30 maxlength=15></td>
	</tr>
	<tr>
	<td colspan="2">I accept the registration conditions!	(Required for registration)<input name="reg_felt" type="checkbox" value="elfogad"'.($_POST['reg_felt'] == "elfogad" ? ' CHECKED' : '').'>	
	<input type="hidden" name="elsoe" value="'.$_POST['elsoe'].'"></td>	
	</tr><tr>
	<td colspan="2"><input name="send" type="submit" value="Send"><input class="right" type="button" name="cancel" onClick="location.href='login.php'" Value="Cancel" /></td>		
	</tr>
	</table>
	</form>
</div>
</body>
</html>
