<?php
/**
 * Funcion: Archivo php donde se controlan las acciones del juego
 * Autor: Mario
 */	
session_start();
include '../Functions/Authentication.php';
include '../Views/MESSAGE.php';

if (!IsAuthenticated()){

    new MESSAGE('You need sign in', '../Controllers/Login_Controller.php'); //muestra mensaje

}else{

    require_once('../Models/JUEGO_Model.php');
    include '../Views/Juego/Juego_SHOWALL.php';
    include '../Views/Juego/Juego_ADD.php';
	include '../Views/Juego/Juego_SEARCH.php';
	include '../Views/Juego/Juego_EDIT.php';
    include '../Views/Juego/Juego_DELETE.php';

    function get_data_form(){ //recoge los valores del formulario

        $id_juego = $_REQUEST['id_juego'];
		$nombre_juego = $_REQUEST['nombre_juego'];
		$plataforma = $_REQUEST['plataforma'];
        $genero = $_REQUEST['genero'];
		$precio_compra = $_REQUEST['precio_compra'];
		$categoria_juego = $_REQUEST['categoria_juego'];
		$novedad = $_REQUEST['novedad'];
		$compra_juego = $_REQUEST['compra_juego'];
        $venta_juego = $_REQUEST['venta_juego'];


        $action = $_REQUEST['action']; //Variable action para la accion a realizar

        //Se crea una entidad USUARIO
        $JUEGO = new JUEGO_Model(
            $id_juego,$nombre_juego,$plataforma,$genero,$precio_compra,
			$categoria_juego,$novedad,$compra_juego,$venta_juego);

        return $JUEGO;
    }

    if (!isset($_REQUEST['action'])){ //comprube si existe una accion sino la pone vacia
        $_REQUEST['action'] = '';
    }

    //Se hace un switch de la accion a realizar
    Switch ($_REQUEST['action']){

        //accion añadir
        case 'ADD':

            $JUEGO; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
				   new Juego_ADD();
                }
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje

					$JUEGO = get_data_form();
                    $respuesta = $JUEGO->ADD();
                    new MESSAGE($respuesta, '../Controllers/JUEGO_Controller.php');
                }
        break;
		
		case 'EDIT':

            $JUEGO; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

            echo $_GET['id_juego'];
            die();

                if (!$_POST){ //si entra por get envia un formulario
                    new Juego_EDIT($_GET['id_juego'],$_GET['nombre_juego'],$_GET['plataforma'],
					$_GET['genero'],$_GET['precio_compra'],$_GET['categoria_juego'],$_GET['novedad'],$_GET['compra_juego'],$_GET['venta_juego']);
				}
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    $JUEGO = get_data_form();
                    $respuesta = $JUEGO->EDIT();
                    new MESSAGE($respuesta, '../Controllers/JUEGO_Controller.php');
				}
        break;
				
		case 'SEARCH':

            $JUEGO; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
                    new Juego_SEARCH();
				}
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    $JUEGO = get_data_form();

                    $respuesta = $JUEGO->SEARCH();
					 new Juego_SHOWALL($respuesta, '../Controllers/JUEGO_Controller.php');
				}
        break;

        case 'DELETE':

            $JUEGO;
            $respuesta;
			
                if (!$_POST){ //Si entra por get envia un formulario para el eliminado

					 new Juego_DELETE($_GET['id_juego'],$_GET['nombre_juego'],$_GET['plataforma'],
                    $_GET['genero'],$_GET['precio_compra'],
                    $_GET['categoria_juego'],$_GET['novedad'], $_GET['compra_juego'],$_GET['venta_juego']);
                }
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje
                    $JUEGO = new JUEGO_Model($_REQUEST['id_juego'],'','','','','','','');
                    $respuesta =  $JUEGO->DELETE();

                    new MESSAGE($respuesta, '../Controllers/JUEGO_Controller.php');
                }
        break;
           
            

        default:

            
            $datos; //almacena los datos

            
                if (!$_POST){//Si entra por get envia una tabla con los usuarios

                    $JUEGO = new JUEGO_Model('','','','','','','','','');
                }
                else{//Si entra por post recoge el valor de un usuario y muestro la tabal con todos los usuarios

                    $JUEGO = new JUEGO_Model($_REQUEST['id_juego'],'','','','','','','','');
                }

                //lo hace de todas formas
                $datos = $JUEGO->AllData();
                new Juego_SHOWALL($datos, '../Controllers/Juego_Controller.php');
           
    }

}
?>