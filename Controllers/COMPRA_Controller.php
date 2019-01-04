<?php
/**
 * Funcion: Archivo php donde se controlan las acciones de las compras
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */
	
session_start();
include '../Functions/Authentication.php';
include '../Views/MESSAGE.php';

if (!IsAuthenticated()){

    new MESSAGE('You need sign in', '../Controllers/Login_Controller.php'); //muestra mensaje

}else{

    require_once('../Models/COMPRA_Model.php');
    include '../Views/Compra/Compra_SHOWALL.php';
    include '../Views/Compra/Compra_ADD.php';
    include '../Views/Compra/Compra_DELETE.php';

    function get_data_form(){ //recoge los valores del formulario

        $login_socio = $_REQUEST['login_socio'];
		$id_juego = $_REQUEST['id_juego'];
		$fecha_compra = $_REQUEST['fecha_compra'];

        $action = $_REQUEST['action']; //Variable action para la accion a realizar

        //Se crea una entidad USUARIO
        $COMPRA = new COMPRA_Model(
            $login_socio,$id_juego,$fecha_compra);

        return $COMPRA;
    }

    if (!isset($_REQUEST['action'])){ //comprube si existe una accion sino la pone vacia
        $_REQUEST['action'] = '';
    }

    //Se hace un switch de la accion a realizar
    Switch ($_REQUEST['action']){

        //accion añadir
        case 'ADD':
		
            $COMPRA; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
				   new Compra_ADD();
                }
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje

					$COMPRA = get_data_form();
                    $respuesta = $COMPRA->ADD();
                    new MESSAGE($respuesta, '../Controllers/COMPRA_Controller.php');
                }
                break;

        case 'DELETE':

            $COMPRA;
            $respuesta;
			
                if (!$_POST){ //Si entra por get envia un formulario para el eliminado

					new Compra_DELETE($_GET['login_socio'],$_GET['id_juego'],$_GET['fecha_compra']);
                }
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    
					$COMPRA = new COMPRA_Model($_REQUEST['login_socio'],$_REQUEST['id_juego'],$_REQUEST['fecha_compra']);
                    $respuesta =  $COMPRA->DELETE();

                    new MESSAGE($respuesta, '../Controllers/COMPRA_Controller.php');
                }
                break;
           
            

        default:

            
            $datos; //almacena los datos

            
                if (!$_POST){//Si entra por get envia una tabla con los usuarios

                    $COMPRA = new COMPRA_Model('','','');
                }
                else{//Si entra por post recoge el valor de un usuario y muestro la tabal con todos los usuarios

                    $COMPRA = new COMPRA_Model($_REQUEST['login_socio'],$_REQUEST['id_juego'],$_REQUEST['fecha_compra']);}

                //lo hace de todas formas
                $datos = $COMPRA->AllData();
                new Compra_SHOWALL($datos, '../Controllers/COMPRA_Controller.php');
           
    }

}
?>