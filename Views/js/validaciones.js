//Inicializamos la variable común a todas las funciones fuera.
var estado = false;


//FUNCIÓN QUE COMPRUEBA SI UN CAMPO ESTÁ VACÍO.
function comprobarVacio(campo)
{
	if((campo.value == null) || (campo.value.length == 0))
	{ //COMPROBAMOS
	 SI EN EL CAMPO SE HAN INTRODUCIDO VALORES.
		if(!estado){
			alert("Este campo es obligatorio"); //Alerta que saltará hasta que el usuario cumpla las conidicones.

			estado = true; //Se setea el valor de la variable estado. 
			setTimeout("estado = false", 50);  //función que establece el tiempo que tardará en cambiar.
			campo.focus(); //Nos enfoca el imput con el error.
			return false;
		}
		else
		{
			return true;
		}
	}
}

//FUNCIÓN PARA COMPROBAR TEXTO INTRODUCIDO EN ALGUNOS FORMS.

function comprobarTexto(campo, size)
{
	if(campo.value.length > size)
	{ //primero comprobamos que el valor del dato introducido no supera el valor que permite el campo.
		if(!estado)
		{
			alert("Este campo permite una longitud máxima de: " + size + "."); //Alerta que saltará hasta que el usuario cumpla las conidicones.

			estado = true;
			setTimeout("estado = false", 50);
			campo.focus();
			return false;
		}
	}
	return true;
}
//FUNCIÓN PARA COMPROBAR EL CORREO: SI ESTÁ EN EL FORMATO OBLIGATORIO, ETC.
function comprobarCorreo(campo)
{

	var eregular =  /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i; //Asignamos el valor de la expresion regular a una variable.

	if(eregular.test(campo.value) == false)
	{ //comprobamos que los datos introducidos coincidan con el formato que estable la expresion regular.
		if(!estado)
		{
			alert("El campo sólo permite este formato: usuario@email.com"); //Alerta que saltará hasta que el usuario cumpla las conidicones.
			estado = true;
			setTimeout("estado = false", 50);
			campo.focus();
			return false;
		}
	}
	return true;
}

//FUNCION PARA COMPROBAR QUE LOS VALORES QUE SE INTRODUCEN EN UN FORM SON DE TIPO ALFABETICO.

function comprobarAlfabetico(campo, size)
{

	var alfa = /^[a-záéíóú]{1}[a-záéíóú ]*$/i; //Asignamos el valor de la expresion regular a una variable.

	if(alfa.test(campo.value) == false && campo.value.length <= size)
	{ //comprobamos que los datos introducidos coincidan con el formato que estable la expresion regular.
		if(!estado)
		{
			alert("Este campo solo permite caracteres alfabéticos."); //Alerta que saltará hasta que el usuario cumpla las conidicones.
			estado = true;
			setTimeout("estado = true", 50);
			campo.focus();
			return false;
		}
	} 
	else 
	{
		return true;
	}
}

//FUNCION PARA COMPROBAR QUE LOS VALORES INTRODUCIDOS EN LOS CAMPOS SON DE TIPO ENTERO.
function comprobarEntero(campo, vmenor, vmayor)
{

	var int = parseInt(campo);
	var menor = parseInt(vmenor); //Se cogen los valores de los campos y se asignan a variables.
	var mayor = parseInt(vmayor);

	if(int < menor || int > mayor){ //Comprobamos que el valor se encuentra dentro de los rangos que establece el campo.
		if(!estado){
			alert("El valor de este campo debe estar comprendido entre: [" + vmenor + "-" + vmayor + "]"); //Alerta que saltará hasta que el usuario cumpla las conidicones.
			estado = true;
			setTimeout("estado = true", 50);
			campo.focus();
			return false;
		}
	}
	return true;
}

//FUNCION QUE COMPRUEBA SI UN NUMERO ES DE TIPO REAL:
function comprobarReal(campo, numD, vmenor, vmayor)
{

	var dot = campo.value.replace(",", "."); //Reemplazamos las comas por los puntos.

	var num = parseFloat(dot); 

	if(num < vmenor || num > vmayor)
	{ //Comprobamos que el valor se encuentra dentro de los rangos que establece el campo

		if(!estado)
		{

			alert("El valor de este campo debe estar comprendido entre: [" + vmenor + "-" + vmayor + "]");//Alerta que saltará hasta que el usuario cumpla las conidicones.
			estado = true;
			setTimeout("estado = false", 50);
			campo.focus();
			return false;
		}
	}
	else
	{
		var decimal = dot.substr(dot.indexOf(".")+1, punto.length);
	}

	if(numD > decimal.length)
	{
		if(!estado)
		{
			alert("El campo no puede contener más de " + numD + "decimales.");//Alerta que saltará hasta que el usuario cumpla las conidicones.
			estado = true;

			setTimeout("estado=false", 50);
			campo.focus();
			return false;
		}
	}
	return true;
}

var aux = false;
function comprobarDNI(campo)
{

	var dni = /^\d{8}[a-zA-Z]$/; //Asignamos una expresion regular de dni a una variable

	if(!dni.test(campo.value))
	{ //comprobamos que el campo cumple las condiciones.
		if(!aux)
		{
			alert("Formato incorrecto: el DNI debe contener 8 dígitos numéricos y finalizar con una letra.");//Alerta que saltará hasta que el usuario cumpla las conidicones.
			aux = true;
			setTimeout("aux=false", 50);
			campo.focus();
			return false;
		}
	}
	else
	{
		var letras = [ "T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E" ];
		//todas los posibles valores alfabeticos que puede contener la ultima cifra del dni.

		var nums = parseInt(campo.value.substr(0,8)); 

		var letraDni = campo.value.substr(8,9);

		var pos_letra = nums % 23;

		var correcta  = letras[pos_letra];

		if(correcta !== letra.toUpperCase(letraDni) && !aux)
		{
			alert("La letra del DNI no es correcta.");//Alerta que saltará hasta que el usuario cumpla las conidicones.
			aux = true;
			setTimeout("aux = false", 50);
			campo.focus();
			return false;
		}
		else
		{
			return true;
		}
	}
}

function comprobarTelf(campo)
{

	var eregular_telf =  /^(\+34|0034|34)?[\s|\-|\.]?[6|7|9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}$/; //asignamos una expresion regular de telefono a una variable.

	if(!eregular_telef.test(campo.value))
	{

		if(!estado)
		{
			alert("El campo no tiene un formato válido");//Alerta que saltará hasta que el usuario cumpla las conidicones.
			estado = true;
			setTimeout("estado = false", 50);
			campo.focus();
			return false;
		}
	}
	else
	{
		return true;
	}
}

function comprobarNumerico(campo)
{

	var eregular_num = /^([0-9])*$/; //asignamos una expresion regular de telefono a una variable.


	if(!eregular_num.test(campo.value))
	{ //comprobamos que los datos en el campo cumplen las condiciones que establece la expresion regular.
		if(!estado)
		{
			alert("Este campo solo pueda inlcuír valores numéricos.");//Alerta que saltará hasta que el usuario cumpla las conidicones.
			estado = true;
			setTimeout("estado = false", 50);
			campo.focus();
			return false;
		}
	}
	else 
	{ 
		return true;
	}
}