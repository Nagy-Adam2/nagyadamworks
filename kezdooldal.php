<!DOCTYPE html>
<html lang="hu">
<head>
  <link rel="stylesheet" href="css/normalize.min.css" type="text/css" />
  <link rel="stylesheet" href="css/layout.css" type="text/css" />
  <link rel="stylesheet" href="css/base.css" type="text/css" />
  <link rel="stylesheet" href="css/components.css" type="text/css" />
    <META charset="UTF-8" />
	<META http-equiv="CONTENT-LANGUAGE" content="hungarian" />
	<META name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
	<META name="MADE" content="nagyadamworks@gmail.com" />
	<META name="DATE" content="2018.11.24." />
	<META name="robots" content="index, follow" />
	<META name="audience" content="all" />
	<META name="description" lang="hu" content="Kezd&ocirc;oldal, &Eacute;telek, J&aacute;t&eacute;kprogramok, Vide&oacute;im" />
	<META name="keywords" lang="hu" content="Kezd&ocirc;oldal, &Eacute;telek, J&aacute;t&eacute;kprogramok, Vide&oacute;im" />
	<META name="revisit-after" content="28 days" />
	<META name="expires" content="28 days" />
  <title>Kezd&ocirc;oldal</title> 
</head>
<body class="main-container">

  <header class="header">
	<nav class="navigation">
	  <div class="navbar clear">
		<div class="logo" href=""><img src="assets/images/home-page.gif" alt="Logo"></div>
		<div class="menu-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></div>
		<div class="langue menu">
		  <ul>
			<li>
		      <a href="index.php" class="white">Angol</a>
		      <a href="kezdooldal.php" class="white">Magyar</a>
		    </li>
		  </ul>
		</div>
		<div class="menu">
		  <ul>
			<li><a class="white activeg" href="kezdooldal.php">Kezd&ocirc;oldal</a></li>
			<li class="li-main-menu1">
			  <span class="open-submenu1" ondblClick="location.href ='php/hun/jatekprogramok/jatekprogramok.php';">J&aacute;t&eacute;kprogramok <span class="arrow down"></span></span>
			  <ul class="ul-submenu1">
				<li><a class="white" href="php/hun/jatekprogramok/jatekprogramok-a-weboldalon/jatekprogramok-a-weboldalon.php">J&aacute;t&eacute;kprogramok weboldalon</a></li>
				<li><a class="white" href="php/hun/jatekprogramok/jatekok-letoltese/jatekok-letoltese.php">J&aacute;t&eacute;kok let&ouml;lt&eacute;se</a></li>
			  </ul>
			</li>
			<li class="li-main-menu2">
			  <span class="open-submenu2" ondblClick="location.href ='php/hun/videoim/videoim.php';">Vide&oacute;im <span class="arrow down"></span></span>
			  <ul class="ul-submenu2">
				<li><a class="white" href="php/hun/videoim/kal-videok/videoim.php">Kis&aacute;llatos vide&oacute;im</a></li>
				<li><a class="white" href="php/hun/videoim/sfj-videok/videoim.php">Saj&aacute;t fejleszt&eacute;s&ucirc; j&aacute;t&eacute;kprogramok vide&oacute;im</a></li>
			  </ul>
			</li>
			<li><a class="white" href="#">Portfoli&oacute; oldalam</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
  </header>

  <div class="marquee marquee--outer-part">
    <marquee> &Uuml;dv&ouml;z&ouml;llek az oldalamon!</marquee>
  </div>

  <main class="main">
    <h1>Kezd&ocirc;oldal</h1>
    <p class="fs-2"><span class="bg-primary">Kezd&ocirc;oldal:</span> Itt megtekinthet&ocirc;ek az oldalamon, hogy milyen f&ocirc;tartalmak vannak.</p>

    <p class="fs-2"><span class="bg-primary" onClick="location.href ='php/hun/jatekprogramok/jatekprogramok.php';">J&aacute;t&eacute;kprogramok:</span> J&aacute;t&eacute;kprogramok a weboldalon fejleszt&eacute;seim vagy let&ouml;lt&eacute;se.</p>

    <p class="fs-2"><span class="bg-primary" onClick="location.href ='php/hun/videoim/videoim.php';">Vide&oacute;im:</span> Megtekinthet&ocirc;ek kis&aacute;llatos &eacute;s saj&aacute;t fejleszt&eacute;s&ucirc; j&aacute;t&eacute;kprogramok vide&oacute;im.</p>

    <div align="right"><p class="fs-2">Tov&aacute;bbi j&oacute; n&eacute;zel&ocirc;d&eacute;st k&iacute;v&aacute;nok.</p></div>
  </main>

  <div class="carousel">
     <iframe src="php/carousel/carouselhu.php" width="276px" height="184px"></iframe>
  </div>
			
  <div class="sidebar">
     <iframe name="Csevego" src="php/hun/csevego/kuldes.php" width="100%" height="380px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe>
  </div>

  <footer class="footer footer--outer-part">
    <p>Nagy Ádám weboldala.</p>
  </footer>

  <script type="text/javascript" src="js/jQuery.js"></script>
  <script type="text/javascript" src="js/script.js"></script>

</body>
</html>
