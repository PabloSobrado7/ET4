<?php
/**
 * Funcion: Archivo php donde se controlan las acciones de la asociacion entre juego y tarifa
 * Autor: Mario Gayoso Perez
 */

session_start();
include '../Functions/Authentication.php';
include '../Views/MESSAGE.php';

if (!IsAuthenticated()){

    new MESSAGE('You need sign in', '../Controllers/Login_Controller.php'); //muestra mensaje

}else{

    require_once('../Models/ASOCIADO_Model.php');
    // include '../Views/Asociado/Asociado_SHOWALL.php';
    // include '../Views/Asociado/Asociado_ADD.php';
	// include '../Views/Asociado/Asociado_SEARCH.php';
    // include '../Views/Asociado/Asociado_DELETE.php';

    function get_data_form(){ //recoge los valores del formulario

        $id_tarifa = $_REQUEST['id_tarifa'];
		$id_juego = $_REQUEST['id_juego'];
		$fecha_tarifa = $_REQUEST['fecha_tarifa'];
        
        $action = $_REQUEST['action']; //Variable action para la accion a realizar

        //Se crea una entidad USUARIO
        $ASOCIADO = new ASOCIADO_Model(
            $id_tarifa,$id_juego,$fecha_tarifa);

        return $ASOCIADO;
    }

    if (!isset($_REQUEST['action'])){ //comprube si existe una accion sino la pone vacia
        $_REQUEST['action'] = '';
    }

    //Se hace un switch de la accion a realizar
    Switch ($_REQUEST['action']){

        //accion añadir
        case 'ADD':

            $ASOCIADO; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
				  // new Asociado_ADD();
                }
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje

					$ASOCIADO = get_data_form();
                    $respuesta = $ASOCIADO->ADD();
                    new MESSAGE($respuesta, '../Controllers/ASOCIADO_Controller.php');
                }
                break;

        case 'DELETE':

            $ASOCIADO;
            $respuesta;
			
                if (!$_POST){ //Si entra por get envia un formulario para el eliminado

					// new Asociado_DELETE($_GET['id_tarifa'],$_GET['id_juego'],$_GET['fecha_tarifa']);
                }
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    $ASOCIADO = new ASOCIADO_Model($_REQUEST['id_tarifa'],$_REQUEST['id_juego'],$_REQUEST['fecha_tarifa']);
                    $respuesta =  $ASOCIADO->DELETE();

                    new MESSAGE($respuesta, '../Controllers/ASOCIADO_Controller.php');
                }
                break;
           
            

        default:

            
            //aun no sabemos como vamos a mostrar los datos asociados
           
		   
    }

}
?>