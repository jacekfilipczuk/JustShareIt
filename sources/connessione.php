<?php /** Script that redirect at rispective page*/


	//apro le sessioni
	session_start();

	//Importo le librerie
	require_once("PHP/funzioni.inc");
	
	//Acquisizione dati utente
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	
	//parametro user per la visualizzazione nelle rispettive pagine
	$_SESSION['user']=$user;
	
	//Controllo username e password e reindirizzamento di pagina
	$v=verifica($user, $pass);
	switch ($v){
		case 0: {
			$_SESSION['tipo_utente']=0;
			header("Location: utente.php");
			break;
		}
		case '1':{
			$_SESSION['tipo_utente']=1;
			header("Location: admin.php");
			break;
		}
		
		default: {
			header("Location: errore.php");
		}
	}
?>
