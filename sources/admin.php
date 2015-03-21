<?php
	//Acquisizione dati sessione
	session_start();
	if(!isset($_SESSION['user'])){
		header('Location: PHP/errore.php');
		}
	$user=$_SESSION['user'];
?>

<!DOCTYPE html>

<html lang="en">


<head>
<meta charset="utf-8">
<title>  JSI - Just Share It  </title>

<!--css di layout-->
<link type="text/css" rel="stylesheet" href="utente.css" media="all">

<!--css z-index dei element_x-->
<link type="text/css" rel="stylesheet" href="stile/z_index.css" media="all">

<!--import libreria utilità generale -->
<script type="text/javascript" src="script/utility_lib.js"></script>

<!--import libreria funzioni ajax -->
<script type="text/javascript" src="script/funzioni_ajax.js"></script>



<!--script per l'interattività del menu-->
<script type="text/javascript" src="script/visibility.js"> </script>


<noscript>
	<h1> Spiacenti, ma il tuo browser non supporta Javascript oppure è stato disibilitato nelle opzioni </h1>
</noscript>
</head>


<body>
	
	<!--TUTTO IL FOGLIO PRINCIPALE -->
	<div id="contenitore">
	
	
	
	
	
	
	
	
	
	
	
	<!--HEADER-->
	<div id="header">
		<img id="logo" src="images/logo/logo.png" width="400">
		&nbsp;
	</div> <!--fine header-->
	
	
	
	
	
	
	
	
	
	<!--COLONNA SINISTRA -->
	<div id="colsx">
		
		<!--menu-->
		<div id="menu">
		<ul id="list_menu">
			<li><a href="#" onclick="window.location.reload()"> Home </a></li>
			<li><a href="#" onclick='showdiv(2)'>Cos'è JSI </a></li>
			<li><a href="#" onclick='showdiv(3)'>Perchè JSI?</a></li>
			<li><a href="#" onclick='showdiv(4)'>Funzionalità</a></li>
			<li><a href="#" onclick='showdiv(5)'>Contatti</a></li>
			<li><a href="logout.php"> Logout</a></li>
			<li><a href="#" onclick="showdiv(1)"> <?php echo 'Benvenuto ',$user; ?></a></li>

		</ul>
		<!--fine list_menu-->
		</div> <!--fine menu -->
		
		<!-- ELEMENTI STATICI DEL MENU-->
		<div id=element_1>
			<span class="span_ele">
				&nbsp;<br>
				&nbsp;<br>
				&nbsp;<br>
				<p id="segno_descrizione">
					Benvenuto su Just Share It
				</p>
				<br>
				<img id="segno" src="images/logo/segno.png">
				 </span>
		</div>
		
		<div id=element_2 class="div_ele">
			<span class="span_ele">
				JSI si propone di essere un sito di file sharing che offre anche altre funzionalità comode per l'utente! 
				<p>
				</p>
				<br> &nbsp;
				<br> &nbsp;Scegli anche tu la comodità di JSI! </span>
		</div>
		
		<div id=element_3 class="div_ele">
			<span class="span_ele">
				JSI nasce dall'idea di riunire in un unico software funzionalità differenti e utili come la gestione delle notifiche e della messaggistica. 
				<p>
				</p>Qui puoi condividere i tuoi file tra gli amici più stretti! 
				<br> &nbsp;
				<br> &nbsp;
				<br> &nbsp;Diventa un nostro amico anche tu!</span>
		</div>
		
		<div id=element_4 class="div_ele">
			<span class="span_ele"> 
				JSI offre una serie di funzionalità quali il servizio di messaggistica interno al sito, ovvero una casella di posta privata per ogni utente. 
				&nbsp;<br>
				&nbsp;<br>Inoltre vi è la possibilità di avere una lista di amici con i quali condividere i file, oltre alla possibilità di rendere i file direttamente disponibili al pubblico.
				
				Cosa aspetti? Unisciti anche tu alla community di JSI!</span>
		</div>
		
		<div id=element_5 class="div_ele">
			<span class="span_ele">
			Per ogni dubbio puoi mandare una mail all'indirizzo: JustShareItFaq@yahoo.it 
			<br>Provvederemo ad una rapida risposta!
			</span>
		</div>
		
		<div id=element_6>
		</div>
		
	</div> <!--fine colsx-->
	
	
	
	
	
	
	
	
	
	<!--COLONNA DESTRA-->
	<div id="coldx">
		<!-- INIZIO MENU_1-->
		<div id="menu_1">
		<!-- CERCA UN FILE -->
		<div class="div_dx" id='cerca'>
			<form>
			<fieldset class='fieldset'>
				<table class=tabella>
				<tr>
					<td>Nome del file:</td> 
				</tr>
				<tr>
					<td> <input type='text' maxlength=50 id='text_file' class='input_type'></td>
				</tr>
				<tr>
				<td colspan='2'><input type=button value="Cerca" onclick="cerca('file')" align=center> </td>
				</tr>
				</table>
			</fieldset>
			</form>
		</div> <!--Fine cerca file -->
		
	
			<!-- CERCA UN UTENTE -->
			<div class="div_dx" id='cerca1'>
				<form>
				<fieldset class='fieldset'>
					<table class=tabella>
					<tr>
						<td>Nome dell'utente: </td> 
					</tr>
					<tr>
						<td> <input type='text' maxlength=30 id='text_utente' class="input_type"></td>
					</tr>
					<tr>
					<td colspan='2'><input type=button value="Cerca" onclick="cerca('utente')"  align=center> </td>
					</tr>
					</table>
				</fieldset>
				</form>
			</div> <!--fine CERCA UN UTENTE -->
		
		</div> <!-- fine MENU_1 -->
	</div> <!--fine coldx-->
	
	
	
	
	
	
	
	
	
	<!--FOOTER-->
	<div id="footer" class="clearlft">
		JSI - Just Share It, è un progetto del corso di Ingegneria del software, sviluppato da 
		Jacek Filipczuk e Emanuele Pesce  
	</div> <!--fine footer-->
	
	
	
	</div>   <!--fine div contenitore-->

</body>

</html>

