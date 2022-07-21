<?php
include "kapcsolat.inc";
if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();
if (!mysqli_select_db($connection, $databaseName)) showerror();

session_start();

function Character ($connection)
{	
	mysqli_query($connection,"SET NAMES utf8");
	$ell = "SELECT * FROM users WHERE user_id='1' and user_name='".$_SESSION['user']."';";
	$rezurv = mysqli_query($connection,$ell);

	if (mysqli_num_rows($rezurv) != 0)
	{
		$kar = "SELECT * FROM connection WHERE character_id='3' and user_id='1';";
		$result = mysqli_query($connection,$kar);
		
		if (mysqli_num_rows($result) != 0) {
			$row = "SELECT * FROM characters WHERE character_id='3' and character_name='Test02';";
			$rerow = mysqli_query($connection,$row);
			if(mysqli_fetch_row($rerow)){
			header("Location: ../trevon.php");
			} else { header("Location: character-nev.php"); }
		} else { header("Location: character-nev.php"); }
	}
	else 
	{	
	header("Location: character-nev.php");
	}
}
Character($connection);