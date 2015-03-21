<?php  /**Script that delete the file selected */

	//Recuperiamo il file dal database
	$query="SELECT * FROM File WHERE IDfile=".$cosa;
	$ris=mysql_query($query) or die("Elimina file 0 query error");
	$visi="";
	$iduser="";
	while($temp=mysql_fetch_array($ris)){
			$visi=$temp['visibilita'];
			$iduser=$temp['IDuser'];
	}
	$query="DELETE FROM File WHERE IDfile=".$cosa;
	$ris=mysql_query($query) or die ("Elimina file query error");
	$target_path="/home/emanuele/public_html/Progetto_JSI/File/";
		// SE E UN ADMIN
		if ($tipo_utente=='1'){
			if($visi=='pubblico'){
				$target_path.="public/".$cosa;
			}else{
				$query="SELECT * FROM Utenti WHERE IDuser=".$iduser;
				$ris=mysql_query($query) or die("Elimina file admin query fallita");
				$username="";
				while($temp=mysql_fetch_array($ris)){
					$username=$temp['username'];
				}
				$target_path.=$username."/".$cosa;
			}
			unlink($target_path);
			$risp="eliminazione_file_eseguita_admin";
		}
		//SE E UN UTENTE
		else{
			if($visi=='pubblico'){
				$target_path.="public/".$cosa;
			}else{
				$target_path.=$_SESSION['user']."/".$cosa;
			}
			unlink($target_path);
			$risp="eliminazione_file_eseguita_utente";
		}	
	echo $risp;	
?>
