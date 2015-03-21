<?php  /**Function tha download the file from the server*/
	
	
	
	$target_path="File/";
	//Acquisizione parametri
	$visibilita=$_GET['vis'];
	$IDfile=$_GET['IDfile'];
	$nome=$_GET['nomeF'];
	
	//Se è un file pubblico lo scarica dalla cartella pubblica
	if ($visibilita=='pubblico'){
		$target_path.="public/".$IDfile;
		forceDownload($target_path);
	}
	//Altrimenti è un file privato e lo scarica dalla cartella dell'utente
	else{
		$user=$_GET['nomeU'];
		$target_path.=$user."/".$IDfile;
		forceDownload($target_path);
	}
	
	/**
	 * Function forceDownload:download any type of file if it exists and is readable
	 * @param $file the path of the file
	 */
	function forceDownload($file) {
	
	 global $nome;
	if(file_exists($file) && is_readable($file)) {
		$filename = basename($file);
		if(strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), 'MSIE') !== false && strpos($filename, '.') !== false) {
			$parsename = explode('.', $filename);
			$last = count($parsename) - 1;
			$filename = implode('%2E', array_slice($parsename, 0, $last));
			$filename .= '.'.$parsename[$last];
		}
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.$nome.'"');
		header('Content-Length:'.filesize($file));
		header('Content-Transfer-Encoding: binary');
		if(@$file = fopen($file, "rb")) {
			while(!feof($file))
				echo fread($file, 8192);
			fclose($file);
		}
		exit(0);
	}
}

?>
