
<?php

/**
/**
 * Funcion: Archivo php donde se controlan las acciones del registro de usuario
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */

session_start();


if(!isset($_POST['login'])){ //si no existe el login

	$register; //guarda el valor de registrar
	include '../Views/REGISTRO.php';
	$register = new Register();
}
else{//si existe

	$usuario; //crea un objecto del model
	$respuesta; //guarda el valor del usuario registrado
	include '../Models/USUARIOS_Model.php';
	$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['email'],
	$_REQUEST['FechaNacimiento'],$_REQUEST['fotopersonal'],$_REQUEST['sexo'],$_REQUEST['dni'],$_REQUEST['telefono']);
	$respuesta = $usuario->registrar();

	Include '../Views/MESSAGE.php';

	if ($respuesta == 'true'){ //si esta registrado muestra mensaje correspondiente
		
		$respuesta = $usuario->registrar();
		
		new MESSAGE($respuesta, '../Controllers/Login_Controller.php');
	}
	else{ //si no esta registrado muestra otro mensaje correspondiente a este caso
		new MESSAGE($respuesta, '../Controllers/Login_Controller.php');
	}

}

?>

