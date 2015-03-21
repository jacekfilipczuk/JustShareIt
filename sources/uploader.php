<?php /** Caricamento del file sul server*/

session_start();

require_once("PHP/funzioni.inc");
connetti("JSI");

//acquisizione dati per il file da form 
$nome_file=$_POST['nome_file'];
$descrizione_file=$_POST['descrizione_file'];
$visibilita_file=$_POST['visibilita_file'];


//Acquisizione username utente necessario per creare la cartella

$user=$_SESSION['user'];
$IDuser=$_SESSION['IDuser'];

if($visibilita_file=='privato'){
	$target_path ="/home/emanuele/public_html/Progetto_JSI/File/".$user."/";
}else{
	$target_path ="/home/emanuele/public_html/Progetto_JSI/File/public/";
}




//Inseriamo il file nel database generando così l'ID del file
$query="INSERT INTO File values ('','$IDuser', '$nome_file' ,'$visibilita_file', '$descrizione_file') ";

mysql_query($query) or die ("Upload Query Error");

$IDfile=mysql_insert_id();





$_FILES['uploadedfile']['name']=$IDfile;
$target_path = $target_path.basename($_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
	$_SESSION['s']='upload';
    header("Location: utente.php");
}
else{
	$_SESSION['s']='error';
    header("Location: utente.php");
}


?>
