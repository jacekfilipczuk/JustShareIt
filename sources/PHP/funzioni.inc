<?php /**General function */ 
	
	/**
	 * Function that create query for a search
	 * @param $cosa argument of the search
	 * @param $dove the scope of the search (file or user)
	 * 
	 * @return $query string that containing the query
	 */ 
	function costruisci_query($cosa, $dove){
		
		$query="SELECT * from ";
		
		//riconosco se si tratta di ricerca su file o di utenti
		if ($dove=='file'){
			$query .= "File where nome";
		}
		else{
			$query .= "Utenti where username";
		}
		$query.= " like '%".$cosa."%' ";
		return $query;
	}
	
	
	/******************* DATABASE CONNECTION FUNCTION*************************************/
	/**
	 * Function that make connection with the database
	 * @param $database database 
	 * @return $con connection reference
	 */ 
	function connetti($database) {
		$con=@mysql_connect("localhost","root","") or die("Connection Failed");
		@mysql_select_db($database,$con) or die("Database $database Selection failed");
		return $con;
	}
	
	/**
	 * Function that verify user and password of a user
	 * @param $user username
	 * @param $pass password
	 * @return -1: login error, 0: user access, 1: admin access
	 */ 
	function verifica ($user, $pass){
			$con=connetti("JSI");
			$query="SELECT * from Utenti";
			$risultato=mysql_query($query);
			$flag=-1;
			while($tupla=mysql_fetch_array($risultato)){
				if (( ($tupla['username'])==$user) && ($tupla['pass'])==$pass){
					if (($tupla['isAdmin'])=="true"){
						//è admin
						$flag=1;
					}
					//è un user
					else {
						$flag=0;
						$_SESSION['IDuser']=$tupla['IDuser'];
					}
				} //fine if
			}//fine while
			mysql_free_result($risultato);
			mysql_close($con);
			return $flag;
	}
?>
