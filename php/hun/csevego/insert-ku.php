<?php
include('kapcsolat.php');
$conn;
Connect($conn);

function kuldes ($conn)
{
$comm="insert into message (messages) values ('$_POST[elem_nev]')";

if(!mysqli_query($conn,$comm))
{
	die ('Hiba: '. mysqli_error($conn));
}
header ("location: kuldes.php");
}
kuldes($conn);
/*echo 'A művelet sikeres';*/
?>