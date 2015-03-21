<?php /**SCRIPT THAT MODIFY A FILE DETAILS */
	
	$query="UPDATE File SET ";
	$array=explode("_",$cosa);//Contiene, in ordine, id del file , nome del file e descrizione del file 
	if ($array[1]!=""){
		$query.="nome='".$array[1]."' ";	
	}
	if ($array[2]!=""){
		if ($array[1]!="")
			$query.=" , ";
		$query.="descrizione='".$array[2]."' ";		
		}
	$query.="where IDfile=".$array[0];
	echo $query;
	mysql_query($query) or die ("Modifca file query error");
	
?>
