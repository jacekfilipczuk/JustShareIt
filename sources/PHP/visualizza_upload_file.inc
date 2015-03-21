<?php /**Function that create the form Upload File */

echo "<span >";
echo "</table>";
echo "<form enctype='multipart/form-data' action='uploader.php' method='POST'>";
echo "<h1 style='font-size:16px' align=center >Upload File</h1>";
echo "<table cellpadding=15>";
echo "<tr><td>Nome file</td><td><input type='text' maxlength=50 name=nome_file id=upload_nome_file></td></tr>";
echo "<tr><td>Inserisci descrizione</td><td><textarea maxlength=200 name=descrizione_file cols=22 style='resize:none' id=upload_descrizione_file> </textarea></td></tr>";
echo "<tr><td>Visibilit&agrave;</td>";
echo "<td><select name=visibilita_file id=visibilita>";
echo "<option value='privato'> privato </option>";
echo "<option value='pubblico' selected> pubblico </option>";
echo "</select></td></tr>";
echo "<tr><td>Scegli un file:</td> <td> <input name='uploadedfile' type='file' /></td></tr>";
echo "<tr><td><input type='reset' value='Azzera Tutto'></td>";
echo "<td><input type='submit' id='submit_upload' onclick='return verificaUpload()' value='Upload'></td></tr>";
echo "</form>";
echo "</span>";
?>
