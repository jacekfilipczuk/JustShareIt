<?php /** File that create the query for the public and private research */

	//Prendiamo chi condivide i file con IDuser
	$sql="SELECT * FROM ListAmici WHERE IDfriend=".$_SESSION['IDuser'];
	$r_temp=mysql_query($sql);
	$query.="AND (visibilita='pubblico' OR (visibilita='privato' AND (";
	//Costruzione della query per la ricerca file dell'utente registrato
	while($row=mysql_fetch_array($r_temp)){
		$query.="IDuser=".$row['IDuser']." OR ";
	}
	$query.="IDuser=".$_SESSION['IDuser'].")))";
	mysql_free_result($r_temp);
?>
