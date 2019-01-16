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

    require_once('../Models/SOCIO_Model.php');
    include '../Views/Activos/Activos_SHOWALL.php';

    if (!isset($_REQUEST['action'])){ //comprube si existe una accion sino la pone vacia
        $_REQUEST['action'] = '';
    }

    //Se hace un switch de la accion a realizar
    Switch ($_REQUEST['action']){	

        default:

            
            $datos; //almacena los datos
			$SOCIO;
			
			$SOCIO = new SOCIO_Model('','','','','','','','');
                //lo hace de todas formas
                $datos = $SOCIO->MASACTIVOSCOMPRA();
				
			$SOCIO = new SOCIO_Model('','','','','','','','');
                //lo hace de todas formas
                $datosal = $SOCIO->MASACTIVOSALQUILER();
                new Activos_SHOWALL($datos,$datosal, '../Controllers/JUEGO_Controller.php');
           
    }

}
?>