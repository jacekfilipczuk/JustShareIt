<?php /** File that execute a research of a user*/

//CREAZIONE QUERY LISTA AMICI
if ($cosa=='lista_amici'){
	require_once("PHP/lista_amici.inc");
}
$risultato=mysql_query($query);

//Intestazione della tabella
echo "<tr><th>Username</th><th>Visualizza dettagli</th>";

//se stiamo in lista amici non serve il bottone aggiungi amico
if($cosa!='lista_amici'){ 
	echo "<th>Aggiungi amico</th>"; 
}
echo "<th>Rimuovi amico</th><th>Aggiornamenti</th></tr>";


/*Nella costruzione della tabella l'ID del utente viene inserito nei button per tenerne 
 * memoria nelle funzioni JS
 */ 
while ($tupla=mysql_fetch_array($risultato)){
	$nomeUtente=$tupla['username'];
	if($tupla['isAdmin']!='true' && $tupla['IDuser']!=$_SESSION['IDuser']){
		$IDutente=$tupla['IDuser'];
		echo "<tr>";
		echo "<td> $nomeUtente</td>";
		echo "<td><input  type='button' id='Visualizza","$IDutente' onclick='visualizza_utente($IDutente)' value='Visualizza'></td>";
		if($cosa!='lista_amici') echo "<td> <input type='button' id='Aggiungi","$IDutente'    onclick=\"change_amico(",$IDutente,",'aggiungi')","\" value='Aggiungi'></td>";
		echo "<td> <input type='button' id='Rimuovi","$IDutente'     onclick=\"change_amico(",$IDutente,",'rimuovi');","\" value='Rimuovi'></td>"; 
		echo "<td> <input type='button' id='Aggiornamenti","$IDutente' onclick='' value='On/Off'></td>";
		echo "</tr>";
	}
}//fine while

?>
