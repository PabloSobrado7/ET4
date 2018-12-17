<?php

/**
 * Funcion: Archivo php donde se controla la autenticacion de los usuarios
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
 
/*
function IsAuthenticated()
autor: Mauri
*/
	
//Valida si existe la variable de session login
function IsAuthenticated(){

	//si no existe la variable $_SESSION retorna falso
	//sino devuelve true
	if (!isset($_SESSION['login'])){
		return false;
	}
	else{
		return true;
	}
} //end of function IsAuthenticated()
?>

