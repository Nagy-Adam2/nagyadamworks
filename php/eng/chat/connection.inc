<?php
error_reporting (E_ALL ^ E_NOTICE);

$hostName = "localhost";
$databaseName = "nagyadamworks";
$username = "nagyadamworks";
$password = "";

function showerror()
{
   if (mysqli_connect_error()) die("Error code: " . mysqli_connect_errno() . " Description: " . mysqli_connect_error());  
}

function clean($input, $maxlength)
{
  $input = substr($input, 0, $maxlength);
  $input = EscapeShellCmd($input);
  return ($input);
}

function logincheck()
{
  session_start();
  if(!isset($_SESSION['user'])) {
    header("Location: login.php");
  }
}  
?>