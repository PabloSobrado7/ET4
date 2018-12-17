<?php
/**
 * Funcion: Archivo php que nos permite realizar la conexion con la bd
 * Autor: Pablo Sobrado Pinto
 * Fecha: 28/11/2018
 */

    //Comprueba si la funcion ConnectDB ya esta definida sino la define
    if (!function_exists('ConnectDB')) { 

        $mysqli;  //Variable para guardar la conexion MySQL
        
        //ConnectDB se encarga de establecer conexion la BD
        function ConnectDB(){

            //Definimos la configuracion para establecer la BD
            $mysqli = new mysqli("localhost", "root", "","iu2018");


            //Si existe algun error manda un mensaje de error
            if($mysqli->connect_errno){
                echo "Fallo al conectar a MYSQL: (" . $mysqli->connect_errno . " )" . $mysqli->connect_errno;
            }

            //Retorna la conexion al modelo
            return $mysqli;
        }
    
    }

?>