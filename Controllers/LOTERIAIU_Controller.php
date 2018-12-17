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

    require_once('../Models/LOTERIA_Model.php');
    include '../Views/Loteria/Loteria_SHOWALL.php';
    include '../Views/Loteria/Loteria_ADD.php';
	include '../Views/Loteria/Loteria_SEARCH.php';
	include '../Views/Loteria/Loteria_EDIT.php';
    include '../Views/Loteria/Loteria_DELETE.php';

    function get_data_form(){ //recoge los valores del formulario

        $lotemail = $_REQUEST['lotemail'];
		$lotnombre = $_REQUEST['lotnombre'];
		$lotapellidos = $_REQUEST['lotapellidos'];
		$lotparticipacion = $_REQUEST['lotparticipacion'];
		$lotresguardo = $_REQUEST['lotresguardo'];
		$lotingresado = $_REQUEST['lotingresado'];
		$lotpremiopersonal = $_REQUEST['lotpremiopersonal'];
		$lotpagado = $_REQUEST['lotpagado'];

        $action = $_REQUEST['action']; //Variable action para la accion a realizar

        //Se crea una entidad USUARIO
        $LOTERIA = new LOTERIA_Model(
            $lotemail,$lotnombre,$lotapellidos,$lotparticipacion,$lotresguardo,
			$lotingresado,$lotpremiopersonal,$lotpagado);

        return $LOTERIA;
    }

    if (!isset($_REQUEST['action'])){ //comprube si existe una accion sino la pone vacia
        $_REQUEST['action'] = '';
    }

    //Se hace un switch de la accion a realizar
    Switch ($_REQUEST['action']){

        //accion añadir
        case 'ADD':

            $LOTERIA; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
				   new Loteria_ADD();
                }
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    $LOTERIA = get_data_form();
                    $respuesta = $LOTERIA->ADD();
                    new MESSAGE($respuesta, '../Controllers/LOTERIAIU_Controller.php');
                }
                break;

		case 'EDIT':

            $LOTERIA; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
                    new Loteria_EDIT($_GET['lotemail'],$_GET['lotnombre'],$_GET['lotapellidos'],$_GET['lotparticipacion'],$_GET['lotresguardo'],
					$_GET['lotingresado'],$_GET['lotpremiopersonal'],$_GET['lotpagado']);
				}
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    $LOTERIA = get_data_form();
                    $respuesta = $LOTERIA->EDIT();
                    new MESSAGE($respuesta, '../Controllers/LOTERIAIU_Controller.php');
				}
                break;
				
		case 'SEARCH':

            $LOTERIA; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
                    new Loteria_SEARCH();
				}
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    $LOTERIA = get_data_form();

                    $respuesta = $LOTERIA->SEARCH();
					 new Loteria_SHOWALL($respuesta, '../Controllers/LOTERIAIU_Controller.php');
                    //new MESSAGE($respuesta, '../Controllers/LOTERIAIU_Controller.php');
				}
                break;

        case 'DELETE':

            $LOTERIA;
            $respuesta;
			
                if (!$_POST){ //Si entra por get envia un formulario para el eliminado

					new Loteria_DELETE($_GET['lotemail'],$_GET['lotnombre'],$_GET['lotapellidos'],$_GET['lotparticipacion'],$_GET['lotresguardo'],
					$_GET['lotingresado'],$_GET['lotpremiopersonal'],$_GET['lotpagado']);
                }
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    $LOTERIA = new LOTERIA_Model($_REQUEST['emailuser'],'','','','','','','');
                    $respuesta =  $LOTERIA->DELETE();

                    new MESSAGE($respuesta, '../Controllers/LOTERIAIU_Controller.php');
                }
                break;
           
            

        default:

            
            $datos; //almacena los datos

            
                if (!$_POST){//Si entra por get envia una tabla con los usuarios

                    $LOTERIA = new LOTERIA_Model('','','','','','','','');
                }
                else{//Si entra por post recoge el valor de un usuario y muestro la tabal con todos los usuarios

                    $LOTERIA = new LOTERIA_Model($_REQUEST['lotemail'],'','','','','','','');                }

                //lo hace de todas formas
                $datos = $LOTERIA->AllData();
                new Loteria_SHOWALL($datos, '../Controllers/LOTERIAIU_Controller.php');
           
    }

}
?>