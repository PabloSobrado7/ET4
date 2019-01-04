<?php
/**
 * Funcion: Archivo php donde se controlan las acciones del alquiler
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
	
session_start();
include '../Functions/Authentication.php';
include '../Views/MESSAGE.php';

if (!IsAuthenticated()){

    new MESSAGE('You need sign in', '../Controllers/Login_Controller.php'); //muestra mensaje

}else{

    require_once('../Models/ALQUILA_Model.php');
    include '../Views/Alquila/Alquila_SHOWALL.php';
    include '../Views/Alquila/Alquila_ADD.php';
    include '../Views/Alquila/Alquila_DELETE.php';

    function get_data_form(){ //recoge los valores del formulario

        $login_socio = $_REQUEST['login_socio'];
		$id_tarifa = $_REQUEST['id_tarifa'];
		$fecha_alquiler = $_REQUEST['fecha_alquiler'];
		$id_juego = $_REQUEST['id_juego'];

        $action = $_REQUEST['action']; //Variable action para la accion a realizar

        //Se crea una entidad USUARIO
        $ALQUILA = new ALQUILA_Model(
            $login_socio,$id_tarifa,$fecha_alquiler,$id_juego);

        return $ALQUILA;
    }

    if (!isset($_REQUEST['action'])){ //comprube si existe una accion sino la pone vacia
        $_REQUEST['action'] = '';
    }

    //Se hace un switch de la accion a realizar
    Switch ($_REQUEST['action']){

        //accion añadir
        case 'ADD':
		
            $ALQUILA; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
				   new Alquila_ADD();
                }
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje

					$ALQUILA = get_data_form();
                    $respuesta = $ALQUILA->ADD();
                    new MESSAGE($respuesta, '../Controllers/ALQUILA_Controller.php');
                }
                break;

        case 'DELETE':

            $ALQUILA;
            $respuesta;
			
                if (!$_POST){ //Si entra por get envia un formulario para el eliminado

					new Alquila_DELETE($_GET['login_socio'],$_GET['id_tarifa'],$_GET['fecha_alquiler'],$_GET['id_juego']);
                }
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    
					$ALQUILA = new ALQUILA_Model($_REQUEST['login_socio'],$_REQUEST['id_tarifa'],$_REQUEST['fecha_alquiler'],$_REQUEST['id_juego']);
                    $respuesta =  $ALQUILA->DELETE();

                    new MESSAGE($respuesta, '../Controllers/ALQUILA_Controller.php');
                }
                break;
           
            

        default:

            
            $datos; //almacena los datos

            
                if (!$_POST){//Si entra por get envia una tabla con los usuarios

                    $ALQUILA = new ALQUILA_Model('','','','');
                }
                else{//Si entra por post recoge el valor de un usuario y muestro la tabal con todos los usuarios

                    $ALQUILA = new ALQUILA_Model($_REQUEST['login_socio'],$_REQUEST['id_tarifa'],$_REQUEST['fecha_alquiler'],$_REQUEST['id_juego']);}

                //lo hace de todas formas
                $datos = $ALQUILA->AllData();
                new Alquila_SHOWALL($datos, '../Controllers/ALQUILA_Controller.php');
           
    }

}
?>