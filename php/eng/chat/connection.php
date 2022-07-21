<?php
function Connect (&$conn)
{
$conn = mysqli_connect("localhost", "nagyadamworks");
if($conn==false)
{
	die("Connection to server not established! The program exits! The reason of the mistake: ".mysqli_connect_error());
}

mysqli_select_db($conn, "nagyadamworks") or die (print("Failed to connect to database!
The reason of the mistake: ".mysqli_error($conn)));

mysqli_query($conn,"SET NAMES utf8");
}
?>