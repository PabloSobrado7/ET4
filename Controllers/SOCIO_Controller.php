<?php
/**
 * Funcion: Archivo php donde se controlan las acciones de los socios
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
	
session_start();
include '../Functions/Authentication.php';
include '../Views/MESSAGE.php';

if (!IsAuthenticated()){

    new MESSAGE('You need sign in', '../Controllers/Login_Controller.php'); //muestra mensaje

}else{

    require_once('../Models/SOCIO_Model.php');
    include '../Views/Socio/Socio_SHOWALL.php';
    include '../Views/Socio/Socio_ADD.php';
	include '../Views/Socio/Socio_SEARCH.php';
	include '../Views/Socio/Socio_EDIT.php';
    include '../Views/Socio/Socio_DELETE.php';

    function get_data_form(){ //recoge los valores del formulario

        $login_socio = $_REQUEST['login_socio'];
		$pass_socio = $_REQUEST['pass_socio'];
		$dni_socio = $_REQUEST['dni_socio'];
		$nombre_socio = $_REQUEST['nombre_socio'];
		$apellidos_socio = $_REQUEST['apellidos_socio'];
		$email_socio = $_REQUEST['email_socio'];
		$telefono_socio = $_REQUEST['telefono_socio'];
		$socio_bloqueado = $_REQUEST['socio_bloqueado'];
		
		
        $action = $_REQUEST['action']; //Variable action para la accion a realizar

        //Se crea una entidad USUARIO
        $SOCIO = new SOCIO_Model(
            $login_socio,$pass_socio,$dni_socio,$nombre_socio,$apellidos_socio,
			$email_socio,$telefono_socio,$socio_bloqueado);

        return $SOCIO;
    }

    if (!isset($_REQUEST['action'])){ //comprube si existe una accion sino la pone vacia
        $_REQUEST['action'] = '';
    }

    //Se hace un switch de la accion a realizar
    Switch ($_REQUEST['action']){

        //accion añadir
        case 'ADD':

            $SOCIO; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
				   new Socio_ADD();
                }
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje

					$SOCIO = get_data_form();
                    $respuesta = $SOCIO->ADD();
                    new MESSAGE($respuesta, '../Controllers/SOCIO_Controller.php');
                }
                break;
		
		 $login_socio = $_REQUEST['login_socio'];
		$pass_socio = $_REQUEST['pass_socio'];
		$dni_socio = $_REQUEST['dni_socio'];
		$nombre_socio = $_REQUEST['nombre_socio'];
		$apellidos_socio = $_REQUEST['apellidos_socio'];
		$email_socio = $_REQUEST['email_socio'];
		$telefono_socio = $_REQUEST['telefono_socio'];
		$socio_bloqueado = $_REQUEST['socio_bloqueado'];
		
		
		case 'EDIT':

            $SOCIO; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
                    new Socio_EDIT($_GET['login_socio'],$_GET['pass_socio'],$_GET['dni_socio'],
					$_GET['nombre_socio'],$_GET['apellidos_socio'],
					$_GET['email_socio'],$_GET['telefono_socio'],$_GET['socio_bloqueado']);
				}
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    $SOCIO = get_data_form();
                    $respuesta = $SOCIO->EDIT();
                    new MESSAGE($respuesta, '../Controllers/SOCIO_Controller.php');
				}
                break;
				
		case 'SEARCH':

            $SOCIO; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
                    new Socio_SEARCH();
				}
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    $SOCIO = get_data_form();

                    $respuesta = $SOCIO->SEARCH();
					 new Socio_SHOWALL($respuesta, '../Controllers/SOCIO_Controller.php');
				}
                break;

        case 'DELETE':

            $SOCIO;
            $respuesta;
			
                if (!$_POST){ //Si entra por get envia un formulario para el eliminado

					new Socio_DELETE($_GET['login_socio'],$_GET['pass_socio'],$_GET['dni_socio'],
					$_GET['nombre_socio'],$_GET['apellidos_socio'],
					$_GET['email_socio'],$_GET['telefono_socio'],$_GET['socio_bloqueado']);
                }
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    $SOCIO = new SOCIO_Model($_REQUEST['login_socio'],'','','','','','','');
                    $respuesta =  $SOCIO->DELETE();

                    new MESSAGE($respuesta, '../Controllers/SOCIO_Controller.php');
                }
                break;
           
            

        default:

            
            $datos; //almacena los datos

            
                if (!$_POST){//Si entra por get envia una tabla con los usuarios

                    $SOCIO = new SOCIO_Model('','','','','','','','');
                }
                else{//Si entra por post recoge el valor de un usuario y muestro la tabal con todos los usuarios

                    $SOCIO = new SOCIO_Model($_REQUEST['login_socio'],'','','','','','','');                
					}

                //lo hace de todas formas
                $datos = $SOCIO->AllData();
                new Socio_SHOWALL($datos, '../Controllers/SOCIO_Controller.php');
           
    }

}
?>