<?php /**Function that create the form Modifica Password */
	
echo "<span >";
echo "</table>";
echo "<form>";
echo "<h1 style='font-size:16px' align=center >Modifica Password</h1><table cellpadding=15>";
echo "<tr><td>Vecchia Password</td><td><input type='password' name='username'   maxlength=50  id=old_password  > <br><span id=span_username></span></td></tr>";
echo "<tr><td>Nuova Password</td><td><input type='password' name='password' maxlength=50 id=inseriscipassword   onkeyup=\"verifica_password(this);verifica_reinserimento(getObj('inseriscipassword2'))\"> <br> <span id=span_password></span></td></tr>";
echo "<tr><td>Reinserisci Nuova Password</td><td><input type='password'  maxlength=50   id=inseriscipassword2  onkeyup='verifica_reinserimento(this)'> <br><span id=span_reinserisci_password></span></td></tr>";
echo "<tr><td><input type='reset' value='Azzera Tutto'></td><td><input type='button' id='id_modifica_password' onclick='modifica_password(",$_SESSION['IDuser'],")' value='Modifica Password'></td></tr>";
echo "</form>";		
echo "</span>";
?>
