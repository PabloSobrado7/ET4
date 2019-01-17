<?php
/**
 * Funcion: Archivo php donde se controlan las acciones del catalogo de juegos
 * Autor: Mario Gayoso Perez
 */	
session_start();
include '../Functions/Authentication.php';
include '../Views/MESSAGE.php';

if (!IsAuthenticated()){

    new MESSAGE('You need sign in', '../Controllers/Login_Controller.php'); //muestra mensaje

}else{

    require_once('../Models/JUEGO_Model.php');
    include '../Views/Catalogo/Catalogo_SHOWALL.php';
	include '../Views/Catalogo/Catalogo_SEARCH.php';

    if (!isset($_REQUEST['action'])){ //comprube si existe una accion sino la pone vacia
        $_REQUEST['action'] = '';
    }

    //Se hace un switch de la accion a realizar
    Switch ($_REQUEST['action']){
		
		case 'SEARCH':

            $JUEGO; //coge los valores y los mete en la variable
            $respuesta; //almacena la respuesta que muestra el mensaje

                if (!$_POST){ //si entra por get envia un formulario
                    new Catalogo_SEARCH();
				}
                else{//Si entra por post recoge los datos y los envia a la BD y manda mensaje

					$JUEGO = get_data_form();

                    $respuesta = $JUEGO->SEARCH();
					 new Catalogo_SHOWALL($respuesta, '../Controllers/JUEGO_Controller.php');
				}
        break;

        default:

            
            $datos; //almacena los datos
			$JUEGO;
			
			$JUEGO = new JUEGO_Model('','','','','','','','','');
                //lo hace de todas formas
                $datos = $JUEGO->AllData();
                new Catalogo_SHOWALL($datos, '../Controllers/JUEGO_Controller.php');
           
    }

}
?>