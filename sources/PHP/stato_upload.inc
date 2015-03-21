<?php /** Script that create the Javascript name of the function after the Uplaod of a file*/
	
	//Se s è settata significa che è stato effettuato un operazione di Upload
	if (isset($_SESSION['s'])){
		if ($_SESSION['s']=='upload'){
			echo "mostra_myfile();showMenu('menu_4');alert('File caricato correttamente')";
		}
		else{
			echo "mostra_myfile();alert('Non è stato possibile caricare il file')";
		}
		unset($_SESSION['s']);
	}
?>
