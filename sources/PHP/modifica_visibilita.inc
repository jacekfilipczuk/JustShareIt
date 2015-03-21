<?php  /**SCRIPT THAT CHANGE VISIBILITY OF A FILE */
	
	$vis='';
	$sql="SELECT * FROM File WHERE IDfile=".$cosa;
	$ris=mysql_query($sql) or die ("Visibility Query Error");
	while ($tupla=mysql_fetch_array($ris)){
		$vis=$tupla['visibilita'];
	}
	$query="UPDATE File SET visibilita='";
	//Cambia la visibilita da pubblica a privata
	if ($vis=='pubblico'){
		$query.='privato';
		$vis='privato';
	}
	else{ //Cambia la visibilita da privata a pubblica
		$query.='pubblico';
		$vis='pubblico';
	}
	$query.="' WHERE IDfile=".$cosa;
	mysql_query($query) or die ("Visibility query error");
	$query="SELECT * FROM Utenti WHERE IDuser=".$_SESSION['IDuser'];
	$ris=mysql_query($query) or die("Query Spostamento file fallito");
	$username="";
	while($tupla=mysql_fetch_array($ris)){
			$username=$tupla['username'];
	}
	$target_path="/home/emanuele/public_html/Progetto_JSI/File/";
	$dest="";
	$source="";
	//SE $vis è pubblico spostiamo il file dalla cartella dell'utente a quella pubblica
	if($vis=='pubblico'){
		$source=$target_path.$username."/".$cosa;
		$dest=$target_path."public/".$cosa;
		if(!copy($source,$dest)){
			$vis="errore_visibilita";
		}
		unlink($source);
	}
	//SE $vis è privato spostiamo il file dalla cartella pubblica a quella dell'utente
	else{
		$dest=$target_path.$username."/".$cosa;
		$source=$target_path."public/".$cosa;
		if(!copy($source,$dest)){
			$vis="errore_visibilita";
		}
		unlink($source);
	}
	echo $vis;
?>
