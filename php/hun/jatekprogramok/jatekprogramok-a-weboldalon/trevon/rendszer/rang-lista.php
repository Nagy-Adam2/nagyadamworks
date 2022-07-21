<html lang="hu">
<head>
	<META charset="UTF-8" />
	<META name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
	<META name="MADE" content="nagyadamworks@gmail.com" />
	<META name="DATE" content="2018.11.24." />
	<META http-equiv="CONTENT-LANGUAGE" content="hungarian" />
	<style type="text/css">
	table.rang {color: #fffcbb; background-color: #6b4542; border-color: #fffcbb; border-style: solid; border-width: 1px;}
	table.rang th {border-left: 1px #fffcbb solid;  border-right: 1px #fffcbb solid; border-bottom: 1px #fffcbb solid;}
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
        chatbox.open("GET", "rang-lista.php?ido="+idopont, true);
        chatbox.onreadystatechange = function() {
          if(chatbox.readyState == 4) {
            document.getElementById('rang').innerHTML = chatbox.responseText;
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
          ajax_futtat('rang-lista.php','mehet=1&szoveg='+document.getElementById('rang').value);
          document.getElementById('rang').value='';
          frissit(false);
          document.getElementById('rang').focus();
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
		$sql="SELECT * FROM characters_page ORDER BY `chara_exp_point` DESC LIMIT 10";
		$res=mysqli_query($conn, $sql) or die ('Mistake instruction!');
		echo '<div id="rang">';
		echo '<table class="rang">';
		echo '<tr>';
		echo '<th>Sorszámok</th>';
		echo '<th>Karakternév</th>';
		echo '<th>Pontok</th>';
		echo '</tr>';
		for ($n = 1; $n <= 10;) {
		while (($current_row=mysqli_fetch_assoc($res))!= null) {
		echo'<tr>';
		echo'<td>'.$n.'</td>';
		echo'<td>'.$current_row["chara_name"].'</td>';
		echo'<td align="right">'.$current_row["chara_exp_point"].'</td>';
		$n++;
		echo'</tr>';
		}
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