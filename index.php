<?php

/**
 * Funcion: Archivo php donde se arranca la web
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */


//entrada a la aplicacion

//se va usar la session de la conexion
session_start();

//funcion de autenticacion
include './Functions/Authentication.php';


//si no ha pasado por el login de forma correcta
if (!IsAuthenticated()){
	header('Location:./Controllers/Login_Controller.php');
}
//si ha pasado por el login de forma correcta 
else{
    header('Location:./Controllers/Login_Controller.php');
}

?>
