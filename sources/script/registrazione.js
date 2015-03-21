var xhr;
var controllaInput=0;  /**1= input presenti tutti, 0=input mancanti */
var checkUsername=0;   /**1=username  convalidato, 0=Username  non convalidato */
var checkPassword=0;   /**1=password convalidato,  0=  password non convalidato */


/**
 *Function that sends the mail with password to the user 
 */
function recupero_password(){
	var temp=getObj("text_rec_password");
	if(temp.value==""){
		alert("Inserire una mail");
	}
	else{
		alert("La sua richiesta è stata inoltrata, la mail contenente la password arriverà a breve");
		showdiv_index(1);
	}
}


/**
 * Function tha shows the recupera password form
 */
function visualizza_recupera_password(){
	var temp=getObj('recupero_password');
	temp.style.display="block";
	showdiv_index(6);
}


/**
 * Function that abilities the registration button
 */ 
function abilita_registrazione(){
	verifica_password(getObj("inseriscipassword"));
	verifica_reinserimento(getObj("inseriscipassword2"));
	verifica_username(getObj("inserisciusername"));
	if ((controllaInput==1)&&(checkPassword==1)&&(checkUsername==1)){
		getObj("submit_registrazione").disabled=false;
	}
	else getObj("submit_registrazione").disabled=true;
}

/**
 * This function check if all input for registration are insert
 * 
 */ 
function checkInput(){
	var elementi=document.forms['registration_form'];
	var len=elementi.length;
	for(var i=0; i<len-2; i++){
		if (elementi[i].value==""){		
			controllaInput=0;	
			getObj("submit_registrazione").disabled=true;
			return;
		}
	}
	controllaInput=1;
	/**Tutti gli input sono stati inseriti, quindi possiamo "cercare" di abilitare la submit*/
	abilita_registrazione();
}


/**
 *Function that verify id the two password are eguals
 * @param obj password reinsert reference
 */  
function verifica_reinserimento(obj){
	var password2=obj.value;
	var password1=getObj("inseriscipassword").value;
	if (password2!=password1){
		checkPassword=0;
		getObj("span_reinserisci_password").innerHTML="Le due password devono coincidere";
		getObj("span_reinserisci_password").style.color='red';
		getObj("span_reinserisci_password").style.fontSize='16px';
	}
	else{
		checkPassword=1;
		getObj("span_reinserisci_password").innerHTML="";
	}
}

/**
 *Function that verify if the password has al least 4 caracthers
 * @param obj password field reference
 */  
function verifica_password(obj){
	var password=obj.value.length;
	if (password<4){
		checkPassword=0;
		getObj("span_password").innerHTML="La password deve essere di almeno 4 caratteri";
		getObj("span_password").style.color='red';
		getObj("span_password").style.fontSize='16px';
	}
	else{
		checkPassword=1;
		getObj("span_password").innerHTML="";
	}
}

/**
 * Function that check the validate of the username
 * @param username's textfield reference
 */ 
function verifica_username(obj){
	if((xhr=getXMLHttpRequest())==null){
		alert("Il tuo browser non supporta Ajax!");
		return;
	}
	if(obj.value!=""){
		var value= obj.value;
		var url="registrazione.php?IDuser="+value+"&sid="+Math.random();
		xhr.onreadystatechange=checkUser;
		xhr.open("GET",url,true);
		xhr.send(null);
	}else{
		getObj("span_username").innerHTML="";
	}
}

 
function checkUser(){
	if (xhr.readyState==4 && xhr.status==200){
		var a=xhr.responseText;
		if (a=="valido"){
			checkUsername=1;
			checkInput();
			getObj("span_username").innerHTML="Username scelto Disponibile";
			getObj("span_username").style.color='green';
			getObj("span_username").style.fontSize='16px';
		}
		else if (a=="non_valido"){
			checkUsername=0;
			checkInput();
			getObj("span_username").innerHTML="Username scelto già esistente";
			getObj("span_username").style.color='red';
			getObj("span_username").style.fontSize='16px';
		}
	}
}


//Funzione standard per Ajax
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
