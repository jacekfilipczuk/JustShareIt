<?php   /** SCRIPT THAT SHOWS THE DETAILS OF A FILE */

	$query="SELECT * FROM File WHERE IDfile=".$cosa;
	$res=mysql_query($query) or die ("Visualizza file query error");
	
	echo "<h1 align=center> Dettagli file</h1>";
	echo "<table style='float:left; font-size:16px;' cellpadding=15 ><tr><th> Campo </th>  <th class='cella'> Valore </th></tr>";
	$id_proprietario=0;
	while ($tupla=mysql_fetch_array($res)){
			echo "<tr> <td class='cella'> Nome</td><td>",$tupla['nome'],"</td></tr>";
			echo "<tr> <td class='cella'> Visibilità</td><td>",$tupla['visibilita'],"</td></tr>";
			echo "<tr> <td> Descrizione</td><td>",$tupla['descrizione'],"</td></tr>";
			$id_proprietario=$tupla['IDuser'];
	}
	//Controllo se è un utente pubblico
	if(isset($_SESSION['tipo_utente'])){
		//Controllo se l'utente non è un admin
		if ($_SESSION['tipo_utente']!='1'){
			if($id_proprietario==$_SESSION['IDuser'])
				echo "<tr><td colspan=2><input type=button value='Modifica Informazioni File' id=modifica_file onclick='visualizza_mod_file()'</td></tr>";
		}
	}
	echo "</table><br>";
	//Div Modifica Informazioni File
	echo "<div>";	
	echo "<span id=span_modifica_file style='display:none'> ";
	echo "<table cellpadding=14>";
	echo "<tr><th>Campo</th><th>Nuovo Valore</th></tr>";
	echo "<tr><td>Nuovo Nome</td><td><input type=text maxlength=50 id=nuovo_nome_file></td></tr>";
	echo "<tr><td>Nuova Descrizione</td><td><textarea maxlength=200 autpocomplete='off' cols=22 style='resize:none' id=nuovo_descrizione_file> </textarea></td></tr>";
	echo "<tr><td align=center colspan=2><input type=button value='Modifica informazioni' id=invia_modifica_file onclick='modifica_file(",$cosa,")'</td></tr>";
	echo "</table>";
	echo "</span>";
?>
