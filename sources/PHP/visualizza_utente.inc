<?php /**Script for details visualitation of a user */

	$query="SELECT * FROM Utenti WHERE IDuser=".$cosa;
	$res=mysql_query($query) or die ("Visualizza utente query error");
	
	echo "<h1 align=center> Dettagli utente</h1>";
	echo "<table cellpadding=15 ><tr><th> Campo </th>  <th>Valore </th></tr>";
	while ($tupla=mysql_fetch_array($res)){
			echo "<tr> <td> Cognome</td><td>",$tupla['cognome'],"</td></tr>";
			echo "<tr> <td> Nome</td><td>",$tupla['nome'],"</td></tr>";
			echo "<tr> <td> E-mail</td><td>",$tupla['email'],"</td></tr>";
	}
	echo "</table>";
?>
