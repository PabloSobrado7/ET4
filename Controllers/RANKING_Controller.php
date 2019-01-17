<?php
/**
 * Funcion: Archivo php donde se controlan las acciones de los juegos top mas vendidos/alquilados
 * Autor: Mario Gayoso Perez
 */	
session_start();
include '../Functions/Authentication.php';
include '../Views/MESSAGE.php';

if (!IsAuthenticated()){

    new MESSAGE('You need sign in', '../Controllers/Login_Controller.php'); //muestra mensaje

}else{

    require_once('../Models/JUEGO_Model.php');
    include '../Views/Ranking/Ranking_SHOWALL.php';

    if (!isset($_REQUEST['action'])){ //comprube si existe una accion sino la pone vacia
        $_REQUEST['action'] = '';
    }

    //Se hace un switch de la accion a realizar
    Switch ($_REQUEST['action']){	

        default:

            
            $datos; //almacena los datos
			$JUEGO;
			
			$JUEGO = new JUEGO_Model('','','','','','','','','');
                //lo hace de todas formas
                $datos = $JUEGO->MASVENDIDOS();
				$datos2 = $JUEGO->MASALQUILADOS();
                new Ranking_SHOWALL($datos,$datos2, '../Controllers/JUEGO_Controller.php');
           
    }

}
?>