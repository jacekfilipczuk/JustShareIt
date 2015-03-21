<?php /**Script that validate the registration of a new user */
	
	
	require_once("PHP/funzioni.inc");
	
	$con=connetti("JSI");
	
	//Se si proviene da AJAX
	//PERCHE VARIABILI PASSATE CON POST VENGONO INVIATE SOLO CON LA SUBMIT
	if (!isset($_POST['username'])){
		
		//Acquisizione valore IDuser
		$username=$_GET['IDuser'];
		
		$query="SELECT * FROM Utenti WHERE username='".$username."'";
		
		$ris=mysql_query($query) or die ("Verifica username query error");
		
		$check="valido";
		while ($tupla=mysql_fetch_array($ris)){
			$check="non_valido";
		} 
		
		echo $check;
	}//fine IF
	
	//SI VUOLE FARE LA REGISTRAZIONE
	else{
		$query="INSERT INTO Utenti values('','".$_POST['cognome']."','".$_POST['nome']."','".$_POST['email']."','".$_POST['username']."','".$_POST['password']."','false')";
		
		mysql_query($query) or die ("Registrazione query errore");
		
		$target_path="/home/emanuele/public_html/Progetto_JSI/File/".$_POST['username'];
		mkdir ($target_path, 0777);
		$target_path.="/";
		chmod($target_path,0777);
		header("Location:registrazione_complete.html");
	}
?>
