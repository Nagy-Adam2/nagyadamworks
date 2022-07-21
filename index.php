<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/normalize.min.css" type="text/css" />
  <link rel="stylesheet" href="css/layout.css" type="text/css" />
  <link rel="stylesheet" href="css/base.css" type="text/css" />
  <link rel="stylesheet" href="css/components.css" type="text/css" />
    <META charset="UTF-8" />
	<META http-equiv="CONTENT-LANGUAGE" content="english" />
	<META name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
	<META name="MADE" content="nagyadamworks@gmail.com" />
	<META name="DATE" content="2018.11.24." />
	<META name="robots" content="index, follow" />
	<META name="audience" content="all" />
	<META name="description" lang="en" content="Home page, Foods, Game programs, My videos" />
	<META name="keywords" lang="en" content="Home page, Foods, Game programs, My videos" />
	<META name="revisit-after" content="28 days" />
	<META name="expires" content="28 days" />
  <title>Home page</title>
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
		      <a href="index.php" class="white">English</a>
		      <a href="kezdooldal.php" class="white">Hungarian</a>
		    </li>
		  </ul>
		</div>
		<div class="menu">
		  <ul>
			<li><a class="white activeg" href="index.php">Home page</a></li>
			<li class="li-main-menu1">
			  <span class="open-submenu1" ondblClick="location.href='php/eng/game-programs/game-programs.php';">Game programs <span class="arrow down"></span></span>
			  <ul class="ul-submenu1">
				<li><a class="white" href="php/eng/game-programs/game-programs-on-the-website/game-programs-on-the-website.php">Game programs on the website</a></li>
				<li><a class="white" href="php/eng/game-programs/games-download/games-download.php">Games download</a></li>
			  </ul>
			</li>
			<li class="li-main-menu2">
			  <span class="open-submenu2" ondblClick="location.href='php/eng/my-videos/my-videos.php';">My videos <span class="arrow down"></span></span>
			  <ul class="ul-submenu2">
				<li><a class="white" href="php/eng/my-videos/sa-videos/videos.php">My small animals videos</a></li>
				<li><a class="white" href="php/eng/my-videos/sdg-videos/videos.php">My self-developed game programs videos</a></li>
			  </ul>
			</li>
			<li><a class="white" href="#">Portfolio website</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
  </header>

  <div class="marquee marquee--outer-part">
    <marquee>Welcome to my site!</marquee>
  </div>

  <main class="main">	
    <h1>Home page</h1>
    <p><span>Home page:</span> Here you can see what main contents is on my page.</p>

    <p><span onClick="location.href='php/eng/game-programs/game-programs.php';">Game programs:</span> Game programs on the website my developments or download.</p>

    <p><span onClick="location.href='php/eng/my-videos/my-videos.php';">My videos:</span> My small animals videos and self-developed game programs videos.</p>

    <div align="right"><p>Wish you a look.</p></div>
  </main>

  <div class="carousel">
    <iframe src="php/carousel/carouselen.php" width="276px" height="184px"></iframe>
  </div>

  <div class="sidebar">
    <iframe name="Chat" src="php/eng/chat/dispatch.php" width="100%" height="380px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe>
  </div>

  <footer class="footer footer--outer-part">
    <p>Adam Nagy website.</p>
  </footer>

  <script type="text/javascript" src="js/jQuery.js"></script>
  <script type="text/javascript" src="js/script.js"></script>

</body>
</html>
