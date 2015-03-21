<?php /** File that create the query for the my file list*/
	
	$query="SELECT * from File where IDuser=".$_SESSION['IDuser'];
	echo "<h1 color=white align=center> I tuoi file </h1>";
?>
