<?php /**Server of the system*/

	session_start();
	//Importo librerie di uso generale
	require_once('PHP/funzioni.inc');
	
	$con=connetti("JSI");
	
	if (isset($_GET['cosa'])){
		/**Acquisizione parametri. 
		 * cosa: contiene i parametri passati 
		 * dove: indica la funzionalità da eseguire 
		 */ 
		$cosa=$_GET['cosa'];
		$dove=$_GET['dove'];	
		
		//Costruisce la query di base che verrà utilizzata da molte funzionalità
		$query=costruisci_query($cosa, $dove);
	}
	
	/**************************INIZIO UTENTE PUBBLICO***********************************/
	if(!isset($_SESSION['tipo_utente'])){
		//completamento della query di base
		$query.="AND visibilita='pubblico'";
		$risultato=mysql_query($query);
		
		echo "<FONT color=white>";
		//E' UNA FUNZIONALITÀ RIGUARDANTE UN FILE
		if ($dove=='file'){
			//E' UNA RICERCA DI UN FILE
			require_once('PHP/cerca_file_utente_pubblico.inc');
		}
		//E' UNA VISUALIZZAZIONE DEI DETTAGLI FILE
		else if ($dove=='visualizza_file'){
			require_once('PHP/visualizza_file.inc');
		}
		echo "</FONT>";
	} //FINE UTENTE PUBBLICO
	
	else{  //Si tratta di utente: un admin o un utente registrato.
	$tipo_utente=$_SESSION['tipo_utente'];

	/**************************INIZIO ADMIN***********************************/
	if($tipo_utente==1){
		//Costruisco la tabella con i risultati
		echo "<FONT color=white><table cellpadding='15'>";
		//Se è un file
		if ($dove=='file'){
			//E' UNA RICERCA DI UN FILE
			require_once('PHP/cerca_file_admin.inc');
		}
		//E' UNA VISUALIZZAZIONE DEI DETTAGLI FILE
		else if ($dove=='visualizza_file'){
			require_once('PHP/visualizza_file.inc');
		}
		//E' UNA VISUALIZZAZIONE DEI DETTAGLI UTENTE
		else if ($dove=='visualizza_utente'){
			require_once('PHP/visualizza_utente.inc');
		}
		//E' UNA ELIMINAZIONE DI UN UTENTE
		else if ($dove=='rimuovi_utente'){
			require_once('PHP/rimuovi_utente.inc');
		}
		//E'UNA ELIMINAZIONE FILE
		else if ($dove=='elimina_file'){
			require_once('PHP/elimina_file.inc');
		}
		else{ 
			//E UNA RICERCA UTENTE
			require_once('PHP/cerca_utente_admin.inc');
		}
		echo "</table></FONT>";
	}// FINE ADMIN
	
	
	
	/**************************INIZIO UTENTE REGISTRATO***********************************/
	else if($tipo_utente==0){
		//FUNZIONALITÀ AGGIUNGI / RIMUOVI AMICO
		if (isset($_GET['IDfriend'])){
			require_once('PHP/change_amico.inc');
		}
		else{ 
		//FUNZIONALITA MODIFICA VISIBILITA
		if ($dove=='modifica_visibilita'){
			require_once('PHP/modifica_visibilita.inc');
		}	
		else{
		//Costruisco la tabella con i risultati
		echo "<FONT color=white><table cellpadding='15'>";
		//SE È UN FILE
		if ($dove=='file'){
			//E' UNA RICERCA FILE
			require_once('PHP/cerca_file_utente.inc');
		}
		//E UNA  MODIFICA DI UN FILE
		else if ($dove=='modifica_file'){
			require_once('PHP/modifica_file.inc');
		}
		//E' UNA VISUALIZZAZIONE DEI DETTAGLI FILE
		else if ($dove=='visualizza_file'){
			require_once('PHP/visualizza_file.inc');
		}
		//E' UNA VISUALIZZAZIONE DEI DETTAGLI UTENTE
		else if ($dove=='visualizza_utente'){
			require_once('PHP/visualizza_utente.inc');
		}
		//E' UNA RICHIESTA DI MODIFICA PASSWORD
		else if ($dove=='modifica_password'){
			//creazione form
			if ($cosa=='form'){
				require_once('PHP/visualizza_modifica_password.inc');
			}
			//elaborazione query
			else{
				require_once('PHP/modifica_password.inc');
			}
		}
		//E' UNA RICHIESTA DI UPLOAD FILE
		else if ($dove=='upload_file'){
			//creazione form
			if ($cosa=='form'){
				require_once('PHP/visualizza_upload_file.inc');
			}
			//elaborazione query
			else{
				require_once('PHP/upload_file.inc');
			}
		}
		//E UNA ELIMINAZIONE FILE
		else if ($dove=='elimina_file'){
			require_once('PHP/elimina_file.inc');
		}
		else{
			//E' UNA RICERCA UTENTE
			require_once('PHP/cerca_utente_utente.inc');		
		}
		echo "</table></FONT>";
	}//fine else per evitare modifica visibilita 
	
	}// fine if ricerca
	
	}//FINE UTENTE REGISTRATO	
	
	}//fine riconoscimento utente 
?>
