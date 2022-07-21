<?php
include "kapcsolat.inc";
if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();
if (!mysqli_select_db($connection, $databaseName)) showerror();

session_start();
if(isset($_POST['megse'])) { 
		unset($_SESSION['user']);
		header("Location: bejelentkezes.php");
}

function felh_nev_ell($input,$connection)
{
	clean($input,8);
	
	mysqli_query($connection,"SET NAMES utf8");
	
	$query = "SELECT * FROM characters WHERE character_name='$input'";

	if(!($result=@mysqli_query($connection,$query)))showerror();

	if (mysqli_num_rows($result) !=0)
		return 0;
	else 
		return 1;
}

$hiba=0;
$elsoe =(isset($_POST['elsoe']))? $_POST['elsoe']=1:0;

if (empty($_POST['character_name'])) 
{
	$hiba = 1;
	if (empty($_POST['character_name']))
	{
		$hibalista[]="Nem adta meg a karaktere nevét!";
	}	
}

if (isset($_POST['character_name']) && !felh_nev_ell($_POST['character_name'],$connection))
{	
	$hibalista[]="Már létezik a karakter név, válasszon másikat!";
	$_POST['character_name']='';
	$hiba=1;
}

if ($hiba==0)
{
	if (!mysqli_select_db($connection, $databaseName)) showerror();
	clean($_POST['character_name'],8);
	mysqli_query($connection,"SET NAMES utf8");
	
	$insert_into = "INSERT INTO characters VALUES ('$_POST[character_id]','$_POST[character_name]')";
	if(!($result=@mysqli_query($connection,$insert_into)))
		/*if (mysqli_num_rows($result)) {
		$insert_incon = "INSERT INTO connection VALUES ('$_POST[character_id]','$_POST[user_id]')";
		mysqli_query($connection,$insert_incon);
		} else { print("Nem sikerült"); }*/
		print("Nem sikerült a felvitel");
	else
		header("Location: ../trevon.php");
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
?>
<html lang="hu">
<head>
	<META charset="UTF-8" />
	<META name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
	<META name="MADE" content="nagyadamworks@gmail.com" />
	<META name="DATE" content="2018.11.24." />
	<META http-equiv="CONTENT-LANGUAGE" content="hungarian" />
<title>Karakter n&eacute;v</title>
</head>
<body>
<form action="character-nev.php" method="POST">
<table>
<tr>
<td colspan="2">K&eacute;rn&eacute;k egy karakter nevet!</td>
</tr><tr>
<td colspan="2"><input type="text" name="character-name" size="20" maxlength="8" />
<input type="hidden" name="elsoe" value="'.$_POST['elsoe'].'"></td>
</tr><tr>
<td align="center"><input type="submit" name="elkuld" value="OK"></td>
<td align="center"><input type="submit" name="megse" value="M&eacute;gse"></td>
</tr>
</table>
</form>
</body>
</html>