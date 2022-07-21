<html lang="hu">
<head>
	<META charset="UTF-8" />
	<META name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
	<META name="MADE" content="nagyadamworks@gmail.com" />
	<META name="DATE" content="2018.11.24." />
	<META http-equiv="CONTENT-LANGUAGE" content="hungarian" />
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
        chatbox.open("GET", "valasz.php?ido="+idopont, true);
        chatbox.onreadystatechange = function() {
          if(chatbox.readyState == 4) {
            document.getElementById('uzenet').innerHTML = chatbox.responseText;
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
          ajax_futtat('valasz.php','mehet=1&szoveg='+document.getElementById('uzenet').value);
          document.getElementById('uzenet').value='';
          frissit(false);
          document.getElementById('uzenet').focus();
        }
      }
    </script>
</head>
<body onLoad="frissit(true)">
<?php
include "kapcsolat.php";
$conn;
Connect($conn);

mysqli_query($conn,'SET NAMES utf8');
mysqli_query($conn,"SET character_set_results=utf8");
mysqli_set_charset($conn,'utf8');
function valasz ($conn) {
	if($conn) {
		$sql="SELECT * FROM game_message ORDER BY `ID` DESC";
		$res=mysqli_query($conn, $sql) or die ('Hibás utasítás!');
		echo '<div id="uzenet">';
		echo '<table border=0 style="padding: 0 10px 0 10px;">';
		echo '<tr>';
		/*echo '<th>ID</th>';*/
		echo '<th>Csevegő</th>';
		echo '</tr>';
		while (($current_row=mysqli_fetch_assoc($res))!= null) {
		echo'<tr>';
		/*echo'<td>'.$current_row["ID"].'</td>';*/
		echo'<td>'.$current_row["messages"].'</td>';
		echo'</tr>';
		}
		echo '</table>';
		echo '</div>';
		mysqli_free_result($res);
	}else{
		die ('Nem sikerült csatlakozni az adatbázishoz.');
	}
	mysqli_close($conn);
	}
valasz($conn);
?>
</body>
</html>