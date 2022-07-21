<?php
function Connect (&$conn)
{
  $conn = mysqli_connect("localhost", "nagyadamworks");
  if($conn==false)
  {
    die("A kapcsolat nem jött létre a szerverrel! A program kilép! A hiba oka: ".mysqli_connect_error());
  }

  mysqli_select_db($conn, "nagyadamworks") or die (print("Nem sikerült az adatbázishoz csatlakozni! 
  A hiba oka: ".mysqli_error($conn)));

  mysqli_query($conn,"SET NAMES utf8");
}
?>