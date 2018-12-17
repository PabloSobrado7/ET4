/**
 * Funcion: Archivo js para las validacionse de los formularios
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
//Comprueba si un input esta vacio
function comprobarVacio(campo){
    var pat1 = /^([ ]+)$/i; //comprueba que no haya espacios							
    var pat2 = /^([Nn][Uu][Ll][Ll])$/i;	//comprueba que no haya espacios	
	var campoactual = campo.id; //Guarda en la variable campoactual el id del input
	//comprueba todas las posibilidades de que un campo este vacio, si es asi devuelve false, en caso de que no este vacio devuelve true
	if ((campo.value == null) || (campo.value.length == 0) || 
	(campo.value.match(pat1)) || ((campo.value.trim()).match(pat2))) {	
        document.getElementById(campoactual).style.background = "#ffbfaa"; //rellena de color rojo el campo actual
		return false;
	}
	else {						
       document.getElementById(campoactual).style.background = ""; //quita el color de relleno
	   return true;
	}
}

//Comprueba que un texto solo tenga letras
function comprobarTexto(campo,size) {
	var filter=/^[A-Za-záéíóúÁÉÍÓÚ\_\-\.\s\xF1\xD1]+$/;//expresión regular con sólo letras
	var campoactual = campo.id; //Guarda en la variable campoactual el id del input
	//en el caso de que no solo contenga letras la funcion devuelve false, sino devuelve true
    if ((campo.value.length>size)||(!filter.test(campo.value))) {
        document.getElementById(campoactual).style.background = "#ffbfaa"; //rellena de color rojo el campo actual
        return false;
    }
	else{
	document.getElementById(campoactual).style.background = ""; //quita el color de relleno
    return true;}
}

//Comprueba que la expresion regular sea correcta
function comprobarExpresionRegular(campo,exprreg,size) {
	var campoactual = campo.id; //Guarda en la variable campoactual el id del input
    var filter= exprreg; //variable para asociar a la expresion regular pasada en la funcion
	//comprueba que la expresion regular sea correcta, de ser asi devuelve true, en caso contrario false
    if ((campo.value.length>size)||(!comprobarVacio(campo))||(!filter.test(campo.value))) {
        document.getElementById(campoactual).style.background = "#ffbfaa"; //rellena de color rojo el campo actual
        return false;
    }
	else{
	document.getElementById(campoactual).style.background = ""; //quita el color de relleno
    return true;}
}

//Comprueba que la funcion sea alfanumerica
function comprobarAlfabetico(campo,size) {
    var campoactual = campo.id; //Guarda en la variable campoactual el id del input
    var filter=/^[0-9A-Za-z]+$/; //variable para guardar los valores alfanumericos posibles
	//en el caso de que la funcion no sea alfanumerica devuelve false, en caso contrario true
	if ((!comprobarVacio(campo))||(campo.value.length>size)||(!filter.test(campo.value))) {
       document.getElementById(campoactual).style.background = "#ffbfaa"; //rellena de color rojo el campo actual
       return false;
    }else{
	document.getElementById(campoactual).style.background = ""; //quita el color de relleno
    return true;		
	}
	}

//Comprueba que se trate de un numero entero entre valormenor y valormayor (en el propio input se comprueba que solo se puedan introducir numeros)
function comprobarEntero(campo, valormenor, valormayor) {
	//en el caso de que campo sea menor o igual que valormayor y mayor o igual que valormenor devuelve false, sino devuelve true
	var campoactual = campo.id; //Guarda en la variable campoactual el id del input
	if ((!comprobarVacio(campo)||(campo.value<valormenor)||(campo.value>valormayor))) {//se comprueba si el entero supera la longitud permitida
        document.getElementById(campoactual).style.background = "#ffbfaa"; //rellena de color rojo el campo actual
        return false;
    }
	document.getElementById(campoactual).style.background = ""; //quita el color de relleno
    return true;
}

//Cuenta los numeros decimales para despues utilizar en la funcion de comprobarReal
function contarDecimales(f) {
    var real = f.split("."); // Array formado por la parte entera y decimal
    var decimal = real[1]; // Array de la parte decimal
    if (decimal != null){ //Si tiene parte decimal
        return decimal.toString().length; //Convirtiendo a string se puede contar su longitud
    }
    else{
        return decimal=0; //No tiene decimales, asigna el valor 0 a la variable decimal
    }
}

//Comprueba que el numero sea real y se encuentre entre valormenor y valormayor (incluidos) 
function comprobarReal(campo, numerodecimales, valormenor, valormayor) {
    var resul = true;//variable booleana de retorno de la función
    var decimal=contarDecimales(campo.value);//cuenta decimales
    //Comprueba que es un número real, en ese caso devuelve true y en caso contrario false
    if (((/^-?[0-9]*[.][0-9]+$/.test(campo.value))==false) ){
        document.getElementById(campoactual).style.background = "#ffbfaa"; //rellena de color rojo el campo actual
        resul = false;
        //Comprueba el número de decimales
    }else if (decimal!=numerodecimales){
        document.getElementById(campoactual).style.background = "#ffbfaa"; //rellena de color rojo el campo actual
		resul = false;
        //Comprueba que el nº introducido está dentro del rango
    }else if ((campo.value < valormenor) || (campo.value > valormayor)){
        document.getElementById(campoactual).style.background = "#ffbfaa"; //rellena de color rojo el campo actual
		resul = false;
    }
    else{
		document.getElementById(campoactual).style.background = ""; //quita el color de relleno
        resul=true;
		
    }
    return resul;//devuelve el resultado de la funcion
}

//ACABADO (dni)
function comprobarDni(campo) {
	var campoactual = campo.id; //Guarda en la variable campoactual el id del input
	var resul= true;//variable booleana de retorno de la función
  	var numero; //indice de la cadena
  	var letraDNI; //letra introducida por teclado
  	var letra; //letras válidas de un NIF  	
  	var expresion_regular_nif;//almacena la expresion regular del nif
 	//var expresion_regular_dni//almacena la expresion regular del dni
  	expresion_regular_nif = /^\d{8}[a-zA-Z]$/; //Expresión regular NIF
  	
 	if ((campo.value == null) || (!comprobarVacio(campo)) || (campo.value.length == 0)){ //Comprobación vacio 				
  		resul = false;
  	}else if(expresion_regular_nif.test (campo.value) == true){
    	numero = campo.value.substr(0,campo.value.length-1); //obtiene la parte numeríca de la cadena introducida en el campo del formulario
   	 	letraDNI = campo.value.substr(campo.value.length-1,1); //obtiene la letra del NIF introducido en el campo del formulario
    	numero = numero % 23; //calcula el modulo 23 del DNI
    	letra='TRWAGMYFPDXBNJZSQVHLCKE'; //Letras válidas de un NIF
    	letra=letra.substring(numero,numero+1); //Substring de un solo caracter de la cadena de letras válidas que empieza en la posición marcada por la variable numero después de hacer el módulo 23
    		if (letra!=letraDNI.toUpperCase()) { //comprueba la letra introducida por teclado (pasada a mayusculas) y la compara con la calculada en el paso anterior
        document.getElementById(campoactual).style.background = "#ffbfaa"; //rellena de color rojo el campo actual
		resul = false;
    		}else{       			
		document.getElementById(campoactual).style.background = ""; //quita el color de relleno
        resul=true;
    		}
  	}else{   				
        document.getElementById(campoactual).style.background = "#ffbfaa"; //rellena de color rojo el campo actual
		resul = false;
	}
	
  	return resul;	//devuelve el resultado de la funcion
}



//Funcion para comprobar si el telefono introducido es correcto
function comprobarTelf(campo) {
	var campoactual = campo.id; //Guarda en la variable campoactual el id del input
	var resultado=true; //variable booleana de retorno de la función
  	var telefono=/^(\+34|0034|34)?[0-9]{9}$/; //guarda en la variable un numero de tfn correcto (posibles prefijos internacionales y nueve cifras)
 	if((!comprobarVacio(campo))||(!telefono.test(campo.value))){ //Comprueba que no está vacio    	  
    	 resultado=false;
		 document.getElementById(campoactual).style.background = "#ffbfaa"; //rellena de color rojo el campo actual
        }else{
			resultado=true; 
		document.getElementById(campoactual).style.background = ""; //quita el color de relleno
       
		}
  	return resultado; //devuelve el resultado de la funcion
}	

//Funcion para añadir usuario
function anadirUsuario() {
	
	var usuario = document.getElementById("login"); //variable para guardar el valor del input usuario    
    var pass = document.getElementById("password"); //variable para guardar el valor del input pass           
    var nombre = document.getElementById("nombre"); //variable para guardar el valor del input nombre     
    var apellidos = document.getElementById("apellidos"); //variable para guardar el valor del input apellidos           
    var email = document.getElementById("email"); //variable para guardar el valor del input email         
    var dni = document.getElementById("dni"); //variable para guardar el valor del input dni         
    var telefono = document.getElementById("telefono"); //variable para guardar el valor del input telefono         
    var FechaNacimiento = document.getElementById("FechaNacimiento"); //variable para guardar el valor del input fechanac         
    
	
	 if (comprobarTexto(login, 25) //comprueba si es correcto el input con id = usuario
        && comprobarAlfabetico(password, 20) //comprueba si es correcto el input con id = pass
        && comprobarTexto(nombre, 30) //comprueba si es correcto el input con id = nombre
        && comprobarTexto(apellidos, 50) //comprueba si es correcto el input con id = apellidos
		&& comprobarExpresionRegular(email,/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/,50) //comprueba si es correcto el input con id = email
        && comprobarDni(dni)
		&& comprobarTelf(telefono)
		&& comprobarVacio(FechaNacimiento)) //comprueba si es correcto el input con id = email
       
    
	 {
	alert("Usuario registrado"); //muestra mensaje de usuario registrado
	 }else{
		alert("Usuario no registrado"); //muestra mensaje de usuario no registrado
	 }

}

function anadirLoteria() {
	
	var lotemail = document.getElementById("lotemail"); //variable para guardar el valor del input email         
	var lotnombre = document.getElementById("lotnombre"); //variable para guardar el valor del input nombre     
    var lotapellidos = document.getElementById("lotapellidos"); //variable para guardar el valor del input apellidos           
	var lotparticipacion = document.getElementById("lotparticipacion"); //variable para guardar el valor del input apellidos           

	 if (comprobarExpresionRegular(lotemail,/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/,50) //comprueba si es correcto el input con id = email 
        && comprobarTexto(lotnombre, 30) //comprueba si es correcto el input con id = nombre
        && comprobarTexto(lotapellidos, 40) //comprueba si es correcto el input con id = apellidos
		&& comprobarVacio(lotparticipacion)) //comprueba si es correcto el input con id = participacion
       
	 {
	alert("Participante registrado"); //muestra mensaje de usuario registrado
	 }else{
		alert("Participante no registrado"); //muestra mensaje de usuario no registrado
	 }

}

function editarLoteria() {
	
	var lotnombre = document.getElementById("lotnombre"); //variable para guardar el valor del input nombre     
    var lotapellidos = document.getElementById("lotapellidos"); //variable para guardar el valor del input apellidos           
    var lotparticipacion = document.getElementById("lotparticipacion"); //variable para guardar el valor del input apellidos           

	
	 if (comprobarTexto(lotnombre, 30) //comprueba si es correcto el input con id = nombre
        && comprobarTexto(lotapellidos, 40) //comprueba si es correcto el input con id = apellidos
		&& comprobarVacio(lotparticipacion)) //comprueba si es correcto el input con id = participacion
       
    
	 {
	alert("Participacion editada"); //muestra mensaje de usuario registrado
	 }else{
		alert("Participacion no editada"); //muestra mensaje de usuario no registrado
	 }

}


  	







