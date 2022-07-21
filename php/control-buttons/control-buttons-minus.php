<?php
$conn=mysqli_connect('localhost','root') or die ("Faulty connection!");
mysqli_select_db($conn, "nagyadamworks") or die (print("Failed to connect to database!
The reason of the mistake: ".mysqli_error($conn)));
mysqli_query($conn,"SET NAMES uft8");
function minus($conn, $chara_name, $minus)
{
	$comm = "SELECT * FROM characters_page WHERE chara_name='".$chara_name."';";
	$ell = mysqli_query($conn,$comm) or die(print("He could not execute the instruction! The reason of the mistake: ". mysqli_error($conn)));
	
	if(mysqli_num_rows($ell)!=0)
	{
		$comm = "UPDATE characters_page SET chara_exp_point=chara_exp_point-".$minus." WHERE chara_name='".$chara_name."';";
		echo $comm;
		$eredmeny = mysqli_query($conn,$comm) or die(print("He could not execute the instruction! The reason of the mistake: ". mysqli_error($conn)));
		print ("<br> Happened the recording!");
	}
	header("Location: Control-buttons-minus.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Control buttons minus</title>
</head>
<body>
	<div>
	<?php if(!isset($_POST['chara_name'])!=""):  ?>
	<form action="Control_buttons_minus.php" method="POST">
		<table><h1>Control buttons minus</h1>
		<tr><td>Character name:</td>
			<td><?php
				$sql="SELECT * FROM characters_page";
				$res=mysqli_query($conn, $sql) or die ('Mistake instruction!');
				echo '<select name="chara_name" size="1">';
				while (($current_row=mysqli_fetch_assoc($res))!= null) {
				echo '<option value="'.$current_row["chara_name"].'">'.$current_row["chara_name"].'</option>';
				}
				echo '</select>';
				?></td></tr>
		<tr><td><input type="hidden" name="minus" value="10"></td></tr>
		<tr><td><input type="submit" value="Minus 10"></td></tr>
	</form>
	<?php
	else:
	minus($conn, $_POST['chara_name'],$_POST['minus']);
	endif;
	?>
	</div>
</body>
</html>