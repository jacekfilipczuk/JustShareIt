<?php
session_start();
session_destroy();
?>
<html>
	
<head>

<title> Registrazione effettuata </title>

<link rel="stylesheet" href="utente.css" type="text/css">

<style type="text/css">
a {
color: white;
}
</style>
</head>

<body>
<div id=contenitore>

<div id=header>
	<img id="logo" src="images/logo/logo.png" width="400">
		
</div> <!-- FINE HEADER -->

<div id=corpo style="min-height: 600px;">
	<span>
	<h1 align=center style={font-size:30px}> Logout effettuato</h1>
	<p> <h2 align=center style={font-size:20px}> </h2></p>
	<p><h3 align=center style={font-size:16px}> Clicca se vuoi alla <a href=index.html> Home Page</a></h3></p>
	</span>
</div><!-- FINE CORPO-->
<div id=footer>
JSI - Just Share It, è un progetto del corso di Ingegneria del software, sviluppato da Jacek Filipczuk e Emanuele Pesce  
</div><!-- CORPO -->
</div> <!--FINE CONTENITORE -->

	
	
</div>


</body>

</html>
