<?php
include "connection.php";
$conn;
Connect($conn);

function dispatch ($conn)
{
$comm="insert into game_message (messages) values ('$_POST[item]')";

if(!mysqli_query($conn,$comm))
{
	die ('Mistake: '. mysqli_error($conn));
}
header ("location: dispatch.php");
}
dispatch($conn);
/*echo 'Operation successful';*/
?>