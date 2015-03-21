<?php  /** File that controls the user's password and, if correct changes it to a new value*/

	$item=explode("_",$cosa);//Contine in ordine:id utente,nuova password e vecchia password
	$query="SELECT * FROM Utenti WHERE IDuser=".$item[0];
	$ris=mysql_query($query) or die("Query modifica password fallita");
	$risp="modifica_nope";
	while($tupla=mysql_fetch_array($ris)){
		if($item[2]==$tupla['pass']){
			$query="update Utenti set pass='".$item[1]."' where IDuser=".$item[0];
			echo $query;
			mysql_query($query) or die("Query modifica password 2 fallita");
			$risp="modifica_si";
		}
	}
	echo $risp;
?>
