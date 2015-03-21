/**
 * Function for the display of a menu
 * @param id of the menu 
 */ 
function showMenu(menu){
	hideMenu();
	var obj=getObj(menu);
	setDisplay(obj, "block");
}


/**
 * Function tha hides all the menu
 */
function hideMenu(){
	var temp, obj;
	var i;
	for (i=1; i<5; i++){
		temp="menu_"+i;
		obj=getObj(temp);
		setDisplay(obj, "none");
		temp="";
	}
}
/**
 * function that show the rispective div
 * @param e div number
 */ 
function showdiv(e){
	parseInt(e);
	var elemento, nome_elemento;
	for (var i=1; i<7; i++){
		if (i==e){
			nome_elemento= "element_"+e;
			elemento=getObj(nome_elemento);
			setDisplay(elemento, "block");
		}
		else {
			nome_elemento= "element_"+i;
			elemento=getObj(nome_elemento);
			setDisplay(elemento, "none");
		}
	}
}

/**
 * function that show the rispective div in the main 
 * @param e div number
 */ 
function showdiv_index(e){
	parseInt(e);
	var elemento, nome_elemento;
	for (var i=1; i<8; i++){
		if (i==e){
			nome_elemento= "element_"+e;
			elemento=getObj(nome_elemento);
			setDisplay(elemento, "block");
		}
		else {
			nome_elemento= "element_"+i;
			elemento=getObj(nome_elemento);
			setDisplay(elemento, "none");
		}
	}
}

/**
 * function that set the display attribute of a element
 * @param obj object reference
 * @param value value of display
 */ 
function setDisplay(obj, value){
	obj.style.display=value;
}	
