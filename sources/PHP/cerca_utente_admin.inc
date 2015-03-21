<?php /**File that execute the research of a user*/

$risultato=mysql_query($query);
//Intestazione della tabella
echo "<tr><th>Username</th><th>Visualizza dettagli</th><th>Rimuovi utente</th></tr>";

/*Nella costruzione della tabella l'ID del utente viene inserito nei button per tenerne 
* memoria nelle funzioni JS
*/ 
while ($tupla=mysql_fetch_array($risultato)){
$nomeUtente=$tupla['username'];
if($tupla['isAdmin']!='true'){
	$IDutente=$tupla['IDuser'];
	echo "<tr>";
	echo "<td> $nomeUtente</td>";
	echo "<td><input  type='button'  id='Visualizza"."$IDutente' onclick='visualizza_utente($IDutente)' value='Visualizza'></td>";
	echo "<td> <input type='button'  id='Rimuovi"."$IDutente'     onclick=\"rimuovi_utente($IDutente);cerca('utente')\" value='Rimuovi'></td>";
	echo "</tr>";
}
}//fine while
?>
