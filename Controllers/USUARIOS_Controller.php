<?php

/**
 * Funcion: Archivo php donde se controlan las acciones del usuario
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */

session_start();
include '../Functions/Authentication.php';
include '../Views/MESSAGE.php';

if (!IsAuthenticated()){ //si no esta autenticado

	new MESSAGE('You need sign in', '../Controllers/Login_Controller.php'); //muestra mensaje

}else{ //si lo esta

	
require_once("../Models/PERMISO_Modelo.php"); 
require_once('../Models/USUARIOS_Model.php');
include '../Views/Usuarios/Usuario_SHOWALL.php';
include '../Views/Usuarios/Usuario_ADD.php';
include '../Views/Usuarios/Usuario_SEARCH.php';
include '../Views/Usuarios/Usuario_SHOWCURRENT.php';
include '../Views/Usuarios/Usuario_EDIT.php';
include '../Views/Usuarios/Usuario_DELETE.php';



function get_data_form(){ //recoge los valores del formulario

	$login = $_REQUEST['login'];
	$password = $_REQUEST['password'];
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
	$email = $_REQUEST['email'];
	$FechaNacimiento = $_REQUEST['FechaNacimiento'];
	$dni = $_REQUEST['dni'];
    $telefono = $_REQUEST['telefono'];
    $fotopersonal = $_REQUEST['fotopersonal'];
	$sexo = $_REQUEST['sexo'];

	$action = $_REQUEST['action']; //Variable action para la accion a realizar
	
	//Se crea una entidad USUARIO 
	$USUARIOS = new USUARIOS_Model(
		$login,
		$password,
        $nombre,
        $apellidos,
        $email,
		$FechaNacimiento,
		$dni,
        $telefono,
        $fotopersonal,
        $sexo);

	return $USUARIOS;
	}

	if (!isset($_REQUEST['action'])){ //comprube si existe una accion sino la pone vacia
		$_REQUEST['action'] = '';
	}

	$Permi = new PERMISO_Modelo('','',''); //Se crea una entidad de permiso
	
	//Se hace un switch de la accion a realizar
	Switch ($_REQUEST['action']){

		//accion añadir
		case 'ADD':


            $USUARIOS; //coge los valores y los mete en la variable
            $Permi; //variable que nos permite saber si tiene permisos
            $respuesta; //almacena la respuesta que muestra el mensaje
			
			if($Permi->check('USUARIO','ADD', $_SESSION['login'])){ //si tiene permiso

				if (!$_POST){ //si entra por get envia un formulario
					new USUARIOS_ADD();
				}
				else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
					$USUARIOS = get_data_form();
					$respuesta = $USUARIOS->ADD();
					new MESSAGE($respuesta, '../Controllers/USUARIOS_Controller.php');
				}
				break;
			}else{ //Si no tiene permiso envia un mensaje
				new MESSAGE('You havent permissions', '../Controllers/Login_Controller.php');
				die();
			}


		//accion eliminar
		case 'DELETE':

			$USUARIOS; //objecto del modelo
            $Permi; //variable que nos permite saber si tiene permisos
            $respuesta; //almacena la respuesta que muestra el mensaje
            $valores; //almacena los datos tras rellenarlos

			if($Permi->check('USUARIO','DELETE', $_SESSION['login'])){ //si tiene permiso

				if (!$_POST){ //Si entra por get envia un formulario para el eliminado

					$USUARIOS = new USUARIOS_Model($_REQUEST['login'], '', '', '', '', '', '', '');
					$valores = $USUARIOS->RellenaDatos();
					new USUARIOS_DELETE($valores);
				}
				else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje

					$USUARIOS = new USUARIOS_Model($_REQUEST['login'], '', '', '', '', '', '', '');
					$respuesta = $USUARIOS->DELETE();

					//Si el usuario que se esta eliminando es el propio usuario, este se desloguea de la aplicacion
					if(($_SESSION['login'] == $_REQUEST['login']) && $respuesta == 'Correctly delete')
						unset($_SESSION['login']);  
					new MESSAGE($respuesta, '../Controllers/USUARIOS_Controller.php');
				}
				break;
			}else{//Si no tiene permisos para esta accion envia un mensaje
				new MESSAGE('You havent permissions', '../Controllers/Login_Controller.php');
				die();
			}


		//accion editar	
		case 'EDIT':	
			
			$USUARIOS; //objecto del modelo
            $Permi; //variable que nos permite saber si tiene permisos
            $respuesta; //almacena la respuesta que muestra el mensaje
            $valores; //almacena los datos tras rellenarlos

			if($Permi->check('USUARIO','EDIT', $_SESSION['login'])){//si tiene permiso

				if (!$_POST){//Si entra por get enviar un formulario para editar
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'], '', '', '', '', '', '', '');
					$valores = $USUARIOS->RellenaDatos();
					new USUARIOS_EDIT($valores);
				}
				else{//Si entra por post recoge los datos y los envia a la BD para editar y manda mensaje

					$USUARIOS = get_data_form();
					$respuesta = $USUARIOS->EDIT();
					new MESSAGE($respuesta, '../Controllers/USUARIOS_Controller.php');
				}
				break;
			}else{//Si no tiene permisos para esta accion envia un mensaje
				new MESSAGE('You havent permissions', '../Controllers/Login_Controller.php');
				die();
			}


		//accion buscar	
		case 'SEARCH':


			$USUARIOS; //coge los datos del formulario
            $Permi; //variable que nos permite saber si tiene permisos
            $datos; //almacena los datos que busca

			if($Permi->check('USUARIO','SEARCH', $_SESSION['login'])){ //si tiene permiso

				if (!$_POST){ //Si entra por get enviar un formulario para buscar
					new Usuario_SEARCH();
				}
				else{//Si entra por post recoge los datos y los envia a la BD para buscar y manda mensaje

                    $USUARIOS = get_data_form();
					$datos = $USUARIOS->SEARCH();
					new USUARIOS_SHOWALL($datos, '../Controllers/USUARIOS_Controller.php');
				}
				break;
			}else{//Si no tiene permisos para esta accion envia un mensaje
				new MESSAGE('You havent permissions', '../Controllers/Login_Controller.php');
				die();
			}
			

		//accion para ver en detalle	
		case 'SHOWCURRENT':

			$USUARIOS; //objecto del modelo
            $Permi; //variable que nos permite saber si tiene permisos
            $valores; //almacena los datos tras rellenarlos

			if($Permi->check('USUARIO','SHOWCURRENT', $_SESSION['login'])){ //si tiene permiso
				//Envia un formulario que muestra los valores
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'', '', '', '', '', '', '', '', '');
				$valores = $USUARIOS->RellenaDatos();
				new USUARIOS_SHOWCURRENT($valores);
				break;
			}else{//Si no tiene permisos para esta accion envia un mensaje
				new MESSAGE('You havent permissions', '../Controllers/Login_Controller.php');
				die();
			}




		default:

			$Permi; //variable que nos permite saber si tiene permisos
            $datos; //almacena los datos

			if($Permi->check('USUARIO','SHOWALL', $_SESSION['login'])){ //si tiene permiso
				
				if (!$_POST){//Si entra por get envia una tabla con los usuarios
					$USUARIOS = new USUARIOS_Model('','','', '', '', '', '', '');
				}
				else{//Si entra por post recoge el valor de un usuario y muestro la tabal con todos los usuarios
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'], '', '', '', '', '', '', '');
				}

				//lo hace de todas formas
				$datos = $USUARIOS->AllData();
				new USUARIOS_SHOWALL($datos, '../Controllers/USUARIOS_Controller.php');
			}else{//Si no tiene permisos para esta accion envia un mensaje
				new MESSAGE('You havent permissions', '../Controllers/Login_Controller.php');
				die();
			}

	}
						
}
?>