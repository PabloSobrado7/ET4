<?php
/**
 * Funcion: Archivo php donde se controlan las acciones de la loteria
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
	
session_start();
include '../Functions/Authentication.php';
include '../Views/MESSAGE.php';

if (!IsAuthenticated()){

    new MESSAGE('You need sign in', '../Controllers/Login_Controller.php'); //muestra mensaje

}else{

    require_once('../Models/VENDEDOR_Model.php');
    include '../Views/Vendedor/Vendedor_SHOWALL.php';
    include '../Views/Vendedor/Vendedor_ADD.php';
	include '../Views/Vendedor/Vendedor_SEARCH.php';
	include '../Views/Vendedor/Vendedor_EDIT.php';
    include '../Views/Vendedor/Vendedor_DELETE.php';

    function get_data_form(){ //recoge los valores del formulario

        $login_vendedor = $_REQUEST['login_vendedor'];
		$pass_vendedor = $_REQUEST['pass_vendedor'];
		$dni_vendedor = $_REQUEST['dni_vendedor'];
		$nombre_vendedor = $_REQUEST['nombre_vendedor'];
		$apellidos_vendedor = $_REQUEST['apellidos_vendedor'];
		$email_vendedor = $_REQUEST['email_vendedor'];
		$telefono_vendedor = $_REQUEST['telefono_vendedor'];

        $action = $_REQUEST['action']; //Variable action para la accion a realizar

        //Se crea una entidad USUARIO
        $VENDEDOR = new VENDEDOR_Model(
            $login_vendedor,$pass_vendedor,$dni_vendedor,$nombre_vendedor,$apellidos_vendedor,
			$email_vendedor,$telefono_vendedor);

        return $VENDEDOR;
    }

    if (!isset($_REQUEST['action'])){ //comprube si existe una accion sino la pone vacia
        $_REQUEST['action'] = '';
    }

    //Se hace un switch de la accion a realizar
    Switch ($_REQUEST['action']){

        //accion añadir
        case 'ADD':

            $VENDEDOR; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
				   new Vendedor_ADD();
                }
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje

					$VENDEDOR = get_data_form();
                    $respuesta = $VENDEDOR->ADD();
                    new MESSAGE($respuesta, '../Controllers/VENDEDOR_Controller.php');
                }
                break;

		
		case 'EDIT':

            $VENDEDOR; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
                    new Vendedor_EDIT($_GET['login_vendedor'],$_GET['pass_vendedor'],$_GET['dni_vendedor'],
					$_GET['nombre_vendedor'],$_GET['apellidos_vendedor'],
					$_GET['email_vendedor'],$_GET['telefono_vendedor']);
				}
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    $VENDEDOR = get_data_form();
                    $respuesta = $VENDEDOR->EDIT();
                    new MESSAGE($respuesta, '../Controllers/VENDEDOR_Controller.php');
				}
                break;
				
		case 'SEARCH':

            $VENDEDOR; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
                    new Vendedor_SEARCH();
				}
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    $VENDEDOR = get_data_form();

                    $respuesta = $VENDEDOR->SEARCH();
					 new Vendedor_SHOWALL($respuesta, '../Controllers/VENDEDOR_Controller.php');
				}
                break;

        case 'DELETE':

            $VENDEDOR;
            $respuesta;
			
                if (!$_POST){ //Si entra por get envia un formulario para el eliminado

					new Vendedor_DELETE($_GET['login_vendedor'],$_GET['pass_vendedor'],$_GET['dni_vendedor'],
					$_GET['nombre_vendedor'],$_GET['apellidos_vendedor'],
					$_GET['email_vendedor'],$_GET['telefono_vendedor']);
                }
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    $VENDEDOR = new VENDEDOR_Model($_REQUEST['login_vendedor'],'','','','','','','');
                    $respuesta =  $VENDEDOR->DELETE();

                    new MESSAGE($respuesta, '../Controllers/VENDEDOR_Controller.php');
                }
                break;
           
            

        default:

            
            $datos; //almacena los datos

            
                if (!$_POST){//Si entra por get envia una tabla con los usuarios

                    $VENDEDOR = new VENDEDOR_Model('','','','','','','');
                }
                else{//Si entra por post recoge el valor de un usuario y muestro la tabal con todos los usuarios

                    $VENDEDOR = new VENDEDOR_Model($_REQUEST['login_vendedor'],'','','','','','','');                }

                //lo hace de todas formas
                $datos = $VENDEDOR->AllData();
                new Vendedor_SHOWALL($datos, '../Controllers/VENDEDOR_Controller.php');
           
    }

}
?>