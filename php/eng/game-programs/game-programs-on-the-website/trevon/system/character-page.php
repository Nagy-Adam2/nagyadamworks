<html lang="en">
<head>
	<META charset="UTF-8" />
	<META name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
	<META name="MADE" content="nagyadamworks@gmail.com" />
	<META name="DATE" content="2018.11.24." />
	<META http-equiv="CONTENT-LANGUAGE" content="english" />
	<style type="text/css">
	table.page {width: 84%; color: #fffcbb; background-color: grey; border-color: #fffcbb; border-style: solid; border-width: 1px;}
	table.page td {border-left: 0px #fffcbb solid;  border-right: 1px #fffcbb solid; border-bottom: 0px #fffcbb solid; padding: 12px 8px;} 
	table.page td:last-child { border-right: 0 }
	</style>
    <script>
      function frissit(ujra) {
        var chatbox;

        if (window.XMLHttpRequest) {
          chatbox = new XMLHttpRequest();
        }
        else {
          chatbox = new ActiveXObject("Microsoft.XMLHTTP");
        }

        var idopont = new Date().getTime();

        chatbox.abort();
        chatbox.open("GET", "character-page.php?ido="+idopont, true);
        chatbox.onreadystatechange = function() {
          if(chatbox.readyState == 4) {
            document.getElementById('page').innerHTML = chatbox.responseText;
          }
        }
        chatbox.send(null);

        if (ujra) {
          setTimeout('frissit(true)',2000);
        }
      }

      function enter_nyomva(e) {
        var charCode;
        if (e && e.which) {
          charCode = e.which;
        }
        else if(window.event){
          e = window.event;
          charCode = e.keyCode;
        }
        if(charCode == 13) {
          ajax_futtat('character-page.php','mehet=1&szoveg='+document.getElementById('page').value);
          document.getElementById('page').value='';
          frissit(false);
          document.getElementById('page').focus();
        }
      }
    </script>
</head>
<body onLoad="frissit(true)">
<?php
$conn=mysqli_connect('localhost','nagyadamwork') or die ("Faulty connection!");
mysqli_query($conn,'SET NAMES utf8');
mysqli_query($conn,"SET character_set_results=utf8");
mysqli_set_charset($conn,'utf8');
if (mysqli_select_db($conn,'nagyadamwork')) {
		$sql="SELECT * FROM characters_page LIMIT 1";
		$res=mysqli_query($conn, $sql) or die ('Mistake instruction!');
		echo '<div id="page">';
		echo '<table class="page">';
		while (($current_row=mysqli_fetch_assoc($res))!= null) {
		echo '<tr>';
		echo '<td>Name</td>';
		echo '<td>Level</td>';
		echo '<td>Exp_points</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>'.$current_row["chara_name"].'</td>';
		echo '<td>'.$current_row["chara_level"].'</td>';		
		echo '<td>'.$current_row["chara_exp_point"].'</td>';
		echo '</tr>';
		echo '</table>';
		echo '<table class="page">';
		echo '<tr>';
		echo '<tr>';
		echo '<td>Strength</td>';
		echo '<td>'.$current_row["chara_strength"].'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Dexterity</td>';
		echo '<td>'.$current_row["chara_dexterity"].'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Intelligence</td>';
		echo '<td>'.$current_row["chara_intelligence"].'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Vitality</td>';
		echo '<td>'.$current_row["chara_vitality"].'</td>';
		echo '</tr>';
		}
		echo '</table>';
		echo '</div>';
		mysqli_free_result($res);
	}else{
		die ('Failed to connect to database.');
	}
	mysqli_close($conn);
?>
</body>
</html>