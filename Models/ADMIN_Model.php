<?php

/**
 * Funcion: Modelo de usuarios que nos permite acceder a la tabla en la bd
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
 
class ADMIN_Model {

	var $login_admin;
	var $pass_admin;
	
	var $mysqli;

//Constructor de la clase
//

function __construct($login_admin,$pass_admin){
	$this->login_admin = $login_admin;
	$this->pass_admin = $pass_admin;
	

	include_once 'DB/BdAdmin.php';
	$this->mysqli = ConnectDB();
}



//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
    
}

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}


//funcion SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH()
{
    
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
   
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
    
}

// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{

}

// funcion login: realiza la comprobación de si existe el usuario en la bd y despues si la pass
// es correcta para ese usuario. Si es asi devuelve true, en cualquier otro caso devuelve el 
// error correspondiente
function login(){

	$sql = "SELECT *
			FROM `ADMIN`
			WHERE (
				(login_admin = '$this->login_admin') 
			)";
	$resultado = $this->mysqli->query($sql);
	
if ($resultado->num_rows == 0){

	$sql = "SELECT *
			FROM `VENDEDOR`
			WHERE (
				(login_vendedor = '$this->login_admin') 
			)";

	$resultado = $this->mysqli->query($sql);
	
}	
if ($resultado->num_rows == 0){
	
	$sql = "SELECT *
			FROM `SOCIO`
			WHERE (
				(login_socio = '$this->login_admin') 
			)";
	$resultado = $this->mysqli->query($sql);		
}			
	if ($resultado->num_rows == 0){
		return 'El login no existe';
	}
	else{
		$tupla = $resultado->fetch_array();
		if (($tupla['pass_admin'] == $this->pass_admin)
		OR ($tupla['pass_vendedor'] == $this->pass_admin)
OR ($tupla['pass_socio'] == $this->pass_admin))	{
			return true;
		}
		else{
			return 'La password para este usuario no es correcta';
		}
	}
}//fin metodo login

function tipouser(){
	
	$user;
	$sql = "SELECT *
			FROM `ADMIN`
			WHERE (
				(login_admin = '$this->login_admin') 
			)";
	$resultado = $this->mysqli->query($sql);
	$user = 'admin';
if ($resultado->num_rows == 0){

	$sql = "SELECT *
			FROM `VENDEDOR`
			WHERE (
				(login_vendedor = '$this->login_admin') 
			)";

	$resultado = $this->mysqli->query($sql);
	$user = 'vendedor';
}	
if ($resultado->num_rows == 0){
	
	$sql = "SELECT *
			FROM `SOCIO`
			WHERE (
				(login_socio = '$this->login_admin') 
			)";
	$resultado = $this->mysqli->query($sql);
	$user = 'socio';	
}			
	return $user;
}//fin metodo login

//
function Register(){}

function registrar(){

}}//fin de clase

?> 