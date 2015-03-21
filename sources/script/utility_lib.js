/** Javascript utility function's collection
 * @author Emanuele Pesce
 * utility_lib v1.0
 * */


/**
 * Return element's reference
 * 
 * @param elementID id of a element
 * @return reference of the element
 */
function getObj(elementID){
	if (typeof elementID=="string")		
		return document.getElementById(elementID);
	else 
		return elementID;
}


/**
 * Move a element to coordinates given
 * 
 * @param elementID id of a element that you want move
 * @param x abscissa expressed as pixels
 * @param y vertical expressed as pixels
 */
function move(elementID, x, y){
		var element=getObj(elementID);
		elemento.style.left=x+"px";
		elemento.style.top=y+"px";
}

/**
 *set the z-index of the element 
 * @param elementID id of the element 
 * @param z_index zIndex 
 */
function setZ(elementID, z_index){
	var element=getObj(elementID);
	element.style.zIndex=z_index;
}

/**
 * @param elementID id of a element 
 * @return abscissa of the elementID
 */
function getX(elementID){
	return parseInt(getObj(elementID).style.left);
}

/**
 * @param elementID id of a element 
 * @return vertical of the element
 */
function getY(elementID){
	return parseInt(getObj(elementID).style.right);
}

/**
 * return zIndex of a element
 * @param elementID id of a element 
 * @return zIndex of the element
 */
function getZ(elementID){
	return parseInt(getObj(elementID).style.zIndex);
}

/**
 * set the visibility of a element
 * @param elementID id of a element
 * @param vis visibility propriety, values: visible, true or hidden
 */
function setVisibility(elementID, vis){
	var element=getObj(elementID);
	if (vis==true || vis=='visible'){
		element.style.visibility="visible";
	}
	else {
		element.style.visibility="hidden";
	}
}

/**
 * change the cursor style
 * @param cursorType type of cursor :)
 * @param elementID optional, elementID id of the element
 */
function setCursor(cursorType, elementID){
	if (elementID==null)
		document.body.style.cursor=cursorType;
	else
		getObj(elementID).style.cursor=cursorType;
}

/**
 * return the width of the browser window
 * @return the width of the browser window
 */
 function getWidth(){
	var wid=null;
	//Netscape and similar
	if (window.innerWidth)
		wid=window.innerWidth;
	//IE
	if (document.body.clientWidth)
		wid=document.body.clientWidth;
	return wid;
	
}

/**
 * return the height of the browser window
 * @return height of the browser window
 */
function getHeight(){
	var h=null;
	//Netscape and similar
	if (window.innerHeight)
		h=window.innerHeight;
	//IE
	if (document.body.clientHeight)
		h=document.body.clientHeight;
	return h;
}
	
/**
 * change the background color of a element
 * @param elementID id of a element
 * @color color
 */	
function setBackground(elementID, color){
	getObj(elementID).style.background=color;
}
	
/**
 * change the color of a element
 * @param elementID id of a element
 * @color color
 */	
function setColor(){
	getObj(elementID).style.color=color;
}

/**Function that print the string on document 
 * @param str input string
 */
function stampa(str){
	document.write(str);
	}
