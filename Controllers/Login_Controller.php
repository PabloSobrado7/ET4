
<?php
/**
 * Funcion: Archivo php donde se controlan el login del usuario
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
session_start();

//Comprueba que si es un POST proveniente de Form de Login
if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){

	$login; //alberga el login

    include '../Functions/Authentication.php';

    if(!IsAuthenticated()){ //si no esta autenticado
        //Devuelve el el formulario para loguearse
        include '../Views/LOGIN.php';
        $login = new Login();

	}else{//si esta autenticado
		//muestra la vista de bienvenida
        include '../Views/Bienvenida.php';
        new Bienvenida();
	}



}
else{

	$usuario; //crea un objecto del modelo
	$respuesta; //guarda el valor del login

	include '../Models/ADMIN_Model.php';
	$usuario = new ADMIN_Model($_REQUEST['login'],$_REQUEST['password']);
	$respuesta = $usuario->login();
	
	//Comprueba si el usuario existe y coincide con la contraseña
        if ($respuesta == 'true') {
            $_SESSION['login'] = $_REQUEST['login'];
            include '../Views/Bienvenida.php';
            new Bienvenida();
        }
		else{
			//Si hay algun fallo devuelve el error devuelto por el modelo de datos
			include '../Views/MESSAGE.php';
			new MESSAGE($respuesta, '../Controllers/Login_Controller.php');
		}

}//fin

?>
