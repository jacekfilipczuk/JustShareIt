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

<!--css per la visualizzazione dei menù-->
<link type="text/css" rel="stylesheet" href="stile/menu.css" media="all">

<!--css z-index dei element_x-->
<link type="text/css" rel="stylesheet" href="stile/z_index.css" media="all">

<!--import libreria utilità generale -->
<script type="text/javascript" src="script/utility_lib.js"></script>

<!--import libreria funzioni ajax -->
<script type="text/javascript" src="script/funzioni_ajax.js"></script>

<!--import libreria funzioni registrazione -->
<script type="text/javascript" src="script/registrazione.js"></script>

<!--script per l'interattività del menu-->
<script type="text/javascript" src="script/visibility.js"> </script>


<noscript>
	<h1> Spiacenti, ma il tuo browser non supporta Javascript oppure è stato disibilitato nelle opzioni </h1>
</noscript>
</head>


<body onload="<?php require_once('PHP/stato_upload.inc'); ?>">
	
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
			<li><a href="#" onclick="showMenu('menu_1');showdiv(1)">Home </a></li>
			<li><a href="#" onclick='showdiv(2)'>Cos'è JSI </a></li>
			<li><a href="#" onclick='showdiv(3)'>Perchè JSI?</a></li>
			<li><a href="#" onclick='showdiv(4)'>Funzionalità</a></li>
			<li><a href="#" onclick='showdiv(5)'>Contatti</a></li>
			<li><a href="logout.php" onclick=""> Logout</a></li>
			<li><a href="#" onclick="showMenu('menu_2');showdiv(1)"> <?php echo 'Benvenuto ',$user; ?></a></li>
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
			<!-- Div dove vengono visualizzati i risultati delle ricerche -->
		</div>
		
		
		
	</div> <!--fine colsx-->
	
	
	
	
	
	
	
	
	
	<!--COLONNA DESTRA-->
	<div id="coldx">
		
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
				<td colspan='2'><input type='button' value="Cerca" onclick="cerca('file')" align=center> </td>
				</tr>
				</table>
			</fieldset>
			</form>
		</div> <!--Fine cerca file -->
		
		
		<!-- MENU GENERALE -->
		<div id='menu_1'>
		
			
			<!--CASELLA POSTALE -->
			<div class="funzionalita">
				<form>
					<fieldset class='fieldset'>
						<p><input type="button" class="bottone" value="Casella Postale">
					</fieldset>
				</form>
			</div> <!-- fine CASELLA POSTALE-->
			
			<!--PROFILO UTENTE -->
			<div  class="funzionalita">
				<form>
					<fieldset class='fieldset'>
						<p><input type="button" class="bottone" onclick="showMenu('menu_2')" value="Profilo Utente">
					</fieldset>
				</form>
			</div> <!-- fine PROFILO UTENTE -->
			
			<!--LISTA AMICI -->
			<div  class="funzionalita">
				<form>
					<fieldset class='fieldset'>
						<p><input type="button" class="bottone" onclick="showMenu('menu_3');mostra_list_amici()" value="Lista Amici">
					</fieldset>
				</form>
			</div> <!-- fine LISTA AMICI -->
			
			<!--MY FILE -->
			<div  class="funzionalita">
				<form>
					<fieldset class='fieldset'>
						<p><input type="button" class="bottone" onclick="showMenu('menu_4');mostra_myfile()" value="My Files">
					</fieldset>
				</form>
			</div> <!-- fine MY FILE-->
		
		
		</div> <!-- fine MENU GENERALE -->
		
		
		<!-- MENU PROFILO UTENTE-->
		<div id='menu_2'>
	
			
			<!--MODIFICA PASSWORD -->
			<div class="funzionalita">
				<form>
					<fieldset class='fieldset'>
						<p><input type="button" class="bottone" onclick="visualizza_modifica_password()" value="Modifica Password">
					</fieldset>
				</form>
			</div> <!-- fine  MODIFICA PASSWORD-->
			
			<!--RICHIESTA CANCELLAZIONE ACCOUNT -->
			<div  class="funzionalita">
				<form>
					<fieldset class='fieldset'>
						Richiesta Cancellazione Account
						<p><input type="button" class="bottone"  onclick="richiesta_cancellazione()"value="Richiedi">
					</fieldset>
				</form>
			</div> <!-- fine RICHIESTA CANCELLAZIONE ACCOUNT-->
			
		
		</div> <!-- fine MENU PROFILO UTENTE-->
		
		
		
		<!-- MENU LISTA AMICI -->
		<div id='menu_3'>
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
			</div> <!--Fine cerca utente -->
			
			
		
		
		</div> <!-- fine MENU LISTA AMICI -->
		
		
		<!-- MENU MY FILE -->
		<div id='menu_4'>
			
			
			<!--UPLOAD FILE -->
			<div class="funzionalita">
				<form>
					<fieldset class='fieldset'>
						<p><input type="button" class="bottone" onclick='visualizza_upload_file()' value="Upload File">
					</fieldset>
				</form>
			</div> <!-- fine UPLOAD FILE-->
			
			
			
		
		
		</div> <!-- fine MENU MY FILE -->
		
	</div> <!--fine coldx-->
	
	
	
	
	
	
	
	
	
	<!--FOOTER-->
	<div id="footer" class="clearlft">
		JSI - Just Share It, è un progetto del corso di Ingegneria del software, sviluppato da 
		Jacek Filipczuk e Emanuele Pesce  
	</div> <!--fine footer-->
	
	
	
	</div>   <!--fine div contenitore-->

</body>

</html>

