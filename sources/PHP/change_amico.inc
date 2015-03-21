<?php /**File that modify the friend list of a user */
	
	//Acquisizione dati 
	$IDfriend=$_GET['IDfriend'];
	$operazione=$_GET['operazione'];
	$IDuser=$_SESSION['IDuser'];

	//RICONOSCIMENTO OPERAZIONE
	if ($operazione=='aggiungi'){
		//E' un aggiunta di un utente alla lista amici
		$query="SELECT * FROM ListAmici WHERE IDuser=$IDuser AND IDfriend=$IDfriend";
		//Variabile che indica se l'operazione ha avuto successo o meno
		$toreturn="successo";
		$res_amico=mysql_query($query) or die (mysql_error($con));
		while ($row_amico=mysql_fetch_array($res_amico)){
			$toreturn="non_aggiunto";
		}
		if ($toreturn=='successo'){
			$query="INSERT INTO ListAmici VALUES ('', '$IDuser', '$IDfriend', 'false')";
			mysql_query($query) or die ("Query Aggiungi amico error");
		}
		echo $toreturn;
		mysql_free_result($res_amico);
	}
	else{
		//E' una rimozione di un utente dalla lista amici
		$query="SELECT * FROM ListAmici WHERE IDuser='$IDuser' AND IDfriend='$IDfriend'";
		//Variabile che indica se l'operazione ha avuto successo o meno
		$toreturn="non_eliminato";
		$res_amico=mysql_query($query) or die ("Query Aggiungi Amico error");
		while ($row_amico=mysql_fetch_array($res_amico)){
			$toreturn="successo_rimuovi";
		}
		if ($toreturn=='successo_rimuovi'){
			$query="DELETE from ListAmici  WHERE IDuser=$IDuser AND IDfriend=$IDfriend";
			mysql_query($query) or die ("Query Aggiungi amico error");
		}
		echo $toreturn;
		mysql_free_result($res_amico);
	}
?>
