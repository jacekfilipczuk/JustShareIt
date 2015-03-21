<?PHP /** SCRIPT THAT ELIMINATE AN USER FROM THE SYSTEM AND ALL HIS PRIVATE FILES*/
	//Effettuo la query per recuperare username dell'utente
	 $query="SELECT * FROM Utenti where IDuser=".$cosa;
	 $ris=mysql_query($query) or die("Query rimuovi utente 0 fallita");
	 $username="";
	  while($tupl=mysql_fetch_array($ris)){
			$username=$tupl['username'];
	 }
	 $query="DELETE FROM Utenti where IDuser=".$cosa;
	 $ris=mysql_query($query) or die ("Query rimuovi utente 1 fallita");
	 $query="DELETE FROM File WHERE IDuser is null AND visibilita='privato'";
	 $ris=mysql_query($query) or die("Query rimuovi file utente eliminato fallita");
	 
	 /**
	 *	Pattern function that remove the user's folder with all his files
	 * @param $dir path of the user's directory
	 */
	 function rrmdir($dir) { 
	   if (is_dir($dir)) { 
	     $objects = scandir($dir); 
	     foreach ($objects as $object) { 
	       if ($object != "." && $object != "..") { 
	         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
	       } 
	     } 
     reset($objects); 
     rmdir($dir); 
	 } 
	} 
	$stringa="/home/emanuele/public_html/Progetto_JSI/File/".$username;
	rrmdir($stringa); 
?>
