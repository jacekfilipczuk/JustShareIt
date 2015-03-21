/**File that contains the javascript functions*/

var xhr; /**Variable for the HTTP request object*/

/**
 * Function tha controls the input of the upload form
 * @return false if there is an empty field
 */
function verificaUpload(){
	var inputn=getObj("upload_nome_file");
	var inputd=getObj("upload_descrizione_file");
	if(inputn.value!="" && inputd.value!="" && inputd.value!=" " && inputn.value!=" "){
		
		return true;
	}
	alert("Ci sono campi mancanti");
	return false;
	
}



/**
 *Function tha request the confermation for a operation and if the response is true delete the selected file 
 * @param obj the id of the file to eliminate
 * @return return the answer of the confermation question 
 */
function conferma(obj){
		if(confirm('Sicuro?')){
			elimina_file(obj);
			return true;
		}
		else{
			return false;
		}
}


/**
 * Function that show the form of the Upload file
 */ 
function visualizza_upload_file(){
	if((xhr=getXMLHttpRequest())==null){
		alert("Il tuo browser non supporta Ajax!");
		return;
	}
	var url="server.php?cosa=form&dove=upload_file&sid="+Math.random();
	xhr.onreadystatechange=mostra_risposta_server;
	xhr.open("GET",url,true);
	xhr.send(null);
}

/**
 * function that delete a file 
 * @param IDfile ID of a file
 */ 
function elimina_file(IDfile){
	if((xhr=getXMLHttpRequest())==null){
		alert("Il tuo browser non supporta Ajax!");
		return;
	}
	var url="server.php?cosa="+IDfile+"&dove=elimina_file&sid="+Math.random();
	xhr.onreadystatechange=risposta_server;
	xhr.open("GET",url,true);
	xhr.send(null);
}

/**
 * Function that changes the user's password
 * @param obj the ueser's id 
 */
function modifica_password(obj){
	if((xhr=getXMLHttpRequest())==null){
		alert("Il tuo browser non supporta Ajax!");
		return;
	}
	var vpass=getObj("old_password");
	var pass=getObj("inseriscipassword");
	if(pass.value=="" || vpass.value==""){
		alert("Ci sono campi vuoti");
		return;
	}else if(checkPassword==0){
		alert("Errore Password");
		return;
	}
	var old_pass=getObj("old_password");
	var url="server.php?cosa="+obj+"_"+pass.value+"_"+old_pass.value+"&dove=modifica_password&sid="+Math.random();
	xhr.onreadystatechange=risposta_server;
	xhr.open("GET",url,true);
	xhr.send(null);
}


/**
 * Functin that show the Modifica Password Form
 */ 
function visualizza_modifica_password(){
	if((xhr=getXMLHttpRequest())==null){
		alert("Il tuo browser non supporta Ajax!");
		return;
	}
	var url="server.php?cosa=form&dove=modifica_password&sid="+Math.random();
	xhr.onreadystatechange=mostra_risposta_server;
	xhr.open("GET",url,true);
	xhr.send(null);
}


/**
 * function that make the request for the user cancellation account
 */
 function richiesta_cancellazione(){
	var answer=confirm("Sicuro di voler cancellare l'account?");
	if (answer){
		alert("La tua richiesta è stata inoltrata. L'account verrà cancellato al più presto.");
		window.location="logout.php";
	}
} 


/**
 * Function that modify details of a file
 */ 
function modifica_file(obj){
	var nuovoNome=getObj("nuovo_nome_file");
	var nuovoDescrizione=getObj("nuovo_descrizione_file");
	if ((nuovoDescrizione.value==" ")){
		nuovoDescrizione.value="";
	}
	if ((nuovoNome.value==" ")){
		nuovoNome.value="";
	}
	if ((nuovoNome.value=="")&&(nuovoDescrizione.value=="")){
		alert("Per eseguire l'operazione bisogna compilare almeno un campo");
	}
	else{
		var url="server.php?cosa="+obj+"_"+nuovoNome.value+"_"+nuovoDescrizione.value+"&dove=modifica_file&sid="+Math.random();
		xhr.onreadystatechange=changeModify;
		xhr.open("GET",url,true);
		xhr.send(null);
	}
}


function changeModify(){
		if(xhr.readyState==4 && xhr.status==200){
			alert("Operazione riuscita");
			 mostra_myfile();
		}
}

/**
 *Function that display the span of file modify
 */  
function visualizza_mod_file(){
	var obj=getObj("span_modifica_file");
	
	//Se lo span è invisibible
	if (obj.style.display=="none"){
		obj.style.display="block"
	}
	else{
		obj.style.display="none";
	}
}


/**
 * Function that change scope of a file
 * @param id id of a file 
 */ 
function modifica_visibilita(id){
	if((xhr=getXMLHttpRequest())==null){
		alert("Il tuo browser non supporta Ajax!");
		return;
	}
	var url="server.php?cosa="+id+"&dove=modifica_visibilita&sid="+Math.random();
	xhr.onreadystatechange=risposta_server;
	xhr.open("GET",url,true);
	xhr.send(null);
}


/**
 * Function that display the details of a file
 * @param id id of a file 
 */ 
function visualizza_file(id){
	if((xhr=getXMLHttpRequest())==null){
		alert("Il tuo browser non supporta Ajax!");
		return;
	}
	var url="server.php?cosa="+id+"&dove=visualizza_file&sid="+Math.random();
	xhr.onreadystatechange=mostra_risposta_server;
	xhr.open("GET",url,true);
	xhr.send(null);
}



/**
 * Function that delete the specified user and his private files
 * @param id id of a user 
 */ 
