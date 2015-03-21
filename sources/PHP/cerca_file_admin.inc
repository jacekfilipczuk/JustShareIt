<?php /**File that execute the research of a file*/

$risultato=mysql_query($query);

//Intestazione della tabella
echo "<tr><th>Nome File</th><th>Visualizza dettagli</th><th>Elimina file</th></tr>";


/*Nella costruzione della tabella l'ID del file viene inserito nei button per tenerne 
 * memoria nelle funzioni JS
 */ 
while ($tupla=mysql_fetch_array($risultato)){
	$nomeFile=$tupla['nome'];
	$IDFile=$tupla['IDfile'];
	echo "<tr>";
	echo "<td> $nomeFile</td>";
	echo "<td><input type='button' id='Visualizza","$IDFile' onclick='visualizza_file($IDFile)' value='Visualizza'></td>";
	echo "<td> <input type='button' id='Elimina","$IDFile' onclick='elimina_file($IDFile)' value='Elimina'></td>";
	echo "</tr>";
}//fine while

?>
