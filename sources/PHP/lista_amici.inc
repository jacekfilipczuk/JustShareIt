<?php /** File that create the query for the visualization of the friend list */

	$query="SELECT * FROM ListAmici WHERE IDuser=".$_SESSION['IDuser'];
	$res_amici=mysql_query($query) or die ("Lista Amici Error Query");
	$IDamici=array();
	while ($tupla_amica=mysql_fetch_array($res_amici)){
		$IDamici[]=$tupla_amica['IDfriend'];
	}
	$cnt=count($IDamici);
	if((count($IDamici)>0)){
		$query="SELECT * from Utenti WHERE IDuser=$IDamici[0]";
		for ($i=1; $i<$cnt; $i++){
			$query.=" OR IDuser=$IDamici[$i]"; 
		}
	}
	echo "<h1 align=center> I tuoi amici </h1>";
?>
