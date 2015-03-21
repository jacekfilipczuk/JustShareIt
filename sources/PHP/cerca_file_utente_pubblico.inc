<?php /**File that execute the research of a file*/

//Costruisco la tabella con i risultati
//Intestazione della tabella
echo "<table cellpadding='15'><tr><th>Nome File</th><th>Visualizza dettagli</th><th>Scarica file</th></tr>";
/*Nella costruzione della tabella l'ID del file viene inserito nei button per tenerne 
 * memoria nelle funzioni JS
 */ 
while ($tupla=mysql_fetch_array($risultato)){
	$nomeFile=$tupla['nome'];
	$IDfile=$tupla['IDfile'];
	$target_path1="downloader.php?IDfile=".$IDfile."&vis=pubblico&nomeF=".$nomeFile;
	echo "<tr>";
	echo "<td> $nomeFile</td>";
	echo "<td><input type='button' id='Visualizza","$IDfile' onclick='visualizza_file($IDfile)' value='Visualizza'></td>";
	echo "<td> <a href='$target_path1' target='_blank'><input type='button' id='Scarica","$IDfile'  value='Scarica'></a></td>";
	echo "</tr>";
}//fine while
echo "</table>";

?>