function rimuovi_utente(id){
	if((xhr=getXMLHttpRequest())==null){
		alert("Il tuo browser non supporta Ajax!");
		return;
	}
	var url="server.php?cosa="+id+"&dove=rimuovi_utente&sid="+Math.random();
	xhr.onreadystatechange=mostra_risposta_server;
	xhr.open("GET",url,true);
	xhr.send(null);
}



/**
 * Function that display user's details
 * @param id id of a user 
 */ 
function visualizza_utente(id){
	if((xhr=getXMLHttpRequest())==null){
		alert("Il tuo browser non supporta Ajax!");
		return;
	}
	var url="server.php?cosa="+id+"&dove=visualizza_utente&sid="+Math.random();
	xhr.onreadystatechange=mostra_risposta_server;
	xhr.open("GET",url,true);
	xhr.send(null);
}

/**
 * Function that shows the my file list
 * 
 */ 
function mostra_myfile(){
	if((xhr=getXMLHttpRequest())==null){
		alert("Il tuo browser non supporta Ajax!");
		return;
	}
	var url="server.php?cosa=myfile&dove=file&sid="+Math.random();
	xhr.onreadystatechange=mostra_risposta_server;
	xhr.open("GET",url,true);
	xhr.send(null);
}

/**
 * Function that shows the friend list
 * 
 */ 
function mostra_list_amici(){
	if((xhr=getXMLHttpRequest())==null){
		alert("Il tuo browser non supporta Ajax!");
		return;
	}
	var url="server.php?cosa=lista_amici&dove=utente&sid="+Math.random();
	xhr.onreadystatechange=mostra_risposta_server;
	xhr.open("GET",url,true);
	xhr.send(null);
}


/**
 * Function that insert a Friend in a Friendlist of a user
 * @param IDFriend id of a friend
 */
function change_amico(IDfriend, operazione){
	if((xhr=getXMLHttpRequest())==null){
		alert("Il tuo browser non supporta Ajax!");
		return;
	}
	var url="server.php?IDfriend="+IDfriend+"&operazione="+operazione+"&sid="+Math.random();
	xhr.onreadystatechange=risposta_server;
	xhr.open("GET",url,true);
	xhr.send(null);
}

/**
 * Function that wait the server response
 */ 
function risposta_server(){
		if(xhr.readyState==4 && xhr.status==200){
			var a=xhr.responseText;
			var patt1=/modifica_si/gi;
			var patt2=/modifica_nope/gi;
			var patt3=/eliminazione_file_eseguita_utente/gi;
			var patt4=/eliminazione_file_eseguita_admin/gi;
			if (a=='successo'){
				alert ("Operazione riuscita.");
			}
			else if (a=='successo_rimuovi'){
				alert ("Operazione riuscita.");
				mostra_list_amici();
			}
			else if (a=='non_aggiunto'){
				alert ("Amico già presente in lista.");
			}
			else if (a=='non_eliminato'){
				alert ("Amico non presente in lista");
			}
			else if(a=='pubblico'){
				alert('Visibilità del file settata a pubblica');
			}
			else if(a=='privato'){
				alert('Visibilità del file settata a privata');
			}
			else if(a=='errore_visibilita'){
				alert('Errore nello spostamento del file,Riprovare!');
			}
			else if((a.match(patt1))=='modifica_si'){
				alert('Modifica Password eseguita con successo');
				showdiv(1);
			}else if((a.match(patt2))=='modifica_nope'){
				alert('Fatal ERROR');
			}
			else if ((a.match(patt3))=='eliminazione_file_eseguita_utente'){
				alert('Operazione effettuata con successo');
				mostra_myfile();
			}
			else if ((a.match(patt4))=='eliminazione_file_eseguita_admin'){
				alert('Operazione effettuata con successo');
				cerca('file');
			}
		}
}


/** Function tha returns the results of a research
 * @param obj Type of the research(file or user)
 */
function cerca(obj){
	if((xhr=getXMLHttpRequest())==null){
		alert("Il tuo browser non supporta Ajax!");
		return;
	}
	if (obj=='file'){
		var input=getObj('text_file');
		//Controllo input 
		if (input.value==""){
			alert("Input non valido. Riprovare.");
			window.location.reload();
			return;
		}
	}
	else{
		var input=getObj('text_utente');
		//Controllo input 
		if (input.value==""){
			alert("Input non valido. Riprovare.");
			window.location.reload();
			return;
		}
	}
	var url="server.php?cosa="+input.value+"&dove="+obj+"&sid="+Math.random();
	xhr.onreadystatechange=mostra_risposta_server;
	xhr.open("GET",url,true);
	xhr.send(null);
}//fine function

/** Function that shows the result of the research in the html page
 * 
 */
function mostra_risposta_server(){
		if(xhr.readyState==4 && xhr.status==200){
			//Numero del div dove mettere i risultati della ricerca
			var risultato = getObj('element_6'); 
			showdiv(6);
			risultato.innerHTML=xhr.responseText;
		}
}


/**Standard function cross browser
 */
function getXMLHttpRequest() {
	var httpRequest=null;
	if (window.XMLHttpRequest!=null) httpRequest=new window.XMLHttpRequest();
	else if(window.ActiveXObject!=null) {
		var success = false;
		for (var i=0; i<XMLHTTPREQUEST_MS_PROGIDS.length && !success; i++) {
			try {
				httpRequest=new ActiveXObject(XMLHTTPREQUEST_MS_PROGIDS[i]);
				success = true;
			}
			catch(ex) { }
		}
	}
	if(httpRequest==null) 
		alert("Errore in getXMLHttpRequest():\n\n"
		      +"Non posso creare l'oggetto XMLHttpRequest.");
	return httpRequest;
}
