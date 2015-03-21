<?php /** File that execute a research of a file*/

if($cosa=='myfile'){
	//COSTRUZIONE DELLA QUERY PER I PROPRI FILE
	require_once('PHP/myfile.inc');
	//Intestazione della tabella
	echo "<tr><th>Nome File</th><th>Visualizza dettagli</th><th>Scarica file</th><th> Rimuovi File</th><th>Modifica Visibilità</th></tr>";
}
else {
	//COSTRUZIONE DELLA QUERY PER LA RICERCA DI UN FILE
	require_once('PHP/ricerca_registrato.inc');
	//Intestazione della tabella
	echo "<tr><th width='100'>Nome File</th><th>Visualizza dettagli</th><th>Scarica file</th></tr>";
}
$risultato=mysql_query($query);

/*Nella costruzione della tabella l'ID del file viene inserito nei button per tenerne 
 * memoria nelle funzioni JS
 */ 
while ($tupla=mysql_fetch_array($risultato)){
	$nomeFile=$tupla['nome'];
	$IDFile=$tupla['IDfile'];
	$vis=$tupla['visibilita'];
	$target_path1="downloader.php?IDfile=".$IDFile."&vis=".$vis."&nomeF=".$nomeFile."&nomeU=".$_SESSION['user'];
	echo "<tr>";
	echo "<td> $nomeFile</td>";
	echo "<td><input type='button' id='Visualizza","$IDFile' onclick='visualizza_file($IDFile)' value='Visualizza'></td>";
	echo "<td><a href='$target_path1'> <input type='button' id='Scarica","$IDFile' value='Scarica'></a></td>";
	if ($cosa=='myfile'){
		echo "<td> <input type='button' id='Elimina","$IDFile' onclick='return conferma($IDFile)' value='Elimina'></td>";
		echo "<td> <input type='button' id='Visibilita","$IDFile' onclick='modifica_visibilita($IDFile);myfile()' value='Modifica'></td>";
	}
	echo "</tr>";
}//fine while
?>
